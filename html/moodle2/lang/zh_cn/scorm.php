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
 * Strings for component 'scorm', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = '激活';
$string['activityloading'] = '您将会被自动转入到活动中，该活动位于';
$string['activitypleasewait'] = '活动载入中，请稍候...';
$string['adminsettings'] = '管理的设置';
$string['advanced'] = '参数';
$string['aicchacpkeepsessiondata'] = 'AICC HACP 会话数据';
$string['aicchacptimeout'] = 'AICC HACP 超时';
$string['allowapidebug'] = '激活 API 调试与跟踪（用 apidebugmask 设置捕获掩码）';
$string['allowtypeaicchacp'] = '打开外部 AICC HACP';
$string['allowtypeexternal'] = '启用外部包类型';
$string['allowtypelocalsync'] = '启用可下载包类型';
$string['apidebugmask'] = 'API 调试捕获掩码——对 &lt;username&gt;:&lt;activityname&gt; 使用简单的正则表达式。例如：admin:.* 会只调试管理员用户';
$string['areacontent'] = '内容文件';
$string['areapackage'] = '包文件';
$string['asset'] = '资产';
$string['assetlaunched'] = '资产 - 已浏览';
$string['attempt'] = '学习次数';
$string['attempt1'] = '1 次';
$string['attempts'] = '次';
$string['attemptsx'] = '{$a} 次';
$string['attr_error'] = '标签 {$a->tag} 的属性 {$a->attr} 取值错误。';
$string['autocontinue'] = '自动继续';
$string['autocontinuedesc'] = '此选项设置活动默认情况下是否会自动继续';
$string['autocontinue_help'] = '如果启用，后续的学习对象会被自动执行，否则必须使用“继续”按钮。';
$string['averageattempt'] = '平均分';
$string['badmanifest'] = 'Manifest 有错误：请看错误日志';
$string['browse'] = '预览';
$string['browsed'] = '已浏览';
$string['browsemode'] = '预览模式';
$string['browserepository'] = '浏览仓库';
$string['cannotfindsco'] = '找不到 SCO';
$string['chooseapacket'] = '选择或更新一个包';
$string['completed'] = '已完成';
$string['confirmloosetracks'] = '警告：课件包已更新。如果该课件包的结构发生了变化，则用户的学习记录可能会在更新时丢失。';
$string['contents'] = '内容';
$string['coursepacket'] = '课程包';
$string['coursestruct'] = '课程结构';
$string['currentwindow'] = '当前窗口';
$string['datadir'] = '文件系统错误：无法创建课程数据目录';
$string['defaultdisplaysettings'] = '默认的显示设置';
$string['defaultgradesettings'] = '默认评分设置';
$string['defaultothersettings'] = '其他默认设置';
$string['deleteallattempts'] = '删除所有 SCORM 学习记录';
$string['deleteattemptcheck'] = '您确定要完全删除所有尝试记录吗？';
$string['deleteuserattemptcheck'] = '您确定要完全删除所有您的尝试记录吗？';
$string['details'] = '查看详情';
$string['directories'] = '显示目录链接';
$string['disabled'] = '不显示';
$string['display'] = '显示位置';
$string['displayattemptstatus'] = '显示尝试状态';
$string['displayattemptstatusdesc'] = '此选项设置显示尝试状态设置的缺省值';
$string['displayattemptstatus_help'] = '如果打开，以前尝试所得的分数和评级会显示在SCORM概要页面。';
$string['displaycoursestructure'] = '在进入页面显示课程结构';
$string['displaycoursestructuredesc'] = '此选项设置进入页面显示课程结构设置的缺省值';
$string['displaycoursestructure_help'] = '如果允许，课件内容的列表会显示在SCORM概要页面上。';
$string['displaydesc'] = '活动默认情况下是否显示包';
$string['displaysettings'] = '课件显示设置';
$string['domxml'] = '外部 DOMXML 库';
$string['duedate'] = '截止日';
$string['element'] = '项目';
$string['enter'] = '进入';
$string['entercourse'] = '进入课程';
$string['errorlogs'] = '错误日志';
$string['everyday'] = '每天';
$string['everytime'] = '每次使用时';
$string['exceededmaxattempts'] = '您已经达到最大尝试次数。';
$string['exit'] = '退出课程';
$string['exitactivity'] = '退出活动';
$string['expired'] = '抱歉，本活动已于{$a}关闭，已不再可用。';
$string['external'] = '更新外部课件时间';
$string['failed'] = '失败';
$string['finishscorm'] = '如果您已完成查看本资源，{$a}';
$string['finishscormlinkname'] = '点击此处返回课程主页';
$string['firstaccess'] = '首次访问';
$string['firstattempt'] = '首次得分';
$string['forcecompleted'] = '强制为完成';
$string['forcecompleteddesc'] = '该参数设置强制完成的默认值';
$string['forcecompleted_help'] = '如果打开，当前访问的状态会强制变为“完全的”。该项设置仅适用于SCORM1.2课件包。如果SCORM包在查看惑或浏览模式不能正确处理再次访问，或者不能正确处理完成状态时，非常有用。';
$string['forcejavascript'] = '强制用户打开JavaScript';
$string['forcejavascript_desc'] = '如果设置为打开（推荐），在用户浏览器不支持或者关闭JavaScript时，拒绝对SCORM内容的访问。如果设置为标上，用户仍可以查看SCORM的内容，但是API不能通讯，SCORM课件成绩等信息不能保存到系统中。';
$string['forcejavascriptmessage'] = '需要Javascript支持，请您打开浏览器中的JavaScript设置，然后再试一次。';
$string['forcenewattempt'] = '强制为新尝试';
$string['forcenewattemptdesc'] = '该参数设置强制为新尝试的默认值';
$string['forcenewattempt_help'] = '如果打开，每次访问SCORM包都被记作一次新的浏览。';
$string['found'] = '找到 Manifest 文件';
$string['frameheight'] = '活动的默认窗口高度';
$string['framewidth'] = '活动的默认窗口宽度';
$string['fullscreen'] = '全屏显示';
$string['general'] = '通用数据';
$string['gradeaverage'] = '平均分';
$string['gradeforattempt'] = '尝试的得分';
$string['gradehighest'] = '最高分';
$string['grademethod'] = '评分方法';
$string['grademethoddesc'] = '活动的默认评分方法';
$string['grademethod_help'] = '评分方法决定了对此活动的每次尝试如何获得成绩。

