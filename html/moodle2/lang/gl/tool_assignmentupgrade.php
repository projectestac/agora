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
 * Strings for component 'tool_assignmentupgrade', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Está seguro?';
$string['areyousuremessage'] = 'Confirma que quere anovar a tarefa «{$a->name}»?';
$string['assignmentid'] = 'ID da tarefa';
$string['assignmentnotfound'] = 'Non foi posíbel atopar a tarefa (id={$a})';
$string['assignmentsperpage'] = 'Tarefas por páxina';
$string['assignmenttype'] = 'Tipo de tarefa';
$string['backtoindex'] = 'Volver ao índice';
$string['batchoperations'] = 'Operacións en lote';
$string['batchupgrade'] = 'Anovar múltiplas tarefas';
$string['confirmbatchupgrade'] = 'Confirmar anovación en lote de tarefas';
$string['conversioncomplete'] = 'Tarefa convertida';
$string['conversionfailed'] = 'A conversión de tarefas non acabou correctamente. O rexistro da anovación foi: <br />{$a}';
$string['listnotupgraded'] = 'Tarefas da lista que non se anovaron';
$string['listnotupgraded_desc'] = 'Pode anovar as tarefas individuais desde aquí';
$string['noassignmentsselected'] = 'Non se asignaron tarefas';
$string['noassignmentstoupgrade'] = 'Non houbo tarefas que requiran anovación';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'Esta páxina lista as tarefas creadas cunha antiga versión de Moodle que non se anovou no novo módulo de tarefa en Moodle 2.3. Non todas as tarefas se poden anovar - se foron creadas cun subtipo personalizado de tarefa, entón ese subtipo deberá ser anovado co novo formato do engadido para poder completar a anovación.';
$string['notupgradedtitle'] = 'Tarefas non anovadas';
$string['pluginname'] = 'Axudante de anovación de tarefa';
$string['select'] = 'Seleccionar';
$string['submissions'] = 'Entregas';
$string['supported'] = 'Anovar';
$string['unknown'] = 'Descoñecido';
$string['updatetable'] = 'Táboa de actualización';
$string['upgradable'] = 'Anovábel';
$string['upgradeall'] = 'Anovar todas as tarefas';
$string['upgradeallconfirm'] = 'Anovar todas as tarefas?';
$string['upgradeassignmentfailed'] = 'Resultado: Fallou a anovación. O rexistro da anovación foi: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Resultado: A anovación foi correcta';
$string['upgradeassignmentsummary'] = 'Tarefa de anovación: {$a->name} (Curso: {$a->shortname})';
$string['upgradeprogress'] = 'Anovar a tarefa {$a->current} of {$a->total}';
$string['upgradeselected'] = 'Anovar as tarefas seleccionadas';
$string['upgradeselectedcount'] = 'Anovar {$a} tarefas seleccionadas?';
$string['upgradesingle'] = 'Anovar unha única tarefa';
$string['viewcourse'] = 'Ver o curso da tarefa convertida';
