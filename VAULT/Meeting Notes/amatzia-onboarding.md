# אמציה — Onboarding (הקמת מומחה האוטומציות)

לוג הקמת [[Amatzia (Automation Expert)/_index|אמציה]] כסוכן השביעי בצוות.

## Overview
אמציה הוא מומחה האוטומציות וה-API: מתרגם תרחיש עסקי לאוטומציה עובדת מקצה-לקצה (Make,
ManyChat, Airtable + API ישיר). נכנס להיררכיה בדיוק כמו שאר הצוות — הגדרת סוכן, תיקיית
בית עם זיכרון, ניתוב ב-CLAUDE.md, ו-node ב-VAULT. שכבת הביצוע: Make MCP / Airtable MCP
(כבר מחוברים), בכפוף לחוק הברזל — שום שינוי חי בלי "אשר".

## Session log

### 2026-06-15 — הקמת אמציה [done]
- נוצרה הגדרת הסוכן [[agent-amatzia]] (`.claude/agents/amatzia.md`) מבוססת על הפרומט של ניר.
- נוצרה תיקיית הבית `amatzia-automation/` עם `Memory/` (automations, changelog, clients,
  api-reference), `SETUP.md`, ו-`reference/`.
- עודכן [[claude-md]]: רוסטר + trigger keywords + workflow "אוטומציה / בוט / חיבור מערכות" + מבנה תיקיות.
- עודכן [[Home]]: רוסטר, אזורי תיעוד, זרימה מרכזית #5, יומן עבודה.
- עודכן [[env-config]] (`.env.example`): `AIRTABLE_*`, `MANYCHAT_API_TOKEN` (ה-`MAKE_*` משותף עם מריו).
- נוצר node ב-VAULT: [[Amatzia (Automation Expert)/_index]] + [[agent-amatzia]].
- **החלטות ניר:** שם תיקייה `amatzia-automation`; סמכות = אישור לפני כל הרצה חיה.
- **הערה ארכיטקטונית:** Make/Airtable MCP חיים מורצים דרך ראובן אחרי "אשר" (לא ב-frontmatter של אמציה).

Related: [[Reuven (Orchestration)/_index]], [[Mario (Meta Manager)/_index]] (חולק `MAKE_*`),
[[agent-ancelotti]], [[agent-yael]], [[agent-eitan]].
