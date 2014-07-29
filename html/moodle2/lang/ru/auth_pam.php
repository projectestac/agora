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
 * Strings for component 'auth_pam', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_pam
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pamdescription'] = 'Этот модуль аутентификации использует библиотеки PAM (Pluggable Authentication Modules), чтобы получить доступ к учетным записям операционной системы. Для работы этого модуля необходима установка библиотеки <a href="http://www.math.ohio-state.edu/~ccunning/pam_auth/">PAM Authentication</a> языка PHP.';
$string['auth_passwordisexpired'] = 'Ваш пароль устарел. Вы хотите поменять свой пароль сейчас?';
$string['auth_passwordwillexpire'] = 'Дней до окончания срока действия Вашего пароля: {$a}. Вы хотите установить новый пароль сейчас?';
$string['pluginname'] = 'PAM (Pluggable Authentication Modules)';
