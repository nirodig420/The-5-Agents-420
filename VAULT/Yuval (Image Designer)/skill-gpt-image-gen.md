# skill-gpt-image-gen — מעטפת OpenAI Images

**קובץ:** `.claude/skills/gpt-image-gen/SKILL.md`
**משויך ל:** יובל (משתמש בו); תשתית הסקילים
**סוג:** Skill (יכולת מותאמת)

## מה הקובץ עושה

**מעטפת** סביב OpenAI Images API. אחראי על דבר אחד: לקחת `prompt` ולהחזיר קובץ PNG שמור על הדיסק. הסוכן שקורא (יובל) אחראי על ניסוח ה-prompt ובחירת ה-path.

- **מודל:** `gpt-image-2` בלבד — אזהרה מפורשת לא לשנות לשמות אחרים גם אם שגיאה מתקבלת.
- **מפתח:** קורא `OPENAI_API_KEY` מ-[[env-config|.env]] בשורש.
- **פרמטרים:** `size` (ברירת מחדל 1024x1024), `quality` (medium), `output_format` (png).
- **שתי דרכי הרצה:** curl+jq (Linux/macOS/Git Bash), או fallback ב-Python (מומלץ ב-Windows).
- **אימות:** `test -s <path>.png` כדי לוודא שהקובץ אינו ריק.

## קבצים קשורים

- [[agent-yuval]] — הסוכן שקורא לסקיל הזה.
- [[env-config]] — מקור ה-`OPENAI_API_KEY`.
- [[yuval-outputs]] — היעד שבו נשמרות התמונות שנוצרו.
- [[superpowers-skills]] — שאר הסקילים תחת `.claude/skills/`.
