{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Configura"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" name="config" id="config" action="{modurl modname='Agoraportal' type='admin' func='updateConfig'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <div class="z-formrow">
            <label for="siteBaseURL">{gt text="Adreça base"}</label>
            <input type="text" name="siteBaseURL" size="50" maxlength="150" value="{$siteBaseURL}" />
        </div>

        <div class="z-formrow">
            <label for="allowedIpsForCalcDisckConsume">{gt text="IP des de les quals es pot executar el càlcul d'espai de disc consumit"}</label>
            <textarea name="allowedIpsForCalcDisckConsume" style="width: 500px" rows="3">{$allowedIpsForCalcDisckConsume}</textarea>
            <div class="z-informationmsg z-formnote">
                {gt text="Separar la llista d'IP per comes."}
            </div>
        </div>
        <div class="z-formrow">
            <label for="warningMailsTo">{gt text="Adreces de correu a on s'han d'enviar els missatges relatius al consum del disc"}</label>
            <textarea name="warningMailsTo" style="width: 500px" rows="3">{$warningMailsTo}</textarea>
            <div class="z-informationmsg z-formnote">
                {gt text="Separar la llista d'IP per comes."}
            </div>
        </div>    
        <div class="z-formrow">
            <label for="requestMailsTo">{gt text="Adreces de correu on s'ha d'avisar en cas de sol·licituds d'augment d'espai de disc"}</label>
            <textarea name="requestMailsTo" style="width: 500px" rows="3">{$requestMailsTo}</textarea>
            <div class="z-informationmsg z-formnote">
                {gt text="Separar la llista d'IP per comes."}
            </div>
        </div> 
        <div class="z-formrow">
            <label for="diskRequestThreshold">{gt text="Ocupació a partir de la qual es pot demanar ampliació de quota (%)"}</label>
            <input type="text" name="diskRequestThreshold" size="10" maxlength="50" value="{$diskRequestThreshold}" />
        </div>
        <div class="z-formrow">
            <label for="maxFreeQuotaForRequest">{gt text="Quota lliure màxima per poder demanar ampliació de quota (MB)"}</label>
            <input type="text" name="maxFreeQuotaForRequest" size="10" maxlength="50" value="{$maxFreeQuotaForRequest}" />
        </div> 
        <div class="z-formrow">
            <label for="clientsMailThreshold">{gt text="Ocupació a partir de la qual s'avisa per correu electrònic als clients (%)"}</label>
            <input type="text" name="clientsMailThreshold" size="10" maxlength="50" value="{$clientsMailThreshold}" />
        </div> 
        <div class="z-formrow">
            <label for="maxAbsFreeQuota">{gt text="Quota lliure màxima per a que s'avisi per correu electrònic als clients (MB)"}</label>
            <input type="text" name="maxAbsFreeQuota" size="10" maxlength="50" value="{$maxAbsFreeQuota}" />
        </div> 
        <div class="z-formrow">
            <label for="locations">{gt text="Tipus de sol·licituds"}</label>
            <table class="z-datatable" style="width: 400px">
                <tbody>
                    {foreach item=type from=$requesttypes}
                    <tr class="{cycle values="z-odd,z-even"}">
                        <td>
                             {$type.name}
                         </td>
                         <td align="center">
                             <a href="{modurl modname='Agoraportal' type='admin' func='editRequestType' requestTypeId=$type.requestTypeId}">
                                {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edita" __title="Edita"}
                         </a>
                         <a href="{modurl modname='Agoraportal' type='admin' func='deleteRequestType' requestTypeId=$type.requestTypeId}">
                             {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                         </a>
                     </td>
                    </tr>
                    {foreachelse}
                    <tr>
                        <td colspan="10">
                            {gt text="No s'han trobat tipus de Sol·licituds"}
                        </td>
                    </tr>
                    {/foreach}
                    <tr>
                        <td colspan="2">
                            <hr />
                            <a href="{modurl modname='Agoraportal' type='admin' func='addNewRequestType'}">
                                {gt text="Afegeix un nou tipus de sol·licitud"}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="z-formrow">
            <label for="locations">{gt text="Serveis de les sol·licituds"}</label>
            <table class="z-datatable" style="width: 400px">
                    <tbody>
                        <tr>
                            <td>
                                <strong>{gt text="Tipus de sol·licitud"}</strong>
                            </td>
                            <td>
                                <strong>{gt text="Servei"}</strong>
                            </td>
                        </tr>
                        {foreach item=types from=$requesttypesservices}
                        <tr class="{cycle values="z-odd,z-even"}">
                            <td>
                                {$types.type}
                            </td>
                            <td>
                                {$types.serviceName}
                            </td>
                            <td align="center">
                                <a href="{modurl modname='Agoraportal' type='admin' func='deleteRequestTypeService' requestTypeId=$types.requestTypeId serviceId=$types.serviceId}">
                                    {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                                </a>
                            </td>
                        </tr>
                        {foreachelse}
                        <tr>
                            <td colspan="10">
                                {gt text="No s'han trobat serveis assignats a Sol·licituds"}
                            </td>
                        </tr>
                        {/foreach}
                        <tr>
                            <td colspan="3">
                                <hr />
                                <a href="{modurl modname='Agoraportal' type='admin' func='addNewRequestTypeService'}">
                                    {gt text="Afegeix un servei nou al tipus de sol·licitud"}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="z-formrow">
                <label for="allowedAccessRequest">{gt text="Permet que els usuaris puguin sol·licitar accés als centres"}</label>
                <input type="checkbox" name="allowedAccessRequest" {if $allowedAccessRequest}checked{/if} value="1" />
            </div>
            <div class="z-formrow">
                <label for="tempFolder">{gt text="Carpeta temporal del servidor"}</label>
                <input type="text" name="tempFolder" size="50" maxlength="50" value="{$tempFolder}" />
            </div>
            <div class="z-formrow">
                <label for="sqlSecurityCode">{gt text="Codi de seguretat per a les crides SQL"}</label>
                <input type="text" name="sqlSecurityCode" size="50" maxlength="50" value="{$sqlSecurityCode}" />
            </div>
            <div class="z-formrow">
                <label for="allowedUsersAdministration">{gt text="Centres que tenen accés a la gestió d'usuaris"}</label>
                <textarea name="allowedUsersAdministration" style="width: 300px" rows="7">{$allowedUsersAdministration}</textarea>
                <div class="z-informationmsg">
                    {gt text="Separar la llista de codis dels clients per comes. El símbol * significa que tots els clients tenen accés a la gestió dels usuaris."}
                </div>
            </div>
            <div class="z-formrow">
                <label for="locations">{gt text="Serveis Territorials"}</label>
                <table class="z-datatable" style="width: 400px">
                    <tbody>
                        {foreach item=location from=$locations}
                        <tr class="{cycle values="z-odd,z-even"}">
                            <td>
                                {$location.locationName}
                            </td>
                            <td align="center">
                                <a href="{modurl modname='Agoraportal' type='admin' func='editLocation' locationId=$location.locationId}">
                                    {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edita" __title="Edita"}
                                </a>
                                <a href="{modurl modname='Agoraportal' type='admin' func='deleteLocation' locationId=$location.locationId}">
                                    {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                                </a>
                            </td>
                        </tr>
                        {foreachelse}
                        <tr>
                            <td colspan="10">
                                {gt text="No s'han trobat SSTT"}
                            </td>
                        </tr>
                        {/foreach}
                        <tr>
                            <td colspan="2">
                                <hr />
                                <a href="{modurl modname='Agoraportal' type='admin' func='addNewLocation'}">
                                    {gt text="Afegeix un Servei Territorial nou"}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="z-formrow">
                <label for="types">{gt text="Tipologies de centres"}</label>
                <table class="z-datatable" style="width: 400px;">
                <tbody>
                    {foreach item=schooltype from=$schooltypes}
                    <tr class="{cycle values="z-odd,z-even"}" id="formRow_{$schooltype.typeId}">
                        <td>
                            {$schooltype.typeName}
                        </td>
                        <td align="center">
                            <a href="{modurl modname='Agoraportal' type='admin' func='editType' typeId=$schooltype.typeId}">
                                {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edita" __title="Edita"}
                            </a>
                            <a href="{modurl modname='Agoraportal' type='admin' func='deleteType' typeId=$schooltype.typeId}">
                                {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
                            </a>
                        </td>
                    </tr>
                    {foreachelse}
                    <tr>
                        <td colspan="10">
                            {gt text="No s'han trobat tipologies de centres"}
                        </td>
                    </tr>
                    {/foreach}
                    <tr>
                        <td colspan="2">
                            <hr />
                            <a href="{modurl modname='Agoraportal' type='admin' func='addNewType'}">
                                {gt text="Afegeix una tipologia de centre nova"}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="z-formrow">
            <label for="serveradr">{gt text="Adreça del servidor"}</label>
            <input id="serveradr" name="serveradr" size="40" value="{$serveradr}" type="text">
        </div>
        <div class="z-formrow">
            <label for="serverport">{gt text="Port"}</label>
            <input id="serverport" name="serverport" size="40" value="{$serverport}" type="text">
        </div>
        <div class="z-formrow">
            <label for="basedn">{gt text="Base DN"}</label>
            <input id="basedn" name="basedn" size="40" value="{$basedn}" type="text">
        </div>
        <div class="z-formrow">
            <label for="bindas">{gt text="Nom de l'enllaç"}</label>
            <input id="bindas" name="bindas" size="40" value="{$bindas}" type="text">
        </div>
        <div class="z-formrow">
            <label for="bindpass">{gt text="Contrasenya de l'enllaç"}</label>
            <input id="bindpass" name="bindpass" size="40" value="{$bindpass}" type="text">
        </div>
        <div class="z-formrow">
            <label for="searchdn">{gt text="Base de cerca"}</label>
            <input id="searchdn" name="searchdn" size="40" value="{$searchdn}" type="text">
        </div>
        <div class="z-center">
            <div class="z-buttons">
                <a title="Modifica la configuració" onClick="javascript:sendConfig()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Modifica la configuració"}
                </a>
            </div>
        </div>
    </form>
</div>