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
 * Strings for component 'plugin', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Действия';
$string['availability'] = 'Доступность';
$string['checkforupdates'] = 'Проверить наличие обновлений';
$string['checkforupdateslast'] = 'Последняя проверка обновлений: {$a}';
$string['detectedmisplacedplugin'] = 'Плагин «{$a->component}» расположен неверно - «{$a->current}»; ожидаемое расположение - «{$a->expected}»';
$string['displayname'] = 'Название плагина';
$string['err_response_curl'] = 'Невозможно получить имеющиеся обновления данных - непредвиденная ошибка cURL.';
$string['err_response_format_version'] = 'Непредвиденная версия формата ответа. Попробуйте еще раз проверить наличие обновлений.';
$string['err_response_http_code'] = 'Невозможно получить информацию о доступных обновлениях - непредвиденный код ответа HTTP.';
$string['filterall'] = 'Показать все';
$string['filtercontribonly'] = 'Показать только дополнения';
$string['filtercontribonlyactive'] = 'Показаны только дополнения';
$string['filterupdatesonly'] = 'Показать только обновления';
$string['filterupdatesonlyactive'] = 'Показаны только обновления';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'Сейчас нет плагинов, требующих Вашего внимания';
$string['nonehighlightedinfo'] = 'Отобразить список всех установленных плагинов';
$string['noneinstalled'] = 'Плагинов этого типа не установлено';
$string['notdownloadable'] = 'Не удается загрузить пакет';
$string['notdownloadable_help'] = 'ZIP-пакет с обновлением не может быть загружен автоматически. Обратитесь к странице документации для получения дополнительной помощи.';
$string['notes'] = 'Заметки';
$string['notwritable'] = 'Файлы плагинов не перезаписываются';
$string['notwritable_help'] = 'У Вас включено автоматическое применение обновлений и есть доступное обновление для этого плагина. Однако, веб-сервер не может перезаписать файлы плагина и обновление не может быть установлено автоматически.

