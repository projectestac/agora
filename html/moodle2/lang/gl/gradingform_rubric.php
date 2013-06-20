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
 * Strings for component 'gradingform_rubric', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Engadir criterio';
$string['alwaysshowdefinition'] = 'Permitirlle aos usuarios obter unha vista previa da rúbrica empregada no módulo (do contrario a rúbrica só será visíbel despois da cualificación)';
$string['backtoediting'] = 'Volver á edición';
$string['confirmdeletecriterion'] = 'Confirma que quere eliminar este criterio?';
$string['confirmdeletelevel'] = 'Confirma que quere eliminar este nivel?';
$string['criterionaddlevel'] = 'Engadir nivel';
$string['criteriondelete'] = 'Eliminar criterio';
$string['criterionempty'] = 'Prema para editar o criterio';
$string['criterionmovedown'] = 'Baixar';
$string['criterionmoveup'] = 'Subir';
$string['definerubric'] = 'Definir rúbrica';
$string['description'] = 'Descrición';
$string['enableremarks'] = 'Permitirlle ao corrector engadir novas correccións para cada criterio';
$string['err_mintwolevels'] = 'Cada criterio debe ter polo menos dous niveis';
$string['err_nocriteria'] = 'A rúbrica debe conter polo menos un criterio';
$string['err_nodefinition'] = 'A definición do nivel non pode estar baleira';
$string['err_nodescription'] = 'A descrición do criterio non pode estar baleira';
$string['err_scoreformat'] = 'O número de puntos para cada nivel debe ser un número correcto e non negativo';
$string['err_totalscore'] = 'O número máximo de puntos posíbeis cando se cualifica pola rúbrica debe ser maior que cero';
$string['gradingof'] = 'Cualificando {$a}';
$string['leveldelete'] = 'Eliminar nivel';
$string['levelempty'] = 'Prema para editar o nivel';
$string['name'] = 'Nome';
$string['needregrademessage'] = 'A definición da rubrica foi cambiada despois de que este alumno fose cualificado. O alumno non pode ver esta rubrica ata que vostede comprobe a rubrica e actualice a cualificación.';
$string['pluginname'] = 'Rúbrica';
$string['previewrubric'] = 'Vista previa da rúbrica';
$string['regrademessage1'] = 'Está a piques de gardar os cambios nunha rubrica que xa foi empregada para cualificación. Indique se as cualificacións existentes necesitan ser revisadas. Se estabelece isto entón a rubrica agochase para os alumnos ata que o elemento sexa cualificado de novo.';
$string['regrademessage5'] = 'Está a piques de gardar cambios significativos nunha rubrica que xa foi empregada para cualificación. O valor no libro de cualificacións non cambiará, mais a rubrica agochase para os alumnos ata que o elemento sexa cualificado de novo.';
$string['regradeoption0'] = 'Non corrixir para volver cualificar';
$string['regradeoption1'] = 'Corrixir para volver cualificar';
$string['restoredfromdraft'] = 'NOTA: O último intento para cualificar a esta persoa non foi gardado correctamente mais as cualificacións das versións preliminares foron restauradas. Se quere cancelar os cambios empregue o botón «Cancelar» de embaixo.';
$string['rubric'] = 'Rúbrica';
$string['rubricmapping'] = 'Puntuación das regras de asignación de cualificación';
$string['rubricmappingexplained'] = 'A puntuación mínima posíbel para esta rúbrica é  <b>{$a->minscore} puntos</b> e converteranse na cualificación mínima dispoñíbel neste módulo (que é cero a non ser que se empregue a escala.
    A puntuación máxima <b>{$a->maxscore} points</b> converterase na cualificación máxima.<br />
    As puntuacións intermedias converteranse respectivamente e redondearanse a cualificación máis próxima dispoñíbel.<br />
    De empregarse unha escala no canto dunha cualificación, a puntuación converterase á escala dos elementos como se fosen números enteiros consecutivos.';
$string['rubricnotcompleted'] = 'Escolla algo para cada criterio';
$string['rubricoptions'] = 'Opcións da rúbrica';
$string['rubricstatus'] = 'Estado actual da rúbrica';
$string['save'] = 'Gardar';
$string['saverubric'] = 'Gardar a a rúbrica e deixala rematada';
$string['saverubricdraft'] = 'Gardar como versión preliminar';
$string['scorepostfix'] = '{$a} puntos';
$string['showdescriptionstudent'] = 'Presenta a descrición da rúbrica aos que están a seren cualificados';
$string['showdescriptionteacher'] = 'Presenta a descrición da rúbrica durante a avaliación';
$string['showremarksstudent'] = 'Amosar as novas correccións aos que están a seren cualificados';
$string['showscorestudent'] = 'Presenta os puntos para cada nivel aos que están a seren cualificados';
$string['showscoreteacher'] = 'Presenta os puntos para cada nivel durante a avaliación';
$string['sortlevelsasc'] = 'Criterio de ordenación para os niveis:';
$string['sortlevelsasc0'] = 'Descendente por número de puntos';
$string['sortlevelsasc1'] = 'Ascendente por número de puntos';
