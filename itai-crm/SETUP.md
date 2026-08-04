# SETUP — איך מחברים את איתי (פעם אחת)

המדריך הזה הוא ל-**ניר**. הוא עונה על השאלה "אילו חיבורים איתי צריך כדי לאפיין, לבנות
ולתחזק מערכות CRM". רוב התשתית כבר קיימת: ה-Airtable MCP מחובר, וה-PAT קיים ב-`.env`.

> ⚠️ **חוק הברזל:** גם אחרי החיבור, איתי לא בונה שום דבר חי לבד. קריאה חופשית תמיד;
> כל `create_table` / `create_field` / שינוי View / Interface / אוטומציה רץ **רק אחרי
> "אשר"**, לפי מפרט ב-`Proposals/` ואחרי סקיל `crm-build-check`.

---

## 1. Airtable MCP — שכבת העבודה המרכזית ⭐

**ה-Airtable MCP כבר מחובר** (server פעיל בחשבון של ניר). בניגוד לשאר הסוכנים, לקובץ
ההגדרה של איתי אין שורת `tools:` בכוונה, וזו הדרך היחידה שהוא יורש את השרת ורואה את
Airtable בעצמו.

### מה איתי עושה בלי לשאול (קריאה בלבד)
`list_bases` · `list_tables_for_base` · `get_table_schema` · `list_records_for_table`
· `list_views_for_table` · `list_pages_for_base` · `list_records_for_page` ·
`search_records` · `list_automations` · `get_automation`.

### מה דורש "אשר" ממך
`create_base` · `create_table` · `create_field` · `update_field` · `update_table` ·
`create_interface` · `create_page` · `publish_interface` · `create_automation` ·
`update_automation` · `create_records_for_table` · `update_records_for_table`.

### מה חסום לגמרי (deny ב-`.claude/settings.local.json`)
כל חמש פעולות המחיקה: `delete_records_for_table`, `delete_table`, `delete_interface`,
`delete_page`, `delete_automation`. אלה נחסמו במכוון (עד ה-4.8.2026 `delete_records_for_table`
היה מאושר-מראש ורץ בלי שאלה, על בייס עם 428 לידים אמיתיים). מחיקה שבאמת נחוצה נעשית
על ידך ב-UI, או בהסרה זמנית ומכוונת של החסימה.

### מה ה-MCP לא יודע לעשות בכלל
- **אין `create_view`.** יש רק `list_views_for_table` לקריאה. כל View נבנה ידנית ב-UI,
  ולכן כל בלופרינט מסמן לכל View תגית `[MCP]` או `[ידני]` עם נתיב לחיצה מדויק.
- **אין `delete_base`.** בייס סנדבוקס נמחק על ידך ב-UI.
- **טיפוס שדה לא ניתן לשינוי** דרך שום קריאה. `update_field` מקבל רק שם, תיאור
  ו-`options`. טעות בטיפוס = בנייה מחדש או מיגרציה.

---

## 2. Personal Access Token (לחיבורים דרך Make)

כשצריך שאמציה יסנכרן מול הבייס דרך Make, נדרש PAT (קיים כבר, מתועד ב-`amatzia-automation/SETUP.md`):
- Airtable → Developer Hub → Personal Access Tokens.
- Scopes: `data.records:read`, `data.records:write`, `schema.bases:read`,
  `schema.bases:write`.
- נשמר ב-`.env` כ-`AIRTABLE_API_KEY`, ולפי הצורך גם `AIRTABLE_BASE_ID`.

---

## 3. מגבלות התוכנית

לפני שמבטיחים ללקוח, בודקים מה התוכנית הנוכחית מרשה: כמה בייסים, כמה רשומות לבייס,
כמה Interfaces, ומה זמין רק ב-Pro (למשל סנכרון בין בייסים, Gantt, ותקופת שחזור ארוכה).
מגבלה שנתגלתה מתועדת ב-`itai-crm/Memory/airtable-knowledge.md`.

---

## 4. גוגל שיטס ואקסל

- **Google Drive MCP מחובר** לקריאה וכתיבה של קבצים ב-Drive.
- **אקסל מקומי** נקרא ונכתב דרך סקיל `xlsx`.
- לוגיקה שנוסחה לא עושה נבנית ב-**Apps Script**, ומתועדת ב-`itai-crm/Memory/sheets-excel.md`.

---

## 5. בייס סנדבוקס — לפני כל מערכת אמיתית

כל בלופרינט חדש נפרס קודם על בייס סנדבוקס, אף פעם לא ישירות על ייצור:
1. `list_workspaces` כדי לאתר את סביבת העבודה.
2. `create_base` בשם `ZZZ-SANDBOX-איתי (למחיקה)`.
3. פריסה מלאה, `get_table_schema` ו-diff מול הבלופרינט.
4. שלוש עד חמש רשומות דמה, אימות שהמחושבים מתמלאים ושה-Views מסננים, ומחיקתן.
5. **מחיקת הבייס נשארת משימה שלך ב-UI** (אין `delete_base` ב-MCP).

אם `create_base` נכשל בגלל מגבלת תוכנית, עוצרים ומבקשים ממך בייס ריק ידני. **לא**
נופלים חזרה לבדיקה על בייס חי.

---

## 6. הבייסים החיים — קו אדום

| בייס | מה יש בו | כלל |
|---|---|---|
| `appIokNx1jGPhws7W` "NIRO-טופס לידים" | `tblcgQYQ8wIDUVOi9` לידים (428 רשומות אמיתיות), `tblQVNPNvNUAZf2l4` שיחות בוט | הוספה בלבד. אפס מחיקה, אפס שינוי טיפוס, אפס rename |
| `appKMXCuAfdJCIery` "טבלת סוכן AI - תוכן אורגני" | `tbly7JDCmOnY36GoJ`, `tbloxDWRcAxlyi805` יומן פרסום | תרחישי Make חיים תלויים בשמות השדות. rename שובר את אמציה |

לפני כל rename של שדה בבייס חי: לבדוק מי מצביע עליו, ולסמן לראובן להעביר לאמציה.
