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
 * Strings for component 'auth_pop3', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_pop3
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pop3changepasswordurl_key'] = 'Адрес страницы смены пароля';
$string['auth_pop3description'] = 'Этот метод использует POP3-сервер для определения соответствия и правильности пары логин/пароль.';
$string['auth_pop3host'] = 'Адрес POP3-сервера. Используйте IP-адрес, не DNS-имя.';
$string['auth_pop3host_key'] = 'Хост';
$string['auth_pop3mailbox'] = 'Имя почтового ящика для соединения (обычно ВХОДЯЩИЕ)';
$string['auth_pop3mailbox_key'] = 'Почтовый ящик';
$string['auth_pop3notinstalled'] = 'Не удается использовать авторизацию POP3. Модуль PHP IMAP  не установлен.';
$string['auth_pop3port'] = 'Номер порта сервера (обычно 110, 995 для SSL)';
$string['auth_pop3port_key'] = 'Порт';
$string['auth_pop3type'] = 'Тип сервера. Если ваш сервер использует защиту, основанную на сертификатах, используйте pop3cert.';
$string['auth_pop3type_key'] = 'Тип';
$string['pluginname'] = 'Сервер POP3';
