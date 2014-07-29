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
 * Strings for component 'tool_assignmentupgrade', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = '¿Está seguro?';
$string['areyousuremessage'] = '¿Está seguro que quiere actualizar la tarea "{$a->name}"?';
$string['assignmentid'] = 'ID de la tarea';
$string['assignmentnotfound'] = 'No se ha encontrado la tarea (id={$a})';
$string['assignmentsperpage'] = 'Tareas por página';
$string['assignmenttype'] = 'Tipo de Tarea';
$string['backtoindex'] = 'Volver al índice';
$string['batchoperations'] = 'Operaciones por lotes';
$string['batchupgrade'] = 'Actualizar varias tareas';
$string['confirmbatchupgrade'] = 'Confirme proceso de actualización de tareas';
$string['conversioncomplete'] = 'Tarea convertida';
$string['conversionfailed'] = 'La conversión de tareas no tuvo éxito. El log de la actualización es: <br />{$a}';
$string['listnotupgraded'] = 'Lista de tareas que no se han actualizado';
$string['listnotupgraded_desc'] = 'Puedo actualizar tareas individualmente desde aquí';
$string['noassignmentsselected'] = 'No hay tareas convertidas';
$string['noassignmentstoupgrade'] = 'No hay tareas que requieran actualización';
$string['notupgradedintro'] = 'Esta página muestra las tareas creadas con una versión anterior de Moodle y que no se han actualizado a la nueva versión del módulo de tareas de Moodle 2.3. No todas las tareas pueden ser actualizadas - si es que fueron creados con un subtipo de tarea personalizada - ya que el subtipo tendría que ser actualizado para el formato de la nueva extensión tarea con el fin de completar la actualización.';
$string['notupgradedtitle'] = 'Tareas no actualizadas';
$string['pluginname'] = 'Motor de Ayuda para actualizar Tareas';
$string['select'] = 'Selección';
$string['submissions'] = 'Envíos';
$string['supported'] = 'Actualice';
$string['unknown'] = 'Desconocida';
$string['updatetable'] = 'Actualizar tabla';
$string['upgradable'] = 'Actualizable';
$string['upgradeall'] = 'Actualice todas las tareas';
$string['upgradeallconfirm'] = '¿Actualizar todas las tareas?';
$string['upgradeassignmentfailed'] = 'Resultado: Fallo en la actualización. El log de la actualización es: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Resultado: Éxito en la actualización';
$string['upgradeassignmentsummary'] = 'Actualización de tarea: {$a->name} (Course: {$a->shortname})';
$string['upgradeprogress'] = 'Actualizar la tarea {$a->current} de {$a->total}';
$string['upgradeselected'] = 'Actualizar tareas seleccionadas';
$string['upgradeselectedcount'] = '¿Actualizar {$a} tareas seleccionadas?';
$string['upgradesingle'] = 'Actualizada tarea única';
$string['viewcourse'] = 'Ver el curso con esta tarea convertida.';
