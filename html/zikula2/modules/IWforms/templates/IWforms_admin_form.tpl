<link rel="stylesheet" href="modules/IWmain/js/calendar/css/jscal2.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/border-radius.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/style.css" type="text/css" />
<script type="text/javascript" src="modules/IWmain/js/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/IWmain/js/calendar/lang/ca.js"></script>
<script type="text/javascript" src="modules/IWmain/js/ColorPicker2.js"></script>
<script type="text/javascript" src="modules/IWmain/js/AnchorPosition.js"></script>
<script type="text/javascript" src="modules/IWmain/js/PopupWindow.js"></script>
<script type="text/javascript" src="modules/IWmain/js/overlay.js"></script>
{include file="IWforms_admin_menu.tpl"}
{ajaxheader modname=IWforms filename=IWforms.js}
<div class="z-admincontainer ">
    <div class="z-adminpageicon">{img modname='core' src='kcmdf.png' set='icons/large'}</div>
    <h2>{gt text="Managing a form"}</h2>
    <ul id="admintabs" class="z-clearfix">
        {include file="IWforms_admin_form_minitab.tpl"}
    </ul>
    <div class="formTitle"><h3>{$item.formName}</h3></div>
    <div class="z-admincontainer">
        <div id="dContent" name="dContent" style="padding: 10px;">
            {$content}
        </div>
    </div>
</div>
<script type="text/javascript">
    var modifyingfield = '{{gt text="...changing the information..."}}';
    var expandcollapse = '{{gt text="...expand/collapse..."}}';
    var deleteFormFieldText = '{{gt text="Confirms delete the field"}}';

    var cp = new ColorPicker('window');
    // Runs when a color is clicked

    function pickColor(color) {
        field.value = color;
        changeColor();
    }

    var field;
    function pick(anchorname,camp) {
        field = eval('document.forms.edit.'+camp);
        cp.show(anchorname);
    }
	
    function changeColor(){
        {{if isset($fieldTypePlus)}}
        {{if "-52-"|strstr:$fieldTypePlus}}
        document.forms.edit.color.style.backgroundColor=document.forms.edit.color.value;
        {{/if}}
        {{if "-53-"|strstr:$fieldTypePlus}}
        document.forms.edit.colorf.style.backgroundColor=document.forms.edit.colorf.value;
        {{/if}}
        {{/if}}
    }
</script>
