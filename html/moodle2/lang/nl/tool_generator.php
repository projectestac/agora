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
 * Strings for component 'tool_generator', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Groot bestand {$a}';
$string['courseexplanation'] = 'Deze tool maakt standaard testcursussen die vele secties, activiteiten en bestanden bevatten.

Dit is bedoeld om een gestandaardiseerde maatstaf voor het controleren van de betrouwbaarheid en de prestaties van de verschillende onderdelen van het systeem (zoals backup en restore).

Deze test is belangrijk omdat er vroeger veel gevallen geweest zijn waar, geconfronteerd met real-life use cases (bijvoorbeeld een cursus met 1.000 activiteiten),  het systeem niet werkte.

Cursussen die met deze functie gecreëerd worden, kunnen een grote hoeveelheid database-en bestandssysteem ruimte (tientallen gigabytes) bezetten. Je moet de cursussen verwijderen (en wachten tot diverse opruimrondes gebeurd zijn) om deze ruimte weer vrij te krijgen.

 ** Gebruik deze functie niet gebruiken op een live systeem **. Gebruik alleen op een ontwikkelserver.
(Om toevallig gebruik te voorkomen, is deze functie uitgeschakeld, tenzij u ook ontwikkelaar debug-niveau hebt geselecteerd.)';
$string['coursesize_0'] = 'XS (~10KB; gemaakt in ~1 seconde)';
$string['coursesize_1'] = 'S (~10MB; gemaakt in ~30 seconden)';
$string['coursesize_2'] = 'M (~100MB; gemaakt in ~5 minuten)';
$string['coursesize_3'] = 'L (~1GB; gemaakt in ~1 uur)';
$string['coursesize_4'] = 'XL (~10GB; gemaakt in ~4 uur)';
$string['coursesize_5'] = 'XXL (~20GB; gemaakt in ~8 uur)';
$string['coursewithoutusers'] = 'De geselecteerde cursus heeft geen gebruikers';
$string['createcourse'] = 'Maak cursus';
$string['createtestplan'] = 'Maak testplan';
$string['creating'] = 'Cursus aan het maken';
$string['done'] = 'Klaar ({$a}s)';
$string['downloadtestplan'] = 'Download testplan';
$string['downloadusersfile'] = 'Download gebruikersbestand';
$string['error_nocourses'] = 'Er zijn geen cursussen om het testplan te genereren';
$string['error_noforumdiscussions'] = 'De geselecteerde cursus bevat geen forumdiscussies';
$string['error_noforuminstances'] = 'De geselecteerde cursus bevat geen forum module-exemplaren';
$string['error_noforumreplies'] = 'De geselecteerde cursus bevat geen antwoorden op forums';
$string['error_nonexistingcourse'] = 'De opgegeven cursus bestaat niet';
$string['error_nopageinstances'] = 'De geselecteerde cursus bevat geen paginamodule-exemplaren';
$string['error_notdebugging'] = 'Niet beschikbaar op deze server omdat foutopsporing niet op ONTWIKKELAAR staat';
$string['error_nouserspassword'] = 'Je moet $CFG->tool_generator_users_password in config.php zetten om het testplan te kunnen genereren.';
$string['firstname'] = 'Test cursusgebruiker';
$string['fullname'] = 'Testcursus: {$a->size}';
$string['maketestcourse'] = 'Maak testcurus';
$string['maketestplan'] = 'Maak JMeter testplan';
$string['notenoughusers'] = 'De geselecteerde cursus heeft niet genoeg gebruikers';
$string['pluginname'] = 'Ontwikkelings datagenerator';
$string['progress_checkaccounts'] = 'Gebruikersaccounts controleren ({$a})';
$string['progress_coursecompleted'] = 'Cursus volledig ({$a})';
$string['progress_createaccounts'] = 'Gebruikersaccounts maken ({$a->from} - {$a->to})';
$string['progress_createbigfiles'] = 'Grote bestanden maken ({$a})';
$string['progress_createcourse'] = 'Cursus maken ({$a})';
$string['progress_createforum'] = 'Forumberichten maken ({$a} berichten)';
$string['progress_createpages'] = 'Pagina\'s maken ({$a})';
$string['progress_createsmallfiles'] = 'Kleine bestanden maken ({$a})';
$string['progress_enrol'] = 'Gebruikers in cursus aanmelden ({$a})';
$string['progress_sitecompleted'] = 'Site voltooid ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~10MB; 3 cursussen, gemaakt in ~30 seconden)';
$string['sitesize_1'] = 'S (~50MB; 8 cursussen, gemaakt in ~2 minuten)';
$string['sitesize_2'] = 'M (~200MB; 73 cursussen, gemaakt in ~10 minuten)';
$string['sitesize_3'] = 'L (~1\'5GB; 277 cursussen, gemaakt in ~1,5 uur)';
$string['sitesize_4'] = 'XL (~10GB; 1065 cursussen, gemaakt in ~5 uur)';
$string['sitesize_5'] = 'XXL (~20GB; 4177 cursussen, gemaakt in ~10 uur)';
$string['size'] = 'Grootte van de cursus';
$string['smallfiles'] = 'Kleine bestanden';
$string['targetcourse'] = 'Test doelcursus';
$string['testplanexplanation'] = 'Deze tool maakt een JMeter testplan bestand samen met het gebruikersgegevens bestand.

