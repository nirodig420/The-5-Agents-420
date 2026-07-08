# זיכרון אמציה — Changelog (אישורים + ביצוע בפועל)

לוג מתמשך של מה שאושר ובוצע בפועל. נכתב **רק אחרי "אשר"** מראובן.

> פורמט לכל רשומה:

```markdown
## YYYY-MM-DD | <תרחיש/בוט/חיבור>
**פעולה:** <מה נבנה/הופעל — Scenario / Flow / חיבור API>
**כלי:** Make / ManyChat / Airtable / API ישיר
**אישור:** אחרי "אשר" מראובן
**סיכון/עלות:** <Operations / rate limits / הערות>
**נכס:** <שם Scenario / Base / filename או URL>
---
```

## 2026-06-18 | אסי — בוט אישור (MVP מסלול C) — שלב 1: בסיס Airtable
**פעולה:** בנייה חיה של בסיס הטבלה ללולאת האישור של "אסי", על הטבלה הקיימת (לא טבלה חדשה).
- הוספת שדה `approval_token` (singleLineText) — id `flddMWdAUU4Oc1SS0`.
- הוספת שדה `whatsapp_message_id` (singleLineText) — id `fldafbYBuijqmW1gv` (מוכן לשלב WhatsApp).
- הוספת 2 אפשרויות ל-singleSelect "סטטוס" (`fldRHCXAS6G9EDZ81`): "נשלח לאישור" (`selOwCiteywUDIC6e`), "נדחה" (`selts8VBidlQP790r`).
- יצירת רשומת דמה לבדיקה: `recjXtxuU3R9eP7vF` (סטטוס "נשלח לאישור", token "asi-demo-token-001").
**כלי:** Airtable (MCP — ראובן הריץ)
**אישור:** אחרי "מאשר" מניר (2026-06-18)
**סיכון/עלות:** אפס — כל השינויים הוספתיים והפיכים, לא נמחק מידע. (צבע 2 האפשרויות החדשות אוטומטי=כחול; קוסמטי.)
**נכס:** Base `appKMXCuAfdJCIery` › Table `tbly7JDCmOnY36GoJ` (שם "לידים", בפועל טבלת תוכן-לאישור).

