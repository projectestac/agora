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
 * Strings for component 'auth_email', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = 'Подтверждение с помощью электронной почты - используемый по умолчанию метод аутентификации. При регистрации пользователя на указанный адрес электронной почты отправляется письмо с просьбой о подтверждении регистрации. Письмо содержит случайно созданную (безопасную) ссылку на страницу, где пользователь может подтвердить учетную запись. В дальнейшем при входе в систему сверяются имя пользователя и пароль с их значениями в базе данных.';
$string['auth_emailnoemail'] = 'Отправить вам письмо не удалось!';
$string['auth_emailrecaptcha_key'] = 'Включить reCAPTCHA';
$string['auth_emailsettings'] = 'Настройки';
$string['pluginname'] = 'Самостоятельная регистрация по электронной почте';
