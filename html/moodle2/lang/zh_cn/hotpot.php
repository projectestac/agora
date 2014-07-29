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
 * Strings for component 'hotpot', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = '放弃';
$string['activitycloses'] = '活动关闭';
$string['activitygrade'] = '活动成绩';
$string['activityopens'] = '活动开启';
$string['added'] = '已经添加';
$string['addquizchain'] = '添加一系列测验';
$string['addquizchain_help'] = '添加所有测验链中的测验吗？

**不**
: 只添加一个测验

**是**
: 如果源文件是个**测验文件**，该文件将被当作测验链的起始，该链上所有的测验都会被以相同的设置添加到此课程。链上的每个测验都必须包含指向下一个测验的链接。

如果源文件是个**文件夹**，该文件夹下所有能够被识别出来的测验都会被以相同的设置添加进来，并形成一个测验链。

如果源文件是个**单位文件**，比如说Hot Potatoes masher （热土豆碾子）文件或者index.html，该单位文件所列出的所有测验会被以相同的设置添加进来，并形成一个测验链。';
$string['allowreview'] = '允许评论';
$string['allowreview_help'] = '如启用，学生在测验关闭以后可以回顾他们是如何作答的。';
$string['analysisreport'] = '项目分析';
$string['attemptlimit'] = '答题限制';
$string['attemptlimit_help'] = '一个学生可以在此 HotPot 活动中进行的答题的最大次数';
$string['attemptnumber'] = '答题次数';
$string['attempts'] = '答卷';
$string['attemptscore'] = '答卷分数';
$string['attemptsunlimited'] = '无限制的答题';
$string['average'] = '平均';
$string['averagescore'] = '平均成绩';
$string['cacherecords'] = 'HotPot缓存记录';
$string['checks'] = '检查';
$string['checksomeboxes'] = '请查检某些框';
$string['clearcache'] = '清空HotPot的缓存';
$string['cleardetails'] = '清空HotPot的内容';
$string['clearedcache'] = 'HotPot的缓存已被清空';
$string['cleareddetails'] = 'HotPot的内容已被清空';
$string['clickreporting'] = '点击报表';
$string['clickreporting_help'] = '如果启用该设定，则每次点击“提示”，“线索”或者“检查”按钮时，都会保留一个单独的记录。这使得教师可以看到一个非常详细的，显示每次点击时的测试状态的报告。若不启用，则测试只在每次提交时，才存储一个记录。';
$string['closed'] = '该活动已经关闭。';
$string['clues'] = '提示';
$string['completed'] = '完成';
$string['configenablecache'] = '保留HotPot测验的缓存能极大地提高学生访问测验的速度。';
$string['configenablecron'] = '指定HotPot的cron脚本在您所在时区的几点钟运行';
$string['configenablemymoodle'] = '此选项设置HotPot是否会列在“我的Moodle”页面上';
$string['configenableobfuscate'] = '在javascript代码不可读的方式下，插入媒体播放器会使确定文件名和文件位置变得更加困难。';
$string['configenableswf'] = '允许嵌入SWF文件到HotPot活动中。如果启用，该设定会重写filter_mediaplugin_enable_swf。';
$string['configfile'] = '配置文件';
$string['configframeheight'] = '当测验显示时带有边框，该值代表顶框的高度（以像素为单位），其中顶框包含了Moodle导航栏。';
$string['configlocation'] = '配置文件位置';
$string['configlockframe'] = '若启用该设定，则导航栏（若使用）将被锁定，从而变得不能滚动，不能调整大小，也没有边框';
$string['configmaxeventlength'] = '如果一个HotPot既指定了开启也指定了关闭时间，且两个时间的差大于此处指定的天数，则将会添加两个单独的日历事件到课程日历中。对于时间差小于指定日期数，或者只指定了一个时间的情况，只添加一个日历事件。如果两个时间均未被指定，将不会添加日历事件。';
$string['configstoredetails'] = '若启用该设置，则HotPot测验中的原始XML细节将会存储在hotpot_details表中。这允许提交的测验答案可以在以后重新评分，以反映HotPot测验评分系统中的变化。然而，如果在一个繁忙的站点上启用该选项，hotpot_details表中的数据会增长得非常快。';
$string['confirmdeleteattempts'] = '您真的要删除这些提交么？';
$string['confirmstop'] = '您确定要离开此页面吗？';
$string['correct'] = '正确';
$string['couldnotinsertsubmissionform'] = '无法插入提交表单';
$string['delay1'] = '延迟 1';
$string['delay1_help'] = '第一次和第二次答题间的最小延迟。';
$string['delay1summary'] = '试卷一与试卷二之间的时间延迟';
$string['delay2'] = '延迟2';
$string['delay2_help'] = '试卷二后，试卷间的最小时间延迟。';
$string['delay2summary'] = '后续试卷间的时间延迟';
$string['delay3'] = '延迟3';
$string['delay3afterok'] = '等待学生点击确定';
$string['delay3disable'] = '不要自动继续';
$string['delay3_help'] = '该设定规定了完成测试与将显示控制交还给Moodle之间的延迟。

