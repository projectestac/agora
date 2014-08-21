<div class="z-formrow">
    {formlabel for='text' __text='Text'}
    {formtextinput id='text' textMode='multiline' group='translated' cols='60' rows='20' text=$data.text}
</div>
{notifydisplayhooks eventname='content.ui_hooks.htmlcontenttype.form_edit' id=$translationInfo.curContentId}
