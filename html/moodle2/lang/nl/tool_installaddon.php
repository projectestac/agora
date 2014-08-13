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
 * Strings for component 'tool_installaddon', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Bevestiging';
$string['acknowledgementmust'] = 'Je moet dit bevestigen';
$string['acknowledgementtext'] = 'Ik begrijp dat het mijn verantwoordelijkheid is om volledige backups te hebben van deze site voor ik add-ons ga installeren. Ik aanvaard en begrijp dat add-ons (vooral, maar niet alleen, diegene die niet van officiële bronnen afkomstig zijn) beveiligingsgaten kunnen bevatten, de site onbeschikbaar kunnen maken of het lekken of verlies van gegevens kunnen veroorzaken.';
$string['featuredisabled'] = 'De add-on installer is uitgeschakeld voor deze site.';
$string['installaddon'] = 'Add-on installeren';
$string['installaddons'] = 'Installeer add-ons';
$string['installexception'] = 'Oei, er is een fout opgetreden tijdens het installeren van de add-on. Schakel debugging aan om details over de fout te bekijken.';
$string['installfromrepo'] = 'Installeer add-ons van de Moodle plugin databank';
$string['installfromrepo_help'] = 'Je zult omgeleid worden naar de plugin-databank van Moodle om een add-on te zoeken en installeren. Merk op dat je site-naam, URL en Moodleversie ook verstuurd zullen worden om het installatieproces voor jou makkelijker te maken.';
$string['installfromzip'] = 'Installeer contributiecode van ZIP-bestand';
$string['installfromzipfile'] = 'ZIP-bestand';
$string['installfromzipfile_help'] = 'Het ZIP-bestand met de plugin moet exact één map bevatten met als naam de naam van de plugin. Het ZIP-bestand zal in de juiste map van het plugin-type uitgepakt worden. Als het van de Moodle plugin databank gedownload wordt, dan zal het deze structuur hebben.';
$string['installfromzip_help'] = 'Een alternatief voor het installeren van een add-on rechtstreeks van de Moodle plugin databank, is het uploaden van een ZIP-pakket van de add-on. Dat ZIP-pakket moet dezelfde structuur hebben als een pakket dat je download van de Moodle plugin databank.';
$string['installfromziprootdir'] = 'Hernoem de root-map';
$string['installfromziprootdir_help'] = 'Sommige ZIP-bestanden, zoals die door Github gegenereerd worden, kunnen een foute root mapnaam hebbben. Indien dat zo is kan de juiste naam hier ingegeven worden.';
$string['installfromzipsubmit'] = 'Installeer contributiecode van ZIP-bestand';
$string['installfromziptype'] = 'Plugin type';
$string['installfromziptype_help'] = 'Kies het juiste type plugin dat je gaat installeren. Waarschuwing: de installatieprocedure kan behoorlijk falen als er een fout plugintype geselecteerd wordt.';
$string['permcheck'] = 'Zorg ervoor dat de root-locatie voor dit plugintype beschrijvbaar is voor het webserver proces.';
$string['permcheckerror'] = 'Fout tijdens het controleren van de schrijfrechten';
$string['permcheckprogress'] = 'Schrijfrechten controleren...';
$string['permcheckresultno'] = 'Plugintype locatie <em>{$a->path}</em>  is niet beschrijfbaar';
$string['permcheckresultyes'] = 'Plugintype locatie <em>{$a->path}</em>  is beschrijfbaar';
$string['pluginname'] = 'Add-on installer';
$string['remoterequestalreadyinstalled'] = 'Je hebt gevraagd om de add-on <strong>{$a->name}</strong> ({$a->component}) versie {$a->version} te installeren op deze site, maar deze plugin is al geïnstalleerd.';
$string['remoterequestconfirm'] = 'Je hebt gevraagd om de add-on <strong>{$a->name}</strong> ({$a->component}) versie {$a->version} uit de plugin databank op deze site te installeren. Als je verder gaat, zal het ZIP-bestand worden gedownload en gevalideerd. Er zal nog niets geïnstalleerd worden.';
$string['remoterequestinvalid'] = 'Er is gevraagd om een add-on van de Moodle plugin-collectie te installeren op deze site. De vraag is echter niet geldig en daarom kan de add-on niet geïnstalleerd worden.';
$string['remoterequestpermcheck'] = 'Er is gevraagd om add-on {$a->name} ({$a->component}) versie {$a->version} van de Moodle plugin-collectie te installeren op deze site. Maar <strong>{$a->typepath}</strong> is <strong> niet beschrijfbaar</strong>. Je moet de webserver schrijfrechten geven voor de locatie van de plugin en klik dan op de Ga verder-knop om de controle te herhalen.';
$string['remoterequestpluginfoexception'] = 'Er is een fout opgetreden tijdens het ophalen van informatie over de plugin {$a->name} ({$a->component}) versie {$a->version}. De plugin kan niet geïnstalleerd worden. Schakel foutopsporing in om details van de fout te kunnen bekijken.';
$string['validation'] = 'Add-on  pakketvalidatie';
$string['validationmsg_componentmatch'] = 'Volledige componentnaam';
$string['validationmsg_componentmismatchname'] = 'Add-on name klopt niet';
$string['validationmsg_componentmismatchname_help'] = 'Sommige ZIP-bestanden, zoals die gemaakt door Github, kunnen een foute root-mapnaam bevatten. Je moet de naam van de root-map van de plugin aanpassen zodat die de naam van de plugin heeft.';
$string['validationmsg_componentmismatchname_info'] = 'De plugin verklaart dat zijn naam \'{$a}\' is en dat die naam niet overeen komt met de root-map';
$string['validationmsg_componentmismatchtype'] = 'Fout type contributiecode';
$string['validationmsg_componentmismatchtype_info'] = 'Je hebt type \'{$a->expected}\' geselecteerd, maar de code verklaart dat het type \'{$a->found}\' is.';
$string['validationmsg_filenotexists'] = 'Uitgepakt bestand niet gevonden';
$string['validationmsg_filesnumber'] = 'Te weinig bestanden in het pakket';
$string['validationmsg_filestatus'] = 'Kon niet alle bestanden uitpakken';
$string['validationmsg_filestatus_info'] = 'De poging om bestand {$a->file} uit te pakken mislukte met als fout \'{$a->status}\'.';
$string['validationmsglevel_debug'] = 'Debug';
$string['validationmsglevel_error'] = 'Fout';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Waarschuwing';
$string['validationmsg_maturity'] = 'Verklaar maturiteitsniveau';
$string['validationmsg_maturity_help'] = 'De contributiecode kan verklaren hoe volwassen de code is. Als degene die de code onderhoudt vind dat de code stabiel is, dan zal er MATURITY_STABLE staan. Alle andere niveau\'s (zoals alpha of beta) moeten als niet stabiel beschouwd worden en er wordt een waarschuwing getoond.';
$string['validationmsg_missingexpectedlangenfile'] = 'Fout in de bestandsnaam van het Engelstalig taalpakket';
$string['validationmsg_missingexpectedlangenfile_info'] = 'Het gegeven contributiecode type mist het verwachte Engelstalig taalbestand {$a}.';
$string['validationmsg_missinglangenfile'] = 'Geen Engelstalig taalpakket gevonden';
$string['validationmsg_missinglangenfolder'] = 'Map Engels taalpakket ontbreekt';
$string['validationmsg_missingversion'] = 'Contributiecode zegt niet welke versie het is';
$string['validationmsg_missingversionphp'] = 'Bestand version.php niet gevonden';
$string['validationmsg_multiplelangenfiles'] = 'Meerdere Engelse taalbestanden gevonden';
$string['validationmsg_onedir'] = 'Ongeldige structuur van het ZIP-bestand';
$string['validationmsg_onedir_help'] = 'Het zip-bestand moet één root-map bevatten waarin de contributiecode zit.';
$string['validationmsg_pathwritable'] = 'Test schrijftoegang';
$string['validationmsg_pluginversion'] = 'Versie contributiecode';
$string['validationmsg_release'] = 'Release contributiecode';
$string['validationmsg_requiresmoodle'] = 'Vereiste Moodleversie';
$string['validationmsg_rootdir'] = 'Naam van de te installeren contributiecode';
$string['validationmsg_rootdir_help'] = 'De naam van de root-map in het ZIP-bestand is de naam van de geïnstalleerde contributiecode. Als de naam fout is, dan kun je de root-map in het zip-bestand hernoemen voor je de contributiecode installeerd.';
$string['validationmsg_rootdirinvalid'] = 'Ongeldige naam contributiecode';
$string['validationmsg_rootdirinvalid_help'] = 'De naam van de root-map in het ZIP-bestand bevat ongeldige tekens. Sommige ZIP-bestanden, zoals diegene die door Github gegenereerd worden, kunnen een foute root-mapnaam bevatten. Je moet die naam van de root-map aanpassen, zodat die overeenkomt met de naam van de geïnstalleerde contributiecode.';
$string['validationmsg_targetexists'] = 'Doellocatie bestaat al';
$string['validationmsg_targetexists_help'] = 'De map waar de add-on in geïnstalleerd moet worden mag nog niet bestaan.';
$string['validationmsg_unknowntype'] = 'Onbekend plugintype';
$string['validationresult0'] = 'Validatie mislukt.';
$string['validationresult0_help'] = 'Er is een groot probleem gevonden en daarom is het niet veilig om de add-on te installeren. Bekijk de logberichten van de validatie voor details.';
$string['validationresult1'] = 'Validatie geslaagd.';
$string['validationresult1_help'] = 'Het add-on pakket is gevalideerd en er werden geen grote problemen gedetecteerd.';
$string['validationresultinfo'] = 'Info';
$string['validationresultmsg'] = 'Bericht';
$string['validationresultstatus'] = 'Status';
