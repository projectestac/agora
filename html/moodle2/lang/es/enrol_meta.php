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
 * Strings for component 'enrol_meta', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['linkedcourse'] = 'Enlazar curso';
$string['meta:config'] = 'Configurar instancias de meta-matriculación';
$string['meta:selectaslinked'] = 'Seleccionar curso como meta-enlazado';
$string['meta:unenrol'] = 'Dar de baja usuarios suspendidos';
$string['nosyncroleids'] = 'Roles que no están sincronizados';
$string['nosyncroleids_desc'] = 'Por defecto, todas las asignaciones de rol a nivel de curso se sincronizan de  cursos-padre a cursos-hijo. Los roles seleccionados aquí no se incluirán en el proceso de sincronización. Los roles actuales se actualizarán en la próxima ejecución del \'cron\'.';
$string['pluginname'] = 'Meta-enlace de curso';
$string['pluginname_desc'] = 'La extensión de matriculación meta-enlace sincroniza matrículas y roles entre dos cursos diferentes.';
$string['syncall'] = 'Sincronizar todos los usuarios inscritos';
$string['syncall_desc'] = 'Si se habilita todos los usuarios matriculados están sincronizados, incluso si no tienen ningún rol en el curso-padre; si está deshabilitado sólo los usuarios que tienen al menos un rol sincronizado se matriculan en el curso-hijo.';
