```yaml
blueprint: service-appointments-crm
version: 1.0
שפה: both
מיועד ל: עסק שירותים שנותן תורים או שירות חוזר. קליניקה, מספרה, חוגים, בית קפה עם הזמנות, חנות עם שירות
זמן פריסה משוער: 40 דקות (מהן 15 דקות בנייה ידנית של Views)
דורש ביצוע ידני: כל 6 ה-Views (כולל תצוגת Calendar), וההרשאות
```

# בלופרינט: CRM שירותים עם תורים

ההבדל מ-`leads-crm-generic`: כאן הלקוח לא נגמר בסגירה, הוא **חוזר**. המערכת מודדת
חזרתיות ולא רק המרה, ולכן היא בנויה סביב טבלת התורים ולא סביב טבלת הלקוחות.

## 1. מטרה ומודל עסקי

המשתמשים הם בעל העסק ואיש קבלה. התהליך: לקוח קובע תור, מגיע (או לא), משלם, וחוזר.
נמדדים: תפוסה, אחוז אי-הגעה, הכנסה לחודש, ומי לא חזר. הצלחה = היומן מלא, ולקוח
שנעלם מזוהה לפני שהוא נשכח.

## 2. מפת טבלאות

| טבלה (עברית) | טבלה (English) | תפקיד | primary | נפח |
|---|---|---|---|---|
| לקוחות | Clients | מי הלקוח | שם מלא | מאות |
| תורים | Appointments | שורה = תור אחד | מזהה (autoNumber) | אלפים בשנה |
| שירותים | Services | קטלוג: מה נותנים ובכמה | שם השירות | יחידות |
| אנשי צוות | Staff | מי נותן את השירות | שם | יחידות |

**למה ארבע טבלאות:** מחיר ומשך שירות שיושבים כטקסט בתוך כל תור מייצרים חוסר עקביות
ברגע שמעלים מחיר. קטלוג שירותים נפרד אומר ששינוי מחיר הוא שדה אחד. **טבלת אנשי צוות
מדלגים עליה רק אם העסק הוא איש אחד**, ואז שדה `מטפל` יורד מטבלת התורים.

## 3. מפרט שדות

### טבלה: לקוחות / Clients

| # | שם (עברית) | שם (English) | `type` | `options` | הערות |
|---|---|---|---|---|---|
| 1 | שם מלא | Full Name | `singleLineText` | | **primary** |
| 2 | טלפון | Phone | `phoneNumber` | | |
| 3 | אימייל | Email | `email` | | |
| 4 | תאריך לידה | Date of Birth | `date` | `{"dateFormat":{"name":"iso"}}` | רלוונטי לקליניקה, לא לבית קפה |
| 5 | הערות | Notes | `multilineText` | | רגישויות, העדפות |
| 6 | סטטוס | Status | `singleSelect` | `פעיל` (greenBright) · `רדום` (yellowLight2) · `לא פעיל` (grayLight2) | |
| 7 | מקור | Source | `singleSelect` | `המלצה` · `גוגל` · `סושיאל` · `עובר ושב` · `אחר` | |
| 8 | לקוח מאז | Client Since | `createdTime` | | ⛔ מחושב |
| 9 | תורים | Appointments | `multipleRecordLinks` | → תורים | שלב 5 |
| 10 | תור אחרון | Last Visit | `rollup` | `MAX(values)` על `תאריך ושעה` | ⛔ שלב 7 |
| 11 | מספר ביקורים | Visit Count | `count` | על `תורים` | ⛔ שלב 7 |
| 12 | סה"כ הכנסה | Total Revenue | `rollup` | `SUM(values)` על `מחיר בפועל` | ⛔ שלב 7 |
| 13 | ימים מהביקור האחרון | Days Since Visit | `formula` | `DATETIME_DIFF(TODAY(), {תור אחרון}, 'days')` | ⛔ שלב 7. מזין את View "לא חזרו" |

### טבלה: תורים / Appointments

