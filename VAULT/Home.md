# 🗺️ The 5 Agents — מפת ה-Vault

זהו ה-Vault המתעד של פרויקט **The 5 Agents** — מערכת צוות סוכנים ליצירת תוכן.
כל קובץ בפרויקט מתועד כאן בקובץ MD משלו: מה הוא עושה, למי הוא משויך, ואילו קבצים קשורים אליו.

> נבנה ומתוחזק לפי הסקיל **obsidian-vault-workflow**. כל wikilink מצביע על קובץ תיעוד אחר ב-Vault.

## הצוות (בעלים)

| דמות | תפקיד | תיקיית תיעוד |
|---|---|---|
| **ראובן** | מנכ"ל / מתזמר (orchestrator) | [[Reuven (Orchestration)/_index\|ראובן]] |
| **יעל** | כותבת תוכן | [[Yael (Content Writer)/_index\|יעל]] |
| **יובל** | מעצב תמונות | [[Yuval (Image Designer)/_index\|יובל]] |
| **חן** | חוקרת רשת | [[Chen (Web Researcher)/_index\|חן]] |
| **איתן** | מנהל האתר (WordPress) | [[Eitan (Website Manager)/_index\|איתן]] |
| **מריו** | מנהל ה-Meta (סושיאל + Paid) | [[Mario (Meta Manager)/_index\|מריו]] |
| **אנצ'לוטי** | ארכיטקט המשפכים (Funnel Architect) | [[Ancelotti (Funnel Architect)/_index\|אנצ'לוטי]] |
| **אמציה** | מומחה אוטומציות / API | [[Amatzia (Automation Expert)/_index\|אמציה]] |

## אזורי תיעוד

- [[Reuven (Orchestration)/_index|ראובן — תזמור וניתוב]] — המוח של המערכת, ניתוב בקשות.
- [[Yael (Content Writer)/_index|יעל — כתיבת תוכן]] — שכתוב, עריכה, סגנון הבית.
- [[Yuval (Image Designer)/_index|יובל — עיצוב תמונות]] — יצירת ויזואל דרך OpenAI Images.
- [[Chen (Web Researcher)/_index|חן — מחקר רשת]] — איסוף מקורות עדכניים.
- [[Eitan (Website Manager)/_index|איתן — ניהול האתר]] — עריכת דפי WordPress דרך REST API.
- [[Mario (Meta Manager)/_index|מריו — ניהול Meta]] — סושיאל אורגני, ניתוח קמפיינים ממומנים, ביצוע דרך Make.
- [[Ancelotti (Funnel Architect)/_index|אנצ'לוטי — ארכיטקט המשפכים]] — תכנון משפכים מקצה-לקצה, מגנטי לידים ודפי נחיתה, שילוב כל הזרועות.
- [[Amatzia (Automation Expert)/_index|אמציה — מומחה אוטומציות]] — Make/ManyChat/Airtable וחיבורי API, מתרחיש למוצר מוגמר.
- [[Pipeline (Content & Output)/_index|Pipeline — תוכן ופלט]] — מאמרי גלם ותוצרים סופיים.
- [[Infra (Shared)/_index|תשתית משותפת]] — קונפיג, סביבה, סקילים כלליים.

## זרימות מרכזיות

1. **מאמר עם תמונות:** [[agent-yael|יעל]] כותבת ומסמנת `{{IMAGE_NEEDED}}` → [[agent-yuval|יובל]] יוצר תמונות → ראובן משלב ב-[[output-folder|Output]].
2. **תוכן חדש מהרשת:** [[agent-chen|חן]] מוצאת מקור → מניחה ב-[[content-folder|Content]] → [[agent-yael|יעל]] משכתבת → [[agent-yuval|יובל]] לפי הצורך.
3. **פרסום/קמפיין Meta:** [[agent-mario|מריו]] מתכנן ומנתח (חוות דעת מקצועית) → קופי/ויזואל דרך [[agent-yael|יעל]]/[[agent-yuval|יובל]] → אחרי "אשר" ביצוע דרך Make. כסף = אישור ידני תמיד.
4. **משפך שיווקי / מגנט לידים:** [[agent-ancelotti|אנצ'לוטי]] מתכנן אסטרטגיה (שש התחנות + נקודות דליפה) ובריף לכל זרוע → ראובן מתזמר את [[agent-chen|חן]]/[[agent-yael|יעל]]/[[agent-mario|מריו]]/[[agent-yuval|יובל]]/[[agent-eitan|איתן]] → אנצ'לוטי מרכיב + בקרת איכות → אחרי "אשר" שמירה ב-[[output-folder|Output]].
5. **אוטומציה / בוט / חיבור מערכות:** [[agent-amatzia|אמציה]] מאבחן תרחיש ומתכנן (5 שלבים: הבנה → ארכיטקטורה → בנייה → בעיות+פתרון → בדיקה) → אם נדרש קופי/משפך → [[agent-yael|יעל]]/[[agent-ancelotti|אנצ'לוטי]] דרך ראובן → אחרי "אשר" בנייה/הפעלה דרך Make/Airtable MCP. שום שינוי חי בלי אישור.

## יומן עבודה (session log)

- [[vault-documentation]] — לוג הקמת ה-Vault והתחזוקה שלו.
- [[amatzia-onboarding]] — הקמת אמציה (מומחה האוטומציות) והוספתו לצוות.
