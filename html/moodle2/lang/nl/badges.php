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
 * Strings for component 'badges', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acties';
$string['activate'] = 'Toegang inschakelen';
$string['activatesuccess'] = 'De toegang tot de badges is met succes ingeschakeld.';
$string['addbadgecriteria'] = 'Voeg badge criteria toe';
$string['addcourse'] = 'Voeg cursussen toe';
$string['addcourse_help'] = 'Selecteer alle cursussen die bij de vereisten voor deze badge horen. Hou de CTRL-toets ingedrukt om er meerdere te selecteren.';
$string['addcriteria'] = 'Voeg criteria toe';
$string['addcriteriatext'] = 'Selecteer één van de opties in het rolmenu om criteria toe te voegen.';
$string['addtobackpack'] = 'Voeg toe aan backpack';
$string['adminonly'] = 'Deze pagina is enkel toegankelijk voor site-beheerders.';
$string['after'] = 'na de datum van uitgifte.';
$string['aggregationmethod'] = 'Aggregatiemethode';
$string['all'] = 'Alle';
$string['allmethod'] = 'Er is aan alle geselecteerde voorwaarden voldaan.';
$string['allmethodactivity'] = 'Alle geselecteerde activiteiten zijn voltooid.';
$string['allmethodcourseset'] = 'Alle geselecteerde cursussen zijn voltooid.';
$string['allmethodmanual'] = 'Alle geselecteerde rollen krijgen de badge.';
$string['allmethodprofile'] = 'Alle geselecteerde profielvelden zijn aangevuld.';
$string['allowcoursebadges'] = 'Cursus-badges inschakelen';
$string['allowcoursebadges_desc'] = 'Toestaan om badges te maken en toe te kennen op cursusniveau.';
$string['allowexternalbackpack'] = 'Verbinding naar externe backpacks inschakelen';
$string['allowexternalbackpack_desc'] = 'Sta gebruikers toe om verbindingen op te zetten en badges te tonen van hun externe backpackproviders.

Opmerking: aangeraden wordt om deze optie uitgeschakeld te laten als de site niet bereikbaar is vanaf het internet (bijvoorbeeld door een firewall).';
$string['any'] = 'Gelijk welke';
$string['anymethod'] = 'Aan gelijk welke van de geselecteerde voorwaarden is voldaan.';
$string['anymethodactivity'] = 'Gelijk welke van de geselecteerde activiteiten zijn voltooid.';
$string['anymethodcourseset'] = 'Gelijk welke van de geselecteerde cursussen is voltooid.';
$string['anymethodmanual'] = 'Gelijk welke van de geselecteerde rollen krijgt de badge.';
$string['anymethodprofile'] = 'Gelijk welke van de geselecteerde profielvelden is aangevuld.';
$string['attachment'] = 'Badge als bijlage bij bericht';
$string['attachment_help'] = 'Indien ingeschakeld kan een uitgereikte badge als bijlage in de e-mail naar de gebruiker om te downloaden. (E-mailbijlagen moeten ingeschakeld zijn in de Sitebeheer > Plugins > Berichtoutput > E-mail om deze optie te kunnen gebruiken.)';
$string['award'] = 'Badge toekennen';
$string['awardedtoyou'] = 'Uitgereikt aan mij';
$string['awardoncron'] = 'Toegang tot badges is met succes ingeschakeld. Er zijn teveel gebruikers die onmiddellijk een badge verdienen. Om de performantie van de site te garanderen zal deze actie wat tijd vragen om verwerkt te worden.';
$string['awards'] = 'Ontvangers';
$string['backpackavailability'] = 'Externe badge verificatie';
$string['backpackavailability_help'] = 'Een externe \'backpack service\' moet toegang kunnen krijgen tot je site, zodat wie van jou een badge gekregen heeft dit zou kunnen bewijzen.Je site blijkt niet toegankelijk te zijn. Dit betekent dat badges die ja al toegekend hebt of in de toekomst zult toekennen niet geverifieerd kunnen worden.

##Waarom zie ik dit bericht?

Misschien verhindert je firewall toegang van buiten je netwerk, is je site beveiligd met een wachtwoord of loopt de site van een computer die niet beschikbaar is van op internet (zoals een lokale ontwikkelmachine).

