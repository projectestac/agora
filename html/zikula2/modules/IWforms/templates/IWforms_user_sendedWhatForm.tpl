{include file="IWforms_user_menu.tpl" func="sended" fid=$fid}
<div class="usercontainer">
    <div class="userpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Notes sent"}</h2>
    {if $formsArray|count gt 0}
    <form name="whatForm" action="{modurl modname='IWforms' type='user' func='sended'}" method="post" enctype="multipart/form-data">
          <select name="form_id" onChange="this.form.submit();">
            <option value="0">{gt text="Choose a form..."}</option>
            {foreach item=form from=$formsArray}
            <option value="{$form.fid}">{$form.formName}</option>
            {/foreach}
        </select>
    </form>
    {else}
        {gt text="You do not have any form available"}
    {/if}
</div>