**使用特定的时间（以秒为单位）**
：经过指定的秒数后，控制权将会被交还给Moodle。


**使用源/模板文件中的设置**
：经过源文件或模板文件对于该输出格式规定的秒数后，控制权将会被交还给Moodle。


**直到学生点击“好”**
：在学生点击了测试中完成消息框上的“好”按钮后，控制权将会被交还给Moodle。


**不要自动继续**
：测试结束后，控制权将会被交还给Moodle。学生可以从测试页面自由转去其它页面。

注意，无论该设置如何设定，测试结果总是在测试完成或放弃后立即返回给Moodle。';
$string['delay3specific'] = '使用特定的时间（以秒为单位）';
$string['delay3summary'] = '测试结束处的时间延迟';
$string['delay3template'] = '使用源文件或模板文件中的设置';
$string['deleteallattempts'] = '删除所有尝试';
$string['deleteattempts'] = '删除试卷';
$string['detailsrecords'] = 'HotPot 详情记录';
$string['d_index'] = '区分度指数';
$string['duration'] = '持续时间';
$string['enablecache'] = '启用HotPot缓存';
$string['enablecron'] = '启用 HotPot 计划任务';
$string['enablemymoodle'] = '在我的Moodle上显示HotPots';
$string['enableobfuscate'] = '启用媒体播放器代码混淆';
$string['enableswf'] = '允许HotPot活动中嵌入SWF文件';
$string['entry_attempts'] = '试卷';
$string['entrycm'] = '之前的活动';
$string['entrycmcourse'] = '本课程上次活动';
$string['entrycm_help'] = '该设置指定了一个Moodle活动与在尝试该Quizport前，必须达到的最小等级。

教师可以选择一个特定的活动，
或者下面这些通用目的设置之一：

*该课程之前的活动
*该节之前的活动
*该课程之前的HotPot
*该节之前的HotPot';
$string['entrycmsection'] = '本节的上次活动';
$string['entrycompletionwarning'] = '在开始本项活动之前，您必须查看{$a}。';
$string['entry_dates'] = '日期';
$string['entrygrade'] = '以前的活动成绩';
$string['entrygradewarning'] = '您在 {$a->entryactivity} 中得到 {$a->entrygrade}% 分数前您不能开始此活动。 目前您该活动的成绩是 {$a->usergrade}%';
$string['entry_grading'] = '评分';
$string['entryhotpotcourse'] = '此课程中以前的 HotPot';
$string['entryhotpotsection'] = '此课程小节中以前的 HotPot';
$string['entryoptions'] = '入口页面选项';
$string['entryoptions_help'] = '这些复选框启用和禁用 HotPot 入口页面上显示的项目。.

**单元名称作为标题**
：如果选中，单元的名称将会作为入口页面的标题显示。

**评分**
：如果选中，HotPot 的评分信息将会显示在入口页面上。

**日期**
：如果选中，HotPot 的开始和关闭的日期将会显示在入口页面上。

