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
 * Strings for component 'assignfeedback_offline', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Подтвердить импорт оценок';
$string['default'] = 'Включено по умолчанию';
$string['default_help'] = 'При включенном параметре способ отзыва будет включен по умолчанию для всех новых заданий.';
$string['downloadgrades'] = 'Скачать ведомость с оценками';
$string['enabled'] = 'Ведомость с оценками';
$string['enabled_help'] = 'Если включен, учитель получит возможность скачать и загрузить ведомость с оценками студентов в процессе оценивания задания.';
$string['feedbackupdate'] = 'Установить в поле «{$a->field}» для студента «{$a->student}» значение «{$a->text}»';
$string['gradelockedingradebook'] = 'Оценка для {$a} была заблокирована в журнале оценок';
$string['graderecentlymodified'] = 'Оценка для {$a} в Moodle была изменена позже, чем в ведомости';
$string['gradesfile'] = 'Ведомость с оценками (формат CSV)';
$string['gradesfile_help'] = 'Ведомость с измененными оценками. Этот файл в формате CSV, который был скачан с этим заданием должен содержать столбцы для оценок студента и идентификатора. Кодировка файла должна быть «UTF-8».';
$string['gradeupdate'] = 'Установить студенту {$a->student} оценку {$a->grade}';
$string['ignoremodified'] = 'Разрешить обновление записей, которые были изменены в Moodle раньше, чем в ведомости.';
$string['ignoremodified_help'] = 'При скачивании из Moodle ведомости оценок, она содержит дату последнего изменения каждой из оценок. Если любая из оценок обновляются в Moodle и после этого ведомость скачивается и изменяется, то по умолчанию Moodle откажется переписывать эту обновленную информацию при импорте оценок. При выборе этой опции в Moodle будет отключена такая проверка сохранности, и это может дать возможность нескольким оценщикам перезаписывать оценки друг друга.';
$string['importgrades'] = 'Принять изменения из ведомости оценок';
$string['invalidgradeimport'] = 'Moodle не смогла прочитать загруженную ведомость оценок. Убедитесь, что она сохранена в формате . CSV со значениями, разделенными запятыми и повторите попытку.';
$string['nochanges'] = 'Нет измененных оценок в загруженной ведомости';
$string['offlinegradingworksheet'] = 'Оценки';
$string['pluginname'] = 'Ведомость с оценками';
$string['processgrades'] = 'Импорт оценок';
$string['skiprecord'] = 'Пропустить запись';
$string['updatedgrades'] = 'Обновленные оценки и отзывы - {$a}';
$string['updaterecord'] = 'Обновить запись';
$string['uploadgrades'] = 'Загрузить ведомость с оценками';
