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
 * Strings for component 'tool_timezoneimport', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_timezoneimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configintrotimezones'] = 'Esta página buscará nueva información sobre zonas horarias (incluyendo reglas para ahorrar energía aprovechando la luz solar) y actualizará su base de datos local con esta información. Dichas zonas serán comprobadas en orden: {$a} Este procedimiento es en general muy seguro y no puede afectar a las instalaciones normales. ¿Desea actualizar ahora las zonas horarias?';
$string['importtimezones'] = 'Actualizar la lista completa de zonas horarias';
$string['importtimezonescount'] = '{$a->count} entradas importadas desde {$a->source}';
$string['importtimezonesfailed'] = '¡No se encuentran fuentes! (malas noticias)';
$string['pluginname'] = 'Actualizador de zonas horarias';
$string['updatetimezones'] = 'Actualizar zonas horarias';
