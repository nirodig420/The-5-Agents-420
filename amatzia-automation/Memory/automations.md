# זיכרון אמציה — לוג אוטומציות שנבנו

לוג מתמשך של כל Scenario / Flow / חיבור שאמציה תכנן ובנה. לפני בנייה חדשה — Grep כאן
כדי לא לבנות מאפס.

> פורמט לכל רשומה:

```markdown
## <שם ה-Scenario / Flow> | YYYY-MM-DD
**כלי:** Make / ManyChat / Airtable / API ישיר
**Trigger:** <מה מפעיל — Instant / Scheduled / Webhook / מילת מפתח>
**שרשרת מודולים:** <module → module → router → ...>
**שדות/מיפוי עיקריים:** <...>
**Data Store / Error Handler:** <אם יש>
**עלות משוערת:** <Operations לכל הרצה>
**סטטוס:** טיוטה / מאושר / חי
**לקוח:** <אם רלוונטי>
---
```

<!-- רשומות ייכתבו כאן ע"י אמציה אחרי כל סבב מאושר. -->

## בריף יומי GA4 → WhatsApp/Telegram/Email | 2026-06-30
**כלי:** Make (GA4 Data API + ערוץ שליחה)
**Trigger:** Scheduled — כל יום 20:00 Asia/Jerusalem
**שרשרת מודולים:** Schedule → GA4 Run a Report ×3 (סיכום / מקורות / דפים) [+scroll] → Tools (Compose בעברית) → ערוץ שליחה
**שדות/מיפוי עיקריים:**
- קריאה 1 (סקופ session/user): metrics `totalUsers,newUsers,sessions,screenPageViews,engagementRate,averageSessionDuration` · dim `newVsReturning`
- קריאה 2 (מקורות): metrics `sessions,totalUsers` · dim `sessionSourceMedium,sessionCampaignName` (⚠️ session-prefix חובה, לא source/medium גולמי)
- קריאה 3 (דפים): metric `screenPageViews` · dim `pageTitle` (אופ' `pagePath`)
- scroll: metric `eventCount` · dim `eventName` filter=scroll
- Date Range: `yesterday`→`yesterday`
**Data Store / Error Handler:** Retry על מודולי GA4 (429/timeout); ברירת מחדל "0" לימים ריקים
**עלות משוערת:** ~4–6 Operations/הרצה → ~120–180/חודש (זניח)
**סטטוס:** טיוטה — ממתין לבחירת ערוץ + Property ID מספרי + OAuth Google
**לקוח:** NIRO (פנימי)
**הצעה:** Proposals/2026-06-30-ga4-daily-whatsapp-brief.md
**החלטה פתוחה:** ערוץ שליחה — Telegram (מומלץ) / Email / WhatsApp (הקמה ארוכה)
---

## בריף יומי GA4 → Telegram — בלופרינט v1 | 2026-06-30
**כלי:** Make (GA4 Data API → Telegram Bot)
**Trigger:** Scheduled — כל יום 20:00 Asia/Jerusalem (`interval: 86400`)
**שרשרת מודולים:** Schedule(built-in) → `google-analytics-4:generateReport` → `builtin:BasicAggregator` → `telegram:SendReplyMessage`
**שדות/מיפוי עיקריים (מאומת מול apps.make.com):**
- GA4 property `380754270`; dateRange `yesterday`→`yesterday`
- metrics: `totalUsers,sessions,screenPageViews` · dimensions: `sessionSourceMedium,sessionCampaignName` (⚠️ session-prefix חובה ל-UTM)
- orderBy: sessions desc · limit 10
- Aggregator מרכז שורות מקור→מטריקה · Telegram chatId `352155152`, bot `niroGA4_daily_brief_bot`
**⚠️ שמות מודולים מאומתים:** GA4 = "Generate a Report" (לא "Run a Report"); Telegram = "Send a Text Message or Reply". module-id המדויקים בבלופרינט = best-effort; אם הייבוא נכשל → fallback בנייה ידנית מודרכת (3 מודולים).
**scroll:** הושאר לשלב 2 (eventCount+eventName מסבך את הקריאה היחידה).
**Data Store / Error Handler:** אין ב-v1 (אפשר Retry על GA4 בשלב 2)
**עלות משוערת:** 3 Operations/הרצה → ~90/חודש (זניח)
**סטטוס:** מאושר ("אשר" מניר) — בלופרינט מוכן לייבוא, ממתין ל-2 חיבורים (Google OAuth + Telegram token)
**נכס:** Output/make-blueprint-ga4-daily-telegram.json
---

## רצף חימום ללידים (יום 0/1/3/5) | 2026-07-29
**כלי:** Make (Airtable + Make AI Toolkit + Green API + Telegram)
**Trigger:** Scheduled — Search Records כל 30 דק', 08:00–20:00 (לא Watch Records — דורש שדה Created Time; ממצא 18.6)
**שרשרת מודולים:** Search Records (נוסחה: שלב עסקה="ליד חדש" + חימום-שלב ריק/<4 + שומר IS_AFTER תאריך השקה) → Router ×5: [יום 0 יש טלפון: Green API SendMessage טקסט קבוע → Update שלב=1] · [יום 0 בלי טלפון: Telegram לניר → Update שלב=4] · [יום 1/3/5: Basic AI (ai-tools) → Green API → Update שלב+1] — מרווחים +1/+2/+2 ימים מהשליחה הקודמת
**שדות/מיפוי עיקריים:** 2 שדות חדשים נדרשים: `חימום - שלב` (number), `חימום - שליחה אחרונה` (dateTime). תיעוד לכל שליחה: `גוף הודעה שנשלח` + append ל-`אינטראקציות`. chatId: `{{replace(replace(טלפון; "/[^0-9]/g"; ""); "/^0/"; "972")}}@c.us`. עצירת רצף = מובנית בנוסחת החיפוש (ליד שיצא מ"ליד חדש" לא נשלף).
**Data Store / Error Handler:** אין Data Store (המונה ב-CRM). מומלץ Break + התראת טלגרם על כשל שליחה.
**עלות משוערת:** ~750 ops/חודש בסיס + ~12 ops לליד לרצף מלא + טוקנים של ספק Make AI (בתוך המכסה)
**סטטוס:** טיוטה מוכנה ליצירה ככבוי (בלופרינט מוכן) — 🔴 חוסם ל-ON: Green API חינמי = 3 צ'אטים בלבד (תפוסים ע"י טל+ניר) → חובה שדרוג Business לפני הפעלה
**⚠️ עדכון 2026-07-30:** הצעת נסטינג ממתינה לאישור שמחליפה את הפולר של 30 דק' (750 אופ'/חודש בסיס) בדחיפת יום-0 דרך Call a Scenario מתרחישי הכניסה + פולר יומי אחד לימים 1/3/5 (~30 אופ'/חודש). לא להדליק את התרחיש במבנה הישן — קודם העיצוב מחדש. פרטים: `Proposals/2026-07-30-make-nesting-consolidation.md`
**לקוח:** NIRO (פנימי)
**נכסים:** `Proposals/2026-07-29-warming-sequence-make.md` · `amatzia-automation/blueprints/warming-sequence-scenario.json`
---

## אסי 2.0 — בוט אישורי תוכן בטלגרם (כפתורים) | 2026-07-05
**כלי:** Make (Airtable + Telegram Bot) · Airtable base `appKMXCuAfdJCIery` › טבלה B "יומן פרסום" `tbloxDWRcAxlyi805`
**Trigger:** C (שולח) = Airtable Watch Records, trigger field "עודכן לאחרונה", formula `AND({סטטוס}="נשלח לאישור", {telegram_message_id}="")`, כל 15 דק' 08:00–22:00 · D (קולט) = Custom Webhook + `setWebhook` חד-פעמי של טלגרם (push מיידי, 0 ops בהמתנה)
**שרשרת מודולים:** C: Watch Records → Router (יש/אין ויזואל) → Send a Photo (URL מיידי — attachment פג ~2ש) → Send Message + inline keyboard (`callback_data`=`approve|recID` / `reject|recID`) → Update `telegram_message_id` · D: Webhook → Filter (callback_query + from.id=352155152) → split → Get Record → Filter (סטטוס עדיין "נשלח לאישור" = אנטי-לחיצה-כפולה) → Router → Update (approve: סטטוס="מאושר" + checkbox "✅ אושר על ידי ניר" + "אושר בתאריך"={{now}} / reject: "נדחה") → Edit Message (מסיר כפתורים, מציג תוצאה)
**שדות/מיפוי עיקריים:** 3 שדות חדשים בטבלה B: `telegram_message_id` (דגל אנטי-כפילות-שליחה), checkbox `✅ אושר על ידי ניר`, dateTime `אושר בתאריך` (מזינים View "✅ מאושרים"). 3 Views ידניים: מאושרים/ממתינים/נדחו (ה-API לא יוצר Views). בוט: ממחזרים `niroGA4_daily_brief_bot`, chat `352155152`.
**החלטות מפתח:** Telegram ולא Green API (כפתורי Green API לא יציבים לפי התיעוד שלהם + מיפוי טקסט חופשי עמום); פרסום דרך התזמון הקיים של 6237903 (א'/ג'/ה' 08:45) — אפס נגיעה בצינור שהוכח 5.7; "Watch Updates" נפסל (polling יקר, ~8,600 ops/חודש ב-5 דק').
**Data Store / Error Handler:** אין Data Store; הגנות = formula-flag בשליחה + status-guard בקליטה + Router לויזואל חסר (התראה במקום כשל שקט).
**עלות משוערת:** C ≈ 1,700 ops/חודש polling (חלופה 30 דק' ≈ 850) + ~4–5/פוסט · D ≈ 5–6/החלטה, 0 בהמתנה.
**סטטוס:** טיוטה מוכנה-לאישור — שום דבר חי לא נבנה. בנייה: ניר בעורך (MCP לא יוצר תרחישים), מודרך.
**לקוח:** NIRO (פנימי)
**הצעה:** Proposals/2026-07-05-approval-bot-telegram-whatsapp.md
---

## בוט האתר — מוח AI + זיכרון שיחה (פרויקט הצ'אטבוט החדש, שלב 1) | 2026-07-30
**כלי:** Make (Webhook + Airtable + Make AI Toolkit + Telegram) · תרחיש **6760281** (נוצר דרך MCP!)
**Trigger:** Instant — Custom Webhook מהווידג'ט באתר (POST form-urlencoded: `message`, `conversation_id`=`site:uuid`, `channel`)
**שרשרת מודולים:** Webhook → Airtable Search (שיחות בוט לפי conversation_id, max 1) → **BasicAggregator** (הטריק: פולט bundle גם כשהחיפוש ריק, `length(3.array)=0` = שיחה חדשה) → ai-tools:Ask (פרומפט מלא: זהות + דף עובדות חבילות + אפיון הדרגתי + פלט JSON קשיח) → json:ParseJSON (עם ניקוי גדרות ```) → Router ×5 בסדר: [עדכון שיחה קיימת] · [יצירת שיחה חדשה] · [אפיון הושלם → Create ליד בטבלת הלידים + קישור + טלגרם 🎯] · [handoff → טלגרם 🙋] · [Webhook Response טקסט פשוט + CORS]
**שדות/מיפוי עיקריים:** טבלת זיכרון חדשה **"שיחות בוט" `tblQVNPNvNUAZf2l4`** (conversation_id, ערוץ, תמליל מצטבר, שם/עסק/כאב/טלפון, סטטוס, קישור לליד, עדכון אחרון). ליד חדש: `שלב עסקה="ליד חדש"` → נקלט אוטומטית ברדאר רצף החימום. ⚠️ בטבלת הלידים השדה הוא `"טלפון "` עם רווח בסוף!
**Data Store / Error Handler:** onerror על ai-tools:Ask ועל ParseJSON: טלגרם לניר → Webhook Response עם תשובת נפילה בעברית (עם וואטסאפ של ניר) → Ignore. `sequential=true` נגד מרוץ על רשומת שיחה.
**עלות משוערת:** ~7 ops להודעה → ~1,400 הודעות/חודש על Pro (10,000 ops). AI: מכסת Make AI Toolkit (200K טוקנים/שבוע).
**סטטוס:** נוצר כבוי. 🔴 חסם יחיד: חיבור webhook למודול 1 = פעולת UI (ה-MCP לא יוצר hooks) → ניר מחבר בקליק ומוסר את ה-URL.
**לקוח:** NIRO (פנימי)
**נכסים:** `amatzia-automation/blueprints/site-chatbot-scenario.json` · `amatzia-automation/templates/bot-brain-system-prompt.md` · ווידג'ט: `Output/2026-07-30-chat-widget/` (תג GTM + דף בדיקה)
---
