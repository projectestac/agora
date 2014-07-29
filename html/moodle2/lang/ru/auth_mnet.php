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
 * Strings for component 'auth_mnet', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Если установлено значение «Да», то локальная запись пользователя создается автоматически при первом входе отдаленного пользователя в систему.';
$string['auth_mnetdescription'] = 'Аутентификация пользователей с использованием сети доверия, определенной в настройках сети Moodle.';
$string['auth_mnet_roamin'] = 'Пользователи этих хостов могут путешествовать по Вашему сайту';
$string['auth_mnet_roamout'] = 'Ваши пользователи могут путешествовать по этим хостам';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Тайм-аут (в секундах) для аутентификации по протоколу XMLRPC.';
$string['auto_add_remote_users'] = 'Автоматически добавлять отдаленных пользователей';
$string['pluginname'] = 'Аутентификация через MNet';
$string['rpc_negotiation_timeout'] = 'Тайм-аут передачи по протоколу RPC';
$string['sso_idp_description'] = 'Опубликуйте эту службу, чтобы дать пользователям возможность путешествия по сайту {$a} без необходимости повторного входа на него. <ul><li> <em>Зависимость:</em> Вы должны также <strong>подписаться</strong> на службу SSO (Service Provider)  на {$a}. </li></ul><br /> Подписка на эту службу позволит авторизованным пользователям {$a} получить доступ к сайту без необходимости повторного входа. <ul><li> <em>Зависимость:</em> Вы также должны <strong>опубликовать</strong> службу SSO (Service Provider) {$a}. </li></ul><br />';
$string['sso_idp_name'] = 'SSO (поставщик удостоверений)';
$string['sso_mnet_login_refused'] = 'Пользователю {$a->user} не разрешается вход в систему  {$a->host}.';
$string['sso_sp_description'] = 'Публикация этой службы позволит пользователям, авторизованным на {$a} получить доступ к сайту без необходимости повторного входа. <ul><li> <em>Зависимость:</em> Вы должны также <strong>подписаться</strong> на службу SSO (Identity Provider) {$a}. </li></ul><br /> Подписаться на эту службу, чтобы дать пользователям возможность путешествия по сайту {$a} без необходимости повторного входа. <ul><li> <em>Зависимость:</em> Вы также должны <strong>опубликовать</strong> службу SSO (Identity Provider) {$a}. </li></ul><br />';
$string['sso_sp_name'] = 'SSO (Операторы связи)';
