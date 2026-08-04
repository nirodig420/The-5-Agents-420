# EDITS - החלפת פונט: Heebo החוצה, Frank Ruhl Libre + IBM Plex Sans Hebrew פנימה

**תאריך:** 2026-08-03 | **מבצע:** איתן
**גרסה 2** (אחרי אישור ניר: הנראות אושרה, ומשקל 600 יורד)
**סטטוס:** לא בוצע שום שינוי חי.

> זהו מסמך האמת של המהלך. כל שינוי מופיע כאן עם מספר שורה, המחרוזת המדויקת לפני,
> והמחרוזת המדויקת אחרי.

---

## 0. אזהרת דריפט - קראו את זה קודם

**הסנאפשוטים המקומיים מ-2026-07-06 כבר לא תואמים לאתר החי. הפער עצום.**

| מדד | סנאפשוט 2026-07-06 | האתר החי 2026-08-03 |
|---|---|---|
| `front-page.php` (עברית) | 853 שורות, 51,646 בייט | **2,061 שורות, 155,223 בייט** |
| `template-en.php` (אנגלית) | 841 שורות, 47,433 בייט | **1,855 שורות, 124,799 בייט** |
| מקטעי שינוי בהשוואה | | **121 מקטעים בעברית, דומה באנגלית** |

דוגמה קונקרטית: משתני ה-CSS `--auto` ו-`--auto-deep` (סגול האוטומציה) קיימים באתר החי
ולא קיימים בסנאפשוט בכלל. גם סקשן `claude-sec` וגם `tech-chip` נוספו אחרי הסנאפשוט.

**המסקנה המבצעית: אסור להעלות קובץ מלא שנבנה מהסנאפשוט.** העלאה כזו תמחק כחודש של
עבודה. לכן החבילה הזאת **לא מכילה** `front-page.php` ו-`template-en.php` מוכנים.
במקומם יש כאן רשימת החלפות כירורגיות, ובקובץ `INSTRUCTIONS.md` יש מסלול בטוח יותר
(הורדה, תיקון אצלי, העלאה) שמומלץ להעדיף.

**כן נשמר סנאפשוט טרי של המצב החי היום**, לפני כל נגיעה:
`eitan-seo/snapshots/live-front-page-HE-2026-08-03-drift-baseline.html`
`eitan-seo/snapshots/live-en-page-2026-08-03-drift-baseline.html`

---

## 1. החלטת המשקלים

**IBM Plex Sans Hebrew לא קיימת במשקל 800 ולא במשקל 900. המקסימום הוא 700.**
אימות עצמאי מול Google Fonts API היום:

| בקשה | תשובת השרת |
|---|---|
| `IBM+Plex+Sans+Hebrew:wght@500` | 200 |
| `IBM+Plex+Sans+Hebrew:wght@600` | 200 |
| `IBM+Plex+Sans+Hebrew:wght@700` | 200 |
| `IBM+Plex+Sans+Hebrew:wght@800` | **400 (לא קיים)** |
| `IBM+Plex+Sans+Hebrew:wght@900` | **400 (לא קיים)** |
| `Frank+Ruhl+Libre:wght@300 / 500 / 700 / 900` | 200 בכל אחד |

(הערה קטנה: השרת מחזיר קוד 400 ולא 404, אבל המסקנה זהה. המשקל לא קיים.)

לכן זה לא שינוי שם משפחה, אלא **מיפוי מחדש של משקלים**. המיפוי הסופי, אחרי
ההחלטה של ניר לוותר על משקל 600:

| מקור | אלמנטים שעוברים ל-Frank Ruhl (כותרות) | אלמנטים שנשארים IBM Plex (גוף) |
|---|---|---|
| 900 | **נשאר 900** | **הופך 700** |
| 800 | **הופך 700** | **הופך 700** |
| 700 | נשאר 700 | נשאר 700 |
| **600** | לא בשימוש בכותרות | **הופך 700** |
| 400 | לא בשימוש בכותרות | נשאר 400 |

**התוצאה: שני משקלים בלבד לכל משפחה.**
Frank Ruhl ב-700 ו-900, IBM Plex ב-400 ו-700. זה הרף המינימלי האפשרי.

**ארבעת מופעי 600 בעברית ושניים באנגלית שעוברים ל-700:**

| קובץ | שורה | סלקטור | מה זה |
|---|---|---|---|
| עברית | 108 | `.nav-link` | קישורי הניווט בכותרת העליונה |
| עברית | 801 | `.diag-opt .opt-text small` | טקסט משנה בכפתורי האבחון |
| עברית | 1187 | `.claude-sec .eyebrow` | תווית eyebrow בסקשן Claude |
| עברית | 1197 | `.claude-edge` | פסקת ההדגשה בסקשן Claude |
| אנגלית | 106 | `.nav-link` | קישורי הניווט |
| אנגלית | 853 | `.diag-opt .opt-text small` | טקסט משנה בכפתורי האבחון |

**הערת עיצוב על המעבר מ-600 ל-700:** הפער בין 600 ל-700 הוא הפער הקטן ביותר
בכל סולם המשקלים, ובגדלים הקטנים שבהם הם מופיעים כאן (13px עד 18px) הוא כמעט
לא נראה לעין. **בפועל זה מחליף הבדל שקשה לראות בחיסכון של 26KB.**

**הגדרת "כותרת" בפועל:** הכלל החדש שנוסף הוא `h1, h2, h3, .modal-title`.
בחרתי בזה כי כל הכותרות באתר הן תגיות h אמיתיות (בעברית: h1 אחת, 12 תגיות h2,
28 תגיות h3), והחריג היחיד הוא `.modal-title` שהוא `div` בגודל 30px ומשקל 900,
כלומר כותרת לכל דבר. בדקתי גם שאין אף תגית h1, h2 או h3 שיושבת בתוך
`button`, `nav`, `form` או `label`, כך שהכלל לא תופס בטעות רכיב ממשק.

