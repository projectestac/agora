<div class="pager">{$sitesNumber} {gt text="centre/s"} {if $pager neq ''}-{/if} {$pager}</div>
<table class="z-datatable">
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
        {foreach item=client from=$sites}
        <tr class="{cycle values="z-odd,z-even"}" id="formRow_{$client.clientId}">
            <td align="left" valign="top">
                 {$client.clientName}
                 {if $client.educat eq 1}
                 <div>
                     <img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle" />
                 </div>
                 {/if}
             </td>
             <td align="left" valign="top">
                 {if $client.typeId > 0}
                 {$types[$client.typeId].typeName}
                 {/if}
             </td>
             <td align="left" valign="top">
                 {if $client.locationId > 0}
                 {$locations[$client.locationId].locationName}
                 {/if}
             </td>
             <td align="left" valign="top">
                 {$client.clientCity}
             </td>
             <td align="left" valign="top" width="300">
                 {if $client.logos != ''}
                 {$client.logos}
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