##Is dit een probleem?

Je moet dit oplossen op een productie-site als je van plan bent om badges uit te reiken, anders zullen de ontvangers ervan niet kunnen bewijzen dat ze de badges bij jou verdient hebben. Als je site nog niet live is, dan kun je testbadges maken en uitreiken, zo lang je er maar voor zorgt dat je site bereikbaar is zodra je live gaat.

##Wat als ik mijn hele site niet kan publiek beschikbaar maken?

De enige URL die nodig is voor verificatie is [your-site-url]/badges/assertion.php. Als je je firewall wijzigt zodat die URL toegankelijk is, dan zal badge verificatie werken.';
$string['backpackbadges'] = 'Je hebt {$a->totalbadges} badge(s) van {$a->totalcollections} collecties.
<a href="mybackpack.php">Wijzig backpack-instellingen</a>.';
$string['backpackconnection'] = 'Backpack connectie';
$string['backpackconnection_help'] = 'Via deze pagina kun je een verbinding instellen met een externe "backpack provider". Door te verbinden met een backpack kun je externe badges tonen op deze site en kun je badges die hier verdiend zijn naar je backpack duwen.

Op dit moment wordt enkel <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a> ondersteund. Je moet inschrijven op de backpack service voor je een backpackconnectie kunt opzetten op deze pagina.';
$string['backpackdetails'] = 'Backpack instellingen';
$string['backpackemail'] = 'E-mailadres';
$string['backpackemail_help'] = 'E-mailadres dat met je backpack geassocieerd is.
Als je verbindt worden alle badges die je op deze site verdient gekoppeld aan dit e-mailadres.';
$string['backpackimport'] = 'Badge import instellingen';
$string['backpackimport_help'] = 'Nadat de backpack-verbinding gelukt is, kunnen badges uit je backpack getoond worden op jouw "Mijn Badges" - pagina en je profielpagina.

In deze zone kun je collecties van badges kiezen uit je backpack de je wil tonen op je profiel.';
$string['badgedetails'] = 'Badgedetails';
$string['badgeimage'] = 'Afbeelding';
$string['badgeimage_help'] = 'Deze afbeelding zal gebruikt worden wanneer deze badge uitgereikt wordt.

Om een nieuwe afbeelding toe te voegen, blader en selecteer je een afbeelding (in jpg- of png-formaat) en klik op "Bewaar wijzigingen". De afbeelding zal bijgesneden worden tot een vierkant en herschaald worden tot de vereisten van een badge-afbeelding.';
$string['badgeprivacysetting'] = 'Badge privacy-instellingen';
$string['badgeprivacysetting_help'] = 'De badges die je verdient hebt kunnen getoond worden op de profielpagina van je account. Met deze instelling kun je de zichtbaarheid van de nieuw verdiende badges instellen.

Je kunt de privacy-instellingen van elke individuele badge nog steeds wijzigen via je "Mijn badges"- pagina.';
$string['badgeprivacysetting_str'] = 'Toon de badges die ik verdiend heb automatisch op mijn profielpagina';
$string['badgesalt'] = 'Salt om de e-mailadressen van de ontvangers te versleutelen.';
$string['badgesalt_desc'] = 'Door een hash kan de backpack service de e-mailadressen versleutelen en wordt het mogelijk om de backpack service de badge te laten bevestigen zonder een e-mailadres te moeten vrijgeven. Deze instelling mag alleen getallen en letters bevatten.

