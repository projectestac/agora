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
 * Strings for component 'local_amos', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p>AMOS是Automated Manipulation Of Strings（字符串自动处理）的缩写。它是Moodle字符串及其历史的中心容器。它跟踪Moodle代码中的英文字符串变化，收集翻译，处理日常翻译任务和生成由Moodle服务器分发的语言包。</p>
<p>参考<a href="http://docs.moodle.org/en/AMOS">AMOS文档</a>了解更多。</p>';
$string['amos'] = 'AMOS — Moodle翻译工具';
$string['amos:commit'] = '将暂存的字符串提交到主容器';
$string['amos:execute'] = '执行给定的AMOS脚本';
$string['amos:importfile'] = '从上传的文件导入字符串';
$string['amos:manage'] = '管理AMOS入口';
$string['amos:stage'] = '使用AMOS翻译工具并暂存这些字符串';
$string['amos:stash'] = '将当前暂存的字符串永久保存到储藏室';
$string['amos:usegoogle'] = '使用 Google 翻译服务';
$string['commitbutton'] = '提交并清除所有暂存';
$string['commitbutton2'] = '提交并保留暂存';
$string['commitmessage'] = '提交信息';
$string['commitstage'] = '提交暂存的字符串';
$string['commitstage_help'] = '永久保存AMOS容器中所有暂存的字符串。暂存区在提交前会被自动清理和与最新翻译同步。只有已提交的字符串被保存。也就是说，只有背景是绿色的翻译会被保存。提交后，暂存区会被清空。';
$string['committableall'] = '所有语言';
$string['committablenone'] = '没有可提交的语言——请联系AMOS管理员';
$string['componentsall'] = '全部';
$string['componentsnone'] = '无';
$string['componentsstandard'] = '标准';
$string['confirmaction'] = '此项操作不能被撤销。您确定一定以及肯定吗？';
$string['contribaccept'] = '接受';
$string['contribactions'] = '操作贡献的翻译';
$string['contribactions_help'] = '取决于您的权限和贡献翻译工作流程，您可以使用下面的部分动作：

* 应用 - 将贡献的翻译拷贝到您的暂存区，不修改贡献记录
* 分配给我 - 将您自己设为此贡献的责任人，由您负责评估和集成
* 重新分配 - 删除此贡献的责任人
* 开始评估 - 分配此新贡献给您自己，把它的状态设为”评估中“，并拷贝提交的翻译到您的暂存区
* 接受 - 标记此贡献为已接受
* 拒收 - 标记此贡献为已拒收。请在评论中说明原因。

贡献人会收到所有状态变化的通知邮件。';
$string['contribapply'] = '应用';
$string['contribassignee'] = '责任人';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = '分配给我';
$string['contribauthor'] = '作者';
$string['contribclosedno'] = '隐藏已处理的贡献';
$string['contribclosedyes'] = '显示已处理的贡献';
$string['contribcomponents'] = '组件';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = '没有收到任何贡献';
$string['contribincomingsome'] = '收到贡献（{$a}）';
$string['contriblanguage'] = '语言';
$string['contribreject'] = '拒收';
$string['contribresign'] = '重新分配';
$string['contribstaged'] = '暂存的{$a->author}的贡献 <a href="contrib.php?id={$a->id}">#{$a->id}</a>';
$string['contribstagedinfo'] = '暂存的贡献';
$string['contribstagedinfo_help'] = '暂存区包含由社区成员贡献的字符串。语言包维护人应评估它们，并设置它们的状态为“接受”（如果提交了）或“拒收”（如果出于某些原因，他们不能被包含在官方语言包中）。';
$string['contribstartreview'] = '开始评估';
$string['contribstatus'] = '状态';
$string['contribstatus0'] = '新的';
$string['contribstatus10'] = '评估中';
$string['contribstatus20'] = '拒收';
$string['contribstatus30'] = '接受';
$string['contribstatus_help'] = '贡献翻译工作流程包含下面的状态：

