<div class="form-group">
    <label for="clients_sel">{$clientsNumber} {gt text="serveis potencials"}
    [{$service->serviceName}]</label>
    <select class="form-control" name="clients_sel[]" size="15" id="clients_sel" multiple="multiple" style="width:100%;">
        {foreach item=client from=$clients}
        <option value="{$client.clientId}"
                {foreach item=client_sel from=$clients_sel}
                    {if $client.clientId eq $client_sel}selected="selected"{/if}
                {/foreach}
                >{$client.activedId}. {$client.clientName}, {$client.clientCode}, {$client.clientDNS}</option>
        {foreachelse}
            <option value="0">{gt text="No s'han trobat serveis"}</option>
        {/foreach}
    </select>
</div>