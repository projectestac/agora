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
 * Strings for component 'assign', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = '您有需要留意的作业';
$string['addattempt'] = '允许重做';
$string['addnewattempt'] = '添加新的尝试';
$string['addnewattemptfromprevious'] = '基于上次提交的新尝试';
$string['addnewattemptfromprevious_help'] = '将复制你上次提交的作业内容到新的作业上，供你修改使用。';
$string['addnewattempt_help'] = '建立一个空白作业，供你使用。';
$string['addsubmission'] = '添加提交';
$string['allocatedmarker'] = '指派评分者';
$string['allocatedmarker_help'] = '指派对该作业评分的人员';
$string['allowsubmissions'] = '允许用户继续提交该作业。';
$string['allowsubmissionsanddescriptionfromdatesummary'] = '作业细节和提交表格将在 <strong>{$a}</strong> 可用';
$string['allowsubmissionsfromdate'] = '开启时间';
$string['allowsubmissionsfromdate_help'] = '如果启用了此选项，在此日期前，学生不能提交作业。如果禁用此选项，则学生马上就可以提交作业。';
$string['allowsubmissionsfromdatesummary'] = '本作业将从<strong>{$a}</strong>起接受提交';
$string['allowsubmissionsshort'] = '允许更改提交';
$string['alwaysshowdescription'] = '总是显示描述';
$string['alwaysshowdescription_help'] = '如果此项设置为否，上面设置的作业描述只会在开启时间以后对学生可见。';
$string['applytoteam'] = '将分数和反馈意见应用到整个组';
$string['assign:addinstance'] = '添加新作业';
$string['assign:exportownsubmission'] = '导出自己的作业';
$string['assignfeedback'] = '反馈插件';
$string['assignfeedbackpluginname'] = '反馈插件';
$string['assign:grade'] = '作业评分';
$string['assign:grantextension'] = '准许延期';
$string['assign:manageallocations'] = '指派评分者需要评阅哪些作业';
$string['assign:managegrades'] = '检查并公布成绩';
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
$string['assign:releasegrades'] = '公布成绩';
$string['assign:revealidentities'] = '展示学生身份';
$string['assign:reviewgrades'] = '检查成绩';
$string['assignsubmission'] = '提交插件';
$string['assignsubmissionpluginname'] = '提交插件';
$string['assign:submit'] = '提交作业';
$string['assign:view'] = '查看作业';
$string['attemptheading'] = '第{$a->attemptnumber}次作业提交 : {$a->submissionsummary}';
$string['attempthistory'] = '上一个尝试';
$string['attemptnumber'] = '作业提交次数';
$string['attemptreopenmethod'] = '重试开启';
$string['attemptreopenmethod_help'] = '此项设置决定学生对作业的可提交状态的重新开启情况。可选项有：<ul><li>从不开启 — 不允许学生再次提交作业。</li><li>手工开启 — 可由教师手工开启提交。</li><li>自动开启直到通过 — 在学生分数达到及格线以前，该作业一直是开启提交的。及格线可以在成绩单里面设置（类别和项）。</li></ul>';
$string['attemptreopenmethod_manual'] = '手工开启';
$string['attemptreopenmethod_none'] = '从不开启';
$string['attemptreopenmethod_untilpass'] = '自动开启直到通过';
$string['attemptsettings'] = '提交设置';
$string['availability'] = '可用性';
$string['backtoassignment'] = '回到作业';
$string['batchoperationconfirmaddattempt'] = '允许已选定的作业可以重新提交？';
$string['batchoperationconfirmgrantextension'] = '同意选定的作业延期提交？';
$string['batchoperationconfirmlock'] = '锁定所有选定的作业吗？';
$string['batchoperationconfirmreverttodraft'] = '将选中的作业退回到草稿状态？';
$string['batchoperationconfirmsetmarkingallocation'] = '对选定的作业设置评分者';
$string['batchoperationconfirmsetmarkingworkflowstate'] = '为选定的作业设置评分流程状态';
$string['batchoperationconfirmunlock'] = '解锁所有选定的作业吗？';
$string['batchoperationlock'] = '锁定';
$string['batchoperationreverttodraft'] = '退回为草稿';
$string['batchoperationsdescription'] = '对选中的各项…';
$string['batchoperationunlock'] = '解锁';
$string['batchsetallocatedmarker'] = '为{$a}位选定的用户安排评分者';
$string['batchsetmarkingworkflowstateforusers'] = '为{$a}位选定的用户设定评分流程状态';
$string['blindmarking'] = '评分时屏蔽学生信息';
$string['blindmarking_help'] = '启用此项设置时，评分人看不到学生的身份信息。当有学生提交了作业或者有学生被打分时，此项设置会被锁定（无法修改）。';
$string['changegradewarning'] = '该作业有已评分的提交，修改成绩不会自动重新计算每个提交的分数。如果您确定要修改分数，那么您必须对现有提交重新评分。';
$string['choosegradingaction'] = '评分动作';
$string['choosemarker'] = '选择……';
$string['chooseoperation'] = '选择操作';
$string['comment'] = '评论';
$string['completionsubmit'] = '学生必须提交才可以完成此活动。';
$string['configshowrecentsubmissions'] = '任何人可以看到最近活动报表中提交作业的信息';
$string['confirmbatchgradingoperation'] = '您确定您要对 {$a->count} 名学生进行{$a->operation}操作吗?';
$string['confirmsubmission'] = '您确定要提交作业并请求评分吗？一旦这么做，您将不能再修改作业。';
$string['conversionexception'] = '无法转换作业。例外情况是：{$a}。';
$string['couldnotconvertgrade'] = '无法转换用户{$a}的作业成绩。';
$string['couldnotconvertsubmission'] = '无法为用户{$a}转换提交的作业。';
$string['couldnotcreatecoursemodule'] = '无法创建课程模块。';
$string['couldnotcreatenewassignmentinstance'] = '无法创建新作业实例。';
$string['couldnotfindassignmenttoupgrade'] = '找不到需要升级的旧作业实例。';
$string['currentattempt'] = '这是第{$a}次提交';
$string['currentattemptof'] = '这是第{$a->attemptnumber}次提交(允许提交 {$a->maxattempts} 次)';
$string['currentgrade'] = '成绩单中的当前成绩';
$string['cutoffdate'] = '提交截止时间';
$string['cutoffdatefromdatevalidation'] = '提交截止时间必须比提交开始时间晚。';
$string['cutoffdate_help'] = '如果启用了此选项，在此日期后，学生不能再提交作业。';
$string['cutoffdatevalidation'] = '提交截止时间不能早于截止时间。';
$string['defaultsettings'] = '默认作业设置';
$string['defaultsettings_help'] = '这些定义了所有新作业的默认设置。';
$string['defaultteam'] = '默认分组';
$string['deleteallsubmissions'] = '删除所有提交';
$string['description'] = '描述';
$string['downloadall'] = '下载所有作业';
$string['duedate'] = '截止时间';
$string['duedate_help'] = '此为作业到期时间。到期后仍然允许学生提交作业，但所交作业会被标记为迟交。如果想在某个时间后阻止学生提交作业，则可以设置提交截止时间。';
$string['duedateno'] = '无截止时间';
$string['duedatereached'] = '此作业的截止日期已经过了';
$string['duedatevalidation'] = '截止日期必须比开始日期晚。';
$string['editaction'] = '动作…';
$string['editattemptfeedback'] = '为第{$a}次提交的作业编辑成绩和反馈';
$string['editingpreviousfeedbackwarning'] = '你正在为一个先前提交的作业编辑反馈。这是第{$a->attemptnumber} 次，总共有 {$a->totalattempts}次。';
$string['editingstatus'] = '编辑状态';
$string['editsubmission'] = '编辑我已提交的作业';
$string['editsubmission_help'] = '修改提交作业';
$string['enabled'] = '开启';
$string['errornosubmissions'] = '没有可下载的作业';
$string['errorquickgradingvsadvancedgrading'] = '快速评分未被保存，因为此作业正使用高级评分方法';
$string['errorrecordmodified'] = '由于在您加载该页这段时间内，有人修改过一个或多个记录，导致评分没有被保存。';
$string['event_all_submissions_downloaded'] = '提交的作业已经全部下载';
$string['event_assessable_submitted'] = '一个作业已经提交';
$string['event_extension_granted'] = '已设定一个宽限时间';
$string['event_identities_revealed'] = '已经展示身份';
$string['event_marker_updated'] = '已经更新评分者';
$string['event_statement_accepted'] = '用户已授受作业提交声明';
$string['event_submission_duplicated'] = '用户已复制提交的作业';
$string['event_submission_graded'] = '提交的作业已评分';
$string['event_submission_locked'] = '作业已锁定';
$string['event_submission_status_updated'] = '作业已更新';
$string['event_submission_unlocked'] = '作业已开启（解锁）';
$string['event_submission_updated'] = '用户已保存提交的作业';
$string['event_workflow_state_updated'] = '已更新流程状态';
$string['extensionduedate'] = '宽限时间';
$string['extensionnotafterduedate'] = '宽限时间应该比到期迟交时间晚';
$string['extensionnotafterfromdate'] = '宽限时间应该比开启时间晚';
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
$string['feedbacktypes'] = '反馈类型';
$string['filesubmissions'] = '文件提交';
$string['filter'] = '过滤方式';
$string['filternone'] = '无过滤';
$string['filterrequiregrading'] = '待评分';
$string['filtersubmitted'] = '已提交';
$string['gradeabovemaximum'] = '给出的分数不能超过 {$a}。';
$string['gradebelowzero'] = '给出的分数必须大于等于 0。';
$string['gradecanbechanged'] = '允许更改成绩';
$string['graded'] = '已评分';
$string['gradedby'] = '评分人';
$string['gradedon'] = '评分时间';
$string['gradelocked'] = '该成绩在成绩册中被锁定或被覆盖';
$string['gradeoutof'] = '成绩（满分 {$a} ）';
$string['gradeoutofhelp'] = '成绩';
$string['gradeoutofhelp_help'] = '请输入该学生的分数，可以包含小数。';
$string['gradersubmissionupdatedhtml'] = '{$a->username}在<i>{$a->timeupdated}</i>更新了作业<i>“{$a->assignment}”</i><br /><br />可以在<a href="{$a->url}">网站上查看</a>。';
$string['gradersubmissionupdatedsmall'] = '{$a->username} 已经更新了他的作业：{$a->assignment}。';
$string['gradersubmissionupdatedtext'] = '{$a->username}在{$a->timeupdated}更新了作业“{$a->assignment}”

