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
 * Strings for component 'workshop', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = '访问控制';
$string['aggregategrades'] = '重新计算成绩';
$string['aggregation'] = '成绩汇总';
$string['allocate'] = '分配作业';
$string['allocatedetails'] = '预计：{$a->expected}<br />已提交：{$a->submitted}<br />待分配：{$a->allocate}';
$string['allocation'] = '分配作业';
$string['allocationconfigured'] = '分配已配置';
$string['allocationdone'] = '分配完成';
$string['allocationerror'] = '分配错误';
$string['allsubmissions'] = '所有提交的作业（{$a}）';
$string['alreadygraded'] = '已评分';
$string['areainstructauthors'] = '作业介绍';
$string['areainstructreviewers'] = '如何评价';
$string['areasubmissionattachment'] = '作业附件';
$string['areasubmissioncontent'] = '作业文本';
$string['assess'] = '评价';
$string['assessedexample'] = '已评价的作业范例';
$string['assessedsubmission'] = '已评价的作业';
$string['assessingexample'] = '评价范例作业';
$string['assessingsubmission'] = '评价已交的作业';
$string['assessment'] = '评价';
$string['assessmentby'] = '由<a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = '{$a} 的评价';
$string['assessmentbyyourself'] = '您的评价';
$string['assessmentdeleted'] = '评价分配解除';
$string['assessmentend'] = '评价截止时间';
$string['assessmentendbeforestart'] = '评价日期开放之前不能指定评价的截止日期';
$string['assessmentenddatetime'] = '评价截止日期：{$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a}（评价截止）';
$string['assessmentform'] = '评价表格';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">评价</a> of <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = '参考评价';
$string['assessmentreferenceconflict'] = '您已经为此作业范例提供了一份参考评价，不可能再评价它。';
$string['assessmentreferenceneeded'] = '您必须先为此范例做一套参考评价。点击“继续”按钮开始评价作业。';
$string['assessmentsettings'] = '评价设置';
$string['assessmentstart'] = '评价开始时间';
$string['assessmentstartdatetime'] = '评价开始时间 {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a}（开始评价）';
$string['assessmentweight'] = '评价权重';
$string['assignedassessments'] = '需要评价的作业';
$string['assignedassessmentsnone'] = '您没有需要评价的作业';
$string['backtoeditform'] = '返回到修改表格';
$string['byfullname'] = '由<a href="{$a->url}">{$a->name}</a>提交';
$string['calculategradinggrades'] = '计算评价成绩';
$string['calculategradinggradesdetails'] = '预计：{$a->expected}<br />已计算：{$a->calculated}';
$string['calculatesubmissiongrades'] = '计算作业成绩';
$string['calculatesubmissiongradesdetails'] = '预计：{$a->expected}<br />已计算：{$a->calculated}';
$string['chooseuser'] = '选择用户…';
$string['clearaggregatedgrades'] = '清除所有已汇总成绩';
$string['clearaggregatedgradesconfirm'] = '您确定要清除已计算的作业成绩和评价成绩？';
$string['clearaggregatedgrades_help'] = '已汇总的作业成绩和评价成绩将被复位。您可以在成绩核定阶段重新计算这些成绩。';
$string['clearassessments'] = '清除评价';
$string['clearassessmentsconfirm'] = '您确定要清除所有评价成绩？清除后，您不能独立恢复这些信息，必须等评价人重新评价分配的作业。';
$string['clearassessments_help'] = '已计算的作业成绩和评价成绩将被复位。评价表格已填写的信息仍然保留，但是所有评价人必须再次打开评价表格并再次保存才能让成绩重新计算。';
$string['configexamplesmode'] = '互动评价中范例评价的默认模式';
$string['configgrade'] = '互动评价默认的作业最高分';
$string['configgradedecimals'] = '显示成绩时小数点后默认显示的位数。';
$string['configgradinggrade'] = '互动评价默认的评价最高分';
$string['configmaxbytes'] = '网站所有互动评价默认的最大上传文件大小（受限于课程限制和其它本地设置）';
$string['configstrategy'] = '互动评价的默认评分策略';
$string['createsubmission'] = '开始准备您的提交';
$string['daysago'] = '{$a} 天以前';
$string['daysleft'] = '剩余 {$a} 天';
$string['daystoday'] = '今天';
$string['daystomorrow'] = '明天';
$string['daysyesterday'] = '昨天';
$string['deadlinesignored'] = '时间限制对您无效';
$string['editassessmentform'] = '修改评价表格';
$string['editassessmentformstrategy'] = '修改评价表格 ({$a})';
$string['editingassessmentform'] = '正在修改评价表格';
$string['editingsubmission'] = '正在编辑作业';
$string['editsubmission'] = '编辑作业';
$string['err_multiplesubmissions'] = '编辑此表格的时候，作业的另一个版本已经被保存。每个用户只可以提交一次。';
$string['err_removegrademappings'] = '无法删除未使用的成绩映射';
$string['evaluategradeswait'] = '请耐心等待，正在核定评价、计算成绩。';
$string['evaluation'] = '成绩核定';
$string['evaluationmethod'] = '成绩核定方法';
$string['evaluationmethod_help'] = '成绩核定方法决定如何计算评价的成绩。当前只有一个选项：与最佳评价进行比较。';
$string['evaluationsettings'] = '成绩核定设置';
$string['example'] = '作业范例';
$string['exampleadd'] = '添加作业范例';
$string['exampleassess'] = '评价作业范例';
$string['exampleassessments'] = '需评价的作业范例';
$string['exampleassesstask'] = '评价范例';
$string['exampleassesstaskdetails'] = '预期：{$a->expected}<br />已评：{$a->assessed}';
$string['examplecomparing'] = '正在比较作业范例的评价';
$string['exampledelete'] = '删除范例';
$string['exampledeleteconfirm'] = '您确定要删除下面的作业范例？按“继续”按钮将删除此作业。';
$string['exampleedit'] = '编辑范例';
$string['exampleediting'] = '正在编辑范例';
$string['exampleneedassessed'] = '您必须首先评价所有作业范例';
$string['exampleneedsubmission'] = '您必须先提交作业并评价所有作业范例';
$string['examplesbeforeassessment'] = '在提交自己的作业后，范例将生效，而且必须在评价同学的作业之前完成对范例的评价';
$string['examplesbeforesubmission'] = '必须在提交自己的作业前完成对范例的评价';
$string['examplesmode'] = '范例评价模式';
$string['examplesubmissions'] = '范例作业';
$string['examplesvoluntary'] = '自愿决定是否评价范例作业';
$string['feedbackauthor'] = '给作者反馈';
$string['feedbackby'] = '{$a}的反馈';
$string['feedbackreviewer'] = '给评价人反馈';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = '给出的分数';
$string['gradecalculated'] = '已计算的作业成绩';
$string['gradedecimals'] = '成绩的小数位数';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = '成绩：{$a->received}/{$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (评价)';
$string['gradeitemsubmission'] = '{$a->workshopname} (作业)';
$string['gradeover'] = '覆盖作业成绩';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = '互动评价成绩报告';
$string['gradinggrade'] = '评价成绩';
$string['gradinggradecalculated'] = '已计算的评价成绩';
$string['gradinggrade_help'] = '此设置指定了作业评价可能获得的最高成绩。';
$string['gradinggradeof'] = '评价成绩（最高分 {$a}）';
$string['gradinggradeover'] = '覆盖评价成绩';
$string['gradingsettings'] = '成绩设置';
$string['groupnoallowed'] = '您未被允许访问该互动评价中的任何一组';
$string['iamsure'] = '是的，我确定';
$string['info'] = '信息';
$string['instructauthors'] = '作业说明';
$string['instructreviewers'] = '如何评价';
$string['introduction'] = '简介';
$string['latesubmissions'] = '迟交作业';
$string['latesubmissionsallowed'] = '允许迟交作业';
$string['latesubmissions_desc'] = '允许在截止日期后提交作业';
$string['latesubmissions_help'] = '如果启用，作者可以在截止日期后或在评估阶段提交作业。但不能编辑迟交的作业。';
$string['maxbytes'] = '文件尺寸上限';
$string['modulename'] = '互动评价';
$string['modulename_help'] = '互相评价模块允许收集、查看以及评价学生的工作。

