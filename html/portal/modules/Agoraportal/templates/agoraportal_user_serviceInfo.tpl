<div class="panel panel-default">
    <div class="panel-heading">
        {$service->logo_with_link} <strong>{$servicetype->serviceName}</strong>: {$servicetype->description}
    </div>
    <div class="panel-body">
        <p><strong>{gt text="Ha fet la sol·licitud"}</strong>: {$service->contactName} ({$service->useremail}) - <strong>{gt text="Data de sol·licitud"}</strong>: {$service->timeRequested|dateformat:"%d/%m/%Y"}</p>
        {if $service->state eq 0}
            <div class="alert alert-warning">{gt text="Servei pendent d'activació"}</div>
        {elseif $service->state eq -2}
            <div class="alert alert-danger">{gt text="Sol·licitud denegada"}</div>
        {elseif $service->state lt -1}
            {if $service->observations neq ''}
                <div class="alert alert-danger">{$service->observations|nl2br}</div>
            {/if}
        {elseif $service->state eq 1}
            <p><strong>{gt text="Accés"}</strong>: <a href="{$service->url}">{$service->url}</a></p>
            <p><strong>{gt text="Data d'activació"}</strong>: {$service->timeCreated|dateformat:"%d/%m/%Y"}</p>
            {include file="agoraportal_user_service_disk_usage.tpl"}
        {/if}
        {if $isAdmin}
            <div class="panel panel-info clearfix" id="tools_{$servicetype->serviceName}">
                <div class="panel-heading clearfix">
                    Eines d'administració
                    <div class="pull-right">
                        <span class="btn-group" role="group">
                            {if $service->state eq 1 and $service->diskSpace > 0}
                                <a target="_blank" class="btn btn-default" href="{modurl modname='Agoraportal' type='admin' func='listDataDirs' serviceName=$servicetype->serviceName activedId=$service->activedId}" title="Ocupació dels fitxers">
                                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                                    <span class="sr-only">Ocupació dels fitxers</span>
                                </a>
                                {if $servicetype->serviceName eq 'moodle2'}
                                    <a target="_blank" class="btn btn-primary" href="{modurl modname='Files' type='user' func='main' folder=$servicetype->serviceName|cat:'|'|cat:$client->clientDNS }" title="Fitxers">
                                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                        <span class="sr-only">Fitxers</span>
                                    </a>
                                {/if}
                            {/if}
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editService' clientServiceId=$service->clientServiceId}" title="Edita el servei">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                <span class="sr-only">Edita el servei</span>
                            </a>
                            {if $service->state neq 1}
                                <a class="btn btn-danger" href="{modurl modname='Agoraportal' type='admin' func='deleteService' clientServiceId=$service->clientServiceId}" title="Esborra el servei">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    <span class="sr-only">Esborra el servei</span>
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
                </div>
                <div class="panel-body">
                    {if $service->timeEdited}
                        <p><strong>{gt text="Data d'edició"}</strong>: {$service->timeEdited|dateformat:"%d/%m/%Y"}</p>
                    {/if}
                    {if $service->annotations neq ''}
                        <div class="alert alert-info">{$service->annotations|nl2br}</div>
                    {/if}
                    {if $service->state eq 1}
                        <p><strong>{gt text="ActidedId (usu)"}</strong>: {$service->activedId}</p>
                        {if $service->actions}
                            <div>
                                <strong>{gt text="Accions disponibles:"}</strong>
                                <ul>
                                    {foreach item=title key=actionname from=$service->actions}
                                        <li>
                                            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action=$actionname clientServiceId=$service->clientServiceId}">
                                                {$title}
                                            </a>
                                        </li>
                                    {/foreach}
                                </ul>
                                <div class="alert alert-warning">{gt text="ATENCIÓ: No es demana confirmació per portar a terme les accions de la llista."}</div>
                            </div>
                        {/if}
                    {/if}
                </div>
            </div>
        {/if}
    </div>
</div>
