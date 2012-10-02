<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/agora/agora.css" />	
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/lang/ca.js"></script>

{include file="agoraportal_user_menu.tpl" clientCode=$client.clientCode}
<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Registre d'accions fetes"}</h2>
    {if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
    {/if}
    <div class="z-form">
        <fieldset>
            <legend>{gt text="Filtre"}</legend>	
            <form name="filterForm" id="filterForm">
                <table>
                    <tr>
                        <td>
                            {gt text="Filtra per tipus d'acció<br>"}
                            <select name="actionCode" id="actionCode">
                                <option value="0">{gt text="Totes les accions"}</option>
                                <option value="1">{gt text="Afegir"}</option>
                                <option value="2">{gt text="Modificar"}</option>
                                <option value="3">{gt text="Eliminar"}</option>			
                            </select>
                        </td>
                        <td>
                            <span style="margin-left:50px;">&nbsp;</span>
                        </td>
                        <td>
                            {gt text="Filtra per data<br>"}
                            <table>
                                <tr><td>{gt text="des de: "}</td>
                                    <td><input size="15" id="from_inpt" /><input type="button" id="from_btn" value="..." /></td></tr>
                                <tr><td>{gt text="fins a: "}</td>
                                    <td><input size="15" id="to_inpt" /><input type="button" id="to_btn" value="..." /></td></tr>
                            </table>
                        </td>
                        <td>
                            <span style="margin-left:50px;">&nbsp;</span>
                        </td>
                        <td>
                            {gt text="Filtra per usuari<br>"}
                            <input type="text" name="uname" id="uname" size="20"/>			
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" value="Envia" onClick="javascript:logs(0,document.filterForm.actionCode.value,document.filterForm.from_inpt.value,document.filterForm.to_inpt.value,document.filterForm.uname.value,1)" />
                            <span id="reload"></span>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
    <div id="logsContent" name="logsContent">
        {$logsContent}
    </div>
</div>

<script type="text/javascript">
    var cal = Calendar.setup({
        onSelect	   : 	function(cal) { cal.hide() }
    });
	
    cal.manageFields("from_btn", "from_inpt", "%d-%m-%Y");
    cal.manageFields("to_btn", "to_inpt", "%d-%m-%Y");
</script>