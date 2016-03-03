{include file="agoraportal_user_menu.tpl"}

{if $noclient}
    <div class="container-fluid">
        {gt text="Aquest usuari no està associat a cap codi de centre"}
    </div>
{else}
    <div class="container-fluid">
        <h3>{gt text="Serveis del centre"}&nbsp;{$client->clientName}</h3>

        {if $managers eq 0}
        <div class="alert alert-warning">
            {gt text="Des del curs 2011/2012, només poden sol·licitar serveis a Àgora i/o gestionar els ja existents (pujada de fitxers grans, consulta de la quota de disc consumida, ...) les persones físiques (gestors) que el centre hagi autoritzat. En aquests moments, el vostre centre encara no disposa de cap gestor, així que cal que en designeu un des de l'apartat <a href=index.php?module=Agoraportal&func=managers>Gestors</a>. Amb el codi de centre, podeu afegir i treure gestors, fins a un màxim de quatre, però no podeu gestionar els serveis d'Àgora."}
        </div>
        {/if}

        {foreach item=service key=serviceid from=$services}
            {assign var="servicetype" value=$servicetypes[$serviceid]}
            {include file="agoraportal_user_serviceInfo.tpl"}
        {foreachelse}
            {if $managers|@count gt 0}
                <div class="alert alert-info">
                    {gt text="No s'han trobat serveis."}
                    {if $accessLevel neq 'manager'}
                        <br/>
                        {gt text="Recordeu que només poden sol·licitar l'alta als serveis d'Àgora els <a href=index.php?module=Agoraportal&func=managers>Gestors</a>."}
                    {/if}
                </div>
            {/if}
        {/foreach}

        {if ($accessLevel eq 'manager' or $accessLevel eq 'admin') and $notsolicitedServices|@count gt 0}
            <h4>{gt text="Altres serveis disponibles"}</h4>
            <div class="serviceInfo">
            {foreach item=service from=$notsolicitedServices}
                {assign var="serviceName" value=$service->serviceName}
                <div style="margin-bottom: 10px;">
                        <a class="btn btn-default" href="{modurl modname='Agoraportal' type='user' func='askServices' serviceId=$service->serviceId clientCode=$client->clientCode}" role="button" style="padding:10px; line-height:25px;">
                            <div style="float:left; min-width:80px; margin-right: 3px;">
                            <img src="modules/Agoraportal/images/{$serviceName}.gif" alt="{$serviceName|capitalize}" title="{$serviceName|capitalize}" style="height: initial; width: initial;"/></div>
                            Sol·licita'l ara
                        </a>
                    <strong>{$serviceName|capitalize}</strong>: {$service->description}
                </div>
            {/foreach}
            </div>
        {/if}

        {if $newDNS}
        <div class="alert alert-info">
            <form name="changeDNS" id="changeDNS" class="z-adminform" action="{modurl modname='Agoraportal' type='user' func='changeDNS'}" method="post">
                <p>El nom propi del vostre centre ha canviat, però els serveis d'Àgora encara utilitzen el nom propi antic.
                L'actual és <strong>{$client->clientDNS}</strong> i el nom nou és <strong>{$newDNS}</strong>.</p>
                <p>No cal que feu el canvi de nom propi ara però, si el voleu fer, heu de tenir en compte que pot afectar a alguns enllaços interns, tant en el cas del Moodle com en el del Nodes, i no es pot desfer.
                Un cop fet el canvi, si passats 30 minuts detecteu alguna anomalia us recomanem que contacteu amb l'equip d'Àgora, <a target="_blank" href="http://agora.xtec.cat/">via fòrum</a>, per tal de que corregim els enllaços.</p>
                <p>Voleu fer aquest canvi?</p>
                <input type="hidden" name="clientCode" value="{$client->clientCode}" />
                <input type="hidden" name="clientDNS" value="{$newDNS}" />
                <input type="hidden" name="clientOldDNS" value="{$client->clientDNS}" />
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text='Sí, vull fer el canvi ara'}</button>
            </form>
        </div>
        {/if}
    </div>
{/if}
