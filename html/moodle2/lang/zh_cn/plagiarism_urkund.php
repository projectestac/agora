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
 * Strings for component 'plagiarism_urkund', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_urkund
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['defaultsdesc'] = '当在活动模块中启用 URKUND 时，下列设置是默认设置';
$string['defaultupdated'] = '默认值更新';
$string['filereset'] = '文件已被重置以重新提交给 URKUND';
$string['optout'] = '选择退出';
$string['pending'] = '该文件正在等待提交到 URKUND';
$string['pluginname'] = 'URKUND 反抄袭插件';
$string['previouslysubmitted'] = '先前提交为';
$string['processing'] = '该文件以提交至 URKUND，当前正在等待分析可用';
$string['savedconfigfailed'] = '输入的用户名/密码组合不正确，URKUND 已被禁用，请重试。';
$string['savedconfigsuccess'] = '反抄袭设置已保存';
$string['showwhenclosed'] = '当活动关闭';
$string['similarity'] = 'URKUND';
$string['studentdisclosuredefault'] = '所有的文件都将上传到抄袭检测服务 URKUND，如果您不希望您的文档被该站以外的其他机构用作分析材料，您可以在报告生成后使用选择退出链接。';
$string['studentdisclosure_help'] = '该文本将在文件上传页面上为所有学生可见。';
$string['studentemailcontent'] = '您 {$a->coursename}中提交给{$a->modulename}的文件现在已被反抄袭工具 URKUND 处理。
{$a->modulelink}

如果您不希望您的文档被该站以外的其他机构用作分析材料，您可以在此链接选择退出：
{$a->optoutlink}';
$string['studentemailsubject'] = '被 URKUND 处理的文件';
$string['submitondraft'] = '在第一次上传文件时，提交文件';
$string['submitonfinal'] = '当学生索取分数时，上传文件';
$string['toolarge'] = '该文件太大以至于 URKUND 无法处理';
$string['unknownwarning'] = '在传输该文件至 URKUND 过程中发生错误';
$string['unsupportedfiletype'] = 'URKUND 不支持该文件类型';
$string['urkund'] = 'URKUND 反抄袭插件';
$string['urkund_api'] = 'URKUND 集成地址';
$string['urkund_api_help'] = '此为 URKUND API 地址';
$string['urkunddefaults'] = 'URKUND 默认';
$string['urkund_draft_submit'] = '文件什么时候提交到 URKUND';
$string['urkundexplain'] = '若想了解更多关于该插件的信息，请查看：<a href="http://www.urkund.com/int/en/" target="_blank">http://www.urkund.com/int/en/</a>';
$string['urkund_lang'] = '语言';
$string['urkund_lang_help'] = '由 URKUND 提供的语言代码';
$string['urkund_password'] = '密码';
$string['urkund_password_help'] = 'URKUND 提供的用于访问 API 的密码';
$string['urkund_receiver'] = '接收者地址';
$string['urkund_receiver_help'] = '这是 URKUND 为教师提供的独有地址';
$string['urkund_show_student_report'] = '向学生展示相似度报告';
$string['urkund_show_student_report_help'] = '相似度报告指出了提交文件中抄袭的部分以及 URKUND 第一次检测到抄袭内容的位置。';
$string['urkund_show_student_score'] = '向学生展示相似度分值';
$string['urkund_show_student_score_help'] = '相似度分值是提交文件中与其他提交内容匹配的百分比。';
$string['urkund_studentemail'] = '向学生发送电子邮件';
$string['urkund_studentemail_help'] = '在文件被处理后会向学生发送一封电子邮件，来通知他们报告已经生成完毕，该邮件也包含了选择退出链接。';
$string['urkund_username'] = '用户名';
$string['urkund_username_help'] = 'URKUND 提供的用于访问 API 的用户名';
$string['useurkund'] = '启用 URKUND';