Opmerking: om de verificatie van de ontvanger mogelijk te maken, mag je deze instelling niet meer wijzigen eens je begint badges uit te geven.';
$string['badgesdisabled'] = 'Badges zijn niet ingeschakeld op deze site.';
$string['badgesearned'] = 'Aantal verdiende badges: {$a}';
$string['badgesettings'] = 'Instellingen badges';
$string['badgestatus_0'] = 'Niet beschikbaar voor gebruikers';
$string['badgestatus_1'] = 'Beschikbaar voor gebruikers';
$string['badgestatus_2'] = 'Niet beschikbaar voor gebruikers';
$string['badgestatus_3'] = 'Beschikbaar voor gebruikers';
$string['badgestatus_4'] = 'Gearchiveerd';
$string['badgestoearn'] = 'Aantal beschikbare badges: {$a}';
$string['badgesview'] = 'Cursusbadges';
$string['badgeurl'] = 'Link naar uitgegeven badges';
$string['bawards'] = 'Ontvangers ({$a})';
$string['bcriteria'] = 'Criteria';
$string['bdetails'] = 'Bewerk details';
$string['bmessage'] = 'Bericht';
$string['boverview'] = 'Overzicht';
$string['bydate'] = 'voltooien door';
$string['clearsettings'] = 'Instellingen wissen';
$string['completioninfo'] = 'Deze badge was uitgegeven voor het voltooien van:';
$string['completionnotenabled'] = 'Cursus voltooien is niet ingeschakeld voor deze cursus, dus dat kan niet als badge criterium dienen. Je kunt curus voltooien inschakelen in de curusinstellingen.';
$string['configenablebadges'] = 'Wanneer ingeschakeld kun je met deze functie badges maken en die uitdelen aan je site-gebruikers.';
$string['configuremessage'] = 'Badge bericht';
$string['connect'] = 'Verbind';
$string['connected'] = 'Verbonden';
$string['connecting'] = 'Verbinden...';
$string['contact'] = 'Contact';
$string['contact_help'] = 'Een e-mailadres dat geassocieerd is met de uitgever van de badge.';
$string['copyof'] = 'Kopie van {$a}';
$string['coursebadges'] = 'Badges';
$string['coursebadgesdisabled'] = 'Cursusbadges zijn niet ingeschakeld voor deze site.';
$string['coursecompletion'] = 'Leerlingen moeten deze cursus voltooien.';
$string['create'] = 'Nieuwe badge';
$string['createbutton'] = 'Maak badge';
$string['creatorbody'] = '<p>{$a->user} heeft aan alle criteria voor een badge voldaan en de badge is aan hem uitgereikt. Bekijk de uitgereikte badge op  {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' is bekroond!';
$string['criteria_0'] = 'De badge wordt toegekend als ...';
$string['criteria_1'] = 'Activieteiten voltooien';
$string['criteria_1_help'] = 'Maakt het mogelijk een badge toe te kennen gebaseerd op het voltooien van een aantal activiteiten binnen een cursus.';
$string['criteria_2'] = 'Manueel uitgeven door rol';
$string['criteria_2_help'] = 'Maakt het mogelijk om manueel een badge uit te reiken door gebruikers met deze rol binnen de site of cursus.';
$string['criteria_3'] = 'Sociale deelname';
$string['criteria_3_help'] = 'Sociaal';
$string['criteria_4'] = 'Cursus voltooien';
$string['criteria_4_help'] = 'Maakt het mogelijk een badge toe te kennen aan gebruikers die een cursus voltooid hebben. Dit criterium kan meerdere bijkomende parameters hebben, zoals een miniumum cijfer en een datum van cursus voltooien.';
$string['criteria_5'] = 'Voltooien van een reeks cursussen';
$string['criteria_5_help'] = 'Maakt het mogelijk een badge toe te kennen aan gebruikers die een reeks cursussen voltooid hebben. Elke cursus kan bijkomende parameters hebben, zoals een minimumcijfer en een datum voor voltooien van een cursus.';
$string['criteria_6'] = 'Profiel vervolledigen';
$string['criteria_6_help'] = 'Hiermee kan een badge aan gebruikers worden toegekend voor het invullen van bepaalde velden in hun profiel. U kunt kiezen uit standaard en aangepaste profiel velden die beschikbaar zijn voor gebruikers.';
$string['criteriacreated'] = 'Badge criteria aanmaken gelukt';
$string['criteriadeleted'] = 'Badge criteria verwijderen gelukt';
$string['criteria_descr'] = 'Gebruikers krijgen deze badge als ze aan volgende criteria voltooien:';
$string['criteria_descr_0'] = 'Gebruikers krijgen deze badge als ze <strong>{$a}</strong> van de criteria in de lijst voltooien.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> van volgende activiteiten zijn voltooid.';
$string['criteria_descr_2'] = 'Deze badge moet uitgerijkt worden aan gebruikers met <strong>{$a}</strong> van volgende rollen:';
$string['criteria_descr_4'] = 'Gebruikers moeten de cursus voltooien';
$string['criteria_descr_5'] = '<strong>{$a}</strong> van onderstaande cursussen zijn voltooid.';
$string['criteria_descr_6'] = '<strong>{$a}</strong> van onderstaande gebruikersvelden moeten aangevuld worden:';
$string['criteria_descr_bydate'] = 'door <em>{$a}</em>';
$string['criteria_descr_grade'] = 'met als minimumcijfer <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Voltooi <strong>{$a}</strong> van:';
$string['criteria_descr_short1'] = 'Voltooi <strong>{$a}</strong> van:';
$string['criteria_descr_short2'] = 'Uitgereikt door <strong>{$a}</strong> van:';
$string['criteria_descr_short4'] = 'Voltooi de cursus';
$string['criteria_descr_short5'] = 'Voltooi <strong>{$a}</strong> van:';
$string['criteria_descr_short6'] = 'Voltooi <strong>{$a}</strong> van:';
$string['criteria_descr_single_1'] = 'Volgende activiteit moet voltooid worden:';
$string['criteria_descr_single_2'] = 'Deze badge moet uitgereikt worden aan een gebruiker met volgende rol:';
$string['criteria_descr_single_4'] = 'Gebruikers moeten deze cursus voltooien.';
$string['criteria_descr_single_5'] = 'Volgende cursus moet voltooid worden:';
$string['criteria_descr_single_6'] = 'Volgend gebruikersprofielveld moet aangevuld worden:';
$string['criteria_descr_single_short1'] = 'Voltooid:';
$string['criteria_descr_single_short2'] = 'Uitgereikt door:';
$string['criteria_descr_single_short4'] = 'Voltooi de cursus';
$string['criteria_descr_single_short5'] = 'Voltooid:';
$string['criteria_descr_single_short6'] = 'Voltooid:';
$string['criteriasummary'] = 'Samenvatting criteria:';
$string['criteriaupdated'] = 'Badge criteria aanpassen gelukt';
$string['criterror'] = 'Huidige parameterproblemen';
$string['criterror_help'] = 'Deze set velden toont alle parameters die initieel aan deze badge als vereiste gekoppeld waren, maar die niet langer beschikbaar zijn. Aangeraden wordt dat je zulke parameters deselecteerd, zodat het behalen van een badge voor gebruikers toch nog mogelijk is.';
$string['currentimage'] = 'Huidige afbeelding';
$string['currentstatus'] = 'Huidige status:';
$string['dateawarded'] = 'Uitgavedatum';
$string['dateearned'] = 'Datum: {$a}';
$string['day'] = 'Dag(en)';
$string['deactivate'] = 'Toegang uitschakelen';
$string['deactivatesuccess'] = 'Toegang tot badges uitschakelen gelukt.';
$string['defaultissuercontact'] = 'Contactgegevens van de standaard badge uitgever';
$string['defaultissuercontact_desc'] = 'Een e-mailadres dat verbonden is met de uitgever van de badge.';
$string['defaultissuername'] = 'Naam van de standaard badge uitgever';
$string['defaultissuername_desc'] = 'Naam van de uitgevende instantie of autoriteit.';
$string['delbadge'] = 'Verwijder badge';
$string['delconfirm'] = 'Weet je zeker dat je badge \'{$a} wil verwijderen?';
$string['delcritconfirm'] = 'Weet je zeker dat je dit criterium wil verwijderen?';
$string['delparamconfirm'] = 'Weet je zeker dat je deze parameter wil verwijderen?';
$string['description'] = 'Beschrijving';
$string['disconnect'] = 'Verbinding verbreken';
$string['donotaward'] = 'Op dit ogenblik is deze badge niet actief. Ze kan dus niet aan gebruikers uitgereikt worden. Als je ze wil uitreiken, zet de status dan op actief.';
$string['editsettings'] = 'Bewerk instellingen';
$string['enablebadges'] = 'Badges inschakelen';
$string['error:backpackdatainvalid'] = 'De terugkerende data van het backpack was niet geldig.';
$string['error:backpackemailnotfound'] = 'Het e-mailadres \'{$a} is niet verbonden aan een backpack. Je moet  <a href="http://backpack.openbadges.org">een backpack voor die account aanmaken</a> of inschrijven met een ander e-mailadres';
$string['error:backpackloginfailed'] = 'Je kon niet verbonden worden met een externe backpack om volgende reden: {$a}';
$string['error:backpacknotavailable'] = 'Je site is niet toegankelijk vanaf het internet. Badges die door deze site uitgegeven worden kunnen niet gecontroleerd worden door een externe backpackservice.';
$string['error:backpackproblem'] = 'Er was een probleem met het verbinden met je backpack service. Probeer later nog eens.';
$string['error:badjson'] = 'De connectiepoging gaf ongeldige gegevens terug.';
$string['error:cannotact'] = 'Kan de badge niet activeren.';
$string['error:cannotawardbadge'] = 'Kan de badge niet uitreiken aan de gebruiker.';
$string['error:clone'] = 'Kan de badge niet klonen.';
$string['error:connectionunknownreason'] = 'De connectie is mislukt, maar er is geen reden opgegeven.';
$string['error:duplicatename'] = 'Er bestaat al een badge met die naam in het systeem.';
$string['error:externalbadgedoesntexist'] = 'Badge niet gevonden';
$string['error:guestuseraccess'] = 'Je gebruikt nu de gastaccount. Om badges te kunnen zien, moet je aangemeld zijn met je gebruikersaccount.';
$string['error:invalidbadgeurl'] = 'Ongeldig URL-formaat van de badge-uitgever.';
$string['error:invalidcriteriatype'] = 'Ongeldig criterium type';
$string['error:invalidexpiredate'] = 'Vervaldag moet in de toekomst liggen.';
$string['error:invalidexpireperiod'] = 'Vervalperiode kan nooit negatief of 0 zijn.';
$string['error:noactivities'] = 'Er zijn geen activiteiten met voltooiingscriteria in deze cursus.';
$string['error:noassertion'] = 'Persona heeft je niet herkend. Je hebt misschien het dialoogvenster gesloten voor het login-proces klaar was.';
$string['error:nocourses'] = 'Cursus voltooien is voor geen enkele cursus op deze site  ingeschakeld. Er kunnen er dus geen getoond worden. Cursus voltooien kan ingeschakeld worden in de cursusinstellingen.';
$string['error:nogroups'] = '<p>Er zijn geen publieke badges beschikbaar in je backpack.</p>
<p>Alleen openbare collecties worden getoond.  <a href="http://backpack.openbadges.org">Bezoek je backpack</a> om openbare collecties te maken.';
$string['error:nopermissiontoview'] = 'Je hebt het recht niet om badge ontvangers te bekijken.';
$string['error:nosuchbadge'] = 'Badge met id {$a} bestaat niet.';
$string['error:nosuchcourse'] = 'Waarschuwing: deze cursus is niet langer beschikbaar.';
$string['error:nosuchfield'] = 'Waarschuwing: dit gebruikersprofielveld is niet langer beschikbaar.';
$string['error:nosuchmod'] = 'Waarschuwing: deze activiteit is niet langer beschikbaar.';
$string['error:nosuchrole'] = 'Waarschuwing: deze rol is niet langer beschikbaar.';
$string['error:nosuchuser'] = 'De gebruiker met dit e-mailadres heeft geen account bij de huidige backpackprovider.';
$string['error:notifycoursedate'] = 'Waarschuwing: badges die verbonden zijn met cursusactiviteit en activiteit voltooien, zullen niet uitgereikt worden voor de cursus startdatum.';
$string['error:parameter'] = 'Waarschuwing: minstens één parameter moet geselecteerd worden om het correct uitreiken van badges te garanderen.';
$string['error:personaneedsjs'] = 'Er is Javascript nodig om te verbinden met je backpackprovider. Indien mogelijk: schakel Javascript in en herlaad de pagina.';
$string['error:requesterror'] = 'De verbindingsaanvraag is mislukt (foutcode {$a} ).';
$string['error:requesttimeout'] = 'De tijd voor de verbindingsaanvraag is verlopen.';
$string['error:save'] = 'Kan de badge niet bewaren.';
$string['error:userdeleted'] = '{$a->user} (Deze gebruiker bestaat niet meer in {$a->site})';
$string['evidence'] = 'Bewijs';
$string['existingrecipients'] = 'Bestaande badge ontvangers';
$string['expired'] = 'Verlopen';
$string['expiredate'] = 'Deze badge verloopt op {$a}.';
$string['expireddate'] = 'Deze badge is verlopen op {$a}.';
$string['expireperiod'] = 'Deze badge verloopt {$a} dagen nadat ze is uitgereikt.';
$string['expireperiodh'] = 'Deze badge verloopt {$a} uur nadat ze uitgereikt is.';
$string['expireperiodm'] = 'Deze badge verloopt {$a} minuten nadat ze uitgereikt is.';
$string['expireperiods'] = 'Deze badge verloopt {$a} seconden nadat ze uitgereikt is.';
$string['expirydate'] = 'Vervaldatum';
$string['expirydate_help'] = 'Badges kunnen optioneel vervallen op een bepaalde datum of de datum kan berekend worden uit de datum wanneer de badge uitgereikt was aan de gebruiker.';
$string['externalbadges'] = 'Mijn badges van andere websites';
$string['externalbadges_help'] = 'Deze zone toont badges van je extern backpack.';
$string['externalbadgesp'] = 'Badges van andere sites:';
$string['externalconnectto'] = 'Om externe badges te kunnen tonen, moet je <a href="{$a}">verbinden met een backpack</a>.';
$string['fixed'] = 'Vaste datum';
$string['hidden'] = 'Verborgen';
$string['hiddenbadge'] = 'De badge-eigenaar heeft deze informatie niet beschikbaar gemaakt.';
$string['issuancedetails'] = 'Badge verloopt';
$string['issuedbadge'] = 'Badge informatie';
$string['issuerdetails'] = 'Details uitgever';
$string['issuername'] = 'Naam uitgever';
$string['issuername_help'] = 'Naam van de uitgevende agent of authoriteit';
$string['issuerurl'] = 'URL uitgever';
$string['localbadges'] = 'Mijn badges van website {$a}';
$string['localbadgesh'] = 'Mijn badges van deze website';
$string['localbadgesh_help'] = 'Alle badges die op deze website verdiend worden door het vervolledigen van cursussen, cursusactiviteiten en andere criteria.

