<script language="javascript">
    function sendNote(){
        var f=document.forms['new_note'];
        var j=0;
        if(f.fitxer.value!="" && "{{$extensions}}".indexOf(f.fitxer.value.substring(f.fitxer.value.length-3,f.fitxer.value.length))==-1  && !error){
			//for gt detection
            alert("{{gt text="The extension of the attached file is not accepted. Allowed extensions are: "}}{{$extensions}}");
            var error=true;
        }
        {{if not $shipHeadersLines}}
        if(!error){
            if(!checkDate(f.caduca) || !checkDate(f.titulin) || !checkDate(f.titulout)){
                var error=true;
            }
        }
        {{/if}}
        if(!error){
            if(!chkdate()){
                var error=true;
            }
        }

        {{if $tria}}
        if(!error){
            for (var i=0; i<f.elements.length; i++) {
                var e = f.elements[i];
                if ((e.name != 'allbox') && (e.type=='checkbox') && (e.name!='admet_comentaris') && e.checked)
                    var j=1;
            }
        }
			
        if(!error && j==0){
			//for gt detection
            alert("{{gt text="There are no chosen addressee for the note"}}");
            var error=true;
        }
        {{/if}}
		
        if(!error){
			//for gt detection
			resposta=confirm("{{gt text="Do you really want to send the note?"}}");
		}
		
        if(f.m.value=="n"){
            f.action="index.php?module=IWnoteboard&func=crear"
        }else{
            f.action="index.php?module=IWnoteboard&func=update"
        }

        if(!error && resposta){
            f.submit();
        }

    }
	
    // Original JavaScript code by Chirp Internet: www.chirp.com.au
    // Please acknowledge use of this code by including this header.
    function checkDate(field) {
        var allowBlank = true;
        var minYear = 00;
        var maxYear = 99;
        var errorMsg = "";
        // regular expression to match requiredate format
        re = /^(\d{1,2})\/(\d{1,2})\/(\d{2})$/;
        if(field.value != '') {
            if(regs = field.value.match(re)) {
                if(regs[1] < 1 || regs[1] > 31) {
					//for gt detection
                    errorMsg = "{{gt text="Some of the dates in the form are not correct"}} " + field.value;
                } else if(regs[2] < 1 || regs[2] > 12) {
					//for gt detection
                    errorMsg = "{{gt text="Some of the dates in the form are not correct"}} " + field.value;
                } else if(regs[3] < minYear || regs[3] > maxYear) {
					//for gt detection
                    errorMsg = "{{gt text="Some of the dates in the form are not correct"}} " + field.value;
                }
            } else {
				//for gt detection
                errorMsg = "{{gt text="Some of the dates in the form are not correct"}} " + field.value;
            }
        } else if(!allowBlank) {
			//for gt detection
            errorMsg = "{{gt text="Some of the dates in the form are not correct"}}";
        }
        if(errorMsg != "") {
            alert(errorMsg);
            field.focus();
            return false;
        }
        return true;
    }

    function CheckAll() {
        var f=document.forms['new_note'];
        for (var i=0; i<f.elements.length; i++) {
            var e = f.elements[i];
            if ((e.name != 'allbox') && (e.type=='checkbox') && (e.name!='admet_comentaris') && (e.name!='modremitent') && (e.name!='segur') && (e.name!='public'))
                e.checked = f.allbox.checked;
        }
    }

    function CheckCheckAll() {
        var TotalBoxes = 0;
        var TotalOn = 0;
        var f=document.forms['new_note'];
        for (var i=0; i<f.elements.length; i++) {
            var e = f.elements[i];
            if ((e.name != 'allbox') && (e.type=='checkbox') && (e.name!='admet_comentaris') && (e.name!='modremitent') && (e.name!='segur') && (e.name!='public')) {
                TotalBoxes++;
                if (e.checked) {
                    TotalOn++;
                }
            }
        }
        if (TotalBoxes==TotalOn) {
            f.allbox.checked=true;
        } else {
            f.allbox.checked=false;
        }
    }

    function chkdate(){
        var f=document.forms['new_note'];
        data = new Date(20 + f.data.value.substr(6,2), f.data.value.substr(3,2), f.data.value.substr(0,2))
        caduca = new Date(20 + f.caduca.value.substr(6,2), f.caduca.value.substr(3,2), f.caduca.value.substr(0,2))
        var result = true;
        if (data > caduca){
			//for gt detection
            alert("{{gt text="The closing date is incorrect"}}");
            result = false;
        }
        return result;
    }
