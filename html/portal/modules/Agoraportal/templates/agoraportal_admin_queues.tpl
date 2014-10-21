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
        {html_options name=priority_filter options=$priority_filter_values values=$priority_filter_values selected=$priority_filter)}

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
            <option {if $state_filter === 'OK,KO'}selected{/if} value="OK,KO">{gt text="Acabat"}</option>
        </select><br/>
        <strong>{gt text="Des de: "}</strong>
        <input size="15" id="date_start" name="date_start"  value="{$date_start}"/>{gt text="Format YYYY-mm-dd HH:mm"}<br/>
        <strong>{gt text="Fins a: "}</strong>
        <input size="15" id="date_stop" name="date_stop" value="{$date_stop}"/>{gt text="Format YYYY-mm-dd  HH:mm"}<br/>
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
        <div class="pager">{$rowsNumber} {gt text="Operacions"} - {$pager}</div>
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="Operació"}</th>
                    <th align="center">{gt text="Client"}</th>
                    <th align="center">{gt text="Servei"}</th>
                    <th align="center">{gt text="Prioritat"}</th>
                    <th align="center">{gt text="Estat"}</th>
                    <th align="center">{gt text="Inici"}</th>
                    <th align="center">{gt text="Fi"}</th>
                    <th align="center">{gt text="Accions"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=row from=$rows}
                    {if $row.state == 'OK'}
                        <tr class="{cycle values="ok-odd,ok-even"}">
                    {elseif $row.state == 'KO'}
                        <tr class="{cycle values="error-odd,error-even"}">
                    {else}
                        <tr class="{cycle values="z-odd,z-even"}">
                    {/if}
                        <td align="left" valign="top">{$row.operation}</td>
                        <td align="center" valign="top">
                            <a target="_blank" href="../{$row.clientDNS}/{$row.serviceName}">
                                {$row.clientName}
                            </a></td>
                        <td align="center" valign="top">{$row.serviceName}</td>
                        <td align="center" valign="top">{$row.priority}</td>
                        <td align="center" valign="top">
                        {if $row.state == 'OK'}
                            Correcte
                        {elseif $row.state == 'KO'}
                            Error
                        {elseif $row.state == 'L'}
                            Executant
                        {elseif $row.state == 'P'}
                            Pendent
                        {else}
                            {$row.state}
                        {/if}
                        </td>
                        <td align="center" valign="top">{$row.timeStart|date_format:"%d/%m/%Y - %H:%M:%S"}</td>
                        <td align="center" valign="top">{$row.timeEnd|date_format:"%d/%m/%Y - %H:%M:%S"}</td>
                        <td align="center" valign="top">
                        {if $row.params != ''}
                            {img title="Paràmetres" modname='core' src='package_graphics.png' set='icons/small'}
                        {/if}
                        {if $row.state == 'OK'}
                            {img title="Registre" modname='core' src='db.png' set='icons/small'}
                        {elseif $row.state == 'KO'}
                            {img title="Registre" modname='core' src='db.png' set='icons/small'}
                            {img title="Executa de nou" modname='core' src='reload.png' set='icons/small'}
                        {elseif $row.state == 'L'}
                            ...
                        {elseif $row.state == 'P'}
                            {img title="Executa ara" modname='core' src='cache.png' set='icons/small'}
                            {img title="Canvia la prioritat" modname='core' src='2uparrow.png' set='icons/small'}
                        {else}
                            ...
                        {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>


