{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Cues"}</h2>
    <div>{gt text="Filtres"}
    <form name="serviceForm" action="index.php?module=Agoraportal&type=admin&func=queues" method="POST">
        <strong>Operació: </strong><input name="operation_filter" value="{$operation_filter}"/>

        <strong>Filtra centre per: </strong>
        <select name="client_type">
            <option {if $client_type === "clientCode"}selected{/if} value="clientCode">{gt text="Codi"}</option>
            <option {if $client_type === "clientName"}selected{/if} value="clientName">{gt text="Nom client"}</option>
            <option {if $client_type === "clientCity"}selected{/if} value="clientCity">{gt text="Ciutat"}</option>
            <option {if $client_type === "clientDNS"}selected{/if} value="clientDNS">{gt text="DNS"}</option>
            <option {if $client_type === "clientId"}selected{/if} value="clientId">{gt text="Id"}</option>
        </select>
        <input type="text" value="{$client_filter}" name="client_filter" size="20"/>

        <strong>Prioritat: </strong>
        {html_options name=priority_filter options=$priority_filter_values values=$priority_filter_values selected=$priority_filter}

        <strong>Servei: </strong>
        <select name="service_filter">
            <option value="" {if $service_filter === ""}selected="selected"{/if}>Tots</option>
            <option value="0" {if $service_filter === 0}selected="selected"{/if}>Portal</option>
            {foreach item=service from=$services}
            <option value="{$service.serviceId}" {if $service_filter === $service.serviceId}selected="selected"{/if}>{gt text="%s" tag1=$service.serviceName}</option>
            {/foreach}
        </select>
        <strong>Estat: </strong>
        <select name="state_filter">
            <option {if $state_filter === ''}selected{/if} value="">{gt text="Tots"}</option>
            <option {if $state_filter === 'L'}selected{/if} value="L">{gt text="Executant"}</option>
            <option {if $state_filter === 'P'}selected{/if} value="P">{gt text="Pendent"}</option>
            <option {if $state_filter === 'OK'}selected{/if} value="OK">{gt text="Correcte"}</option>
            <option {if $state_filter === 'KO'}selected{/if} value="KO">{gt text="Error"}</option>
            <option {if $state_filter === 'TO'}selected{/if} value="TO">{gt text="Timeout"}</option>
            <option {if $state_filter === 'OK,KO,TO'}selected{/if} value="OK,KO,TO">{gt text="Acabat"}</option>
            <option {if $state_filter === 'L,P'}selected{/if} value="L,P">{gt text="No acabat"}</option>
        </select><br/>
        <strong>{gt text="Des de: "}</strong>
        <input size="15" id="date_start" name="date_start"  value="{$date_start}"/><br/>
        <strong>{gt text="Fins a: "}</strong>
        <input size="15" id="date_stop" name="date_stop" value="{$date_stop}"/><br/>
        <strong>{gt text="Ordenat per"}: </strong>
        <select name="sortby_filter">
            <option {if $sortby_filter === "timeStart"}selected{/if} value="timeStart">{gt text="Inici"}</option>
            <option {if $sortby_filter === "timeEnd"}selected{/if} value="timeEnd">{gt text="Fi"}</option>
            <option {if $sortby_filter === "state"}selected{/if} value="state">{gt text="Estat"}</option>
            <option {if $sortby_filter === "priority"}selected{/if} value="priority">{gt text="Prioritat"}</option>
            <option {if $sortby_filter === "clientName"}selected{/if} value="clientName">{gt text="Nom del centre"}</option>
            <option {if $sortby_filter === "clientDNS"}selected{/if} value="clientDNS">{gt text="DNS del centre"}</option>
            <option {if $sortby_filter === "serviceId"}selected{/if} value="serviceId">{gt text="Servei"}</option>
            <option {if $sortby_filter === "operation"}selected{/if} value="operation">{gt text="Operació"}</option>
        </select>
        <select name="sortby_dir" >
            <option {if $sortby_dir === 'ASC'}selected{/if} value="ASC">{gt text="Ascendent"}</option>
            <option {if $sortby_dir === 'DESC'}selected{/if} value="DESC">{gt text="Descendent"}</option>
        </select><br/>
        <input type="submit" value="Filtra" />
    </form>
    </div>
    <div>
        <div class="pager">{$rowsNumber} {gt text="Operacions"}</div>
        {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}

        <span id="reload"></span>
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="id"}</th>
                    <th>{gt text="Operació"}</th>
                    <th align="center">{gt text="Client"}</th>
                    <th align="center">{gt text="Servei"}</th>
                    <th align="center">{gt text="Prioritat"}</th>
                    <th align="center">{gt text="Estat"}</th>
                    <th align="center">{gt text="Encuat"}</th>
                    <th align="center">{gt text="Inici"}</th>
                    <th align="center">{gt text="Fi"}</th>
                    <th align="center">{gt text="Accions"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=row from=$rows}
                    {if $row.state == 'OK'}
                        <tr class="{cycle values="ok-odd,ok-even"}">
                    {elseif $row.state == 'KO' || $row.state == 'TO'}
                        <tr class="{cycle values="error-odd,error-even"}">
                    {elseif $row.state == 'L'}
                        <tr class="{cycle values="info-odd,info-even"}">
                    {else}
                        <tr class="{cycle values="z-odd,z-even"}">
                    {/if}
                        <td align="center" valign="top">{$row.id}</td>
                        <td align="left" valign="top">{$row.operation}</td>
                        <td align="center" valign="top">
                            <a target="_blank" href="../{$row.clientDNS}/{$row.serviceName}">
                                {$row.clientName}
                            </a></td>
                        <td align="center" valign="top">{$row.serviceName}</td>
                        <td align="center" valign="top">
                        {if $row.state == 'P'}
                            <select id="new_priority_{$row.id}" onchange="operations_change_priority({$row.id});">
                                {html_options options=$change_priority_values values=$change_priority_values selected=$row.priority}
                            </select>
                        {else}
                            {$row.priority}
                        {/if}
                        </td>
                        <td align="center" valign="top">
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
                        <td align="center" valign="top">
                        {if $row.timeCreated}
                            {$row.timeCreated|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                        </td>
                        <td align="center" valign="top">
                        {if $row.timeStart}
                            {$row.timeStart|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                        </td>
                        <td align="center" valign="top">
                         {if $row.timeEnd}
                            {$row.timeEnd|date_format:"%d/%m/%Y - %H:%M:%S"}
                        {else}
                            -
                        {/if}
                        </td>
                        <td align="center" valign="top" class="actions">
                        {if $row.params != ''}
                            {assign var="params" value=$row.params|@json_decode}
                            {assign var="text" value=""}
                            {foreach item=val key=k from=$params}
                                {assign var="text" value="`$text``$k` = `$val`<br/>"}
                            {/foreach}
                            <img title="Paràmetres" src='images/icons/small/package_graphics.png' onclick="operations_show_params('{$text|escape}');"/>
                        {/if}

                        {if $row.logId != 0}
                            <img title="Registre" src='images/icons/small/db.png' onclick="operations_show_log('{$row.logId}');"/>
                        {/if}

                        {if $row.state == 'KO' || $row.state == 'TO'}
                            <img title="Executa de nou" src='images/icons/small/reload.png' onclick="operations_execute('{$row.id}');"/>
                        {elseif $row.state == 'P'}
                            <img title="Executa ara" src='images/icons/small/cache.png' onclick="operations_execute('{$row.id}');"/>
                        {elseif $row.state == 'L'}
                            {if $row.timeStart < $smarty.now - 30*60}
                                <img title="Executa de nou" src='images/icons/small/cache.png' onclick="operations_execute('{$row.id}');"/>
                            {/if}
                        {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

