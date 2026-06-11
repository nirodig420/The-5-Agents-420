# Vault Documentation

## Overview

הקמת ה-**Vault המתעד** של פרויקט The 5 Agents תחת `vault/`, לפי פרוטוקול הסקיל obsidian-vault-workflow. ה-Vault מתעד כל קובץ משמעותי בפרויקט בקובץ MD משלו: מה הוא עושה, למי הוא משויך (ראובן/יעל/יובל/חן/משותף), וקישורי wikilink לקבצים קשורים. הארגון הוא לפי בעלים: תיקייה לכל סוכן + Pipeline (Content/Output) + Infra. נקודת הכניסה היא [[Home]].

## Open Questions

- האם לתעד גם קבצים בינאריים בודדים (PNG/JPEG) בקבצי MD נפרדים, או להשאיר אותם מתועדים ברמת התיקייה (כפי שנעשה כעת ב-[[yuval-outputs]] / [[yuval-reference]])?
- האם להפעיל את כלל ה"שימוש בסקיל בכל סשן/פקודה" דרך hook ב-settings.json (אכיפה אמיתית) או להסתפק בזיכרון של Claude?

## Session Log

### 2026-06-02 — הקמת ה-Vault המתעד [shipped]
- **What was done:** נסרק כל עץ הפרויקט; נוצרו 6 אזורי תיעוד (ראובן, יעל, יובל, חן, Pipeline, Infra) + Meeting Notes, כל אחד עם `_index.md`. נכתבו ~20 קבצי תיעוד — אחד לכל קובץ/תיקייה משמעותיים — עם בעלות ו-wikilinks הדדיים. נוצרה מפת-על [[Home]].
- **Decisions:** ארגון לפי **בעלים** (סוכן) ולא לפי מבנה תיקיות הקוד, כי המשתמש ביקש "למי הקובץ משויך" — זה הציר המרכזי. קבצים בינאריים (תמונות) ו-`.gitkeep` תועדו ברמת תיקיית-האב במקום קובץ-לכל-PNG, כדי שהתיעוד יישאר שמיש. כל הקישורים הפנימיים הם `[[wikilinks]]` (לא קישורי markdown), לפי דרישת הסקיל.
- **Notes / Caveats:** ה-Vault יושב בשורש הפרויקט שכבר מוגדר כ-Obsidian vault (קיים [[obsidian-config|.obsidian/]]). הסקיל obsidian-vault-workflow עצמו מותקן ב-repo הנפרד the-5-agents-obsidian.
- **Related:** [[Home]], [[claude-md]], [[agent-yael]], [[agent-yuval]], [[agent-chen]], [[superpowers-skills]]

### 2026-06-11 — הרחבת איתן למנהל אתר + קידום (SEO & GEO) [shipped]
- **What was done:** לבקשת ניר, איתן הורחב מ"מנהל אתר WordPress" ל-**מנהל האתר והקידום (SEO & GEO)** לפי בריף מפורט. שוכתב [[agent-eitan]] (תפקיד צמיחה אורגנית, חוק ברזל = לא מפרסם בלי "אשר", Flow של הצעות מוכנות-לאישור, GEO/AEO, קצב פרסום). נוצרו `eitan/Memory/{keywords,competitors,content-calendar,changelog}.md`, תיקיות `Proposals/` ו-`SEO/`. אוחד `changes.md` לתוך `changelog.md` (נמחק). עודכן [[claude-md]] (trigger keywords של SEO + זרימת "קידום ותוכן לאתר" + מבנה תיקיות).
- **Decisions:** איתן = מאבחן/ממליץ/מכין הצעות; פרסום חי רק כפעולה מאושרת (דרך [[skill-wp-rest]] או קוד מוכן-להדבקה ל-theme, כי האתר כתוב ידנית). כלים הורחבו ל-WebSearch+WebFetch (מחקר דירוג/מתחרים) לצד Bash (wp-rest). חיבור Make→Airtable של הטופס הוקפא לבקשת ניר (מתועד ב-[[changelog]]).
- **Notes / Caveats:** keywords/competitors עדיין ריקים — צריך סבב אבחון ראשון עם נתונים אמיתיים (בלי המצאת דירוגים). ממצא קריטי פתוח: טופס הלידים מזייף הצלחה ולא שולח (דליפת לידים) — ממתין לחידוש חיבור Make→Airtable.
- **Related:** [[agent-eitan]], [[skill-wp-rest]], [[claude-md]], [[changelog]], [[keywords]], [[competitors]], [[content-calendar]]

