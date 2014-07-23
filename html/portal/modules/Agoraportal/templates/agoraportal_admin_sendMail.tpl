
<p style="margin-left:10px;">Benvolgut Sr./Sra.,</p>

{if $state eq 1}
    <p>
        S'ha activat el servei <strong>{$serviceName}</strong> per al
        centre <strong>{$clientName}</strong> dins de l'espai
        <a href="{$baseURL}">&Agrave;gora</a> de la XTEC.
    </p>
    
    {if $serviceName eq 'moodle2'}
        {assign var='serviceName4URL' value='moodle'}
        {assign var='serviceName4User' value='moodle'}
    {elseif $serviceName eq 'intranet'}
        {assign var='serviceName4URL' value='intranet'}
        {assign var='serviceName4User' value='intranet'}
    {elseif $serviceName eq 'nodes'}
        {assign var='serviceName4URL' value='nodes'}
        {assign var='serviceName4User' value='nodes'}
    {/if}
    
    {if $serviceName neq 'marsupial'}
    <p>
        Podeu accedir al vostre espai <strong>{$serviceName4User}</strong> des de
        l'URL <a href="{$baseURL}{$clientDNS}/{$serviceName4URL}/">{$baseURL}{$clientDNS}/{$serviceName4URL}</a>
        amb l'usuari <strong>admin</strong> i la contrasenya <strong>{$password}</strong>.
        Us recomanem que canvieu la contrasenya d'aquest usuari despr&eacute;s
        del primer acc&eacute;s al servei. Dins del vostre espai s'ha creat,
        tamb&eacute;, l'usuari <strong>xtecadmin</strong> que s'utilitzar&agrave; en cas de
        que hi hagi alguna incid&egrave;ncia que requereixi un suport especial.
        Us preguem que no l'esborreu ni li canvieu la contrasenya.
    </p>
    {else}
    <p>
        A partir d'ara, l'URL d'acc&eacute;s al vostre moodle ha canviat i ha
        passat a ser <a href="{$baseURLMarsupial}{$clientDNS}/moodle/">{$baseURLMarsupial}{$clientDNS}/moodle</a>.
        Tots els accessos que es facin utilitzant el domini {$baseURL}
        seran redirigits automàticament a {$baseURLMarsupial}.
    </p>
    <p>
        Aquest canvi d'URL ser&agrave; efectiu unes hores despr&eacute;s de 
        l'enviament d'aquest missatge de correu electr&ograve;nic. Si en 24 hores 
        no s'ha produ&iuml;t, poseu-vos en contacte amb nosaltres al 
        <a href="http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=181">fòrum 
        d'&Agrave;gora-moodle</a>. Aix&iacute; mateix, en cas de trobar-vos 
        amb algun problema d'acc&eacute;s al domini nou, proveu d'esborrar les 
        galetes (<em>cookies</em>) del vostre navegador.
    </p>
    {/if}
    
    {if $serviceName eq 'moodle2'}
    <p>
        Per resoldre qualsevol dubte o problema relacionat amb aquest servei, teniu 
        a la vostra disposici&oacute; el 
        <a href="http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=181">fòrum 
        d'&Agrave;gora-moodle</a>, a on hi podeu escriure preguntes, 
        sol&middot;licitar ajuda o plantejar suggeriments.
    </p>
    <p>
        Per resoldre dubtes sobre el funcionament general del Moodle us podeu 
        adre&ccedil;ar tamb&eacute; als f&ograve;rums en catal&agrave;
        de <a href="http://moodle.org/course/view.php?id=39">Moodle.org</a>.
    </p>
    <p>
        Teniu a la vostra disposici&oacute; els  
        <a href="http://ateneu.xtec.cat/wikiform/wikiexport/cmd/tac/moodle2/index">
        materials de suport als cursos telem&agrave;tics</a> sobre Moodle, 
        on trobareu un conjunt important d'informaci&oacute; sobre l'&uacute;s 
        d'aquesta plataforma d'aprenentatge.
    </p>
    {/if}

    {if $serviceName eq 'intranet'}
    <p>
        Tal i com s'especifica a les condicions d'&uacute;s del servei, 
        recordeu que a la XTEC no hi ha cap figura destinada a solucionar les
        q&uuml;estions plantejades en relaci&oacute; al funcionament de la 
        intranet. Per tal de resoldre els dubtes relacionats amb aquest tema
        podeu adre&ccedil;ar-vos als 
        <a href="http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=1161">f&ograve;rums 
        del projecte Intraweb</a>. En aquest f&ograve;rum tothom pot preguntar 
        i respondre les q&uuml;estions que consideri oportunes.
    </p>
    <p>
        Teniu a la vostra disposici&oacute; els materials del 
        <a href="http://ateneu.xtec.cat/wikiform/wikiexport/cursos/gestio_centres/d134/index">curs
        de formaci&oacute; sobre l'administració de la intranet</a> a on hi 
        trobareu un conjunt important d'informaci&oacute; sobre l'&uacute;s 
        d'aquesta plataforma.
    </p>
    {/if}

    {if $serviceName eq 'nodes'}
    <p>
        Tal i com s'especifica a les condicions d'&uacute;s del servei, 
        recordeu que a la XTEC no hi ha cap figura destinada a solucionar les
        q&uuml;estions plantejades en relaci&oacute; al funcionament del 
        WordPress. Per tal de resoldre els dubtes relacionats amb aquest tema
        podeu adre&ccedil;ar-vos als 
        f&ograve;rums 
        del projecte Nodes. En aquest f&ograve;rum tothom pot preguntar 
        i respondre les q&uuml;estions que consideri oportunes.
    </p>
    {/if}

    <p>
        Des del portal <a href="{$baseURL}">&Agrave;gora</a> s'informar&agrave; 
        de les novetats relacionades amb el projecte (versions noves, 
        not&iacute;cies...). Esperem que els serveis que us ofereix &Agrave;gora 
        us siguin d'utilitat.
    </p>
{/if}

{if $state eq '-2'}
<p>
    S'ha denegat el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$clientName}</strong> dins de l'espai 
    <a href="{$baseURL}">&Agrave;gora</a>. El motiu de la 
    denegaci&oacute; ha estat:
</p>
<p style="margin:20px; font-weight:bold;">
    {$observations}
</p>
{/if}

{if $state eq '-3'}
<p>
    S'ha donat de baixa el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$clientName}</strong> dins de l'espai 
    <a href="{$baseURL}">&Agrave;gora</a>. El motiu de la baixa 
    ha estat:
</p>
<p style="margin:20px; font-weight:bold;">
        {$observations}
</p>
{/if}

{if $state eq '-4'}
<p>
    S'ha desactivat el servei <strong>{$serviceName4User}</strong>
    per al centre <strong>{$clientName}</strong> dins de l'espai
    <a href="{$baseURL}">&Agrave;gora</a>. El motiu de la baixa
    ha estat:
</p>
<p style="margin:20px; font-weight:bold;">
        {$observations}
</p>
{/if}

<br />

<p>
    Atentament,
</p>

<p>
    L'equip del projecte &Agrave;gora de la XTEC
</p>

<br />

<p style="font-weight:bold;">
    P.D.: Aquest missatge s'envia autom&agrave;ticament. Si us plau, no el respongueu.
</p>