**答卷**
：如果选中，一个显示用户以前在此 HotPot 的答卷详细信息的表格将会显示在入口页面上。答卷如果中断，在最右边的栏里将会显示一个继续按钮。';
$string['entrypage'] = '显示入口页面';
$string['entrypagehdr'] = '入口页面';
$string['entrypage_help'] = '在开始使用 HotPot 前应该给学生显示一个初始页面吗？

**是**
：在开始使用 HotPot 前将会给学生显示一个入口页面。入口页面的内容是由 HotPot 入口页面选项决定的。

**否**
：将不会给学生显示入口页面，并立即开始使用 HotPot。

为了能访问报告和编辑测验页面，入口页面将会始终显示给老师';
$string['entrytext'] = '入口页面文字';
$string['entry_title'] = '单元名称作为标题';
$string['exit_areyouok'] = '您好，您还在吗？';
$string['exit_attemptscore'] = '您的那次答卷成绩是 {$a}';
$string['exitcm'] = '下一项活动';
$string['exitcmcourse'] = '本课程的下次活动';
$string['exitcm_help'] = '此设置指定在 Quizport 完成后需要进行的 Moodle 活动。

教师可以选择一个特定的活动，或者下面几个通用设置之一：

* 此课程的下一项活动
* 此小节的下一项活动
* 此课程的下一个 HotPot
* 此小节的下一个 HotPot

如果其他退出页面选项被禁用了，学生将会直接进入下一项活动。否则将会给学生显示一个链接，当他们准备好时可以带他们进入下一项活动。';
$string['exitcmsection'] = '本节的下次活动';
$string['exit_course'] = '课程';
$string['exit_course_text'] = '返回课程主页';
$string['exit_encouragement'] = '鼓励';
$string['exit_excellent'] = '好极了！';
$string['exit_feedback'] = '退出页面反馈';
$string['exit_feedback_help'] = '这些选项启用和禁用 HotPot 退出页面上显示的反馈项。

**单元名称作为标题**
：如果选中，单元名称将会作为退出页面的标题显示。

**鼓励**
：如果选中，退出页面将会显示一些鼓励。鼓励依赖于 HotPot 成绩：
： **> 90%**：好极了！
： **> 60%**：做得好
：**> 0%**：良好的尝试
： **= 0%**：您还好吗？

**单元答卷成绩**
：如果选中，刚刚完成的单元答卷的成绩将会显示在退出页面上。

**单元成绩**
：如果选中，HotPot 成绩将会显示在退出页面上。

另外，如果单元评分方式是最高的，将会显示一条消息，告诉用户最新的答卷是等于还是优于前次。';
$string['exit_goodtry'] = '良好的尝试！';
$string['exitgrade'] = '下一个活动等级';
$string['exit_grades'] = '成绩';
$string['exit_grades_text'] = '查看此课程您目前为止的成绩';
$string['exithotpotcourse'] = '此课程的下一个 HotPot';
$string['exit_hotpotgrade'] = '您这项活动的成绩是 {$a}';
$string['exit_hotpotgrade_average'] = '您这项活动目前的平均成绩是 {$a}';
$string['exit_hotpotgrade_highest'] = '您这项活动目前的最高成绩是 {$a}';
$string['exit_hotpotgrade_highest_equal'] = '这项活动您平了以前的最好成绩！';
$string['exit_hotpotgrade_highest_previous'] = '您这项活动以前的最高成绩是 {$a}';
$string['exit_hotpotgrade_highest_zero'] = '您这项活动的成绩还没有高于 {$a}';
$string['exithotpotsection'] = '此课程小节的下一个 HotPot';
$string['exit_index'] = '索引';
$string['exit_index_text'] = '去活动的索引';
$string['exit_links'] = '退出页面链接';
$string['exit_links_help'] = '这些选项开启和禁用 HotPot 退出页面上某些导航链接的显示。

**重试**
：如果此 HotPot 允许多次答题并且学生还有一些剩余机会，将会显示一个允许学生重试 HotPot 的链接。

**索引**
如果选中，将会显示一个指向 HotPot 索引页面的链接。

