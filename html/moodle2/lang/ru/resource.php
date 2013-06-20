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
 * Strings for component 'resource', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   resource
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clicktodownload'] = 'Нажмите на ссылку {$a}, чтобы загрузить файл.';
$string['clicktoopen2'] = 'Нажмите на ссылку {$a}, чтобы просмотреть файл.';
$string['configdisplayoptions'] = 'Выберите все варианты, которые должны быть доступны. Существующие настройки не будут изменены.
Для выбора нескольких полей удерживайте клавишу CTRL.';
$string['configframesize'] = 'При отображении веб-страницы или загруженного файла внутри фрейма, это значение определяет размер (в пикселях) верхнего фрейма (который содержит элементы навигации).';
$string['configparametersettings'] = 'Это установка значения по умолчанию для панели настройки параметров формы при добавлении новых ресурсов. После первого использования она принимает значение, выбранное пользователем';
$string['configpopup'] = 'При добавлении нового ресурса, который будет  показываться во всплывающем (popup) окне, этот выбор будет по умолчанию?';
$string['configpopupdirectories'] = 'Всплывающие (popup) окна должны показывать прямые ссылки по умолчанию?';
$string['configpopupheight'] = 'Какова должна быть высота по умолчанию для всплывающего (popup) окна?';
$string['configpopuplocation'] = 'Необходимо ли показывать панель инструментов во всплывающем (popup) окне по умолчанию?';
$string['configpopupmenubar'] = 'Необходимо ли показывать меню во всплывающем (popup) окне по умолчанию?';
$string['configpopupresizable'] = 'Необходимо ли делать изменяющимся всплывающее (popup) окно по умолчанию?';
$string['configpopupscrollbars'] = 'Необходимо ли показывать скроллинг во всплывающем (popup) окне по умолчанию?';
$string['configpopupstatus'] = 'Необходимо ли показывать статусную строку во всплывающем (popup) окне по умолчанию?';
$string['configpopuptoolbar'] = 'Надо ли по умолчанию показывать панель инструментов во всплывающем (popup) окне?';
$string['configpopupwidth'] = 'Какой по умолчанию должна быть ширина для нового всплывающего (popup) окна?';
$string['contentheader'] = 'Содержимое';
$string['displayoptions'] = 'Доступные варианты отображения';
$string['displayselect'] = 'Способ отображения';
$string['displayselectexplain'] = 'Выберите вариант отображения. К сожалению, не все варианты подходят ко всем типам файлов.';
$string['displayselect_help'] = 'Этот параметр (а также тип файла и возможности браузера по внедрению содержимого) определяет способ отображения файла. Параметр может принимать значения:

* Автоматически - Наиболее подходящий режим отображения подбирается автоматически в зависимости от типа файла
* Внедрить - Файл отображается внутри страницы, под панелью навигации, вместе с описанием и включенными блоками
* Принудительное скачивание - пользователю предлагается скачать файл
* Открыть - Файл открывается в текущем окне браузера
* Во всплывающем окне - Файл открывается во всплывающем окне без меню и адресной строки
* В фрейме - Файл отображается в отдельном фрейме под панелью навигации и описанием файла
* В новом окне - Файл открывается в новом окне браузера с меню и адресной строкой';
$string['dnduploadresource'] = 'Создать ресурс "Файл"';
$string['encryptedcode'] = 'Зашифрованный код';
$string['filenotfound'] = 'Извините, файл не найден.';
$string['filterfiles'] = 'Применять фильтры к содержимому файлов';
$string['filterfilesexplain'] = 'Выберите к файлам каких типов следует применять фильтры. Обратите внимание, это может может привести к проблемам отображения приложений на Flash и Java. Пожалуйста, проверьте, чтобы все текстовые файлы были в кодировке UTF-8.';
$string['filtername'] = 'Автосвязывание названия ресурса';
$string['forcedownload'] = 'Принудительное скачивание';
$string['framesize'] = 'Размер фрейма';
$string['legacyfiles'] = 'Миграция файла из старого курса';
$string['legacyfilesactive'] = 'Активно';
$string['legacyfilesdone'] = 'Завершено';
$string['modulename'] = 'Файл';
$string['modulename_help'] = 'Модуль "Файл" позволяет преподавателю представить файл как ресурс курса. Если это возможно, то файл будет отображаться в интерфейсе курса, в противном случае студентам будет предложено скачать его. Файл может включать вспомогательные файлы, например, HTML-страница может иметь встроенные изображения или флэш-объекты.

Учтите, что студенты должны иметь соответствующее программное обеспечение на своих компьютерах, чтобы открыть файл.

Файл может быть использован:

* Чтобы поделиться презентации данного класса
* Для включения мини-сайта в качестве ресурса курса
* Для предоставления файла проекта определённых программ (например, .psd для Photoshop), чтобы студенты могли его отредактировать и представить для оценки';
$string['modulenameplural'] = 'Файлы';
$string['neverseen'] = 'Не смотрел(а)';
$string['notmigrated'] = 'К сожалению, этот устаревший тип ресурса ({$a}) ещё не может быть мигрирован.';
$string['optionsheader'] = 'Настройки';
$string['page-mod-resource-x'] = 'Любая страница модуля "Файл"';
$string['pluginadministration'] = 'Управление файлом';
$string['pluginname'] = 'Файл';
$string['popupheight'] = 'Высота всплывающего окна (в пикселях)';
$string['popupheightexplain'] = 'Указывает высоту всплывающего окна по умолчанию.';
$string['popupresource'] = 'Этот ресурс должен появиться во всплывающем (popup) окне.';
$string['popupresourcelink'] = 'Если это не произошло, щелкните здесь: {$a}';
$string['popupwidth'] = 'Ширина всплывающего окна (в пикселях)';
$string['popupwidthexplain'] = 'Указывает ширину всплывающего окна по умолчанию.';
$string['printheading'] = 'Выводить название ресурса';
$string['printheadingexplain'] = 'Выводить ли название ресурса над содержимым? При некоторых вариантах отображения имя ресурса не может быть выведено, даже если параметр включен.';
$string['printintro'] = 'Выводить описание ресурса';
$string['printintroexplain'] = 'Выводить ли описание ресурса под содержимым? При некоторых вариантах отображения, описание ресурса не может быть выведено, даже если параметр включен.';
$string['resource:addinstance'] = 'Добавлять новые ресурсы';
$string['resourcecontent'] = 'Файлы и вложенные папки';
$string['resourcedetails_sizetype'] = '{$a->type}, {$a->size}';
$string['resource:exportresource'] = 'Экспортировать ресурс';
$string['resource:view'] = 'Просмотреть ресурс';
$string['selectmainfile'] = 'Выберите основной файл, нажав на иконку рядом с именем файла.';
$string['showsize'] = 'Выводить размер';
$string['showsize_desc'] = 'Отображать размер файла на странице курса?';
$string['showsize_help'] = 'Выводить ли размер файла (например, "3.1МБайт") рядом со ссылкой на файл?

Если ресурс содержит несколько файлов, то будет отображаться общий объём всех файлов.';
$string['showtype'] = 'Выводить тип';
$string['showtype_desc'] = 'Отображать тип файла (например, "документ Word") на странице курса?';
$string['showtype_help'] = 'Выводить ли тип файла (например, "документ Word") рядом со ссылкой на файл?

Если ресурс содержит несколько файлов, то будет отображаться тип первого файла.

Неизвестные системе типы файлов отображаются не будут.';
