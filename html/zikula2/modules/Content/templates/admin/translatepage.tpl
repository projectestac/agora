{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="locale" size="small"}
    <h3>{gt text="Translate page"}</h3>
</div>

<p class="z-informationmsg">{gt text="You can only translate the actual page data here. The content items must be translated one by one."}</p>

{form cssClass='z-form'}
{formsetinitialfocus inputId='title'}

{contentformframe}
<fieldset id="contentTranslateOriginal">
    <legend>{gt text="Original content"}</legend>
    <div class="z-formrow">
        <label>{gt text="Page title"}</label>
        <span>{$page.title}</span>
    </div>
    <div class="z-formrow">
        <label>{gt text="Meta description"}</label>
        <span>{$page.metadescription}</span>
    </div>
    <div class="z-formrow">
        <label>{gt text="Meta keywords"}</label>
        <span>{$page.metakeywords}</span>
    </div>
</fieldset>

<fieldset id="contentTranslateNew">
    <legend>{gt text="Translated content"} ({$language})</legend>
    <div class="z-formrow">
        {formlabel for='title' __text='Page title'}
        {formtextinput id='title' mandatory='1' maxLength='255' group='translated'}
    </div>
    <div class="z-formrow">
        {formlabel for='metadescription' __text='Meta description'}
        {formtextinput id='metadescription' mandatory=false textMode='multiline' rows='6' cols='50' group='translated'}
    </div>
    <div class="z-formrow">
        {formlabel for='metakeywords' __text='Meta keywords'}
        {formtextinput id='metakeywords' mandatory=false textMode='multiline' rows='4' cols='50' group='translated'}
    </div>
</fieldset>

<div class="z-buttons">
    {formbutton class="z-bt-icon con-bt-next" commandName="next" __text="Next"} &mdash;
    {formbutton class="z-bt-icon con-bt-skip" commandName="skip" __text="Skip"}
    {formbutton class="z-bt-save z-btgreen" commandName="quit" __text="Save"}
    {formbutton class="z-bt-delete z-btred" commandName="delete" __text="Delete" __confirmMessage='Delete page translation AND all content translations'}
    {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
</div>
{/contentformframe}
{/form}
{adminfooter}