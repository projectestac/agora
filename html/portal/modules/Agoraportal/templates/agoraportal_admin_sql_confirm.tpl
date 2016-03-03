{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Executa una SQL"}</h3>
<div class="panel panel-info">
    <div class="panel-heading">
        {$servicetype->logo}
        {gt text="Sentència a executar"}</div>
    <div class="panel-body" style="white-space: pre;">
        {$sqlfunc}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        {gt text="Espais on s'executa"}
    </div>
    <div class="panel-body">
    {if $which eq "all"}
        {gt text="Tots"}
    {else}
        <ul class="list-unstyled">
        {foreach item=client from=$sqlClients}
            <li>{$client->clientName}, {$client->clientCode}</li>
        {/foreach}
        </ul>
    {/if}
    </div>
</div>
<form name="sqlForm" id="sqlForm" action="{modurl modname='Agoraportal' type='admin' func='sql'}" method="POST">
    <div class="hidden">
        <input type="hidden" name="which" value="{$which}">
        <input name="service_sel" type="hidden" value="{$servicetype->serviceId}" />
        {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$sqlClients}
                    <option value="{$client->clientId}" selected>{$client->clientId}</option>
                {/foreach}
            </select>
        {/if}
        <textarea name="sqlfunction">{$sqlfunc}</textarea>
    </div>
    <label>{gt text="Esteu segurs?"}</label>
    <input class="btn btn-success" name="confirm" value="{gt text='Sí'}" type="submit" />
    <input class="btn btn-danger" value="{gt text='No'}" type="submit" />
</form>
