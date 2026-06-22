# Changelog — משפכים של אנצ'לוטי

לוג כל המשפכים / מגנטי הלידים / דפי הנחיתה שאנצ'לוטי בנה (כפעולה מאושרת דרך רובן).
זיכרון מתמשך — נגד כפילות ולמעקב מה עבד.

פורמט הרשומה:

```markdown
## YYYY-MM-DD | <שם המשפך / מגנט הלידים>
**פעולה:** <מה נבנה — מגנט לידים / דף נחיתה / רצף מעקב / קמפיין>
**נקודת הדליפה שטופלה:** <איזו תחנה במשפך נאטמה>
**זרועות ששולבו:** חן / יעל / מריו / יובל / איתן
**נכס:** <filename או URL>
---
```

---

<!-- רשומות חדשות נכנסות מתחת לקו, מהחדש לישן -->

## 2026-06-18 | Hebrew Homepage (REDESIGN) — שכפול RTL מלא של הדף האנגלי
**פעולה:** שכפול 1:1 של הדף האנגלי המוגמר (`template-en-REDESIGN.php`) לדף בית עברי **RTL מלא** — לתצוגה מקדימה לפני העלאה (הצעה, לא חי). אותו עיצוב, אותו מבנה, אותם נכסים, כל הקופי תורגם לעברית בקול NIRO (Give-Value-First, חם, בטוח). תורגמו: Hero, About Nir, 5 הפילרים (Make/ManyChat/CRM/AI Chatbots/AI Agents + 4 הסוכנים), How It Works (4 צעדים), Proof (6 כרטיסים), 4 עדויות, 3 add-ons שיווקיים, 5 שאלות FAQ, המשפך האינטראקטיבי (4 שאלות + 3 תוצאות דליפה + מסלול "נקי"), 12 המודלים, הפוטר, ו-meta/schema.
**טיפול RTL:** `<html lang="he" dir="rtl">` + `body{direction:rtl}`. היפוך פריסה מלא — header (`right:0`, `margin-right`, `border-right`/`padding-right` בסושיאל, dropdown `right:0` + `text-align:right`), כרטיסים (`text-align:right` בפילרים/add-ons/עדויות), לוגו עדות (`right:30px`), `flagship-badge` ל-`left`, glow accents הפוכים, `modal-close` ל-`left:20px`, `modal-list` ל-`padding-right`, about-photo frame הפוך, `border-left`→`border-right`, צ'יפים (`chip-more` חץ `fa-arrow-left` + `translateX(-4px)`), כפתורים צפים הוחלפו (WA שמאל / נגישות ימין), `&raquo;`→`&laquo;`. ה-marquee נשאר `direction:ltr` (שמות מותג לועזיים). שדות טופס `text-align:right`.
**נקודת הדליפה שטופלה:** זהה לדף האנגלי — הדיאגנוסטיק ממפה את 6 התחנות ומזהה את הדולפת בפועל (מענה איטי / לידים מתפזרים / מעקב שלא קורה); כל תוצאה מסתיימת בכיוון חיובי (כאב → פתרון) ועושה scroll חלק לטופס היחיד `#contact`.
**טופס:** מחובר לאותו Make webhook (`...frzwgajh6u8nxhw3ba7dljfewnjg16qt`, urlencoded), **`source: "אתר - דף הבית"`** (מקור עברי), redirect ל-**`/niro_thank-you/`** (דף התודה העברי). WhatsApp `972537142298`. GTM נשמר, אין fbq.
**זרועות ששולבו:** אנצ'לוטי (שכפול+תרגום+RTL ישירות). לא נדרשו זרועות נוספות — מבנה וקול קיימים מהדף האנגלי המאושר.
**נכס:** `C:\markting\אתר הבית\לוגו לאתר\תמונות לאתר באנגלית\front-page-REDESIGN-HE.php` (הצעה לתצוגה מקדימה — **לא הועלה חי**)
---

## 2026-06-18 | English Homepage — 3 תיקוני ניר (לוגו כפול / טופס כפול / משפך אינטראקטיבי)
**פעולה:** עריכה in-place של הדף האנגלי לפי פידבק ניר. (1) **הסרת לוגו כפול** — `<img class="hero-logo">` הוסר מ-Hero (מרקאפ + CSS); לוגו רק ב-header. (2) **הסרת טופס כפול** — הטופס הסטטי "Send it to me" בסקשן המגנט הוסר כליל, יחד עם `handleMagnetSubmit` ו-source המגנט; נשאר **טופס לכידה יחיד** (`#contact`). (3) ⭐ **משפך אינטראקטיבי "Find Your Biggest Leak"** — דיאגנוסטיק JS וניל (IIFE) שהחליף את הסקשן הסטטי: 4 שאלות בלחיצה, progress bar, ספינר, מסך תוצאה מותאם עם מפת 6 תחנות והדליפה מודגשת. אקסנט פריווינקל `#8B7FE8` + זהב.
**נקודת הדליפה שטופלה:** הדיאגנוסטיק ממפה את כל 6 התחנות ומזהה את הדולפת בפועל (response / capture / follow-up) לפי תשובות הגולש; כל תוצאה מסתיימת בכיוון חיובי (כאב → פתרון) ומובילה ל-CTA. נקודת ההמרה: כל מסלול עושה **scroll חלק לטופס היחיד `#contact`** (לא טופס חדש) — Give-Value-First + מעורבות לפני המרה. QR ל-Fillout (`rquam9hney.zite.so`) כמסלול משני.
**אישור טופס יחיד:** `onsubmit=` ×1, `handleMagnetSubmit`=0, source מגנט=0. הדיאגנוסטיק לא שולח בקשות — רק scroll; ה-fetch היחיד הוא הטופס הנעול.
**נשמר 1:1 (אומת ב-grep + Node):** Template Name ×1, GTM ×2, Make hook ×1, urlencoded, source "אתר - דף אנגלית" ×1, redirect /en/thank-you/ ×1, וואטסאפ `972537142298` ×5, אין fbq, `img class="logo"` ×1 (header), `hero-logo`=0, רקע ה-Hero + 5 הפילרים+תמונות + מרקיזה — לא נגעתי. שני בלוקי `<script>` עברו `new Function()` ללא שגיאות.
**זרועות ששולבו:** אנצ'לוטי (ארכיטקטורה + UX/CSS + JS וניל + בקרת איכות). ממתין: איתן (העלאה חיה דרך wp-rest, סנאפשוט קודם — דף קריטי).
**נכס:** `C:\markting\אתר הבית\לוגו לאתר\תמונות לאתר באנגלית\template-en-REDESIGN.php` · הצעה: `Proposals/2026-06-15-en-homepage-redesign.md`
**סטטוס:** הצעה — לא עלה לאוויר. ממתין ל"אשר" מניר.
---

