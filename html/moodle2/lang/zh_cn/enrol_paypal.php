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
 * Strings for component 'enrol_paypal', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = '分配角色';
$string['businessemail'] = 'PayPal的商业邮件';
$string['businessemail_desc'] = '您商业PayPal账户的邮箱地址';
$string['cost'] = '报名费用';
$string['costerror'] = '选课费用不是数字';
$string['costorkey'] = '请在下列登记方法中选择一种';
$string['currency'] = '货币';
$string['defaultrole'] = '默认的角色分配';
$string['defaultrole_desc'] = '指定使用PayPal选课的用户的角色';
$string['enrolenddate'] = '终止日期';
$string['enrolenddate_help'] = '如果启用，只有在此日期后才能添加用户到此课程。';
$string['enrolenddaterror'] = '选课结束日期不能在开始日期之前';
$string['enrolperiod'] = '保持选课时长';
$string['enrolperiod_desc'] = '缺省的保持选课有效的时间长度（单位：秒）。如果设为0，就默认不限制保持选课时长。';
$string['enrolperiod_help'] = '用户身份有效期长度，从用户自行加入课程之日算起。禁止此选项意味着用户身份永久有效。';
$string['enrolstartdate'] = '起始日期';
$string['enrolstartdate_help'] = '如果启用，用户只能在此日期之后撤销选课。';
$string['mailadmins'] = '通知管理员';
$string['mailstudents'] = '通知学生';
$string['mailteachers'] = '通知老师';
$string['messageprovider:paypal_enrolment'] = 'PayPal 选课消息';
$string['nocost'] = '该课程完全免费！';
$string['paypalaccepted'] = 'Paypal 公认的付费方式';
$string['paypal:config'] = '配置PayPal选课实例';
$string['paypal:manage'] = '管理已选课用户';
$string['paypal:unenrol'] = '从课程删除已选课用户';
$string['paypal:unenrolself'] = '撤销自己对此课程的选课';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'PayPal模块提供付费课程支持。如果你将课程的学费设置为零，学生将免费选择该课程。你也可以设置全站的学费标准的默认值，也可以对每个课程单独进行设置。如果对课程单独设置了收费标准，则课程将依此标准收费。';
$string['sendpaymentbutton'] = '通过 Paypal 交费';
$string['status'] = '启用PayPal选课';
$string['status_desc'] = '缺省允许用户使用PayPal选课。';
$string['unenrolselfconfirm'] = '您确定要撤销您自己对“{$a}”课程的选课吗？';
