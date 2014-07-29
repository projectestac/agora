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
 * Strings for component 'auth_cas', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS 用户';
$string['accesNOCAS'] = '其他用户';
$string['auth_cas_auth_user_create'] = '创建外部用户';
$string['auth_cas_baseuri'] = '服务器的 URI（如果没有baseUri就什么都不用填）<br />例如，如果 CAS 服务器位于 host.domaine.fr/CAS/ 那么<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = '基础URI';
$string['auth_cas_broken_password'] = '在您更改密码前不能继续操作，但系统找不到用来更改密码的页面，请与管理员联系。';
$string['auth_cas_cantconnect'] = 'CAS 模块的 LDAP 部分无法连接服务器：{$a}';
$string['auth_cas_casversion'] = 'CAS协议版本';
$string['auth_cas_certificate_check'] = '如果您要验证服务器的证书，请选“是”';
$string['auth_cas_certificate_check_key'] = '服务器验证';
$string['auth_cas_certificate_path'] = '验证服务器证书的CA链文件（PEM格式）的路径';
$string['auth_cas_certificate_path_empty'] = '如果您打开了服务器验证，那么您需要指定证书路径';
$string['auth_cas_certificate_path_key'] = '证书路径';
$string['auth_cas_changepasswordurl'] = '更改密码 URL';
$string['auth_cas_create_user'] = '如果您希望将 CAS 认证用户加入到 Moodle 数据库中，请选择是。否则只有已经存在于 Moodle 数据库中的用户可以登录。';
$string['auth_cas_create_user_key'] = '创建用户';
$string['auth_casdescription'] = '这个方法使用 CAS 服务器(中央认证服务)，在单点登录(SSO)环境中认证用户。您也可以使用简单的 LDAP 认证。如果给定的用户名和密码在 CAS 中有效，Moodle 会在数据库中创建信用户账号，并从 LDAP 中取出需要的属性。在后续的登录中，只检查用户名和密码。';
$string['auth_cas_enabled'] = '如果您希望使用 CAS 认证请开启此选项。';
$string['auth_cas_hostname'] = 'CAS 服务器主机名<br />例如: host.domain.fr';
$string['auth_cas_hostname_key'] = '主机名';
$string['auth_cas_invalidcaslogin'] = '很抱歉，您登录失败——无法对您进行认证。';
$string['auth_cas_language'] = '选择认证页面语言';
$string['auth_cas_language_key'] = '语言';
$string['auth_cas_logincas'] = '安全连接访问';
$string['auth_cas_logoutcas'] = '如果您希望与Moodle断开连接时登出CAS ，请选“是”';
$string['auth_cas_logoutcas_key'] = '登出CAS选项';
$string['auth_cas_multiauth'] = '如果您想支持多种身份认证方式（CAS + 其他认证），请选“是”';
$string['auth_cas_multiauth_key'] = '多种验证方式';
$string['auth_casnotinstalled'] = '不能使用 CAS 认证方式，因为 PHP LDAP 模块没有安装。';
$string['auth_cas_port'] = 'CAS 服务器端口';
$string['auth_cas_port_key'] = '端口';
$string['auth_cas_proxycas'] = '如果在代理模式下使用CAS，请选“是”';
$string['auth_cas_proxycas_key'] = '代理模式';
$string['auth_cas_server_settings'] = 'CAS 服务配置';
$string['auth_cas_text'] = '安全连接';
$string['auth_cas_use_cas'] = '使用 CAS';
$string['auth_cas_version'] = '使用哪个CAS协议版本';
$string['CASform'] = '选择认证方式';
$string['noldapserver'] = 'CAS没有配置LDAP服务器！因此同步被禁用。';
$string['pluginname'] = 'CAS 服务器(单点登录)';