## 2026-06-18 | English Homepage — Lead Magnet Funnel Section
**פעולה:** הוספת סקשן "Lead Magnet Funnel" (Give-Value-First) לדף האנגלי, in-place. הצעת ערך: המדריך החינמי "5 Automations Every Business Needs" (PDF קיים), עם **2 דרכי המרה** להפחתת חיכוך — (A) טופס Name/Phone/Email, (B) QR → Fillout `rquam9hney.zite.so` + לינק ישיר. כרטיס יוקרתי, אקסנט פריווינקל `#8B7FE8` + זהב, split עם "OR" באמצע, רספונסיבי.
**נקודת הדליפה שטופלה:** תחנה 2 + תחנה 3 (הדליפה) — מציע נקודת המרה רכה לפני ה-CTA הכבד של האודיט, כך שליד שעוד לא בשל לא דולף; הוא לוקח את ה-PDF, נכנס ל-CRM, ומתבשל. שני מסלולים = פחות חיכוך = פחות נשירה.
**מיקום:** מיד לפני סקשן ה-Contact הסופי (`id="lead-magnet"` ← לפני `id="contact"`).
**חיבור המסלולים:** Route A מחובר לאותו Make webhook (urlencoded) אבל עם `source: "אתר - מגנט לידים אנגלי"` (מקור שונה להבחנה) ופונקציה נפרדת `handleMagnetSubmit` (אין התנגשות עם `handleFormSubmit`). שניהם redirect ל-`/en/thank-you/`.
**נשמר 1:1 (אומת ב-Node):** Template Name ×1, GTM ×2, וואטסאפ ×5, id=contact ×1, /en/thank-you/ ×3, source "אתר - דף אנגלית" קיים, אין fbq, Make hook ×2 (ראשי+מגנט), הלוגו/Hero/פילרים/מרקיזה לא נגעתי.
**זרועות ששולבו:** אנצ'לוטי (ארכיטקטורה + הרכבה + UX/CSS). ממתין: איתן (העלאת QR + וידוא PDF ב-`/en/thank-you/`, העלאה חיה דרך wp-rest), אמציה (וידוא ניתוב Make לפי source חדש).
**נכס:** `C:\markting\לוגו לאתר\תמונות לאתר באנגלית\template-en-REDESIGN.php` · הצעה: `Proposals/2026-06-15-en-homepage-redesign.md`
**סטטוס:** הצעה — לא עלה לאוויר. ממתין ל"אשר" מניר.
---

## 2026-06-17 | English Homepage Redesign (Automation & AI Agents as Hero)
**פעולה:** בנייה מחדש של דף הבית האנגלי (`Template Name: English Homepage`) כפרוטוטייפ/הצעה. הפיכת אוטומציה + סוכני AI לגיבור הראשי; שירותי השיווק ירדו לסקשן משני "Marketing add-ons". מסר העל: "Build a Business That Outworks Its Size" (וריאציית המנצחים של אמציה), מחוזק ב-Hero / פילר AI Agents / סקשן הסגירה.
**נקודת הדליפה שטופלה:** תחנה 2 (מקום אחד ברור) + תחנה 6 (סגירה) — כל CTA בדף מצביע להצעה אחת דומיננטית (Free Automation Audit → טופס #contact → Make → CRM). הדף עצמו מדגים תפיסת ליד אוטומטית.
**מבנה:** Hero → Trust strip → Value framing → 5 Pillars (AI Agents דגל/רוחב + Make/ManyChat/CRM/AI Chatbots) → Mid-page CTA → How It Works (4) → Proof (6) → Testimonials → Marketing add-ons → FAQ → Closing CTA/Contact → Footer.
**נשמר 1:1:** handleFormSubmit (POST ל-Make hook, urlencoded, source "אתר - דף אנגלית", redirect /en/thank-you/), id=contact, GTM-NXRL4W23, אין fbq, וואטסאפ wa.me/972537142298, נגישות, reveal, מודאלים, hreflang, פלטת מותג + Heebo.
**זרועות ששולבו:** אמציה (תוכן/scope אוטומציה) · אנצ'לוטי (ארכיטקטורה+הרכבה+UX/CSS). ממתין: יובל (Hero visual/וידאו), יעל (ליטוש microcopy אופציונלי), איתן (העלאה חיה דרך wp-rest אחרי אישור).
**נכס:** `C:\markting\template-en-REDESIGN.php` · הצעה: `Proposals/2026-06-15-en-homepage-redesign.md`
**סטטוס:** הצעה/פרוטוטייפ — לא עלה לאוויר. ממתין ל"אשר" מניר.
---
