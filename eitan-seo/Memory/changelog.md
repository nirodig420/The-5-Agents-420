# Changelog — לוג ההמלצות, האישורים והשינויים של איתן

לוג מתמשך של כל מה שאיתן המליץ, מה אושר, ומה בוצע בפועל. רשומות חדשות למעלה.

**פורמט רשומה:**
```markdown
## YYYY-MM-DD | <נושא/ביטוי>
**פעולה:** <מה בוצע>
**מילות מפתח:** keyword1, keyword2
**מתחרה יעד:** <מי מדורג מעלינו ולמה>
**השפעה צפויה:** <דירוג/תנועה/המרה>
**נכס:** <filename או URL>
---
```

---

## 2026-06-19 | חיזוק עמיד לפרסור `.env` בסקיל `wp-rest` (ערך עם רווחים)
**פעולה:** ניר ביקש לסדר לתמיד. שני תיקונים:
1. **`.env`** — ערך `WP_APP_PASSWORD` (Application Password של WP, מכיל רווחים) נעטף ב**מרכאות כפולות** דרך regex replace ב-PowerShell שלא מדפיס את הערך. אומת QUOTED בלי לחשוף את הסוד.
2. **`.claude/skills/wp-rest/SKILL.md`** — בלוק האתחול עודכן ל-helper `Get-EnvValue` עמיד: חילוץ הערך → Trim → **הסרת מרכאות עוטפות אופציונליות** (`"` או `'`) → Trim נוסף. חל על שלושת הערכים (`WP_USERNAME`, `WP_APP_PASSWORD`, `WP_SITE_URL`). הפרסור עובד עכשיו גם מצוטט, גם לא, וגם עם רווחים בתוך הערך.
**אימות:** `test-auth` דרך הלוגיקה החדשה החזיר **OK — NIRO (id=1, administrator)**. הסיסמה פורסרה ל-29 תווים (31 כולל 2 המרכאות → strip תקין). הסוד לא נחשף בשום פלט.
**השפעה צפויה:** עמידות תפעולית — אין יותר שגיאת shell בטעינת `.env`; כל סשן עבודה חי באתר נטען חלק.
**נכס:** `.env`, `.claude/skills/wp-rest/SKILL.md`
---

## 2026-06-19 | שדרוג עמוד התודה האנגלי `/en/thank-you/` — קרוסלת 5 האוטומציות
**פעולה:** ניר אישר. שתי פעולות חיות על Page id=519 דרך `wp-rest`:
1. **העלאת 6 סליידים ל-Media** (`POST wp/v2/media`) → `/wp-content/uploads/2026/06/`, שמות מדויקים **בלי re-name `-1`** (אומת ב-`media_details.file` ו-slug): `2026-06-11-5-automations-slide-1..6.png` = media id 521–526. כל ה-full PNGs מחזירים **200 image/png**.
2. **PATCH ל-Page 519** (`content` חדש, status=publish): כרטיס התודה הקיים + **קרוסלת 5 האוטומציות** (6 סליידים: שער + 5 ממוספרים, חיצים/נקודות/swipe/keyboard) + כפתור PDF + WhatsApp + FB/IG. עטוף ב-**Gutenberg `wp:html` block** (השיטה שעוברת סניטציה). PATCH=200.
- **אומת חי (GET 200, 86,665B):** 6 הפניות לסליידים ✅, `#niro5c` + JS init + חיצים + נקודות ✅, כפתור PDF (`NIRO-5-Automations-EN.pdf` → 200 application/pdf) ✅, WhatsApp (`wa.me/972537142298`) ✅, FB ✅, IG ✅, **fbq=False** ✅. הסניטציה לא הסירה `<script>`/`<style>` (rendered 12,388B).
- **Elementor:** אומת ש-`_elementor_edit_mode=""` — הדף **לא** בנוי ב-Elementor, בטוח לעריכת REST.
- **גיבוי:** סנאפשוט טרי של ה-content הקודם → `eitan-seo/snapshots/page-519-en-thankyou-2026-06-19-000437.json` (בנוסף ל-`thank-you-en-content.html` הקיים).

**מילות מפתח:** (עמוד טכני — noindex רצוי; thank-you, en funnel, 5 automations)
**השפעה צפויה:** המרה — הליד האנגלי מקבל "וואו" ויזואלי מיד אחרי הטופס: קרוסלה שמראה בדיוק מה הוא מקבל + מגנט PDF + ערוץ WhatsApp ישיר + מעקב סושיאל. מחזק אמון ומגדיל הורדות מגנט/פניות.
**נכס:** Page id=519 — https://www.nirodigital.co.il/en/thank-you/ | מקור תוכן: `C:\markting\אתר הבית\לוגו לאתר\תמונות לאתר באנגלית\thank-you-en-UPGRADED.html` | Media id 521–526
---

