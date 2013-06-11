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
 * Strings for component 'auth_shibboleth', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = '身份认证方法名称';
$string['auth_shib_auth_method_description'] = '给Shibboleth验证方法起一个用户熟悉的名字。可以是您的Shibboleth组织的名字，比如<tt>SWITCHaai 登陆</tt> 或者 <tt>InCommon 登陆</tt> 或者其他类似的名字。';
$string['auth_shibboleth_contact_administrator'] = '万一您和给定的组织没有关系，并且又想访问服务器上的课程，那么请与我们联系';
$string['auth_shibbolethdescription'] = '是用这个方法，用户的创建和验证是使用 <a href="http://shibboleth.internet2.edu/" target="_blank">Shibboleth</a> 进行的';
$string['auth_shibboleth_errormsg'] = '请选择您所在的组织';
$string['auth_shibboleth_login'] = 'Shibboleth 登录';
$string['auth_shibboleth_login_long'] = '通过口令登录 Moodle';
$string['auth_shibboleth_manual_login'] = '手工登录';
$string['auth_shibboleth_select_member'] = '我是成员之一';
$string['auth_shibboleth_select_organization'] = '对于通过口令惊醒验证，请在下拉列表中选择您所在的组织。';
$string['auth_shib_changepasswordurl'] = '更改密码 URL';
$string['auth_shib_convert_data'] = '数据修改 API';
$string['auth_shib_convert_data_description'] = '您可以是用此 API 将修改过的数据提交给 Shibboleth。要了解细节，请参考<a href="../auth/shibboleth/README.txt" target="_blank">README</a>。';
$string['auth_shib_convert_data_warning'] = '此文件不存在或无法被 Web 服务器读取！';
$string['auth_shib_idp_list'] = '身份提供者';
$string['auth_shib_idp_list_description'] = '提供身份提供者的 entityID 列表，供用户在登录页面选择。<br />每行都必须是一个半角逗号分隔的二元组，一个是 IdP（在Shibboleth 元数据文件中）的 entityID，另一个是显示在下拉列表中的 IdP 的名字。<br />如果您的 Moodle 是多联邦配置的一部分，那么会使用可选的第三个参数，那是 Shibboleth 会话起始器的位置。';
$string['auth_shib_instructions'] = '如果您的学校支持 Shibboleth，可以使用 <a href="{$a}">Shibboleth登录</a>来访问它。<br />否则请使用普通的登录表格。';
$string['auth_shib_instructions_help'] = '应当在此为您的用户提供关于 Shibboleth 的解释。在登录屏幕上，将会显示这些提示。其中应当包含一个指向“<b>{$a}</b>”的链接，这样 用户可以轻 松等如。如果此项为空，缺省的指示信息将会被是用(并非为 Shibboleth 定制)。';
$string['auth_shib_integrated_wayf'] = 'Moodle的WAYF服务';
$string['auth_shib_integrated_wayf_description'] = '如果选中这一项，Moodle将会使用自己的WAYF服务代替原先为Shibboleth所配置的服务。Moodle会在这个新的登录页面上显示一个下拉列表以供用户选择自己的身份提供者。';
$string['auth_shib_logout_return_url'] = '备用的登出返回URL';
$string['auth_shib_logout_return_url_description'] = '请提供Shibboleth用户注销后跳转页面的URL。<br/>用户将会被重定向到Moodle默认的重定向地址。';
$string['auth_shib_logout_url'] = 'Shibboleth服务提供商退出处理URL';
$string['auth_shib_logout_url_description'] = '提供指向Shibboleth服务提供商退出处理的URL。一般形如<tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = '如果想使用整合的 WAYF 服务，您必须提供一个独立的身份提供商列表，包括 entityIDs，名称和可选的会话发起者';
$string['auth_shib_only'] = '只用 Shibboleth';
$string['auth_shib_only_description'] = '如果只是用 Shibboleth 认证方式，请设定此选项。';
$string['auth_shib_username_description'] = '用在 Moodle 中当作用户名的 Shibboleth环 境变量名';
$string['pluginname'] = 'Shibboleth';
$string['shib_no_attributes_error'] = '您似乎正在使用 Shibboleth 认证，但是 Moodle 不接受用户的属性。请确认您的身份提供者激活了必要的属性({$a})，或者向这个服务器的网络管理员报表。';
$string['shib_not_all_attributes_error'] = 'Moodle 需要 Shibboleth 属性，但是现在不存在这些属性。这些属性是: {$a}<br /> 请联系服务器的网络管理员或您的身份认证者。';
$string['shib_not_set_up_error'] = 'Shibboleth 认证并没有正确地安装，因为在此页上并没有 Shibboleth 环境变量。请查阅 <a href="README.txt">README</a>获得更多的建议或联系安装此Moodle系统的网络管理员。';
