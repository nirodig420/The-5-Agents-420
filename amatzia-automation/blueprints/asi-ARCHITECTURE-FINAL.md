# אסי — ארכיטקטורה סופית ונעולה (Make-מתזמר-הכל)

> **סטטוס:** ההכרעה ננעלה. אין יותר אופציות שקולות — בחרנו אחת לכל צומת ונימקנו.
> נכתב ע"י אמציה · 2026-06-22 · MVP מסלול C (לינק-אישור במייל Gmail).
> מצב בנייה: ניר בונה ידנית בעורך Make (ה-MCP קורא/מאמת בלבד, לא יוצר תרחישים).
> שום שינוי חי לא בוצע בכתיבת מסמך זה.

---

## 0 · ההכרעה בשורה אחת

**שני תרחישי Make שמחזיקים את כל ההיגיון מקצה-לקצה:**
**A (שולח)** = `Watch Records` על סטטוס "נשלח לאישור" → יצירת token → מייל Gmail עם 2 לינקים.
**B (מקבל)** = `Custom Webhook` (קיים) → אימות token+סטטוס → Update לפי decision → מייל סיום.
**הטריגר של A נעול על Watch Records** (לא Airtable-Automation-ping). ניר מוסיף ידנית שדה
**"Last Modified Time"** + **View מסונן** — הוראה מדויקת בסעיף 3.

---

## 1 · הארכיטקטורה הנבחרת + נימוק best-practice

**הבחירה: Make מחזיק את כל השרשרת. Airtable = מאגר נתונים פסיבי בלבד. Gmail = ערוץ פלט בלבד.**
שום היגיון (תנאים, ניתוב, אימות, הפעלת פרסום) לא יושב מחוץ ל-Make.

**למה זה ה-best-practice כאן (system logic):**

1. **קוהרנטיות — מוח אחד.** כל החלטה ("מי אושר? token תקין? לעדכן לאיזה סטטוס? להפעיל פרסום?")
   נמצאת בתרחישי Make. אם מחר משנים לוגיקה — נוגעים במקום אחד, לא רודפים אחרי Automation
   נסתר ב-Airtable + תרחיש ב-Make שסותרים זה את זה.
2. **Observability — לוג אחד.** כל הרצה (גם כשל) נראית ב-execution history של Make, עם ה-bundle
   המלא של כל מודול. אם ההיגיון מפוצל, חצי מהסיפור חבוי בלוג של Airtable Automations (שטחי
   ולא ניתן ל-replay). מוח אחד = stack trace אחד.
3. **Idempotency שניתן לאכוף.** אנטי-כפילות נשען על קריאת הסטטוס **הנוכחי** מ-Airtable ב-Filter
   של B. את ה-guard הזה אפשר לאכוף נקי רק כשמי שמעדכן את הסטטוס הוא גם מי שקורא אותו — Make.
4. **Error handling אמיתי.** Make נותן Error Handlers (Resume/Break/Ignore) per-module + retry.
   Airtable Automations נכשלים בשקט ואין retry מובנה ראוי. כשל פרסום חייב להיתפס ולהירשם —
   זה אפשרי רק כשהפעולה רצה ב-Make.

**מה דחיתי ולמה:** הגישה ה"רזה" — Airtable Automation שולח את המייל בעצמו, ו-Make רק קולט לחיצות.
**נדחתה.** היא חוסכת ~5 ops לאישור אבל מפצלת את הסיפור: שליחה ב-Airtable, קבלה ב-Make. נוצרים
שני לוגים, שתי נקודות תחזוקה, ואין מקום אחד לראות "מה קרה לאישור הזה". זה בדיוק מה שניר ביקש
לא לעשות. עלות הקרדיטים זניחה (מאות ops/חודש מול תקרה של 10,000) — לא שיקול מול שליטה.

---

## 2 · הכרעת הטריגר לתרחיש A: **Watch Records** (נעול)

**בחרתי: Airtable › Watch Records, trigger field = "Last Modified Time", View מסונן ל"נשלח לאישור".**
**דחיתי:** Airtable-Automation-שעושה-ping-ל-Webhook-של-A.

### למה Watch Records הוא ה-best-practice כאן

