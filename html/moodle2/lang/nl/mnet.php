<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'mnet', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Over jouw server';
$string['accesslevel'] = 'Toegangsniveau';
$string['addhost'] = 'Host toevoegen';
$string['addnewhost'] = 'Voeg een nieuwe host toe';
$string['addtoacl'] = 'Toevoegen aan toegangscontrole';
$string['allhosts'] = 'Alle hosts';
$string['allhosts_no_options'] = 'Er zijn geen opties beschikbaar waneer je meerdere hosts bekijkt';
$string['allow'] = 'Toestaan';
$string['applicationtype'] = 'Applicatietype';
$string['authfail_nosessionexists'] = 'Authorisatie mislukt: de MNet-sessie bestaat niet.';
$string['authfail_sessiontimedout'] = 'Authorisatie mislukt: de tijd voor de MNet-sessie is verlopen.';
$string['authfail_usermismatch'] = 'Authorisatie mislukt: de gebruiker komt niet overeen.';
$string['authmnetdisabled'] = 'MNet Authenticatieplugin is <strong>uitgeschakeld</strong>.';
$string['badcert'] = 'Dit certificaat is niet geldig.';
$string['certdetails'] = 'Cert Details';
$string['configmnet'] = 'MNet maakt communicatie mogelijk tussen deze server en andere servers of services.';
$string['couldnotgetcert'] = 'Geen certificaat gevonden op <br />{$a}.<br />De host is misschien onbereikbaar of slecht geconfigureerd.';
$string['couldnotmatchcert'] = 'Dit komt niet overeen met het certificaat dat door de webserver gepubliceerd wordt.';
$string['courses'] = 'cursussen';
$string['courseson'] = 'cursussen op';
$string['currentkey'] = 'Huidige publieke sleutel';
$string['current_transport'] = 'Huidig transport';
$string['databaseerror'] = 'Kon details niet in de databank bewaren';
$string['deleteaserver'] = 'Server verwijderen';
$string['deletedhostinfo'] = 'Deze host is verwijderd; Als je dit ongedaan wil maken, schakel dan de verwijderd status terug naar \'nee\'';
$string['deletedhosts'] = 'Verwijderde hosts: {$a}';
$string['deletehost'] = 'Verwijder host';
$string['deletekeycheck'] = 'Ben je zeker dat je deze sleutel wil verwijderen?';
$string['deleteoutoftime'] = 'Je 60 seconden durend tijdvenster voor het verwijderen van deze sleutel is verlopen. Begin opnieuw.';
$string['deleteuserrecord'] = 'SSO ACL: verwijder record voor gebruiker \'{$a->user}\' van {$a->host}.';
$string['deletewrongkeyvalue'] = 'Er is een fout opgetreden. Als je niet aan het proberen was om de SSL-sleutel van je server te verwijderen, dan was je misschien het slachtoffer van een aanval. Er is geen actie ondernomen.';
$string['deny'] = 'Verbied';
$string['description'] = 'Beschrijving';
$string['duplicate_usernames'] = 'Er kon geen index gemaakt worden op de kolommen "mnethostid" en "username" in je usertabel. <br />Dit kan gebeuren als je een <a href="{$a}" target="_blank">dubbel gebruikte gebruikersnaam in je usertabel hebt</a>.<br />Je upgrade zou toch goed moeten aflopen. Klik op de link hierboven en instructies om het probleem op te lossen zullen in een nieuw venster verschijnen. Je kunt het probleem oplossen na de upgrade.<br />';
$string['enabled_for_all'] = '(Deze service is ingeschakeld voor alle hosts)';
$string['enterausername'] = 'Geef een gebruikersnaam of een door komma\'s gescheiden lijst van gebruikersnamen.';
$string['error7020'] = 'Je ziet deze foutmelding als de site op afstand een record voor jou gemaakt heeft met de verkeerde wwwroot, bijvoorbeeld http://jouwsite.com in de plaats van http://www.jouwsite.com. Je moet de beheerder van die site contacteren om te vragen de record voor jouw host aan te passen met de waarde die je voor wwwroot vindt in config.php.';
$string['error7022'] = 'Het bericht dat je naar de server op afstand stuurde, was juist geëncrypteerd, maar niet ondertekend. Dit is heel ongewoon. Je kunt best een foutmelding maken, waarbij je zoveel mogelijk informatie geeft over de betreffende applicatieversies enz.';
$string['error7023'] = 'De site op afstand heeft geprobeerd he bericht te ontcijferen met de sleutels die daar voor jouw site beschikbaar zijn. Dit is mislukt. Je kunt dit waarschijnlijk oplossen door manueel de sleutel opnieuw uit te wisselen met de site op afstand. Deze fout zou normaal gezien niet mogen gebeuren, tenzij je geen communicatie meer had met die site gedurende enkele maanden.';
$string['error7024'] = 'Je hebt een onversleuteld bericht gestuurd naar de site op afstand, maar deze site accepteert geen onversleutelde boodschappen van jouw site. Dit is heel ongewoon. Je kunt best een foutmelding maken, waarbij je zoveel mogelijk informatie geeft over de betreffende applicatieversie enz.';
$string['error7026'] = 'De sleutel waarmee je boodschap is ondertekend, is verschillend van de sleutel waarover de host op afstand over beschikt voor jouw server. Bovendien heeft die host geprobeerd je huidige sleutel te bekomen en is daar niet in gelukt. Geef de sleutel opnieuw manueel door en probeer nog eens.';
$string['error709'] = 'De site op afstand kon van jouw site geen SSL key bekomen.';
$string['expired'] = 'Deze sleutel verloopt op';
$string['expires'] = 'Geldig tot';
$string['expireyourkey'] = 'Verwijder deze sleutel';
$string['expireyourkeyexplain'] = 'Moodle roteert je sleutels automatisch om de 28 dagen (standaardinstelling), maar je hebt de optie om deze sleutel <em>manueel</em> te laten verlopen op gelijk welk moment. Dit is enkel nuttig als je denkt dat deze sleutel niet meer veilig is. Een vervangsleutel zal automatisch gegenereerd worden.<br />Het verwijderen van deze sleutel zal het voor andere applicaties onmogelijk maken  om met jou te communiceren, tot je manueel contact omneemt met elke beheerder en hen de nieuwe sleutel geeft.';
$string['exportfields'] = 'Te exporteren velden';
$string['failedaclwrite'] = 'Het schrijven naar de MNet access control list voor gebruiker \'{$a}\' is mislukt.';
$string['findlogin'] = 'Zoek login';
$string['forbidden-function'] = 'Deze functie is niet ingeschakeld voor RPC.';
$string['forbidden-transport'] = 'De transportmethode die je probeert te gebruiken is niet toegestaan.';
$string['forcesavechanges'] = 'Forceer bewaren van de wijzigingen';
$string['helpnetworksettings'] = 'Configureer MNet-communicatie';
$string['hidelocal'] = 'Verberg locale gebruikers';
$string['hideremote'] = 'Verberg externe gebruikers';
$string['host'] = 'host';
$string['hostcoursenotfound'] = 'Host of cursus kan niet gevonden worden';
$string['hostdeleted'] = 'Host verwijderd';
$string['hostexists'] = 'Er bestaat al een record voor een host met die naam. <a href="{$a}">Klik hier</a> om die record te bewerken.';
$string['hostlist'] = 'Lijst met genetwerkte hosts';
$string['hostname'] = 'Host-naam';
$string['hostnamehelp'] = 'De fully-qualified domain name van die host, bv. www.voorbeeld.com';
$string['hostnotconfiguredforsso'] = 'Deze server is niet geconfigureerd voor externe aanmeldingen.';
$string['hostsettings'] = 'Instellingen host';
$string['http_self_signed_help'] = 'Connecties toestaan die een eigen DIY SSL certificaat hebben op de externe host.';
$string['https_self_signed_help'] = 'Connecties toestaan die een eigen DIY SSL certificaat in PHP gebruiken op de externe host over http.';
$string['https_verified_help'] = 'Connecties toestaan die een geverifieerd SSL certificaat gebruiken op de externe host.';
$string['http_verified_help'] = 'Connecties toestaan die een geverifieerd SSL certificaat in PHP gebruiken op de externe host, maar over http (niet over https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Deze waarde wordt automatisch toegekend en kan niet gewijzigd worden.';
$string['importfields'] = 'Te importeren velden';
$string['inspect'] = 'Inspecteer';
$string['installnosuchfunction'] = 'Programmatiefout! Iets probeert een mnet xmlrpc functie ({$a->method}) te installeren van bestand ({$a->file}) en het kan niet gevonden worden!';
$string['installnosuchmethod'] = 'Programmatiefout! Iets probeert een mnet xmlrpc methode ({$a->method}) te installeren van een klasse  ({$a->class) en het kan niet gevonden worden!';
$string['installreflectionclasserror'] = 'Programmatiefout! MNET introspection mislukt voor methode \'{$a->method}\' in klasse \'{$a->class}\'; De originele foutmelding is: \'{$a->error}\'';
$string['installreflectionfunctionerror'] = 'Programmatiefout! MNET introspection mislukt voor functie \'{$a->method}\' in bestand \'{$a->file}\'; De originele foutmelding is: \'{$a->error}\'';
$string['invalidaccessparam'] = 'Ongeldige toegansparameter';
$string['invalidactionparam'] = 'Ongeldige actieparameter';
$string['invalidhost'] = 'Je moet een geldige hostidentificatie geven.';
$string['invalidpubkey'] = 'Deze sleutel is geen geldige SSL-sleutel; ({$a})';
$string['invalidurl'] = 'Ongeldige URL-parameter';
$string['ipaddress'] = 'IP-adres';
$string['is_in_range'] = 'Het IP-adres  <code>{$a}</code>  is een geldige vertrouwde host.';
$string['ispublished'] = '{$a} heeft deze  voor jou ingeschakeld.';
$string['issubscribed'] = '{$a} is voor deze service ingeschreven op jouw host.';
$string['keydeleted'] = 'Je sleutel is verwijderd en vervangen.';
$string['keymismatch'] = 'De publieke sleutel die je voor deze host hebt is verschillend van de publieke sleutel die ervoor gepubliceerd wordt. De gepubliceerde sleutel is:';
$string['last_connect_time'] = 'Laatste connectiemoment';
$string['last_connect_time_help'] = 'De laatste keer dat je verbonden was met deze host.';
$string['last_transport_help'] = 'Het transport dat je de laatste keer gebruikte wanneer je verbonden was met deze host.';
$string['leavedefault'] = 'Gebruik in de plaats de standaardinstellingen';
$string['listservices'] = 'Lijst services';
$string['loginlinkmnetuser'] = '<br />Als je een externe MNet-gebruiker bent en je kunt <a href="{$a}">je e-mailadres hier bevestigen</a>, dan word je naar je loginpagina doorgestuurd.';
$string['logs'] = 'logs';
$string['managemnetpeers'] = 'Beheer peers';
$string['method'] = 'Methode';
$string['methodhelp'] = 'Methodehulp voor {$a}';
$string['methodsavailableonhost'] = 'Methodes beschikbaar voor {$a}';
$string['methodsavailableonhostinservice'] = 'Methodes beschikbaar voor {$a->service} op {$a->host}';
$string['methodsignature'] = 'Methode handtekening voor {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Voeg (tot maximaal) 3 strings samen en geef het resultaat.';
$string['mnetdisabled'] = 'MNet is <strong>uitgeschakeld</strong>.';
$string['mnetidprovider'] = 'MNET ID-Provider';
$string['mnetidproviderdesc'] = 'Je kunt dit gebruiken om een link te bekomen waar je kunt inloggen als je het juiste e-mailadres kunt geven dat overeen komt met de gebruikersnaam waarmee je net probeerde in te loggen';
$string['mnetidprovidermsg'] = 'Je zou moeten kunnen aanmelden bij je {$a} provider.';
$string['mnetidprovidernotfound'] = 'Er kon niet meer informatie gevonden worden.';
$string['mnetlog'] = 'Logs';
$string['mnetpeers'] = 'Peer servers';
$string['mnetservices'] = 'Services';
$string['mnet_session_prohibited'] = 'Gebruikers van jouw server mogen op dit moment niet op {$a} aanmelden.';
$string['mnetsettings'] = 'Instellingen Mnet';
$string['moodle_home_help'] = 'Het pad naar de startpagina van de MNet-applicatie op de externe host, bijvoorbeeld /moodle/.';
$string['name'] = 'Naam';
$string['net'] = 'Netwerk';
$string['networksettings'] = 'Netwerk instellingen';
$string['never'] = 'Nooit';
$string['noaclentries'] = 'Niets in de SSO access control list';
$string['noaddressforhost'] = 'Die hostnaam ({$a}) kon niet gevonden worden!';
$string['nocurl'] = 'PHP cURL bibliotheek is niet geïnstalleerd';
$string['nolocaluser'] = 'Er bestaat geen locale record voor deze externe gebruiker, en die kon ook niet aangemaakt worden omdat de host niet automatisch gebruikers wil aanmaken. Neem contact op met je beheerder.';
$string['nomodifyacl'] = 'Je mag de MNET access control list niet wijzigen.';
$string['nonmatchingcert'] = 'Het certificaat <br /><em>{$a->subject}</em><br /> komt niet overeen met de host waar het vandaan kwam <br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Er was een probleem bij het opvragen van de publieke sleutel.<br />Misschien is de host niet ingeschakeld voor MNet of de sleutel is ongeldig.';
$string['nosite'] = 'Kon de site-niveau-cursus niet vinden.';
$string['nosuchfile'] = 'Het bestand/de functie {$a} bestaat niet.';
$string['nosuchfunction'] = 'Kon de functie niet vinden of de functie mag RPC niet gebruiken.';
$string['nosuchmodule'] = 'De functie werd onjuist aangesproken en kon niet gevonden worden. Gebruik de opmaak mod/modulenaam/lib/functienaam';
$string['nosuchpublickey'] = 'Kon geen publieke sleutel voor verificatie vinden.';
$string['nosuchservice'] = 'Op deze host loopt de RPC-service niet.';
$string['nosuchtransport'] = 'Er bestaat geen transport met dat ID';
$string['notBASE64'] = 'Deze string is niet in het Base64-formaat. Het kan geen geldige sleutel zijn.';
$string['notenoughidpinfo'] = 'Je identiteitsprovider geeft ons niet genoeg informatie om je account lokaal aan te maken of te updaten.';
$string['not_in_range'] = 'Het IP-adres   <code>{$a}</code>   is niet van een geldige vertrouwde host.';
$string['notinxmlrpcserver'] = 'Poging toegang te krijgen tot de MNET client op afstand, niet tijdens uitvoeren van XMLRPC server';
$string['notmoodleapplication'] = 'Waarschuwing: dit is geen Moodle-applicatie, dus sommige inspectiemethodes kunnen niet goed werken';
$string['notPEM'] = 'Deze sleutel is niet in het PEM-formaat. Het zal niet werken.';
$string['notpermittedtojump'] = 'Je hebt de toelating niet om een externe sessie te beginnen vanaf deze Moodle server.';
$string['notpermittedtojumpas'] = 'Je kunt geen sessie op afstand beginnen terwijl je aangemeld bent als een andere gebruiker.';
$string['notpermittedtoland'] = 'Je hebt het recht niet om een externe sessie te starten.';
$string['off'] = 'Uit';
$string['on'] = 'Aan';
$string['options'] = 'Opties';
$string['peerprofilefielddesc'] = 'Hier kun je de globale instellingen voor welke profielvelden te sturen en te importeren als nieuwe gebruikers gemaakt worden, overschrijven.';
$string['permittedtransports'] = 'Toegelaten transporten';
$string['phperror'] = 'Een interne PHP-fout verhinderde dat je aanvraag goed afgehandeld werd.';
$string['position'] = 'Positie';
$string['postrequired'] = 'De verwijderfunctie vereist een POST request.';
$string['profileexportfields'] = 'Te versturen velden';
$string['profilefielddesc'] = 'Hier kun je de lijst met profielvelden die verstuurd en ontvangen worden over MNET tijdens creatie en updates van gebruikersaccounts, configureren. Je kunt dit ook voor elke MNET-partner individueel overschrijven. Merk op dat volgende velden altijd verstuurd worden en niet optioneel zijn: {$a}';
$string['profilefields'] = 'Profielvelden';
$string['profileimportfields'] = 'Te importeren velden';
$string['promiscuous'] = 'Promiscue';
$string['publickey'] = 'Publieke sleutel';
$string['publickey_help'] = 'De publieke sleutel is automatisch verkregen van de externe server.';
$string['publickeyrequired'] = 'Je moet een publieke sleutel opgeven.';
$string['publish'] = 'Publiceer';
$string['reallydeleteserver'] = 'Ben je er zeker van dat je deze server wil verwijderen?';
$string['receivedwarnings'] = 'Volgende waarschuwingen werden ontvangen';
$string['recordnoexists'] = 'Record bestaat niet.';
$string['reenableserver'] = 'Nee - kies deze optie om deze server opnieuw in te schakelen';
$string['registerallhosts'] = 'Registreer alle hosts (Promiscue modus)';
$string['registerallhostsexplain'] = 'Je kan er voor kiezen om alle hosts die proberen met jou connectie te maken automatisch te registreren.
Dit betekent dat er een record in je hosts lijst zal verschijnen voor elke MNet site die verbinding met je maakt en je publieke sleutel vraagt.<br />Hieronder heb je de optie om services te configureren voor \'Alle hosts\'. Door daar enkele services in te schakelen, kun je die voorzien voor alle servers op afstand.';
$string['registerhostsoff'] = 'Registreer alle hosts is nu <b>uitgeschakeld</b>';
$string['registerhostson'] = 'Registreer alle hosts is nu <b>ingeschakeld</b>';
$string['remotecourses'] = 'Externe cursussen';
$string['remotehost'] = 'Host op afstand';
$string['remotehosts'] = 'Ecterne hosts';
$string['remoteuserinfo'] = 'Gebruiker op afstand {$a->remotetype} - profiel opgehaald van <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'Netwerk vereist de OpenSSL extentie';
$string['restore'] = 'Terugzetten';
$string['returnvalue'] = 'Teruggegeven waarde';
$string['reviewhostdetails'] = 'Bekijk details van host';
$string['reviewhostservices'] = 'Bekijk services van host';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP niet geëncrypteerd';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (eigen certificaat)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (eigen certificaat)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (certificaat)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (certificaat)';
$string['selectaccesslevel'] = 'Kies een toegangsniveau uit de lijst.';
$string['selectahost'] = 'Kies een externe host.';
$string['service'] = 'Servicenaam';
$string['serviceid'] = 'Service-ID';
$string['servicesavailableonhost'] = 'Services beschikbaar op {$a}';
$string['serviceswepublish'] = 'Services die we publiceren voor {$a}.';
$string['serviceswesubscribeto'] = 'Services op {$a} waar we op inschrijven.';
$string['settings'] = 'Instellingen';
$string['showlocal'] = 'Toon lokale gebruikers';
$string['showremote'] = 'Toon externe gebruikers';
$string['ssl_acl_allow'] = 'SSO ACL: Gebruiker {$a->user} van {$a->host} toelaten';
$string['ssl_acl_deny'] = 'SSO ACL: Gebruiker {$a->user} van {$a->host} weigeren';
$string['ssoaccesscontrol'] = 'SSO Toegangscontrole';
$string['ssoacldescr'] = 'Gebruik deze pagina om toegang toe te staan/te weigeren voor specifieke gebruikers van externe MNet-hosts. Dit is functioneel wanneer je SSO-diensten aanbiedt voor externe gebruikers. Om de mogelijkheden van je <em>lokale</em> gebruikers te controleren om uit te zwerven over andere Moodle Network hosts, moet je het rollensysteem gebruiken. Kies de <em>mnetlogintoremote</em> mogelijkheid.';
$string['ssoaclneeds'] = 'Om deze functie te laten werken, moet je Moodle Networking aanzetten en de MNet authenticatieplugin inschakelen.';
$string['strict'] = 'Strikt';
$string['subscribe'] = 'Schrijf in';
$string['system'] = 'Systeem';
$string['testclient'] = 'MNet test client';
$string['testtrustedhosts'] = 'Test een adres';
$string['testtrustedhostsexplain'] = 'Geef een IP-adres om te controleren of dit een vertrouwde host is.';
$string['theypublish'] = 'Zij publiceren';
$string['theysubscribe'] = 'Zij schrijven in';
$string['transport_help'] = 'Je kunt een externe host alleen dwingen om een getekend SSL-certificaat te gebruiken als jouw server ook een getekend SSL-certificaat heeft.';
$string['trustedhosts'] = 'XML-RPC hosts';
$string['trustedhostsexplain'] = '<p>Het vertrouwde hosts mechanisme maakt het voor specifieke machines mogelijlk om cals uit te voeren via het XML-RPC mechanisme naar gelijk welk deel van de Moodle API. Dit maakt het mogelijk voor scripts om het gedrag van Moodle te controleren en kan een erg gevaarlijk optie zijn om in te schakelen. Laat het bij twijfel uit staan.</p>
<p>Dit is <strong>niet</strong> nodig voor MNet. Schakel het alleen in als je weet wat je doet.</p>
<p>Om dit in te schakelen, geef je een lijst van IP-adressen of netwerken, één op elke lijn.
Enkele voorbeelden:</p>Jouw lokale host:<br />127.0.0.1<br />Jouw lokale host (met een netwerkblok):<br />127.0.0.1/32<br /> Enkel de host met IP-adres 192.168.0.7:<br />192.168.0.7/32<br />Gelijk welke host met een IP-adres tussen 192.168.0.1 en 192.168.0.255:<br />192.168.0.0/24<br />Gelijk welke host:<br />192.168.0.0/0<br />Vanzelfsprekend is dit laatste voorbeeld <strong>geen</strong> aanbevolen configuratie!';
$string['turnitoff'] = 'Schakel uit';
$string['turniton'] = 'Schakel in';
$string['type'] = 'Type';
$string['unknown'] = 'Onbekend';
$string['unknownerror'] = 'Er is een onbekende fout opgetreden tijdens de authenticatie.';
$string['usercannotchangepassword'] = 'Je kunt je wachtwoord hier niet wijzigen omdat je een externe gebruiker bent.';
$string['userchangepasswordlink'] = '<br /> Je kunt waarschijnlijk je wachtwoord wijzigen bij jouw <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> provider.';
$string['usernotfullysetup'] = 'Je gebruikersaccount is onvolledig. Je moet <a href="{$a}">teruggaan naar je provider</a> en er voor zorgen dat je profiel daar volledig is. Het is mogelijk dat je moet afmelden en terug aanmelden om je wijzigingen toe te passen.';
$string['usersareonline'] = 'Waarschuwing: {$a} gebruikers van die server zijn op dit ogenblik op jouw site ingelogd.';
$string['validated_by'] = 'Dit is goedgekeurd door het netwerk:  <code>{$a}</code>';
$string['verifysignature-error'] = 'De handtekeningverificatie mislukte. Er is een fout opgetreden.';
$string['verifysignature-invalid'] = 'De handtekeningverificatie mislukte. Het lijkt er op dat deze aanvraag niet door jou ondertekend was';
$string['version'] = 'Versie';
$string['warning'] = 'Waarschuwing';
$string['wrong-ip'] = 'Je IP-adres komt niet overeen met het IP-adres dat we geregistreerd hebben.';
$string['xmlrpc-missing'] = 'Je moet XML-RPC in PHP geinstalleerd hebben om deze functie te kunnen gebruiken';
$string['yourhost'] = 'Jouw host';
$string['yourpeers'] = 'Jouw peers';
