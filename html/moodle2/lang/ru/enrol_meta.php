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
 * Strings for component 'enrol_meta', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['linkedcourse'] = 'Связанный курс';
$string['meta:config'] = 'Формировать запись на метакурсы';
$string['meta:selectaslinked'] = 'Выбирать связанные метакурсы';
$string['meta:unenrol'] = 'Отчислять приостановленных пользователей.';
$string['nosyncroleids'] = 'Роли, которые не синхронизируются';
$string['nosyncroleids_desc'] = 'По умолчанию, все назначенные роли уровня курса будут синхронизированы из родительского в дочерний курс. Выбранные здесь роли не будут включены в процесс синхронизации. Доступные для синхронизации роли будут обновлены при следующем выполнении cron.';
$string['pluginname'] = 'Связь с метакурсом';
$string['pluginname_desc'] = 'Метод записи "Связь с метакурсом" синхронизирует учащихся и роли в двух разных курсах';
$string['syncall'] = 'Синхронизация всех записанных пользователей.';
$string['syncall_desc'] = 'Если параметр включен, то все записанные пользователи синхронизируются, даже если они не имеют роли в родительском курсе.
Если отключен, то только пользователи, имеющие хотя бы одну синхронизируемую роль, будут записаны на дочерний курс.';
