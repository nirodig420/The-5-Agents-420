# הצעה: דף תודה באנגלית + סגירת משפך הלידים של `/en/`

**תאריך:** 2026-06-15 · **מגיש:** אנצ'לוטי (דרך רובן) · **סטטוס:** ⏳ ממתין לאישור "אשר" מניר
**נכס מקור:** `template-en.php` (English Homepage) · **נכס מקביל בעברית:** shortcode `niro_thank_you` → `/niro_thank-you/`

---

## TL;DR — ההמלצה בשורה אחת

הדף האנגלי כרגע **מדליף כל ליד שנכנס אליו**. לפני שבונים דף תודה יפה, חייבים לאטום את הדליפה: הטופס באנגלית עדיין מריץ את הגרסה המזויפת (`setTimeout` שמראה "Sent Successfully" בלי לשלוח כלום ובלי הפניה). **ה-MVP שאני ממליץ עליו: דף תודה אנגלי תאום לעברי (shortcode), + תיקון הטופס שיישלח ל-Make ויפנה אליו, + מגנט ערך אחד פשוט (צ'קליסט PDF).** זה אוטם את הדליפה, מפעיל את פיקסל ה-Lead, ונותן ללקוח ערך מיידי — הכל בפריסה אחת קטנה. רצפי nurture מתקדמים באים אחרי שהבסיס הזה חי ומאומת.

---

## איפה הדליפה (מיפוי שש התחנות על `/en/`)

| תחנה | מצב היום ב-`/en/` | פעולה |
|---|---|---|
| 1. הפנייה נכנסת | קמפיין/אורגני באנגלית → `/en/` | קיים ✅ |
| 2. מקום אחד ברור | טופס יחיד בתחתית הדף (`#contact`) | קיים ✅ |
| 3. **נקודת הדליפה** ⚠️ | **הטופס מזייף שליחה — הליד נעלם** | **לב המשימה** |
| 4. לכידה אוטומטית | webhook → Airtable קיים ועובד | תשתית קיימת ✅ |
| 5. מענה מיידי + מעקב | אין בכלל באנגלית | שלב ב' (nurture) |
| 6. ניר נכנס לסגור | לא מגיע — אין ליד | נפתר אחרי שלב 3+4 |

**הדליפה היחידה החיה והדחופה: תחנה 3.** דף תודה יפה בלי תיקון הטופס = תפאורה על דלת פתוחה. שתי הפעולות הולכות יחד.

---

## חלק 1 — דף התודה באנגלית

### העיקרון
הדף העברי הוא "קצה הדרך": תודה → רשתות → חזרה לאתר. טוב, אבל פסיבי.
באנגלית אנחנו הופכים את דף התודה ל**שלב הבא במשפך**, לא לסוף. הלקוח כבר אמר "כן" אחד (השאיר פרטים) — זה הרגע הכי חם לבקש "כן" שני קטן (מחויבות ועקביות, Cialdini). אנחנו נותנים לו ערך מיידי *עכשיו*, לא רק הבטחה ל"נחזור אליך".

### המבנה (תאום לעברי, מותאם LTR ולקול NIRO)
1. **לוגו** (אותו נכס מהאתר).
2. **כותרת תודה** + מסר אישור אנושי בגוף ראשון (ניר מדבר).
3. **ציפיות ברורות** — מתי בדיוק נחזור (מסיר חרדה, בונה אמון).
4. **שכבת Give-Value** — המתנה המיידית (המגנט; ראה חלק 1ב').
5. **CTA הבא במשפך** — וואטסאפ ישיר (הלקוח מוביל את הקצב, תחושת שליטה).
6. **כפתורי Facebook + Instagram** — לבישול ארוך-טווח (retargeting רגשי).
7. **חזרה לאתר** — משני, לא מודגש.

### הקופי המלא (English — טיוטה לליטוש סופי של יעל)

> **Headline:** Thank you, [name]! You're in. ✅
> *(אם אין שם דינמי בשלב ראשון — "Thank you! You're in.")*
>
> **Confirmation:** I've got your details, and I'm already looking them over personally.
> No call center, no bots in between — this comes straight to me, Nir.
>
> **Expectations:** I'll be in touch within one business day. If it's urgent, the fastest way to reach me is right below. 👇
>
> **Give-Value block (headline):** While you're here — here's something useful, on me:
> **[CTA button]** Get the free guide
> *(טקסט המגנט מתחלף לפי האופציה שניר בוחר — ראה 1ב')*
>
> **WhatsApp CTA:** Prefer to talk now? Message me on WhatsApp 💬
>
> **Social line:** Want to see how I think about marketing & automation? Follow along:
> [Facebook] [Instagram]
>
> **Back link:** Back to the site

הערות קופי: גוף ראשון ("I", "me, Nir"), משפטים קצרים, בלי מקפים גדולים, שפה חיובית לכל אורך, CTA אחד ראשי (המגנט/וואטסאפ) — הרשתות והחזרה לאתר משניים ויזואלית.

### חלק 1ב' — שלוש אופציות למגנט הערך (Give-Value-First)

| # | מגנט | למה זה עובד | Trade-off | מתי לבחור |
|---|---|---|---|---|
| **A** | **צ'קליסט / מדריך PDF** — "5 Automations Every Small Business Should Have" | מוכן כמעט: כבר קיים `Output/2026-06-11-5-automations-every-business.md`. הורדה מיידית = הדדיות בשנייה הראשונה. נכס רב-פעמי (גם לסושיאל). | צריך עיצוב PDF (יובל) + קישור הורדה. ערך "סטטי". | **ה-MVP המומלץ.** הכי מהיר לאוויר, סיכון אפס. |
| **B** | **סרטון קצר (60-90ש')** — ניר מסביר את "המשפך שלא מדליף" | אנושי, בונה אמון ופנים-למותג מהר, מתחבר ל-Standing Rule של וידאו. | הפקה (Sora/הקלטה), עולה זמן/כסף, פחות "להורדה". | כשרוצים חיבור רגשי חזק והדף כבר יציב. |
| **C** | **הזמנה לשיחת אבחון 15 ד' (Calendly)** | מקצר את המשפך — קופץ ישר לסגירה. ה"כן" השני הכי חזק. | לא "ערך" אלא עוד בקשה; מתאים רק לליד חם מאוד; דורש יומן מחובר. | כשניר רוצה להאיץ סגירות וזמינות גבוהה. |

**המלצתי:** להשיק עם **A** (הצ'קליסט PDF — התוכן כבר קיים), ולהוסיף את **C** (וואטסאפ/שיחה) כ-CTA משני באותו דף. ככה הדף נותן ערך *וגם* פותח דלת לשלב הבא, בלי להעמיס. B נכנס בגרסה 2 כשרוצים לחזק חיבור.

---

## חלק 2 — המשפך סביב הדף (מסע הלקוח)

```
קמפיין/אורגני EN  →  /en/  →  טופס (#contact)
                                  │  (תחנה 3: כאן הדליפה היום)
                                  ▼
                      fetch → Make webhook → Airtable (CRM)  ✅ תשתית קיימת
                                  │  source: "אתר - דף אנגלית"
                                  ▼
                      Redirect → /en/thank-you/
                                  │
                      ┌───────────┼───────────────┐
                      ▼           ▼               ▼
              Give-Value      WhatsApp CTA     FB + IG
              (PDF/מגנט)      (שלב הבא חם)    (בישול ארוך)
                                  │
                                  ▼
                      ניר נכנס לסגור ליד מחומם  (תחנה 6)
```

**מ"קצה הדרך" ל"שלב הבא":** דף התודה לא נגמר ב"תודה". הוא מציע שלוש דרכי המשך לפי טמפרטורת הלקוח — מגנט (ערך), וואטסאפ (סגירה מהירה), רשתות (בישול). ה-source `"אתר - דף אנגלית"` שכבר מתוכנן בתיקון הטופס נותן לנו פילוח: נדע בדיוק כמה לידים מגיעים מ-`/en/` מול העברית.

**שלב ב' — nurture (אחרי שה-MVP חי):** רצף מייל/וואטסאפ אנגלי קצר ללידים שלא ענו — דקה ראשונה (אישור + המגנט), יום 1, יום 3. זה ייבנה כהצעה נפרדת כשהבסיס מאומת. לא לפני.

---

## חלק 3 — תוכנית הטמעה טכנית (ל-Eitan, לא לאנצ'לוטי)

> ⚠️ הטמעה בפועל היא של איתן בלבד, דרך `wp-rest` / עורך קבצים, **רק אחרי "אשר"**. אנצ'לוטי מתכנן ומכין קוד מוכן-להדבקה. סנאפשוט לפני כל עריכה (Standing Rule #3). `template-en.php` הוא קובץ theme ידני (לא Elementor) — נגיעה בטוחה.

### 3א. עמוד התודה — shortcode חדש `niro_thank_you_en`
ליצור עמוד WordPress עם slug `thank-you` תחת `/en/` (תלוי בהיררכיית העמודים — אם `/en/` הוא parent page, יוצרים child page "thank-you" → ה-URL יוצא `/en/thank-you/`). העמוד מכיל רק את ה-shortcode. קוד מוכן-להדבקה ל-`functions.php` של ה-theme:

```php
add_shortcode('niro_thank_you_en', function() {
    ob_start(); ?>
    <script>fbq('track', 'Lead');</script>

    <div class="ty-en-fullscreen">
        <div class="ty-en-card">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png" alt="Niro Logo" class="ty-en-logo">
            <h1>Thank you! You're in. ✅</h1>
            <p>I've got your details and I'm already looking them over personally.<br>
               This comes straight to me, Nir. No call center, no bots in between.</p>
            <p class="ty-en-eta">I'll be in touch within one business day.</p>
            <div class="ty-en-divider"></div>

            <!-- GIVE-VALUE (Option A: free guide). החלף href בקישור ההורדה הסופי -->
            <p class="ty-en-gift">While you're here, here's something useful, on me:</p>
            <a href="REPLACE_WITH_PDF_LINK" target="_blank" class="ty-en-magnet">Get the free guide: 5 Automations Every Business Needs</a>

            <!-- CTA הבא במשפך: WhatsApp -->
            <a href="https://wa.me/972559322991" target="_blank" class="ty-en-wa">Prefer to talk now? Message me on WhatsApp</a>

            <p class="ty-en-follow">See how I think about marketing &amp; automation:</p>
            <div class="ty-en-social">
                <a href="https://www.facebook.com/profile.php?id=61578880211111" target="_blank" rel="noopener" class="ty-en-circle fb" title="Facebook">f</a>
                <a href="https://www.instagram.com/nvb.1982/" target="_blank" rel="noopener" class="ty-en-circle ig" title="Instagram">ig</a>
            </div>

            <a href="/en/" class="ty-en-back">Back to the site</a>
        </div>
    </div>

    <style>
        .ty-en-fullscreen { position: fixed; top:0; left:0; width:100vw; height:100vh;
            background:#0a1020; display:flex; align-items:center; justify-content:center;
            z-index:999999; direction:ltr; font-family:'Heebo',sans-serif; overflow-y:auto; }
        .ty-en-card { background:#f4f7fa; padding:50px 40px; border-radius:40px; text-align:center;
            max-width:520px; width:90%; box-shadow:0 30px 60px rgba(0,0,0,0.5); border-bottom:10px solid #e6463a; margin:20px; }
        .ty-en-logo { height:90px; width:auto; margin-bottom:20px; }
        .ty-en-card h1 { color:#0b1f5b; font-size:40px; margin:0 0 15px; font-weight:900; }
        .ty-en-card p { color:#333; font-size:18px; line-height:1.6; margin:0 0 12px; }
        .ty-en-eta { font-weight:600; color:#0b1f5b !important; }
        .ty-en-divider { height:3px; width:60px; background:#e6463a; margin:22px auto; }
        .ty-en-gift { font-weight:700; color:#0b1f5b !important; margin-bottom:14px !important; }
        .ty-en-magnet { display:inline-block; background:#e6463a; color:#fff; text-decoration:none;
            padding:15px 30px; border-radius:12px; font-weight:800; font-size:17px; margin-bottom:22px;
            box-shadow:0 5px 15px rgba(230,70,58,0.3); transition:0.3s; }
        .ty-en-magnet:hover { background:#c5352b; transform:translateY(-3px); }
        .ty-en-wa { display:block; color:#0b1f5b; text-decoration:none; font-weight:700; font-size:16px; margin-bottom:28px; }
        .ty-en-wa:hover { color:#25D366; }
        .ty-en-follow { font-weight:600; color:#0b1f5b !important; margin-bottom:16px !important; font-size:15px; }
        .ty-en-social { display:flex; justify-content:center; gap:18px; margin-bottom:30px; }
        .ty-en-circle { width:52px; height:52px; display:flex; align-items:center; justify-content:center;
            border-radius:50%; text-decoration:none; color:#fff; font-weight:600; font-size:22px; transition:0.3s;
            box-shadow:0 4px 10px rgba(0,0,0,0.1); font-family:'Segoe UI',sans-serif; }
        .ty-en-circle.fb { background:#1877F2; }
        .ty-en-circle.ig { background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888); }
        .ty-en-circle:hover { transform:translateY(-3px); opacity:0.9; }
        .ty-en-back { display:inline-block; padding:11px 36px; border:1px solid #0b1f5b; color:#0b1f5b;
            text-decoration:none; border-radius:50px; font-size:15px; transition:0.3s; }
        .ty-en-back:hover { background:#0b1f5b; color:#fff; }
        #wpadminbar { display:none !important; } html { margin-top:0 !important; }
    </style>
    <?php
    return ob_get_clean();
});
```

הערות עיצוב: זהה במבנה לדף העברי (אותו `#0a1020`, אותם circles), עם `direction:ltr` והוספת שכבת המגנט+וואטסאפ. הוספתי `overflow-y:auto` כי באנגלית יש יותר תוכן בכרטיס (חשוב למובייל).

### 3ב. תיקון הטופס ב-`template-en.php` (אטימת הדליפה)
להחליף את `handleFormSubmit` המזויף (שורות הסקריפט עם `setTimeout`) בגרסה שולחת-באמת + מפנה. תואם בדיוק להצעת איתן מ-2026-06-11, עם source אנגלי:

```js
function handleFormSubmit(e){
  e.preventDefault();
  const f=e.target, btn=f.querySelector('button'), orig=btn.innerText;
  btn.innerText="Sending..."; btn.disabled=true;
  const data={ client_name:f.client_name?.value||'', client_phone:f.client_phone?.value||'',
    client_email:f.client_email?.value||'', client_message:f.client_message?.value||'',
    source:'אתר - דף אנגלית' };
  fetch('https://hook.eu1.make.com/frzwgajh6u8nxhw3ba7dljfewnjg16qt',
    {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)})
    .then(()=>{ window.location.href='/en/thank-you/'; })
    .catch(()=>{ btn.innerText="Error, please try again"; btn.disabled=false; });
  return false;
}
```

הערה: הטופס האנגלי חסר `fbq` ב-`<head>` (יש GTM בלבד). ה-shortcode מריץ `fbq('track','Lead')` — צריך לוודא שפיקסל פייסבוק נטען דרך GTM, אחרת ה-fbq בעמוד התודה יזרוק שגיאה. **לאיתן לבדוק לפני העלאה.**

### 3ג. מה צריך מכל זרוע
- **איתן:** ליצור child page `/en/thank-you/`, להדביק את ה-shortcode ל-`functions.php`, לתקן את `handleFormSubmit` ב-`template-en.php`, סנאפשוט לפני, בדיקת fbq. **רק אחרי "אשר".**
- **יעל:** ליטוש סופי של קופי האנגלית בקול המותג (הטיוטה בחלק 1 מוכנה; יעל מאשרת/משייפת ניואנסים).
- **יובל:** עיצוב ה-PDF של המגנט (אופציה A) — לוקח את `Output/2026-06-11-5-automations-every-business.md` והופך לנכס מעוצב להורדה. **רק אם ניר בוחר אופציה A/B.**
- **מריו (בהמשך):** כשהמגנט חי, להזין אותו לקמפיינים/סושיאל.

---

## מה דורש "אשר" מניר לפני ביצוע

1. **אישור עקרוני** לבנות דף תודה אנגלי + לתקן את הטופס האנגלי (אטימת הדליפה).
2. **בחירת מגנט הערך:** A (צ'קליסט PDF — מומלץ) / B (וידאו) / C (שיחת אבחון). אפשר A+וואטסאפ כברירת מחדל.
3. **אימות פרטים:** קישורי FB/IG (כבר מאומתים בקוד), מספר וואטסאפ `972559322991`, וה-URL הסופי של עמוד התודה (`/en/thank-you/` או slug אחר שניר מעדיף).
4. **אישור slug + היררכיית עמודים** לאיתן (האם `/en/` הוא page עם children, או צריך rewrite).

> ⚠️ שום קוד לא עולה לאוויר בלי "אשר". זו הצעה בלבד.
