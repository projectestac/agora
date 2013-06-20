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
 * Strings for component 'enrol_authorize', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Welke kredietkaarten zullen aanvaard worden?';
$string['adminaccepts'] = 'Kies toegelaten betalingsmethoden en hun types';
$string['adminauthorizeccapture'] = 'Bestellingsoverzicht & instellingen automatische ontvangsten';
$string['adminauthorizeemail'] = 'Instellingen e-mail';
$string['adminauthorizesettings'] = 'Authorize.net Instellingen handelaar';
$string['adminauthorizewide'] = 'Algemene instellingen';
$string['adminconfighttps'] = 'Verzeker je ervan dat je "<a href="{$a->url}"> loginhttps INGESCHAKELD</a>" hebt om deze plugin te gebruiken<br />in Beheer >> Variablen >> Beveiliging >> HTTP beveiliging.';
$string['adminconfighttpsgo'] = 'Ga naar de <a href="{$a->url}">beveiligingspagina</a> om deze plugin te configureren.';
$string['admincronsetup'] = 'Het onderhoudsscript cron.php heeft al minstens 24 uur niet gelopen.<br />Om de autocapture mogelijkheid te gebruiken moet cron ingeschakeld zijn. <br />Cron installeren of schakel an_review opnieuw uit. <br />Als je autocapture uitschakeld, zullen de transacties geannuleerd worden, tenzij je ze binnen de 30 dagen bevestigd.<br />Controleer an_review en zet \'0\' in het an_capture_day veld <br /> als je betalingen manueel wil aanvaarden/niet aanvaarden binnen 30 dagen.';
$string['adminemailexpiredsort'] = 'Waneer het aantal wachtende bestellingen die gaan vervallen naar de leraren verstuurd worden, welke is dan belangrijk?';
$string['adminemailexpiredsortcount'] = 'Het aantal bestellingen';
$string['adminemailexpiredsortsum'] = 'Het totaalbedrag';
$string['adminemailexpsetting'] = '(0=schakel mail sturen uit, standaard=2, maximum=5)<br />(Instelling voor het sturen van mail bij manueel krediteren: cron=ingeschakeld, an_review=vinkje, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Geplande dag voor automatisch aanvaarden';
$string['adminhelpreviewtitle'] = 'Nakijken bestellingen';
$string['adminneworder'] = 'Beste beheerder,

Je hebt een nieuwe bestelling binnengekregen:

Order ID: {$a->orderid}
Transaction ID: {$a->transid}
Gebruiker: {$a->user}
Cursus: {$a->course}
Bedrag: {$a->amount}

Automatisch aanvaarden ingeschakeld? {$a->acstatus}

Als automatisch aanvaarden ingeschakeld is, dan zal de kredietkaart aanvaard worden op {$a->captureon} en zal de leerling automatisch aangemeld worden in de cursus, anders zal deze aanvraag verlopen op {$a->expireon} en kan die niet meer bevestigd worden na die dag.

