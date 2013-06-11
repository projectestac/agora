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
 * Strings for component 'auth_ldap', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_bind_dn'] = 'Если Вы хотите связанного пользователя для поиска пользователей, укажите это здесь. Например, \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Отличительное имя';
$string['auth_ldap_bind_pw'] = 'Пароль для связывания пользователя.';
$string['auth_ldap_bind_pw_key'] = 'Пароль';
$string['auth_ldap_bind_settings'] = 'Привязка параметров';
$string['auth_ldap_changepasswordurl_key'] = 'Адрес страницы смены пароля';
$string['auth_ldap_contexts'] = 'Список контекстов, где расположены пользователи . Отделите различные контексты \';\'. Например: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_create_context'] = 'Если Вы разрешили создание пользователей при подтверждении по почте, определите контекст, в который будут заводиться пользователи. Этот контекст должен отличаться от других, чтобы предотвратить проблемы безопасности. Нет необходимости добавлять, название контекста к ldap_context-переменным, система будет искать пользователей от этого контекста автоматически.';
$string['auth_ldap_creators'] = 'Список групп, членам которых разрешается создавать новые курсы. Список групп разделяйте с помощью \';\'. Например,\'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldapdescription'] = 'Этот метод обеспечивает аутентификацию с помощью LDAP-сервера. Если данный логин и пароль имеют силу, создаётся новая пользовательская учётная запись в базе данных системы. Этот модуль может читать поля от LDAP-сервера и заполнять требуемые области (поля) в системе. В дальнейшем проверяются только логин и пароль';
$string['auth_ldap_expiration_desc'] = 'Выберите "Нет" для отключения проверки истечения срока действия пароля или "LDAP" для чтения срока действия пароля прямо из LDAP';
$string['auth_ldap_expiration_warning_desc'] = 'За сколько дней предупреждать об истечении срока действия пароля.';
$string['auth_ldap_expireattr_desc'] = 'Дополнительно: перезапись LDAP-атрибута, в котором хранится время истечения срока действия пароля';
$string['auth_ldapextrafields'] = 'Эти поля дополнительные. Вы можете выбрать предварительное заполнение некоторых полей пользовательских данных от полей LDAP, указанного здесь. <p>Не заполняйте это поле, для того чтобы не переносить данные с LDAP.</p><p>В любом случае, пользователь сможет редактировать все поля после того, как он зайдет в систему.</p>';
$string['auth_ldap_gracelogin_key'] = 'Атрибут для попыток входа по истёкшим паролям';
$string['auth_ldap_gracelogins_desc'] = 'Включить поддержку попыток входа по истёкшим LDAP паролям. После истечения срока действия пароля пользователь сможет входить до тех пор, пока счётчик попыток не уменьшится до 0. При включенном параметре при истечении срока действия пароля пользователю отображается сообщение.';
$string['auth_ldap_gracelogins_key'] = 'Попытки входа по истёкшим паролям';
$string['auth_ldap_host_url'] = 'Укажите сервер LDAP в формате URL, например \'ldap://ldap.myorg.com/\' или \'ldaps://ldap.myorg.com/\'. Для обеспечения бесперебойной работы можно указать несколько серверов, разделив их знаком ";".';
$string['auth_ldap_host_url_key'] = 'URL сервера';
$string['auth_ldap_ldap_encoding'] = 'Укажите кодировку LDAP сервера. Скорее всего это UTF-8, MS AD v2 использует платформенную кодировку по умолчанию, такую как cp1252, cp1250 и т. д.';
$string['auth_ldap_ldap_encoding_key'] = 'Кодировка LDAP';
$string['auth_ldap_memberattribute'] = 'Определите пользовательский атрибут, определяющий принадлежность пользователя к группе. Обычно \'участник\'';
$string['auth_ldap_passtype'] = 'Укажите формат для новых или измененных паролей на сервере LDAP.';
$string['auth_ldap_passtype_key'] = 'Формат пароля';
$string['auth_ldap_passwdexpire_settings'] = 'Настройки срока действия пароля LDAP.';
$string['auth_ldap_preventpassindb'] = 'Выберите "Да", чтобы предотвратить сохранение паролей в БД Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Скрытие паролей';
$string['auth_ldap_search_sub'] = 'Укажите значения <> 0 если Вам нравится искать пользователей по субконтекстам.';
$string['auth_ldap_server_settings'] = 'Параметры сервера LDAP';
$string['auth_ldap_update_userinfo'] = 'Обновляйте пользовательскую информацию (Имя, Фамилию, адрес ..) от LDAP до системы. Смотрите /auth/ldap/attr_mappings.php для того, чтобы отобразить информацию.';
$string['auth_ldap_user_attribute'] = 'Атрибут, используемый для имя/поиск. Обычно, \'cn\'.';
$string['auth_ldap_user_type'] = 'Выберите, каким образом пользователи хранятся в LDAP. Этот параметр также определяет, как будут работать механизмы создания пользователей и входа по истёкшим паролям.';
$string['auth_ldap_version'] = 'Версия LDAP протокола, которую использует Ваш сервер.';
$string['auth_ldap_version_key'] = 'Версия';
$string['didntfindexpiretime'] = 'password_expire() не найден срок действия.';
$string['needbcmath'] = 'Вам нужно расширение BCMath, для использования возможности входа по просроченным паролям при хранении пользователей в Active Directory';
$string['needmbstring'] = 'Вам нужно расширение mbstring, для возможности смены паролей в Active Directory';
$string['nodnforusername'] = 'Ошибка в user_update_password(). Нет DN для: {$a->username}';
$string['noemail'] = 'Отправить вам письмо не удалось!';
$string['pluginname'] = 'Сервер LDAP';
$string['updatepasserror'] = 'Ошибка в user_update_password(). Код ошибки: {$a->errno}; Описание ошибки: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Ошибка в user_update_password() при чтении срока действия пароля. Код ошибки: {$a->errno}; Описание ошибки: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Ошибка в user_update_password() при изменении срока действия пароля и/или задании возможности входа при просроченном пароле. Код ошибки: {$a->errno}; Описание ошибки: {$a->errstring}';
