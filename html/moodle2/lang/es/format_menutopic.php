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
 * Strings for component 'format_menutopic', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   format_menutopic
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionadd_sheet_daughter_sheetedit'] = 'Agregar como hija';
$string['actionadd_sheet_sister_sheetedit'] = 'Agregar como hermana';
$string['actiondeleteconfirm_sheet_sheetedit'] = 'Si elimina la hoja eliminará todas las hojas hijas ¿Está realmente seguro que desea continuar?';
$string['actiondelete_sheet_sheetedit'] = 'Eliminar';
$string['actiondown_sheet_sheetedit'] = 'Mover hacia abajo';
$string['actionleft_sheet_sheetedit'] = 'Mover a la izquierda';
$string['actionright_sheet_sheetedit'] = 'Mover a la derecha';
$string['actionsave_sheet_sheetedit'] = 'Cambiar datos de la hoja';
$string['actions_sheet_sheetedit'] = 'Acciones sobre la hoja';
$string['actionup_sheet_sheetedit'] = 'Mover hacia arriba';
$string['config_editmenu'] = 'Configurar';
$string['config_editmenu_title'] = 'Configuración del menú';
$string['config_template_topic_title'] = 'Configuraciones de funcionalidad -Título de temas desde plantillas-';
$string['csscode'] = 'Código CSS';
$string['cssdefault'] = 'Incluir estilos CSS por defecto';
$string['cssdefault_help'] = 'Define si es que los estilos CSS se incluyen por defecto en el menú. Deshabilitar esta opción puede ser útil para incluir estilos personalizados con la opción de <b>"(CSS) plantilla de estilos"</b>';
$string['csstemplate'] = 'Acerca de: Estilos CSS';
$string['csstemplate_editmenu'] = 'Plantillas de estilos (CSS)';
$string['csstemplate_editmenu_title'] = 'Estilos CSS';
$string['csstemplate_help'] = 'Permite incluir estilos CSS personalizados que  pueden definir una apariencia gráfica personalizada al menú<p>Un ejercicio simple de usar la plantilla de estilos sería: </p> <div style=" white-space:nowrap; font-size: 12px; border: 1px solid #666; padding: 5px; background-color: #CCC"> #id_menu_box { margin-bottom: 10px; } </div> <p>Con el código anterior, el menú está separado 10 pixeles del fondo, de acuerdo a la posición definida para el menú.</p> <p><strong>Nota:</strong> <ul> <li>El identificador (id) de la capa (div) que el menú contiene es <strong>id_menu_box</strong>. Estos datos pueden ser útiles para manipular los estilos del menú sin afectar los otros componentes de la página.</li> <li>Es posible hacer cambios en los estilos, pero que no se vean inmediatamente en el curso. En este caso, hay que refrescar la página; lo que en muchos navegadores se logra con la combinación de teclas Ctrl + F5.</li> </ul></p>';
$string['currentsection'] = 'Este tema';
$string['displaynavigation'] = 'Mostrar navegación';
$string['displaynavigation_help'] = 'Indica si se muestra navegación entre secciones y la posición donde está';
$string['displaynousedmod'] = 'Mostrar recursos no incluidos en la plantilla';
$string['displaynousedmod_help'] = 'Acerca de: Mostrar recursos no incluidos en la plantilla';
$string['editmenu'] = 'Editar menú';
$string['end_editmenu'] = 'Finalizar editar menú';
$string['error_jsontree'] = 'Error en la estructura de datos retornada como composición del árbol';
$string['hidefromothers'] = 'Ocultar tema';
$string['htmlcode'] = 'HTML';
$string['htmltemplate_editmenu'] = 'Plantilla de HTML';
$string['htmltemplate_editmenu_title'] = 'Fuentes HTML';
$string['icons_templatetopic'] = 'Mostrar íconos en recursos';
$string['icons_templatetopic_help'] = 'Acerca de: Mostrar íconos en recursos';
$string['jscode'] = 'Código';
$string['jsdefault'] = 'Incluir JavaScript por defecto';
$string['jsdefault_help'] = 'Define si se incluyen las funciones JavaScript que generan el menú. Desabilitar JavaScript por defecto puede ser útil si quiere darle otra apariencia al menú, empleando código JavaScript que puede incluirse en la  <b>"Plantilla Javascript"</b>.';
$string['jstemplate'] = 'Código JavaScript';
$string['jstemplate_editmenu'] = 'Plantilla de JavaScript';
$string['jstemplate_editmenu_title'] = 'Fuentes JavaScript';
$string['jstemplate_help'] = 'Permite definir el código JavaScript que funcionará sobre el menú o la página. Puede ser útil para definir comportamientos adicionales para el menú, o inclusive una estructura del menú diferente a la que tiene por defecto. <p><b>Notas:</b> <ul> <li>El nombre <b>id_menu_box</b> corresponde al identificador div que contiene el menú en HTML creado como listas anidadas, usualmente con las etiquetas (tags)  HTML: ul y li.</li> <li>Es posible hacer cambios en los estilos, pero que no se vean inmediatamente en el curso. En este caso, hay que refrescar la página; lo que en muchos navegadores se logra con la combinación de teclas Ctrl + F5.</li> </ul></p>';
$string['linkinparent'] = 'Mantener enlaces en raíz de submenú';
$string['linkinparent_help'] = '<p>Define el comportamiento de las opciones del menú que funcionan como raíces o padres de un sub-menú.</p> <p>Si se establece en <b>Si</b>, los items del menú actúan como una liga al elegirlos (click) y abren la URL que está definida en el  <b>"Árbol del menú"</b>. Si se establece en <b>No</b>, los items del menú muestran las ligas hijas para elegir</p>';
$string['menuposition'] = 'Posición del menú';
$string['menuposition_help'] = '<p>Define la posición donde el menú aparecerá en el curso. Las opciones posibles son: <ul> <li><b>No mostrar:</b> no se genera el menú</li> <li><b>Izquierda:</b> el menú se genera verticalmente en la columna de bloques izquierda, si existe.</li> <li><b>Media:</b> el menú se genera horizontalmente como una barra en medio del curso, sobre la sección</li> <li><b>Derecha:</b> el menú se genera verticalmente en la columna de bloques derecha, si existe.</li> </ul></p>';
$string['menuposition_hide'] = 'No mostrar';
$string['menuposition_left'] = 'Izquierda';
$string['menuposition_middle'] = 'Centro';
$string['menuposition_right'] = 'Derecha';
$string['name_sheet_sheetedit'] = 'Nombre de la hoja';
$string['navigationposition_both'] = 'Arriba y abajo';
$string['navigationposition_bottom'] = 'Abajo';
$string['navigationposition_nothing'] = 'No mostrar';
$string['navigationposition_top'] = 'Arriba';
$string['next_topic'] = 'Siguiente';
$string['nodesnavigation'] = 'Nodos de navegación';
$string['nodesnavigation_help'] = '<p>Números de sección, separados por comas. <b>Ejemplo:</b> 1,2,8,10,3</p>. Si está vacío, se usa la navegación por defecto. <p>Los números de sección no pueden repetirse debido a mostrarán la navegación a partir de la primera coincidencia encontrada.</p>';
$string['notsaved'] = 'La información no se pudo almacenar';
$string['page-course-view-topics'] = 'Cualquier página principal de curso en formato temas desde menú';
$string['page-course-view-topics-x'] = 'Cualquier página de curso en formato temas desde menú';
$string['pluginname'] = 'Formato de temas de menú';
$string['previous_topic'] = 'Anterior';
$string['savecorrect'] = 'La información se almacenó satisfactoriamente';
$string['sectionname'] = 'Tema';
$string['separator_navigation'] = '-';
$string['showfromothers'] = 'Mostrar tema';
$string['targetblank_sheet_sheetedit'] = 'Nueva ventana';
$string['targetself_sheet_sheetedit'] = 'La misma ventana';
$string['target_sheet_sheetedit'] = 'Destino del enlace';
$string['template_namemenutopic'] = 'Tema {$a}';
$string['templatetopic'] = 'Activar Título de la sección como plantilla';
$string['templatetopic_help'] = 'Acerca de: Activar Título del tema como plantilla';
$string['title_panel_sheetedit'] = 'Editar hoja del árbol';
$string['topic_sheet_sheetedit'] = 'Tema de destino';
$string['tree_editmenu'] = 'Árbol del menú';
$string['tree_editmenu_title'] = 'Configurar árbol de temas';
$string['tree_struct'] = 'Estructura del árbol';
$string['tree_struct_help'] = '<p>La base del menú es una estructura de árbol en donde cada rama u hoja del árbol puede asociarse a una URL. La URL puede ser externa o estar ligada directamente a una sección del curso. Cuando Usted entra por primera vez a configurar el árbol de sección, la plataforma le sugiere una estructura lineal, sin ramas, con una cantidad de hojas igual al número de secciones del curso</p>

