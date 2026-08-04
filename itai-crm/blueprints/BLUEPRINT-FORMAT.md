# פורמט הבלופרינט — מבנה מחייב

בלופרינט הוא **קובץ MD אחד לתבנית**, ובו כל מה שצריך כדי לפרוס מערכת ללקוח חדש דרך
ה-MCP **בלי ניחוש אחד**. מבחן העשן: אפשר לפרוס את הבלופרינט בלי לפתוח שום קובץ אחר.
כל רגע שנדרש בו ניחוש (טיפוס שדה, צבע choice, שם שדה סימטרי, אופרטור פילטר) הוא חור
בבלופרינט שחוזרים לסתום.

שם קובץ: `<domain>-crm[-<variant>].md`. עדכון מהותי מעלה `version` ומקבל שורה
ב-`itai-crm/Memory/changelog.md`.

---

## 0. בלוק כותרת

```yaml
blueprint: leads-crm-generic
version: 1.0
שפה: he | en | both
מיועד ל: <סוג עסק>
זמן פריסה משוער: <דקות>
דורש ביצוע ידני: <רשימת Views / הגדרות שה-MCP לא יודע לבנות>
```

## 1. מטרה ומודל עסקי

חמש שורות לכל היותר: מי המשתמשים, איך נראה הפייפליין, ומה מגדיר הצלחה במערכת הזאת.

## 2. מפת טבלאות

| טבלה (עברית) | טבלה (English) | תפקיד | primary field | נפח משוער |
|---|---|---|---|---|

## 3. מפרט שדות — הליבה

טבלה נפרדת לכל טבלת Airtable. העמודות ממופות אחת-לאחת לארגומנטים של `create_field`:

| # | שם (עברית) | שם (English) | `type` | `options` | חובה | primary | הערות |
|---|---|---|---|---|---|---|---|

**חוקים מחייבים:**

- `type` הוא **המחרוזת המדויקת של ה-API בלבד**, מתוך הרשימה הזאת:
  `singleLineText`, `multilineText`, `richText`, `email`, `url`, `phoneNumber`,
  `number`, `currency`, `percent`, `duration`, `rating`, `checkbox`, `singleSelect`,
  `multipleSelects`, `date`, `dateTime`, `createdTime`, `lastModifiedTime`,
  `createdBy`, `lastModifiedBy`, `autoNumber`, `barcode`, `formula`, `rollup`,
  `count`, `multipleLookupValues`, `multipleRecordLinks`, `multipleAttachments`,
  `multipleCollaborators`, `singleCollaborator`, `button`, `aiText`.
- **`singleSelect` / `multipleSelects`:** רשימת `choices` **מלאה**, עם `name` מדויק
  ו-`color`, **בסדר הבנייה** (choices נוספים תמיד בסוף). לכל choice: מה המשמעות
  העסקית שלו ומי מזיז אליו את הרשומה.
- **`number` / `currency` / `percent`:** `precision`, ולמטבע גם `symbol`.
- **`date` / `dateTime`:** `dateFormat.name`, ולשעה גם `timeZone` ו-`timeFormat`.
- **שדות מחושבים** (`formula`, `rollup`, `count`, `multipleLookupValues`) מסומנים
  **⛔ מחושב, לא כותבים אליו (422)**, עם נוסח הנוסחה המלא, ונוצרים **אחרי** מקורותיהם.
- **השורה הראשונה בכל טבלה היא ה-primary** ומסומנת ככזאת. primary לא יכול להיות
  קישור, קובץ מצורף, צ'קבוקס או rollup.

## 4. קשרים (Linked Records)

| מטבלה | שדה | לטבלה | `prefersSingleRecordLink` | שם השדה הסימטרי שנוצר | שם אחרי rename |
|---|---|---|---|---|---|

השדה הסימטרי **חייב** להופיע. Airtable יוצר אותו לבד בשם ברירת מחדל, ובלי התיעוד הזה
המפרט לא תואם למה שקיים בפועל אחרי הפריסה.

## 5. Views

לכל View:

- **שם** (עברית / English) ו-**סוג**: grid / kanban / calendar / gallery / timeline / form.
- **פילטר:** `conjunction` (`and` / `or`) ורשימת תנאים `{שדה, אופרטור, ערך}`, בניסוח
  המדויק של Airtable.
- **מיון:** `{שדה, כיוון}`. **קיבוץ:** לפי איזה שדה. **שדות מוסתרים.** **צביעת שורות.**
- **תגית `[MCP]` או `[ידני]`**, ולידנית גם נתיב לחיצה מדויק. אין `create_view` ב-MCP,
  ולכן בפועל כמעט כל View הוא `[ידני]`.

## 6. Interfaces

לכל page: הסוג (מתוך `describe_page_type`), טבלת המקור, הפילטרים, אילו שדות מוצגים
ב-record detail, אילו כפתורים, ו**למי הדף מיועד** (ניר / הלקוח / עובד).

## 7. אוטומציות פנימיות של Airtable

טריגר ופעולות במונחי `create_automation`. ובסוף, סעיף מפורש:

> **מה לא כאן ושייך לאמציה:** כל דבר שיוצא מהבייס החוצה. וואטסאפ, מייל, Make, API
> חיצוני, וובהוקים.

## 8. הרשאות ושיתוף

collaborators ברמת בייס, שיתוף interface-only ללקוח, ומה הלקוח רואה ומה לא.

## 9. נתוני seed

שלוש עד חמש רשומות דמה לכל טבלה לבדיקת עשן, **והוראת מחיקה מפורשת אחרי הבדיקה**.

## 10. סדר פריסה

רשימה ממוספרת של קריאות MCP, בסדר הזה בדיוק:

1. `list_workspaces`
2. `create_base`
3. `create_table` לכל טבלה, **עם שדות הבסיס בלבד**, כשהשדה הראשון הוא ה-primary
4. `create_field` לשדות הקישור
5. rename לשדות הסימטריים שנוצרו אוטומטית
6. `create_field` ל-lookup / rollup / count / formula
7. Views (`[MCP]` או `[ידני]`)
8. `create_interface` ו-`create_page`
9. `create_automation`
10. seed
11. `get_table_schema` לאימות

## 11. צ'קליסט מסירה

`crm-build-check` עבר · diff סכימה מול הבלופרינט · seed נמחק · מדריך הדרכה נמסר מתוך
`itai-crm/templates/` · רשומה ב-`client-systems.md` וב-`changelog.md`.

## 12. מילון שמות עברית ו-English

טבלה אחת שממפה **כל** שם טבלה, שדה, View ו-choice בשתי השפות. פריסה בשפה השנייה היא
החלפת עמודה אחת, בלי לתחזק שני קבצים לכל תבנית.

| ישות | עברית | English |
|---|---|---|
