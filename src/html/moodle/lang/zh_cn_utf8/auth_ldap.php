<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_ldap_ad_create_req'] = '不能在活动目录中创建新帐户，确保您满足所有的正常运行的需求（LDAP 连接，有足够的权限绑定用户等）。';
$string['auth_ldap_attrcreators'] = '组或情景列表中的哪些成员允许创建属性。多个组使用\";\"分隔，例如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_attrcreators_key'] = '属性创建者';
$string['auth_ldap_auth_user_create_key'] = '创建外部用户';
$string['auth_ldap_bind_dn'] = '如果您想用绑定用户来搜索用户，在此指定。就象：“cn=ldapuser,ou=public,o=org”';
$string['auth_ldap_bind_dn_key'] = '名称';
$string['auth_ldap_bind_pw'] = '绑定用户的密码。';
$string['auth_ldap_bind_pw_key'] = '密码';
$string['auth_ldap_bind_settings'] = '绑定设置';
$string['auth_ldap_changepasswordurl_key'] = '更改密码 URL';
$string['auth_ldap_contexts'] = '用户背景列表。以‘;’分隔。例如：“ou=users,o=org; ou=others,o=org”';
$string['auth_ldap_contexts_key'] = 'LDAP 情境';
$string['auth_ldap_create_context'] = '如果您允许根据 E-mail 信息创建用户，指定创建用户的内容。该值应该有别于别的用户。';
$string['auth_ldap_create_context_key'] = '新用户默认情境';
$string['auth_ldap_create_error'] = '在 LDAP 中创建用户发生错误';
$string['auth_ldap_creators'] = '列出可创建新课程的组。用“;”分割多个组。如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_creators_key'] = 'LDAP 创建者';
$string['auth_ldap_expiration_desc'] = '选择否关闭密码过期检查，选择 LDAP 则从 LDAP 中读取密码过期时间 passwordexpiration。';
$string['auth_ldap_expiration_key'] = 'LDAP 期限';
$string['auth_ldap_expiration_warning_desc'] = '在多少天前显示密码过期警告。';
$string['auth_ldap_expiration_warning_key'] = '到期警告';
$string['auth_ldap_expireattr_desc'] = '可选: 覆盖存储密码过期时间的属性 passwordAxpirationTime';
$string['auth_ldap_expireattr_key'] = '到期特征';
$string['auth_ldap_graceattr_desc'] = '可选: 覆盖宽限登录属性';
$string['auth_ldap_gracelogin_key'] = '登录特征';
$string['auth_ldap_gracelogins_desc'] = '激活 LDAP gracelogin 支持。在密码过期后，在宽限登录为0前用户仍可以登录。激活这个选项后，当密码过期时将显示 gracelogin 信息。';
$string['auth_ldap_gracelogins_key'] = '登录';
$string['auth_ldap_groupecreators'] = '组或情景列表中的哪些成员允许创建组。多个组使用“;”分隔，例如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_groupecreators_key'] = '组创建者';
$string['auth_ldap_host_url'] = '以 URL 形式指定 LDAP 主机，类似于：“ldap://ldap.myorg.com/”或“ldaps://ldap.myorg.com/”。';
$string['auth_ldap_host_url_key'] = '主机 URL';
$string['auth_ldap_ldap_encoding'] = '指定 LDAP 服务器的编码方式。一般是 utf-8，MS AD V2 使用默认的平台编码如 cp1252、cp1250 等。';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP 编码方式';
$string['auth_ldap_login_settings'] = '登录设置';
$string['auth_ldap_memberattribute'] = '可选的：指定从属于某个组的用户属性,一般是“member”';
$string['auth_ldap_memberattribute_isdn'] = '可选：覆盖属性数，0 或 1。';
$string['auth_ldap_memberattribute_isdn_key'] = '成员属性中使用 dn';
$string['auth_ldap_memberattribute_key'] = '成员属性';
$string['auth_ldap_no_mbstring'] = '在 Active Directory 中创建用户时需要 mbstring 扩展支持。';
$string['auth_ldap_noconnect'] = 'LDAP 模块不能连接上服务器：{$a}';
$string['auth_ldap_noconnect_all'] = 'LDAP 模块不能连接到任何服务器：{$a}';
$string['auth_ldap_noextension'] = '警告：似乎服务器上没有安装 PHP LDAP，请检查是否安装。';
$string['auth_ldap_objectclass'] = '可选的：指定在 ldap_user_type 中搜索用户时使用的 objectClass。通常您不需修改这个选项。';
$string['auth_ldap_objectclass_key'] = '对象类';
$string['auth_ldap_opt_deref'] = '检查在搜索时如何处理别名。选择下列值之一: “否”(LDAP_DEREF_NEVER) 或“是”(LDAP_DEREF_ALWAYS)。';
$string['auth_ldap_opt_deref_key'] = '弃用别名';
$string['auth_ldap_passtype'] = '指定在 LDAP 服务器中的新密码或者更改密码的格式。';
$string['auth_ldap_passtype_key'] = '密码格式';
$string['auth_ldap_passwdexpire_settings'] = 'LDAP 密码过期设置。';
$string['auth_ldap_preventpassindb'] = '如果设定为是，则在Moodle的数据库中不会存储密码。';
$string['auth_ldap_preventpassindb_key'] = '隐藏密码';
$string['auth_ldap_search_sub'] = '如果您想从次级上下文中搜索用户，设值<> 0。';
$string['auth_ldap_search_sub_key'] = '在子情境中查找';
$string['auth_ldap_server_settings'] = 'LDAP 服务器设置';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() 函数还不支持以选用户类型：“{$a}”。';
$string['auth_ldap_update_userinfo'] = '从 LDAP 向本系统更新用户信息（姓名、地址……）。请指定您需要的“数据映射”。';
$string['auth_ldap_user_attribute'] = '用于命名/搜索用户的属性，通常为“cn”。';
$string['auth_ldap_user_attribute_key'] = '用户属性';
$string['auth_ldap_user_exists'] = 'LDAP 用户名已存在';
$string['auth_ldap_user_settings'] = '用户查找设置';
$string['auth_ldap_user_type'] = '选择用户如何储存在 LDAP 中。这个选项同时也指定了登录过期、宽限登录和用户创建如何工作。';
$string['auth_ldap_user_type_key'] = '用户类型';
$string['auth_ldap_usertypeundefined'] = 'config.user_type 没有定义或函数 ldap_expirationtime2unix 不支持类型选择。';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type 没有定义或函数 ldap_unixi2expirationtime 不支持类型选择。';
$string['auth_ldap_version'] = '您的服务器所使用的 LDAP 协议版本。';
$string['auth_ldap_version_key'] = '版本';
$string['auth_ldapdescription'] = '该方法利用一个外部的 LDAP 服务器进行身份验证。

