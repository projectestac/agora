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
 * Strings for component 'report_security', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>建议在安装完成后将config.php文件权限改为web服务器不可写。
请注意，此度量不会显著提高服务器的安全性，不过它可能减慢或限制一般的攻击。</p>';
$string['check_configrw_name'] = 'config.php文件可改写';
$string['check_configrw_ok'] = 'config.php 无法通过 PHP 脚本编辑。';
$string['check_configrw_warning'] = 'PHP 脚本可以修改 config.php 文件。';
$string['check_cookiesecure_details'] = '<p>如果您启用了https通信，那么建议您也启用安全cookie。您还应该将 http 永久重定向到https。</p>';
$string['check_cookiesecure_error'] = '请启用安全的 cookie';
$string['check_cookiesecure_name'] = '安全的 cookie';
$string['check_cookiesecure_ok'] = '已启用安全的 cookie。';
$string['check_defaultuserrole_details'] = '<p>所有已登录的用户都会拥有缺省角色的权限。请确信此角色没有危险的权限。</p>
<p>缺省用户对应的旧角色只能是<em>已认证用户</em>。一定不能有查看课程权限。</p>';
$string['check_defaultuserrole_error'] = '默认角色“{$a}”未正确定义！';
$string['check_defaultuserrole_name'] = '所有用户的缺省角色';
$string['check_defaultuserrole_notset'] = '缺省角色未设置。';
$string['check_defaultuserrole_ok'] = '为所有用户定义的缺省角色是正确的。';
$string['check_displayerrors_details'] = '<p>不建议在正式网站打开PHP设置<code>display_errors</code>，因为错误信息可能会暴露服务器上的一些敏感信息。</p>';
$string['check_displayerrors_error'] = '显示错误信息的PHP设置被打开。建议关闭它。';
$string['check_displayerrors_name'] = '显示 PHP 错误信息';
$string['check_displayerrors_ok'] = '显示 PHP 错误信息已禁用。';
$string['check_emailchangeconfirmation_details'] = '<p>建议用户在个人资料中修改email地址后，必须做email确认。如果禁用，可能会有人通过发送垃圾信息来攻击服务器。</p>
<p>认证插件中可能已经锁定了email域，这一步在这里没有考虑。</p>';
$string['check_emailchangeconfirmation_error'] = '用户可以使用任意 Email 地址。';
$string['check_emailchangeconfirmation_info'] = '用户仅能使用特定域名的 Email 地址。';
$string['check_emailchangeconfirmation_name'] = 'Email 修改确认';
$string['check_emailchangeconfirmation_ok'] = '修改用户信息中的 Email 时需确认。';
$string['check_embed_details'] = '<p>毫无限制的对象嵌入是非常危险的——任何注册用户都可以发起针对其它用户的XSS攻击。此设置在正式网站上应该禁用。</p>';
$string['check_embed_error'] = '允许无限制地嵌入对象——对于大多数服务器而言，这非常危险。';
$string['check_embed_name'] = '允许 EMBED 和 OBJECT';
$string['check_embed_ok'] = '不允许无限制地嵌入对象。';
$string['check_frontpagerole_details'] = '<p>默认的首页角色是所有注册用户在参与首页活动时所使用的角色。请确保该角色未被赋予危险的权限。</p>
<p>强烈建议为此创建一个新的角色且不要给它赋予任何传统角色。</p>';
$string['check_frontpagerole_error'] = '检测到未正确定义的首页角色“{$a}”！';
$string['check_frontpagerole_name'] = '首页角色';
$string['check_frontpagerole_notset'] = '未设置首页角色。';
$string['check_frontpagerole_ok'] = '首页角色定义正确。';
$string['check_globals_details'] = '<p>注册全局变量是一个高度不安全的PHP设置。</p>
必须在PHP配置中写上<p><code>register_globals=off</code>。可以通过编辑<code>php.ini</code>、Apache/IIS配置或<code>.htaccess</code>文件来控制它。</p>';
$string['check_globals_error'] = '一定要禁止注册全局变量。请立刻修改服务器的PHP设置！';
$string['check_globals_name'] = '注册全局变量';
$string['check_globals_ok'] = '注册全局变量已禁用。';
$string['check_google_details'] = '<p>向Google开放后，搜索引擎就可以以访客身份进入课程。如果不允许访客访问的话，那么打开这个设置也没有意义。</p>';
$string['check_google_error'] = '搜索引擎可以访问，但访客不能访问。';
$string['check_google_info'] = '搜索引擎可以作为访客进入。';
$string['check_google_name'] = '对谷歌开放';
$string['check_google_ok'] = '不允许搜索引擎访问';
$string['check_guestrole_details'] = '<p>访客角色由访客、未登录用户和临时访问课程的访客使用。请确认此角色没有危险的权限。</p>
<p>访客用户对应的旧角色只能是<em>访客</em>。</p>';
$string['check_guestrole_error'] = '访客角色“{$a}”定义错误！';
$string['check_guestrole_name'] = '访客角色';
$string['check_guestrole_notset'] = '未设定访客角色。';
$string['check_guestrole_ok'] = '访客角色定义正确。';
$string['check_mediafilterswf_details'] = '<p>自动嵌入swf非常危险——任何注册用户都可能发起针对其它用户的XSS攻击。请在正式服务器禁用它。</p>';
$string['check_mediafilterswf_error'] = 'Flash 媒体过滤器已经激活——对于大多数服务器而言，这是非常危险的。';
$string['check_mediafilterswf_name'] = '激活的 .swf 媒体过滤器';
$string['check_mediafilterswf_ok'] = 'Flash 媒体过滤器未激活。';
$string['check_noauth_details'] = '<p><em>不认证身份</em>插件不是给正式网站设计的。除非这是一个开发测试网站，否则请禁用它。</p>';
$string['check_noauth_error'] = '不认证身份插件不能在正式网站使用。';
$string['check_noauth_name'] = '不认证身份';
$string['check_noauth_ok'] = '不认证身份插件已禁用。';
$string['check_openprofiles_details'] = '<p>开放用户个人信息可能会被不良用户滥用。建议启用<code>强制用户登录后才能访问个人资料</code>或者<code>强制用户登录</code>。</p>';
$string['check_openprofiles_error'] = '任何人无须登录就可以查看用户的个人信息。';
$string['check_openprofiles_name'] = '开放用户个人信息';
$string['check_openprofiles_ok'] = '在查看用户个人信息前需登录。';
$string['check_passwordpolicy_details'] = '<p>建议您设定一个密码策略，因为猜测密码是最常见的非法入侵方法。同时您也不要把密码策略设定的太苛刻，这会导致用户无法记住他们的密码以至于忘记密码或把密码写下来。</p>';
$string['check_passwordpolicy_error'] = '密码策略未设置。';
$string['check_passwordpolicy_name'] = '密码策略';
$string['check_passwordpolicy_ok'] = '密码策略已激活。';
$string['check_passwordsaltmain_details'] = '<p>设置密码盐可以极大地降低密码被盗的风险。</p>
<p>把下面这行代码加入config.php文件来设置密码盐：</p>
<code>$CFG->passwordsaltmain = \'有大量随机字符的长字符串\';</code>
<p>此随机字符串应该是字母、数字和其它符号的混合。建议至少要40个字符长。</p>
<p>如果您想修改密码盐，请参考<a href="{$a}" target="_blank">密码盐文档</a>。一旦设置，请不要删除您的密码盐，否则您将永远无法登录您的网站！</p>';
$string['check_passwordsaltmain_name'] = '密码盐';
$string['check_passwordsaltmain_ok'] = '密码盐正常';
$string['check_passwordsaltmain_warning'] = '未设置密码盐';
$string['check_passwordsaltmain_weak'] = '密码盐强度较弱';
$string['check_riskadmin_detailsok'] = '<p>请确认下列人员为系统管理员：</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>请确认下列系统管理员：</p>{$a->admins}
<p>建议只在系统场景下分配管理员角色。下列用户在其它场景中被分配了管理员角色（不支持）：</p>{$a->unsupported}';
$string['check_riskadmin_name'] = '管理员';
$string['check_riskadmin_ok'] = '找到了 {$a} 个服务器管理员。';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} （{$a->email}）评估角色分配</a>';
$string['check_riskadmin_warning'] = '找到 {$a->admincount} 个服务器管理员和 {$a->unsupcount} 个不支持的管理员角色分配。';
$string['check_riskbackup_detailsok'] = '没有被明确允许备份用户数据的角色。但是，请注意，有“doanything”权限的管理员仍然可以这么做。';
$string['check_riskbackup_details_overriddenroles'] = '<p>这些有效的角色覆盖使用户获得在备份中包含其它用户数据的权限。请确认此权限是必须的。</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>下列系统角色有在备份中包含用户数据的权限。请确认此权限是必须的。</p> {$a}';
$string['check_riskbackup_details_users'] = '<p>因为上面的角色或局部覆盖，下列用户现在可以在备份中包含选修他们课程的所有用户的隐私数据。请确认他们是可信任的，且他们的密码足够强壮：</p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->name}在{$a->contextname}</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = '备份用户数据';
$string['check_riskbackup_ok'] = '没有被明确允许备份用户数据的角色';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email})在{$a->contextname}</a>';
$string['check_riskbackup_warning'] = '找到 {$a->rolecount} 个角色、{$a->overridecount}个覆盖和 {$a->usercount} 个用户有备份用户数据的权限。';
$string['check_riskxss_details'] = '<p>有 RISK_XSS 标记的权限是危险的权限，只能允许可信任的用户使用。</p>
<p>请确认下面的用户列表，确认此服务器完全信任他们：</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'XSS 信任用户';
$string['check_riskxss_warning'] = 'RISK_XSS——发现 {$a} 个必须被信任的用户。';
$string['check_unsecuredataroot_details'] = '<p>dataroot 目录必须不能通过 web 访问。使此目录不可访问的最好方法是使用在公开 web 目录之外的目录。</p>
<p>如果您移动此目录，您需要相应地更新 <code>config.php</code> 中的 <code>$CFG->dataroot</code> 设置。</p>';
$string['check_unsecuredataroot_error'] = '您的数据目录 <code>{$a}</code> 位置错误，它可以直接通过 Web 访问！';
$string['check_unsecuredataroot_name'] = '不安全的数据目录';
$string['check_unsecuredataroot_ok'] = '数据目录不能通过 Web 直接访问。';
$string['check_unsecuredataroot_warning'] = '您的数据目录 <code>{$a}</code> 位置错误，可以从 Web 直接访问。';
$string['configuration'] = '配置';
$string['description'] = '描述';
$string['details'] = '详细';
$string['issue'] = '问题';
$string['pluginname'] = '安全性概览';
$string['security:view'] = '查看安全报表';
$string['status'] = '状态';
$string['statuscritical'] = '危险';
$string['statusinfo'] = '信息';
$string['statusok'] = '正常';
$string['statusserious'] = '严重';
$string['statuswarning'] = '警告';
$string['timewarning'] = '处理数据可能会需要很长时间，请耐心等待...';