**מה בכוונה נשאר בגוף (IBM Plex) למרות משקל 900:** `.step-num` (ספרה בעיגול),
`.marquee-item` (שמות טכנולוגיות בלטינית), `.flagship-badge` ו-`.t-name`.
אלה תוויות ומספרים, לא כותרות, וסריף שם היה נראה זר.

**באג משקל 700 נסגר:** קודם נטענו 400/600/800/900 ומשקל 700 היה מבוקש 12 פעמים
ולא נטען כלל, ולכן הדפדפן רינדר אותו כ-800. עכשיו **כל מה שאינו כותרת ואינו
טקסט גוף רגיל הוא 700, והמשקל 700 באמת נטען.** אין יותר פער בין המבוקש לנטען.

---

## 2. תג הטעינה החדש

**לפני** (שורה 43 בשני הקבצים, שורה אחת):

```html
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;600;800;900&display=swap" rel="stylesheet">
```

**אחרי** (ארבע שורות במקום האחת):

```html
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@700;900&family=IBM+Plex+Sans+Hebrew:wght@400;700&display=swap" rel="stylesheet">
```

נטענים **ארבעה משקלים בלבד**: Frank Ruhl ב-700 ו-900, IBM Plex ב-400 ו-700.
`&display=swap` נשמר. נשארים על Google Fonts CDN, אחסון עצמי הוא מהלך נפרד
ולא מתערבב עם ההעלאה הזאת.

שלושת ה-`preconnect` הם התוספת החדשה. היום אין אף אחד מהם, ולכן שרשרת הטעינה היא
חמישה שלבים סדרתיים לפני שהאות הראשונה מצוירת.

---

## 3. הכלל החדש שמתווסף

נכנס מיד אחרי בלוק `body` שנסגר (בעברית אחרי שורה 72, באנגלית אחרי שורה 70):

```css

        /* Headings: Frank Ruhl Libre (serif) */
        h1, h2, h3, .modal-title {
            font-family: 'Frank Ruhl Libre', Georgia, 'Times New Roman', serif;
        }
```

---

## 4. טבלת ההחלפות: `front-page.php` (עברית)

מספרי השורה הם **לפי הקובץ עצמו**. בקובץ העברי אין שורת PHP בראש
(שורה 1 היא `<!DOCTYPE html>`), ולכן מספר השורה בקובץ זהה למספר השורה בפלט החי.

**47 החלפות בשורה אחת** (לא משנות את מספר השורות בקובץ):

