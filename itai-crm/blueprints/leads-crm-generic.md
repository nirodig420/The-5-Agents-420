```yaml
blueprint: leads-crm-generic
version: 1.0
שפה: both
מיועד ל: כל עסק שמקבל פניות ורוצה לעקוב אחריהן מהפנייה ועד הסגירה
זמן פריסה משוער: 25 דקות (מהן 10 דקות בנייה ידנית של Views)
דורש ביצוע ידני: כל 5 ה-Views, וההרשאות
```

# בלופרינט: CRM לידים גנרי

**ברירת המחדל.** נגזר מהמערכת החיה של NIRO (`appIokNx1jGPhws7W`, 428 לידים), עם
תיקון שלושת הליקויים שהתגלו בסריקת 4.8.2026: `מקור` כ-select ולא טקסט חופשי, סטטוס
יחיד ולא רב-ערכי, ושדה טלפון בלי רווח סופי.

## 1. מטרה ומודל עסקי

המשתמשים הם בעל העסק ואיש מכירות. הפייפליין: פנייה נכנסת, מתקיימת שיחת אבחון, נשלחת
הצעה, והעסקה נסגרת או לא. נמדדים: כמה פניות בחודש, מאיזה מקור, אחוז הסגירה, וההכנסה.
הצלחה = אף פנייה לא נופלת בין הכיסאות, ויש תשובה מספרית לשאלה "מאיפה מגיעים הלקוחות".

## 2. מפת טבלאות

| טבלה (עברית) | טבלה (English) | תפקיד | primary | נפח משוער |
|---|---|---|---|---|
| לידים | Leads | הישות המרכזית. שורה = פנייה | מזהה (autoNumber) | עשרות עד אלפים |
| אינטראקציות | Interactions | יומן מגעים. שורה = שיחה או הודעה | מזהה (autoNumber) | פי 3 עד 5 מהלידים |

**למה שתי טבלאות ולא אחת:** ליד אחד מקבל הרבה מגעים. לדחוס אותם לשדה טקסט אחד עובד
עד שרוצים לדעת "כמה זמן עבר מהמגע האחרון" או "כמה מגעים עד סגירה", ואז אין נתונים.
הטבלה השנייה נותנת את שתי התשובות בחינם דרך rollup ו-count.

## 3. מפרט שדות

### טבלה: לידים / Leads

| # | שם (עברית) | שם (English) | `type` | `options` | חובה | הערות |
|---|---|---|---|---|---|---|
| 1 | מזהה | ID | `autoNumber` | | | **primary.** ⛔ מחושב |
| 2 | שם מלא | Full Name | `singleLineText` | | ✓ | |
| 3 | טלפון | Phone | `phoneNumber` | | ✓ | **בלי רווח בסוף השם.** מלכודת 2 |
| 4 | אימייל | Email | `email` | | | |
| 5 | שלב | Stage | `singleSelect` | ראה choices | ✓ | לב הפייפליין. עמודות ה-Kanban |
| 6 | מקור | Source | `singleSelect` | ראה choices | ✓ | **select ולא טקסט**, אחרת אין ניתוח מקורות |
| 7 | קמפיין | Campaign | `singleLineText` | | | מ-utm_campaign |
| 8 | מה הצורך | Need | `multilineText` | | | מה הלקוח ביקש, במילים שלו |
| 9 | תחום העסק | Industry | `singleLineText` | | | |
| 10 | תקציב | Budget | `currency` | `{"precision":0,"symbol":"₪"}` | | דוחה מחרוזת. מלכודת 11 |
| 11 | דחיפות | Priority | `singleSelect` | ראה choices | | מזין את View "לידים חמים" |
| 12 | סכום עסקה | Deal Value | `currency` | `{"precision":0,"symbol":"₪"}` | | ממולא בסגירה |
| 13 | תאריך סגירה | Close Date | `date` | `{"dateFormat":{"name":"iso"}}` | | |
| 14 | הערות | Notes | `multilineText` | | | |
| 15 | נוצר בתאריך | Created | `createdTime` | | | ⛔ מחושב |
| 16 | עודכן לאחרונה | Last Modified | `lastModifiedTime` | | | ⛔ מחושב. **טריגר ל-Make** |
| 17 | אינטראקציות | Interactions | `multipleRecordLinks` | → אינטראקציות | | נוצר בשלב 4 |
| 18 | מגע אחרון | Last Contact | `rollup` | `MAX(values)` על `תאריך` | | ⛔ מחושב. נוצר בשלב 6 |
| 19 | מספר מגעים | Contact Count | `count` | על `אינטראקציות` | | ⛔ מחושב. נוצר בשלב 6 |
| 20 | ימים מהמגע האחרון | Days Since Contact | `formula` | `DATETIME_DIFF(TODAY(), {מגע אחרון}, 'days')` | | ⛔ מחושב. מזין את View "נפלו בין הכיסאות" |

