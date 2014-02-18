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
 * Strings for component 'enrol_ldap', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Назначение роли «{$a->role_shortname}» пользователю «{$a->user_username}» в курсе «{$a->course_shortname}» (ID {$a->course_id})';
$string['assignrolefailed'] = 'Не удалось назначить роль
«{$a->role_shortname}» пользователю «{$a->user_username}» в курсе «{$a->course_shortname}» (ID {$a->course_id})';
$string['autocreate'] = '<p> Курсы могут создаваться автоматически при зачислении на курс, которого еще не существует в Moodle. </p><p> Если используется автоматическое создание курса, то у соответствующих ролей рекомендуется удалить следующие возможности: moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname и moodle/course:changesummary для предотвращения изменения четырех вышеуказанных полей курса (идентификационный номер, краткое название, полное название и описание). </p>';
$string['autocreate_key'] = 'Автоматическое создание';
$string['autocreation_settings'] = 'Параметры автоматического создания курса';
$string['bind_dn'] = 'Если Вы хотите использовать характеристики пользователя для поиска пользователей, укажите их здесь. Например: «cn=ldapuser,ou=public,o=org»';
$string['bind_dn_key'] = 'Привязка отличительных имен';
$string['bind_pw'] = 'Пароль для привязки пользователей';
$string['bind_pw_key'] = 'Пароль';
$string['bind_settings'] = 'Привязка параметров';
$string['cannotcreatecourse'] = 'Не удалось создать курс: в записи LDAP отсутствуют необходимые данные!';
$string['category'] = 'Категория для автоматически создаваемых курсов';
$string['category_key'] = 'Категория';
$string['contexts'] = 'Контексты LDAP';
$string['couldnotfinduser'] = 'Не удалось найти пользователя «{$a}», пропущено';
$string['course_fullname'] = 'Дополнительно: атрибут LDAP для получения полного названия курса';
$string['course_fullname_key'] = 'Полное название';
$string['course_idnumber'] = 'Атрибут LDAP для получения ID курса. Обычно «CN» или «UID».';
$string['course_idnumber_key'] = 'ID курса';
$string['coursenotexistskip'] = 'Курс «{$a}» не существует и автоматическое создание отключено; пропущено';
$string['course_search_sub'] = 'Искать членство в группе на уровне подконтекстов';
$string['course_search_sub_key'] = 'Поиск в подконтекстах';
$string['course_settings'] = 'Настройки зачисления на курс';
$string['course_shortname'] = 'Дополнительно: атрибут LDAP для получения краткого названия курса';
$string['course_shortname_key'] = 'Краткое название';
$string['course_summary'] = 'Дополнительно: атрибут LDAP для получения описания курса';
$string['course_summary_key'] = 'Описание';
$string['createcourseextid'] = 'Создать зачисленного пользователя в несуществующем курсе «{$a->courseextid}»';
$string['createnotcourseextid'] = 'Зачисленный пользователь в несуществующем курсе «{$a->courseextid}»';
$string['creatingcourse'] = 'Создание курса «{$a}» ...';
$string['duplicateshortname'] = 'Ошибка создания курса - дублируется  короткое имя. Курс с ID-номером «{$a->idnumber}» пропущен…';
$string['emptyenrolment'] = 'Никто не зачислен с ролью «{$a->role_shortname}» в курсе «{$a->course_shortname}»';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Записать пользователя «{$a->user_username}» на курс «{$a->course_shortname}» (id {$a->course_id})';
$string['enroluserenable'] = 'Разрешено зачисление пользователя «{$a->user_username}» на курс «{$a->course_shortname}» (ID {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group () не поддерживает выбранный тип пользователя: {$a}';
$string['extcourseidinvalid'] = 'ID внешнего курса является недействительным!';
$string['extremovedsuspend'] = 'Отменить зачисление пользователя «{$a->user_username}» в курсе «{$a->course_shortname}» (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Отменить зачисление и удалить роли пользователя «{$a->user_username}» в курсе «{$a->course_shortname}» (id {$a->course_id})';
$string['extremovedunenrol'] = 'Исключить пользователя «{$a->user_username}» из курса «{$a->course_shortname}» (id {$a->course_id})';
$string['failed'] = 'Неудачно!';
$string['general_options'] = 'Общие настройки';
$string['group_memberofattribute'] = 'Имя атрибута, который задает, участником каких(ой) групп(ы) является данный пользователь (например, MemberOf, groupMembership и т.п.)';
$string['group_memberofattribute_key'] = 'Атрибут «Участник ...»';
$string['host_url'] = 'Укажите сервер LDAP в формате URL, например \'ldap://ldap.myorg.com/\' или \'ldaps://ldap.myorg.com/\'.';
$string['host_url_key'] = 'URL сервера';
$string['idnumber_attribute'] = 'Если членство в группе содержит различающиеся имена, то использовать тот же атрибут «ID-номер», который сопоставлен в параметрах LDAP-аутентификации';
$string['idnumber_attribute_key'] = 'Атрибут «ID-номер»';
$string['ldap_encoding'] = 'Укажите кодировку LDAP сервера. Скорее всего это UTF-8, MS AD v2 использует платформенную кодировку по умолчанию, такую как cp1252, cp1250 и т. д.';
$string['ldap_encoding_key'] = 'Кодировка LDAP';
$string['ldap:manage'] = 'Управлять зачислением из LDAP';
$string['memberattribute'] = 'Атрибут пользователя LDAP';
$string['memberattribute_isdn'] = 'Если членство в группе  содержит различающиеся имена, то необходимо указать их здесь. При этом Вы также должны настроить остальные параметры этого раздела.';
$string['memberattribute_isdn_key'] = 'Учпстник использует атрибут DN';
$string['nested_groups'] = 'Вы хотите использовать для зачисления вложенные группы (группа в группе)?';
$string['nested_groups_key'] = 'Вложенные группы';
$string['nested_groups_settings'] = 'Настройки вложенных групп';
$string['nosuchrole'] = 'Нет такой роли: «{$a}»';
$string['objectclass'] = 'Для поиска курсов использовать Класс объекта (objectClass). Обычно «group» или «posixGroup»';
$string['objectclass_key'] = 'Класс объекта';
$string['ok'] = 'OK!';
$string['opt_deref'] = 'Если членство в группе содержит различающиеся имена в виде псевдонимов, то нужно указать, как они обрабатываются при поиске. Выберите одно из следующих значений: «Нет» (LDAP_DEREF_NEVER) или «Да» (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Раскрывать псевдонимы';
$string['phpldap_noextension'] = '<em>Модуль PHP LDAP, вероятно, отсутствует. Убедитесь, что он установлен и включен, если Вы хотите использовать этот плагин зачисления.</em>';
$string['pluginname'] = 'Зачисление из LDAP';
$string['pluginname_desc'] = '<p>Вы можете использовать LDAP сервер для управления регистрацией. Предполагается, что структура LDAP содержит группы, которые соответствуют курсам, и что каждая из этих групп/курсов содержит записи соответствующих студентов.</p><p>Предполагается, что курсы определяются как группы LDAP, с несколькими полями, соответствующими членам (<em>member</em> или <em>memberUid</em>), содержащими уникальные числовые идентификаторы пользователей.</p><p>Для использования LDAP регистрации, пользователи <strong> должны</strong> иметь действующий числовой идентификатор. Группы в LDAP должны иметь поля, содержащие числовые идентификаторы пользователей, записываемых на курс. Как правило, это будет хорошо работать, если Вы уже используете LDAP-аутентификацию.</p><p>Контингент учащихся будет обновляться при входе пользователей в систему. Вы также можете запустить скрипт, синхронизирующий учащихся. Смотрите <em>enrol/ldap/cli/sync.php</em>.</p><p>Этот плагин также может быть настроен на автоматическое создание новых курсов при появлении новых групп в LDAP.</p>';
$string['pluginnotenabled'] = 'Плагин не включен!';
$string['role_mapping'] = '<p> Для каждой роли, которую Вы хотите назначить из LDAP, необходимо указать список контекстов, в которых находятся роли групп курсов. Различные контексты отделяются «;». </p><p> Кроме того, необходимо указать атрибут LDAP-сервера, используемый для хранения участников групп. Обычно «member» или «memberUid» </p>';
$string['role_mapping_attribute'] = 'Атрибут члена LDAP для {$a}';
$string['role_mapping_context'] = 'Контексты LDAP для {$a}';
$string['role_mapping_key'] = 'Карта ролей из LDAP';
$string['roles'] = 'Сопоставление роли';
$string['server_settings'] = 'Параметры сервера LDAP';
$string['synccourserole'] = '== Синхронизация курса «{$a->idnumber}» для роли «{$a->role_shortname}»';
$string['template'] = 'Дополнительно: автоматически создаваемые курсы могут копировать свои настройки из шаблона курса';
$string['template_key'] = 'Шаблон';
$string['unassignrole'] = 'Отмена назначения роли «{$a->role_shortname}» пользователя «{$a->user_username}» из курса «{$a->course_shortname}» (ID {$a->course_id})';
$string['unassignrolefailed'] = 'Не удалось отменить назначение роли «{$a->role_shortname}» пользователя «{$a->user_username}» из курса «{$a->course_shortname}» (ID {$a->course_id})';
$string['unassignroleid'] = 'Отмена назначения роли ID «{$a->role_id}» пользователю с ID «{$a->user_id}»';
$string['updatelocal'] = 'Обновление локальных данных';
$string['user_attribute'] = 'Если членство в группе содержит различающиеся имена, то укажите атрибут, использующийся для имени/поиска пользователей. При использовании LDAP-аутентификации это значение должно совпадать с значением, заданным атрибутом «ID Number» сопоставленным в плагине LDAP-аутентификации.';
$string['user_attribute_key'] = 'Атрибут ID-номер';
$string['user_contexts'] = 'Если членство в группе содержит различающиеся имена, то укажите перечень контекстов, в которых находятся пользователи. Контексты разделяйте точкой с запятой («;»). Например: «ou=users,o=org; ou=others,o=org»';
$string['user_contexts_key'] = 'Контексты';
$string['user_search_sub'] = 'Если членство в группе содержит различающиеся имена, то укажите, что поиск пользователей осуществляется также и на уровне подконтекстов.';
$string['user_search_sub_key'] = 'Поиск в подконтекстах';
$string['user_settings'] = 'Настройки поиска пользователя';
$string['user_type'] = 'Если состав группы содержит различающиеся имена, указать способ хранения пользователей в LDAP';
$string['user_type_key'] = 'Тип пользователя';
$string['version'] = 'Версия протокола LDAP, используемая сервером';
$string['version_key'] = 'Версия';
