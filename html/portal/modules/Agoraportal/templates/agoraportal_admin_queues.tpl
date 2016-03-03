{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Cues"}</h3>
<div class="panel panel-default">
    <div class="panel-heading">{gt text="Cercador"} <span id="reload"></span></div>
    <div class="panel-body">
        <form class="form-inline" name="serviceForm" action="index.php?module=Agoraportal&type=admin&func=queues" method="POST">
            <div class="form-group">
                <label for="operation_filter">Operació: </label>
                <input class="form-control" name="operation_filter" id="operation_filter" value="{$operation_filter}"/>
            </div>
            <div class="form-group">
                <label for="client_type">Cerca centres per: </label>
                <select class="form-control" name="client_type" id="client_type">
                    <option {if $client_type === "clientCode"}selected{/if} value="clientCode">{gt text="Codi"}</option>
                    <option {if $client_type === "clientName"}selected{/if} value="clientName">{gt text="Nom client"}</option>
                    <option {if $client_type === "clientCity"}selected{/if} value="clientCity">{gt text="Ciutat"}</option>
                    <option {if $client_type === "clientDNS"}selected{/if} value="clientDNS">{gt text="DNS"}</option>
                    <option {if $client_type === "clientId"}selected{/if} value="clientId">{gt text="Id"}</option>
                </select>
                <input class="form-control" type="text" value="{$client_filter}" name="client_filter" size="20"/>
            </div>
            <div class="form-group">
                <label for="priority_filter">Prioritat: </label>
                {html_options class=form-control id=priority_filter name=priority_filter options=$priority_filter_values values=$priority_filter_values selected=$priority_filter}
            </div>
            <div class="form-group">
                <label for="service_filter">Servei: </label>
                <select class="form-control" name="service_filter" id="service_filter">
                    <option value="" {if $service_filter === ""}selected="selected"{/if}>Tots</option>
                    {foreach item=service from=$services}
                    <option value="{$service->serviceId}" {if $service_filter === $service->serviceId}selected="selected"{/if}>{gt text="%s" tag1=$service->serviceName}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label for="state_filter">Estat: </label>
                <select class="form-control" name="state_filter" id="state_filter">
                    <option {if $state_filter === ''}selected{/if} value="">{gt text="Tots"}</option>
                    <option {if $state_filter === 'L'}selected{/if} value="L">{gt text="Executant"}</option>
                    <option {if $state_filter === 'P'}selected{/if} value="P">{gt text="Pendent"}</option>
                    <option {if $state_filter === 'OK'}selected{/if} value="OK">{gt text="Correcte"}</option>
                    <option {if $state_filter === 'KO'}selected{/if} value="KO">{gt text="Error"}</option>
                    <option {if $state_filter === 'TO'}selected{/if} value="TO">{gt text="Timeout"}</option>
                    <option {if $state_filter === 'OK,KO,TO'}selected{/if} value="OK,KO,TO">{gt text="Acabat"}</option>
                    <option {if $state_filter === 'L,P'}selected{/if} value="L,P">{gt text="No acabat"}</option>
                </select>
            </div>
            <br/><br/>
            <div class="form-group">
                <label for="date_start">{gt text="Des de: "}</label>
                <input type="datetime" class="form-control" id="date_start" name="date_start" value="{$date_start}" min="2014-01-01"  max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
            </div>
            <div class="form-group">
                <label for="date_stop">{gt text="Fins a: "}</label>
                <input type="datetime" class="form-control" id="date_stop" name="date_stop" value="{$date_stop}" min="2014-01-01"  max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
            </div>
            <div class="form-group">
                <label for="sortby_filter">{gt text="Ordenat per"}: </label>
                <select class="form-control" name="sortby_filter" id="sortby_filter">
                    <option {if $sortby_filter === "timeStart"}selected{/if} value="timeStart">{gt text="Inici"}</option>
                    <option {if $sortby_filter === "timeEnd"}selected{/if} value="timeEnd">{gt text="Fi"}</option>
                    <option {if $sortby_filter === "state"}selected{/if} value="state">{gt text="Estat"}</option>
                    <option {if $sortby_filter === "priority"}selected{/if} value="priority">{gt text="Prioritat"}</option>
                    <option {if $sortby_filter === "clientName"}selected{/if} value="clientName">{gt text="Nom del centre"}</option>
                    <option {if $sortby_filter === "clientDNS"}selected{/if} value="clientDNS">{gt text="DNS del centre"}</option>
                    <option {if $sortby_filter === "serviceId"}selected{/if} value="serviceId">{gt text="Servei"}</option>
                    <option {if $sortby_filter === "operation"}selected{/if} value="operation">{gt text="Operació"}</option>
                </select>
                <select class="form-control" name="sortby_dir" >
                    <option {if $sortby_dir === 'ASC'}selected{/if} value="ASC">{gt text="Ascendent"}</option>
                    <option {if $sortby_dir === 'DESC'}selected{/if} value="DESC">{gt text="Descendent"}</option>
                </select><br/>
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> {gt text="Cerca"}
            </button>
        </form>
    </div>
</div>

{if $exec_rows}
    <div>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{gt text="id"}</th>
                <th>{gt text="Operació"}</th>
                <th>{gt text="Client"}</th>
                <th>{gt text="Servei"}</th>
                <th>{gt text="Prioritat"}</th>
                <th>{gt text="Encuat"}</th>
                <th>{gt text="Inici"}</th>
                <th>{gt text="Fi"}</th>
                <th>{gt text="Accions"}</th>
            </tr>
            </thead>
            <tbody>
            {foreach item=row from=$rows}
                <tr class="info">
                    <td>{$row.id}</td>
                    <td>{$row.operation}</td>
                    <td>
                        <a target="_blank" href="{$row.clientDNS|serviceLink:$row.serviceName}">
                            {$row.clientName}
                        </a></td>
                    <td>
                        <a href="{$row.clientDNS|serviceLink:$row.serviceName}" target="_blank">
                            <img src="modules/Agoraportal/images/{$row.serviceName}.gif" alt="{$row.serviceName}" title="{$row.serviceName}" />
                        </a>
                    </td>
                    <td class="text-center">
                        {$row.priority}
                    </td>
                    <td>
                        {if $row.timeCreated}
                            {$row.timeCreated|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                    </td>
                    <td>
                        {if $row.timeStart}
                            {$row.timeStart|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                    </td>
                    <td>
                        {if $row.timeEnd}
                            {$row.timeEnd|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                    </td>
                    <td class="actions">
                        <div class="btn-group" role="group">
                            {if $row.timeStart < $smarty.now - 10*60}
                                <button class="btn btn-warning" title="Executa de nou" onclick="operations_execute('{$row.id}');">
                                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.params != ''}
                                <button class="btn btn-info" title="Paràmetres" onclick="operations_show_params('{$row.params|escape}');">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.logId != 0}
                                <button class="btn btn-info" title="Registre" onclick="operations_show_log('{$row.logId}');">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </button>
                            {/if}
                        </div>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
{/if}

<div>
    <div class="pager">{$rowsNumber} {gt text="Operacions"}</div>
    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>{gt text="id"}</th>
                <th>{gt text="Operació"}</th>
                <th>{gt text="Client"}</th>
                <th>{gt text="Servei"}</th>
                <th>{gt text="Prioritat"}</th>
                <th>{gt text="Estat"}</th>
                <th>{gt text="Encuat"}</th>
                <th>{gt text="Inici"}</th>
                <th>{gt text="Fi"}</th>
                <th>{gt text="Accions"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach item=row from=$rows}
                {if $row.state == 'OK'}
                    <tr class="success">
                {elseif $row.state == 'KO' || $row.state == 'TO'}
                    <tr class="danger">
                {elseif $row.state == 'L'}
                    <tr class="info">
                {else}
                    <tr>
                {/if}
                    <td>{$row.id}</td>
                    <td>{$row.operation|replace:'script_':''}
                    </td>
                    <td>
                        <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$row.clientCode}">
                            {$row.clientName}
                        </a></td>
                    <td>
                     <a href="{$row.clientDNS|serviceLink:$row.serviceName}" target="_blank">
                         <img src="modules/Agoraportal/images/{$row.serviceName}.gif" alt="{$row.serviceName}" title="{$row.serviceName}" />
                         </a>
                     </td>
                    <td class="text-center">
                    {if $row.state == 'P'}
                        <select class="form-control" style="width:auto; display:inline;" id="new_priority_{$row.id}" onchange="operations_change_priority({$row.id});">
                            {html_options options=$change_priority_values values=$change_priority_values selected=$row.priority}
                        </select>
                    {else}
                        {$row.priority}
                    {/if}
                    </td>
                    <td>
                    {if $row.state == 'OK'}
                        Correcte
                    {elseif $row.state == 'KO'}
                        Error
                    {elseif $row.state == 'L'}
                        Executant
                    {elseif $row.state == 'P'}
                        Pendent
                    {elseif $row.state == 'TO'}
                        Timeout
                    {else}
                        {$row.state}
                    {/if}
                    </td>
                    <td>
                    {if $row.timeCreated}
                        {$row.timeCreated|date_format:"%d/%m/%Y - %H:%M:%S"}
                    {else}
                        -
                    {/if}
                    </td>
                    <td>
                    {if $row.timeStart}
                        {$row.timeStart|date_format:"%d/%m/%Y - %H:%M:%S"}
                    {else}
                        -
                    {/if}
                    </td>
                    <td>
                     {if $row.timeEnd}
                        {$row.timeEnd|date_format:"%d/%m/%Y - %H:%M:%S"}
                    {else}
                        -
                    {/if}
                    </td>
                    <td class="actions">
                        <div class="btn-group" role="group">
                            {if $row.state == 'KO' || $row.state == 'TO'}
                                <button class="btn btn-warning" title="Executa de nou" onclick="operations_execute('{$row.id}');">
                                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                </button>
                            {elseif $row.state == 'P'}
                                <button class="btn btn-primary" title="Executa ara" onclick="operations_execute('{$row.id}');">
                                    <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-danger" title="Elimina" onclick="operations_delete('{$row.id}');">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            {elseif $row.state == 'L'}
                                {if $row.timeStart < $smarty.now - 10*60}
                                    <button class="btn btn-warning" title="Executa de nou" onclick="operations_execute('{$row.id}');">
                                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                    </button>
                                {/if}
                            {/if}

                            {if $row.state != 'P' && $row.state != 'L' }
                                <button class="btn btn-warning" title="Torna a encuar" onclick="operations_changeState('{$row.id}', 'P');">
                                    <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.state == 'TO' || $row.state == 'KO' }
                                <button class="btn btn-success" title="Dona per correcte" onclick="operations_changeState('{$row.id}', 'OK');">
                                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.state == 'TO' || $row.state == 'OK' }
                                <button class="btn btn-danger" title="Dona per fallit" onclick="operations_changeState('{$row.id}', 'KO');">
                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.params != ''}
                                <button class="btn btn-info" title="Paràmetres" onclick="operations_show_params('{$row.params|escape}');">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </button>
                            {/if}

                            {if $row.logId != 0}
                                <button class="btn btn-info" title="Registre" onclick="operations_show_log('{$row.logId}');">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </button>
                            {/if}
                        </div>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{adminfooter}
