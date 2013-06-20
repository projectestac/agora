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
 * Strings for component 'auth_mnet', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = '当设置为“是”时，当远程用户第一次登录时，本地用户记录将会自动创建。';
$string['auth_mnetdescription'] = '通过在您的 Moodle 网络设置中允许用户通过信赖的主机认证。';
$string['auth_mnet_roamin'] = '这些主机的用户不能进入您的站点。';
$string['auth_mnet_roamout'] = '您的用户可以进入到这些主机的站点中。';
$string['auth_mnet_rpc_negotiation_timeout'] = '通过 XMLRPC 进行认证时的超时时间（秒）。';
$string['auto_add_remote_users'] = '自动添加远程用户';
$string['pluginname'] = 'MNet认证';
$string['rpc_negotiation_timeout'] = 'RPC 超时';
$string['sso_idp_description'] = '发布该服务后，用户浏览 {$a} 时无需重新登录。<ul><li><em>依赖</em>: 您必须<strong>订阅</strong> {$a} 上的 SSO (Service Provider)服务。</li></ul><br />订阅此服务，使用户从 {$a} 访问到您的网站时无需重新登录。<ul><li><em>依赖</em>：同时您必须向 {$a} <strong>发布</strong> SSO (Service Provider) 服务。</li></ul><br />';
$string['sso_idp_name'] = 'SSO(Identity Provider)';
$string['sso_mnet_login_refused'] = '不允许用户 {$a->user} 从 {$a->host} 登录。';
$string['sso_sp_description'] = '发布该服务后，则{$a}上的认证用户访问您的网站时，无需重新登录。<ul><li><em>依赖性</em>：您必须<strong>申请</strong> {$a} 上的 SSO (Identity Provider) 服务。</li></ul><br />申请该服务后，您的用户从您的网站访问{$a}时也无需重新登录。<ul><li><em>依赖性</em>：同时您必须向 {$a} <strong>发布</strong> SSO (Identity Provider) 服务。</li></ul><br />';
$string['sso_sp_name'] = 'SSO(Service Provider)';
