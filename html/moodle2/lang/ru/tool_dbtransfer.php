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
 * Strings for component 'tool_dbtransfer', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Доступные драйверы для перемещения базы данных';
$string['cliheading'] = 'Перемещение базы данных - убедитесь, что никто не имеет доступа к серверу во время перемщения!';
$string['climigrationnotice'] = 'Идет процесс перемещения базы данных. Подождите, пока не завершится перемещение и администратор обновит конфигурацию сервера и удалит файл $CFG->dataroot/climaintenance.html.';
$string['convertinglogdisplay'] = 'Отображение действий преобразования журнала';
$string['dbexport'] = 'Экспорт базы данных';
$string['dbtransfer'] = 'Перемещение базы данных';
$string['enablemaintenance'] = 'Включить режим обслуживания';
$string['enablemaintenance_help'] = 'Эта опция включает режим технического обслуживания во время и после переноса базы данных, при этом предотвращается доступ всех пользователей до завершения переноса. Обратите внимание, что администратор должен вручную удалить файл $CFG->dataroot/climaintenance.html и после обновления настроить файл config.php для возобновления нормальной работы.';
$string['exportdata'] = 'Экспорт данных';
$string['notargetconectexception'] = 'К сожалению, не удается подключиться к базе данных-получателю.';
$string['options'] = 'Параметры';
$string['pluginname'] = 'Передача базы данных';
$string['targetdatabase'] = 'База данных - цель';
$string['targetdatabasenotempty'] = 'База данных - цель не должна содержать таблицы с этим префиксом!';
$string['transferdata'] = 'Передача данных';
$string['transferdbintro'] = 'Этот скрипт служит для переноса всего содержимого этой базы данных на другой сервер баз данных. Он часто используется для перемещения данных в базу данных другого типа.';
$string['transferdbtoserver'] = 'Перемещение этой базы данных Moodle на другой сервер';
$string['transferringdbto'] = 'Перемещение этой базы данных в базу данных «{$a->dbname}» типа {$a->dbtype} на сервере {$a->dbhost}';