## 2026-06-18 | יצירת עמוד התודה האנגלי `/en/thank-you/` דרך REST (אוטומטי)
**פעולה:** ניר אישר פריסה. נוצר עמוד WordPress חדש דרך `wp-rest` (REST `wp/v2/pages`), חי ופורסם:
- **Page id=519**, slug=`thank-you`, **parent=462** (העמוד `/en/`) → URL `https://www.nirodigital.co.il/en/thank-you/`. status=publish. כותרת "Thank You".
- תוכן = ה-HTML+CSS המלא מתוך `NIRO-English-ThankYou-Package.md` (בלי עטיפת PHP/shortcode). PDF link הוחלף ל-`/wp-content/uploads/2026/06/NIRO-5-Automations-EN.pdf`. WhatsApp/FB/IG אומתו. **בלי fbq.**
- **אומת חי (GET 200):** ty-en-card ✅, `<style>` נטען ✅, WhatsApp/FB/IG/PDF ✅, fbq=False ✅.

**הערה טכנית חשובה (לפעמים הבאות):** יצירה ראשונית עם HTML גולמי נכשלה — REST core מפעיל `wp_kses` על תוכן גם כש-`unfiltered_html=True` (היכולת לא חלה על Application Password ב-REST), וכל ה-`<div>`/`<style>` נמחקו ל-content ריק. **הפתרון שעבד:** עטיפת התוכן ב-Gutenberg Custom HTML block — `<!-- wp:html --> ... <!-- /wp:html -->`. כך ה-`<style>` וה-HTML הגולמי נשמרים במלואם (raw=4077B). **כלל לעתיד:** כל תוכן עם `<style>`/HTML גולמי דרך REST → לעטוף ב-`wp:html`.

**template:** נוצר בלי שדה `template` ייעודי — ה-CSS של הדף הוא `position:fixed; width:100vw; height:100vh; z-index:999999` שמכסה כל header/footer של ה-theme, כך שהדף נקי בלי קשר לתבנית. אין צורך בתיקון ידני.

**מילות מפתח:** (עמוד טכני — noindex רצוי; thank-you, en funnel)
**השפעה צפויה:** המרה — סגירת לולאת המשפך האנגלי. ליד אנגלי שממלא טופס ב-`/en/` כבר לא נופל ל-404; מגיע לדף תודה עם מגנט PDF + WhatsApp + סושיאל.
**נכס:** Page id=519 — https://www.nirodigital.co.il/en/thank-you/ | תוכן: `eitan-seo/snapshots/thank-you-en-content.html`
---

## 2026-06-18 | פריסת דף הבית האנגלי החדש (REDESIGN) — העלאת נכסים + חבילת הדבקה
**פעולה:** ניר אישר פריסה. בוצע אוטומטית דרך `wp-rest` (REST API, WARP פעיל):

**מה בוצע אוטומטית (חי):**
- `test-auth` ✅ — מחובר כ-NIRO (id=1, administrator). SAM/בזק לא חסם (WARP פעיל).
- **8 נכסים הועלו ל-Media** ב-`/wp-content/uploads/2026/06/` בשמות מדויקים שהדף מצפה להם:
  - `niro-hero-banner-en.png` (id=511), 5 פילרים (id=512–516: ai-agents/make/manychat/crm/ai-chatbots),
    `nir-portrait.jpg` (id=517), `NIRO-5-Automations-EN.pdf` (id=518).
  - אומת מראש שאף אחד לא קיים → אין re-name עם סיומת `-1`; השמות נקיים.
- **סנאפשוט** של דף `/en/` (id=462) נשמר ב-`eitan-seo/snapshots/page-462-en-2026-06-18-135011.json`
  (contentLen=0 — דף מונע-תבנית, התוכן יושב בקובץ ה-theme `template-en.php`).

**מה נותר לניר ידנית (REST לא דוחף קבצי theme):**
1. **סנאפשוט theme** — להוריד עותק של `template-en.php` הקיים מ-WP File Manager לפני הדבקה.
2. **הדבקת הקוד** — להחליף את תוכן `template-en.php` בתוכן `template-en-REDESIGN.php`.
3. **ליצור עמוד `/en/thank-you/`** — לא קיים כיום (יש `/thank-you/` Elementor + `/niro_thank-you/` עברית).
   הטופס בדף החדש מפנה ל-`/en/thank-you/` → בלעדיו ליד אנגלי נופל ל-404.