**课程**
：如果选中，将会显示一个指向 Moodle 课程页面的链接。

**成绩**
如果选中，将会显示一个指向 Moodle 成绩册的链接。';
$string['exit_next'] = '下一个';
$string['exit_next_text'] = '尝试下一项活动';
$string['exit_noscore'] = '您已经成功完成此活动！';
$string['exitoptions'] = '退出页面选项';
$string['exitpage'] = '显示退出页面';
$string['exitpagehdr'] = '退出页面';
$string['exitpage_help'] = '在 HotPot 测验完成后应该显示一个退出页面吗？

**是**
：当 HotPot 测验完成后会给学生显示一个退出页面。退出页面的内容是由 HotPot 退出页面反馈和链接的设置来决定的。

**否**
：将不向学生显示退出页面。相反，他们将会直接进入下一项活动或者返回 Moodle 课程页面。';
$string['exit_retry'] = '重试';
$string['exit_retry_text'] = '重试此活动';
$string['exittext'] = '退出页面文字';
$string['exit_welldone'] = '做得好！';
$string['exit_whatnext_0'] = '您想下一步想要做什么？';
$string['exit_whatnext_1'] = '选择您的目的地……';
$string['exit_whatnext_default'] = '请从下面选择其一：';
$string['feedbackdiscuss'] = '在论坛里讨论这个测验';
$string['feedbackformmail'] = '反馈格式';
$string['feedbackmoodleforum'] = 'Moodle讨论';
$string['feedbackmoodlemessaging'] = 'Moodle消息';
$string['feedbacknone'] = '无';
$string['feedbacksendmessage'] = '给您的导师发送一条信息';
$string['feedbackwebpage'] = '网页';
$string['firstattempt'] = '第一份答卷';
$string['forceplugins'] = '强制媒体插件';
$string['forceplugins_help'] = '如果启用，兼容 Moodle 的媒体播放器将会播放 avi、mpeg、mpg、mp3、mov 和 wmv 等文件。否则，Moodle 不会修改测验里任何媒体播放器的设置。';
$string['frameheight'] = '框高度';
$string['giveup'] = '放弃';
$string['grademethod'] = '评分方法';
$string['grademethod_help'] = '此设置定义 HotPot 成绩是怎么从答卷分数中计算出来的。

**最高分数**
：成绩将会被设置为此 HotPot 活动的一次答卷可得的最高分数。

**平均分数**
：成绩将会被设置为此 HotPot 活动的答卷的平均分数。

**第一份答卷**
：成绩将会被设置为此 HotPot 活动的第一份答卷的分数。

**最后的答卷**
：成绩将会被设置为此 HotPot 活动的最后的答卷的成绩。';
$string['gradeweighting'] = '成绩加权';
$string['gradeweighting_help'] = '这项 HotPot 活动的成绩将会在 Moodle 成绩册中调整到此分数。';
$string['highestscore'] = '最高分数';
$string['hints'] = '提示';
$string['hotpot:attempt'] = '尝试一项 HotPot 活动并且提交结果';
$string['hotpot:deleteallattempts'] = '删除一项 HotPot 活动里任何用户的答卷';
$string['hotpot:deletemyattempts'] = '删除自己在一项 HotPot 活动里的答卷';
$string['hotpot:ignoretimelimits'] = '忽略一项 HotPot 活动的时间限制';
$string['hotpot:manage'] = '修改一项 HotPot 活动的设置';
$string['hotpotname'] = 'HotPot 活动名称';
$string['hotpot:preview'] = '预览一个 HotPot 活动';
$string['hotpot:reviewallattempts'] = '查看一项 HotPot 活动里任何用户的答卷';
$string['hotpot:reviewmyattempts'] = '查看自己在一项 HotPot 活动里的答卷';
$string['hotpot:view'] = '查看一项 HotPot 活动的入口页面';
$string['ignored'] = '忽略';
$string['inprogress'] = '处理中';
$string['isgreaterthan'] = '大于';
$string['islessthan'] = '小于';
$string['lastaccess'] = '最后的访问';
$string['lastattempt'] = '最后的答题';
$string['lockframe'] = '锁定框';
$string['maxeventlength'] = '单个日历事件的最大天数';
$string['mediafilter_hotpot'] = 'HotPot 媒体过滤器';
$string['mediafilter_moodle'] = 'Moodle 的标准媒体过滤器';
$string['migratingfiles'] = '迁移 Hot Potatoes 测验文件';
$string['missingsourcetype'] = 'HotPot 记录丢失了源类型';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'HotPots';
$string['nameadd'] = '名称';
$string['nameadd_help'] = '名称可以是由教师输入的特定的文本或是自动生成的。

