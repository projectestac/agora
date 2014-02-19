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
 * Strings for component 'scorm', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activatie';
$string['activityloading'] = 'Je zult automatisch doorverwezen worden naar de activiteit in';
$string['activityoverview'] = 'Je hebt SCORM-pakketten na te kijken';
$string['activitypleasewait'] = 'Laden, even geduld aub ...';
$string['adminsettings'] = 'Beheerinstellingen';
$string['advanced'] = 'Parameters';
$string['aicchacpkeepsessiondata'] = 'AICC HACP sessiegegevens';
$string['aicchacpkeepsessiondata_desc'] = 'De tijdsduur in dagen dat de externe AICC HACP sessiedata worden bijgehouden (een hoge instelling zal de tabel vullen met oude data maar kan nuttig zijn bij het debuggen).';
$string['aicchacptimeout'] = 'AICC HACP timeout';
$string['aicchacptimeout_desc'] = 'De tijdsduur in minuten dat een externe AICC HACP sessie open kan blijven.';
$string['allowapidebug'] = 'Activeer API debug en tracing (zet het capture mask met apidebugmask)';
$string['allowtypeaicchacp'] = 'Schakel extern AICC HACP in';
$string['allowtypeaicchacp_desc'] = 'Indien ingeschakeld, staat dit AICC HACP extern communiceren toe zonder gebruikerslogin te vereisen voor post requests van het extern AICC-pakket';
$string['allowtypeexternal'] = 'Extern pakkettype inschakelen';
$string['allowtypeexternalaicc'] = 'Rechtstreekse AICC url inschakelen';
$string['allowtypeexternalaicc_desc'] = 'Indien ingeschakeld is een rechtstreekse URL naar een eenvoudig AICC-pakket toegestaan';
$string['allowtypeimsrepository'] = 'IMS pakkettype inschakelen';
$string['allowtypelocalsync'] = 'Gedownload pakkettype inschakelen';
$string['apidebugmask'] = 'API debug capture mask - gebruik een eenvoudige regex op &lt;username&gt;:&lt;activityname&gt; vb. admin:.* zal enkel voor gebruiker admin debuggen';
$string['areacontent'] = 'Inhoud bestanden';
$string['areapackage'] = 'Pakketbestanden';
$string['asset'] = 'Set';
$string['assetlaunched'] = 'Set - bekeken';
$string['attempt'] = 'Poging';
$string['attempt1'] = '1 poging';
$string['attempts'] = 'Pogingen';
$string['attemptstatusall'] = 'Mijn startpagina en ingangspagina';
$string['attemptstatusentry'] = 'Enkel op ingangspagina';
$string['attemptstatusmy'] = 'Enkel op Mijn startpagina';
$string['attemptsx'] = '{$a} pogingen';
$string['attr_error'] = 'Foute waarde voor attribuut ({$a->attr}) in tag {$a->tag}.';
$string['autocontinue'] = 'Ga automatisch verder';
$string['autocontinuedesc'] = 'Indien ingeschakeld worden opeenvolgende leerobjecten automatisch gestart. Anders moet de Ga verder-knop gebruikt worden.';
$string['autocontinue_help'] = '<p><b>Automatisch verdergaan</b></p>

<p>Als deze instelling op Ja staat, dan zal, wanneer een SCO en "close communication" methode aanroept, de volgende SCO automatisch starten.</p>

