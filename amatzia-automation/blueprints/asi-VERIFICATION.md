# אימות Blueprints מול Make MCP — 2026-06-18 (ראובן)

אומת מול ה-Make MCP של החשבון (org 7481730, team 1591144, airtable v3).

## ✅ אומת תקין
- **ולידציית סכימה** (`validate_blueprint_schema`) עברה לשני התרחישים.
- **שמות מודולי Airtable v3 אמיתיים:** `TriggerWatchRecords` (label "Watch Records"), `ActionSearchRecords` (label "Search Records"), `ActionUpdateRecords` (label "Update a Record"). כולם קיימים — אין שגיאת שם.

## ⚠️ תיקון נדרש לפני הבנייה החיה

### 1. טריגר תרחיש A — להחליף Watch Records → Search Records מתוזמן
`airtable:TriggerWatchRecords` **עוקב אחרי View וממיין לפי שדה "Created Time" / "Last Modified Time"** — הוא **לא** מסנן לפי `formula` כמו שכתוב בטיוטה. בטבלה אין שדה Created/Modified-Time, וה-MCP לא יוצר שדות מהסוג הזה.

**הפתרון המומלץ (הכי פשוט, הכל בתוך Make, בלי שדה נוסף ובלי הגדרה בצד Airtable):**
- מודול 1 של תרחיש A = **Airtable › Search Records** (`ActionSearchRecords`), והתרחיש כולו **מתוזמן** (Scheduling: כל 15 דק').
- Formula לחיפוש (שמות שדות אמיתיים, לא id): `AND({סטטוס}="נשלח לאישור", {approval_token}="")`.
- כך נשלפות רק רשומות שממתינות ושעוד לא נשלח להן מייל. ברגע שמודול ה-Update שם `approval_token`, הפולינג הבא כבר לא יתפוס אותן שוב = אנטי-כפילות מובנה.
- חיסרון: עיכוב של עד 15 דק' עד שהמייל יוצא. לאישורים — סביר לחלוטין. שדרוג עתידי לאינסטנט: Airtable Automation ("when record matches: סטטוס=נשלח לאישור") → Webhook לתרחיש A.

### 2. נקודות שעדיין לא אומתו במלואן (לאמת בעורך בזמן הבנייה)
- `google-email:ActionSendEmail` — שמות הפרמטרים (`html`/`contentType`) לאימות מול העורך; ייתכן `content`/`bodyType`.
- מבנה ה-Router + Filter (`o: "text:equal"`) — לאמת שהתנאי נתפס; בעורך בוחרים אופרטור מהרשימה.
- `gateway:WebhookRespond` — בבנייה ידנית עדיף Webhook Response **בתוך כל נתיב** של ה-Router (כפי שמצוין במדריך), לא אחרי ה-Router.
- מיפוי שדות בעברית — אם נשבר, בעורך בוחרים את השדה מהרשימה (Make ממפה ל-field id מאחורי הקלעים).

## מסקנה מעשית
שמות המודולים והסכימה תקינים, אבל בגלל אי-הוודאות בטריגר ובפרמטרי Gmail — **הדרך הבטוחה היא בנייה מודרכת בעורך Make** (סעיף החלופה הידנית ב-`asi-build-guide.md`), עם תיקון הטריגר לעיל. אחרי בנייה מוצלחת — לעשות Export ולשמור כ-Blueprint מאומת לפעם הבאה.