| שיקול | Watch Records (נבחר) | Airtable-Automation ping (נדחה) |
|---|---|---|
| **קוהרנטיות** | הטריגר חי **בתוך** Make — כל A במערכת אחת | ה-ping חי ב-Airtable → שוב פיצול ההיגיון בין מערכות (סותר את עקרון ניר!) |
| **למידה (ניר)** | ניר רואה את הטריגר, ה-bundle, וה-polling בעורך Make שהוא לומד | מסתיר חלק מההתנהגות ב-UI שונה של Airtable Automations |
| **Observability** | מתי נדלק + מה נשלף — הכל ב-execution log של Make | ping "יוצא" מ-Airtable בלי שניר רואה payload; debugging עיוור |
| **עמידות** | retry מובנה; אם הרצה נכשלה, Make מנסה שוב | אם ה-Automation נכשל — אין retry, האירוע נעלם בשקט |
| **מהירות תגובה** | polling 15 דק' (אישור תוכן לא דחוף לשנייה) — מספיק בעליל | "מיידי" אך מיותר; מהירות לא נדרשת כאן |
| **עלות הקמה** | חד-פעמי: שדה + View (5 דקות, ראה §3) | חד-פעמי: בניית Automation ב-Airtable + webhook |

**השורה התחתונה:** ה-ping היה "מנצח" רק אם היינו צריכים תגובה מיידית — אבל אישור תוכן לא דחוף,
ו-polling של 15 דק' מספיק. לעומת זאת ה-ping **מפר את עקרון המוח-האחד** (היגיון טריגר ב-Airtable)
בלי לקנות שום יתרון אמיתי. Watch Records שומר את כל הסיפור ב-Make. **נעול.**

החיסרון היחיד — הצורך בשדה Last Modified Time — נפתר בהוראה חד-פעמית של 5 דקות (§3).

---

## 3 · הוראה לניר — הוספת שדה "Last Modified Time" + View (חד-פעמי, ~5 דקות)

> אומת מול תיעוד Make: Watch Records **חייב** שדה Created Time או Last Modified Time כ-Trigger
> field; בלעדיו הטריגר לא עובד (זה לא formula). אנחנו מוסיפים Last Modified Time.

**א. הוספת שדה Last Modified Time:**
1. פתח את הטבלה `tbly7JDCmOnY36GoJ` ("לידים") ב-Base `appKMXCuAfdJCIery`.
2. לחץ **+** בסוף שורת הכותרות → **Add field**.
3. בחר סוג שדה **Last Modified Time** (חיפוש: "last modified").
4. בהגדרות השדה: **Fields to monitor** → בחר **"All editable fields"** (כך שכל שינוי, כולל
   שינוי הסטטוס ל"נשלח לאישור", מעדכן את החותמת ומדליק את הטריגר).
5. פורמט תאריך: כולל שעה (Include time). שמור. תן לשדה שם: `Last Modified`.

**ב. יצירת View מסונן (best-practice — לא לסנן בתוך המודול):**
1. בטבלה, צור **Grid View** חדש בשם **"אסי — לאישור"**.
2. הוסף **Filter**: `סטטוס` is **"נשלח לאישור"**.
3. (אופציונלי) **Hide fields** של שדות טכניים (`approval_token`, `whatsapp_message_id`) — נקי לעין.

**למה View ולא רק פילטר במודול:** ה-View הוא הגדרה אחת, יציבה ונראית לעין ב-Airtable. אם מחר
רוצים לשנות מה אסי "רואה" — משנים את ה-View, בלי לגעת בתרחיש. גם חוסך: Make מושך רק רשומות
ה-View, לא סורק את כל הטבלה כל polling.

---

## 4 · תרחיש A — "אסי שולח לאישור" (מודול-אחר-מודול, עורך Make)

**טריגר נעול:** Airtable › Watch Records.
**מקור הקופי:** משתמשים ב-`fldtST8dYR8DP5lfe` ("תוכן קופי - לאישור"). אם ארוך/נחתך — ניר משנה
את השדה ל-multilineText (הפיך, לא מאבד נתונים). לא חוסם בנייה.

