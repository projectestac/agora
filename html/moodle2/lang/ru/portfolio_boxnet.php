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
 * Strings for component 'portfolio_boxnet', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apiv1migration_message_small'] = 'Этот плагин был отключен, так как он требует настройки, как описано в документации по миграции с APIv1 Box.net.';
$string['apiv1migration_message_subject'] = 'Важная информация относительно плагина портфолио Box.net';
$string['clientid'] = 'ID клиента';
$string['clientsecret'] = 'Секретный ключ клиента';
$string['existingfolder'] = 'Поместить файл(ы) в существующий каталог';
$string['folderclash'] = 'Каталог, который Вы запросили создать, уже существует!';
$string['foldercreatefailed'] = 'Не удалось создать целевую папку на box.net';
$string['folderlistfailed'] = 'Не удалось получить список каталогов из box.net';
$string['missinghttps'] = 'HTTPS требуется';
$string['missinghttps_help'] = 'Box.net будет работать только с веб-сайтами с поддержкой HTTPS.';
$string['missingoauthkeys'] = 'Отсутствует ID и секретный ключ клиента';
$string['newfolder'] = 'Поместить файл(ы) в новый каталог';
$string['noauthtoken'] = 'Не удалось получить ключ аутентификации для использования в этой сессии';
$string['notarget'] = 'Необходимо указать или существующий или новый каталог для размещения';
$string['noticket'] = 'Не удалось получить ключ от box.net, чтобы начать сеанс аутентификации';
$string['password'] = 'Ваш пароль для box.net  (не будет запомнен)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Не удалось отправить содержимое на box.net: {$a}';
$string['setupinfo'] = 'Инструкция по установке';
$string['setupinfodetails'] = 'Для получения ключа API войдите в Box.net и посетите их <a href="$a->servicesurl}">страницу разработки OpenBox</a>. В разделе «Developer Tools» нажмите \'Создать новое приложение« (»Create new application«) и создайте новое приложение для своего сайта Moodle. Ключ API отображается в разделе »Backend parameters« формы редактирования приложения. В этой форме, заполните поле »URL-адрес перенаправления« (»Redirect URL«): <br /> <code>{$a->callbackurl}</code> <br /> При желании Вы можете также предоставить другую информацию о своем сайте Moodle. Эти значения могут быть отредактированы позже на странице »Просмотр моих приложений« (»View my applications") .';
$string['sharedfolder'] = 'Общий';
$string['sharefile'] = 'Это общий файл?';
$string['sharefolder'] = 'Это общий новый каталог?';
$string['targetfolder'] = 'Целевой каталог';
$string['tobecreated'] = 'Будет создан';
$string['username'] = 'Ваш логин на box.net (не будет запомнен)';
$string['warninghttps'] = 'Для работы портфолио сайт Box.net требует использования Вашим сайтом протокола HTTPS.';
