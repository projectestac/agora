<td>
    {$service.serviceId}
    <input type="hidden" name="servideId_{$service.serviceId}" value="$service.serviceId" />
</td>
<td>
    <input type="text" name="serviceName_{$service.serviceId}" size="{$service.serviceName|count_characters}" value="{$service.serviceName}" />
</td>
<td>
    <input type="text" name="URL_{$service.serviceId}" size="{$service.URL|count_characters}" value="{$service.URL}" />
</td>
<td>
    <input type="text" name="description_{$service.serviceId}" size="50" value="{$service.description}" />
</td>
<td>
    <input type="text" name="version_{$service.serviceId}" size="{$service.version|count_characters}" value="{$service.version}" />
</td>
<td>
    <input type="text" name="hasDB_{$service.serviceId}" size="{$service.hasDB|count_characters}" value="{$service.hasDB}" />
</td>
<td>
    {$service.tablesPrefix}
</td>
<td>
    <input type="text" name="allowedClients_{$service.serviceId}" size="{$service.allowedClients|count_characters}" value="{$service.allowedClients}" />
</td>
<td>
    {$service.serverFolder}
</td>
<td>
    <input type="text" name="defaultDiskSpace_{$service.serviceId}" size="{$service.defaultDiskSpace|count_characters}" value="{$service.defaultDiskSpace}" />
</td>
<td align="center">
    <a href="javascript: updateService({$service.serviceId})">
        {img modname='core' src='button_ok.gif' set='icons/extrasmall' __alt="Actualitza" __title="Actualitza"}
    </a>
</td>