有4种评分方法：

* 学习对象 - 完成或通过的学习对象数量
* 最高分 - 在所有已完成的学习对象中取最高分
* 平均分 - 所有分数的平均分
* 总分 - 所有分数的总和';
$string['gradereported'] = '成绩报告';
$string['gradescoes'] = '学习对象';
$string['gradesettings'] = '评分设置';
$string['gradesum'] = '分数和';
$string['height'] = '高度';
$string['hidden'] = '隐藏';
$string['hidebrowse'] = '禁用预览模式';
$string['hidebrowsedesc'] = '活动默认是否允许预览模式';
$string['hidebrowse_help'] = '预览模式允许学生在进入课件之前先进行浏览。如果预览模式被禁止，预览按钮会被隐藏';
$string['hideexit'] = '隐藏退出链接';
$string['hidereview'] = '隐藏复习按钮';
$string['hidetoc'] = '在播放器中显示课程结构';
$string['hidetocdesc'] = '在 SCORM 播放器中默认显示还是隐藏课程结构（目录）';
$string['hidetoc_help'] = '该项设置设置内容列表出现在SCORM播放器中的位置';
$string['highestattempt'] = '最高分';
$string['identifier'] = '问题标识符';
$string['incomplete'] = '不完整';
$string['info'] = '信息';
$string['interactions'] = '交互';
$string['invalidactivity'] = 'Scorm 活动不正确';
$string['invalidhacpsession'] = '无效的 HACP 会话';
$string['invalidmanifestresource'] = '警告：在您的 manifest 文件中描述了如下资源，但没有找到';
$string['invalidurl'] = '无效的 URL';
$string['last'] = '最后访问时间';
$string['lastaccess'] = '最后访问';
$string['lastattempt'] = '末次完成的得分';
$string['lastattemptlock'] = '在最后一次尝试后锁定';
$string['lastattemptlockdesc'] = '该参数设置在最后一次尝试后锁定的默认值';
$string['lastattemptlock_help'] = '如果打开，学生用完了分配给他们的尝试次数，学生将不能再打开SCORM播放器';
$string['location'] = '显示地址栏';
$string['max'] = '最高分值';
$string['maximumattempts'] = '学习次数';
$string['maximumattemptsdesc'] = '活动默认的学习次数';
$string['maximumattempts_help'] = '这里定义了允许用户尝试的次数。该设置仅支持SCORM1.2和AICC的课件包。';
$string['maximumgradedesc'] = '活动默认的最高分';
$string['menubar'] = '显示菜单栏';
$string['min'] = '最低分值';
$string['missing_attribute'] = '标签 {$a->tag} 的属性 {$a->attr} 缺失';
$string['missingparam'] = '缺少了必须有的项目或项目取值错误';
$string['missing_tag'] = '标签 {$a->tag} 缺失';
$string['mode'] = '模式';
$string['modulename'] = 'SCORM 课件';
$string['modulename_help'] = 'SCORM 和 AICC 是一系列标准，用以创建互操作、易访问和可复用的基于 web 的学习内容。SCORM/AICC 模块可以将 SCORM/AICC 课件包含在课程中。';
$string['modulenameplural'] = 'SCORM 课件';
$string['navigation'] = '导航';
$string['newattempt'] = '再学一次';
$string['next'] = '继续';
$string['noactivity'] = '无报表';
$string['noattemptsallowed'] = '允许尝试的次数';
$string['noattemptsmade'] = '您已经尝试的次数';
$string['no_attributes'] = '标签 {$a->tag} 必须有属性';
$string['no_children'] = '标签 {$a->tag} 必须有子项';
$string['nolimit'] = '不限';
$string['nomanifest'] = '没找到 Manifest 文件';
$string['noprerequisites'] = '对不起，您还有先修内容没有完成，不能学习此内容。';
$string['noreports'] = '无报表可显示';
$string['normal'] = '普通';
$string['noscriptnoscorm'] = '您的浏览器不支持 JavaScript 或其 JavaScript 功能被禁用。SCORM 课件可能无法正常播放或保存数据。';
$string['notattempted'] = '未开始';
$string['not_corr_type'] = '标签 {$a->tag} 类型错误';
$string['notopenyet'] = '抱歉，这个活动直到{$a}才能进行';
$string['objectives'] = '目标';
$string['optallstudents'] = '全部用户';
$string['optattemptsonly'] = '学习过的用户';
$string['options'] = '选项（某些浏览器不支持）';
$string['optionsadv'] = '高级选项';
$string['optionsadv_desc'] = '如果选择，窗口的属性会以表格的形式显示为高级选项';
$string['optnoattemptsonly'] = '未学习过的用户';
$string['organization'] = '组织';
$string['organizations'] = '组织';
$string['othersettings'] = '更多设置';
$string['package'] = '包文件';
$string['packagedir'] = '文件系统错误：无法创建包目录';
$string['packagefile'] = '未指定包文件';
$string['package_help'] = '包文件是一个包含了 SCORM/AICC 课程定义的 zip 或 pif 文件。';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = '通过此设置可以提供指定 SCORM 课件的 URL，而不是选择一个文件。';
$string['page-mod-scorm-x'] = '任意 SCORM 模块页面';
$string['pagesize'] = '页面大小';
$string['passed'] = '已通过';
$string['php5'] = 'PHP 5 (原生 DOMXML 库)';
$string['pluginadministration'] = 'SCORM/AICC课件管理';
$string['pluginname'] = 'SCORM 课件';
$string['popup'] = '新窗口';
$string['popupmenu'] = '下拉菜单';
$string['popupopen'] = '在新窗口中显示';
$string['popupsblocked'] = '弹出式窗口被阻拦了，使 scorm 模块不能播放。请检查您的浏览器设置，然后再开始。';
$string['position_error'] = '{$a->tag} 标签不能在 {$a->parent} 标签中';
$string['preferencespage'] = '此页的参数设置';
$string['preferencesuser'] = '此报告的参数设置';
$string['prev'] = '返回上一页';
$string['raw'] = '原始分';
$string['regular'] = '常规 manifest';
$string['report'] = '报表';
$string['reportcountallattempts'] = '{$a->nbusers} 名用户的 {$a->nbattempts} 次学习，共 {$a->nbresults} 个结果';
$string['reportcountattempts'] = '{$a->nbresults} 个结果（{$a->nbusers} 名用户）';
$string['reports'] = '报表';
$string['result'] = '结果';
$string['results'] = '结果';
$string['review'] = '复习';
$string['reviewmode'] = '复习模式';
$string['scoes'] = '正在学习的对象';
$string['score'] = '成绩';
$string['scormclose'] = '直到';
$string['scormcourse'] = '正在学习的课程';
$string['scorm:deleteownresponses'] = '删除自己的尝试记录';
$string['scorm:deleteresponses'] = '删除 SCORM 学习记录';
$string['scormloggingoff'] = 'API 日志已关闭';
$string['scormloggingon'] = 'API 日志已开启';
$string['scormopen'] = '开放';
$string['scormresponsedeleted'] = '删除用户学习记录';
$string['scorm:savetrack'] = '保存详情';
$string['scorm:skipview'] = '跳过预览';
$string['scormtype'] = '类型';
$string['scormtype_help'] = '此设置决定课件如何放入课程。有 4 中选项：

