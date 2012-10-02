{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-pageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Serveis disponibles"}</h2>
    <form name="servicesList" id="servicesList">
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="Id"}</th>
                    <th>{gt text="Nom"}</th>
                    <th>{gt text="Descripció"}</th>
                    <th>{gt text="Versió"}</th>
                    <th>{gt text="Prefix de la base de dades"}</th>
                    <th>{gt text="Clients permesos*"}</th>
                    <th>{gt text="Directori base"}</th>
                    <th>{gt text="Espai disc"}</th>
                    <th>{gt text="Opcions"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=service from=$services}
                <tr class="{cycle values='z-odd,z-even'}" id="service{$service.serviceId}">
                    <td align="left" valign="top">
                        {$service.serviceId}
                    </td>
                    <td align="left" valign="top">
                        {$service.serviceName}
                    </td>
                    <td align="left" valign="top">
                        {$service.description}
                    </td>
                    <td>
                        {$service.version}
                    </td>
                    <td>
                        {$service.tablesPrefix}
                    </td>
                    <td>
                        {$service.allowedClients}
                    </td>
                    <td {if $service.serverFolder neq ''}style="background-color: {if $service.validFolder}#00AA00{else}#AA0000{/if};"{/if}>
                        {$service.serverFolder}
                </td>
                <td>
                    {$service.defaultDiskSpace}
                </td>	
                <td align="center">
                    <a href="javascript: editService({$service.serviceId})">
                        {img modname='core' src='edit.png' set='icons/extrasmall'   __alt="Edita" __title="Edita"}
                    </a>
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
</form>
<div class="z-informationmsg">
    {gt text="* Codi dels clients separats per coma. En blanc no hi ha restriccions"}
</div>
</div>