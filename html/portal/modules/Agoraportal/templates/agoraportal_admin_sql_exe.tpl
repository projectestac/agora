{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Executa una SQL a "}{$serviceName}</h2>
    <form name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}">
            <input name="service_sel" type="hidden" value={$service_sel} />
            {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$sqlClients}
                <option value="{$client.clientId}" SELECTED>{$client.clientName}</option>
                {/foreach}
            </select>
            {/if}
            <textarea name="sqlfunction">{$sqlfunc}</textarea>
        </div>
        <input value="{gt text='Modifica la consulta'}" type="submit" />
    </form>

    <br />
    {gt text="Funció a executar:"}
    <pre>
        {$sqlfunc}
    </pre>

    {if $which eq "all"}
    {gt text="S'executa a Tots"}<br/>
    {/if}

    {gt text="Resultat:"}
    {if $messages_recount|@count}
    <div>
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="Missatge"}</th>
                    <th>{gt text="Recompte"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=number key=name from=$messages_recount}
                <tr class="{cycle values='z-odd,z-even'}">
                    <td>{$name}</td>
                    <td>{$number}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    {/if}

    <div>
        <table class="z-datatable"><thead>
                <tr>
                    <th>{gt text="BD"}</th>
                    <th>{gt text="Client"}</th>
                    <th>{gt text="Missatge/Línies"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=client key=id from=$sqlClients}
                {if $success[$id]}
                <tr class="{cycle values='ok-odd,ok-even'}">
                    {else}
                <tr class="{cycle values='error-odd,error-even'}">
                    {/if}
                    <td>
                        <a href="#{$prefix}{$client.activedId}">{$prefix}{$client.activedId}</a>
                    </td>
                    <td>
                        <a target="_blank" href="../{$client.clientDNS}/{$serviceName}">{$client.clientName}</a>
                    </td>
                    <td>{$messages[$id]}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

    {foreach item=result key=id from=$results}
    <div>
        <h2>
            <a name="{$prefix}{$sqlClients[$id].activedId}" target="_blank" href="../{$sqlClients[$id].clientDNS}/{$serviceName}">{$prefix}{$sqlClients[$id].activedId}  {$sqlClients[$id].clientName}</a>
        </h2>
        <table class="z-datatable"><thead>
                {foreach item=line key=columna from=$result}
                <tr class="{cycle values='z-odd,z-even'}">
                    {foreach item=field key=camp from=$line}
                    {if $columna eq 0}<th>{else}<td>{/if}
                        {$field}
                        {if $columna eq 0}</th>{else}</td>{/if}
                    {/foreach}
                </tr>
                {if $columna eq 0}</thead><tbody>{/if}
                {/foreach}
            </tbody></table>
    </div>
    {/foreach}
</div>