<p>Als dit op Nee staat, moeten de gebruikers op de "Ga verder"-knop klikken om verder te gaan.</p>';
$string['averageattempt'] = 'Gemiddelde van pogingen';
$string['badmanifest'] = 'Enkele belangrijke fouten: zie foutenlogboek';
$string['badpackage'] = 'Er zijn problemen met dit pakket. Controleer het en probeer nogmaals';
$string['browse'] = 'Voorproeven';
$string['browsed'] = 'Voorgeproefd';
$string['browsemode'] = 'Probeermodus';
$string['browserepository'] = 'Blader door de opslagruimte';
$string['cannotfindsco'] = 'Kon SCO niet vinden';
$string['chooseapacket'] = 'Kies of update een SCORM/AICC-pakket';
$string['completed'] = 'Volledig';
$string['completionscorerequired'] = 'Vereiste minimumscore';
$string['completionscorerequired_help'] = 'Het inschakelen van deze instelling zal er voor zorgen dat een gebruiker minstens de minimumscore moet behalen om deze SCORM-activiteit als voltooid te markeren, samen met eventuele andere vereisten voor Voltooide Activiteit.';
$string['completionstatus_completed'] = 'Voltooid';
$string['completionstatus_passed'] = 'Geslaagd';
$string['completionstatusrequired'] = 'Vereist status';
$string['completionstatusrequired_help'] = 'Het controleren van één of meerdere statussen zal er voor zorgen dat en gebruiker minstens één gecontroleerde status moet bereiken om deze SCORM-activiteit als voltooid te markeren, samen met eventuele andere vereisten voor Voltooide Activiteit.';
$string['confirmloosetracks'] = 'WAARSCHUWING: Dit pakket is blijkbaar gewijzigd of aangepast. Als de pakketstructuur is gewijzigd, dan zou het afgelegde leerpad van sommige gebruikers zou kunnen verloren gegaan zijn tijdens het updateproces.';
$string['contents'] = 'Inhoud';
$string['coursepacket'] = 'Cursuspakket';
$string['coursestruct'] = 'Cursusstructuur';
$string['currentwindow'] = 'Huidig venster';
$string['datadir'] = 'Fout van het bestandssysteem: de gegevensfolder van de cursus kan niet gemaakt worden';
$string['defaultdisplaysettings'] = 'Standaard scherminstellingen';
$string['defaultgradesettings'] = 'Standaard cijferinstellingen';
$string['defaultothersettings'] = 'Andere standaardinstellingen';
$string['deleteallattempts'] = 'Verwijder alle SCORM pogingen';
$string['deleteattemptcheck'] = 'Weet je zeker dat je al deze pogingen volledig wil verwijderen?';
$string['deleteuserattemptcheck'] = 'Weet je zeker dat je al jouw pogingen volledig wil verwijderen?';
$string['details'] = 'SCO opvolgdetails';
$string['directories'] = 'Toon de links naar mappen';
$string['disabled'] = 'Uitgeschakeld';
$string['display'] = 'Toon';
$string['displayattemptstatus'] = 'Toon pogingstatus';
$string['displayattemptstatusdesc'] = 'Of een samenvatting van de pogingen van de gebruiker getoond moeten worden op het cursusoverzichtsblok op Mijn startpagina en/of de startpagina van het SCORM-pakket.';
$string['displayattemptstatus_help'] = 'Hiermee wordt een samenvatting van de pogingen van de gebruiker getoond in het cursusoverzichtsblok in Mijn startpagina en/of de SCORM ingangspagina.';
$string['displaycoursestructure'] = 'Toon cursusstructuur op startpagina';
$string['displaycoursestructuredesc'] = 'Deze instelling regelt de standaardinstelling voor het tonen van de inhoudstafel op de startpagina van het SCORM-pakket.';
$string['displaycoursestructure_help'] = 'Indien ingeschakeld zal de inhoudstafel getoond worden op de SCORM beschrijvingspagina';
$string['displaydesc'] = 'Of SCORM-pakketten in een nieuw venster getoond moeten worden.';
$string['displaysettings'] = 'Scherminstellingen';
$string['dnduploadscorm'] = 'Voeg een SCORM-pakket toe';
$string['domxml'] = 'DOMXML externe bibliotheek';
$string['duedate'] = 'Klaar tegen';
$string['element'] = 'Element';
$string['elementdefinition'] = 'Element definitie';
$string['enter'] = 'Start';
$string['entercourse'] = 'Begin de SCORM/AICC-cursus';
$string['errorlogs'] = 'Foutenlogboek';
$string['everyday'] = 'Elke dag';
$string['everytime'] = 'Elke keer wanneer gebruikt';
$string['exceededmaxattempts'] = 'Je hebt het maximale aantal pogingen bereikt.';
$string['exit'] = 'Verlaat de cursus';
$string['exitactivity'] = 'Stop';
$string['expired'] = 'Sorry, deze activiteit is op {$a} gesloten en is niet langer beschikbaar';
$string['external'] = 'Timing update externe pakketten';
$string['failed'] = 'Mislukt';
$string['finishscorm'] = 'Je bent klaar met het bekijken van deze bron, {$a}';
$string['finishscormlinkname'] = 'klik hier om terug te keren naar de cursuspagina';
$string['firstaccess'] = 'Eerste toegang';
$string['firstattempt'] = 'Eerste poging';
$string['forcecompleted'] = 'Verplichte poging voltooid';
$string['forcecompleteddesc'] = 'Deze instelling regelt de standaard waarde voor het verplicht voltooien';
$string['forcecompleted_help'] = 'Indien ingeschakeld wordt de status van de huidige poging naar voltooid gezet. (Deze instelling is enkel toepasbaar op SCORM 1.2-pakketten.)';
$string['forcejavascript'] = 'Verplicht gebruikers om JavaScript in te schakelen';
$string['forcejavascript_desc'] = 'Indien ingeschakeld (aanbevolen) verhindert dit toegang tot SCORM-objecten wanneer JavaScript niet is ondersteund/ingeschakeld in de browser van een gebruiker.  Indien uitgeschakeld, dan kan de gebruiker de SCORM bekijken, maar de API-communicatie zal niet werken en er zal geen cijferinformatie bewaard worden.';
$string['forcejavascriptmessage'] = 'JavaScript is vereist om dit object te kunnen bekijken. Schakel JavaScript in in je browser en probeer opnieuw.';
$string['forcenewattempt'] = 'Verplicht nieuwe poging';
$string['forcenewattemptdesc'] = 'Indien ingeschakeld zal elke toegang tot het SCORM-pakket als een nieuwe poging geteld worden.';
$string['forcenewattempt_help'] = 'Indien ingeschakeld zal het opnieuw bezoeken van dit SCORM-pakket beschouwd worden als een nieuwe poging/';
$string['found'] = 'Manifest gevonden';
$string['frameheight'] = 'Met deze instelling kies je de hoogte van het frame of venster.';
$string['framewidth'] = 'Deze voorkeurinstelling is de standaardbreedte van het frame of venster.';
$string['fullscreen'] = 'Toon op volledig scherm';
$string['general'] = 'Algemene gegevens';
$string['gradeaverage'] = 'Gemiddeld cijfer';
$string['gradeforattempt'] = 'Beoordeling van de poging';
$string['gradehighest'] = 'Hoogste cijfer';
$string['grademethod'] = 'Beoordelingsmethode';
$string['grademethoddesc'] = 'De beoordelingsmethode definieert hoe het cijfer voor één enkele poging van de activiteit wordt bepaald.';
$string['grademethod_help'] = 'De beoordelingsmethode legt vast hoe de score voor elke aparte poging van de activiteit wordt bepaald.