**choices מדויקים, בסדר הבנייה:**

- **שלב / Stage:**
  | name (he) | name (en) | color | מי מזיז לכאן |
  |---|---|---|---|
  | ליד חדש | New Lead | `blueBright` | אוטומטי, בקליטה |
  | יצרנו קשר | Contacted | `cyanBright` | איש המכירות אחרי ניסיון ראשון |
  | שיחת אבחון נקבעה | Meeting Scheduled | `yellowBright` | אחרי תיאום |
  | הצעה נשלחה | Proposal Sent | `orangeBright` | |
  | נסגר | Won | `greenBright` | ממלאים גם סכום עסקה ותאריך סגירה |
  | לא רלוונטי | Lost | `grayBright` | |

- **מקור / Source:** `אתר` (blueLight2) · `פייסבוק` (blueBright) · `אינסטגרם`
  (pinkBright) · `וואטסאפ` (greenBright) · `טלפון` (yellowLight2) · `המלצה`
  (purpleBright) · `אחר` (grayLight2)
- **דחיפות / Priority:** `רותח` (redBright) · `רגיל` (grayLight2) · `קר` (blueLight2)

### טבלה: אינטראקציות / Interactions

| # | שם (עברית) | שם (English) | `type` | `options` | הערות |
|---|---|---|---|---|---|
| 1 | מזהה | ID | `autoNumber` | | **primary.** ⛔ מחושב |
| 2 | ליד | Lead | `multipleRecordLinks` | → לידים, `prefersSingleRecordLink: true` | נוצר בשלב 4 |
| 3 | תאריך | Date | `dateTime` | `{"dateFormat":{"name":"iso"},"timeFormat":{"name":"24hour"},"timeZone":"Asia/Jerusalem"}` | |
| 4 | סוג | Type | `singleSelect` | `שיחה` · `וואטסאפ` · `מייל` · `פגישה` | |
| 5 | סיכום | Summary | `multilineText` | | מה נאמר |
| 6 | תוצאה | Outcome | `singleSelect` | `לא ענה` (grayLight2) · `דיברנו` (greenLight2) · `ביקש לחזור` (yellowLight2) | |

## 4. קשרים

| מטבלה | שדה | לטבלה | `prefersSingleRecordLink` | שם השדה הסימטרי שנוצר | שם אחרי rename |
|---|---|---|---|---|---|
| אינטראקציות | ליד / Lead | לידים | `true` | `אינטראקציות` (ברירת מחדל) | `אינטראקציות` / `Interactions` |

**חובה:** אחרי `create_field` מסוג `multipleRecordLinks`, להריץ `get_table_schema` על
טבלת הלידים כדי לראות את השם המדויק שנוצר, ולתקן אותו. מלכודת 8.

## 5. Views

כולם `[ידני]`. אין `create_view` ב-MCP (מלכודת 12).
נתיב: פתח את הטבלה → `+` ליד שמות התצוגות → בחר סוג → הגדר פילטר ומיון.

| View | סוג | פילטר | מיון / קיבוץ |
|---|---|---|---|
| **הפייפליין** (ברירת מחדל) | kanban | `שלב` is not `לא רלוונטי` | מקובץ לפי `שלב` |
| **לידים חמים** | grid | `and`: `דחיפות` is `רותח` · `שלב` is any of `ליד חדש`, `יצרנו קשר` | `נוצר בתאריך` יורד |
| **נפלו בין הכיסאות** | grid | `and`: `ימים מהמגע האחרון` > `7` · `שלב` is none of `נסגר`, `לא רלוונטי` | `ימים מהמגע האחרון` יורד |
| **נסגרו החודש** | grid | `and`: `שלב` is `נסגר` · `תאריך סגירה` is within `this month` | מקובץ לפי `מקור` |
| **לפי מקור** | grid | `שלב` is not `לא רלוונטי` | מקובץ לפי `מקור`, סיכום `סכום עסקה` |

**"נפלו בין הכיסאות" היא ה-View שמחזירה את ההשקעה בטבלה השנייה.** בלי טבלת
האינטראקציות אי אפשר לבנות אותה.

## 6. Interfaces

| Page | סוג | מקור | למי |
|---|---|---|---|
| **היום שלי** | list | לידים, פילטר View "לידים חמים" | איש המכירות. השדות הגלויים: שם, טלפון, שלב, מה הצורך, מגע אחרון. כפתור: הוסף אינטראקציה |
| **תמונת מצב** | dashboard | לידים | בעל העסק. מספרים גדולים: לידים החודש, נסגרו החודש, סה"כ סכום עסקה. תרשים: לידים לפי מקור |

