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
 * Strings for component 'cachestore_mongodb', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'База данных';
$string['database_help'] = 'Имя используемой базы данных';
$string['extendedmode'] = 'Использовать расштренные ключи';
$string['extendedmode_help'] = 'При включенном параметре при работе плагина будут использоваться полные наборы ключей. Это не используется в системе, но, при необходимости, это позволит Вам легко осуществлять поиск вручную и исследовать плагин для MongoDB. Включение этого параметра немного увеличит нагрузку, поэтому это следует делать только при необходимости.';
$string['password'] = 'Пароль';
$string['password_help'] = 'Пароль пользователя, используемый для соединения.';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'Набор реплик';
$string['replicaset_help'] = 'Название набора реплик для подключения. Если набор реплик указан, то основная реплика будет определена с использованием команды ismaster  базы данных. Таким образом драйвер может в конечном итоге подключиться к серверу, которого даже нет в списке.';
$string['server'] = 'Сервер';
$string['server_help'] = 'Это сервер, который Вы хотите использовать. Можно указать несколько серверов, разделяя их запятыми.';
$string['testserver'] = 'Тестовый сервер';
$string['testserver_desc'] = 'Это строка подключения для тестового сервера, который Вы хотите использовать. Указывать тестовые серверы необязательно, они используются для модульного тестирования и тестирования производительности.';
$string['username'] = 'Имя пользователя';
$string['username_help'] = 'Имя пользователя, используемое при создании соединения.';
$string['usesafe'] = 'Использовать безопасные операции';
$string['usesafe_help'] = 'При включении этого параметра во время операций вставки, получения и удаления будет использоваться параметр safe. Если Вы указали набор реплик, то этот параметр будет включен принудительно в любом случае.';
$string['usesafevalue'] = 'Значение уровня безопасности';
$string['usesafevalue_help'] = 'Вы можете указать определенное значение для параметра safe. Это число определяет количество серверов, на которых операция должна успешно выполниться, чтобы считаться завершенной.';