Je kunt je badges hier beheren door ze openbaar of privé te maken op je profielpagina.

Je kunt al je badges samen of individueel downloaden en ze bewaren op je computer. Gedownloade badges kunnen aan je externe backpack-service toegevoegd worden.';
$string['localbadgesp'] = 'Badges van {$a}:';
$string['localconnectto'] = 'Om deze badges te delen buiten deze website, moet je <a href="{$a}">verbinding maken met een backpack</a>.';
$string['makeprivate'] = 'Maak privé';
$string['makepublic'] = 'Maak openbaar';
$string['managebadges'] = 'Beheer badges';
$string['message'] = 'Berichtinhoud';
$string['messagebody'] = '<p>Je hebt een badge "%badgename%" verdient!</p>
<p>Meer informatie over deze badge kun je vinden op %badgelink%.</p>
<p>Als er geen badge met deze e-mail verbonden is, dan kun je de badge beheren en downloaden van de pagina {$a}.</p>';
$string['messagesubject'] = 'Proficiat! Je hebt een badge verdient!';
$string['method'] = 'Dit crititerium is behaald als...';
$string['mingrade'] = 'Minimum vereist cijfer';
$string['month'] = 'Maand(en)';
$string['mybackpack'] = 'Mijn backpack instellingen';
$string['mybadges'] = 'Mijn badges';
$string['never'] = 'Nooit';
$string['newbadge'] = 'Voeg een nieuwe badge toe';
$string['newimage'] = 'Nieuwe afbeelding';
$string['noawards'] = 'Deze badge is nog niet verdiend.';
$string['nobackpack'] = 'Er is geen backpack-service gekoppeld aan deze account.<br />';
$string['nobackpackbadges'] = 'Er zijn geen badges in de collecties die je geselecteerd hebt. <a href="mybackpack.php">Voeg meer collecties toe</a>.';
$string['nobackpackcollections'] = 'Er is geen badge-collectie geselecteerd. <a href="mybackpack.php">Voeg collecties toe</a>.';
$string['nobadges'] = 'Er zijn geen badges beschikbaar.';
$string['nocriteria'] = 'Criteria voor deze badge zijn nog niet opgesteld.';
$string['noexpiry'] = 'Deze badge heeft geen vervaldatum';
$string['noparamstoadd'] = 'Er zijn geen bijkomende parameters beschikbaar om aan de criteria van deze badge toe te voegen';
$string['notacceptedrole'] = 'Je huidige rol behoort niet tot die rollen die een badge manueel kan toevoegen.<br />
Als je wil zien wie al een badge verdient heeft, dan kan je volgende pagina bezoeken: {$a}';
$string['notconnected'] = 'Niet verbonden';
$string['nothingtoadd'] = 'Er zijn geen criteria beschikbaar om toe te voegen';
$string['notification'] = 'Waarschuw ontwerper van de badge';
$string['notification_help'] = 'Deze instelling beheert de meldingen die naar een badge-ontwerper gestuurd worden als de badge wordt uitgereikt.