Вам нужно сделать папку с плагином и все ее содержимое доступным для записи, чтобы иметь возможность автоматически установить имеющиеся обновления.';
$string['numdisabled'] = 'Отключенные: {$a}';
$string['numextension'] = 'Дополнения: {$a}';
$string['numtotal'] = 'Установлено: {$a}';
$string['numupdatable'] = 'Доступные обновления: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'На этой странице отображаются плагины, которые могут потребовать особого внимания в процессе обновления. Выделены новые плагины, которые будут установлены; обновляемые плагины, которые будут обновлены, а также отсутствующие ранее установленные плагины. Дополнения выделены при наличии доступных для них обновлений. Рекомендуется проверить, существуют ли более свежие версии доступных дополнений и обновить их исходный код перед продолжением обновления Moodle.';
$string['plugindisable'] = 'Отключить';
$string['plugindisabled'] = 'Отключено';
$string['pluginenable'] = 'Включить';
$string['pluginenabled'] = 'Включено';
$string['requiredby'] = 'Требуется для: {$a}';
$string['requires'] = 'Необходимо';
$string['rootdir'] = 'Каталог';
$string['settings'] = 'Установки';
$string['showall'] = 'Перезагрузить и показать все плагины';
$string['somehighlighted'] = 'Количество плагинов, требующих Вашего внимания: {$a}';
$string['somehighlightedinfo'] = 'Показать полный список установленных плагинов';
$string['somehighlightedonly'] = 'Показывать только плагины, требующих вмешательства';
$string['source'] = 'Источник';
$string['sourceext'] = 'Дополнение';
$string['sourcestd'] = 'Стандартный';
$string['status'] = 'Статус';
$string['status_delete'] = 'Будет удален';
$string['status_downgrade'] = 'Более новая версия уже установлена!';
$string['status_missing'] = 'Отсутствует на диске!';
$string['status_new'] = 'Будет установлен';
$string['status_nodb'] = 'Нет в базе данных';
$string['status_upgrade'] = 'Будет обновлен';
$string['status_uptodate'] = 'Установлен';
$string['systemname'] = 'Идентификатор';
$string['type_auth'] = 'Метод аутентификации';
$string['type_auth_plural'] = 'Методы аутентификации';
$string['type_block'] = 'Блок';
$string['type_block_plural'] = 'Блоки';
$string['type_cachelock'] = 'Обработчик блокировок кэша';
$string['type_cachelock_plural'] = 'Обработчики блокировок кэша';
$string['type_cachestore'] = 'Хранилище кэша';
$string['type_cachestore_plural'] = 'Хранилища кэша';
$string['type_calendartype'] = 'Тип календаря';
$string['type_calendartype_plural'] = 'Типы календарей';
$string['type_coursereport'] = 'Отчет по курсу';
$string['type_coursereport_plural'] = 'Отчеты по курсам';
$string['type_editor'] = 'Редактор';
$string['type_editor_plural'] = 'Редакторы';
$string['type_enrol'] = 'Метод зачисления';
$string['type_enrol_plural'] = 'Методы зачисления';
$string['type_filter'] = 'Фильтр';
$string['type_filter_plural'] = 'Текстовые фильтры';
$string['type_format'] = 'Формат курса';
$string['type_format_plural'] = 'Форматы курсов';
$string['type_gradeexport'] = 'Метод экспорта оценки';
$string['type_gradeexport_plural'] = 'Методы экспорта оценки';
$string['type_gradeimport'] = 'Метод импорта оценки';
$string['type_gradeimport_plural'] = 'Методы импорта оценки';
$string['type_gradereport'] = 'Отчет журнала оценок';
$string['type_gradereport_plural'] = 'Отчеты журнала оценок';
$string['type_gradingform'] = 'Расширенный способ оценивания';
$string['type_gradingform_plural'] = 'Расширенные способы оценивания';
$string['type_local'] = 'Локальный плагин';
$string['type_local_plural'] = 'Локальные плагины';
$string['type_message'] = 'Вывод сообщений';
$string['type_message_plural'] = 'Вывод сообщений';
$string['type_mnetservice'] = 'Служба MNet';
$string['type_mnetservice_plural'] = 'Службы MNet';
$string['type_mod'] = 'Модуль элемента курса';
$string['type_mod_plural'] = 'Модули элементов курса';
$string['type_plagiarism'] = 'Плагин предотвращение плагиата';
$string['type_plagiarism_plural'] = 'Плагины предотвращение плагиата';
$string['type_portfolio'] = 'Портфолио';
$string['type_portfolio_plural'] = 'Портфолио';
$string['type_profilefield'] = 'Тип поля профиля';
$string['type_profilefield_plural'] = 'Типы полей профиля';
$string['type_qbehaviour'] = 'Поведение вопросов';
$string['type_qbehaviour_plural'] = 'Поведение вопросов';
$string['type_qformat'] = 'Формат импорта/экспорта вопросов';
$string['type_qformat_plural'] = 'Форматы импорта/экспорта вопросов';
$string['type_qtype'] = 'Тип вопроса';
$string['type_qtype_plural'] = 'Типы вопросов';
$string['type_report'] = 'Отчет по сайту';
$string['type_report_plural'] = 'Отчеты по сайту';
$string['type_repository'] = 'Хранилище';
$string['type_repository_plural'] = 'Хранилища';
$string['type_theme'] = 'Тема оформления';
$string['type_theme_plural'] = 'Темы оформления';
$string['type_tool'] = 'Инструмент администрирования';
$string['type_tool_plural'] = 'Инструменты администрирования';
$string['type_webservice'] = 'Протокол веб-службы';
$string['type_webservice_plural'] = 'Протоколы веб-служб';
$string['uninstall'] = 'Удалить';
$string['uninstallconfirm'] = 'Вы собираетесь удалить плагин <em>{$a->name}</em>. Это полностью удалит из базы данных всё, что связано с этим плагином, в том числе его настройки, записи журнала, файлы пользователя, управляемые с помощью плагина и т.д. Назад пути не будет - Moodle самостоятельно не создаст никаких восстановлений из резервной копии. Вы УВЕРЕНЫ, что хотите продолжить?';
$string['uninstalldelete'] = 'Все данные, связанные с плагином <em>{$a->name}</em> были удалены из базы данных. Для предотвращения самоустановки плагина, этот каталог <em>{$a->rootdir}</em>теперь должен быть вручную удален с сервера. Moodle самостоятельно не может удалить каталог из-за отсутствия прав на запись.';
$string['uninstalldeleteconfirm'] = 'Все данные, связанные с плагином <em>{$a->name}</em> были удалены из базы данных. Для предотвращения самоустановки плагина, этот каталог <em>{$a->rootdir}</em>теперь должен быть удален с сервера. Вы хотите сейчас удалить каталог плагина?';
$string['uninstalldeleteconfirmexternal'] = 'Вероятно текущая версия плагина была получена через систему управления исходным кодом ({$a}). При удалении каталога плагина Вы можете потерять важные локальные изменения кода. Перед продолжением убедитесь, что Вы осознанно хотите удалить папку плагинов.';
$string['uninstallextraconfirmblock'] = 'Экземпляров этого блока: {$a->instances}.';
$string['uninstallextraconfirmenrol'] = 'С помощью этого модуля зачислено пользователей: {$a->enrolments}.';
$string['uninstallextraconfirmmod'] = 'Экземпляров этого блока: {$a->instances}. Курсов, где используется этот модуль: {$a->courses}.';
$string['uninstalling'] = 'Удаление плагина {$a->name}';
$string['updateavailable'] = 'Доступна новая версия плагина {$a}!';
$string['updateavailable_moreinfo'] = 'Подробнее...';
$string['updateavailable_release'] = 'Релиз {$a}';
$string['updatepluginconfirm'] = 'Подтверждение обновления плагина';
$string['updatepluginconfirmexternal'] = 'Похоже, что текущая версия плагина была получена через систему управления исходным кодом ({$a}). Если Вы установите это обновление, то больше не будете иметь возможность получать обновления плагина из системы управления исходным кодом. Пожалуйста, перед продолжением убедитесь, что Вы действительно хотите обновить плагин.';
$string['updatepluginconfirminfo'] = 'Вы собираетесь установить новую версию плагина <strong>{$a->name}</strong>. ZIP-пакет с версией {$a->version} этого плагина будет загружен с <a href="{$a->url}">{$a->url}</a> в Вашу Moodle, чтобы он мог обновить систему.';
$string['updatepluginconfirmwarning'] = 'Обратите внимание, что Moodle перед обновлением автоматически не сделает резервную копию базы данных. Вам настоятельно рекомендуется сейчас сделать полную резервную копию, чтобы справиться с редким случаем, когда новый код содержит ошибки, которые сделают Ваш сайт недоступным или даже испортят базу данных. Вы действуете на свой страх и риск.';
$string['version'] = 'Версия';
$string['versiondb'] = 'Текущая версия';
$string['versiondisk'] = 'Новая версия';
