<td>
    {$service->serviceId}
    <input class="form-control" type="hidden" name="servideId_{$service->serviceId}" value="$service->serviceId" />
</td>
<td>
    <input class="form-control" type="text" name="serviceName_{$service->serviceId}" size="{$service->serviceName|count_characters}" value="{$service->serviceName}" />
</td>
<td>
    <input class="form-control" type="text" name="URL_{$service->serviceId}" size="{$service->URL|count_characters}" value="{$service->URL}" />
</td>
<td>
    <input class="form-control" type="text" name="description_{$service->serviceId}" size="50" value="{$service->description}" />
</td>
<td>
    <input class="form-control" type="text" name="hasDB_{$service->serviceId}" size="{$service->hasDB|count_characters}" value="{$service->hasDB}" />
</td>
<td>{$extra->tablesPrefix}</td>
<td>
    <input class="form-control" type="text" name="allowedClients_{$service->serviceId}" size="{$service->allowedClients|count_characters}" value="{$service->allowedClients}" />
</td>
<td {if $extra->serverFolder neq ''}class="{if $extra->validFolder}bg-success{else}bg-danger{/if}"{/if}>
    {$extra->serverFolder}
</td>
<td>
    <input class="form-control" type="text" name="defaultDiskSpace_{$service->serviceId}" size="{$service->defaultDiskSpace|count_characters}" value="{$service->defaultDiskSpace}" />
</td>
<td class="text-right">
    <button type="button" class="btn btn-success" onclick="updateService({$service->serviceId});" title="Desa">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <span class="sr-only">Desa</span>
    </button>
</td>