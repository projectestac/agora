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
 * Strings for component 'enrol_paypal', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Назначить роль';
$string['businessemail'] = 'Адрес электронной почты PayPal';
$string['businessemail_desc'] = 'Адрес электронной почты Вашего аккаунта PayPal';
$string['cost'] = 'Стоимость зачисления';
$string['costerror'] = 'Стоимость зачисления не является числом';
$string['costorkey'] = 'Выберите один из следующих методов зачисления.';
$string['currency'] = 'Валюта';
$string['defaultrole'] = 'Назначение роли по умолчанию';
$string['defaultrole_desc'] = 'Выберите роль, которая должна быть назначена зачисленным пользователям PayPal.';
$string['enrolenddate'] = 'Дата окончания';
$string['enrolenddate_help'] = 'Если параметр включен, то пользователи могут обучаться только до этой даты.';
$string['enrolenddaterror'] = 'Дата окончания зачисления не может быть установлена ранее даты начала';
$string['enrolperiod'] = 'Продолжительность обучения';
$string['enrolperiod_desc'] = 'Продолжительность зачисления на курс по умолчанию. Если установлен ноль, то по умолчанию продолжительность обучения будет неограниченной.';
$string['enrolperiod_help'] = 'Продолжительность обучения, начинается с момента зачисления пользователя. Если параметр выключен, то продолжительность обучения не ограничена.';
$string['enrolstartdate'] = 'Дата начала';
$string['enrolstartdate_help'] = 'Если параметр включен, то пользователи могут обучаться только начиная с этой даты.';
$string['mailadmins'] = 'Сообщение администратору';
$string['mailstudents'] = 'Уведомить студентов';
$string['mailteachers'] = 'Сообщение преподавателям';
$string['messageprovider:paypal_enrolment'] = 'Сообщения о зачислении PayPal';
$string['nocost'] = 'Зачисление на этот курс бесплатно!';
$string['paypalaccepted'] = 'Принятые платежи PayPal';
$string['paypal:config'] = 'Настраивать зачисления PayPal';
$string['paypal:manage'] = 'Управлять записанными на курс пользователями';
$string['paypal:unenrol'] = 'Исключать пользователей из курса';
$string['paypal:unenrolself'] = 'Отчислять себя из курса';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'Модуль PayPal позволяет создавать платные курсы. Если стоимость курса равна нулю, то студента не попросят заплатить за вход. Вы можете задать стоимость по умолчанию для любого курса всего сайта. В настройках отдельного курса можно установить его стоимость. Стоимость конкретного курса перекрывает стоимость курса всего сайта по умолчанию.';
$string['sendpaymentbutton'] = 'Оплатить через PayPal';
$string['status'] = 'Разрешить запись из PayPal';
$string['status_desc'] = 'Позволить пользователям использовать PayPal для зачисления в курс  по умолчанию.';
$string['unenrolselfconfirm'] = 'Вы действительно хотите исключить себя из курса «{$a}»?';
