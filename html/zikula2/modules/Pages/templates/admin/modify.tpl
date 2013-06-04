{ajaxheader modname='Pages' filename='pages.js'}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Update page'}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}



    <fieldset>
        <legend>{gt text='Content'}</legend>
        <div class="z-formrow">
            {formlabel for="title" __text='Title'}
            {formtextinput id="title" maxLength="255" mandatory=true}
        </div>
        {if $modvars.Pages.showpermalinkinput}
        <div class="z-formrow">
            {formlabel for="urltitle" __text='PermaLink URL title'}
            {formtextinput id="urltitle" maxLength="255"}
            <em class="z-sub z-formnote">{gt text='(Blank = auto-generate)'}</em>
        </div>
        {/if}
        {if $modvars.Pages.enablecategorization}
        {foreach from=$registries item="registryCid" key="registryId"}
            <div class="z-formrow">
                {formlabel for="category_`$registryId`" __text="Category"}
                {formcategoryselector id="category_`$registryId`" category=$registryCid dataField="categories" group="page" registryId=$registryId doctrine2=true}
            </div>
        {/foreach}
        {/if}
        {if $modvars.ZConfig.multilingual}
        <div class="z-formrow">
            {formlabel for="language" __text='Language'}
            {formlanguageselector id="language"}
        </div>
        {/if}
        <div class="z-formrow">
            {formlabel for="content" __text='Content'}
            {formtextinput textMode="multiline" id="content" rows="10" cols="50"}
            <em class="z-sub z-formnote">{gt text='If you want multiple pages you can write &lt;!--pagebreak--&gt; where you want to cut.'}</em>
        </div>
    </fieldset>
    <fieldset>
        <legend>{gt text='Meta tags'}</legend>
        <div class="z-formrow">
            {formlabel for="metadescription" __text='Description'}
            {formtextinput id="metadescription" maxLength="255"}
        </div>
        <div class="z-formrow">
            {formlabel for="metakeywords" __text='Keywords'}
            {formtextinput textMode="multiline" id="metakeywords" rows="4" cols="50"}
        </div>
    </fieldset>
    <fieldset>
        <legend><a id="pages_settings_collapse" href="javascript:void(0);">{gt text='Specific page settings'}</a></legend>
        <div id="pages_settings_details">
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
        </div>
    </fieldset>
    <fieldset class="z-formrow">
        <legend><a id="pages_meta_collapse" href="javascript:void(0);">{gt text='Meta data'}</a></legend>
        <div id="pages_meta_details">
            <ul>
                {usergetvar name='uname' uid=$cr_uid assign='username'}
                <li>{gt text='Created by %s' tag1=$username}</li>
                <li>{gt text='Created on %s' tag1=$cr_date|dateformat}</li>
                {usergetvar name='uname' uid=$lu_uid assign='username'}
                <li>{gt text='Last update by %s' tag1=$username}</li>
                <li>{gt text='Updated on %s' tag1=$lu_date|dateformat}</li>
            </ul>
        </div>
    </fieldset>

    {*if is_numeric($pageid)}
    {notifydisplayhooks eventname='pages.ui_hooks.pages.form_edit' id=$pageid}
    {/if*}

    <div class="z-formbuttons z-buttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-delete" commandName="remove" __text="Remove"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>


{/form}
{adminfooter}