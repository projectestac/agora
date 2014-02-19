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
 * Strings for component 'repository_boxnet', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Ключ API';
$string['apiv1migration_message_small'] = 'Этот плагин был отключен, так как он требует настройки, как описано в документации по миграции с APIv1 Box.net.';
$string['apiv1migration_message_subject'] = 'Важная информация относительно плагина репозитория Box.net';
$string['boxnet:view'] = 'Просматривать хранилище Box.net';
$string['callbackurl'] = 'URL-адрес переадресации';
$string['callbackurltext'] = '1. Посетите <a href="http://www.box.net/developers/services">www.box.net/developers/services</a> снова.
2. Убедитесь, что Вы задаете URL-адрес перенаправления на службу box.net - {$a}.';
$string['callbackwarning'] = '1. Получите API Box.net от <a href="http://www.box.net/developers/services">www.box.net/developers/services</a> для этого сайта Moodle.
2. Введите здесь ключ API Box.net, затем нажмите кнопку Сохранить и вернитесь на эту страницу. Вы увидите, что Moodle создала URL-адрес перенаправления.
3. Снова измените детали Box.net на сайте box.net и задайте URL-адрес перенаправления.';
$string['cannotcreatereference'] = 'Невозможно создать ссылку, не хватает прав доступа к файлу на Box.net.';
$string['clientid'] = 'ID клиента';
$string['clientsecret'] = 'Секретный ключ клиента';
$string['configplugin'] = 'Конфигурация Box.net';
$string['information'] = 'Получите ключ API для вашего сайта Moodle на <a href="http://www.box.net/developers/services">странице разработчика Box.net</a>.';
$string['invalidpassword'] = 'Неправильный пароль';
$string['migrationadvised'] = 'Похоже, что Вы использовали Box.net с API версии 1, хотите запустить <a href="{$a}">инструмент миграции</a>, чтобы преобразовать старые ссылки?';
$string['migrationinfo'] = '<p>В рамках перехода на новую версию API, предоставляемую Box.net, ваши ссылки на файлы должны быть мигрированы. К сожалению, система ссылок на файлы несовместима с API v2, поэтому файлы необходимо загрузить и сконвертировать в реальные файлы.</p> <p>Имейте в виду, что миграция может <strong>занять очень долгое время</strong>, в зависимости от того, сколько ссылок используется, и насколько велики файлы.</p> <p>Вы можете запустить инструмент миграции, нажав на кнопку ниже, или же выполнить скрипт командной строки: repository/boxnet/cli/migrationv1.php.</p> <p>Узнайте больше <a href="{$a->docsurl}">здесь</a>.</p>';
$string['migrationtool'] = 'Инструмент миграции Box.net APIv1';
$string['nullfilelist'] = 'В этом хранилище нет файлов';
$string['password'] = 'Пароль';
$string['pluginname'] = 'Box.net';
$string['pluginname_help'] = 'Хранилище Box.net';
$string['runthemigrationnow'] = 'Запустить инструмент миграции сейчас';
$string['saved'] = 'Данные Box.net сохранены';
$string['shareurl'] = 'Публичная ссылка';
$string['username'] = 'Имя пользователя Box.net';
$string['warninghttps'] = 'Для работы хранилища сайт Box.net требует использования Вашим сайтом протокола HTTPS.';
