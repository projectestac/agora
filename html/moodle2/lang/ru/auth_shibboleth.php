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
 * Strings for component 'auth_shibboleth', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = 'Название метода аутентификации';
$string['auth_shib_auth_method_description'] = 'Укажите имя для метода аутентификации Shibboleth, который знаком вашим пользователям. Это может быть название вашего объединения Shibboleth, например <tt>SWITCHaai Login</tt> или <tt>InCommon Login</tt> или подобное.';
$string['auth_shibboleth_contact_administrator'] = 'В случае, если Вы не связаны с данной организации и Вам нужен доступ к курсу на этом сервере, пожалуйста, свяжитесь с';
$string['auth_shibbolethdescription'] = 'При использовании этого метода пользователи создаются и аутентифицируются с использованием <a href="http://shibboleth.internet2.edu/">Shibboleth</a>. <br /> Обязательно <a href="../auth/shibboleth/README.txt">ПРОЧТИТЕ</a> как настроить Moodle с Shibboleth.';
$string['auth_shibboleth_errormsg'] = 'Пожалуйста, выберите свою организацию!';
$string['auth_shibboleth_login'] = 'Логин Shibboleth';
$string['auth_shibboleth_login_long'] = 'Войти в Moodle через Shibboleth';
$string['auth_shibboleth_select_member'] = 'Я являюсь членом ...';
$string['auth_shibboleth_select_organization'] = 'Для аутентификации через Shibboleth, выберите организацию из выпадающего списка:';
$string['auth_shib_changepasswordurl'] = 'Адрес страницы смены пароля';
$string['auth_shib_contact_administrator'] = 'В случае, если Вы не связаны с данной организацией, а Вам нужен доступ к курсу на этом сервере, свяжитесь с <a href="mailto:{$a}">администратором Moodle</a>.';
$string['auth_shib_convert_data'] = 'Модификация данных API';
$string['auth_shib_convert_data_description'] = 'Вы можете использовать этот API для дальнейшей модификации данных, предоставленных Шибболет. Прочитайте <a href="../auth/shibboleth/README.txt">здесь дальнейшие инструкции</a>.';
$string['auth_shib_convert_data_warning'] = 'Этот файл не существует или не доступен для чтения веб-сервером!';
$string['auth_shib_idp_list'] = 'Поставщики удостоверений';
$string['auth_shib_idp_list_description'] = 'Введите перечень поставщиков удостоверений, чтобы пользователь мог выбирать из него на странице входа. <br /> В каждой строке должны быть разделенные запятыми записи ID поставщика удостоверений (см. файл метаданных Шибболет ) и его название. Они будут отображаться в выпадающем списке. <br /> В качестве необязательного третьего параметра Вы можете добавить расположение инициатора сессии Шибболет, который используется в случае, если система Moodle является частью объединения.';
$string['auth_shib_instructions'] = 'Используйте <a href="{$a}">Вход Shibboleth</a> , чтобы получить доступ через Shibboleth, если Ваша организация поддерживает его. <br /> В противном случае используйте обычную форму входа, показанную здесь.';
$string['auth_shib_instructions_help'] = 'Здесь Вы должны предоставить инструкции для пользователей, чтобы объяснить им как заходить с помощью Shibboleth. Эти инструкции будут показаны на странице входа. Инструкции должны содержать ссылку на «<b>{$a}</b>», чтобы пользователи могли перейти по ней, когда захотят войти в систему.';
$string['auth_shib_integrated_wayf'] = 'Служба Moodle WAYF';
$string['auth_shib_integrated_wayf_description'] = 'При отмеченном параметре Moodle будет использовать свою собственную службу WAYF (единый вход в системы) вместо настроенной для Шибболет. Moodle будет отображаться в раскрывающемся списке на странице альтернативного входа, где пользователь выбирает своего поставщика удостоверений.';
$string['auth_shib_logout_return_url'] = 'Альтернативный URL-адрес перенаправления при выходе';
$string['auth_shib_logout_return_url_description'] = 'Введите URL-адрес, куда пользователи Шибболет должны быть перенаправлены после выхода из системы. <br /> Если оставить пустым, то пользователь будет перенаправлен в то место, куда  пользователей перенаправляет Moodle.';
$string['auth_shib_logout_url'] = 'URL-адрес обработчика выхода поставщика службы Шибболет';
$string['auth_shib_logout_url_description'] = 'Введите URL-адрес обработчика выхода поставщика службы Шибболет. Обычно, это <tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'Если Вы хотите использовать объединенную службу WAYF, Вы должны предоставить разделенный запятыми список  поставщиков удостоверений: их  ID, названия и (не обязательно) инициатора сессии.';
$string['auth_shib_only'] = 'Только Шибболет';
$string['auth_shib_only_description'] = 'Выберите этот параметр для принудительного использования аутентификации Шибболет';
$string['auth_shib_username_description'] = 'Имя переменной среды веб-сервера Шибболет, которое должно использоваться в качестве имени пользователя Moodle';
$string['pluginname'] = 'Шибболет';
$string['shib_invalid_account_error'] = 'Вы представляетесь как пользователь Шибболет, но Moodle не имеет действующей учетной записи с этим логином. Ваша учетная запись не существует или, возможно, была приостановлена.';
$string['shib_no_attributes_error'] = 'Вы представляетесь как пользователь Шибболет, но Moodle но не получила никаких атрибутов пользователя. Пожалуйста, проверьте, что поставщиком идентичности представлены необходимые атрибуты ({$a}) для работы с Moodle или свяжитесь с администратором этого сайта Moodle.';
$string['shib_not_all_attributes_error'] = 'Moodle нуждается в определенных атрибутах Шибболет, которых нет в вашем случае. Атрибуты: {$a} <br /> Пожалуйста, свяжитесь с администратором этого сайта Moodle. или поставщиком удостоверений Шибболет.';
$string['shib_not_set_up_error'] = 'Аутентификация Шибболет, кажется, не была корректно установлена, потому что никакие переменные среды Шибболет не присутствуют на этой странице. Пожалуйста, обратитесь к <a href="README.txt">прочтите инструкции</a> о том, как создать аутентификацию Шибболет или свяжитесь с администратором этого сайта Moodle.';
