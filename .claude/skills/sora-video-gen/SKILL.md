---
name: sora-video-gen
description: "מעטפת לקריאת OpenAI Sora Video API ליצירת סרטוני וידאו (MP4). תומך ב-text-to-video וב-image-to-video (הנפשת תמונה כפריים ראשון). מודלים: sora-2-pro (ברירת מחדל) / sora-2."
---

# sora-video-gen — יצירת וידאו דרך OpenAI Sora Video API

מעטפת מסביב ל-OpenAI **Videos API** (Sora 2). הסקיל לוקח `prompt` (ואופציונלית
תמונת `input_reference` כפריים ראשון) ומחזיר קובץ **MP4** שמור על הדיסק.

## מודל

- ברירת מחדל: **`sora-2-pro`** (איכותי). חלופה זולה יותר: `sora-2`.
- ⚠️ אל תחליף לשמות מודלים אחרים. אם יש שגיאת API — הבעיה כמעט תמיד ב-`OPENAI_API_KEY`,
  ב-`size`/`seconds` לא חוקיים, או באי-התאמה בין גודל התמונה ל-`size`. לא בשם המודל.

## ⚠️ שתי אזהרות חשובות

1. **עלות:** וידאו (במיוחד `sora-2-pro`) יקר — תשלום לפי שניות. כל רנדר עולה כסף אמיתי.
   צמצם משך (`seconds`) ברנדרי בדיקה.
2. **Deprecation:** לפי OpenAI, ה-Videos API ומודלי Sora 2 מתוכננים להיסגר בספטמבר 2026.

## תהליך (אסינכרוני — 3 שלבים)

יצירת וידאו אינה מיידית: יוצרים job, עושים polling עד `completed`, ואז מורידים.

### פרמטרים
| פרמטר            | ערך                          | הערות |
|------------------|------------------------------|-------|
| `model`          | `sora-2-pro` (ברירת מחדל)    | קבוע — לא להמציא שמות |
| `prompt`         | (חובה)                       | תיאור הסרטון/התנועה |
| `size`           | `720x1280`, `1280x720`, `1024x1792`, `1792x1024` | **חייב להתאים בדיוק לממדי `input_reference`** |
| `seconds`        | `4` (ברירת מחדל; אפשר גם `8`, `12`) | משך — משפיע ישירות על העלות |
| `input_reference`| קובץ תמונה                   | אופציונלי — משמש כפריים ראשון (image-to-video) |

### דרך A — curl (Git Bash; Yuval מריץ דרך Bash)

```bash
export OPENAI_API_KEY=$(grep '^OPENAI_API_KEY=' .env | cut -d= -f2-)

# 1) יצירת ה-job (text-to-video; להוסיף -F input_reference=@img.png ל-image-to-video)
RESP=$(curl -s -X POST "https://api.openai.com/v1/videos" \
  -H "Authorization: Bearer $OPENAI_API_KEY" \
  -F model="sora-2-pro" \
  -F prompt="<the prompt>" \
  -F size="720x1280" \
  -F seconds="4")
VIDEO_ID=$(echo "$RESP" | python -c "import sys,json;print(json.load(sys.stdin)['id'])" 2>/dev/null \
           || echo "$RESP" | grep -o '"id":"[^"]*"' | head -1 | cut -d'"' -f4)
echo "video_id=$VIDEO_ID"

# 2) polling עד completed/failed
while true; do
  ST=$(curl -s "https://api.openai.com/v1/videos/$VIDEO_ID" \
       -H "Authorization: Bearer $OPENAI_API_KEY" | grep -o '"status":"[^"]*"' | cut -d'"' -f4)
  echo "status=$ST"; [ "$ST" = "completed" ] && break; [ "$ST" = "failed" ] && { echo "FAILED"; exit 1; }
  sleep 10
done

# 3) הורדת ה-MP4
curl -L "https://api.openai.com/v1/videos/$VIDEO_ID/content" \
  -H "Authorization: Bearer $OPENAI_API_KEY" --output "yuval/outputs/<slug>.mp4"
```

### דרך B — PowerShell (מאומת שעובד ב-Windows הזה)

```powershell
$apiKey = ((Get-Content .env | Where-Object { $_ -match '^OPENAI_API_KEY=' }) -replace '^OPENAI_API_KEY=','').Trim()

# בניית multipart (כולל input_reference אופציונלי) — ראה דוגמה מלאה בסוף הקובץ.
# 1) POST /v1/videos -> $videoId
# 2) loop: GET /v1/videos/$videoId  עד status=completed
# 3) GET /v1/videos/$videoId/content -> שמירה כ-MP4
```

## התאמת תמונה ל-image-to-video (חשוב!)

ל-`input_reference` הממדים חייבים להתאים **בדיוק** לאחד מגדלי ה-`size` החוקיים.
אם התמונה בגודל אחר (למשל פלט gpt-image-2 בגודל 1024×1536), יש קודם **לרפד/לשנות
גודל** ל-`1024x1792` (פורטרט) או `1280x720` (לנדסקייפ) לפני הקריאה — אחרת ה-API
יחזיר שגיאת אי-התאמה. עדיף ריפוד (letterbox) על פני מתיחה כדי לא לאבד קומפוזיציה.

## שמירה ואימות

- שמור ב-`yuval/outputs/<YYYY-MM-DD>-<slug>.mp4` + sibling `.txt` עם ה-prompt.
- ודא שהקובץ קיים ו-size > 0. קובץ ריק = הורדה/קריאה נכשלה (בדוק key / size / seconds).
