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
 * Strings for component 'tool_langimport', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = 'Установить выбранный языковый пакет';
$string['installedlangs'] = 'Установленные языковые пакеты';
$string['langimport'] = 'Процедура импорта языка';
$string['langimportdisabled'] = 'Функция импорта языка была отключена. Вы должны вручную обновить языковые пакеты на уровне файловой системы. Не забудьте после этого очистить строки кэша.';
$string['langpackinstalled'] = 'Языковой пакет «{$a}» успешно установлен';
$string['langpackremoved'] = 'Языковый пакет был удален';
$string['langpackupdateskipped'] = 'Обновление языкового пакета «{$a}» пропущено';
$string['langpackuptodate'] = 'Уже установлена последняя версия языкового пакета «{$a}»';
$string['langupdatecomplete'] = 'Завершено обновление языкового пакета';
$string['missingcfglangotherroot'] = 'Отсутствующее значение конфигурации $CFG->langotherroot';
$string['missinglangparent'] = 'Отсутствует родительский язык <em>{$a->parent}</em> для языка <em>{$a->lang}</em>.';
$string['nolangupdateneeded'] = 'Все Ваши языковые пакеты актуальны, обновление не требуется';
$string['pluginname'] = 'Языковые пакеты';
$string['purgestringcaches'] = 'Очистка строк кэша';
$string['remotelangnotavailable'] = 'Moodle не может подключиться к download.moodle.org, автоматическая установка языкового пакета невозможна. Загрузите соответствующий архивный файл с http://download.moodle.org, скопируйте его в каталог {$a} и распакуйте вручную.';
$string['uninstall'] = 'Удалить выбранный языковый пакет';
$string['uninstallconfirm'] = 'Вы уверены, что хотите полностью удалить языковой пакет «{$a}»?';
$string['updatelangs'] = 'Обновить все установленные языковые пакеты';
