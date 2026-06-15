# הצעה: חיבור טופס האתר ל-Airtable דרך Make

**תאריך:** 2026-06-11 · **מגיש:** איתן · **סטטוס:** ממתין לאישור ניר

## מה
לחבר את טופס יצירת הקשר באתר (עמוד הבית + הצ'אטבוט "מיכאלה") כך שכל ליד ייכתב
אוטומטית ל-Airtable דרך Make, ויפנה לעמוד התודה (שמפעיל את פיקסל ה-Lead).

## למה
הטופס הנוכחי **מזייף "נשלח בהצלחה" וזורק את הליד** (`handleFormSubmit` בלי שליחה).
ניר אישר שלידים לא מגיעים — דליפת לידים פעילה. צריך לחבר אותו ליעד אמיתי.

## מה כבר קיים אצל ניר ב-Make (ממצאי MCP)
- ✅ **Airtable מחובר** — חשבון "NIRO-פתרונות אוטומציה" (connection id 7155373).
- ✅ **טבלת יעד קיימת:** base `appIokNx1jGPhws7W` ("NIRO-טופס לידים"), table `tblcgQYQ8wIDUVOi9` ("לידים").
- ✅ **webhook ריק ומוכן:** "נתוני לקוחות" → `MAKE_WEBHOOK_URL` ב-.env (לא מחובר עדיין לתרחיש).
- ✅ **תרחיש לידים קיים (כבוי)** `5578971`: Fillout→AI→Airtable→מיילים — מקור למיפוי השדות והלוגיקה.

## מיפוי שדות (טופס האתר → Airtable)
| שדה בטופס | שדה Airtable (id) | תווית |
|---|---|---|
| client_name | fldboKjY3qAuKQ0iu | שם מלא |
| client_email | fldeI3UostIboQv9b | אימייל |
| client_phone | fldbQeQ0Bk4DclUZv | טלפון *(התרחיש הישן לא מילא — אנחנו כן)* |
| client_message | fldv6DICnkhmWqUjS | איך אפשר לעזור? |
| selected_service / מקור | fld3PxwDhamejtgw2 | מקור |
| (תקציב — אין בטופס האתר) | fldsj6sZgqCWpQw0O | תקציב |

## הצעת ביצוע (3 שלבים)
**1. תרחיש Make:** `Webhook ("נתוני לקוחות") → Airtable: Create a Record` (base/table/שדות לעיל,
connection 7155373). שלב 2 (אופציונלי, בהמשך): להוסיף מייל התראה לניר + מייל AI ללקוח,
בשכפול מהתרחיש הקיים 5578971.

**2. תיקון קוד הטופס** (`front-page.php` + `template-en.php`) — להחליף את `handleFormSubmit`:
```js
function handleFormSubmit(e){
  e.preventDefault();
  const f=e.target, btn=f.querySelector('button');
  btn.innerText="שולח..."; btn.disabled=true;
  const data={ client_name:f.client_name?.value||'', client_phone:f.client_phone?.value||'',
    client_email:f.client_email?.value||'', client_message:f.client_message?.value||'',
    selected_service:f.selected_service?.value||'', source:'אתר - '+location.pathname };
  fetch('<MAKE_WEBHOOK_URL>',{method:'POST',headers:{'Content-Type':'application/json'},
    body:JSON.stringify(data)})
    .then(()=>{ window.location.href='/niro_thank-you/'; })
    .catch(()=>{ btn.innerText="שגיאה, נסו שוב"; btn.disabled=false; });
  return false;
}
```
(שליחה אמיתית → הפניה לעמוד תודה אמיתי → פיקסל Lead אמיתי. ניר מדביק בעורך הקבצים.)

**3. בדיקה:** מילוי טופס בדיקה → לוודא רשומה ב-Airtable → רשומת test לוג.

## השפעה צפויה
עצירת אובדן הלידים → כל פנייה מהאתר נכנסת ל-CRM. בסיס לאוטומציות המשך (מייל/וואטסאפ/AI).

## להחלטת ניר
- אישור הגישה (webhook קיים → תרחיש Webhook→Airtable).
- **מי בונה את התרחיש ב-Make:** המערכת (דרך ה-MCP) — או הדרכה ללחיצות שלך?
