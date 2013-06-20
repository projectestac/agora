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
 * Strings for component 'portfolio_boxnet', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API key';
$string['err_noapikey'] = '没有 API key';
$string['err_noapikey_help'] = '未为此插件配置 API key。您可以从 OpenBox development 页面获取。';
$string['existingfolder'] = '文件放入哪个已有文件夹';
$string['folderclash'] = '您请求创建的文件夹已存在！';
$string['foldercreatefailed'] = '在 box.net 创建您的目标文件夹失败';
$string['folderlistfailed'] = '从 box.net 获取文件夹列表失败';
$string['newfolder'] = '文件放入新文件夹';
$string['noauthtoken'] = '无法获取此次会话使用的认证令牌';
$string['notarget'] = '您必须为上传指定一个文件夹或新建一个';
$string['noticket'] = '无法从 box.net 获取启动认证会话的入场券';
$string['password'] = '您的 box.net 密码（不会被保存）';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = '向 box.net 发送内容失败：{$a}';
$string['setupinfo'] = '配置指导';
$string['setupinfodetails'] = '要获取 API key，请登录 Box.net，访问他们的 <a href="{$a->servicesurl}">OpenBox development page</a>。在“Developer Tools”，跟随“Create new application”，为您的 Moodle 网站创建新应用。在接下来的表单中，“Redirect URL”字段填入如下网址：<br /><code>{$a->callbackurl}</code><br />您可以自愿选择是否提供关于您的 Moodle 网站的其它信息。将来可以在“View my applications”页面编辑这些信息。';
$string['sharedfolder'] = '已共享';
$string['sharefile'] = '共享此文件？';
$string['sharefolder'] = '共享此新文件夹？';
$string['targetfolder'] = '目标文件夹';
$string['tobecreated'] = '将创建';
$string['username'] = '您的 box.net 用户名（不会被保存）';
