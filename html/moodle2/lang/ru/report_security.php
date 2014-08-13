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
 * Strings for component 'report_security', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p> Рекомендуется, чтобы разрешения для файла config.php были изменены после установки так, чтобы файл не мог быть изменен веб-сервером. Пожалуйста, имейте в виду, что эта мера значительно не повышает безопасность сервера, но может снизить или ограничить уязвимости общего характера.</p>';
$string['check_configrw_name'] = 'Файл config.php доступен для записи';
$string['check_configrw_ok'] = 'config.php не может быть изменен скриптами PHP.';
$string['check_configrw_warning'] = 'Скрипты PHP могут изменить config.php.';
$string['check_cookiesecure_details'] = '<p> Если Вы разрешаете соединение по протоколу https, то рекомендуется разрешить и secure cookies. Вы должны также добавить постоянное перенаправление c http на https. </p>';
$string['check_cookiesecure_error'] = 'Пожалуйста, разрешите secure cookies';
$string['check_cookiesecure_name'] = 'Secure cookies';
$string['check_cookiesecure_ok'] = 'Secure cookies включены';
$string['check_defaultuserrole_details'] = '<p> Все вошедшие в систему пользователя получают права роли по умолчанию. Пожалуйста, удостоверьтесь, что для этой роли  не разрешены никакие опасные права. </p> <p> Единственный поддерживаемый устаревший тип для роли по умолчанию - <em>Аутентифицированный пользователь</em>. Возможность просмотра курса не должна быть включена. </p>';
$string['check_defaultuserrole_error'] = 'Роль пользователя по умолчанию «{$a}» задана неправильно!';
$string['check_defaultuserrole_name'] = 'Роль по умолчанию для всех пользователей';
$string['check_defaultuserrole_notset'] = 'Роль по умолчанию не задана.';
$string['check_defaultuserrole_ok'] = 'Роль по умолчанию для всех пользователей задана верно.';
$string['check_displayerrors_details'] = '<p>Включение настройки PHP <code> display_errors</code> (отображать ошибки) не рекомендуется на рабочих сайтах, потому что сообщения об ошибках могут раскрыть конфиденциальную информацию о Вашем сервере. </p>';
$string['check_displayerrors_error'] = 'Включена настройка PHP для отображения ошибок. Рекомендуется ее отключить.';
$string['check_displayerrors_name'] = 'Отображать ошибки PHP';
$string['check_displayerrors_ok'] = 'Отображение ошибок PHP отключено.';
$string['check_emailchangeconfirmation_details'] = '<p> Рекомендуется, чтобы требовался шаг подтверждения электронной почты при изменении пользователями адреса электронной почты в своем профиле. Если параметр отключен, спамеры могут пытаться использовать сервер для рассылки спама. </p> <p>Поле электронной почты может быть также заблокировано в плагине аутентификации, эта возможность здесь не рассматривается. </p>';
$string['check_emailchangeconfirmation_error'] = 'Пользователи могут вводить любые адреса электронной почты.';
$string['check_emailchangeconfirmation_info'] = 'Пользователи могут вводить адреса электронной почты только из разрешенных доменов.';
$string['check_emailchangeconfirmation_name'] = 'Подтверждение изменения электронной почты';
$string['check_emailchangeconfirmation_ok'] = 'Подтверждение изменения адреса электронной почты в профиле пользователя.';
$string['check_embed_details'] = '<p>Неограниченное внедрение объектов очень опасно - любой зарегистрированный пользователь может предпринять XSS-атаку против других пользователей сервера. Эта настройка должно быть отключена на рабочих серверах. </p>';
$string['check_embed_error'] = 'Разрешено неограниченное внедрение объектов - это очень опасно для большинства серверов.';
$string['check_embed_name'] = 'Разрешить теги EMBED и OBJECT';
$string['check_embed_ok'] = 'Неограниченное внедрение объектов не разрешено.';
$string['check_frontpagerole_details'] = '<p> Все вошедшие в систему пользователя получают во всех элементах главной странице права роли для главной страницы. Пожалуйста, удостоверьтесь, что для этой роли  не разрешены никакие опасные права. </p> <p> Рекомендуется, чтобы для этой цели была создана специальная роль, и устаревшие типы ролей не использовалось. </p>';
$string['check_frontpagerole_error'] = 'Обнаружена неправильно заданная роль главной страницы - «{$a}»!';
$string['check_frontpagerole_name'] = 'Роль для главной страницы';
$string['check_frontpagerole_notset'] = 'Роль для главной страницы не задана.';
$string['check_frontpagerole_ok'] = 'Роль для главной страницы задана верно.';
$string['check_globals_details'] = '<p>Считается, что включение параметра PHP register_globals является крайне небезопасной настройкой PHP. </p> <p> В конфигурации PHP должно быть установлено <code> register_globals=off> </code>. Этой параметр устанавливается редактированием файла <code> php.ini </code>, конфигурации Apache/IIS или файла <code>.htaccess </code>. </p>';
$string['check_globals_error'] = 'Параметр register_globals ДОЛЖЕН быть отключен. Пожалуйста, немедленно установите параметры настройки PHP сервера!';
$string['check_globals_name'] = 'Параметр register_globals';
$string['check_globals_ok'] = 'Параметр register_globals отключен.';
$string['check_google_details'] = '<p>Установка Открыть для Google позволяет поисковым машинам входить в курсы с доступом гостя. Нет никакого смысла в этой настройке, если вход гостя не разрешен.</p>';
$string['check_google_error'] = 'Доступ поисковой машины разрешен, но доступ гостя - запрещен.';
$string['check_google_info'] = 'Поисковые машины могут входить как гости.';
$string['check_google_name'] = 'Открыть для Google';
$string['check_google_ok'] = 'Доступ поисковой машины не разрешен.';
$string['check_guestrole_details'] = '<p> Роль гостя используется для гостей сайта, не вошедших в систему пользователей и временного доступа к курсам. Пожалуйста, убедитесь, что никакие опасные права не разрешены для этой роли. </p> <p> Единственная устаревшая роль для гостя - <em>Гость</em>. </p>';
$string['check_guestrole_error'] = 'Неправильно определена роль гостя - «{$a}»!';
$string['check_guestrole_name'] = 'Роль гостя';
$string['check_guestrole_notset'] = 'Роль гостя не установлена.';
$string['check_guestrole_ok'] = 'Роль гостя определена верно.';
$string['check_mediafilterswf_details'] = '<p> Автоматическое внедрение swf-файлов очень опасно - любой зарегистрированный пользователь может использовать XSS-атаки против других пользователей сервера. Пожалуйста, отключите это на рабочих серверах. </p>';
$string['check_mediafilterswf_error'] = 'Включен фильтр Flash - это очень опасно для большинства серверов.';
$string['check_mediafilterswf_name'] = 'Медиа-фильтр .swf (Flash) включен';
$string['check_mediafilterswf_ok'] = 'Медиа-фильтр .swf (Flash) выключен.';
$string['check_noauth_details'] = '<p>Метод <em>Не использовать аутентификацию</em> не предназначен для рабочих сайтов. Пожалуйста, отключите его, если это не тестовый сайт.</p>';
$string['check_noauth_error'] = 'Метод <em>Не использовать аутентификацию</em> не может использоваться на работающих сайтах.';
$string['check_noauth_name'] = 'Не использовать аутентификацию';
$string['check_noauth_ok'] = 'Метод <em>Не использовать аутентификацию</em> отключен.';
$string['check_openprofiles_details'] = 'Открытыми профилями пользователей могут злоупотреблять спамеры. Рекомендуется, чтобы были включены параметр или <code>Необходимо войти в систему для просмотра профилей</code>, или <code>Принуждать пользователей войти в систему</code>.';
$string['check_openprofiles_error'] = 'Любой желающий может просматривать профили пользователей не входя в систему.';
$string['check_openprofiles_name'] = 'Открытые профили пользователей';
$string['check_openprofiles_ok'] = 'Необходим вход в систему перед просмотром профилей пользователей.';
$string['check_passwordpolicy_details'] = '<p>Рекомендуется, чтобы была установлена политика паролей, так как угадывание пароля - часто самый легкий способ получить несанкционированный доступ. Не делайте требования слишком строгими, поскольку это может привести к тому, что пользователи не смогут запомнить свои пароли и будут забывать или записывать их. </p>';
$string['check_passwordpolicy_error'] = 'Политика паролей не задана.';
$string['check_passwordpolicy_name'] = 'Политика паролей';
$string['check_passwordpolicy_ok'] = 'Политика паролей включена.';
$string['check_riskadmin_detailsok'] = '<p> Пожалуйста, подтвердите следующий список администраторов системы: </p> {$a}';
$string['check_riskadmin_detailswarning'] = '<p> Пожалуйста, подтвердите следующий список администраторов системы: </p> {$a->admins}.<p>Рекомендуется назначать роль администратора только в контексте системы. Следующим пользователям необоснованно назначены роли администратора в других контекстах: </p> {$a->unsupported}';
$string['check_riskadmin_name'] = 'Администраторы';
$string['check_riskadmin_ok'] = 'Найдено администраторов сервера - {$a}';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) просмотр назначения роли</a>';
$string['check_riskadmin_warning'] = 'Найдено администраторов сервера - {$a->admincount} и необоснованных назначений роли администратора - {$a->unsupcount}.';
$string['check_riskbackup_detailsok'] = 'Нет ролей с явным разрешением на резервное копирование пользовательских данных. Однако, отметьте, что администраторы с правом «moodle/site:doanything», вероятно, будут в состоянии сделать это.';
$string['check_riskbackup_details_overriddenroles'] = '<p> Эти активные переопределения дают пользователям возможность включать пользовательские данные в резервные копии. Удостоверьтесь, что это право необходимо. </p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p> Следующие роли системы в настоящее время позволяют пользователям включать пользовательские данные в резервные копии. Удостоверьтесь, что это право необходимо. </p> {$a}';
$string['check_riskbackup_details_users'] = '<p> Следующие пользователи (из-за вышеназначенных ролей или локального переопределения) в настоящее время имеют разрешение делать резервные копии, содержащие личные данные любых пользователей, зарегистрированных в их курсе. Удостоверьтесь, что: а) Вы им доверяете и б) их учетные записи защищены надежными паролями: </p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->name} в контексте «{$a->contextname}»</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = 'Резервное копирование данных пользователя';
$string['check_riskbackup_ok'] = 'Нет ролей с явным разрешением на резервное копирование пользовательских данных';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) в контексте «{$a->contextname}»</a>';
$string['check_riskbackup_warning'] = 'Найдено ролей - {$a->rolecount}, переопределений - {$a->overridecount} и пользователей - {$a->usercount} с правом делать копию пользовательских данных.';
$string['check_riskxss_details'] = '<p> RISK_XSS обозначает все опасные возможности, которые могут использовать только доверенные пользователи. </p> <p> Пожалуйста, подтвердите следующий список пользователей и убедитесь, что Вы полностью доверяете им на этом сервере: </p><p>{$a}</p>';
$string['check_riskxss_name'] = 'Доверенные пользователи XSS';
$string['check_riskxss_warning'] = 'RISK_XSS - найдено доверенных пользователей - {$a}.';
$string['check_unsecuredataroot_details'] = '<p>Каталог dataroot не долен быть доступен из сети. Лучший способ уверенно сделать каталог недоступным - это использовать каталог вне общего веб-каталога. </p> <p>При перемещении каталога Вы должны соответствующим образом изменить настройку <code>$CFG->dataroot</code> в файле <code>config.php</code>. </p>';
$string['check_unsecuredataroot_error'] = 'Ваш каталог dataroot<code>{$a}</code> неправильно размещен и доступен из сети!';
$string['check_unsecuredataroot_name'] = 'Небезопасный каталог dataroot';
$string['check_unsecuredataroot_ok'] = 'Каталог dataroot не должен быть доступен из сети.';
$string['check_unsecuredataroot_warning'] = 'Ваш каталог dataroot<code>{$a}</code> неправильно размещен и, возможно, доступен из сети!';
$string['configuration'] = 'Конфигурация';
$string['description'] = 'Описание';
$string['details'] = 'Подробности';
$string['issue'] = 'Возможная проблема';
$string['pluginname'] = 'Сведения о безопасности';
$string['security:view'] = 'Просмотр отчета о безопасности';
$string['status'] = 'Состояние';
$string['statuscritical'] = 'Критическое';
$string['statusinfo'] = 'Информация';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Серьезное';
$string['statuswarning'] = 'Предупреждение';
$string['timewarning'] = 'Обработка данных может занять много времени, пожалуйста, будьте терпеливы...';
