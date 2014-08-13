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
 * Strings for component 'block', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   block
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtodock'] = 'Minimizar en la barra lateral';
$string['anypagematchingtheabove'] = 'Cualquier página coincidente con la de arriba';
$string['appearsinsubcontexts'] = 'Aparece en subcontextos';
$string['assignrolesinblock'] = 'Asignar roles en el bloque {$a}';
$string['blocksettings'] = 'Ajustes de bloque';
$string['bracketfirst'] = '{$a} (primero)';
$string['bracketlast'] = '{$a} (último)';
$string['configureblock'] = 'Configurar bloque {$a}';
$string['contexts'] = 'Contextos de página';
$string['contexts_help'] = 'Los contextos son tipos más específicos de páginas donde este bloque puede ser mostrado dentro de la ubicación original del bloque. Dispondrá de diferentes opciones aquí dependiendo de la ubicación original del bloque y la ubicación actual de usted. Por ejemplo, puede restringir un bloque para que únicamente aparezca en las páginas de foros de un curso añadiendo el bloque al curso (haciendo qeu aparezca en todas las sub-páginas), y luego entrando en el foro y editando los ajustes del bloque de nuevo para restringir su visualización sólo a las páginas de foros.';
$string['createdat'] = 'Ubicación original del bloque';
$string['createdat_help'] = 'La ubicación original donde se creo el bloque. Los ajustes del bloque pueden hacer que aparezca en otras ubicaciones (contextos) dentro de la ubicación original. Por ejemplo, un bloque creado en una página de curso podría ser mostrado en las actividades dentro de ese curso. Un bloque creado en la portada puede ser mostrado en todo el sitio.';
$string['defaultregion'] = 'Región por defecto';
$string['defaultregion_help'] = 'Los temas pueden definir una o más regiones de bloques con nombre donde se pueden mostrar los bloques. Este ajuste define en cuáles de éstas quiere que aparezca este bloque por defecto. La región puede ser anulada en páginas específicas si es necesario.';
$string['defaultweight'] = 'Peso por defecto';
$string['defaultweight_help'] = 'El peso por defecto permite escoger aproximádamente donde quiere que aparezca el bloque en la región escogida, bien arriba del todo o al fondo. La ubicación final se calcula a partir de todos los bloques en esa región (por ejemplo, sólo un bloque puede estar arriba del todo). Este valor puede ser anulado en páginas específicas si es necesario.';
$string['deleteblock'] = 'Eliminar bloque {$a}';
$string['deleteblockcheck'] = '¿Seguro que desea eliminar el bloque {$a}?';
$string['deleteblockwarning'] = '<p> Está a punto de borrar un bloque que aparece en otra parte. </p><p> La ubicación original del bloque es: {$a->location} <br /> Mostrar el tipo de página: {$a->pagetype} </p><p> ¿Está seguro que desea continuar? </p>';
$string['deletecheck'] = '¿Eliminar el bloque {$a}?';
$string['dockblock'] = 'Acoplar bloque {$a}';
$string['hideblock'] = 'Ocultar bloque {$a}';
$string['hidedockpanel'] = 'Esconder el panel desacoplado';
$string['hidepanel'] = 'Esconder panel';
$string['moveblock'] = 'Mover bloque {$a}';
$string['moveblockafter'] = 'Mover bloque detrás del bloque {$a}';
$string['moveblockbefore'] = 'Mover bloque delante del bloque {$a}';
$string['moveblockhere'] = 'Mover el bloque aquí';
$string['movingthisblockcancel'] = 'Moviendo este bloque ({$a})';
$string['onthispage'] = 'En esta página';
$string['pagetypes'] = 'Tipos de página';
$string['pagetypewarning'] = 'El tipo de página especificado anteriormente ya no es seleccionable. Por favor, elija a continuación el tipo de página más apropiado.';
$string['region'] = 'Región';
$string['restrictpagetypes'] = 'Mostrar en tipos de página';
$string['showblock'] = 'Mostrar el bloque {$a}';
$string['showoncontextandsubs'] = 'Mostrar en \'{$a}\' y en cualquier página dentro de ella';
$string['showoncontextonly'] = 'Mostrar sólo en \'{$a}\'';
$string['showonentiresite'] = 'Mostrar en todo el sitio';
$string['showonfrontpageandsubs'] = 'Mostrar en la página principal y en cualquier página agregada a ésta';
$string['showonfrontpageonly'] = 'Mostrar sólo en la página principal';
$string['subpages'] = 'Seleccionar páginas';
$string['thisspecificpage'] = 'Esta página específica';
$string['undockall'] = 'Desacoplar todo';
$string['undockblock'] = 'Desacoplar bloque {$a}';
$string['undockitem'] = 'Desacoplar este ítem';
$string['visible'] = 'Visible';
$string['weight'] = 'Peso';
$string['wherethisblockappears'] = 'Dónde aparece este bloque';
