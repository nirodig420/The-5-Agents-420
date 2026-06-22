---
name: wp-rest
description: "מעטפת ל-WordPress REST API לניהול דפים ופוסטים באתר nirodigital.co.il. קורא/מעדכן/יוצר תוכן דרך wp-json, מאמת עם Application Password מ-.env. תומך באודיט Elementor ובשמירת סנאפשוט לפני כל עריכה."
---

# wp-rest — ניהול אתר WordPress דרך REST API

מעטפת מסביב ל-**WordPress REST API** (`/wp-json/wp/v2/`). הסקיל מאפשר לסוכן איתן
לקרוא, לעדכן וליצור **דפים (pages)** ו**פוסטים (posts)** באתר — בלי להיכנס ל-wp-admin
ובלי לגעת ידנית בקוד. כל הפעולות ב-PowerShell עם `Invoke-RestMethod` (מאומת על Windows הזה).

## אימות (Authentication)

- שיטה: **Application Passwords** — מובנה ב-WordPress core מגרסה 5.6. לא צריך תוסף.
- ה-header: `Authorization: Basic base64("user:app_password")`. דורש **HTTPS** (יש).
- שלושה ערכים נקראים מ-`.env` בשורש הפרויקט:
  - `WP_SITE_URL` — למשל `https://nirodigital.co.il`
  - `WP_USERNAME` — שם המשתמש המנהל ב-wp-admin
  - `WP_APP_PASSWORD` — ה-Application Password (מיוצר פעם אחת מ-`Users → Profile → Application Passwords`)
- ⚠️ אם מתקבלת שגיאת 401 — הבעיה כמעט תמיד ב-`WP_APP_PASSWORD` (תוקף/הקלדה) או ש-REST API
  חסום ע"י תוסף אבטחה/Cloudflare. לא בכתובת. ראה `eitan-seo/SETUP.md`.

## בלוק האתחול (להריץ פעם בתחילת כל סשן עבודה)

```powershell
# Windows PowerShell 5.1 ברירת-מחדל מנסה TLS ישן — מכריחים TLS 1.2 אחרת נכשל handshake.
[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12

# טעינת ערכים מ-.env — פרסור עמיד: מסיר מרכאות עוטפות אופציונליות (' או ")
# ואז Trim. עובד גם אם הערך מצוטט וגם אם לא, וגם עם רווחים בתוך הערך
# (כמו Application Password של WordPress שמכיל רווחים).
function Get-EnvValue([string]$key) {
  $line = Get-Content .env | Where-Object { $_ -match "^$key=" } | Select-Object -First 1
  if ($null -eq $line) { return $null }
  $val = $line -replace "^$key=", ''
  $val = $val.Trim()                               # רווחים מסביב לכל הערך
  $val = $val -replace '^"(.*)"$', '$1'            # הסרת מרכאות כפולות עוטפות
  $val = $val -replace "^'(.*)'$", '$1'            # הסרת מרכאות בודדות עוטפות
  return $val.Trim()                               # Trim פנימי אחרי הסרת המרכאות
}

$WP_USER = Get-EnvValue 'WP_USERNAME'
$WP_PASS = Get-EnvValue 'WP_APP_PASSWORD'
$WP_SITE = (Get-EnvValue 'WP_SITE_URL').TrimEnd('/')

# בניית header אימות
$pair = "$WP_USER`:$WP_PASS"
$b64  = [Convert]::ToBase64String([Text.Encoding]::UTF8.GetBytes($pair))
$WP_HEAD = @{ Authorization = "Basic $b64" }
$WP_API  = "$WP_SITE/wp-json/wp/v2"
```

## פעולות

### 1) test-auth — בדיקת חיבור (להריץ ראשון תמיד)
```powershell
$me = Invoke-RestMethod -Uri "$WP_API/users/me?context=edit" -Headers $WP_HEAD -Method Get
"OK — מחובר כ: $($me.name) (id=$($me.id), roles=$($me.roles -join ','))"
```
תוצאה תקינה = JSON עם `name`/`id`. שגיאה = אימות נכשל (בדוק `.env`).

### 2) list-pages / list-posts — מיפוי כל הדפים
```powershell
$pages = Invoke-RestMethod -Uri "$WP_API/pages?per_page=100&status=publish,draft&context=edit" -Headers $WP_HEAD
$pages | Select-Object id, slug, @{n='title';e={$_.title.raw}}, status, link | Format-Table -Auto
# פוסטים: אותו דבר מול $WP_API/posts
```

### 3) get-page — קריאת תוכן גולמי של דף (כולל סנאפשוט)
```powershell
$id = 123
$page = Invoke-RestMethod -Uri "$WP_API/pages/$id`?context=edit" -Headers $WP_HEAD
# שמירת סנאפשוט לפני כל עריכה — חובה!
$stamp = Get-Date -Format 'yyyy-MM-dd-HHmmss'
$page.content.raw | Out-File "eitan-seo/snapshots/page-$id-$stamp.html" -Encoding utf8
$page.content.raw   # ה-HTML הגולמי של הדף
```

### 4) update-page — עדכון תוכן דף מקובץ HTML
```powershell
# ⚠️ קודם להריץ get-page לאותו id כדי שיהיה סנאפשוט!
$id   = 123
$html = Get-Content "eitan-seo/snapshots/page-$id-edited.html" -Raw -Encoding utf8
$body = @{ content = $html } | ConvertTo-Json -Depth 5
Invoke-RestMethod -Uri "$WP_API/pages/$id" -Headers $WP_HEAD -Method Post `
  -ContentType 'application/json; charset=utf-8' -Body $body | Select-Object id, link, modified
```
(עדכון פוסט זהה — מול `$WP_API/posts/$id`. יצירת דף חדש — `Method Post` מול `$WP_API/pages`
עם `title` + `content` + `status='draft'`.)