学生可以提交任意电子文档（文件），比如文字处理文档或者电子表格，也可以利用文字编辑器直接在指定区域内输入文本。

提交是以一个由教师定制的多准则标准来评估。同学间互评及对评估形式的理解可以提前通过由教师提供的示例提交和参考评价来进行练习。学生有一个或多个对其他同学的提交做出评价的机会。如果需要，提交和评论者可以是匿名的。

在互相评测中学生获得两种分数 —— 一个是他们的提交分数，另一个是他们对其他学生的提交的评估分数。两种分数都会在成绩册中登记。';
$string['modulenameplural'] = '互动评价';
$string['mysubmission'] = '我的作业';
$string['nattachments'] = '作业附件最大个数';
$string['noexamples'] = '此互动评价还没有范例';
$string['noexamplesformready'] = '在上传作业范例之前您必须先设计评价表格';
$string['nogradeyet'] = '还没有成绩';
$string['nosubmissionfound'] = '没找到此用户的作业';
$string['nosubmissions'] = '此互动评价还未收到作业';
$string['notassessed'] = '还未评价';
$string['nothingtoreview'] = '没有可评价的';
$string['notoverridden'] = '不覆盖';
$string['noworkshops'] = '这个课程中没有互动评价活动';
$string['noyoursubmission'] = '您还没有提交作业';
$string['nullgrade'] = '-';
$string['page-mod-workshop-x'] = '任意互动评价模块页面';
$string['participant'] = '参与者';
$string['participantrevierof'] = '参与者评价谁';
$string['participantreviewedby'] = '谁评价参与者';
$string['phaseassessment'] = '评价阶段';
$string['phaseclosed'] = '关闭';
$string['phaseevaluation'] = '成绩核定阶段';
$string['phasesetup'] = '设置阶段';
$string['phasesoverlap'] = '提交阶段和评价阶段不能重叠';
$string['phasesubmission'] = '提交作业阶段';
$string['pluginadministration'] = '互动评价管理';
$string['pluginname'] = '互动评价';
$string['prepareexamples'] = '准备作业范例';
$string['previewassessmentform'] = '预览';
$string['publishedsubmissions'] = '已发布的作业';
$string['publishsubmission'] = '发布作业';
$string['publishsubmission_help'] = '当互动评价关闭后，其他人仍可以看到已发布的作业。';
$string['reassess'] = '重新评价';
$string['receivedgrades'] = '收到的分数';
$string['recentassessments'] = '互动评价：';
$string['recentsubmissions'] = '互动评价的作业：';
$string['saveandclose'] = '保存并关闭';
$string['saveandcontinue'] = '保存并继续编辑';
$string['saveandpreview'] = '保存并预览';
$string['selfassessmentdisabled'] = '禁用自我评价';
$string['showingperpage'] = '每页显示项 {$a}';
$string['showingperpagechange'] = '改变......';
$string['someuserswosubmission'] = '至少有一人还未提交作业';
$string['sortasc'] = '升序排序';
$string['sortdesc'] = '降序排序';
$string['strategy'] = '评分策略';
$string['strategyhaschanged'] = '在编辑表格期间，此互动评价的评分策略已被修改。';
$string['strategy_help'] = '评分策略决定了使用哪个评价表格和给作业评分的方法。有4个选项：

