{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Envia avisos"}</h2>
    <br />
    {gt text="Missatge:"}
    <pre>
        {$message}
    </pre>
    {if $only_admins eq "1"}
    {gt text="Mostra només als administradors"}
    <br/>
    {/if}
    {if $service_sel eq "1"}
    {gt text="Intrawebs on s'executa"}
    {else}
    {gt text="Moodles on s'executa"}
    {/if}
    {if $which eq "all"}
    {gt text="Tots"}
    {else}
    <pre>
        {foreach item=client from=$sqlClients}
            {$client.clientName}, {$client.clientCode}
        {/foreach}
    </pre>
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
    <form id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="post">
        <div class="hidden">
            <input type="hidden" name="which" value="{$which}" />
            {if $which eq "selected"}
            <select name="clients_sel[]" multiple="multiple">
                {foreach item=client from=$sqlClients}
                <option value="{$client.clientId}" selected>{$client.clientId}</option>
                {/foreach}
            </select>
            {/if}
            <textarea name="message">{$message}</textarea>
            <input type="hidden" name="date_start"  value="{$date_start}"/>
            <input type="hidden" name="only_admins"  value="{$only_admins}"/>
            <input type="hidden" name="date_stop" value="{$date_stop}"/>
            <input type="hidden" name="service_sel" value="{$service_sel}"/>
        </div>
        {gt text="Esteu segurs?"}
        <input name="confirm" value="{gt text='Sí'}" type="submit" />
        <input value="{gt text='No'}" type="submit" />
    </form>
</div>
