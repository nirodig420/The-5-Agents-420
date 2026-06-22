# זיכרון אמציה — Changelog (אישורים + ביצוע בפועל)

לוג מתמשך של מה שאושר ובוצע בפועל. נכתב **רק אחרי "אשר"** מראובן.

> פורמט לכל רשומה:

```markdown
## YYYY-MM-DD | <תרחיש/בוט/חיבור>
**פעולה:** <מה נבנה/הופעל — Scenario / Flow / חיבור API>
**כלי:** Make / ManyChat / Airtable / API ישיר
**אישור:** אחרי "אשר" מראובן
**סיכון/עלות:** <Operations / rate limits / הערות>
**נכס:** <שם Scenario / Base / filename או URL>
---
```

## 2026-06-18 | אסי — בוט אישור (MVP מסלול C) — שלב 1: בסיס Airtable
**פעולה:** בנייה חיה של בסיס הטבלה ללולאת האישור של "אסי", על הטבלה הקיימת (לא טבלה חדשה).
- הוספת שדה `approval_token` (singleLineText) — id `flddMWdAUU4Oc1SS0`.
- הוספת שדה `whatsapp_message_id` (singleLineText) — id `fldafbYBuijqmW1gv` (מוכן לשלב WhatsApp).
- הוספת 2 אפשרויות ל-singleSelect "סטטוס" (`fldRHCXAS6G9EDZ81`): "נשלח לאישור" (`selOwCiteywUDIC6e`), "נדחה" (`selts8VBidlQP790r`).
- יצירת רשומת דמה לבדיקה: `recjXtxuU3R9eP7vF` (סטטוס "נשלח לאישור", token "asi-demo-token-001").
**כלי:** Airtable (MCP — ראובן הריץ)
**אישור:** אחרי "מאשר" מניר (2026-06-18)
**סיכון/עלות:** אפס — כל השינויים הוספתיים והפיכים, לא נמחק מידע. (צבע 2 האפשרויות החדשות אוטומטי=כחול; קוסמטי.)
**נכס:** Base `appKMXCuAfdJCIery` › Table `tbly7JDCmOnY36GoJ` (שם "לידים", בפועל טבלת תוכן-לאישור).

## 2026-06-18 | אסי — תרחישי Make: טיוטה + אימות (טרם נבנו חי)
**פעולה:** הופקו 2 Blueprints + מדריך בנייה ל-`amatzia-automation/blueprints/`. **אומתו מול Make MCP:**
- ✅ ולידציית סכימה עברה לשני התרחישים (`validate_blueprint_schema`).
- ✅ שמות מודולי Airtable v3 אומתו אמיתיים: `TriggerWatchRecords` / `ActionSearchRecords` / `ActionUpdateRecords`.
- ⚠️ **ממצא לתיקון:** `airtable:TriggerWatchRecords` עוקב אחרי **View** ודורש שדה "Created Time"/"Last Modified Time" — **לא** עובד לפי `formula` כפי שנכתב בטיוטה. אין שדה כזה בטבלה ו-MCP לא יוצר אותו. → להחליף טריגר A ל-**Search Records מתוזמן** (פולינג כל 15 דק' על סטטוס="נשלח לאישור" + approval_token ריק), או Airtable Automation→webhook.
**כלי:** Make (MCP — קריאה/ולידציה בלבד; אין יצירת Scenario ב-MCP → ניר מייבא/בונה בעורך).
**אישור:** רק אחרי "אשר" על התרחיש המתוקן.
**סיכון/עלות:** —
**נכס:** `amatzia-automation/blueprints/asi-scenario-A-send.json`, `asi-scenario-B-receive.json`, `asi-build-guide.md`.
---
