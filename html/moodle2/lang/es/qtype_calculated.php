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
 * Strings for component 'qtype_calculated', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Agregar ítem';
$string['addmoreanswerblanks'] = 'Agregar otra respuesta en blanco.';
$string['addmoreunitblanks'] = 'Espacios en blanco para {$a} unidades más';
$string['addsets'] = 'Agregar conjunto(s)';
$string['answerhdr'] = 'Respuesta';
$string['answerstoleranceparam'] = 'Parámetros de tolerancia en las respuestas';
$string['atleastoneanswer'] = 'Necesita proporcionar al menos una respuesta.';
$string['atleastonerealdataset'] = 'Debe haber por lo menos un conjunto de datos reales en el texto de la pregunta';
$string['atleastonewildcard'] = 'Debe haber al menos un comodín en la fórmula de respuesta o texto de la pregunta';
$string['calcdistribution'] = 'Distribución';
$string['calclength'] = 'Decimales';
$string['calcmax'] = 'Máximo';
$string['calcmin'] = 'Mínimo';
$string['choosedatasetproperties'] = 'Elija las propiedades del conjunto de datos de los comodines';
$string['choosedatasetproperties_help'] = 'Un conjunto de datos es un conjunto de valores que sustituyen a un comodín. Usted puede crear un conjunto de datos privado para una pregunta determinada o un conjunto de datos compartido que puede ser utilizado en otras preguntas calculadas dentro de la categoría.';
$string['correctanswerformula'] = 'Fórmula para calcular la respuesta correcta';
$string['correctanswershows'] = 'La respuesta correcta muestra';
$string['correctanswershowsformat'] = 'Formato';
$string['correctfeedback'] = 'Para cualquier respuesta correcta';
$string['datasetrole'] = 'Los comodines <strong>{x..} </ Strong> se sustituirán por valores numéricos de entre su conjunto de datos';
$string['deleteitem'] = 'Eliminar ítem';
$string['deletelastitem'] = 'Eliminar último ítem';
$string['editdatasets'] = 'Editar el conjunto de datos de os comodines';
$string['editdatasets_help'] = 'Los valores comodín se pueden crear mediante la introducción de un número en cada campo "comodín" y clic en el botón añadir. Para generar automáticamente 10 o más valores, seleccione el número de valores necesarios antes de hacer clic en el botón añadir. Una "distribución uniforme" significa que cualquier valor entre los límites establecidos tiene la misma probabilidad de que se genere;  una "distribución log-uniforme" significa que los valores situados hacia el límite inferior tienen más probabilidad.';
$string['existingcategory1'] = 'usará un conjunto de datos compartidos ya existente';
$string['forceregeneration'] = 'forzar regeneración';
$string['functiontakesnoargs'] = 'La función {$a} no toma ningún argumento';
$string['hexanotallowed'] = 'El valor hexadecimal {$a->value} del conjunto de datos <strong>{$a->name}</strong> no está permitido';
$string['incorrectfeedback'] = 'Para cualquier respuesta incorrecta';
$string['itemno'] = 'Ítem {$a}';
$string['itemtoadd'] = 'Item para agregar';
$string['keptcategory1'] = 'usará el mismo conjunto de datos compartidos que antes';
$string['keptlocal1'] = 'usará el mismo conjunto de datos privado que antes';
$string['loguniform'] = 'Log-uniforme';
$string['makecopynextpage'] = 'Página siguiente (nueva pregunta)';
$string['mandatoryhdr'] = 'Hay comodines obligatorios en las respuestas';
$string['minmax'] = 'Rango de valores';
$string['missingquestiontext'] = 'No se encuentra el texto de la pregunta';
$string['mustbenumeric'] = 'Debe escribir un número.';
$string['mustnotbenumeric'] = 'No puede ser un número.';
$string['newcategory1'] = 'usará un nuevo conjunto de datos compartido';
$string['newlocal1'] = 'usará un nuevo conjunto de datos privado';
$string['newsetwildcardvalues'] = 'nueva(s) serie(s) de valores para el comodín';
$string['nextitemtoadd'] = 'Siguiente \'Item a agregar\'';
$string['nextpage'] = 'Siguiente Página';
$string['nocoherencequestionsdatyasetcategory'] = 'Para el Id de la pregunta {$a->qid}, el Id de la categoría {$a->qcat} no es idéntico al comodín compartido {$a->name} Id de categoría  {$a->sharedcat}. Edite la pregunta.';
$string['nodataset'] = 'nada - no es un comodín';
$string['nosharedwildcard'] = 'No hay comodines compartidos en esta categoría';
$string['notvalidnumber'] = 'El valor del comodín no es un número válido';
$string['oneanswertrueansweroutsidelimits'] = 'Al menos una respuesta correcta  fuera de los límites de valor real.<br/> Modifique los valores de la configuración de la tolerancia en las respuestas disponibles en Parámetros avanzados';
$string['param'] = 'Parámetro {<strong> {$a} </strong>}';
$string['partiallycorrectfeedback'] = 'Para cualquier respuesta parcialmente correcta';
$string['pluginname'] = 'Calculada';
$string['pluginnameadding'] = 'Agregando una pregunta calculada';
$string['pluginnameediting'] = 'Editando una pregunta calculada';
$string['pluginname_help'] = 'Las preguntas calculadas permiten crear preguntas numéricas utilizando comodines dentro de llaves que se sustituyen por valores concretos cuando se realiza el cuestionario. Por ejemplo, la pregunta "¿Cuál es el área de un rectángulo de longitud {I} y ancho {w}?" tendría como respuesta correcta la fórmual "{l} * {w}" (donde * es el signo de multiplicación).';
$string['pluginnamesummary'] = 'Las preguntas calculadas son similares a preguntas numéricas pero con números seleccionados aleatoriamente de un conjunto cuando se intenta resolver el cuestionario.';
$string['possiblehdr'] = 'Es posible comodines sólo en el texto de la pregunta';
$string['questiondatasets'] = 'Conjunto de datos de la pregunta';
$string['questiondatasets_help'] = 'Grupo de datos para los comodines que se usarán en cada pregunta.';
$string['setno'] = 'Valor {$a} del conjunto';
$string['setwildcardvalues'] = 'serie(s) de valores para el comodín';
$string['sharedwildcard'] = 'Comodín compartido <strong>{$a}</strong>';
$string['sharedwildcardname'] = 'Comodiín compartido';
$string['sharedwildcards'] = 'Comodines compartidos';
$string['showitems'] = 'Mostrar';
$string['significantfiguresformat'] = 'Cifras significativas';
$string['synchronize'] = 'Sincronizar los datos de un conjunto de datos compartido con otras preguntas dentro de un cuestionario';
$string['synchronizeno'] = 'No sincronizar';
$string['synchronizeyes'] = 'Sincronizar';
$string['synchronizeyesdisplay'] = 'Sincronizar y mostrar el nombre de los conjuntos de datos compartidos como prefijo del nombre de la pregunta';
$string['tolerance'] = 'Tolerancia ±';
$string['trueanswerinsidelimits'] = 'Respuesta correcta: {$a->correct} dentro de los límites del valor verdadero {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">ERROR Respuesta correcta: {$a->correct} fuera de los límites del valor verdadero {$a->true}</span>';
$string['uniform'] = 'Uniforme';
$string['uniformbit'] = 'decimales, de una distribución uniforme';
$string['updatecategory'] = 'Actualizar la categoría';
$string['updatedatasetparam'] = 'Actualice los parámetros del grupo de datos';
$string['updatetolerancesparam'] = 'Actualice los parámetros de tolerancia en las respuestas';
$string['updatewildcardvalues'] = 'Actualizar los valores de los comodines';
$string['usedinquestion'] = 'Usada en Pregunta';
$string['wildcard'] = 'Comodín <strong>{$a}</strong>}';
$string['wildcardparam'] = 'Parámetros de los comodines usados para generar los valores';
$string['wildcardrole'] = 'Los comodines <strong>{x..} </ Strong> se sustituirán por valores numéricos de entre los valores generados';
$string['wildcards'] = 'Comodines {a}...{z}';
$string['wildcardvalues'] = 'Valores de comodines';
$string['wildcardvaluesgenerated'] = 'Valores de los comodines generados';
$string['youmustaddatleastoneitem'] = 'Debe añadir al menos un conjunto de datos para poder guardar esta pregunta.';
$string['youmustaddatleastonevalue'] = 'Debe agregar al menos un juego de valores para los comodines antes de poder guardar esta pregunta.';
$string['youmustenteramultiplierhere'] = 'Debe escribir un multiplicador aquí.';
$string['zerosignificantfiguresnotallowed'] = '¡La respuesta correcta no puede tener cero cifras significativas!';
