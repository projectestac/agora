{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Operació"}</h2>
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
    {gt text="Espais on s'executa"} [{$serviceName}]
    {if $which eq "all"}
    {gt text="Tots"}
    {else}
    <pre>
        {foreach item=client from=$clients}
            {$client.clientName}, {$client.clientCode}
        {/foreach}
    </pre>
    {/if}
    <form action="index.php?module=Agoraportal&type=admin&func=operations" method="POST">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}">
            <input name="service_sel" type="hidden" value={$service_sel} />
            {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$clients}
                <option value="{$client.clientId}" selected>{$client.clientId}</option>
                {/foreach}
            </select>
            {/if}
            {foreach key=paramkey item=param from=$params}
                <input type="hidden" name="parm_{$paramkey}" value="{$param}">
            {/foreach}
            <input type="hidden" name="actionselect" value="{$actionselect}">
        </div>
        {gt text="Esteu segurs?"}
        <input name="confirm_exe" value="{gt text='Sí'}" type="submit" />
        <input value="{gt text='No'}" type="submit" />
    </form>
</div>