Er zijn vier beoordelingsmethodes:
* Leerobjecten - Het aantal voltooide/geslaagde leerobjecten
* Hoogste cijfer - De hoogste score behaald hebben op alle voorbije leerobjecten
*Gemiddelde cijfer - Het gemiddelde van alle scores
*Opgeteld cijfer - De som van alle scores';
$string['gradereported'] = 'Beoordeling gerapporteerd';
$string['gradescoes'] = 'Leerobjecten';
$string['gradesettings'] = 'Cijferinstellignen';
$string['gradesum'] = 'Totaalcijfer';
$string['height'] = 'Hoogte';
$string['hidden'] = 'Verborgen';
$string['hidebrowse'] = 'Verberg voorproeven';
$string['hidebrowsedesc'] = 'Met de voorbeeldmodus kan een leerling de activiteit bekijken voor hij die probeert.';
$string['hidebrowse_help'] = '<p>Als deze optie op ja wordt gezet, dan zal de leerling niet de mogelijkheid hebben een SCORM/AICC pakket in voorproefmodus te bekijken.</p>

<p>Als deze optie op nee wordt gezet, zal de leerling er voor kunnen kiezen om in voorproefmodus de activiteit te bekijken zonder registratie van zijn resultaten of de activiteit te starten met registratie.</p>