Je kunt de betaling ook onmiddellijk aanvaarden en de leerling onmiddellijk toegang geven tot de cursus door deze link te volgen {$a->url}';
$string['adminnewordersubject'] = '{$a->course}: Nieuwe bestelling ({$a->orderid})';
$string['adminpendingorders'] = 'Je hebt de functie voor automatisch aanvaarden uitgeschakeld.<br />Er zijn {$a->count} transacties met als status \'Geauthoriseerd/wachtend\' die geannulleerd zullen worden, tenzij je ze controleert.<br />Deze betalingen aanvaarden/verwerpen doe je met de <a href=\'{$a->url}\'>Beheer betalingen</a> pagina';
$string['adminteachermanagepay'] = 'Leraren kunnen de betalingen van de cursus beheren';
$string['allpendingorders'] = 'Alle lopende bestellingen';
$string['amount'] = 'Bedrag';
$string['anauthcode'] = 'Authcode verkrijgen';
$string['anauthcodedesc'] = 'Als de creditkaart van een gebruiker niet rechtstreeks op het internet gevonden kan worden, vraag dan via de telefoon een authorisatiecode aan via de bank van de klant.';
$string['anavs'] = 'Adres verificatiesysteem';
$string['anavsdesc'] = 'Selecteer dit als je Address Verification System (AVS) hebt ingeschakeld in je Authorize.Net handelaarsaccount. Dit vraagt adresvelden zoals straat, staat, land en zip wanneer de gebruiker het betaalformulier invult.';
$string['ancaptureday'] = 'Ontvangstdag';
$string['ancapturedaydesc'] = 'Ontvangt de creditkaart automatische tenzij de leraar of beheerder de bestelling nakijkt binnen ene bepaalde termijn. CRON MOET INGESCHAKELD ZIJN.<br />(0 dagen betekent dat het gepland ontvangen is uitgeschakeld, betekent ook dat de leraar of beheerder de bestelling manueel nakijkt. De transactie zal geannuleerd worden als je gepland ontvangan uitschakeld of als je niet binnen 30 dagen de bestelling nakijkt.';
$string['anemailexpired'] = 'Vervaldagbericht';
$string['anemailexpireddesc'] = 'Dit wordt gebruikt voor manueel ontvangen. Beheerders krijgen een melding over hoeveel dagen bestellingen voor de vervaldag zijn.';
$string['anemailexpiredteacher'] = 'Vervaldagbericht - Leraar';
$string['anemailexpiredteacherdesc'] = 'Als je manueel ontvangen hebt ingeschakeld (zie boven) en leraren kunnen de betalingen beheren, dan kunnen ze ook meldingen krijgen over wanneer geplaatste bestellingen vervallen. Dit zal een e-mail sturen naar alle leraren in de cursus over het aantal van de openstaande bestellingen en hun vervaldatum';
$string['anlogin'] = 'Authorize.net: Login naam';
$string['anpassword'] = 'Authorize.net: Wachtwoord';
$string['anreferer'] = 'Verwijzing';
$string['anrefererdesc'] = 'Type hier de URL-verwijzing als je dit instelt met je authorize.net account. Dit zal een header "Referer:URL" in de webaanvraag zetten.';
$string['anreview'] = 'Nakijken';
$string['anreviewdesc'] = 'Bekijk de bestelling voor je de kredietkaart verwerkt.';
$string['antestmode'] = 'Testmodus';
$string['antestmodedesc'] = 'Laat de transacties enkel in testmodus lopen (er zal geen geld afgehaald worden)';
$string['antrankey'] = 'Authorize.net: transactiesleutel';
$string['approvedreview'] = 'Nakijken goedgekeurd';
$string['authcaptured'] = 'Goedgekeurd /  Gekrediteerd';
$string['authcode'] = 'Authorisatiecode';
$string['authorize:config'] = 'Configureer Authorize.Net aanmelding';
$string['authorizedpendingcapture'] = 'Goedgekeurd / Wachten op kreditering';
$string['authorizeerror'] = 'Authorize.net fout: {$a}';
$string['authorize:manage'] = 'Beheer aangemelde gebruikers';
$string['authorize:managepayments'] = 'Beheer betalingen';
$string['authorize:unenrol'] = 'Gebruikers afmelden van cursus';
$string['authorize:unenrolself'] = 'Meldt jezelf af van de cursus';
$string['authorize:uploadcsv'] = 'CSV-bestand uploaden';
$string['avsa'] = 'Adres (straat) is juist';
$string['avsb'] = 'Adres niet opgegeven';
$string['avse'] = 'Systeem fout in adresverificatie';
$string['avsg'] = 'Non-U.S. Card Issuing Bank';
$string['avsn'] = 'Straat en postcode fout';
$string['avsp'] = 'Adres verificatiesysteem niet beschikbaar';
$string['avsr'] = 'Probeer opnieuw - Systeem niet beschikbaar of time out';
$string['avsresult'] = 'AVS Resultaat: {$a}';
$string['avss'] = 'Service niet ondersteund';
$string['avsu'] = 'Adresinformatie niet beschikbaar';
$string['avsw'] = '9 cijferige postcode klopt, adres (straat) niet';
$string['avsx'] = 'Adres (straat) en 9 cijferige postcode niet juist';
$string['avsy'] = 'Adres (straat) en 5 cijferige postcode niet juist';
$string['avsz'] = '5 cijferige postcode is juist, adres (straat) niet';
$string['canbecredit'] = 'Kan teruggestort worden op {$a->upto}';
$string['cancelled'] = 'Geannuleerd';
$string['capture'] = 'Aanvaardt';
$string['capturedpendingsettle'] = 'Aanvaard / Verwerking bezig';
$string['capturedsettled'] = 'Aanvaard / afgehandeld';
$string['captureyes'] = 'De kredietkaart wordt aanvaard en de leerling wordt in de cursus aangemeld. Ben je zeker?';
$string['cccity'] = 'Stad';
$string['ccexpire'] = 'Vervaldatum';
$string['ccexpired'] = 'De kredietkaart is vervallen';
$string['ccinvalid'] = 'Ongeldig kaartnummer';
$string['cclastfour'] = 'CC laatste vier';
$string['ccno'] = 'Kredietkaartnummer';
$string['ccstate'] = 'Staat';
$string['cctype'] = 'Kredietkaarttype';
$string['ccvv'] = 'Kaartverificatie';
$string['ccvvhelp'] = 'Kijk op de achterkant van de kaart (laatste 3 cijfers)';
$string['choosemethod'] = 'Als je de cursussleutel voor deze cursus kent, geef die dan in.<br />Indien je hem niet kent moet je betalen voor deze cursus.';
$string['chooseone'] = 'Vul één of beide velden in. Het wachtwoord wordt niet getoond.';
$string['cost'] = 'Prijs';
$string['costdefaultdesc'] = '<strong>In cursusinstellingen, geef -1 in</strong> om dit standaardprijs naar cursusprijsveld te gebruiken.';
$string['currency'] = 'Munteenheid';
$string['cutofftime'] = 'Transactie Cut-Off Time';
$string['cutofftimedesc'] = 'Transactie Cut-Off Time. Wanneer is de laatste transactie voor betaling opgenomen?';
$string['dataentered'] = 'Datum ingevoerd';
$string['delete'] = 'Vernietig';
$string['description'] = 'Met de Authorize.net module kun je betaalde cursussen inrichten via CC-providers. Er zijn twee manieren om de cursuskost in te stellen:
(1) een standaardprijs die je hier voor de hele site kunt instellen of (2) een cursusinstelling waar je de prijs voor iedere cursus individueel kunt vastleggen. De prijs per cursus gaat over de standaardprijs van de site.';
$string['echeckabacode'] = 'Bank ABA-nummer';
$string['echeckaccnum'] = 'Bank rekeningnummer';
$string['echeckacctype'] = 'Bank accounttype';
$string['echeckbankname'] = 'Banknaam';
$string['echeckbusinesschecking'] = 'Ondernemingscontrole';
$string['echeckchecking'] = 'Controleren';
$string['echeckfirslasttname'] = 'Bank rekeningeigenaar';
$string['echecksavings'] = 'Opgespaard';
$string['enrolenddate'] = 'Einddatum';
$string['enrolenddaterror'] = 'De einddatum kan niet vroeger dan de startdatum zijn';
$string['enrolname'] = 'Authorize.net Kredietkaart toegang';
$string['enrolperiod'] = 'Aanmeldingsduur';
$string['enrolstartdate'] = 'Startdatum';
$string['expired'] = 'Vervallen';
$string['expiremonth'] = 'Verval maand';
$string['expireyear'] = 'Verval jaar';
$string['firstnameoncard'] = 'Voornaam op kaart';
$string['haveauthcode'] = 'Ik heb al een authorisatiecode';
$string['howmuch'] = 'Hoe veel?';
$string['httpsrequired'] = 'Jammer, maar je aanvraag kan nu niet verwerkt worden. De instellingen van deze site konden niet juist gezet worden<br /><br />
Geef het nummer van je kredietkaart niet in voor je een geel hangslot onderaan je browser ziet. Dat betekent dat alle informatie die over internet verstuurd wordt, versleuteld is. Op die manier is de informatie tijdens de transactie beschermd en kan je kredietkaartnummer niet onderschept worden op het internet.';
$string['invalidaba'] = 'Ongeldig ABA nummer';
$string['invalidaccnum'] = 'Ongeldig rekeningnummer';
$string['invalidacctype'] = 'Ongeldig accounttype';
$string['isbusinesschecking'] = 'Wordt de onderneming gecontroleerd?';
$string['lastnameoncard'] = 'Achternaam op kaart';
$string['logindesc'] = 'Deze optie moet AAN staan.<br /><br />
Je kunt de optie <a href="{$a->url}">loginhttps</a> instellen in de sectie Variablen/Veiligheid.
<br /><br />
Door die instelling te gebruiken zal Moodle een veilige https-connectie maken voor de aanmelding- en betalingspagina\'s.';
$string['logininfo'] = 'Wanneer je je Authorize.Net-account configureert, dan heb je de login naam nodig en moet je <strong>ofwel</strong> de transactiesleutel<strong> of</strong> het wachtwoord in het juiste veld invullen. We raden aan om de transactiesleutel te gebruiken om veiligheidsredenen.';
$string['messageprovider:authorize_enrolment'] = 'Aanmeldingsberichten Authorize.Net';
$string['methodcc'] = 'Kredietkaart';
$string['methodccdesc'] = 'Selecteer de geaccepteerde kredietkaarten hieronder';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'Selecteer eCheck en de geaccepteerde types hieronder';
$string['missingaba'] = 'ABA-nummer ontbreekt';
$string['missingaddress'] = 'adres ontbreekt';
$string['missingbankname'] = 'Banknaam ontbreekt';
$string['missingcc'] = 'Kaartnummer  ontbreekt';
$string['missingccauthcode'] = 'Authorisatiecode ontbreekt';
$string['missingccexpiremonth'] = 'Maand ontbreekt';
$string['missingccexpireyear'] = 'Jaar ontbreekt';
$string['missingcctype'] = 'kaarttype  ontbreekt';
$string['missingcvv'] = 'verificatienummer  ontbreekt';
$string['missingzip'] = 'postcode  ontbreekt';
$string['mypaymentsonly'] = 'Toon alleen mijn betalingen';
$string['nameoncard'] = 'naam op de kaart';
$string['new'] = 'Nieuw';
$string['nocost'] = 'Er zijn geen kosten verbonden aan het aanmleden in deze cursus via Authorize.Net!';
$string['noreturns'] = 'geen teruggave!';
$string['notsettled'] = 'Niet betaald';
$string['orderdetails'] = 'Details bestelling';
$string['orderid'] = 'Bestelnummer';
$string['paymentmanagement'] = 'Beheer betalingen';
$string['paymentmethod'] = 'Betalingsmethode';
$string['paymentpending'] = 'Je betaling voor deze cursus wordt verwerkt met dit bestelnummer: {$a->orderid}. Zie <a href=\'{$a->url}\'>Order Details</a>.';
$string['pendingecheckemail'] = 'Beste manager,

