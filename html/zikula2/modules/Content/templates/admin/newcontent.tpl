{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="new" size="small"}
    <h3>{gt text="Add new content to page"}</h3>
</div>

{contentpagepath pageId=$page.id language=$page.language assign='subheader'}
<h4>{$subheader}</h4>

{form cssClass='z-form z-linear'}

{formsetinitialfocus inputId='contentType'}
{formerrormessage id='error'}

{contentformframe}

<p>{gt text="Please select the type of content you want to add to your page."}</p>

<fieldset>
    <legend>{gt text="Select content type"}</legend>
    {contentcontenttypeselector id='contentType'}
</fieldset>

<div class="z-buttons">
    {formbutton class="z-bt-new" commandName="create" __text="Create"}
    {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
</div>

{/contentformframe}

{/form}
{adminfooter}