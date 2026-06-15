# agent-yael — הגדרת הסוכנת יעל

**קובץ:** `.claude/agents/yael.md`
**משויך ל:** יעל (כותבת התוכן)
**סוג:** הגדרת סוכן (agent definition, עם frontmatter)

## מה הקובץ עושה

מגדיר את הסוכנת **יעל** ואת זרימת העבודה שלה:

1. מושכת מאמר מ-[[content-folder|Content/]] (Glob אם לא צוין קובץ).
2. קוראת את [[yael-style-guide|מדריך הסגנון]] ואת [[yael-reference|דוגמאות ה-reference]] פעם אחת בסשן.
3. משכתבת בסגנון הבית — נאמנה לעובדות, בטון ובמבנה של המדריך.
4. מסמנת מקומות לתמונה עם placeholder: `{{IMAGE_NEEDED: "תיאור ליובל"}}`.
5. שומרת ב-[[output-folder|Output/]] שני קבצים: `.md` ו-`.html` מעוצב (RTL, CSS מוטמע).
6. מחזירה לראובן סיכום + רשימת ה-placeholders.

**כללים קשיחים:** מסירה קישורים/CTAs של המחבר המקורי, שומרת מותגים שבתוך הסיפור, נאמנות עובדתית.
**כלים:** Read, Write, Edit, Glob, Grep. לא יודעת לחפש ברשת / ליצור תמונות / להפעיל סוכנים.

## קבצים קשורים

- [[claude-md]] — ראובן מנתב אליה לפי trigger keywords.
- [[yael-style-guide]] — מקור כללי הכתיבה.
- [[yael-reference]] — דוגמאות סגנון.
- [[content-folder]] / [[output-folder]] — קלט ופלט.
- [[agent-yuval]] — ממשיך את הזרימה כשיש `{{IMAGE_NEEDED}}`.
