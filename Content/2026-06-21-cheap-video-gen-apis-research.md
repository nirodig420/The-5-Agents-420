# מחקר תמחור: מנועי יצירת וידאו עם API לסושיאל (Reels) — יוני 2026

**נושא:** מנועי text-to-video / image-to-video זולים עם API, לקליפ קצר 5–10ש' אנכי 9:16 ל-Instagram/Facebook Reels.
**תאריך מחקר:** 2026-06-21
**מבקש:** ראובן (עבור ניר) — חלופה זולה ל-Sora 2 Pro.

> ⚠️ **הערה על דיוק:** התמחור בתחום הזה משתנה כל הזמן. כל מספר בטבלה מגובה במקור עם לינק.
> איפה שהמחיר הגיע מאגרגטור/בלוג ולא ממקור ראשוני — סומן במפורש (⚠️ לאימות).
> מחירי fal.ai ו-Runway אומתו מדפי המודל/דוקס הרשמיים. מחיר Sora אומת מול מחשבון תמחור
> שמסתמך על OpenAI הרשמי. מחיר Veo Gemini/Vertex אומת חלקית (ראה הערה ליד Veo).

---

## מקורות עיקריים (מאומתים)

- [Sora 2 API Pricing Calculator & Sunset Guide — costgoat (Jun 2026)](https://costgoat.com/pricing/sora) — תמחור Sora 2 / Sora 2 Pro רשמי + תאריך sunset.
- [OpenAI API Pricing (official)](https://openai.com/api/pricing/) — דף התמחור הרשמי של OpenAI.
- [Kling 2.5 Turbo Pro — Image-to-Video, fal.ai (model page)](https://fal.ai/models/fal-ai/kling-video/v2.5-turbo/pro/image-to-video) — מחיר ראשוני מדף המודל.
- [MiniMax Hailuo-02 Standard — Image-to-Video, fal.ai (model page)](https://fal.ai/models/fal-ai/minimax/hailuo-02/standard/image-to-video) — מחיר ראשוני מדף המודל.
- [Runway API Pricing & Costs (official docs)](https://docs.dev.runwayml.com/guides/pricing/) — קרדיטים לשנייה + מחיר קרדיט.
- [Generate videos with Veo 3.1 — Gemini API (Google official docs)](https://ai.google.dev/gemini-api/docs/video) — יכולות: 9:16, אודיו, image-to-video, אורכי קליפ.
- [Google Veo Pricing Calculator — costgoat (Jun 2026)](https://costgoat.com/pricing/google-veo) — תמחור Veo Vertex/Gemini.
- [fal.ai pricing (official)](https://fal.ai/pricing) — דף תמחור כללי.
- [AI Video Generation API Pricing (Apr 2026) — buildmvpfast](https://www.buildmvpfast.com/api-costs/ai-video) — ⚠️ אגרגטור (חסום ל-fetch ישיר, רק תוצאת חיפוש).
- [Luma AI pricing 2026 — eesel](https://www.eesel.ai/blog/luma-ai-pricing) — ⚠️ בלוג צד-שלישי.
- [Runway ML Pricing 2026 — propicked](https://propicked.com/blog/runway-ml-pricing-2026-hidden-costs) — ⚠️ בלוג צד-שלישי.

---

## טבלת השוואה — מחיר לקליפ קצר 5–10ש' (אנכי 9:16, איכות סושיאל)

| מנוע | מסלול API | מחיר/שנייה | קליפ 5ש' | קליפ 10ש' | I2V (הנפשת תמונה)? | אורך מקס' / רזולוציה / אנכי 9:16 / סאונד | מקור |
|---|---|---|---|---|---|---|---|
| **Sora 2 (רגיל)** | OpenAI ישיר | $0.10 (720p) | ~$0.50 | **~$1.00** | כן | 720p; 9:16 כן; סאונד כן | costgoat / OpenAI |
| **Sora 2 Pro** | OpenAI ישיר | $0.30 (720p) / $0.70 (1080p) | ~$1.50 / ~$3.50 | **~$3.00 / ~$7.00** | כן | עד 1080p; 9:16 כן; סאונד כן | costgoat / OpenAI |
| **Veo 3.1 Fast** | Gemini/Vertex | ~$0.15 ⚠️ | ~$0.75 | ~$1.20 (קליפ 8ש') | כן | 4/6/8ש'; 9:16 כן; **סאונד native** | costgoat + Google docs |
| **Veo 3.1 (Standard)** | Gemini/Vertex | ~$0.40 (ללא אודיו) / ~$0.75 (עם) ⚠️ | — | — | כן | 4/6/8ש'; 9:16 כן; סאונד כן | costgoat ⚠️ |
| **Kling 2.5 Turbo Pro** | **fal.ai** (אגרגטור) | $0.07 (אחרי בסיס 5ש') | **$0.35** | **$0.70** | **כן** (דף I2V ייעודי) | I2V; אנכי — נתמך (לאמת ב-API); סאונד דרך גרסה עם audio | fal.ai (model page) |
| **MiniMax / Hailuo-02** | **fal.ai** (אגרגטור) | $0.045 (768p) / ~$0.017 (512p) | ~$0.225 (768p) | ~$0.45 (768p)* | **כן** | **מקס' 6ש'**; 768p (Pro=1080p); יחס 2:5–5:2 (כולל 9:16); סאונד לא מצוין | fal.ai (model page) |
| **Luma Ray 2** | fal.ai / Luma | ~$0.19–$0.21 ⚠️ | ~$0.95 (1080p) ⚠️ | — | כן | עד ~1080p/4K; 9:16 כן; ללא סאונד | eesel ⚠️ |
| **Runway Gen-4 Turbo** | Runway ישיר | $0.05 (5 קרדיט × $0.01) | **$0.25** | **$0.50** | **כן** | 1080p (4K = פי 2 קרדיט); 9:16 כן; ללא סאונד native | Runway docs (רשמי) |
| **Pika** | — | — | — | — | כן | **⚠️ ה-API נסגר ל-Enterprise בלבד מינואר 2026** — לא רלוונטי לנו | search |

\* Hailuo-02 מוגבל ל-**6ש' מקסימום** — אין קליפ 10ש' אמיתי; "10ש'" הוא חישוב תאורטי לפי מחיר/שנייה.

⚠️ = מספר מבלוג/אגרגטור ולא ממקור ראשוני — מומלץ לאמת ב-API/דף התמחור הרשמי לפני התחייבות.

---

## נגישות API + אגרגטורים

- **fal.ai** — התמחור הכי שקוף (לפי שנייה / לפי קליפ, ישירות בדף המודל). מארח את Kling, MiniMax/Hailuo, Veo, Sora ועוד 600+ מודלים. **זה הראוטר המומלץ לקליפים זולים.**
- **Replicate** — גם אגרגטור עם תמחור לפי שנייה; קיים אך לא נבדק לעומק במחקר הזה (אפשר לאמת מחירי Kling/Luma שם אם רוצים השוואה נוספת).
- **OpenAI ישיר** — כבר יש לנו חיבור (בייסליין). היתרון: אין צד שלישי. החיסרון: Sora יקר יחסית, ו**ה-API שלו נסגר ב-24 בספטמבר 2026** (אין endpoint חדש אחרי זה).
- **Runway ישיר** — דרך דוקס רשמיים, תמחור קרדיטים שקוף ($0.01/קרדיט).
- **Google Gemini API / Vertex AI** — Veo ישיר; $300 קרדיט חינם לחשבון Cloud חדש (טוב לניסוי).

---

## image-to-video (הנפשת תמונה קיימת של יובל) — מי תומך

כל המנועים הרלוונטיים תומכים ב-I2V: **Sora 2/Pro, Veo 3.1, Kling 2.5 Turbo Pro, MiniMax/Hailuo, Luma Ray 2, Runway Gen-4**. (Pika — לא רלוונטי, אין API ציבורי).
זה התרחיש **הזול ביותר** עבורנו: יובל מכין תמונה אנכית 9:16 ב-`gpt-image-gen`, והמנוע רק מנפיש אותה.

---

## ⭐ שורה תחתונה — 3 הזולים-משתלמים לתרחיש שלנו

מול **Sora 2 Pro** (הבייסליין) שעולה **~$3.00 לקליפ 10ש' (720p)** ועד **~$7.00 ב-1080p**:

1. **MiniMax / Hailuo-02 דרך fal.ai — הזול ביותר.**
   קליפ 5–6ש' ב-768p ≈ **$0.225–$0.27**. תומך I2V, אנכי. מגבלה: **מקס' 6ש'** (מספיק ל-Reel) ובלי סאונד מובנה.
   → **~13x זול יותר** מ-Sora 2 Pro 720p, ו-~26x מול 1080p.

2. **Kling 2.5 Turbo Pro דרך fal.ai — האיכותי-משתלם.**
   קליפ 5ש' = **$0.35**, קליפ 10ש' = **$0.70**. I2V ייעודי, אורך ארוך יותר מ-Hailuo, איכות תנועה גבוהה מאוד (מדורג מהטובים ב-2026).
   → **~4x זול יותר** מ-Sora 2 Pro 720p; ~10x מול 1080p. **ההמלצה המאוזנת ביותר** (איכות+אורך+מחיר).

3. **Runway Gen-4 Turbo (ישיר) — הכי זול בלי אגרגטור.**
   קליפ 5ש' = **$0.25**, קליפ 10ש' = **$0.50**. I2V ו-9:16 נתמכים, תמחור קרדיטים שקוף, בלי תלות בצד שלישי. בלי סאונד native.
   → **~6x זול יותר** מ-Sora 2 Pro 720p.

**אם צריך סאונד מובנה (דיבור/אפקטים בתוך הקליפ):** **Veo 3.1 Fast** (~$0.75–$1.20 לקליפ 8ש') הוא היחיד בקבוצת הזולים עם **אודיו native + 9:16**, ועדיין זול משמעותית מ-Sora 2 Pro.

### המלצת ברירת מחדל
לתרחיש "הנפשת תמונה של יובל ל-Reel קצר אילם": **Kling 2.5 Turbo Pro דרך fal.ai** (איזון מחיר/איכות) או **Hailuo-02** (הכי זול, עד 6ש'). לשני המקרים — דרך fal.ai, תמחור שקוף לפי קליפ.
אם רוצים קליפ עם קול/דיבור: **Veo 3.1 Fast**.

> צעד הבא מומלץ: לפני התחייבות, לרוץ פעם אחת על כל אחד מ-2 המועמדים המובילים (Kling + Hailuo) דרך fal.ai עם אותה תמונה של יובל, ולהשוות איכות בפועל. fal.ai מאפשר pay-per-use בלי מנוי.