## 7. אוטומציות פנימיות של Airtable

1. **ליד חדש בלי דחיפות** → כשרשומה נוצרת ו-`דחיפות` ריק, עדכן ל-`רגיל`.
2. **סגירה מסמנת תאריך** → כש-`שלב` הופך ל-`נסגר` ו-`תאריך סגירה` ריק, מלא `TODAY()`.

> **מה לא כאן ושייך לאמציה:** כל דבר שיוצא מהבייס החוצה. התראת וואטסאפ על ליד רותח,
> מייל אוטומטי, טופס האתר שיוצר את הרשומה, סנכרון ליומן, ורצף חימום.

## 8. הרשאות ושיתוף

בעל העסק: `creator` ברמת בייס. איש מכירות: `editor`, או שיתוף interface-only של
"היום שלי" בלבד אם לא צריך לראות סכומים. רואה חשבון או גורם חיצוני: interface-only.

## 9. נתוני seed

חמישה לידים שמכסים את כל השלבים (אחד בכל שלב, אחד מהם `רותח`, אחד עם מגע לפני 10 ימים
כדי לוודא ש-View "נפלו בין הכיסאות" תופס), ושמונה אינטראקציות מפוזרות ביניהם.
**למחוק אחרי הבדיקה.**

## 10. סדר פריסה

1. `list_workspaces`
2. `create_base` בשם הלקוח
3. `create_table` **לידים** עם שדות 1 עד 16 בלבד (השדה הראשון = `מזהה`, autoNumber)
4. `create_table` **אינטראקציות** עם שדות 1, 3, 4, 5, 6
5. `create_field` על אינטראקציות: `ליד` (`multipleRecordLinks` → לידים)
6. `get_table_schema` על לידים, ואיתור השדה הסימטרי שנוצר. rename ל-`אינטראקציות`
7. `create_field` על לידים: `מגע אחרון` (rollup), `מספר מגעים` (count), `ימים מהמגע האחרון` (formula)
8. Views, כל חמשת ה-`[ידני]`
9. `create_interface` + `create_page` ×2
10. `create_automation` ×2
11. seed, אימות, מחיקת seed
12. `get_table_schema` על שתי הטבלאות, diff מול הבלופרינט

## 11. צ'קליסט מסירה

`crm-build-check` (17/17) · diff סכימה · seed נמחק · מדריך הדרכה מ-`templates/` ·
רשומה ב-`client-systems.md` וב-`changelog.md`.

## 12. מילון שמות

| ישות | עברית | English |
|---|---|---|
| טבלה | לידים | Leads |
| טבלה | אינטראקציות | Interactions |
| שדה | מזהה | ID |
| שדה | שם מלא | Full Name |
| שדה | טלפון | Phone |
| שדה | אימייל | Email |
| שדה | שלב | Stage |
| שדה | מקור | Source |
| שדה | קמפיין | Campaign |
| שדה | מה הצורך | Need |
| שדה | תחום העסק | Industry |
| שדה | תקציב | Budget |
| שדה | דחיפות | Priority |
| שדה | סכום עסקה | Deal Value |
| שדה | תאריך סגירה | Close Date |
| שדה | הערות | Notes |
| שדה | נוצר בתאריך | Created |
| שדה | עודכן לאחרונה | Last Modified |
| שדה | מגע אחרון | Last Contact |
| שדה | מספר מגעים | Contact Count |
| שדה | ימים מהמגע האחרון | Days Since Contact |
| שדה | ליד | Lead |
| שדה | תאריך | Date |
| שדה | סוג | Type |
| שדה | סיכום | Summary |
| שדה | תוצאה | Outcome |
| choice (שלב) | ליד חדש | New Lead |
| choice (שלב) | יצרנו קשר | Contacted |
| choice (שלב) | שיחת אבחון נקבעה | Meeting Scheduled |
| choice (שלב) | הצעה נשלחה | Proposal Sent |
| choice (שלב) | נסגר | Won |
| choice (שלב) | לא רלוונטי | Lost |
| choice (מקור) | אתר / פייסבוק / אינסטגרם / וואטסאפ / טלפון / המלצה / אחר | Website / Facebook / Instagram / WhatsApp / Phone / Referral / Other |
| choice (דחיפות) | רותח / רגיל / קר | Hot / Normal / Cold |
| choice (סוג) | שיחה / וואטסאפ / מייל / פגישה | Call / WhatsApp / Email / Meeting |
| choice (תוצאה) | לא ענה / דיברנו / ביקש לחזור | No Answer / Spoke / Call Back |
| View | הפייפליין | Pipeline |
| View | לידים חמים | Hot Leads |
| View | נפלו בין הכיסאות | Falling Through |
| View | נסגרו החודש | Won This Month |
| View | לפי מקור | By Source |
