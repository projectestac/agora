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
 * Strings for component 'enrol_idlist2', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_idlist2
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enrol_idlist2_authlist'] = 'Список одобренных значений';
$string['enrol_idlist2_authlist_help'] = 'Это перечень разрешенных значений. Получается путем извлечения данных из предыдущего поля путем применения регулярного выражения';
$string['enrol_idlist2_authorized'] = 'Разрешенные пользователи';
$string['enrol_idlist2_authorized_help'] = 'Имя этого экземпляра плагина записи на курс';
$string['enrol_idlist2_campo'] = 'Поле';
$string['enrol_idlist2_campo_help'] = 'Это название поля, используемого для проверки пользователя';
$string['enrol_idlist2_idattr'] = 'Атрибут студента, используемый в качестве идентификатора';
$string['enrol_idlist2_listadeid'] = 'Разрешенные пользователи';
$string['enrol_idlist2_listadeid_help'] = 'Вставьте сюда список значений, с которыми следует осуществлять сравнение.

Например, скопируйте и вставьте сюда спосок пользователей, которым разрешен доступ к этому курсу (идентификатор, имя, ...)';
$string['enrol_idlist2_regexp'] = 'Регулярное выражение';
$string['enrol_idlist2_regexp_help'] = 'Регулярное выражение для проверки пользователя.

Значение по умолчанию: [0-9] [0-9] [0-9] [0-9] +';
$string['enrol_idlist2_settinghead'] = 'Плагин записи на курс IDList2';
$string['enrol_idlist2_settinginfo'] = 'Этому плагину не требуются глобальные настройки';
$string['enrol_idlist2_unauthorized'] = 'Список запрещенных пользователей';
$string['enrol_idlist2_unauthorized_help'] = 'Это список пользователей, которые записаны на этот курс, но не проходят проверку по списку разрешенных пользователей.';
$string['enrol_idlist2_userpicture'] = 'Изображение';
$string['enrol_idlist2_userregexp'] = 'Применять регулярное выражние к значению поля';
$string['enrol_idlist2_userregexp_help'] = 'Применять регулярное выражение перед сравнением не только к списку, но и к значению поля пользователя';
$string['enrolment_id_error'] = 'Похоже, что Вы не входите в список записанных на курс пользователей. Пожалуйста, свяжитесь с Вашим учителем, если считаете, что произошла ошибка.';
$string['pluginname'] = 'IDList2';
$string['pluginname_desc'] = 'Это способ записи студентов на курс в соответствии со списком идентификаторов.';
