{if not $listBox}
{foreach from=$forms item=form}
<div style="float: left; width:70%">
    {if $form.accessLevel eq 7}
    {if $form.isFlagged eq 1}
    <span>
        {img modname='core' src='flag.png' set='icons/extrasmall' __alt="Open the entry of annotations and editing" __title="Open the entry of annotations and editing"}
    </span>
    {/if}
    {if $form.needValidation eq 1}
    <span>
        {img modname='core' src='14_layer_visible.png' set='icons/extrasmall' __alt="Open the entry of annotations and editing" __title="Open the entry of annotations and editing"}
    </span>
    {/if}
    {/if}
    {$form.formName}
    {if $form.newLabel}
    <span style="color: red; background-color: #ffffaf;">{gt text="New"}</span>
    {/if}
</div>
<div style="float: right;">
    {if ($form.accessLevel eq 1 || $form.accessLevel >= 3) AND $form.closeInsert eq 0}
    <span>
        <a href="{modurl modname=IWforms type=user func=newItem fid=$form.fid}">
            {img modname='core' src='lists.png' set='icons/extrasmall' __alt="Send an annotation" __title="Send an annotation"}
        </a>
    </span>
    {/if}
    {if ($form.accessLevel eq 2 || $form.accessLevel >= 3) && $form.accessLevel != 7}
    <span>
        <a href="{modurl modname=IWforms type=user func=read fid=$form.fid}">
            {img modname='core' src='reminders.png' set='icons/extrasmall' __alt="Show annotations" __title="Show annotations"}
        </a>
    </span>
    {/if}
    {if $form.accessLevel eq 7}
    <span>
        <a href="{modurl modname=IWforms type=user func=manage fid=$form.fid}">
            {img modname='core' src='configure.png' set='icons/extrasmall'   __alt="Managing annotations" __title="Managing annotations"}
        </a>
    </span>
    {/if}
</div>
<div style="clear: both;"></div>
{foreachelse}
{gt text="You do not have access to any form"}
{/foreach}
{else}
<form name="loadForm" id="loadForm" action="{modurl modname='IWforms' type='user' func='load'}" method="post">
    <select name="fid" onchange="if(this.value > 0) submit();">
        <option>{gt text="Choose a form..."}</option>
        {foreach from=$forms item=form}
        {if isset($fid) AND $form.fid eq $fid}
        {assign var='selected' value='selected="selected"'}
        {else}
        {assign var='selected' value=''}
        {/if}
        <option {$selected} value="{$form.fid}">{$form.formName}</option>
        {foreachelse}
        {gt text="You do not have access to any form"}
        {/foreach}
    </select>
</form>
{/if}
{userloggedin assign=userid}
{if $userid neq ''}
<div class="sendedLink">
    <a href="{modurl modname='IWforms' type='user' func='sended'}">
        {gt text="Notes sent"}
    </a>
</div>
{/if}