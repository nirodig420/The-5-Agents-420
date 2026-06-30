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
