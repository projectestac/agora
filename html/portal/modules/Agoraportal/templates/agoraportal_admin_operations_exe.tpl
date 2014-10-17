{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Operacio a "}{$serviceName}</h2>
       <br />
    {gt text="Operació a executar:"}
    <pre>
        {$actionselect}
    </pre>
    {gt text="Paràmetres de la operació:"}
    <ul>
    {foreach key=paramkey item=param from=$params}
        <li><strong>{$paramkey}</strong> = {$param}</li>
    {/foreach}
    </ul>

    {if $which eq "all"}
    {gt text="S'executa a Tots"}<br/>
    {/if}

    {gt text="Resultat:"}
    <div>
        <table class="z-datatable"><thead>
                <tr>
                    <th>{gt text="Usu"}</th>
                    <th>{gt text="Client"}</th>
                    <th>{gt text="Missatge"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=client key=id from=$clients}
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
            <a name="{$prefix}{$clients[$id].activedId}" target="_blank" href="../{$clients[$id].clientDNS}/{$serviceName}">{$prefix}{$clients[$id].activedId}  {$clients[$id].clientName}</a>
        </h2>
        {$result}
    {/foreach}
</div>
