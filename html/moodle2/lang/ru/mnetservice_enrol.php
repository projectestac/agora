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
 * Strings for component 'mnetservice_enrol', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   mnetservice_enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['availablecourseson'] = 'Доступные курсы от {$a}';
$string['availablecoursesonnone'] = 'Отдаленный хост <a href="{$a->hosturl}">{$a->hostname}</a> не предлагает курсы нашим пользователям.';
$string['clientname_help'] = 'Этот инструмент позволяет Вам регистрировать и не регистрировать своих локальных пользователей на отдаленных хостах, разрешающим Вам делать это, используя метод «Аутентификация MNet».';
$string['hostappname'] = 'Приложение';
$string['hostname'] = 'Хост';
$string['hosturl'] = 'URL удаленного сервера';
$string['nopublishers'] = 'Нет доступных отдаленных партнеров.';
$string['noroamingusers'] = 'Пользователям должно быть дано право «{$a}» в контексте системы, чтобы быть записанными на курсы на внешних серверах, однако в настоящее время нет ни одного пользователя с таким правом. Нажмите кнопку «Продолжить», чтобы дать необходимые права одной или нескольким ролям на своем сайте.';
$string['otherenrolledusers'] = 'Другие записанные на курс пользователи';
$string['pluginname'] = 'Удаленная служба регистрации';
$string['refetch'] = 'Повторное получение данных от отдаленных хостов';
