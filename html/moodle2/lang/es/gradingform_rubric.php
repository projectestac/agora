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
 * Strings for component 'gradingform_rubric', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Añadir criterio';
$string['alwaysshowdefinition'] = 'Permitir a los usuarios una vista previa de la rúbrica utilizada en el módulo (en caso contrario, la rúbrica solo será visible después de la clasificación)';
$string['backtoediting'] = 'Volver a edición';
$string['confirmdeletecriterion'] = '¿Está seguro que quiere eliminar el criterio?';
$string['confirmdeletelevel'] = '¿Está seguro que quiere eliminar este nivel?';
$string['criterionaddlevel'] = 'Añadir nivel';
$string['criteriondelete'] = 'Eliminar criterio';
$string['criterionempty'] = 'Clic para editar criterio';
$string['criterionmovedown'] = 'Mover abajo';
$string['criterionmoveup'] = 'Mover arriba';
$string['definerubric'] = 'Definir rúbrica';
$string['description'] = 'Descripción';
$string['enableremarks'] = 'Permitir a quien califica añadir comentarios de texto para cada criterio';
$string['err_mintwolevels'] = 'Cada criterio debe tener al menos dos niveles';
$string['err_nocriteria'] = 'La rúbrica debe contener al menos un criterio';
$string['err_nodefinition'] = 'La definición del nivel no puede estar en blanco';
$string['err_nodescription'] = 'La definición del criterio no puede estar en blanco';
$string['err_scoreformat'] = 'El número de puntos para cada nivel debe ser un número válido no negativo';
$string['err_totalscore'] = 'El número máximo de puntos posibles cuando se califica por rúbricas debe ser mayor que cero';
$string['gradingof'] = 'Calificando {$a}';
$string['leveldelete'] = 'Eliminar nivel';
$string['levelempty'] = 'Clic para editar el nivel';
$string['name'] = 'Nombre';
$string['needregrademessage'] = 'La definición de la rúbrica fue cambiada después de que este estudiante hubiera sido calificado. El estudiante no puede ver esta rúbrica hasta que usted la verifique y  actualice la calificación.';
$string['pluginname'] = 'Rúbrica';
$string['previewrubric'] = 'Previsualizar rubrica';
$string['regrademessage1'] = 'Usted está a punto de guardar los cambios en una rúbrica que ya ha sido utilizada para calificar. Por favor, indique si las calificaciones existentes deben ser revisadas. Si decide que debe ser así, entonces la rúbrica se ocultará a los estudiantes hasta el elemento sea recalificado.';
$string['regrademessage5'] = 'Usted está a punto de guardar cambios significativos en una rúbrica que ya ha sido utilizada para la clasificación. El valor del libro de calificaciones no se verá afectado, pero la rúbrica no será visible para los estudiantes hasta que sus elementos  sean recalificados.';
$string['regradeoption0'] = 'No marcar para recalificar';
$string['regradeoption1'] = 'Marcar para recalificar';
$string['restoredfromdraft'] = 'NOTA: El último intento de calificación de esta persona no se ha guardado correctamente, por lo que se han restaurado la calificaciónes provisionales. Si desea cancelar los cambios utilice el botón inferior, "Cancelar".';
$string['rubric'] = 'Rúbrica';
$string['rubricmapping'] = 'Reglas para la puntuación';
$string['rubricmappingexplained'] = 'La puntuación mínima posible para esta rúbrica es de <b> {$a->minscore} punto(s) </b> y se convertirá en la nota mínima posible en este módulo (que es cero a menos que la escala se utilice).
La puntuación máxima es de<b> {$a->maxscore}  punto(s) </b> y se convertirá en la nota máxima posible  <br />
Puntuaciones intermedias se convertirán y redondearán a la calificación más cercana disponible.<br />
Si se utiliza una escala en lugar de una calificación, la puntuación se convertirá en los elementos de la escala como si fueran números enteros consecutivos.';
$string['rubricnotcompleted'] = 'Por favor, escoja para cada criterio';
$string['rubricoptions'] = 'Opciones de rúbrica';
$string['rubricstatus'] = 'Estado actual de la rúbrica';
$string['save'] = 'Guardar';
$string['saverubric'] = 'Guardar rúbrica y dejarla preparada';
$string['saverubricdraft'] = 'Guardar como borrador';
$string['scorepostfix'] = '{$a}puntos';
$string['showdescriptionstudent'] = 'Mostrar la descripción de la rúbrica a aquellos que serán calificados';
$string['showdescriptionteacher'] = 'Mostrar la descripción de la rúbrica durante al evaluación';
$string['showremarksstudent'] = 'Mostrar comentarios a los evaluados';
$string['showscorestudent'] = 'Mostrar los puntos para cada nivel a los evaluados';
$string['showscoreteacher'] = 'Mostrar los puntos para cada nivel durante la evaluación';
$string['sortlevelsasc'] = 'Criterio de ordenación por niveles:';
$string['sortlevelsasc0'] = 'Descendente por número de puntos';
$string['sortlevelsasc1'] = 'Ascendente por número de puntos';
