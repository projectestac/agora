{*<pre>{$messages|@print_r}</pre>*}        
<div id="messageList">
{foreach item=message from=$messages}
    <div style="padding-left:{$message.indent}px;">
        <div class="panel panel-default">
            {if $userid neq ''}   
                <div id="msgHeader{$message.fmid}" class="panel-heading {if not $message.llegit}unread{/if}" style="font-size:0.9em">
                    <div style="float:right">
                        {if $message.onTop eq 1}
                            <span class="fs1em glyphicon glyphicon-pushpin" ></span>
                        {/if}
                        {if $adjunts}            
                            {if $message.adjunt neq ""}
                                <a href="{modurl modname='IWforums' type='user' func='download' fileName=$message.adjunt fmid=$message.fmid fid=$fid}">
                                    <span  class="fs1em glyphicon glyphicon-paperclip" alt={gt text='Download'}&nbsp;{$message.adjunt} title={gt text='Download'}&nbsp;{$message.adjunt}>
                                </a>
                            {/if}            
                        {/if}
                    </div>
                    <div class="photo">                       
                        {if $message.photo neq '' AND ($userid neq '' OR $avatarsVisible eq 1)}
                            <img src="index.php?module=IWmain&type=user&func=getPhoto&fileName={$message.photo}" class="photoImg smallPhoto" />
                        {else}
                            <img src="modules/IWforums/images/default-avatar.png" class="photoImg smallPhoto"/>                        
                        {/if}
                    </div>
                    <div style="float:left; padding-right:5px;">
                        <span style="cursor:pointer" align="center" width="10" onclick="javascript:of_mark({$fid}, {$message.fmid})">                
                            {if $message.boolMarcat}
                                <div id={$message.fmid}><span data-toggle="tooltip" class="glyphicon glyphicon-flag" title="{$message.textmarca}"></span>
                                </div>
                            {else}
                                <div class="disabled" id={$message.fmid}><span data-toggle="tooltip" class="glyphicon glyphicon-flag" alt="{$message.textmarca}" title="{$message.textmarca}"></span>
                                </div>
                            {/if}

                        </span>
                        {if $icons}
                            {if $message.icon neq ""}
                                {img modname='IWmain' src=$message.icon set='smilies'}
                            {/if}
                        {/if}                        
                    </div>
                    <div>
                        <div class='msgTitle'>
                            {$message.title}<br>
                        </div>
                        {gt text="by"}&nbsp;<b>{$users[$message.user]}</b>&nbsp;-&nbsp;{$message.datetime}
                    </div>                  
            </div>
            {/if}
            <div class="panel-body" style="font-size:0.9em">                
                <div id="msgContent{$message.fmid}">
                    {$message.missatge} 
                </div>
             <div id="msgAttachment{$message.fmid}">
            {if $message.adjunt neq ""}
                <div>
                    {gt text="Attached file"}:

                    <a href="{modurl modname='IWforums' type='user' func='download' fileName=$message.adjunt fmid=$message.fmid fid=$fid}">
                        {$message.adjunt|safetext} <span class="glyphicon glyphicon-download-alt" alt={gt text=$message.adjunt} title={gt text='Download'}&nbsp;{$message.adjunt}>
                    </a>
                </div>
            {/if}
             </div>
            <table style="float:right"><tr>
                    {if $access gt 1}
                        <td>
                            <button style="font-size:0.7em; margin-right:15px; padding:3px 6px" class="btn btn-default" onclick="replyMsg({$fid}, {$ftid}, {$message.fmid}, {$message.oid}, {$u}, {$inici})"><i class="fa fa-reply"></i>&nbsp;{gt text='Reply to the message'}</button>
                        </td>
                    
                        <td {if $moderator}style="width:100px; text-align:center;"{/if}>                
                            {if $moderator or $message.editable}
                                <a data-toggle="tooltip" href="{modurl modname='IWforums' type='user' func='edit_msg' fmid=$message.fmid ftid=$ftid fid=$fid u=$u inici=$inici}" title="{gt text='Edit the message'}">
                                    <span class="fs1em glyphicon glyphicon-edit" ></span></a>
                            {/if}
                            {if $moderator}                                
                                <a data-toggle="tooltip" href="{modurl modname='IWforums' type='user' func='mou' fmid=$message.fmid ftid=$ftid fid=$fid u=$u inici=$inici}" title="{gt text='Move the message'}">
                                {*<a data-toggle="tooltip" onclick="javascript:moveMessage({$message.fmid},{$ftid},{$fid},{$message.oid},{$u},{$inici})" title="{gt text='Move the message'}">*}
                                <span class="fs1em glyphicon glyphicon-move" style="cursor:pointer"></span></a>                                
                                {if $message.fmid eq $message.oid}
                                    <a data-toggle="tooltip" href="{modurl modname='IWforums' type='user' func='onTop' fmid=$message.fmid ftid=$ftid fid=$fid u=$u inici=$inici}" title="{if $message.onTop eq 0}{gt text='Set as main message'}{else}{gt text='Set as not main message'}{/if}">
                                        {if $message.onTop eq 1}
                                            <span class="fs1em glyphicon glyphicon-pushpin" ></span></a>  
                                        {else}
                                            <span style="opacity:0.5" class="fs1em glyphicon glyphicon-pushpin" ></span></a>
                                        {/if}                                                 
                                {else}
                                    {img modname='IWforums' src='blank.gif'}                
                                {/if}
                            {/if}
                            {if $moderator or $message.esborrable}
                                {if $message.canDelete}
                                <span style="cursor:pointer" class="mDelete" data-toggle="modal" data-target="#delMessageConfirm" data-fmid="{$message.fmid}">
                                    <span class="fs1em glyphicon glyphicon-trash" data-toggle="tooltip"title="{gt text='Delete the message'}"></span>
                                </span>
                            {/if}
                            {/if}
                        </td>
                    {/if}
                </tr>
                <tr style="margin:0px; padding:0px;">
                    <td colspan="10" style="margin:0px; padding:0px;">
                        <div class="openMsg" id="openMsgRow_{$message.fmid}" name="openMsgRow_{$message.fmid}"></div>
                    </td>
                </tr>
            </table>
           </div>   
        </div>
    </div>
{/foreach}
</div>
<!-- Modal delete message confirmation -->
<div class="modal fade" id="delMessageConfirm">
    <div class="modal-dialog" style="top:15%">
        <div class="modal-content">
            <div class="modal-header" style=" padding-top:10px; height:40px">                            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title red" style="line-height: 1;"><i class="fa fa-exclamation-triangle"></i>&nbsp;{gt text="Confirm the deletion of the message"}</h3>                             
            </div>
            <div class="modal-body">
                <form name="del_msg" method="post" id="del_msg" action="{modurl modname='IWforums' type='user' func='del'}">
                    <input type="hidden" name="fmid" id="fmid"/>
                    <input type="hidden" name="ftid" id="ftid" value="{$ftid}" />
                    <input type="hidden" name="fid"  id="fid" value="{$fid}"/>
                    <input type="hidden" name="confirmation" value="true" />
                    <input type="hidden" name="csrftoken" id="csrftoken" value="{insert name='csrftoken'}" />
                </form>                
                <div id="msgHeader"></div><br> 
                <legend style="margin-bottom:0px;font-weight:bold;font-size:1em">{gt text="Message"}</legend>
                <div id="msgContent" class="panel-body" style="max-height: 150px; overflow-y:auto; "></div>
                <div id="msgAttachment" class="badge" style="margin-top:5px"></div>                                                
            </div>         
            <div class="modal-footer" style="margin-top:0px">
                <button id="btnDelete" type="button" class="btn btn-success" data-dismiss="modal" onclick="javascript:jQuery('#del_msg').submit()"><span class="white fs1em glyphicon glyphicon-ok"></span>&nbsp;{gt text="I'm sure"}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="white fs1em glyphicon glyphicon-remove"></span>&nbsp;{gt text="Cancel"}</button>                            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<script>           
    function replyMsg(fid, ftid, fmid, oid, u, inici){        
        window.location="index.php?module=IWforums&type=user&func=nou_msg&fmid="+fmid+"&oid="+oid+"&ftid="+ftid+"&fid="+fid+"&u="+u+"&inici="+inici;
    }
    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle="modal"]').tooltip();
    
    jQuery(".mDelete").click(function(){ 
        var fmid = jQuery(this).data('fmid');

        //Set form values
        jQuery('#fmid').val(fmid);
        
        jQuery("#msgHeader").html(jQuery('#msgHeader'+fmid).html());
        jQuery("#msgContent").html(jQuery('#msgContent'+fmid).html()); 
        if (jQuery('#msgAttachment'+fmid).html().length > 26){
            //Avoid empty div. for Class badge
            jQuery("#msgAttachment").html(jQuery('#msgAttachment'+fmid).html());
        }
        
    });
    
    
</script>
