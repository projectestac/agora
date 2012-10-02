{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Esborra la sol·licitud"}</h2>
    <form id="deleteClient" class="z-adminform" action="{modurl modname='Agoraportal' type='admin' func='deleteRequest'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirm" value="1" />
        {foreach item=client from=$requests}	
        <input type="hidden" name="requestId" value="{$client.requestId}" />
        <div>{gt text="Nom client"}: <strong>{$client.dns}</strong></div>
        <div>{gt text="Tipus de sol·licitud que serà esborrada"}: <strong>{$client.type}</strong></div>
        <div>{gt text="Servei de la sol·licitud que serà esborrada"}: <strong>{$client.serviceName}</strong></div>
        {/foreach}
        {gt text="Totes les dades relacionades amb aquesta petició seran esborrades. Confirma l'acció"}
        <div class="z-center">
            <span class="z-buttons">
                <a href="javascript: document.forms['deleteClient'].submit();">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Esborra" __title="Esborra"}
                    {gt text="Esborra"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='Agoraportal' type='admin' func='requestsList'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                    {gt text="Cancel·la"}
                </a>
            </span>
        </div>
    </form>
</div>