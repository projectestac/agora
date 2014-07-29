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
 * Strings for component 'enrol', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = '可选的选课插件';
$string['addinstance'] = '添加方法';
$string['ajaxnext25'] = '下25个...';
$string['ajaxoneuserfound'] = '找到1个用户';
$string['ajaxxusersfound'] = '找到{$a}个用户';
$string['assignnotpermitted'] = '您无权或不能在此课程分配角色。';
$string['bulkuseroperation'] = '批量用户操作';
$string['configenrolplugins'] = '请选择所有需要的插件并按适当的顺序排列它们。';
$string['custominstancename'] = '自定义实例名';
$string['defaultenrol'] = '向新课程添加实例';
$string['defaultenrol_desc'] = '缺省情况下可以把这些插件添加到所有新课程。';
$string['deleteinstanceconfirm'] = '您确信要删除“{$a->name}”选课插件实例？已有{$a->users}名用户通过它选课。';
$string['deleteinstancenousersconfirm'] = '您打算删除选课方法“{$a->name}”。您确定需要继续吗？';
$string['durationdays'] = '{$a}天';
$string['editenrolment'] = '编辑选课';
$string['enrol'] = '选课';
$string['enrolcandidates'] = '未选课用户';
$string['enrolcandidatesmatching'] = '匹配的未选课用户';
$string['enrolcohort'] = '群组选课';
$string['enrolcohortusers'] = '加入用户';
$string['enrollednewusers'] = '{$a}名新用户选课成功';
$string['enrolledusers'] = '已选课用户';
$string['enrolledusersmatching'] = '匹配的已选课用户';
$string['enrolme'] = '将我加入此课程';
$string['enrolmentinstances'] = '选课方法';
$string['enrolmentnew'] = '{$a}中新选课的';
$string['enrolmentnewuser'] = '{$a->user}已经选择了“{$a->course}”课程';
$string['enrolmentoptions'] = '选课选项';
$string['enrolments'] = '选课';
$string['enrolnotpermitted'] = '您无权或不允许向此课程添加用户';
$string['enrolperiod'] = '保持选课时长';
$string['enroltimecreated'] = '选课被创建';
$string['enroltimeend'] = '选课结束';
$string['enroltimestart'] = '选课开始';
$string['enrolusage'] = '实例/人数';
$string['enrolusers'] = '加入用户';
$string['errajaxfailedenrol'] = '添加用户失败';
$string['errajaxsearch'] = '搜索用户时出错';
$string['erroreditenrolment'] = '尝试修改用户的选课信息时出错了';
$string['errorenrolcohort'] = '在此课程中创建群组同步选课实例出错。';
$string['errorenrolcohortusers'] = '群组成员选修此课出错。';
$string['errorthresholdlow'] = '选课通知间隔不能少于一天。';
$string['errorwithbulkoperation'] = '批量更改选课时出错了。';
$string['expirynotify'] = '选课过期前进行通知';
$string['expirynotifyall'] = '未选和已选课的用户';
$string['expirynotifyenroller'] = '未选课用户';
$string['expirynotify_help'] = '这个设置用于确定在课过期的消息是否发送。';
$string['expirynotifyhour'] = '选课过期钱多少小时进行通知';
$string['expirythreshold'] = '选课过期通知时限';
$string['expirythreshold_help'] = '在选课过期前多久用户应该被通知到。';
$string['extremovedaction'] = '外部撤销选课动作';
$string['extremovedaction_help'] = '请选择，当外部选课源中的用户选课消失时如何应对。请注意，在撤销选课过程中，一些用户数据和设置会被清理。';
$string['extremovedkeep'] = '保留已选课用户';
$string['extremovedsuspend'] = '禁用选课';
$string['extremovedsuspendnoroles'] = '禁用选课并删除角色';
$string['extremovedunenrol'] = '撤销选课';
$string['finishenrollingusers'] = '结束';
$string['invalidenrolinstance'] = '无效的选课实例';
$string['invalidrole'] = '无效角色';
$string['manageenrols'] = '管理选课插件';
$string['manageinstance'] = '管理';
$string['migratetomanual'] = '合并到手动选课';
$string['nochange'] = '无变化';
$string['noexistingparticipants'] = '没有任何人加入';
$string['noguestaccess'] = '访客不能访问此课程，请尝试登录。';
$string['none'] = '无';
$string['notenrollable'] = '此课程现在不可自助选课。';
$string['notenrolledusers'] = '其它用户';
$string['otheruserdesc'] = '下列用户未选课，但有继承的或分配的角色。';
$string['participationactive'] = '活动的';
$string['participationstatus'] = '状态';
$string['participationsuspended'] = '已暂停';
$string['periodend'] = '直到{$a}';
$string['periodnone'] = '已选课 {$a}';
$string['periodstart'] = '从{$a}';
$string['periodstartend'] = '从{$a->start}到{$a->end}';
$string['recovergrades'] = '尽可能恢复用户的旧成绩';
$string['rolefromcategory'] = '{$a->role}（继承自课程分类）';
$string['rolefrommetacourse'] = '{$a->role}（继承自父课程）';
$string['rolefromsystem'] = '{$a->role}（网站级的分配）';
$string['rolefromthiscourse'] = '{$a->role}（课程内的分配）';
$string['startdatetoday'] = '今天';
$string['synced'] = '已同步';
$string['totalenrolledusers'] = '{$a}名已选课用户';
$string['totalotherusers'] = '{$a}名其他用户';
$string['unassignnotpermitted'] = '您没有在此课程撤销角色的权限';
$string['unenrol'] = '撤销选课';
$string['unenrolconfirm'] = '您确定要从课程“{$a->course}”撤销用户“{$a->user}”的选课吗？';
$string['unenrolme'] = '从{$a}撤销选课';
$string['unenrolnotpermitted'] = '您无权或不能撤销此用户的选课。';
$string['unenrolroleusers'] = '撤销用户的选课';
$string['unknowajaxaction'] = '未知的动作请求';
$string['unlimitedduration'] = '无限';
$string['usersearch'] = '搜索';
$string['withselectedusers'] = '对所选用户';