Er zijn nu {$a->count} wachtende echecks en je moet een CSV-bestand uploaden om de gebruikers aangemeld te krijgen.

Volg de link en lees het helpbestand op pagina {$a->url}';
$string['pendingechecksubject'] = '{$a->course}:; Wachtende eChecks ({$a->count})';
$string['pendingordersemail'] = 'Beste beheerder,

{$a->pending} transacties voor cursus "{$a->course}" zullen vervallen tenzij je de betaling aanvaardt binnen {$a->days} dagen.

Dit is een waarschuwing omdat je automatische aanvaarding niet ingeschakeld hebt. Dat betekent dat je de betalingen manueel moet aanvaarden of weigeren.

Om betalingen te aanvaarden of te weigeren ga je naar {$a->url}

Om automatische aanvaarding van betalingen in te schakelen ga je naar {$a->enrolurl}. Dat betekent dat je geen waarschuwings e-mails meer zult krijgen.';
$string['pendingordersemailteacher'] = 'Beste leraar,

{$a->pending} transacties voor de prijs van {$a->currency} {$a->sumcost} voor cursus "{$a->course}" zullen vervallen tenzij je de betaling binnen de {$a->days} dagen accepteerd.

Je moet manueel betalingen accepteren en weigeren omdat de beheerder de automatische aanvaarding niet ingeschakeld heeft.

