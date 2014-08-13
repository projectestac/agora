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
 * Strings for component 'enrol_paypal', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assigna rol';
$string['businessemail'] = 'Correu electrònic de PayPal';
$string['businessemail_desc'] = 'El correu electrònic del vostre compte de PayPal';
$string['cost'] = 'Cost de la inscripció';
$string['costerror'] = 'El cost de la inscripció no és numèric';
$string['costorkey'] = 'Trieu un dels mètodes d\'inscripció següents.';
$string['currency'] = 'Moneda';
$string['defaultrole'] = 'Assignació de rol per defecte';
$string['defaultrole_desc'] = 'Seleccioneu el rol que s\'hauria d\'assignar als usuaris mentre s\'inscriuen amb PayPal';
$string['enrolenddate'] = 'Data final';
$string['enrolenddate_help'] = 'Si està habilitat, els usuaris sols poden inscriure\'s fins aquesta data.';
$string['enrolenddaterror'] = 'La data de final d\'inscripció no pot ser anterior a la data de començament d\'inscripció.';
$string['enrolperiod'] = 'Duració de la inscripció.';
$string['enrolperiod_desc'] = 'La duració per defecte del temps (segons)  en que la inscripció és vàlida. Si es posa a cero, la inscripció per defecte serà indefinida.';
$string['enrolperiod_help'] = 'La duració per defecte del temps en que la inscripció és vàlida, començant al moment en l\'usuari s\'ha inscrit. Si es posa a cero, la inscripció per defecte serà indefinida.';
$string['enrolstartdate'] = 'Data d\'inici';
$string['enrolstartdate_help'] = 'Si està habilitat, els usuaris poden inscriure\'s des d\'aquesta data.';
$string['expiredaction'] = 'Acció de venciment de la inscripció';
$string['expiredaction_help'] = 'Seleccioneu l\'acció que es durà a terme quan venci la inscripció de l\'usuari. Si us plau, teniu en compte que alguns paràmetres i dades d\'usuari es purguen del curs durant la cancel·lació de la inscripció.';
$string['mailadmins'] = 'Notifica a l\'administrador';
$string['mailstudents'] = 'Notifica als estudiants';
$string['mailteachers'] = 'Notifica als professors';
$string['messageprovider:paypal_enrolment'] = 'Missatges d\'inscripció de PayPal';
$string['nocost'] = 'No hi ha cap cost associat a la inscripció en aquest curs!';
$string['paypalaccepted'] = 'S\'accepten pagaments via PayPal';
$string['paypal:config'] = 'Configura les instàncies d\'inscripció PayPal';
$string['paypal:manage'] = 'Gestiona els usuaris inscrits';
$string['paypal:unenrol'] = 'Cancel·la la inscripció d\'usuaris del curs';
$string['paypal:unenrolself'] = 'Cancel·la la meva inscripció al curs';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'El modul PayPal us permet configurar cursos de pagament. Si el curs és gratuït, als estudiants no se\'ls demana pagar per entrar. Aquí hi ha el cost del lloc per que podeu configurar per defecte per tot el lloc o un pagament per cada curs individual. El pagament del curs individual anul·la el pagament de tot el lloc.';
$string['sendpaymentbutton'] = 'Envia pagament via Paypal';
$string['status'] = 'Habilita la inscripció PayPal';
$string['status_desc'] = 'Habilita els usuaris per utilitzar PayPal per inscriure\'s al curs per defecte.';
$string['unenrolselfconfirm'] = 'De veritat voleu cancel·lar la vostra inscripció al curs "{$a}"?';
