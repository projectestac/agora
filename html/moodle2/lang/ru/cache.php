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
 * Strings for component 'cache', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Действия';
$string['addinstance'] = 'Добавить экземпляр';
$string['addstore'] = 'Добавить хранилище {$a}';
$string['addstoresuccess'] = 'Успешно добавлено новое хранилище {$a}.';
$string['area'] = 'Зона';
$string['cacheadmin'] = 'Управление кэшем';
$string['cacheconfig'] = 'Настройка';
$string['cachedef_databasemeta'] = 'Мета-информация базы данных';
$string['cachedef_eventinvalidation'] = 'Аннулирование события';
$string['cachedef_locking'] = 'Сопоставление';
$string['cachedef_questiondata'] = 'Описания вопросов';
$string['cachedef_string'] = 'Кэш строк языка';
$string['cachelock_file_default'] = 'Файл сопоставления по умолчанию';
$string['cachestores'] = 'Хранилища кэша';
$string['caching'] = 'Кэширование';
$string['component'] = 'Компонент';
$string['confirmstoredeletion'] = 'Подтверждение удаления хранилища';
$string['default_application'] = 'Хранилище приложения по умолчанию';
$string['defaultmappings'] = 'Хранилища, используемые при отсутствии назначенных.';
$string['defaultmappings_help'] = 'Хранилища по умолчанию, которые используются при отсутствии назначенных пользователем хранилищ.';
$string['default_request'] = 'Хранилище запросов по умолчанию';
$string['default_session'] = 'Хранилище сессий по умолчанию';
$string['defaultstoreactions'] = 'Нельзя изменять хранилища, назначенные по умолчанию';
$string['definition'] = 'Определение';
$string['definitionsummaries'] = 'Имеющиеся определения кэша';
$string['delete'] = 'Удалить';
$string['deletestore'] = 'Удалить хранилище';
$string['deletestoreconfirmation'] = 'Уверены, что хотите удалить хранилище "{$a}"?';
$string['deletestorehasmappings'] = 'Это хранилище невозможно удалить, так как оно содержит данные. Сначала необходимо удалить данные из этого хранилища.';
$string['deletestoresuccess'] = 'Хранилище успешно удалено';
$string['editdefinitionmappings'] = 'Определения назначений хранилища - {$a}';
$string['editmappings'] = 'Изменить назначения';
$string['editstore'] = 'Изменить хранилище';
$string['editstoresuccess'] = 'Изменения хранилища кэша успешно сохранены';
$string['ex_configcannotsave'] = 'Не удалось сохранить настройки кэша в файл';
$string['ex_nodefaultlock'] = 'Не удалось найти экземпляр сопоставления по умолчанию';
$string['ex_unabletolock'] = 'Не удалось получить сопоставление для кэширования.';
$string['ex_unmetstorerequirements'] = 'В настоящее время это хранилище использовать невозможно. Обратитесь к документации для выяснения требований, которые нужно определить.';
$string['gethit'] = 'Получение - Удачно';
$string['getmiss'] = 'Получание - Неудачно';
$string['invalidplugin'] = 'Некорректный плагин';
$string['invalidstore'] = 'Задано некорректное хранилище';
$string['lockdefault'] = 'По умолчанию';
$string['lockmethod'] = 'Способ сопоставления';
$string['lockmethod_help'] = 'Способ, применяемый для сопоставления при использовании данного хранилища';
$string['lockname'] = 'Название';
$string['locksummary'] = 'Сводка о сопоставлениях кэша.';
$string['lockuses'] = 'Используется';
$string['mappingdefault'] = '(по умолч.)';
$string['mappingfinal'] = 'Конечное хранилище';
$string['mappingprimary'] = 'Первичное хранилище';
$string['mappings'] = 'Назначения хранилища';
$string['mode'] = 'Режим';
$string['mode_1'] = 'Приложение';
$string['mode_2'] = 'Сессия';
$string['mode_4'] = 'Запрос';
$string['modes'] = 'Режимы';
$string['nativelocking'] = 'Плагин использует собственные сопоставления.';
$string['none'] = 'Нет';
$string['plugin'] = 'Плагин';
$string['pluginsummaries'] = 'Установленные хранилища кэша';
$string['purge'] = 'Очистка';
$string['purgestoresuccess'] = 'Кэш запросов очищен.';
$string['requestcount'] = 'Протестировать с {$a} запросом(ами)';
$string['rescandefinitions'] = 'Перечитать определения';
$string['result'] = 'Результат';
$string['set'] = 'Установка';
$string['storeconfiguration'] = 'Настройка хранилища';
$string['store_default_application'] = 'Файл хранилища по умолчанию для кэша приложения';
$string['store_default_request'] = 'Статическое хранилище по умолчанию для кэша запросов';
$string['store_default_session'] = 'Сессионное хранилище по умолчанию для кэша сессий';
$string['storename'] = 'Название хранилища';
$string['storenamealreadyused'] = 'Необходимо задать уникальное название хранилища';
$string['storename_help'] = 'Задание названия хранилища. Оно используется для идентификации хранилища внутри системы и может состоять только из символов a-z A-Z 0-9 -_ и пробелов. Оно должно быть уникальным. При попытке задать название, уже использующееся в системе, будет выдана ошибка.';
$string['storenameinvalid'] = 'Некорректное название хранилища. Используйте только знаки a-z A-Z 0-9 -_ и пробелы.';
$string['storeperformance'] = 'Проверка производительности показала возможность выполнения {$a} запроса(ов) за операцию.';
$string['storeready'] = 'Готово';
$string['storeresults_application'] = 'Хранит запросы при использовании в качестве кэша приложения';
$string['storeresults_request'] = 'Хранит запросы при использовании в качестве кэша запросов';
$string['storeresults_session'] = 'Хранит запросы при использовании в качестве кэша сессий';
$string['stores'] = 'Хранилища';
$string['storesummaries'] = 'Настроенные хранилища';
$string['supports'] = 'Поддерживается';
$string['supports_dataguarantee'] = 'гарантия сохранности данных';
$string['supports_keyawareness'] = 'знание ключа';
$string['supports_multipleidentifiers'] = 'операции с несколькими идентификаторами одновременно';
$string['supports_nativelocking'] = 'сопоставление';
$string['supports_nativettl'] = 'время жизни';
$string['supports_searchable'] = 'поиск по ключу';
$string['tested'] = 'Проверено';
$string['testperformance'] = 'Проверить производительность';
$string['unsupportedmode'] = 'Режим не поддерживается';
$string['untestable'] = 'Не тестируемый';