* 新的 - 此贡献已经提交，但还没被评估
* 评估中 - 此贡献已经分配给一名语言包维护人，并放入它的暂存区供评估
* 拒收 - 语言包维护人已拒收此贡献，并可能在评论中做了解释
* 接受 - 语言包维护人已经接受此贡献';
$string['contribstrings'] = '字符串';
$string['contribstringseq'] = '{$a->orig}个新的';
$string['contribstringsnone'] = '{$a->orig}（语言包中都已经翻译过了）';
$string['contribstringssome'] = '{$a->orig}（语言包中已经翻译了{$a->same}个）';
$string['contribsubject'] = '标题';
$string['contribsubmittednone'] = '没有已提交的贡献';
$string['contribsubmittedsome'] = '您的贡献（{$a}）';
$string['contribtimemodified'] = '修改于';
$string['contributions'] = '贡献';
$string['diff'] = '比较';
$string['diffaction'] = '如果检测到差异';
$string['diffaction1'] = '将两种翻译暂存在各自的分支';
$string['diffaction2'] = '将最新的翻译暂存在所有分支';
$string['diffmode'] = '放入暂存区，如果符合条件';
$string['diffmode1'] = '英文字符已变但翻译字符串没变';
$string['diffmode2'] = '英文字符没变但翻译字符串已变';
$string['diffmode3'] = '英文或翻译字符串已变（但没都变）';
$string['diffmode4'] = '英文和翻译字符串都变了';
$string['diffprogress'] = '比较所选的分支';
$string['diffprogressdone'] = '共找到{$a}个不同';
$string['diffstaged'] = '差异';
$string['diffstrings'] = '比较两个分支中字符串的不同';
$string['diffstrings_help'] = '比较两个分支中的所有字符串。如果发现不同，两个版本都会被放入暂存区。您可以使用“编辑暂存的字符串”功能评估和修订必要的改变。';
$string['diffversions'] = '版本';
$string['emailacceptbody'] = '语言包维护人{$a->assignee}已经接受了您贡献的翻译#{$a->id} {$a->subject}。';
$string['emailacceptsubject'] = '[AMOS贡献]接受';
$string['emailcontributionbody'] = '用户{$a->author}提交了新翻译：#{$a->id} {$a->subject}。

访问 {$a->url} 了解更多细节。';
$string['emailcontributionsubject'] = '[AMOS贡献]新翻译已提交';
$string['emailrejectbody'] = '语言包维护人{$a->assignee}已经拒收了您贡献的翻译#{$a->id} {$a->subject}。

访问{$a->url}了解更多细节。';
$string['emailrejectsubject'] = '[AMOS贡献]拒收';
$string['emailreviewbody'] = '语言包维护人{$a->assignee}已经开始评估您贡献的翻译#{$a->id} {$a->subject}。

访问{$a->url}了解更多细节。';
$string['emailreviewsubject'] = '[AMOS贡献]已开始评估';
$string['err_exception'] = '错误：{$a}';
$string['err_invalidlangcode'] = '无效的语言代码';
$string['err_parser'] = '解析错误：{$a}';
$string['filtercmp'] = '组件';
$string['filtercmp_desc'] = '显示这些组件的字符串';
$string['filterlng'] = '语言';
$string['filterlng_desc'] = '显示这些语言的翻译';
$string['filtermis'] = '杂项';
$string['filtermis_desc'] = '字符串显示的其他条件';
$string['filtermisfglo'] = '只含加灰的字符串';
$string['filtermisfhlp'] = '只含帮助字符串';
$string['filtermisfmis'] = '只含未翻译或未更新的字符串';
$string['filtermisfstg'] = '只含暂存的字符串';
$string['filtermisfwog'] = '不含加灰的字符串';
$string['filtersid'] = '字符串标识符';
$string['filtersid_desc'] = '字符串数组的下标';
$string['filtersidpartial'] = '部分匹配';
$string['filtertxt'] = '子字符串';
$string['filtertxtcasesensitive'] = '大小写敏感';
$string['filtertxt_desc'] = '字符串必须包含给定文本';
$string['filtertxtregex'] = '正则表达式';
$string['filterver'] = '版本';
$string['filterver_desc'] = '显示这些Moodle版本的字符串';
$string['found'] = '找到：{$a->found} &nbsp;&nbsp;&nbsp; 未翻译：{$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = '找到字符串的数量';
$string['foundinfo_help'] = '显示翻译表的总行数，未翻译数和当前页的未翻译数';
$string['gotofirst'] = '回到第一页';
$string['gotoprevious'] = '回到上一页';
$string['greylisted'] = '加灰的字符串';
$string['greylisted_help'] = '因为历史原因，Moodle语言包可能包含一些不再使用但还未被删除的字符串。这些字符串就是”加灰“的。一旦确认这些字符串不再使用，就会从语言包删除。

