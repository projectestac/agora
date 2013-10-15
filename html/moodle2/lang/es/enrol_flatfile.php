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
 * Strings for component 'enrol_flatfile', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'El fichero de texto empleado en matriculaciones basadas en archivo ({$a}) no puede ser eliminado por el proceso de \'cron\'. Esto generalmente significa que los permisos son erróneos. Por favor, corrija los permisos para que Moodle puede eliminar el archivo, de lo contrario, podría ser procesado en varias ocasiones.';
$string['filelockedmailsubject'] = 'Error importante: Archivo de matriculación';
$string['location'] = 'Ubicación del archivo';
$string['mailadmin'] = 'Notificar administrador por correo electrónico';
$string['mailstudents'] = 'Notificar a los estudiantes por correo electrónico';
$string['mailteachers'] = 'Notificar a los profesores por correo electrónico';
$string['mapping'] = 'Mapeo de archivos planos';
$string['messageprovider:flatfile_enrolment'] = 'Mensajes de archivos planos de matriculación';
$string['pluginname'] = 'Archivo plano (CSV)';
$string['pluginname_desc'] = 'Este método comprobará habitualmente y procesará un archivo de texto con un formato especial en la ubicación que usted especifique. El archivo es un archivo separado por comas que debe tener cuatro o seis campos por línea:

<pre class="informationbox">
* operation, role, idnumber(user), idnumber(course) [, starttime, endtime] donde:

* operation = add | del
* role = student | teacher | teacheredit
* idnumber(user) = idnumber in the user table NB not id
* idnumber(course) = idnumber in the course table NB not id
* starttime = start time (in seconds since epoch) - optional
* endtime = end time (in seconds since epoch) - optional </pre>

Será similar algo así:

 <pre class="informationbox">
   add, student, 5, CF101
   add, teacher, 6, CF101
   add, teacheredit, 7, CF101
   del, student, 8, CF101
   del, student, 17, CF101
   add, student, 21, CF101, 1091115000, 1091215000
</pre>';