Volgende opties zijn mogelijk:
* **NOOIT** - Stuur geen meldingen
* **ELKE KEER** - Stuur een bericht telkens de badge wordt uitgereikt.
* **DAGELIJKS** - Stuur één keer per dag een bericht.
* **WEKELIJKS** - Stuur één bericht per week.
* **MAANDELIJKS** - Stuur één bericht per maand.';
$string['notifydaily'] = 'Dagelijks';
$string['notifyevery'] = 'Elke keer';
$string['notifymonthly'] = 'Maandelijks';
$string['notifyweekly'] = 'Wekelijks';
$string['numawards'] = 'Deze badge is uitgereikt aan <a href="{$a->link}">{$a->count}</a> gebruiker(s).';
$string['numawardstat'] = 'Deze badge is uitgereikt aan {$a} gebruiker(s)';
$string['overallcrit'] = 'van de geselecteerde criteria zijn voltooid.';
$string['personaconnection'] = 'Meldt je aan met je e-mailadres';
$string['personaconnection_help'] = 'Persona is een systeem waarmee je je kunt identificeren op het internet, waarbij je gebruikt maakt van je eigen e-mailadres. Open Badges backpack gebruikt Persona als aanmeldingssysteem. Om daarmee te kunnen verbinden, heb je dus een Persona-account nodig.';
$string['potentialrecipients'] = 'Mogelijke badge-ontvangers';
$string['recipientdetails'] = 'Details ontvanger';
$string['recipientidentificationproblem'] = 'Can geen ontvanger van deze badge vinden tussen de bestaande gebruikers.';
$string['recipients'] = 'Badge-ontvangers';
$string['recipientvalidationproblem'] = 'Huidige gebruiker van niet geverifieerd worden als een ontvanger van deze badge.';
$string['relative'] = 'Relatieve datum';
$string['requiredcourse'] = 'Minstens één cursus moet toegevoegd worden aan het cursusset criterium.';
$string['reviewbadge'] = 'Wijzigingen in badge toegang';
$string['reviewconfirm'] = '<p>Dit maakt jouw badges zichtbaar voor gebruikers en hierdoor kunnen ze beginnen ze te verdienen.</p>

