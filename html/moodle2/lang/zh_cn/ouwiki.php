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
 * Strings for component 'ouwiki', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   ouwiki
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add'] = '添加';
$string['addannotation'] = '添加注释';
$string['addedbegins'] = '[后面是添加的文本]';
$string['addedends'] = '[添加的文本结束]';
$string['addnewsection'] = '为此页面添加新的小节';
$string['advice_annotate'] = '<p>注解下面的页面，然后点击<strong>保存修改</strong>。</p>
<ul>
<li>点击其中一个注解标记并且输入所需的文本来进行注解。</li>
<li>可以通过移除下面表格里的文本来删除新的和已有的注解。</li>
<li>括号中的数字指向注解。</li>';
$string['advice_edit'] = '<p>编辑下面的页面。</p>
<ul>
<li>通过在双重方括号中输入页面的名称来创建一个指向另一个页面的链接：[[页面名称]]。一旦您保存修改，链接就能工作。</li>
<li>要创建一个新页面，首先要像这样创建一个指向它链接。 {$a}</li>
</ul>';
$string['advice_history'] = '<p>下表显示所有对<a href="{$a}">当前页面</a> 作出的修改。 </p><p>您可以查看所有旧版本，或者查看一个特定的版本中的修改。如果你想比较任何两个版本，选择相应的复选框，并单击“比较选择项”。 </p>';
$string['advice_missingpage'] = '链接到此仍未被创建的页面。';
$string['advice_missingpages'] = '链接到这些仍未被创建的页面。';
$string['advice_viewdeleted'] = '您正在查看已经删除的版本的页面。';
$string['advice_viewold'] = '您正在查看的旧版本的页面。';
$string['advice_wikirecentchanges_changes'] = '<p>下表列出了对此维基里任何页面的所有修改，以最近的修改开始。每个页面的最新版本突出显示。</p>
<p>使用这些链接来查看一个页面在特定的修改后的样子或查看当时的修改。</p>';
$string['advice_wikirecentchanges_changes_nohighlight'] = 'p>下表列出了对此维基里任何页面的所有修改，以最近的修改开始。</p>
<p>使用这些链接来查看一个页面在特定的修改后的样子或查看当时的修改。</p>';
$string['advice_wikirecentchanges_pages'] = '<p>这个表显示了维基的每个页面的添加时间，以最近创建的页面开始。</p>';
$string['ajaxnotenabled'] = '您的个人资料中没有启用 AJAX。';
$string['annotate'] = '注解';
$string['annotatingpage'] = '正在注解网页';
$string['annotationmarker'] = '注解标记';
$string['annotations'] = '注解';
$string['annotationsystem'] = '注解系统';
$string['annotationsystem_help'] = '为有适当权限的用户启用注解标签……

