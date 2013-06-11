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
 * Strings for component 'assign', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = '您有需要留意的作业';
$string['addsubmission'] = '添加提交';
$string['allowsubmissions'] = '允许用户继续提交该作业。';
$string['allowsubmissionsanddescriptionfromdatesummary'] = '作业细节和提交表格将在 <strong>{$a}</strong> 可用';
$string['allowsubmissionsfromdate'] = '开启时间';
$string['allowsubmissionsfromdate_help'] = '如果启用了此选项，在此日期前，学生不能提交作业。如果禁用此选项，则学生马上就可以提交作业。';
$string['allowsubmissionsfromdatesummary'] = '本作业将从<strong>{$a}</strong>起接受提交';
$string['allowsubmissionsshort'] = '允许更改提交';
$string['alwaysshowdescription'] = '总是显示描述';
$string['alwaysshowdescription_help'] = '如果此项设置为否，上面设置的作业描述只会在开启时间以后对学生可见。';
$string['assign:addinstance'] = '添加新作业';
$string['assign:exportownsubmission'] = '导出自己的作业';
$string['assignfeedback'] = '反馈插件';
$string['assignfeedbackpluginname'] = '反馈插件';
$string['assign:grade'] = '作业评分';
$string['assignmentisdue'] = '作业截止';
$string['assignmentmail'] = '{$a->grader}已经就您提交的作业“{$a->assignment}”给出了反馈意见。

您可以在您的作业下方看到：

{$a->url}';
$string['assignmentmailhtml'] = '{$a->grader}已经就您提交的作业“<i>{$a->assignment}</i>”给出了反馈意见。<br /><br />
您可以在<a href="{$a->url}">您的作业</a>下方看到。';
$string['assignmentmailsmall'] = '{$a->grader}已经就您提交的作业“{$a->assignment}”填写了反馈意见，您可以打开作业查看它。';
$string['assignmentname'] = '作业名称';
$string['assignmentplugins'] = '作业插件';
$string['assignmentsperpage'] = '每页显示条数';
$string['assignsubmission'] = '提交插件';
$string['assignsubmissionpluginname'] = '提交插件';
$string['assign:submit'] = '提交作业';
$string['assign:view'] = '查看作业';
$string['availability'] = '可用性';
$string['backtoassignment'] = '回到作业';
$string['batchoperationconfirmlock'] = '锁定所有选定的作业吗？';
$string['batchoperationconfirmreverttodraft'] = '将选中的作业退回到草稿状态？';
$string['batchoperationconfirmunlock'] = '解锁所有选定的作业吗？';
$string['batchoperationlock'] = '锁定';
$string['batchoperationreverttodraft'] = '退回为草稿';
$string['batchoperationsdescription'] = '对选中的各项…';
$string['batchoperationunlock'] = '解锁';
$string['blindmarking'] = '评分时屏蔽学生信息';
$string['changegradewarning'] = '该作业有已评分的提交，修改成绩不会自动重新计算每个提交的分数。如果您确定要修改分数，那么您必须对现有提交重新评分。';
$string['comment'] = '评论';
$string['configshowrecentsubmissions'] = '任何人可以看到最近活动报表中提交作业的信息';
$string['confirmbatchgradingoperation'] = '您确定您要对 {$a->count} 名学生进行{$a->operation}操作吗?';
$string['confirmsubmission'] = '您确定要提交作业并请求评分吗？一旦这么做，您将不能再修改作业。';
$string['couldnotcreatecoursemodule'] = '无法创建课程模块。';
$string['couldnotcreatenewassignmentinstance'] = '无法创建新作业实例。';
$string['couldnotfindassignmenttoupgrade'] = '找不到需要升级的旧作业实例。';
$string['currentgrade'] = '成绩单中的当前成绩';
$string['cutoffdate'] = '提交截止时间';
$string['cutoffdate_help'] = '如果启用了此选项，在此日期后，学生不能再提交作业。';
$string['defaultplugins'] = '默认作业设置';
$string['defaultplugins_help'] = '这些定义了所有新作业的默认设置。';
$string['deleteallsubmissions'] = '删除所有提交';
$string['deletepluginareyousure'] = '删除作业插件{$a}： 确定吗？';
$string['deletepluginareyousuremessage'] = '您将要完全删除该作业插件 {$a} 。这将会完全删除在数据库中和该作业插件有关的一切信息。您确定您要继续吗？';
$string['deletingplugin'] = '删除插件{$a}。';
$string['description'] = '描述';
$string['downloadall'] = '下载所有作业';
$string['duedate'] = '截止时间';
$string['duedate_help'] = '此为作业到期时间。到期后仍然允许学生提交作业，但所交作业会被标记为迟交。如果想在某个时间后阻止学生提交作业，则可以设置提交截止时间。';
$string['duedateno'] = '无截止时间';
$string['duedatereached'] = '此作业的截止日期已经过了';
$string['duedatevalidation'] = '截止日期必须比开始日期晚。';
$string['editaction'] = '动作…';
$string['editsubmission'] = '编辑我已提交的作业';
$string['enabled'] = '开启';
$string['errornosubmissions'] = '没有可下载的作业';
$string['errorquickgradingvsadvancedgrading'] = '快速评分未被保存，因为此作业正使用高级评分方法';
$string['errorrecordmodified'] = '由于在您加载该页这段时间内，有人修改过一个或多个记录，导致评分没有被保存。';
$string['feedback'] = '反馈';
$string['feedbackavailablehtml'] = '{$a->username}已经就您提交的作业“<i>{$a->assignment}</i>”给出了反馈意见。<br /><br />
您可以在<a href="{$a->url}">您的作业</a>下方看到。';
$string['feedbackavailablesmall'] = '{$a->username}已经为作业{$a->assignment}写了评语';
$string['feedbackavailabletext'] = '{$a->username}已经就您提交的作业“{$a->assignment}”给出了反馈意见。

