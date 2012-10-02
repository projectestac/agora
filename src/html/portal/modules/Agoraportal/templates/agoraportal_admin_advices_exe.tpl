{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Avisos a "}{$serviceName}</h2>
    <form name="advicesForm" id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="POST">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}">
            {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$sqlClients}
                <option value="{$client.clientId}" selected>{$client.clientName}</option>
                {/foreach}
            </select>
            {/if}
            <textarea name="message">{$message}</textarea>
            <input type="hidden" name="only_admins"  value="{$only_admins}"/>
            <input type="hidden" name="date_start"  value="{$date_start}"/>
            <input type="hidden" name="date_stop" value="{$date_stop}"/>
            <input type="hidden" name="service_sel" value="{$service_sel}"/>
        </div>
        <input value="{gt text='Modifica l\'avís'}" type="submit" />
    </form>
    <br />
    {gt text="Missatge:"}
    <pre>
        {$message}
    </pre>
    {if $only_admins eq "1"}
    {gt text="Mostra només als administradors"}
    <br/>
    {/if}

    {if $which eq "all"}
    {gt text="S'executa a Tots"}<br/>
    {/if}

    <br/>
    <br/>
    {if $date_start eq 0}
    {gt text="Des d'ara"}<br/>
    {else}
    {gt text="Des de "}{$date_start}<br/>
    {/if}

    {if $date_stop eq 0}
    {gt text="Per sempre"}<br/>
    {else}
    {gt text="Fins "}{$date_stop}<br/>
    {/if}
    <br/>
    {gt text="Resultat:"}
    <div>
        {gt text="OK:"} {$ok}<br/>
        {gt text="Errors:"} {$error}
        <table class="z-datatable"><thead>
                <tr>
                    <th>{gt text="BD"}</th>
                    <th>{gt text="Client"}</th>
                    <th>{gt text="Missatges"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=client key=id from=$sqlClients}
                {if $success[$id]}
                <tr class="{cycle values="ok-odd,ok-even"}">
                    {else}
                <tr class="{cycle values="error-odd,error-even"}">
                    {/if}
                    <td><a href="#usu{$client.activedId}">usu{$client.activedId}</a></td>
                    <td><a target="_blank" href="../{$client.clientDNS}/{$serviceName}">{$client.clientName}</a></td>
                    <td>{$messages[$id]}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>