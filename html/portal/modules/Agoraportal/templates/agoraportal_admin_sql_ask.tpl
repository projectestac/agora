{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Executa una SQL"}</h2>
    <br />
    {gt text="Funció a executar:"}
    <pre>
        {$sqlfunc}
    </pre>
    {gt text="Espais on s'executa"} [{$serviceName}]
    {if $which eq "all"}
    {gt text="Tots"}
    {else}
    <pre>
        {foreach item=client from=$sqlClients}
            {$client.clientName}, {$client.clientCode}
        {/foreach}
    </pre>
    {/if}
    <form name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}">
            <input name="service_sel" type="hidden" value={$service_sel} />
            {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$sqlClients}
                <option value="{$client.clientId}" selected>{$client.clientId}</option>
                {/foreach}
            </select>
            {/if}
            <textarea name="sqlfunction">{$sqlfunc}</textarea>
        </div>
        {gt text="Esteu segurs?"}
        <input name="confirm" value="{gt text='Sí'}" type="submit" />
        <input value="{gt text='No'}" type="submit" />
    </form>
</div>
