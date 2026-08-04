# itai-setup — חיבורי איתי

**קובץ:** `itai-crm/SETUP.md`
**קהל:** ניר (מדריך הקמה חד-פעמי).

## מה זה
מה איתי צריך כדי לאפיין, לבנות ולתחזק מערכות CRM. רוב התשתית כבר קיימת: ה-Airtable
MCP מחובר וה-PAT ב-`.env`.

## עיקרי הקובץ
- **Airtable MCP** — מה איתי קורא בלי לשאול (list/get/search), מה דורש "אשר" (create/update), ומה חסום לגמרי.
- **מה ה-MCP לא יודע:** אין `create_view` (כל View נבנה ידנית ב-UI), אין `delete_base`, וטיפוס שדה לא ניתן לשינוי דרך שום קריאה.
- **PAT** — scopes `data.records:read/write`, `schema.bases:read/write`, ב-`.env`.
- **מגבלות תוכנית** — נבדקות לפני שמבטיחים ללקוח.
- **שיטס ואקסל** — Drive MCP + סקיל `xlsx`, ו-Apps Script ללוגיקה שנוסחה לא עושה.
- **בייס סנדבוקס** — כל בלופרינט נפרס עליו קודם. מחיקת הבייס נשארת משימה ידנית לניר.
- **הבייסים החיים** — `appIokNx1jGPhws7W` (לידים חיים) ו-`appKMXCuAfdJCIery`: הוספה בלבד, ו-rename שובר את אמציה.

## קשור
- [[Itai (CRM Architect)/_index]]
- [[agent-itai]]
- [[skill-crm-build-check]]
- [[env-config]] — `AIRTABLE_API_KEY` / `AIRTABLE_BASE_ID`.