如果您发现某个加灰的字符串还在被Moodle使用，请在本站Translating Moodle课程中的论坛发帖通知。通常，您可以节约您宝贵的时间，只翻译还在被Moodle使用的字符串而忽略加灰的。';
$string['greylistedwarning'] = '字符串被加灰';
$string['importfile'] = '从文件导入已翻译的字符串';
$string['importfile_help'] = '如果您是离线翻译的字符串，可以在这里把它们放入暂存区。

* 文件必须是合法的Moodle PHP字符串定义文件。Moodle的”/lang/en“目录下的文件都是例子。
* 文件名必须是字符串所属的组件的英文名（例如”moodle.php“、”assignment.php“或”enrol_manual.php“）。

文件中所有字符串都会按照所选的版本和语言放入暂存区。';
$string['language'] = '语言';
$string['languages'] = '语言';
$string['languagesall'] = '全部';
$string['languagesnone'] = '无';
$string['log'] = '日志';
$string['logfilterbranch'] = '版本';
$string['logfiltercommithash'] = 'git哈希值';
$string['logfiltercommitmsg'] = '提交信息包含';
$string['logfiltercommits'] = '提交过滤器';
$string['logfiltercommittedafter'] = '提交晚于';
$string['logfiltercommittedbefore'] = '提交早于';
$string['logfiltercomponent'] = '组件';
$string['logfilterlang'] = '语言';
$string['logfiltershow'] = '显示过滤后的提交和字符串';
$string['logfiltersource'] = '源';
$string['logfiltersourceamos'] = 'amos（基于web的翻译器）';
$string['logfiltersourcebot'] = '机器人（用脚本执行的批量操作）';
$string['logfiltersourcecommitscript'] = 'commitscript（提交信息中有AMOScript）';
$string['logfiltersourcefixdrift'] = '修正漂移（已修正的AMOS-git漂移）';
$string['logfiltersourcegit'] = 'git（Moodle源代码和1.x包的git镜像）';
$string['logfiltersourcerevclean'] = 'revclean（反向清理过程）';
$string['logfilterstringid'] = '字符串标识符';
$string['logfilterstrings'] = '字符串过滤器';
$string['logfilterusergrp'] = '提交人';
$string['logfilterusergrpor'] = '或';
$string['maintainers'] = '维护人';
$string['markuptodate'] = '此翻译是与时俱进的';
$string['markuptodate_help'] = 'AMOS检测到此字符串可能有些旧了，因为在它被翻译后，英文的版本被修改过。重新评估这条翻译。如果您认为它仍是正确的，点这个选择框。否则，请编辑它。';
$string['merge'] = '合并';
$string['mergestrings'] = '从其它分支合并字符串';
$string['mergestrings_help'] = '这会将所有在目的分支存在且未翻译的字符串从源分支中检出，并放入暂存区。您可以使用这个工具将已经翻译的字符串拷贝到所有其他版本的语言包中。只有语言包维护人可以使用这个工具。';
$string['newlanguage'] = '新语言';
$string['nodiffs'] = '未发现不同';
$string['nofiletoimport'] = '请提供一个供导入的文件。';
$string['nologsfound'] = '没有符合条件的字符串，请修改过滤条件';
$string['nostringsfound'] = '没有符合条件的字符串';
$string['nostringsfoundonpage'] = '在第{$a}页没有符合条件的字符串';
$string['nostringtoimport'] = '文件里没有合法的字符串。请确认文件名和文件格式正确。';
$string['nothingtomerge'] = '源分支中没有任何在目的分支不存在的字符串。没有可合并的。';
$string['nothingtostage'] = '此操作未返回任何可以暂存的字符串。';
$string['novalidzip'] = '无法解压此ZIP文件。';
$string['numofcommitsabovelimit'] = '经提交过滤器过滤，找到{$a->found}次提交，使用{$a->limit}个最近的';
$string['numofcommitsunderlimit'] = '经提交过滤器过滤，找到{$a->found}次提交';
$string['numofmatchingstrings'] = '其中，{$a->commits}次提交的{$a->strings}次修改符合字符串过滤器';
$string['outdatednotcommitted'] = '旧字符串';
$string['outdatednotcommitted_help'] = 'AMOS检测到此字符串可能有些旧了，因为在上次翻译后，它的英文版有过修改。请重新评估此翻译。';
$string['outdatednotcommittedwarning'] = '旧的';
$string['ownstashactions'] = '储藏室动作';
$string['ownstashactions_help'] = '* 应用 - 把已翻译的字符串从储藏室拷贝到暂存区，但不修改储藏室。如果暂存区里已经有该字符串，会被储藏室里的覆盖。
* 弹出 - 把已翻译的字符串从储藏室移动到暂存区，并从储藏室删除（相当于应用+删除）
* 删除 - 删除放到储藏室的字符串。
* 提交 - 打开一个提交储藏室给官方语言维护人的表单，这样他们就可以将您的贡献放入官方语言包。';
$string['ownstashes'] = '您的储藏室';
$string['ownstashes_help'] = '这是您所有储藏室的列表。';
$string['ownstashesnone'] = '没建任何自己的储藏室';
$string['permalink'] = '永久链接';
$string['placeholder'] = '占位符';
$string['placeholder_help'] = '占位符是字符串中一些特殊语句，类似”{$a}“或”{$a->something}“。在字符串最终被显示时，它们会被替换为另一个值。

