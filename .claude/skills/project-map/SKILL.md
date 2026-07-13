---
name: project-map
description: >-
  מפת התיקיות המלאה של פרויקט The 5 Agents — לאן שומרים כל תוצר, איפה הזיכרון
  וה-SETUP של כל סוכן, ומה יש בכל תיקיית reference. השתמש כשצריך לאתר/לשמור קובץ
  ולא ברור לאן, או כשמחפשים את קבצי הזיכרון של סוכן. Use when: saving an output,
  locating agent memory/SETUP/reference folders, deciding where a file belongs.
---

# מפת התיקיות המלאה

## תיקיות שיתופיות (שורש)

- `Content/` — מאמרי גלם: קלט ליעל, וגם הפלט של חן (מקורות שמצאה ברשת).
- `Output/` — תוצרי תוכן סופיים. מוסכמה: `YYYY-MM-DD-<slug>.md`; תמונות ב-`Output/images/`,
  חבילות העלאה ב-`Output/deploy-YYYY-MM-DD/` (ראה `Output/README.md`).
- `Proposals/` — הצעות מוכנות-לאישור ניר (`YYYY-MM-DD-<slug>.md`).
- `SEO/` — דוחות אבחון ומחקרי מילות מפתח של איתן.
- `_archive/` — חומר שנושאו מת (לא מוחקים — מעבירים לכאן).
- `VAULT/` — תיעוד Obsidian (node לכל סוכן + `Home.md`).

## תיקיות הסוכנים

| סוכן | זיכרון | SETUP | reference / אחר |
|---|---|---|---|
| חן | `chen/Memory/searches.md` (לוג חיפושים נגד כפילויות) + `international-focus.md` | — | — |
| יעל | `yael-content/Memory/changelog.md` (פוסטים + רוטציית הוקים) | — | `style-guide.md`, `content-plan.md`, `reference/` |
| יובל | `yuval-viz/Memory/changelog.md` (הפקות + אישורים) | — | `reference/` (השראה), `outputs/` (png/mp4 + prompts) |
| איתן | `eitan-seo/Memory/`: `keywords.md`, `competitors.md`, `content-calendar.md`, `changelog.md` | `eitan-seo/SETUP.md` (Application Password → `.env`) | `reference/` (theme PHP), `snapshots/` (גיבויי HTML לפני עריכה) |
| מריו | `mario-meta/Memory/`: `campaigns.md`, `content-calendar.md`, `competitors.md`, `changelog.md` | `mario-meta/SETUP.md` (מסלול Make מומלץ) | — |
| אנצ'לוטי | `ancelotti-funnels/Memory/changelog.md` (לוג משפכים) | — | `reference/niro-funnel-map-LIVE.html` (נכס הזהב) + README |
| אמציה | `amatzia-automation/Memory/`: `automations.md`, `clients.md`, `api-reference.md`, `changelog.md` | `amatzia-automation/SETUP.md` (Make/Airtable/ManyChat) | `reference/` + `blueprints/` (תבניות) |

## `.claude/`

- `agents/` — הגדרות 7 הסוכנים — מקור האמת לכל סוכן.
- `skills/` — סקילי הפרויקט (gpt-image-gen, sora-video-gen, wp-rest, meta-publish,
  copy-check, make-scenario-check, site-integrity-check, project-map).
- `commands/` — פקודות מותאמות (weekly-batch).
