{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Operacions"}</h2>
    <form name="serviceForm" id="serviceForm" action="index.php?module=Agoraportal&type=admin&func=operations" method="POST">
        <div class="form_left">
            <strong>{gt text="Acció"}</strong><br />
            <select name="actionselect" id="actionselect" onchange="prepareAction()" style="width:100%;">
                <option value="">{gt text="No hi ha accions disponibles"}</option>
            </select><br/><br/>
            <strong>Descripció</strong>
            <div id="actiondescription"></div><br/><br/>
            <strong>Paràmetres</strong>
            <div id="actionparams"></div><br/><br/>
            Prioritat (Negativa: nocturna): {html_options name="priority" options=$priority_values values=$priority_values selected=0}
            <input name="queue" value="{gt text='Posa a la cua'}" type="submit" />
        </div>
        <div class="form_right">
            {include file="agoraportal_admin_service_filter.tpl"}
            <br/><br/>
        </div>
        <div class="clear"></div>
    </form>
</div>
<script>
    var actions;
    window.onload = getServiceActions();
</script>