{$a->url}';
$string['pendingorderssubject'] = 'WAARSCHUWING: {$a->course}, {$a->pending} bestelling(en) zullen vervallen binnen de {$a->days} dag(en)';
$string['pluginname'] = 'Authorize.net';
$string['reason11'] = 'Deze transactie is dubbel ingestuurd';
$string['reason13'] = 'De login ID van de handelaar is niet geldig of de account is niet actief.';
$string['reason16'] = 'De transactie is niet gevonden';
$string['reason17'] = 'De handelaar accepteert dit type kredietkaart niet.';
$string['reason245'] = 'Dit type eCheck is niet toegelaten als je het betalingsformulier voor deze betalingsgateway gebruikt.';
$string['reason246'] = 'Dit type eCheck is niet toegelaten';
$string['reason27'] = 'De transactie resulteerde in een AVS-probleem. Het gegeven adres klopt niet met het adres van de kaarthouder.';
$string['reason28'] = 'De handelaar accepteert dit type kredietkaart niet.';
$string['reason30'] = 'De configuratie met de processor is niet geldig. Bel de Merchant Service Provider.';
$string['reason39'] = 'De opgegeven munteenheidscode is ofwel niet geldig, niet ondersteund, niet toegelaten door deze handelaar of heeft geen wisselkoers.';
$string['reason43'] = 'De handelaar is niet juist ingesteld bij de processor. Bel de Merchant Service Provider.';
$string['reason44'] = 'De transactie is afgewezen. Kaart code filterfout!';
$string['reason45'] = 'Deze transactie is afgewezen. Kaart code/AVS filterfout!';
$string['reason47'] = 'Het opgevraagde betalingsbedrag mag niet groter zijn dan het toegestane bedrag.';
$string['reason5'] = 'Geldig bedrag invullen';
$string['reason50'] = 'De transactie wacht op betaling en kan niet teruggestort worden.';
$string['reason51'] = 'De som van alle krediet tegenover deze transactie is groter dan de oorspronkelijke transactiehoeveelheid.';
$string['reason54'] = 'De referentietransactie komt niet overeen met de criteria om een krediet op te vragen.';
$string['reason55'] = 'De som van de kredieten tegenover de referentietransactie zou het oorspronkelijke debetbedrag overschrijden.';
$string['reason56'] = 'De handelaar accepteert alleen eCheck (ACH)-transacties. Er worden geen kredietkaarten aanvaard.';
$string['refund'] = 'Terugstorten';
$string['refunded'] = 'Teruggestort';
$string['returns'] = 'Teruggave';
$string['reviewfailed'] = 'Nakijken mislukt';
$string['reviewnotify'] = 'Je betaling zal bekeken worden. Verwacht binnen enkele dagen een e-mail van je leraar.';
$string['sendpaymentbutton'] = 'Stuur betaling';
$string['settled'] = 'Betaald';
$string['settlementdate'] = 'Betalingsdatum';
$string['shopper'] = 'Klant';
$string['status'] = 'Authorize.net aanmeldingen toestaan';
$string['subvoidyes'] = 'De teruggestortte transactie ({$a->transid}) gaat geannuleerd worden en dat zal het crediteren van {$a->amount} op jouw rekening veroorzaken. Ben je zeker?';
$string['tested'] = 'Getest';
$string['testmode'] = '[TESTMODUS]';
$string['testwarning'] = 'Aanvaarden/weigeren/terugbetalen schijnt te werken in testmodus, maar er is geen enkele record geüpdated of toegevoegd aan de databank.';
$string['transid'] = 'TransactieID';
$string['underreview'] = 'Wordt nagekeken';
$string['unenrolselfconfirm'] = 'Wil je echt jezelf afmelden van cursus "{$a}"';
$string['unenrolstudent'] = 'Leerling afmelden?';
$string['uploadcsv'] = 'Upload een CSV-bestand';
$string['usingccmethod'] = 'Gebruik van <a href="{$a->url}"><strong>Credit Card</strong></a> voor aanmelding';
$string['usingecheckmethod'] = 'Gebruik van <a href="{$a->url}"><strong>eCheck</strong></a> voor aanmelding';
$string['verifyaccount'] = 'Controleer je authorize.net handelaarsaccount';
$string['verifyaccountresult'] = '<b>Verificatieresultaat:</b> {$a}';
$string['void'] = 'Geannuleerd';
$string['voidyes'] = 'Transactie zal geannuleerd worden. Wil je dat echt?';
$string['welcometocoursesemail'] = 'Beste {$a->name},

Bedankt voor je betaling. Je bent aangemeld in deze cursussen:

{$a->courses}

Je kunt je betalingsdetails bekijken of je profiel bewerken:
{$a->paymenturl}
{$a->profileurl}';
$string['youcantdo'] = 'Deze actie kun je niet doen: {$a->action}';
$string['zipcode'] = 'Postcode';
