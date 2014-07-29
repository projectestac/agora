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
 * Strings for component 'portfolio_picasa', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_picasa
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID клиента';
$string['noauthtoken'] = 'Ключ аутентификации не получен от Google. Пожалуйста, убедитесь, что Вы разрешили Moodle получить доступ к своей учетной записи в Google.';
$string['nooauthcredentials'] = 'Требуются учетные данные OAuth.';
$string['nooauthcredentials_help'] = 'Для использования плагина портфолио Picasa необходимо настроить учетные данные OAuth в настройках портфолио.';
$string['oauth2upgrade_message_content'] = 'При переходе к Moodle 2.3 плагин портфолио Picasa был отключен. Чтобы снова включить его, Ваш сайт Moodle должен быть зарегистрирован в Google с получением ID клиента и ключа, это описано в документации {$a->docsurl}. ID клиента и ключ могут быть использованы для настройки всех плагинов Google Drive и Picasa.';
$string['oauth2upgrade_message_small'] = 'Этот плагин был отключен, так как он требует настройки. См. описание в документации установки Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Важная информация о плагине портфолио Picasa';
$string['oauthinfo'] = '<p> Для использования этого плагина Вы должны зарегистрировать свой сайт в Google, как описано в документации <a href="{$a->docsurl}">Установка Google OAuth 2.0</a>. </p><p> При регистрации Вам нужно будет ввести как «URL-адрес авторизованного перенаправления» следующий адрес: </p><p> {$a->callbackurl} .</p> После регистрации Вам будет предоставлен ID клиента и ключ, которые могут быть использованы для настройки всех плагинов Google Drive и Picasa. </p>';
$string['pluginname'] = 'Picasa';
$string['secret'] = 'Секрет';
$string['sendfailed'] = 'Файл {$a} не удалось передать Picasa';
