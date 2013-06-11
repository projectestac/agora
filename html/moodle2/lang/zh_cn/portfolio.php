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
 * Strings for component 'portfolio', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = '解决活动的导出';
$string['activeportfolios'] = '可选的云存储';
$string['addalltoportfolio'] = '全部导出到云存储';
$string['addnewportfolio'] = '添加一个新的云存储';
$string['addtoportfolio'] = '导出到云存储';
$string['alreadyalt'] = '已经在导出——请点击此处解决传送';
$string['alreadyexporting'] = '您此次会话已经有一个活动的云存储导出。在继续之前，您必须完成此导出，或者放弃它。您要继续导出吗？（“否”会放弃它）';
$string['availableformats'] = '可选的导出格式';
$string['callbackclassinvalid'] = '给定的回调类无效，或它不是继承自portfolio_caller';
$string['callercouldnotpackage'] = '导出前进行数据打包时发生错误：原始错误是{$a}';
$string['cannotsetvisible'] = '无法设为可见 - 因为配置错误，此插件被完全禁用';
$string['commonportfoliosettings'] = '通用云存储设置';
$string['commonsettingsdesc'] = '<p>一次传送要花费的时间被视作“适中”还是“大量”决定了用户是否可以等待传送结束。</p><p>小于“适度”阈值的文件会被立刻传送，不会询问用户。而“中度”和“大量”的传送会先给用户选项，并警告他们这可能会消耗一些时间。</p><p>另外，某些云存储插件会完全忽略此选项，强制所有传送必须排队。</p>';
$string['configexport'] = '配置导出的数据';
$string['configplugin'] = '配置云存储插件';
$string['configure'] = '配置';
$string['confirmcancel'] = '您确定要放弃本次导出？';
$string['confirmexport'] = '请确认本次导出';
$string['confirmsummary'] = '您的导出概要';
$string['continuetoportfolio'] = '访问您的云存储';
$string['deleteportfolio'] = '删除云存储实例';
$string['destination'] = '目的地';
$string['disabled'] = '抱歉，但是本站没有启用云存储导出功能';
$string['disabledinstance'] = '已禁用';
$string['displayarea'] = '导出区域';
$string['displayexpiry'] = '传送过期时间';
$string['displayinfo'] = '导出信息';
$string['dontwait'] = '不等';
$string['enabled'] = '启用云存储';
$string['enableddesc'] = '启用后，管理员可以配置供用户导出内容的远程系统';
$string['err_uniquename'] = '每个插件的云存储名必须唯一';
$string['exportalreadyfinished'] = '云存储导出成功！';
$string['exportalreadyfinisheddesc'] = '云存储导出结束！';
$string['exportcomplete'] = '云存储导出成功！';
$string['exportedpreviously'] = '以前的导出';
$string['exportexceptionnoexporter'] = '活动会话抛出 portfolio_export_exception，但是没有导出人对象';
$string['exportexpired'] = '已过期的云存储导出';
$string['exportexpireddesc'] = '您曾反复尝试导出某些信息，或者启动一个空的导出。正确的操作是，回退到原始位置并重新开始。发生此种情况一般是因为在导出结束后，您按了返回按钮，或者收藏了一个不正确的url。';
$string['exporting'] = '正在向云存储导出';
$string['exportingcontentfrom'] = '正在从 {$a} 导出内容';
$string['exportingcontentto'] = '正在向 {$a} 导出内容';
$string['exportqueued'] = '已成功将云存储导出放入传送队列';
$string['exportqueuedforced'] = '已成功将云存储导出放入传送队列（远程系统要求必须将传送排队）';
$string['failedtopackage'] = '找不到要打包的文件';
$string['failedtosendpackage'] = '将您的数据发往您选择的云存储系统时出错：原始错误信息是{$a}';
$string['filedenied'] = '文件访问被拒绝';
$string['filenotfound'] = '找不到文件';
$string['fileoutputnotsupported'] = '此格式不支持重写文件输出';
$string['format_document'] = '文档';
$string['format_file'] = '文件';
$string['format_image'] = '图片';
$string['format_leap2a'] = 'Leap2A 公文包格式';
$string['format_mbkp'] = 'Moodle备份格式';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = '幻灯片';
$string['format_richhtml'] = '带附件的HTML';
$string['format_spreadsheet'] = '电子表格';
$string['format_text'] = '纯文本';
$string['format_video'] = '视频';
$string['hidden'] = '隐藏';
$string['highdbsizethreshold'] = '大量传送数据大小';
$string['highdbsizethresholddesc'] = '数据库记录数超过多少将被认为会使用大量传送时间';
$string['highfilesizethreshold'] = '大量传送文件大小';
$string['highfilesizethresholddesc'] = '大小超过此阈值的文件将被认为会使用大量传送时间';
$string['insanebody'] = '您好！因为您是{$a->sitename}的管理员，所以您会收到此信息。

