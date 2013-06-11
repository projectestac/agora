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
 * Strings for component 'auth_ldap', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = '无法在活动目录中创建新帐户。确保您满足所有正常运行的需求（LDAPS 连接，有足够权限的绑定用户等）。';
$string['auth_ldap_attrcreators'] = '哪些组或场景中的成员允许创建属性。使用";"分隔多个组。例如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_attrcreators_key'] = '属性创建者';
$string['auth_ldap_auth_user_create_key'] = '创建外部用户';
$string['auth_ldap_bind_dn'] = '如果您想使用绑定用户来搜索用户，在此指定。例如“cn=ldapuser,ou=public,o=org”';
$string['auth_ldap_bind_dn_key'] = '专有名称';
$string['auth_ldap_bind_pw'] = '绑定用户的密码。';
$string['auth_ldap_bind_pw_key'] = '密码';
$string['auth_ldap_bind_settings'] = '绑定设置';
$string['auth_ldap_changepasswordurl_key'] = '更改密码 URL';
$string['auth_ldap_contexts'] = '在哪些场景中定位用户。使用";"分隔多个场景。例如：“ou=users,o=org; ou=others,o=org”';
$string['auth_ldap_contexts_key'] = '场景';
$string['auth_ldap_create_context'] = '如果您允许通过Email确认创建用户，请指定将用户创建在哪个场景。为了安全起见，该场景应该有别于其他用户。您不需要把场景添加到ldap_context-variable。Moodle会自动在此场景中搜索用户。<br /><b>注意！</b>您必须修改auth/ldap/auth.php文件中的user_create()方法，才能创建用户';
$string['auth_ldap_create_context_key'] = '新用户默认场景';
$string['auth_ldap_create_error'] = '在 LDAP 中创建用户发生错误';
$string['auth_ldap_creators'] = '哪些组或场景中的成员允许创建课程。使用";"分隔多个组。如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_creators_key'] = '创建者';
$string['auth_ldapdescription'] = '该方法利用一个外部的 LDAP 服务器进行身份认证。如果用户名和密码是有效的，Moodle会在数据库中创建一个新用户。该模块可以从 LDAP 中读取用户属性，并把指定的字段预先填入Moodle。此后的登录将只检验用户名和密码。';
$string['auth_ldap_expiration_desc'] = '选择“否”关闭密码过期检查，选择 LDAP 则从 LDAP 中读取密码过期时间。';
$string['auth_ldap_expiration_key'] = '期限';
$string['auth_ldap_expiration_warning_desc'] = '在多少天前显示密码过期警告。';
$string['auth_ldap_expiration_warning_key'] = '到期警告';
$string['auth_ldap_expireattr_desc'] = '可选：覆盖LDAP中存储密码过期时间的属性';
$string['auth_ldap_expireattr_key'] = '到期属性';
$string['auth_ldapextrafields'] = '这些字段是可选的。您可以用这里指定的<b>LDAP 字段</b>中的信息预先填充Moodle的用户字段。 <p>如果此处留空，将使用Moodle系统默认值。</p><p>无论以上何种情况，用户在登录之后都可以修改这些字段。</p>';
$string['auth_ldap_graceattr_desc'] = '可选: 覆盖宽限登录属性';
$string['auth_ldap_gracelogin_key'] = '宽限登录属性';
$string['auth_ldap_gracelogins_desc'] = '激活 LDAP 宽限登录的支持。在密码过期后，宽限登录计数值为0前，用户仍可以登录。激活这个选项后，当密码过期时将显示宽限登录信息。';
$string['auth_ldap_gracelogins_key'] = '宽限登录';
$string['auth_ldap_groupecreators'] = '哪些组或情景的成员允许创建组。多个组使用“;”分隔，例如“cn=teachers,ou=staff,o=myorg”';
$string['auth_ldap_groupecreators_key'] = '组创建者';
$string['auth_ldap_host_url'] = '以 URL 形式指定 LDAP 主机，类似于：“ldap://ldap.myorg.com/”或“ldaps://ldap.myorg.com/”。多个服务器之间用“;”分隔来获得故障转移支持。';
$string['auth_ldap_host_url_key'] = '主机 URL';
$string['auth_ldap_ldap_encoding'] = '指定 LDAP 服务器的编码方式。一般是 utf-8。MS AD V2 使用默认的平台编码，如 cp1252、cp1250 等。';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP 编码方式';
$string['auth_ldap_login_settings'] = '登录设置';
$string['auth_ldap_memberattribute'] = '可选：当用户属于某个组时，覆盖用户成员的属性。一般是“member”';
$string['auth_ldap_memberattribute_isdn'] = '可选：覆盖对成员属性值的处理，0 或 1。';
$string['auth_ldap_memberattribute_isdn_key'] = '成员属性中使用 dn';
$string['auth_ldap_memberattribute_key'] = '成员属性';
$string['auth_ldap_noconnect'] = 'LDAP 模块不能连接上服务器：{$a}';
$string['auth_ldap_noconnect_all'] = 'LDAP 模块不能连接到任何服务器：{$a}';
$string['auth_ldap_noextension'] = '<em>似乎没有安装 PHP LDAP模块。如果您要使用此认证方式，请确认它已安装且被激活。</em>';
$string['auth_ldap_no_mbstring'] = '在 Active Directory 中创建用户时需要 mbstring 扩展支持。';
$string['auth_ldapnotinstalled'] = '不能使用 LDAP 认证方式，PHP LDAP 模块没有安装。';
$string['auth_ldap_objectclass'] = '可选：覆盖在 ldap_user_type 中命名或搜索用户时使用的 objectClass。通常您不需修改这个选项。';
$string['auth_ldap_objectclass_key'] = '对象类';
$string['auth_ldap_opt_deref'] = '检查在搜索时如何处理别名。选择下列值之一: “否”(LDAP_DEREF_NEVER) 或“是”(LDAP_DEREF_ALWAYS)。';
$string['auth_ldap_opt_deref_key'] = '弃用别名';
$string['auth_ldap_passtype'] = '指定在 LDAP 服务器中的新密码或者更改密码的格式。';
$string['auth_ldap_passtype_key'] = '密码格式';
$string['auth_ldap_passwdexpire_settings'] = 'LDAP 密码过期设置。';
$string['auth_ldap_preventpassindb'] = '如果设定为是，则在Moodle的数据库中不会存储密码。';
$string['auth_ldap_preventpassindb_key'] = '隐藏密码';
$string['auth_ldap_search_sub'] = '在子场景中搜索用户。';
$string['auth_ldap_search_sub_key'] = '搜索子场景';
$string['auth_ldap_server_settings'] = 'LDAP 服务器设置';
$string['auth_ldap_unsupportedusertype'] = '认证: ldap user_create() 函数不支持所选的用户类型：“{$a}”';
$string['auth_ldap_update_userinfo'] = '从 LDAP 向本系统更新用户信息（姓名、地址……）。请指定您需要的“数据映射”。';
$string['auth_ldap_user_attribute'] = '可选：覆盖用于命名/搜索用户的属性。通常为“cn”。';
$string['auth_ldap_user_attribute_key'] = '用户属性';
$string['auth_ldap_user_exists'] = 'LDAP 用户名已存在。';
$string['auth_ldap_user_settings'] = '用户查找设置';
$string['auth_ldap_user_type'] = '选择用户如何储存在 LDAP 中。这个选项同时也指定了登录期限、宽限登录和用户创建如何工作。';
$string['auth_ldap_user_type_key'] = '用户类型';
$string['auth_ldap_usertypeundefined'] = 'config.user_type 没有定义或函数 ldap_expirationtime2unix 不支持选择的类型！';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type 没有定义或函数 ldap_unixi2expirationtime 不支持选择的类型！';
$string['auth_ldap_version'] = '您的服务器正使用的 LDAP 协议版本。';
$string['auth_ldap_version_key'] = '版本';
$string['auth_ntlmsso'] = 'NTLM 单点登录';
$string['auth_ntlmsso_enabled'] = '设置为“是”将尝试用 NTLM 域进行单点登录。<strong>注意:</strong>还需要在 Web 服务器上有额外的设置，具体查看 <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = '启用';
$string['auth_ntlmsso_ie_fastpath'] = '设为是来启用NTLM单点登录快速路径（将跳过某些步骤，但只在客户端浏览器为微软Internet Explorer时生效）。';
$string['auth_ntlmsso_ie_fastpath_key'] = '微软IE快速路径？';
$string['auth_ntlmsso_subnet'] = '如设置，则只当客户端处于此子网中时，使用单点登录。格式：xxx.xxx.xxx.xxx/bitmask。用“,”（半角逗号）分隔多个子网。';
$string['auth_ntlmsso_subnet_key'] = '子网';
$string['auth_ntlmsso_type'] = 'Web服务器中设置的用户认证方法（如果不知道该添什么，就选NTLM）';
$string['auth_ntlmsso_type_key'] = '认证类型';
$string['connectingldap'] = '正在连接LDAP服务器...';
$string['creatingtemptable'] = '正在创建临时表{$a}';
$string['didntfindexpiretime'] = 'password_expire()未找到过期时间。';
$string['didntgetusersfromldap'] = '没有从LDAP获得任何用户——出错？——退出中';
$string['gotcountrecordsfromldap'] = '从LDAP获得{$a}条记录';
$string['morethanoneuser'] = '诡异！在LDAP中找到多于一条的用户记录。只使用第一条。';
$string['needbcmath'] = '您需要安装BCMath插件才能使用活动目录中的宽限登录';
$string['needmbstring'] = '您需要安装mbstring插件才能使用活动目录中的宽限登录';
$string['nodnforusername'] = 'user_update_password()出错。{$a->username}没有DN';
$string['noemail'] = '尝试发送给您一封email，但是失败了！';
$string['notcalledfromserver'] = '不应从web服务器调用！';
$string['noupdatestobedone'] = '没有更新可做';
$string['nouserentriestoremove'] = '没有可删除的用户项';
$string['nouserentriestorevive'] = '没有可恢复的用户项';
$string['nouserstobeadded'] = '没有可添加的用户';
$string['ntlmsso_attempting'] = '尝试通过NTLM进行单点登录';
$string['ntlmsso_failed'] = '自动登录失败，尝试到普通登录页面登录……';
$string['ntlmsso_isdisabled'] = 'NTLM 单点登录被禁用。';
$string['ntlmsso_unknowntype'] = '未知的ntlmsso类型！';
$string['pluginname'] = 'LDAP 服务器';
$string['pluginnotenabled'] = '插件未启用！';
$string['renamingnotallowed'] = 'LDAP不允许用户重命名';
$string['rootdseerror'] = '活动牡蛎查询rootDSE出错';
$string['updatepasserror'] = 'user_update_password()出错。错误代码：{$a->errno}；错误信息：{$a->errstring}';
$string['updatepasserrorexpire'] = 'user_update_password()读取密码期限时出错。错误代码：{$a->errno}；错误信息：{$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'user_update_password()修改密码期限和/或宽限登录时出错。错误代码：{$a->errno}；错误信息：{$a->errstring}';
$string['updateremfail'] = '更新LDAP记录出错。错误代码：{$a->errno}；错误信息：{$a->errstring}<br />键值（{$a->key}）- 旧moodle值：“{$a->ouvalue}”，新值：“{$a->nuvalue}”';
$string['updateremfailamb'] = '无法使用不明确的字段{$a->key}更新LDAP - 旧moodle值：“{$a->ouvalue}”，新值：“{$a->nuvalue}”';
$string['updateusernotfound'] = '在外部更新时找不到用户。细节信息：搜索基：“{$a->userdn}”；搜索过滤器：“(objectClass=*)”；搜索属性：{$a->attribs}';
$string['useracctctrlerror'] = '获得{$a}的userAccountControl时出错';
$string['user_activatenotsupportusertype'] = '认证：ldap user_activate()不支持所选的用户类型：{$a}';
$string['user_disablenotsupportusertype'] = '认证：ldap user_disable()不支持所选的用户类型：{$a}';
$string['userentriestoadd'] = '要添加的用户项：{$a}';
$string['userentriestoremove'] = '要删除的用户项：{$a}';
$string['userentriestorevive'] = '要恢复的用户项：{$a}';
$string['userentriestoupdate'] = '要更新的用户项：{$a}';
$string['usernotfound'] = '未在LDAP中找到用户';
