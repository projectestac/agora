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
 * Strings for component 'enrol_flatfile', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['encoding'] = 'Codificació del fitxer';
$string['expiredaction'] = 'Acció de venciment de la inscripció';
$string['expiredaction_help'] = 'Seleccioneu l\'acció que es durà a terme quan venci la inscripció de l\'usuari. Si us plau, teniu en compte que alguns paràmetres i dades d\'usuari es purguen del curs durant la cancel·lació de la inscripció.';
$string['filelockedmail'] = 'El fitxer de text que esteu utilitzant per les inscripcions basades en fitxer ({$a}) no pot ser esborrat pel procés cron. Això significa que no té permisos sobre aquest fitxer. Si us plau modifiqueu els permisos de forma que Moodle pugui esborrar el fitxer, d\'altra forma es processarà de forma repetida.';
$string['filelockedmailsubject'] = 'Error greu: Fitxer d\'inscripció';
$string['flatfile:manage'] = 'Gestiona les inscripcions d\'usuari de forma manual.';
$string['flatfile:unenrol'] = 'Cancel·la la inscripció d\'usuaris del curs de forma manual.';
$string['location'] = 'Camí al fitxer';
$string['location_desc'] = 'Especifica el camí complet del fitxer d\'inscripció. El fitxer s\'esborra de forma automàtica després del processament.';
$string['mapping'] = 'S\'està fent el mapa del fitxer pla';
$string['messageprovider:flatfile_enrolment'] = 'Missatges d\'inscripció en fitxer de text pla';
$string['notifyadmin'] = 'Notifica a l\'administrador';
$string['notifyenrolled'] = 'Notifica als usuaris inscrits.';
$string['notifyenroller'] = 'Notifica a l\'usuari responsable de les inscripcions.';
$string['pluginname'] = 'Fitxer de text pla (CSV)';
$string['pluginname_desc'] = 'Aquest mètode comprovarà de forma periòdica i processarà un fitxer de text en la localització que heu especificat.
El fitxer és un fitxer de text separades per comes que assumeix que teniu sis camps per línia:
<pre class="informationbox">
* operació, rol, ID(usuari), ID(curs) [, data d\'inici , data caducitat]
 on:
* operació = add | del (afegeix | suprimeix)
* rol = student | teacher | teacheredit (estudiant | professor | professor editor)
 * ID(usuari) = Identificació de l\'usuari en la taula NB no id
* ID(curs) = Identificació del curs en la taula NB no id
* data d\'inici = data d\'inici de la inscripció (en segons des de l\'origen de l\'hora UNIX) - opcional
* data caducitat = data de caducitat de la inscripció (en segons des de l\'origen de l\'hora UNIX) - opcional
</pre>
Tindrà un aspecte semblant a aquest:
<pre class="informationbox">
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
