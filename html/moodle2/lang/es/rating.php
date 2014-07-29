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
 * Strings for component 'rating', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Promedio de calificaciones';
$string['aggregatecount'] = 'Número de Calificaciones';
$string['aggregatemax'] = 'Calificación máxima';
$string['aggregatemin'] = 'Calificación mínima';
$string['aggregatenone'] = 'No hay calificaciones';
$string['aggregatesum'] = 'Suma de calificaciones';
$string['aggregatetype'] = 'Tipo de consolidación';
$string['aggregatetype_help'] = 'El tipo de consolidación define cómo se combinan las puntuaciones para formar la nota final en el libro de calificaciones.

* Promedio de calificaciones- La media de todas las calificaciones
* Número de calificaciones - El número de elementos calificados se convierte en la nota final. Tenga en cuenta que el total no puede exceder la nota máxima de la actividad
* Máxima calificación - La calificación más alta se convierte en la nota final
* Mínima calificación - La calificación más baja se convierte en la nota final
* Suma de calificaciones- Todas las calificaciones se suman. Tenga en cuenta que el total no puede exceder la nota máxima de la actividad.

Si "No hay valoraciones" está seleccionado, entonces la actividad no aparece en el libro de calificaciones.';
$string['allowratings'] = '¿Permitir que los ítems sean calificados?';
$string['allratingsforitem'] = 'Todas las clasificaciones emitidas';
$string['capabilitychecknotavailable'] = 'La comprobación de privilegios no está disponible hasta que se guarde la actividad';
$string['couldnotdeleteratings'] = 'Lo sentimos, no se puede eliminar, puesto que alguien lo ha calificado';
$string['norate'] = 'No se permite calificar ítems.';
$string['noratings'] = 'No se han emitido calificaciones';
$string['noviewanyrate'] = 'Sólo puede consultar los resultados de elementos realizados por usted';
$string['noviewrate'] = 'No tiene permiso para ver las calificaciones de los ítems';
$string['rate'] = 'Calificar';
$string['ratepermissiondenied'] = 'No tiene permiso para calificar este ítem';
$string['rating'] = 'Calificación';
$string['ratinginvalid'] = 'La calificación no es correcta';
$string['ratings'] = 'Calificaciones';
$string['ratingtime'] = 'Limitar las calificaciones a los elementos con fechas en este rango:';
$string['rolewarning'] = 'Roles con permiso para calificar';
$string['rolewarning_help'] = 'Para enviar calificaciones de usuario se requiere el permiso \'moodle/rating:rate\'  y cualquier permiso específico sobre el módulo. Los usuarios asignados a los roles siguientes deberían poder calificar items. La lista de roles puede ser modificada a través del enlace a permisos en el bloque de configuración.';
