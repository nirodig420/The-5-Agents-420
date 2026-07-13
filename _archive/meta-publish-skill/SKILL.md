---
name: meta-publish
description: >-
  מעטפת ל-Meta Graph API + Marketing API לפרסום פוסטים ולמשיכת נתוני קמפיינים
  ב-Facebook/Instagram של NIRO Digital. קורא טוקני META_* מ-.env. ⚠️ Phase 2 /
  אופציונלי — ברירת המחדל היא לעבוד דרך Make (ראה mario-meta/SETUP.md). השתמש בסקיל הזה
  רק אם ניר בחר במסלול ה-API הגולמי וכבר מילא את META_* ב-.env.
---

# meta-publish — מעטפת Meta Graph + Marketing API

> ⚠️ **Phase 2 / אופציונלי.** שכבת הביצוע המומלצת של מריו היא **Make.com** (החיבור כבר
> קיים — ראה `mario-meta/SETUP.md`). הסקיל הזה נחוץ רק אם ניר בחר במסלול ה-API הגולמי.
> **חוק הברזל נשאר:** פרסום רק אחרי "אשר"; כל פעולה שכרוכה בכסף = אישור ידני נפרד.

## דרישות מקדימות
`.env` מלא לפי מסלול B ב-`mario-meta/SETUP.md`:
`META_ACCESS_TOKEN`, `META_PAGE_ID`, `INSTAGRAM_BUSINESS_ACCOUNT_ID`, `META_AD_ACCOUNT_ID`.

## אתחול (PowerShell — Windows)
```powershell
$TOKEN = ((Get-Content .env | Where-Object { $_ -match '^META_ACCESS_TOKEN=' }) -replace '^META_ACCESS_TOKEN=','').Trim()
$PAGE  = ((Get-Content .env | Where-Object { $_ -match '^META_PAGE_ID=' })      -replace '^META_PAGE_ID=','').Trim()
$IGID  = ((Get-Content .env | Where-Object { $_ -match '^INSTAGRAM_BUSINESS_ACCOUNT_ID=' }) -replace '^INSTAGRAM_BUSINESS_ACCOUNT_ID=','').Trim()
$ACT   = ((Get-Content .env | Where-Object { $_ -match '^META_AD_ACCOUNT_ID=' }) -replace '^META_AD_ACCOUNT_ID=','').Trim()
$GRAPH = "https://graph.facebook.com/v21.0"
```

## פעולות

### test-auth — אימות טוקן
```powershell
Invoke-RestMethod -Uri "$GRAPH/me?access_token=$TOKEN" -Method Get
```
מחזיר את שם/ID של המשתמש או הדף אם הטוקן תקין.

### list-posts — פוסטים אחרונים בדף
```powershell
Invoke-RestMethod -Uri "$GRAPH/$PAGE/posts?access_token=$TOKEN" -Method Get
```

### create-post — פרסום פוסט טקסט לדף (אחרי "אשר" בלבד)
```powershell
$body = @{ message = "<תוכן הפוסט>"; access_token = $TOKEN }
Invoke-RestMethod -Uri "$GRAPH/$PAGE/feed" -Method Post -Body $body
```
לפוסט עם תמונה: העלאה ל-`/$PAGE/photos` עם `url` או קובץ.

### create-post (Instagram) — דו-שלבי
```powershell
# 1) יצירת media container
$c = Invoke-RestMethod -Uri "$GRAPH/$IGID/media" -Method Post -Body @{ image_url="<URL>"; caption="<קאפשן>"; access_token=$TOKEN }
# 2) פרסום
Invoke-RestMethod -Uri "$GRAPH/$IGID/media_publish" -Method Post -Body @{ creation_id=$c.id; access_token=$TOKEN }
```

### ads-insights — משיכת נתוני קמפיין (קריאה בלבד)
```powershell
$fields = "campaign_name,impressions,clicks,ctr,cpc,cpm,spend,actions"
Invoke-RestMethod -Uri "$GRAPH/$ACT/insights?fields=$fields&date_preset=last_7d&access_token=$TOKEN" -Method Get
```

## ⚠️ פעולות שכרוכות בכסף — אישור ידני בלבד
הפעלת קמפיין, שינוי תקציב (`daily_budget`/`lifetime_budget`), שינוי סטטוס מודעה
(`status=ACTIVE/PAUSED`) — **לא מבוצעות אוטומטית**. מריו מכין את הקריאה המדויקת
כהצעה, וניר מאשר ידנית כל פעם. אין יוצא מן הכלל לכסף.

## הערות
- גרסת Graph API: עדכן את `v21.0` אם מטא משחררת גרסה חדשה.
- טוקנים פגים — אם `test-auth` נכשל ב-190/OAuth, צריך לרענן את הטוקן (ראה `mario-meta/SETUP.md`).
- ברירת המחדל לפרסום היא Make; השתמש בסקיל הזה רק במסלול B.
