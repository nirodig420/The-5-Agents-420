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

## 2026-07-12 | אסי — בוט אישורי תוכן בטלגרם — בנייה חיה מודרכת
**סטטוס: הושלם ✅ (2026-07-13) — שני התרחישים נבנו, נבדקו בשני המסלולים, פוסט הדמה נמחק.**

**החלטות ניר:** ערוץ = **טלגרם** (לא Green API — כפתורים לא יציבים). ממחזרים את בוט ה-GA4 הקיים (`Bot connection GA4`, chatId `352155152`) — הפוסטים לאישור מגיעים לאותו ערוץ של הדוח היומי; ניר אישר שזה תקין ומכוון.

**שדות CRM קיימים** (טבלה `tbloxDWRcAxlyi805` "יומן פרסום", base `appKMXCuAfdJCIery`):
`telegram_message_id` (`fldEhd4AnD5BVvugN`, דגל אנטי-כפילות), checkbox `✅ אושר על ידי ניר` (`fldHULkGg9kQO6uTf`), dateTime `אושר בתאריך` (`fldODGpVwQp4FZZlJ`), formula `RECORD_ID` (`fldt7v7sb2nk6eWLE`). סטטוס=`fldCJdhZbGydJtuzN`, choices: נשלח לאישור / מאושר / פורסם / נדחה / מאושר+פורסם.

**תרחיש 1 "🤖אסי — שולח לאישור (טלגרם)" — נבנה (3 מודולים):**
1. Airtable **Watch Records** — conn `NIRO-פתרונות אוטומציה`, "יומן פרסום", trigger field "עודכן לאחרונה", label "נושא", limit 10, **Formula** `AND({סטטוס}="נשלח לאישור", {telegram_message_id}="")`, From now on.
2. Telegram **Send a Text Message** — conn `Bot connection GA4`, chatId `352155152`, טקסט (נושא/ערוץ/קופי סופי), **Reply Markup** inline_keyboard 2 כפתורים: `callback_data`=`approve|{{RECORD_ID}}` / `reject|{{RECORD_ID}}`.
3. Airtable **Update a Record** — Record ID = RECORD_ID ממודול 1; כותב `telegram_message_id` = Message ID ממודול 2 (חותמת אנטי-כפילות).
**נבדק:** פוסט דמה `rec30AyMZLUi480tl` ("🧪 פוסט בדיקה — אסי, למחוק אחרי") → Run once → ההודעה + 2 הכפתורים הגיעו לטלגרם ✅. הכפתורים עדיין "לא מחוברים" עד תרחיש 2.

**תרחיש 2 "🤖אסי — קולט אישורים לפרסום מטא אורגני (טלגרם)" — נבנה חדש (2026-07-13), scenario `6544974`, hook `3384870`:**
הטיוטה הישנה `6291210` נמצאה ריקה — נבנה תרחיש חדש עם **Telegram Watch Updates** (לא Custom Webhook —
המודול רושם את ה-webhook בטלגרם לבד, בלי setWebhook ידני). זרימה:
1. Telegram **Watch Updates** (module id 3) — חיבור `Bot connection GA4`.
2. Filter על הקו "רק לחיצות כפתור": `{{3.callback_query.data}}` Exists (מסנן את הודעות הבריף היומי הרגילות).
3. Airtable **Get a Record** (module id 4): Record ID = `{{last(split(3.callback_query.data; "|"))}}`.
4. **Router** עם 2 מסלולים, שניהם עם שומר סטטוס `{{4.סטטוס}}="נשלח לאישור"` (הגנה מלחיצה כפולה):
   - approve → Update: סטטוס="מאושר" + checkbox ✅ + אושר בתאריך={{now}}.
   - reject → Update: סטטוס="נדחה" בלבד.
5. Scheduling: **Immediately** (max 100/דקה) + ON. הפרסום עצמו רץ דרך `6237903` הקיים שמפרסם שורות "מאושר".

**נבדק מקצה-לקצה:** approve → Airtable התעדכן (מאושר+checkbox+תאריך, אומת ב-MCP) · איפוס · reject → "נדחה" ✅.
לחיצה שנתקעה בתור עובדה אחרי המעבר ל-Immediately, ושומר הסטטוס סינן אותה כמצופה. queueCount=0.

