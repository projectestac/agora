{include file="agoraportal_user_menu.tpl"}
<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Serveis del centre"}&nbsp;{$client.clientName}</h2>
    {if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
    {/if}
    <div style="height:15px;">&nbsp;</div>
    {if $managers eq 0}
    <div class="z-warningmsg" style="clear:both;">
        {gt text="A partir del curs 2011/2012, només podran sol·licitar serveis a Àgora i/o gestionar els ja existents (pujada de fitxers grans, consulta de la quota de disc consumida, ...) les persones físiques (gestors) que el centre hagi autoritzat. En aquests moments, el vostre centre encara no disposa de cap gestor/a, així que cal que en designeu un/a des de l'apartat <a href=index.php?module=Agoraportal&func=managers>Gestors</a>. Amb el codi de centre, podeu designar un únic gestor/a, el qual en podrà designar 2 més, fins a un total de 3."}
    </div>
    {/if}
    {foreach item=client from=$clientArray}
    <div class="serviceInfo z-form">
        <fieldset>
            <legend>
                <img src="modules/Agoraportal/images/{$services[$client.serviceId].serviceName}.gif" alt="{$services[$client.serviceId].serviceName}" title="{$services[$client.serviceId].serviceName}" />
            </legend>
            <div>
            <strong>{$services[$client.serviceId].serviceName}</strong>
            </div>
            <div>
            {gt text="Ha fet la sol·licitud"}: {$client.contactName} ({$client.contactMail})
            </div>
            {if $client.state eq 0}
            <span class="toCheck">{gt text="Servei pendent d'activació"}</span>
            {elseif $client.state eq -2}
            <span class="denegated">{gt text="Sol·licitud denegada"}</span>
            {elseif $client.state eq -3}
            {if $client.observations neq ''}
            <div class="denegated">
                {$client.observations|nl2br}
            </div>
            {/if}
            {elseif $client.state eq 1}
            {if $services[$client.serviceId].serviceName neq 'marsupial'}
            {gt text="Accés"}: <a href="{$client.clientCode|serviceLink:$services[$client.serviceId].serviceName:$client.clientDNS:$client.clientCode}" target="_blank">{$client.clientCode|serviceLink:$services[$client.serviceId].serviceName:$client.clientDNS:$client.clientCode}</a>
            <br />
            {/if}
            {gt text="Data d'activació"}: {$client.timeCreated|dateformat:"%d/%m/%Y"}
            {if $client.usageArray.maxDiskSpace gt 0}
            <br />
            <div style="float:left; margin:0px;">{gt text="Espai de disc ocupat:"}&nbsp;</div>
            <div style="float:left; margin:0px; width:{$client.usageArray.widthUsage}px; background:url(modules/Agoraportal/images/usage.gif);">&nbsp;</div>
            <div style="float:left; margin:0px;">&nbsp;{$client.usageArray.percentage}%</div>
            <div style="float:left; margin:0px;">&nbsp;&nbsp;({$client.usageArray.usedDiskSpace}MB / {$client.usageArray.totalDiskSpace}MB) <a href="{modurl modname='Agoraportal' type='user' func='recalcConsume' clientServiceId=$client.clientServiceId}">{gt text="Actualitza"}</a></div>
            {if $client.usageArray.alert eq 1}
            <div style="float:left; margin:0px;">&nbsp;&nbsp;
                <a href="{modurl modname='Agoraportal' type='user' func='requests' clientCode=$client.clientCode}">
                    {gt text="Sol·licita més espai"}
                </a>
            </div>
            {/if}          
            {/if}
            <br />
            {/if}
        </fieldset>
    </div>
    {foreachelse}
    {if $managers|@count gt 0}
    {gt text="No s'han trobat serveis.<br/><br/>"}
    {if $accessLevel eq 'add'}
    <div class="z-informationmsg">
        {gt text="Per donar d'alta algun dels serveis que ofereix Àgora, accediu a l'apartat <a href=index.php?module=Agoraportal&func=askServices>Sol·licitud de serveis</a>."}
    </div>
    {else}
    <div class="z-informationmsg">
        {gt text="Recordeu que només poden sol·licitar l'alta als serveis d'Àgora els <a href=index.php?module=Agoraportal&func=managers>Gestors</a>."}    
    </div>
    {/if}
    {/if}
    {/foreach}

    {if $accessLevel eq 'add' and isset($askServices)}
    <div class="z-informationmsg">
        {gt text="Podeu donar d'alta altres serveis d'Àgora que també us interessin si accediu a l'apartat <a href=index.php?module=Agoraportal&func=askServices>Sol·licitud de serveis</a>."}
    </div>
    {/if}

    {if $clientOldDNS neq $clientDNS and $clientDNS neq ''}
    <div class="z-informationmsg" style="clear:both;">
        <form name="changeDNS" id="changeDNS" class="z-adminform" action="{modurl modname='Agoraportal' type='user' func='changeDNS'}" method="post">
            {gt text="El nom propi del vostre centre ha canviat, però els serveis d'Àgora encara utilitzen el nom propi antic. "}
            {gt text="L'actual és <strong>$clientOldDNS</strong> i el nom nou és <strong>$clientDNS</strong>. "}
            {gt text="No cal que feu el canvi de nom propi ara però, si el voleu fer, heu de tenir en compte que pot afectar a alguns enllaços interns, tant del moodle com de la intranet, i no es pot desfer. En cas de que algun enllaç deixi de funcionar, l'haureu d'editar per corregir l'URL."}
            <br /><br />
            {gt text="Voleu fer aquest canvi?"}
            <br /><br />
            <input type="hidden" name="clientCode" value="{$clientCode}" />
            <input type="hidden" name="clientDNS" value="{$clientDNS}" />
            <input type="hidden" name="clientOldDNS" value="{$clientOldDNS}" />
            <input type="submit" value="{gt text='Sí, vull fer el canvi ara'}" />
        </form>
    </div>
    {/if}
</div>