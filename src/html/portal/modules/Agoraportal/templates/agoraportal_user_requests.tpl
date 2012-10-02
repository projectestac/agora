{include file="agoraportal_user_menu.tpl" clientCode=$client.clientCode}
{ajaxheader modname=Agoraportal filename=Agoraportal.js}
{pageaddvar name='stylesheet' value='system/Admin/style/admin.css'}

<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='agt_family.png' set='icons/large'}</div>
    <h2>{gt text="Sol·licituds del centre"}&nbsp;{$client.clientName}</h2>
    <div class="z-form">
        <fieldset style="padding: 20px;">
            <legend>{gt text='Sol·licituds disponibles'}</legend>
            <form id="addRequest" name="addRequest" class="pn-adminform" action="{modurl modname='Agoraportal' type='user' func='addRequest'}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
                <input type="hidden" id="clientId" name="clientId" value="{$client.clientId}" />
                <input type="hidden" id="clientCode" name="clientCode" value="{$client.clientCode}" />

                {gt text="Sol·licitud"}
                <select id="requestFilter" name="requestFilter" onchange="javascript:showServices($('requestFilter').value);"> 
                    <option value="0">{gt text="Tria una sol·licitud"}</option>
                    {foreach item=type from=$types}
                    <option value="{$type.requestTypeId}">{$type.name}</option>
                    {/foreach}
                </select>

                <div id="menuservices" style="margin-top:10px;">
                </div>

                <div id="usermessage" style="margin-top:10px;">
                </div>


            </form>
        </fieldset>
    </div>

    {if not empty($requests)}
    <div class="z-form">
        <fieldset>
            <div>
                <table class="z-datatable"> 
                    <thead>
                        <tr>
                            <th>{gt text="Ha enviat"}</th>
                            <th>{gt text="Data"}</th>
                            <th>{gt text="Estat"}</th>
                            <th>{gt text="Tipus"}</th>
                            <th>{gt text="Servei"}</th>
                            <th>{gt text="Resposta dels administradors"}</th>
                            <th>{gt text="Darrera modificació"}</th>
                        </tr>
                    </thead> 
                    <tbody>
                        {foreach item=client from=$requests}
                        <tr class="{cycle values='z-odd,z-even'}" id="formRow_{$client.clientId}">
                            <td align="left" valign="top">{$client.username}</td>
                            <td align="left" valign="top">{$client.timeCreated|dateformat:"%d/%m/%Y"}</td>
                            <td align="left" valign="top">{$client.state}</td>
                            <td align="left" valign="top">{$client.type}</td>
                            <td align="left" valign="top">{$client.serviceName}</td>
                            <td align="left" valign="top">{$client.adminComments}</td>
                            <td align="left" valign="top">{$client.timeClosed|dateformat:"%d/%m/%Y"}</td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    {/if}
</div>
