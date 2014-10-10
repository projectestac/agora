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
 * Strings for component 'data', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   data
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = '动作';
$string['add'] = '增加条目';
$string['addcomment'] = '添加评论';
$string['addentries'] = '添加条目';
$string['addtemplate'] = '添加模板';
$string['advancedsearch'] = '高级查找';
$string['allowcomments'] = '允许评论词条';
$string['alttext'] = '可替代文本';
$string['approve'] = '批准';
$string['approved'] = '许可';
$string['areacontent'] = '字段';
$string['ascending'] = '升序';
$string['asearchtemplate'] = '高级查找模版';
$string['atmaxentry'] = '您输入的条目数已达到上限！';
$string['authorfirstname'] = '姓';
$string['authorlastname'] = '名';
$string['autogenallforms'] = '生成所有缺省模板';
$string['autolinkurl'] = '自动链接 URL';
$string['availablefromdate'] = '开放时间';
$string['availabletags'] = '可用的标签';
$string['availabletags_help'] = '<p align="center"><strong>可用的标签</strong></p>
<p>标签是模板里的占位符。当条目被编辑或显示时，它们会被替换为字段或按钮。</p>
<p>字段使用这种格式：[[fieldname]]</p>
<p>按钮使用这种格式：##somebutton##</p>
<p>只有在“可用的标签”列表里出现的标签才能被当前模板使用。</p>';
$string['availabletodate'] = '截止时间';
$string['blank'] = '空白';
$string['buttons'] = '动作';
$string['bynameondate'] = '作者 {$a->name} - {$a->date}';
$string['cancel'] = '取消';
$string['cannotaccesspresentsother'] = '您没有访问其他用户预设置的权限';
$string['cannotadd'] = '无法增加新的条目！';
$string['cannotdeletepreset'] = '删除预设时出错';
$string['cannotoverwritepreset'] = '覆盖预设时出错';
$string['cannotunziptopreset'] = '无法向预设目录解压缩';
$string['checkbox'] = '选择框';
$string['chooseexportfields'] = '选择你希望输出的字段';
$string['chooseexportformat'] = '选择你希望输出的格式';
$string['chooseorupload'] = '选择文件';
$string['columns'] = '专栏';
$string['comment'] = '评论';
$string['commentdeleted'] = '评论已删除';
$string['commentempty'] = '没有评论';
$string['comments'] = '评论';
$string['commentsaved'] = '评论已保存';
$string['commentsn'] = '{$a} 条评论';
$string['commentsoff'] = '未启用评论功能';
$string['configenablerssfeeds'] = '这个开关会使所有数据库都可以启用RSS种子。您仍需要手工在每个数据库的设置中打开种子功能。';
$string['confirmdeletefield'] = '您要删除这个字段，确定吗？';
$string['confirmdeleterecord'] = '您确定要删除这条记录？';
$string['confirmdeleterecords'] = '您确定要删除这些记录？';
$string['csstemplate'] = 'CSS 模板';
$string['csvfailed'] = '无法从 CSV 文件中读取原始数据';
$string['csvfile'] = 'CSV 文件';
$string['csvimport'] = 'CSV 文件导入';
$string['csvimport_help'] = '可以从文本文件导入数据项。这个文件的第一行是字段名列表，然后每行一条数据记录。';
$string['csvwithselecteddelimiter'] = '<acronym title="Comma Separated Values">CSV</acronym>用选择的分隔符分割的文本';
$string['data:addinstance'] = '添加新数据库';
$string['data:approve'] = '核准未批准的条目';
$string['data:comment'] = '撰写评论';
$string['data:exportallentries'] = '导出所有数据库条目';
$string['data:exportentry'] = '导出一条数据库条目';
$string['data:exportownentry'] = '导出自己的数据库条目';
$string['data:exportuserinfo'] = '导出用户资料';
$string['data:managecomments'] = '管理评论';
$string['data:manageentries'] = '管理条目';
$string['data:managetemplates'] = '管理模板';
$string['data:manageuserpresets'] = '管理所有预设的模板';
$string['data:rate'] = '条目评级';
$string['data:readentry'] = '阅读条目';
$string['data:viewallratings'] = '查看所有个人给出的原始评级';
$string['data:viewalluserpresets'] = '查看所有用户的预设';
$string['data:viewanyrating'] = '查看每个人获得的总评级';
$string['data:viewentry'] = '查看条目';
$string['data:viewrating'] = '查看您收到的总评分';
$string['data:writeentry'] = '撰写条目';
$string['date'] = '日期';
$string['dateentered'] = '输入日期';
$string['defaultfielddelimiter'] = '(缺省为逗号",")';
$string['defaultfieldenclosure'] = '缺省为空';
$string['defaultsortfield'] = '缺省排序字段';
$string['delcheck'] = '批量删除筛选框';
$string['delete'] = '删除';
$string['deleteallentries'] = '删除所有条目';
$string['deletecomment'] = '您确定要删除这条这注释吗？';
$string['deleted'] = '已删除';
$string['deletefield'] = '删除已有字段';
$string['deletenotenrolled'] = '删除未选课用户的条目';
$string['deletewarning'] = '您确定删除这个预设吗？';
$string['descending'] = '降序';
$string['directorynotapreset'] = '{$a->directory} 没有预设：文件丢失{$a->missing_files}';
$string['disapprove'] = '撤消审核';
$string['download'] = '下载';
$string['edit'] = '编辑';
$string['editcomment'] = '编辑注释';
$string['editentry'] = '编辑条目';
$string['editordisable'] = '不可编辑';
$string['editorenable'] = '可编辑';
$string['emptyadd'] = '模板为空，按缺省模板生成...';
$string['emptyaddform'] = '您未填写任何字段';
$string['entries'] = '条目';
$string['entrieslefttoadd'] = '在完成此活动前，您还需添加 {$a->entriesleft} 条目';
$string['entrieslefttoaddtoview'] = '在查看其他参与者的条目前，您还需添加 {$a->entrieslefttoview} 条目';
$string['entry'] = '条目';
$string['entrysaved'] = '您的条目已保存';
$string['errormustbeteacher'] = '只有教师能使用此页';
$string['errorpresetexists'] = '选择的名字已经被使用';
$string['example'] = '数据库模块样例';
$string['excel'] = 'Excel';
$string['expired'] = '对不起，这项活动截止于{$a}，不再有效';
$string['export'] = '输出';
$string['exportaszip'] = '以压缩格式输出';
$string['exportaszip_help'] = '<p align="center"><strong>以zip格式导出</strong></p>
<p>允许将模板下载到您自己电脑上，而后模板可以上传到一个不同的数据库中使用。
</p>';
$string['exportedtozip'] = '输出到临时的压缩文件...';
$string['exportentries'] = '导出条目';
$string['exportownentries'] = '仅导出您自己的条目？（{$a->mine}/{$a->all}）';
$string['failedpresetdelete'] = '删除预设错误！';
$string['fieldadded'] = '字段已添加';
$string['fieldallowautolink'] = '允许自动链接';
$string['fielddeleted'] = '字段已删除';
$string['fielddelimiter'] = '字段分隔符';
$string['fielddescription'] = '字段描述';
$string['fieldenclosure'] = '文字分割符';
$string['fieldheight'] = '高度';
$string['fieldheightlistview'] = '列表视图中的高度';
$string['fieldheightsingleview'] = '独立视图中的高度';
$string['fieldids'] = 'ids 字段';
$string['fieldmappings'] = '字段映射';
$string['fieldmappings_help'] = '用此菜单将数据和已存在的数据库分离。为了保留某字段中的数据，您需要将该字段映射到一个新字段，数据会保存到新字段中。留空的字段不会拷贝任何信息。任何未映射到新字段的旧字段和它数据都会被删除。您只可以映射同一类型的字段，所以每个下拉框中有不同的字段。而且，必须注意，不要将同一个旧字段映射到多个新字段中。';
$string['fieldname'] = '字段名';
$string['fieldnotmatched'] = '您文件中的下述字段不存在于数据库中：{$a}';
$string['fieldoptions'] = '选项(每行一个)';
$string['fields'] = '字段';
$string['fieldupdated'] = '字段已更新';
$string['fieldwidth'] = '宽度';
$string['fieldwidthlistview'] = '列表视图中的宽度';
$string['fieldwidthsingleview'] = '独立视图中的宽度';
$string['file'] = '文件';
$string['fileencoding'] = '编码';
$string['filesnotgenerated'] = '生成文件 {$a} 失败';
$string['filtername'] = '数据库自动链接';
$string['footer'] = '尾';
$string['forcelinkname'] = '链接名强制为';
$string['foundnorecords'] = '没找到记录(<a href="{$a->reseturl}">重设过滤器</a>)';
$string['foundrecords'] = '找到记录：{$a->num}/{$a->max} (<a href="{$a->reseturl}">重设过滤器</a>)';
$string['fromfile'] = '从压缩文件导入';
$string['fromfile_help'] = '<p align=\'center\'><strong>从Zip文件导入</strong></p>
<p>使用该类型文件可以上传和导出时一样格式。</p>
<span style="font-weight: bold;">翻译者：况亮</span><br style="font-weight: bold;" /><span style="font-weight: bold;">Email：kuangliang12345@163.com</span><br style="font-weight: bold;" /><span style="font-weight: bold;">翻译日期：2007年3月1日</span><br />';
$string['generateerror'] = '有部分文件未被生成！';
$string['header'] = '头';
$string['headeraddtemplate'] = '定义修改条目的界面';
$string['headerasearchtemplate'] = '为高级查找定义接口';
$string['headercsstemplate'] = '为其它模板定义本地 CSS 样式';
$string['headerjstemplate'] = '为其他模板自定义 Javascript';
$string['headerlisttemplate'] = '定义浏览多个条目的界面';
$string['headerrsstemplate'] = '定义条目在 RSS 种子中的表示';
$string['headersingletemplate'] = '定义浏览独立条目的界面';
$string['importentries'] = '导入条目';
$string['importsuccess'] = '已成功采用了预设';
$string['includeapproval'] = '包含审核状态';
$string['includetime'] = '包含增加时间、修改时间';
$string['includeuserdetails'] = '包含用户详情';
$string['insufficiententries'] = '查看这个数据库需要更多的条目';
$string['intro'] = '描述';
$string['invalidaccess'] = '页面访问错误';
$string['invalidfieldid'] = '字段ID不正确';
$string['invalidfieldname'] = '请为这个字段选择一个新名字';
$string['invalidfieldtype'] = '字段类型错误';
$string['invalidid'] = '不正确的数据ID';
$string['invalidpreset'] = '{$a}不是一个预设。';
$string['invalidrecord'] = '不正确的记录';
$string['invalidurl'] = '您刚刚输入的 URL 不合法';
$string['jstemplate'] = 'Javascript 模板';
$string['latitude'] = '纬度';
$string['latlong'] = '纬度／经度';
$string['latlongdownloadallhint'] = '把所有的条目链接下载为 KML 文件';
$string['latlongkmllabelling'] = '怎样在 KML 文件中标出内容（谷歌地球）';
$string['latlonglinkservicesdisplayed'] = '要显示的 Link-out 服务';
$string['latlongotherfields'] = '其他字段';
$string['list'] = '显示列表';
$string['listtemplate'] = '列表模板';
$string['longitude'] = '经度';
$string['mapexistingfield'] = '映射到{$a}';
$string['mapnewfield'] = '创建一个新字段';
$string['mappingwarning'] = '所有不能映射到新字段的旧字段将会丢失，而且此字段内的全部数据也会被删除。';
$string['maxentries'] = '最多条目数';
$string['maxentries_help'] = '学生在此活动最多可以提交的条目数。';
$string['maxsize'] = '最大尺寸';
$string['menu'] = '菜单';
$string['menuchoose'] = '选择...';
$string['missingdata'] = '需要提供数据id或者对象给字段类';
$string['missingfield'] = '程序员错误：您需要在定义字段类时指定字段和/或数据';
$string['modulename'] = '数据库';
$string['modulename_help'] = '数据库活动模块允许参与者创建、维护和搜索一组记录条目。这些条目的格式和结构几乎是没有限制的，可包括图像、文件、超链接、数字以及文本等各种形式。';
$string['modulenameplural'] = '数据库';
$string['more'] = '更多';
$string['moreurl'] = '更多 URL';
$string['movezipfailed'] = '移动压缩文件失败';
$string['multientry'] = '重复的条目';
$string['multimenu'] = '菜单(多选)';
$string['multipletags'] = '发现多个标签! 模板还没有保存';
$string['namecheckbox'] = '选择框字段';
$string['namedate'] = '日期字段';
$string['namefile'] = '文件字段';
$string['namelatlong'] = '纬度／经度字段';
$string['namemenu'] = '菜单字段';
$string['namemultimenu'] = '多选菜单字段';
$string['namenumber'] = '数字字段';
$string['namepicture'] = '图片字段';
$string['nameradiobutton'] = '单选按钮字段';
$string['nametext'] = '文本字段';
$string['nametextarea'] = '文本域字段';
$string['nameurl'] = 'URL 字段';
$string['newentry'] = '新条目';
$string['newfield'] = '创建一个新字段';
$string['newfield_help'] = '<p align="center"><strong>字段</strong></p>

