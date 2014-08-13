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
 * Strings for component 'tool_dbtransfer', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Доступные драйверы для целевой базы данных';
$string['cliheading'] = 'Перенос базы данных - убедитесь, что никто не имеет доступа к серверу во время переноса!';
$string['climigrationnotice'] = 'Идет процесс перемещения базы данных. Подождите, пока не завершится перенос и администратор обновит конфигурацию сервера и удалит файл $CFG->dataroot/climaintenance.html.';
$string['convertinglogdisplay'] = 'Преобразование отображаемых названий действий в журнале';
$string['dbexport'] = 'Экспорт базы данных';
$string['dbtransfer'] = 'Перенос базы данных';
$string['enablemaintenance'] = 'Включить режим обслуживания';
$string['enablemaintenance_help'] = 'Эта опция включает режим технического обслуживания во время и после переноса базы данных, при этом предотвращается доступ всех пользователей до завершения переноса. Обратите внимание, что администратор должен вручную удалить файл $CFG->dataroot/climaintenance.html и после обновления настроить файл config.php для возобновления нормальной работы.';
$string['exportdata'] = 'Экспорт данных';
$string['notargetconectexception'] = 'К сожалению, не удается подключиться к целевой базе данных.';
$string['options'] = 'Параметры';
$string['pluginname'] = 'Перенос базы данных';
$string['targetdatabase'] = 'Целевая база данных';
$string['targetdatabasenotempty'] = 'Целевая база данных не должна содержать таблицы с указанным префиксом!';
$string['transferdata'] = 'Перенос данных';
$string['transferdbintro'] = 'Этот скрипт служит для переноса всего содержимого этой базы данных на другой сервер баз данных. Он часто используется для переноса данных в базу данных другого типа.';
$string['transferdbtoserver'] = 'Перенос этой базы данных Moodle на другой сервер';
$string['transferringdbto'] = 'Перенос этой базы данных типа «{$a->dbtypefrom}» в базу данных «{$a->dbname}» типа «{$a->dbtype}» на сервере «{$a->dbhost}»';
