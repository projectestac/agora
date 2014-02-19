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

$string['auth_ldap_ad_create_req'] = 'Не удается создать новую учетную запись в Active Directory. Убедитесь, что соблюдены все требования, необходимые для этой операции (соединение по протоколу LDAPS, достаточные права пользователя и т.д.)';
$string['auth_ldap_attrcreators'] = 'Список групп или контейнеров, членам которых позволено создавать атрибуты. Чтобы указать несколько групп, используйте разделитель «;». Обычно это что-то вроде «cn=teachers, ou=staff, o=myorg».';
$string['auth_ldap_attrcreators_key'] = 'Создатели атрибутов';
$string['auth_ldap_auth_user_create_key'] = 'Создание пользователей во внешнем источнике';
$string['auth_ldap_bind_dn'] = 'Если для поиска пользователей требуется особый пользователь, укажите здесь его отличительное имя (DN, DistinguishedName). Например, «cn=ldapuser,ou=public,o=org»';
$string['auth_ldap_bind_dn_key'] = 'Отличительное имя';
$string['auth_ldap_bind_pw'] = 'Пароль для указанного пользователя';
$string['auth_ldap_bind_pw_key'] = 'Пароль';
$string['auth_ldap_bind_settings'] = 'Параметры подключения';
$string['auth_ldap_changepasswordurl_key'] = 'Адрес страницы смены пароля';
$string['auth_ldap_contexts'] = 'Список контейнеров, в которых хранятся учетные записи пользователей. Чтобы указать несколько контейнеров, используйте разделитель «;». Например: «ou=users,o=org; ou=others,o=org».';
$string['auth_ldap_contexts_key'] = 'Контейнеры';
$string['auth_ldap_create_context'] = 'Если Вы разрешили создание пользователей с подтверждением по электронной почте, укажите контейнер, в котором будут создаваться новые пользователи. Этот контейнер должен отличаться от других, чтобы избежать проблем, связанных с безопасностью. Нет необходимости повторно указывать этот контейнер в поле «Контейнеры», Moodle будет автоматически осуществлять поиск и в этом контейнере.';
$string['auth_ldap_create_context_key'] = 'Контейнер для новых пользователей';
$string['auth_ldap_create_error'] = 'Ошибка при создании пользователя в LDAP.';
$string['auth_ldap_creators'] = 'Список групп или контейнеров, членам которых разрешается создавать новые курсы. Чтобы указать несколько групп, используйте разделитель «;». Например,«cn=teachers,ou=staff,o=myorg».';
$string['auth_ldap_creators_key'] = 'Создатели курсов';
$string['auth_ldapdescription'] = 'Этот метод обеспечивает аутентификацию пользователя на сервере LDAP. Если пользователем указаны корректные логин и пароль, в базе данных Moodle создается новая пользовательская учетная запись. Этот модуль может считывать атрибуты пользователя из cервера LDAP и заполнять поля в Moodle. При дальнейших входах в систему на LDAP сервере будут проверяться только логин и пароль.';
$string['auth_ldap_expiration_desc'] = 'Выберите «no» для отключения проверки срока действия пароля или «LDAP» для получения срока действия пароля с сервера LDAP';
$string['auth_ldap_expiration_key'] = 'Срок действия пароля';
$string['auth_ldap_expiration_warning_desc'] = 'За сколько дней предупреждать об окончании срока действия пароля.';
$string['auth_ldap_expiration_warning_key'] = 'Предупреждение об окончании срока действия пароля';
$string['auth_ldap_expireattr_desc'] = 'Необязательный параметр. Позволяет переопределить атрибут, в котором хранится время окончания срока действия пароля';
$string['auth_ldap_expireattr_key'] = 'Атрибут окончания срока действия пароля';
$string['auth_ldapextrafields'] = 'Эти поля необязательные. Вы можете заполнить  некоторые поля пользователя данными, полученными с сервера LDAP.<p>Если не заполнять эти поля, будут использоваться значения по умолчанию, установленные в Moodle. </p><p>В любом случае, пользователь сможет редактировать эти поля после того, как зайдет в систему.</p>';
$string['auth_ldap_graceattr_desc'] = 'Необязательный параметр. Позволяет переопределить атрибут, в котором хранится число оставшихся попыток входа по просроченному паролю';
$string['auth_ldap_gracelogin_key'] = 'Атрибут для числа попыток входа по просроченному паролю';
$string['auth_ldap_gracelogins_desc'] = 'Включить поддержку входа по просроченным паролям. После того, как срок действия пароля закончился, пользователь сможет входить в систему до тех пор, пока счетчик не уменьшится до 0. При включеннии этого параметра пользователю, входящему по просроченному пароля, будет отображаться специальное сообщение.';
$string['auth_ldap_gracelogins_key'] = 'Вход по просроченным паролям';
$string['auth_ldap_groupecreators'] = 'Список групп или контейнеров, членам которых позволено создавать группы. Разделитель для несколько групп - « ; ». Обычно это что-то вроде «cn=teachers,ou=staff,o=myorg»';
$string['auth_ldap_groupecreators_key'] = 'Создатели групп';
$string['auth_ldap_host_url'] = 'Укажите сервер LDAP в формате URL, например \'ldap://ldap.myorg.com/\' или \'ldaps://ldap.myorg.com/\'. Для обеспечения бесперебойной работы можно указать несколько серверов, разделив их знаком «;».';
$string['auth_ldap_host_url_key'] = 'URL сервера';
$string['auth_ldap_ldap_encoding'] = 'Укажите кодировку, используемую сервером LDAP. Наиболее вероятно, что это «UTF-8». В Microsoft Active Directory v2 по умолчанию используется такая кодировка как cp1250, cp1251 и т. п.';
$string['auth_ldap_ldap_encoding_key'] = 'Кодировка LDAP';
$string['auth_ldap_login_settings'] = 'Настройки входа';
$string['auth_ldap_memberattribute'] = 'Необязательный параметр. Позволяет переопределить атрибут, отвечающий за принадлежность пользователя к группе. Обычно это «member»';
$string['auth_ldap_memberattribute_isdn'] = 'Необязательный параметр.
Позволяет извлекать информацию о членстве из отличительного имени (DN), а не из соответствующего атрибута. Возможные значения - 0 (Нет) и 1 (Да).';
$string['auth_ldap_memberattribute_isdn_key'] = 'Использовать DN для определения членства';
$string['auth_ldap_memberattribute_key'] = 'Атрибут членства в группе';
$string['auth_ldap_noconnect'] = 'LDAP-модуль не сможет подключиться к серверу: {$a}';
$string['auth_ldap_noconnect_all'] = 'LDAP-модуль не может подключиться ни к одному из серверов: {$a}';
$string['auth_ldap_noextension'] = '<em>Похоже, что модуль LDAP языка PHP отсутствует. Пожалуйста, убедитесь, что он установлен и включен, если Вы хотите использовать этот плагин аутентификации.</em>';
$string['auth_ldap_no_mbstring'] = 'Для того, чтобы создавать пользователей в Active Directory необходимо установленное расширение mbstring языка PHP.';
$string['auth_ldapnotinstalled'] = 'Невозможно использовать аутентификацию на сервере LDAP. Модуль LDAP языка PHP не установлен.';
$string['auth_ldap_objectclass'] = 'Необязательный параметр. Позволяет переопределить атрибут objectClass, который используется для поиска и обозначения учетных записей пользователей. В большинстве случаев не нужно настраивать этот параметр.';
$string['auth_ldap_objectclass_key'] = 'Класс объекта';
$string['auth_ldap_opt_deref'] = 'Определяет, каким образом псевдонимы (alias) обрабатываются во время поиска. Выберите одно из следующих значений: «Нет» (LDAP_DEREF_NEVER) или «Да» (LDAP_DEREF_ALWAYS).';
$string['auth_ldap_opt_deref_key'] = 'Учитывать псевдонимы';
$string['auth_ldap_passtype'] = 'Укажите формат для новых или измененных паролей на сервере LDAP.';
$string['auth_ldap_passtype_key'] = 'Формат пароля';
$string['auth_ldap_passwdexpire_settings'] = 'Настройки срока действия пароля LDAP';
$string['auth_ldap_preventpassindb'] = 'Выберите «Да», чтобы предотвратить сохранение паролей в базе данных Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Не хранить пароли';
$string['auth_ldap_search_sub'] = 'Укажите «Да», если необходимо осуществлять поиск пользователей в дочерних контейнерах.';
$string['auth_ldap_search_sub_key'] = 'Поиск в дочерних контейнерах';
$string['auth_ldap_server_settings'] = 'Параметры сервера LDAP';
$string['auth_ldap_unsupportedusertype'] = 'Аутентификация: LDAP user_create () не поддерживает выбранный UserType: {$a}';
$string['auth_ldap_update_userinfo'] = 'Обновляйте пользовательскую информацию (Имя, Фамилию, адрес ..) от LDAP до системы. Смотрите /auth/ldap/attr_mappings.php для того, чтобы отобразить информацию.';
$string['auth_ldap_user_attribute'] = 'Необязательный параметр. Позволяет переопределить атрибут, используемый для поиска и обозначения учетных записей пользователей. Обычно это «cn».';
$string['auth_ldap_user_attribute_key'] = 'Атрибут пользователя';
$string['auth_ldap_user_exists'] = 'Пользователь с таким логином уже существует.';
$string['auth_ldap_user_settings'] = 'Настройки поиска пользователей';
$string['auth_ldap_user_type'] = 'Укажите, каким образом информация о пользователях хранится в LDAP. От этого параметра также зависит, как будет осуществляться создание пользователей и вход с просроченными паролями.';
$string['auth_ldap_user_type_key'] = 'Тип пользователя';
$string['auth_ldap_usertypeundefined'] = 'config.user_type не определен или функция ldap_expirationtime2unix не поддерживает выбранный тип!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type не определен или функция ldap_unixi2expirationtime не поддерживает выбранный тип!';
$string['auth_ldap_version'] = 'Версия протокола LDAP, которая используется на Вашем сервере.';
$string['auth_ldap_version_key'] = 'Версия';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Выберите «Да» для осуществления попыток входа в систему по технологии NTLM SSO (Single Sign On) используя учетную запись, с которой пользователь вошел в домен. <strong>Примечание:</strong> для работы этой технологии требуются дополнительные настройки веб-сервера, см. <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Включить';
$string['auth_ntlmsso_ie_fastpath'] = 'Выберите "Да" для быстрой проверки NTLM SSO (позволяет пропустить определенные шаги и работает только тогда, когда браузером клиента является Microsoft Internet Explorer).';
$string['auth_ntlmsso_ie_fastpath_key'] = 'Быстрая проверка в MS IE?';
$string['auth_ntlmsso_maybeinvalidformat'] = 'Невозможно определить логин пользователя из заголовка REMOTE_USER. Возможно, неверно настроен формат передаваемого логина.';
$string['auth_ntlmsso_missing_username'] = 'В формате передаваемого логина необходимо обязательно использовать подстановку %username%';
$string['auth_ntlmsso_remoteuserformat'] = 'При выборе типа аутентификации «NTLM» Вы можете указать здесь формат, в котором передается логин внешнего пользователя. Если оставить это поле пустым, то будет использоваться формат по умолчанию «ДОМЕНлогин». Вы можете использовать необязательную подстанову <b>%domain%</b>, чтобы указать положение названия домена, и обязательную подстановку <b>%username%</b>, чтобы указать положение логина пользоваеля.<br /><br />Некоторые широко используемые форматы: <tt>%domain%%username%</tt> (по умолчанию в MS Windows), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> или просто <tt>%username%</tt> (если нет доменной части).';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Формат передаваемого логина';
$string['auth_ntlmsso_subnet'] = 'Попытка входа в систему по технологии SSO будет предприниматься только для клиентов из этой подсети. Формат: xxx.xxx.xxx.xxx/маска. Чтобы указать несколько подсетей используйте разделитель «,» (запятая).';
$string['auth_ntlmsso_subnet_key'] = 'Подсеть';
$string['auth_ntlmsso_type'] = 'Тип аутентификации, настроенный на веб-сервере (если есть сомнения, выберите NTLM)';
$string['auth_ntlmsso_type_key'] = 'Тип аутентификации';
$string['connectingldap'] = 'Подключение к серверу LDAP ...';
$string['creatingtemptable'] = 'Создание временной таблицы {$a}';
$string['didntfindexpiretime'] = 'Функция password_expire() не смогла определить срок действия пароля.';
$string['didntgetusersfromldap'] = 'Ошибка - не удалось получить ни одного пользователя с сервера LDAP - выход.';
$string['gotcountrecordsfromldap'] = 'Получено записей из LDAP - {$a}';
$string['morethanoneuser'] = 'Странно! В LDAP найдено более одной учетной записи пользователя. Используется только первая.';
$string['needbcmath'] = 'Для расчета срока действия пароля в Active Directory необходимо установленное расширение BCMath языка PHP';
$string['needmbstring'] = 'Для смены паролей в Active Directory необходимо расширение mbstring языка PHP';
$string['nodnforusername'] = 'Ошибка в функции user_update_password(). Нет DN для: {$a->username}';
$string['noemail'] = 'Попытка отправить Вам письмо завершилась неудачно!';
$string['noupdatestobedone'] = 'Обновление данных не будет осуществляться';
$string['nouserentriestoremove'] = 'Нет пользователей, которых нужно удалить';
$string['nouserentriestorevive'] = 'Нет пользователей, которых нужно восстановить';
$string['nouserstobeadded'] = 'Нет пользователей, которых нужно добавить';
$string['ntlmsso_attempting'] = 'Попытка входа по технологии NTLM Single Sign On ...';
$string['ntlmsso_failed'] = 'Автоматический вход не удался, попробуйте использовать обычную страницу входа ...';
$string['ntlmsso_isdisabled'] = 'Технология NTLM SSO отключена.';
$string['ntlmsso_unknowntype'] = 'Неизвестный тип NTLM SSO!';
$string['pagedresultsnotsupp'] = 'Постраничный вывод результатов LDAP не поддерживаются (либо эта функция не поддерживается Вашей версией PHP, либо Вы настроили Moodle на использование протокола LDAP версии 2)';
$string['pagesize'] = 'Убедитесь, что это значение меньше, чем предельный размер результирующего набора сервера LDAP (максимальное количество записей, которые могут быть возвращены в одном запросе).';
$string['pagesize_key'] = 'Размер страницы';
$string['pluginname'] = 'Сервер LDAP';
$string['pluginnotenabled'] = 'Плагин не включен!';
$string['renamingnotallowed'] = 'В LDAP переименования пользователей не допускаются';
$string['rootdseerror'] = 'Ошибка запроса RootDSE для Active Directory';
$string['updatepasserror'] = 'Ошибка в функции user_update_password(). Код ошибки: {$a->errno}; описание ошибки: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Ошибка в функции user_update_password() при чтении срока действия пароля. Код ошибки: {$a->errno}; описание ошибки: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Ошибка в функции user_update_password() при изменении срока действия пароля и/или задании возможности входа при просроченном пароле. Код ошибки: {$a->errno}; описание ошибки: {$a->errstring}';
$string['updateremfail'] = 'Ошибка при обновлении записи на сервере LDAP. Код ошибки: {$a->errno}; описание ошибки: {$a->errstring}<br/>Ключ: {$a->key}, старое значение в Moodle: «{$a->ouvalue}», новое значение: «{$a->nuvalue}»';
$string['updateremfailamb'] = 'Не удалось обновить LDAP с неоднозначным полем {$a->key}; старое значение Moodle : «{$a->ouvalue}», новое значение:«{$a->nuvalue}»';
$string['updateusernotfound'] = 'Не удалось найти пользователя при внешнем обновлении. Имеющиеся сведения: база поиска: «{$a->userdn}»; фильтр поиска:«(objectClass=*)»; атрибуты поиска: «{$a->attribs}».';
$string['useracctctrlerror'] = 'Ошибка при получении UserAccountControl для {$a}';
$string['user_activatenotsupportusertype'] = 'Аутентификация: LDAP user_activate () не поддерживает выбранный тип пользователя: {$a}';
$string['user_disablenotsupportusertype'] = 'Аутентификация: LDAP user_disable () не поддерживает выбранный тип пользователя: {$a}';
$string['userentriestoadd'] = 'Записи пользователей, которые будут добавлены: {$a}';
$string['userentriestoremove'] = 'Записи пользователей, которые будут удалены: {$a}';
$string['userentriestorevive'] = 'Записи пользователей, которые будут восстановлены: {$a}';
$string['userentriestoupdate'] = 'Записи пользователей, которые будут обновлены: {$a}';
$string['usernotfound'] = 'Пользователь не найден в LDAP';