您可以在您的作业下方看到：

{$a->url}';
$string['feedbackplugin'] = '反馈插件';
$string['feedbackpluginforgradebook'] = '将评论填入成绩单的反馈插件';
$string['feedbackpluginforgradebook_help'] = '只有一个作业反馈插件可以将评论填入成绩单。';
$string['feedbackplugins'] = '反馈插件';
$string['feedbacksettings'] = '反馈设置';
$string['filesubmissions'] = '文件提交';
$string['filter'] = '过滤方式';
$string['filternone'] = '无过滤';
$string['filterrequiregrading'] = '待评分';
$string['filtersubmitted'] = '已提交';
$string['gradeabovemaximum'] = '给出的分数不能超过 {$a}。';
$string['gradebelowzero'] = '给出的分数必须大于等于 0。';
$string['graded'] = '已评分';
$string['gradedby'] = '评分人';
$string['gradedon'] = '评分时间';
$string['gradeoutof'] = '成绩（满分 {$a} ）';
$string['gradeoutofhelp'] = '成绩';
$string['gradeoutofhelp_help'] = '请输入该学生的分数，可以包含小数。';
$string['gradersubmissionupdatedhtml'] = '{$a->username}在<i>{$a->timeupdated}</i>更新了作业<i>“{$a->assignment}”</i><br /><br />可以在<a href="{$a->url}">网站上查看</a>。';
$string['gradersubmissionupdatedsmall'] = '{$a->username} 已经更新了他的作业：{$a->assignment}。';
$string['gradersubmissionupdatedtext'] = '{$a->username}在{$a->timeupdated}更新了作业“{$a->assignment}”

可以在这里查看：

    {$a->url}';
