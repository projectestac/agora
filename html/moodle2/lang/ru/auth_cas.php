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
 * Strings for component 'auth_cas', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_cas_broken_password'] = 'Вы не можете обойтись без изменения пароля, однако нет доступных страниц для его изменения. Пожалуйста, свяжитесь с администратором Moodle.';
$string['auth_cas_casversion'] = 'Версия протокола CAS';
$string['auth_cas_changepasswordurl'] = 'Адрес страницы смены пароля';
$string['auth_casdescription'] = 'Этот метод использует сервер CAS (Центральная служба проверки подлинности) для аутентификации пользователей в контексте единого входа в систему (SSO). Вы также можете использовать простую LDAP аутентификацию. Если данное имя пользователя и его пароль действительны в соответствии с CAS, то, при необходимости, Moodle создаст новую запись пользователя в своей базе данных, принимая атрибуты пользователя из LDAP. При следующем входе проверяются только имя пользователя и пароль.';
$string['auth_cas_version'] = 'Использовать версию протокола CAS';
$string['pluginname'] = 'Сервер CAS (SSO)';