<p>Het zou kunnen dat sommige gebruikers al aan de criteria voldoen en onmiddellijk een badge uitgereikt krijgen nadat je dit ingeschakeld hebt.</p>

<p>Als er een badge uitgereikt is, dan wordt die geblokkeerd - sommige instellingen zoals de criteria en de verloopdatum kan dan niet meer gewijzigd worden.</p>

<p>Weet je zeker dat je toegang tot badge \'{$a}\' wil inschakelen?</p>';
$string['save'] = 'Bewaar';
$string['searchname'] = 'Zoek op naam';
$string['selectaward'] = 'Kies de rol die je wil gebruiken om de badge uit te reiken:';
$string['selectgroup_end'] = 'Alleen openbare collecties worden getoond. <a href="http://backpack.openbadges.org">Bezoek je backpack</a> om meer openbare collecities te maken.';
$string['selectgroup_start'] = 'Selecteer collecties van je backpack om op deze site te tonen:';
$string['selecting'] = 'Met geselecteerde badges...';
$string['setup'] = 'Maak verbinding';
$string['signinwithyouremail'] = 'Aanmelden met je e-mail';
$string['sitebadges'] = 'Site-badges';
$string['sitebadges_help'] = 'Site badges kunnen alleen aan gebruikers gegeven worden voor site gerelateerde activiteiten. Dit kan het voltooien van een aantal cursussen zijn of het invullen van je gebruikersprofiel. Site badges kunnen ook manueel gegeven worden door een gebruiker.