Dit testplan is ontworpen om samen te werken met {$a}, wat het makkelijker maakt om het testplan uit te voeren in een specifieke Moodle omgeving, informatie te verzamelen over de testen en de resultaten te vergelijken. Je moet het  dus downloaden en het script test_runner.sh gebruiken of de installatie-en gebruiksinstructies volgen.

Je moet een wachtwoord voor de gebruikers van de cursus in config.php (bijv. $CFG->tool_generator_users_password = \'Moodle\' ;) ingestellen. Er is geen standaardwaarde voor dit wachtwoord om onbedoeld gebruik van de tool te voorkomen. U moet de update-optie voor wachtwoorden gebruiken in het geval dat uw cursus gebruikers heeft met andere wachtwoorden of wanneer ze werden gegenereerd door tool_generator maar zonder een$ CFG>tool_generator_users_password waarde.

Het is een onderdeel van tool_generator, dus het werkt goed samen met de door de cursus- en de site-generatoren gemaakte cursussen. Het kan het ook gebruikt worden met elke cursus die, bevat ten minste het volgende bevat:

* Genoeg ingeschreven gebruikers (afhankelijk van het testplan dat je kiest) met het wachtwoord opnieuw ingesteld naar \'Moodle\'
* Een pagina module
* Een forum module met ten minste één discussie en één antwoord.

Je wil misschien uw servercapaciteit bekijken bij het uitvoeren van grote testplannen omdat de serverbelasting, gegenereerd door JMeter erg groot kan zijn. De opstartperiode is aangepast aan het aantal draden (gebruikers) om dit soort problemen te verminderen maar de belasting is nog steeds enorm.

** Loop het testplan niet op een live systeem **. Deze functie creëert alleen de bestanden om JMeter mee te laten lopen, dus ze is niet gevaarlijk op zich, maar je moet **NOOIT ** dit testplan laten lopen in een productieomgeving.';
$string['testplansize_0'] = 'XS ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['testplansize_1'] = 'S ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['testplansize_2'] = 'M ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['testplansize_3'] = 'L ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['testplansize_4'] = 'XL ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['testplansize_5'] = 'XXL ({$a->users} gebruikers, {$a->loops} keer doorlopen en {$a->rampup} opstartperiode)';
$string['updateuserspassword'] = 'Wachtwoord van cursusgebruikers aanpassen';
$string['updateuserspassword_help'] = 'JMeter moet inloggen als cursusgebruikers. U kunt  het gebruikerswachtwoord instellen met $CFG->tool_generator_users_password in config.php; deze instelling past het wachtwoord van de cursus gebruiker aan volgens $CFG->tool_generator_users_password. Dit kan nuttig zijn als je gebruik maakt van een cursus die niet gegenereerd is door tool_generator of $CFG->tool_generator_users_password was niet ingesteld toen u de testcursussen maakte.';