* 上传课件 - 通过文件选取器选择 SCORM 课件
* 外部 SCORM manifest - 指定一个 imsmanifest.xml 网址。注意：如果此 URL 与您的网站域名不同，那么最好用“下载课件”，否则不能保存成绩。
* 下载课件 - 指定一个课件 URL。课件会被解压缩并保存在本地，并随着外部 SCORM 课件更新而更新。
* 本地 IMS 内容容器 - 通过 IMS 容器选择一个课件
* 外部 AICC URL - 独立 AICC 活动的启动 URL。会用它建立一个虚拟课件。';
$string['scorm:viewreport'] = '显示报表';
$string['scorm:viewscores'] = '显示成绩';
$string['scrollbars'] = '窗口可以滚动';
$string['selectall'] = '全部选择';
$string['selectnone'] = '全不选择';
$string['show'] = '显示';
$string['sided'] = '放旁边';
$string['skipview'] = '学生可忽略内容概览页面';
$string['skipviewdesc'] = '默认何时会跳过内容结构页面';
$string['skipview_help'] = '此设置决定是否内容结构页面应该被跳过（不显示）。如果课件只包含一个学习对象，内容结果页面就总是被跳过。';
$string['slashargs'] = '警告：此网站关闭了反斜线参数，此对象可能不能正常工作！';
$string['stagesize'] = '窗口尺寸';
$string['stagesize_help'] = '这两个设置用来限定学习对象的框架/窗口的高度和宽度。';
$string['started'] = '开始时间';
$string['status'] = '状态';
$string['statusbar'] = '显示状态栏';
$string['student_response'] = '响应';
$string['subplugintype_scormreport'] = '报表';
$string['subplugintype_scormreport_plural'] = '报表';
$string['suspended'] = '已暂停';
$string['syntax'] = '语法错误';
$string['tag_error'] = '未知标签 {$a->tag}，其内容为：{$a->value}';
$string['time'] = '用时';
$string['title'] = '标题';
$string['toc'] = '目录';
$string['toolbar'] = '显示工具栏';
$string['too_many_attributes'] = '标签 {$a->tag} 的属性太多了';
$string['too_many_children'] = '标签 {$a->tag} 的子项太多了';
$string['totaltime'] = '总时间';
$string['trackingloose'] = '警告：此课件包的学习记录将会丢失。';
$string['trackresult_help'] = '基于学生的回答和<br/>正确结果';
$string['type'] = '类型';
$string['typeaiccurl'] = '外部 AICC URL 地址';
$string['typeexternal'] = '外部 SCORM manifest';
$string['typelocal'] = '上传的课件';
$string['typelocalsync'] = '下载的课件';
$string['unziperror'] = '解压课件包时发生错误';
$string['updatefreq'] = '自动更新频率';
$string['updatefreqdesc'] = '默认的自动更新频率';
$string['updatefreq_help'] = '自动下载和更新外部课件';
$string['validateascorm'] = '检验课件包';
$string['validation'] = '检验结果';
$string['validationtype'] = '设定用来检验 SCROM Manifest 文件的 DOMXML 库。如果您不了解具体情况，请保留默认值。';
$string['value'] = '值';
$string['versionwarning'] = '标签 {$a->tag} 警告：Manifest 版本老于 1.3。';
$string['viewallreports'] = '查看 {$a} 次学习该内容的报表';
$string['viewalluserreports'] = '查看 {$a} 个用户的报表';
$string['whatgrade'] = '多次学习评分策略';
$string['whatgradedesc'] = '默认的多次学习评分策略';
$string['whatgrade_help'] = '如果允许多次答题，那么此设置决定是将最高分、平均分、第一次得分还是最后一次完成的得分记入成绩单。
“最后一次完成”选项不会包含处于“失败”状态的答题。

对多次答题的处理

* 开始新试答的选项是一个复选框，它在内容结构页的进入按钮上面。因此，如果您想允许多次答题的话，一定要允许用户访问此页。
* 有些scorm包能智能处理新试答，有些则不能。这意味着如果学习者重新进入一个已有的试答，当该SCORM没有避免旧试答被覆盖的逻辑时，它们就可能被覆盖，哪怕这些试答已经“完成”或者“通过”。
* “强制完成”、“强制新试答”和“结束试答后锁定”三个设置提供了进一步的多次答题管理功能。';
$string['width'] = '宽度';
$string['window'] = '窗口';
