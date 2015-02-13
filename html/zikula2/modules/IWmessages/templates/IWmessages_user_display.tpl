<div id="IWmainContent">
    {include file=IWmessages_user_menu.tpl read=1 msg_id=$message.msg_id}
    {ajaxheader modname=IWmessages filename=IWmessages.js}
    {ajaxheader modname=IWmain filename=IWmain.js}
    {assign var=posterdata value=$message.posterdata}
    <div style="float:left; margin-right:20px;">
        <strong>{if isset($send) AND $send}{gt text="To"}{else}{gt text="From"}{/if}</strong>:
    </div>
	{if $photo neq ""}
    <div style="float:left;"><img src="{getbaseurl}{modurl modname=IWmessages type=user func=getFile fileName=$photo}" /></div>
	{/if}
    <div style="float:left; margin-left: 10px; text-align:bottom;">
        {if $message.marcat && (not isset($send) || not $send)}
            <div id="flag">{img src='flag.gif' modname='core' set='icons/extrasmall' __alt='Mark the message with a flag'  id="flag"}</div>
            <br />
        {else}
            {img src='flag.gif' modname='core' set='icons/extrasmall' __alt='Mark the message with a flag'  style="display: none;" id="flag"}
            {if $photo neq ""}
            <br />
            {/if}
        {/if}
        {*$posterdata.userFullName|safetext*}
    </div>

    <div id="noteinfo_1" class="z-hide z-noteinfo">&nbsp;</div>

    <div style="clear:both;"></div>
    <div>
        <span>
            <strong>{gt text="Subject"}</strong>:
            {if $message.msg_image neq ""}
            <img src="images/smilies/{$message.msg_image|safetext}" alt="" />&nbsp;
            {/if}
            {$message.subject|safetext}
        </span>

        <span>&nbsp;</span>
        <span>
            <strong>{gt text="Sent"}</strong>: {$message.messagetime|safetext}
        </span>
        <div style="height:15px;">&nbsp;</div>
        {if $message.file1 neq ''}
        <div>
            <img src="modules/IWmain/images/fileIcons/{$message.fileIcon1}"/>
            <a href="{modurl modname=IWmessages type=user func=download msg_id=$message.msg_id file=1}">{$message.file1}</a>
        </div>
        {/if}
        {if $message.file2 neq ''}
        <div>
            <img src="modules/IWmain/images/fileIcons/{$message.fileIcon2}"/>
            <a href="{modurl modname=IWmessages type=user func=download msg_id=$message.msg_id file=2}">{$message.file2}</a>
        </div>
        {/if}
        {if $message.file3 neq ''}
        <div>
            <img src="modules/IWmain/images/fileIcons/{$message.fileIcon3}"/>
            <a href="{modurl modname=IWmessages type=user func=download msg_id=$message.msg_id file=3}">{$message.file3}</a>
        </div>
        {/if}
        <fieldset style="margin: 5px; padding: 5px;">
            <legend><strong>&nbsp;{gt text="Message"}&nbsp;</strong></legend>
            <div class="messageBody">
                {$message.message|safehtml}
            </div>
        </fieldset>
        <div style="height:10px;">&nbsp;</div>

        {if $message.reply neq ''}
        <div class="messageBody">
            <fieldset style="margin: 5px; padding: 5px;">
                {$message.reply|safehtml}
            </fieldset>
        </div>
        {/if}

        <div style="height:15px;">&nbsp;</div>
        <a href="user.php?op=userinfo&amp;uname={$posterdata.uname}"><img src="modules/IWmessages/images/profile.gif" alt="" /></a>
    </div>

    <div>
        <form name="prvmsg" method="post" action="{modurl modname=IWmessages type=user func=delete}">
            [&nbsp;
            {if $message.qui neq "r"}
            <a href="{modurl modname=IWmessages type=user func=compose reply=1 msg_id=$message.msg_id inici=$inici rpp=$rpp inicisend=$inicisend rppsend=$rppsend filter=$filter filtersend=$filtersend}">{gt text="Reply"}</a>&nbsp;|&nbsp;
            <a style="cursor: pointer;" onclick="javascript:marcardisplay({$message.msg_id})">{gt text="Mark/unmark"}</a>&nbsp;|&nbsp;
            {/if}

            <input type="hidden" name="qui" value="{$message.qui}" />
            <input type="hidden" name="authid" value="{$authkey}" />
            <input type="hidden" name="msg_id" value="{$message.msg_id}" />
            <a href="#" onclick="javascript:esborrardisplay('{gt text="Confirm the action before deleting the message?"}')">{gt text="Delete"}</a>&nbsp;]
        </form>
    </div>
    <script type="text/javascript">
        var addingflag = "{{gt text='...modifying note flag status...'}}";
    </script>
</div>
