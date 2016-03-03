{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Operació"} {$actionselect} a {$serviceName}</h3>
<div class="panel panel-info">
    <div class="panel-heading">{gt text="Operació a encuar:"} <strong>{$actionselect}</strong></div>
    <div class="panel-body">
        <div><strong>{gt text="Prioritat:"}</strong>
            {if $priority < 0} Nocturna {/if} {$priority}
        </div>
        <div><strong>{gt text="Paràmetres de la operació:"}</strong>
            <ul>
            {foreach key=paramkey item=param from=$params}
                <li><strong>{$paramkey}</strong> = {$param}</li>
            {/foreach}
            </ul>
        </div>
        <img src="modules/Agoraportal/images/{$serviceName}.gif" alt="{$serviceName}" title="{$sserviceName}" />
    </div>
</div>

{if $which eq "all"}
<div class="alert alert-info">{gt text="S'executa a Tots"}</div>
{/if}

<label>{gt text="Resultat:"}</label>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="Usu"}</th>
            <th>{gt text="Client"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=service key=id from=$services}
        {if $success[$id]}
        <tr class="success">
            {else}
        <tr class="danger">
            {/if}
            <td>
                {$prefix}{$service->activedId}
            </td>
            <td>
                <a target="_blank" href="{$service->client->clientDNS|serviceLink:$serviceName}">{$service->client->clientName}</a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>

{adminfooter}