| שורה | סלקטור | לפני | אחרי |
|---|---|---|---|
| 65 | `body` | `font-family: 'Heebo', sans-serif;` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 108 | `.nav-link` | `font-weight: 600;` | `font-weight: 700;` |
| 159 | `.nav-cta` | `font-weight: 800;` | `font-weight: 700;` |
| 211 | `.hero-title` | `line-height: 1.1;` | `line-height: 1.15;` |
| 214 | `.hero-title` | `letter-spacing: -0.5px;` | `letter-spacing: 0;` |
| 236 | `.eyebrow` | `font-weight: 800;` | `font-weight: 700;` |
| 253 | `.btn-primary` | `font-weight: 800;` | `font-weight: 700;` |
| 263 | `.btn-primary` | `font-family: 'Heebo';` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 293 | `.trust-label` | `font-size: 13px; font-weight: 800; letter-spacing: 1px;` | `font-size: 13px; font-weight: 700; letter-spacing: 1px;` |
| 305 | `.tech-logo .tech-name` | `.tech-logo .tech-name { color: #cfd6e6; font-weight: 800; font-size: 16px; letter-spacing: 0.3px; }` | `.tech-logo .tech-name { color: #cfd6e6; font-weight: 700; font-size: 16px; letter-spacing: 0.3px; }` |
| 312 | `.tech-badge` | `color: #eafffb; font-weight: 800; font-size: 15px;` | `color: #eafffb; font-weight: 700; font-size: 15px;` |
| 389 | `.pillar .read-more-btn` | `.pillar .read-more-btn { color: var(--blue); font-weight: 800; font-size: 14px; text-decoration: underline; align-self: flex-start; }` | `.pillar .read-more-btn { color: var(--blue); font-weight: 700; font-size: 14px; text-decoration: underline; align-self: flex-start; }` |
| 451 | `.flagship-badge` | `font-weight: 900; font-size: 12px; letter-spacing: 1px;` | `font-weight: 700; font-size: 12px; letter-spacing: 1px;` |
| 475 | `.agent-chip.clickable .chip-more` | `color: var(--auto); font-size: 12.5px; font-weight: 800;` | `color: var(--auto); font-size: 12.5px; font-weight: 700;` |
| 529 | `.step-num` | `font-weight: 900; font-size: 22px; margin-bottom: 18px;` | `font-weight: 700; font-size: 22px; margin-bottom: 18px;` |
| 554 | `.t-name` | `.t-name { font-weight: 900; display: block; font-size: 20px; color: var(--blue); }` | `.t-name { font-weight: 700; display: block; font-size: 20px; color: var(--blue); }` |
| 571 | `.addon h3` | `.addon h3 { font-size: 19px; font-weight: 800; margin: 0 0 8px; color: #fff; }` | `.addon h3 { font-size: 19px; font-weight: 700; margin: 0 0 8px; color: #fff; }` |
| 573 | `.addon .read-more-btn` | `.addon .read-more-btn { color: var(--gold); font-weight: 800; font-size: 13px; text-decoration: underline; }` | `.addon .read-more-btn { color: var(--gold); font-weight: 700; font-size: 13px; text-decoration: underline; }` |
| 579 | `.faq-question` | `.faq-question { padding: 20px 25px; font-weight: 800; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }` | `.faq-question { padding: 20px 25px; font-weight: 700; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }` |
| 591 | `.contact-copy .closing-line` | `.contact-copy .closing-line { font-size: 22px; color: var(--gold); font-weight: 800; margin: 0 0 22px; line-height: 1.4; }` | `.contact-copy .closing-line { font-size: 22px; color: var(--gold); font-weight: 700; margin: 0 0 22px; line-height: 1.4; }` |
| 606 | `.form-group input, .form-group textarea` | `font-family: 'Heebo';` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 620 | `.submit-btn` | `font-weight: 800;` | `font-weight: 700;` |
| 625 | `.submit-btn` | `font-family: 'Heebo';` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 629 | `.contact-box .wa-fallback a` | `.contact-box .wa-fallback a { color: var(--wa); font-weight: 800; text-decoration: none; }` | `.contact-box .wa-fallback a { color: var(--wa); font-weight: 700; text-decoration: none; }` |
| 650 | `.modal-text strong` | `.modal-text strong { color: var(--red); font-weight: 800; }` | `.modal-text strong { color: var(--red); font-weight: 700; }` |
| 674 | `#acc-menu button` | `border-radius: 10px; cursor: pointer; font-family: 'Heebo';` | `border-radius: 10px; cursor: pointer; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 679 | `#acc-menu .acc-title` | `#acc-menu .acc-title { font-weight: 900; font-size: 17px; margin-bottom: 12px; text-align: center; color: var(--blue); }` | `#acc-menu .acc-title { font-weight: 700; font-size: 17px; margin-bottom: 12px; text-align: center; color: var(--blue); }` |
| 680 | `#acc-menu .acc-group` | `#acc-menu .acc-group { font-size: 12px; font-weight: 800; color: #8a93a6; margin: 10px 2px 6px; letter-spacing: 0.4px; }` | `#acc-menu .acc-group { font-size: 12px; font-weight: 700; color: #8a93a6; margin: 10px 2px 6px; letter-spacing: 0.4px; }` |
| 717 | `.marquee-track .marquee-item` | `font-weight: 900;` | `font-weight: 700;` |
| 765 | `.diag-ribbon` | `color: var(--gold); font-weight: 800; font-size: 15px; letter-spacing: 0.5px;` | `color: var(--gold); font-weight: 700; font-size: 15px; letter-spacing: 0.5px;` |
| 774 | `.diag-progress .bar-label` | `.diag-progress .bar-label { font-size: 13px; font-weight: 800; color: var(--auto); letter-spacing: 1px; white-space: nowrap; }` | `.diag-progress .bar-label { font-size: 13px; font-weight: 700; color: var(--auto); letter-spacing: 1px; white-space: nowrap; }` |
| 781 | `.diag-q-num` | `.diag-q-num { font-size: 13px; font-weight: 800; letter-spacing: 2px; color: var(--auto); margin-bottom: 10px; }` | `.diag-q-num { font-size: 13px; font-weight: 700; letter-spacing: 2px; color: var(--auto); margin-bottom: 10px; }` |
| 790 | `.diag-opt` | `color: #e8ecf5; font-family: 'Heebo'; font-size: 17px; font-weight: 700;` | `color: #e8ecf5; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif; font-size: 17px; font-weight: 700;` |
| 801 | `.diag-opt .opt-text small` | `.diag-opt .opt-text small { font-weight: 600; font-size: 13px; color: #aeb6cb; }` | `.diag-opt .opt-text small { font-weight: 700; font-size: 13px; color: #aeb6cb; }` |
| 804 | `.diag-back` | `background: none; border: none; color: #8a93ab; font-family: 'Heebo';` | `background: none; border: none; color: #8a93ab; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 824 | `.diag-result-badge` | `color: #ff8a80; font-weight: 800; font-size: 13px; letter-spacing: 1px;` | `color: #ff8a80; font-weight: 700; font-size: 13px; letter-spacing: 1px;` |
| 839 | `.diag-map .stage` | `font-size: 12px; font-weight: 800; color: #8a93ab;` | `font-size: 12px; font-weight: 700; color: #8a93ab;` |
| 850 | `.diag-restart` | `background: none; border: none; color: #8a93ab; font-family: 'Heebo';` | `background: none; border: none; color: #8a93ab; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 860 | `.diag-result-qr a` | `.diag-result-qr a { color: var(--auto); font-weight: 800; text-decoration: none; }` | `.diag-result-qr a { color: var(--auto); font-weight: 700; text-decoration: none; }` |
| 909 | `.about-copy .about-sub` | `.about-copy .about-sub { font-size: 20px; font-weight: 800; color: var(--auto); margin: 0 0 22px; }` | `.about-copy .about-sub { font-size: 20px; font-weight: 700; color: var(--auto); margin: 0 0 22px; }` |
| 912 | `.about-copy .about-close` | `font-size: 19px; font-weight: 800; color: #fff; line-height: 1.5;` | `font-size: 19px; font-weight: 700; color: #fff; line-height: 1.5;` |
| 1187 | `.claude-sec .eyebrow` | `.claude-sec .eyebrow { color: var(--auto); display: block; font-weight: 600; letter-spacing: 1px; margin-bottom: 10px; }` | `.claude-sec .eyebrow { color: var(--auto); display: block; font-weight: 700; letter-spacing: 1px; margin-bottom: 10px; }` |
| 1197 | `.claude-edge` | `.claude-edge { max-width: 760px; margin: 0 auto 30px; padding: 18px 26px; border-radius: 14px; background: rgba(139,127,232,0.10); border-right: 4px solid var(--auto); font-size: 18px; font-weight: 600; line-height: 1.6; text-align: right; }` | `.claude-edge { max-width: 760px; margin: 0 auto 30px; padding: 18px 26px; border-radius: 14px; background: rgba(139,127,232,0.10); border-right: 4px solid var(--auto); font-size: 18px; font-weight: 700; line-height: 1.6; text-align: right; }` |
| 1210 | `.about-close .em-gold` | `.about-close .em-gold { color: var(--gold); font-weight: 900; }` | `.about-close .em-gold { color: var(--gold); font-weight: 700; }` |
| 1211 | `.about-close .em-auto` | `.about-close .em-auto { color: var(--auto); font-weight: 900; }` | `.about-close .em-auto { color: var(--auto); font-weight: 700; }` |
| 1258 | `.tech-chip .tech-name` | `.tech-chip .tech-name { font-weight: 800; font-size: 16px; color: #fff; letter-spacing: 0.3px; }` | `.tech-chip .tech-name { font-weight: 700; font-size: 16px; color: #fff; letter-spacing: 0.3px; }` |
| 1273 | `.fillout-alt a` | `.fillout-alt a { color: var(--gold); font-weight: 800; text-decoration: underline; text-underline-offset: 4px; }` | `.fillout-alt a { color: var(--gold); font-weight: 700; text-decoration: underline; text-underline-offset: 4px; }` |

