{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Edit comment'}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}
<fieldset>
    <legend>{gt text="Edit"}</legend>

    {if $anonname neq ''}
    <div class="z-formrow">
        {formlabel for="ezcomments_anonname" __text='Name'}
        {formtextinput id="ezcomments_anonname" text=$anonname size="32" maxLength="255"}
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
        {formlabel for="ezcomments_ipaddr" __text='IP address'}
        {gt text="not logged" assign=notloggedstring}
        <span id="ezcomments_ipaddr">{$ipaddr|default:$notloggedstring|safetext}</span>
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_subject" __text='Subject'}
        {formtextinput id="ezcomments_subject" text=$subject size="32" maxLength="255"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_comment" __text='Comment'}
        {formtextinput id="ezcomments_comment" textMode="multiline" rows="10" cols="50" text=$comment size="32"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_status" __text='Status'}
        {formdropdownlist id="ezcomments_status" items=$statuslevels selectedValue=$status}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_sendmeback" __text='Send me back to the commented content after finishing'}
        {formcheckbox id="ezcomments_sendmeback" checked=$redirect}
    </div>

</fieldset>

<div class="z-buttons z-formbuttons">
    {formbutton class="z-bt-save" id="submit" commandName="submit" __title="Update" __text="Update"}
    {formbutton class="z-bt-delete" id="delete" commandName="delete" __title="Delete" __text="Delete"}
    {formbutton class="z-bt-cancel" id="cancel" commandName="cancel" __title="Cancel" __text="Cancel"}
</div>

{/form}
{adminfooter}

