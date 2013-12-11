{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-pageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Eines d'administració"}</h2>
    <div>{gt text="Nom client"}: <strong>{$client.clientName}</strong></div>
    <div>{gt text="Servei"}:</div>
    <div class="serviceImgAdmin">
        <img src="modules/Agoraportal/images/{$services[$client.serviceId].serviceName}.gif" />
    </div>
    {gt text="Accions disponibles:"}
    {if $services[$client.serviceId].serviceName == 'moodle' OR $services[$client.serviceId].serviceName == 'moodle2'}
    <ul>
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='1' clientServiceId=$client.clientServiceId}">
                {gt text="Crea o esborra l'usuari xtecadmin a Moodle"}
            </a>
        </li>
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='6' clientServiceId=$client.clientServiceId}">
                {gt text="Recalcula l'espai consumit"}
            </a>
        </li>
    </ul>
    {elseif $services[$client.serviceId].serviceName == 'intranet'}
    <ul>
        {* @aginard: Connection is no longer used. At the moment, only commented the code, but can be removed}
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='2' clientServiceId=$client.clientServiceId}">
                {gt text="Connecta la intranet amb el Moodle"}
            </a>
        </li>
        {*}
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='3' clientServiceId=$client.clientServiceId}">
                {gt text="Crea o esborra l'usuari xtecadmin a la intranet"}
            </a>
        </li>
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='4' clientServiceId=$client.clientServiceId}">
                {gt text="Crea el primer permí­s d'administració"}
            </a>
        </li>
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='5' clientServiceId=$client.clientServiceId}">
                {gt text="Desactiva tots els blocs del portal (només fer-ho en cas de necessitat extrema)"}
            </a>
        </li>
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='serviceTools' action='7' clientServiceId=$client.clientServiceId}">
                {gt text="Recalcula l'espai consumit"}
            </a>
        </li>
    </ul>
    {else}
    <div>
        {gt text="No s'han trobat eines disponibles."}
    </div>
    {/if}
    <div class="z-warningmsg">
        {gt text="ATENCIÓ: No es demana confirmació per portar a terme les accions de la llista."}
    </div>
</div>