### 2026-06-10 — הוספת סוכן איתן (מנהל האתר WordPress) [shipped]
- **What was done:** נוסף סוכן שישי לצוות — **איתן**, מנהל האתר `nirodigital.co.il`. נוצרו: סקיל [[skill-wp-rest]] (`.claude/skills/wp-rest/SKILL.md`, מעטפת PowerShell ל-WordPress REST API עם Application Password), הגדרת הסוכן [[agent-eitan]] (`.claude/agents/eitan.md`), תיקיית עבודה `eitan/` (`Memory/changes.md` לוג שינויים, `snapshots/` גיבויי HTML, `SETUP.md` מדריך חיבור חד-פעמי לניר). עודכנו [[claude-md]] (רישום איתן + workflow "שינוי באתר" + Standing Rule #3), `.env.example` (בלוק `WP_*`), ו-[[Home]].
- **Decisions:** חיבור דרך **WordPress REST API + Application Password** (אוטונומיה מלאה) ולא הדבקה ידנית — לפי בחירת ניר ב-Q&A. תחום אחריות = כל האתר. זוהתה נקודת התורפה: דפי **Elementor** שומרים תוכן ב-meta `_elementor_data` ולא ב-`content`, ולכן עדכון REST עליהם נשבר — זה שורש ה"נדפק" של הטופס. הפתרון: אודיט-ראשון + המלצה להעביר את הטופס לבלוק Custom HTML יציב. פרוטוקול בטיחות: סנאפשוט לפני כל עריכה, דף קריטי לא ראשון.
- **Notes / Caveats:** איתן עדיין לא מחובר בפועל — ניר צריך למלא `WP_USERNAME`/`WP_APP_PASSWORD` ב-`.env` לפי `eitan/SETUP.md` לפני אימות end-to-end (`test-auth`). לא נבנתה האוטומציה של Airtable/Make עצמה — איתן מנהל את הדף והטופס בלבד. כדאי לשקול hook ב-settings.json שיריץ סנאפשוט אוטומטית.
- **Related:** [[agent-eitan]], [[skill-wp-rest]], [[claude-md]], [[env-config]], [[content-crm-article]], [[Home]]

### 2026-06-02 — מאמר קאנביס: ישראל מול העולם (פייפליין מלא) [shipped]
- **What was done:** ראובן תיזמר את שרשרת חן→יעל→יובל לבקשת המשתמש. חן חקרה טרנדים עכשוויים בעולם הקאנביס מהשבוע ושמרה מקור ב-`Content/cannabis-trends-week-2026-06.md` (עדכנה [[chen-searches-memory]]). יעל כתבה מאמר ניתוח "שנת המטוטלת" המשווה ישראל מול ארה"ב/גרמניה/תאילנד/קנדה, שמרה MD+HTML ב-`Output/` וסימנה 2 placeholders. יובל יצר 2 תמונות (hero מטוטלת + אינפוגרפיקה השוואתית) ב-`yuval/outputs/`. ראובן שילב את התמונות במקום ה-placeholders ב-MD וב-HTML.
- **Decisions:** הושארו 2 תמונות (לא 3) למאמר אנליטי כדי לא להעמיס. נתיבי תמונה ב-HTML/MD יחסיים (`../yuval/outputs/`) כי `Output/` ו-`yuval/` שניהם בשורש.
- **Notes / Caveats:** ל-yuval אין Python/jq/base64 אמיתיים בסביבה — נוצר עוקף `yuval/gen_image.ps1` (PowerShell, מודל gpt-image-2). שווה לעדכן את [[skill-gpt-image-gen]] עם מסלול Windows. `yuval/reference/` מכיל רק דיוקנים אישיים — אין reference סגנוני למאמרי מדיניות; כדאי להוסיף בעתיד.
- **Related:** [[content-cannabis-israel-vs-world]], [[agent-chen]], [[agent-yael]], [[agent-yuval]], [[output-folder]], [[skill-gpt-image-gen]]