**2 לקחים חדשים (להוסיף ל-make-scenario-check):**
1. מחיקה-ובנייה של מודול שינתה את המספר שלו (1→3) ושברה נוסחה — שוב המלכודת מהבריף היומי.
2. תרחיש webhook חדש נולד במצב **On demand** — לחיצות נערמות בתור ולא מעובדות. חובה לעבור ל-**Immediately**.

**נמחק:** פוסט הדמה `rec30AyMZLUi480tl` (2026-07-13, אחרי סיום הבדיקות).
**נסגר (2026-07-28):** תרחיש 1 השולח (`6537948`) תוזמן — ראה רשומת 2026-07-28 למטה.
**תוכנית מלאה:** `Proposals/2026-07-05-approval-bot-telegram-whatsapp.md`
---

## 2026-07-28 | לידים ממטא ← גוגל שיטס ← התראה (לקוח חדש), הצעה מאושרת לתכנון
**פעולה:** תוכנית תרחיש Make גנרית ללקוח חדש: Facebook Lead Ads (New Lead, Instant)
← Google Sheets Add a Row ← התראת וואטסאפ ללקוח (המלצה: WhatsApp Business Cloud
הרשמי; אימייל כשלב ביניים; Green API נפסל משיקולי תנאי שימוש). כולל מבנה גיליון
מיני-CRM, רשימת הרשאות נדרשות מהלקוח (אדמין לעמוד או OAuth של הלקוח,
leads_retrieval + pages_show_list + pages_manage_ads + pages_manage_metadata,
והקצאת Make ב-Leads Access בביזנס מנג'ר), מלכודות מ-make-scenario-check ותוכנית
בדיקה עם Lead Ads Testing Tool. **שום דבר לא נבנה ב-Make, תכנון בלבד.**
**כלי:** Make (תכנון בלבד)
**אישור:** ניר אישר את התוכנית (2026-07-28, דרך ראובן). בנייה חיה: רק אחרי "אשר"
נוסף כשיתקבלו פרטי הלקוח (שם, Page ID, Form ID, ערוץ התראה).
**סיכון/עלות:** 2 עד 3 אופרציות לליד, זניח. וואטסאפ Cloud API: סנטים להודעה.
**נכס:** Proposals/2026-07-28-meta-leads-to-sheets-new-client.md
---

## 2026-07-28 | אסי — סגירת הבוט: תזמון השולח (פעולה חיה)
**פעולה:** התרחיש השולח `6537948` עודכן מרחוק דרך Make MCP (`scenarios_update`):
- שם חדש: **"🤖אסי — שולח לאישור (טלגרם)"** (במקום "בוט- אסי וואטסאפ שלי🤖").
- תזמון: **weekly, ימים [0,2,4] = ראשון/שלישי/חמישי, 07:30** — 75 דק' לפני תרחיש הפרסום `6237903` (08:45). אומת בתשובת ה-API: `isActive: true`, ריצה הבאה 2026-07-30 07:30.
- 🔑 **תגלית:** ל-Make MCP יש עכשיו **הרשאות כתיבה** (scenarios_update/activate/run וכו'). ניסיון ראשון החזיר Insufficient rights וניסיון חוזר עבר — כנראה עדכון הרשאות שהתגלגל. חוק הברזל נשאר: פעולה חיה רק אחרי בקשה/"אשר" מפורשים מניר.
**כלי:** Make MCP (ראובן הריץ)
**אישור:** ניר ביקש במפורש ("תריץ אותו בכל יום ראשון,שלישי,חמישי בשעה 07:30")
**סיכון/עלות:** ~4 ops לכל פוסט שנשלח לאישור; התרחיש ישן בין ריצות.
**נכס:** Scenarios `6537948` + `6544974` — **בוט אסי סגור מקצה לקצה.**
---

## 2026-07-28 | אוטומציית חיוב חודשי לטל — נבנה, נבדק וחי (פעולה חיה, נבנה כולו מרחוק ב-MCP)
**פעולה:** תרחיש חדש **`6733573` "🤖NIRO — חיוב חודשי לטל (דרייב → וואטסאפ)"** נבנה במלואו דרך `scenarios_create` (ראשון שנבנה 100% מרחוק). זרימה:
1. Google Drive **Watch Files in a Folder** (conn `NIRO Google Drive` id `9359719`, vaishenker@gmail.com) על תיקיית `טל חשבוניות` בענן (`1QIfhYRnIdbBQaP9wFpOwvUsKQab_Ua4Z`), By Created Time, daily 10:00.
2. Filter "רק קבצי חיוב": name contains `חיוב_מאמנת` → **Get a File**.
3. Green API **SendFileByUpload** (conn `8529905`, instance 7107663961) → chatId `972549773321@c.us` (טל), caption עם `{{formatDate(now; "MM/YYYY")}}`.
4. Telegram דיווח הצלחה לניר (chatId 352155152).
**נבדק:** קובץ יולי הועתק ל-`G:\האחסון שלי\טל חשבוניות\` → סונכרן לענן (לקח ~10 דק', סבלנות!) → `scenarios_run` SUCCESS → הוואטסאפ + דיווח הטלגרם הגיעו לניר (בדיקה על המספר שלו 972537142298 = self-chat). אחרי אישור ניר הוחלף היעד לטל.
**לקחים:** (1) חיבור Google Drive ב-Make הוא סוג ייעודי — חיבורי google/Gmail קיימים לא מתאימים; (2) שולחן העבודה של ניר מגובה אוטומטית לדרייב תחת "מחשבים" — הקובץ עולה לענן גם בלי ההעתקה שלנו, אבל Make לא רואה תיקיות "מחשבים", לכן נשארה תיקיית My Drive ייעודית; (3) שליחת Green API מהמספר לעצמו עובדת ומופיעה ב"הודעות לעצמי".
**תלות נסגרה (באותו יום):** במקום לערוך את משימת ה-Cowork, נוצרה משימת Windows Task Scheduler **"NIRO - Tal billing copy to Drive"** (יומית 09:45) שמריצה את `C:\Users\NIr\שולחן העבודה\טל חשבוניות\copy-billing-to-drive.ps1`: מעתיקה כל `חיוב_מאמנת*.xlsx` חדש (לפי marker זמן ב-`last-copy-marker.txt`) מתיקיית שולחן העבודה לתיקיית הדרייב, עם לוג ב-`copy-log.txt`. נבדקה: "ran: no new billing files" (ה-marker אותחל להיום כדי לא לשלוח את יולי פעמיים). חיוב יולי (הגרסה המעודכנת, בשם הנקי) **נשלח לטל בפועל ואושר ע"י ניר**. ⚠️ לקח: סקריפט PS עם עברית חייב UTF-8 עם BOM; schtasks לא מקבל נתיב עברי ב-/TR ולא רשימת ימים ב-/SC MONTHLY.
**עדכון תזמון (לבקשת ניר, באותו יום):** הכל עבר מ"כל יום" ל-**28 ו-30 בחודש**: הסקריפט הועבר ל-`C:\Users\NIr\Scripts\copy-billing-to-drive.ps1` (נתיב ASCII; marker+log נשארו בתיקיית טל חשבוניות), נוצרו 2 משימות Windows — "NIRO - Tal billing copy to Drive (28)" ו-"(30)" ב-09:45 — ותרחיש Make `6733573` עודכן ל-monthly days [28,30] 10:00. אומת: משימת (30) רצה, ה-scheduling נקלט, isActive=true.
**אישור:** "מאשר" מניר (2026-07-28) + אישור מפורש אחרי הבדיקה.
**סיכון/עלות:** ~30 ops בחודש (ריצה יומית ריקה = 1 op). Green API חינמי (מגבלת 3 אנשי קשר — טל + ניר בפנים).
**נכס:** Scenario `6733573` · הצעה: `Proposals/2026-07-28-tal-monthly-billing-send.md`
---

## 2026-07-28 | שלב ב' טל — אישור וואטסאפ + SUMIT — בנייה בעיצומה (IN PROGRESS)
**הושלם עד כה:** ניר אישר ("אשר") את ההצעה Proposals/2026-07-28-tal-approve-invoices-sumit.md כולל ההחלטות בסופה.
1. הסקריפט copy-billing-to-drive.ps1 (ב-C:\Users\NIr\Scripts) מעתיק עכשיו גם חיוב_סיכום*.json.
2. פרטי SUMIT של טל ב-.env: SUMIT_COMPANY_ID=481639209 + SUMIT_API_KEY.
3. בקשת חיבור officeguy נוצרה ב-Make (requestId 64158d09-dd6d-417b-ba6a-de84335f5e1a, שם "SUMIT - טל המאמנת") — **ממתין שניר יאשר בקישור** https://eu1.make.com/1591144/credentials-requests/inbox?requestId=64158d09-dd6d-417b-ba6a-de84335f5e1a
4. גיליון מעקב Google Sheets נוצר: "טל - מעקב חשבוניות", id `1Xl9bsMIqQYmh6Op_YNcfYFaKaatJZfCqQXk9mKzTwTk` (בתיקיית הדרייב של טל), שורת כותרות: חודש, תאריך יצירה, לקוח, מפגשים, סכום כולל מעמ, סוג מסמך, מזהה מסמך SUMIT, סטטוס, הערות.
5. תרחיש השולח 6733573 שודרג: נוסף מודול green-api:SendInteractiveButtons (id 5) אחרי שליחת הקובץ — כפתורים "✅ מאשרת, הכל נכון" / "❌ יש תיקון", buttonId=approve|YYYY_MM / reject|YYYY_MM, chatId טל. אומת isActive=true.

**נשאר לבנות — תרחיש קולט חדש** "🤖NIRO — קולט אישור טל → חשבוניות SUMIT", תזמון daily 20:00:
M1 green-api:LastIncomingMessages (conn 8529905, onlyFrom=true, triggerOn=manual, chatId=972549773321@c.us, minutes=1440, limit 50; פלט: textMessage/idMessage/chatId) → M2 BasicRouter:
- מסלול אישור (filter: textMessage contains "מאשרת" OR equal "אשר"): searchForFilesFolders (conn 9359719, select=map, retrieve=file, searchType=title, operator="=", query=חיוב_סיכום_{{formatDate(now;"YYYY_MM")}}.json, folderId=1QIfhYRnIdbBQaP9wFpOwvUsKQab_Ua4Z, limit 1; 0 תוצאות=כבר טופל=dedup) → getAFile → json:ParseJSON (json={{toString(data)}}; מבנה JSON: root עם clients[]) → moveAFileIntoATrash (dedup; **לאמת סכימה לפני שימוש**) → הודעת אישור לטל (green-api SendMessage; **לאמת סכימה**) → טלגרם לניר → BasicFeeder על clients → filter billable=true → officeguy:CreateDocument (conn חדש אחרי אישור ניר; Type={{if(doc_type="invoice_receipt";"InvoiceAndReceipt";"Invoice")}}, IsDraft=true, Original=false, Language=Hebrew, Currency=ILS, CustomerName, UseExistingCustomers=Automatic, ItemName, Quantity=sessions, UnitPrice=unit_price, VATIncluded=vat_included) → google-sheets:addRow (conn 7162269, mode=map, spreadsheetId לעיל, sheetId=שם הטאב **לאמת ב-rpcSheet**, tableFirstRow=A1:Z1, values 0..8).
- מסלול דחייה (filter: contains "תיקון" OR equal "דחה"): טלגרם לניר "טל ביקשה תיקון".
**בדיקות מתוכננות:** JSON דמה עם לקוח בדיקה → run → טיוטה ב-SUMIT (למחוק) → שורה בגיליון. חשבונית אמיתית ראשונה רק באישור ניר.
**החלטות עסקיות:** מקבלים=ליטל, רויטל(InvoiceAndReceipt), דריה, מתנ"ס, ח"ץ, בית, כוכב, לימור, רבו. לא=יהונתן, שיר, חן (חן: 180 כולל מע"מ/45דק, ידני בינתיים). לוודא בטסט: InvoiceAndReceipt כטיוטה בלי פרטי תשלום.
---

## 2026-07-28 | שלב ב' טל — התרחיש הקולט נבנה והופעל (ממתין לבדיקת קצה)
**נבנה מרחוק:** Scenario `6739485` "🤖NIRO — קולט אישור טל → חשבוניות SUMIT", daily 20:00, ACTIVE ✅. 12 מודולים כמתוכנן (LastIncomingMessages מטל → Router → search JSON חיוב_סיכום_YYYY_MM (0=dedup) → getAFile → ParseJSON(clients[]) → trash → הודעה לטל → טלגרם לניר → Feeder → CreateDocument(conn SUMIT `9371268`, IsDraft, filter billable="true") → addRow(conn `7162602`, sheet "Untitled", spreadsheet `1Xl9bs...TwTk`) | מסלול דחייה → טלגרם).
**חיבורים:** SUMIT-officeguy `9371268` נוצר דרך credential request ואושר ע"י ניר; שני חיבורי Google (vaishenker) חודשו אחרי invalid_grant. **טאב הגיליון = "Untitled"** (אומת ב-rpcSheet).
**מוכן לבדיקה:** קובץ דמה `חיוב_סיכום_2026_07.json` (לקוח בדיקה - למחוק, 1×10₪+מע"מ) הונח ב-G:\האחסון שלי\טל חשבוניות. **הבדיקה דורשת הודעת "אשר" נכנסת מהצ'אט של טל** (הטריגר קורא רק הודעות ממנה) → ואז scenarios_run ידני. אחרי הצלחה: למחוק את טיוטת הדמה ב-SUMIT ואת שורת הבדיקה בגיליון.
**פתוח:** נוסח JSON רשמי למשימת Cowork (root: {month, clients:[{name,sessions,unit_price,vat_included,total,billable,doc_type}]}) — לוודא שהמשימה מייצרת בדיוק במבנה הזה. לוודא ש-InvoiceAndReceipt (רויטל) עובר כטיוטה בלי פרטי תשלום.
---

## 2026-07-28 (לילה) | שלב ב' טל — הושלם ונבדק על נתוני אמת ✅
**הבדיקה האמיתית עברה:** ריצה 23:45 יצרה **11 טיוטות חשבוניות אמיתיות** ב-SUMIT של טל (יולי 2026) + 11 שורות בגיליון "טל - מעקב חשבוניות": ליטל 2548.8 / רויטל 1132.8 (מס-קבלה!) / דריה 4672.8 / מתנס 2124 / חץ 1888 / בית 708 / כוכב 531 / לימור 1132.8 / רבו 566.4 / ויקי 708 / מעיין 708. יהונתן+שיר סוננו (billable=false) כמצופה.
**תיקונים שנדרשו בדרך (לקחים ל-make-scenario-check):** (1) פילטר אישור: טל כתבה "אישור" ולא "אשר" → contains אישור/מאשר; (2) moveAFileIntoATrash נפל על scopes (drive.file) → הוסר, dedup=שינוי שם קובץ אחרי עיבוד; (3) addRow דורש valueInputOption=USER_ENTERED; (4) InvoiceAndReceipt דורש PaymentType+PaymentAmount (נוסחת if לפי doc_type); (5) 🔑 **קבצים שהועלו דרך Drive MCP נכשלים ב-getAFile של Make ("alt media") — רק קבצים מסונכרני DriveFS עובדים**; (6) לכן התרחיש מכוון עכשיו לתיקיית ה-Desktop-sync `1AILS8CUiLWJAVOZxpMgMuPLnjLicEyDi` (סיכום חודשי שעות עבודה בענן) — אין צורך בהעתקת JSON בכלל.
**ניקיונות שנשארו לניר:** למחוק ב-SUMIT טיוטת "לקוח בדיקה - למחוק" (11.80) + טיוטת ליטל כפולה (DocumentID 2195546631) + שורת ליטל 23:40 בגיליון. הקובץ נעשה rename ל-.done.json נגד כפילות ב-30.7.
**פתוח:** לעדכן את משימת ה-Cowork שתייצר JSON בפורמט הסופי: root {month, clients:[...]}, חץ billable=true, ויקי+מעיין billable=true (אושרו ע"י ניר), יהונתן/שיר/חן false. שם קובץ חיוב_סיכום_YYYY_MM.json באותה תיקייה.
---