<p>Wanneer een leerobject volledig is bekeken in voorproefmodus, dan wordt het gemarkeerd met een <img src="<?php echo $CFG->wwwroot.\'/mod/scorm/pix/browsed.gif\' ?>" alt="<?php print_string(\'browsed\',\'scorm\') ?>" title="<?php print_string(\'browsed\',\'scorm\') ?>" /> Activiteit bekeken-icoon.</p>';
$string['hideexit'] = 'Verberg de uitgang-link';
$string['hidenav'] = 'Verberg navigatieknoppen';
$string['hidenavdesc'] = 'Deze instelling regelt de standaardinstellng voor het al dan niet tonen van navigatieknoppen';
$string['hidereview'] = 'Verberg de knop voor herzien';
$string['hidetoc'] = 'Weergave cursusstructuur';
$string['hidetocdesc'] = 'Deze instelling regelt de standaardinstelling voor het al dan niet tonen van de inhoudstafel van de cursus (TOC) in de SCORM-speler';
$string['hidetoc_help'] = 'Deze instelling bepaalt hoe de inhoudstabel getoond wordt in de SCORM-speler.';
$string['highestattempt'] = 'Beste poging';
$string['identifier'] = 'Vraagidentificatie';
$string['incomplete'] = 'Onvolledig';
$string['info'] = 'Info';
$string['interactions'] = 'Interacties';
$string['interactionscorrectcount'] = 'Aantal juiste resultaten voor de vraag';
$string['interactionsid'] = 'ID van het element';
$string['interactionslatency'] = 'De tijd die verlopen is tussen het beschikbaar maken <br />van de interactie voor de leerling en <br />het moment van het eerste antwoord.';
$string['interactionslearnerresponse'] = 'Antwoord van de leerling';
$string['interactionspattern'] = 'Patroon van het juiste antwoord';
$string['interactionsresponse'] = 'Antwoord van de leerling';
$string['interactionsresult'] = 'Resultaat gebaseerd op het antwoord van de leerling <br /> en het juiste resultaat';
$string['interactionsscoremax'] = 'Maximale waarde in het bereik van de ruwe score';
$string['interactionsscoremin'] = 'Minimumwaarde in het bereik van de ruwe score';
$string['interactionsscoreraw'] = 'Getal dat de performantie van de leerling weergeeft<br />relatief tot het bereik aangegeven door de minimum- en maximumwaarde';
$string['interactionssuspenddata'] = 'Maakt plaats om gegevens te bewaren en op te vragen <br />tussen twee sessies.';
$string['interactionstime'] = 'Moment waarop de poging was gestart';
$string['interactionstype'] = 'Vraagtype';
$string['interactionsweight'] = 'Weging toegekend aan het element';
$string['invalidactivity'] = 'Fout in SCORM-activiteit';
$string['invalidhacpsession'] = 'Ongeldige HACP-sessie';
$string['invalidmanifestresource'] = 'Waarschuwing: volgende bronnen hebben een referentie in je manifest maar konden niet gevonden worden:';
$string['invalidurl'] = 'Ongeldige URL opgegeven';
$string['invalidurlhttpcheck'] = 'Ongeldige URL opgegeven. Foutopsporingsbericht: <pre>{$a->cmsg}</pre>';
$string['last'] = 'Laatst bekeken op';
$string['lastaccess'] = 'Laatst bekeken';
$string['lastattempt'] = 'Laatste voltooide poging';
$string['lastattemptlock'] = 'Blokkeer na laatste poging';
$string['lastattemptlockdesc'] = 'Indien ingeschakeld kan een leerling de SCORM-speler niet starten nadat hij alle pogingen opgebruikt heeft.';
$string['lastattemptlock_help'] = 'Indien dit is ingeschakeld, kan de leerling de SCORM-speler niet meer starten als het aantal toegestane pogingen bereikt is.';
$string['location'] = 'Toon locatiebalk';
$string['max'] = 'Max score';
$string['maximumattempts'] = 'Aantal pogingen';
$string['maximumattemptsdesc'] = 'Deze instelling regelt het maximale aantal pogingen voor een activiteit';
$string['maximumattempts_help'] = 'Deze instelling beperkt het aantal pogingen. Het werkt enkle voor SCORM 1.2 en AICC-pakketten';
$string['maximumgradedesc'] = 'Deze instelling regelt het standaard maximumcijfer voor een activiteit';
$string['menubar'] = 'Toon menubalk';
$string['min'] = 'Minimumscore';
$string['missing_attribute'] = 'Attribuut ontbreekt {$a->attr} in tag {$a->tag}';
$string['missingparam'] = 'Een vereiste parameter ontbreekt of is fout';
$string['missing_tag'] = 'Ontbrekende tag {$a->tag}';
$string['mode'] = 'Modus';
$string['modulename'] = 'SCORM-pakket';
$string['modulename_help'] = 'Een SCORM-pakket is een verzameling bestanden die verpakt zijn volgens een afgesproken standaard voor leerobjecten. De SCORM-activiteit maakt het mogelijk om SCORM of AICC-pakketten te uploaden als zip-bestanden en aan een cursus toegevoegd te worden.