4. **Make `6142278` → ON** — דרך ראובן (Make MCP). לא ניתן לבדוק/להפעיל מצד איתן.

**דגלי אי-התאמה לבריף (סומנו לניר):**
- הדף `/en/` משתמש בתבנית `template-en.php` — לא בתבנית בשם "English Homepage". ההדבקה
  צריכה להיכנס לתוך `template-en.php` (אליו הדף כבר מקושר), לא ליצור קובץ חדש.
- ה-QR: הבריף ביקש `zite-qr-code.png` כתמונה, אך הקובץ מפנה ל-QR כ**קישור טקסט** ל-`rquam9hney.zite.so`
  בלבד (אין `<img>` של QR). לכן `zite-qr-code.png` **לא הועלה** (לא נדרש ע"י הדף). אם רוצים QR
  כתמונה — צריך עדכון בקוד הדף + העלאה. ממתין להחלטת ניר.
- ה-PDF נמצא ב-`...\תמונות לאתר באנגלית\NIRO-5-Automations-EN.pdf` (לא ב-`C:\markting\` כמצוין בבריף).

**השפעה צפויה:** עליית דף הבית האנגלי המעוצב מחדש → חוויית מותג עקבית ב-`/en/`, hreflang תקין,
משפך לידים אנגלי אטום (טופס → Make → Airtable → דף תודה + מגנט PDF).
**נכס:** `template-en-REDESIGN.php`, Media id=511–518, snapshot page-462-en-2026-06-18-135011.json
**סטטוס:** 🟡 נכסים עלו חי; הדבקת theme + עמוד תודה + Make ON — ידני ע"י ניר.
---

## 2026-06-15 | משפך `/en/` — תיקון טופס אנגלי + דף תודה אנגלי (מגנט PDF + וואטסאפ)
**פעולה:** הוכנה חבילת הדבקה מלאה (מוכן-להדבקה, **ממתין לביצוע ידני של ניר** דרך WP File Manager).
ניר אישר: מגנט PDF "5 Automations Every Business Needs" + כפתור וואטסאפ + עמוד תודה ב-`/en/thank-you/`.

**מה הוכן (לא בוצע חי — ניר מדביק ידנית):**
- **תיקון הטופס** ב-`template-en.php`: החלפת `handleFormSubmit` המזויף (setTimeout) בגרסה
  ששולחת POST **`application/x-www-form-urlencoded`** (עוקף CORS preflight, כמו שעבד בעברית)
  ל-webhook `frzwgajh6u8nxhw3ba7dljfewnjg16qt`, עם 4 שדות + `source: "אתר - דף אנגלית"`,
  ומפנה ל-`/en/thank-you/`. טקסטים באנגלית ("Sending..." / "Oops, please try again").
- **עמוד תודה אנגלי**: shortcode `niro_thank_you_en` ל-functions.php — תודה + כפתור הורדת PDF
  (placeholder לקישור עד שיובל מסיים עיצוב) + כפתור וואטסאפ `972537142298` + FB/IG.
  עמוד WP עם slug `/en/thank-you/` שמכיל את ה-shortcode בלבד.

**שינויים מהצעת אנצ'לוטי (יישור לפרטים המאושרים + לקחים):**
- וואטסאפ עודכן ל-`972537142298` (אנצ'לוטי השתמש ב-`972559322991`).
- ה-fetch הוסב מ-JSON ל-urlencoded (לקח מ-06-14 — JSON זרק CORS preflight בעברית).
- שורת `fbq('track','Lead')` **הושמטה** — הדף האנגלי טוען GTM בלבד, אין `fbq` ב-head;
  קריאה אליו תזרוק ReferenceError. אם ניר ירצה Lead event — דרך GTM dataLayer.push.

**דגל אזהרה לניר:** דף הוא theme PHP ידני (לא Elementor) → נגיעה בטוחה, Elementor לא דורס.
**השפעה צפויה:** אטימת דליפת לידים ב-`/en/` (כל ליד אנגלי כיום נעלם) + מגנט ערך = הדדיות מיידית
+ פילוח מקור (`אתר - דף אנגלית`) מול העברית ב-Airtable.
**נכס:** `template-en.php`, functions.php (shortcode `niro_thank_you_en`), `Proposals/2026-06-15-english-thankyou-funnel.md`
**סטטוס:** 🟡 מוכן-להדבקה, ממתין לביצוע ידני של ניר.
---

## 2026-06-14 | סאגת חיבור טופס הלידים → Make → Airtable (כולל תקרית "לולאת הקונסול")
**פעולה:** תיקון דליפת הלידים מקצה-לקצה + בניית צינור Make→Airtable + ניקוי תקרית.

**מה נבנה:**
- **תיקון הטופס (theme):** הוחלפה הפונקציה `handleFormSubmit` ב-`hello-elementor/front-page.php`
  (התֵמה הפעילה — לא OceanWP). במקום לזייף "נשלח בהצלחה", היא עכשיו שולחת POST
  (`application/x-www-form-urlencoded` כדי לעקוף CORS preflight) ל-webhook של Make,
  מתייגת `source: "אתר - דף הבית"`, ומפנה ל-`/niro_thank-you/`.
- **תרחיש Make** `6142278` ("חיבור טופס לידים (אתר+מטא)🤖"): Custom Webhook (hook `3212489`)
  → Airtable Create Record (base `appIokNx1jGPhws7W`, table `tblcgQYQ8wIDUVOi9`).
  ממופים כל 5 השדות: שם/טלפון/אימייל/הודעה + **מקור ← `{{1.source}}`** (אומת ב-API שנשמר).

**תקרית "לולאת הקונסול" (הלקח החשוב):**
- לבדיקות השתמשנו ב-`setInterval` שיורה ל-webhook מהקונסול בדפדפן. הלולאה נשארה רצה
  ברקע ויצרה שורת "בדיקת קונסול" כל ~2 דקות, ~14 שעות רצוף (06-11 11:03 → 06-12 01:22),
  ~430 שורות זבל ב-Airtable. כל ה"הצלחות" שראינו באותו זמן היו הלולאה — **לא טופס אמיתי.**
- `clearInterval` שניר הריץ נכשל כי רץ בטאב הלא-נכון. נפתר ע"י הריגת תהליך Chrome (62 תהליכים)
  מצד המערכת. (בפועל הלולאה כבר עצרה לבד יומיים קודם כשהמחשב נכנס לשינה.)
- ניר ניקה את שורות הזבל ידנית (Filter → שם לקוח = "בדיקת קונסול" → Delete all).

**מצב נוכחי:** תרחיש Make = **OFF** (`isActive: false`), מיפוי שלם ושמור, זבל נוקה, לולאה מתה.
**ממתין:** בדיקה אמיתית אחת מקצה-לקצה (טופס אמיתי באתר, **לא** קונסול) שתאשר ליד יחיד עם
`מקור = "אתר - דף הבית"`. ה-`/en/` (`template-en.php`) טרם תוקן באותו אופן.
**לקח לעתיד:** לעולם לא לבדוק טפסים עם `setInterval` בקונסול — רק שליחה ידנית בודדת.
**נכס:** `hello-elementor/front-page.php`, Make scenario `6142278`, `eitan-seo/reference/form-patch.md`
**סטטוס:** 🟡 מוכן לבדיקה חיה סופית.
---

## 2026-06-10 | חיבור ראשוני + אודיט אתר (קריאה בלבד)
**פעולה:** test-auth + מיפוי דפים + קריאת קוד המקור. לא בוצע שום שינוי חי.
**ממצאים:**
- ✅ חיבור עובד: מחובר כ-NIRO (id=1, administrator) דרך `https://www.nirodigital.co.il` (חובה `www`; non-www עושה 308 ומפיל את ה-Authorization). דורש WARP/VPN — אבטחת בזק (SAM) מיירטת TLS אחרת.
- האתר **כתוב ידנית** (theme `front-page.php` + `template-en.php` + shortcode `[niro_thank_you]`), לא Elementor. דפי האלמנטור הכפולים = שאריות ישנות. ראה `eitan-seo/reference/README.md`.
- 🚨 **טופס הלידים לא מחובר לכלום** — `handleFormSubmit()` מזייף "נשלח בהצלחה" ועושה reset, בלי לשלוח לשום מקום. אין Airtable/Make/מייל. ניר אישר: לידים לא מגיעים. **דליפת לידים פעילה.**
**השפעה צפויה:** תיקון הטופס = עצירת אובדן לידים (המרה ישירה).
**נכס:** eitan-seo/reference/README.md
**סטטוס:** ⏸️ תיקון הטופס (חיבור Make→Airtable) הוקפא לבקשת ניר; ימשך בהמשך.
---