一定要将它们原封不动地从原始字符串里拷贝。不要翻译它们！';
$string['placeholderwarning'] = '有占位符的字符串';
$string['pluginclasscore'] = '核心子系统';
$string['pluginclassnonstandard'] = '非标准插件';
$string['pluginclassstandard'] = '标准插件';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = '由 {$a->author} 贡献的翻译#{$a->id}';
$string['presetcommitmessage2'] = '从{$a->source}分支合并缺失的字符串到{$a->target}分支';
$string['presetcommitmessage3'] = '修正{$a->versiona}和{$a->versionb}之间的差异';
$string['privileges'] = '您的特权';
$string['privilegesnone'] = '对公共信息，你有只读权限。';
$string['propagate'] = '传送翻译';
$string['propagatednone'] = '没有可传送的翻译';
$string['propagatedsome'] = '传送了{$a}条暂存的翻译';
$string['propagate_help'] = '暂存的翻译可以被传送到指定的分支。AMOS会遍历所有暂存的翻译，并尝试将它们应用到每个指定的目标分支。如下情况不能传送：

* 源分支和目标分支的英文原文不同
* 字符串被暂存多次，且每次的翻译不同';
$string['propagaterun'] = '传送';
$string['requestactions'] = '动作';
$string['requestactions_help'] = '* 申请 - 从推送请求中复制已翻译的字符串到自己的暂存区。如果这个字符串已经在暂存区中了，就覆盖重写它。
* 隐藏 - 屏蔽这个推送请求使得您不会再看到它了。';
$string['savefilter'] = '保存过滤器设置';
$string['script'] = 'AMOS脚本';
$string['scriptexecute'] = '执行并暂存结果';
$string['script_help'] = 'AMOS脚本是针对字符串容器的一系列指令。';
$string['sourceversion'] = '源版本';
$string['stage'] = '暂存区';
$string['stageactions'] = '暂存区动作';
$string['stageactions_help'] = '* 编辑已暂存字符串 - 修改翻译器过滤器的设置，只显示已暂存的翻译。
* 清理不可提交的字符串 - 从暂存区删除所有不允许提交的翻译。在提交前，暂存区会被自动清理。
* 重新对齐 - 从暂存区删除所有没修改的翻译，或者比容器中的当前翻译旧的翻译。在提交前，暂存区会被自动对齐。
* 清空暂存区 - 清空暂存区后，其内的所有翻译都再也找不回来了。
';
$string['stageedit'] = '编辑已暂存的字符串';
$string['stagelang'] = '语言';
$string['stageoriginal'] = '原文';
$string['stageprune'] = '清理不可提交的';
$string['stagerebase'] = '重新对齐';
$string['stagestring'] = '字符串';
$string['stagestringsnocommit'] = '暂存区有{$a->staged}个字符串';
$string['stagestringsnone'] = '暂存区没有字符串';
$string['stagestringssome'] = '暂存区共有{$a->staged}个字符串，其中{$a->committable}个可以提交';
$string['stagesubmit'] = '提交给维护人';
$string['stagetranslation'] = '翻译';
$string['stagetranslation_help'] = '显示要提交的已暂存的翻译。单元格背景色的含义：