De inhoud wordt meestal getoond op meerdere pagina\'s met navigatie tussen de pagina\'s. Er zijn verschillende opties om de inhoud in een pop-upvenster te tonen, met een inhoudstafel, met navigatieknoppen enz. SCORM-activiteiten bevatten dikwijls vragen, waarvan de resultaten opgenomen zullen worden in het puntenboek.

SCORM-activiteiten kunnen gebruikt worden

* om multimedia-inhoud en animaties te tonen
* als een beoordelingstool';
$string['modulenameplural'] = 'SCORM-pakketten';
$string['navigation'] = 'Navigatie';
$string['newattempt'] = 'Begin een nieuwe poging';
$string['next'] = 'Volgende';
$string['noactivity'] = 'Niets te melden';
$string['noattemptsallowed'] = 'Aantal toegelaten pogingen';
$string['noattemptsmade'] = 'Aantal pogingen die je gedaan hebt';
$string['no_attributes'] = 'Tag {$a->tag} moet attributen hebben';
$string['no_children'] = 'Tag {$a->tag} moet children hebben';
$string['nolimit'] = 'Onbeperkt aantal pogingen';
$string['nomanifest'] = 'Manifest niet gevonden';
$string['noprerequisites'] = 'Sorry, maar je hebt nog niet genoeg voltooid om toegang te krijgen tot dit leerobject';
$string['noreports'] = 'Er is geen rapport om te tonen';
$string['normal'] = 'Activiteit starten';
$string['noscriptnoscorm'] = 'Je browser ondersteunt geen javascript of javascript staat uitgeschakeld. Dit SCORM-pakket zal niet juist afspelen en gegevens niet juist bewaren.';
$string['notattempted'] = 'Niet geprobeerd';
$string['not_corr_type'] = 'Typfout voor tag {$a->tag}';
$string['notopenyet'] = 'Sorry, deze activiteit is niet beschikbaar tot {$a}';
$string['objectives'] = 'Objectieven';
$string['optallstudents'] = 'alle gebruikers';
$string['optattemptsonly'] = 'enkel gebruikers met pogingen';
$string['options'] = 'Opties (niet mogelijk in sommige browsers)';
$string['optionsadv'] = 'Opties (Geavanceerd)';
$string['optionsadv_desc'] = 'Indien ingeschakeld zullen de hoogte en breedte als geavanceerde opties getoond worden.';
$string['optnoattemptsonly'] = 'enkel gebruikers zonder pogingen';
$string['organization'] = 'Organisatie';
$string['organizations'] = 'Organisaties';
$string['othersettings'] = 'Bijkomende instellingen';
$string['othertracks'] = 'Andere sporen';
$string['package'] = 'Verpakkingsbestand';
$string['packagedir'] = 'Fout van het bestandssysteem: kan geen map voor het pakket maken';
$string['packagefile'] = 'Je hebt geen bestand met een pakket gespecifieerd';
$string['package_help'] = '<p><b>Pakketbestand</b></p>

