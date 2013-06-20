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
 * Strings for component 'assignment', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = '您有需要留意的作业';
$string['addsubmission'] = '添加提交';
$string['allowdeleting'] = '学生可否删除作业';
$string['allowdeleting_help'] = '如果允许删除，学生可以在提交评分请求之前随时删除已上传的文件。';
$string['allowmaxfiles'] = '最多可传几个文件';
$string['allowmaxfiles_help'] = '最多可以上传的文件数。因为此数值并不向学生显示，所以建议您在作业描述中注明。';
$string['allownotes'] = '是否允许备注';
$string['allownotes_help'] = '如果启用，学生可以在一个文本框里输入备注，和在线文本作业类似。';
$string['allowresubmit'] = '是否允许重交';
$string['allowresubmit_help'] = '如果启用，学生在评分后仍可以重新提交作业(给教师重新评分)。';
$string['alreadygraded'] = '您的作业已经评分，不允许重新提交';
$string['assignment:addinstance'] = '添加新作业';
$string['assignmentdetails'] = '布置作业细节';
$string['assignment:exportownsubmission'] = '导出自己的作业';
$string['assignment:exportsubmission'] = '导出作业';
$string['assignment:grade'] = '作业评分';
$string['assignmentmail'] = '{$a->teacher}已经在“{$a->assignment}”中为您提交的作业写了反馈意见。

您可以在您交的作业后面看到反馈意见：

    {$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher}已经在<i>“{$a->assignment}”</i>中为您提交的作业写了反馈意见。<br /><br />
您可以在<a href="{$a->url}">您交的作业</a>后面看到反馈意见。';
$string['assignmentmailsmall'] = '{$a->teacher}对您在\'{$a->assignment}\'提交的作业写了一些反馈，可以在您的作业的后面看到';
$string['assignmentname'] = '作业名称';
$string['assignmentsubmission'] = '提交的作业';
$string['assignment:submit'] = '提交作业';
$string['assignmenttype'] = '作业类型';
$string['assignment:view'] = '查看作业';
$string['availabledate'] = '开放时间';
$string['cannotdeletefiles'] = '发生错误，不能删除文件！';
$string['cannotviewassignment'] = '您不能查看此作业';
$string['changegradewarning'] = '该作业的分数已经提交，改变分数不会自动地重新计算已经提交的分数。如果您想改变分数，您必须对所有的已存在的提交全部重新评分。';
$string['comment'] = '评论';
$string['commentinline'] = '是否嵌入批注';
$string['commentinline_help'] = '如果启用，评分时，原先提交的内容将会被拷贝到填写反馈的文本框中，从而能方便地嵌入批注(或许，使用不同颜色)或直接修改原文。';
$string['configitemstocount'] = '学生提交的在线作业的计数单位';
$string['configmaxbytes'] = '网站中作业最大尺寸的缺省值(同时受课程和其它本地设置的限制)';
$string['configshowrecentsubmissions'] = '任何人可以看到最近活动报表中提交作业的信息';
$string['confirmdeletefile'] = '您完全确定要删除此文件吗？<br /><strong>{$a}</strong>';
$string['coursemisconf'] = '课程配置不正确';
$string['currentgrade'] = '成绩单中的当前成绩';
$string['deleteallsubmissions'] = '删除所有提交的作业';
$string['deletefilefailed'] = '文件删除失败。';
$string['description'] = '描述';
$string['downloadall'] = '下载所有作业的zip包';
$string['draft'] = '草稿';
$string['due'] = '作业截止日期';
$string['duedate'] = '截止时间';
$string['duedateno'] = '无截止时间';
$string['early'] = '{$a}之前';
$string['editmysubmission'] = '编辑我已提交的作业';
$string['editthesefiles'] = '编辑这些文件';
$string['editthisfile'] = '更新此文件';
$string['emailstudents'] = '用Email提醒学生';
$string['emailteachermail'] = '{$a->username}在{$a->timeupdated}更新了作业“{$a->assignment}”

可以在这里查看：

    {$a->url}';
$string['emailteachermailhtml'] = '{$a->username}在<i>{$a->timeupdated}</i>更新了作业<i>“{$a->assignment}”</i><br /><br />可以在<a href="{$a->url}">网站上查看</a>。';
$string['emailteachers'] = '用Email提醒教师';
$string['emailteachers_help'] = '如果启用，当学生上传或更新作业时教师都会收到一封提醒邮件。