**ועוד 2 שינויים מבניים** (משנים את מספר השורות, ולכן מבצעים אותם אחרונים):

| # | מיקום | פעולה |
|---|---|---|
| מבני 1 | אחרי שורה 72 (סוגר הבלוק `}` של `body`) | הוספת כלל הכותרות מסעיף 3 (5 שורות) |
| מבני 2 | שורה 43 | החלפת שורת ה-`<link>` בארבע השורות מסעיף 2 |

**סה"כ בקובץ העברי: 49 שינויים.**

---

## 5. טבלת ההחלפות: `template-en.php` (אנגלית)

⚠️ **שימו לב להיסט:** בקובץ האנגלי **שורה 1 היא** `<?php /* Template Name: English Homepage */ ?>`
שלא מייצרת פלט. המספרים בטבלה למטה הם **לפי הפלט החי**, ולכן
**בקובץ עצמו צריך להוסיף 1 לכל מספר שורה.**
לדוגמה: שורה 65 בטבלה היא שורה 66 בעורך.

**44 החלפות בשורה אחת:**

| שורה (בפלט) | סלקטור | לפני | אחרי |
|---|---|---|---|
| 65 | `body` | `font-family: 'Heebo', sans-serif;` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 106 | `.nav-link` | `font-weight: 600;` | `font-weight: 700;` |
| 157 | `.nav-cta` | `font-weight: 800;` | `font-weight: 700;` |
| 209 | `.hero-title` | `line-height: 1.1;` | `line-height: 1.15;` |
| 212 | `.hero-title` | `letter-spacing: -0.5px;` | `letter-spacing: 0;` |
| 234 | `.eyebrow` | `font-weight: 800;` | `font-weight: 700;` |
| 252 | `.btn-primary` | `font-weight: 800;` | `font-weight: 700;` |
| 262 | `.btn-primary` | `font-family: 'Heebo';` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 292 | `.trust-label` | `font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase;` | `font-size: 13px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;` |
| 304 | `.tech-logo .tech-name` | `.tech-logo .tech-name { color: #cfd6e6; font-weight: 800; font-size: 16px; letter-spacing: 0.3px; }` | `.tech-logo .tech-name { color: #cfd6e6; font-weight: 700; font-size: 16px; letter-spacing: 0.3px; }` |
| 311 | `.tech-badge` | `color: #eafffb; font-weight: 800; font-size: 15px;` | `color: #eafffb; font-weight: 700; font-size: 15px;` |
| 388 | `.pillar .read-more-btn` | `.pillar .read-more-btn { color: var(--blue); font-weight: 800; font-size: 14px; text-decoration: underline; align-self: flex-start; }` | `.pillar .read-more-btn { color: var(--blue); font-weight: 700; font-size: 14px; text-decoration: underline; align-self: flex-start; }` |
| 450 | `.flagship-badge` | `font-weight: 900; font-size: 12px; letter-spacing: 1px;` | `font-weight: 700; font-size: 12px; letter-spacing: 1px;` |
| 474 | `.agent-chip.clickable .chip-more` | `color: var(--auto); font-size: 12.5px; font-weight: 800;` | `color: var(--auto); font-size: 12.5px; font-weight: 700;` |
| 528 | `.step-num` | `font-weight: 900; font-size: 22px; margin-bottom: 18px;` | `font-weight: 700; font-size: 22px; margin-bottom: 18px;` |
| 553 | `.t-name` | `.t-name { font-weight: 900; display: block; font-size: 20px; color: var(--blue); }` | `.t-name { font-weight: 700; display: block; font-size: 20px; color: var(--blue); }` |
| 570 | `.addon h3` | `.addon h3 { font-size: 19px; font-weight: 800; margin: 0 0 8px; color: #fff; }` | `.addon h3 { font-size: 19px; font-weight: 700; margin: 0 0 8px; color: #fff; }` |
| 572 | `.addon .read-more-btn` | `.addon .read-more-btn { color: var(--gold); font-weight: 800; font-size: 13px; text-decoration: underline; }` | `.addon .read-more-btn { color: var(--gold); font-weight: 700; font-size: 13px; text-decoration: underline; }` |
| 578 | `.faq-question` | `.faq-question { padding: 20px 25px; font-weight: 800; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }` | `.faq-question { padding: 20px 25px; font-weight: 700; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }` |
| 590 | `.contact-copy .closing-line` | `.contact-copy .closing-line { font-size: 22px; color: var(--gold); font-weight: 800; margin: 0 0 22px; line-height: 1.4; }` | `.contact-copy .closing-line { font-size: 22px; color: var(--gold); font-weight: 700; margin: 0 0 22px; line-height: 1.4; }` |
| 605 | `.form-group input, .form-group textarea` | `font-family: 'Heebo';` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 617 | `.submit-btn` | `font-weight: 800;` | `font-weight: 700;` |
| 625 | `.contact-box .wa-fallback a` | `.contact-box .wa-fallback a { color: var(--wa); font-weight: 800; text-decoration: none; }` | `.contact-box .wa-fallback a { color: var(--wa); font-weight: 700; text-decoration: none; }` |
| 645 | `.modal-text strong` | `.modal-text strong { color: var(--red); font-weight: 800; }` | `.modal-text strong { color: var(--red); font-weight: 700; }` |
| 669 | `#acc-menu button` | `border-radius: 10px; cursor: pointer; font-family: 'Heebo';` | `border-radius: 10px; cursor: pointer; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 697 | `.marquee-track .marquee-item` | `font-weight: 900;` | `font-weight: 700;` |
| 743 | `.magnet-ribbon` | `color: var(--gold); font-weight: 800; font-size: 15px; letter-spacing: 0.5px;` | `color: var(--gold); font-weight: 700; font-size: 15px; letter-spacing: 0.5px;` |
| 763 | `.magnet-or span` | `font-weight: 900; font-size: 14px; color: var(--auto); letter-spacing: 1px;` | `font-weight: 700; font-size: 14px; color: var(--auto); letter-spacing: 1px;` |
| 771 | `.magnet-form input` | `font-family: 'Heebo'; font-size: 16px; transition: 0.3s;` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif; font-size: 16px; transition: 0.3s;` |
| 778 | `.magnet-submit` | `font-family: 'Heebo'; font-weight: 800; font-size: 17px; cursor: pointer;` | `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif; font-weight: 700; font-size: 17px; cursor: pointer;` |
| 791 | `.magnet-qr-side .qr-caption` | `.magnet-qr-side .qr-caption { font-size: 17px; font-weight: 800; color: #fff; margin: 0 0 6px; }` | `.magnet-qr-side .qr-caption { font-size: 17px; font-weight: 700; color: #fff; margin: 0 0 6px; }` |
| 795 | `.magnet-qr-link` | `color: var(--auto); font-weight: 800; font-size: 15px; text-decoration: none;` | `color: var(--auto); font-weight: 700; font-size: 15px; text-decoration: none;` |
| 817 | `.diag-ribbon` | `color: var(--gold); font-weight: 800; font-size: 15px; letter-spacing: 0.5px;` | `color: var(--gold); font-weight: 700; font-size: 15px; letter-spacing: 0.5px;` |
| 826 | `.diag-progress .bar-label` | `.diag-progress .bar-label { font-size: 13px; font-weight: 800; color: var(--auto); letter-spacing: 1px; white-space: nowrap; }` | `.diag-progress .bar-label { font-size: 13px; font-weight: 700; color: var(--auto); letter-spacing: 1px; white-space: nowrap; }` |
| 833 | `.diag-q-num` | `.diag-q-num { font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: var(--auto); margin-bottom: 10px; }` | `.diag-q-num { font-size: 13px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--auto); margin-bottom: 10px; }` |
| 842 | `.diag-opt` | `color: #e8ecf5; font-family: 'Heebo'; font-size: 17px; font-weight: 700;` | `color: #e8ecf5; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif; font-size: 17px; font-weight: 700;` |
| 853 | `.diag-opt .opt-text small` | `.diag-opt .opt-text small { font-weight: 600; font-size: 13px; color: #aeb6cb; }` | `.diag-opt .opt-text small { font-weight: 700; font-size: 13px; color: #aeb6cb; }` |
| 856 | `.diag-back` | `background: none; border: none; color: #8a93ab; font-family: 'Heebo';` | `background: none; border: none; color: #8a93ab; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 876 | `.diag-result-badge` | `color: #ff8a80; font-weight: 800; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;` | `color: #ff8a80; font-weight: 700; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;` |
| 891 | `.diag-map .stage` | `font-size: 12px; font-weight: 800; color: #8a93ab;` | `font-size: 12px; font-weight: 700; color: #8a93ab;` |
| 902 | `.diag-restart` | `background: none; border: none; color: #8a93ab; font-family: 'Heebo';` | `background: none; border: none; color: #8a93ab; font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| 912 | `.diag-result-qr a` | `.diag-result-qr a { color: var(--auto); font-weight: 800; text-decoration: none; }` | `.diag-result-qr a { color: var(--auto); font-weight: 700; text-decoration: none; }` |
| 961 | `.about-copy .about-sub` | `.about-copy .about-sub { font-size: 20px; font-weight: 800; color: var(--auto); margin: 0 0 22px; }` | `.about-copy .about-sub { font-size: 20px; font-weight: 700; color: var(--auto); margin: 0 0 22px; }` |
| 964 | `.about-copy .about-close` | `font-size: 19px; font-weight: 800; color: #fff; line-height: 1.5;` | `font-size: 19px; font-weight: 700; color: #fff; line-height: 1.5;` |

