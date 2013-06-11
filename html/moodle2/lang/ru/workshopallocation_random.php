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
 * Strings for component 'workshopallocation_random', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Добавить самооценивание';
$string['allocationaddeddetail'] = 'Должно быть сделано новое оценивание: <strong>{$a->reviewername}</strong> - это рецензент для автора <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'Не удалось удалить уже оцененные оценки: рецензент <strong>{$a->reviewername}</strong>, автор работы: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Повторное использование оценивания: <strong>{$a->reviewername}</strong> оставлен(а) рецензентом для автора <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Параметры распределения';
$string['assessmentdeleteddetail'] = 'Оценивание удалено: <strong>{$a->reviewername}</strong> более не является рецензентом для автора <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Участники могут оценивать, не имея представленных работ';
$string['confignumofreviews'] = 'Количество работ по умолчанию, которые будут распределены случайным образом.';
$string['excludesamegroup'] = 'Запретить оценивание работ сокурсниками из той же группы.';
$string['noallocationtoadd'] = 'Распределять нечего.';
$string['nogroupusers'] = '<p> Предупреждение: Если в семинаре используется режим "доступные группы" или режим "отдельные группы", то пользователи ДОЛЖНЫ быть участниками хотя бы одной группы, чтобы одногруппники могли оценить их работы. Пользователи, не входящие в группы, могут делать новые самооценки или удалять существующие оценки.<p> Эти пользователи в настоящее время не являются членами группы: {$a}</p>';
$string['numofdeallocatedassessment'] = 'Удалено оцениваний - {$a}';
$string['numofrandomlyallocatedsubmissions'] = 'Случайно распределённых работ - {$a}';
$string['numofreviews'] = 'Количество рецензий';
$string['numofselfallocatedsubmissions'] = 'Самооцениваемых работ - {$a}';
$string['numperauthor'] = 'по авторам';
$string['numperreviewer'] = 'по рецензентам';
$string['pluginname'] = 'Случайное распределение';
$string['randomallocationdone'] = 'Случайное распределение сделано';
$string['removecurrentallocations'] = 'Удалить текущие распределения';
$string['resultnomorepeers'] = 'Более нет доступных рецензентов';
$string['resultnomorepeersingroup'] = 'Более нет доступных рецензентов в этой отдельной группе';
$string['resultnotenoughpeers'] = 'Недостаточно доступных рецензентов';
$string['resultnumperauthor'] = 'Распределение рецензий ({$a}) по авторам';
$string['resultnumperreviewer'] = 'Распределение рецензий ({$a}) по рецензентам';
$string['stats'] = 'Статистика текущего распределения';
