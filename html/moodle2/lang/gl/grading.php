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
 * Strings for component 'grading', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '«{$a->method}» está seleccionado como método activo de cualificación para a área «{$a->area}»';
$string['activemethodinfonone'] = 'Non hai seleccionado un método de cualificación avanzada para a área «{$a->area}». Empregarase a cualificación directa simple.';
$string['changeactivemethod'] = 'Cambiar o método activo de cualificación a';
$string['clicktoclose'] = 'premer para pechar';
$string['exc_gradingformelement'] = 'Non é posíbel crear instancias do elemento formulario de cualificación';
$string['gradingformunavailable'] = 'Teña en conta que o formulario de cualificación avanzada non está preparado neste momento. Empregarase o método de cualificación simple ata que formulario teña un estado correcto.';
$string['gradingmanagement'] = 'Cualificación avanzada';
$string['gradingmanagementtitle'] = 'Cualificación avanzada: {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Método de cualificación';
$string['gradingmethod_help'] = 'Escolla o método de cualificación avanzada que debe empregarse para o cálculo das cualificacións no contexto dado.

Para desactivar a cualificación avanzada e volver ao mecanismo de cualificación predeterminado, escolla «Cualificación directa simple».';
$string['gradingmethodnone'] = 'Cualificación directa simple';
$string['gradingmethods'] = 'Métodos de cualificación';
$string['manageactionclone'] = 'Crear un novo formulario de cualificación a partir dun modelo';
$string['manageactiondelete'] = 'Eliminar o formulario definido actualmente';
$string['manageactiondeleteconfirm'] = 'Vai eliminar o formulario de cualificación «{$a->formname}» e toda a información asociada de «{$a->component} ({$a->area})». Asegúrese de que comprende as seguintes consecuencias:

* Non hai forma de desfacer a operación.
* Vostede pode cambiar a outro método de cualificación, incluída a «Cualificación directa simple» sen eliminar este formulario.
* Toda a información sobre cualificacións contida nos formularios perderase.
* O resultado das cualificacións calculadas almacenado no libro de cualificacións non estará afectado. Porén, a explicación da forma en que se calcularon no estará dispoñíbel.
* Esta operación non afecta ás copias eventuais deste formulario noutras actividades.';
$string['manageactiondeletedone'] = 'O formulario foi eliminado correctamente';
$string['manageactionedit'] = 'Editar a definición do formulario actual';
$string['manageactionnew'] = 'Definir un novo formulario de cualificación desde cero';
$string['manageactionshare'] = 'Publicar o formulario como un modelo novo';
$string['manageactionshareconfirm'] = 'Vai gardar unha copia do formulario de cualificación «{$a}» como modelo público novo. Outros usuarios do seu sitio seran quen de crear novas formas de cualificación nas súas actividades a partir dese modelo.';
$string['manageactionsharedone'] = 'O formulario foi correctamente gardado como un modelo';
$string['noitemid'] = 'Non é posíbel cualificar. Non existe o elemento cualificado.';
$string['nosharedformfound'] = 'Non se atoparon modelos';
$string['searchownforms'] = 'incluír os meus propios formularios';
$string['searchtemplate'] = 'Busca de formularios de cualificación';
$string['searchtemplate_help'] = 'Pode buscar un formulario de cualificación e utilizalo como modelo para dispor aquí dun novo formulario de cualificación. Simplemente escriba as palabras que deben aparecer nalgún lugar do nome do formulario, a súa descrición ou o corpo do formulario en si. Para buscar una frase, envolva toda a consulta entre comiñas dobres.

De xeito predeterminado, só se incluirán nos resultados da busca os formularios de cualificación que se teñan gardado como modelos compartidos. Tamén pode incluír todos os seus formularios de cualificación nos resultados da busca. Deste xeito, vostede pode simplemente volver a empregar os formularios de cualificación sen compartilos. Soamente os formularios marcados como «Listo para empregar» poden empregarse deste xeito.';
$string['statusdraft'] = 'Versión preliminar';
$string['statusready'] = 'Listo para empregar';
$string['templatedelete'] = 'Eliminar';
$string['templatedeleteconfirm'] = 'Vai eliminar o modelo compartido «{$a}». A eliminación dun modelo non afecta aos formatos existentes que se crearon a partir del.';
$string['templateedit'] = 'Editar';
$string['templatepick'] = 'Empregar este modelo';
$string['templatepickconfirm'] = 'Quere empregar o formulario de cualificación «{$a->formname}»  como un modelo para o novo formulario de cualificación en «{$a->component} ({$a->area})»?';
$string['templatepickownform'] = 'Empregar este formulario como un modelo';
$string['templatesource'] = 'Localización: {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Formulario propio';
$string['templatetypeshared'] = 'Modelo compartido';