只有有权给该作业评分的教师才会收到邮件。因此，如果课程使用了分割小组，则某个小组的教师不会收到其它小组学生交作业的通知。';
$string['emptysubmission'] = '您尚未提交任何内容';
$string['enablenotification'] = '发送Email通知';
$string['enablenotification_help'] = '如果启用，那么评分后，学生能收到Email通知。';
$string['errornosubmissions'] = '没有可下载的作业';
$string['existingfiledeleted'] = '文件“{$a}”已被删除';
$string['failedupdatefeedback'] = '为用户 {$a} 更新反馈失败';
$string['feedback'] = '反馈';
$string['feedbackfromteacher'] = '来自{$a}的反馈';
$string['feedbackupdated'] = '为 {$a} 个人更新上交反馈';
$string['finalize'] = '阻止再次提交';
$string['finalizeerror'] = '发生错误！提交的作业无法结束';
$string['graded'] = '已评分';
$string['guestnosubmit'] = '很抱歉，访客不能提交作业。您在提交答案前应先登录或注册。';
$string['guestnoupload'] = '很抱歉，不允许访客提交作业';
$string['helpoffline'] = '<p>如果学生在Moodle之外完成作业（比如在其它网站，或者与教师直接交流），那么可以使用这种类型的作业。</p>
<p> 学生可以看到作业的描述，但不能上传包括文件在内的任何信息。教师依然可以对作业评分，学生也会得到关于他们的分数的通知。</p>';
$string['helponline'] = '<p>这种类型的作业让学生使用普通的编辑工具来编辑文本。教师可以对作业在线评分，甚至可以修改和嵌入点评到学生的答案里。</p>
<p>（如果您熟悉旧版本的Moodle，那么这种类型的作业完全和旧的日志模块以相同的方式工作。）</p>';
$string['helpupload'] = '<p>这种类型的作业允许每个参与者上传任何类型的一个或多个文件。
它们可以是Word文档、图片、打包了的网站，或者任何您想让他们提交的。</p>
<p>此类作业也允许您上传多个反馈文件。反馈文件也可以在作业提交前就上传，这样可以给每个参与者不同的文件。</p>
<p>参与者们也可以输入注释来说明提交的文件、进度状况或任何其它文本信息。</p>
<p>此类作业的提交必由参与者手工设定为结束。您可以在任何时间检查当前的状态，未完成的作业会被标记为草稿。您可以把任何未打分的作业恢复成草稿的状态。</p>';
$string['helpuploadsingle'] = '<p>这种类型的作业允许每个参与者上传任何类型的一个文件。</p> <p>可以是一个Word文档，一个图片，一个打包了的网站，或者任何您想让他们提交的。</p>';
$string['hideintro'] = '在可以提交作业前隐藏作业说明';
$string['hideintro_help'] = '如果启用，在“开放时间”未到时，会隐藏作业描述，只显示作业名。';
$string['invalidassignment'] = '作业无效';
$string['invalidfileandsubmissionid'] = '缺少文件或提交ID';
$string['invalidid'] = '作业ID无效';
$string['invalidsubmissionid'] = '提交ID无效';
$string['invalidtype'] = '作业类型无效';
$string['invaliduserid'] = '无效的用户ID';
$string['itemstocount'] = '计数';
$string['lastgrade'] = '最后评分';
$string['late'] = '{$a}之后';
$string['maximumgrade'] = '最高得分';
$string['maximumsize'] = '大小限制';
$string['maxpublishstate'] = '截止时间之前博客的最大可见范围';
$string['messageprovider:assignment_updates'] = '作业（2.2）通知';
$string['modulename'] = '作业 (2.2)';
$string['modulename_help'] = '通过作业，教师可以布置一个在线或离线的任务，并能对其评分。';
$string['modulenameplural'] = '作业（2.2）';
$string['newsubmissions'] = '已交的作业';
$string['noassignments'] = '尚无作业';
$string['noattempts'] = '尚无人尝试做此作业';
$string['noblogs'] = '您没有要提交的博客文章！';
$string['nofiles'] = '没有提交任何文件';
$string['nofilesyet'] = '还没有提交文件';
$string['nomoresubmissions'] = '不再允许提交作业。';
$string['norequiregrading'] = '没有需要评分的作业';
$string['nosubmisson'] = '没有已提交的作业';
$string['notavailableyet'] = '很抱歉，此作业还未启动。<br />下面的日期后，将在此显示作业说明。';
$string['notes'] = '备注';
$string['notesempty'] = '无';
$string['notesupdateerror'] = '在更新备注时发生错误';
$string['notgradedyet'] = '没有评分';
$string['notsubmittedyet'] = '还未提交';
$string['onceassignmentsent'] = '一旦发送了评分请求，您将不再能删除或上传文件了。您确定要继续吗？';
$string['operation'] = '操作';
$string['optionalsettings'] = '可选设置';
$string['overwritewarning'] = '警告：重新上传将<strong>覆盖</strong>您已交的作业';
$string['page-mod-assignment-submissions'] = '作业模块评分页';
$string['page-mod-assignment-view'] = '作业模块主页';
$string['page-mod-assignment-x'] = '任意作业模块页面';
$string['pagesize'] = '每页显示作业数';
$string['pluginadministration'] = '作业管理';
$string['pluginname'] = '作业（2.2）';
$string['popupinnewwindow'] = '在弹出窗口中打开';
$string['preventlate'] = '是否禁止迟交';
$string['quickgrade'] = '允许快速评分';
$string['quickgrade_help'] = '如果启用，您可以在一个页面内给多份作业评分。只需设定分数和评论，然后点击“保存所有反馈”按钮，就可以保存该页所有的变更。
';
$string['requiregrading'] = '请求评分';
$string['responsefiles'] = '反馈文件';
$string['reviewed'] = '复习';
$string['saveallfeedback'] = '保存所有我的反馈';
$string['selectblog'] = '选择提交哪篇博客文章';
$string['sendformarking'] = '发送评分请求';
$string['showrecentsubmissions'] = '显示最近提交的作业';
$string['submission'] = '提交的作业';
$string['submissiondraft'] = '提交草稿';
$string['submissionfeedback'] = '作业反馈';
$string['submissions'] = '提交信息';
$string['submissionsaved'] = '已经保存了您的修改';
$string['submissionsnotgraded'] = '{$a} 个作业尚未评分';
$string['submitassignment'] = '用此表单上交作业';
$string['submitedformarking'] = '作业正在等待评分，不能再修改了';
$string['submitformarking'] = '最终版本，可以评分';
$string['submitted'] = '已提交';
$string['submittedfiles'] = '提交的文件';
$string['subplugintype_assignment'] = '作业类型';
$string['subplugintype_assignment_plural'] = '作业类型';
$string['trackdrafts'] = '激活“发送评分请求”按钮';
$string['trackdrafts_help'] = '通过“发送评分请求”按钮，学生可以通知教师他们已经完成了作业。如需要，教师可以将作业恢复到草稿状态（比如，该作业还需进一步完善）。';
$string['typeblog'] = '博客发布';
$string['typeoffline'] = '离线活动项目';
$string['typeonline'] = '在线文本';
$string['typeupload'] = '高级文件上传';
$string['typeuploadsingle'] = '上传单个文件';
$string['unfinalize'] = '还原成草稿';
$string['unfinalizeerror'] = '发生错误！提交的作业不能转化为草稿';
$string['unfinalize_help'] = '恢复到草稿状态使学生可以对作业做进一步更新';
$string['upgradenotification'] = '此活动使用的是旧作业模块。';
$string['uploadafile'] = '上传一个文件';
$string['uploadbadname'] = '该文件名含有怪异字符，无法上传';
$string['uploadedfiles'] = '已上传的文件';
$string['uploaderror'] = '在服务器上保存文件时发生错误';
$string['uploadfailnoupdate'] = '文件上传成功但无法更新您的提交信息！';
$string['uploadfiles'] = '上传文件';
$string['uploadfiletoobig'] = '很抱歉，文件太大（最大不超过 {$a} 个字节）';
$string['uploadnofilefound'] = '未发现任何文件――您能确定已选取了一个文件来上传吗?';
$string['uploadnotregistered'] = '“{$a}”上传成功，但尚未登记！';
$string['uploadsuccess'] = '成功上传“{$a}”';
$string['usermisconf'] = '用户配置错误';
$string['usernosubmit'] = '抱歉，您没有提交作业的权限。';
$string['viewassignmentupgradetool'] = '查看作业升级工具';
$string['viewfeedback'] = '查看作业成绩和反馈';
$string['viewmysubmission'] = '查看我提交的作业';
$string['viewsubmissions'] = '查看 {$a} 份已交的作业';
$string['yoursubmission'] = '您提交的作业';
