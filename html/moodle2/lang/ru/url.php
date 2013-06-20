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
 * Strings for component 'url', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Выберите переменную ...';
$string['clicktoopen'] = 'Нажмите ссылку {$a}, чтобы открыть ресурс.';
$string['configdisplayoptions'] = 'Выделите все варианты, которые должны быть доступны, существующие параметры не изменятся. Удерживайте нажатой клавишу CTRL для выбора нескольких полей.';
$string['configframesize'] = 'Это значение высоты (в пикселях) верхнего фрейма, содержащего навигацию, если веб-страницы или загруженные файлы отображаются в фрейме.';
$string['configrolesinparams'] = 'Включите, если хотите включить переведённые названия ролей в список доступных параметров.';
$string['configsecretphrase'] = 'Эта секретная фраза используется при создании зашифрованного кода, который может быть отправлен на некоторые серверы в качестве параметра. Код вычисляется как md5-сумма от значению IP-адреса текущего пользователя и с Вашей секретной фразы. Т.е. code=md5(IP.secretphrase). Пожалуйста, учтите, что это не надежно, поскольку IP-адреса могут меняться и один адрес часто используется несколькими компьютерами.';
$string['contentheader'] = 'Содержимое';
$string['createurl'] = 'Создать URL';
$string['displayoptions'] = 'Доступные параметры отображения';
$string['displayselect'] = 'Отображение';
$string['displayselectexplain'] = 'Выберите тип отображения. К сожалению, не все типы подходят для всех видов гиперссылок.';
$string['displayselect_help'] = 'Этот параметр (наряду с типом файла и возможностью браузера по отображению внедрённых объектов) определяет, как будет отображаться гиперссылка. Возможные варианты:

* Автоматически - Наиболее подходящий режим отображения гиперссылки подбирается автоматически
* Внедрить - гиперссылка отображается на странице после панели навигации вместе с описанием и блоками
* Принудительное скачивание - пользователю предлагается скачать файл
* Открыть - гиперссылка открывается в текущем окне браузера
* Во всплывающем окне - гиперссылка открывается в новом окне браузера без меню и адресной строки
* В фрейме - гиперссылка отображается в фрейме под панелью навигации и описанием
* В новом окне - гиперссылка открывается в новом окне браузера с меню и адресной строкой';
$string['externalurl'] = 'Адрес (URL)';
$string['framesize'] = 'Высота фрейма';
$string['invalidstoredurl'] = 'Невозможно отобразить ресурс, некорректный адрес';
$string['invalidurl'] = 'Введеный URL неверный';
$string['modulename'] = 'Гиперссылка';
$string['modulenameplural'] = 'Гиперссылки';
$string['neverseen'] = 'Никогда не просматривалась';
$string['optionsheader'] = 'Настройки';
$string['page-mod-url-x'] = 'Любая страница модуля "гиперссылка"';
$string['parameterinfo'] = '&amp;параметр=переменная';
$string['parametersheader'] = 'Параметры';
$string['parametersheader_help'] = 'К адресу можно автоматически добавить в качестве параметров значения некоторых внутренних переменные Moodle. Введите в текстовые поля названия для параметров, а затем выберите соответствующие переменные.';
$string['pluginadministration'] = 'Управление гиперссылкой';
$string['pluginname'] = 'Гиперссылка';
$string['popupheight'] = 'Высота всплывающего окна (в пикселях)';
$string['popupheightexplain'] = 'Заданная по умолчанию высота всплывающего окна.';
$string['popupwidth'] = 'Ширина всплывающего окна (в пикселях)';
$string['popupwidthexplain'] = 'Заданная по умолчанию ширина всплывающего окна.';
$string['printheading'] = 'Отображать название гиперссылки';
$string['printheadingexplain'] = 'Выводить название гиперссылки перед содержимым? При некоторых настройках отображения название гиперссылки не будет отображаться, даже если этот параметр включен.';
$string['printintro'] = 'Отображать описание гиперссылки';
$string['printintroexplain'] = 'Выводить описание гиперссылки после содержимого? При некоторых настройках отображения описание гиперссылки не будет отображаться, даже если этот параметр включен.';
$string['rolesinparams'] = 'Включить названия ролей в параметры';
$string['serverurl'] = 'Гиперссылка на этот сайт';
$string['url:view'] = 'Просматривать гиперссылки';
