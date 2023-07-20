<td>{$service->serviceId}</td>
<td><img src="modules/Agoraportal/images/{$service->serviceName}.gif" alt="{$service->serviceName}" title="{$service->serviceName}"/></td>
<td>{$service->URL}</td>
<td>{$service->description}</td>
<td>{$service->hasDB}</td>
<td>{$extra->tablesPrefix}</td>
<td>{$service->allowedClients}</td>
<td>{$service->defaultDiskSpace}</td>
<td class="text-right">
    <button type="button" class="btn btn-info" onclick="editService({$service->serviceId});" title="Edita">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        <span class="sr-only">Edita</span>
    </button>
</td>