如果用户名和密码是有效的，本系统据此在数据库中创建一个新用户。

该模块可以从 LDAP 中读取用户属性，并把指定的字段预先填入本系统数据库。

此后的登录只需检验用户名和密码。';
$string['auth_ldapextrafields'] = '这些字段是可选的。您可以在此指定这些 <b>LDAP 字段</b>复制到本系统的数据库中。 <br />如果您不选，将使用本系统默认值。<br />无论以上何种情况，用户在登录之后都可以修改这些字段。';
$string['auth_ldapnotinstalled'] = '不能使用 LDAP 认证方式，PHP LDAP 模块没有安装。';
$string['auth_ldaptitle'] = '使用 LDAP 服务器';
$string['auth_ntlmsso'] = 'NTLM 单点登录';
$string['auth_ntlmsso_enabled'] = '设置为“是”将尝试用 NTLM 域进行单点登录。<strong>注意:</strong>还需要在 Web 服务器上有额外的设置，具体查看 <a href=\"http://docs.moodle.org/en/NTLM_authentication\">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = '启用';
$string['auth_ntlmsso_subnet'] = '如果设置，则只在此子网中使用单点登录。格式：xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = '子网';
$string['ntlmsso_attempting'] = '尝试进行 NTLM 单点登录';
$string['ntlmsso_failed'] = '自动登录失败，尝试到普通登录页面登录。';
$string['ntlmsso_isdisabled'] = 'NTLM 单点登录被禁用。';