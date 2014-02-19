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
 * Strings for component 'tool_advancedspamcleaner', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_advancedspamcleaner
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['hitlimit_help'] = 'Остановиться после этого количества обнаруженного спама обнаружены (0 = не ограничено)';
$string['methodused'] = 'Используемый метод обнаружения спама: {$a}';
$string['pluginname'] = 'Усовершенствованный очиститель спама';
$string['pluginsettings'] = 'Настройки плагинов усовершенствованного очистителя спама для {$a}';
$string['searchscope'] = 'Поиск охвата спама';
$string['settingpage'] = 'Настройки усовершенствованного очистителя спама';
$string['showstats'] = 'Следующее количество записей были проверены на наличие спама: <br/> Блоги: {$a->blogs}, Профили пользователей: {$a->users}, Комментарии: {$a->comments}, Сообщения: {$a->msgs}, Сообщения форума: {$a->forums}. <br/> Времени затрачено примерно {$a->time} сек.';
$string['spamauto'] = 'Автоматическое определение спама с использованием общих ключевых слов спама';
$string['spamcleanerintro'] = 'Этот скрипт позволяет вам проверять все профили пользователей, их комментарии, записи блога, сообщения на форуме и сообщения на наличие определенных строк, а затем удалить эти учетные записи, явно созданные спамерами.

Можно искать по нескольким ключевым словам, разделенным запятыми (например, казино, порно) или использовать сторонние системы для сканирования Вашего сайта (например, Akismet).

Обратите внимание, это может занять некоторое время, зависящее от метода поиска. Уменьшайте объем поиска.';
$string['spamcount'] = 'Количество спама';
$string['spamdeleteconfirm'] = 'Вы уверены, что хотите удалить эту запись? Вы не сможете отменить удаление.';
$string['spamresult'] = 'Учтите, удаление пользователя не удаляет записанный спам. <br /> Результаты поиска профилей пользователей, содержащих:';
$string['spamsearch'] = 'Поиск спама';
$string['spamtext'] = 'Текст спама';
$string['spamtype'] = 'Тип спама';
$string['usedatestartlimit_help'] = 'Включите, чтобы проводить поиск спама только в выбранном диапазоне дат';
