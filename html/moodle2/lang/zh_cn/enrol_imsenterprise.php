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
 * Strings for component 'enrol_imsenterprise', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = '一旦您保存了您的设置，您可能会想';
$string['allowunenrol'] = '允许IMS数据<strong>撤销</strong>学生/老师的选课';
$string['allowunenrol_desc'] = '如果允许此项，企业数据里特别指定的选课会被删除。';
$string['basicsettings'] = '基本设置';
$string['coursesettings'] = '课程数据设置';
$string['createnewcategories'] = '如果在Moodle中没找到，就新建一个（隐藏的）课程类别';
$string['createnewcategories_desc'] = '如果<org><orgunit>出现在课程的导入数据中，并且课程为新建，那么它的内容会被替换为指定的分类。此插件不会对已有课程进行重新分类。

如果没有名字匹配的分类，那么会建立一个隐藏分类。';
$string['createnewcourses'] = '建立一个新的（隐藏的）课程如果没有在Moodle中找';
$string['createnewcourses_desc'] = '如果允许此项，IMS企业级注册插件能建立在IMS数据中而不在Moodle数据库中的所有课程。所有新建的课程初始都是隐藏的。';
$string['createnewusers'] = '为还没有在Moodle中注册的用户建立用户帐号';
$string['createnewusers_desc'] = 'IMS企业选课数据典型地描述一组用户。如果启用，会为任何在Moodle数据库中找不到的用户创建帐号。

首先通过"学号"查找用户，然后再用“用户名”。密码不是通过IMS企业插件导入的。建议使用身份认证插件验证用户。';
$string['cronfrequency'] = '处理频率';
$string['deleteusers'] = '删除IMS数据指定的用户';
$string['deleteusers_desc'] = '如果启用，IMS企业选课数据可以删除用户帐号（当" recstatus" 的值设为3时，表示删除这一帐号）。其实在Moodle中，用户记录并没有真的从 Moodle数据库删除，而是用一个标记来表示已删除。';
$string['doitnow'] = '马上进行一次IMS企业导入';
$string['filelockedmail'] = '您在IMS文件基础上用的文本文件登陆({$a}) 不能被程序删除。这通常意味着它的许可发生错误了。请确定许可使Moodle可以删除文件，否则程序可能会重复';
$string['filelockedmailsubject'] = '重大错误：登陆文件';
$string['fixcasepersonalnames'] = '在标题上更改个人姓名';
$string['fixcaseusernames'] = '对低的情况更改个人姓名';
$string['ignore'] = '忽略';
$string['importimsfile'] = '导入IMS企业文件';
$string['imsrolesdescription'] = 'IMS计划规范包括8个截然不同的角色类型。请您选择在Moodle中如何分配这些角色，包括应该忽略那些角色。';
$string['location'] = '本地文件';
$string['logtolocation'] = '日志文件输出到本地（空白表示没有日志文件）';
$string['mailadmins'] = 'Email通知管理员';
$string['mailusers'] = 'Email通知用户';
$string['messageprovider:imsenterprise_enrolment'] = 'IMS 企业选课消息';
$string['miscsettings'] = '混杂的';
$string['pluginname'] = 'IMS企业文件';
$string['pluginname_desc'] = '此方法将会反复检查并且处理您指定路径的特殊格式的文本文件。该文件必须符合IMS企业接口规范，包含个人，组，成员等XML元素。';
$string['processphoto'] = '添加用户照片数据';
$string['processphotowarning'] = '警告：图象程序好象将要为服务器添加一个重大的任务。如果有大量的学生等待被处理推荐您不要激活这个选项。';
$string['restricttarget'] = '如果后面的对象是列入清单只有程序数据';
$string['restricttarget_desc'] = 'IMS企业数据文件可以供多个目标使用，例如不同的LMSes，不同的学校系统。通过<target> 里的<properties>标签对目标系统命名，可以在企业管理系统文件中指定数据，这些数据供一个或者更多的已命名的目标系统使用。

在很多情况下，您不需要担心这些。您可以不更改默认配置，不论这个目标是否已经指定，MOODLE总是会处理文件，否则，您就在<target>中输入准确的名字。';
$string['roles'] = '角色';
$string['sourcedidfallback'] = '用"来源" 对一个人的用户名如果"userid" 没有找到域';
$string['sourcedidfallback_desc'] = '在IMS数据中，<sourcedid>域代表了源系统中用户的永久ID码。而<userid>域是一个单独的域，它包含用户登录时使用的ID码。虽然在许多情况下这两个码可能是相同的，但是它们并不是一直相同。

有时，一些学生信息系统不能输出<userid>域。在这种情况下，您应启用这一设定来允许将<sourcedid>用作Moodle用户ID。而如果可以输出<userid>域，则禁用该设定。';
$string['truncatecoursecodes'] = '对这个长度截去课程代码';
$string['truncatecoursecodes_desc'] = '在一些情境中，您可能想在处理程序前把课程代码截断到指定的长度，那么请在这个对话框中输入需要截断的字符数，如果不想截断，就不需要在对话框中输入数字。';
$string['usecapitafix'] = '如果用"Capita"选择这个框（他们的XML格式有错误）';
$string['usecapitafix_desc'] = '我们发现在Capita编辑的学生数据系统中，XML文件输出有一些小问题。如果您使用此项功能，请激活这个选项；否则，不选择。';
$string['usersettings'] = '用户的数据选项';
$string['zeroisnotruncation'] = '0 预示没有切断';
