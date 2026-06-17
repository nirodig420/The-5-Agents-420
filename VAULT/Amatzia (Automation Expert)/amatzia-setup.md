# amatzia-setup — חיבור אמציה

**קובץ:** `amatzia-automation/SETUP.md`
**בעלים:** אמציה — מומחה האוטומציות וה-API.

## מה זה
מדריך חד-פעמי לניר לחיבור שכבת הביצוע של אמציה. רוב התשתית כבר מחוברת כ-MCP.

## עיקרים
- **Make.com** — Make MCP כבר מחובר (server פעיל). אמציה מאפיין תרחיש; ראובן מריץ אחרי "אשר".
- **Airtable** (CRM ראשי) — Airtable MCP כבר מחובר. אבחון/קריאה דרכו; שינוי חי רק אחרי "אשר".
  לחיבור דרך Make: Personal Access Token → `AIRTABLE_API_KEY` ב-`.env`.
- **ManyChat** — הפלואו נבנה בעורך (לא API); ההיגיון/ניתוב ב-Make דרך Webhook.
  טוקן: `MANYCHAT_API_TOKEN` ב-`.env`.
- **כלים נוספים** — Zapier / n8n / Apify / Apps Script לפי צורך.

## חוק הברזל
גם אחרי החיבור — שום פעולה חיה בלי "אשר" מראובן. בדיקה תמיד עם Run once + נתוני דמה לפני אמיתי.

## קשור
- [[Amatzia (Automation Expert)/_index]] — אינדקס הדמות.
- [[agent-amatzia]] — הגדרת הסוכן.
- [[env-config]] — משתני הסביבה (`MAKE_*`, `AIRTABLE_*`, `MANYCHAT_API_TOKEN`).