<p>Het pakket is een bestand met extentie <b>zip</b> (of pif) dat een reeks geldige AICC of SCORM vakdefinitiebestanden bevat.</p>

<p>Een <b>SCORM</b>-pakket moet in de root een zipbestand bevatten met de naam <b>imsmanifest.xml</b> dat de SCORM vakstructuur, de locatie van de bronnen en veel andere dingen definieert.</p>

<p>Een <b>AICC</b> wordt door verschillende bestanden gedefinieerd (van 4 tot 7) met vastgelegde extenties. De betekenis van die extenties is:</p>
   <ul>
	<li>CRS - Course Description file (verplicht)</li>
	<li>AU  - Assignable Unit file (verplicht)</li>
	<li>DES - Descriptor file (verplicht)</li>
	<li>CST - Course Structure file (verplicht)</li>
	<li>ORE - Objective Relationship file (optioneel)</li>
	<li>PRE - Prerequisites file (optioneel)</li>
	<li>CMP - Completition Requirements file (optioneel)</li>
   </ul>';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Met deze instelling kun je een URL voor een SCORM-pakket opgeven, eerder dan een bestand selecteren via de bestandskiezer.';
$string['page-mod-scorm-x'] = 'Elke SCORM-module pagina';
$string['pagesize'] = 'Paginagrootte';
$string['passed'] = 'Geslaagd';
$string['php5'] = 'PHP 5 (DOMXML native library)';
$string['pluginadministration'] = 'Beheer SCORM-pakket';
$string['pluginname'] = 'SCORM-pakket';
$string['popup'] = 'Open de huidige SCORM/AICC in een nieuw venster';
$string['popupmenu'] = 'In een drop downmenu';
$string['popupopen'] = 'Open het pakket in een nieuw venster';
$string['popupsblocked'] = 'Blijkbaar zijn pop-upvensters geblokkeerd, waardoor dit SCORM-pakket niet kan afspelen. Controleer je browserinstellingen voor je verder gaat.';
$string['position_error'] = 'De {$a->tag} kan geen child zijn van {$a->parent} tag';
$string['preferencespage'] = 'Voorkeuren enkel voor deze pagina';
$string['preferencesuser'] = 'Voorkeuren voor dit rapport';
$string['prev'] = 'Vorige';
$string['raw'] = 'Ruwe score';
$string['regular'] = 'Normaal manifest';
$string['report'] = 'Rapport';
$string['reportcountallattempts'] = '{$a->nbattempts} pogingen voor {$a->nbusers} gebruikers, van {$a->nbresults} resultaten';
$string['reportcountattempts'] = '{$a->nbresults} resultaten ({$a->nbusers} gebruikers)';
$string['reports'] = 'Rapporten';
$string['resizable'] = 'Laat formaat van het venster wijzigen toe';
$string['result'] = 'Resultaat';
$string['results'] = 'Resultaten';
$string['review'] = 'Herzien';
$string['reviewmode'] = 'Nalezen';
$string['scoes'] = 'Leerobjecten';
$string['score'] = 'Score';
$string['scorm:addinstance'] = 'Voeg een nieuw SCORM-pakket toe';
$string['scormclose'] = 'Tot';
$string['scormcourse'] = 'Leercursus';
$string['scorm:deleteownresponses'] = 'Eigen pogingen verwijderen';
$string['scorm:deleteresponses'] = 'Verwijder SCORM pogingen';
$string['scormloggingoff'] = 'API loggen staat uit';
$string['scormloggingon'] = 'API loggen staat aan';
$string['scormopen'] = 'Open';
$string['scormresponsedeleted'] = 'Verwijderde gebruikerspoging';
$string['scorm:savetrack'] = 'Bewaar spoor';
$string['scorm:skipview'] = 'Overzicht overslaan';
$string['scormtype'] = 'Type';
$string['scormtype_help'] = 'Deze instelling bepaalt hoe het pakket wordt opgenomen in de cursus. Er zijn vijf opties:

