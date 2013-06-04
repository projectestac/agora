{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}
    <fieldset>
        <legend>{gt text='General settings'}</legend>
        <div class="z-formrow">
            {formlabel for="enablecategorization" __text='Enable categorization'}
            {formcheckbox id="enablecategorization"}
        </div>
        <div class="z-formrow">
            {formlabel for="itemsperpage" __text='Items per page'}
            {formintinput id="itemsperpage" size="3"}
        </div>
    </fieldset>
    <fieldset>
        <legend>{gt text='New page defaults'}</legend>
        <div class="z-formrow">
            {formlabel for="displaywrapper" __text='Display additional information'}
            {formcheckbox id="displaywrapper"}
        </div>
        <div class="z-formrow">
            {formlabel for="displaytitle" __text='Display page title'}
            {formcheckbox id="displaytitle"}
        </div>
        <div class="z-formrow">
            {formlabel for="displaycreated" __text='Display page creation date'}
            {formcheckbox id="displaycreated"}
        </div>
        <div class="z-formrow">
            {formlabel for="displayupdated" __text='Display page update date'}
            {formcheckbox id="displayupdated"}
        </div>
        <div class="z-formrow">
            {formlabel for="displaytextinfo" __text='Display page text statistics'}
            {formcheckbox id="displaytextinfo"}
        </div>
        <div class="z-formrow">
            {formlabel for="displayprint" __text='Display page print link'}
            {formcheckbox id="displayprint"}
        </div>
    </fieldset>
    <fieldset>
        <legend>{gt text='Permalinks settings'}</legend>
        <div class="z-formrow">
            {formlabel for="addcategorytitletopermalink" __text='Add category title to permalink'}
            {formcheckbox id="addcategorytitletopermalink"}
        </div>
        <div class="z-formrow">
            {formlabel for="showpermalinkinput" __text='Show permalink input field'}
            {formcheckbox id="showpermalinkinput"}
        </div>
    </fieldset>

    <div class="z-formbuttons z-buttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>


{/form}
{adminfooter}