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
 * Strings for component 'enrol_manual', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Изменить статус';
$string['altertimeend'] = 'Изменить время окончания';
$string['altertimestart'] = 'Изменить время начала';
$string['assignrole'] = 'Назначить роль';
$string['confirmbulkdeleteenrolment'] = 'Вы уверены, что хотите отчислить этих пользователей?';
$string['defaultperiod'] = 'Продолжительность обучения по умолчанию';
$string['defaultperiod_desc'] = 'Продолжительность обучения по умолчанию. Если установлен ноль, то по умолчанию продолжительность будет неограниченной.';
$string['defaultperiod_help'] = 'По умолчанию, продолжительность времени обучения начинается с момента записи пользователя. Если отключено, то, по умолчанию, продолжительность обучения не будет ограничена.';
$string['deleteselectedusers'] = 'Отчислить выбранных пользователей';
$string['editselectedusers'] = 'Изменить зачисления выбранных пользователей';
$string['enrolledincourserole'] = 'Записан на курс «{$a->course}» как «{$a->role}»';
$string['enrolusers'] = 'Запись пользователей на курс';
$string['expiredaction'] = 'Действие при истечении срока записи';
$string['expiredaction_help'] = 'Выберите выполняемое действие при истечении срока записи пользователя в курсе. Обратите внимание, что из курса удаляются некоторые настройки  и данные пользователя при исключении его из курса.';
$string['expirymessageenrolledbody'] = 'Уважаемый(ая) {$a->user}, уведомляем Вас, что обучение в курсе «{$a->course}» истекает {$a->timeend}. При необходимости свяжитесь с {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Уведомление об окончании обучения';
$string['expirymessageenrollerbody'] = 'Зачисление в курсе «{$a->course}» истекает в течение следующих {$a->threshold} для перечисленных пользователей:

{$a->users}.

Чтобы продлить их зачисление, перейдите на {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Уведомление об окончании обучения';
$string['manual:config'] = 'Настраивать зачисление вручную';
$string['manual:enrol'] = 'Записывать пользователей на курсы';
$string['manual:manage'] = 'Управлять зачислением пользователей на курс';
$string['manual:unenrol'] = 'Отчислять пользователей из курса';
$string['manual:unenrolself'] = 'Отчислять себя из курса';
$string['messageprovider:expiry_notification'] = 'Уведомления об истечении срока обучения при записи вручную.';
$string['pluginname'] = 'Зачисление вручную';
$string['pluginname_desc'] = 'Плагин ручной записи на курсы позволяет администраторам и преподавателям записывать пользователей на курс вручную, используя соответствующую ссылку в настройках курса. Рекомендуется включить этот плагин, т.к. некоторые другие плагины зависят от него, например, самостоятельная запись.';
$string['status'] = 'Разрешить ручную запись на курсы';
$string['status_desc'] = 'Разрешить доступ к курсу внутренним зарегистрированным пользователям. Этот параметр  должен быть включен в большинстве случаев.';
$string['statusdisabled'] = 'Отключено';
$string['statusenabled'] = 'Включено';
$string['status_help'] = 'Этот параметр определяет, могут ли пользователи быть зачислены вручную (посредством ссылки в установках курса) пользователем с соответствующими правами, например, преподавателем.';
$string['unenrol'] = 'Отчислить пользователя';
$string['unenrolselectedusers'] = 'Отчислить выбранных пользователей';
$string['unenrolselfconfirm'] = 'Вы действительно хотите исключить себя из курса «{$a}»?';
$string['unenroluser'] = 'Вы действительно хотите отчислить пользователя «{$a->user}» из курса «{$a->course}»?';
$string['unenrolusers'] = 'Отчислить пользователей';
$string['wscannotenrol'] = 'Не удалось зачислить вручную пользователя в курс с id = {$a->courseid}';
$string['wsnoinstance'] = 'Способ зачисления вручную отсутствует или отключен для курса (id = {$a->courseid})';
$string['wsusercannotassign'] = 'Вы не имеете права назначить роль ({$a->roleid}) пользователю ({$a->userid}) в этом курсе ({$a->courseid}).';
