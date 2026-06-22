#!/usr/bin/env bash
set -euo pipefail
# usage: gen_image.sh <prompt_file> <output_png>
PROMPT_FILE="$1"
OUT="$2"
API_KEY=$(grep '^OPENAI_API_KEY=' .env | head -1 | cut -d= -f2- | tr -d '\r' | xargs)
[ -n "$API_KEY" ] || { echo "OPENAI_API_KEY missing"; exit 1; }

PAYLOAD_FILE=$(mktemp)
node -e '
const fs=require("fs");
const prompt=fs.readFileSync(process.argv[1],"utf8").trim();
const body=JSON.stringify({model:"gpt-image-2",prompt,size:"1024x1536",quality:"high",output_format:"png"});
fs.writeFileSync(process.argv[2], body, "utf8");
' "$PROMPT_FILE" "$PAYLOAD_FILE"

RESP_FILE=$(mktemp)
HTTP=$(curl -s -w '%{http_code}' -o "$RESP_FILE" -X POST "https://api.openai.com/v1/images/generations" \
  -H "Authorization: Bearer $API_KEY" \
  -H "Content-Type: application/json" \
  --data-binary "@$PAYLOAD_FILE")
rm -f "$PAYLOAD_FILE"

if [ "$HTTP" != "200" ]; then
  echo "HTTP $HTTP"
  head -c 2000 "$RESP_FILE"
  rm -f "$RESP_FILE"
  exit 2
fi

node -e '
const fs=require("fs");
const data=JSON.parse(fs.readFileSync(process.argv[1],"utf8"));
const b64=data.data[0].b64_json;
fs.writeFileSync(process.argv[2], Buffer.from(b64,"base64"));
console.log("SAVED: "+process.argv[2]);
' "$RESP_FILE" "$OUT"
rm -f "$RESP_FILE"
