# mario-setup — מדריך חיבור מריו ל-Meta

**קובץ:** `mario- meta/SETUP.md`
**משויך ל:** [[agent-mario]] (מריו)
**סוג:** מדריך חיבור חד-פעמי (לניר)

## מה הקובץ עושה
מסביר לניר איך מחברים את מריו ל-Facebook/Instagram, בשני מסלולים:

- **מסלול A — Make (מומלץ) ⭐:** רוב העבודה כבר עשויה — בחשבון ה-Make של ניר כבר קיימים
  חיבורי Facebook פעילים (+Lead Ads). בודקים שהחיבור חי ושיש scopes לפרסום
  (`pages_manage_posts`, `instagram_content_publish`) ול-ads (`ads_read`/`ads_management`),
  ומאפיינים את תרחישי הביצוע. בלי Meta App ובלי App Review.
- **מסלול B — API גולמי (אופציונלי):** מוציאים טוקן long-lived + Page/IG/Ad-Account IDs
  וממלאים `META_*` ב-`.env` → הסקיל [[skill-meta-publish]] פועל.

## חוק הברזל
גם אחרי החיבור: תוכן אורגני רק אחרי "אשר", וכל דבר שכרוך בכסף = אישור ידני של ניר.

## קבצים קשורים
- [[agent-mario]] — הסוכן.
- [[skill-meta-publish]] — מסלול B (API גולמי).
- [[env-config]] — `META_*` / `MAKE_*`.
