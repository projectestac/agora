{$pager}
<table class="table table-hover table-striped table-condensed">
    <thead>
        <tr>
            <th>{gt text="BD"}</th>
            <th>{gt text="Nom client"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Servei"}</th>
            <th>{gt text="Municipi i SSTT"}</th>
            <th>{gt text="Observacions"}</th>
            <th style="width:100px;">{gt text="Data"}</th>
            <th style="width:70px;">{gt text="Consum"}</th>
            <th class="text-center">{gt text="Estat"}</th>
            <th  class="text-center" style="width:130px;">{gt text="Opcions"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=service key=clientServiceId from=$services}
            {assign var="serviceid" value=$service->serviceId}
            {assign var="servicetype" value=$service->servicetype}
            {assign var="client" value=$service->client}
            {assign var="disk" value=$disks[$clientServiceId]}
            {if $service->state eq 0}
                {assign var="stateclass" value="warning"}
            {elseif $service->state lt 0}
                {assign var="stateclass" value="danger"}
            {else}
                {assign var="stateclass" value="default"}
            {/if}
            <tr class="{$stateclass}">
                <td>{$service->activedId}</td>
                <td>
                    <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client->clientCode}">{$client->clientName}</a><br>
                    {$client->clientDNS} - {$client->clientCode}
                </td>
                <td>
                    {$client->type_name}
                    {if $client->extraFunc}
                        <br/>{$client->extraFunc}
                    {/if}
                    {if $client->educat eq 1}
                        <br/><img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/>
                    {/if}
                </td>
                <td>{$service->logo_with_link}</td>
                <td>{$client->clientCity}<br/>{$client->location_name}</td>
                <td>
                    {$service->observations|nl2br}
                    {if $service->annotations neq ''}
                        <div class="well well-sm"><strong>Anotacions:</strong> {$service->annotations|nl2br}</div>
                    {/if}
                </td>
                <td>
                    <span class="timeLetter" title="Data d'edició">{gt text="e"}</span>: {$service->timeEdited|dateformat:"%d/%m/%Y"}<br />
                    <span class="timeLetter" title="Data de creació">{gt text="c"}</span>: {$service->timeCreated|dateformat:"%d/%m/%Y"}<br />
                    <span class="timeLetter" title="Data de sol·licitud">{gt text="s"}</span>: {$service->timeRequested|dateformat:"%d/%m/%Y"}
                </td>
                <td class="text-right {$disk->color}">
                    {if $service->diskSpace gt 0}
                        {$service->diskSpace} MB<br />
                        {$service->diskConsume/1024|round:0} MB <br />
                        {$disk->percent|round:1} %
                    {/if}
                </td>
                <td class="text-center">
                    {if $service->state eq 0}
                        <span class="btn btn-warning glyphicon glyphicon-time" aria-hidden="true" aria-label="Per revisar" title="Per revisar"></span>
                    {elseif $service->state eq 1}
                        <span class="btn btn-success glyphicon glyphicon-ok" aria-hidden="true" aria-label="Actiu" title="Actiu"></span>
                    {elseif $service->state eq -2}
                        <span class="btn btn-danger glyphicon glyphicon-ban-circle" aria-hidden="true" aria-label="Denegat" title="Denegat"></span>
                    {elseif $service->state eq -3}
                        <span class="btn btn-danger glyphicon glyphicon-download" aria-hidden="true" aria-label="Donat de baixa" title="Donat de baixa"></span>
                    {elseif $service->state eq -4}
                        <span class="btn btn-danger glyphicon glyphicon-remove" aria-hidden="true" aria-label="Desactivat" title="Desactivat"></span>
                    {else}
                        {gt text="No s'ha trobat"}
                    {/if}
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
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
                        <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editService' clientServiceId=$clientServiceId}" title="Edita el servei">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <span class="sr-only">Edita</span>
                        </a>
                        {if $service->state neq 1}
                            <a class="btn btn-danger" href="{modurl modname='Agoraportal' type='admin' func='deleteService' clientServiceId=$clientServiceId}" title="Esborra el servei">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                <span class="sr-only">Esborra</span>
                            </a>
                        {/if}
                    </div>
                </td>
            </tr>
        {foreachelse}
        <tr>
            <td colspan="11">
                <div class="alert alert-warning">{gt text="No s'han trobat serveis"}</div>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>