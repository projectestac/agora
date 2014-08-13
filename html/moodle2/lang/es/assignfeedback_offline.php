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
 * Strings for component 'assignfeedback_offline', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Confirme importación de calificaciones';
$string['default'] = 'Habilitado por defecto';
$string['default_help'] = 'Si se activa la opción, la calificación externa mediante hoja de cálculo se habilitará por defecto para todas las tareas nuevas.';
$string['downloadgrades'] = 'Descargar la hoja de calificaciones';
$string['enabled'] = 'Hoja de calificaciones externa';
$string['enabled_help'] = 'Si se habilita, el profesor podrá cargar y descargar una hoja de cálculo con las calificaciones de los estudiantes cuando puntúe las tareas.';
$string['feedbackupdate'] = 'Establezca el campo "{$a->field}" para "{$a->student}" a "{$a->text}"';
$string['gradelockedingradebook'] = 'La calificación ha sido bloqueada en el libro de calificaciones para {$a}';
$string['graderecentlymodified'] = 'La calificación se ha modificado antes en Moodle que en la hoja de calificaciones para {$a}';
$string['gradesfile'] = 'Hoja de cálculo de calificación (formato csv)';
$string['gradesfile_help'] = 'Calificación mediante hoja de cálculo con calificaciones modificadas. El archivo debe ser un fichero CSV descargado desde esta tarea y debe contener las columnas de la calificación de los estudiantes y el identificador. La codificación del fichero debe ser "UTF-8"';
$string['gradeupdate'] = 'Establece la calificación de {$a->student} en {$a->grade}';
$string['ignoremodified'] = 'Permitir la actualización de los registros que se han modificado recientemente en Moodle antes que en la hoja de cálculo.';
$string['ignoremodified_help'] = 'Cuando se descarga de Moodle la hoja de calificaciones, esta contiene la última fecha de modificación de cada una de las calificaciones. Si alguna de las calificaciones en Moodle se actualiza después de que esta hoja de trabajo se haya descargado, por defecto Moodle rechazará sobrescribir esta información actualizada al importar las calificaciones.  Al seleccionar esta opción, se desactivará en Moodle esta comprobación de seguridad y entonces será posible que cuando hay varios evaluadores estos puedan sobrescribirse unos a otros sus calificaciones.';
$string['importgrades'] = 'Confirmar los cambios en la hoja de calificaciones';
$string['invalidgradeimport'] = 'Moodle no puede leer la hoja cargada. Asegúrese de que esta guardada utilizando el formato de separación por comas (.csv) y vuelva a intentarlo.';
$string['nochanges'] = 'No hay calificaciones modificadas en la hoja importada';
$string['offlinegradingworksheet'] = 'Calificaciones';
$string['pluginname'] = 'Hoja de calificaciones externa';
$string['processgrades'] = 'Importar calificaciones';
$string['skiprecord'] = 'pasar por alto registro';
$string['updatedgrades'] = 'Actualizadas {$a} calificaciones y retroalimentaciones';
$string['updaterecord'] = 'Actualizar el registro';
$string['uploadgrades'] = 'Subir la hojas de calificaciones';
