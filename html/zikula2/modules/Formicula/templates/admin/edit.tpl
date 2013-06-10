{adminheader}
{if $mode=='create'}
{gt text="Add contact" assign=fortitle"}
{else}
{gt text="Edit contact" assign=fortitle"}
{/if}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{$fortitle}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}

<fieldset>
    <legend>{$fortitle}</legend>
    <div class="z-formrow">
        {formlabel for="cname" __text='Contact name'}
        {formtextinput size="40" maxLength="100" id="cname" text=$contact.name}
    </div>
    <div class="z-formrow">
        {formlabel for="email" __text='Email'}
        {formtextinput size="40" maxLength="200" id="email" text=$contact.email}
    </div>
    <div class="z-formrow">
        {formlabel for="public" __text='Public'}
        {formcheckbox id="public" checked=$contact.public}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text="Use this information in the users confirmation mail"}</legend>
    <div class="z-formrow">
        {formlabel for="semail" __text='Sender Email'}
        {formtextinput size="40" maxLength="100" id="semail" text=$contact.semail}
    </div>
    <div class="z-formrow">
        {formlabel for="sname" __text='Sender Name'}
        {formtextinput size="40" maxLength="480" id="sname" text=$contact.sname}
    </div>
    <div class="z-formrow">
        {formlabel for="ssubject" __text='Subject'}
        {formtextinput size="40" maxLength="100" id="ssubject" text=$contact.ssubject}
    </div>
    <div class="z-formnote z-informationmsg">{gt text="with <ul>    <li>%s = sitename</li>    <li>%l = slogan</li>    <li>%u = site url</li>    <li>%c = contacts sender name</li>    <li>%n&lt;num&gt; = user defined field name &lt;num&gt;</li>    <li>%d&lt;num&gt; = user defined field data &lt;num&gt;</li></ul>"}</div>
</fieldset>

<div class="z-formbuttons z-buttons">
    {formbutton class="z-bt-ok" id="submit" commandName="submit" __text="Submit"}
</div>

{/form}
{adminfooter}