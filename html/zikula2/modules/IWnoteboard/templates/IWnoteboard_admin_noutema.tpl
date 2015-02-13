{include file="IWnoteboard_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">
        {if isset($m) AND $m eq 0}
        {img modname='core' src='filenew.png' set='icons/large'}
        {else}
        {img modname='core' src='edit.png' set='icons/large'}
        {/if}
    </div>
    <h2>{$title}</h2>
    <form action=""  class="z-form" method="post" id="new_tema">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="tid" value="{$tid}">
        <div class="z-formrow">
            <label for="noteboard_nomtema">{gt text="Topic name"}</label>
            <input type="text" id="noteboard_nomtema" name="nomtema" size="50" maxlength="55" value="{$nomtema}">
        </div>
        <div class="z-formrow">
            <label for="noteboard_descriu">{gt text="Topic description"}</label>
            <input type="text" id="noteboard_descriu" name="descriu" size="50" maxlength="200" value="{$descriu}">
        </div>
        <div class="z-formrow">
            <label for="noteboard_grup">{gt text="Group with access"}</label>
            <select name="grup" id="noteboard_grup">
                {foreach item="group" from="$grups"}
                {if $grup eq $group.id}
                {assign var=selected value='selected'}
                {else}
                {assign var=selected value=''}
                {/if}
                <option {$selected} value="{$group.id}">{$group.name}</option>
                {/foreach}
            </select>
        </div>
        <div class="z-center">
            <span class="z-buttons">
                <a onClick="javascript:send({if isset($m)}{$m}{/if})" title="{$submit}">
                    {img modname='core' src='button_ok.png' set='icons/small'} {$submit}
                </a>
            </span>
            <span class="z-buttons">
                <a href="#" onclick ='javascript:history.back(-1)'>
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
                </a>
            </span>
        </div>
    </form>
</div>

<script type="text/javascript"  language="javascript">
    function send(valor){
        var f=document.forms['new_tema'];
        var error=false;
        if(f.nomtema.value==''){
			// for gt detection
            alert('{{gt text="The topic name is empty"}}');
            error=true;
        }
        if(!error){
            if(valor==1){
                f.action="index.php?module=IWnoteboard&type=admin&func=modificar"
            }else{
                f.action="index.php?module=IWnoteboard&type=admin&func=crear"
            }
            f.submit();
        }
    }
</script>
