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
 * Strings for component 'tool_uploaduser', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Разрешить удаления';
$string['allowrenames'] = 'Разрешить переименовывать';
$string['allowsuspends'] = 'Разрешить блокировку и активацию учетных записей';
$string['csvdelimiter'] = 'Разделитель для CSV';
$string['defaultvalues'] = 'Значения по умолчанию';
$string['deleteerrors'] = 'Ошибки удаления';
$string['encoding'] = 'Кодировка';
$string['errors'] = 'Ошибки';
$string['nochanges'] = 'Нет изменений';
$string['renameerrors'] = 'Ошибки переименования';
$string['requiredtemplate'] = 'Обязательный параметр. Здесь Вы можете использовать шаблон с синтакисом  (%l = Фамилия,%f = Имя,%u = логин). Подробнее смотрите в справке и примерах.';
$string['rowpreviewnum'] = 'Строк предпросмотра';
$string['uploadpicture_baduserfield'] = 'Указано некорректный атрибут пользователя. Пожалуйста, попробуйте снова.';
$string['uploadpicture_cannotmovezip'] = 'Невозможно переместить zip-файл во временный каталог.';
$string['uploadpicture_cannotprocessdir'] = 'Невозможно обработать разархивированные файлы.';
$string['uploadpicture_cannotsave'] = 'Невозможно сохранить изображение для пользователя "{$a}". Проверьте исходный файл изображения.';
$string['uploadpicture_cannotunzip'] = 'Невозможно разархивировать файл изображений.';
$string['uploadpicture_invalidfilename'] = 'Файл изображения "{$a}" содержит в названии недопустимые символы. Пропущен.';
$string['uploadpicture_overwrite'] = 'Перезаписывать существующие изображения пользователей?';
$string['uploadpictures'] = 'Загрузить изображения пользователей';
$string['uploadpictures_help'] = 'Изображения пользователей могут быть загружены как zip-архив с файлами изображений. Файлы изображений в архиве нужно назвать "атрибут.расширение". Например, если выбранный ключевой атрибут пользователя - логин, а логин пользователя - "user1234", то название файла должно быть "user1234.jpg".';
$string['uploadpicture_userfield'] = 'Ключевой атрибут пользователя для выбора соответствующих изображений:';
$string['uploadpicture_usernotfound'] = 'Пользователь со значением "{$a->uservalue}" для поля "{$->userfield}" не существует. Пропущено.';
$string['uploadpicture_userskipped'] = 'Пропущен пользователь "{$a}" (изображение уже есть).';
$string['uploadpicture_userupdated'] = 'Обновлено изображение для пользователя "{$a}".';
$string['uploadusers'] = 'Загрузить пользователей';
$string['uploadusers_help'] = 'Пользователи могут быть загружены (и, при необходимости, записаны на курсы) с помощью текстового файла. Используется следующий формат:

* Каждая строка файла содержит одну запись
* Каждая запись - ряд данных, разделенных запятыми (или другими разделителями)
* Первая запись содержит список имен полей, определяющих формат остальной части файла
* Обязательными именами полей являются: username, password, firstname, lastname, email (логин, пароль, имя, фамилия, адрес электронной почты)';
$string['uploaduserspreview'] = 'Предварительный просмотр загружаемых пользователей';
$string['uploadusersresult'] = 'Результаты загрузки пользователей';
$string['useraccountupdated'] = 'Пользователь обновлен';
$string['userdeleted'] = 'Пользователь удален';
$string['userrenamed'] = 'Пользователь переименован';
$string['userscreated'] = 'Создано пользователей';
$string['usersdeleted'] = 'Удалено пользователей';
$string['usersrenamed'] = 'Переименовано пользователей';
$string['usersskipped'] = 'Пропущено пользователей';
$string['usersupdated'] = 'Пользователи обновлены';
$string['usersweakpassword'] = 'Пользователи с простыми паролями';
$string['uubulk'] = 'Выбрать для массовых операций';
$string['uubulkall'] = 'Все пользователи';
$string['uubulknew'] = 'Новые пользователи';
$string['uubulkupdated'] = 'Обновлённые пользователи';
$string['uucsvline'] = 'Строка CSV';
$string['uulegacy1role'] = '(Изначально Студент) typeN=1';
$string['uulegacy2role'] = '(Изначально Преподаватель) typeN=2';
$string['uulegacy3role'] = '(Изначально Ассистент) typeN=3';
$string['uunoemailduplicates'] = 'Запретить повторяющиеся адреса электронной почты';
$string['uuoptype'] = 'Тип загрузки';
$string['uuoptype_addinc'] = 'Добавить всех, при необходимости добавлять номер к логину';
$string['uuoptype_addnew'] = 'Добавить новых, пропустить существующих пользователей';
$string['uuoptype_addupdate'] = 'Добавить новых и обновить существующих пользователей';
$string['uuoptype_update'] = 'Только обновить существующих пользователей';
$string['uupasswordnew'] = 'Пароли новых пользователей';
$string['uupasswordold'] = 'Пароли существующих пользователей';
$string['uuupdateall'] = 'Заменять данными из файла и значениями по умолчанию';
$string['uuupdatefromfile'] = 'Заменять данными из файла';
$string['uuupdatemissing'] = 'Заполнить пустые поля данными из файла и значениями по умолчанию';
$string['uuupdatetype'] = 'Данные существующих пользователей';
$string['uuusernametemplate'] = 'Шаблон логина';
