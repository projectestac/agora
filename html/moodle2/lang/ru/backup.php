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
 * Strings for component 'backup', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Выберите, нужно ли осуществлять автоматическое резервное копирование. Если выбран режим "Вручную", то автоматическое резервное копирование будет возможно только с помощью специального скрипта через интерфейс командной строки. Его можно запускать вручную или с помощью cron.';
$string['autoactivedisabled'] = 'Отключено';
$string['autoactiveenabled'] = 'Включено';
$string['autoactivemanual'] = 'Вручную';
$string['automatedbackupschedule'] = 'Расписание';
$string['automatedbackupschedulehelp'] = 'Укажите, в какие дня недели осуществлять автоматическое резервное копирование.';
$string['automatedbackupsinactive'] = 'Автоматическое резервное копирование не было включено администратором сайта';
$string['automatedbackupstatus'] = 'Состояние автоматического резервного копирования';
$string['automatedsettings'] = 'Настройки автоматического резервного копирования';
$string['automatedsetup'] = 'Настройка автоматического резервного копирования';
$string['automatedstorage'] = 'Хранилище автоматически созданной резервной копии';
$string['automatedstoragehelp'] = 'Выберите место, где будут храниться автоматически созданные резервные копии.';
$string['backupactivity'] = 'Резервное копирование элемента курса: {$a}';
$string['backupcourse'] = 'Резервное копирование курса: {$a}';
$string['backupcoursedetails'] = 'Описание курса';
$string['backupcoursesection'] = 'Раздел: {$a}';
$string['backupcoursesections'] = 'Разделы курса';
$string['backupdate'] = 'Дата резервной копии';
$string['backupdetails'] = 'Описание резервной копии';
$string['backupdetailsnonstandardinfo'] = 'Выбранный файл не является стандартным файлом резервной копии Moodle. Будет предпринята попытка переконвертировать файл резервной копии в стандартный формат, а затем восстановить его.';
$string['backupformat'] = 'Формат';
$string['backupformatimscc1'] = 'Формат резервной копии IMS CC 1.0';
$string['backupformatimscc11'] = 'Формат резервной копии IMS CC 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Неизвестный формат';
$string['backupmode'] = 'Режим';
$string['backupmode10'] = 'Общий';
$string['backupmode20'] = 'Импорт';
$string['backupmode30'] = 'Каталог';
$string['backupmode40'] = 'Тот же самый сайт';
$string['backupmode50'] = 'Автоматизированный';
$string['backupmode60'] = 'Конвертированный';
$string['backupsection'] = 'Резервное копирование раздела курса: {$a}';
$string['backupsettings'] = 'Настройки резервного копирования';
$string['backupsitedetails'] = 'Описание сайта';
$string['backupstage16action'] = 'Продолжить';
$string['backupstage1action'] = 'Далее';
$string['backupstage2action'] = 'Далее';
$string['backupstage4action'] = 'Выполнить резервное копирование';
$string['backupstage8action'] = 'Продолжить';
$string['backuptype'] = 'Тип';
$string['backuptypeactivity'] = 'Элементы курса';
$string['backuptypecourse'] = 'Курс';
$string['backuptypesection'] = 'Раздел';
$string['backupversion'] = 'Версия резервной копии';
$string['cannotfindassignablerole'] = 'Роли "{$a}" из файла резервной копии не соответствует ни одной из тех, которые Вам разрешено назначать.';
$string['choosefilefromactivitybackup'] = 'Область резервных копий элементов курса';
$string['choosefilefromactivitybackup_help'] = 'При резервном копировании элементов курса, по умолчанию, файлы резервных копий хранятся здесь';
$string['choosefilefromautomatedbackup'] = 'Автоматически созданные резервные копии';
$string['choosefilefromautomatedbackup_help'] = 'Содержит автоматически созданные резервные копии.';
$string['choosefilefromcoursebackup'] = 'Область резервных копий курса';
$string['choosefilefromcoursebackup_help'] = 'При резервном копировании курсов, по умолчанию, файлы резервной копии хранятся здесь';
$string['choosefilefromuserbackup'] = 'Личная область пользователя для резервных копий';
$string['choosefilefromuserbackup_help'] = 'При резервном копировании курсов с отмеченным параметром "Обезличить данные пользователей" файлы резервных копий будут хранится здесь.';
$string['configgeneralactivities'] = 'Включать ли элементы курса по умолчанию в резервную копию.';
$string['configgeneralanonymize'] = 'При включении этого параметра вся касающаяся пользователей информация по умолчанию будет обезличиваться (делаться анонимной).';
$string['configgeneralblocks'] = 'Включать ли блоки по умолчанию в резервную копию.';
$string['configgeneralcomments'] = 'Включать ли комментарии по умолчанию в резервную копию.';
$string['configgeneralfilters'] = 'Включать ли фильтры по умолчанию в резервную копию.';
$string['configgeneralhistories'] = 'Включать ли историю пользователей по умолчанию в резервную копию.';
$string['configgenerallogs'] = 'При включеном параметре в резервные копии по умолчанию будут включаться журналы событий.';
$string['configgeneralroleassignments'] = 'Если параметр включен, то назначения ролей тоже будут сохраняться в резервной копии.';
$string['configgeneralusers'] = 'Включать ли по умолчанию пользователей в резервную копию.';
$string['configgeneraluserscompletion'] = 'При включенном параметре в резервные копии по умолчанию будет включена информация о прохождении курса пользователями.';
$string['configloglifetime'] = 'Этот параметр определяет длительность хранения резервных копий информации журналов событий. Журналы, которые старше этого возраста, автоматически удаляются. Рекомендуется, чтобы это значение было маленьким, поскольку резервные копии информации журналов могут быть очень большими.';
$string['confirmcancel'] = 'Отменить резервное копирование';
$string['confirmcancelno'] = 'Продолжить';
$string['confirmcancelquestion'] = 'Вы уверены, что хотите отменить? Вся информация, которую Вы ввели, будет потеряна.';
$string['confirmcancelyes'] = 'Отменить';
$string['confirmnewcoursecontinue'] = 'Предупреждение - новый курс';
$string['confirmnewcoursecontinuequestion'] = 'При восстановлении курса будет создан временный (скрытый) курс. Чтобы прервать восстановление нажмите кнопку Отмена. Не закрывайте браузер при восстановлении.';
$string['coursecategory'] = 'Категория, в которую будет восстановлен курс';
$string['courseid'] = 'Исходный ID';
$string['coursesettings'] = 'Настройки курса';
$string['coursetitle'] = 'Название';
$string['currentstage1'] = 'Первоначальная настройка';
$string['currentstage16'] = 'Завершение';
$string['currentstage2'] = 'Настройка схемы';
$string['currentstage4'] = 'Обзор и подтверждение';
$string['currentstage8'] = 'Резервное копирование';
$string['dependenciesenforced'] = 'Ваши настройки были изменены из-за неудовлетворенных зависимостей';
$string['enterasearch'] = 'Введите искомое';
$string['error_block_for_module_not_found'] = 'Найден устаревший блок курса (id: {$a->bid}) для модуля курса (id: {$a->mid}). Этот блок не будет включен в резервную копию.';
$string['error_course_module_not_found'] = 'Найден устаревший модуль курса (ID: {$a}). Этот модуль не будет включен в резервную копию.';
$string['errorfilenamemustbezip'] = 'Указанный файл должен быть ZIP-архивом и иметь расширение .mbz';
$string['errorfilenamerequired'] = 'Вы должны ввести корректное имя файла этой резервной копии';
$string['errorinvalidformat'] = 'Неизвестный формат резервной копии.';
$string['errorinvalidformatinfo'] = 'Выбранный файл не является корректным файлом резервной копии Moodle и не может быть восстановлен.';
$string['errorminbackup20version'] = 'Этот файл резервной копии был создан в версии Moodle ({$a->backup}). Минимально возможная версия - {$a->min}. Файл не может быть восстановлен.';
$string['errorrestorefrontpage'] = 'Восстановление на главную страницу не допускается.';
$string['executionsuccess'] = 'Файл резервной копии успешно создан.';
$string['filealiasesrestorefailures'] = 'Сбой восстановления псевдонима';
$string['filealiasesrestorefailures_help'] = 'Псевдонимы являются символическими ссылками на другие файлы, в том числе те, которые хранятся во внешних хранилищах. В некоторых случаях, Moodle не может восстановить их - например, при восстановлении резервной копии в другом сайте или если указанный файл не существует.

