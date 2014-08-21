<div class="z-linear">
    <div class="z-formrow">
        {formlabel for='text' __text='Text'}
        {formtextinput id='text' textMode='multiline' group='data' cols='60' rows='20'}
    </div>
    {notifydisplayhooks eventname='content.ui_hooks.htmlcontenttype.form_edit' id=$cid}
</div>