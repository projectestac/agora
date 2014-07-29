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
 * Strings for component 'workshopallocation_scheduled', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Estado actual';
$string['currentstatusexecution'] = 'Estado';
$string['currentstatusexecution1'] = 'Ejecutado el {$a->datetime}';
$string['currentstatusexecution2'] = 'Para ser ejecutado nuevamente el {$a->datetime}';
$string['currentstatusexecution3'] = 'Para ser ejecutado el {$a->datetime}';
$string['currentstatusexecution4'] = 'Esperando ejecución';
$string['currentstatusnext'] = 'Próxima ejecución';
$string['currentstatusnext_help'] = 'En algunos casos la asignación está programada para ser ejecutada nuevamente de forma automática incluso si ya ha sido ejecutada. Esto puede ocurrir, por ejemplo, cuando la fecha límite ha sido ampliada.';
$string['currentstatusreset'] = 'Reiniciar';
$string['currentstatusreset_help'] = 'Guardar el formulario con esta casilla activada, hará que el estado actual sea reiniciado. Toda la información sobre la ejecución previa será eliminada por lo que la asignación puede ser ejecutada nuevamente (si está habilitada).';
$string['currentstatusresetinfo'] = 'Marca esta casilla y guarda el formulario para reiniciar el resultado de la ejecución';
$string['currentstatusresult'] = 'Resultado de la ejecución reciente';
$string['enablescheduled'] = 'Habilitar asignación programada';
$string['enablescheduledinfo'] = 'Asignar automáticamente las entregas al final de la fase de envío';
$string['pluginname'] = 'Asignación programada';
$string['randomallocationsettings'] = 'Ajustes de asignación';
$string['randomallocationsettings_help'] = 'Los parámetros de la asignación se definen aquí. Estos parámetros se usan para definir cómo se asignan los envíos.';
$string['resultdisabled'] = 'Asignación programada deshabilitada';
$string['resultenabled'] = 'Asignación programada habilitada';
$string['resultexecuted'] = 'Éxito';
$string['resultfailed'] = 'No ha sido posible asignar automáticamente los envíos';
$string['resultfailedconfig'] = 'Asignación programada desconfigurada';
$string['resultfaileddeadline'] = 'El taller no tiene fecha límite de entrega programada';
$string['resultfailedphase'] = 'El taller no está en la fase de entrega';
$string['resultvoid'] = 'Ningún envío ha sido asignado';
$string['resultvoiddeadline'] = 'Aún no ha terminado la fecha límite de envíos';
$string['resultvoidexecuted'] = 'La asignación ha sido ejecutada';
$string['scheduledallocationsettings'] = 'Ajustes de la asignación programada';
$string['scheduledallocationsettings_help'] = 'Si esta opción está activada, el método de asignación programada de envíos asignará automáticamente dichos envíos para ser evaluados al finalizar la fecha límite de envío. El final de la fase puede ser definido en la configuración del taller, dentro del apartado \'Fecha límite de envíos\'.

Internamente, el método de asignación aleatorio es ejecutado con los parámetros predefinidos en el formulario. Esto significa que la asignación programada funciona como si el profesor ejecutara la asignación aleatoria al final de la fase de envío usando los parámetros a continuación

Tenga en cuenta que la asignación programada *no* será ejecutada si cambia el taller a la fase de evaluación de forma manual antes de la fecha límite de envío. En este caso, tendrá que asignar los envíos manualmente. La asignación programada es especialmente útil cuando se usa junto con la opción de cambio automático de fase.';
$string['setup'] = 'Configurar asignación programada';
