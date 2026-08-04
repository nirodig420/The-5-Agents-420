# עמוד חבילות — טיוטות מוכנות לאישור ניר (2026-07-29)

> **עדכון 2026-08-03 (כלל ברזל חדש של ניר):** שום מחיר בערוצים מול לקוחות. כל המחירים,
> אזכורי המע"מ ושאלת המע"מ הוסרו משתי הטיוטות והוחלפו בקופי "המחיר נקבע באפיון אישי"
> עם ניתוב לשיחת אבחון קצרה בחינם. הכותרות עודכנו ל"חבילות אוטומציה לעסקים" /
> "Automation Packages", מטא Rank Math הוחלף בהתאם. סעיף "מה יש בעמודים" למטה משקף
> את הגרסה הישנה בכל הנוגע למחירים. סנאפשוטים לפני: `page-537/538-packages-2026-08-03-114804.html`.

> **עדכון מצב (2026-07-29 ערב):** ניר אישר פרסום. התמונות של יובל שולבו בשני העמודים
> (media 555 = חיוב, 556 = גן; alt בעברית/אנגלית בתגי ה-img) והתוכן הסופי אומת בוורדפרס
> (rawLen תואם מקור). **פעולת הפרסום עצמה נחסמה על ידי מערכת ההרשאות של Claude Code**
> (auto mode classifier) — שני העמודים עדיין draft. שתי דרכים לסיים:
> 1. **ידני (הכי מהיר):** wp-admin → Pages → "חבילות ומחירים" (537) ו-"Packages & Pricing"
>    (538) → Publish לכל אחד. שתי לחיצות, התוכן כבר סופי.
> 2. **דרך איתן:** להוסיף הרשאת Bash מתאימה בהגדרות ואז להריץ את פקודת הפרסום למטה.
> אחרי הפרסום: להריץ את בדיקת האימות (סעיף למטה) או לבקש מאיתן.

## מה קיים עכשיו בוורדפרס (סטטוס: draft, לא חי)

| שפה | Page ID | Slug | כתובת אחרי פרסום | הערות |
|---|---|---|---|---|
| עברית | **537** | `packages` | `https://www.nirodigital.co.il/packages/` | RTL, טופ-לבל |
| אנגלית | **538** | `packages` (parent=462) | `https://www.nirodigital.co.il/en/packages/` | LTR, בן של `/en/` |

תצוגה מקדימה (דורש התחברות ל-wp-admin):
- HE: `https://www.nirodigital.co.il/?page_id=537&preview=true`
- EN: `https://www.nirodigital.co.il/?page_id=538&preview=true`

קבצי המקור של התוכן (עותק 1:1 של מה שיושב בטיוטות):
- `packages-he-content.html`
- `packages-en-content.html`

## מה יש בעמודים
- מערכת העיצוב של האתר (Heebo, פלטת הצבעים, כפתורי CTA, כרטיסים) — עטוף ב-`wp:html`,
  ה-CSS כולו בתחביר `npk-` ומכסה את כרום התבנית (אותה שיטה שעבדה ב-`/en/thank-you/`).
- GTM-NXRL4W23 מוטמע בעמוד (העמודים הרגילים לא מקבלים אותו מהתבנית).
- hreflang he↔en מוזרק ל-head בסקריפט קטן + סכמת FAQPage (JSON-LD).
- שלוש החבילות במחירים המאושרים + "בתוספת מע"מ" ליד כל מחיר, טבלת השוואה,
  שני מקרי לקוח עם מקום מסומן לתמונה (`IMAGE_SLOT` בהערות HTML), FAQ,
  CTA יחיד: אבחון אוטומציה חינם → הטופס בדף הבית (`/#contact` או `/en/#contact`) + שורת וואטסאפ 972537142298.

## פרסום אחרי אישור ניר (פעולה אחת דרך wp-rest)
```powershell
# אחרי בלוק האתחול של הסקיל wp-rest:
foreach ($id in @(537,538)) {
  $body = @{ status = 'publish' } | ConvertTo-Json
  Invoke-RestMethod -Uri "$WP_API/pages/$id" -Headers $WP_HEAD -Method Post `
    -ContentType 'application/json; charset=utf-8' -Body $body | Select-Object id, status, link
}
```
אחרי הפרסום: לוודא 200 בשתי הכתובות + להריץ site-integrity-check.

## שילוב התמונות של יובל (כשמוכנות)
בכל קובץ יש שני מקומות מסומנים: `IMAGE_SLOT: case-billing` ו-`IMAGE_SLOT: case-kindergarten`.
מעלים את התמונה ל-Media, מחליפים את ה-`<div class="npk-case-media">...</div>` שמתחת להערה ב:
```html
<img class="npk-case-img" style="width:100%;height:240px;object-fit:cover;display:block;" src="<URL מהמדיה>" alt="<תיאור>">
```
ומריצים update לעמוד (עם הלקח למטה!).

## ⚠️ לקח טכני קריטי לכל עדכון עתידי דרך wp-rest (PowerShell 5.1)
מחרוזת שמגיעה מ-`Get-Content -Raw` נושאת מאפייני ETS, ו-`ConvertTo-Json` הופך אותה
לאובייקט `{value:..., PSPath:...}`. וורדפרס עונה 200, מקפיץ modified, אבל **מתעלם מהתוכן**
(content נשאר ריק/ישן). החובה:
```powershell
[string]$html = [string](Get-Content "file.html" -Raw -Encoding utf8)
```
ולאמת שאורך `content.raw` בתשובת ה-POST שווה לאורך המקור. מומלץ להוסיף את זה לסקיל `wp-rest`.
