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
 * Strings for component 'qtype_multianswer', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_multianswer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmquestionsaveasedited'] = 'Я подтверждаю, что хочу сохранить вопрос в том виде, в каком он отредактирован';
$string['confirmsave'] = 'Подтверждение перед сохранением {$a}';
$string['correctanswer'] = 'Правильный ответ';
$string['correctanswerandfeedback'] = 'Правильный ответ и отзыв';
$string['decodeverifyquestiontext'] = 'Декодировать и проверить текст вопроса';
$string['layout'] = 'Расположение';
$string['layouthorizontal'] = 'Горизонтальный ряд переключателей';
$string['layoutselectinline'] = 'Выпадающий список в строке текста';
$string['layoutundefined'] = 'Неопределенное положение';
$string['layoutvertical'] = 'Вертикальная колонка переключателей';
$string['nooptionsforsubquestion'] = 'Невозможно получить варианты для части вопроса # {$a->sub} (question->id={$a->id})';
$string['noquestions'] = 'Вопрос «Вложенные ответы» (Cloze) «<strong>{$a}</strong>» не содержит ни одного вопроса';
$string['pluginname'] = 'Вложенные ответы (Cloze)';
$string['pluginnameadding'] = 'Добавление вопроса «Вложенные ответы» (Cloze)';
$string['pluginnameediting'] = 'Редактирование вопроса «Вложенные ответы» (Cloze)';
$string['pluginname_help'] = 'Вопросы «Вложенные ответы» (Cloze) представляют собой текст с вложенными в него вопросами, такими, как «Множественный выбор», «Числовой ответ» и «Короткий ответ».';
$string['pluginnamesummary'] = 'Вопросы такого типа являются очень гибкими, но могут быть созданы только путем ввода текста со специальными кодами, которые создают встроенные вопросы «Множественный выбор», «Числовой ответ» и «Короткий ответ».';
$string['qtypenotrecognized'] = 'Тип вопроса {$a} не опознан';
$string['questiondefinition'] = 'Описание вопроса';
$string['questiondeleted'] = 'Вопрос удален';
$string['questioninquiz'] = '<ul> <li>добавлять или удалять вопросы, </li> <li>изменять порядок вопросов в тексте,</li><li>изменять типы этих вопросов («Множественный выбор», «Короткий ответ» и «Числовой ответ»). </li></ul>';
$string['questionnotfound'] = 'Невозможно найти часть вопроса #{$a}';
$string['questionsadded'] = 'Вопрос добавлен';
$string['questionsaveasedited'] = 'Вопрос будет сохранен в том виде, в каком будет отредактирован';
$string['questionsmissing'] = 'Текст вопроса должен содержать, по меньшей мере, один встроенный ответ.';
$string['questiontypechanged'] = 'Тип вопроса изменен';
$string['questiontypechangedcomment'] = 'По крайней мере один тип вопроса был изменен. <br> Вы добавили, удалили или переместили вопрос? <br> Смотрите в будущее.';
$string['questionusedinquiz'] = 'Этот вопрос используется в тесте(ах): {$a->nb_of_quiz}), всего попыток: {$a->nb_of_attempts}';
$string['unknownquestiontypeofsubquestion'] = 'Неизвестный тип вопроса: {$a->type} части вопроса # {$a->sub}';
$string['warningquestionmodified'] = '<b>ПРЕДУПРЕЖДЕНИЕ</b>';
$string['youshouldnot'] = '<b> ВЫ НЕ ДОЛЖНЫ </b>';