可以在这里查看：

    {$a->url}';
$string['gradestudent'] = '学生：（id={$a->id}，姓名={$a->fullname}）。';
$string['gradeuser'] = '成绩 {$a}';
$string['grading'] = '作业评分';
$string['gradingchangessaved'] = '评分结果已经被保存';
$string['gradingmethodpreview'] = '评分标准';
$string['gradingoptions'] = '选项';
$string['gradingstatus'] = '评分状态';
$string['gradingstudent'] = '评分学生';
$string['gradingsummary'] = '作业评分情况汇总';
$string['grantextension'] = '准许延期';
$string['grantextensionforusers'] = '准许学生{$a}延期';
$string['groupsubmissionsettings'] = '分组提交设置';
$string['hiddenuser'] = '参与者';
$string['hideshow'] = '隐藏 / 显示';
$string['instructionfiles'] = '说明文件';
$string['invalidfloatforgrade'] = '该评分格式不对：{$a}';
$string['invalidgradeforscale'] = '所提供的分数对于当前等级不适用';
$string['lastmodifiedgrade'] = '最后修改（教师）';
$string['lastmodifiedsubmission'] = '最后修改（学生）';
$string['latesubmissions'] = '迟交的作业';
$string['latesubmissionsaccepted'] = '只有被宽限迟交的学生，才可以继续提交作业';
$string['locksubmissionforstudent'] = '禁止该生再提交作业：（id={$a->id}, 姓名={$a->fullname}）。';
$string['locksubmissions'] = '锁定作业';
$string['manageassignfeedbackplugins'] = '管理作业反馈插件';
$string['manageassignsubmissionplugins'] = '管理作业提交插件';
$string['marker'] = '评分者';
$string['markingallocation'] = '使用评分人员分配';
$string['markingallocation_help'] = '如果启用此功能，依工作流程，评分者可以被指派給特定学生(群)';
$string['markingworkflow'] = '使用评分工作流程';
$string['markingworkflow_help'] = '如果启用此功能，在未发給学生之前，成绩存在于一系列工作流程中。这样，可分成多次评分，并可以同时将成绩发給所有学生。';
$string['markingworkflowstate'] = '评分工作流程状态';
$string['markingworkflowstate_help'] = '工作流程可能包含（依你同意）：
*未评分：评分还没开始
*评分中：评分已开始但未结束
*评分完成：评分者已经结束评分，但仍可能需要复查或修正
*复查中：成绩已在老师手中，正进行审核
*准备公布：负责评分的老师满意此评分，但仍在等待，之后才会发给学生查看成绩
*已公布：学生可以查看成绩和反馈';
$string['markingworkflowstateinmarking'] = '正在评分中';
$string['markingworkflowstateinreview'] = '正在检查评分结果';
$string['markingworkflowstatenotmarked'] = '没被评分的';
$string['markingworkflowstatereadyforrelease'] = '已准备公布';
$string['markingworkflowstatereadyforreview'] = '评分已完成';
$string['markingworkflowstatereleased'] = '已经公布';
$string['maxattempts'] = '最多重试次数';
$string['maxattempts_help'] = '学生能够重试提交的最多次数。重新提交超过此数目后，该学生不能再提交此作业。';
$string['maxgrade'] = '最高成绩';
$string['messageprovider:assign_notification'] = '作业通知';
$string['modulename'] = '作业';
$string['modulename_help'] = '作业活动模块允许教师给学生分配任务，收集作业，并可以对作业评分和写评语。

