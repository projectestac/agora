<div class="pager">{$requestsNumber} {gt text="Peticions"} - {$pager}</div>
<table class="z-datatable"> 
    <thead>
        <tr>
            <th>{gt text="Nom Client"}</th>
            <th>{gt text="Ha enviat"}</th>
            <th>{gt text="Data"}</th>
            <th>{gt text="Estat"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Servei"}</th>
            <th>{gt text="Resposta dels administradors"}</th>
            <th>{gt text="Darrera modificació"}</th>
            <th>{gt text="Opcions"}</th>
        </tr>
    </thead> 
    <tbody>
        {foreach item=client from=$requests}
        <tr class="{cycle values="z-odd,z-even"}" id="formRow_{$client.clientId}">
            <td align="left" valign="top">
                 <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client.clientCode}" target="_blank">
                     {$client.clientName}
                 </a>
             </td>
             <td align="left" valign="top">{$client.username} </td>
             <td align="left" valign="top">{$client.timeCreated|dateformat:"%d/%m/%Y - %H:%m"} </td>
             <td align="left" valign="top">{$client.state} </td>
             <td align="left" valign="top">{$client.type} </td>
             <td align="left" valign="top">{$client.serviceName} </td>
             <td align="left" valign="top">{$client.adminComments|truncate:30} </td>
             <td align="left" valign="top">{$client.timeClosed|dateformat:"%d/%m/%Y - %H:%m"} </td>
             <td valign="top" align="center">
                 <a href="{modurl modname='Agoraportal' type='admin' func='editRequest' requestId=$client.requestId init=$init search=$search searchText=$searchText stateFilter=$stateFilter service=$service}">
                     {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edita" __title="Edita"}
                 </a>
                 <a href="{modurl modname='Agoraportal' type='admin' func='deleteRequest' requestId=$client.requestId}">
                     {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                 </a>
             </td>
         </tr>
         {/foreach}
        </tbody>
    </table>