Подробности и реальная причина сбоя может быть найдена в файле журнала восстановления.';
$string['filealiasesrestorefailuresinfo'] = 'Некоторые псевдонимы файлов, включенные в резервную копию, не могут быть восстановлены. Ниже приводится список, содержащий их ожидаемое расположение и исходный файл, где они ссылаются на первоначальный сайт.';
$string['filename'] = 'Имя файла';
$string['filereferencesincluded'] = 'Включенные в пакет резервной копии файлы, ссылающиеся на внешнее содержимое, не будут работать на других сайтах.';
$string['filereferencesnotsamesite'] = 'Резервная копия из другого сайта, ссылающиеся файлы не могут быть восстановлены';
$string['filereferencessamesite'] = 'Резервная копия из этого сайта, ссылающиеся файлы могут быть восстановлены';
$string['generalactivities'] = 'Включать элементы курса';
$string['generalanonymize'] = 'Обезличивать данные';
$string['generalbackdefaults'] = 'Настройки резервного копирования по умолчанию';
$string['generalblocks'] = 'Включать блоки';
$string['generalcomments'] = 'Включать комментарии';
$string['generalfilters'] = 'Включать фильтры';
$string['generalgradehistories'] = 'Включать историю оценок';
$string['generalhistories'] = 'Включать историю';
$string['generallogs'] = 'Включать журналы событий';
$string['generalroleassignments'] = 'Включать назначения ролей';
$string['generalsettings'] = 'Общие настройки резервного копирования';
$string['generalusers'] = 'Включать пользователей';
$string['generaluserscompletion'] = 'Включать информацию пользователя о завершении';
$string['importbackupstage16action'] = 'Продолжить';
$string['importbackupstage1action'] = 'Далее';
$string['importbackupstage2action'] = 'Далее';
$string['importbackupstage4action'] = 'Выполнить импорт';
$string['importbackupstage8action'] = 'Продолжить';
$string['importcurrentstage0'] = 'Выбор курса';
$string['importcurrentstage1'] = 'Первоначальная настройка';
$string['importcurrentstage16'] = 'Завершение';
$string['importcurrentstage2'] = 'Настройка схемы';
$string['importcurrentstage4'] = 'Просмотр и подтверждение';
$string['importcurrentstage8'] = 'Импорт';
$string['importfile'] = 'Импорт файла резервной копии';
$string['importsuccess'] = 'Импорт завершён. Нажмите "Продолжить" для возвращения к курсу.';
$string['includeactivities'] = 'Включить:';
$string['includeditems'] = 'Включенные элементы:';
$string['includefilereferences'] = 'Файлы, ссылающиеся на внешнее содержимое';
$string['includesection'] = 'Раздел {$a}';
$string['includeuserinfo'] = 'Данные пользователей';
$string['locked'] = 'Заблокировано';
$string['lockedbyconfig'] = 'Этот параметр был заблокирован настройкой резервного копирования по умолчанию';
$string['lockedbyhierarchy'] = 'Заблокировано из-за зависимости';
$string['lockedbypermission'] = 'У Вас недостаточно прав для изменения этого параметра';
$string['loglifetime'] = 'Хранить журналы';
$string['managefiles'] = 'Управление файлами резервных копий';
$string['missingfilesinpool'] = 'Некоторые файлы невозможно сохранить при  резервном копировании. Их нельзя будет восстановить.';
$string['moodleversion'] = 'Версия Moodle';
$string['morecoursesearchresults'] = 'Найдено более {$a} курсов, отображаются только первые {$a} результатов.';
$string['moreresults'] = 'Слишком много результатов, введите более чёткие критерии поиска.';
$string['nomatchingcourses'] = 'Нет подходящих курсов';
$string['norestoreoptions'] = 'Нет категорий или курсов в которых Вы можете осуществлять восстановление';
$string['originalwwwroot'] = 'URL резервной копии';
$string['previousstage'] = 'Назад';
$string['qcategory2coursefallback'] = 'Категория вопросов "{$a->name}", находящаяся в файле резервной копии в контексте системы или категории курсов, при восстановлении будет создана в контексте курса.';
$string['qcategorycannotberestored'] = 'Категория вопросов "{$a->name}" не может быть создана при восстановлении';
$string['question2coursefallback'] = 'Категория вопросов "{$a->name}", находящаяся в файле резервной копии в контексте системы или категории курсов, при восстановлении будет создана в контексте курса.';
$string['questionegorycannotberestored'] = 'Вопросы "{$a->name}" не могут быть создана при восстановлении';
$string['restoreactivity'] = 'Восстановить элементы курса';
$string['restorecourse'] = 'Восстановить курс';
$string['restorecoursesettings'] = 'Настройки курса';
$string['restoreexecutionsuccess'] = 'Курс успешно восстановлен. Для перехода к восстановленному курсу нажмите "продолжить".';
$string['restorefileweremissing'] = 'Некоторые файлы не могут быть восстановлены, так как они отсутствуют в резервной копии.';
$string['restorenewcoursefullname'] = 'Название нового курса';
$string['restorenewcourseshortname'] = 'Краткое название нового курса';
$string['restorenewcoursestartdate'] = 'Дата начала нового курса';
$string['restorerolemappings'] = 'Восстановить роли';
$string['restorerootsettings'] = 'Восстановить настройки';
$string['restoresection'] = 'Восстановить раздел';
$string['restorestage1'] = 'Подтверждение';
$string['restorestage16'] = 'Обзор';
$string['restorestage16action'] = 'Приступить к восстановлению';
$string['restorestage1action'] = 'Далее';
$string['restorestage2'] = 'Назначение';
$string['restorestage2action'] = 'Далее';
$string['restorestage32'] = 'Процесс';
$string['restorestage32action'] = 'Продолжить';
$string['restorestage4'] = 'Настройки';
$string['restorestage4action'] = 'Далее';
$string['restorestage64'] = 'Завершение';
$string['restorestage64action'] = 'Продолжить';
$string['restorestage8'] = 'Схема';
$string['restorestage8action'] = 'Далее';
$string['restoretarget'] = 'Куда восстановить';
$string['restoretocourse'] = 'Восстановить в курс:';
$string['restoretocurrentcourse'] = 'Восстановить в этот курс';
$string['restoretocurrentcourseadding'] = 'Добавить в этот курс';
$string['restoretocurrentcoursedeleting'] = 'Удалить содержимое этого курса, а затем восстановить';
$string['restoretoexistingcourse'] = 'Восстановить в существующий курс';
$string['restoretoexistingcourseadding'] = 'Добавить в существующий курс';
$string['restoretoexistingcoursedeleting'] = 'Удалить содержимое существующего курса, а затем восстановить';
$string['restoretonewcourse'] = 'Восстановить как новый курс';
$string['restoringcourse'] = 'Идёт процесс восстановления курса';
$string['restoringcourseshortname'] = 'идёт восстановление';
$string['rootenrolmanual'] = 'Восстанавливать как зачисление на курс вручную';
$string['rootsettingactivities'] = 'Включить элементы курса';
$string['rootsettinganonymize'] = 'Обезличить данные пользователей';
$string['rootsettingblocks'] = 'Включить блоки';
$string['rootsettingcalendarevents'] = 'Включить события календаря';
$string['rootsettingcomments'] = 'Включить комментарии';
$string['rootsettingfilters'] = 'Включить фильтры';
$string['rootsettinggradehistories'] = 'Включить историю оценок';
$string['rootsettingimscc1'] = 'Сконвертировать в формат резервной копии IMS СС 1.0';
$string['rootsettingimscc11'] = 'Сконвертировать в формат резервной копии IMS СС 1.1';
$string['rootsettinglogs'] = 'Включить журналы событий курса';
$string['rootsettingroleassignments'] = 'Включить назначение ролей пользователям';
$string['rootsettings'] = 'Настройки резервного копирования';
$string['rootsettingusers'] = 'Включить записанных пользователей';
$string['rootsettinguserscompletion'] = 'Включать информацию о выполнении курса пользователем';
$string['sectionactivities'] = 'Элементы курса';
$string['sectioninc'] = 'Включено в резервную копию (без пользовательской информации)';
$string['sectionincanduser'] = 'Включено в резервную копию с пользовательской информацией';
$string['selectacategory'] = 'Выберите категорию';
$string['selectacourse'] = 'Выберите курс';
$string['setting_course_fullname'] = 'Название курса';
$string['setting_course_shortname'] = 'Краткое название курса';
$string['setting_course_startdate'] = 'Дата начала курса';
$string['setting_keep_groups_and_groupings'] = 'Оставить текущие группы и потоки';
$string['setting_keep_roles_and_enrolments'] = 'Оставить текущие роли и записанных участников';
$string['setting_overwriteconf'] = 'Переписать конфигурацию курса';
$string['skiphidden'] = 'Пропустить скрытые курсы';
$string['skiphiddenhelp'] = 'Выберите, следует ли пропускать скрытые курсы';
$string['skipmodifdays'] = 'Пропускать курсы, не изменившиеся с';
$string['skipmodifdayshelp'] = 'Пропускать ли курсы, не изменившиеся на протяжении указанного количества дней';
$string['skipmodifprev'] = 'Пропускать курсы, не изменившиеся с предыдущего создания резервной копии';
$string['skipmodifprevhelp'] = 'Пропускать ли курсы, не изменившиеся с предыдущего создания резервной копии';
$string['storagecourseandexternal'] = 'Область курса для резервных копий и указанный каталог';
$string['storagecourseonly'] = 'Область курса для резервных копий';
$string['storageexternalonly'] = 'Указанный каталог для автоматически созданных резервных копий';
$string['totalcategorysearchresults'] = 'Всего категорий: {$a}';
$string['totalcoursesearchresults'] = 'Всего курсов: {$a}';
