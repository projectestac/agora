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
 * Strings for component 'attendanceregister', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   attendanceregister
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['are_you_sure_to_delete_offline_session'] = '¿Está seguro que desea eliminar esta sesión fuera de línea?';
$string['modulename_help'] = 'El Registro de Asistencia calcula el tiempo que los usuarios emplean trabajando en cursos en línea.<br /> Opcionalmente permite además considerar actividades fuera de línea.<br /> Dependiendo del modo de asistencia, el registro puede supervisar actividades en un solo curso, en todos los cursos de la misma categoría, o en todos los cursos "meta ligados" al curso en donde está el registro.<br /> Las sesiones en línea son calculadas mediante las bitácoras de entradas registradas por Moodle.<br /> <b>Las sesiones nuevas se añaden con cierto retraso por el programa CRON, después que el usuario sale del sitio.</b>';
$string['unreasoneable_session'] = '¿Estás seguro? ¡Es más de {$a} horas!';
