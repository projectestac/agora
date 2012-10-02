{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-pageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Esborra el client"}</h2>
    <form id="deleteClient" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='deleteClient'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirm" value="1" />
        <input type="hidden" name="clientId" value="{$client.clientId}" />
        <div>{gt text="Nom client"}: <strong>{$client.clientName}</strong></div>
        <div>{gt text="Serveis actius o sol·licitats"}:</div>
        {if $activedServices|@count gt 0}
        {foreach item="service" from="$activedServices"}
        <div class="serviceImgAdmin">
            <img src="modules/Agoraportal/images/{$services[$service].serviceName}.gif" />
        </div>
        {/foreach}
        {else}
        <div class="serviceImgAdmin">
            {gt text="No té serveis actius o sol·licitats"}
        </div>
        {/if}
        {gt text="Totes les dades relacionades amb aquest client seran esborrades. Confirma l'acció"}
        <div class="z-center">
            <span class="z-buttons">
                <a href="javascript:document.forms['deleteClient'].submit();">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Esborra" __title="Esborra"}
                    {gt text="Esborra"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='Agoraportal' type='admin' func='clientsList'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                    {gt text="Cancel·la"}
                </a>
            </span>
        </div>
    </form>
</div>