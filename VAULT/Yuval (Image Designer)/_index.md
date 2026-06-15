# יובל (Image Designer) — Index

קבצים שבאחריות **יובל**, מעצב התמונות. יובל סורק השראה מ-`yuval-viz/reference/`, מנסח prompt בסגנון הבית, יוצר תמונה דרך סקיל `gpt-image-gen`, ושומר ב-`yuval-viz/outputs/`. המטרה המנחה: עקביות ויזואלית בין כל התמונות. כלים: Read, Write, Bash, Glob.

## Topics

- [[agent-yuval]] — `.claude/agents/yuval.md`: הגדרת הסוכן ו-flow העבודה.
- [[skill-gpt-image-gen]] — `.claude/skills/gpt-image-gen/`: המעטפת ל-OpenAI Images API.
- [[yuval-reference]] — `yuval-viz/reference/`: תמונות השראה לסגנון (קלט).
- [[yuval-outputs]] — `yuval-viz/outputs/`: תמונות מוגמרות + prompts (פלט).

## קשור
- [[agent-yael]] — מספקת את ה-`{{IMAGE_NEEDED}}` placeholders.
- [[env-config]] — מקור ה-`OPENAI_API_KEY`.
