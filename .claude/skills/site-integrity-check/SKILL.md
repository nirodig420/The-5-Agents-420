---
name: site-integrity-check
description: >-
  בדיקת שלמות לדפי nirodigital.co.il אחרי כל עריכה — מוודאת שהאלמנטים הנעולים
  (GTM, Make hook, טופס הלידים, וואטסאפ, hreflang) שרדו את השינוי. איתן מריץ את זה
  אחרי כל עריכת קובץ דף/תבנית, לפני שמציג לאישור. Use when: editing site pages,
  theme templates, front-page files, verifying a page after changes.
---

# site-integrity-check — בדיקת שלמות דף אחרי עריכה

הסקיל הזה מקודד את צ'קליסט האימות של איתן. **מריצים אחרי כל עריכה בקובץ דף/תבנית**
(PHP/HTML), לפני הצגה לאישור ולפני כל העלאה חיה.

## איך בודקים

הרץ ספירות grep על הקובץ שנערך והשווה לערכים הנעולים:

```bash
grep -c "GTM-NXRL4W23" <file>          # חייב = 2 (script + noscript)
grep -c "frzwgajh" <file>              # Make hook — חייב = 1
grep -c "972537142298" <file>          # וואטסאפ — בדוק מול הספירה לפני העריכה (בד"כ 5)
grep -c 'id="contact"' <file>          # טופס הלידים — חייב = 1
grep -c "handleFormSubmit" <file>      # פונקציית הטופס — חייב = 2 (הגדרה + onsubmit)
grep -c "thank-you" <file>             # redirect — חייב ≥ 1
grep -c "fbq" <file>                   # פיקסל — חייב = 0 (אין פיקסל בדפים)
grep -c "hreflang" <file>              # חייב = 2 (he + en)
grep -c "Template Name" <file>         # תבנית וורדפרס — חייב = 1
```

בדיקות נוספות:
- **`source:`** של הטופס נשאר נכון (`אתר - דף הבית` בעברית / `אתר - דף אנגלית` באנגלית) — לא הוחלף.
- **JS תקין:** הרץ `node -e "new Function(<script content>)"` על בלוקי ה-script ששונו.
- **RTL (דף עברי):** `dir="rtl"` קיים ב-html.

## כללי ברזל

1. **סנאפשוט לפני** — אם אין סנאפשוט של הדף ב-`eitan-seo/snapshots/` מלפני העריכה, עצור וצור.
2. **ספירה לפני ואחרי** — אם ספרת לפני העריכה, ההשוואה חייבת להיות 1:1 על כל הנעולים.
3. **כל סטייה = עצירה** — אל תמשיך לאישור עם ספירה שגויה; דווח מה נשבר ותקן קודם.
4. אלמנטור — לא נוגעים (Standing Rule #3). האתר הוא HTML ידני של ניר.

## אחרי העלאה חיה (בנוסף לבדיקת הקובץ)

כשקובץ שעבר את הבדיקה הועלה בפועל לאתר (WP File Manager, עם גיבוי-שכפול קודם):

1. **תמיד host עם www** (`https://www.nirodigital.co.il`) — בדיקות על ה-apex נכשלות
   (גם בודק הפיקסל של מטא). WARP/VPN דלוק לגישת REST.
2. **משוך את הדף החי** ואמת שהסימנים החדשים קיימים ואין שגיאת PHP גלויה. גם `/en/` אם רלוונטי.
3. **מובייל — הבאגים שנלמדו:** כל hover עטוף ב-`@media (hover: hover) and (pointer: fine)`
   (אחרת נתקע במגע); מרקיזה בדף RTL חייבת `direction: ltr` על הקונטיינר; מהירויות 22s
   מחשב / 13s מובייל עם שני tracks סימטריים.
4. **אם השתנה head/תגיות:** משוך `https://www.googletagmanager.com/gtm.js?id=GTM-NXRL4W23`
   ואמת שהטריגרים קיימים (תנאי contains הוא case-sensitive — `thank-you` ולא "Thank You").
5. **אם השתנה הטופס:** ריצה מקצה-לקצה דרך הסקיל `make-scenario-check`.
6. תעד ב-`eitan-seo/Memory/changelog.md`: מה שונה, אילו בדיקות עברו, איפה הסנאפשוט.

## פלט

טבלה קצרה: אלמנט | ציפייה | בפועל | ✓/✗ — ומסקנה אחת: "הדף שלם" או "נשבר X, מתקן".