<p>在此页您可以建立字段，做为您的数据库的一部分。</p>

<p>每个字段可以使用不同类型的数据，并有不同的界面。</p>';
$string['noaccess'] = '您无权访问此页';
$string['nodefinedfields'] = '新的预设值没有定义';
$string['nofieldcontent'] = '未找到域内容';
$string['nofieldindatabase'] = '尚未给此数据库定义字段。';
$string['nolisttemplate'] = '列表模板尚未定义';
$string['nomatch'] = '未找到匹配的条目';
$string['nomaximum'] = '无最大数量限制';
$string['norecords'] = '数据库中无条目';
$string['nosingletemplate'] = '独立显示模板尚未定义';
$string['notapproved'] = '条目尚未被核准。';
$string['notinjectivemap'] = '非单项映射';
$string['notopenyet'] = '抱歉，此活动直到{$a}才可用';
$string['number'] = '数字';
$string['numberrssarticles'] = 'RSS 文章';
$string['numnotapproved'] = '待核准';
$string['numrecords'] = '{$a} 条记录';
$string['ods'] = '<acronym title="OpenDocument Spreadsheet">ODS</acronym> (OpenOffice)';
$string['optionaldescription'] = '简要描述（可选）';
$string['optionalfilename'] = '文件名（可选）';
$string['other'] = '其他';
$string['overrwritedesc'] = '如果预设定已存在则覆盖它';
$string['overwrite'] = '覆盖';
$string['overwritesettings'] = '覆盖当前设置';
$string['page-mod-data-x'] = '任意数据库活动模块页面';
$string['pagesize'] = '每页条目数';
$string['participants'] = '参与者';
$string['picture'] = '图片';
$string['pleaseaddsome'] = '请在下面创建新的的或<a href="{$a}">选择一个预定义的集合</a>，再开始。';
$string['pluginadministration'] = '数据库活动管理';
$string['pluginname'] = '数据库';
$string['portfolionotfile'] = '导出到文件包而不是文件（只支持csv和leap2a）';
$string['presetinfo'] = '保存为预设后，将发布这个模板。其他的用户也可以在他们的数据库中使用它。';
$string['presets'] = '预设';
$string['radiobutton'] = '单选按钮';
$string['recordapproved'] = '记录已核准';
$string['recorddeleted'] = '记录已删除';
$string['recorddisapproved'] = '不可进入';
$string['recordsnotsaved'] = '没有记录被保存。请确认上传文件的安排。';
$string['recordssaved'] = '记录已保存';
$string['requireapproval'] = '是否需要批准';
$string['requireapproval_help'] = '如果激活，条目必须在教师核准后才能被其他人看到。';
$string['requiredentries'] = '必须完成的条目数';
$string['requiredentries_help'] = '<p align="center"><strong>必须完成的条目数</strong></p>