学生可以提交任意电子文档（文件），比如文字处理文档、电子表格、图片或音频视频。此外，或同时，作业还可以要求学生直接在文本框里面输入文字。作业还可以仅仅用来提醒学生去做“现实”中的作业，例如手工作品，而不需要任何电子文档。

批改作业时，老师可以写评语，还可以上传文件，例如加了批注的学生作业、有评语的文档或语音反馈。可以用数值或等级对作业评分，也可以用量规进行高级评分。最终成绩记录在成绩单中。';
$string['modulenameplural'] = '作业';
$string['moreusers'] = '{$a} 更多…';
$string['mysubmission'] = '我的作业：';
$string['newsubmissions'] = '已交的作业';
$string['noattempt'] = '没有提交作业';
$string['nofiles'] = '没有文件。';
$string['nograde'] = '没有成绩。';
$string['nolatesubmissions'] = '没有再收到迟交的作业';
$string['nomoresubmissionsaccepted'] = '没有再收到更多的作业';
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
$string['numberofteams'] = '群组';
$string['offline'] = '不需要在线提交';
$string['open'] = '打开';
$string['outlinegrade'] = '分数: {$a}';
$string['outof'] = '{$a->current}，共有{$a->total}';
$string['overdue'] = '<font color="red">作业截止日期：{$a}</font>';
$string['page-mod-assign-view'] = '作业模块主页';
$string['page-mod-assign-x'] = '任意作业模块页面';
$string['participant'] = '参与者';
$string['pluginadministration'] = '作业管理';
$string['pluginname'] = '作业';
$string['preventsubmissions'] = '阻止用户继续提交该作业。';
$string['preventsubmissionsshort'] = '禁止更改作业';
$string['previous'] = '向前';
$string['quickgrading'] = '快速评分模式';
$string['quickgradingchangessaved'] = '评分结果已经被保存';
$string['quickgrading_help'] = '快速评分模式允许您直接在作业列表后面对每个学生进行评分。快速评分与高级评分不兼容，当需要多项反馈评价学生时，不推荐使用此评分方式。';
$string['quickgradingresult'] = '快速评分';
$string['recordid'] = '识别码';
$string['requireallteammemberssubmit'] = '是否要求每个组成员提交';
$string['requireallteammemberssubmit_help'] = '如果启用此项，则必须要全部组员都点击提交按钮才视为该组的作业已经提交。如果禁用此项，则任一组员点击提交按钮，该组的作业就视为已经提交了。

