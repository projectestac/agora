{ajaxheader modname='Formicula' filename='formicula_admin_modifyconfig.js' effects=true}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Modify configuration"}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}

<fieldset>
    <legend>{gt text="Modify configuration"}</legend>
    <div class="z-formrow">
        {formlabel for="default_form" __text='Set the default form'}
        {formdropdownlist id="default_form" items=$items selectedValue=$coredata.Formicula.default_form}
        <em class="z-sub z-formnote">{gt text="(used when no form is specified)"}</em>
    </div>
    <div class="z-formrow">
        {formlabel for="show_phone" __text='Show phone number'}
        {formcheckbox id="show_phone" checked=$coredata.Formicula.show_phone}
    </div>
    <div class="z-formrow">
        {formlabel for="show_company" __text='Show company'}
        {formcheckbox id="show_company" checked=$coredata.Formicula.show_company}
    </div>
    <div class="z-formrow">
        {formlabel for="show_url" __text='Show URL'}
        {formcheckbox id="show_url" checked=$coredata.Formicula.show_url}
    </div>
    <div class="z-formrow">
        {formlabel for="show_location" __text='Show location'}
        {formcheckbox id="show_location" checked=$coredata.Formicula.show_location}
    </div>
    <div class="z-formrow">
        {formlabel for="show_comment" __text='Show comments textarea'}
        {formcheckbox id="show_comment" checked=$coredata.Formicula.show_comment}
    </div>
    <div class="z-formrow">
        {formlabel for="send_user" __text='Send confirmation email to user'}
        {formcheckbox id="send_user" checked=$coredata.Formicula.send_user}
    </div>
    <div class="z-formrow">
        {formlabel for="upload_dir" __text='directory for uploaded file(s)'}
        {formtextinput size="40" maxLength="80" id="upload_dir" text=$coredata.Formicula.upload_dir}
    </div>
    <div class="z-formrow">
        {formlabel for="delete_file" __text='Delete uploaded file(s) after sending'}
        {formcheckbox id="delete_file" checked=$coredata.Formicula.delete_file}
    </div>
</fieldset>

<fieldset>
    <legend>{gt text="Spam check settings"}</legend>
    <div class="z-warningmsg">{gt text='For your information: There are better spam check modules out there. For example the Zikula Captcha module which can be hooked to Formicula. If you want to use this module, then please do not forget to add the required permissions for the Captcha module, too.'}</div>
    <div class="z-formrow">
        {formlabel for="spamcheck" __text='Activate simple spam check'}
        {formcheckbox id="spamcheck" checked=$coredata.Formicula.spamcheck}
        <div class="z-formnote z-informationmsg">{gt text="Make sure you the necessary form fields are available, see the docs for more information. This option will be turned off by Formicula automatically if no PHP-functions for creating images are available"}</div>
    </div>
    <div id="formicula_spamcheck_details">
        <div class="z-formrow">
            <label>{gt text='Cache directory'}</label>
            <span>{$cachedir}</span>
        </div>
        <div class="z-formrow">
            {formlabel for="excludespamcheck" __text='Do not use spam check in these forms'}
            {formtextinput size="20" maxLength="40" id="excludespamcheck" text=$coredata.Formicula.excludespamcheck}
            <em class="z-sub z-formnote">{gt text="Comma separated list of form ids, e.g. embedded forms in pagesetter. The redirect may not work here correctly"}</em>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>{gt text="Form submits"}</legend>
    <div class="z-formrow">
        {formlabel for="store_data" __text='Store submitted data in database'}
        {formcheckbox id="store_data" checked=$coredata.Formicula.store_data}
    </div>
    <div id="formicula_storedata_details">
        <div class="z-formrow">
            {formlabel for="store_data_forms" __text='Only store submissions from these forms'}
            {formtextinput size="20" maxLength="40" id="store_data_forms" text=$coredata.Formicula.store_data_forms}
            <em class="z-sub z-formnote">{gt text="Comma separated list of form ids or leave empty for storing all forms."}</em>
        </div>
    </div>
</fieldset>

<div class="z-formbuttons z-buttons">
    {formbutton class="z-bt-ok" id="submit" commandName="submit" __text="Submit"}
</div>
{/form}

{adminfooter}