<p>Para cambiar las propiedades de una hoja, elija (click) su nombre y aparecerá una ventana en donde Usted puede hacer algunas acciones para mover las hojas, eliminar la hoja seleccionada, crear  una nueva hoja o actualizar los datos de la hoja.</p>

<p>Entre las opciones que puede hacer con la hoja están:</p> <ul>

<li><strong>Mover una hoja hacia la izquierda:</strong> se logra seleccionando la flecha que apunta hacia la izquierda. Convierte a la hoja en hija de la hoja que la contiene (hoja padre). Solamente está disponible si la hoja es hija de otra hoja; nunca si estuviera en la rama principal.</li>

<li><strong>Mover una hoja hacia la derecha:</strong> e logra seleccionando la flecha que apunta hacia la derecha. Convierte a la hoja en hija de la hoja previa. No está disponible para la primera hoja de la rama principal.</li>

<li><strong>Arriba una hoja:</strong> se logra al seleccionar la flecha que apunta hacia arriba. Cambia el órden de una hoja, poniéndola antes de su hermana inmediatamente anterior. No está disponible para la primera hoja de una rama.</li>

<li><strong>Abajo una hoja:</strong> se logra al seleccionar la flecha que apunta hacia abajo. Cambia el órden de una hoja, poniéndola después de su hermana inmediatamente siguiente. No está disponible para la última hoja de una rama.</li>

