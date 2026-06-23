# Vault Documentation

## Overview

הקמת ה-**Vault המתעד** של פרויקט The 5 Agents תחת `vault/`, לפי פרוטוקול הסקיל obsidian-vault-workflow. ה-Vault מתעד כל קובץ משמעותי בפרויקט בקובץ MD משלו: מה הוא עושה, למי הוא משויך (ראובן/יעל/יובל/חן/משותף), וקישורי wikilink לקבצים קשורים. הארגון הוא לפי בעלים: תיקייה לכל סוכן + Pipeline (Content/Output) + Infra. נקודת הכניסה היא [[Home]].

## Open Questions

- האם לתעד גם קבצים בינאריים בודדים (PNG/JPEG) בקבצי MD נפרדים, או להשאיר אותם מתועדים ברמת התיקייה (כפי שנעשה כעת ב-[[yuval-outputs]] / [[yuval-reference]])?
- האם להפעיל את כלל ה"שימוש בסקיל בכל סשן/פקודה" דרך hook ב-settings.json (אכיפה אמיתית) או להסתפק בזיכרון של Claude?

## Session Log

### 2026-06-23 — Playbook רצף חימום לאנצ'לוטי + נרמול שמות תיקיות + גיבוי לענן [shipped]
- **What was done:** (1) נוסף Playbook אופציונלי לאנצ'לוטי — `ancelotti-funnels/reference/warming-sequence-playbook.md` (רצף חימום ללידים: בעיה לפני פתרון, רצף שבועי יום 0/1/3/5/6, אנטומיית הודעת חימום, ליד קר מול חם, ותבנית פרומפט ל-Make AI Toolkit להודעת וואטסאפ אישית). עודכנו [[ancelotti-reference]], README של הרפרנס, ו-`_index`. (2) נורמלו שמות תיקיות הסוכנים (הסרת רווח): `eitan- seo`→`eitan-seo`, `mario- meta`→`mario-meta`, `yael- content`→`yael-content`, `ancelotti- funnels`→`ancelotti-funnels`, וסונכרנו כל ההפניות (CLAUDE.md, agents, skills, VAULT). (3) כל העבודה (אנצ'לוטי, מריו, אמציה, ה-Vault, .obsidian) גובתה והועלתה ל-GitHub `main`+`feat`; `.env` מוגן ב-.gitignore; `.obsidian/workspace.json` הוצא ממעקב.
- **Decisions:** רצף החימום = **כלי אופציונלי** (לא כל משפך). תוכן/ניסוח הפרומפט אצל אנצ'לוטי; הביצוע (Make AI Toolkit + וואטסאפ) אצל [[agent-amatzia]]. שמות תיקיות בלי רווח = נתיבים נקיים ובטוחים לפקודות.
- **Notes / Caveats:** היעד של הרצף = פגישת אפיון בזום; CTA רך בלבד, בלי דחיפות מזויפת. נשמר זיכרון מתמשך (`ancelotti-warming-sequence-playbook`). מומלץ להתקין Obsidian Git לסנכרון אוטומטי לענן.
- **Related:** [[agent-ancelotti]], [[ancelotti-reference]], [[agent-amatzia]], [[claude-md]]

### 2026-06-18 — מריו כמנהל סושיאל + חבילת "5 אוטומציות" (קרוסלה+PDF) [shipped / blocked-on-reauth]
- **What was done:** (1) הופקה חבילת Give-Value מלאה "5 אוטומציות שכל בעל עסק חייב" — קופי קרוסלה ([[agent-yael]], `Output/2026-06-11-5-automations-every-business.md`), 6 שקופיות מעוצבות ([[agent-yuval]], `yuval-viz/outputs/2026-06-11-5-automations-slide-1..6.png`, דרך `gpt-image-gen`), ו-Lead Magnet PDF בן 7 עמ' (`Output/2026-06-11-5-automations-guide.pdf`, רונדר מ-HTML דרך Chrome headless עם תמונות base64). (2) מריו הועלה ל**מנהל סושיאל** עם מנדט **3 פוסטים אורגניים/שבוע** (מודל באצ' שבועי, אישור אחד) — עודכנו [[agent-mario]], CLAUDE.md Standing Rule #4, [[mario-setup]]. (3) נבדקו דרך Make MCP הרשאות חיבור ה-Facebook.
- **Decisions:** מודל פרסום = **באצ' שבועי, אישור אחד** (לא אוטונומי מלא, לא אישור-לכל-פוסט) — בחירת ניר. ויזואל לקרוסלה = תמונות ללא טקסט (חוק הבית "ללא טקסט בתמונה") + טקסט עברי מתווסף ב-Canva, גם כי gpt-image-2 לא אמין בעברית. PDF נבנה דרך Chrome headless (אין reportlab/python עובד בסביבה).
- **Notes / Caveats:** 🚧 **חוסם פרסום בפועל:** חיבור ה-Facebook ב-Make (id 7369468) חסר `pages_manage_posts` + `instagram_content_publish` (יש ads_management/leads_retrieval/pages_read_engagement). ניר צריך Re-authorize ב-Make + לקשר IG לדף. אחרי זה: בניית תרחיש Make לפרסום + תזמון 3x/שבוע.
- **Related:** [[agent-mario]], [[mario-setup]], [[agent-yael]], [[agent-yuval]], [[claude-md]], [[env-config]]

