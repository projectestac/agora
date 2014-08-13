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
 * Strings for component 'auth_pop3', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_pop3
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pop3changepasswordurl_key'] = '更改密码 URL';
$string['auth_pop3description'] = '该方法使用一个 POP3 服务器来检验用户名和密码的有效性。';
$string['auth_pop3host'] = 'POP3 服务器地址。用IP地址，不要用域名。';
$string['auth_pop3host_key'] = '主机';
$string['auth_pop3mailbox'] = '要连接的邮箱名称，通常是INBOX。';
$string['auth_pop3mailbox_key'] = '邮箱';
$string['auth_pop3notinstalled'] = '不能使用 POP3 认证方式，因为没有安装 PHP IMAP 模块。';
$string['auth_pop3port'] = '服务器端口(一般是 110，SSL 常用 995)';
$string['auth_pop3port_key'] = '端口';
$string['auth_pop3type'] = '服务器类型。如果您的 POP3 服务器使用安全验证，请选择 pop3cert。';
$string['auth_pop3type_key'] = '类型';
$string['pluginname'] = 'POP3服务器';
