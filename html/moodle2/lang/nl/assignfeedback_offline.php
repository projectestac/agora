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
 * Strings for component 'assignfeedback_offline', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Bevestig cijferimport';
$string['default'] = 'Standaard ingeschakeld';
$string['default_help'] = 'Indien ingeschakeld zal off-line beoordelen standaard ingeschakeld zijn voor alle nieuwe opdrachten.';
$string['downloadgrades'] = 'Download beoordelingswerkblad';
$string['enabled'] = 'Off-line beoordelingswerkblad';
$string['enabled_help'] = 'Indien ingeschakeld zal de leraar een werkblad kunnen downloaden en terug uploaden met cijfers bij het beoordelen van opdrachten.';
$string['feedbackupdate'] = 'Zet veld "{$a->field}" voor "{$a->student}" op "{$a->text}"';
$string['gradelockedingradebook'] = 'Dit cijfer is geblokkeerd in het puntenboek voor {$a}';
$string['graderecentlymodified'] = 'Het cijfer is in het Moodle puntenboek is recenter dan het cijfer op het beoordelingswerkblad voor {$a}';
$string['gradesfile'] = 'Beoordelingswerkblad (csv-opmaak)';
$string['gradesfile_help'] = 'Beoordelingswerkblad met aangepaste cijfers. Dit bestand moet een csv-bestand zijn dat gedownload is via deze opdracht en moet kolommen voor het cijfer van de leerlinge en identificatie bevatten. De encoding van het bestand moet UTF-8 zijn.';
$string['gradeupdate'] = 'Zet het cijfer voor {$a->student} op {$a->grade}';
$string['ignoremodified'] = 'Het updaten van cijfers die recenter zijn in Moodle dan op het werkblad toestaan.';
$string['ignoremodified_help'] = 'Wanneer het beoordelingswerkblad von Moodle gedownload wordt, dan bevat het de laatste wijzigingsdatum voor elk van de cijfers. Als er cijfers na deze data gewijzigd worden via Moodle nadat dit werkblad gedownload is, dan zal Moodle standaard die cijfers niet overschrijven tijdens het importeren van het beoordelingswerkblad. Door deze optie te selecteren schakel je deze beveiligingscontrole uit en wordt het mogelijk bij meerdere beoordelaars dat ze elkaars cijfers overschrijven.';
$string['importgrades'] = 'Bevestig wijzigingen in beoordelingswerkblad';
$string['invalidgradeimport'] = 'Moodle kon het geüploade werkblad niet lezen. Zorg ervoor dat het bewaard wordt als een csv-bestand (door komma\'s gescheiden waarden) en probeer opnieuw.';
$string['nochanges'] = 'Er werden geen gewijzigde cijfers gevonden in het geüploade werkblad.';
$string['offlinegradingworksheet'] = 'Cijfers';
$string['pluginname'] = 'Offline beoordelingswerkblad';
$string['processgrades'] = 'Importeer cijfers';
$string['skiprecord'] = 'Record overslaan';
$string['updatedgrades'] = '{$a} cijfers en feedback aangepast';
$string['updaterecord'] = 'Record aanpassen';
$string['uploadgrades'] = 'Upload beoordelingswerkblad';
