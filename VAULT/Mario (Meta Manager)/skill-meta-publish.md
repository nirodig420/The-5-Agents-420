# skill-meta-publish — מעטפת Meta Graph + Marketing API

**קובץ:** `.claude/skills/meta-publish/SKILL.md`
**משויך ל:** [[agent-mario]] (מריו)
**סוג:** Skill (מעטפת API) — ⚠️ **Phase 2 / אופציונלי**

## מה הקובץ עושה
מעטפת PowerShell/curl ל-**Meta Graph API + Marketing API**: `test-auth`, פרסום פוסט
לדף, פרסום דו-שלבי לאינסטגרם, ומשיכת `ads-insights` (קריאה בלבד). קורא טוקני
`META_*` מ-`.env`.

## מתי משתמשים
**רק** אם ניר בוחר במסלול ה-API הגולמי (מסלול B ב-[[mario-setup]]). ברירת המחדל היא
לעבוד דרך **Make** (החיבור כבר קיים) — אז הסקיל הזה לא נדרש לעבודה השוטפת.

## חוק הברזל נשמר
פרסום רק אחרי "אשר". פעולות שכרוכות בכסף (הפעלת קמפיין, שינוי `daily_budget`/`status`)
**לא מבוצעות אוטומטית** — מריו מכין את הקריאה כהצעה וניר מאשר ידנית כל פעם.

## קבצים קשורים
- [[agent-mario]] — הסוכן שמשתמש בסקיל.
- [[mario-setup]] — איך משיגים טוקן וממלאים `META_*`.
- [[env-config]] — `META_APP_ID/SECRET/ACCESS_TOKEN/PAGE_ID`, `INSTAGRAM_BUSINESS_ACCOUNT_ID`, `META_AD_ACCOUNT_ID`.
