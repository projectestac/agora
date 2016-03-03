<div class="panel panel-default">
    <div class="panel-heading row-fluid clearfix">
        {$service->logo_with_link} <strong>{$servicetype->serviceName}</strong>: {$servicetype->description}
        {if $isAdmin}
            <div class="pull-right">
                <span class="btn-group" role="group">
                    {if $service->state eq 1 and $service->diskSpace > 0}
                        <a target="_blank" class="btn btn-default" href="{modurl modname='Agoraportal' type='admin' func='listDataDirs' serviceName=$servicetype->serviceName activedId=$service->activedId}" title="{gt text="Ocupació dels fitxers"}">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            <span class="sr-only"{gt text="Ocupació dels fitxers"}</span>
                        </a>
                        <a target="_blank" class="btn btn-default" href="{modurl modname='Agoraportal' type='user' func='recalcConsume' clientServiceId=$service->clientServiceId}" title="{gt text="Recalcula l'espai consumit"}">
                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                            <span class="sr-only">{gt text="Recalcula l'espai consumit"}</span>
                        </a>
                        {if $servicetype->serviceName eq 'moodle2'}
                        <a target="_blank" class="btn btn-default" href="{modurl modname='Files' type='user' func='main' folder=$servicetype->serviceName|cat:'|'|cat:$client->clientDNS }" title="{gt text="Fitxers"}">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                <span class="sr-only">{gt text="Fitxers"}</span>
                            </a>
                        {/if}
                    {/if}
                    {if $service->state eq 1 and $servicetype->serviceName neq 'nodes'}
                        <a class="btn btn-default" href="{modurl modname='Agoraportal' type='admin' func='restoreXtecadmin' clientServiceId=$service->clientServiceId}" title="{gt text="Restaura l'usuari xtecadmin"}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="sr-only">{gt text="Restaura l'usuari xtecadmin"}</span>
                        </a>
                    {/if}
                    {if $service->state neq 1}
                        <a class="btn btn-danger" href="{modurl modname='Agoraportal' type='admin' func='deleteService' clientServiceId=$service->clientServiceId}" title="{gt text="Esborra el servei"}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <span class="sr-only">{gt text="Esborra el servei"}</span>
                        </a>
                    {/if}
                </span>

                <span class="btn-group" role="group">
                    {if $accessLevel eq 'admin'}
                        <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editService' clientServiceId=$service->clientServiceId}" title="{gt text="Edita el servei"}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <span class="sr-only">{gt text="Edita el servei"}</span>
                        </a>
                    {/if}
                </span>

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
            </div>
        {/if}
    </div>

    <div class="panel-body">
        <span><strong>{gt text="Ha fet la sol·licitud"}</strong>: {$service->contactName} ({$service->useremail})</span>
        <br />
        <span></><strong>{gt text="Data de sol·licitud"}</strong>: {$service->timeRequested|dateformat:"%d/%m/%Y"}</span>
        <br />

        {if $isAdmin}
            {if $service->timeEdited}
                <span><strong>{gt text="Data d'edició"}</strong>: {$service->timeEdited|dateformat:"%d/%m/%Y"}</span>
                <br />
            {/if}
            {if $service->annotations neq ''}
                <div class="alert alert-info">{$service->annotations|nl2br}</div>
            {/if}
        {/if}

        {if $service->state eq 0}
            <div class="alert alert-warning">{gt text="Servei pendent d'activació"}</div>
        {elseif $service->state eq -2}
            <div class="alert alert-danger">{gt text="Sol·licitud denegada"}</div>
        {elseif $service->state lt -1}
            {if $service->observations neq ''}
                <div class="alert alert-danger">{$service->observations|nl2br}</div>
            {/if}
        {elseif $service->state eq 1}
            <span><strong>{gt text="Data d'activació"}</strong>: {$service->timeCreated|dateformat:"%d/%m/%Y"}</span>
            <br />
            <span><strong>{gt text="URL"}</strong>: <a href="{$service->url}">{$service->url}</a></span>
            <br />
            {if $isAdmin}
                <span><strong>{gt text="ActivedId (usu)"}</strong>: {$service->activedId}</span>
                <br />
            {/if}
            {include file="agoraportal_user_service_disk_usage.tpl"}
        {/if}
    </div>
</div>
