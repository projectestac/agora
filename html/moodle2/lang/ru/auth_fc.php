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
 * Strings for component 'auth_fc', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'Адрес страницы смены пароля';
$string['auth_fcconnfail'] = 'Не удалось установить Соединение не удалось, ошибка: {$a->no}; строка ошибки: {$a->str}';
$string['auth_fccreators'] = 'Список групп, членам которых позволено создать новые курсы. Разделитель для нескольких групп - « ; ». Имена надо писать в точности как на сервере FirstClass. Они чувствительны к регистру.';
$string['auth_fccreators_key'] = 'Создатели';
$string['auth_fcdescription'] = 'Этот метод использует сервер FirstClass  для проверки данного имени пользователя и пароля.';
$string['auth_fcfppport'] = 'Порт сервера (3333 является наиболее распространенным)';
$string['auth_fcfppport_key'] = 'Порт';
$string['auth_fchost'] = 'Адрес сервера FirstClass. Используйте IP-адрес или DNS-имя.';
$string['auth_fchost_key'] = 'Хост';
$string['auth_fcpasswd'] = 'Пароль для учетной записи выше.';
$string['auth_fcpasswd_key'] = 'Пароль';
$string['auth_fcuserid'] = 'ID пользователя аккаунта FirstClass с привилегией «Субадминистратор»';
$string['auth_fcuserid_key'] = 'ID пользователя';
$string['pluginname'] = 'FirstClass-сервер';
