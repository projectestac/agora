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
 * Strings for component 'tool_customlang', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_customlang
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkin'] = 'Guardar cadenas en el paquete de idioma';
$string['checkout'] = 'Abrir el paquete de idioma para editar';
$string['checkoutdone'] = 'Paquete de idioma cargado';
$string['checkoutinprogress'] = 'Cargando paquete de idioma';
$string['confirmcheckin'] = 'Está a punto de introducir cadenas modificadas en su paquete de idioma local. Ester proceso exportará las cadenas personalizadas desde el traductor hasta el directorio de datos y Moodle comenzará a utilizar las cadenas modificadas. Pulse el botón \'Continuar\' para comenzar.';
$string['customlang:edit'] = 'Editar traducción local';
$string['customlang:view'] = 'Mostrar traducción local';
$string['filter'] = 'Filtro de cadenas';
$string['filtercomponent'] = 'Mostrar cadenas de estos componentes';
$string['filtercustomized'] = 'Sólo las personalizadas';
$string['filtermodified'] = 'Sólo las modificadas';
$string['filteronlyhelps'] = 'Sólo los textos de ayuda';
$string['filtershowstrings'] = 'Mostrar cadenas';
$string['filterstringid'] = 'Identificador de la cadena';
$string['filtersubstring'] = 'Cadenas que contienen';
$string['headingcomponent'] = 'Identificador';
$string['headinglocal'] = 'Traducción local personalizada';
$string['headingstandard'] = 'Texto estándar';
$string['headingstringid'] = 'Cadena';
$string['markinguptodate'] = 'Marcando la personalización como actualizada';
$string['markinguptodate_help'] = 'La traducción personalizada puede quedar obsoleta si los paquetes con el Inglés original o la traducción principal se han modificado posteriormente a la personalización de su sitio. Revise la traducción personalizada; si ve que está actualizada pulse en la opción, si no, edítela de nuevo. ';
$string['markuptodate'] = 'Marcar como actualizado';
$string['modifiedno'] = 'No existen cadenas modificadas para guardar.';
$string['modifiednum'] = 'Hay {$a} cadenas modificadas. Debe introducirlas en el disco para almacenarlas de forma permanente.';
$string['nostringsfound'] = 'No se han encontrado cadenas, modifique la configuración del filtro';
$string['placeholder'] = 'Marcadores de posición';
$string['placeholder_help'] = 'Las variables son elementos especiales, como \'{$a}\' o \'{$a->algo_más}\' dentro de una cadena. Se reemplazan con un valor cuando se aplica la cadena .

Es importante copiarlas exactamente igual a como están en la cadena original. No las traduzca ni cambie su estructura interna.';
$string['placeholderwarning'] = 'Las cadenas contienen marcadores de posicion';
$string['pluginname'] = 'Personalización del idioma';
$string['savecheckin'] = 'Guardar los cambios del paquete de idioma';
$string['savecontinue'] = 'Aplicar los cambios y continuar editando';
