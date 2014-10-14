<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/agora/agora.css" />
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/lang/ca.js"></script>
{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Envia avisos"}</h2>
        <form name="advicesForm" id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="POST">
            <div class="form_left">
                <b>{gt text="Missatge"}</b>
                <textarea id="message" name="message" rows=18 width=100%>{$message}</textarea>
                <br />
                <input type="checkbox" name="only_admins" id="only_admins" value="1" {if $only_admins eq "1"}checked{/if}>
                   <label for="only_admins">{gt text="Mostra només als administradors"}</label>
                <br />
                <table>
                    <tr>
                        <td>{gt text="Des de: "}</td>
                        <td>
                            <input size="15" id="date_start" name="date_start"  value="{$date_start}"/>
                            <input type="button" id="from_btn" value="..." />{gt text="Format YYYYmmdd"}
                        </td>
                    </tr>
                    <tr>
                        <td>{gt text="Fins a: "}</td>
                        <td>
                            <input size="15" id="date_stop" name="date_stop" value="{$date_stop}"/>
                            <input type="button" id="to_btn" value="..." />{gt text="Format YYYYmmdd"}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form_right">
                {include file="agoraportal_admin_service_filter.tpl"}
            </div>
            <div class="clear">
                <input name="ask" value="{gt text='Envia'}" type="submit" />
            </div>
    </form>
</div>

<script type="text/javascript">
    var cal = Calendar.setup({
        onSelect	   : 	function(cal) { cal.hide() }
    });

    cal.manageFields("from_btn", "date_start", "%Y%m%d");
    cal.manageFields("to_btn", "date_stop", "%Y%m%d");
</script>