<li><strong>Eliminar una hoja:</strong> se logra al seleccionar la X. Elimina la hoja seleccionada y todas las hojas que contenga.</li> </ul>

<p>La opción <strong>"Añadir como una hoja nueva"</strong>crea una copia de la hoja seleccionada y la añade como su hija. Las demás hojas hijas no se copian, solamente la seleccionada.</p>


<p>La opción <strong>"Cambiar datos de la hoja" </strong>actualiza los valores seleccionados a las propiedades de la hoja seleccionada. Las propiedades que pueden modificarse son:</p> <ul>

<li><strong>Nombre de la hoja:</strong> la etiqueta que aparece para esta hoja en el menú.</li>

<li><strong>Sección destino:</strong> Si la hoja se usa para una sección de curso, esta opción indica cual sección será seleccionada; si se selecciona una sección, no puede seleccionarse una URL a donde dirigir la liga de la opción del menú.</li>

<li><strong>URL:</strong> indica una URL adonde se hará referencia en la opción del menú. Solamente puede especificarse si no está seleccionada una sección destino.</li>

<li><strong>Ligar destino:</strong> Indica si quiere abrir la liga, la sección o la URL externa, en una ventana nueva o en la misma ventana. Si no se elige una opción, la liga abrirá en la misma ventana.</li> </ul>

<p>Los cambios realizados en el menú solamente se guardan si elige la opción <strong>"Guardar cambios"</strong> al fondo de la página.</p>';
$string['url_sheet_sheetedit'] = 'URL';
