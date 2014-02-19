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
 * Strings for component 'portfolio_googledocs', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID клиента';
$string['noauthtoken'] = 'От Google не получен ключ аутентификации. Пожалуйста, убедитесь, что Вы разрешили Moodle получить доступ к Вашей учетной записи Google.';
$string['nooauthcredentials'] = 'Требуются учетные данные OAuth';
$string['nooauthcredentials_help'] = 'Для использования плагина портфолио Google Docs необходимо настроить учетные данные OAuth в настройках портфолио.';
$string['nosessiontoken'] = 'Отсутствующий ключ сеанса препятствует экспорту в Google.';
$string['oauth2upgrade_message_content'] = 'При  обновлении до Moodle 2.3, плагин Google Docs был отключен. Чтобы снова включить его, Ваш сайт Moodle должен быть зарегистрирован в Google с получением ID клиента и секрета. Описание см. в документации {$a->docsurl}. ID клиента и секрет могут быть использованы для настройки всех плагинов Google Docs и Picasa.';
$string['oauth2upgrade_message_small'] = 'Этот плагин был отключен, так как он требует настройки. См. описание в документации установки Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Важные сведения о плагине портфолио Google Docs';
$string['oauthinfo'] = '<p> Для использования этого плагина Вы должны зарегистрировать свой сайт с Google, как описано в документации <a href="{$a->docsurl}">Установка Google OAuth 2.0</a> . </p><p> При регистрации Вам нужно будет ввести следующий URL-адрес как «URL-адрес перенаправления авторизации»: </p><p> {$a->callbackurl} </p> После регистрации Вам будут предоставлены ID клиента и ключ, которые могут быть использованы для настройки всех плагинов Google Docs и Picasa. </p>';
$string['pluginname'] = 'Документы Google';
$string['secret'] = 'Секрет';
$string['sendfailed'] = 'Не удалось файл {$a}  передать Google';