<p>这个数目是参与者必须提交的数目。如果用户没有提交指定数据的条目信息，将看到一个提示消息。</p>

<p>除非用户提交了指定数目的条目，否则该活动将不会允许用户参与。</p>
<span style="font-weight: bold;">翻译者：况亮</span><br style="font-weight: bold;" /><span style="font-weight: bold;">Email：kuangliang12345@163.com</span><br style="font-weight: bold;" /><span style="font-weight: bold;">翻译日期：2007年3月1日</span><br />';
$string['requiredentriestoview'] = '查看前需要完成条目数';
$string['requiredentriestoview_help'] = '<p align="center"><strong>浏览之前需要提交的条目数</strong></p>

<p>该数目是指在参与者浏览其他参与者条目信息前必须要提交的信息数目（条目数目）。</p>
<span style="font-weight: bold;">翻译者：况亮</span><br style="font-weight: bold;" /><span style="font-weight: bold;">Email：kuangliang12345@163.com</span><br style="font-weight: bold;" /><span style="font-weight: bold;">翻译日期：2007年3月1日</span><br />';
$string['resetsettings'] = '重置字段';
$string['resettemplate'] = '重置模板';
$string['resizingimages'] = '调整图片到拇指大小';
$string['rows'] = '列';
$string['rssglobaldisabled'] = '已禁用。请参看站点变量配置。';
$string['rsstemplate'] = 'RSS 模板';
$string['rsstitletemplate'] = 'RSS 标题模板';
$string['save'] = '保存';
$string['saveandadd'] = '保存并添加另一个';
$string['saveandview'] = '保存并浏览';
$string['saveaspreset'] = '保存为预设';
$string['saveaspreset_help'] = '保存为预设值功能会发布此模板和字段，从而网站中的其他人也可以使用。（您随时可以将其从预设列表中删除。）';
$string['savesettings'] = '保存设置';
$string['savesuccess'] = '保存成功。您的预设将在全站内可用。';
$string['savetemplate'] = '保存模板';
$string['search'] = '查找';
$string['selectedrequired'] = '全选';
$string['showall'] = '显示所有条目';
$string['single'] = '独立视图显示';
$string['singletemplate'] = '独立模板';
$string['subplugintype_datafield'] = '数据库字段类型';
$string['subplugintype_datafield_plural'] = '数据库字段类型';
$string['subplugintype_datapreset'] = '预设';
$string['subplugintype_datapreset_plural'] = '预设';
$string['teachersandstudents'] = '{$a->teachers} 和 {$a->students}';
$string['templates'] = '模板';
$string['templatesaved'] = '模板已保存';
$string['text'] = '文本';
$string['textarea'] = '文本域';
$string['timeadded'] = '追加时间';
$string['timemodified'] = '编辑时间';
$string['todatabase'] = '至此数据库。';
$string['type'] = '字段类型';
$string['undefinedprocessactionmethod'] = '在 Data_Preset 中处理行为“{$a}”没有定义';
$string['unsupportedexport'] = '不能输出 ({$a->fieldtype})';
$string['updatefield'] = '更新已有字段';
$string['uploadfile'] = '上传文件';
$string['uploadrecords'] = '从一个文件中上传条目';
$string['uploadrecords_help'] = '可以通过上传文本文件来更新条目。文件的格式如下：

* 文件每行包含一条记录
* 每个记录是一系列由逗号(或其他分隔符)分隔的数据
* 第一条记录包含一串用来定义文件其他部分格式的字段名

字段包围符是一个包围每个记录中的每个字段的字符。通常可以不对它进行设定。';
$string['url'] = 'URL';
$string['usedate'] = '包含到搜索中。';
$string['usestandard'] = '使用一个预设';
$string['usestandard_help'] = '请在列表中选择要使用的预设值。（对于您使用“另存为预设值”添加到列表中的预设，会显示删除选项）';
$string['viewfromdate'] = '从何时开始只读';
$string['viewtodate'] = '只读到何时';
$string['wrongdataid'] = '提供的数据 ID 错误';
