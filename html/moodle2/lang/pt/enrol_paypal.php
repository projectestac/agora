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
 * Strings for component 'enrol_paypal', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Atribuir papel';
$string['businessemail'] = 'Endereço da conta PayPal';
$string['businessemail_desc'] = 'E-mail da sua conta de negócio PayPal';
$string['cost'] = 'Preço da inscrição';
$string['costerror'] = 'O preço da inscrição tem que ser um valor numérico';
$string['costorkey'] = 'Selecione um dos seguintes métodos de inscrição.';
$string['currency'] = 'Moeda';
$string['defaultrole'] = 'Atribuição de papel predefinida';
$string['defaultrole_desc'] = 'Selecione o papel que deve ser atribuído aos utilizadores nas inscrições PayPal';
$string['enrolenddate'] = 'Data de fim';
$string['enrolenddate_help'] = 'Se ativo, os utilizadores apenas podem ser inscritos até esta data.';
$string['enrolenddaterror'] = 'A data de fim de inscrição não pode ser anterior à data de início';
$string['enrolperiod'] = 'Duração da inscrição';
$string['enrolperiod_desc'] = 'Duração predefinida da inscrição.  Se for definida para zero, a validade da inscrição será ilimitada por predefinição.';
$string['enrolperiod_help'] = 'Período de tempo em que a inscrição é válida, a partir do momento em que o utilizador é inscrito. Se desativado, a duração da inscrição será ilimitada.';
$string['enrolstartdate'] = 'Data de início';
$string['enrolstartdate_help'] = 'Se ativo, os utilizadores apenas podem ser inscritos a partir desta data.';
$string['mailadmins'] = 'Notificar administradores por e-mail';
$string['mailstudents'] = 'Notificar alunos por e-mail';
$string['mailteachers'] = 'Notificar professores por e-mail';
$string['messageprovider:paypal_enrolment'] = 'Mensagens de inscrição PayPal';
$string['nocost'] = 'A inscrição nesta disciplina é gratuita!';
$string['paypalaccepted'] = 'Tipos de pagamentos aceites';
$string['paypal:config'] = 'Configurar instâncias de inscrição Paypal';
$string['paypal:manage'] = 'Gerir utilizadores inscritos';
$string['paypal:unenrol'] = 'Remover inscrições de alunos na disciplina';
$string['paypal:unenrolself'] = 'Remover a sua inscrição desta disciplina';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'Este módulo de inscrição permite utilizar o serviço PayPal para configurar disciplinas com acesso pago. Se o preço da disciplina for definido como zero não haverá lugar à cobrança de qualquer valor. Pode ser definido neste módulo um valor genérico a aplicar em todas as disciplinas que usem este módulo. Pode ainda indicar, para cada disciplina individualmente, um valor diferente.';
$string['sendpaymentbutton'] = 'Realizar pagamento através de "Paypal"';
$string['status'] = 'Permitir inscrições PayPal';
$string['status_desc'] = 'Permitir que os utilizadores usem preferencialmente o PayPal para se inscreverem numa disciplina.';
$string['unenrolselfconfirm'] = 'Tem a certeza de que pretende remover a sua inscrição da disciplina "{$a}"?';
