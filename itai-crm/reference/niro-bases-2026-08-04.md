# סריקת המערכות הקיימות — 4.8.2026

תיעוד מלא של כל מה שקיים היום ב-Airtable של NIRO. **סריקת קריאה בלבד**, אפס כתיבה.
נשלף דרך `list_bases` → `list_tables_for_base` → `get_table_schema` → `list_views_for_table`
→ `list_pages_for_base`.

השדות מועתקים מהסכימה כלשונם, כולל אי-דיוקים בשמות. **זה מקור האמת למיפויים**, לא
מה שכתוב בתיעוד ידני במקום אחר.

---

## סקירה: ארבעה בייסים

| Base ID | שם | מה זה | סטטוס |
|---|---|---|---|
| `appIokNx1jGPhws7W` | **NIRO-CRM** | ה-CRM הראשי: לידים ושיחות בוט | חי, 428+ רשומות |
| `appKMXCuAfdJCIery` | **טבלת סוכן AI -תוכן אורגני** | מטבח התוכן + תור הפרסום של מריו | חי, תרחישי Make תלויים בו |
| `applNnewF7j1MaXH1` | **NIRO — כספים וחשבונות** | מסמכים כספיים וספקים | חי, לא היה מתועד עד היום |
| `appDDFEV7j4Nh8C9i` | Untitled Base | טבלת ברירת מחדל ריקה | לא בשימוש |

> **הערה:** הבייס `appIokNx1jGPhws7W` שונה שמו ל-**NIRO-CRM**. תיעוד ישן קורא לו
> "NIRO-טופס לידים".

---

## 1. `appIokNx1jGPhws7W` — NIRO-CRM

### טבלה: לידים (`tblcgQYQ8wIDUVOi9`)
**primary:** `מספור` (`fldboKjY3qAuKQ0iu`, `autoNumber`)

| שם השדה | fieldId | type | הערות |
|---|---|---|---|
| מספור | `fldboKjY3qAuKQ0iu` | autoNumber | primary. ⛔ מחושב |
| שם מלא | `fldjv9lnFrFGKMRS9` | singleLineText | |
| `טלפון ` | `fldbQeQ0Bk4DclUZv` | phoneNumber | ⚠️ **רווח סופי בשם.** מלכודת 2 ב-`crm-build-check` |
| אימייל | `fldeI3UostIboQv9b` | email | |
| סטטוס | `fldRMjp12RCo6H7FG` | **multipleSelects** | רלוונטי / מתנדנד / לא רלוונטי. ⚠️ רב-ערכי, לא singleSelect |
| איך אפשר לעזור? | `fldv6DICnkhmWqUjS` | multilineText | |
| תקציב | `fldsj6sZgqCWpQw0O` | currency | דוחה מחרוזת (מלכודת 11) |
| מקור | `fld3PxwDhamejtgw2` | multilineText | ⚠️ טקסט חופשי, לא select. לא ניתן לקבץ לפי מקור |
| תחום העסק | `fldosVoJVycs0fMwA` | multilineText | מטופס האפיון |
| לקוח משלם | `fldoGlCvNQVYPQ7JV` | checkbox | |
| מתי נוצר | `fld0IGzTtQFJtOeHd` | createdTime | ⛔ מחושב |
| הערות | `fldmqcCVYLZyHO19T` | multilineText | |
| Record ID | `fldAp5JfErkcOZDmn` | formula | ⛔ מחושב |
| utm_source — מאיפה הגיע | `fldnCPVAYjmuuN6Ey` | singleLineText | ⚠️ מקף בשם השדה |
| utm_campaign — איזה קמפיין | `fldYgs2yi1NitqyQl` | singleLineText | |
| קישור נחיתה מלא (UTM) | `fldKxofcLjOGHPX04` | url | |
| שלב עסקה | `fld4S8go8XGO9dgZ0` | singleSelect | הפייפליין האמיתי (ראה choices) |
| חבילה | `flda2n8qH30HSd6YF` | singleSelect | ראה choices |
| סכום הקמה | `fldeY1FUyH3cChh2b` | currency | |
| ריטיינר חודשי | `fldxIgo7ZKmCWJphq` | currency | |
| חימום - שלב | `fldVfsiZ4Wo9tAgPQ` | number | 1 עד 4, מנוהל ע"י Make |
| חימום - שליחה אחרונה | `fldSTGvf5poKWSPeb` | dateTime | |
| גוף הודעה שנשלח | `fldXVZ1zpshr7posp` | multilineText | |
| אינטראקציות | `fldRD4yq1REoNfMot` | multilineText | יומן מצטבר |
| שיחות בוט | `fldy82IaYcbD1epLY` | multipleRecordLinks | → `tblQVNPNvNUAZf2l4`, סימטרי ל-`fldBdrYjAFrqGGKew` |
| מתי נוח לדבר | `fldbZvTYUYs30bE68` | singleSelect | מבוט האתר וממניצ'ט |
| דחיפות | `fldPzZFjtgrsxWrTo` | singleSelect | נקבע אוטומטית לפי תקציב |

