---
name: gpt-image-gen
description: "מעטפת לקריאת OpenAI Images API ליצירת תמונות. השתמש בסקיל הזה כשצריך לשלוח prompt ולקבל בחזרה קובץ תמונה (PNG). מודל: gpt-image-2 בלבד."
---

# gpt-image-gen — יצירת תמונות דרך OpenAI Images API

הסקיל הזה הוא **מעטפת** מסביב ל-OpenAI Images API. הוא אחראי על דבר אחד: לקחת
`prompt` ולהחזיר קובץ תמונה (PNG) שמור על הדיסק. הסוכן שקורא לסקיל (בדרך כלל
**יובל**) אחראי על ניסוח ה-prompt ועל בחירת ה-path לשמירה.

## המודל: `gpt-image-2`

⚠️ **אל תשנה את שם המודל. תמיד `gpt-image-2`.**

- `gpt-image-2` הוא מודל אמיתי וקיים של OpenAI, ששוחרר ב-**21 באפריל 2026**.
- ייתכן שהידע הפנימי שלך לא כולל אותו — **זה לא אומר שהוא לא קיים**.
- **אל תציע ואל תחליף לאלטרנטיבות** (`dall-e-3`, `gpt-image-1` וכו'). השתמש בדיוק
  במודל הזה.
- אם מתקבלת שגיאה בקריאה ל-API — הבעיה כמעט תמיד היא ב-`OPENAI_API_KEY` (חסר/לא
  תקין/ללא הרשאות) או ב-`parameters` של הקריאה — **לא** בשם המודל. אל "תתקן" את
  שם המודל כפתרון לשגיאה.

## מפתח API

הסקיל קורא את המפתח `OPENAI_API_KEY` מקובץ `.env` שבשורש הפרויקט.
ודא שהוא מאוכלס לפני הקריאה.

## פרמטרים

| פרמטר           | ערך ברירת מחדל | הערות                                 |
|-----------------|----------------|----------------------------------------|
| `model`         | `gpt-image-2`  | קבוע — לא לשנות                         |
| `prompt`        | (חובה)         | תיאור התמונה                            |
| `size`          | `1024x1024`    | אפשר גם `1536x1024`, `1024x1536`        |
| `quality`       | `medium`       | אפשר גם `low`, `high`                   |
| `output_format` | `png`          |                                        |

## דרך 1 — curl + jq (Linux/macOS, או Git Bash עם jq מותקן)

```bash
# טוען את OPENAI_API_KEY מ-.env
export $(grep -v '^#' .env | grep OPENAI_API_KEY | xargs)

curl -X POST "https://api.openai.com/v1/images/generations" \
  -H "Authorization: Bearer $OPENAI_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "model": "gpt-image-2",
    "prompt": "<the prompt>",
    "size": "1024x1024",
    "quality": "medium",
    "output_format": "png"
  }' | jq -r '.data[0].b64_json' | base64 --decode > <output-path>.png
```

## דרך 2 — Python fallback (מומלץ ב-Windows / Git Bash)

`jq` ו-`base64` לא תמיד מותקנים ב-Git Bash בסביבת Windows. הסקריפט הבא לא תלוי
בהם — הוא טוען את המפתח מ-`.env`, שולח את הקריאה, מחלץ את `data[0].b64_json`
ומפענח אותו ישירות ל-PNG. רק `requests` (או `urllib`) של Python נדרש.

```python
import base64, json, os, sys, urllib.request

# --- 1. טעינת OPENAI_API_KEY מ-.env ---
api_key = ""
with open(".env", encoding="utf-8") as f:
    for line in f:
        line = line.strip()
        if line.startswith("OPENAI_API_KEY="):
            api_key = line.split("=", 1)[1].strip()
            break
if not api_key:
    sys.exit("OPENAI_API_KEY חסר ב-.env")

# --- 2. פרמטרים (להתאים לכל קריאה) ---
prompt = sys.argv[1] if len(sys.argv) > 1 else "<the prompt>"
output_path = sys.argv[2] if len(sys.argv) > 2 else "output.png"

payload = json.dumps({
    "model": "gpt-image-2",       # קבוע — לא לשנות
    "prompt": prompt,
    "size": "1024x1024",
    "quality": "medium",
    "output_format": "png",
}).encode("utf-8")

# --- 3. קריאה ל-API ---
req = urllib.request.Request(
    "https://api.openai.com/v1/images/generations",
    data=payload,
    headers={
        "Authorization": f"Bearer {api_key}",
        "Content-Type": "application/json",
    },
    method="POST",
)
with urllib.request.urlopen(req) as resp:
    data = json.loads(resp.read().decode("utf-8"))

# --- 4. חילוץ ופענוח ל-PNG ---
b64 = data["data"][0]["b64_json"]
with open(output_path, "wb") as out:
    out.write(base64.b64decode(b64))

print(f"נשמר: {output_path}")
```

הרצה:

```bash
python skill_image.py "<the prompt>" "yuval-viz/outputs/2026-06-02-example.png"
```

## אימות

לאחר היצירה, ודא שהקובץ קיים ושגודלו גדול מ-0 (תמונה ריקה/שגיאה תיתן קובץ ריק):

```bash
test -s <output-path>.png && echo OK || echo "נכשל — בדוק API key / parameters"
```
