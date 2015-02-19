{pageaddvar name='javascript' value='jQuery'}
{pageaddvar name='javascript' value='vendor/bootstrap/js/bootstrap.js'}
{pageaddvar name='javascript' value='jQuery-ui'}
{pageaddvar name='stylesheet' value='vendor/bootstrap/css/bootstrap.css'}
{pageaddvar name='stylesheet' value='modules/IWforums/style/bsRewrite.css'}
{pageaddvar name='stylesheet' value='modules/IWforums/style/bsRewrite.css'}
{pageaddvar name='stylesheet' value='vendor/font-awesome/css/font-awesome.min.css'}
{ajaxheader modname=IWforums filename=IWforums.js}
{pageaddvar name="jsgettext" value="module_iwforums_js:IWforums"}
{userloggedin assign=userid}
{insert name="getstatusmsg"}
{if not $topicsPage}
    <ol style="font-size:0.8em" class="breadcrumb">
        <li><a href="{modurl modname='IWforums' type='user' func='main'}">{gt text="Forums list"}</a></li>
        <li class="active"><a href="{modurl modname='IWforums' type='user' func='forum' fid=$fid u=$u}">{gt text="List of topics"}</a></li>
        <li class="active">{gt text="Posts"}</li>
            {*<li class="active">Data</li>*}
    </ol>    
{else}
    <ol style="font-size:0.8em" class="breadcrumb">
        <li><a href="{modurl modname='IWforums' type='user' func='main'}">{gt text="Forums list"}</a></li>
        <li class="active">{gt text="List of topics"}</li>
    </ol>   
{/if}
<div class="usercontainer">    
    <div id='forumDescription'>
        {include file="user/IWforums_user_forumDesc.tpl"}
    </div>
    <div id="btnNewElement">
    {if $topicsPage && ($access gt 2)}
        <div class="z-center" style="padding-bottom: 4px;" >
            <button type="button" class="btn  btn-success" id="btnNewTopic" onclick="javascript:addnew_topic('{$url}');">
                <span class="glyphicon glyphicon-plus-sign" ></span>&nbsp;{gt text="Create a new topic"}
            </button>
        </div>
    {/if}
    {if !$topicsPage}
        <div class="z-center" style="padding-bottom: 4px;" >
            <button type="button" class="btn btn-success" onclick="javascript:addnew_msg();">
                <span class="glyphicon glyphicon-plus-sign" ></span>&nbsp;{gt text="Send a new message"}
            </button>
        </div>
    {/if}
    </div>
    <div id="topicsList">
        {include file="user/IWforums_user_topicsList.tpl"}
    </div>

{if $hi_ha_missatges}
    {if $topicsPage && $moderator}
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span style="font-size:1.2em" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            &nbsp;{gt text="It's recommended to move this message to a specific topic" plural="It's recommended to move these messages to a specific topic" count=$messages|@count}            
        </div>
    {/if}

    {if $usuaris|@count gt 2}
        <div class="col-xs-12">
        <form class="navbar-form navbar-right" role="filtre" name="filtre" id="filtre" method="get" action="">
            <div>
                <input type="hidden" name="fid" value="{$fid}">
                <input type="hidden" name="ftid" value="{$ftid}">
                <input type="hidden" name="inici" value="1">
                <input type="hidden" name="module" value="IWforums">
                {if $ftid eq 0}
                    <input type="hidden" name="func" value="forum">
                {else}
                    <input type="hidden" name="func" value="llista_msg">
                {/if}
                <label for="usrList"><span class="fs1em glyphicon glyphicon-filter"></span>{gt text="Filter"}:&nbsp;</label>
                <select class="btn btn-default dropdown-toggle" id="usrList" name="u" onChange="this.form.submit()">
                    {section name=usuaris loop=$usuaris}
                        <option {if $u eq $usuaris[usuaris].id}selected{/if} value="{$usuaris[usuaris].id}">{$usuaris[usuaris].name}</option>
                    {/section}
                </select>
            </div>  
        </form> 
        </div> 
    {/if}

    {include file="user/IWforums_user_messages.tpl"}

    <div style="margin-left:20px;">{$pager}</div>
{else}

    {if $u eq 0}
        {if $ftid neq 0}
            {*<div style="height:15px;">&nbsp;</div>*}
            <div class="alert alert-info">
                <span style="font-size:1.3em" class='glyphicon glyphicon-info-sign'>&nbsp;</span>{gt text="This topic has no messages."}                
            </div>
        {/if}
    {else}
        {if $ftid neq 0}
            <div class="alert alert-info">
                <span style="font-size:1.3em" class='glyphicon glyphicon-info-sign'>&nbsp;</span>{gt text="The user "}<strong>{$uname}</strong>{gt text=" you haven't sent any message to this topic"}
            </div>
        {/if}
    {/if}
{/if}
{if not $hi_ha_temes and not $hi_ha_missatges and $ftid eq 0}
    {*<div style="height:15px;">&nbsp;</div>*}
    <div class="alert alert-info">
        <span style="font-size:1.3em" class='glyphicon glyphicon-info-sign'>&nbsp;</span>{gt text="This forum has no messages."}
    </div>
{/if}
</div>        
<script type="text/javascript">
    jQuery('[data-toggle="tooltip"]').tooltip();
    function addnew_msg(){
        window.location="index.php?module=IWforums&type=user&func=nou_msg&fid="+{{$fid}}+"&u="+{{$u}}+"&inici="+{{$inici}}+"&ftid="+{{$ftid}};
    }
    function addnew_topic(url) {  
        window.location = url;
    }   
</script>