</script>
<noscript>
{assign var='noscript' value='true'}
</noscript>
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/jscal2.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/border-radius.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/style.css" type="text/css" />
<script type="text/javascript" src="modules/IWmain/js/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/IWmain/js/calendar/lang/ca.js"></script>

{include file="IWnoteboard_user_menu.tpl" pageTitle=$titol}

<form class="z-form" id="new_note" enctype="multipart/form-data" method="post" action="">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="verifica" value="{$verifica}" />
    <input type="hidden" name="m" value="{$m}" />
    <input type="hidden" name="nid" value="{$nid}" />
    <input type="hidden" name="saved" value="{$saved}" />
    <input type="hidden" name="tema" value="{$tema}" />

    <fieldset>
        <legend>{gt text="Note content"}</legend>
        {if $temes_MS|@count gt 0}
        <div class="z-formrow">
            <label for="topic">{gt text="Choose a topic"}</label>
            <select name="tid">
                <option></option>
                {section name=temes_MS loop=$temes_MS}
                <option value="{$temes_MS[temes_MS].id}" {if $tid eq $temes_MS[temes_MS].id or $tema eq $temes_MS[temes_MS].id}selected{/if}>{$temes_MS[temes_MS].name}</option>
                {/section}
            </select>
        </div>
        {/if}
        {if $multiLanguage eq 1}
        <div class="z-formrow">
            <label for="language">{gt text="Choose a language"}</label>
            {html_select_languages id=mlsettings_language name=language selected=$language installed=1 all=true}
        </div>
        {/if}
        <div class="z-formrow">
            <label for="noticia">{gt text="Note content"}</label>
            <textarea id="noticia" name="noticia" cols="70" rows="7">{$noticia|safetext}</textarea>
        </div>
        <div class="z-formrow">
            <label for="data">{gt text="Publish date"}</label>
            <input type="text" name="data" id="data" maxlength="8" size="8" value="{$data}" onFocus=blur() />
        </div>
        <div class="z-formrow">
            <label for="caduca">{gt text="Closing date"}</label>
            <div class="z-formnote">
                <input size="10" id="caducaDate" name="caduca"  value="{$caduca}" onfocus="blur();" />
                <img id="caducaDate_btn" src="modules/IWnoteboard/images/calendar.gif" style="cursor:pointer;" />
            </div>
        </div>
    </fieldset>
    {if not $shipHeadersLines}
    <fieldset>
        <legend>{gt text="Headline"}</legend>
        <div class="z-formrow">
            <label for="titular">{gt text="Headline text"}</label>
            <input id="titular" name="titular" id="titular" value="{$titular|safetext}" />
        </div>
        <div class="z-formrow">
            <label for="titulin">{gt text="Since"}</label>
            <div class="z-formnote">
                <input size="10" id="titulinDate" name="titulin"  value="{$titulin}" onfocus="blur();" />
                <img id="titulinDate_btn" src="modules/IWnoteboard/images/calendar.gif" style="cursor:pointer;" />
            </div>
        </div>
        <div class="z-formrow">
            <label for="titulout">{gt text="Up to"}</label>
            <div class="z-formnote">
                <input size="10" id="tituloutDate" name="titulout"  value="{$titulout}" onfocus="blur();" />
                <img id="tituloutDate_btn" src="modules/IWnoteboard/images/calendar.gif" style="cursor:pointer;" />
            </div>
        </div>
    </fieldset>
    {/if}
    <fieldset>
        <legend>{gt text="Additional information"}</legend>
        <div class="z-formrow">
            <label for="mes_info">{gt text="Link to find more information"}</label>
            <input type="text" id="mes_info" name="mes_info" size="50"  maxlength="150" value="{$mes_info|safetext}" />
        </div>
        <div class="z-formrow">
            <label for="text">{gt text="Text for the link"}</label>
            <input type="text" name="text" id="text" size="50"  maxlength="150" value="{$text|safetext}" />
        </div>
        <div class="z-formrow">
            <label for="file">{gt text="Add an attached file"}</label>
            {if $m eq 'n'}
            <input type="file" id="file" name="fitxer" size="50" />
            {else}
            {if $fitxer eq ""}
            <input type="file" name="fitxer" size="50" />
            <input type="hidden" name="new_file" value="1" />
            {else}
            <input type="hidden" name="fitxer" value="{$fitxer|safetext}" />
            <input type="hidden" name="new_file" value="0" />
            {$fitxer}
            <input type="checkbox" name="segur" value="1" />{gt text="Erase the file attached to the note"}
            {/if}
            {/if}
            <div class="z-formnote z-informationmsg">
                {gt text="Allowed extensions - "} {$extensions}
            </div>
        </div>
        <div class="z-formrow">
            <label for="textfitxer">{gt text="Attached file text"}</label>
            <input type="text" id="textfitxer" name="textfitxer" size="50"  maxlength="50" value="{$textfitxer}" />
        </div>
    </fieldset>
    <fieldset>
        <legend>{gt text="Addressee"}</legend>
        <table border="0" width="100%">
            {if $tria}
            <tr>
                <td>
                    {gt text="All"}
                </td>
                <td align="right" valign="top">
                    <input name="allbox" onclick="CheckAll();" type="checkbox" value="{gt text="Check all"}" /></td>
                </td>
            </tr>
            {section name=grups_array loop=$grups_array}
            <tr>
                <td align="left" valign="top">
                    --> {$grups_array[grups_array].name}
                </td>
                <td align="right" valign="top">
                    <input type="checkbox" onclick="CheckCheckAll();" name="destinataris[{$smarty.section.grups_array.rownum-1}]" {$grups_array[grups_array].select} value="{$grups_array[grups_array].id}">
                </td>
            </tr>
            {/section}
            {else}
            <tr>
                <td align="left" valign="top">
                    {gt text="This note will be sent to all registered users"}
                </td>
            </tr>
            {/if}
            <tr>
                <td colspan="2">&nbsp;

                </td>
            </tr>
            <tr>
                <td>
                    {gt text="Comments allowed"}
                </td>
                <td align="right">
                    <input type="checkbox" {if $admet_comentaris OR $m eq 'n' AND $commentCheckedByDefault eq 1}checked{/if} name="admet_comentaris" value="1" />
                </td>
            </tr>
            {if $m eq 'e'}
            <tr>
                <td>
                    {gt text="Send note to first line"}
                </td>
                <td align="right">
                    <input type="checkbox" name="firstLine" value="1" />
                </td>
            </tr>
            {/if}

            {if $saved eq 1}
            <tr>
                <td>
                    <strong>{gt text="Put me as the sender of the note"}</strong>
                </td>
                <td align="right">
                    <input type="checkbox" name="modremitent" value="1" />
                </td>
            </tr>
            {/if}
        </table>
    </fieldset>

    <div class="z-center">
        {if $noscript eq 'true'}
        <span class="z-buttons">
            <a onClick="javascript:sendNote()" title="{$submit}">
                {img modname='core' src='button_ok.png' set='icons/small'} {$submit}
            </a>
        </span>
        <span class="z-buttons">
            <a href="#" onclick ='javascript:history.back(-1)'>
                {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
            </a>
        </span>
        {/if}
        <noscript>
        <div class="z-button">
            {button src='button_ok.png' set='icons/small' __alt="Create" __title="Create"} {$submit}
        </div>
        <div class="z-button">
            <a href="{modurl modname='IWnoteboard' type='user' func='main'}">
                {img modname='core' src='button_cancel.png' set='icons/small'   __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
            </a>
        </div>
        </noscript>
    </div>
</form>
{notifydisplayhooks eventname='iwnoteboard.ui_hooks.iwnoteboard.form_edit'}
<script type="text/javascript">   
    var caduca = Calendar.setup({
        onSelect       :    function(caduca) { caduca.hide() }
    });
    caduca.manageFields("caducaDate_btn", "caducaDate", "%d/%m/%y");
    
    {{if not $shipHeadersLines}}
    var titulin = Calendar.setup({
        onSelect       :    function(titulin) { titulin.hide() }
    });
    titulin.manageFields("titulinDate_btn", "titulinDate", "%d/%m/%y");
    
    var titulout = Calendar.setup({
        onSelect       :    function(titulout) { titulout.hide() }
    });
    titulout.manageFields("tituloutDate_btn", "tituloutDate", "%d/%m/%y");
    {{/if}}
</script>
