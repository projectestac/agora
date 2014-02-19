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
 * Strings for component 'tool_xmldb', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftertable'] = 'После таблицы:';
$string['back'] = 'Назад';
$string['backtomainview'] = 'Вернуться к главной';
$string['cannotuseidfield'] = 'Невозможно заполнить поле «ID». Это столбец автонумерации.';
$string['change'] = 'Изменить';
$string['charincorrectlength'] = 'Некорректная длина символьного поля';
$string['checkbigints'] = 'Проверить целые';
$string['check_bigints'] = 'Поиск некорректных целых БД';
$string['checkdefaults'] = 'Проверить умолчания';
$string['check_defaults'] = 'Поиск противоречивых значений по умолчанию';
$string['checkforeignkeys'] = 'Проверить внешние ключи';
$string['check_foreign_keys'] = 'Поиск ошибочных внешних ключей';
$string['checkindexes'] = 'Проверить индексы';
$string['check_indexes'] = 'Поиск отсутствующих индексов БД';
$string['checkoraclesemantics'] = 'Проверить семантику';
$string['check_oracle_semantics'] = 'Поиск некорректной длины семантики';
$string['completelogbelow'] = '(Ниже см. полный протокол поиска)';
$string['confirmcheckbigints'] = 'Это возможность найти <a href="http://tracker.moodle.org/browse/MDL-11038">потенциально неверные целочисленные поля</a> на сервере Moodle, автоматически создавая (но не исполняя!) необходимые утверждения SQL, чтобы все целые числа в БД были правильно определены.

Когда утверждения созданы, Вы можете их скопировать и запустить безопасно с помощью интерфейса SQL (не забудьте сделать резервную копию своих данных, прежде чем делать это).

Настоятельно рекомендуется, чтобы у Вас был самый свежий (версия +) доступный релиз Moodle перед выполнением поиска неверных целочисленных полей.

Этот функционал не выполняет никаких действий с БД (только читает из нее), поэтому Вы можете безопасно запускать его в любой момент.';
$string['confirmcheckdefaults'] = 'Это возможность найти противоречивые значения по умолчанию на Вашем сервере Moodle, создавая (но не исполняя!) необходимые утверждения SQL, чтобы все значения по умолчанию были правильно заданы.

Когда утверждения созданы, Вы можете их скопировать и запустить безопасно с помощью интерфейса SQL (не забудьте перед этим сделать резервную копию своих данных).

Настоятельно рекомендуется, чтобы у Вас был самый свежий (версия +) доступный релиз Moodle перед выполнением поиска неверных значений по умолчанию.

Этот функционал не выполняет никаких действий с БД (только читает из нее), поэтому Вы можете безопасно запускать его в любой момент.';
$string['confirmcheckforeignkeys'] = 'Это возможность найти потенциально неверные внешние ключи, определенные в install.xml. (Moodle в настоящее время не создает действующие ограничения для внешних ключей в базе данных, поэтому в ней могут присутствовать недопустимые данные.)

Настоятельно рекомендуется, чтобы у Вас был самый свежий (версия +) доступный релиз Moodle перед выполнением поиска отсутствующих индексов.

Этот функционал не выполняет никаких действий с БД (только читает из нее), поэтому Вы можете безопасно запускать его в любой момент.';
$string['confirmcheckindexes'] = 'Это возможность найти потенциально пропущенные индексы на Вашем сервере Moodle, автоматически создавая (но не исполняя!) необходимые утверждения SQL, чтобы все было обновлено.

Когда утверждения созданы, Вы можете их скопировать и запустить безопасно с помощью интерфейса SQL (не забудьте перед этим сделать резервную копию своих данных).

Настоятельно рекомендуется, чтобы у Вас был самый свежий (версия +) доступный релиз Moodle перед выполнением поиска пропущенных индексов.

Этот функционал не выполняет никаких действий с БД (только читает из нее), поэтому Вы можете безопасно запускать его в любой момент.';
$string['confirmcheckoraclesemantics'] = 'Это возможность поиска <a href="http://tracker.moodle.org/browse/MDL-29322">Oracle varchar2 columns using BYTE semantics</a> на сервере Moodle, автоматически создавая (но не исполняя!) необходимые утверждения SQL, чтобы все  столбцы были преобразованы к использованию CHAR-семантики вместо BYTE-семантики (лучше для  совместимости перекрестной БД и увеличенной макс. длины содержимого).

Когда утверждения созданы, Вы можете их скопировать и запустить безопасно с помощью интерфейса SQL (не забудьте перед этим сделать резервную копию своих данных).

Крайне рекомендуется, чтобы у Вас был самый свежий (версия +) доступный релиз Moodle перед выполнением поиска BYTE-семантики.

