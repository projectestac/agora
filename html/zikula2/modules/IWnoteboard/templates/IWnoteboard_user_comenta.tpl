<script language="javascript">
    function send(){
        var j=0;
        if(document.new_note.noticia.value==""){
			// for gt detection
            //			alert("{{gt text="The text of the note is empty!"}}");
            //			var error=true;
        }
		
        resposta=confirm("{{gt text="Do you really want to send the note?"}}");
		
        if(document.new_note.m.value=="n"){
            document.new_note.action="index.php?module=IWnoteboard&func=comenta_crear"
        }else{
            document.new_note.action="index.php?module=IWnoteboard&func=updatecomentari"
        }

        if(resposta){
            document.new_note.submit();
        }
    }
</script>

{include file="IWnoteboard_user_menu.tpl"}
<h2>{$titol}</h2>
<form class="z-form" action=""  name="new_note" enctype="multipart/form-data" method="post">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="verifica" value="{$verifica}">
    <input type="hidden" name="m" value="{$m}">
    <input type="hidden" name="nid" value="{$nid}">
    <fieldset>
        <legend>{gt text="Comment"}</legend>
        <div class="z-formrow">
            <label for="noticia">{gt text="Comment"}</label>
            <textarea cols="" name="noticia" cols="70" rows="7">{if $m eq 'e'}{$noticia}{/if}</textarea>
        </div>
    </fieldset>
    <div class="z-center">
        <span class="z-buttons">
            <a onClick="javascript:send()" title="{$submit}">
                {img modname='core' src='button_ok.png' set='icons/small'} {$submit}
            </a>
        </span>
        <span class="z-buttons">
            <a href="#" onclick ='javascript:history.back(-1)'>
                {img modname='core' src='button_cancel.png' set='icons/small'   __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
            </a>
        </span>
    </div>
    <fieldset style="padding:20px; margin:20px;">
        <legend>{gt text="Note content"}</legend>
        <p>{$textnota|nl2br}</p>
    </fieldset>
</form>
