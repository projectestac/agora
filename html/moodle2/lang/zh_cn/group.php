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
 * Strings for component 'group', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = '{$a} 加入';
$string['addgroup'] = '添加用户到小组';
$string['addgroupstogrouping'] = '将小组添加到大组中';
$string['addgroupstogroupings'] = '添加/删除大组';
$string['adduserstogroup'] = '添加/删除用户';
$string['allocateby'] = '分配成员';
$string['anygrouping'] = '[任意大组]';
$string['autocreategroups'] = '自动创建小组';
$string['backtogroupings'] = '返回大组';
$string['backtogroups'] = '返回组';
$string['badnamingscheme'] = '必须包含一个\'@\' 或者一个\'#\'';
$string['byfirstname'] = '姓、名按字母顺序排列';
$string['byidnumber'] = '按ID号顺序排列';
$string['bylastname'] = '名、姓按字母顺序排列';
$string['createautomaticgrouping'] = '自动创建大组';
$string['creategroup'] = '创建小组';
$string['creategrouping'] = '创建大组';
$string['creategroupinselectedgrouping'] = '在大组中建立小组';
$string['createingrouping'] = '创建入大组';
$string['createorphangroup'] = '创建独立小组';
$string['databaseupgradegroups'] = '组现在的版本是 {$a}';
$string['defaultgrouping'] = '默认大组';
$string['defaultgroupingname'] = '大组';
$string['defaultgroupname'] = '组';
$string['deleteallgroupings'] = '删除所有大组';
$string['deleteallgroups'] = '删除所有组';
$string['deletegroupconfirm'] = '确定要删除组“{$a}”吗？';
$string['deletegrouping'] = '删除大组';
$string['deletegroupingconfirm'] = '确定要删除大组“{$a}”吗？（大组中的小组不会被删除）';
$string['deletegroupsconfirm'] = '您确定要删除以下的组吗？';
$string['deleteselectedgroup'] = '删除已选组';
$string['editgroupingsettings'] = '编辑大组设置';
$string['editgroupsettings'] = '编辑组设置';
$string['enrolmentkey'] = '选课密码';
$string['enrolmentkey_help'] = '选课密码使只有知道密码的人才能选课。如果设置了组密码，那么不仅输入该密码的用户可以选课，而且会自动把用户分配为该小组的成员。';
$string['erroraddremoveuser'] = '错误的删除/移动用户 {$a} 到组中';
$string['erroreditgroup'] = '错误的创建/更新组 {$a}';
$string['erroreditgrouping'] = '创建/更新大组 {$a} 发生错误';
$string['errorinvalidgroup'] = '错误，无效的组 {$a}';
$string['errorselectone'] = '在选择此项前请先选择一个组';
$string['errorselectsome'] = '在选择此项前，请先选择一个或多个组';
$string['evenallocation'] = '注释：为了确保分组均衡，每组的实际成员数可能和你指定的不一致';
$string['existingmembers'] = '已经存在的组员：{$a}';
$string['filtergroups'] = '筛选组的方式：';
$string['group'] = '组';
$string['groupaddedsuccesfully'] = '组 {$a} 添加成功';
$string['groupby'] = '指定';
$string['groupdescription'] = '小组描述';
$string['groupinfo'] = '关于已选组的信息';
$string['groupinfomembers'] = '关于已选成员的信息';
$string['groupinfopeople'] = '关于已选用户信息';
$string['grouping'] = '大组';
$string['groupingdescription'] = '大组描述';
$string['grouping_help'] = '大组是课程中几个小组的集合。如果选择了一个大组，属于同一个大组的不同小组的学生可以一起工作。';
$string['groupingname'] = '大组名';
$string['groupingnameexists'] = '该组名“{$a}”在该课程中已存在，请另选组名';
$string['groupings'] = '大组';
$string['groupingsection'] = '大组访问';
$string['groupingsection_help'] = '大组是在课程小组的集合。如果选择了这个大组，只有分配到这个大组中的小组里的学生可以访问这个小节。';
$string['groupingsonly'] = '只使用大组';
$string['groupmember'] = '组成员';
$string['groupmemberdesc'] = '组中成员的标准角色';
$string['groupmembers'] = '组成员';
$string['groupmembersonly'] = '仅对组成员可用';
$string['groupmembersonlyerror'] = '对不起，您必须是该活动中至少一个组的成员';
$string['groupmembersonly_help'] = '如果勾选此框，这项活动（或资源）将只对属于所选的大组的学生开放。';
$string['groupmemberssee'] = '查看组成员';
$string['groupmembersselected'] = '已选组的成员';
$string['groupmode'] = '小组模式';
$string['groupmodeforce'] = '强制小组模式';
$string['groupmodeforce_help'] = '如果小组模式被强制，那么课程中所有的活动都会被设为课程的小组模式。每个活动自己的小组模式设置将被忽略。';
$string['groupmode_help'] = '此设置有三个选项：

