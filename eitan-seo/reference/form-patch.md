# תיקון טופס האתר — שליחה אמיתית ל-Make → Airtable

מחליפים את הפונקציה `handleFormSubmit` הקיימת (שמזייפת הצלחה) בגרסה ששולחת את הליד
ל-webhook ומפנה לעמוד התודה. תקף לשני הקבצים: `front-page.php` (עברית) ו-`template-en.php` (אנגלית).
שני הקבצים מכילים את אותה פונקציה — מחליפים בשניהם.

webhook: `https://hook.eu1.make.com/frzwgajh6u8nxhw3ba7dljfewnjg16qt` (תרחיש "Integration Webhooks").

## למצוא ולמחוק את הפונקציה הישנה
מתחיל ב-`function handleFormSubmit(e) {` ועד ה-`}` הסוגר (הגרסה הישנה עושה `setTimeout` ומציגה "נשלח בהצלחה").

## להדביק במקומה (זהה לשני הקבצים)
```js
function handleFormSubmit(e) {
    e.preventDefault();
    var form = e.target;
    var btn = form.querySelector('button');
    btn.innerText = "שולח...";
    btn.disabled = true;

    var data = {
        client_name:      form.client_name ? form.client_name.value : '',
        client_phone:     form.client_phone ? form.client_phone.value : '',
        client_email:     form.client_email ? form.client_email.value : '',
        client_message:   form.client_message ? form.client_message.value : '',
        selected_service: form.selected_service ? form.selected_service.value : '',
        source: 'אתר - ' + location.pathname
    };

    fetch('https://hook.eu1.make.com/frzwgajh6u8nxhw3ba7dljfewnjg16qt', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(function () { window.location.href = '/niro_thank-you/'; })
    .catch(function () { btn.innerText = "אופס, נסו שוב"; btn.disabled = false; });
    return false;
}
```

## הערות
- בהצלחה → הפניה ל-`/niro_thank-you/` (עמוד התודה שמפעיל את פיקסל ה-Lead). אמיתי, לא מזויף.
- הצ'אטבוט "מיכאלה" משתמש באותה פונקציה → יעבוד גם הוא (שדה `selected_service` נשלח).
- **קודם להפעיל את תרחיש ה-Make (ON)**, אחרת הליד לא ייקלט.
- אם בבדיקה החיה יש שגיאת CORS — נחליף ל-`application/x-www-form-urlencoded` (גיבוי).
