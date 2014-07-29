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
 * Strings for component 'assignfeedback_offline', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Confirmar a importación de cualificacións';
$string['default'] = 'Activado de xeito predeterminado';
$string['default_help'] = 'De estar estabelecida, a cualificación en desconexión activarase a cualificación con follas de cálculo de modo predeterminado para as novas tarefas.';
$string['downloadgrades'] = 'Descargar a folla de cualificacións';
$string['enabled'] = 'Folla de cualificacións externa';
$string['enabled_help'] = 'De estar activada, o profesor poderá descargar e enviar unha folla de cálculo con cualificacións de alumnos para puntuar as tarefas.';
$string['feedbackupdate'] = 'Estabeleza o campo «{$a->field}» para «{$a->student}» a «{$a->text}»';
$string['gradelockedingradebook'] = 'A cualificación foi bloqueada no libro de cualificacións para {$a}';
$string['graderecentlymodified'] = 'A cualificación foi modificada antes en Moodle que na folla de cualificacións para {$a}';
$string['gradesfile'] = 'Folla de cualificacións (formato csv)';
$string['gradesfile_help'] = 'Follas de cálculo con cualificacións modificadas. Este ficheiro debe ser un csv descargado desde esta tarefa e debe conter columnas para a cualificación do alumnos e identificador. A codificación do ficheiro debe de ser &quot;UTF-8&quot;';
$string['gradeupdate'] = 'Estabelece a cualificación de {$a->student} en {$a->grade}';
$string['ignoremodified'] = 'Permitir a actualización dos rexistros que foron modificados recentemente en Moodle antes que na folla de cualificacións.';
$string['ignoremodified_help'] = 'Cando se descarga de Moodle a folla de cualificacións, esta contén a última data de modificación de cada unha das cualificacións. Se se actualiza algunha das cualificacións en Moodle despois de que se teña descargado esta folla, de xeito predeterminado Moodle rexeitará sobrescribir esta información actualizada ao importar as cualificacións. Ao seleccionar esta opción, desactivarase en Moodle esta comprobación de seguridade e entón será posíbel que cando hai varios correctores estes poidan sobrescribirse uns a outros as súas cualificacións.';
$string['importgrades'] = 'Confirmar os cambios na folla de cualificacións';
$string['invalidgradeimport'] = 'Moodle non é quen de ler a folla enviada. Asegúrese de que esta gardada utilizando o formato de separación por comas (.csv) e tenteo de novo.';
$string['nochanges'] = 'Non hai cualificacións modificadas na folla enviada';
$string['offlinegradingworksheet'] = 'Cualificacións';
$string['pluginname'] = 'Folla de cualificacións externa';
$string['processgrades'] = 'Importar cualificacións';
$string['skiprecord'] = 'Omitir o rexistro';
$string['updatedgrades'] = 'Actualizadas {$a} cualificacións e comentarios';
$string['updaterecord'] = 'Actualizar o rexistro';
$string['uploadgrades'] = 'Enviar a folla de cualificacións';