因为配置错误，一些云存储插件被自动禁用。这意味着用户现在不能向这些云存储导出数据。

被禁用的云存储插件有：

{$a->textlist}

请即刻访问 {$a->fixurl} ，马上修正此问题。';
$string['insanebodyhtml'] = '<p>您好！因为您是{$a->sitename}的管理员，所以您会收到此信息。</p>
<p>因为配置错误，一些云存储插件被自动禁用。这意味着用户现在不能向这些云存储导出数据。</p>
<p>被禁用的云存储插件有：</p>
{$a->htmllist}
<p>请即刻访问<a href="{$a->fixurl}">云存储配置页</a> ，马上修正此问题。</p>';
$string['insanebodysmall'] = '您好！因为您是{$a->sitename}的管理员，所以您会收到此信息。因为配置错误，一些云存储插件被自动禁用。这意味着用户现在不能向这些云存储导出数据。请即刻访问 {$a->fixurl} ，马上修正此问题。';
$string['insanesubject'] = '某些云存储实例已被自动禁用';
$string['instancedeleted'] = '成功删除云存储';
$string['instanceismisconfigured'] = '云存储实例配置不正确，跳过。错误是：{$a}';
$string['instancenotdelete'] = '删除云存储失败';
$string['instancenotsaved'] = '保存云存储出错';
$string['instancesaved'] = '云存储成功保存';
$string['invalidaddformat'] = '传递给 portfolio_add_button 的添加格式无效。（{$a}）必须是 PORTFOLIO_ADD_XXX 中的一个';
$string['invalidbuttonproperty'] = '找不到 portfolio_button 的属性（{$a}）';
$string['invalidconfigproperty'] = '找不到配置属性（{$a->class} 的 {$a->property}）';
$string['invalidexportproperty'] = '找不到导出配置属性（{$a->class} 的 {$a->property}）';
$string['invalidfileareaargs'] = '传递给 set_file_and_format_data  的文件区域参数无效 — 必须包含 contextid、component、fileare 和 itemid';
$string['invalidformat'] = '正在导出无效格式，{$a}';
$string['invalidinstance'] = '找不到该云存储实例';
$string['invalidpreparepackagefile'] = '调用 prepare_package_file 无效 — 必须设置 single 或 multifiles';
$string['invalidproperty'] = '找不到属性（{$a->class} 的 {$a->property}）';
$string['invalidsha1file'] = '调用 get_sha1_file 无效 — 必须设置 single 或 multifiles';
$string['invalidtempid'] = '无效的导出 id。可能它已过期';
$string['invaliduserproperty'] = '找不到用户配置属性（{$a->class} 的 {$a->property}）';
$string['leap2a_emptyselection'] = '未算做必填的值';
$string['leap2a_entryalreadyexists'] = '您尝试添加的 id 为 {$a} 的 Leap2A 项在种子中已存在';
$string['leap2a_feedtitle'] = '为 {$a} 从 Moodle 导出 Leap2A';
$string['leap2a_filecontent'] = '试图设置 Leap2A 项的内容到文件，而不是使用文件子类';
$string['leap2a_invalidentryfield'] = '您试图设置一个不存在的项字段（{$a}），或者您不能直接设置';
$string['leap2a_invalidentryid'] = '您试图用一个不存在的 id 访问一个项（{$a}）';
$string['leap2a_missingfield'] = '缺少必须的 Leap2A 项字段 {$a}';
$string['leap2a_nonexistantlink'] = '一个 Leap2A 项（{$a->from}）试图用 rel {$a->rel} 链接到一个不存在的项（{$a->to}）';
$string['leap2a_overwritingselection'] = '在 make_selection 中覆盖项（{$a}）的原始类型为选择类型';
$string['leap2a_selflink'] = '一个 Leap2A 项（{$a->id}）试图用 rel {$a->rel} 链接自己';
$string['logs'] = '传送日志';
$string['logsummary'] = '已成功的传送';
$string['manageportfolios'] = '管理云存储';
$string['manageyourportfolios'] = '管理您的云存储';
$string['mimecheckfail'] = '云存储插件 {$a->plugin} 不支持文档类型 {$a->mimetype}';
$string['missingcallbackarg'] = '缺少给类 {$a->class} 的回调参数 {$a->arg}';
$string['moderatedbsizethreshold'] = '适中传送数据大小';
$string['moderatedbsizethresholddesc'] = '个数超过此阈值的数据库记录将被认为会使用适中传送时间';
$string['moderatefilesizethreshold'] = '适中传送文件大小';
$string['moderatefilesizethresholddesc'] = '大小超过此阈值的文件将被认为会使用适中传送时间';
$string['multipleinstancesdisallowed'] = '试图用不支持多实例的插件创建多个实例（{$a}）';
$string['mustsetcallbackoptions'] = '您必须在 portfolio_add_button 的构造器或使用 set_callback_options 方法设置回调选项';
$string['noavailableplugins'] = '抱歉，没有您可用的云存储，无法导出';
$string['nocallbackclass'] = '找不到可用的回调类（{$a}）';
$string['nocallbackfile'] = '你正试图从中导出的模块有些问题——找不到请求的文件（{$a}）';
$string['noclassbeforeformats'] = '您在调用 portfolio_button 的 set_formats 之前必须设置回调类';
$string['nocommonformats'] = '调用者 {$a->location} 和可用的云存储插件之间没有共同支持的格式（调用者支持{$a->formates}）';
$string['noinstanceyet'] = '未被选择';
$string['nologs'] = '没有可显示的日志！';
$string['nomultipleexports'] = '抱歉，目标云存储（{$a->plugin}）不支持同时进行多个导出。请<a href="{$a->link}">先完成当前的</a>再重新尝试';
$string['nonprimative'] = '传递到 portfolio_add_button 的回调参数不是原始值。拒绝继续。参数的 key 是 {$a->key}，值是 {$a->value}';
$string['nopermissions'] = '对不起，你在这个区域里没有导出文件的权限';
$string['notexportable'] = '抱歉，您要导出的内容类型不可导出';
$string['notimplemented'] = '抱歉，您要导出的内容的格式还未实现（{$a}）';
$string['notyetselected'] = '还未选择';
$string['notyours'] = '您正试图继续一个不属于您的云存储导出！';
$string['nouploaddirectory'] = '不能创建用来打包数据的临时目录';
$string['off'] = '启用但隐藏';
$string['on'] = '启用且可见';
$string['plugin'] = 'portfolio插件';
$string['plugincouldnotpackage'] = '为导出而打包您的数据时出错：原始错误是{$a}';
$string['pluginismisconfigured'] = '云存储插件配置错误，跳过。错误是：{$a}';
$string['portfolio'] = '公文包';
$string['portfolios'] = '云存储';
$string['queuesummary'] = '当前传送队列';
$string['returntowhereyouwere'] = '回到之前页面';
$string['save'] = '保存';
$string['selectedformat'] = '选择导出格式';
$string['selectedwait'] = '等待吗？';
$string['selectplugin'] = '选择目标';
$string['singleinstancenomultiallowed'] = '只有一个可用的云存储插件实例，它不支持每次会话多次导出，并且已经有一个处于活动状态的导出正在该插件的会话中！';
$string['somepluginsdisabled'] = '有些云存储插件已完全禁用，因为它们配置错误或依赖于别的什么：';
$string['sure'] = '您确信要删除“{$a}”吗？此操作不可逆。';
$string['thirdpartyexception'] = '云存储导出时抛出了一个第三方异常（{$a}）。已捕获并重新抛出，但这个一定要修复';
$string['transfertime'] = '传送时间';
$string['unknownplugin'] = '未知（可能管理员已删除）';
$string['wait'] = '等';
$string['wanttowait_high'] = '不建议您一直等到传送结束，但是如果您确信且明白这意味着什么，您可以等。';
$string['wanttowait_moderate'] = '您想等待传送结束吗？这可能会用几分钟时间';
