{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text="Clone page"}</h3>
</div>

{if isset($page)}<div class="content-page-path">{contentpagepath pageId=$page.id}</div>{/if}

{insert name="getstatusmsg"}
{form cssClass='z-form'}
{formsetinitialfocus inputId='title'}
{formerrormessage id='error'}

{contentformframe}
<fieldset>
    <div class="z-formrow">
        {formlabel for='title' __text='Page title'}
        {formtextinput id='title' mandatory='1' maxLength='255'}
    </div>
    <div class="z-formrow">
        {formlabel for='urlname' __text='Permalink URL name'}
        {formtextinput id='urlname' maxLength='255'}
        {contentlabelhelp __text='Used to refer this page in short URLs mode. Leave as blank for default value.'}
    </div>
    <div class="z-formrow">
        {formlabel for='translation' __text='Clone translations'}
        {formcheckbox id='translation' checked='true'}
    </div>
</fieldset>

{notifydisplayhooks eventname='content.ui_hooks.pages.form_edit' id=null}

<div class="z-buttons z-formbuttons">
{formbutton class="z-bt-icon con-bt-clone" commandName="clonePage" __text="Clone"}
{formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
</div>
{/contentformframe}
{/form}
{adminfooter}