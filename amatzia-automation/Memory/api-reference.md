# זיכרון אמציה — API Reference (מאומת)

הערות API שאומתו מול התיעוד הרשמי, כדי לא לחקור מחדש בכל פעם. **תמיד** מציין תאריך
אימות ולינק — API משתנה, ומה שהיה נכון אשתקד אולי כבר לא.

> פורמט לכל שירות:

```markdown
## <שם השירות> | אומת YYYY-MM-DD
**Base URL / גרסה:** <...>
**אימות:** API Key / OAuth 2.0 / Bearer
**Endpoints עיקריים:** <method path — מה עושה>
**Pagination:** <איך עובד>
**Rate Limits:** <מגבלות אמיתיות>
**שגיאות נפוצות:** <4xx/5xx — מה אומר ומה הפתרון>
**מקור:** <לינק לתיעוד>
---
```

<!-- רשומות ייכתבו כאן ע"י אמציה אחרי אימות תיעוד. -->

## Google Analytics 4 Data API (v1beta) | אומת 2026-06-30
**Base URL / גרסה:** Data API v1beta · ב-Make דרך מודול **GA4 · Run a Report** (לא REST ידני)
**אימות:** OAuth 2.0 (חשבון Google עם Viewer ל-property). מצב Testing ב-Google Cloud → חידוש שבועי; להעלות ל-Production.
**קלט קריטי:** המודול דורש **Property ID מספרי** (למשל 123456789) — **לא** Measurement ID (`G-XXXX`). נמצא ב-GA4 → Admin → Property Settings.
**Date range shorthand:** `yesterday`, `today`, `NdaysAgo` — אין צורך לחשב תאריך.
**שמות מאומתים (apiName):**
- Metrics: `totalUsers`, `newUsers`, `sessions`, `screenPageViews`, `engagementRate`, `averageSessionDuration`, `userEngagementDuration`, `eventCount`
- Dimensions: `newVsReturning`, `sessionSourceMedium`, `sessionSource`, `sessionMedium`, `sessionCampaignName`, `pageTitle`, `pagePath`, `eventName`
**כלל סקופ (טעות נפוצה):** dimensions בלי תחילית (`source`/`medium`/`campaignName`) משויכים לאירועי **conversion בלבד** → 0 ל-sessions רגילים. ל-acquisition ברמת session: **חובה** `session*` prefix. אסור לערבב סקופ אירוע (`eventCount`+`eventName`) עם סקופ user (`totalUsers`) באותה קריאה → מספרים מנופחים. פתרון: קריאה נפרדת לכל סקופ.
**Rate Limits:** מכסות פר-property (tokens/יום + concurrent). לבריף יומי (3–4 קריאות) זניח. שגיאת 429 → Retry.
**Custom OAuth (אומת 2026-06-30):** אם החיבור הרגיל (בלי Advanced) נכשל, או אם מופיע client_id לא-Make ב-Advanced → צריך Custom OAuth client מ-Google Cloud. API להפעיל: **Google Analytics Data API**. Redirect URIs (להוסיף את שתיהן): `https://www.integromat.com/oauth/cb/google-restricted` + `https://www.make.com/oauth/cb/google-restricted`. Authorized domains: `make.com`, `integromat.com`. חובה Publish App → **In production** (אחרת פג כל 7 ימים). client_id+secret → Advanced settings בחלון החיבור.
**שגיאה `[401] invalid_client / "client secret is invalid"`:** = בעיית זהות-אפליקציה בלבד (לא Property, לא הרשאות). סיבה שכיחה: secret ריק/חתוך/לא תואם ל-client_id, או secret עם רווח עודף. גוגל מציגה secret פעם אחת בלבד ביצירה (מדיניות 2025) → אם אבד, צור client חדש. פתרון מהיר: מחק חיבור, נסה חיבור חדש **בלי** Advanced (OAuth מובנה של Make); אם נכשל → Custom OAuth.
**מקור:** https://developers.google.com/analytics/devguides/reporting/data/v1/api-schema · https://apps.make.com/google-analytics-4 · https://help.make.com/connect-to-google-services-using-a-custom-oauth-client
---

## GA4 "Generate a Report" — מבנה פלט ב-Make (mapping) | אומת 2026-06-30
**מבנה פלט קריטי:** מודול GA4 "Generate a Report" מוציא **bundle נפרד לכל שורת דוח** (row),
לא מערך אחד. לכן צריך **aggregator** כדי לאסוף את כל השורות להודעה אחת.
**ה-API הגולמי מחזיר:** כל שורה = `dimensionValues[].value` + `metricValues[].value`,
לפי **סדר** ה-dimensions/metrics בבקשה (העמודה הראשונה = dimension/metric ראשון וכו').
**ב-mapping panel של Make** (לאמת מול ה-bundle בריצה אמיתית): השדות מופיעים תחת ה-bundle
של GA4 כ-`Rows[]` עם `Dimension values[].Value` ו-`Metric values[].Value` — ממופים לפי אינדקס:
- `Dimension values[1].Value` = הערך של ה-dimension הראשון (לפי סדר ההגדרה במודול)
- `Dimension values[2].Value` = ה-dimension השני
- `Metric values[1].Value` = המטריקה הראשונה, וכן הלאה
**טעות נפוצה ({object}):** Array aggregator עוטף כל שורה כ-object → `join()` עליו מחזיר
"{object}". **הפתרון הנכון: Text aggregator** (Source Module = מודול GA4, Row separator = New row),
שבונה בלוק טקסט שורה-לכל-bundle ישירות מהשדות הממופים — בלי {object}, בלי join ב-Telegram.
**שורת סיכום (סה"כ):** GA4 מחזיר שורת Totals נפרדת רק אם מבקשים — אחרת מסכמים ב-Telegram עם
`sum(map(7.Rows[]; "Metric values.1.Value"))` (פונקציית map+sum על המערך הגולמי).
**מקור:** https://developers.google.com/analytics/devguides/reporting/data/v1/rest/v1beta/Row · https://www.make.com/en/help/tools/tools (Text aggregator)
---
