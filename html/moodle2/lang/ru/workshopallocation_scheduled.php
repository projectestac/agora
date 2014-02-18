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
 * Strings for component 'workshopallocation_scheduled', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Текущее состояние';
$string['currentstatusexecution'] = 'Состояние';
$string['currentstatusexecution1'] = 'Выполнено {$a->datetime}';
$string['currentstatusexecution2'] = 'Будет выполнено вновь  {$a->datetime}';
$string['currentstatusexecution3'] = 'Будет выполнено {$a->datetime}';
$string['currentstatusexecution4'] = 'Ожидает выполнения';
$string['currentstatusnext'] = 'Следующее выполнение';
$string['currentstatusnext_help'] = 'В некоторых случаях плановое распределение будет снова выполнено автоматически, даже если оно уже было выполнено ранее. Например, это может произойти, если был продлен срок подачи работ.';
$string['currentstatusreset'] = 'Сброс';
$string['currentstatusreset_help'] = 'Сохранение формы с установленным флажком приведет также к обнулению текущего состояния. Вся информация о предыдущем выполнении будет удалена, так что распределение может быть выполнено повторно (если задано выше).';
$string['currentstatusresetinfo'] = 'Для сброса результатов выполнения установите флажок и сохраните форму.';
$string['currentstatusresult'] = 'Новый результат выполнения';
$string['enablescheduled'] = 'Включить плановое распределение';
$string['enablescheduledinfo'] = 'Автоматически распределять работы в конце фазы представления';
$string['pluginname'] = 'Плановое распределение';
$string['randomallocationsettings'] = 'Параметры распределения';
$string['randomallocationsettings_help'] = 'Здесь задаются параметры метода случайного распределения, использующегося для фактического распределения представленных работ.';
$string['resultdisabled'] = 'Плановое распределение отключено';
$string['resultenabled'] = 'Плановое распределение включено';
$string['resultexecuted'] = 'Успешно распределено';
$string['resultfailed'] = 'Невозможно автоматически распределить работы';
$string['resultfailedconfig'] = 'Плановое распределение не настроено';
$string['resultfaileddeadline'] = 'Семинар не имеет установленного срока представления работ.';
$string['resultfailedphase'] = 'Семинар не в фазе представления.';
$string['resultvoid'] = 'Работы не были распределены.';
$string['resultvoiddeadline'] = 'Срок представления работ еще не истек.';
$string['resultvoidexecuted'] = 'Распределение уже было выполнено';
$string['scheduledallocationsettings'] = 'Параметры планового распределения';
$string['scheduledallocationsettings_help'] = 'При включенном параметре метод планового распределения будет автоматически распределять представленные работы для оценивания в конце фазы представления. Конец фазы может быть задан параметром семинара «Окончание срока представления».

Метод случайного распределения выполняется с параметрами, предварительно заданными в этой форме. Это значит, что плановое распределение работает, как если бы преподаватель выполнил случайное распределение себе в конце фазы представления, используя расположенные ниже настройки распределения.

Обратите внимание, что плановое распределение *НЕ* выполняется, если Вы вручную переключите семинар в фазу оценивания до окончания срока фазы представления. В этом случае Вы должны назначить представленные работы себе. Метод планового распределения особенно полезен при совместном использовании с функцией автоматического переключения фазы.';
$string['setup'] = 'Задать плановое распределение';
