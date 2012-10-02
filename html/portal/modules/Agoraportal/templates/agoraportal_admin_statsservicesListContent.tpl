<p>{$clientsNumber} {gt text="serveis potencials"}
[{$services[$service].serviceName}]</p>
<select name="clients_sel[]" size="15" id="clients_sel" multiple="multiple">
	{foreach item=client from=$clients}
		<option value="{$client.clientDNS}" 
		{foreach item=client_sel from=$clients_sel}
			{if $client.clientDNS eq $client_sel}
				selected="selected"
			{/if}
		{/foreach}
		 > {$client.clientName}, {$client.clientCode}</option>
	{foreachelse}
		<option value="0">{gt text="No s'han trobat serveis"}</option>
	{/foreach}
 </select>
