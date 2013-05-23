{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Module config'}</h3>
</div>
<form class="z-form" action="{modurl modname="Scribite" type="admin" func="updateconfig"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="Editors"}</legend>
            <div class="z-formrow">
                <label for="editors_path">{gt text="Editorpath"}</label>
                <input id="editors_path" type="text" name="editors_path" size="40" maxlength="60" value="{$modvars.Scribite.editors_path|safetext}" />
            </div>
            <div class="z-formrow">
                <label for="DefaultEditor">{gt text="Default editor"}</label>
                <select id="DefaultEditor" name="DefaultEditor">
                    {html_options options=$editor_list selected=$modvars.Scribite.DefaultEditor}
                </select>
            </div>
        </fieldset>

        <div class="z-buttons z-formbuttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}
            <a href="{modurl modname='Scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}