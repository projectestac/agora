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
 * Strings for component 'message_email', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = '允许用户选择字符集';
$string['configallowusermailcharset'] = '启用这个选项，网站的所有用户都可以指定用哪种编码给自己发送Email。';
$string['configmailnewline'] = '在邮件信息中使用的换行符。依据RFC 822bis CRLF是必须的，一些邮件服务器将自动将其从LF转换为CRLF，其他的邮件服务器错误的将其从CRLF转换为CRCRLF。还有一些拒绝LF的邮件（如qmail）。如果有未送达的邮件或者两个换行时，尝试改变这个设置。';
$string['confignoreplyaddress'] = '有时电子邮件以用户身份发送(如讨论区帖子)。有时用户不希望别人看到自己的电子邮件地址，在这些情况下，您在此处指定的电子邮件地址将会被使用。';
$string['configsitemailcharset'] = '您系统所生成的所有邮件将使用您在此设定的字符集编码。同时，如果您启用下一个选项，那么所有的用户都可以设定自己的邮件所需的字符集。';
$string['configsmtphosts'] = '填入一个或多个本地SMTP服务器全名(例如“mail.a.com”或“mail.a.com;mail.b.com”)，本系统将用它(们)发送邮件。使用[server]:[port]的形式（例如“mail.a.com:587”）指定一个非标准端口（即25以外的端口）。如果使用安全连接，SSL通常使用465端口，TLS通常使用587端口。有必要的话在下面指定安全协议。如果留空不填，Moodle将使用PHP默认的方法发信。';
$string['configsmtpmaxbulk'] = '每个SMTP会话发送消息的最大数。';
$string['configsmtpsecure'] = '如果 SMTP 服务器要求使用安全连接，请指定正确的协议类型。';
$string['configsmtpuser'] = '如果您在上面指定了一个SMTP服务器，而且该服务器要求身份认证，那么在此填入用户名和密码。';
$string['email'] = 'Email通知发送到';
$string['ifemailleftempty'] = '留空就会将通知发送到{$a}';
$string['mailnewline'] = '邮件中的换行符';
$string['none'] = '无';
$string['noreplyaddress'] = '不要回复的地址';
$string['pluginname'] = 'Email';
$string['sitemailcharset'] = '字符集';
$string['smtphosts'] = 'SMTP主机';
$string['smtpmaxbulk'] = 'SMTP会话限制';
$string['smtppass'] = 'SMTP密码';
$string['smtpsecure'] = 'SMTP 安全';
$string['smtpuser'] = 'SMTP用户名';
