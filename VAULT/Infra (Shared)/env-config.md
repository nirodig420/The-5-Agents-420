# env-config — משתני סביבה ומפתחות API

**קבצים:** `.env` (סודי, לא ב-git) + `.env.example` (תבנית)
**משויך ל:** תשתית משותפת (כל הסוכנים)
**סוג:** קונפיגורציית סביבה

## מה זה עושה

`.env.example` היא **התבנית** למשתני הסביבה; מעתיקים אותה ל-`.env` וממלאים ערכים אמיתיים. `.env` עצמו סודי ולא נכנס ל-git. המפתחות שמוגדרים:

- `ANTHROPIC_API_KEY` — Claude.
- `OPENAI_API_KEY` — יצירת תמונות (`gpt-image-2`) — משמש את [[skill-gpt-image-gen]].
- `META_*` / `INSTAGRAM_*` — פייסבוק/אינסטגרם של NIRO Digital.
- `MAKE_*` — אוטומציות Make.com.
- `WP_SITE_URL` / `WP_USERNAME` / `WP_APP_PASSWORD` — חיבור [[skill-wp-rest]] לאתר WordPress (Application Password). ראה `eitan-seo/SETUP.md`.
- `NODE_ENV` — כללי.

## קבצים קשורים

- [[skill-gpt-image-gen]] — צורך את `OPENAI_API_KEY`.
- [[agent-yuval]] — תלוי במפתח OpenAI.
- [[skill-wp-rest]] — צורך את מפתחות ה-`WP_*`.
- [[agent-eitan]] — תלוי בחיבור ל-WordPress.
- [[claude-md]] — מתאר את התשתית.
