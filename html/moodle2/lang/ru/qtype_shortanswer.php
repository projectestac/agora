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
 * Strings for component 'qtype_shortanswer', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_shortanswer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Добавить {no} варианта(ов) ответа(ов)';
$string['answer'] = 'Ответ: {$a}';
$string['answermustbegiven'] = 'Вы должны ввести для каждого варианта ответа оценку или отзыв.';
$string['answerno'] = 'Вариант ответа {$a}';
$string['caseno'] = 'Нет, регистр не имеет значения';
$string['casesensitive'] = 'Чувствительность к регистру';
$string['caseyes'] = 'Да, регистр учитывается';
$string['correctansweris'] = 'Правильный ответ: {$a}';
$string['correctanswers'] = 'Правильные ответы';
$string['filloutoneanswer'] = 'Вам необходимо указать хотя бы один возможный ответ. Пустые ответы не будут использоваться. Символ «*» можно использовать в качестве шаблона, соответствующего любым символам. Первый подходящий ответ будет использоваться для определения оценки и отзыва.';
$string['notenoughanswers'] = 'Этот тип вопроса требует не менее {$a} ответов.';
$string['pleaseenterananswer'] = 'Пожалуйста, введите ответ.';
$string['pluginname'] = 'Краткий ответ';
$string['pluginnameadding'] = 'Добавление вопроса «Короткий ответ»';
$string['pluginnameediting'] = 'Редактирование вопроса «Короткий ответ».';
$string['pluginname_help'] = 'В качестве ответа на вопрос (который может включать изображение) студент впечатывает одно слово или короткую фразу. Можно указать несколько возможных правильных вариантов ответа, причем каждый с разной оценкой. Если выбран параметр «Учитывать регистр», то студент получит разное количество баллов за ответы типа «Слово» и типа «слово».';
$string['pluginnamesummary'] = 'Позволяет вводить в качестве ответа одно или несколько слов. Ответы оцениваются путем сравнения с разными образцами ответов, в которых могут использоваться подстановочные знаки.';
