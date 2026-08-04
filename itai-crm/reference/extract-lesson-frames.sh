#!/usr/bin/env bash
# חילוץ פריימים מהקלטת מסך של שיעור, לקריאה ע"י איתי.
# הנגן של הקורס מחשיך את הווידאו בהקלטה, אבל הכתוביות ומסכי ה-Airtable כן נקלטים.
#
# שימוש:  bash itai-crm/reference/extract-lesson-frames.sh "<נתיב mp4>" [שניות בין פריימים]
# ברירת מחדל: פריים כל 2 שניות. לכתוביות צפופות: 1.
set -e
FF="/c/Users/NIr/AppData/Local/Microsoft/WinGet/Packages/Gyan.FFmpeg_Microsoft.Winget.Source_8wekyb3d8bbwe/ffmpeg-8.1.2-full_build/bin/ffmpeg"
[ -x "$FF" ] || FF="ffmpeg"
SRC="$1"; STEP="${2:-2}"
[ -f "$SRC" ] || { echo "לא נמצא קובץ: $SRC" >&2; exit 1; }
OUT="${TMPDIR:-/tmp}/lesson-frames-$(basename "${SRC%.*}" | tr ' ' '-')"
rm -rf "$OUT"; mkdir -p "$OUT"
"$FF" -v error -i "$SRC" -vf "fps=1/$STEP" -q:v 2 "$OUT/f%03d.png"
echo "פריימים: $(ls "$OUT" | wc -l)"
echo "תיקייה: $OUT"
