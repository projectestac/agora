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
 * Strings for component 'portfolio_googledocs', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = '客户端 ID';
$string['noauthtoken'] = '没有从 google 收到认证令牌。请确定您已允许 moodle 访问您的 google 账号。';
$string['nooauthcredentials'] = '需要 OAuth 认证。';
$string['nooauthcredentials_help'] = '为了使用 Google 文档组合插件，您必须在组合选项中配置 OAuth 认证。';
$string['nosessiontoken'] = '一个不存在的会话令牌阻止向 google 导出。';
$string['oauth2upgrade_message_content'] = '作为升级至 Moodle 2.3 的一部分，Google 文件组合插件已被禁用。若要重新启用，您的 Moodle 站点需要在 Google 重新注册，以获得一个客户端 ID 和密匙，正如在文档 {$a->docsurl} 中描述的那样。客户端 ID 和密匙可以被用来配置所有的 Google 文档和 Picasa 插件。';
$string['oauth2upgrade_message_small'] = '该插件已被禁用，因为它需要文档里所说的 Google OAuth 2.0 设置的配置。';
$string['oauth2upgrade_message_subject'] = '关于 Google 文档组合插件的重要信息';
$string['oauthinfo'] = '<p>为了使用此插件，您必须在 Google 上重新注册您的站点，正如在文档 <a href="{$a->docsurl}">Google OAuth 2.0 设置</a>中描述的那样。</p><p>作为注册过程中的一部分，您将需要输入如下的 URL 作为“授权的重定向 URL”：</p><p>{$a->callbackurl}</p>一旦重新注册，您将会得到一个客户端 ID 和密匙，他们可以用来配置所有的 Google 文档和 Picasa 插件。</p>';
$string['pluginname'] = 'Google 文件';
$string['secret'] = '密匙';
$string['sendfailed'] = '文件 {$a} 未能成功传送到 google';
