<div class="pager">{$clientsNumber} {gt text="Serveis"} - {$pager}</div>
<table class="z-datatable">
    <thead>
        <tr>
            <th>{gt text="BD"}</th>
            <th>{gt text="Nom client"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Servei"}</th>
            <th>{gt text="Municipi i SSTT"}</th>
            <th>{gt text="Ha Enviat"}</th>
            <th>{gt text="Observacions"}</th>
            <th>{gt text="Data"}</th>
            <th>{gt text="Consum"}</th>
            <th>{gt text="Estat"}</th>
            <th>{gt text="Opcions"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=client from=$clients}
        <tr class="{cycle values="z-odd,z-even"}" id="formRow_{$client.clientId}">
            <td align="left" valign="top" class="id">
                 {$client.activedId}
             </td>
             <td align="left" valign="top" class="codeandname">
                 <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client.clientCode}">{$client.clientName}</a>
                 {if $client.state eq 1 && $services[$client.serviceId].serviceName neq 'marsupial'}
                 (<a href="{$client.clientDNS|serviceLink:$services[$client.serviceId].serviceName}" target="_blank">{gt text="Entra-hi"}</a> -
                 <a href="{modurl modname='Agoraportal' type='admin' func='listDataDirs' serviceName=$services[$client.serviceId].serviceName activedId=$client.activedId}">{gt text="Fitxers"}</a>)
                 {/if}
                 <br />
                 {$client.clientDNS} - {$client.clientCode}
             </td>
             <td align="left" valign="top" class="schooltype">
                 {if isset($types[$client.typeId].typeName)}
                 {$types[$client.typeId].typeName}
                 {/if}
                 {if $client.extraFunc neq ''}
                 <div>
                     {$client.extraFunc}
                 </div>
                 {/if}
                 {if $client.educat eq 1}
                 <div style="float: right;">
                     <img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/>
                 </div>
                 {/if}
             </td>
             <td align="left" valign="top" class="service">
                 <img src="modules/Agoraportal/images/{$services[$client.serviceId].serviceName}.gif" alt="{$services[$client.serviceId].serviceName}" title="{$services[$client.serviceId].serviceName}" />
                 {if $client.haveMoodle eq 1}
                 <div>
                     {gt text="Té Moodle"}
                 </div>
                 {/if}
             </td>
             <td align="left" valign="top" class="location">
                 {$client.clientCity}
                 {if isset($locations[$client.locationId].locationName)}
                 <div>
                     {$locations[$client.locationId].locationName}
                 </div>
                 {/if}
             </td>
             <td align="left" valign="top" class="contact">
                 {$client.contactName}
                 <br />
                 {$client.contactProfile}
             </td>
             <td valign="top" class="observs">
                 {$client.observations|nl2br}
                 {if $client.annotations neq ''}
                 <div class="z-form">
                 <fieldset class="adminNotes">
                     <legend>{gt text="Anotacions"}</legend>
                     {$client.annotations|nl2br}
                 </fieldset>
                 </div>
                 {/if}
             </td>
             <td width="100" class="time">
                 <span class="timeLetter" title="Data d'edició">{gt text="e"}</span>: {$client.timeEdited|dateformat:"%d/%m/%Y"}
                 <br />
                 <span class="timeLetter" title="Data de creació">{gt text="c"}</span>: {$client.timeCreated|dateformat:"%d/%m/%Y"}
                 <br />
                 <span class="timeLetter" title="Data de sol·licitud">{gt text="s"}</span>: {$client.timeRequested|dateformat:"%d/%m/%Y"}
             </td>
             <td style="background-color: {$client.diskConsumeCellColor}; width: 70px; text-align:right;" class="diskusage">
                 {if $client.diskSpace gt 0}
                 {$client.diskSpace} MB
                 <br />
                 {$client.diskConsume} MB
                 <br />
                 {$client.diskConsumePerCent} %
                 {/if}
             </td>
             <td align="left" valign="top" width="100" class="state">
                 {if $client.state eq 0}
                 <span class="toCheck">
                 {gt text="Per revisar"}
                </span>
                {elseif $client.state eq 1}
                <span class="actived">
                    {gt text="Actiu"}
                </span>
                {elseif $client.state eq -2}
                <span class="denegated">
                    {gt text="Denegat"}
                </span>
                {elseif $client.state eq -3}
                <span class="denegated">
                    {gt text="Donat de baixa"}
                </span>
                {elseif $client.state eq -4}
                <span class="denegated">
                    {gt text="Desactivat"}
                </span>
                {else}
                {gt text="No s'ha trobat"}
                {/if}
            </td>
            <td valign="top" align="center" width="70" class="actions">
                <div style="float:left; padding:3px;">
                    <a href="{modurl modname='Agoraportal' type='admin' func='editService' clientServiceId=$client.clientServiceId}">
                        {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edita" __title="Edita"}
                    </a>
                </div>
                <div style="float:left; padding:3px;">
                    <a href="{modurl modname='Agoraportal' type='admin' func='deleteService' clientServiceId=$client.clientServiceId}">
                        {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                    </a>
                </div>
                <div style="float:left; padding:3px;">
                    <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' clientServiceId=$client.clientServiceId}">
                        {img modname='core' src='configure.png' set='icons/extrasmall' __alt="Eines" __title="Eines"}
                    </a>
                </div>
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="5" align="left">
                {gt text="No s'han trobat serveis"}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>