| # | שם (עברית) | שם (English) | `type` | `options` | הערות |
|---|---|---|---|---|---|
| 1 | מזהה | ID | `autoNumber` | | **primary** ⛔ |
| 2 | לקוח | Client | `multipleRecordLinks` | → לקוחות, `prefersSingleRecordLink: true` | שלב 5 |
| 3 | שירות | Service | `multipleRecordLinks` | → שירותים, `prefersSingleRecordLink: true` | שלב 5 |
| 4 | מטפל | Staff | `multipleRecordLinks` | → אנשי צוות, `prefersSingleRecordLink: true` | שלב 5 |
| 5 | תאריך ושעה | Date & Time | `dateTime` | `{"dateFormat":{"name":"iso"},"timeFormat":{"name":"24hour"},"timeZone":"Asia/Jerusalem"}` | ציר ה-Calendar |
| 6 | סטטוס | Status | `singleSelect` | ראה choices | |
| 7 | מחיר בפועל | Actual Price | `currency` | `{"precision":0,"symbol":"₪"}` | מתחיל ממחיר המחירון, ניתן לשינוי |
| 8 | שולם | Paid | `checkbox` | | |
| 9 | הערות | Notes | `multilineText` | | |
| 10 | מחיר מחירון | List Price | `multipleLookupValues` | על `שירות` → `מחיר` | ⛔ שלב 7 |
| 11 | משך | Duration | `multipleLookupValues` | על `שירות` → `משך בדקות` | ⛔ שלב 7 |

**choices של סטטוס תור, בסדר הבנייה:**
`נקבע` (blueBright) · `אושר` (cyanBright) · `הגיע` (greenBright) ·
`לא הגיע` (redBright) · `בוטל` (grayBright)

> `לא הגיע` הוא choice נפרד מ-`בוטל` בכוונה. ביטול מראש הוא לא אותו דבר כמו no-show,
> וההפרדה הזאת היא כל מה שמאפשר למדוד אחוז אי-הגעה.

### טבלה: שירותים / Services

| # | שם (עברית) | שם (English) | `type` | `options` |
|---|---|---|---|---|
| 1 | שם השירות | Service Name | `singleLineText` | **primary** |
| 2 | מחיר | Price | `currency` | `{"precision":0,"symbol":"₪"}` |
| 3 | משך בדקות | Duration (min) | `number` | `{"precision":0}` |
| 4 | קטגוריה | Category | `singleSelect` | לפי העסק |
| 5 | פעיל | Active | `checkbox` | |
| 6 | תורים | Appointments | `multipleRecordLinks` | → תורים (סימטרי, שלב 5) |

### טבלה: אנשי צוות / Staff

| # | שם (עברית) | שם (English) | `type` | `options` |
|---|---|---|---|---|
| 1 | שם | Name | `singleLineText` | **primary** |
| 2 | תפקיד | Role | `singleLineText` | |
| 3 | טלפון | Phone | `phoneNumber` | |
| 4 | פעיל | Active | `checkbox` | |
| 5 | תורים | Appointments | `multipleRecordLinks` | → תורים (סימטרי, שלב 5) |

## 4. קשרים

| מטבלה | שדה | לטבלה | `prefersSingleRecordLink` | שם סימטרי שנוצר | אחרי rename |
|---|---|---|---|---|---|
| תורים | לקוח | לקוחות | `true` | ברירת מחדל | `תורים` / `Appointments` |
| תורים | שירות | שירותים | `true` | ברירת מחדל | `תורים` / `Appointments` |
| תורים | מטפל | אנשי צוות | `true` | ברירת מחדל | `תורים` / `Appointments` |

**שלושה שדות סימטריים נוצרים כאן.** לבדוק את כולם ב-`get_table_schema` ולתקן שמות
לפני שממשיכים ל-lookup, אחרת ה-lookup מצביע על שדה בשם לא צפוי.

## 5. Views

כולם `[ידני]`.

| View | סוג | פילטר | מיון / קיבוץ |
|---|---|---|---|
| **היומן** (ברירת מחדל, בטבלת תורים) | calendar | `סטטוס` is none of `בוטל` | על `תאריך ושעה` |
| **היום** | grid | `and`: `תאריך ושעה` is `today` · `סטטוס` is none of `בוטל` | `תאריך ושעה` עולה |
| **ממתינים לאישור** | grid | `סטטוס` is `נקבע` | `תאריך ושעה` עולה |
| **חובות** | grid | `and`: `סטטוס` is `הגיע` · `שולם` is unchecked | `תאריך ושעה` עולה |
| **לא הגיעו** | grid | `סטטוס` is `לא הגיע` | מקובץ לפי `לקוח` |
| **לא חזרו** (בטבלת לקוחות) | grid | `and`: `ימים מהביקור האחרון` > `60` · `סטטוס` is `פעיל` | `ימים מהביקור האחרון` יורד |

**"לא חזרו" היא ה-View שמחזירה כסף.** לקוח שהיה מרוצה ופשוט נשכח הוא הלקוח הזול ביותר
להחזיר.

## 6. Interfaces

