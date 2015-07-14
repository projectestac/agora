
<p style="margin-left:10px;">Benvolgut/da.,</p>

{if $service->state eq 1}
    <p>
        S'ha activat el servei <strong>{$servicetype->serviceName}</strong> per al
        centre <strong>{$client->clientName}</strong> dins de l'espai
        <a href="{$baseURL}">Àgora</a> de la XTEC.
    </p>
    
    {if $servicetype->serviceName eq 'moodle2'}
        {assign var='serviceName4User' value='moodle'}
    {else}
        {assign var='serviceName4User' value=$servicetype->serviceName}
    {/if}
    
    <p>
        Podeu accedir al vostre espai <strong>{$serviceName4User}</strong> des de
        l'URL <a href="{$service->url}">{$service->url}</a>
        amb l'usuari <strong>admin</strong> i la contrasenya <strong>{$password}</strong>.
        Us recomanem que canvieu la contrasenya d'aquest usuari després
        del primer accés al servei. Dins del vostre espai s'ha creat,
        també, l'usuari <strong>xtecadmin</strong> que s'utilitzarà en cas 
        que hi hagi alguna incidència que requereixi un suport especial.
        Us preguem que no l'esborreu ni li canvieu la contrasenya.
    </p>

    {if $servicetype->serviceName eq 'moodle2'}
    <p>
        Per resoldre qualsevol dubte o problema relacionat amb aquest servei, teniu 
        a la vostra disposició el <a href="{$servicetype->support_url}">fòrum 
        d'Àgora-moodle</a>, a on hi podeu escriure preguntes, 
        sol·licitar ajuda o plantejar suggeriments.
    </p>
    <p>
        Per resoldre dubtes sobre el funcionament general del Moodle us podeu 
        adreçar també als fòrums en català
        de <a href="http://moodle.org/course/view.php?id=39">Moodle.org</a>.
    </p>
    <p>
        Teniu a la vostra disposició els  
        <a href="http://ateneu.xtec.cat/wikiform/wikiexport/cmd/tac/moodle2/index">
        materials de suport als cursos telemàtics</a> sobre Moodle, 
        on trobareu un conjunt important d'informació sobre l'ús 
        d'aquesta plataforma d'aprenentatge.
    </p>
    {elseif $servicetype->serviceName eq 'intranet'}
    <p>
        Tal com s'especifica a les condicions d'ús del servei, 
        recordeu que a la XTEC no hi ha cap figura destinada a solucionar les
        qüestions plantejades en relació al funcionament de la 
        intranet. Per tal de resoldre els dubtes relacionats amb aquest tema
        podeu adreçar-vos als  <a href="{$servicetype->support_url}">fòrums 
        del projecte Intraweb</a>. En aquest fòrum tothom pot preguntar 
        i respondre les qüestions que consideri oportunes.
    </p>
    <p>
        Teniu a la vostra disposició els materials del 
        <a href="http://ateneu.xtec.cat/wikiform/wikiexport/cursos/gestio_centres/d134/index">curs
        de formació sobre l'administració de la intranet</a> a on hi 
        trobareu un conjunt important d'informació sobre l'ús 
        d'aquesta plataforma.
    </p>
    {elseif $servicetype->serviceName eq 'nodes'}
    <p>
        Tal com s'especifica a les condicions d'ús del servei, 
        recordeu que a la XTEC no hi ha cap figura destinada a solucionar les
        qüestions plantejades en relació al funcionament del 
        WordPress. Per tal de resoldre els dubtes relacionats amb aquest tema
        podeu adreçar-vos al <a href="{$servicetype->support_url}">
        fòrum del projecte Nodes</a>. En aquest fòrum tothom pot preguntar 
        i respondre les qüestions que consideri oportunes.
    </p>
    <p>
        Teniu a la vostra disposició una <a href="http://agora.xtec.cat/nodes/guia-rapida/">
        guia ràpida</a> sobre Nodes, on trobareu els primers passos a seguir 
        quan accediu per primer cop al vostre web de centre.
    </p>
    {/if}

    <p>
        Des del <a href="{$baseURL}">portal de suport d'Àgora</a> s'informarà 
        de les novetats relacionades amb el projecte (versions noves, 
        notícies...). Esperem que els serveis que us ofereix Àgora 
        us siguin d'utilitat.
    </p>
{elseif $service->state eq '-2'}
<p>
    S'ha denegat el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$client->clientName}</strong> dins de l'espai 
    <a href="{$baseURL}">Àgora</a>. El motiu de la denegació ha estat:
</p>
<p style="margin:20px; font-weight:bold;">{$service->observations}</p>
{elseif $service->state eq '-3'}
<p>
    S'ha donat de baixa el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$client->clientName}</strong> dins de l'espai 
    <a href="{$baseURL}">Àgora</a>. El motiu de la baixa ha estat:
</p>
<p style="margin:20px; font-weight:bold;">{$service->observations}</p>
{elseif $service->state eq '-4'}
<p>
    S'ha desactivat el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$client->clientName}</strong> dins de l'espai
    <a href="{$baseURL}">Àgora</a>. El motiu de la baixa ha estat:
</p>
<p style="margin:20px; font-weight:bold;">{$service->observations}</p>
{/if}

<br />
<p>Atentament,</p>
<p>L'equip del projecte Àgora de la XTEC</p>
<br />

<p style="font-weight:bold;">P.D.: Aquest missatge s'envia automàticament. Si us plau, no el respongueu.</p>
