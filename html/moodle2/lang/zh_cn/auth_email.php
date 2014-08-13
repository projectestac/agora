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
 * Strings for component 'auth_email', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>基于电子邮件的自助注册使用户能通过登录页面上“创建新帐户”按钮创建自己的帐户。然后用户会收到一封包含秘密链接的Email，点击可以确认账户。以后登录只向 Moodle 数据库校验用户名和密码。</p><p>注：除了启用插件，还需要在“管理身份验证”页面上的自助注册下拉菜单里选中基于电子邮件的自助注册。</p>';
$string['auth_emailnoemail'] = '尝试发送给您一封email，但是失败了！';
$string['auth_emailrecaptcha'] = '在Email自助注册页面中增加图像/声音验证。这将有利于保护网站免收垃圾信息发送者的干扰，同时还会对一项有意义的事业做贡献。详情请看：http://www.google.com/recaptcha/learnmore 。<em>需要 PHP cURL 扩展。</em>';
$string['auth_emailrecaptcha_key'] = '激活 reCAPTCHA 元素';
$string['auth_emailsettings'] = '设置';
$string['pluginname'] = '基于email的自助注册';