* 绿色 - 您新翻译了该字符串。您可以提交这条翻译。
* 黄色 - 您修改了该字符串的翻译。您可以提交这条翻译。
* 蓝色 - 您修改过或新翻译了该字符串，但您不能将它提交到对应的语言包。
* 无色 - 暂存的翻译和当前翻译是完全一样的，所以不会被提交。';
$string['stageunstageall'] = '清空暂存区';
$string['stashactions'] = '储藏室动作';
$string['stashactions_help'] = '储藏室是当前暂存区的一个快照。可以将储藏室提交给官方语言包维护人，由它将其放入语言包。';
$string['stashapply'] = '应用';
$string['stashautosave'] = '自动保存的备份储藏室';
$string['stashautosave_help'] = '这个储藏室包含您的暂存区最新的快照。在某些情况下，比如不小心清空了暂存区，可以用它做备份。点击”应用“可以拷贝储藏室中的所有字符串到暂存区中（如果字符串已在暂存区中，会被覆盖）。';
$string['stashcomponents'] = '<span>组件：</span> {$a}';
$string['stashdrop'] = '丢弃';
$string['stashes'] = '储藏室';
$string['stashlanguages'] = '<span>语言：</span> {$a}';
$string['stashpop'] = '弹出';
$string['stashpush'] = '把暂存区中所有字符串放入一个新的储藏室';
$string['stashstrings'] = '<span>字符串个数：</span> {$a}';
$string['stashsubmit'] = '提交给维护人';
$string['stashsubmitdetails'] = '提交细节';
$string['stashsubmitmessage'] = '消息';
$string['stashsubmitsubject'] = '主题';
$string['stashtitle'] = '储藏室标题';
$string['stashtitledefault'] = '半成品 - {$a->time}';
$string['stringhistory'] = '历史';
$string['strings'] = '字符串数';
$string['submitting'] = '提交一个贡献';
$string['submitting_help'] = '这会将翻译的字符串发送给官方语言维护人。他们会将您的贡献放入暂存区，评估，并最后提交。请留下一些信息，描述一下您的翻译和您为什么希望您的贡献被接受。';
$string['targetversion'] = '目标版本';
$string['translatorlang'] = '语言';
$string['translatorlang_help'] = '显示字符串翻译到的语言的代码。点击<strong>+-</strong>链接显示此字符串的历史时间线。';
$string['translatororiginal'] = '原文';
$string['translatororiginal_help'] = '显示字符串的英文原文。它的下面有一个用Google翻译器自动翻译的链接（如果支持此语言且您的浏览器启用了Javascript的话）。此外，您还会看到一些其它信息，比如这个字符串是否包含占位符。';
$string['translatorstring'] = '字符串';
$string['translatorstring_help'] = '显示Moodle分支（版本），字符串标识符和所属的组件。';
$string['translatortool'] = '翻译器';
$string['translatortranslation'] = '翻译';
$string['translatortranslation_help'] = '点击单元格，立即变为输入框。输入翻译并点击单元格以外的地方，就将翻译放入了暂存区。单元格的背景色含义：

* 绿色 - 此字符串已经被翻译过了。您可以进行最终修改。
* 黄色 - 此字符串可能有些旧了。在上次翻译后，英文版可能有修改。
* 红色 - 此字符串还未被翻译。
* 蓝色 - 您已经修改了翻译，它现在被暂存了。
* 灰色 - 不能用 AMOS 翻译此字符串。例如 Moodle 1.9 的字符串就只能用传统的 CVS 编辑。

语言包维护人在他们可以提交的单元格右上角可以看到一个红色小标记。';
$string['typecontrib'] = '非标准插件';
$string['typecore'] = '核心子系统';
$string['typestandard'] = '标准插件';
$string['unstage'] = '删除暂存';
$string['unstageconfirm'] = '真的？';
$string['unstaging'] = '删除中';
$string['version'] = '版本';