$string['gradestudent'] = '学生：（id={$a->id}，姓名={$a->fullname}）。';
$string['grading'] = '作业评分';
$string['gradingoptions'] = '选项';
$string['gradingstatus'] = '评分状态';
$string['gradingstudentprogress'] = '对 {$a->count} 名学生中的第 {$a->index} 名进行评分';
$string['gradingsummary'] = '作业评分情况汇总';
$string['hideshow'] = '隐藏 / 显示';
$string['instructionfiles'] = '说明文件';
$string['invalidfloatforgrade'] = '该评分格式不对：{$a}';
$string['invalidgradeforscale'] = '所提供的分数对于当前等级不适用';
$string['lastmodifiedgrade'] = '最后修改（教师）';
$string['lastmodifiedsubmission'] = '最后修改（学生）';
$string['locksubmissionforstudent'] = '禁止该生再提交作业：（id={$a->id}, 姓名={$a->fullname}）。';
$string['locksubmissions'] = '锁定作业';
$string['manageassignfeedbackplugins'] = '管理作业反馈插件';
$string['manageassignsubmissionplugins'] = '管理作业提交插件';
$string['messageprovider:assign_notification'] = '作业通知';
$string['modulename'] = '作业';
$string['modulename_help'] = '作业活动模块允许教师给学生分配任务，收集作业，并可以对作业评分和写评语。

学生可以提交任意电子文档（文件），比如文字处理文档、电子表格、图片或音频视频。此外，或同时，作业还可以要求学生直接在文本框里面输入文字。作业还可以仅仅用来提醒学生去做“现实”中的作业，例如手工作品，而不需要任何电子文档。

批改作业时，老师可以写评语，还可以上传文件，例如加了批注的学生作业、有评语的文档或语音反馈。可以用数值或等级对作业评分，也可以用量规进行高级评分。最终成绩记录在成绩单中。';
$string['modulenameplural'] = '作业';
$string['mysubmission'] = '我的作业：';
$string['newsubmissions'] = '已交的作业';
$string['nofiles'] = '没有文件。';
$string['nograde'] = '没有成绩。';
$string['noonlinesubmissions'] = '这个作业不需要您在网上提交任何东西';
$string['nosavebutnext'] = '向后';
$string['nosubmission'] = '这个作业还没有任何提交';
$string['nosubmissionsacceptedafter'] = '提交截止时间';
$string['notgraded'] = '未评分';
$string['notgradedyet'] = '没有评分';
$string['notifications'] = '通知';
$string['notsubmittedyet'] = '还未提交';
$string['nousersselected'] = '没有用户被选中';
$string['numberofdraftsubmissions'] = '草稿';
$string['numberofparticipants'] = '参与人数';
$string['numberofsubmissionsneedgrading'] = '需要评分';
$string['numberofsubmittedassignments'] = '提交';
$string['offline'] = '不需要在线提交';
$string['outlinegrade'] = '分数: {$a}';
$string['overdue'] = '<font color="red">作业截止日期：{$a}</font>';
$string['page-mod-assign-view'] = '作业模块主页';
$string['page-mod-assign-x'] = '任意作业模块页面';
$string['pluginadministration'] = '作业管理';
$string['pluginname'] = '作业';
$string['preventsubmissions'] = '阻止用户继续提交该作业。';
$string['preventsubmissionsshort'] = '禁止更改作业';
$string['previous'] = '向前';
$string['quickgrading'] = '快速评分模式';
$string['quickgradingchangessaved'] = '评分结果已经被保存';
$string['quickgrading_help'] = '快速评分模式允许您直接在作业列表后面对每个学生进行评分。快速评分与高级评分不兼容，当需要多项反馈评价学生时，不推荐使用此评分方式。';
$string['quickgradingresult'] = '快速评分';
$string['reverttodraft'] = '退回为草稿状态。';
$string['reverttodraftforstudent'] = '将该学生的作业退回到草稿状态：（学生ID={$a->id}，姓名={$a->fullname}）。';
$string['reverttodraftshort'] = '退回到草稿';
$string['reviewed'] = '复习';
$string['saveallquickgradingchanges'] = '保存所有快速评分修改结果';
$string['savechanges'] = '保存更改';
$string['savenext'] = '保存并显示下一个';
$string['selectlink'] = '选择……';
$string['sendlatenotifications'] = '迟交时通知评分人';
$string['sendlatenotifications_help'] = '如果启用这项，评分人（通常就是教师）会在学生晚交作业时收到一个消息。消息的发送方式可配置。';
$string['sendnotifications'] = '学生交作业时通知评分人';
$string['sendnotifications_help'] = '如果此项选择了是，则评分人（通常是老师）会在学生提交作业时收到一条通知消息，不管Ta是提前、按时还是迟交作业均会收到。消息发送方式可以在管理功能里面配置。';
$string['sendsubmissionreceipts'] = '给学生发送提交收据';
$string['sendsubmissionreceipts_help'] = '该开关将会启用对学生反馈提交收据的功能。每当学生成功提交一次作业，他们都会收到一个通知';
$string['settings'] = '作业设置';
$string['showrecentsubmissions'] = '显示最近提交的作业';
$string['submission'] = '提交的作业';
$string['submissiondrafts'] = '学生必须点击提交按钮';
$string['submissiondrafts_help'] = '如果启用，学生将需要点击提交按钮来声明他们提交的是最终版本。这样学生也就可以在系统保存作业的草稿。如果在学生已经提交作业后，该设置从“否” 更改为“是”，那么这些作业会被视为最终版本。';
$string['submissionnotready'] = '此作业还没有做好接受提交准备：';
$string['submissionplugins'] = '提交插件';
$string['submissionreceipthtml'] = '您已经提交了作业“<i>{$a->assignment}</i>”<br /><br />
您可以查看<a href="{$a->url}">作业</a>状态。';
$string['submissionreceipts'] = '发送作业收据';
$string['submissionreceiptsmall'] = '您已经向 {$a->assignment} 提交了作业';
$string['submissionreceipttext'] = '您已经提交作业“{$a->assignment}”。

