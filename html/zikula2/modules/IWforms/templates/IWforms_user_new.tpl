<script language="javascript">
    function sendNote(){
        var error;
        var f = document.newNote;
        {{$requiredJS}}
        {{$checkJS}}
	
        if(!error){
			//for gt detection
			resposta=confirm("{{gt text="Confirms that want to send the annotation"}}");
		}
		
        if(!error && resposta){
            f.submit();
        }
    }
    /**
     * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
     */
    function echeck(str) {
        var at="@"
        var dot="."
        var lat=str.indexOf(at)
        var lstr=str.length
        var ldot=str.indexOf(dot)
        if (str.indexOf(at)==-1){
            return false
        }
        if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
            return false
        }
        if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
            return false
        }
        if (str.indexOf(at,(lat+1))!=-1){
            return false
        }
        if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
            return false
        }
        if (str.indexOf(dot,(lat+2))==-1){
            return false
        }
        if (str.indexOf(" ")!=-1){
            return false
        }
        return true
    }
</script>
{pageaddvar name='stylesheet' value='modules/IWmain/js/calendar/css/jscal2.css'}
{pageaddvar name='stylesheet' value='modules/IWmain/js/calendar/css/border-radius.css'}
{pageaddvar name='stylesheet' value='modules/IWmain/js/calendar/css/style.css'}
{pageaddvar name='javascript' value='modules/IWmain/js/calendar/jscal2.js'}
{pageaddvar name='javascript' value='modules/IWmain/js/calendar/lang/ca.js'}
{pageaddvar name='javascript' value='modules/IWmain/js/overlay.js'}
{if $form.skinForm neq ''}
{pageaddvar name='stylesheet' value=$form.skincssurl}
{/if}
{if not isset($adminView)}
{include file="IWforms_user_menu.tpl"}
{/if}

<div class="userForm">
    <div class="formTitle">{$form.title}</div>
    <div style="clear:both;"></div>
    <form name="newNote" id="newNote" class="z-form" {if not isset($adminView)}action="{modurl modname='IWforms' type='user' func='submitNote'}"{/if} method="post" enctype="multipart/form-data">
          <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="fid" value="{$fid}" />
        {$content}
        {if $captcha neq ''}
        <div class="z-formrow">
            <label>{gt text="Please write the correct words"}</label>
            <div class="z-formnote">
                {$captcha}
            </div>
        </div>
        {/if}
        {if $requiredText}
        <div class="fieldContent">
            {gt text="Fields marked with an"} <span class="required">*</span> {gt text="are required"}
        </div>
        {/if}
        {if not isset($adminView)}
        <div class="z-center">
            <span class="z-buttons">
                <a style="cursor:pointer;" onClick="javascript:sendNote()" title="{gt text='Send'}">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Send"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='IWforms' type='user' func='main'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
                </a>
            </span>
        </div>
        {/if}
    </form>
</div>
