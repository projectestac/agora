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
 * Strings for component 'tool_assignmentupgrade', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Weet je het zeker?';
$string['areyousuremessage'] = 'Weet je zeker dat je de opdracht  "{$a->name}" wil upgraden?';
$string['assignmentid'] = 'Opdracht ID';
$string['assignmentnotfound'] = 'Opdracht kon niet gevonden worden (id={$a})';
$string['assignmentsperpage'] = 'Opdrachten per pagina';
$string['assignmenttype'] = 'Opdrachttype';
$string['backtoindex'] = 'Terug naar index';
$string['batchoperations'] = 'Volume-operaties';
$string['batchupgrade'] = 'Meerdere opdrachten upgraden';
$string['confirmbatchupgrade'] = 'Bevestig volume-upgrade van opdrachten';
$string['conversioncomplete'] = 'Opdracht geconverteerd';
$string['conversionfailed'] = 'De opdrachtconversie is mislut. De log van de upgrade is: <br /> {$a}';
$string['listnotupgraded'] = 'Lijst met opdrachten die niet geüpgraded zijn';
$string['listnotupgraded_desc'] = 'Je kunt van hieruit individuele opdrachten upgraden';
$string['noassignmentsselected'] = 'Geen opdrachten geselecteerd';
$string['noassignmentstoupgrade'] = 'Er zijn geen opdrachten die geüpgraded moeten worden';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'Deze pagina geeft een lijs van opdrachten die gemaakt zijn met een oudere Moodleversie, maar die nog niet geüpgraded zijn naar de nieuwe opdrachtmodule in Moodle 2.3. Niet alle opdrachten kunnen geüpgraded worden - als ze gemaakt zijn met een aangepast subtype, dan moet dat subtype geüpgraded worden naar de nieuwe opdrachten plugin opmaak om de upgrade te kunnen voltooien.';
$string['notupgradedtitle'] = 'Opdrachten die niet geüpgraded zijn';
$string['pluginname'] = 'Opdracht upgrade helper';
$string['select'] = 'Selecteer';
$string['submissions'] = 'Inzendingen';
$string['supported'] = 'Upgrade';
$string['unknown'] = 'Onbekend';
$string['updatetable'] = 'Update tabel';
$string['upgradable'] = 'Upgradebaar';
$string['upgradeall'] = 'Upgrade alle opdrachten';
$string['upgradeallconfirm'] = 'Upgrade alle opdrachten?';
$string['upgradeassignmentfailed'] = 'Resultaat: upgrade mislukt. De log van de upgrade is: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Resultaat: upgrade gelukt';
$string['upgradeassignmentsummary'] = 'Upgrade opdracht: {$a->name} (Cursus {$a->shortname})';
$string['upgradeprogress'] = 'Upgrade opdracht {$a->current} van {$a->total}';
$string['upgradeselected'] = 'Upgrade geselecteerde opdrachten';
$string['upgradeselectedcount'] = 'Upgrade {$a} geselecteerde opdrachten?';
$string['upgradesingle'] = 'Upgrade één enkele opdracht';
$string['viewcourse'] = 'Bekijk de cursus met de geconverteerde opdracht';