| Page | סוג | מקור | למי |
|---|---|---|---|
| **היום** | list | תורים, View "היום" | איש הקבלה. שדות: שעה, לקוח, שירות, מטפל, שולם. כפתור: סמן הגיע |
| **תמונת מצב** | dashboard | תורים | בעל העסק. מספרים: תורים החודש, אחוז אי-הגעה, הכנסה החודש, חובות פתוחים |

## 7. אוטומציות פנימיות של Airtable

1. **תור חדש מקבל את מחיר המחירון** → כשרשומה נוצרת ו-`מחיר בפועל` ריק, העתק מ-`מחיר מחירון`.
2. **הגיע ושילם מעדכן סטטוס לקוח** → כש-`סטטוס` הופך ל-`הגיע`, עדכן את הלקוח ל-`פעיל`.

> **מה לא כאן ושייך לאמציה:** תזכורת וואטסאפ יום לפני התור, סנכרון לגוגל קלנדר, טופס
> קביעת תור עצמאי, בוט שקובע תורים, וחשבונית אוטומטית.

## 8. הרשאות ושיתוף

בעל העסק: `creator`. איש קבלה: `editor` על תורים ולקוחות. מטפל: interface-only של
"היום" מסונן למטפל עצמו. שירותים ואנשי צוות: עריכה לבעל העסק בלבד, כי שינוי מחיר
משפיע על כל תור עתידי.

## 9. נתוני seed

שלושה שירותים, שני אנשי צוות, ארבעה לקוחות, ושמונה תורים: שניים היום, אחד `לא הגיע`,
אחד `הגיע` ולא שולם (לבדיקת View "חובות"), ואחד ללקוח שביקורו האחרון לפני 70 יום
(לבדיקת View "לא חזרו"). **למחוק אחרי הבדיקה.**

## 10. סדר פריסה

1. `list_workspaces` · 2. `create_base`
3. `create_table` **שירותים** ו-**אנשי צוות** (שדות בסיס, בלי הקישורים)
4. `create_table` **לקוחות** (שדות 1 עד 8) ו-**תורים** (שדות 1, 5 עד 9)
5. `create_field` על תורים: `לקוח`, `שירות`, `מטפל` (שלושה `multipleRecordLinks`)
6. `get_table_schema` על שלוש הטבלאות, ו-rename לשלושת השדות הסימטריים
7. `create_field` למחושבים: על תורים `מחיר מחירון` ו-`משך` (lookup); על לקוחות
   `תור אחרון`, `מספר ביקורים`, `סה"כ הכנסה`, `ימים מהביקור האחרון`
8. Views (6, ידני) · 9. Interfaces · 10. אוטומציות · 11. seed ומחיקתו
12. `get_table_schema` על ארבע הטבלאות, diff מול הבלופרינט

## 11. צ'קליסט מסירה

`crm-build-check` (17/17) · diff סכימה · seed נמחק · מדריך הדרכה · רשומה
ב-`client-systems.md` וב-`changelog.md`.

## 12. מילון שמות

| ישות | עברית | English |
|---|---|---|
| טבלה | לקוחות / תורים / שירותים / אנשי צוות | Clients / Appointments / Services / Staff |
| שדה | שם מלא / טלפון / אימייל / תאריך לידה / הערות | Full Name / Phone / Email / Date of Birth / Notes |
| שדה | סטטוס / מקור / לקוח מאז | Status / Source / Client Since |
| שדה | תור אחרון / מספר ביקורים / סה"כ הכנסה / ימים מהביקור האחרון | Last Visit / Visit Count / Total Revenue / Days Since Visit |
| שדה | לקוח / שירות / מטפל / תאריך ושעה | Client / Service / Staff / Date & Time |
| שדה | מחיר בפועל / שולם / מחיר מחירון / משך | Actual Price / Paid / List Price / Duration |
| שדה | שם השירות / מחיר / משך בדקות / קטגוריה / פעיל | Service Name / Price / Duration (min) / Category / Active |
| שדה | שם / תפקיד | Name / Role |
| choice (סטטוס תור) | נקבע / אושר / הגיע / לא הגיע / בוטל | Scheduled / Confirmed / Attended / No Show / Cancelled |
| choice (סטטוס לקוח) | פעיל / רדום / לא פעיל | Active / Dormant / Inactive |
| choice (מקור) | המלצה / גוגל / סושיאל / עובר ושב / אחר | Referral / Google / Social / Walk-in / Other |
| View | היומן / היום / ממתינים לאישור / חובות / לא הגיעו / לא חזרו | Calendar / Today / Pending / Unpaid / No Shows / Lapsed |
