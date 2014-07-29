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
 * Strings for component 'enrol_mnet', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Algunos ejemplo de la extensión de matriculación MNet ya existen en  este equipo. Sólo está permitida una instancia por servidor y/o una instancia para  \'Todos los servidores\'.';
$string['instancename'] = 'Nombre del método de matriculación';
$string['instancename_help'] = 'Puede cambiar opcionalmente el nombre de esta instancia del método de matriculación MNet. Si deja este campo vacío se usará el nombre de la instancia por defecto, que contiene el nombre del servidor remoto y el rol asignado para sus usuarios.';
$string['mnet_enrol_description'] = 'Publique este servicio para permitir a los administradores de {$a} matricular a sus estudiantes en los cursos que usted ha creado en su servidor.<br/><ul><li><em>Dependencia</em>: Usted debe asimismo <strong>publicar</strong> el servicio SSO (Proveedor de Servicios) en {$a}.</li><li><em>Dependencia</em>: Debe también <strong>subscribirse</strong> al servicio SSO (Proveedor de Identidad) en {$a}.</li></ul><br/>Subscríbase a este servicio para poder matricular a sus estudiantes en los cursos de {$a}.<br/><ul><li><em>Dependencia</em>: Debe también <strong>subscribirse</strong> al servicio SSO (Proveedor de Servicios) en {$a}.</li><li><em>Dependencia</em>: Debe también <strong>publicar</strong> el servicio SSO (Proveedor de Identidad) en {$a}.</li></ul><br/>';
$string['mnet_enrol_name'] = 'Servicio remoto de matriculación';
$string['pluginname'] = 'Matriculaciones remotas MNet';
$string['pluginname_desc'] = 'Permite servidor remoto MNet para matricular sus usuarios en nuestros cursos';
$string['remotesubscriber'] = 'Host remoto';
$string['remotesubscriber_help'] = 'Seleccione "Todos los servidores"  para abrir este curso para todos los puntos MNet a los que estamos ofreciendo el servicio de matriculación remota. O bien, escoja un único servidor para poner este curso únicamente a disposición de los usuarios del mismo.';
$string['remotesubscribersall'] = 'Todos los hosts';
$string['roleforremoteusers'] = 'Rol para sus usuarios';
$string['roleforremoteusers_help'] = '¿Qué rol se les asignará a los usuarios del host remoto seleccionado?';