**从源文件里获得**
：名称从源文件中提取。

**使用源文件名**
：使用源文件名作为名称。

**使用源文件路径**
：使用源文件路径作为名称。路径中的任何斜杠将被空格替换。

**特定的文本**
：由教师输入的特定的文本将作为名称。';
$string['nameedit'] = '名称';
$string['nameedit_help'] = '把具体的文字显示给学生';
$string['navigation'] = '导航';
$string['navigation_embed'] = '嵌入的网页';
$string['navigation_frame'] = 'Moodle 导航帧';
$string['navigation_give_up'] = '一个单一的 "放弃" 按钮';
$string['navigation_help'] = '此设置指定了在测验中使用的导航：

**Moodle 导航栏**
：Moodle 导航栏将和测验显示在同一个窗口中并处于页面的顶部

**Moodle 导航框**
：Moodle 导航栏将显示在单独的框中并处于测验的顶部

**嵌入的网页**
：Moodle 导航栏将和 Hot Potatoes 测验一起显示在嵌入窗口中

**原始导航标志**
：测验将会和导航按钮一起显示。如果有的话，会在测验中定义

**单个 "放弃" 按钮**
：测验将会和单个“放弃“一起显示在页面顶部

**无**
：测验将会以没有任何导航标志方式显示。当所有问题已经正确回答，依赖于“显示下一个测验吗？”的设置，Moodle 将会回到课程页面或者显示下一个测验';
$string['navigation_moodle'] = '标准 Moodle 导航栏（顶部和侧边）';
$string['navigation_none'] = '没有';
$string['navigation_original'] = '原始导航标志';
$string['navigation_topbar'] = '仅顶部 Moodle 导航栏（没有侧边栏）';
$string['noactivity'] = '没有活动';
$string['nohotpots'] = '没有发现 HotPot';
$string['nomoreattempts'] = '对不起，您在此活动里没有剩余答题次数了';
$string['noresponses'] = '没有关于找到此问题和回复的特定信息。';
$string['noreview'] = '对不起，您不能查看本测验答卷的详情。';
$string['noreviewafterclose'] = '对不起，本测验已经关闭。您再也不能查看本测验答卷的详情了。';
$string['noreviewbeforeclose'] = '对不起，在 {$a} 前您不能查看本测验答卷的详情';
$string['nosourcefilesettings'] = 'HotPot 记录丢失源文件信息';
$string['notavailable'] = '对不起，此活动当前对您不可用。';
$string['outputformat'] = '输出格式';
$string['outputformat_best'] = '最佳';
$string['outputformat_help'] = '输出格式指定了内容将怎样呈现给学生。

可用的输出格式依赖于源文件的类型。有些类型的源文件只有一种输出格式，然而别的类型的源文件有几中输出格式。

“最佳”设置将会为学生的浏览器使用最佳输出格式显示内容。';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze HP6 HTML：标准';
$string['outputformat_hp_6_jcross_html'] = 'JCross HP6 HTML';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz HP6 HTML';
$string['outputformat_html_xhtml'] = '标准 HTML 文件';
$string['overviewreport'] = '概览';
$string['penalties'] = '惩罚';
$string['percent'] = '百分比';
$string['pluginadministration'] = 'HotPot 管理';
$string['pluginname'] = 'HotPot 模块';
$string['pressoktocontinue'] = '按 “确定” 继续，按 “取消” 停留在当前页面。';
$string['questionshort'] = '{$a}问题';
$string['quizname_help'] = '测验名称的帮助文本';
$string['quizzes'] = '测验';
$string['removegradeitem'] = '删除成绩项';
$string['removegradeitem_help'] = '此活动的成绩项应该移除吗？

