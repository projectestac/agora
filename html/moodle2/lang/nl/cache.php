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
 * Strings for component 'cache', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acties';
$string['addinstance'] = 'Voeg een exemplaar toe';
$string['addlocksuccess'] = 'Nieuwe lock-instantie toegevoegd';
$string['addnewlockinstance'] = 'Voeg een nieuwe lock-instantie toe';
$string['addstore'] = 'Voeg {$a} opslag toe';
$string['addstoresuccess'] = 'Toevoegen van een nieuwe {$a} opslag gelukt';
$string['area'] = 'Zone';
$string['cacheadmin'] = 'Cache-beheer';
$string['cacheconfig'] = 'Configuratie';
$string['cachedef_calendar_subscriptions'] = 'Kalenderinschrijvingen';
$string['cachedef_config'] = 'Configuratie-instellingen';
$string['cachedef_coursecat'] = 'Cursuscategorielijst voor een bepaalde gebruiker';
$string['cachedef_coursecatrecords'] = 'Cursuscategorie-records';
$string['cachedef_coursecattree'] = 'Curususcategorieboomstructuur';
$string['cachedef_coursecontacts'] = 'Lijst met cursuscontacten';
$string['cachedef_coursemodinfo'] = 'Geaccumuleerde informatie over modules en secties voor elke cursus';
$string['cachedef_databasemeta'] = 'Meta-informatie databank';
$string['cachedef_eventinvalidation'] = 'Gebeurtenis ongeldig maken';
$string['cachedef_externalbadges'] = 'Externe badges voor een bepaalde gebruiker';
$string['cachedef_gradecondition'] = 'Cijfers worden gecached om conditionele activiteit te controleren.';
$string['cachedef_groupdata'] = 'Curus groepsinformatie';
$string['cachedef_htmlpurifier'] = 'HTML Purifier - opgeschoonde inhoud';
$string['cachedef_langmenu'] = 'Lijst van beschikbare talen';
$string['cachedef_locking'] = 'Blokkeren';
$string['cachedef_navigation_expandcourse'] = 'Navigatie uitklapbare cursussen';
$string['cachedef_observers'] = 'Actie wachters';
$string['cachedef_plugin_manager'] = 'Plugin infobeheerder';
$string['cachedef_questiondata'] = 'Vraagdefinities';
$string['cachedef_repositories'] = 'Opslagruimtegegevens';
$string['cachedef_string'] = 'Taalstringcache';
$string['cachedef_suspended_userids'] = 'Lijst van geschorste leerlingen per cursus.';
$string['cachedef_userselections'] = 'Gegevens gebruikt om gebruikersselecties door Moodle te laten volgen';
$string['cachedef_yuimodules'] = 'YUI Moduledefinities';
$string['cachelock_file_default'] = 'Standaard bestandsblokkering';
$string['cachestores'] = 'Cache opslag';
$string['caching'] = 'Caching';
$string['component'] = 'Component';
$string['confirmlockdeletion'] = 'Bevestig verwijderen lock';
$string['confirmstoredeletion'] = 'Bevestig verwijderen van opslag';
$string['default_application'] = 'Standaard applicatie-opslag';
$string['defaultmappings'] = 'Opslag die gebruikt wordt wanneer er geen koppeling is';
$string['defaultmappings_help'] = 'Dit is de standaard opslag die gebruikt wordt als je niet één of meer opslag koppelt aan de cache definitie';
$string['default_request'] = 'Standaard vraag opslag';
$string['default_session'] = 'Standaard sessie opslag';
$string['defaultstoreactions'] = 'Standaard opslag kan niet gewijzigd worden';
$string['definition'] = 'Definitie';
$string['definitionsummaries'] = 'Bekende cache-definitie';
$string['delete'] = 'Verwijder';
$string['deletelock'] = 'Verwijder lock';
$string['deletelockconfirmation'] = 'Weet je zeker dat je lock {$a} wil verwijderen?';
$string['deletelockhasuses'] = 'Je kunt dit lock niet verwijderen omdat het al gebruikt is door één of meerdere opslagruimten.';
$string['deletelocksuccess'] = 'Blokkering verwijderd.';
$string['deletestore'] = 'Verwijder opslag';
$string['deletestoreconfirmation'] = 'Weet je zeker dat je de "{$a}" opslag wil verwijderen?';
$string['deletestorehasmappings'] = 'Je kunt deze opslag niet verwijderen omdat die koppelingen heeft. Verwijder alle koppelingen voor je de opslag verwijderd';
$string['deletestoresuccess'] = 'Verwijderen van cache opslag gelukt';
$string['editdefinitionmappings'] = '{$a} definitie opslagkoppelingen';
$string['editdefinitionsharing'] = 'Bewerk deeldefinitie voor {$a}';
$string['editmappings'] = 'Bewerk koppelingen';
$string['editsharing'] = 'Bewerk delen';
$string['editstore'] = 'Bewerk opslag';
$string['editstoresuccess'] = 'Bewerken van de cache opslag gelukt.';
$string['ex_configcannotsave'] = 'Kon het cache configuratiebestand niet bewaren.';
$string['ex_nodefaultlock'] = 'Kon geen standaard blokkeerinstantie vinden';
$string['ex_unabletolock'] = 'Kon geen blokkering verkrijgen voor cache';
$string['ex_unmetstorerequirements'] = 'Je kunt deze opslag nu niet gebruiken. Bekijk de documentatie om de vereisten te bepalen.';
$string['gethit'] = 'Get - gevonden';
$string['getmiss'] = 'Get - niet gevonden';
$string['inadequatestoreformapping'] = 'Deze opslagruimte voldoet niet aan de vereisten van alle bekende definities. De definities waarvoor deze ruimte niet geschikt is, zullen de oorspronkelijke standaardopslagruimte toegewezen krijgen in plaats van de geselecteerde opslagruimte.';
$string['invalidlock'] = 'Ongeldige blokkering';
$string['invalidplugin'] = 'Ongeldige plugin';
$string['invalidstore'] = 'Ongeldige cache opslag gegeven';
$string['lockdefault'] = 'Standaard';
$string['lockingmeans'] = 'Blokkeringsmechanisme';
$string['lockmethod'] = 'Blokkeermethode';
$string['lockmethod_help'] = 'Dit is de blokkermethode die gebruikt wordt als dit vereist wordt door deze opslag.';
$string['lockname'] = 'Naam';
$string['locknamedesc'] = 'De naam moet uniek zijn en mag enkel letters, hoofdletters en underscore bevatten (a-z, A-Z, _ )';
$string['locknamenotunique'] = 'De gekozen naam is niet uniek. Kies een unieke naam.';
$string['locksummary'] = 'Samenvatting van cache blokkeringen.';
$string['locktype'] = 'Type';
$string['lockuses'] = 'Gebruik';
$string['mappingdefault'] = '(standaard)';
$string['mappingfinal'] = 'Uiteindelijke opslag';
$string['mappingprimary'] = 'Primaire opslag';
$string['mappings'] = 'Opslagkoppelingen';
$string['mode'] = 'Modus';
$string['mode_1'] = 'Toepassing';
$string['mode_2'] = 'Sessie';
$string['mode_4'] = 'Vraag';
$string['modes'] = 'Modus';
$string['nativelocking'] = 'Deze plugin doet zijn eigen blokkeringen';
$string['none'] = 'Geen';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Geïnstalleerde cache opslag';
$string['purge'] = 'Leegmaken';
$string['purgedefinitionsuccess'] = 'Met succes de gevraagde definitie weggegooid.';
$string['purgestoresuccess'] = 'Opslag met succes leeggemaakt';
$string['requestcount'] = 'Test met {$a} vragen';
$string['rescandefinitions'] = 'Definities opnieuw scannen';
$string['result'] = 'Resultaat';
$string['set'] = 'Instellen';
$string['sharing'] = 'Delen';
$string['sharing_all'] = 'Iedereen';
$string['sharing_help'] = 'Hiermee kun je bepalen hoe cachegegevens gedeeld worden als je een geclusterde installatie hebt of als je meerdere sites met dezelfde opslag hebt en de gegevens wenst te delen. Dit is een geavanceerde instellingen. Zorg ervoor dat je de bedoeling ervan begrijpt voor je ze wijzigt.';
$string['sharing_input'] = 'Aangepaste sleutel (onderaan ingegeven)';
$string['sharingrequired'] = 'Je moet minstens één optie voor delen selecteren.';
$string['sharingselected_all'] = 'Iedereen';
$string['sharingselected_input'] = 'Aangepaste sleutel';
$string['sharingselected_siteid'] = 'Site identificatie';
$string['sharingselected_version'] = 'Versie';
$string['sharing_siteid'] = 'Sites met dezelfde id.';
$string['sharing_version'] = 'Sites met dezelfde versie';
$string['storeconfiguration'] = 'Opslagconfiguratie';
$string['store_default_application'] = 'Standaardbestandsopslag voor applicatie-caches';
$string['store_default_request'] = 'Standaard statische opslag voor vraag-caches';
$string['store_default_session'] = 'Standaard sessieopslag voor sessie-cache';
$string['storename'] = 'Opslagnaam';
$string['storenamealreadyused'] = 'Je moet een unieke naam voor deze opslag kiezen';
$string['storename_help'] = 'Hiermee bepaal je de opslagnaam. Die wordt gebruikt om de opslag te identificeren in het systeem en kan enkel a-z, A-Z, 0-9, _ en spaties bevatten. De naam moet uniek zijn. Als je een naam hergebruikt, zul je fouten krijgen.';
$string['storenameinvalid'] = 'Ongeldige opslagnaam. Je mag enkel a-z, A-Z, 0-9, _ en spaties gebruiken.';
$string['storenotready'] = 'Opslag niet klaar';
$string['storeperformance'] = 'Cache-opslag performatierapport - {$a} unieke vragen per bewerking.';
$string['storeready'] = 'Klaar';
$string['storerequiresattention'] = 'Opvolging nodig';
$string['storerequiresattention_help'] = 'Deze opslag is niet klaar om te gebruiken, maar er wordt naar verwezen. Dit herstellen zal de performatie op je systeem verbeteren. Zorg ervoor dat je opslag klaar is en dat aan alle PHP-vereisten voldaan is.';
$string['storeresults_application'] = 'Bewaar vragen als ze gebruikt worden als een applicatie-cache';
$string['storeresults_request'] = 'Bewaar vragen als ze gebruikt worden als een vragen-cache';
$string['storeresults_session'] = 'Bewaar vragen als ze gebruikt worden als een sessie-cache';
$string['stores'] = 'Opslag';
$string['storesummaries'] = 'Geconfigureerde opslagexemplaren';
$string['supports'] = 'Ondersteunt';
$string['supports_dataguarantee'] = 'data guarantee';
$string['supports_keyawareness'] = 'key awareness';
$string['supports_multipleidentifiers'] = 'multiple identifiers';
$string['supports_nativelocking'] = 'locking';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = 'zoeken op sleutel';
$string['tested'] = 'Getest';
$string['testperformance'] = 'Testperformantie';
$string['unsupportedmode'] = 'Niet ondersteunde modus';
$string['untestable'] = 'Niet te testen';
$string['userinputsharingkey'] = 'Aangepaste sleutel voor delen';
$string['userinputsharingkey_help'] = 'Geef je eigen private sleutel hier. Als je opslagruimtes op andere sites instelt waarmee je data wil delen, zorg er dan voor dat je daar dezelfde sleutel ingeeft.';