您可以查看作业状态：

   {$a->url}';
$string['submissions'] = '提交信息';
$string['submissionsclosed'] = '提交已关闭';
$string['submissionsettings'] = '提交设置';
$string['submissionslocked'] = '此作业不接受提交';
$string['submissionslockedshort'] = '不允许更改提交';
$string['submissionsnotgraded'] = '提交未评分：{$a}';
$string['submissionstatus'] = '提交状态';
$string['submissionstatus_'] = '未提交';
$string['submissionstatus_draft'] = '草稿（未提交）';
$string['submissionstatusheading'] = '作业提交状态';
$string['submissionstatus_marked'] = '已评分';
$string['submissionstatus_new'] = '新提交';
$string['submissionstatus_submitted'] = '已经提交等待评分';
$string['submitaction'] = '提交';
$string['submitassignment'] = '提交作业';
$string['submitassignment_help'] = '提交作业后，您将不能再做任何修改';
$string['submitted'] = '已提交';
$string['submittedlateshort'] = '{$a}之后';
$string['teamsubmission'] = '是否按组提交作业';
$string['teamsubmission_help'] = '如果启用此项，采用默认分组或者是定制分组将学生分成各个小组，同组中的学生只需提交一份作业，所有小组成员共享老师给出的作业评分。并且所有成员都能看到其他人对该作业所做出的修改。';
$string['textinstructions'] = '作业说明';
$string['timemodified'] = '最后修改';
$string['timeremaining'] = '剩余时间';
$string['unlocksubmissionforstudent'] = '允许该生提交：（学生ID={$a->id}，姓名={$a->fullname}）。';
$string['unlocksubmissions'] = '解除锁定';
$string['updategrade'] = '修改分数';
$string['updatetable'] = '保存并更新列表';
$string['viewfeedback'] = '查看反馈';
$string['viewfeedbackforuser'] = '查看用户反馈：{$a}';
$string['viewfullgradingpage'] = '打开完整评分页面来提供反馈';
$string['viewgradebook'] = '查看成绩单';
$string['viewgrading'] = '查看/评分所有提交的作业';
$string['viewgradingformforstudent'] = '查看学生（id={$a->id}，全名={$a->fullname}）的评分页面。';
$string['viewownsubmissionform'] = '查看自己的提交作业页面。';
$string['viewownsubmissionstatus'] = '查看自己的提交状态页面。';
$string['viewsubmission'] = '查看提交';
$string['viewsubmissionforuser'] = '查看用户作业：{$a}';
$string['viewsubmissiongradingtable'] = '查看作业评分表。';
