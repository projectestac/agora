<div id="note_{$note.fmid}" name="note_{$note.fmid}">
    <table class="noteContent" bgcolor="{$color}">
        <tr>
            <td width="40%">
                <div>
                    {gt text="Date of sending the note"}
                </div>
                <div>
                    {gt text="Time of sending the note"}
                </div>
            </td>
            <td width="60%">
                <div>
                    {$note.day}
                </div>
                <div>
                    {$note.time}
                </div>
            </td>
        </tr>
        {foreach item="content" from=$note.content}
        <tr>
            <td bgcolor="{$fieldsColor}" width="40%">
                {$content.fieldName}
            </td>
            <td bgcolor="{$contentColor}" width="60%">
                {if $content.fieldType eq 7 && $content.content neq ''}
                <img src="modules/IWmain/images/fileIcons/{IWformsfileicon fileName=$content.content}" />
                <a href="{modurl modname=IWforms type=user func=download fid=$fid fndid=$content.fndid fileName=$content.content}">{$content.content|nl2br|safehtml}</a>
                {else}
                <div class="messageBody">
                    {$content.content|nl2br|safehtml}
                </div>
                {/if}
            </td>
        </tr>
        {/foreach}
        <tr>
            <td width="40%">{gt text="State of the note"}</td>
            <td width="60%">
                {foreach item=viewed from=$note.viewed}
                <div>
                    {gt text="To view"}&nbsp;<span style="color:green; font-weight:bold;">{$users[$viewed.user]}</span>&nbsp;{gt text="to"}&nbsp;{$viewed.time}
                </div>
                {foreachelse}
                <div>{gt text="Not seen by any validator"}</div>
                {/foreach}
                {if $note.validate eq 0}
                <div>{gt text="The note needs validation"}</div>
                {/if}
            </td>
        </tr>
        <tr>
            <td width="40%">{gt text="Answer"}</td>
            <td width="60%">{$note.renote|nl2br|safehtml}</td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <a href="javascript:deleteUserNote({$note.fmid})">{img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall'}</a>
            </td>
        </tr>
    </table>
    <div style="height:15px;">&nbsp;</div>
</div>