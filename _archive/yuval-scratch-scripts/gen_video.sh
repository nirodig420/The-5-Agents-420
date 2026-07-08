#!/usr/bin/env bash
set -euo pipefail
# usage: gen_video.sh <prompt_file> <output_mp4> <seconds> <size>
PROMPT_FILE="$1"
OUT="$2"
SECONDS_ARG="${3:-4}"
SIZE="${4:-720x1280}"
API_KEY=$(grep '^OPENAI_API_KEY=' .env | head -1 | cut -d= -f2- | tr -d '\r' | xargs)
[ -n "$API_KEY" ] || { echo "OPENAI_API_KEY missing"; exit 1; }

PROMPT=$(cat "$PROMPT_FILE")

echo ">> creating video job (size=$SIZE seconds=$SECONDS_ARG)"
RESP_FILE=$(mktemp)
HTTP=$(curl -s -w '%{http_code}' -o "$RESP_FILE" -X POST "https://api.openai.com/v1/videos" \
  -H "Authorization: Bearer $API_KEY" \
  -F model="sora-2-pro" \
  -F prompt="$PROMPT" \
  -F size="$SIZE" \
  -F seconds="$SECONDS_ARG")
if [ "$HTTP" != "200" ] && [ "$HTTP" != "201" ]; then
  echo "CREATE HTTP $HTTP"; head -c 2000 "$RESP_FILE"; rm -f "$RESP_FILE"; exit 2
fi
VIDEO_ID=$(node -e 'const fs=require("fs");console.log(JSON.parse(fs.readFileSync(process.argv[1],"utf8")).id)' "$RESP_FILE")
rm -f "$RESP_FILE"
echo ">> video_id=$VIDEO_ID"

# poll
while true; do
  S=$(mktemp)
  curl -s -o "$S" "https://api.openai.com/v1/videos/$VIDEO_ID" -H "Authorization: Bearer $API_KEY"
  ST=$(node -e 'const fs=require("fs");const d=JSON.parse(fs.readFileSync(process.argv[1],"utf8"));console.log((d.status||"")+"|"+(d.progress||""))' "$S")
  rm -f "$S"
  STATUS="${ST%%|*}"; PROG="${ST##*|}"
  echo "   status=$STATUS progress=$PROG"
  [ "$STATUS" = "completed" ] && break
  if [ "$STATUS" = "failed" ]; then echo "FAILED"; exit 1; fi
  sleep 10
done

echo ">> downloading"
curl -s -L "https://api.openai.com/v1/videos/$VIDEO_ID/content" \
  -H "Authorization: Bearer $API_KEY" --output "$OUT"
echo "SAVED: $OUT"
