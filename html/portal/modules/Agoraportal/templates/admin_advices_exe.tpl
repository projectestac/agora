{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Avisos a "}{$serviceName}</h3>
<div class="panel panel-info">
    <div class="panel-heading">{gt text="Missatge:"}</div>
    <div class="panel-body">
        <div style="white-space: pre; border-bottom: 1px solid #CCC;">{$message}</div>
            {if $only_admins eq "1"}
            <div>
                {gt text="Mostra només als administradors"}
            </div>
            {/if}

            <div>
            <strong>{gt text="Des de: "}</strong>
            {if $date_start eq 0}{gt text="ara"}
            {else}{$date_start}
            {/if}
            </div>

            <div>
            <strong>{gt text="Fins: "}</strong>
            {if $date_stop eq 0}{gt text="per sempre"}
            {else}{$date_stop}
            {/if}
            </div>
            <img src="modules/Agoraportal/images/{$serviceName}.gif" alt="{$serviceName}" title="{$sserviceName}" />
    </div>
</div>

{if $which eq "all"}
<div class="alert alert-info">{gt text="S'executa a Tots"}</div>
{/if}


<label>{gt text="Resultat:"}</label>
<div>{gt text="OK:"} {$ok}</div>
<div>{gt text="Errors:"} {$error}</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="BD"}</th>
            <th>{gt text="Client"}</th>
            <th>{gt text="Missatges"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=service key=id from=$sqlClients}
            {assign var="client" value=$service->client}
            {if $success[$id]}
                <tr class="success">
                {else}
            <tr class="danger">
                {/if}
                <td><a href="#{$prefix}{$service->activedId}">{$prefix}{$service->activedId}</a></td>
                <td><a target="_blank" href="../{$client->clientDNS}/{$serviceName}">{$client->clientName}</a></td>
                <td>{$messages[$id]}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
