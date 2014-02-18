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
 * Strings for component 'repository', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   repository
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessiblefilepicker'] = 'Выбор доступного файла';
$string['activaterep'] = 'Активные хранилища';
$string['activerepository'] = 'Доступные плагины хранилищ';
$string['activitybackup'] = 'Резервные копии деятельностей';
$string['add'] = 'Добавить';
$string['addfile'] = 'Добавить...';
$string['addplugin'] = 'Добавить плагин хранилища';
$string['allowexternallinks'] = 'Разрешить внешние ссылки';
$string['areacategoryintro'] = 'Введение категории';
$string['areacourseintro'] = 'Введение курса';
$string['areamainfile'] = 'Основной файл';
$string['arearoot'] = 'Система';
$string['areauserbackup'] = 'Резервные копии пользователя';
$string['areauserdraft'] = 'Проекты';
$string['areauserpersonal'] = 'Личные файлы';
$string['areauserprofile'] = 'Профиль';
$string['attachedfiles'] = 'Прикрепленные файлы';
$string['attachment'] = 'Прикрепить файл';
$string['author'] = 'Автор';
$string['automatedbackup'] = 'Автоматические резервные копии';
$string['back'] = '&laquo; Назад';
$string['backtodraftfiles'] = '&laquo; Вернуться к управлению файлами-проектами';
$string['cachecleared'] = 'Кешированные файлы были удалены';
$string['cacheexpire'] = 'Кеш просрочен';
$string['cannotaccessparentwin'] = 'Если родительское окно - HTTPS, тогда у нас нет доступа к объекту window.opener. Таким образом, мы не можем автоматически обновить хранилище, но Ваша сессия уже существует - просто перейдите назад к выбору файлов и выберите хранилище вновь. Это должно сработать.';
$string['cannotdelete'] = 'Не удается удалить этот файл.';
$string['cannotdownload'] = 'Невозможно загрузить этот файл';
$string['cannotdownloaddir'] = 'Невозможно загрузить эту папку';
$string['cannotinitplugin'] = 'Вызов plugin_init неудачный';
$string['choosealink'] = 'Выберите ссылку ...';
$string['chooselicense'] = 'Выберите лицензию';
$string['cleancache'] = 'Очистить мои файлы кеша';
$string['close'] = 'Закрыть';
$string['commonrepositorysettings'] = 'Общие настройки хранилища';
$string['configallowexternallinks'] = 'Эта опция позволяет всем пользователям выбирать, копировать или нет  внешние медиа-файлы в Moodle. Если эта опция выключена, то  медиа-файлы всегда копируются в Moodle  (это обычно лучше для целостности данных и безопасности). Если опция включена, то пользователи каждый раз могут выбирать вариант при добавлении медиа в текст.';
$string['configcacheexpire'] = 'Количество времени, которое список файлов кеширован локально (в секундах) при просмотре внешних хранилищ.';
$string['configsaved'] = 'Конфигурация сохранена!';
$string['confirmdelete'] = 'Вы уверены, что хотите удалить этот репозиторий - {$a}? Если Вы выберете «Продолжить и скачать», то файлы с внешним содержимым будут загружены в Moodle, но этот процесс может занять много времени.';
$string['confirmdeletefile'] = 'Вы уверены, что хотите удалить это файл?';
$string['confirmdeletefilewithhref'] = 'Вы уверены, что хотите удалить этот файл? Есть {$a} псевдонимов/ярлыков файлов, которые используют этот файл в качестве источника. Если Вы продолжите, то эти псевдонимы будут преобразованы в точные копии.';
$string['confirmdeletefolder'] = 'Вы уверены, что хотите удалить эту папку? Все файлы и вложенные папки будут удалены.';
$string['confirmremove'] = 'Вы уверены, что хотите удалить этот репозиторий, его опции и <strong>все его экземпляры</strong> - {$a}? Если Вы выберете «Продолжить и скачать», то файлы с внешним содержимым будут загружены в Moodle, но этот процесс может занять много времени.';
$string['confirmrenamefile'] = 'Вы уверены, что хотите переименовать/переместить этот файл?  Есть {$a} псевдонимов/ярлыков файлов, которые используют этот файл в качестве источника. Если Вы продолжите, то эти псевдонимы будут преобразованы в точные копии.';
$string['confirmrenamefolder'] = 'Вы уверены, что хотите переместить/переименовать эту папку? Любые псевдонимы/ярлыки файлов, которые ссылаются на файлы в этой папке будут преобразованы в их точные копии.';
$string['continueuninstall'] = 'Продолжить';
$string['continueuninstallanddownload'] = 'Продолжить и загрузить';
$string['copying'] = 'Копируется';
$string['coursebackup'] = 'Резервные копии курса';
$string['create'] = 'Создать';
$string['createfolderfail'] = 'Ошибка при создании этой папки';
$string['createfoldersuccess'] = 'Папка создана успешно';
$string['createinstance'] = 'Создать экземпляр хранилища';
$string['createrepository'] = 'Создать экземпляр хранилища';
$string['createxxinstance'] = 'Создать экземпляр «{$a}»';
$string['date'] = 'Дата';
$string['datecreated'] = 'Создано';
$string['deleted'] = 'Хранилище удалено';
$string['deleterepository'] = 'Удалить это хранилище';
$string['detailview'] = 'Посмотреть подробности';
$string['dimensions'] = 'Размеры';
$string['disabled'] = 'Отключено';
$string['download'] = 'Скачать';
$string['downloadfolder'] = 'Скачать всё';
$string['downloadsucc'] = 'Файл успешно загружен';
$string['draftareanofiles'] = 'Не может быть скачано, потому что нет прикрепленных файлов';
$string['editrepositoryinstance'] = 'Редактировать экземпляр хранилища';
$string['emptylist'] = 'Пустой список';
$string['emptytype'] = 'Не удается создать тип хранилища: имя типа пустое';
$string['enablecourseinstances'] = 'Разрешить пользователям добавлять экземпляр хранилища в курс';
$string['enableuserinstances'] = 'Разрешить пользователям добавлять экземпляр хранилища в контекст пользователя';
$string['enter'] = 'Ввод';
$string['entername'] = 'Введите имя папки';
$string['enternewname'] = 'Введите новое имя файла';
$string['error'] = 'Произошла неизвестная ошибка!';
$string['errordoublereference'] = 'Невозможно перезаписать файл с ярлыка/псевдонима, потому что ссылки на тот файл уже существуют.';
$string['errornotyourfile'] = 'Вы не можете выбрать файл, добавленный не Вами';
$string['errorpostmaxsize'] = 'Загружаемый файл мог превысить max_post_size, заданный в php.ini.';
$string['erroruniquename'] = 'Имя экземпляра хранилища должно быть уникальным';
$string['errorwhilecommunicatingwith'] = 'Ошибка при установлении связи с хранилищем «{$a}».';
$string['errorwhiledownload'] = 'Произошла ошибка при загрузке файла: {$a}';
$string['existingrepository'] = 'Это хранилище уже создано';
$string['federatedsearch'] = 'Федеративный поиск';
$string['fileexists'] = 'Файл с таким именем уже существует, выберите другое';
$string['fileexistsdialog_editor'] = 'Файл с этим именем уже был прикреплен к редактируемому тексту';
$string['fileexistsdialog_filemanager'] = 'Файл с этим именем уже был прикреплен';
$string['fileexistsdialogheader'] = 'Файл создан';
$string['filename'] = 'Имя файла';
$string['filenotnull'] = 'Вам нужно выбрать файл для загрузки';
$string['filepicker'] = 'Выбор файла';
$string['filesaved'] = 'Файл был сохранен';
$string['filesizenull'] = 'Размер файла не может быть определен';
$string['folderexists'] = 'Такое имя папки уже существует. Используйте другое имя.';
$string['foldernotfound'] = 'Каталог не найден';
$string['folderrecurse'] = 'Папка не может быть перемещена в свою собственную подпапку';
$string['getfile'] = 'Выбрать этот файл';
$string['hidden'] = 'Скрыть';
$string['iconview'] = 'В виде значков';
$string['imagesize'] = '{$a->width} x {$a->height} пикс.';
$string['instance'] = 'экземпляр';
$string['instancedeleted'] = 'Экземпляр удален';
$string['instances'] = 'Экземпляры хранилища';
$string['instancesforcourses'] = 'Общие экземпляры курса - {$a}';
$string['instancesforsite'] = 'Общие экземпляры сайта - {$a}';
$string['instancesforusers'] = 'Личные экземпляры пользователя - {$a}';
$string['invalidfiletype'] = 'Использование файлов типа «{$a}» не разрешено.';
$string['invalidjson'] = 'Неверная строка JSON';
$string['invalidparams'] = 'Неверные параметры';
$string['invalidplugin'] = 'Неверный плагин хранилища {$a}';
$string['invalidrepositoryid'] = 'Неверный идентификатор хранилища';
$string['isactive'] = 'Активно?';
$string['keyword'] = 'Ключевое слово';
$string['linkexternal'] = 'Внешняя ссылка';
$string['listview'] = 'В виде списка';
$string['loading'] = 'Загрузка...';
$string['login'] = 'Вход';
$string['logout'] = 'Выход';
$string['lostsource'] = 'Ошибка. Отсутствует источник. {$a}';
$string['makefileinternal'] = 'Сделать копию файла';
$string['makefilelink'] = 'Ссылка непосредственно на файл';
$string['makefilereference'] = 'Создать псевдоним/ярлык для файла';
$string['manage'] = 'Управление хранилищами';
$string['manageurl'] = 'Управление';
$string['manageuserrepository'] = 'Управление индивидуальным хранилищем';
$string['moving'] = 'Перенос';
$string['newfolder'] = 'Новая папка';
$string['newfoldername'] = 'Имя нового каталога:';
$string['noenter'] = 'Ничего не введено';
$string['nofilesattached'] = 'Не прикреплен ни один файл';
$string['nofilesavailable'] = 'Нет ни одного файла';
$string['nomorefiles'] = 'Не разрешено прикреплять большее число файлов';
$string['nopathselected'] = 'Не выбрана папка назначения (для выбора папки используется двойной щелчок)';
$string['nopermissiontoaccess'] = 'Нет разрешения на доступ к этому хранилищу';
$string['norepositoriesavailable'] = 'К сожалению, ни одно из Ваших текущих хранилищ не может вернуть файлы в запрашиваемом формате.';
$string['norepositoriesexternalavailable'] = 'К сожалению, ни одно из Ваших текущих хранилищ не может вернуть внешние файлы.';
$string['noresult'] = 'Нет результатов поиска';
$string['notyourinstances'] = 'Вы не можете просматривать/редактировать экземпляры хранилищ другого пользователя';
$string['off'] = 'Включено, но скрыто';
$string['on'] = 'Включено и видимо';
$string['openpicker'] = 'Выберите файл...';
$string['operation'] = 'Операция';
$string['original'] = 'Оригинал';
$string['overwrite'] = 'Перезаписать';
$string['overwriteall'] = 'Заменить все';
$string['personalrepositories'] = 'Доступные экземпляры хранилищ';
$string['plugin'] = 'Плагины хранилищ';
$string['pluginerror'] = 'Ошибка плагина хранилища';
$string['pluginname'] = 'Имя плагина хранилища';
$string['pluginnamehelp'] = 'Если оставить это поле пустым, будет использовано имя по умолчанию.';
$string['popup'] = 'Для входа нажмите кнопку «Вход»';
$string['popupblockeddownload'] = 'Окно закачки заблокировано - разрешите всплывающие окна и попробуйте снова.';
$string['preview'] = 'Предпросмотр';
$string['privatefilesof'] = 'Личные файлы - {$a}';
$string['readonlyinstance'] = 'Вы не можете редактировать/удалить экземпляр «Только для чтения»';
$string['referencesexist'] = 'Есть псевдонимы/ярлыки файлов ({$a}), которые используют этот файл в качестве источника';
$string['referenceslist'] = 'Псевдонимы/Ярлыки';
$string['refresh'] = 'Обновить';
$string['refreshnonjsfilepicker'] = 'Пожалуйста, закройте это окно и обновите окно выбора файла без поддержки javascript';
$string['removed'] = 'Хранилище удалено';
$string['renameall'] = 'Переименовать все';
$string['renameto'] = 'Переименовать в «{$a}»';
$string['repositories'] = 'Хранилища';
$string['repository'] = 'Хранилище';
$string['repositorycourse'] = 'Хранилища курса';
$string['repositoryerror'] = 'Удаленное хранилище вернуло ошибку: {$a}';
$string['save'] = 'Сохранить';
$string['saveas'] = 'Сохранить как';
$string['saved'] = 'Сохранено';
$string['saving'] = 'Идет сохранение';
$string['search'] = 'Искать';
$string['searching'] = 'Искать в';
$string['searchrepo'] = 'Поиск в хранилище';
$string['sectionbackup'] = 'Резервные копии раздела';
$string['select'] = 'Выбрать';
$string['setmainfile'] = 'Сделать файл основным';
$string['settings'] = 'Настройки';
$string['setupdefaultplugins'] = 'Настройки плагина по умолчанию для хранилища';
$string['siteinstances'] = 'Экземпляр хранилища сайта';
$string['size'] = 'Размер';
$string['submit'] = 'Отправить';
$string['sync'] = 'Синхронизация';
$string['thumbview'] = 'Просмотр в виде значков';
$string['title'] = 'Выберите файл...';
$string['type'] = 'Тип';
$string['typenotvisible'] = 'Тип не виден';
$string['undisclosedreference'] = '(Неизвестная)';
$string['undisclosedsource'] = '(Неизвестный)';
$string['unknownoriginal'] = 'Неизвестный';
$string['unzipped'] = 'Распаковка прошла успешно';
$string['upload'] = 'Загрузить этот файл';
$string['uploading'] = 'Идет загрузка файла на сервер...';
$string['uploadsucc'] = 'Файл был успешно загружен';
$string['uselatestfile'] = 'Использовать последний файл';
$string['usenonjsfilemanager'] = 'Открыть менеджер файлов в новом окне';
$string['usenonjsfilepicker'] = 'Открыть выбор файлов в новом окне';
$string['usercontextrepositorydisabled'] = 'Вы не можете редактировать это хранилище в контексте пользователя';
$string['wrongcontext'] = 'У Вас нет доступа к этому контексту';
$string['xhtmlerror'] = 'Вы, вероятно, используете заголовок «XHTML Strict». Некоторые компоненты библиотеки YUI не работают в этом режиме, пожалуйста отключите его.';
$string['ziped'] = 'Папка сжата успешно';
