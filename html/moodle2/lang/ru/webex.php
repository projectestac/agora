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
 * Strings for component 'webex', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   webex
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chat:addinstance'] = 'Добавлять новую WebEX-встречу';
$string['chooseavariable'] = 'Выбрать переменную...';
$string['clicktoopen'] = 'Для подключения к встрече щелкните здесь:  {$a}.';
$string['configdisplayoptions'] = 'Выберите все варианты, которые должны быть доступны, существующие параметры не изменяются. Удерживайте нажатой клавишу CTRL для выбора нескольких полей.';
$string['configframesize'] = 'Этот параметр определяет значение высоты (в пикселях) верхнего фрейма (который содержит навигацию), если веб-страница или загруженный файл отображаются в фрейме.';
$string['configrolesinparams'] = 'Включите параметр, если Вы хотите включить имена локализованных ролей в список переменных доступных  параметров.';
$string['configsecretphrase'] = 'Эта секретная фраза используется для создания зашифрованного значения кода, которое может быть отправлено на некоторые серверы в качестве параметра. Зашифрованный код создается как MD5-значение  IP-адреса текущего пользователя, объединенного с Вашей секретной фразой. т.е. код = md5 (IP.secretphrase). Пожалуйста, учтите, что это не надежно, поскольку IP-адрес может меняться и часто совместно используется разными компьютерами.';
$string['contentheader'] = 'Содержимое';
$string['displayoptions'] = 'Доступные опции отображения';
$string['displayselect'] = 'Отображать';
$string['displayselectexplain'] = 'Выберите тип отображения, к сожалению не все виды подходят для всех WebEx.';
$string['displayselect_help'] = 'Этот параметр определяет, как отображается WebEx. Варианты могут быть следующие:
* Открытым - в окне браузера отображается только WebEx
* В всплывающем окне - WebEx отображается в новом окне браузера без меню и адресной строки
* В фрейме - WebEx отображается в фрейме ниже полосы навигации и описания WebEx
* В новом окне - WebEx отображается в новом окне браузера с меню и адресной строкой';
$string['externalurl'] = 'Ваш сайт';
$string['framesize'] = 'Высота фрейма';
$string['invalidstoredwebex'] = 'Не удается отобразить этот ресурс, WebEx является неработоспособным.';
$string['invalidwebex'] = 'WebEx является неработоспособным';
$string['mettingkey'] = 'Номер сессии';
$string['modulename'] = 'WebEx';
$string['modulenameplural'] = 'WebEx';
$string['optionsheader'] = 'Опции';
$string['page-mod-webex-x'] = 'Любая страница модуля WebEx';
$string['parameterinfo'] = '&amp;параметр=значение';
$string['parametersheader'] = 'Информация о сессии';
$string['parametersheader_help'] = 'Введите номер сессии и пароль для этой сессии в соответствующее текстовое поле';
$string['password'] = 'Пароль';
$string['pluginadministration'] = 'Управление модулем WebEx';
$string['pluginname'] = 'WebEx';
$string['popupheight'] = 'Высота всплывающего окна (в пикселях)';
$string['popupheightexplain'] = 'Определяет по умолчанию высоту всплывающих окон.';
$string['popupwidth'] = 'Ширина всплывающего окна (в пикселях)';
$string['popupwidthexplain'] = 'Определяет по умолчанию ширину всплывающих окон.';
$string['printheading'] = 'Показать название WebEx-встречи';
$string['printheadingexplain'] = 'Показать название WebEx выше содержимого? Некоторые типы отображения могут не показывать название WebEx, даже если этот параметр включен.';
$string['printintro'] = 'Показать описание WebEx-встречи';
$string['printintroexplain'] = 'Показать описание WebEx ниже содержимого? Некоторые типы отображения могут не показывать описание WebEx, даже если этот параметр включен.';
$string['rolesinparams'] = 'Включить имена ролей в параметры';
$string['serverwebex'] = 'Сервер WebEx';
$string['webex:view'] = 'Видеть WebEx';