| # | מודול | הגדרות מדויקות |
|---|---|---|
| 1 | **Airtable › Watch Records** | Connection `7155373`. Base `appKMXCuAfdJCIery`, Table `tbly7JDCmOnY36GoJ`. **View: "אסי — לאישור"**. **Trigger field: `Last Modified`** (השדה מ-§3). Label field: "נושא". **Max records: 2**. **Polling: 15 דק'.** |
| 2 | **Tools › Set variable** (`token`) | Variable name `token`, value: **`{{uuid}}`** (פונקציית Make מובנית — UUID v4 אקראי). |
| 3 | **Airtable › Update a Record** | אותו Connection/Base/Table. Record ID = **`{{1.id}}`**. שדה `approval_token` = **`{{2.token}}`**. (כותבים את ה-token לרשומה כדי ש-B יאמת מולו.) |
| 4 | **Tools › Set variable** (`approve_link`) | `https://hook.eu1.make.com/7ike4xuusfmqy6mujsqee96soxk86w54?record_id={{1.id}}&token={{2.token}}&decision=approve` |
| 5 | **Tools › Set variable** (`reject_link`) | `https://hook.eu1.make.com/7ike4xuusfmqy6mujsqee96soxk86w54?record_id={{1.id}}&token={{2.token}}&decision=reject` |
| 6 | **Gmail › Send an Email** | Connection **`7155536`**. **To:** `nirodig@gmail.com`. **Subject:** `אישור תוכן: {{1.נושא}}`. **Content type: HTML.** גוף — ראה תבנית HTML למטה. |

> **הערה:** ה-Webhook של B כבר קיים (`7ike4xuusfmqy6mujsqee96soxk86w54`), לכן אפשר למלא את
> הלינקים ב-4/5 כבר עכשיו — אין תלות בסדר בנייה. (אם בכל זאת בונים B מחדש ומקבלים URL אחר —
> מעדכנים כאן.)

**תבנית גוף המייל (HTML) למודול 6:**
```html
<div style="font-family:Arial;direction:rtl;text-align:right;max-width:600px">
  <h2>{{1.נושא}}</h2>
  <p style="white-space:pre-wrap">{{1.תוכן קופי - לאישור}}</p>
  <img src="{{1.ויזואל (קובץ)[].url}}" style="max-width:100%;border-radius:8px"/>
  <div style="margin-top:24px">
    <a href="{{4.approve_link}}" style="background:#2e7d32;color:#fff;padding:14px 28px;border-radius:6px;text-decoration:none;margin-left:12px">✅ אשר ופרסם</a>
    <a href="{{5.reject_link}}" style="background:#9e9e9e;color:#fff;padding:14px 28px;border-radius:6px;text-decoration:none">❌ דחה</a>
  </div>
</div>
```

**עלות A:** ~5-6 ops להרצה (Watch + Update + Gmail; Set Variable לרוב לא נספר מלא).

---

## 5 · תרחיש B — "אסי מקבל תשובה" (מודול-אחר-מודול, עורך Make)

**טריגר:** Custom Webhook קיים — `https://hook.eu1.make.com/7ike4xuusfmqy6mujsqee96soxk86w54`.
מקבל query params: `record_id`, `token`, `decision`.

