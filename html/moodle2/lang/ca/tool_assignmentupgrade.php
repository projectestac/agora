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
 * Strings for component 'tool_assignmentupgrade', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Esteu segur?';
$string['areyousuremessage'] = 'Esteu segur de voler actualitzar de versió la tasca "{$a->name}"?';
$string['assignmentid'] = 'ID de la tasca';
$string['assignmentnotfound'] = 'La tasca no s\'ha pogut trobar (id={$a})';
$string['assignmentsperpage'] = 'Tasques per pàgina';
$string['assignmenttype'] = 'Tipus de tasca';
$string['backtoindex'] = 'Torna a l\'índex';
$string['batchoperations'] = 'Lot d\'operacions';
$string['batchupgrade'] = 'Actualitza la versió de múltiples tasques';
$string['confirmbatchupgrade'] = 'Confirma el lot d\'actualitzacions de versió de les tasques';
$string['conversioncomplete'] = 'Tasca convertida';
$string['conversionfailed'] = 'La conversió de la tasca ha fallat.
El registre de l\'actualització ha sigut: : <br />{$a}';
$string['listnotupgraded'] = 'Llista de tasques que no han sigut actualitzades de versió.';
$string['listnotupgraded_desc'] = 'Podeu actualitzar tasques de forma individual des d\'aquí';
$string['noassignmentsselected'] = 'No hi ha tasques seleccionades';
$string['noassignmentstoupgrade'] = 'No hi ha tasques que calgui actualitzar';
$string['notupgradedintro'] = 'Aquesta pàgina llista les tasques creades amb un versió de Moodle antiga que no han sigut actualitzades de versió al nou mòdul de tasques en Moodle 2.3 . Totes les tasques no s\'hauran pogut atualitzar- si han sigut creades amb un subtípus personalitzat, llavors aquest subtípus cal que sigui actualitzat de versió al nou format de connector de tasques per completar l\'actualització de versió.';
$string['notupgradedtitle'] = 'Tasques no actualitzades de versió';
$string['pluginname'] = 'Ajuda en l\'actualització de versió de tasques';
$string['select'] = 'Selecciona';
$string['submissions'] = 'Enviaments';
$string['supported'] = 'Actualitza la versió';
$string['unknown'] = 'Desconegut';
$string['updatetable'] = 'Taula d\'actualitzacions';
$string['upgradable'] = 'Actualitzable (de versió)';
$string['upgradeall'] = 'Actualitza de versió totes les tasques';
$string['upgradeallconfirm'] = 'Voleu actualitzar de versió totes les tasques?';
$string['upgradeassignmentfailed'] = 'Resultat: Actualització de versió fallada. El registre de l\'actualització de versió és:<br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Resultat: Actualització de versió amb èxit.';
$string['upgradeassignmentsummary'] = 'Actualització de la tasca: {$a->name} (Course: {$a->shortname})';
$string['upgradeprogress'] = 'Actualització de la tasca {$a->current} de {$a->total}';
$string['upgradeselected'] = 'Actualitza de versió tasques seleccionades';
$string['upgradeselectedcount'] = 'Voleu actualitzar de versió les tasques seleccionades {$a} ?';
$string['upgradesingle'] = 'Actualitza de versió una sola tasca';
$string['viewcourse'] = 'Mostra el curs amb les tasques convertides';
