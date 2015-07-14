{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Executa una SQL a "}{$servicetype->serviceName}</h3>

<div class="panel panel-info">
    <div class="panel-heading clearfix">
        {$servicetype->logo}
        {gt text="Funció a executar"}
        <form class="pull-right" name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}">
            <input name="service_sel" type="hidden" value={$servicetype->serviceId} />
            {if $which eq "selected"}
                <select name="clients_sel[]" multiple="multiple">
                    {foreach item=service from=$sqlClients}
                        {assign var="client" value=$service->client}
                        <option value="{$client->clientId}" selected>{$client->clientName}</option>
                    {/foreach}
                </select>
            {/if}
            <textarea name="sqlfunction">{$sqlfunc}</textarea>
        </div>
        <input class="btn btn-info" value="{gt text='Modifica la consulta'}" type="submit" />
        </form>
    </div>
    <div class="panel-body">
        <div style="white-space: pre;">{$sqlfunc}</div>
    {if $which eq "all"}
        <div class="alert alert-info">{gt text="S'executa a Tots"}</div>
    {/if}
    </div>
</div>



<label>{gt text="Resultat:"}</label>
{if $messages_recount|@count}
<table class="table table-hover table-striped">
    <thead>
        <tr><th>{gt text="Missatge"}</th><th>{gt text="Recompte"}</th></tr>
    </thead>
    <tbody>
        {foreach item=number key=name from=$messages_recount}
            <tr><td>{$name}</td><td>{$number}</td></tr>
        {/foreach}
    </tbody>
</table>
{/if}

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="BD"}</th>
            <th>{gt text="Client"}</th>
            <th>{gt text="Missatge/Línies"}</th>
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
                <td>{$service->link}</td>
                <td>{$messages[$id]}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

{foreach item=result key=id from=$results}
    {assign var="service" value=$sqlClients[$id]}
    {assign var="client" value=$service->client}
    <h4 id="{$prefix}{$service->activedId}">
        {$prefix}{$service->activedId}
        {$service->link}
    </h4>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                {foreach item=column from=$columns}
                    <th>{$column|strtolower}</th>
                {/foreach}
            </tr>
        </thead>
        <tbody>
            {foreach item=line from=$result}
            <tr>
                {foreach item=field from=$line}
                    <td>{$field}</td>
                {/foreach}
            </tr>
            {/foreach}
    </tbody></table>
{/foreach}
