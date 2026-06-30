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
