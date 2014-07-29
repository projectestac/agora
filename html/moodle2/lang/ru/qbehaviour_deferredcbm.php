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
 * Strings for component 'qbehaviour_deferredcbm', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Точность';
$string['accuracyandbonus'] = 'Точность + Бонус';
$string['assumingcertainty'] = 'Вы не выбрали уверенность. Предположительно: {$a}.';
$string['averagecbmmark'] = 'Средний балл с учетом уверенности';
$string['basemark'] = 'Базовый балл {$a}';
$string['breakdownbycertainty'] = 'Разбивка по уверенности';
$string['cbmbonus'] = 'Бонус за уверенность';
$string['cbmgradeexplanation'] = 'Для оценивания  с учетом уверенности выше показана оценка относительно максимума для всех правильных с уверенностью C=1.';
$string['cbmgrades'] = 'Оценки за уверенность';
$string['cbmgrades_help'] = 'При оценивании с учетом уверенности за каждый правильный ответ с С=1 (низкая уверенность) дается оценка 100%. За каждый правильный ответ с С=3 (большая уверенность) дается оценка 300%. Неверные ответы (с уверенностью) дают более низкую оценку, чем неверные ответы с сомнением. Могут быть даже отрицательные итоговые оценки.
**Точность** - это % "правильности" без учета уверенности, но с учетом веса для максимального балла каждого вопроса. Правильное различие более или менее надежных ответов дает более высокую оценку, чем выбор той же самой уверенности для каждого вопроса. Это учитывается **Бонусом за уверенность**. **Точность** + **Бонус за уверенность** является более правильным показателем знаний, чем только **Точность**. Заблуждения могут привести к отрицательным бонусам. Предупреждение - учитывайте, что Вам знакомо и что не известно.';
$string['cbmmark'] = 'Оценка с учетом уверенности - {$a}';
$string['certainty'] = 'Уверенность';
$string['certainty1'] = 'С=1 (Не уверен: <67%)';
$string['certainty-1'] = 'Не знаю';
$string['certainty2'] = 'C=2 (Промежуточный: >67%)';
$string['certainty3'] = 'C=3 (Совершенно уверен: >80%)';
$string['certainty_help'] = 'Для оценивания с учетом уверенности необходимо указать, насколько Вы уверены в правильности ответа.
Доступные уровни:

Уровень уверенности | C=1
(Не уверен) | C=2 (Промежуточный) | C=3 (Совершенно уверен)
------------------- | ------------ | --------- | ----------------
Балл, если верно | 1 | 2 | 3
Балл, если неверно | 0 | -2 | -6
Вероятность верного | <67% | 67-80% | >80%

Лучшие баллы можно получить и выражая неуверенность. Например, если Вы считаете, что есть более 1 шанса из 3 ошибиться, то должны ввести С = 1 и избежать риска отрицательного балла.';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = 'Не знаю';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = 'Не знаю';
$string['foransweredquestions'] = 'Результаты для ответов на вопросы - {$a}';
$string['forentirequiz'] = 'Результаты для всего теста (вопросов - {$a})';
$string['howcertainareyou'] = 'Уверенность {$a->help}: {$a->choices}';
$string['judgementok'] = 'OK';
$string['judgementsummary'] = 'Ответы: {$a->responses}. Точность: {$a->fraction}. (Оптимальный диапазон от {$a->idealrangelow} до {$a->idealrangehigh}). Вы были {$a->judgement}, выбрав этот уровень уверенности.';
$string['noquestions'] = 'Нет ответов';
$string['overconfident'] = 'совершенно уверен(а)';
$string['pluginname'] = 'Отложенный отзыв с учетом уверенности в ответе';
$string['slightlyoverconfident'] = 'уверен(а)';
$string['slightlyunderconfident'] = 'немного не уверен(а)';
$string['underconfident'] = 'не уверен(а)';