* 累加分数 - 针对指定的采分点给出评语和分数
* 评语 - 针对指定的采分点给出评语，但是不评分
* 错误数 - 针对指定的断言给出评语和“是/否”的评价
* 量规 - 按照设定的标准给出分等级的评价';
$string['submission'] = '作业';
$string['submissionattachment'] = '附件';
$string['submissionby'] = '{$a} 的作业';
$string['submissioncontent'] = '作业内容';
$string['submissionend'] = '提交截止时间';
$string['submissionendbeforestart'] = '在提交日期开放之前不能指定提交的截止日期';
$string['submissionenddatetime'] = '上传作业截止时间: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a}（提交截止）';
$string['submissionendswitch'] = '在提交日期截止后进入下一阶段';
$string['submissionendswitch_help'] = '如果指定了提交的截止日期，并且该选择框已选，则该互动评测在提交日期截止后会自动进入到评测阶段。

如果您启用此项功能，建议您也设置计划分配方法。如果提交没有被分配，则即使互动评测出于评测阶段也不能进行评测。';
$string['submissiongrade'] = '作业成绩';
$string['submissiongrade_help'] = '此设置指定了上传作业可能获得的最高成绩。';
$string['submissiongradeof'] = '作业成绩（最高分 {$a}）';
$string['submissionsettings'] = '作业设置';
$string['submissionstart'] = '提交开始时间';
$string['submissionstartdatetime'] = '上传作业开始时间 {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a}（开始提交）';
$string['submissiontitle'] = '题目';
$string['subplugintype_workshopallocation'] = '作业分配方法';
$string['subplugintype_workshopallocation_plural'] = '作业分配方法';
$string['subplugintype_workshopeval'] = '成绩核定方法';
$string['subplugintype_workshopeval_plural'] = '成绩核定方法';
$string['subplugintype_workshopform'] = '评分策略';
$string['subplugintype_workshopform_plural'] = '评分策略';
$string['switchingphase'] = '正在切换阶段';
$string['switchphase'] = '切换阶段';
$string['switchphase10info'] = '您将切换此互动评价到<strong>设置阶段</strong>。在此阶段，用户不能修改作业和评价。教师可利用这个阶段修改互动评价的设置、评分策略或评价表格。';
$string['switchphase20info'] = '您将切换此互动评价到<strong>作业提交阶段</strong>。在此阶段学生可以上传作业（在作业访问控制日期内，如果设置了的话）。教师可分配同学间互评。';
$string['switchphase30auto'] = '在 {$a->daydatetime} ({$a->distanceday}) 之后，互动评价会自动地进入评价阶段';
$string['switchphase30info'] = '您将切换此互动评价到<strong>评价阶段</strong>。在这个阶段，评价人可以评价已分配给他们的作业（在评价访问控制日期内，如果已经设置）。';
$string['switchphase40info'] = '您将切换此互动评价到<strong>评分核定阶段</strong>。 在这个阶段，用户无法修改他们的作业和评价。教师可以使用评分核定工具计算最终成绩，并给评价人反馈。';
$string['switchphase50info'] = '您将要关闭此互动评价。这会使计算过的成绩显示在成绩单上。学生们可以查看他们的作业和对作业的评价。';
$string['taskassesspeers'] = '评价同学的作业';
$string['taskassesspeersdetails'] = '总数：{$a->total}<br />待评：{$a->todo}';
$string['taskassessself'] = '自我评价';
$string['taskinstructauthors'] = '提供作业说明';
$string['taskinstructreviewers'] = '提供评价标准说明';
$string['taskintro'] = '设置此互动评价简介';
$string['tasksubmit'] = '上传您的作业';
$string['toolbox'] = '互动评价工具箱';
$string['undersetup'] = '互动评价正在建立中。请等待，直到活动转入下一阶段。';
$string['useexamples'] = '使用范例';
$string['useexamples_desc'] = '提供作业范例，用来练习评价';
$string['useexamples_help'] = '如果启用，用户可以试着评价若干个作业范例，并把他们的评价与参考评价进行比较。该成绩不计算在评价成绩中。';
$string['usepeerassessment'] = '使用学生互评';
$string['usepeerassessment_desc'] = '学生们可以评价其他人的作业';
$string['usepeerassessment_help'] = '如果启用，可以分配其他用户的作业给任意用户供评价。并且，用户除了自己的作业成绩外，还会获得一个评价成绩。';
$string['userdatecreated'] = '提交时间是 <span>{$a}</span>';
$string['userdatemodified'] = '修改时间是 <span>{$a}</span>';
$string['userplan'] = '互动评价计划表';
$string['userplan_help'] = '互动评价计划表列出此活动的所有阶段和每个阶段的任务。高亮显示的是当前阶段。勾选标记的是已完成的任务。';
$string['useselfassessment'] = '使用自评';
$string['useselfassessment_desc'] = '学生可以评价他们自己的作业';
$string['useselfassessment_help'] = '如果启用，用户自己的作业可能会被分配给自己供评价。并且，用户除了自己的作业成绩外，还会获得一个评价成绩。';
$string['weightinfo'] = '权重：{$a}';
$string['withoutsubmission'] = '评价人未上传自己的作业';
$string['workshop:addinstance'] = '添加一个新的互动评价';
$string['workshop:allocate'] = '分配作业用于评价';
$string['workshop:editdimensions'] = '编辑评价表格';
$string['workshopfeatures'] = '互动评价特性';
$string['workshop:ignoredeadlines'] = '忽略时间限制';
$string['workshop:manageexamples'] = '管理作业范例';
$string['workshopname'] = '互动评价名称';
$string['workshop:overridegrades'] = '覆盖已计算的成绩';
$string['workshop:peerassess'] = '同学间互评';
$string['workshop:publishsubmissions'] = '发布作业';
$string['workshop:submit'] = '上传作业';
$string['workshop:switchphase'] = '切换阶段';
$string['workshop:view'] = '查看互动评价';
$string['workshop:viewallassessments'] = '查看所有评价';
$string['workshop:viewallsubmissions'] = '查看所有作业';
$string['workshop:viewauthornames'] = '查看作者姓名';
$string['workshop:viewauthorpublished'] = '查看已发布作业的作者';
$string['workshop:viewpublishedsubmissions'] = '查看已发布作业';
$string['workshop:viewreviewernames'] = '查看评价人姓名';
$string['yourassessment'] = '您的评价';
$string['yoursubmission'] = '您的作业';
