{$pager}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="Nom"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Servei Territorial"}</th>
            <th>{gt text="Població"}</th>
            <th>{gt text="Serveis"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=client from=$clients}
        <tr id="formRow_{$client->clientId}">
            <td>
                 {$client->clientName}
                 {if $client->educat eq 1}
                    <br/><img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle" />
                 {/if}
             </td>
             <td>{$client->type_name}</td>
             <td>{$client->location_name}</td>
             <td>{$client->clientCity}</td>
             <td  width="300">
                 {if $client->logos != ''}
                    {$client->logos}
                 {else}
                    {gt text="No té espais actius"}
                 {/if}
             </td>
         </tr>
         {foreachelse}
         <tr>
             <td colspan="5" align="left">
                 {gt text="No s'han trobat espais"}
             </td>
         </tr>
         {/foreach}
        </tbody>
    </table>