/**
 * Insert a hidden input field to pass to subscriber module if it wants
 * to identify if a WYSIWYG editor has been used.
 * @see docs/en/dev/README.markdown
 * 
 * @param string textareaid
 * @return void
 */
var insertNotifyInput = function (textareaid) {
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute('id', 'scribiteeditorused.'+textareaid);
    hiddenField.setAttribute('name', 'scribiteeditorused['+textareaid+']');
    hiddenField.setAttribute('type', 'hidden');
    hiddenField.setAttribute('value', '1');
    var textareaEle = document.getElementById(textareaid);
    var formEle = textareaEle.parentNode;
    formEle.insertBefore(hiddenField, textareaEle);
}