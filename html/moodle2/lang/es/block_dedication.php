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
 * Strings for component 'block_dedication', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   block_dedication
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access_button'] = 'Herramienta de dedicación';
$string['access_info'] = 'Sólo para profesores:';
$string['connectionratiorow'] = 'Conexiones por día';
$string['dedication:addinstance'] = 'Permitir añadir bloque de dedicación al curso';
$string['dedicationall'] = 'Dedicación de todos los miembros del curso. Haz clic en el nombre de un miembro para ver su dedicación detallada.';
$string['dedication_estimation'] = 'Tu tiempo de dedicación estimado es';
$string['dedicationgroup'] = 'Dedicación de todos los miembros del grupo <em>{$a}</em>. Haz clic en el nombre de un miembro para ver su dedicación detallada.';
$string['dedicationrow'] = 'Dedicación al curso';
$string['dedication:use'] = 'Permitir usar bloque de dedicación al curso';
$string['form'] = 'Configuración de dedicación al curso';
$string['form_help'] = 'La dedicación es estimada a partir del concepto de sesión y duración de la sesión, aplicado a las entradas de log.

<strong>Clic:</strong> ada vez que un usuario accede a una página en Moodle se guarda una entrada en el log.

<strong>Sesión:</strong> conjunto de dos o más clics consecutivos, cuyo tiempo transcurrido entre dos clics consecutivos no superar el máximos tiempo establecido.

<strong>Duración de la sesión:</strong> tiempo transcurrido entre el primer y último clic de una sesión.

<strong>Tiempo de dedicación:</strong> es la suma de las duraciones de las sesiones del usuario.';
$string['form_text'] = 'Seleccione el rango de fechas y el tiempo máximo entre clics de una misma sesión.';
$string['limit'] = 'Límite entre clics (en minutos)';
$string['limit_help'] = 'El límite entre clics define si dos clics son parte de la misma sesión o no';
$string['maxtime'] = 'Fin del período';
$string['maxtime_help'] = 'Considerar sólo las entradas de log creadas antes de esta fecha';
$string['meandedication'] = '<strong>Dedicación media:</strong> {$a}';
$string['mintime'] = 'Inicio del período';
$string['mintime_help'] = 'Considerar sólo las entradas de log creadas después de esta fecha';
$string['pagetitle'] = '{$a}: dedicación al curso';
$string['period'] = 'Período desde <em>{$a->mintime}</em> hasta <em>{$a->maxtime}</em>';
$string['perioddiff'] = '<strong>Tiempo transcurrido:</strong>  {$a}';
$string['perioddiffrow'] = 'Tiempo transcurrido';
$string['pluginname'] = 'Dedicación al curso';
$string['sessionduration'] = 'Duración';
$string['sessionstart'] = 'Inicio de sesión';
$string['show_dedication'] = 'Mostrar el tiempo de dedicación a los estudiantes';
$string['show_dedication_help'] = 'Por defecto, el tiempo de dedicación sólo pueden verlo los profesores. Si marca esta opción, los alumnos podrán ver su tiempo de dedicación total en el bloque.';
$string['sincerow'] = 'Desde';
$string['submit'] = 'Calcular';
$string['torow'] = 'Hasta';
$string['totaldedication'] = '<strong>Dedicación total:</strong> {$a}';
$string['userdedication'] = 'Dedicación detallada de <em>{$a}</em>.';
