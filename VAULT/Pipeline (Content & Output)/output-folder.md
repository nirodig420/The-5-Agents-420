# output-folder — תוצרים סופיים (Output/)

**תיקייה:** `Output/`
**משויך ל:** יעל (יוצרת את כל התוכן כאן)
**סוג:** תיקיית פלט סופי

## מה זה עושה

מחזיקה את **התוצרים הסופיים** של יעל. לכל מאמר משוכתב נשמרים שני קבצים בשם המקורי: `.md` (Markdown, כולל placeholders של תמונות אם יש) ו-`.html` (גרסה מעוצבת עצמאית, RTL, CSS מוטמע, כותרות באדום `#f87171`).

**קבצים בתיקייה:**
- `productivity-morning.md` + `.html` — גרסה משוכתבת של [[content-productivity-morning]].
- `מאמר CRM.md` + `.html` — גרסה משוכתבת של [[content-crm-article]].
- `.gitkeep` — שומר התיקייה ב-git.

## קבצים קשורים

- [[agent-yael]] — היוצרת.
- [[yael-style-guide]] — כללי העיצוב שמיושמים ב-HTML.
- [[content-folder]] — מקור הגלם.

## Session Log

### 2026-06-07 — פוסט צ'אטבוט לדוגמה + וידאו Sora ראשון [done]
פוסט לדוגמה לאישור ניר על האסטרטגיה החדשה (אוטומציות → צ'אטבוטים, Give Value + מיצוב סמכות): `Output/2026-06-07-sample-chatbot-smart-agent.md`. **ויזואל ראשון בווידאו** (ברירת המחדל החדשה): `yuval-viz/outputs/2026-06-07-sample-chatbot-smart-agent.mp4` — Sora `sora-2-pro`, 4 שניות, 9:16, ~1.47MB. נוצר ליובל סקריפט רב-פעמי `yuval-viz/gen_video.ps1` (POST→polling→download, תומך text-to-video ו-image-to-video). Related: [[niro-content-topic-mix]] · [[claude-md]]

### 2026-06-07 — באצ' יום ראשון: 3 פוסטים + 3 תמונות [done]
ניר קבע חוק קבוע: יעל מייצרת 3 פוסטים כל יום ראשון עד 09:00, ותמיד שואלים תמונה/וידאו לפני ויזואל ([[niro-content-standing-rules]], מתועד ב-[[claude-md]]). באצ' היום (גיוון הוקים):
- `Output/2026-06-07-post1-hook-emotional.md` — הוק רגשי ("העסק מנהל אותך") + `yuval-viz/outputs/2026-06-07-post1-hook-emotional.png`.
- `Output/2026-06-07-post2-hook-authority.md` — הוק סמכות ("20 שעות בשבוע") + `...post2-hook-authority.png`.
- `Output/2026-06-07-post3-hook-contrast.md` — הוק ניגודיות ("לעבוד יותר קשה זה לא הפתרון") + `...post3-hook-contrast.png`.
3 התמונות ב-`gpt-image-2` ([[skill-gpt-image-gen]]), 1:1, ללא טקסט, סגנון בית עקבי. אכיפת ה-cron ליום ראשון טרם חוברה.

### 2026-06-07 — פוסט META "אסי" (אוטומציה 24/7) + ויזואל [done]
ניר סיפק קופי מוכן לקמפיין META (Facebook + Instagram) על "אסי" — מערכת אוטומציה שעובדת 24/7 (שליחת מסמכים, מענה ללידים, תיאום פגישות). ראובן ניתב: ליטוש הקופי לפי [[niro-meta-content-creator]] (שבירות שורה, נקודה רק בסוף משפט, סיום חיובי קדימה, בלי מקפים), ויובל ([[agent-yuval]]) ייצר ויזואל תואם.
- פלט תוכן: `Output/2026-06-07-asi-automation-meta.md` — קאפשן RTL משותף ל-FB+IG, בלוק האשטגים נפרד לאינסטגרם, ותיאור ויזואל.
- פלט ויזואל: `yuval-viz/outputs/2026-06-07-asi-automation-meta.png` (+ `.txt` prompt) — בעלת עסק רגועה/מלאת תקווה ליד לפטופ בלילה, תאורה חמה, ללא טקסט, 1:1. נוצר ב-`gpt-image-2` ([[skill-gpt-image-gen]]).
- הקופי מנוסח בפנייה ישירה לנקבה ("את") לפי הגלם של ניר — חריגה מודעת מברירת המחדל של גוף-ראשון בסקיל, מתאים לאופי direct-response.
- Related: [[claude-md]] · [[agent-yuval]] · [[yuval-outputs]] · [[niro-meta-content-creator]]