**ועוד 3 שינויים מבניים** (מבצעים אחרונים, מלמטה למעלה):

| # | מיקום (בפלט) | פעולה |
|---|---|---|
| מבני 1 | אחרי שורה 621 (`box-shadow` בתוך `.submit-btn`) | **הוספת** `font-family: 'IBM Plex Sans Hebrew', Arial, sans-serif;` |
| מבני 2 | אחרי שורה 70 (סוגר הבלוק `}` של `body`) | הוספת כלל הכותרות מסעיף 3 (5 שורות) |
| מבני 3 | שורה 43 | החלפת שורת ה-`<link>` בארבע השורות מסעיף 2 |

**מבני 1 מתקן פער קיים:** בעברית ל-`.submit-btn` יש `font-family` ובאנגלית אין.
היום זה עובד במקרה כי הכפתור יורש מ-`body`, אבל זה פער ולא כוונה. סוגרים אותו כאן.

**סה"כ בקובץ האנגלי: 47 שינויים.**

---

## 6. מה **אסור** לגעת בו

**לעולם לא מריצים החלפה גורפת של `font-family` ולא של `font-weight`.**

| שורות (עברית) | שורות (אנגלית) | מה זה | למה לא נוגעים |
|---|---|---|---|
| 245, 296, 748, 906 | 244, 295, 728, 958 | `font-family: "Font Awesome 6 Free"` עם `font-weight: 900` | ה-900 הזה **בוחר את גרסת ה-solid של Font Awesome**. שינוי שלו הופך את כל 52 האייקונים לריבועים ריקים |
| 686 | (לא קיים באנגלית) | `body.acc-readable * { font-family: Arial, Helvetica ... !important }` | מצב "פונט קריא" בתפריט הנגישות. דרישת נגישות |
| 1226 | (לא קיים באנגלית) | `.li-badge { ... font-weight: 900 ... font-family: Arial, sans-serif }` | תג הלוגו של לינקדאין. Arial במכוון |

