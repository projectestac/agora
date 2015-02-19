{pageaddvar name='stylesheet' value='vendor/bootstrap/css/bootstrap.css'}
{pageaddvar name='stylesheet' value='modules/IWforums/style/bsRewrite.css'}
<script language="javascript">
    function canviforum() {
        document.move_msg.action = "index.php?module=IWforums&func=mou";
        document.move_msg.moutema.value = 1;
        document.move_msg.submit();
    }
    function move() {
        document.move_msg.action = "index.php?module=IWforums&func=mou";
        document.move_msg.moutema.value = 0;
        document.move_msg.submit();
    }
</script>

<ol style="font-size:0.8em" class="breadcrumb">
    <li><a href="{modurl modname='IWforums' type='user' func='main'}">{gt text="Forums list"}</a></li>
    <li><a href="{modurl modname='IWforums' type='user' func='forum' fid=$fid u=$u}">{gt text="List of topics"}</a></li>
    <li><a href="{modurl modname='IWforums' type='user' func='llista_msg' ftid=$ftid fid=$fid u=$u}}">{gt text="Posts"}</a></li>
    <li class="active">{gt text="Move the message"}</li>    
</ol>    
<div class="usercontainer"> 
    <div class="userpageicon">{img modname='core' src='editdelete.png' set='icons/large'}</div>
    <h2>{gt text="Confirm the transfer"}</h2>
    <br><br>
    <form class="form-horizontal" role="form" name="move_msg" method="post" id="move_msg" action="">
        <input type="hidden" name="fmid" value="{$fmid}" />
        <input type="hidden" name="ftid" value="{$ftid}" />
        <input type="hidden" name="fid" value="{$fid}" />
        <input type="hidden" name="moutema" />
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="u" value="{$u}" />
        <div class="panel panel-default">
            {if $userid neq ''}   
                <div id="msgHeader{$fmid}" class="panel-heading {if not $allMsgInfo.llegit}unread{/if}" style="font-size:0.9em">
                    <div style="float:right">
                        {if $allMsgInfo.onTop eq 1}
                            <span class="fs1em glyphicon glyphicon-pushpin" ></span>
                        {/if}
                        {if $adjunts}            
                            {if $allMsgInfo.adjunt neq ""}
                                <a href="{modurl modname='IWforums' type='user' func='download' fileName=$allMsgInfo.adjunt fmid=$fmid fid=$fid}">
                                    <span  class="fs1em glyphicon glyphicon-paperclip" alt={gt text='Download'}&nbsp;{$allMsgInfo.adjunt} title={gt text='Download'}&nbsp;{$allMsgInfo.adjunt}>
                                </a>
                            {/if}            
                        {/if}
                    </div>
                    {$photo}
                    <div class="photo">                       
                        {if $photo neq '' AND ($userid neq '' OR $avatarsVisible eq 1)}
                            <img src="index.php?module=IWmain&type=user&func=getPhoto&fileName={$photo}" class="photoImg smallPhoto" />
                        {else}
                            <img src="modules/IWforums/images/default-avatar.png" class="photoImg smallPhoto"/>                        
                        {/if}
                    </div>
                    <div style="float:left; padding-right:5px;">
                        <span style="cursor:pointer" align="center" width="10" onclick="javascript:of_mark({$fid}, {$message.fmid})">                
                            {if $allMsgInfo.boolMarcat}
                                <div id={$fmid}><span data-toggle="tooltip" class="glyphicon glyphicon-flag"></span>
                                </div>                            
                            {/if}
                        </span>
                        {if $icons}
                            {if $allMsgInfo.icon neq ""}
                                {img modname='IWmain' src=$allMsgInfo.icon set='smilies'}
                            {/if}
                        {/if}                        
                    </div>
                    <div>
                        <div class='msgTitle'>
                            {$allMsgInfo.titol}<br>
                        </div>
                        {gt text="by"}&nbsp;<b>{$user}</b>&nbsp;-&nbsp;{$date} - {$time}
                    </div>                  
                </div>
            {/if}
            <div class="panel-body" style="font-size:0.9em">                
                <div id="msgContent{$fmid}">
                    {$message} 
                </div>
                <div id="msgAttachment{$fmid}">
                    {if $allMsgInfo.adjunt neq ""}
                        <div>
                            {gt text="Attached file"}:

                            <a href="{modurl modname='IWforums' type='user' func='download' fileName=$allMsgInfo.adjunt fmid=$fmid fid=$fid}">
                                {$allMsgInfo.adjunt|safetext} <span class="glyphicon glyphicon-download-alt" alt={gt text=$allMsgInfo.adjunt} title={gt text='Download'}&nbsp;{$allMsgInfo.adjunt}>
                            </a>
                        </div>
                    {/if}
                </div>
                <div class="well">
                    {if $modera|@count gt 1}
                        <div class="form-group"> 
                            <label class="col-xs-3 control-label">{gt text="Move the message to the forum"}</label>               
                            <div class="col-xs-8">
                                <select class="form-control" name="nouforum" id="nouforum" onChange="javascript:canviforum()">
                                    {section name=modera loop=$modera}
                                        <option {if $modera[modera].fid eq $nouforum}selected{/if} value="{$modera[modera].fid}">{$modera[modera].nom_forum}</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    {else}
                        <input type="hidden" name="nouforum" value="{$fid}" />
                    {/if}
                    <div class="form-group"> 
                        <label class="col-xs-3 control-label">{gt text="Move the message to the topic"}</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="noutema" id="noutema">
                                <option value="0">{gt text="Without topic"}</option>
                                {section name=temes loop=$temes}
                                    {if $temes[temes].ftid neq $ftid}
                                        <option value="{$temes[temes].ftid}">{$temes[temes].titol}</option>
                                    {/if}
                                {/section}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="checkbox">
                            <label class="col-xs-offset-3 col-xs-6">{gt text="Keep a copy in the source forum and topic"}<input type="checkbox" name="keepCopy" value="1" /></label>
                        </div>
                    </div>
                    <div class="z-center">
                        <span class="z-buttons">
                            <a href="javascript:move()">
                                {*img modname='core' src='button_ok.png' set='icons/small' __alt="Confirm the transfer" __title="Confirm the transfer"*}
                                <span class="green glyphicon glyphicon-ok"></span>&nbsp;{gt text="Confirm the transfer"}
                            </a>
                        </span>
                        <span class="z-buttons">
                            {if $ftid neq 0}
                                <a href="{modurl modname='IWforums' type='user' func='llista_msg' ftid=$ftid fid=$fid u=$u}">                            
                                    <span class="red glyphicon glyphicon-remove"></span>&nbsp;{gt text="Cancel"}
                                </a>
                            {else}
                                <a href="{modurl modname='IWforums' type='user' func='forum' fid=$fid u=$u}">                            
                                    <span class="red glyphicon glyphicon-remove"></span>&nbsp;{gt text="Cancel"}
                                </a>
                            {/if}
                        </span>
                    </div>
                </div>
                </form>
            </div>