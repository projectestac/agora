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
 * Strings for component 'portfolio_mahara', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = '启用 Leap2A 公文包支持（需要 Mahara 1.3 或更高版本）';
$string['err_invalidhost'] = '无效的 MNet 主机';
$string['err_invalidhost_help'] = '此插件的配置错误地指向了一个无效（或已删除）的 MNet 主机。此插件依赖发布了 SSO IDP、订阅了 SSO_SP 和 订阅<b>且</b>发布了云存储的 Moodle 网络伙伴。';
$string['err_networkingoff'] = 'MNet 关闭';
$string['err_networkingoff_help'] = 'MNet 被完全关闭。请在配置此插件前启用它。在修正之前，此插件的所有实例都会隐藏。您需要手工设置它们为可见。此前它们都不能使用';
$string['err_nomnetauth'] = 'MNet 认证插件已禁用';
$string['err_nomnetauth_help'] = 'MNet 认证插件已禁用，但此服务需要它';
$string['err_nomnethosts'] = '依赖 MNet';
$string['err_nomnethosts_help'] = '此插件要求 MNet 伙伴要发布 SSO IDP、订阅 SSO SP、发布云存储服务<b>并且</b>也订阅了MNet认证插件。在条件不都满足之前，此插件的所有实例都会隐藏。需要手工设置它们为可见。';
$string['failedtojump'] = '与远程服务器通信失败';
$string['failedtoping'] = '与远程服务器通信失败：{$a}';
$string['mnethost'] = 'MNet 主机';
$string['mnet_nofile'] = '传送对象中没有文件——诡异的错误';
$string['mnet_nofilecontents'] = '传送对象中有文件，但是读不到内容——诡异的错误：{$a}';
$string['mnet_noid'] = '找不到与此令牌相匹配的传送记录';
$string['mnet_notoken'] = '找不到与此次传送匹配的令牌';
$string['mnet_wronghost'] = '远程主机与此令牌的传送记录不匹配';
$string['pf_description'] = '允许用户推送 Moodle 内容到此主机<br />订阅<b>并</b>发布此服务可以让此网站的认证用户推送内容到{$a}<br /><ul><li><em>相关</em>：您必须也<strong>发布</strong> SSO（身份提供者）服务到{$a}。.</li><li><em>相关</em>：您必须也<strong>订阅</strong>{$a}的 SSO（身份提供者）服务</li><li><em>相关</em>：您必须也启用 MNet 认证插件。</li></ul><br />';
$string['pf_name'] = '云存储服务';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = '您现在不能向 Mahara 传送文件';
$string['url'] = 'URL';