שימו לב במיוחד: ארבע שורות ה-Font Awesome מכילות `font-weight: 900` שנשאר 900.
בטבלאות ההחלפה למעלה **הן לא מופיעות**, וזה בכוונה.

---

## 7. ריווח אותיות: מה שונה ומה לא

עברתי על כל 16 כללי ה-`letter-spacing`. **שיניתי אחד בלבד.**

| שורה | סלקטור | ערך | החלטה |
|---|---|---|---|
| **214 (עב') / 212 (אנ')** | `.hero-title` | `-0.5px` | **שונה ל-`0`** |
| 238 / 236 | `.eyebrow` | `2px` | לא שונה. באנגלית יש `text-transform: uppercase` וריווח נדיב על אותיות גדולות זו טיפוגרפיה נכונה. בעברית לבדוק ויזואלית |
| 502 / 501 | `.brand-signature .bs-label` | `2px` | לא שונה. לבדוק ויזואלית |
| 718 / 698 | `.marquee-item` | `2px` על 30px | לא שונה. 2px על 30px זה 6.7 אחוז, סביר |
| 781 / 833 | `.diag-q-num` | `2px` | לא שונה. לבדוק ויזואלית |
| 293, 451, 774, 824, 1187 ומקביליהן | תוויות שונות | `0.3px` עד `1px` | לא שונה. ערכים קטנים, לא רגישים להחלפת פונט |
| 686 | `body.acc-readable` | `0.2px` | **לא נוגעים.** מצב נגישות |

**למה `.hero-title` חייב להשתנות:** הערך `-0.5px` כויל ל-Heebo, שהוא סאנס.
Frank Ruhl Libre הוא **סריף**, ובגודל 56px במשקל 900 העיטורים בקצות האותיות
מתקרבים זה לזה מעצמם. ריווח שלילי נוסף מסכן נגיעה בין אותיות דווקא בכותרת
הראשית של דף הבית. `0` הוא הערך הבטוח.

אם אחרי הצפייה בתצוגה המקדימה הכותרת נראית **רחבה מדי**, יש ערך ביניים אחד
מותר: `-0.2px`. אל תרדו מתחת לזה.

---

## 8. גובה שורה: מה שונה ומה לא

עברתי על כל 13 ערכי ה-`line-height`. **שיניתי אחד בלבד.**

| שורה | סלקטור | ערך | החלטה |
|---|---|---|---|
| **211 (עב') / 209 (אנ')** | `.hero-title` | `1.1` | **שונה ל-`1.15`** |
| 324, 590 | `.sec-head h2`, `.contact-copy h2` | `1.15` | לא שונה. כבר בערך הבטוח |
| 907 | `.about-copy h2` | `1.18` | לא שונה |
| 330, 828 | `.value h2`, `.diag-result h3` | `1.2` | לא שונה |
| 782 | `.diag-q-title` | `1.25` | לא שונה |
| 68 | `body` | `1.6` | **לא שונה.** IBM Plex Sans Hebrew קרובה ל-Heebo במטריקות האנכיות |
| 388, 532, 546, 556, 572, 910, 1190 ועוד | פסקאות גוף | `1.6` עד `1.8` | לא שונה. כולן נשארות IBM Plex |

**למה `.hero-title` חייב להשתנות:** זו הכותרת היחידה מתחת ל-`1.15` שגם באמת
נשברת לכמה שורות. הכותרת העברית היא
"העסק שלכם יכול לעבוד בשבילכם - גם כשאתם לא שם" ובגודל 56px היא שתיים עד שלוש שורות.
ל-Frank Ruhl Libre יש ascender ו-descender גבוהים יותר מ-Heebo, ובערך `1.1`
האות ל בשורה השנייה עלולה לגעת באות ק בשורה שמעליה. `1.15` פותר בלי לשנות את המראה.

**כל שאר ערכי גובה השורה נשארים בדיוק כפי שהם.** הם שייכים לטקסט גוף שנשאר
IBM Plex, שהמטריקות שלה דומות מספיק ל-Heebo.

---

## 9. השפעת ביצועים: המספרים האמיתיים

כל המספרים נמדדו היום בפועל מול `fonts.gstatic.com`, לא הערכות.
**הטבלה מעודכנת אחרי הורדת משקל 600.**