**choices מדויקים:**
- **סטטוס** (multipleSelects): `רלוונטי` (cyanLight2) · `מתנדנד` (redLight2) · `לא רלוונטי` (grayLight2)
- **שלב עסקה:** `ליד חדש` (blueBright) · `שיחת אבחון נקבעה` (cyanBright) · `הצעה נשלחה` (yellowBright) · `נסגר - הקמה` (greenBright) · `ריטיינר פעיל` (tealBright) · `לא רלוונטי` (grayBright)
- **חבילה:** `לא מפספסים אף פנייה` · `סוכן AI לעסק` · `מערכת תפעול מלאה` · `מותאם אישית` (כולן grayLight2)
- **מתי נוח לדבר:** `בוקר` · `אחרי הצהריים` · `ערב` · `לא משנה`
- **דחיפות:** `רותח` (redBright) · `רגיל` · `לא נמסר תקציב`

**Views:** `לקוחות` (grid, `viwMQP6KcAyvlAnxJ`) · `לקוחות משלמים` (grid, `viwFgmREc2ICy0pya`)

### טבלה: שיחות בוט (`tblQVNPNvNUAZf2l4`)
זיכרון השיחות של הצ'אטבוט הרב-ערוצי. **primary:** `שם` (`fldTA6KaZhvQ9T9pA`).

| שם השדה | fieldId | type |
|---|---|---|
| שם | `fldTA6KaZhvQ9T9pA` | singleLineText (primary) |
| טלפון | `fldVUEXFeukCRdEj3` | **singleLineText** ⚠️ לא phoneNumber, בשונה מטבלת הלידים |
| אימייל | `fldi8bdVicsqL49oH` | email |
| תמליל | `fldPOeJwMilE43jIG` | multilineText |
| עסק | `fldBmiAWKYGju59Rc` | singleLineText |
| conversation_id | `fldqnmJZcbQfW6hQq` | singleLineText |
| ערוץ | `fld57dw3tgK2dW5Fv` | singleSelect: `אתר` / `אינסטגרם` / `מסנג'ר` / `וואטסאפ` |
| כאב | `fldKe4dQX9bvhZa7W` | multilineText |
| סטטוס | `fld6hB7snmm6FRYyh` | singleSelect: `בשיחה` / `הוכשר לליד` / `הועבר לניר` |
| ליד | `fldBdrYjAFrqGGKew` | multipleRecordLinks → לידים |
| עדכון אחרון | `fld0v6pCxQQ45HQkr` | dateTime |

### טבלה: התענייניות (`tblYncm59OG74d6FF`)
שדה אחד בלבד (`Name`), בלי תיאור ובלי שימוש נראה לעין. **מועמד לניקוי או להשלמה.**

**Interfaces:** אין. אין ממשק, אין טופס. הכל נצרך דרך תצוגות ה-grid.

---

## 2. `appKMXCuAfdJCIery` — טבלת סוכן AI -תוכן אורגני

### טבלה: תוכן אורגני — לאישור ופרסום (`tbly7JDCmOnY36GoJ`)
מטבח ההפקה, מנוהל ע"י בוט האישור "אסי". **primary:** `נושא` (`fldbcHE1lcZxbsf7c`).

שדות מרכזיים: `תוכן קופי - לאישור` (`fldtST8dYR8DP5lfe`, **singleLineText** ⚠️ שדה
שורה אחת לקופי מלא) · `סטטוס` (`fldRHCXAS6G9EDZ81`) · `approval_token`
(`flddMWdAUU4Oc1SS0`) · `whatsapp_message_id` (`fldafbYBuijqmW1gv`) · `RECORD_ID`
(`fld9o0kMSWTtsN16M`, formula ⛔) · שלושה צ'קבוקסים לאישור קופי/ויזואל.

**choices של סטטוס:** `מתוכנן` · `Brief מוכן` · `מאושר` · `פורסם` · `נדחה` · `נשלח לאישור`

⚠️ שמות שדות עם אי-דיוקים היסטוריים שאסור לתקן בלי לבדוק מי תלוי בהם:
`נתאר לסוכן איך לכתוב-AI סוכן`, `וזיואל נשלח לאישור` (שגיאת כתיב), `ויז'ואל - אושר`,
`תאריך היצירה(טריגר לתהליך מספר -1)`.

### טבלה: יומן פרסום (`tbloxDWRcAxlyi805`)
תור הפרסום של מריו. Make עוקב אחריה. **primary:** `נושא` (`fldxckaSjoT8S9i8Y`).

