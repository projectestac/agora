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
 * Strings for component 'portfolio_flickr', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API ключ';
$string['contenttype'] = 'Типы контента';
$string['err_noapikey'] = 'Нет ключа API';
$string['err_noapikey_help'] = 'Нет никакого ключа API, сконфигурированного для этого плагина. Вы можете получить один из них на странице службы Flickr.';
$string['hidefrompublicsearches'] = 'Скрыть эти изображения из общих поисков?';
$string['isfamily'] = 'Видно семье';
$string['isfriend'] = 'Видно друзьям';
$string['ispublic'] = 'Общее (могут видеть все)';
$string['moderate'] = 'Умеренный';
$string['noauthtoken'] = 'Не удалось получить ключ аутентификации для использования в этой сессии';
$string['other'] = 'Произведения искусства, иллюстраций, компьютерная графика и другие не фотографические изображения';
$string['photo'] = 'Фотографии';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = 'Ограниченно';
$string['safe'] = 'Безопасный';
$string['safetylevel'] = 'Уровень безопасности';
$string['screenshot'] = 'Скриншоты';
$string['set'] = 'Установить';
$string['setupinfo'] = 'Инструкция по установке';
$string['setupinfodetails'] = 'Чтобы получить ключ API и секрет, войдите в Flickr и <a href="{$a->applyurl}">подайте заявку на получение нового ключа</a>. После получения нового ключа и секрета перейдите по ссылке «Edit auth flow for this app». В «App Type» выберите «Web Application». В поле «Callback URL» введите значение: <br /> <code>{$a->callbackurl}</code>. <br /> При желании Вы также можете предоставить описание и логотип своего сайта Moodle. Эти значения могут быть установлены и позже на <a href="{$a->keysurl}">странице</a> списка Ваших приложений Flickr.';
$string['sharedsecret'] = 'Секретное слово';
$string['title'] = 'Заголовок';
$string['uploadfailed'] = 'Не удалось загрузить изображение(я) на flickr.com: {$a}';
