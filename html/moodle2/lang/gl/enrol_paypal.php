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
 * Strings for component 'enrol_paypal', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignar rol';
$string['businessemail'] = 'Correo de empresa PayPal';
$string['businessemail_desc'] = 'O enderezo de correo da súa conta de empresa PayPal';
$string['cost'] = 'Custo de matrícula';
$string['costerror'] = 'O custo da matriculación non é numérico';
$string['costorkey'] = 'Escolla un dos seguintes métodos de inscrición.';
$string['currency'] = 'Moeda';
$string['defaultrole'] = 'Asignación de rol predeterminado';
$string['defaultrole_desc'] = 'Seleccionar o rol que se lle debería asignar aos usuarios durante as matriculacións PayPal';
$string['enrolenddate'] = 'Fin de data';
$string['enrolenddate_help'] = 'De estar activado, os usuarios soamente se poden matricularse ata esta data.';
$string['enrolenddaterror'] = 'A fin de data de matriculación non pode ser anterior á data de inicio';
$string['enrolperiod'] = 'Duración da matriculación';
$string['enrolperiod_desc'] = 'Período de tempo durante o que é válida a matriculación. De configurarse a cero, a duración da matriculación será ilimitada de modo predeterminado.';
$string['enrolperiod_help'] = 'Tempo durante o que a matriculación é válida, comezando desde o momento en que o usuario se matricula. De estar desactivado, a duración da matriculación será ilimitada.';
$string['enrolstartdate'] = 'Data de inicio';
$string['enrolstartdate_help'] = 'De estar conectada, os usuarios soamente se poden matricular desde esta data en diante.';
$string['expiredaction'] = 'Acción na expiración da matrícula';
$string['expiredaction_help'] = 'Seleccione a acción que se realizar cando a matricula do usuario expire. Vexa que algúns datos do usuario e de configuración purgaranse do curso na desmatriculación.';
$string['mailadmins'] = 'Notificarlle ao admin';
$string['mailstudents'] = 'Notificarlle aos alumnos';
$string['mailteachers'] = 'Notificarlle aos profesores';
$string['messageprovider:paypal_enrolment'] = 'Mensaxes de matriculación por PayPal';
$string['nocost'] = 'Non hai custo asociado coa matriculación deste curso!';
$string['paypalaccepted'] = 'Pagamentos PayPal aceptados';
$string['paypal:config'] = 'Configurar instancias de matrícula vía PayPal';
$string['paypal:manage'] = 'Xestionar os usuarios matriculados';
$string['paypal:unenrol'] = 'Desmatricular usuarios do curso';
$string['paypal:unenrolself'] = 'Desmatricularse por si mesmo do curso';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'O módulo Paypal permítelle configurar cursos de pago. No caso de calquera curso ser cero, non se lles pedirá aos alumnos ningún pagamento para a entrada.
Hai un custo xeral que vostede configura como predeterminado para o sitio enteiro e despois unha configuración para cada curso individualmente. O custo do curso sobrescribe o custo do sitio.';
$string['sendpaymentbutton'] = 'Enviar pagamento a través de PayPal';
$string['status'] = 'Permitir matriculacións vía PayPal';
$string['status_desc'] = 'Permitirlle aos usuarios usar PayPal para matricularse no curso de modo predeterminado.';
$string['unenrolselfconfirm'] = 'Confirma que quere desmatricularse por si mesmo do curso «{$a}»';
