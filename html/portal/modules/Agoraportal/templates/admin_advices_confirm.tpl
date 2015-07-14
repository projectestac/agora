{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Envia avisos"}</h3>
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
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <img src="modules/Agoraportal/images/{$serviceName}.gif" alt="{$serviceName}" title="{$sserviceName}" />
        {gt text="Espais on s'executa"}
    </div>
    <div class="panel-body">
    {if $which eq "all"}
        {gt text="Tots"}
    {else}
        <ul class="list-unstyled">
            {foreach item=service key=id from=$sqlClients}
                {assign var="client" value=$service->client}
                <li>{$client->clientName}, {$client->clientCode}</li>
            {/foreach}
        </ul>
    {/if}
    </div>
</div>

<form id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="post">
    <div class="hidden">
        <input type="hidden" name="which" value="{$which}" />
        {if $which eq "selected"}
        <select name="clients_sel[]" multiple="multiple">
            {foreach item=service key=id from=$sqlClients}
                {assign var="client" value=$service->client}
                <option value="{$client->clientId}" selected>{$client->clientId}</option>
            {/foreach}
        </select>
        {/if}
        <textarea name="message">{$message}</textarea>
        <input type="hidden" name="date_start"  value="{$date_start}"/>
        <input type="hidden" name="only_admins"  value="{$only_admins}"/>
        <input type="hidden" name="date_stop" value="{$date_stop}"/>
        <input type="hidden" name="service_sel" value="{$service_sel}"/>
    </div>
    <label>{gt text="Esteu segurs?"}</label>
    <input class="btn btn-success" name="confirm" value="{gt text='Sí'}" type="submit" />
    <input class="btn btn-danger" value="{gt text='No'}" type="submit" />
</form>
