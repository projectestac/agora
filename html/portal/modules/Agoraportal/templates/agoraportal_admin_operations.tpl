{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Operacions"}</h2>
    <div class="form_left">
        <strong>{gt text="Acció"}</strong><br />
        <select name="accio" onchange="getAction()" style="width:100%;">
            <option value="cleancache">{gt text="Neteja la caché"}</option>
            <option value="update">{gt text="Actualitza la versió"}</option>
        </select><br/><br/>
    </div>
    <div class="form_right">
        <form name="serviceForm" id="serviceForm" action="index.php?module=Agoraportal&type=admin&func=operations" method="POST">
            {include file="agoraportal_admin_service_filter.tpl"}
            <br/><br/>
            <input name="exec" value="{gt text='Executa ara'}" type="submit" />
            <input name="queue" value="{gt text='Posa a la cua'}" type="submit" />
        </form>
    </div>
    <div class="clear"></div>
</div>
