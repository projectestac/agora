{gt text="Edit comment" assign=templatetitle}
{include file="ezcomments_user_header.tpl"}
<h3>{$templatetitle}</h3>

{form cssClass="z-form"}
{formvalidationsummary}
<fieldset>
    <legend>{gt text="Edit"}</legend>

    {if $anonname neq ''}
    <div class="z-formrow">
        {formlabel for="ezcomments_anonname" __text='Name'}
        <span>{formtextinput id="ezcomments_anonname" text=$anonname size="32" maxLength="255"}</span>
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_anonmail" __text='E-mail address (will not be published)'}
        {formtextinput id="ezcomments_anonmail" text=$anonmail size="32" maxLength="255"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_anonwebsite" __text='Website'}
        {formtextinput id="ezcomments_anonwebsite" text=$anonwebsite size="32" maxLength="255"}
    </div>
    {else}
    <div class="z-formrow">
        {formlabel for="ezcomments_name" __text='Commentator'}
        <span id="ezcomments_name">{usergetvar name=uname uid=$uid}</span>
    </div>
    {/if}

    <div class="z-formrow">
        {if $nomodify == 1}
        <label>{gt text="Subject"}</label>
        <span>{$subject|safetext}</span>
        {else}
        {formlabel for="ezcomments_subject" __text='Subject'}
        {formtextinput id="ezcomments_subject" text=$subject size="32" maxLength="255"}
        {/if}
    </div>
    <div class="z-formrow">
        {if $nomodify == 1}
        <label>{gt text="Comment"}</label>
        {$comment|paragraph|notifyfilters:'subscriber.ezcomments.filter_hooks.comments'|safetext}
        {else}
        {formlabel for="ezcomments_comment" __text='Comment'}
        {formtextinput id="ezcomments_comment" textMode="multiline" rows="10" cols="50" text=$comment size="32"}
        {/if}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_sendmeback" __text='Redirect to the commented content after finishing'}
        {formcheckbox id="ezcomments_sendmeback" checked=$redirect}
    </div>

</fieldset>

<div class="z-buttons z-formbuttons">
    {formbutton class="z-bt-save" id="submit" commandName="submit" __title="Update" __text="Update"}
    {formbutton class="z-bt-delete" id="delete" commandName="delete" __title="Delete" __text="Delete"}
    {formbutton class="z-bt-cancel" id="cancel" commandName="cancel" __title="Cancel" __text="Cancel"}
</div>

{/form}
