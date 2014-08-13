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
 * Strings for component 'bigbluebuttonbn', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   bigbluebuttonbn
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bbbduetimeoverstartingtime'] = 'Время окончания должно быть позже времени начала';
$string['bbbdurationwarning'] = 'Максимальная продолжительность этого сеанса - %duration% мин.';
$string['bbbfinished'] = 'Эта видеоконференция более недоступна.';
$string['bbbnorecordings'] = 'Нет записей этой видеоконференции, зайдите позже.';
$string['bbbnotavailableyet'] = 'Извините, но эта видеоконференция пока недоступна.';
$string['bbbrecordwarning'] = 'Этот сеанс записывается.';
$string['bbburl'] = 'URL Вашего сервера BigBlueButton должен заканчиваться на /bigbluebutton/. (Значение по умолчанию - это URL предоставленного компанией Blindside Networks сервера BigBlueButton, который Вы можете использовать для тестирования)';
$string['bigbluebuttonbn'] = 'BigBlueButton';
$string['bigbluebuttonbn:addinstance'] = 'Создавать новое собрание';
$string['bigbluebuttonbn:join'] = 'Участвовать в собрании';
$string['bigbluebuttonbn:moderate'] = 'Руководить собранием';
$string['bigbluebuttonbnSalt'] = 'Секретный ключ сервера BigBlueButton';
$string['bigbluebuttonbnUrl'] = 'URL сервера BigBlueButton';
$string['configsecuritysalt'] = 'Значение ключа «Security salt» сервера BigBlueButton. (Значение по умолчанию - это ключ для предоставленного компанией Blindside Networks сервера BigBlueButton, который Вы можете использовать для тестирования).';
$string['general_error_unable_connect'] = 'Невозможно подключится к серверу. Проверьте URL сервера BigBlueButton и убедитесь, что сервер BigBlueButton работает.';
$string['index_confirm_end'] = 'Вы хотите завершить это собрание?';
$string['index_enabled'] = 'включена';
$string['index_ending'] = 'Идет завершение собрания... Пожалуйста, подождите';
$string['index_error_checksum'] = 'Ошибка контрольной суммы. Убедитесь, что Вы ввели правильный секретный ключ сервера.';
$string['index_error_forciblyended'] = 'Невозможно принять участие в этом собрании, поскольку оно было принудительно завершено.';
$string['index_error_unable_display'] = 'Невозможно отобразить собрание. Проверьте URL сервера BigBlueButton и убедитесь, что сервер BigBlueButton работает.';
$string['index_heading'] = 'Видеоконференции BigBlueButton';
$string['index_heading_actions'] = 'Действия';
$string['index_heading_group'] = 'Группа';
$string['index_heading_moderator'] = 'Руководители';
$string['index_heading_name'] = 'Собрание';
$string['index_heading_recording'] = 'Запись';
$string['index_heading_users'] = 'Пользователей';
$string['index_heading_viewer'] = 'Участники';
$string['mod_form_block_general'] = 'Основные настройки';
$string['mod_form_block_record'] = 'Настройки записи';
$string['mod_form_block_schedule'] = 'Расписание сеансов';
$string['mod_form_field_availabledate'] = 'Вход открыт с';
$string['mod_form_field_description'] = 'Описание записанного сеанса';
$string['mod_form_field_duedate'] = 'Вход закрыт после';
$string['mod_form_field_duration'] = 'Продолжительность';
$string['mod_form_field_duration_help'] = 'Установка продолжительности позволяет ограничить максимальное время собрания';
$string['mod_form_field_name'] = 'Название виртуального собрания';
$string['mod_form_field_newwindow'] = 'Открывать BigBlueButton в новом окне';
$string['mod_form_field_record'] = 'Вести запись';
$string['mod_form_field_wait'] = 'Участники должны ожидать входа руководителя';
$string['mod_form_field_welcome'] = 'Приветственное сообщение';
$string['mod_form_field_welcome_default'] = '<br>Добро пожаловать на собрание <b>«%%CONFNAME%%»</b>!<br><br>Чтобы разобраться, как пользоваться системой BigBlueButton, Вы можете посмотреть <a href="event:http://www.bigbluebutton.org/content/videos"><u>обучающие видео</u></a> (на английском языке).<br><br>Для участия в аудиоконференции нажмите на изображение головной гарнитуры (наушников) в верхнем левом углу. <b>Пожалуйста, используйте гарнитуру, чтобы  уберечь себя и других от неприятного гула.</b>';
$string['mod_form_field_welcome_help'] = 'Можно заменить стандартное сообщение, настроенное для сервера BigBlueButton. Сообщение может содержать подстановки (%%CONFNAME%% - название конференции, %%DIALNUM%% - номер телефона, %%CONFNUM%% - номер конференции), а также тэги html, например &lt;b&gt;...&lt;/b&gt; или &lt;i&gt;...&lt;/i&gt;.';
$string['modulename'] = 'Видеоконференция BigBlueButton';
$string['modulename_help'] = 'Модуль «Видеоконференция BigBlueButton» позволяет создавать в Moodle ссылки на виртуальные онлайн собрания в BigBlueButton - системе с открытым исходным кодом для проведения веб-конференций для дистанционного обучения.

Используя этот модуль, Вы можете указать название, описание, событие календаря (диапазон дат, в который возможно участие), группы и параметры записи онлайн сеанса.

Чтобы, в дальнейшем, просмотреть записи, добавьте в курс ресурс типа «Записи видеоконференций BigBlueButton».';
$string['modulenameplural'] = 'Видеоконференции BigBlueButton';
$string['pluginadministration'] = 'Управление модулем «Видеоконференция BigBlueButton»';
$string['pluginname'] = 'Видеоконференция BigBlueButton';
$string['view_error_unable_join'] = 'Невозможно присоединиться к собранию. Проверьте URL сервера BigBlueButton и убедитесь, что сервер BigBlueButton работает.';
$string['view_error_unable_join_student'] = 'Невозможно подключиться к серверу BigBlueButton. Пожалуйста, свяжитесь с учителем или администратором.';
$string['view_error_unable_join_teacher'] = 'Невозможно подключиться к серверу BigBlueButton. Пожалуйста, свяжитесь с администратором.';
$string['view_groups_selection'] = 'Выберите группу, к которой Вы хотите присоединиться и нажмите «Войти»';
$string['view_groups_selection_join'] = 'Войти';
$string['view_login_moderator'] = 'Вход в качестве руководителя ...';
$string['view_login_viewer'] = 'Вход в качестве участника ...';
$string['view_noguests'] = 'Гости не могут участвовать в видеоконференции BigBlueButton';
$string['view_nojoin'] = 'У Вас недостаточно прав для участия в этом сеансе';
$string['view_recording_list_actionbar'] = 'Действия';
$string['view_recording_list_actionbar_delete'] = 'Удалить';
$string['view_recording_list_actionbar_hide'] = 'Скрыть';
$string['view_recording_list_actionbar_show'] = 'Отобразить';
$string['view_recording_list_activity'] = 'Элемент курса';
$string['view_recording_list_course'] = 'Курс';
$string['view_recording_list_date'] = 'Дата';
$string['view_recording_list_description'] = 'Описание';
$string['view_recording_list_duration'] = 'Продолжительность';
$string['view_recording_list_recording'] = 'Запись';
$string['view_wait'] = 'Это виртуальное собрание еще не началась. Ожидание входа руководителя ...';