* 无小组 - 没有小组，每个人都是一个大社区中的一员
* 分割小组 - 每个组的成员都只能看到自己的组，不能看到其它的
* 可视小组 - 每个组成员都在自己的组内完成工作，但也可以看到其它小组的情况

在课程层次定义的小组模式会缺省成为该课程内所有活动的缺省模式。每个支持小组的活动也都可以定义自己的小组模式。如果课程设定了强制小组模式，则每个活动的设定会被忽略。';
$string['groupmy'] = '我的组';
$string['groupname'] = '组名';
$string['groupnameexists'] = '组名{$a}在课程中存在，请改为其他名称。';
$string['groupnotamember'] = '对不起，您不是组中的成员。';
$string['groups'] = '组';
$string['groupscount'] = '组 {$a}';
$string['groupsettingsheader'] = '组';
$string['groupsgroupings'] = '小组和大组';
$string['groupsinselectedgrouping'] = '大组中的小组';
$string['groupsnone'] = '不分组';
$string['groupsonly'] = '限于小组';
$string['groupspreview'] = '预览组';
$string['groupsseparate'] = '分隔小组';
$string['groupsvisible'] = '可视小组';
$string['grouptemplate'] = '@组';
$string['hidepicture'] = '隐藏图片';
$string['importgroups'] = '上传组';
$string['importgroups_help'] = '可以从文本文件导入组。文件格式如下：

* 文件每行只有一条记录
* 每条记录是一系列用逗号分隔的数据
* 第一条记录是字段名列表，决定了文件剩下部分的格式
* groupname字段是必需的
* description、enrolmentkey、pciture和hidepicture字段可选';
$string['javascriptrequired'] = '该页需要浏览器打开JavaScript功能';
$string['members'] = '每组成员数';
$string['membersofselectedgroup'] = '组成员';
$string['namingscheme'] = '命名规则';
$string['namingscheme_help'] = '符号@可以用来创建名中包含英文字母的组。例如“组@”会生成组名“组A”、“组B”、“组C”、...

井号（#）可以用来创建包含数字的组。例如“组#”会生成组名“组1”、“组2”、“组3”、...
';
$string['newgrouping'] = '新大组';
$string['newpicture'] = '新图片';
$string['newpicture_help'] = '选择一个JPG或PNG格式的图片。此图片会被剪裁为正方形，并改变尺寸为100x100像素。';
$string['noallocation'] = '不分配';
$string['nogroups'] = '该课程中还没有创建小组';
$string['nogroupsassigned'] = '未被分配小组';
$string['nopermissionforcreation'] = '不能创建组“{$a}”，因为您没有相应的权限。';
$string['nosmallgroups'] = '防止最后一个小组太小';
$string['notingrouping'] = '[不在大组中]';
$string['nousersinrole'] = '在选定角色中，没有合适的用户';
$string['number'] = '小组/成员 数目';
$string['numgroups'] = '小组数量';
$string['nummembers'] = '每个小组成员数';
$string['overview'] = '概要';
$string['potentialmembers'] = '候选成员：{$a}';
$string['potentialmembs'] = '潜在的成员';
$string['printerfriendly'] = '打印显示';
$string['random'] = '随机地';
$string['removefromgroup'] = '从组{$a}中删除用户';
$string['removefromgroupconfirm'] = '您确定要从组“{$a->group}”中删除用户“{$a->user}”吗？';
$string['removegroupfromselectedgrouping'] = '从大组中删除小组';
$string['removegroupingsmembers'] = '从大组中删除所有小组';
$string['removegroupsmembers'] = '删除所有小组成员';
$string['removeselectedusers'] = '删除选择的用户';
$string['selectfromrole'] = '从角色中选择成员';
$string['showgroupsingrouping'] = '显示大组中的小组';
$string['showmembersforgroup'] = '在组中显示成员';
$string['toomanygroups'] = '所选小组内用户不足—在选定的角色中只有 {$a} 个用户';
$string['usercount'] = '用户数';
$string['usercounttotal'] = '用户总数({$a})';
$string['usergroupmembership'] = '所选用户已属于下列小组：';
