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
 * Strings for component 'report_performance', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Automatische backup';
$string['check_backup_comment_disable'] = 'De performantie kan negatief beïnvloed worden tijdens het backup-proces. Indien ingeschakeld moeten backups gepland worden buiten piekperiodes.';
$string['check_backup_comment_enable'] = 'De performantie kan negatief beïnvloed worden tijdens het  backupproces. Backups moeten lopen tijdens daluren.';
$string['check_backup_details'] = 'Het inschakelen van automatische backups zal automatisch archieven maken van alle cursussen op de server op een gekozen tijdstip. <p>Tijdens dit proces kan de serverperformantie verminderen.</p>';
$string['check_cachejs_comment_disable'] = 'Indien ingeschakeld wordt de performantie van het laden van de pagina verbeterd.';
$string['check_cachejs_comment_enable'] = 'Indien uigeschakeld zou de pagina traag kunnen laden.';
$string['check_cachejs_details'] = 'Javascript caching en compressie verbeteren de performantie voor het laden van een pagina. Aangeraden wordt om dit in te schakelen op productieservers.';
$string['check_debugmsg_comment_developer'] = 'De performantie kan lichtjes beter zijn indien anders ingesteld dan DEVELOPER';
$string['check_debugmsg_comment_nodeveloper'] = 'De performantie kan lichtjes achteruit gaan indien ingesteld op DEVELOPER';
$string['check_debugmsg_details'] = 'Er is zelden nood aan het DEVELOPER-niveau, tenzij je ontwikkelaar bent. In dat geval is het sterk aangeraden. <p>Als je de foutmelding gevonden hebt en ergens gekopieerd en geplakt, dan kun je best je debugniveau terug op NONE zetten. Debugberichten kunnen hackers op een spoor zetten over de installatie van je site en kan performantie beïnvloeden.</p>';
$string['check_enablestats_comment_disable'] = 'Performantie kan beïnvloed worden door het berekenen van statistieken. Indien indgeschakeld moeten statistiekinstellingen met voorzichtigheid gekozen worden.';
$string['check_enablestats_comment_enable'] = 'De performantie kan verminderen door het verwerken van de statistieken. Kies duur en tijdstip van statistieken daarom met zorg.';
$string['check_enablestats_details'] = 'Het inschakelen van dit proces zal de logbestanden verwerken en hieruit statistieken genereren. Afhankelijk van de hoeveelheid verkeer op je site kan dit lang duren. <p>Tijdens dit proces kan de serverperformantie verminderen.</p>';
$string['check_themedesignermode_comment_disable'] = 'Indien ingeschakeld zullen afbeeldingen en stijlbestanden niet gecached worden. Hierdoor zal de performantie verminderen.';
$string['check_themedesignermode_comment_enable'] = 'Indien dit is uitgeschakeld worden afbeeldingen en stijlbestanden gecached, wat een behoorlijke performantiewinst oplevert.';
$string['check_themedesignermode_details'] = 'Dit is dikwijls de oorzaak van trage Moodle sites.<p>Gemiddeld wordt je server CPU dubbel zo zwaar belast wanneer de ontwikkelmodus voor site thema\'s is ingeschakeld.';
$string['comments'] = 'Opmerkingen';
$string['disabled'] = 'Uitgeschakeld';
$string['edit'] = 'Bewerk';
$string['enabled'] = 'Ingeschakeld';
$string['issue'] = 'Probleem';
$string['morehelp'] = 'meer hulp';
$string['performancereportdesc'] = 'Dit rapport geeft een lijst met problemen die de performantie op site {$a} kunnen beïnvloeden';
$string['performance:view'] = 'Bekijk performantierapport';
$string['pluginname'] = 'Performantieoverzicht';
$string['value'] = 'Waarde';
