# Reference — מבנה אתר NIRO (קוד ידני)

תיעוד המבנה האמיתי של `nirodigital.co.il` לפי קבצי הקוד שניר מסר (2026-06-10).
האתר **כתוב ידנית בקוד** (Theme PHP templates), לא נבנה ב-Elementor.

## קבצי המקור (אצל ניר במחשב)
- `C:\markting\דף הבית NIRO\קוד אתר שלי שלם.txt` → **front-page.php** (עמוד הבית, עברית, RTL). HTML+CSS+JS מלא בקובץ אחד.
- `C:\markting\דף הבית NIRO\קוד לאתר שלי באנגלית       -templat.md` → **template-en.php** (`Template Name: English Homepage`, מוקצה לדף /en/, id 462).
- `C:\markting\דף הבית NIRO\קוד דף תודה לאתר שלי.txt` → shortcode **`[niro_thank_you]`** (PHP, ב-functions.php/snippet) — מסך תודה + `fbq('track','Lead')`.

## איך האתר מורכב בפועל
- עמוד הבית נטען מ-**theme `front-page.php`** ולכן דף 417 ריק ב-REST (WordPress מתעלם מתוכן הדף ומשתמש בתבנית). זה הסביר את ה"דף ריק" באודיט.
- דפי ה-Elementor הכפולים (295/296/297/298/327/333/336) הם **שאריות ישנות** מגרסה קודמת — לא מה שרץ בפועל בבית.
- שפה: he ב-`/`, en ב-`/en/`. דף תודה דרך shortcode.

## ⚠️ ממצא קריטי — הטופס לא מחובר לכלום
ב-`front-page.php` (וגם בגרסה האנגלית) הטופס משתמש ב-`handleFormSubmit()`:
```js
function handleFormSubmit(e){ e.preventDefault();
  /* מציג "נשלח בהצלחה ✅", עושה e.target.reset() — ולא שולח לשום מקום */ }
```
אין `fetch`, אין AJAX, אין webhook, אין Airtable, אין שליחת מייל. **הטופס מזייף הצלחה
וזורק את הליד.** אין בקוד הזה שום חיבור ל-CRM/Airtable/Make. הצ'אטבוט ("מיכאלה")
משתמש באותו handler — גם הוא לא שולח.

## פרטים שמופיעים בקוד (לא סודות, אך אישיים)
- מייל: vaishenker@gmail.com · וואטסאפ: 972537142298 (he) / 972559322991 (en)
- GTM: GTM-NXRL4W23 · FB pixel `fbq` פעיל (Lead בעמוד תודה)
- לוגו/תמונות: wp-content/uploads/...

## השלכה לאופן שאיתן עורך
theme PHP **אינו נערך דרך WordPress REST API** (REST מנהל posts/pages, לא קבצי theme).
לעריכת הקוד החי צריך אחד מ: SFTP/קובץ-מנג'ר של האחסון · Appearance → Theme File Editor ·
child-theme. REST של איתן שימושי לדפים/פוסטים רגילים, לא לתבניות.
