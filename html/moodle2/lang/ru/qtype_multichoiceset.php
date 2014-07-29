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
 * Strings for component 'qtype_multichoiceset', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_multichoiceset
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['correctanswer'] = 'Правильно';
$string['distractor'] = 'Неправильно';
$string['errnocorrect'] = 'Не менее одного из вариантов ответов должно быть «Верным», чтобы можно было оценить этот вопрос.';
$string['included'] = 'Правильно';
$string['pluginname'] = 'Всё или ничего';
$string['pluginnameadding'] = 'Добавление вопроса «Всё или ничего»';
$string['pluginnameediting'] = 'Редактирование вопроса «Всё или ничего»';
$string['pluginname_help'] = 'После необязательного вступления отвечающий может выбрать один или несколько ответов. Если выбранные ответы в точности соответствуют «правильным» вариантам, определенным для вопроса, то тестируемый получает оценку 100%. Если он выбирает любые «неправильные» варианты или не выбирает все «правильные» варианты, то оценка составляет 0%. Для каждого вопроса по крайней мере один вариант должен быть отмечен правильным. Добавьте вариант «Ни один из перечисленных» для обработки вопроса, где ни один из остальных вариантов не является верным. В отличие от вопроса «Множественного выбора» с возможными дробными оценками для вопроса «Всё или ничего» возможны только оценки либо 100%, либо 0%.';
$string['pluginnamesummary'] = 'Позволяет выбрать несколько ответов из заранее определенного списка. При этом используется оценивание «Всё или ничего» (100% или 0%).';
$string['showeachanswerfeedback'] = 'Показать отзыв для выбранных ответов.';