* Upload van pakket - Staat toe om een SCORM pakket te kiezen via de file picker
* Extern SCORM manifest - Staat toe om een imsmanifest.xml URL te specifiëren. Nota: Indien de URL een andere domeinnaam heeft dan jouw site, dan is \'Download van pakket\' een betere optie, want anders worden de beoordelingscijfers niet bewaard.
* Download van pakket - Staat toe om een pakket URL te specifiëren. Dit pakket zal worden unzipped, lokaal bewaard, en bijgewerkt wanneer het externe SCORN pakket wordt bijgewerkt.
* Lokale IMS content opslagruimte - Staat toe om een pakket te selecteren vanuit een IMS opslagruimte
* Externe AICC URL - Deze URL is de lancerings URL voor één enkele AICC activiteit. Een pseudo pakket zal hierrond worden opgetrokken.';
$string['scorm:viewreport'] = 'Bekijk rapporten';
$string['scorm:viewscores'] = 'Bekijk resultaten';
$string['scrollbars'] = 'Laat rollen door het venster toe';
$string['selectall'] = 'Selecteer alles';
$string['selectnone'] = 'Selecteer niets';
$string['show'] = 'Toon';
$string['sided'] = 'Aan de zijkant';
$string['skipview'] = 'Leerlingen slaan inhoudspagina over';
$string['skipviewdesc'] = 'Deze instelling bepaalt de standaard voor wanneer inhoudsstructuur van een pagina moet overgeslagen worden';
$string['skipview_help'] = '<p>Als je een pakketje toevoegd met maar één leerobject er in, dan kun je er voor kiezen om automatisch de inhoudsopgave niet te tonen..</p>

<p>Je kunt kiezen uit:
   <ul>
       <li><strong>Nooit</strong> - de inhoudsopgave nooit overslaan</li>
       <li><strong>Eerste toegang</strong> enkel de eerste keer de inhoudsopgave overslaan</li>
       <li><strong>Always</strong> - de inhoudsopgave altijd overslaan</li>
   </ul>
