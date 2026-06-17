# agent-amatzia — הגדרת הסוכן

**קובץ:** `.claude/agents/amatzia.md`
**בעלים:** אמציה — מומחה האוטומציות וה-API.

## מה זה
הגדרת ה-sub-agent של אמציה: frontmatter (name / description / trigger keywords / tools)
+ גוף ההנחיות המלא. אמציה מתרגם תרחיש עסקי לאוטומציה עובדת מקצה-לקצה ומחזיר תוכנית
מוכנה-לאישור — לא מפעיל מערכת חיה לבד.

## עיקרי ההגדרה
- **תפקיד:** מתרחיש למוצר מוגמר — ארכיטקטורה, צעדים מדויקים, חיבורים/API, בעיות+פתרון.
- **תחומי מומחיות:** Make.com, Airtable (CRM ראשי), ManyChat, Zapier/n8n/Apify/Apps Script, שכבת API.
- **5 שלבי העבודה:** הבנת תרחיש → ארכיטקטורה → בנייה צעד-אחר-צעד → בעיות צפויות ופתרון → בדיקה ומסירה.
- **תבנית בוט ManyChat:** Trigger → שלבי שיחה 1→2→3→4 → לוגיקת סינון → חיבור החוצה ל-Make/Airtable → מסירה.
- **מצב ליווי ולמידה:** מסביר תוך כדי לניר (שלומד אוטומציה/Airtable), מסמן טעויות נפוצות.
- **חוק הברזל:** אבחון → תוכנית → אישור ראובן → רק אחרי "אשר" בנייה/הפעלה חיה.
- **כלים:** WebSearch, WebFetch, Read, Write, Edit, Glob, Grep. ביצוע Make/Airtable MCP — דרך ראובן.

## זיכרון
`amatzia-automation/Memory/`: `automations.md`, `changelog.md`, `clients.md`, `api-reference.md`.

## קשור
- [[Amatzia (Automation Expert)/_index]] — אינדקס הדמות.
- [[amatzia-setup]] — `amatzia-automation/SETUP.md`.
- [[claude-md]] — ניתוב ראובן ו-workflow האוטומציה.
