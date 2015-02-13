{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Module config'}</h3>
</div>
{form cssClass="z-form"}
    {formvalidationsummary}
    <fieldset>
        <legend>{gt text="Editor"}</legend>
        <div class="z-formrow">
            {formlabel for="DefaultEditor" __text="Default editor"}
            {formdropdownlist id="DefaultEditor" items=$editor_list}
            <em class="z-formnote">
                <a href="{modurl modname='Extensions' type='admin' func='viewPlugins' bymodule='Scribite'}">{gt text="Manage editors"}</a>
            </em>
        </div>
    </fieldset>

    <div class="z-buttons z-formbuttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
{/form}
{adminfooter}