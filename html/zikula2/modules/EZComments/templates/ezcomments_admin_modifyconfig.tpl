{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}
<fieldset>
    <legend>{gt text="Miscellaneous"}</legend>
    <div class="z-formrow">
        {formlabel for="ezcomments_template" __text='Default template'}
        {formdropdownlist id="ezcomments_template" items=$templates selectedValue=$modvars.EZComments.template}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_css" __text='Default stylesheet'}
        {formtextinput id="ezcomments_css" text=$modvars.EZComments.css|safetext size="30" maxLength="30"}
        <p class="z-informationmsg z-formnote">
            {gt text="By default, the following possibilities exists:"}<br />
            <strong>Standard:</strong> style1.css, style2.css, style3.css, style4.css<br />
            <strong>Dizkus:</strong> style.css
        </p>
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_anonusersinfo" __text='Allow unregistered users to set user information'}
        {formcheckbox id="ezcomments_anonusersinfo" checked=$modvars.EZComments.anonusersinfo}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_anonusersrequirename" __text='Require name for unregistered user'}
        {formcheckbox id="ezcomments_anonusersrequirename" checked=$modvars.EZComments.anonusersrequirename}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_logip" __text='Log IP addresses'}
        {formcheckbox id="ezcomments_logip" checked=$modvars.EZComments.logip}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_itemsperpage" __text='Comments per page in admin view'}
        {formtextinput id="ezcomments_itemsperpage" text=$modvars.EZComments.itemsperpage|safetext size="5" maxLength="5"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_enablepager" __text='Enable pager in user view'}
        {formcheckbox id="ezcomments_enablepager" checked=$modvars.EZComments.enablepager}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_commentsperpage" __text='Comments per page in user view'}
        {formtextinput id="ezcomments_commentsperpage" text=$modvars.EZComments.commentsperpage|safetext size="5" maxLength="5"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_useaccountpage" __text='Activate account page in user section'}
        {formcheckbox id="ezcomments_useaccountpage" checked=$modvars.EZComments.useaccountpage}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text="Notification"}</legend>
    <p class="z-formnote z-informationmsg">{gt text="The notification email will be sent to the owner of the content. If there is no owner known, the notification mail will be sent to the site administrator."}</p>
    <div class="z-formrow">
        {formlabel for="ezcomments_MailToAdmin" __text='Send mail on new comment'}
        {formcheckbox id="ezcomments_MailToAdmin" checked=$modvars.EZComments.MailToAdmin}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_moderationmail" __text='Send mail on comment requiring moderation'}
        {formcheckbox id="ezcomments_moderationmail" checked=$modvars.EZComments.moderationmail}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text="Moderation"}</legend>
    <div class="z-formrow">
        {formlabel for="ezcomments_moderation" __text='Enable comment moderation'}
        {formcheckbox id="ezcomments_moderation" checked=$modvars.EZComments.moderation}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_alwaysmoderate" __text='All comments require moderation'}
        {formcheckbox id="ezcomments_alwaysmoderate" checked=$modvars.EZComments.alwaysmoderate}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_dontmoderateifcommented" __text="Do not require moderation for comments from users who have already commented"}
        {formcheckbox id="ezcomments_dontmoderateifcommented" checked=$modvars.EZComments.dontmoderateifcommented}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_modlinkcount" __text='Number of links in comment before moderation'}
        {formtextinput id="ezcomments_modlinkcount" text=$modvars.EZComments.modlinkcount|safetext size="5" maxLength="5"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_modlist" __text='Words to trigger moderation'}
        {formtextinput id="ezcomments_modlist" textMode="multiline" rows="5" cols="50" text=$modvars.EZComments.modlist|safetext}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text="Blacklisting"}</legend>
    <div class="z-formrow">
        {formlabel for="ezcomments_blacklinkcount" __text='Number of links in comment before blacklisting'}
        {formtextinput id="ezcomments_blacklinkcount" text=$modvars.EZComments.blacklinkcount|safetext size="5" maxLength="5"}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_blacklist" __text='Words to blacklist from comments'}
        {formtextinput id="ezcomments_blacklist" textMode="multiline" rows="5" cols="50" text=$modvars.EZComments.blacklist|safetext}
        <em class="z-formnote z-sub">{gt text="Notice: Comments containing words listed here will be completely ignored by the comments module"}</em>
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_proxyblacklist" __text='Blacklist comments from insecure proxies'}
        {formcheckbox id="ezcomments_proxyblacklist" checked=$modvars.EZComments.proxyblacklist}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_modifyowntime" __text='Number of hours where users are allowed to modify the text of own comments.'}
        {formintinput id="ezcomments_modifyowntime" text=$modvars.EZComments.modifyowntime minValue="-1"}
        <em class="z-formnote z-sub">{gt text='The value -1 deactivates this function.'}</em>
    </div>
</fieldset>
<fieldset>
    <legend>{gt text="Akismet spam dectection service"}</legend>
    <p class="z-formnote z-informationmsg">{gt text='Notice: <a href="http://akismet.com/">Akismet</a> is a spam detection service that can, in many cases, eliminate comment and trackback spam. To use Akismet you need to install and configure the <a href="http://code.zikula.org/ezcomments/">Akismet module</a>.'}</p>
    {if $akismetavailable}
    <div class="z-formrow">
        {formlabel for="ezcomments_akismet" __text='Enable Akismet'}
        {formcheckbox id="ezcomments_akismet" checked=$modvars.EZComments.akismet}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_akismetstatus" __text='Status level to apply to comments flagged as spam by akismet'}
        {formdropdownlist id="ezcomments_akismetstatus" items=$statuslevels selectedValue=$modvars.EZComments.akismetstatus}
    </div>
    {/if}
</fieldset>
<fieldset>
    <legend>{gt text="Feeds"}</legend>
    <p class="z-formnote z-informationmsg">{gt text="Notice: both the feed type and feed count can be overriden using feedtype and feedcount parameters appended to the feed URL"}</p>
    <div class="z-formrow">
        {formlabel for="ezcomments_feedtype" __text='Type of feed'}
        {formdropdownlist id="ezcomments_feedtype" items=$feeds selectedValue=$modvars.EZComments.feedtype}
    </div>
    <div class="z-formrow">
        {formlabel for="ezcomments_feedcount" __text='Number of items to display in feed'}
        {formtextinput id="ezcomments_feedcount" text=$modvars.EZComments.feedcount|safetext size="5" maxLength="5"}
    </div>
</fieldset>

<div class="z-buttons z-formbuttons">
    {formbutton class="z-bt-ok" id="submit" commandName="submit" __title="Submit" __text="Submit"}
</div>
{/form}
{adminfooter}
