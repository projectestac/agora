{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="locale" size="small"}
    <h3>{gt text="Translate content item"}</h3>
</div>

<h4>{$page.title}</h4>

{form cssClass='z-form'}

{contentformframe}

{if $isTranslatable}
<fieldset id="contentTranslateOriginal" class="z-linear">
    <legend>{gt text="Original content"}</legend>
    <div class="z-formrow">
        {include file=$translationtemplates.original}
    </div>
</fieldset>

<fieldset id="contentTranslateNew" class="z-linear">
    <legend>{gt text="Translated content"} ({$language})</legend>
    {include file=$translationtemplates.new}
</fieldset>

<div class="z-buttons">
    {formbutton class="z-bt-icon con-bt-prev" commandName="prev" __text="Previous"}
    {formbutton class="z-bt-icon con-bt-next" commandName="next" __text="Next"} &mdash;
    {formbutton class="z-bt-icon con-bt-skip" commandName="skip" __text="Skip"}
    {formbutton class="z-bt-save z-btgreen" commandName="quit" __text="Save"}
    {if $access.pageDeleteAllowed}
    {formbutton class="z-bt-delete z-btred" commandName="delete" __text="Delete" __confirmMessage='Delete'}
    {/if}
    {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    {formdropdownlist id='translationStep' items=$translationInfo.items autoPostBack='1' onSelectedIndexChanged='handleCommand'}
</div>
{else}
<p class="z-warningmsg">{gt text="Error! There is nothing to translate for this content type."}</p>

<div class="z-buttons z-formbuttons">
    {formbutton class="z-bt-cancel" commandName="cancel" __text="Back"}
</div>
{/if}

{/contentformframe}

{/form}
{adminfooter}