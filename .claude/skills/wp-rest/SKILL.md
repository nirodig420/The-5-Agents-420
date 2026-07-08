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

### 6) verify-page — אימות חוסם אחרי עדכון (Definition of Done ⛔)
**עדכון לא נחשב "הצליח" עד שהאימות הזה עובר.** זו לולאת האימות שמונעת "הצלחה מזויפת"
(ה-API מחזיר 200 אבל השינוי לא חי בפועל — למשל Elementor/קאש דרסו אותו). מריצים **מיד
אחרי כל `update`**, עם `$marker` = מחרוזת ייחודית שהכנסת בעריכה (משפט/מזהה שלא קיים בגרסה הישנה).

```powershell
$id = 123
$marker = 'ONE-UNIQUE-STRING-FROM-YOUR-EDIT'   # מחרוזת ייחודית מהשינוי
$ok = $true

# בדיקה 1 — API: התוכן הגולמי באמת מכיל את השינוי
$after = Invoke-RestMethod -Uri "$WP_API/pages/$id`?context=edit" -Headers $WP_HEAD
if ($after.content.raw -notmatch [regex]::Escape($marker)) {
  $ok = $false; "❌ API: המרקר לא נמצא ב-content.raw — העדכון לא נשמר (Elementor?)"
} else { "✅ API: המרקר נמצא בתוכן הגולמי" }

# בדיקה 2 — Rendered: הדף החי בפועל (front-end) מכיל את השינוי + מחזיר 200
try {
  $live = Invoke-WebRequest -Uri $after.link -UseBasicParsing -TimeoutSec 30
  if ($live.StatusCode -ne 200) { $ok = $false; "❌ Rendered: סטטוס $($live.StatusCode)" }
  elseif ($live.Content -notmatch [regex]::Escape($marker)) {
    $ok = $false; "❌ Rendered: 200 אבל המרקר לא מופיע בדף החי (קאש/Elementor דורס)"
  } else { "✅ Rendered: הדף החי מכיל את השינוי (200)" }
} catch { $ok = $false; "❌ Rendered: הדף לא נטען — $($_.Exception.Message)" }

if ($ok) { "✅✅ DONE — השינוי חי ומאומת. אפשר לדווח לניר." }
else { "⛔ NOT DONE — אל תדווח 'הצליח'. שחזר מהסנאפשוט (פעולה 5) ובדוק Elementor/קאש." }
```

> **⚠️ נוכחות ב-HTML ≠ תקינות פונקציונלית.** לאלמנט אינטראקטיבי (טופס לידים, כפתור, טרקינג)
> HTML נכון לא מספיק — צריך **בדיקת קצה-לקצה אמיתית**: שליחת ליד-בדיקה ווידוא שהוא **הגיע
> ליעד** (Airtable/Make/מייל). זה בדיוק הכשל של הטופס ש"זייף הצלחה". טופס לא "עובד" עד
> שליד-בדיקה נחת בצד השני.

## פרוטוקול בטיחות (חובה)

1. **תמיד `test-auth` לפני הכל.** בלי 200 — לא ממשיכים.
2. **תמיד `get-page` (שמירת סנאפשוט) לפני כל `update`.** אין עריכה בלי גיבוי.
3. **אף פעם לא לגעת בדף קריטי (משפך הלידים) ראשון.** קודם בדיקת כתיבה על דף טיוטה.
4. **דף Elementor → לעצור ולשאול את ניר**, לא לדרוס `content`.
5. **שחזור:** אם משהו נשבר — `update-page` עם קובץ הסנאפשוט המקורי מ-`eitan-seo/snapshots/`.

## אימות הסקיל (Definition of Done — לולאה חוסמת)
עקרון: **קודד "איך נראה טוב" כבדיקה דטרמיניסטית, אל תסמוך על עין.** עבודה = לולאה:
עורך → מריץ `verify-page` (פעולה 6) → אם נכשל, מתקן/משחזר וחוזר → רק כשעובר, מדווח לניר.

- `test-auth` מחזיר `name`/`id` ⇒ החיבור עובד.
- אחרי כל `update` — **חובה** להריץ `verify-page` (פעולה 6). בלי ✅✅ DONE, **אסור לומר
  "הצליח"** — מדווחים "לא אומת" + הסיבה, ומשחזרים מסנאפשוט אם צריך.
- אלמנט פונקציונלי (טופס/כפתור) — לא "עובד" עד **בדיקת קצה-לקצה** שהתוצאה נחתה ביעד.
