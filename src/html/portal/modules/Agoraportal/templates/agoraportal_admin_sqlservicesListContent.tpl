<div>
    {$clientsNumber} {gt text="serveis potencials"}
    [{$services[$service_sel].serviceName}]
</div>
<select name="clients_sel[]" size="15" id="clients_sel" multiple="multiple">
    {foreach item=client from=$clients}
    <option value="{$client.clientId}" 
            {foreach item=client_sel from=$clients_sel}
            {if $client.clientId eq $client_sel}
            selected="selected"
            {/if}
            {/foreach}
            > {$client.clientName}, {$client.clientCode} ({$client.activedId})</option>
    {foreachelse}
    <option value="0">{gt text="No s'han trobat serveis"}</option>
    {/foreach}
</select>
<br />
{gt text="Ordena per:"}
<select name="order_sel[]" id="order_sel" onchange="javascript:sqlservicesList()">
    <option value="1" {if $order eq 1}SELECTED{/if}>{gt text="Nom del centre"}</option>
    <option value="3" {if $order eq 3}SELECTED{/if}>{gt text="Id del centre"}</option>
    <option value="4" {if $order eq 4}SELECTED{/if}>{gt text="Codi del centre"}</option>
</select>
