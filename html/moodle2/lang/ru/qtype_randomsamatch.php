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
 * Strings for component 'qtype_randomsamatch', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_randomsamatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['nosaincategory'] = 'В выбранной категории «{$a->catname}» нет вопросов типа «Короткий ответ». Выберите другую категорию или создайте несколько вопросов в этой категории.';
$string['notenoughsaincategory'] = 'В выбранной категории «{$a->catname}» есть только {$a->nosaquestions} вопроса(ов) типа «Короткий ответ». Выберите другую категорию, создайте еще несколько вопросов в этой категории или сократите количество выбранных вопросов.';
$string['pluginname'] = 'Случайный вопрос на соответствие';
$string['pluginnameadding'] = 'Добавление вопроса «Случайный вопрос на соответствие»';
$string['pluginnameediting'] = 'Редактирование вопроса «Случайный вопрос на соответствие»';
$string['pluginname_help'] = 'Для студента такой вопрос выглядит так же, как вопрос «На соответствие». Различие в том, что перечень вопросов для соответствия выбирается случайным образом из вопросов типа «Короткий ответ» в данной категории. В категории должно быть достаточное количество неиспользованных вопросов типа «Короткий ответ», иначе будет отображаться сообщение об ошибке.';
$string['pluginnamesummary'] = 'Подобен вопросу «На соответствие», но создается из вопросов типа «Короткий ответ», выбираемых случайным образом из конкретной категории.';
