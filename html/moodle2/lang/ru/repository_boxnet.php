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
 * Strings for component 'repository_boxnet', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Ключ API';
$string['apiv1migration_message_content'] = 'В рамках недавнего обновления Moodle (2.6, 2.5.3, 2.4.7), плагин хранилища Box был отключен. Чтобы его снова включить, хранилище нужно перенастроить, как описано в документации {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Этот плагин был отключен, так как он требует настройки, как описано в документации по миграции Box APIv1.';
$string['apiv1migration_message_subject'] = 'Важная информация относительно плагина репозитория Box';
$string['boxnet:view'] = 'Просматривать хранилище Box';
$string['cannotcreatereference'] = 'Невозможно создать ссылку, не хватает прав доступа к файлу на Box.';
$string['clientid'] = 'ID клиента';
$string['clientsecret'] = 'Секретный ключ клиента';
$string['configplugin'] = 'Конфигурация Box';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'Получите ключ API для вашего сайта Moodle на <a href="https://app.box.com/developers/services">странице разработчиков Box</a>.';
$string['invalidpassword'] = 'Неправильный пароль';
$string['migrationadvised'] = 'Похоже, что Вы использовали Box с API версии 1, хотите запустить <a href="{$a}">инструмент миграции</a>, чтобы преобразовать старые ссылки?';
$string['migrationinfo'] = '<p>В рамках перехода на новую версию API, предоставляемую Box, ваши ссылки на файлы должны быть мигрированы. К сожалению, система ссылок на файлы несовместима с API v2, поэтому файлы необходимо загрузить и сконвертировать в реальные файлы.</p> <p>Имейте в виду, что миграция может <strong>занять очень долгое время</strong>, в зависимости от того, сколько ссылок используется, и насколько велики файлы.</p> <p>Вы можете запустить инструмент миграции, нажав на кнопку ниже, или же выполнить скрипт командной строки: repository/boxnet/cli/migrationv1.php.</p> <p>Узнайте больше <a href="{$a->docsurl}">здесь</a>.</p>';
$string['migrationtool'] = 'Инструмент миграции Box APIv1';
$string['nullfilelist'] = 'В этом хранилище нет файлов';
$string['password'] = 'Пароль';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Хранилище Box';
$string['runthemigrationnow'] = 'Запустить инструмент миграции сейчас';
$string['saved'] = 'Данные Box сохранены';
$string['shareurl'] = 'Публичная ссылка';
$string['username'] = 'Имя пользователя Box';
$string['warninghttps'] = 'Для работы хранилища сайт Box требует использования Вашим сайтом протокола HTTPS.';