| # | מודול | הגדרות מדויקות |
|---|---|---|
| 1 | **Webhooks › Custom Webhook** | הקיים. ודא Data structure מזהה `record_id`, `token`, `decision` (אם לא — Redetermine ושלח run דמה). |
| 2 | **Airtable › Get a Record** | Connection `7155373`, Base/Table כנ"ל. Record ID = **`{{1.record_id}}`**. שולף `סטטוס` + `approval_token` + `נושא`. |
| 3 | **Filter (אבטחה + אנטי-כפילות)** — בין 2 ל-Router | תנאי AND: (א) `{{1.token}}` **Equal** `{{2.approval_token}}` · (ב) `{{2.approval_token}}` **Exists / not empty** · (ג) `{{2.סטטוס}}` **Equal** `נשלח לאישור`. → חוסם token מזויף **וגם** לחיצה כפולה. |
| 4 | **Router** | שני נתיבים לפי `{{1.decision}}`. |
| 4-אשר | Route filter: `{{1.decision}}` = `approve` | |
| 4a | Airtable › Update a Record | Record ID `{{1.record_id}}`. שדה `סטטוס` = **בחר מרשימה חיה** את "מאושר" (אל תקודד choice ID). |
| 4b | **הפעלת פרסום — לפי בדיקת §6.2** | **ברירת מחדל נעולה (אופציה ב'):** אם 6237903 מאזין ל-Airtable על "מאושר" — **המודול הזה לא קיים**; ה-Update ב-4a כבר מפעיל אותו. אם 6237903 מתחיל ב-Webhook — HTTP POST אליו עם `{record_id}`. **דחוי לצעד הבא** (פרסום אמיתי לא ב-MVP). |
| 4c | Gmail › Send an Email | Connection `7155536`. To `nirodig@gmail.com`. Subject: `✓ אושר: {{2.נושא}}`. (ב-MVP בלי פרסום — מודיע "אושר"; סטטוס "פורסם" + 4c מלא יתווספו עם הפעלת הפרסום בצעד הבא.) |
| 4-דחה | Route filter: `{{1.decision}}` = `reject` | |
| 4d | Airtable › Update a Record | Record ID `{{1.record_id}}`. `סטטוס` = **מרשימה חיה** "נדחה". |
| 4e | Gmail › Send an Email | To `nirodig@gmail.com`. Subject: `✗ נדחה: {{2.נושא}}`. |
| 5 | **Webhooks › Webhook Response** (אחרי ה-Router, status 200) | Body HTML פשוט: `<h2 style="direction:rtl">התקבל ✓ — אפשר לסגור את החלון</h2>`. כדי שניר לא יראה דף לבן. |

**הערה על Webhook Response + Router:** אם רוצים שה-Response יחזור תמיד (גם כשהפילטר חוסם
לחיצה כפולה), אפשר למקם Webhook Response כמודול נפרד מיד אחרי הטריגר — אבל אז הוא רץ לפני
האימות. ל-MVP: Response בסוף כל נתיב Router מספיק; לחיצה כפולה שנחסמה ב-Filter פשוט לא תחזיר
עמוד (ניר רואה את העמוד מהלחיצה הראשונה — מקובל).

**עלות B:** ~5-7 ops להרצה (Webhook + Get + Filter + Router + Update + Gmail + Response).

---

## 5.1 · trade-off: record_id בלינק + token לאבטחה (נקודת ה-best-practice מול הגישה הרזה)

**מה עשינו:** הלינק נושא **גם** `record_id` (מיפוי ישיר — אין צורך ב-Search, חוסך op וקוד)
**וגם** `token` (אקראי UUID, נשמר ברשומה, מאומת ב-Filter של B).

**ה-trade-off, מפורש:**
- **record_id לבד (הגישה הרזה):** פשוט וזול — הלינק מצביע ישירות לרשומה. **אבל** record_id
  של Airtable הוא צפוי בפורמט וגלוי בכל מקום; כל מי שמשיג/מנחש URL יכול לשנות סטטוס ולהדק
  פרסום. אין שכבת אימות. זה פגיע, במיוחד כשהלינק מפעיל פרסום אמיתי בהמשך.
- **token בנוסף (הגישה שלנו):** ה-`approval_token` הוא UUID אקראי שנוצר per-record ונשמר רק
  ברשומה. ה-Filter ב-B עובר רק אם ה-token בלינק == ה-token ברשומה. URL שמנוחש בלי ה-token
  הנכון — נחסם. **עלות:** מודול Set Variable + Update אחד בתרחיש A (~1-2 ops). **תמורה:**
  אנטי-זיוף אמיתי. בנפח של ניר זו עלות אפסית מול אבטחת פעולה שמדיקה פרסום — לכן נעלנו אותה.

**מדוע record_id בלינק ולא Search לפי token בלבד:** ה-record_id נותן `Get a Record` ישיר
(O(1), מודול אחד) במקום `Search Records` שסורק. ה-token לא מחליף את ה-record_id — הוא **שכבת
אימות מעליו**. שניהם יחד = מיפוי מהיר + אבטחה. זו בדיוק הסיבה שזו ארכיטקטורה "נכונה" ולא "רזה".

**בחירת סטטוס מרשימה חיה:** בכל Update (4a/4d) בוחרים את ה-choice מהרשימה הנפתחת החיה של
Make (שנמשכת מ-Airtable), **לא** מקלידים choice ID. כך אם ניר שינה שמות/IDs של choices —
התרחיש לא נשבר על ID מקודד.

---

## 6 · טיפול בשגיאות + בדיקה

### 6.1 · התנהגות בקצוות (נעול)

| תרחיש | מה קורה | מנגנון |
|---|---|---|
| **ניר לא עונה** | הרשומה נשארת "נשלח לאישור". לא קורה כלום (בטוח). | אופציונלי בהמשך: תרחיש תזכורת אחרי 24ש. לא ב-MVP. |
| **ניר לוחץ פעמיים / Gmail עושה preview-fetch ללינק** | הלחיצה השנייה נחסמת. | Filter §5 שלב 3ג: רץ רק אם `סטטוס` עדיין "נשלח לאישור". אחרי הראשונה הסטטוס כבר "מאושר"/"נדחה" → השנייה לא עוברת. |
| **token מזויף / לינק בלי token** | נחסם, אין שינוי. | Filter §5 שלב 3א+3ב. |
| **Gmail נכשל בתרחיש A** | הרשומה נשארת "נשלח לאישור", המייל לא יצא. | **Error Handler על מודול 6 (Gmail):** הוסף handler **Resume** או התראה. מינימום: Make ירשום שגיאה ב-execution log; ה-Watch לא יסמן את הרשומה כ"טופלה" אם הוסיפו `Break`-with-retry. **המלצה:** Error Handler מסוג **Retry** (3 ניסיונות, מרווח) על Gmail — נפילת Gmail רגעית מתאוששת לבד. |
| **Update ב-Airtable נכשל (4a/4d)** | הסטטוס לא השתנה. | Error Handler **Break with retry** על מודול ה-Update. אם נכשל סופית — נרשם בלוג; ניר רואה ב-execution history. |
| **decision לא approve/reject** | אף נתיב Router לא רץ. | תקין — Router מתעלם. אופציונלי: נתיב fallback שמחזיר "פרמטר שגוי". |

### 6.2 · מה לבדוק לפני בנייה (קריאת MCP בלבד)
- **טריגר תרחיש 6237903** — webhook או Airtable-watch? קובע אם 4b קיים (אופציה ב' = ברירת מחדל).
  *זה דחוי לצעד הפרסום — לא חוסם את MVP האישור.*

### 6.3 · בדיקה עם רשומת הדמה `recjXtxuU3R9eP7vF`

1. ודא שהדמה ב-View "אסי — לאישור" (סטטוס = "נשלח לאישור").
2. **Run once** על תרחיש A → המייל מגיע ל-nirodig@gmail.com עם הקופי, הויזואל, ו-2 הכפתורים.
   - בלוג A בדוק: מודול 2 ייצר token, מודול 3 כתב אותו ל-`approval_token` ברשומה.
3. ודא שתרחיש B **פעיל (ON)** ומאזין. לחץ **"✅ אשר"** במייל.
   - בלוג B בדוק: מודול 1 קיבל `record_id`+`token`+`decision=approve`; מודול 2 שלף את הרשומה;
     ה-**Filter עבר** (token תואם + סטטוס="נשלח לאישור"); Router → נתיב approve; 4a עדכן "מאושר".
   - ב-Airtable: הסטטוס = "מאושר". במייל חזרה: "✓ אושר".
4. **בדיקת אנטי-כפילות:** לחץ "אשר" שוב על אותו לינק → בלוג B ה-**Filter חוסם** (סטטוס כבר
   "מאושר") → לא קרה כלום. ✓
5. **בדיקת דחייה:** אפס דמה ל"נשלח לאישור", Run A, לחץ **"❌ דחה"** → סטטוס "נדחה", מייל "✗ נדחה",
   שום פרסום. ✓
6. **בדיקת אבטחה:** קח את ה-approve_link, שנה את ה-`token` לערך אקראי, פתח → ה-Filter חוסם. ✓

**רק אחרי ש-6 הבדיקות עוברות מול עיני ניר — מפעילים (ON) את שני התרחישים לצמיתות.**

---

## 7 · רשימת פעולות לביצוע (אחרי "אשר")

| # | מי | פעולה | הפיך? |
|---|---|---|---|
| 1 | **ניר ידני (Airtable UI)** | הוסף שדה **Last Modified Time** (`Last Modified`, monitor=all editable). | ✅ |
| 2 | **ניר ידני (Airtable UI)** | צור View **"אסי — לאישור"** מסונן לסטטוס="נשלח לאישור". | ✅ |
| 3 | **Airtable-MCP** (ראובן) | ודא קיום `approval_token` + הוסף 2 choices לסטטוס ("נשלח לאישור", "נדחה") אם חסרים. **לא למחוק קיימים.** | ⚠️ הוספה בלבד |
| 4 | **ניר ידני (עורך Make)** | בנה **תרחיש B** לפי §5 על ה-Webhook הקיים. | ✅ |
| 5 | **ניר ידני (עורך Make)** | בנה **תרחיש A** לפי §4. | ✅ |
| 6 | **ניר** | הרץ בדיקות §6.3 (1-6) על דמה `recjXtxuU3R9eP7vF`. | ✅ |
| 7 | **ניר** | אחרי שהבדיקות עברו — הפעל (ON) את A ו-B. | ⚠️ הפעלה חיה |

**מה אסי לא עושה ב-MVP:** לא מפרסם בפועל (6237903 דחוי), לא וואטסאפ (מסלול A דחוי). אותה
ארכיטקטורה בדיוק — בעתיד מחליפים רק את ערוץ השליחה (Gmail→WhatsApp) ומוסיפים את מודול הפרסום.
