{include file="agoraportal_user_menu.tpl"}

<h3>{gt text="Sol·licituds del centre"}&nbsp;{$client->clientName}</h3>
<div class="panel panel-default">
    <div class="panel-heading">{gt text='Sol·licituds disponibles'} <span id="reload"></span></div>
    <div class="panel-body">
        <form class="form-inline" action="{modurl modname='Agoraportal' type='user' func='addRequest'}" method="post" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" id="clientCode" name="clientCode" value="{$client->clientCode}" />
            <div class="form-group">
                <label for="requestFilter">{gt text="Sol·licitud"}</label>
                <select class="form-control" id="requestFilter" name="requestFilter" onchange="showRequestMessage($('requestFilter').value, $('clientCode').value);">
                    <option value="0">{gt text="Tria una sol·licitud"}</option>
                    {foreach item=requesttypes key=serviceId from=$types}
                        {if $enabledservices[$serviceId]}
                            {assign var="servicetype" value=$services[$serviceId]}
                            <optgroup label="{$servicetype->serviceName}">
                            {foreach item=type from=$requesttypes}
                                <option value="{$serviceId}:{$type->requestTypeId}">{$type->name}</option>
                            {/foreach}
                        {/if}
                    {/foreach}
                </select>
            </div>

            <div id="menuservices" class="form-group"></div>

            <div id="usermessage" style="margin-top:10px;"></div>
    </form>
    </div>
</div>

{if not empty($requests)}
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>{gt text="Sol·licitant"}</th>
                <th>{gt text="Data"}</th>
                <th>{gt text="Estat"}</th>
                <th>{gt text="Tipus"}</th>
                <th>{gt text="Servei"}</th>
                <th>{gt text="Resposta dels administradors"}</th>
                <th>{gt text="Darrera modificació"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach item=request from=$requests}
                {assign var="serviceId" value=$request->serviceId}
                {assign var="requesttype" value=$types[$serviceId]}
                {assign var="typeid" value=$request->requestTypeId}
                {assign var="type" value=$requesttype[$typeid]}
                {if !$type}
                    {continue}
                {/if}

                {assign var="servicetype" value=$services[$serviceId]}
                <tr id="formRow_{$client->clientId}">
                    <td>{$request->username}</td>
                    <td>{$request->timeCreated|dateformat:"%d/%m/%Y"}</td>
                    <td>
                        {if $request->requestStateId eq 1}
                            <span class="btn btn-info glyphicon glyphicon-time" aria-hidden="true" aria-label="Pendent" title="Pendent"></span>
                        {elseif $request->requestStateId eq 2}
                            <span class="btn btn-warning glyphicon glyphicon-cog" aria-hidden="true" aria-label="En estudi" title="En estudi"></span>
                        {elseif $request->requestStateId eq 3}
                            <span class="btn btn-success glyphicon glyphicon-ok" aria-hidden="true" aria-label="Solucionada" title="Solucionada"></span>
                        {elseif $request->requestStateId eq 4}
                            <span class="btn btn-alert glyphicon glyphicon-ban-circle" aria-hidden="true" aria-label="Denegada" title="Denegada"></span>
                        {/if}
                    </td>
                    <td>{$type->name}</td>
                    <td>{$servicetype->logo}</td>
                    <td>{$request->adminComments}</td>
                    <td>{$request->timeClosed|dateformat:"%d/%m/%Y"}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/if}