有了这个标签，您可以给维基页面添加内嵌注解（例如，教师评价学生的作业）。';
$string['attachments'] = '附件';
$string['cannotlockpage'] = '该页面无法被锁定，您的更改尚未保存。';
$string['changebutton'] = '更改';
$string['changedby'] = '修改者';
$string['changes'] = '更改';
$string['changesnav'] = '更改';
$string['collapseallannotations'] = '折叠注解';
$string['collapseannotation'] = '折叠注解';
$string['compare'] = '比较';
$string['compareselected'] = '比较选中项';
$string['completionedits'] = '用户必须进行编辑：';
$string['completioneditsgroup'] = '需要编辑';
$string['completioneditshelp'] = '需要编辑才能完成';
$string['completionpages'] = '用户必须创建新页面：';
$string['completionpagesgroup'] = '需要新页面';
$string['completionpageshelp'] = '需要新页面才能完成';
$string['contributions'] = '<strong>{$a->pages}</strong>  新页面 {$a->pagesplural}，<strong>{$a->changes}</strong> 其他修改 {$a->changesplural}。';
$string['contributionsbyuser'] = '用户的贡献';
$string['contributionsgrouplabel'] = '小组';
$string['countdowntext'] = '本维基只允许编辑 {$a} 分钟。在剩余时间（向右）到零以前作出您的修改并点击保存或取消。';
$string['countdownurgent'] = '请现在完成或取消您的编辑。如果您在时间用完前不保存，您的修改将会被自动保存。';
$string['create'] = '创建';
$string['createdbyon'] = '由 {$a->name} 创建于 {$a->date}';
$string['createlinkedwiki'] = '创建一个新页面';
$string['createnewpage'] = '创建新页面';
$string['createpage'] = '创建页面';
$string['csvdownload'] = '以电子表格格式下载（UTF-8 .csv）';
$string['current'] = '当前的';
$string['currentversion'] = '当前版本';
$string['currentversionof'] = '当前版本的';
$string['deletedbegins'] = '[删除的文本]';
$string['deletedends'] = '[删除的文本结束]';
$string['deleteorphanedannotations'] = '删除丢失的注解';
$string['deleteversionerror'] = '删除网页版本时出现错误';
$string['deleteversionerrorversion'] = '不能删除不存在的网页版本';
$string['detail'] = '详情';
$string['diff_nochanges'] = '本次编辑没有对实际文本进行修改，因此下面没有突出显示出差异。可能会有外观上的变化。';
$string['diff_someannotations'] = '本次编辑没有对实际文本进行修改，因此下面没有突出显示出差异，但注解已经被修改。可能也会有外观上的变化。';
$string['displayversion'] = 'OU 维基版本: <strong>{$a}</strong>';
$string['downloadspreadsheet'] = '作为电子表格下载';
$string['duplicatepagetitle'] = '新页面的标题必须不能和已经存在的页面的标题相同。';
$string['editbegin_help'] = '<p>如果您启用此选项，维基进入只读模式，直到给定的日期。在只读模式下，用户可以浏览网页，在它们之间导航，查看浏览历史，并参与讨论，但他们不能编辑页面。 </p>';
$string['editedby'] = '由 {$a} 编辑';
$string['editend_help'] = '如果您启用此选项，此维基从给定的日期起进入只读模式。';
$string['editingpage'] = '正在编辑网页';
$string['editingsection'] = '正在编辑小节：{$a}';
$string['editpage'] = '编辑网页';
$string['editsection'] = '编辑小节';
$string['emptypagetitle'] = '新页面的标题不能为空。';
$string['emptysectiontitle'] = '新小节的标题不能为空。';
$string['endannotation'] = '注解结束';
$string['entirewiki'] = '整个维基';
$string['error_export'] = '导出维基数据时发生错误。';
$string['excelcsvdownload'] = 'Excel 兼容格式的下载（.csv）';
$string['expandallannotations'] = '展开注解';
$string['expandannotation'] = '展开注解';
$string['externaldashboardadd'] = '将维基添加到面板';
$string['externaldashboardremove'] = '将维基从面板移除';
$string['feedalt'] = '订阅到 Atom 源';
$string['feedchange'] = '由 {$a->name} 修改  (<a href=\'{$a->url}\'>查看修改</a>)';
$string['feeddescriptionchanges'] = '列出对本维基进行的所有修改。如果您想每当维基有更改时即时得到更新，请订阅这个源。';
$string['feeddescriptionhistory'] = '列出对此单个维基页面的所有修改。如果您想每当有人编辑此页面时即时得到更新，请订阅这个源。';
$string['feeddescriptionpages'] = '列出此维基的所有新页面。如果您想每当有人创建新页面时即时得到更新，请订阅这个源。';
$string['feeditemdescriptiondate'] = '{$a->main} 于 {$a->date}。';
$string['feeditemdescriptionnodate'] = '{$a->main}。';
$string['feednewpage'] = '由 {$a->name} 创建';
$string['feedsubscribe'] = '您可以订阅这些信息到源：<a href=\'{$a->atom}\'>Atom</a> 或者 <a href=\'{$a->rss}\'>RSS</a>.';
$string['feedtitle'] = '{$a->course} 维基： {$a->name} - {$a->subtitle}';
$string['format_html'] = '在线查看';
$string['format_rtf'] = 'RTF 格式的下载';
$string['format_template'] = '维基模板文件下载';
$string['frompage'] = '来自 {$a}';
$string['frompages'] = '来自 {$a}……';
$string['hideannotationicons'] = '隐藏注解';
$string['jsajaxrequired'] = '此注解页面要求您的浏览器启用 Javascript，并且您的用户个人资料里 AJAX 和 Javascript 设置要被设为 "是：启用高级网页功能“ 。';
$string['jsnotenabled'] = '您的浏览器没有启用 Javascript。';
$string['lastchange'] = '最后更改： {$a->date} / {$a->userlink}';
$string['linkedfrom'] = '链接到此的页面';
$string['linkedfromsingle'] = '链接到此的页面';
$string['lockcancelled'] = '您的编辑锁已经被覆盖，别人正在编辑当前页面。如果您想保留您的更改，请在点击取消前选择并复制他们；然后再次尝试编辑。';
$string['lockediting'] = '锁定 Wiki - 不允许编辑';
$string['lockpage'] = '锁定页面';
$string['missingpages'] = '丢失页面';
$string['modulename'] = 'OU 维基';
$string['modulenameplural'] = 'OU 维基';
$string['mustspecify2'] = '你必须指定两个版本来进行比较。';
$string['newerversion'] = '更新的版本';
$string['newpage'] = '第一个版本';
$string['next'] = '更旧的更改';
$string['nextversion'] = '下一个：{$a}';
$string['noattachments'] = '没有附件';
$string['nochanges'] = '没有作出任何贡献的用户';
$string['nojsbrowser'] = '我们向你道歉，但您正使用一个我们不完全支持的浏览器。';
$string['nojsdisabled'] = '您已经在浏览器设置里禁用了 JavaScript。';
$string['nojswarning'] = '结果是，我们只能为您保持这个页面 {$a->minutes} 分钟。请保证您在 {$a->deadline} （现在是 {$a->now}）前保存了您的更改。否则，别人可能会编辑这个页面，导致您的更改丢失';
$string['nousersingroup'] = '选择的小组没有用户。';
$string['nowikipages'] = '此 Wiki 没有任何页面。';
$string['numedits'] = '{$a} 次编辑';
$string['numwords'] = '词语数: {$a}';
$string['olderversion'] = '更旧的版本';
$string['oldversion'] = '旧的版本';
$string['orphanedannotations'] = '丢失的注解';
$string['ouwiki:addinstance'] = '添加一个新的 OU wiki';
$string['ouwiki:annotate'] = '允许注解';
$string['ouwiki:deletepage'] = '删除 wiki 页面';
$string['ouwiki:edit'] = '编辑 wiki 页面';
$string['ouwiki:lock'] = '允许锁定和解锁页面';
$string['ouwiki:overridelock'] = '覆盖锁定的页面';
$string['ouwiki:view'] = '查看 wiki';
$string['overviewnumentrysince'] = '自上次登录后的新 wiki 条目。';
$string['overviewnumentrysince1'] = '自上次登录后的新 wiki 条目。';
$string['page'] = '页面';
$string['pagedeletedinfo'] = '一些已经删除的版本显示在了下表里。这些只对有版本删除权限的用户可见。普通用户完全看不到它们。';
$string['pagedoesnotexist'] = 'wiki 里还没有这个页面。';
$string['pageedits'] = '页面编辑';
$string['pagelockeddetails'] = '{$a->name} 从 {$a->lockedat} 开始编辑这个页面，在 {$a->seenat} 仍在编辑。在他们完成前您不能编辑它。';
$string['pagelockeddetailsnojs'] = '{$a->name} 从 {$a->lockedat} 开始编辑这个页面。他们还有 {$a->nojs} 要编辑。在他们完成前您不能编辑它。';
$string['pagelockedoverride'] = '您有取消他们编辑和解锁此页面的特殊权限。
如果您这样做，他们输入的任何东西都会丢失！点击覆盖按钮前请仔细想想。';
$string['pagelockedtimeout'] = '他们的编辑时隙结束于 {$a}。';
$string['pagelockedtitle'] = '此页面正在被其他人编辑。';
$string['pagenameisstartpage'] = '页面的名称和起始页相同。请使用不同的页面名称。';
$string['pagenametoolong'] = '页面名称太长。使用较短的页面名称。';
$string['pagescreated'] = '页面已创建';
$string['pluginadministration'] = 'OU 维基管理';
$string['pluginname'] = 'OU 维基';
$string['preview'] = '预览';
$string['previewwarning'] = '下面是您作出但还没保存的修改的预览。 <strong>如果您不保存修改，你的工作将会丢失。</strong>使用页面末尾的按钮来保存。';
$string['previous'] = '新的修改';
$string['recentchanges'] = '最后的编辑';
$string['returntohistory'] = '（ <a href=\'{$a}\'>返回到历史视图</a> 。）';
$string['returntopage'] = '返回维基页面';
$string['returntoview'] = '查看当前页面';
$string['revert'] = '还原';
$string['reverterrorcapability'] = '您没有还原到较早的版本的权限';
$string['reverterrorversion'] = '您不能还原一个不存在的网页版本';
$string['revertversion'] = '还原';
$string['revertversionconfirm'] = '<p>本页面会回到截止 {$a} 时的状态，并丢弃自那以后的所有修改。然而，丢弃的修改仍可以在页面历史中看到。</p><p>您确定您想要还原到页面的这个版本吗？</p>';
$string['savefailtitle'] = '页面无法保存';
$string['savetemplate'] = '保存 wiki 为模板';
$string['search'] = '搜索此 wiki';
$string['seedetails'] = '完整的历史记录';
$string['showannotationicons'] = '显示注解';
$string['showwordcounts'] = '显示字数';
$string['showwordcounts_help'] = '如果开启，那么网页的字数将被计算出来并显示在页面主要内空的底部。';
$string['startpage'] = '起始页';
$string['startpagedoesnotexist'] = '此维基的起始页还没有被创建。';
$string['subwikis_single'] = '课程单独的 wiki';
$string['summary'] = '摘要';
$string['system'] = '系统';
$string['tab_annotate'] = '注解';
$string['tab_discuss'] = '讨论';
$string['tab_edit'] = '编辑';
$string['tab_history'] = '历史';
$string['tab_index_alpha'] = '按英文字母顺序';
$string['tab_index_changes'] = '所有的改动';
$string['tab_index_pages'] = '新的页面';
$string['tab_index_tree'] = '结构';
$string['tab_view'] = '查看';
$string['template'] = '模板';
$string['thispageislocked'] = '此 wiki 页面已经锁定并且不能进行编辑。';
$string['timelocked_after'] = '此 wiki 当前已经锁定并且再不能进行编辑。';
$string['timelocked_before'] = '此 wiki 当前已经锁定。它从 {$a} 开始可以编辑。';
$string['timeout'] = '允许的编辑的时间';
$string['timeout_none'] = '无超时';
$string['tryagain'] = '再试一次';
$string['typeinpagename'] = '这里输入页面名称';
$string['typeinsectionname'] = '这里输入小节标题';
$string['undelete'] = '取消删除';
$string['unlockpage'] = '解锁页面';
$string['userdetails'] = '{$a} 的详细信息';
$string['usergrade'] = '用户成绩';
$string['userparticipation'] = '用户参与';
$string['viewdeletedversionerrorcapability'] = '查看页面版本出错';
$string['viewparticipationerrror'] = '不能查看用户的参与。';
$string['viewwikichanges'] = '{$a} 的改动';
$string['viewwikistartpage'] = '查看 {$a}';
$string['wikifor'] = '查看 wiki：';
$string['wikifullchanges'] = '查看完整的改动列表';
$string['wikirecentchanges'] = 'wiki 改动';
$string['wikirecentchanges_from'] = 'wiki 改动（页面 {$a}）';
$string['words'] = '词语';
$string['wordsadded'] = '添加的词语';
$string['wordsdeleted'] = '删除的词语';
$string['wouldyouliketocreate'] = '您想创建它吗？';