</p>';
$string['slashargs'] = 'WAARSCHUWING: slash arguments is uitgeschakeld op deze site. Daardoor kunnen sommige objecten niet werken zoals verwacht!';
$string['stagesize'] = 'Frame- / venstergrootte';
$string['stagesize_help'] = '<p>Deze twee instellingen bepalen hoe groot het venster zal zijn waarin het leerobject getoond wordt.</p>';
$string['started'] = 'Gestart op';
$string['status'] = 'Status';
$string['statusbar'] = 'Toon statusbalk';
$string['student_response'] = 'Antwoord';
$string['subplugintype_scormreport'] = 'Rapport';
$string['subplugintype_scormreport_plural'] = 'Rapporten';
$string['suspended'] = 'Onderbroken';
$string['syntax'] = 'Syntaxisfout';
$string['tag_error'] = 'Onbekende tag ({$a->tag}) met deze inhoud: {$a->value}';
$string['time'] = 'Tijd';
$string['timerestrict'] = 'Beperk antwoorden tot deze periode';
$string['title'] = 'Titel';
$string['toc'] = 'Inhoudstafel';
$string['toolbar'] = 'Toon knoppenbalk';
$string['too_many_attributes'] = 'Tag {$a->tag} heeft te veel attributen';
$string['too_many_children'] = 'Tag {$a->tag} heeft teveel children';
$string['totaltime'] = 'Totale tijd';
$string['trackingloose'] = 'WAARSCHUWING: de gegevens voor opvolging van dit SCORM/AICC-pakket zullen verloren gaan';
$string['type'] = 'Type';
$string['typeaiccurl'] = 'Externe AICC URL';
$string['typeexternal'] = 'Extern SCORM manifest';
$string['typeimsrepository'] = 'Lokale IMS opslagruimte';
$string['typelocal'] = 'Geüpload pakket';
$string['typelocalsync'] = 'Gedownload pakket';
$string['unziperror'] = 'Er is een fout opgetreden bij het uitpakken van het pakket';
$string['updatefreq'] = 'Frequentie automatisch updaten';
$string['updatefreqdesc'] = 'Dze instelling bepaalt de standaard auto-updatefrequentie van een activiteit';
$string['updatefreq_help'] = 'Hiermee kan een extern pakket automatisch gedownload en geüpdated worden.';
$string['validateascorm'] = 'Valideer een SCORM-pakket';
$string['validation'] = 'Bevestigingsresultaat';
$string['validationtype'] = 'Deze instelling maakt dat de DOMXML-bibliotheek gebruikt wordt voor de validatie van het SCORM MAnifest. Als je twijfelt laat dan de geselecteerde keuze staan.';
$string['value'] = 'Waarde';
$string['versionwarning'] = 'De versie van het Manifest is ouder dan 1.3, waarschuwing bij tag {$a->tag}';
$string['viewallreports'] = 'Bekijk de rapporten voor {$a} pogingen';
$string['viewalluserreports'] = 'Bekijk de rapporten voor {$a} gebruikers';
$string['whatgrade'] = 'Te beoordelen pogingen';
$string['whatgradedesc'] = 'Of de hoogste, gemiddelde, eerste of laatste volledige poging in het puntenboek bewaard wordt wanneer meerdere pogingen toegestaan zijn.';
$string['whatgrade_help'] = 'Wanneer je meerdere pogingen toelaat, kun je via deze instelling specifiëren of de hoogste score, de gemiddelde score, of die van de eerste of laatste voltooide poging in het puntenboek opgenomen zal worden. Met de laatste voltooide poging worden geen pogingen die opgenomen die de "niet geslaagd"-status hebben.

Behandeling van meerdere pogingen

* De optie om een nieuwe poging op te starten, gebeurt via een aankruisvakje dat zich boven de Enter knop op de content structure pagine bevindt; zorg er dus voor dat toegang tot die pagina beschikbaar is indien je meer dan een poging wil toestaan.
* Sommige scorm pakketten gaan intelligent om met nieuwe pogingen, vele andere niet. Dit betekent dat, wanneer de gebruiker een bestaande poging heropent en de scorm content  niet over een interne logica beschikt om te beletten dat ze wordt overschreven, de eerdere poging overschreven kan worden zelfs al was ze \'volledig\' of \'voorbij\'.
* De instellingen "Forceer voltooiing", "Forceer nieuwe poging" en "Vergrendel na laatste poging" bieden verdere mogelijkheden tot management van meerdere pogingen.';
$string['width'] = 'Breedte';
$string['window'] = 'Frame/venster';
