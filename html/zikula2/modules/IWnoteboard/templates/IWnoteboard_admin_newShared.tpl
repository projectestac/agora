{include file="IWnoteboard_admin_menu.tpl"}
<div class="z-admincontainer">
    {if $m eq 0}
    <div class="z-adminpageicon">{img modname='core' src='filenew.png' set='icons/large'}</div>
    {else}
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    {/if}
    <h2>{$title}</h2>
    <form action="" class="z-form" enctype="application/x-www-form-urlencoded" method="post" name="newShared" id="newShared">
        <input type="hidden" name="authid" value="{secgenauthkey module="IWnoteboard"}" />
        <input type="hidden" name="pid" value="{$pid}" />
        <div class="z-formrow">
            <label for="descriu">{gt text="Name"}</label>
            <input type="text" name="descriu" size="50" maxlength="250" value="{$descriu}" />
        </div>
        <div class="z-formrow">
            <label for="url">{gt text="Shared URL"}</label>
            <input type="text" name="url" size="50" maxlength="250" value="{$url}" />
        </div>
        <div class="z-formbuttons">
            <a onClick="javascript:send({$m})" title="{$submit}">
                {img modname='core' src='button_ok.png' set='icons/small'}
            </a>{$submit}
            <a href="#" onclick ='javascript:history.back(-1)'>{img modname='core' src='button_cancel.png' set='icons/small'   __alt="Cancel" __title="Cancel"}</a>
        </div>
    </form>
</div>

<script type="text/javascript"  language="javascript">
    function send(valor){
        var error=false;
        if(document.newShared.url.value==''){
			// for gt detection
            alert("{{gt text="The shared URL is empty"}}");
            error=true;
        }
        if(!error){
            if(valor == 1){
                document.newShared.action="index.php?module=IWnoteboard&type=admin&func=updateShared"
            }else{
                document.newShared.action="index.php?module=IWnoteboard&type=admin&func=createShared"
            }
            document.newShared.submit();
        }
    }
</script>
