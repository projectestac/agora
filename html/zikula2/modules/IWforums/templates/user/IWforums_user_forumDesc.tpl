{* display mode *}
<h1>{$name}</h1>
<div id="forumIntroduction" style="display:block">
    {if isset($lDesc) && $lDesc neq ''}
        <div class="well formInfo" id="longDesc" name="longDesc">            
            {$lDesc}
        </div>
    {/if}

    {if $moderator && $topicsPage} 
        <hr width="97%" class="gradient">
        {*<div style="margin-right:10px" class="z-right">*}
        <span class="glyphicon glyphicon-edit disabled" style="margin-right:5px; float:right; top:-30px;cursor:pointer" onclick="showEditForumForm()" data-toggle="tooltip" data-placement="left" title="{gt text="Edit forum introduction"}" ></span>
        {*</div>*}
    {else}
        <hr class="gradient">
    {/if}
</div>

{* Edit mode *}
<div id="forumEdition" style="display:none">
    <form class="form-horizontal" role="form"  name="feditform" id="feditform" action="javascript:updateForumIntro()" method="post">

        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}">
        <input type="hidden" name="fid" value="{$fid}">
        <input type="hidden" name="topicsPage" value="{$topicsPage}">

        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Forum name'}</label>
            <div class="col-xs-9" id="inputName">
                <input type="text" class="has-error form-control" id="titol" name="titol" maxlength="50" oninput="checkTitol();" value="{$name}" placeholder="{gt text="Enter forum name"}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Brief description'} ({gt text="optional"})</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="descriu" {if isset($descriu)} value="{$descriu}"{/if}>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Introduction'} ({gt text="optional"})</label>
            <div class="col-xs-9">
                <textarea class="form-control" id="lDesc" name="lDesc">{if isset($lDesc)}{$lDesc}{/if}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Observations'} ({gt text="optional"})</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="observacions" name="observacions" {if isset($observacions)}value="{$observacions}"{/if}>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 z-center">
                <button type="button" id="btnSend" class="btn btn-success btn-xs" onclick=' document.getElementById("feditform").submit();'>{gt text='Apply changes'}&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-xs" onclick="showEditForumForm()">{gt text='Cancel'}&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
            </div>
        </div>   
    </form>
    <hr class="gradient">
</div>
{notifydisplayhooks eventname='IWforums.ui_hooks.IWforums.form_edit' id=$fid}

<script type="text/javascript">
    jQuery('[data-toggle="tooltip"]').tooltip();
    
    function checkTitol(){
    if (jQuery('#titol').val().length < 1) {
        jQuery('#btnSend').hide();
        jQuery('#inputName').addClass('has-error');
    } else {
        jQuery('#btnSend').show();
        jQuery('#inputName').removeClass('has-error');
        jQuery('#titol').focus();
    }
}
</script>