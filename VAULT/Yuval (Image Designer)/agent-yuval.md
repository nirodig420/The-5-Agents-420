# agent-yuval — הגדרת הסוכן יובל

**קובץ:** `.claude/agents/yuval.md`
**משויך ל:** יובל (מעצב התמונות)
**סוג:** הגדרת סוכן (agent definition, עם frontmatter)

## מה הקובץ עושה

מגדיר את הסוכן **יובל** ואת זרימת העבודה שלו לכל בקשת תמונה:

1. סורק את [[yuval-reference|yuval-viz/reference/]] ומחלץ מאפייני סגנון (פלטה, קומפוזיציה, אווירה, סוג רינדור).
2. בוחר את הרכיבים הרלוונטיים לבקשה.
3. מנסח prompt שמשלב בקשה קונקרטית + סגנון מה-reference.
4. קורא לסקיל [[skill-gpt-image-gen|gpt-image-gen]] (מודל `gpt-image-2` בלבד).
5. שומר ב-[[yuval-outputs|yuval-viz/outputs/]]: `<תאריך>-<slug>.png` + sibling `.txt` עם ה-prompt.
6. מאמת שהקובץ נוצר וגודלו > 0.
7. מדווח לראובן.

**המטרה המנחה:** עקביות ויזואלית בין כל התמונות בפרויקט.
**כלים:** Read, Write, Bash, Glob. לא כותב תוכן / לא מחפש ברשת / לא מפעיל סוכנים.

## קבצים קשורים

- [[claude-md]] — ראובן מנתב אליו לפי trigger keywords.
- [[skill-gpt-image-gen]] — המנגנון הטכני ליצירת התמונה.
- [[yuval-reference]] / [[yuval-outputs]] — קלט ופלט ויזואלי.
- [[agent-yael]] — מקור בקשות התמונה (placeholders).
- [[env-config]] — מקור ה-`OPENAI_API_KEY`.