## 2026-06-18 | אסי — תרחישי Make: טיוטה + אימות (טרם נבנו חי)
**פעולה:** הופקו 2 Blueprints + מדריך בנייה ל-`amatzia-automation/blueprints/`. **אומתו מול Make MCP:**
- ✅ ולידציית סכימה עברה לשני התרחישים (`validate_blueprint_schema`).
- ✅ שמות מודולי Airtable v3 אומתו אמיתיים: `TriggerWatchRecords` / `ActionSearchRecords` / `ActionUpdateRecords`.
- ⚠️ **ממצא לתיקון:** `airtable:TriggerWatchRecords` עוקב אחרי **View** ודורש שדה "Created Time"/"Last Modified Time" — **לא** עובד לפי `formula` כפי שנכתב בטיוטה. אין שדה כזה בטבלה ו-MCP לא יוצר אותו. → להחליף טריגר A ל-**Search Records מתוזמן** (פולינג כל 15 דק' על סטטוס="נשלח לאישור" + approval_token ריק), או Airtable Automation→webhook.
**כלי:** Make (MCP — קריאה/ולידציה בלבד; אין יצירת Scenario ב-MCP → ניר מייבא/בונה בעורך).
**אישור:** רק אחרי "אשר" על התרחיש המתוקן.
**סיכון/עלות:** —
**נכס:** `amatzia-automation/blueprints/asi-scenario-A-send.json`, `asi-scenario-B-receive.json`, `asi-build-guide.md`.
---

## 2026-06-23 | אסי-לידים שלב 1 — הוספת שדות CRM (פעולה חיה)
**פעולה:** הוספת 3 שדות לטבלת הלידים (הוספה בלבד, לא שונו/נמחקו שדות קיימים, לא נגעו 428 הלידים):
- `תחום העסק` (singleLineText) — id `fldosVoJVycs0fMwA`.
- `אינטראקציות` (multilineText) — id `fldKeeYirCQVu8T6L` (שלב 1 = טקסט append; שלב 2 = Linked Record).
- `גוף הודעה שנשלח` (multilineText) — id `fldwUaUO3qTgStfop` (audit להודעה שיצאה).
**כלי:** Airtable (MCP — ראובן הריץ).
**אישור:** אחרי "אשר" מניר (2026-06-23) — תהליך A (בנייה ביחד בעורך).
**סיכון/עלות:** אפס — הכל הוספתי והפיך.
**נכס:** Base `appIokNx1jGPhws7W` › Table `tblcgQYQ8wIDUVOi9` (טבלת לידים אמיתית).
**קופי המייל:** `Output/2026-06-23-warming-email-fillout-lead.md` (יעל). link הפגישה = משתנה `booking_link` (Data Store `niro-config`, ממתין ל-Calendly).
**הבא:** בניית התרחיש בעורך Make (Fillout→חיפוש→Router→Create/Update→Gmail→תיעוד). טרם נבנה.
---

## 2026-07-05 | בריף יומי GA4→Telegram — דיבוג ותיקון (תרחיש 6384652)
**פעולה:** אובחנו ותוקנו 2 באגים בתרחיש הקיים (ניר תיקן בעורך לפי הנחיה):
1. **`{{join(2.array; )}}` בהודעת Telegram → הדפיס `{object}`.** תוקן ל-`{{<aggregator>.text}}` (בדיוק הטעות המתועדת ב-api-reference — Text aggregator מוציא `text`, לא join על array).
2. **מיפוי `{{7.medium}}`/`{{7.campaignName}}` באגרגטור → ריקים**, כי ה-dimensions בדוח הם `sessionSourceMedium`/`sessionCampaignName`. תוקן למיפוי session*.
3. תקלת משנה בדרך: מחיקת האגרגטור יצרה ID חדש → Telegram הפנה ל"מודול 2 שלא קיים". לקח: **לערוך מודול, לא למחוק-ולבנות** (ההפניות נשברות).
**אימות:** Run once ב-11:43 — SUCCESS (3 ops), ההודעה הגיעה לטלגרם תקינה עם נתונים אמיתיים.
**סטטוס:** עובד; ממתין שניר ידליק ON (scheduling: יומי 20:00, interval 900 + restrict).
**כלי:** Make (MCP — קריאת blueprint/executions בלבד; התיקון ידני ע"י ניר).
**נכס:** Scenario `6384652` "🤖NIRO — בריף יומי GA4 → Telegram (20:00)".
---

## 2026-07-05 | Apify — הצעת חיבור למעקב מתחרים (הצעה בלבד, טרם אושר)
**פעולה:** מחקר מאומת + תוכנית חיבור Apify (MCP + מודול Make) ו-MVP: מעקב דירוגים שבועי
ב-Google Search Scraper על 10–15 מילות מפתח מגוגל ישראל (`countryCode: il`, `languageCode: he`),
הזנה ל-`eitan-seo/Memory/keywords.md`+`competitors.md` ולדיי'גסט של חן. **שום חיבור/ריצה לא בוצעו.**
**כלי:** Apify (MCP `https://mcp.apify.com` — מומלץ; חלופה: מודול Apify רשמי ב-Make לתזמון)
**אישור:** ממתין ל"אשר" מניר — כולל 2 צעדים ידניים שלו (פתיחת חשבון חינמי + `claude mcp add`)
**סיכון/עלות:** ~65 דפי SERP בחודש ≈ 0.12$ — בתוך 5$ הקרדיט החינמי החודשי → 0 ש"ח בפועל.
סקרייפינג ציבורי בלבד; Meta scrapers נדחו לשלב 2 (אזור אפור בתנאי השימוש).
**אימותים עיקריים:** google-search-scraper = 1.80$/1,000 דפי SERP, תומך גוגל ישראל+עברית;
Website Content Crawler = 0.2–5$/1,000 עמודים; Free plan = 5$/חודש בלי כרטיס אשראי, נחסם כשנגמר (לא מחייב).
**נכס:** `Proposals/2026-07-05-apify-integration-plan.md`
---
