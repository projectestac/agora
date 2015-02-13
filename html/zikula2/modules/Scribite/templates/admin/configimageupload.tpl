{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Image upload settings"}</h3>
</div>


{form cssClass="z-form"}
    {formvalidationsummary}

    <fieldset>
        <legend>{gt text='General settings'}</legend>

        <div class="z-formrow">
            {formlabel for="image_upload" __text='Enable image upload'}
            {formcheckbox id="image_upload"}
        </div>
        
        
        <div class="z-formrow">
            {formlabel for="upload_path" __text='URL to your uploads folder'}
            {formtextinput size="40" maxLength="100" id="upload_path"}
            <em class="z-formnote z-sub">
                {gt text='e.g. userdata/Scribite'}
            </em>
        </div>

        <div class="z-buttons z-formbuttons">
            {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        </div>

    </fieldset>

{/form}

{adminfooter}