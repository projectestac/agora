{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Esborra el servei"}</h2>
    <form id="deleteClient" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='deleteService'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirm" value="1" />
        <input type="hidden" name="clientServiceId" value="{$client.clientServiceId}" />
        <div>{gt text="Nom client"}: <strong>{$client.clientName}</strong></div>
        <div>{gt text="Servei que serà esborrat"}:</div>
        <div class="serviceImgAdmin">
            <img src="modules/Agoraportal/images/{$services[$client.serviceId].serviceName}.gif" />
        </div>
        {gt text="Totes les dades relacionades amb aquest servei seran esborrades. Confirma l'acció"}
        <div class="z-center">
            <span class="z-buttons">
                <a href="javascript: document.forms['deleteClient'].submit();">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Esborra" __title="Esborra"}
                    {gt text="Esborra"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='Agoraportal' type='admin' func='servicesList'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                    {gt text="Cancel·la"}
                </a>
            </span>
        </div>
    </form>
</div>