Badges voor cursusgerelateerde activiteiten moeten gemaakt worden op cursusniveau. Cursusbadges kunnen gevonden worden onder Cursusbeheer -> Badges.';
$string['status'] = 'Badge status';
$string['status_help'] = 'De status van een badge bepaalt het gedrag dat er in het systeem aan gekoppeld is:

* **BESCHIKBAAR** - Betekent dat deze badge verdiend kan worden door gebruikers. Zolang een badge beschikbaar is voor gebruikers, kunnen de criteria niet gewijzigd worden.

* **NIET BESCHIKBAAR** * - Betekent dat deze badge niet beschikbaar is voor gebruikers en niet verdiend kan worden of handmatig toegekend. Als deze badge nog niet eerder is uitgegeven, kunnen de criteria gewijzigd worden.

Zodra een badge is uitgegeven aan tenminste één gebruiker, wordt deze automatisch **VASTGEZET**. Badges die zijn vastgezet, kunnen wel verdiend worden, maar de criteria kunnen niet meer gewijzigd worden. Als je criteria of informatie over een vastgezette badge wilt wijzigen, kun je de badge dupliceren en alle noodzakelijke wijzigingen invoeren.

*Waarom zetten we badges vast?*

We willen zeker stellen dat alle gebruikers aan dezelfde criteria voldoen om een badge te verdienen. Op dit moment is het niet mogelijk om badges te herroepen. Als we toestaan dat de eisen aan badges steeds aangepast kunnen worden, ontstaat er zeer waarschijnlijk een situatie waarin gebruikers dezelfde badge hebben verdiend, terwijl ze aan heel andere eisen hebben voldaan.';
$string['statusmessage_0'] = 'Deze badge is niet beschikbaar voor je gebruikers. Schakel toegang in als je wil dat gebruikers deze badge kunnen verdienen.';
$string['statusmessage_1'] = 'Deze badge is beschikbaar voor je gebruikers. Schakel toegang uit als je wijzigingen wil aanbrengen.';
$string['statusmessage_2'] = 'Deze badge is niet beschikbaar voor gebruikers en de criteria ervan zijn geblokkeerd. Schakel toegang in als je wil dat gebruikers deze badge kunnen verdienen.';
$string['statusmessage_3'] = 'Deze badge is beschikbaar voor gebruikers en de criteria zijn geblokkeerd.';
$string['statusmessage_4'] = 'Deze badge is gearchiveerd';
$string['subject'] = 'Bericht onderwerp';
$string['variablesubstitution'] = 'Variabele vervanging in berichten.';
$string['variablesubstitution_help'] = 'In een boodschap bij een badge kan een aantal variabelen ingevoerd worden in het onderwerp en/of de inhoud van de boodschap, zodat deze worden vervangen door de reële waarden op het moment dat de boodschap wordt verstuurd. De variabelen moeten exact gelijk aan de onderstaande regels in de tekst worden ingevoerd.

%badgename%
: Dit wordt vervangen door de volledige naam van de badge.

%username%
: Dit wordt vervangen door de volledige naam van de ontvanger.

%badgelink%
: Dit wordt vervangen door de publieke URL die leidt naar informatie over de uitgegeven badge.';
$string['viewbadge'] = 'Bekijk uitgereikte badges';
$string['visible'] = 'Zichtbaar';
$string['warnexpired'] = '(deze badge is verlopen!)';
$string['year'] = 'Jaar';
