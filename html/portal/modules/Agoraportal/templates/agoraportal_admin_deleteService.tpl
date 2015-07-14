{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Esborra el servei"}</h3>
<form id="deleteClient" class="horizontal-form" action="{modurl modname='Agoraportal' type='admin' func='deleteService'}" method="post" enctype="application/x-www-form-urlencoded">
    {include file="agoraportal_admin_clientInfo.tpl"}
    <h4>{gt text="Servei que serà esborrat"}:</h4>
    {include file="agoraportal_user_serviceInfo.tpl"}
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirm" value="1" />
    <input type="hidden" name="clientServiceId" value="{$service->clientServiceId}" />
    <div class="alert alert-danger">
        {gt text="Totes les dades relacionades amb aquest servei seran esborrades. Confirma l'acció"}
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Esborra" type="submit">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Esborra"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='servicesList'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
