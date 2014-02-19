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
 * Strings for component 'enrol_database', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Отчислять приостановленных пользователей';
$string['dbencoding'] = 'Кодировка базы данных';
$string['dbhost'] = 'Хост базы данных';
$string['dbhost_desc'] = 'Сервер базы данных - IP-адрес или имя хоста';
$string['dbname'] = 'Имя базы данных';
$string['dbpass'] = 'Пароль базы данных';
$string['dbsetupsql'] = 'Команда создания базы данных';
$string['dbsetupsql_desc'] = 'SQL-команда для создания специальной базы данных, часто используется с заданием кодировки - пример для MySQL и PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Использовать кавычки Sybase';
$string['dbsybasequoting_desc'] = 'Стиль Sybase с одиночными кавычками - необходим для Oracle, MS SQL и некоторых других баз данных. Не использовать для MySQL!';
$string['dbtype'] = 'Драйвер базы данных';
$string['dbtype_desc'] = 'Имя драйвера базы данных ADOdb, тип внешней базы данных.';
$string['dbuser'] = 'Пользователь базы данных';
$string['debugdb'] = 'Отладка ADOdb';
$string['debugdb_desc'] = 'Отладка соединения ADOdb с внешней базой данных - использовать при получении пустых страницы во время входа в систему. Не применима для действующих сайтов!';
$string['defaultcategory'] = 'Категория нового курса по умолчанию';
$string['defaultcategory_desc'] = 'Категория по умолчанию для автоматически создаваемых курсов. Используется, когда идентификатор новой категории не указан или не найден.';
$string['defaultrole'] = 'Роль по умолчанию';
$string['defaultrole_desc'] = 'Роль, которая будет назначена по умолчанию, если никакая другая роль не указана во внешней таблице.';
$string['ignorehiddencourses'] = 'Игнорировать скрытые курсы';
$string['ignorehiddencourses_desc'] = 'При включенном параметре пользователи не будут зачислены на курсы, не доступные для студентов.';
$string['localcategoryfield'] = 'Локальное поле категории';
$string['localcoursefield'] = 'Локальное поле курса';
$string['localrolefield'] = 'Локальное поле роли';
$string['localuserfield'] = 'Локальное поле пользователя';
$string['newcoursecategory'] = 'Поле категории нового курса';
$string['newcoursefullname'] = 'Поле полного имени нового курса';
$string['newcourseidnumber'] = 'Поле номера ID нового курса';
$string['newcourseshortname'] = 'Поле, содержащее название нового курса';
$string['newcoursetable'] = 'Отдаленная таблица новых курсов';
$string['newcoursetable_desc'] = 'Укажите имя таблицы, содержащей перечень курсов, которые должны быть автоматически созданы. При пустом значении курсы не создаются.';
$string['pluginname'] = 'Внешняя база данных';
$string['pluginname_desc'] = 'Вы можете использовать внешнюю базу данных (почти любого вида), чтобы управлять своими учащимися. Внешняя база данных должна иметь, по крайней мере поле, содержащее ID курса, и поле, содержащее ID пользователя. Они сравниваются с полями, которые Вы выбираете в локальных таблицах курса и пользователей.';
$string['remotecoursefield'] = 'Отдаленное поле курса';
$string['remotecoursefield_desc'] = 'Имя поля в отдаленной таблице, в котором записи соответствуют записям в таблице курса.';
$string['remoteenroltable'] = 'Отдаленная таблица записи пользователя на курс';
$string['remoteenroltable_desc'] = 'Укажите имя таблицы, содержащей список записанных пользователей. Пустые означает отсутствие синхронизации регистрации пользователя.';
$string['remoterolefield'] = 'Отдаленное поле роли';
$string['remoterolefield_desc'] = 'Имя поля в отдаленной таблице, в котором записи соответствуют записям в таблице ролей.';
$string['remoteuserfield'] = 'Отдаленное поле пользователя';
$string['remoteuserfield_desc'] = 'Имя поля в отдаленной таблице, в котором записи соответствуют записям в таблице пользователей.';
$string['settingsheaderdb'] = 'Подключение к внешней базе данных';
$string['settingsheaderlocal'] = 'Соответствие локального поля';
$string['settingsheadernewcourses'] = 'Создание новых курсов';
$string['settingsheaderremote'] = 'Синхронизация отдаленных записей на курс';
$string['templatecourse'] = 'Шаблон нового курса';
$string['templatecourse_desc'] = 'Не обязательно: автоматически создаваемые курсы могут скопировать  настройки из шаблона курса. Введите здесь Короткое имя шаблона курса.';