Этот функционал не выполняет никаких действий с БД (только читает из нее), поэтому Вы можете безопасно запускать его в любой момент.';
$string['confirmdeletefield'] = 'Вы абсолютно уверены, что хотите удалить поле:';
$string['confirmdeleteindex'] = 'Вы абсолютно уверены, что хотите удалить индекс:';
$string['confirmdeletekey'] = 'Вы абсолютно уверены, что хотите удалить ключ:';
$string['confirmdeletetable'] = 'Вы абсолютно уверены, что хотите удалить таблицу:';
$string['confirmdeletexmlfile'] = 'Вы абсолютно уверены, что хотите удалить файл:';
$string['confirmrevertchanges'] = 'Вы действительно хотите отменить изменения:';
$string['create'] = 'Создать';
$string['createtable'] = 'Создайте таблицу:';
$string['defaultincorrect'] = 'Некорректное значение по умолчанию';
$string['delete'] = 'Удалить';
$string['delete_field'] = 'Удалить поле';
$string['delete_index'] = 'Удалить индекс';
$string['delete_key'] = 'Удалить ключ';
$string['delete_table'] = 'Удалить таблицу';
$string['delete_xml_file'] = 'Удалить файл XML';
$string['doc'] = 'Документация:';
$string['docindex'] = 'Индекс документации:';
$string['documentationintro'] = 'Эта документация генерируется автоматически из определений базы данных XMLDB. Она доступна только на английском языке.';
$string['down'] = 'Вниз';
$string['duplicate'] = 'Дублировать';
$string['duplicatefieldname'] = 'Существует другое поле с таким именем';
$string['duplicatefieldsused'] = 'Используемые повторяющиеся поля';
$string['duplicateindexname'] = 'Название повторяющихся индексов';
$string['duplicatekeyname'] = 'Существует другой ключ с таким именем';
$string['duplicatetablename'] = 'Существует другая таблица с таким именем';
$string['edit'] = 'Редактировать';
$string['edit_field'] = 'Редактировать поле';
$string['edit_field_save'] = 'Сохранить поле';
$string['edit_index'] = 'Редактировать индекс';
$string['edit_index_save'] = 'Сохранить индекс';
$string['edit_key'] = 'Редактировать ключ';
$string['edit_key_save'] = 'Сохранить ключ';
$string['edit_table'] = 'Редактировать таблицу';
$string['edit_table_save'] = 'Сохранить таблицу';
$string['edit_xml_file'] = 'Редактировать XML-файл';
$string['enumvaluesincorrect'] = 'Некорректные значения для подсчета полей';
$string['expected'] = 'Ожидается';
$string['extensionrequired'] = 'Для этого действия требуется расширение PHP «{$a}». Пожалуйста, установите это расширение, если хотите использовать эту особенность.';
$string['field'] = 'Поле';
$string['fieldnameempty'] = 'Пустое имя поля';
$string['fields'] = 'Поля';
$string['fieldsnotintable'] = 'Поле не существует в таблице';
$string['fieldsusedinindex'] = 'Это поле используется как индекс';
$string['fieldsusedinkey'] = 'Это поле используется как ключ';
$string['filemodifiedoutfromeditor'] = 'Внимание: Файл изменен локально с использованием редактора XMLDB. Локальные изменения будут перезаписаны при сохранении.';
$string['filenotwriteable'] = 'Файл не перезаписываемый';
$string['fkviolationdetails'] = 'Внешний ключ {$a->keyname} таблицы {$a->tablename} нарушен {$a->numviolations} из {$a->numrows} строк.';
$string['float2numbernote'] = 'Примечание: Несмотря на то, что «плавающие» поля на 100% поддерживается XMLDB, рекомендуется вместо них перейти на «числовые» поля.';
$string['floatincorrectdecimals'] = 'Неверное количество десятичных знаков для плавающего поля';
$string['floatincorrectlength'] = 'Неверная длина для плавающего поля';
$string['generate_all_documentation'] = 'Вся документация';
$string['generate_documentation'] = 'Документация';
$string['gotolastused'] = 'К последнему использованному файлу';
$string['incorrectfieldname'] = 'Неверное имя';
$string['incorrectindexname'] = 'Неверное имя индекса';
$string['incorrectkeyname'] = 'Неверное имя ключа';
$string['incorrecttablename'] = 'Неверное имя таблицы';
$string['index'] = 'Индекс';
$string['indexes'] = 'Индексы';
$string['indexnameempty'] = 'Имя индекса пусто';
$string['integerincorrectlength'] = 'Неверная длина для целого поля';
$string['key'] = 'Ключ';
$string['keynameempty'] = 'Имя ключа не может быть пустым';
$string['keys'] = 'Ключи';
$string['listreservedwords'] = 'Список зарезервированных слов <br /> (используется с обновляемой поддержкой  <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">зарезервированные слова XMLDB</a>)';
$string['load'] = 'Загрузка';
$string['main_view'] = 'Главный вид';
$string['masterprimaryuniqueordernomatch'] = 'Поля в вашем внешнем ключе, должны быть перечислены в том же порядке, как они перечислены в уникальном ключе указанной таблицы';
$string['missing'] = 'Отсутствует';
$string['missingindexes'] = 'Найдены отсутствующие индексы';
$string['mustselectonefield'] = 'Вы должны выбрать одно поле, чтобы увидеть действия, связанные с ним!';
$string['mustselectoneindex'] = 'Вы должны выбрать один индекс, чтобы увидеть действия, связанные с ним!';
$string['mustselectonekey'] = 'Вы должны выбрать один ключ, чтобы увидеть действия, связанные с ним!';
$string['newfield'] = 'Новое поле';
$string['newindex'] = 'Новый индекс';
$string['newkey'] = 'Новый ключ';
$string['newtable'] = 'Новая таблица';
$string['newtablefrommysql'] = 'Новая таблица из MySQL';
$string['new_table_from_mysql'] = 'Новая таблица из MySQL';
$string['nofieldsspecified'] = 'Нет заданных полей';
$string['nomasterprimaryuniquefound'] = '';
$string['nomissingindexesfound'] = 'Отсутствующие индексы не найдены, база данных не нуждается в дальнейших действиях.';
$string['noviolatedforeignkeysfound'] = 'Ошибочные внешние ключи не найдены.';
$string['nowrongdefaultsfound'] = 'Противоречивые значения по умолчанию не найдены. Ваша БД не нуждается в дальнейший действиях.';
$string['nowrongintsfound'] = 'Неверные целочисленные поля не найдены. Ваша БД не нуждается в дальнейший действиях.';
$string['nowrongoraclesemanticsfound'] = 'Столбцы БД Oracle, использующие BYTE-семантику не были найдены. Ваша БД не нуждается в дальнейший действиях.';
$string['numberincorrectdecimals'] = 'Некорректное количество десятичных знаков для числового поля';
$string['numberincorrectlength'] = 'Некорректная длина для числового поля';
$string['pendingchanges'] = 'Примечание: Вы внесли изменения в этот файл. Они могут быть сохранены в любой момент.';
$string['pendingchangescannotbesaved'] = 'Изменения в этом файле не могут быть сохранены! Пожалуйста, убедитесь, что файл «install.xml» и его родительский каталог имеют разрешение на запись для веб-сервера.';
$string['pendingchangescannotbesavedreload'] = 'Изменения в этом файле не могут быть сохранены! Пожалуйста, убедитесь, что файл «install.xml» и его родительский каталог имеют разрешение на запись для веб-сервер. После обновления страницы у Вас должна быть возможность сохранить эти изменения.';
$string['pluginname'] = 'Редактор XMLDB';
$string['primarykeyonlyallownotnullfields'] = 'Первичный ключ не может быть нулем';
$string['reserved'] = 'Зарезервировано';
$string['reservedwords'] = 'Зарезервированные слова';
$string['revert'] = 'Вернуть';
$string['revert_changes'] = 'Отменить изменения';
$string['save'] = 'Сохранить';
$string['searchresults'] = 'Результаты поиска';
$string['selectaction'] = 'Выберите действие:';
$string['selectdb'] = 'Выберите базу данных:';
$string['selectfieldkeyindex'] = 'Выберите поле/ключ/индекс:';
$string['selectonecommand'] = 'Пожалуйста, выберите одно действие из списка для просмотра кода PHP';
$string['selectonefieldkeyindex'] = 'Пожалуйста, выберите из списка одно поле/ключ/индекс  для просмотра кода PHP';
$string['selecttable'] = 'Выберите таблицу:';
$string['table'] = 'Таблица';
$string['tablenameempty'] = 'Название таблицы не может быть пустым';
$string['tables'] = 'Таблицы';
$string['unload'] = 'Выгрузить';
$string['up'] = 'Вверх';
$string['view'] = 'Просмотр';
$string['viewedited'] = 'Просмотр отредактированного';
$string['vieworiginal'] = 'Просмотр оригинала';
$string['viewphpcode'] = 'Просмотр PHP-кода';
$string['view_reserved_words'] = 'Просмотр зарезервированных слов';
$string['viewsqlcode'] = 'Просмотр SQL-кода';
$string['view_structure_php'] = 'Просмотр структуры PHP';
$string['view_structure_sql'] = 'Просмотр структуры SQL';
$string['view_table_php'] = 'Просмотр таблицы PHP';
$string['view_table_sql'] = 'Просмотр таблицы SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Ошибочные внешние ключи';
$string['violatedforeignkeysfound'] = 'Поиск ошибочных внешних ключей';
$string['violations'] = 'Нарушения';
$string['wrong'] = 'Неверные';
$string['wrongdefaults'] = 'Найдены неверные значения по умолчанию';
$string['wrongints'] = 'Найдены неверные целочисленные поля';
$string['wronglengthforenum'] = 'Некорректная длина для перечисляемого поля';
$string['wrongoraclesemantics'] = 'Найдены неверные BYTE-семантики Oracle';
$string['wrongreservedwords'] = 'Найдены использующиеся зарезервированные слова <br /> (отметим, что имена таблиц не важны при использовании $CFG->prefix)';
