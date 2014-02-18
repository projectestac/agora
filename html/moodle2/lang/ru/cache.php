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
$string['area'] = 'Область';
$string['cacheadmin'] = 'Управление кэшированием';
$string['cacheconfig'] = 'Настройка';
$string['cachedef_databasemeta'] = 'Информация о структуре базы данных';
$string['cachedef_eventinvalidation'] = 'Аннулирование событий';
$string['cachedef_htmlpurifier'] = 'Очиститель HTML - очищенное содержимое';
$string['cachedef_locking'] = 'Блокировка';
$string['cachedef_questiondata'] = 'Данные банка вопросов';
$string['cachedef_string'] = 'Строки языкового пакета';
$string['cachelock_file_default'] = 'Блокировка по умолчанию (Блокировка созданием файла)';
$string['cachestores'] = 'Хранилища кэша';
$string['caching'] = 'Кэширование';
$string['component'] = 'Компонент';
$string['confirmstoredeletion'] = 'Подтверждение удаления хранилища';
$string['default_application'] = 'Хранилище уровня приложения по умолчанию';
$string['defaultmappings'] = 'Хранилища, используемые при отсутствии сопоставления.';
$string['defaultmappings_help'] = 'Это список хранилищ, которые будут использоваться, если Вы не настроите сопоставление между описаниями кэша и хранилищами.';
$string['default_request'] = 'Хранилище уровня запроса по умолчанию';
$string['default_session'] = 'Хранилище уровня сессии по умолчанию';
$string['defaultstoreactions'] = 'Нельзя изменять хранилища, используемые по умолчанию';
$string['definition'] = 'Определение';
$string['definitionsummaries'] = 'Известные определения кэша';
$string['delete'] = 'Удалить';
$string['deletestore'] = 'Удалить хранилище';
$string['deletestoreconfirmation'] = 'Уверены, что хотите удалить хранилище «{$a}»?';
$string['deletestorehasmappings'] = 'Это хранилище невозможно удалить, так как оно содержит сопоставления. Сначала необходимо удалить все сопоставления из этого хранилища.';
$string['deletestoresuccess'] = 'Хранилище успешно удалено';
$string['editdefinitionmappings'] = 'Настройка хранилища для кэша «{$a}»';
$string['editmappings'] = 'Изменить сопоставления';
$string['editstore'] = 'Изменить хранилище';
$string['editstoresuccess'] = 'Изменения хранилища кэша успешно сохранены.';
$string['ex_configcannotsave'] = 'Не удалось сохранить настройки кэша в файл.';
$string['ex_nodefaultlock'] = 'Не удалось найти экземпляр блокировки, используемый по умолчанию';
$string['ex_unabletolock'] = 'Не удалось получить блокировку записи для кэширования.';
$string['ex_unmetstorerequirements'] = 'В настоящее время это хранилище использовать невозможно. Обратитесь к документации для выяснения его требований.';
$string['gethit'] = 'Получение - Удачно';
$string['getmiss'] = 'Получание - Неудачно';
$string['invalidplugin'] = 'Некорректный плагин';
$string['invalidstore'] = 'Задано некорректное хранилище';
$string['lockdefault'] = 'По умолчанию';
$string['lockmethod'] = 'Способ блокировки';
$string['lockmethod_help'] = 'Способ, применяемый для блокировки записей при использовании данного хранилища';
$string['lockname'] = 'Название';
$string['locksummary'] = 'Список экземпляров блокировок кэша.';
$string['lockuses'] = 'Используется';
$string['mappingdefault'] = '(по умолч.)';
$string['mappingfinal'] = 'Последнее хранилище';
$string['mappingprimary'] = 'Первое (основное) хранилище';
$string['mappings'] = 'Сопоставления';
$string['mode'] = 'Режим';
$string['mode_1'] = 'Приложение';
$string['mode_2'] = 'Сессия';
$string['mode_4'] = 'Запрос';
$string['modes'] = 'Режимы';
$string['nativelocking'] = 'Плагин использует собственный механизм блокировки.';
$string['none'] = 'Нет';
$string['plugin'] = 'Плагин';
$string['pluginsummaries'] = 'Установленные хранилища кэша';
$string['purge'] = 'Очистить';
$string['purgestoresuccess'] = 'Указанное хранилище кэша успешно очищено.';
$string['requestcount'] = 'Протестировать с {$a} запросом(ами)';
$string['rescandefinitions'] = 'Перечитать определения';
$string['result'] = 'Результат';
$string['set'] = 'Установка';
$string['storeconfiguration'] = 'Настройка хранилища';
$string['store_default_application'] = 'Хранилище по умолчанию для кэша уровня приложения (Кэш в файловой системе)';
$string['store_default_request'] = 'Хранилище по умолчанию для кэша уровня запроса (Кэш в статической переменной)';
$string['store_default_session'] = 'Хранилище по умолчанию для кэша уровня сессии (Кэш в сессионной переменной)';
$string['storename'] = 'Название хранилища';
$string['storenamealreadyused'] = 'Необходимо задать уникальное название хранилища';
$string['storename_help'] = 'Параметр задает название хранилища. Оно используется для идентификации хранилища внутри системы и может состоять только из символов a-z A-Z 0-9 -_ и пробелов. Название должно быть уникальным. При попытке задать название, уже использующееся в системе, будет отображено сообщение об ошибке.';
$string['storenameinvalid'] = 'Некорректное название хранилища. Используйте только знаки a-z A-Z 0-9 -_ и пробелы.';
$string['storenotready'] = 'Хранилище не готово';
$string['storeperformance'] = 'Отчет о производительности хранилища кэша. Уникальных запросов за операцию: {$a}.';
$string['storeready'] = 'Готово';
$string['storerequiresattention'] = 'Требует внимания.';
$string['storerequiresattention_help'] = 'Это хранилище не готово к использованию, но имеет сопоставления. Решение этой проблемы позволит повысить производительность Вашей системы. Пожалуйста, проверьте, что сервер хранилища готов к использованию, и выполнены все требования PHP.';
$string['storeresults_application'] = 'Запросы к хранилищу при использовании в качестве кэша приложения.';
$string['storeresults_request'] = 'Запросы к хранилищу при использовании в качестве кэша запросов.';
$string['storeresults_session'] = 'Запросы к хранилищу при использовании в качестве кэша сессий.';
$string['stores'] = 'Хранилища';
$string['storesummaries'] = 'Настроенные экземпляры хранилищ';
$string['supports'] = 'Поддерживается';
$string['supports_dataguarantee'] = 'гарантия сохранности данных';
$string['supports_keyawareness'] = 'проверка на существование ключа';
$string['supports_multipleidentifiers'] = 'операции с несколькими идентификаторами одновременно';
$string['supports_nativelocking'] = 'блокировка';
$string['supports_nativettl'] = 'установка времени жизни записи';
$string['supports_searchable'] = 'поиск по ключу';
$string['tested'] = 'Проверено';
$string['testperformance'] = 'Проверить производительность';
$string['unsupportedmode'] = 'Режим не поддерживается';
$string['untestable'] = 'Не может быть протестирован';