提示：当前面“提交设置”里面的“学生必须点击提交按钮”项设置为否的时候，此选项会被禁用。';
$string['requiresubmissionstatement'] = '要求学生接受交作业条款';
$string['requiresubmissionstatement_help'] = '针对整个网站提交的作业，要求学生授受提交作业的条款。如果未启用该设置，可在每个作业设置中启用或停用提交作业条款。';
$string['revealidentities'] = '展示学生身份';
$string['revealidentitiesconfirm'] = '你确定要在此项作业里公开学生姓名？该操作无法撤消。一旦公开学生姓名将无法复原，成绩出现在分数栏里。';
$string['reverttodraft'] = '退回为草稿状态。';
$string['reverttodraftforstudent'] = '将该学生的作业退回到草稿状态：（学生ID={$a->id}，姓名={$a->fullname}）。';
$string['reverttodraftshort'] = '退回到草稿';
$string['reviewed'] = '复习';
$string['saveallquickgradingchanges'] = '保存所有快速评分修改结果';
$string['savechanges'] = '保存更改';
$string['savegradingresult'] = '成绩';
$string['savenext'] = '保存并显示下一个';
$string['scale'] = '量表';
$string['selectedusers'] = '选定用户';
$string['selectlink'] = '选择……';
$string['selectuser'] = '选择 {$a}';
$string['sendlatenotifications'] = '迟交时通知评分人';
$string['sendlatenotifications_help'] = '如果启用这项，评分人（通常就是教师）会在学生晚交作业时收到一个消息。消息的发送方式可配置。';
$string['sendnotifications'] = '学生交作业时通知评分人';
$string['sendnotifications_help'] = '如果此项选择了是，则评分人（通常是老师）会在学生提交作业时收到一条通知消息，不管Ta是提前、按时还是迟交作业均会收到。消息发送方式可以在管理功能里面配置。';
$string['sendstudentnotifications'] = '通知学生';
$string['sendstudentnotifications_help'] = '若启用，学生会收到有关成绩或反馈修改的简讯。';
$string['sendsubmissionreceipts'] = '给学生发送提交收据';
$string['sendsubmissionreceipts_help'] = '该开关将会启用对学生反馈提交收据的功能。每当学生成功提交一次作业，他们都会收到一个通知';
$string['setmarkerallocationforlog'] = '设定评分人员分配： (编号={$a->id}，姓名={$a->fullname}，评分者={$a->marker})';
$string['setmarkingallocation'] = '设定指派的评分人员';
$string['setmarkingworkflowstate'] = '设定评分流程状态';
$string['setmarkingworkflowstateforlog'] = '设定评分流程状态：(编号={$a->id}，姓名={$a->fullname}，状态={$a->state})';
$string['settings'] = '作业设置';
$string['showrecentsubmissions'] = '显示最近提交的作业';
$string['status'] = '状态';
$string['submission'] = '提交的作业';
$string['submissioncopiedhtml'] = '你已经复制了一份先前提交的作业\'<i>{$a->assignment}</i>\'.<br />
你可以看到你的<a href="{$a->url}">作业提交</a>.的状态。';
$string['submissioncopiedsmall'] = '你已复制先前提交的作业 {$a->assignment}';
$string['submissioncopiedtext'] = '你已复制了一份先前提交的作业\'{$a->assignment}\'
你可以在 {$a->url} 看到你提交作业的状态。';
$string['submissiondrafts'] = '学生必须点击提交按钮';
$string['submissiondrafts_help'] = '如果启用，学生将需要点击提交按钮来声明他们提交的是最终版本。这样学生也就可以在系统保存作业的草稿。如果在学生已经提交作业后，该设置从“否” 更改为“是”，那么这些作业会被视为最终版本。';
$string['submissioneditable'] = '学生可以编辑提交的作业';
$string['submissionempty'] = '没有提交任何东西';
$string['submissionnotcopiedinvalidstatus'] = '提交的作业已经修改过，不能再复制。';
$string['submissionnoteditable'] = '学生不能编辑提交的作业';
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
$string['submissionstatement'] = '作业提交声明';
$string['submissionstatementacceptedlog'] = '用户{$a}已经接受作业提交声明';
$string['submissionstatementdefault'] = '整个作品都是我自己完成的，除非在作品中我有声明某些地方有引用他人的成果。';
$string['submissionstatement_help'] = '作业提交确认声明';
$string['submissionstatus'] = '提交状态';
$string['submissionstatus_'] = '未提交';
$string['submissionstatus_draft'] = '草稿（未提交）';
$string['submissionstatusheading'] = '作业提交状态';
$string['submissionstatus_marked'] = '已评分';
$string['submissionstatus_new'] = '新提交';
$string['submissionstatus_reopened'] = '已开启重交';
$string['submissionstatus_submitted'] = '已经提交等待评分';
$string['submissionsummary'] = '{$a->status}。最后修改时间： {$a->timemodified}';
$string['submissionteam'] = '群组';
$string['submissiontypes'] = '作业类型';
$string['submitaction'] = '提交';
$string['submitassignment'] = '提交作业';
$string['submitassignment_help'] = '提交作业后，您将不能再做任何修改。';
$string['submitted'] = '已提交';
$string['submittedearly'] = '提早{$a}提交作业';
$string['submittedlate'] = '过期{$a}才提交作业';
$string['submittedlateshort'] = '{$a}之后';
$string['subplugintype_assignfeedback'] = '反馈插件';
$string['subplugintype_assignfeedback_plural'] = '反馈插件';
$string['subplugintype_assignsubmission'] = '提交插件';
$string['subplugintype_assignsubmission_plural'] = '提交插件';
$string['teamsubmission'] = '是否按组提交作业';
$string['teamsubmissiongroupingid'] = '学生小组分组';
$string['teamsubmissiongroupingid_help'] = '将学生按指定的大组结构来划分成各个小组，其余不在该大组中的学生被划到“默认小组”之中，被划到同一组里面的学生共享同一份作业和成绩。
如果此项不选择，则采用默认的分组方法。';
$string['teamsubmission_help'] = '如果启用此项，采用默认分组或者是定制分组将学生分成各个小组，同组中的学生只需提交一份作业，所有小组成员共享老师给出的作业评分。并且所有成员都能看到其他人对该作业所做出的修改。';
$string['teamsubmissionstatus'] = '群组提交状态';
$string['textinstructions'] = '作业说明';
$string['timemodified'] = '最后修改';
$string['timeremaining'] = '剩余时间';
$string['unlimitedattempts'] = '不限';
$string['unlimitedattemptsallowed'] = '允许重试无限次';
$string['unlocksubmissionforstudent'] = '允许该生提交：（学生ID={$a->id}，姓名={$a->fullname}）。';
$string['unlocksubmissions'] = '解除锁定';
$string['updategrade'] = '修改分数';
$string['updatetable'] = '保存并更新列表';
$string['upgradenotimplemented'] = '({$a->type} {$a->subtype}) 插件没有升级功能';
$string['userextensiondate'] = '宽限提交日期到：{$a}';
$string['usergrade'] = '用户成绩';
$string['userswhoneedtosubmit'] = '需要提交作业的用户：{$a}';
$string['validmarkingworkflowstates'] = '有效的评分工作流程状态';
$string['viewbatchmarkingallocation'] = '查看批量设置评分标记页面';
$string['viewbatchsetmarkingworkflowstate'] = '查看批量设置评分流程状态页面';
$string['viewfeedback'] = '查看反馈';
$string['viewfeedbackforuser'] = '查看用户反馈：{$a}';
$string['viewfull'] = '全部查看';
$string['viewfullgradingpage'] = '打开完整评分页面来提供反馈';
$string['viewgradebook'] = '查看成绩单';
$string['viewgrading'] = '查看/评分所有提交的作业';
$string['viewgradingformforstudent'] = '查看学生（id={$a->id}，全名={$a->fullname}）的评分页面。';
$string['viewownsubmissionform'] = '查看自己的提交作业页面。';
$string['viewownsubmissionstatus'] = '查看自己的提交状态页面。';
$string['viewrevealidentitiesconfirm'] = '查看展示学生身份确认页面';
$string['viewsubmission'] = '查看提交';
$string['viewsubmissionforuser'] = '查看用户作业：{$a}';
$string['viewsubmissiongradingtable'] = '查看作业评分表。';
$string['viewsummary'] = '查看摘要';
