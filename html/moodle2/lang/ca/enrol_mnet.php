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
 * Strings for component 'enrol_mnet', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Alguna instància del connector de inscripció MNet ja existeix en aquest servidor. Sols es permet una instància per servidor i/o una instància per « Tots els servidors ».';
$string['instancename'] = 'Nom del mètode d\'inscripció';
$string['instancename_help'] = 'Podeu de forma opcional canviar el nom d\'aquesta instància del mètode d\'inscripció. Si deixeu aquest camp buit, s\'utilitzarà el nom per defecte de la instància que conté el nom del servidor remot i el rol assignat per als usuaris.';
$string['mnet_enrol_description'] = 'Publiqueu aquest servei a fi de permetre que els administradors del lloc {$a} inscriguin els seus estudiants en cursos del vostre servidor.<br/><ul><li><em>Dependència</em>: també haureu de <strong>publicar</strong> el servei SSO (Proveïdor de Servei) per a {$a}.</li><li><em>Dependència</em>: també us haureu de <strong>subscriure</strong> al servei SSO (Proveïdor d\'Identitat) del lloc {$a}.</li></ul><br/>Subscriviu-vos a aquest servei a fi de poder inscriure els vostres estudiants en cursos del lloc {$a}.<br /><ul><li><em>Dependència</em>: també us haureu de <strong>subscriure</strong> al servei SSO (Proveïdor de Servei) del lloc {$a}.</li><li><em>Dependència</em>: també haureu de <strong>publicar</strong> el servei SSO (Proveïdor d\'Identitat) per al lloc {$a}.</li></ul><br/>';
$string['mnet_enrol_name'] = 'Inscripcions Moodle en Xarxa';
$string['pluginname'] = 'Inscripcions remotes MNet';
$string['pluginname_desc'] = 'Habilita al servidor remot MNet per inscriure llurs usuaris als vostres cursos.';
$string['remotesubscriber'] = 'Servidor remot';
$string['remotesubscriber_help'] = 'Selecciona « Tots els servidors » per obrir aquest curs per tots els parells MNet que ofereixin el servei d\'inscripció remot. O escolliu un sol servidor per posar aquest curs a disposició sols dels seus usuaris.';
$string['remotesubscribersall'] = 'Tots els servidors';
$string['roleforremoteusers'] = 'Rol per llurs usuaris';
$string['roleforremoteusers_help'] = 'El rol que els usuaris remots tindran';
