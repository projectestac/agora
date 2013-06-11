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
 * Strings for component 'tool_assignmentupgrade', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Вы уверены?';
$string['areyousuremessage'] = 'Вы уверены, что хотите обновить задание "{$a->name}"?';
$string['assignmentid'] = 'ID задания';
$string['assignmentnotfound'] = 'Задание не найдено (id={$a})';
$string['assignmentsperpage'] = 'Заданий на странице';
$string['assignmenttype'] = 'Тип задания';
$string['backtoindex'] = 'Вернуться к списку';
$string['batchoperations'] = 'Пакетные операции';
$string['batchupgrade'] = 'Обновление нескольких заданий';
$string['confirmbatchupgrade'] = 'Подтверждение обновления заданий';
$string['conversioncomplete'] = 'Задание преобразуется';
$string['conversionfailed'] = 'Обновление задания не удалось. См. журнал обновления: <br />{$a}';
$string['listnotupgraded'] = 'Список заданий, которые не были обновлены';
$string['listnotupgraded_desc'] = 'здесь Вы можете обновить отдельные задания';
$string['noassignmentstoupgrade'] = 'Нет заданий, требующих обновления';
$string['notupgradedintro'] = 'На этой странице перечислены задания, созданные в более старой версии Moodle. Они не были обновлены до нового модуля "Задание" в Moodle 2.3. Если задания были созданы с помощью пользовательского подтипа, то не все они могут быть обновлены. Подтип должен быть обновлен до новой версии "Задание" для завершения обновления.';
$string['notupgradedtitle'] = 'Не обновленные задания.';
$string['pluginname'] = 'Помощник обновления заданий';
$string['select'] = 'Выбрать';
$string['submissions'] = 'Ответов';
$string['supported'] = 'Обновить';
$string['unknown'] = 'Неизвестно';
$string['updatetable'] = 'Таблица обновлений';
$string['upgradable'] = 'Обновления';
$string['upgradeall'] = 'Обновить все задания';
$string['upgradeallconfirm'] = 'Обновить все задания?';
$string['upgradeassignmentfailed'] = 'Результат: обновление не удалось. См. журнал обновления:
<br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Результат: успешное обновление';
$string['upgradeassignmentsummary'] = 'Обновлено задание: {$a->name} (Курс: {$a->shortname})';
$string['upgradeprogress'] = 'Обновлено заданий: {$a->current} из {$a->total}';
$string['upgradeselected'] = 'Обновить выбранные задания';
$string['upgradeselectedcount'] = 'Обновить выбранные задания - {$a}?';
$string['upgradesingle'] = 'Обновление одного задания';
$string['viewcourse'] = 'Просмотр курса с обновленными заданиями';
