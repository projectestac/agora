{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Operacions"}</h2>
    <form name="serviceForm" id="serviceForm" action="index.php?module=Agoraportal&type=admin&func=operations" method="POST">
        <div class="form_left">
            <strong>{gt text="Acció"}</strong><br />
            <select name="accio" id="actionselect" onchange="prepareAction()" style="width:100%;">
                <option value="">{gt text="No hi ha accions disponibles"}</option>
            </select><br/><br/>
            <strong>Descripció</strong>
            <div id="actiondescription"></div>
            <strong>Paràmetres</strong>
            <div id="actionparams"></div>
        </div>
        <div class="form_right">
            {include file="agoraportal_admin_service_filter.tpl"}
            <br/><br/>
        </div>
    <div class="clear"></div>
    <input name="exec" value="{gt text='Executa ara'}" type="submit" />
    <input name="queue" value="{gt text='Posa a la cua'}" type="submit" />
    </form>
</div>
<script>
    var actions;
    window.onload = getServiceActions();
</script>
