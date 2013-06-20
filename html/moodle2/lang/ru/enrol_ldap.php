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

$string['bind_dn_key'] = 'Привязка отличительных имён';
$string['bind_pw'] = 'Пароль для привязки пользователей';
$string['bind_pw_key'] = 'Пароль';
$string['bind_settings'] = 'Привязка параметров';
$string['category'] = 'Категория для автоматически создаваемых курсов';
$string['course_shortname_key'] = 'Краткое название';
$string['enroluser'] = 'Записать пользователя "{$a->user_username}" на курс "{$a->course_shortname}" (id {$a->course_id})';
$string['extremovedunenrol'] = 'Исключить пользователя "{$a->user_username}" из курса "{$a->course_shortname}" (id {$a->course_id})';
$string['general_options'] = 'Общие настройки';
$string['host_url'] = 'Укажите сервер LDAP в формате URL, например \'ldap://ldap.myorg.com/\' или \'ldaps://ldap.myorg.com/\'.';
$string['host_url_key'] = 'URL сервера';
$string['ldap_encoding'] = 'Укажите кодировку LDAP сервера. Скорее всего это UTF-8, MS AD v2 использует платформенную кодировку по умолчанию, такую как cp1252, cp1250 и т. д.';
$string['ldap_encoding_key'] = 'Кодировка LDAP';
$string['pluginname'] = 'Зачисление из LDAP';
$string['pluginname_desc'] = '<p>Вы можете использовать LDAP сервер для управления регистрацией. Предполагается, что структура LDAP содержит группы, которые соответствуют курсам, и что каждая из этих групп/курсов содержит записи соответствующих студентов.</p><p>Предполагается, что курсы определяются как группы LDAP, с несколькими полями, соответствующими членам (<em>member</em> или <em>memberUid</em>), содержащими уникальные числовые идентификаторы пользователей.</p><p>Для использования LDAP регистрации, пользователи <strong> должны</strong> иметь действующий числовой идентификатор. Группы в LDAP должны иметь поля, содержащие числовые идентификаторы пользователей, записываемых на курс. Как правило, это будет хорошо работать, если Вы уже используете LDAP-аутентификацию.</p><p>Контингент учащихся будет обновляться при входе пользователей в систему. Вы также можете запустить скрипт, синхронизирующий учащихся. Смотрите <em>enrol/ldap/cli/sync.php</em>.</p><p>Этот плагин также может быть настроен на автоматическое создание новых курсов при появлении новых групп в LDAP.</p>';
$string['server_settings'] = 'Параметры сервера LDAP';
$string['user_type'] = 'Если состав группы содержит различающиеся имена, указать способ хранения пользователей в LDAP';
$string['version'] = 'Версия протокола LDAP, используемая сервером';
$string['version_key'] = 'Версия';