### 2026-06-15 — הוספת סוכן אנצ'לוטי (ארכיטקט המשפכים) [shipped]
- **What was done:** נוסף סוכן שביעי לצוות — **אנצ'לוטי**, ארכיטקט המשפכים השיווקיים (Funnel Architect). הגדרת הסוכן [[agent-ancelotti]] (`.claude/agents/ancelotti.md`) נכתבה מהפרומפט המלא שניר סיפק (פילוסופיית שכנוע Cialdini/StoryBrand/כלכלה התנהגותית, מודל **שש התחנות** + נקודות דליפה, פרוטוקול שיתוף הפעולה, צ'קליסט בקרת איכות, חוק העל "שפה חיובית תמיד"). נוצרה תיקיית עבודה `ancelotti-funnels/` (`reference/` + `Memory/changelog.md`). נכס הזהב של ניר — מגנט הלידים `niro-funnel-map-LIVE.html` — הועתק מ-`C:\markting\אוטומציה\` ל-`ancelotti-funnels/reference/` (העתק byte-identical, אומת ב-MD5) עם `README.md` שמסביר אותו. עודכנו [[claude-md]] (רישום אנצ'לוטי + trigger keywords + workflow "משפך שיווקי / מגנט לידים" + מבנה תיקיות) ו-[[Home]]. נוצרה תיקיית התיעוד `VAULT/Ancelotti (Funnel Architect)/` ([[agent-ancelotti]], [[ancelotti-reference]], `_index`).
- **Decisions:** אנצ'לוטי = ה**מתכלל/מאמן** (רמת "מאמן ראשי" מעל מומחי-הערוצים), אבל **התזמור בפועל עובר דרך ראובן** — סוכן לא מפעיל סוכן. לכן אנצ'לוטי מכין אסטרטגיה + **בריף מדויק לכל זרוע** ומבקש מראובן להפעיל (חן/יעל/מריו/יובל/איתן), ואז מרכיב את התוצרים. מיפוי זרועות: קופי ארוך→יעל, קופי META→מריו, ויזואל→יובל, SEO/וורדפרס→איתן, מחקר→חן. הקובץ של ניר נשמר כ-**reference (swipe file) לחיקוי**, לא לעריכה במקום — משפכים חדשים נשמרים ב-`Output/`. הסקילים השיווקיים (`campaign-plan`, `email-sequence` וכו') נשארו כעזר אופציונלי, לא הוטמעו בגוף (הפרומפט עצמאי).
- **Notes / Caveats:** הפרומפט המקורי של ניר תיאר את "מריו" ככותב תוכן META ואת "יעל" ככותבת הארוכה — שונה מעט מהמערכת הקיימת (יעל=כותבת תוכן ראשית, מריו=מנהל Meta). יושב בבריף ה-workflow ב-[[claude-md]] (יעל=קופי ארוך, מריו=קופי META) כדי שלא ייווצר בלבול ניתוב. אנצ'לוטי טרם נוסה end-to-end על משימת משפך אמיתית — `Memory/changelog.md` ריק עד הסבב הראשון.
- **Related:** [[agent-ancelotti]], [[ancelotti-reference]], [[claude-md]], [[Home]], [[agent-chen]], [[agent-yael]], [[agent-mario]], [[agent-yuval]], [[agent-eitan]]

### 2026-06-11 — הוספת סוכן מריו (מנהל Meta — סושיאל + Paid + אסטרטגיה) [shipped]
- **What was done:** נוסף סוכן שביעי לצוות — **מריו**, מנהל ה-Meta (Facebook/Instagram). נוצרו: הגדרת הסוכן [[agent-mario]] (`.claude/agents/mario.md`), תיקיית `mario-meta/Memory/` (`campaigns.md`, `content-calendar.md`, `competitors.md`, `changelog.md`), מדריך חיבור [[mario-setup]] (`mario-meta/SETUP.md`), וסקיל [[skill-meta-publish]] (`.claude/skills/meta-publish/SKILL.md`, Phase 2 אופציונלי). עודכנו [[claude-md]] (רישום מריו + Standing Rule #4 תוכנית ראשון + 2 workflows: "פרסום Meta" ו"ניתוח קמפיין" + מבנה תיקיות), `.env.example` (`META_AD_ACCOUNT_ID` + הערת Make), ו-[[Home]]. נוצרה תיקיית התיעוד `VAULT/Mario (Meta Manager)/`.
- **Decisions:** **גישה היברידית** — תוכן אורגני אחרי "אשר", כסף (קמפיין/תקציב) = אישור ידני תמיד. **שכבת ביצוע = Make.com** ולא Meta App מאפס, כי בחשבון ה-Make של ניר (team `1591144`, Pro) כבר קיימים חיבורי Facebook פעילים (9 scopes) + Facebook Lead Ads רץ. בנייה **phased** (ב+ג): Phase 1 ייעוץ/אבחון (ערך מיידי), Phase 2 חיבור ביצוע דרך Make. תוכן מושקע נכתב ע"י [[agent-yael]]/[[agent-yuval]] דרך ראובן (קול מותג אחיד), לא ע"י מריו. מריו נותן **חוות דעת מקצועית** בפורמט קבוע לכל קמפיין.
- **Notes / Caveats:** מריו עדיין לא מחובר בפועל ל-Make — צריך לאמת scopes של חיבור ה-Facebook (`pages_manage_posts`, `instagram_content_publish`, `ads_read`) ולאפיין/לבנות תרחישי פרסום ומשיכת insights (Phase 2). סקיל `meta-publish` נכתב אך לא מופעל עד שניר יבחר מסלול API גולמי. הזיכרון (campaigns/calendar/competitors) ריק — צריך סבב אבחון ראשון עם נתונים אמיתיים, בלי המצאת מספרים.
- **Related:** [[agent-mario]], [[skill-meta-publish]], [[mario-setup]], [[claude-md]], [[env-config]], [[agent-yael]], [[agent-yuval]], [[Home]]

### 2026-06-02 — הקמת ה-Vault המתעד [shipped]
- **What was done:** נסרק כל עץ הפרויקט; נוצרו 6 אזורי תיעוד (ראובן, יעל, יובל, חן, Pipeline, Infra) + Meeting Notes, כל אחד עם `_index.md`. נכתבו ~20 קבצי תיעוד — אחד לכל קובץ/תיקייה משמעותיים — עם בעלות ו-wikilinks הדדיים. נוצרה מפת-על [[Home]].
- **Decisions:** ארגון לפי **בעלים** (סוכן) ולא לפי מבנה תיקיות הקוד, כי המשתמש ביקש "למי הקובץ משויך" — זה הציר המרכזי. קבצים בינאריים (תמונות) ו-`.gitkeep` תועדו ברמת תיקיית-האב במקום קובץ-לכל-PNG, כדי שהתיעוד יישאר שמיש. כל הקישורים הפנימיים הם `[[wikilinks]]` (לא קישורי markdown), לפי דרישת הסקיל.
- **Notes / Caveats:** ה-Vault יושב בשורש הפרויקט שכבר מוגדר כ-Obsidian vault (קיים [[obsidian-config|.obsidian/]]). הסקיל obsidian-vault-workflow עצמו מותקן ב-repo הנפרד the-5-agents-obsidian.
- **Related:** [[Home]], [[claude-md]], [[agent-yael]], [[agent-yuval]], [[agent-chen]], [[superpowers-skills]]

### 2026-06-11 — הרחבת איתן למנהל אתר + קידום (SEO & GEO) [shipped]
- **What was done:** לבקשת ניר, איתן הורחב מ"מנהל אתר WordPress" ל-**מנהל האתר והקידום (SEO & GEO)** לפי בריף מפורט. שוכתב [[agent-eitan]] (תפקיד צמיחה אורגנית, חוק ברזל = לא מפרסם בלי "אשר", Flow של הצעות מוכנות-לאישור, GEO/AEO, קצב פרסום). נוצרו `eitan-seo/Memory/{keywords,competitors,content-calendar,changelog}.md`, תיקיות `Proposals/` ו-`SEO/`. אוחד `changes.md` לתוך `changelog.md` (נמחק). עודכן [[claude-md]] (trigger keywords של SEO + זרימת "קידום ותוכן לאתר" + מבנה תיקיות).
- **Decisions:** איתן = מאבחן/ממליץ/מכין הצעות; פרסום חי רק כפעולה מאושרת (דרך [[skill-wp-rest]] או קוד מוכן-להדבקה ל-theme, כי האתר כתוב ידנית). כלים הורחבו ל-WebSearch+WebFetch (מחקר דירוג/מתחרים) לצד Bash (wp-rest). חיבור Make→Airtable של הטופס הוקפא לבקשת ניר (מתועד ב-[[changelog]]).
- **Notes / Caveats:** keywords/competitors עדיין ריקים — צריך סבב אבחון ראשון עם נתונים אמיתיים (בלי המצאת דירוגים). ממצא קריטי פתוח: טופס הלידים מזייף הצלחה ולא שולח (דליפת לידים) — ממתין לחידוש חיבור Make→Airtable.
- **Related:** [[agent-eitan]], [[skill-wp-rest]], [[claude-md]], [[changelog]], [[keywords]], [[competitors]], [[content-calendar]]

### 2026-06-10 — הוספת סוכן איתן (מנהל האתר WordPress) [shipped]
- **What was done:** נוסף סוכן שישי לצוות — **איתן**, מנהל האתר `nirodigital.co.il`. נוצרו: סקיל [[skill-wp-rest]] (`.claude/skills/wp-rest/SKILL.md`, מעטפת PowerShell ל-WordPress REST API עם Application Password), הגדרת הסוכן [[agent-eitan]] (`.claude/agents/eitan.md`), תיקיית עבודה `eitan-seo/` (`Memory/changes.md` לוג שינויים, `snapshots/` גיבויי HTML, `SETUP.md` מדריך חיבור חד-פעמי לניר). עודכנו [[claude-md]] (רישום איתן + workflow "שינוי באתר" + Standing Rule #3), `.env.example` (בלוק `WP_*`), ו-[[Home]].
- **Decisions:** חיבור דרך **WordPress REST API + Application Password** (אוטונומיה מלאה) ולא הדבקה ידנית — לפי בחירת ניר ב-Q&A. תחום אחריות = כל האתר. זוהתה נקודת התורפה: דפי **Elementor** שומרים תוכן ב-meta `_elementor_data` ולא ב-`content`, ולכן עדכון REST עליהם נשבר — זה שורש ה"נדפק" של הטופס. הפתרון: אודיט-ראשון + המלצה להעביר את הטופס לבלוק Custom HTML יציב. פרוטוקול בטיחות: סנאפשוט לפני כל עריכה, דף קריטי לא ראשון.
- **Notes / Caveats:** איתן עדיין לא מחובר בפועל — ניר צריך למלא `WP_USERNAME`/`WP_APP_PASSWORD` ב-`.env` לפי `eitan-seo/SETUP.md` לפני אימות end-to-end (`test-auth`). לא נבנתה האוטומציה של Airtable/Make עצמה — איתן מנהל את הדף והטופס בלבד. כדאי לשקול hook ב-settings.json שיריץ סנאפשוט אוטומטית.
- **Related:** [[agent-eitan]], [[skill-wp-rest]], [[claude-md]], [[env-config]], [[content-crm-article]], [[Home]]

### 2026-06-02 — מאמר קאנביס: ישראל מול העולם (פייפליין מלא) [shipped]
- **What was done:** ראובן תיזמר את שרשרת חן→יעל→יובל לבקשת המשתמש. חן חקרה טרנדים עכשוויים בעולם הקאנביס מהשבוע ושמרה מקור ב-`Content/cannabis-trends-week-2026-06.md` (עדכנה [[chen-searches-memory]]). יעל כתבה מאמר ניתוח "שנת המטוטלת" המשווה ישראל מול ארה"ב/גרמניה/תאילנד/קנדה, שמרה MD+HTML ב-`Output/` וסימנה 2 placeholders. יובל יצר 2 תמונות (hero מטוטלת + אינפוגרפיקה השוואתית) ב-`yuval-viz/outputs/`. ראובן שילב את התמונות במקום ה-placeholders ב-MD וב-HTML.
- **Decisions:** הושארו 2 תמונות (לא 3) למאמר אנליטי כדי לא להעמיס. נתיבי תמונה ב-HTML/MD יחסיים (`../yuval-viz/outputs/`) כי `Output/` ו-`yuval-viz/` שניהם בשורש.
- **Notes / Caveats:** ל-yuval אין Python/jq/base64 אמיתיים בסביבה — נוצר עוקף `yuval-viz/gen_image.ps1` (PowerShell, מודל gpt-image-2). שווה לעדכן את [[skill-gpt-image-gen]] עם מסלול Windows. `yuval-viz/reference/` מכיל רק דיוקנים אישיים — אין reference סגנוני למאמרי מדיניות; כדאי להוסיף בעתיד.
- **Related:** [[content-cannabis-israel-vs-world]], [[agent-chen]], [[agent-yael]], [[agent-yuval]], [[output-folder]], [[skill-gpt-image-gen]]