| | היום (Heebo) | אחרי (בלי 600) | הפרש |
|---|---|---|---|
| קובץ CSS (על החוט, דחוס) | 1,474 | **678** | **-796** |
| קבצי woff2 | 42,152 | **113,360** | **+71,208** |
| **סה"כ טיפוגרפיה** | **43,626** | **114,038** | **+70,412** |

פירוט ששת קבצי ה-woff2 שיירדו בפועל:

| משפחה | תת-קבוצה | משקלים | בייטים |
|---|---|---|---|
| Frank Ruhl Libre | עברית | 700 + 900 **באותו קובץ** | 18,748 |
| Frank Ruhl Libre | לטינית | 700 + 900 **באותו קובץ** | 44,332 |
| IBM Plex Sans Hebrew | עברית | 400 | 5,476 |
| IBM Plex Sans Hebrew | עברית | 700 | 5,644 |
| IBM Plex Sans Hebrew | לטינית | 400 | 19,452 |
| IBM Plex Sans Hebrew | לטינית | 700 | 19,708 |
| | | **סה"כ** | **113,360** |

**שני ממצאים שכדאי להכיר:**

1. **Frank Ruhl Libre היא variable.** שני המשקלים 700 ו-900 מצביעים על אותה כתובת
   woff2 בדיוק. כלומר הכותרות עולות שני קבצים, לא ארבעה.
2. **IBM Plex Sans Hebrew היא סטטית.** כל משקל הוא קובץ נפרד. **בדיוק בגלל זה
   הורדת 600 הייתה כדאית**, והיא חסכה שני קבצים שלמים.

**מה בדיוק נחסך מהורדת 600:**

| קובץ שירד | בייטים |
|---|---|
| IBM Plex Sans Hebrew, עברית, 600 | 5,652 |
| IBM Plex Sans Hebrew, לטינית, 600 | 20,692 |
| **סה"כ** | **26,344** |

**תיקון קטן לחישוב הקודם:** בגרסה הראשונה של המסמך רשמתי 25,352 בייט.
המספר המדויק הוא **26,344**. ההפרש נבע מכך שיוחסו שם גדלי קבצים למשקלים
לפי סדר הכתובות ולא לפי הצהרת המשקל עצמה. מיפיתי מחדש כל קובץ למשקל שלו
לפי בלוקי ה-`@font-face`, וזה המספר הנכון. **החיסכון גדול ב-992 בייט ממה שהבטחתי.**

**המאזן הכולל, כולל שיפור ה-Font Awesome:**

| רכיב | שינוי |
|---|---|
| טיפוגרפיה | **+70,412** |
| הסרת `fa-brands-400.woff2` (ראה `FONT-AWESOME-BRANDS.md`) | **-104,544** |
| **נטו** | **-34,132 בייט, כלומר חיסכון של כ-33KB** |

**המשמעות: אחרי שני המהלכים יחד האתר יהיה קל יותר ממה שהוא היום**, למרות
שהוא טוען שתי משפחות פונטים במקום אחת. ובנוסף מתווספים שלושה `preconnect`
שמקצרים את שרשרת הטעינה מחמישה שלבים סדרתיים לשלושה.

**למה הלטינית של Frank Ruhl בכל זאת נטענת בדף העברי:** בדקתי, וכותרות עבריות
באתר מכילות לטינית בפועל. לדוגמה `סוכני AI לעסק`, `אוטומציות Make`,
`מערכות CRM (Airtable)`, `התוכנית (Blueprint)`, `Google Ads ו-SEO`.
לכן 44,332 הבייטים האלה יורדו גם בעברית. אי אפשר להימנע מזה.
**הצד החיובי: אלה בדיוק המקרים שהאודיט סימן כסיכון מספר 1**, ולמשפחה הזאת יש
לטינית מעוצבת אמיתית, כך שהמילה AI בתוך כותרת עברית תהיה באותו סריף ובאותו משקל.

---

## 10. טבלת אימות (site-integrity-check)

הרצתי את הספירות על התוצר לפני ואחרי. **כל האלמנטים הנעולים זהים.**

| בדיקה | עברית לפני | עברית אחרי | אנגלית לפני | אנגלית אחרי | תקין |
|---|---|---|---|---|---|
| `GTM-NXRL4W23` | 2 | **2** | 2 | **2** | ✅ |
| `frzwgajh` (Make hook) | 1 | **1** | 1 | **1** | ✅ |
| `972537142298` (וואטסאפ) | 6 | **6** | 5 | **5** | ✅ |
| `id="contact"` | 1 | **1** | 1 | **1** | ✅ |
| `handleFormSubmit` | 2 | **2** | 2 | **2** | ✅ |
| `thank-you` | 1 | **1** | 1 | **1** | ✅ |
| `hreflang` | 2 | **2** | 2 | **2** | ✅ |
| `fbq` | 0 | **0** | 0 | **0** | ✅ |
| `Font Awesome 6 Free` | 4 | **4** | 4 | **4** | ✅ |
| `Arial, Helvetica` (נגישות) | 1 | **1** | 0 | **0** | ✅ |
| `font-family: Arial, sans-serif` (לינקדאין) | 1 | **1** | 0 | **0** | ✅ |

**שתי בדיקות נוספות שהוספתי מעבר לסקיל:**

| בדיקה | תוצאה |
|---|---|
| שורות ששונו בתוך בלוק `<script>` | **0 בשני הקבצים** ✅ |
| שורות ששונו מחוץ לבלוק `<style>` | **רק שורה 43** (תג ה-`<link>`, בתוך `<head>`) ✅ |

כלומר **לא נגעתי באף שורת JavaScript**, ולכן הטופס, האבחון האינטראקטיבי
והמודאלים לא יכולים להישבר מהעריכה הזאת.

ומדדי ההצלחה של המהלך עצמו:

