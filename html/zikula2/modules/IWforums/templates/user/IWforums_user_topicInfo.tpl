<tr id="row_{$tema.ftid}"> {*class="{cycle values='z-odd,z-even'}">*}
    {if $userid neq ''}
        <td class="topic">
            <div>
                <a data-toggle="tooltip" title="{gt text="Contains marked messages"}" href="{modurl modname='IWforums' type='user' func='llista_msg' ftid=$tema.ftid fid=$fid u=$u}">
                    {if $tema.marcats neq 0}
                        <span class="fs1em glyphicon glyphicon-flag"></span>
                    {/if}
                </a>
            </div>
        </td>
    {/if}
    <td valign="top">
        <div id="topicDesc{$tema.ftid}">
            <a href="{modurl modname='IWforums' type='user' func='llista_msg' ftid=$tema.ftid fid=$fid u=$u}">
                {$tema.titol}</a>
            <br />
            {$tema.descriu}
        </div>
    </td>
    <td width="40px">
        <div id="startedBy">
            <div class="photo">                        
                {if $tema.photo neq '' AND ($userid neq '' OR $avatarsVisible eq 1)}
                    <img src="index.php?module=IWmain&type=user&func=getPhoto&fileName={$tema.photo}" class="photoImg smallPhoto" />
                {else}
                    <img src="modules/IWforums/images/default-avatar.png" class="smallPhoto"/>                        
                {/if}
            </div>
            <div style="font-size:0.9em; font-style:italic;">
                {$users[$tema.usuari]}<br />
                {$tema.data}&nbsp;{gt text="at"}&nbsp;{$tema.hora}
            </div>
        </div>
    </td>
    <td valign="top" style="text-align:center" class="topic">
        <div id="totalMessages{$tema.ftid}">
            <b>{$tema.n_msg}</b>
        </div>
    </td>
    <td valign="top" style="text-align:center" class="topic">
        <div id="totalUnread{$tema.ftid}">
            {if $userid neq ''}
                {if $tema.n_msg_no_llegits neq 0}
                    {*<kbd class="unread">{$tema.n_msg_no_llegits}</kbd>*}
                    <span style="background-color:#AC2013" class="badge">{$tema.n_msg_no_llegits}</span>
                {else}
                    {$tema.n_msg_no_llegits}
                {/if}                                
            {/if}
        </div>
    </td>
    <td>
        {if $tema.last_post_exists}
            <div style="text-align:right" class="lastPost">
                {$users[$tema.lastuser]}<br />
                {$tema.lastdate}&nbsp;{gt text="at"}&nbsp;{$tema.lasttime}
            </div>
        {/if}
    </td>
    <td width="10px">
        {if $moderator || $tema.editable}                            
            <div>    
                <span style="vertical-align:middle; cursor:pointer" class="fs1em glyphicon glyphicon-edit" onclick="editTopic({$fid}, {$tema.ftid})"  data-toggle="tooltip" title="{gt text="Edit the topic"}"></span>
            </div>                            
        {/if}
    </td>
    <td class="center" width="24px">
        {if $moderator} 
            <span class="mDelete" data-toggle="modal" data-target="#delTopicConfirm" data-fid="{$fid}" data-ftid="{$tema.ftid}" data-titol="{$tema.titol}" data-descrip="{$tema.descriu}">
                <span class="fa fa-times fa-lg" style="cursor:pointer;"  data-toggle="tooltip" title="{gt text='Delete the topic'}"></span>
            </span>                         
            <span class="handle hide fs1em glyphicon glyphicon-move" style="cursor:move" data-toggle="tooltip" title="{gt text="Drag&Drop to Move"}">            
            </span></a>
            {/if}
    </td>
</tr>                       