שדות: `ערוץ` (`fldFgoavCzpfN9bm0`, multipleSelects: `Facebook` / `Instagram`) ·
`קופי סופי` (`fldKnQD8hsw72sFrt`) · `ויזואל` (`fld2GXQCLmEeO2pdQ`, attachments) ·
`סטטוס` (`fldCJdhZbGydJtuzN`) · `תאריך פרסום בפועל` (`fldjRFSxlbjjQfEnN`) ·
`לינק לפוסט` (`fldJ5SMVG42UZBOv3`) · `עודכן לאחרונה` (`fldIj5WVG8a7k0bXH`,
lastModifiedTime ⛔, **טריגר של Make**) · `✅ אושר על ידי ניר` (`fldHULkGg9kQO6uTf`,
⚠️ אימוג'י בשם השדה) · `אושר בתאריך` (`fldODGpVwQp4FZZlJ`) · `telegram_message_id`
(`fldEhd4AnD5BVvugN`, דגל נגד שליחה כפולה) · `RECORD_ID` (`fldt7v7sb2nk6eWLE`, ⛔).

**Views:** `יומן פרסום -תוכן לאישור` · `תכנים מאושרים` · `ממתינים לאישור` · `View`

---

## 3. `applNnewF7j1MaXH1` — NIRO — כספים וחשבונות

**לא היה מתועד באף קובץ עד היום.** הבייס הכי נקי מבין הארבעה מבחינת מודל נתונים: שתי
טבלאות עם קשר דו-כיווני אמיתי ושדות מחושבים שעובדים.

### טבלה: מסמכים (`tblSIojcjm87FJPcZ`)
שורה אחת = PDF אחד. **primary:** `שם מסמך` (`fldl74psBzCYnb4DJ`).
שדות: סטטוס · סכום (currency) · תאריך מסמך · תאריך אחרון לתשלום · קטגוריה · סוג מסמך ·
אופן תשלום · מספר מסמך · קובץ PDF (url לדרייב) · שולח (email) · נושא המייל · טופל ·
הערות · נקלט בתאריך · **ספק** (`fldWBSFyRGqsF7Ayv`, קישור) · **חודש**
(`fldYE4ACzaL60Txin`, formula ⛔) · הועלה לרואה חשבון · תאריך העלאה לרואה חשבון.

### טבלה: ספקים (`tbldy3JfE7bpkiuzr`)
**primary:** `שם ספק` (`fldhrAccM9lhBLMNz`).
שדות: מייל שולח · קטגוריה · אופן תשלום · תדירות · פעיל · הערות · **מסמכים**
(`fldap84zN6KhsQRGt`, הקישור ההפוך) · **סה"כ שולם** (`fldfZlEwuMWz2MlNz`, rollup ⛔) ·
**מספר מסמכים** (`fldwyFlZ8HKbGVHfz`, count ⛔) · **מסמך אחרון** (`fldYBFgmv8e3U5ELZ`,
rollup ⛔) · תיקיית דרייב (`fld8lWYANTCEAYyAv`).

> **דפוס שכדאי להעתיק לבלופרינטים:** `תיקיית דרייב` הופך את המיפוי לדאטה במקום לקוד.
> ספק חדש = שורה חדשה, בלי לגעת בתרחיש Make.

---

## ממצאים שדורשים החלטה של ניר

1. **⚠️ סטטוסים כפולים ב"יומן פרסום".** שדה הסטטוס מחזיק חמישה choices עם חפיפה:
   `מאושר+פורסם`, וגם `מאושר` בנפרד, וגם `פורסם` בנפרד. ברגע שרשומה יכולה לשבת בשלושה
   מצבים שמתארים את אותו דבר, כל פילטר וכל דוח מחזירים תשובה חלקית, ותרחיש Make שמסנן
   לפי `מאושר` פשוט יפספס את מה שסומן `מאושר+פורסם`. **פתרון: מוסיפים, לא משנים שם**
   (מלכודת 7). צריך להחליט מהו הסט הנכון ולמפות את הקיים אליו.
2. **שדה `מקור` בטבלת הלידים הוא `multilineText` ולא select.** אי אפשר לקבץ, לסנן או
   לספור לפי מקור. עם 428 לידים זה אומר שאין היום תשובה אמינה לשאלה "מאיפה מגיעים
   הלידים". תיקון דורש שדה חדש, לא שינוי טיפוס (מלכודת 1).
3. **`תוכן קופי - לאישור` הוא `singleLineText`** ומיועד להחזיק קופי מלא של פוסט.
   שדה שורה אחת עובד, אבל לא מציג שורות חדשות ולא נוח לעריכה.
4. **שדה `טלפון` קיים בשני טיפוסים שונים:** `phoneNumber` בלידים (עם רווח סופי בשם)
   ו-`singleLineText` בשיחות בוט. התאמה בין השניים דורשת נרמול.
5. **טבלת `התענייניות` ריקה** משדות ומתוכן. או להשלים או להעביר לארכיון.
6. **`Untitled Base` (`appDDFEV7j4Nh8C9i`) לא בשימוש.** מועמד טבעי לשמש כבייס הסנדבוקס
   במקום ליצור חדש.
7. **אין אף Interface בשום בייס.** כל העבודה נעשית בתצוגות grid גולמיות. זו ההזדמנות
   הכי גדולה לשיפור חוויה, גם לניר וגם כשמוסרים מערכת ללקוח.