| בדיקה | עברית לפני | עברית אחרי | אנגלית לפני | אנגלית אחרי |
|---|---|---|---|---|
| `Heebo` | 9 | **0** ✅ | 10 | **0** ✅ |
| `IBM Plex Sans Hebrew` | 0 | **8** | 0 | **10** |
| `Frank Ruhl Libre` | 0 | **2** | 0 | **2** |
| `font-weight: 900` | 27 | **20** | 23 | **18** |
| `font-weight: 800` | 26 | **0** ✅ | 27 | **0** ✅ |
| `font-weight: 700` | 12 | **49** | 12 | **46** |
| `font-weight: 600` | 4 | **0** ✅ | 2 | **0** ✅ |

**שלוש שורות ה-0 הן מדד ההצלחה:** אין יותר Heebo, אין יותר בקשות למשקל 800
שלא קיים, ואין יותר בקשות למשקל 600 שכבר לא נטען.

**אימות שכל 900 שנשאר הוא לגיטימי.** עברתי אחד אחד על כל המופעים שנותרו:

- **עברית, 22 מופעים** (20 בכללי CSS ועוד 2 inline): 4 של Font Awesome
  + 1 של תג לינקדאין + 17 כותרות (`.hero-title`, `.sec-head h2`, `.value h2`,
  `.pillar h3`, `.cta-banner h2`, `.step h3`, `.proof-card h3`, `.contact-copy h2`,
  `.contact-box h3`, `.modal-title`, `.diag-q-title`, `.diag-result h3`,
  `.about-copy h2`, `.claude-sec h2`, `.claude-card h3`, ושתי תגיות `<h2 style="...">`).
- **אנגלית, 20 מופעים:** 4 של Font Awesome + 16 כותרות (כולל `.magnet-side h3`
  ושתי תגיות `<h2 style="...">`).

**אין אף מופע של 900 שנשאר על אלמנט גוף.** זה נבדק שורה שורה, לא בהערכה.

---

## 11. קבצי התצוגה המקדימה

| קובץ | מה זה |
|---|---|
| `before-he.html` | דף הבית העברי **החי כפי שהוא היום**, נמשך היום ב-curl |
| `preview-he.html` | אותו דף **אחרי** כל 49 השינויים |
| `before-en.html` | דף `/en/` החי כפי שהוא היום |
| `preview-en.html` | אותו דף **אחרי** כל 47 השינויים |

**קבצי ה-preview עודכנו לגרסה בלי משקל 600.** התווית בפינה אומרת
`AFTER - Frank Ruhl + IBM Plex (400/700)` כדי שיהיה ברור שזו הגרסה המאושרת.

כל ארבעת הקבצים נפתחים בדפדפן בלחיצה כפולה ועובדים במלואם. כל התמונות באתר הן
data URI מוטמעות, ולכן שום דבר לא שבור בתצוגה המקומית. הפונטים ו-Font Awesome
נטענים מהאינטרנט, אז צריך חיבור רשת פעיל.

**התווית היא חלק מהתצוגה המקדימה בלבד ולא נכנסת לאתר בשום צורה.**

---

## 12. צ'קליסט אחרי ההעלאה

לפי 14 הסעיפים מהאודיט, מסומן מה כבר אומת בקוד ומה דורש עין אנושית:

| # | בדיקה | סטטוס |
|---|---|---|
| 1 | סימן השקל `₪` מוצג נכון | ✅ **אומת בקוד.** שתי המשפחות כוללות את U+20AA בתת-הקבוצה העברית |
| 2 | `«` מוצג ומצביע נכון | ✅ **אומת בקוד.** U+00AB נמצא בתת-הקבוצה הלטינית של שתיהן |
| 3 | "ה-CRM", "ו-Airtable" בפונט אחד | 👁 בדיקה ויזואלית. לשתי המשפחות יש לטינית מעוצבת |
| 4 | מחירים מיושרים, ספרות lining | 👁 בדיקה ויזואלית ב-`/packages/` (עדיין טיוטה) |
| 5 | הכותרת הראשית לא נחתכת, אותיות לא נוגעות | 👁 **הכי חשוב.** 320px / 768px / 1440px |
| 6 | הכותרת הקבועה 110px לא גולשת | 👁 בדיקה ויזואלית, דסקטופ ומובייל |
| 7 | כל 52 אייקוני solid עדיין אייקונים | ✅ **אומת בקוד.** 4 שורות Font Awesome לא נגענו בהן |
| 8 | מצב "פונט קריא" עדיין Arial | ✅ **אומת בקוד.** שורה 686 לא נגענו בה |
| 9 | חלונית הצ'אט באותו פונט כמו הדף | ⚠️ **דורש שינוי נפרד ב-GTM.** ראה `GTM-CHAT-WIDGET.md` |
| 10 | תפר המרקיזה חלק | 👁 בדיקה ויזואלית. רוחב הפריטים משתנה עם הפונט |
| 11 | שדות הטופס באותו פונט, placeholder קריא | 👁 בדיקה ויזואלית בסקשן `#contact` |
| 12 | `/en/` נראה נכון בלטינית | 👁 בדיקה ויזואלית |
| 13 | ללא קפיצת פריסה (CLS) | 👁 DevTools, האטה ל-Slow 3G |
| 14 | הפונט אכן נטען | 👁 DevTools ← Network ← Font. **לצפות ל-6 קבצים, לא 8** |

**סעיף 9 הוא המלכודת.** הוא לא בקוד האתר ולכן שום בדיקת קוד לא תתפוס אותו.

**סעיף 14 עודכן:** אחרי הורדת 600 צריכים לרדת **שישה** קבצי woff2 של טקסט
(ועוד `fa-solid-900.woff2` של Font Awesome). אם אתה רואה שמונה, משקל 600 עדיין
בתג ולא הוסר.
