# skill-wp-rest — מעטפת WordPress REST API

**קובץ:** `.claude/skills/wp-rest/SKILL.md`
**משויך ל:** איתן (מנהל האתר)
**סוג:** סקיל (skill, מעטפת API)

## מה הסקיל עושה

עוטף את **WordPress REST API** (`/wp-json/wp/v2/`) כדי לקרוא/לעדכן/ליצור דפים ופוסטים
באתר `nirodigital.co.il`. כל הפעולות ב-PowerShell עם `Invoke-RestMethod` (כמו
[[skill-gpt-image-gen]] / sora — מסלול Windows מאומת).

## אימות

- שיטה: **Application Passwords** (WordPress core 5.6+, ללא תוסף).
- Header: `Authorization: Basic base64("user:app_password")` (דורש HTTPS).
- קורא מ-[[env-config|.env]]: `WP_SITE_URL`, `WP_USERNAME`, `WP_APP_PASSWORD`.

## פעולות עיקריות

- `test-auth` — `GET /users/me` (בדיקת חיבור, תמיד ראשון).
- `list-pages` / `list-posts` — מיפוי כל הדפים.
- `get-page <id>` — קריאת `content.raw` + **שמירת סנאפשוט** ל-`eitan-seo/snapshots/`.
- `update-page <id>` — `POST` עם `{content}` (עדכון; דורש סנאפשוט קודם).
- `audit-elementor` — זיהוי דפים שבנויים ב-Elementor (`_elementor_edit_mode`/`_elementor_data`).

## פרוטוקול בטיחות
`test-auth` ראשון → סנאפשוט לפני כל `update` → דף Elementor עוצר ושואל → דף קריטי לא ראשון →
שחזור מהסנאפשוט אם נשבר.

## קבצים קשורים

- [[agent-eitan]] — הסוכן שמשתמש בסקיל.
- [[env-config]] — מקור מפתחות ה-`WP_*`.
- [[claude-md]] — רשום במבנה התיקיות ובכללי העבודה.
