{$pager}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="Nom client"}</th>
            <th>{gt text="Serveis"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Municipi i SSTT"}</th>
            <th>{gt text="Observacions"}</th>
            <th class="text-center">{gt text="Estat"}</th>
            <th class="text-center">{gt text="Accions"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=client from=$clients}
        <tr>
            <td>
                 <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client->clientCode}">
                     {$client->clientName}
                 </a><br/>
                 {$client->clientCode}
             </td>
            <td>{$client->logos}</td>
            <td>
                {$client->type_name}
                {if $client->educat eq 1}
                    <br/><img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/>
                {/if}
             <td>
                 {$client->clientCity}<br>
                 {$client->location_name}
             </td>
             <td>
                 {$client->clientDescription|nl2br}
             </td>
             <td class="text-center">
                 {if $client->clientState eq 0}
                     <span class="btn btn-danger glyphicon glyphicon-remove" aria-hidden="true" aria-label="No actiu" title="No actiu"></span>
                 {elseif $client->clientState eq 1}
                     <span class="btn btn-success glyphicon glyphicon-ok" aria-hidden="true" aria-label="Actiu" title="Actiu"></span>
                 {/if}
                 {if $client->noVisible eq 1}
                     <span class="btn btn-danger glyphicon glyphicon-eye-close" aria-hidden="true" aria-label="No visible" title="No visible"></span>
                 {elseif $client->noVisible eq 0}
                    <span class="btn btn-success glyphicon glyphicon-eye-open" aria-hidden="true" aria-label="Visible" title="Visible"></span>
                 {/if}
             </td>
             <td class="text-center">
                <div class="btn-group" role="group">
                    <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editClient' clientId=$client->clientId}" title="Edita">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        <span class="sr-only">Edita</span>
                    </a>
                    {*<a class="btn btn-danger" href="{modurl modname='Agoraportal' type='admin' func='deleteClient' clientId=$client->clientId}" title="Esborra">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <span class="sr-only">Esborra</span>
                    </a>*}
                </div>
             </td>
         </tr>
         {foreachelse}
         <tr>
             <td colspan="7">
                <div class="alert alert-warning">{gt text="No s'han trobat clients"}</div>
             </td>
         </tr>
         {/foreach}
    </tbody>
</table>