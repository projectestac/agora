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
 * Strings for component 'tool_uploadcourse', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Разрешить удаление';
$string['allowdeletes_help'] = 'Допускается ли применение поля удаления.';
$string['allowrenames'] = 'Разрешить переименование';
$string['allowrenames_help'] = 'Допускается ли применение поля переименования.';
$string['allowresets'] = 'Разрешить сброс';
$string['allowresets_help'] = 'Допускается ли применение поля сброса.';
$string['cachedef_helper'] = 'Помощник кэширования';
$string['cannotdeletecoursenotexist'] = 'Не удается удалить несуществующий курс';
$string['cannotgenerateshortnameupdatemode'] = 'Не удается создать короткое имя при разрешенном обновлении';
$string['cannotreadbackupfile'] = 'Не удается прочитать файл резервной копии';
$string['cannotrenamecoursenotexist'] = 'Не удается переименовать несуществующий курс';
$string['cannotrenameidnumberconflict'] = 'Не удается переименовать курс - конфликт ID с имеющимся курсом';
$string['cannotrenameshortnamealreadyinuse'] = 'Не удается переименовать курс, короткое имя уже используется';
$string['cannotupdatefrontpage'] = 'Запрещено изменять главную страницу';
$string['canonlyrenameinupdatemode'] = 'Можно только переименовать курс при разрешенном обновлении';
$string['canonlyresetcourseinupdatemode'] = 'Можно только сбросить курс в режиме обновления';
$string['couldnotresolvecatgorybyid'] = 'Не удалось определить категорию по ID';
$string['couldnotresolvecatgorybyidnumber'] = 'Не удалось определить категорию по ID-номеру';
$string['couldnotresolvecatgorybypath'] = 'Не удалось определить категорию по пути';
$string['coursecreated'] = 'Курс создан';
$string['coursedeleted'] = 'Курс удален';
$string['coursedeletionnotallowed'] = 'Удаление курсов не разрешено';
$string['coursedoesnotexistandcreatenotallowed'] = 'Курс не существует и создание курсов не разрешено';
$string['courseexistsanduploadnotallowed'] = 'Курс существует и обновление курсов не разрешено';
$string['coursefile'] = 'Файл';
$string['coursefile_help'] = 'Файл должен быть в формате CSV.';
$string['courseidnumberincremented'] = 'Увеличивать ID-номер курса: {$a->from} -> {$a->to}';
$string['courseprocess'] = 'Обработка курса';
$string['courserenamed'] = 'Курс переименован';
$string['courserenamingnotallowed'] = 'Переименование курсов не разрешено';
$string['coursereset'] = 'Курс сброшен';
$string['courseresetnotallowed'] = 'Сброс курсов не разрешен';
$string['courserestored'] = 'Курс восстановлен';
$string['coursescreated'] = 'Создано курсов: {$a}';
$string['coursesdeleted'] = 'Удалено курсов: {$a}';
$string['courseserrors'] = 'Курсов с ошибками: {$a}';
$string['courseshortnamegenerated'] = 'Сгенерировано коротких названий курсов: {$a}';
$string['courseshortnameincremented'] = 'Увеличивать короткое название курса:  {$a->from} -> {$a->to}';
$string['coursestotal'] = 'Всего курсов: {$a}';
$string['coursesupdated'] = 'Обновлено курсов: {$a}';
$string['coursetemplatename'] = 'Восстановить из этого курса после загрузки';
$string['coursetemplatename_help'] = 'Введите короткое имя существующего курса для использования в качестве шаблона при создании всех курсов.';
$string['coursetorestorefromdoesnotexist'] = 'Курс для восстановления не существует';
$string['courseupdated'] = 'Курс обновлен';
$string['createall'] = 'Создать все, при необходимости увеличивать короткое имя';
$string['createnew'] = 'Создать только новые курсы, пропустить существующие';
$string['createorupdate'] = 'Создать только новые курсы или обновить существующие';
$string['csvdelimiter'] = 'Разделитель CSV';
$string['csvdelimiter_help'] = 'Символ разделителя в файле CSV.';
$string['csvfileerror'] = 'Что-то не так с форматом файла CSV. Пожалуйста, проверьте соответствие заголовков и столбцов; верно ли указаны разделитель и кодировка файла: {$a}';
$string['csvline'] = 'Строка';
$string['defaultvalues'] = 'Значения по умолчанию';
$string['encoding'] = 'Кодировка';
$string['encoding_help'] = 'Кодировка файла CSV.';
$string['errorwhiledeletingcourse'] = 'Ошибка при удалении курса';
$string['errorwhilerestoringcourse'] = 'Ошибка при восстановлении курса';
$string['generatedshortnamealreadyinuse'] = 'Сгенерированные короткие имена уже используются';
$string['generatedshortnameinvalid'] = 'Сгенерированное короткое имя неверно';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'ID-номер уже используется в курсе';
$string['importoptions'] = 'Настройки импорта';
$string['invalidbackupfile'] = 'Неверный файл резервной копии';
$string['invalidcourseformat'] = 'Неверный формат курса';
$string['invalidcsvfile'] = 'Неверный входной файл CSV';
$string['invalidencoding'] = 'Неверная кодировка';
$string['invalideupdatemode'] = 'Выбран неверный режим обновления';
$string['invalidmode'] = 'Выбран неверный режим';
$string['invalidroles'] = 'Неверное название роли: {$a}';
$string['invalidshortname'] = 'Неверное короткое имя';
$string['missingmandatoryfields'] = 'Отсутствуют значения обязательных полей: {$a}';
$string['missingshortnamenotemplate'] = 'Отсутствует короткое имя и шаблон короткого имени не установлен';
$string['mode'] = 'Режим загрузки';
$string['mode_help'] = 'Это позволяет указать, в каком режиме курсы могут быть созданы и/или обновлены.';
$string['nochanges'] = 'Без изменений';
$string['pluginname'] = 'Загрузка курса';
$string['preview'] = 'Предпросмотр';
$string['reset'] = 'Сбросить курс после загрузки';
$string['reset_help'] = 'Сбрасывать ли курс после его создания/обновления.';
$string['restoreafterimport'] = 'Восстановить после импорта';
$string['result'] = 'Результат';
$string['rowpreviewnum'] = 'Предпросмотр строк';
$string['rowpreviewnum_help'] = 'Количество строк файла CSV для предварительного просмотра на следующей странице. Этот параметр предназначен для ограничения размера следующей страницы.';
$string['shortnametemplate'] = 'Шаблон генерации короткого имени';
$string['shortnametemplate_help'] = 'Короткое имя курса отображается в навигации. Вы можете использовать здесь синтаксис шаблона (%f = fullname, %i = idnumber) или ввести начальное значение, которое будет увеличиваться.';
$string['templatefile'] = 'Восстановить из этого файла после загрузки';
$string['templatefile_help'] = 'Выбрать файл для использования в качестве шаблона при создании всех курсов.';
$string['unknownimportmode'] = 'Неизвестный режим импорта';
$string['updatemissing'] = 'Заполнить недостающие элементы данными из CSV и значениями по умолчанию';
$string['updatemode'] = 'Режим обновления';
$string['updatemodedoessettonothing'] = 'Режим обновления не разрешает никаких обновлений';
$string['updatemode_help'] = 'Если вы разрешите обновление курсов, то здесь нужно выбрать режим обновления.';
$string['updateonly'] = 'Только обновление существующих курсов';
$string['updatewithdataonly'] = 'Обновление только данными из CSV';
$string['updatewithdataordefaults'] = 'Обновление данными из CSV и значениями по умолчанию';
$string['uploadcourses'] = 'Загрузка курсов';
$string['uploadcourses_help'] = 'Курсы могут быть загружены с помощью текстового файла. Формат файла должен быть следующим:

* Каждая строка файла содержит одну запись
* Каждая запись представляет собой ряд данных через запятую (или с другим разделителем)
* Первая запись содержит список имен полей, определяющих формат остальной части файла
* Обязательные поля - shortname, fullname и category';
$string['uploadcoursespreview'] = 'Предпросмотр загрузки курсов';
$string['uploadcoursesresult'] = 'Результаты загрузки курсов';
