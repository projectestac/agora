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
 * Strings for component 'cache', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Действия';
$string['addinstance'] = 'Добавить экземпляр';
$string['addlocksuccess'] = 'Новый экземпляр блокировки успешно добавлен.';
$string['addnewlockinstance'] = 'Добавить новый экзмпляр блокировки';
$string['addstore'] = 'Добавить хранилище {$a}';
$string['addstoresuccess'] = 'Успешно добавлено новое хранилище {$a}.';
$string['area'] = 'Область';
$string['cacheadmin'] = 'Управление кэшированием';
$string['cacheconfig'] = 'Настройка';
$string['cachedef_calendar_subscriptions'] = 'Подписки на календарь';
$string['cachedef_config'] = 'Настройки конфигурации';
$string['cachedef_coursecat'] = 'Списки категорий курсов для конкретного пользователя';
$string['cachedef_coursecatrecords'] = 'Отдельные записи категорий курсов';
$string['cachedef_coursecattree'] = 'Дерево категорий курсов';
$string['cachedef_coursecontacts'] = 'Список контактов курса';
$string['cachedef_coursemodinfo'] = 'Совокупная информация о модулях и разделах для каждого курса';
$string['cachedef_databasemeta'] = 'Информация о структуре базы данных';
$string['cachedef_eventinvalidation'] = 'Аннулирование событий';
$string['cachedef_externalbadges'] = 'Внешние значки для конкретного пользователя';
$string['cachedef_gradecondition'] = 'Оценки пользователя кэшируются для оценивания условия доступности';
$string['cachedef_groupdata'] = 'Информация о группах курса';
$string['cachedef_htmlpurifier'] = 'Очиститель HTML - очищенное содержимое';
$string['cachedef_langmenu'] = 'Список доступных языков';
$string['cachedef_locking'] = 'Блокировка';
$string['cachedef_navigation_expandcourse'] = 'Навигация расширяемых курсов';
$string['cachedef_observers'] = 'Обработчики системных событий';
$string['cachedef_plugin_manager'] = 'Данные менеждера плагинов';
$string['cachedef_questiondata'] = 'Данные банка вопросов';
$string['cachedef_repositories'] = 'Данные отдельных экземпляров хранилищ файлов';
$string['cachedef_string'] = 'Строки языкового пакета';
$string['cachedef_suspended_userids'] = 'Список приостановленных пользователей курса';
$string['cachedef_userselections'] = 'Данные, используемые по всей системе для сохранения выбранных пользователем вариантов';
$string['cachedef_yuimodules'] = 'Данные модулей YUI';
$string['cachelock_file_default'] = 'Блокировка по умолчанию (Блокировка созданием файла)';
$string['cachestores'] = 'Хранилища кэша';
$string['caching'] = 'Кэширование';
$string['component'] = 'Компонент';
$string['confirmlockdeletion'] = 'Подтвердите удаление блокировки';
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
$string['deletelock'] = 'Удалить блокировку';
$string['deletelockconfirmation'] = 'Вы уверены, что хотите удалить блокировку «{$a}»?';
$string['deletelockhasuses'] = 'Вы не можете удалить этот экзвемпляр блокировки, так как он используется каким-то хранилищем.';
$string['deletelocksuccess'] = 'Блокировка успешно удалена.';
$string['deletestore'] = 'Удалить хранилище';
$string['deletestoreconfirmation'] = 'Уверены, что хотите удалить хранилище «{$a}»?';
$string['deletestorehasmappings'] = 'Это хранилище невозможно удалить, так как оно содержит сопоставления. Сначала необходимо удалить все сопоставления из этого хранилища.';
$string['deletestoresuccess'] = 'Хранилище успешно удалено';
$string['editdefinitionmappings'] = 'Настройка хранилища для кэша «{$a}»';
$string['editdefinitionsharing'] = 'Настройка совместного использования для кэша «{$a}»';
$string['editmappings'] = 'Изменить сопоставления';
$string['editsharing'] = 'Настроить совместное использование';
$string['editstore'] = 'Изменить хранилище';
$string['editstoresuccess'] = 'Изменения хранилища кэша успешно сохранены.';
$string['ex_configcannotsave'] = 'Не удалось сохранить настройки кэша в файл.';
$string['ex_nodefaultlock'] = 'Не удалось найти экземпляр блокировки, используемый по умолчанию';
$string['ex_unabletolock'] = 'Не удалось получить блокировку записи для кэширования.';
$string['ex_unmetstorerequirements'] = 'В настоящее время это хранилище использовать невозможно. Обратитесь к документации для выяснения его требований.';
$string['gethit'] = 'Получение - Удачно';
$string['getmiss'] = 'Получение - Неудачно';
$string['inadequatestoreformapping'] = 'Это хранилище не отвечает требованиям для всех известных определений. Определениям, для которых это хранилище является недостаточным, будет дано первоначальное хранилище по умолчанию вместо выбранного хранилища.';
$string['invalidlock'] = 'Некорректная блокировки';
$string['invalidplugin'] = 'Некорректный плагин';
$string['invalidstore'] = 'Задано некорректное хранилище';
$string['lockdefault'] = 'По умолчанию';
$string['lockingmeans'] = 'Механизм блокировки';
$string['lockmethod'] = 'Способ блокировки';
$string['lockmethod_help'] = 'Способ, применяемый для блокировки записей при использовании данного хранилища';
$string['lockname'] = 'Название';
$string['locknamedesc'] = 'Название должно быть уникальным и может состоять только из символов: a-zA-Z_';
$string['locknamenotunique'] = 'Выбранное название не является уникальным. Пожалуйста, выберите уникальное название.';
$string['locksummary'] = 'Список экземпляров блокировок кэша.';
$string['locktype'] = 'Тип';
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
$string['purgedefinitionsuccess'] = 'Указанное определение кэша успешно очищено.';
$string['purgestoresuccess'] = 'Указанное хранилище кэша успешно очищено.';
$string['requestcount'] = 'Протестировать с {$a} запросом(ами)';
$string['rescandefinitions'] = 'Перечитать определения';
$string['result'] = 'Результат';
$string['set'] = 'Установка';
$string['sharing'] = 'Совместное использование';
$string['sharing_all'] = 'Все.';
$string['sharing_help'] = 'Этот параметр позволяет определить, как могут использоваться данные кэша, если есть кластер или несколько сайтов, настроенных для использования одного хранилища с общими данными. Этот параметр является необязательным; пожалуйста, перед изменением убедитесь, что Вы понимаете его назначение.';
$string['sharing_input'] = 'Пользовательский ключ (вводится ниже)';
$string['sharingrequired'] = 'Вы должны выбрать хотя бы один параметр общего доступа.';
$string['sharingselected_all'] = 'Все';
$string['sharingselected_input'] = 'Пользовательский ключ';
$string['sharingselected_siteid'] = 'Идентификатор сайта';
$string['sharingselected_version'] = 'Версия';
$string['sharing_siteid'] = 'Сайты с одинаковым идентификатором сайта.';
$string['sharing_version'] = 'Сайты под управлением одной и той же версии.';
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
$string['userinputsharingkey'] = 'Пользовательский ключ для совместного использования кэша';
$string['userinputsharingkey_help'] = 'Введите сюда свой личный ключ. Убедитесь, что Вы устанавливаете точно такой же ключ при настройке хранилищ на других сайтах, с которыми хотите использовать общий кэш.';