### 5) audit-elementor — זיהוי אילו דפים בנויים ב-Elementor
זה השלב הקריטי. דף Elementor שומר תוכן ב-meta `_elementor_data`, **לא** ב-`content`,
ולכן עדכון `content` עליו לא יופיע. נזהה אותם כדי לא לשבור כלום:
```powershell
foreach ($p in $pages) {
  $full = Invoke-RestMethod -Uri "$WP_API/pages/$($p.id)`?context=edit" -Headers $WP_HEAD
  $isElementor = ($full.meta._elementor_edit_mode -eq 'builder') -or
                 ($full.content.raw -match 'elementor|data-elementor')
  "{0,-5} {1,-30} Elementor={2}" -f $p.id, $p.slug, $isElementor
}
```
> אם `meta` לא חוזר ב-REST (תלוי בהגדרות), זיהוי חלופי: נוכחות `elementor` ב-`content.rendered`
> או בדיקה ידנית של הדף. דף Elementor → **לא לערוך content ישירות**; להמליץ לניר על
> העברה ל-Custom HTML (ראה פרוטוקול הבטיחות ב-`.claude/agents/eitan.md`).

## פרוטוקול בטיחות (חובה)

1. **תמיד `test-auth` לפני הכל.** בלי 200 — לא ממשיכים.
2. **תמיד `get-page` (שמירת סנאפשוט) לפני כל `update`.** אין עריכה בלי גיבוי.
3. **אף פעם לא לגעת בדף קריטי (משפך הלידים) ראשון.** קודם בדיקת כתיבה על דף טיוטה.
4. **דף Elementor → לעצור ולשאול את ניר**, לא לדרוס `content`.
5. **שחזור:** אם משהו נשבר — `update-page` עם קובץ הסנאפשוט המקורי מ-`eitan-seo/snapshots/`.

## אימות הסקיל
- `test-auth` מחזיר `name`/`id` ⇒ החיבור עובד.
- אחרי `update` — לבדוק ש-`modified` התעדכן ולפתוח את ה-`link` בדפדפן.