**否**
：此活动在 Moodle 成绩册中的成绩将不会移除

**是**
：如果此 HotPot 活动最高成绩或成绩加权设置为零，那么此活动在 Moodle 成绩册中的成绩将会被移除';
$string['responsesreport'] = '回复';
$string['score'] = '分数';
$string['scoresreport'] = '分数';
$string['selectattempts'] = '选择答卷';
$string['showerrormessage'] = 'HotPot 错误：{$a}';
$string['sourcefile'] = '源文件名';
$string['sourcefilenotfound'] = '源文件丢失（或为空）：{$a}';
$string['status'] = '状态';
$string['stopbutton'] = '显示停止按钮';
$string['stopbutton_help'] = '如果此设置启用，一个停止按钮将会插入到测验中。

如果学生点击停止按钮，目前已经有的结果将会被送到 Moodle 并且这次测验答卷的状态将会标记为丢弃。

停止按钮上显示的文字可以是 Moodle 语言包中预设的短语之一，或者教师可以为按钮指定他们想要的文字。';
$string['stopbutton_langpack'] = '来自语言包';
$string['stopbutton_specific'] = '使用特定的文字';
$string['stoptext'] = '停止按钮上的文字';
$string['storedetails'] = '存储 HotPot 测验答卷的原始 XML 详情';
$string['studentfeedback'] = '学生的反馈';
$string['submits'] = '提交';
$string['subplugintype_hotpotattempt'] = '输出格式';
$string['subplugintype_hotpotattempt_plural'] = '输出格式';
$string['subplugintype_hotpotreport'] = '报告';
$string['subplugintype_hotpotreport_plural'] = '报告';
$string['subplugintype_hotpotsource'] = '源文件';
$string['subplugintype_hotpotsource_plural'] = '源文件';
$string['textsourcefile'] = '从源文件获得';
$string['textsourcefilename'] = '使用源文件名';
$string['textsourcefilepath'] = '使用源文件路径';
$string['textsourcequiz'] = '从测验中获得';
$string['textsourcespecific'] = '特殊的文本';
$string['timeclose'] = '可用至';
$string['timedout'] = '超时';
$string['timelimit'] = '时间限制';
$string['timelimitexpired'] = '这次答卷的时间已经超出了限制';
$string['timelimitspecific'] = '使用特定的时间';
$string['timelimitsummary'] = '一次答题的时间限制';
$string['timelimittemplate'] = '使用源/模板文件';
$string['timeopen'] = '开始可用于';
$string['timeopenclose'] = '开始和关闭的时间';
$string['timeopenclose_help'] = '在人们可以访问测验并进行答题时您可以指定时间。在开始以前和关闭以后，测验将不可用。';
$string['title'] = '标题';
$string['unitname_help'] = '单元名称的帮助文字';
$string['updated'] = '已经更新';
$string['usefilters'] = '使用过滤器';
$string['usefilters_help'] = '如果此设置开启，内容在被发送到用户的浏览器以前将会通过 Moodle 的过滤器。';
$string['useglossary'] = '使用词汇表';
$string['useglossary_help'] = '如果此设置启用，内容在被发送到浏览器前会通过 Moodle\'s Glossary Auto-linking 过滤器。

注意此设置会覆盖网站管理设置来开启或禁用 Moodle\'s Glossary Auto-linking 过滤器。';
$string['usemediafilter'] = '使用媒体过滤器';
$string['utilitiesindex'] = 'HotPot 应用程序索引';
$string['viewreports'] = '查看 {$a} 个用户的报告';
$string['views'] = '浏览次数';
$string['weighting'] = '加权';
$string['wrong'] = '错误的';
$string['zeroduration'] = '没有持续时间';
$string['zeroscore'] = '零分';
