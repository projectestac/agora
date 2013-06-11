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
 * Strings for component 'dbtransfer', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Проверка структуры исходной таблицы';
$string['copyingtable'] = 'Копирование таблицы {$a}';
$string['copyingtables'] = 'Копирование содержимого таблицы';
$string['creatingtargettables'] = 'Создание таблицы в базе данных-получателе';
$string['dbexport'] = 'Экспорт базы данных';
$string['dbtransfer'] = 'Передача базы данных';
$string['differenttableexception'] = 'Несоответствие структуры таблицы "{$a}".';
$string['done'] = 'Выполнено';
$string['exportschemaexception'] = 'Текущая структура базы данных соответствует не всем файлам install.xml.<br /> {$a}';
$string['importschemaexception'] = 'Текущая структура базы данных соответствует не всем файлам install.xml<br />{$a}';
$string['importversionmismatchexception'] = 'Текущая версия {$a->currentver} не соответствует экспортируемой версии {$a->schemaver}.';
$string['malformedxmlexception'] = 'Некорректный XML, продолжение невозможно.';
$string['unknowntableexception'] = 'В файле экспорта обнаружена неизвестная таблица "{$a}"';
