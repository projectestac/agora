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
 * Strings for component 'enrol_manual', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Canvia l\'estat';
$string['altertimeend'] = 'Canvia la data final';
$string['altertimestart'] = 'Canvia la data inicial';
$string['assignrole'] = 'Assigneu un rol';
$string['confirmbulkdeleteenrolment'] = 'Esteu segur de voler suprimir aquestes inscripcions d\'usuaris ?';
$string['defaultperiod'] = 'Duració de la inscripció per defecte';
$string['defaultperiod_desc'] = 'Temps per defecte durant el qual la inscripció serà vàlida. Si es posa a cero, la duració per defecte de la inscripció serà il·limitada.';
$string['defaultperiod_help'] = 'Temps per defecte (en segons) durant el qual la inscripció serà vàlida, començant des d\'el moment en que l\'usuari s\'inscriu. Si es deshabilita, el temps per defecte de la inscripció serà il·limitat .';
$string['deleteselectedusers'] = 'Esborreu els usuaris inscrits';
$string['editenrolment'] = 'Editeu la inscripció';
$string['editselectedusers'] = 'Edita les inscripcions del usuaris seleccionats';
$string['enrolledincourserole'] = 'S\'ha efectuat la inscripció en "{$a->course}" com a "{$a->role}"';
$string['enrolusers'] = 'Inscriviu usuaris';
$string['expiredaction'] = 'Acció de venciment de la inscripció';
$string['expiredaction_help'] = 'Seleccioneu l\'acció a realitzar quan la inscripció venci. Tingueu en compte que algunes dades d\'usuari i configuracions es purguen del curs durant la desinscripció del curs.';
$string['expirymessageenrolledbody'] = 'Apreciat / apreciada {$a->user},

Aquesta és una notificació que la vostra inscripció al curs \'{$a->course}\' és a punt de vèncer el {$a->timeend}.

Si us cal ajuda, si us plau poseu-vos en contacte amb {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificació de venciment d\'inscripció';
$string['expirymessageenrollerbody'] = 'La inscripció al curs \'{$a->course}\' vencerà en {$a->threshold} per als usuaris següents:

{$a->users}

Per a ampliar la seva inscripció, aneu a {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notificació de venciment d\'inscripció';
$string['manual:config'] = 'Configura les instàncies d\'inscripció manual';
$string['manual:enrol'] = 'Inscriviu usuaris';
$string['manual:manage'] = 'Gestioneu la inscripció de l\'usuari';
$string['manual:unenrol'] = 'Cancel·la la inscripció d\'usuaris del curs';
$string['manual:unenrolself'] = 'Cancel·la la meva inscripció en aquest curs';
$string['messageprovider:expiry_notification'] = 'Notificacions de venciment d\'inscripció manual';
$string['pluginname'] = 'Inscripcions manuals';
$string['pluginname_desc'] = 'El connector d\'inscripció manual permet als usuaris inscriure\'s de forma manual mitjançant un enllaç als paràmetres d\'administració del curs per un usuari amb els permisos apropiats, com un professor. Aquest connector s\'hauria d\'habilitar,  ja que altres connectors, com l\'auto inscripció, el requereixen.';
$string['status'] = 'Habiliteu les inscripcions manuals';
$string['status_desc'] = 'Permet l\'accés a cursos d\'usuaris inscrits internament. Això s\'hauria de permetre en molts casos.';
$string['statusdisabled'] = 'Deshabilitat';
$string['statusenabled'] = 'Habilitat';
$string['status_help'] = 'Aquest paràmetre determina si els usuaris haurien de poder inscriure\'s manualment, mitjançant el enllaç als paràmetres de configuració del curs, per un usuari amb els permisos apropiats com un professor.';
$string['unenrol'] = 'Cancel·la la inscripció de l\'usuari';
$string['unenrolselectedusers'] = 'Cancel·la la inscripció dels usuaris seleccionats';
$string['unenrolselfconfirm'] = 'De veritat voleu cancel·lar la vostra inscripció al curs "{$a}"?';
$string['unenroluser'] = 'De veritat voleu cancel·lar la inscripció de l\'usuari "{$a->user}" al curs "{$a->course}"?';
$string['unenrolusers'] = 'Cancel·la la inscripció d\'usuaris';
$string['wscannotenrol'] = 'La instància del connector no permet inscriure de forma manual un usuari al curs id = {$a->courseid}';
$string['wsnoinstance'] = 'La instància del connector d\'inscripció manual no existeix o està deshabilitat per al curs (id = {$a->courseid})';
$string['wsusercannotassign'] = 'No teniu els permisos per assignar aquest rol ({$a->roleid}) a l\'usuari ({$a->userid}) en aquest curs ({$a->courseid}).';
