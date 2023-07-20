{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Esborra el client"}</h3>
<form class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='deleteClient'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirm" value="1" />
    <input type="hidden" name="clientId" value="{$client->clientId}" />
    {include file="agoraportal_admin_clientInfo.tpl"}

    {if $services|@count gt 0}
        <div class="panel panel-info">
            <div class="panel-heading clearfix">
                {gt text="Serveis actius o sol·licitats"}
            </div>
            <div class="panel-body">
                {foreach item="service" from="$services"}
                    <div class="clearfix">
                        <span class="btn-group" role="group">
                            {if $service->state eq 0}
                                <span class="btn btn-warning" title="Per revisar">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    <span class="sr-only">Per revisar</span>
                                </span>
                            {elseif $service->state eq 1}
                                <span class="btn btn-success" title="Actiu">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <span class="sr-only">Actiu</span>
                                </span>
                            {elseif $service->state eq -2}
                                <span class="btn btn-danger" title="Denegat">
                                    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Denegat</span>
                                </span>
                            {elseif $service->state eq -3}
                                <span class="btn btn-danger" title="Donat de baixa">
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                    <span class="sr-only">Donat de baixa</span>
                                </span>
                            {elseif $service->state eq -4}
                                <span class="btn btn-danger" title="Desactivat">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <span class="sr-only">Desactivat</span>
                                </span>
                            {else}
                                {gt text="No s'ha trobat"}
                            {/if}
                        </span>
                        {$service->logo_with_link}
                    </div>
                {/foreach}
            </div>
        </div>
    {else}
        <div class="alert alert-success">
            {gt text="No té serveis actius o sol·licitats"}
        </div>
    {/if}
    <div class="alert alert-danger">
        {gt text="Totes les dades relacionades amb aquest client seran esborrades. Confirma l'acció"}
    </div>

    <div class="text-center">
        <button class="btn btn-success" title="Esborra" type="submit">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> {gt text="Esborra"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='clientsList'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
