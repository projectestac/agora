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
 * Strings for component 'enrol_self', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['customwelcomemessage'] = '自定义欢迎信息';
$string['defaultrole'] = '缺省分配的角色';
$string['defaultrole_desc'] = '选择用户自助选课后被分配的角色';
$string['enrolenddate'] = '结束时间';
$string['enrolenddate_help'] = '如果启用，用户只能在此日期前自行加入此课程。';
$string['enrolenddaterror'] = '选课的结束时间不能早于开始时间';
$string['enrolme'] = '将我加入';
$string['enrolperiod'] = '保持选课时长';
$string['enrolperiod_desc'] = '缺省的保持选课有效的时间长度（单位：秒）。如果设为0，就默认不限制保持选课时长。';
$string['enrolperiod_help'] = '用户身份有效期长度，从用户自行加入课程之日算起。禁止此选项意味着用户身份永久有效。';
$string['enrolstartdate'] = '开始时间';
$string['enrolstartdate_help'] = '如果启用，用户只能在此日期后自行加入此课程。';
$string['groupkey'] = '使用分组选课密码';
$string['groupkey_desc'] = '缺省使用分组选课密码。';
$string['groupkey_help'] = '除了只限知道密码的用户访问课程以外，还可以让用户在选课时输入分组密码，这样他就能被自动加入到小组中。

要使用分组选课密码，必须在组设置中设定组密码的同时，在课程设置中设定选课密码。';
$string['longtimenosee'] = '多久不活动就撤销选课';
$string['longtimenosee_help'] = '如果用户很长时间没有访问课程，那么可以自动撤销他们的选课。此参数决定这个时限。';
$string['maxenrolled'] = '最大选课用户数';
$string['maxenrolled_help'] = '指定可以自助选课的最大用户数。0表示无限制。';
$string['maxenrolledreached'] = '已经达到自助选课用户数上限。';
$string['nopassword'] = '无需选课密钥。';
$string['password'] = '选课密码';
$string['password_help'] = '只有知道选课密码的人才能访问课程。

如果此处留空，那么任何人都可以随意选课。

指定选课密码后，任何想选课的用户都必须输入这个密码。不过，他们只需要输入一次。';
$string['passwordinvalid'] = '选课密码错误，请重试';
$string['passwordinvalidhint'] = '这个选课密码不正确，请再试一次<br />
(提示: 以“{$a}”开头)';
$string['pluginname'] = '自助选课';
$string['pluginname_desc'] = '通过自助选课插件，用户可以自己选择想参加的课程。可以通过选课密码保护课程。选课过程是通过人工选课插件完成得，所以必须在课程中激活这个插件。';
$string['requirepassword'] = '必须设选课密码';
$string['requirepassword_desc'] = '新课程必须设选课密码，旧课程不能删除已有的选课密码。';
$string['role'] = '缺省分配的角色';
$string['self:config'] = '配置自助选课实例';
$string['self:manage'] = '管理已选课用户';
$string['self:unenrol'] = '撤销已选课用户';
$string['self:unenrolself'] = '撤销自己的选课';
$string['sendcoursewelcomemessage'] = '发送课程的欢迎信息';
$string['sendcoursewelcomemessage_help'] = '选择该项，用户自助选课时会收到一封欢迎邮件。';
$string['showhint'] = '显示提示';
$string['showhint_desc'] = '显示访客密码的首字母。';
$string['status'] = '允许自助选课';
$string['status_desc'] = '默认允许用户自己选课。';
$string['status_help'] = '此设置决定用户是否能自助选课（如果他们有相应的权限，也可以自己撤销选课）。';
$string['unenrol'] = '撤销选课';
$string['unenrolselfconfirm'] = '您确定要撤销您自己对“{$a}”课程的选课吗？';
$string['unenroluser'] = '您确定要撤销用户“{$a->user}”对“{$a->course}”课程的选课吗？';
$string['usepasswordpolicy'] = '使用密码策略';
$string['usepasswordpolicy_desc'] = '对选课密码使用标准的密码策略。';
$string['welcometocourse'] = '欢迎加入{$a}课程';
$string['welcometocoursetext'] = '欢迎加入{$a->coursename}课程！

请先编辑您的个人信息页面（如果您还没编辑过的话），这样我们才可以进一步了解您：

{$a->profileurl}';
