# דיי'גסט שבועי — AI & אוטומציות לעסקים (SMB)

**תאריך הפקה:** 2026-06-18 | **חוקרת:** חן | **טווח סיקור:** ~7 ימים אחרונים (יוני 2026)
**תחום:** שיווק דיגיטלי מבוסס אוטומציות — סוכני AI, צ'אטבוטים, CRM, כלי אוטומציה, מהלכי שחקנים גדולים ומתחרים (ישראל + חו"ל).

> הערה לשקיפות: כל פריט מסומן עם מקור מאומת (לינק) ותאריך. פריטים שאינם "השבוע" בדיוק
> אך רלוונטיים ופעילים כרגע (rollout מתמשך / מועדי deadline קרובים) סומנו במפורש.

---

## מקורות (Sources)

1. [Introducing AgentKit | OpenAI](https://openai.com/index/introducing-agentkit/) — AgentKit / Agent Builder
2. [OpenAI Release Notes — June 2026 (Releasebot)](https://releasebot.io/updates/openai) — wind-down של Agent Builder + הרחבת Codex
3. [explainx.ai — OpenAI Partner Network $150M](https://www.explainx.ai/blog/openai-partner-network-150-million-enterprise-2026) — Partner Network (14 ביוני)
4. [Introducing workspace agents in ChatGPT | OpenAI](https://openai.com/index/introducing-workspace-agents-in-chatgpt/) — Workspace Agents (rollout פעיל, free עד 6 ביולי)
5. [VentureBeat — OpenAI unveils Workspace Agents](https://venturebeat.com/orchestration/openai-unveils-workspace-agents-a-successor-to-custom-gpts-for-enterprises-that-can-plug-directly-into-slack-salesforce-and-more)
6. [Introducing Claude Opus 4.8 | Anthropic](https://www.anthropic.com/news/claude-opus-4-8) — מודל הדגל החדש
7. [Claude Updates — June 2026 (Releasebot)](https://releasebot.io/updates/anthropic/claude) — Managed Agents / Dreaming / Outcomes
8. [Enterprise DNA — Two Claude Deadlines Hit June 15](https://enterprisedna.co/resources/news/anthropic-claude-june-15-retirements-billing-2026/) — שינויי billing/retirements (15 ביוני)
9. [100 things we announced at Google I/O 2026 | Google](https://blog.google/innovation-and-ai/technology/ai/google-io-2026-all-our-announcements/) — Gemini 3.5 Flash + Antigravity
10. [Sumato — Google Gemini AI Updates June 2026](https://sumatosolutions.com/blog-google-ai-updates-2026-gemini-flash-agentic-app-builder/) — Gemini CLI EOL 18 ביוני
11. [Genesys Growth — Zapier vs Make vs n8n AI 2026](https://genesysgrowth.com/blog/zapier-ai-vs-make-com-ai-vs-n8n-ai) — סקירת פיצ'רים אוטומציה
12. [Softomate — Make vs Zapier vs n8n 2026](https://www.softomatesolutions.com/blog/make-vs-zapier-vs-n8n-2026-uk-comparison/) — Maia / Make AI Agents / marketplace
13. [Communicate Online — HubSpot, Salesforce race to agentic CRM](https://communicateonline.me/insights/hubspot-salesforce-race-towards-agentic-crm/) — מרוץ CRM סוכני
14. [SalesforceDevops — Agentforce SMB AI paywall breaking](https://salesforcedevops.net/index.php/2026/03/18/agentforce-smb-suites-ai-paywall-breaking/) — Agentforce ל-SMB
15. [Flowgent — ManyChat Pricing 2026](https://flowgent.ai/blog/manychat-pricing) — מודל תמחור חדש (4 שכבות) + AI add-on
16. [Calcalist — עתידם של סוכני AI (אורן וינטר, Salesforce IL)](https://www.calcalist.co.il/calcalistech/article/bklo004fmzg) — תחזיות ישראל
17. [Ynet — כולם מדברים על סוכני AI: מה עסקים מרוויחים](https://www.ynet.co.il/digital/article/syp00ci611ze) — זווית ישראלית לעסקים
18. [DoctorAI — בינה מלאכותית לעסקים קטנים: מעידן הצ'אט לביצוע 2026](https://www.doctorai.co.il/post/) — מדריך SMB ישראלי
19. [Hakuna Matata — AI Automation Agency Business Model 2026](https://www.hakunamatatatech.com/our-resources/blog/ai-agents-in-b2b) — מודל סוכנויות AAA
20. [GrowingAI — AI Automation for Small Business 2026](https://thegrowingai.com/ai-automation-for-small-business/) — מקרי שימוש SMB

---

## 1. חידושים מהשחקנים הגדולים — OpenAI

- **OpenAI Partner Network (14 ביוני 2026)** — תוכנית אקוסיסטם פורמלית למשלבי-מערכות, חברות ייעוץ וטכנולוגיה: **השקעה של 150M$** ויעד של **300K יועצים מוסמכים** עד סוף 2026. שותפים מייסדים: Accenture, Bain, BCG, McKinsey, PwC. ([explainx.ai](https://www.explainx.ai/blog/openai-partner-network-150-million-enterprise-2026))
  - *משמעות ל-SMB:* גל הסמכות ושותפים ידחוף עוד הטמעות AI לשוק הקטן-בינוני דרך אינטגרטורים.
- **הרחבת Codex לא-מפתחים (2 ביוני)** — שישה פלאגינים לפי תפקיד שמחברים את Codex ל-**62 אפליקציות עסקיות** עם **110 skills מובנים**, וכן "Codex Sites" שבונה אפליקציות פנים-ארגוניות מ-prompt. ([Releasebot](https://releasebot.io/updates/openai))
- **wind-down ל-Agent Builder + Evals (הוכרז 3 ביוני)** — הכלים לא יהיו זמינים מ-**30 בנובמבר 2026**. מי שבונה על AgentKit צריך לתכנן מסלול הגירה. ([OpenAI AgentKit](https://openai.com/index/introducing-agentkit/), [Releasebot](https://releasebot.io/updates/openai))
- **Workspace Agents (rollout פעיל; הושק אפריל 2026)** — יורש ה-Custom GPTs לארגונים. סוכנים מבוססי Codex שמתחברים ישירות ל-**Slack, Salesforce, Google Drive, Microsoft, Notion** ועוד; רצים בענן. זמין ב-ChatGPT Business (20$/משתמש/חודש) ו-Enterprise. **התקופה החינמית הוארכה עד 6 ביולי 2026** ואז תמחור מבוסס-credit. ([OpenAI](https://openai.com/index/introducing-workspace-agents-in-chatgpt/), [VentureBeat](https://venturebeat.com/orchestration/openai-unveils-workspace-agents-a-successor-to-custom-gpts-for-enterprises-that-can-plug-directly-into-slack-salesforce-and-more))

## 2. חידושים מהשחקנים הגדולים — Anthropic (Claude)

- **Claude Opus 4.8** — המודל הציבורי החזק ביותר של Anthropic כרגע. ([Anthropic](https://www.anthropic.com/news/claude-opus-4-8))
- **Claude Managed Agents — sandbox בשליטתך** — הרצת הכלים עוברת לסביבה שאתה מגדיר (תשתית עצמית או ספק מנוהל: Cloudflare, Daytona, Modal, Vercel), בעוד לולאת ה-orchestration נשארת אצל Anthropic. חיבור ל-MCP servers פרטיים. ([Releasebot](https://releasebot.io/updates/anthropic/claude))
- **יכולות סוכן חדשות:** *Dreaming* (הסוכן מריץ תרחישי בדיקה מול דאטה היסטורי לפני ביצוע חי), *Outcomes* (הגדרת תנאי הצלחה מדיד), ו-*Multiagent orchestration* (תיאום כמה סוכנים מתמחים בזרימה אחת). ([Releasebot](https://releasebot.io/updates/anthropic/claude))
- **שני deadlines ב-15 ביוני** — שינויי billing/credit ו-retirements. שינוי ה-15 ביוני בקרדיטים אף **הושהה** לאחר תגובות מהקהילה — נקודה למעקב למי שבונה על Claude API. ([Enterprise DNA](https://enterprisedna.co/resources/news/anthropic-claude-june-15-retirements-billing-2026/))

## 3. חידושים מהשחקנים הגדולים — Google (Gemini)

- **Gemini 3.5 Flash** — הראשון בסדרה החדשה שמשלב "אינטליגנציה + פעולה", מותאם למשימות agentic ארוכות-טווח ב**פחות ממחצית העלות** של מודלים מתחרים דומים. ([Google I/O 2026](https://blog.google/innovation-and-ai/technology/ai/google-io-2026-all-our-announcements/))
- **Google Antigravity** — פלטפורמת פיתוח agent-first מאוחדת; מתחברת ישירות לפרויקטי Google Cloud בתנאים ארגוניים; תושק ללקוחות Gemini Enterprise בחודשים הקרובים. ([Google Cloud](https://blog.google/innovation-and-ai/technology/ai/google-io-2026-all-our-announcements/))
- ⚠️ **Gemini CLI הישן מגיע ל-EOL ב-18 ביוני 2026** — צוותים עם automation/CI/CD/סקריפטים חייבים להגר ל-Agentic 2.0 CLI. ([Sumato](https://sumatosolutions.com/blog-google-ai-updates-2026-gemini-flash-agentic-app-builder/))

## 4. כלים ופלטפורמות אוטומציה — Make / n8n / Zapier

- **Make.com:** עוזר **Maia** שבונה תרחישים מתיאור בשפה טבעית, **Make AI Agents** לביצוע משימות אוטונומי, **AI scenario optimisation** (מזהה תרחישים מורכבים מדי וממליץ על איחוד/החלפת מודולים), ו**template marketplace** עם ~**800 תבניות** מוכנות-להטמעה. ([Softomate](https://www.softomatesolutions.com/blog/make-vs-zapier-vs-n8n-2026-uk-comparison/))
- **n8n:** גרסת **2.0** עם אינטגרציית **LangChain** נייטיב ו-**70+ AI nodes** — Tool Nodes, זיכרון מתמשך בין הרצות, vector DB ל-RAG, ו-human-in-the-loop. נחשב מתקדם במיוחד ל-orchestration מורכב. ([Genesys Growth](https://genesysgrowth.com/blog/zapier-ai-vs-make-com-ai-vs-n8n-ai))
- **Zapier:** **Zapier Agents** לביצוע אוטונומי על פני **8,000+ אפליקציות**; Central מתריע כש-Zap נכשל מעל סף ומציע תיקון ספציפי; **webhook-to-Zap builder** מקצר הקמת trigger מ-~20 דק' ל-~5 דק'. ([Genesys Growth](https://genesysgrowth.com/blog/zapier-ai-vs-make-com-ai-vs-n8n-ai))

## 5. CRM ואוטומציות סביבן

- **HubSpot (Spring 2026 Spotlight):** הוצג **Agentic Engagement Object (AEO)** — hub הקשרי שמציף תובנות וממליץ על הצעד הבא; וכן **Smart Deal Progression**, רענון ל-Prospecting Agent ו-Customer Agent, ושדרוג Breeze Assistant. **Breeze AI כלול בתוכניות הליבה ללא תוספת תשלום** — המסלול המהיר ביותר ל-CRM סוכני עבור SMB. ([Communicate Online](https://communicateonline.me/insights/hubspot-salesforce-race-towards-agentic-crm/))
- **Salesforce:** **Agentforce** הגיע ל-**ARR של 800M$** (+169% YoY) ומרחיב מהלכי SMB ("שבירת ה-AI paywall" — אינטליגנציה כיכולת בסיס). ([SalesforceDevops](https://salesforcedevops.net/index.php/2026/03/18/agentforce-smb-suites-ai-paywall-breaking/))
- *תובנת מאקרו:* HubSpot ו-Salesforce במרוץ ישיר ל-**agentic CRM** — ה-CRM הופך משכבת רישום לשכבת פעולה. ([Communicate Online](https://communicateonline.me/insights/hubspot-salesforce-race-towards-agentic-crm/))

## 6. צ'אטבוטים — שירות, מכירות, לידים

- **ManyChat:** מ-2 במרץ 2026 מודל תמחור חדש ב-**4 שכבות** (Free / Essential / Pro / Business), מעבר ל-**contact-based billing**, ו**צמצום דרמטי של ה-Free** (מ-1,000 ל-25 אנשי קשר). יכולות ה-AI (AI Step, Intention Recognition, Flow Builder Assistant) הן **add-on של 29$/חודש** מעל Pro/Business. אזהרה לעסקים: עלות שמתחילה ב-29$ יכולה להגיע ל-200–350$/חודש עם צמיחת רשימה. ([Flowgent](https://flowgent.ai/blog/manychat-pricing))
- *מגמת שוק:* צ'אטבוטים/agents כיום מסמכים לידים לפי התנהגות, קובעים פגישות אוטומטית ואף מעבדים תשלומים — 24/7. ([GrowingAI](https://thegrowingai.com/ai-automation-for-small-business/))

## 7. ישראל — זווית מקומית

- **כלכליסט (אורן וינטר, מנכ"ל מרכז פיתוח Salesforce ישראל):** תחזית למעבר מ-AI תגובתי ל-AI **סוכני, יוזם ואוטונומי** כשכבת פעולה ארגונית. ציטוט: *"המעבר מבינה מלאכותית תגובתית לבינה סוכנית, יוזמת ואוטונומית משנה את האופן שבו ארגונים עובדים, מקבלים החלטות, מגנים על עצמם ובונים קשרים עם לקוחות."* שלוש מגמות: מערכות מרובות-סוכנים, AI מהימן (אמון מותגי), ויישומים מתקדמים (אבטחה יוזמת, רובוטיקה, סימולציות). *(פורסם 24/12/2025 — context, לא חדשה השבוע.)* ([Calcalist](https://www.calcalist.co.il/calcalistech/article/bklo004fmzg))
- **Ynet:** סקירה נגישה לעסקים — מה עסקים מרוויחים מסוכני AI. ([Ynet](https://www.ynet.co.il/digital/article/syp00ci611ze))
- **נתון מעניין לשוק הישראלי (מקורות מקומיים):** SMB שהטמיעו AI נכון מדווחים על חיסכון ממוצע של **~20 שעות אדמיניסטרציה בחודש** ו-**2,000–8,000 ₪ חיסכון חודשי ישיר**. ([DoctorAI](https://www.doctorai.co.il/post/))

## 8. מהלכי מתחרים — סוכנויות אוטומציה/AI

- **מודל ה-AAA (AI Automation Agency) מתבסס:** סוכנויות מוכרות חבילות סביב סוכנים אוטונומיים — אוטומציית workflow המחברת CRM↔דיוור, agents שיחתיים לתמיכה וקביעת פגישות, יצירת תוכן/קמפיינים מבוססי-AI, מערכות lead-gen, ודשבורדים פרדיקטיביים. ([Hakuna Matata](https://www.hakunamatatatech.com/our-resources/blog/ai-agents-in-b2b))
- **בנצ'מרק תמחור בשוק:** אוטומציה פשוטה 500–2,000$; פרויקט בינוני (צ'אטבוט מותאם מחובר ל-DB + יומן) 5,000–15,000$; ריטיינר חודשי 1,000–5,000$ → לקוח בודד = 12,000–60,000$ הכנסה שנתית צפויה. ([Hakuna Matata](https://www.hakunamatatatech.com/our-resources/blog/ai-agents-in-b2b))
- **time-to-value:** עסקים מתחילים לראות השפעה תוך **30–60 יום** מרגע שצ'אטבוט/voice agent חי ומחובר ל-CRM. ([GrowingAI](https://thegrowingai.com/ai-automation-for-small-business/))

---

## Takeaways לבאצ' התוכן של NIRO

1. **הכותרת החמה לעסק קטן:** "ה-CRM שלך הפך לעובד" — HubSpot Breeze ללא תוספת תשלום + Agentforce שובר את ה-paywall = AI סוכני נכנס לטווח התקציב של SMB. **(הכי מתאים לפוסט ערך/סמכות.)**
2. **זווית כאב/אזהרה:** שינוי התמחור של ManyChat — מי שבנה על ה-Free צריך להיערך מחדש. פוסט "מה השתנה ואיך לא להיתקע".
3. **זווית עתיד/חזון:** ציטוט Salesforce IL מכלכליסט — המעבר ל-AI סוכני, מותאם לקהל ישראלי.
4. **זווית מעשית:** "5 אוטומציות שמחזירות 20 שעות בחודש" — נשען על הנתון הישראלי + מקרי השימוש של Make/Zapier/n8n.
