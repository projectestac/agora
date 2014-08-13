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
 * Strings for component 'tool_generator', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Большой файл {$a}';
$string['courseexplanation'] = 'Этот инструмент создает стандартные испытательные курсы, которые включают несколько разделов, активных элементов и файлов.

Это сделано для обеспечения стандартизированной оценки  проверки надежности и производительности различных компонентов системы (например, резервное копирование и восстановление).

Этот тест является важным, потому что ранее было много случаев, когда, столкнувшись в реальной жизни с использованием  сложных случаев (например, курс с 1000 элементов), система не работала.

Курсы, созданные с помощью этой функции могут занимать большое пространство баз данных и файловой системы  (десятки гигабайт). Вам нужно будет удалить курсы (и ждать нескольких запусков очистки), чтобы снова освободить это пространство.

**Не используйте эту функцию на рабочей системе.** Используйте только на сервере разработчика. (Чтобы избежать случайного использования, эта функция отключена. К тому же нужно выбрать уровень отладки - РАЗРАБОТЧИК).';
$string['coursesize_0'] = 'XS (~ 10KB; создать ~ за 1 секунду)';
$string['coursesize_1'] = 'S (~ 10MB; создать ~ за 30 секунд)';
$string['coursesize_2'] = 'М (~ 100 МБ; создать ~ за 5 минут)';
$string['coursesize_3'] = 'L (~ 1 Гб; создать ~ за 1 час)';
$string['coursesize_4'] = 'XL (~ 10 Гб; создать ~ за 4 часа)';
$string['coursesize_5'] = 'XXL (~ 20GB; создать ~ за 8 часов)';
$string['coursewithoutusers'] = 'Выбранный курс не имеет пользователей';
$string['createcourse'] = 'Создать курс';
$string['createtestplan'] = 'Создать испытательный план';
$string['creating'] = 'Создание курса';
$string['done'] = 'Выполнено ({$a}s)';
$string['downloadtestplan'] = 'Скачать испытательный план';
$string['downloadusersfile'] = 'Скачать файлы пользователей';
$string['error_nocourses'] = 'Нет курсов для генерации плана тестирования';
$string['error_noforumdiscussions'] = 'Выбранный курс не содержит тем форума';
$string['error_noforuminstances'] = 'Выбранный курс не содержит форумов';
$string['error_noforumreplies'] = 'Выбранный курс не содержит сообщений форума';
$string['error_nonexistingcourse'] = 'Указанный курс не существует';
$string['error_nopageinstances'] = 'Выбранный курс не содержит модулей «Страница»';
$string['error_notdebugging'] = 'Не найден на сервере, так как  не установлен уровень отладки РАЗРАБОТЧИК';
$string['error_nouserspassword'] = 'Чтобы генерировать испытательный план нужно установить $CFG->tool_generator_users_password в config.php';
$string['firstname'] = 'Пользователь испытательного курса';
$string['fullname'] = 'Испытательный курс: {$a->size}';
$string['maketestcourse'] = 'Создать испытательный курс';
$string['maketestplan'] = 'Создать испытательный план JMeter';
$string['notenoughusers'] = 'Выбранный курс не имеет достаточного количества пользователей';
$string['pluginname'] = 'Генератор тестовых данных для разработчиков';
$string['progress_checkaccounts'] = 'Проверка учетных записей пользователей ({$a})';
$string['progress_coursecompleted'] = 'Курс завершен ({$a}s)';
$string['progress_createaccounts'] = 'Создание учетных записей пользователей ({$a->from} - {$a->to})';
$string['progress_createbigfiles'] = 'Создание больших файлов ({$a})';
$string['progress_createcourse'] = 'Создание курса {$a}';
$string['progress_createforum'] = 'Создание форума (сообщений - {$a})';
$string['progress_createpages'] = 'Создание страниц ({$a})';
$string['progress_createsmallfiles'] = 'Создание небольших файлов ({$a})';
$string['progress_enrol'] = 'Запись пользователей на курс ({$a})';
$string['progress_sitecompleted'] = 'Сайт завершен ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~ 10 MB; 3 курса, созданы ~ за 30 секунд)';
$string['sitesize_1'] = 'S (~ 50 MB; 8 курсов, созданы ~ за 2 минуты)';
$string['sitesize_2'] = 'М (~ 200 МБ; 73 курсов, созданы ~ за 10 минут)';
$string['sitesize_3'] = 'L (~ 1,5 GB; 277 курсов, созданы ~ за 1,5 часа)';
$string['sitesize_4'] = 'XL (~ 10 Гб; 1065 курсы, созданы ~ за 5 часов)';
$string['sitesize_5'] = 'XXL (~ 20GB; 4177 курсов, созданы ~ за 10 часов)';
$string['size'] = 'Размер курса';
$string['smallfiles'] = 'Небольшие файлы';
$string['targetcourse'] = 'Цель - Испытательный курс';
$string['testplanexplanation'] = 'Этот инструмент создает файл испытательного плана JMeter вместе с файлом учетных данных пользователя.

Этот испытательный план предназначен для работы вместе с {$a}, что позволяет легко запускать испытательный план в конкретной среде Moodle, собирать информацию о прохождении и сравнивать результаты. Вам нужно скачать и использовать этот сценарий test_runner.sh  или следовать инструкциям по установке и использованию.

Для предотвращения непреднамеренного использования инструмента необходимо установить пароль для пользователей курса в config.php (например $CFG->tool_generator_users_password = \'moodle\';). По умолчанию пароль не задан.
Вы должны использовать опцию обновления паролей в случае, если у пользователей курса есть другие пароли, или они были сгенерированы tool_generator, но при пустом значении $CFG->tool_generator_users_password.

Это -  часть tool_generator и хорошо работает с курсами, которые сформированы генераторами и курсами сайта, также может использоваться с любым курсом, который содержит, по крайней мере:

* Достаточное количество записанных пользователей (зависит от выбранного размера плана тестирования) с сбросом пароля к «Moodle»
* Модуль «Страница»
* Форум по меньшей мере с одним обсуждением и одним ответом.

Вы можете рассмотреть мощность своих серверов при суммарной работе больших испытательных планов, чтобы нагрузка, порожденная JMeter, специально была  большой. Увеличение периода было скорректировано в соответствии с количеством потоков (пользователей), чтобы уменьшить проблемы такого рода, но нагрузка все еще огромна.

**Не запускайте тестовый план на рабочей системе**.
Эта функция только создает файлы, чтобы обеспечить JMeter, что не так опасно само по себе, но Вы  **НИКОГДА** не должны запускать этот проверочный план на работающем сайте.';
$string['testplansize_0'] = 'XS (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['testplansize_1'] = 'S (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['testplansize_2'] = 'M (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['testplansize_3'] = 'L (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['testplansize_4'] = 'XL (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['testplansize_5'] = 'XXL (пользователей - {$a->users}, циклов - {$a->loops} и увеличение периода - {$a->rampup})';
$string['updateuserspassword'] = 'Обновить пароли пользователей курса';
$string['updateuserspassword_help'] = 'JMeter необходимо войти в систему как пользователю курса. Вы можете задать пароль пользователей, используя $CFG->tool_generator_users_password в config.php. Этот параметр обновляет пароль пользователя курса в соответствии с $CFG->tool_generator_users_password. Это может быть полезно в случае, если Вы используете курс, не сгенерированный tool_generator или $CFG->tool_generator_users_password не был задан при создании испытательных курсов.';
