{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text="Edit module: %s" tag1=$modulename|safetext}</h3>
</div>

<form class="z-form" action="{modurl modname="Scribite" type="admin" func="updatemodule"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input id="mid" type="hidden" name="mid" value="{$mid}" />
        <input id="modulename" type="hidden" name="modulename" size="25" maxlength="25" value="{$modulename|safetext}" readonly="readonly" />
        <fieldset>
            <legend>{$modulename|safetext}</legend>
            <div class="z-formrow">
                <label for="modfuncs">{gt text="Module functions"}</label>
                <input id="modfuncs" type="text" name="modfuncs" size="50" maxlength="100" value="{$modfuncs|safetext}" />
                <em class="z-formnote z-sub">{gt text="(comma separated, 'all' for all funcs)"}</em>
            </div>
            <div class="z-formrow">
                <label for="modareas">{gt text="Textarea-ID's"}</label>
                <input id="modareas" type="text" name="modareas" size="50" maxlength="50" value="{$modareas|safetext}" />
                <em class="z-formnote z-sub">{gt text="(comma separated, 'all' for all funcs)"}</em>
            </div>
            <div class="z-formrow">
                <label for="modeditor">{gt text="Editor"}</label>
                <select id="modeditor" name="modeditor">
                    {html_options options=$editor_list selected=$modeditor}
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
