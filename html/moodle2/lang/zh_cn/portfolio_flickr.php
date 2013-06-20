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
 * Strings for component 'portfolio_flickr', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API key';
$string['contenttype'] = '内容类型';
$string['err_noapikey'] = '没有 API key';
$string['err_noapikey_help'] = '此插件未配置 API key。您可以从 Flickr 服务页面申请一个。';
$string['hidefrompublicsearches'] = '不想此图片被公开搜索到？';
$string['isfamily'] = '对家人可见';
$string['isfriend'] = '对朋友可见';
$string['ispublic'] = '公开（任何人都能看到）';
$string['moderate'] = '适中';
$string['noauthtoken'] = '无法获取此次会话使用的认证令牌';
$string['other'] = '艺术、插图、CGI 或其它非照片的图片';
$string['photo'] = '照片';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = '受限';
$string['safe'] = '安全';
$string['safetylevel'] = '安全等级';
$string['screenshot'] = '屏幕截图';
$string['set'] = '设置';
$string['setupinfo'] = '配置指导';
$string['setupinfodetails'] = '要获取 API key 和密钥，登录 Flickr，然后<a href="{$a->applyurl}">申请一个新key</a>。当新 key 和密钥已创建，点击页面内的“编辑此应用程序的认证流程”，选择“應用程式類型”为“網站應用程式”。在“回呼 URL”字段，输入： <br /><code>{$a->callbackurl}</code><br />您可以自愿选择是否提供您的 Moodle 网站描述和徽标。<a href="{$a->keysurl}">此页</a>列出您的所有 Flickr 应用程序，将来可以在那里修改各种信息。';
$string['sharedsecret'] = '密钥';
$string['title'] = '标题';
$string['uploadfailed'] = '向 flickr.com 上传图片失败：{$a}';
