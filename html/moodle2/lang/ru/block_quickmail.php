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
 * Strings for component 'block_quickmail', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   block_quickmail
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Действия';
$string['add_all'] = 'Добавить все';
$string['add_button'] = 'Добавить';
$string['allowstudents'] = 'Разрешить студентам использовать Быструю почту';
$string['all_sections'] = 'Все разделы';
$string['alternate'] = 'Альтернативные электронные почты';
$string['alternate_body'] = '<p> {$a->fullname} добавил(а) адрес {$a->address} в качестве альтернативного адреса для курса {$a->course}. </p><p> Это письмо используется для проверки, что этот адрес существует, и владелец этого адреса имеет соответствующие полномочия в Moodle. </p><p> Если вы хотите завершить проверку, то перейдите в браузере по следующему адресу: {$a->url}. </p><p> Если содержание этого письма для вас не имеет никакого смысла, то, возможно, вы получили его по ошибке. Просто удалите это письмо. </p> Спасибо.';
$string['alternate_from'] = 'Moodle: Быстрая почта';
$string['alternate_new'] = 'Добавить альтернативный адрес';
$string['alternate_subject'] = 'Альтернативный адрес подтвержден';
$string['approved'] = 'Подтвержден';
$string['are_you_sure'] = 'Вы действительно хотите удалить {$a->title}? Это действие не может быть отменено.';
$string['attachment'] = 'Приложение(я)';
$string['backup_history'] = 'Включить историю Быстрой почты';
$string['composenew'] = 'Создать новое письмо';
$string['config'] = 'Настройки';
$string['courselayout'] = 'Расположение курса';
$string['default_flag'] = 'по умолчанию';
$string['delete_confirm'] = 'Вы уверены, что хотите удалить сообщение со следующими данными: {$a}';
$string['delete_failed'] = 'Не удалось удалить электронную почту';
$string['download_all'] = 'Скачать все';
$string['drafts'] = 'Просмотреть черновики';
$string['email'] = 'Электронная почта';
$string['entry_activated'] = 'Альтернативная электронная почта {$a->address} теперь может быть использована в курсе {$a->course}.';
$string['entry_failure'] = 'Электронная почта не может быть отправлена по адресу {$a->address}. Пожалуйста, убедитесь, что {$a->address} существует и повторите попытку.';
$string['entry_key_not_valid'] = 'Ссылка активации больше не действительна для {$a->address}. Повторно вышлите ссылку активации.';
$string['entry_saved'] = 'Альтернативный адрес {$a->address} был сохранен.';
$string['entry_success'] = 'Письмо с подтверждением было отправлено на электронный адрес {$a->address}. Инструкция по активации содержится в письме.';
$string['from'] = 'От';
$string['history'] = 'Показать историю';
$string['log'] = 'Показать историю';
$string['message'] = 'Сообщение';
$string['moodle_attachments'] = 'Вложения Moodle ({$a})';
$string['no_alternates'] = 'Нет альтернативной электронной почты для {$a->fullname}.';
$string['no_course'] = 'Нет курса с идентификатором {$a}';
$string['no_drafts'] = 'У вас нет черновиков электронных писем';
$string['no_email'] = 'Не удалось отправить электронное письмо для {$a->firstname} {$a->lastname}.';
$string['no_filter'] = 'Без фильтра';
$string['no_log'] = 'У вас нет истории отправки электронной почты';
$string['no_permission'] = 'У вас нет разрешения на отправку сообщений электронной почтой.';
$string['no_section'] = 'Не в разделе';
$string['no_selected'] = 'Вы должны выбрать пользователей';
$string['no_subject'] = 'Вы должны указать тему';
$string['not_valid_action'] = 'Вы должны разрешить действие {$a}';
$string['not_valid_typeid'] = 'Вы должны предоставить действующий адрес электронной почты для {$a}';
$string['not_valid_user'] = 'Вы не можете просматривать чужие истории электронной почты.';
$string['no_type'] = '{$a} не находится в приемлемом для просмотра виде. Пожалуйста, используйте приложение правильно.';
$string['no_usergroups'] = 'Нет пользователей в группе, которые могли бы получить электронную почту';
$string['no_users'] = 'Нет пользователей, способных получить электронную почту';
$string['overwrite_history'] = 'Переписать историю Быстрой почты';
$string['pluginname'] = 'Быстрая почта';
$string['potential_sections'] = 'Потенциальные Разделы';
$string['potential_users'] = 'Потенциальные Получатели';
$string['prepend_class'] = 'Прикрепить Название курса';
$string['prepend_class_desc'] = 'Прикрепить короткое название курса к письму';
$string['qm_contents'] = 'Скачать прикрепленные файлы';
$string['quickmail:addinstance'] = 'Добавлять новый блок Быстрая почта';
$string['quickmail:allowalternate'] = 'Добавлять альтернативный адрес электронной почты для разных курсов.';
$string['quickmail:canconfig'] = 'Настраивать Быструю почту';
$string['quickmail:candelete'] = 'Удалять письма из истории.';
$string['quickmail:canimpersonate'] = 'Входить в систему от имени других пользователей и просматривать их историю.';
$string['quickmail:cansend'] = 'Отправлять электронную почту через Быструю почту';
$string['receipt'] = 'Получить копию';
$string['receipt_help'] = 'Получать копии отправляемой электронной почты';
$string['remove_all'] = 'Удалить все';
$string['remove_button'] = 'Удалить';
$string['required'] = 'Пожалуйста, заполните необходимые поля.';
$string['reset'] = 'Восстановление настроек по умолчанию';
$string['restore_history'] = 'Восстановление истории Быстрой почты';
$string['role_filter'] = 'Фильтр ролей';
$string['save_draft'] = 'Сохранить черновик';
$string['selected'] = 'Выбранные получатели';
$string['select_groups'] = 'Выберите разделы ...';
$string['select_roles'] = 'Фильтрация ролей по';
$string['select_users'] = 'Выбор пользователей ...';
$string['send_email'] = 'Отправить электронную почту';
$string['sig'] = 'Подпись';
$string['signature'] = 'Подписи';
$string['strictferpa'] = 'Всегда Отдельные группы';
$string['subject'] = 'Тема';
$string['sure'] = 'Вы уверены, что хотите удалить {$a->address}? Это действие не может быть отменено.';
$string['title'] = 'Название';
$string['valid'] = 'Состояние активации';
$string['waiting'] = 'Ожидание';
