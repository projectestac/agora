<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = '选择验证方式';
$string['accesCAS'] = 'CAS 用户';
$string['accesNOCAS'] = '其他用户';
$string['auth_cas_auth_user_create'] = '创建外部用户';
$string['auth_cas_baseuri'] = '服务器的 URI<br />例如，如果 CAS 服务器位于 host.domaine.fr/CAS/ 那么<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = '基准 URI';
$string['auth_cas_broken_password'] = '在您更改密码前不能继续操作，但系统找不到用来更改密码的页面，请与管理员联系。';
$string['auth_cas_cantconnect'] = 'CAS 模块的 LDAP 部分无法连接服务器：{$a}';
$string['auth_cas_casversion'] = '版本';
$string['auth_cas_changepasswordurl'] = '更改密码 URL';
$string['auth_cas_create_user'] = '如果您希望将 CAS 认证用户加入到 Moodle 数据库中，请选择是。否则只有已经存在于 Moodle 数据库中的用户可以登录。';
$string['auth_cas_create_user_key'] = '创建用户';
$string['auth_cas_enabled'] = '如果您希望使用 CAS 认证请开启此选项。';
$string['auth_cas_hostname'] = 'CAS 服务器主机名<br />例如: host.domain.fr';
$string['auth_cas_hostname_key'] = '主机名';
$string['auth_cas_invalidcaslogin'] = '很抱歉，您登录失败——无法对您进行认证。';
$string['auth_cas_language'] = '选择语言';
$string['auth_cas_language_key'] = '语言';
$string['auth_cas_logincas'] = '安全连接访问';
$string['auth_cas_logoutcas'] = '当与 Moodle 的连接中断时，如果想从 CAS 退出，将此设置为“是”。';
$string['auth_cas_logoutcas_key'] = '退出 CAS';
$string['auth_cas_multiauth'] = '如果您想有多种身份验证方式（CAS + 其他验证方式），将此设置为“是”。';
$string['auth_cas_multiauth_key'] = '多种验证方式';
$string['auth_cas_port'] = 'CAS 服务器端口';
$string['auth_cas_port_key'] = '端口';
$string['auth_cas_proxycas'] = '如果在代理模式使用CAS，将此设置为“是”。';
$string['auth_cas_proxycas_key'] = '代理模式';
$string['auth_cas_server_settings'] = 'CAS 服务配置';
$string['auth_cas_text'] = '安全连接';
$string['auth_cas_use_cas'] = '使用 CAS';
$string['auth_cas_version'] = 'CAS 版本';
$string['auth_casdescription'] = '这个方法使用 CAS 服务器(中央认证服务)来认证 Single Sing On(SSO) 环境中的用户。您也可以使用 LDAP 认证。如果给定的用户名和密码在 CAS 中有效，Moodle 会在数据库中创建信用户项目，并从 LDAP 中取出相应的属性。在后续的登录中，只检查用户名和密码。';
$string['auth_casnotinstalled'] = '不能使用 CAS 认证方式，因为 PHP LDAP 模块没有安装。';
$string['auth_castitle'] = 'CAS 服务器(单点登录)';