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
 * Strings for component 'plugin', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '动作';
$string['availability'] = '可用性';
$string['checkforupdates'] = '检查可用更新';
$string['checkforupdateslast'] = '上次检查完成于{$a}';
$string['detectedmisplacedplugin'] = '"{$a->component}" 错误的安装在 "{$a->current}", 应该安装在"{$a->expected}"';
$string['displayname'] = '插件名';
$string['err_response_curl'] = '末cURL错误 - 获取不到可用的更新数据。';
$string['err_response_format_version'] = '末知的响应格式。请重新检查更新。';
$string['err_response_http_code'] = '末知的HTTP响应状态码 - 获取不到可用的更新数据。';
$string['filterall'] = '显示所有';
$string['filtercontribonly'] = '只显示附件';
$string['filtercontribonlyactive'] = '当前只显示附件';
$string['filterupdatesonly'] = '只显示可更新的';
$string['filterupdatesonlyactive'] = '当前只显示可更新的';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = '当前没有需要留意的插件';
$string['nonehighlightedinfo'] = '不管怎样，显示所有已安装插件列表';
$string['noneinstalled'] = '没有安装任何此类型的插件';
$string['notdownloadable'] = '无法下载包';
$string['notdownloadable_help'] = '无法自动下载ZIP压缩包更新。请查看文档页面获取更多帮助。';
$string['notes'] = '注释';
$string['notwritable'] = '插件文件不可写';
$string['notwritable_help'] = '你启用了自动更新部署，目前有一个可用的更新。但是web服务器无法写入插件文件，所以无法自动安装更新。

你要将整个插件目录设置为可写这样才可以自动安装更新。';
$string['numdisabled'] = '禁用：{$a}';
$string['numextension'] = '贡献：{$a}';
$string['numtotal'] = '已安装：{$a}';
$string['numupdatable'] = '可用更新：{$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = '此页显示升级过程中可能需要您留意的插件。要安装的新插件、要升级的插件和缺失的插件都被突出显示。第三方贡献的插件也被突出显示。建议您检查第三方插件是否有新版本，并在继续升级Moodle前更新它们的源代码。';
$string['plugindisable'] = '禁用';
$string['plugindisabled'] = '已禁用';
$string['pluginenable'] = '启用';
$string['pluginenabled'] = '可用';
$string['requiredby'] = '被依赖：{$a}';
$string['requires'] = '依赖';
$string['rootdir'] = '目录';
$string['settings'] = '设置';
$string['showall'] = '重新加载并显示所有插件';
$string['somehighlighted'] = '需要您留意的插件数：{$a}';
$string['somehighlightedinfo'] = '显示所有已安装的插件列表';
$string['somehighlightedonly'] = '只显示需要您留意的插件';
$string['source'] = '来源';
$string['sourceext'] = '贡献';
$string['sourcestd'] = '标准';
$string['status'] = '状态';
$string['status_delete'] = '将会被删除';
$string['status_downgrade'] = '已经安装了更高版本！';
$string['status_missing'] = '磁盘中缺少';
$string['status_new'] = '将要安装';
$string['status_nodb'] = '无数据库';
$string['status_upgrade'] = '将要升级';
$string['status_uptodate'] = '已安装';
$string['systemname'] = '唯一标识';
$string['type_auth'] = '认证方法';
$string['type_auth_plural'] = '身份认证插件';
$string['type_block'] = '版块';
$string['type_block_plural'] = '版块';
$string['type_coursereport'] = '课程报告';
$string['type_coursereport_plural'] = '课程报表';
$string['type_editor'] = '编辑器';
$string['type_editor_plural'] = '编辑器';
$string['type_enrol'] = '选课方法';
$string['type_enrol_plural'] = '选课方法';
$string['type_filter'] = '过滤器';
$string['type_filter_plural'] = '文本过滤器';
$string['type_format'] = '课程格式';
$string['type_format_plural'] = '课程格式';
$string['type_gradeexport'] = '成绩导出方法';
$string['type_gradeexport_plural'] = '成绩导出方法';
$string['type_gradeimport'] = '成绩导入方法';
$string['type_gradeimport_plural'] = '成绩导入方法';
$string['type_gradereport'] = '成绩单报表';
$string['type_gradereport_plural'] = '成绩单报表';
$string['type_gradingform'] = '高级评分方法';
$string['type_gradingform_plural'] = '高级评分方法';
$string['type_local'] = '本地插件';
$string['type_local_plural'] = '本地插件';
$string['type_message'] = '消息输出';
$string['type_message_plural'] = '消息输出';
$string['type_mnetservice'] = 'MNet服务';
$string['type_mnetservice_plural'] = 'MNet服务';
$string['type_mod'] = '活动模块';
$string['type_mod_plural'] = '活动模块';
$string['type_plagiarism'] = '防止抄袭';
$string['type_plagiarism_plural'] = '反抄袭插件';
$string['type_portfolio'] = '云存储';
$string['type_portfolio_plural'] = '云存储';
$string['type_profilefield'] = '个人资料字段类型';
$string['type_profilefield_plural'] = '个人资料字段类型';
$string['type_qbehaviour'] = '试题行为';
$string['type_qbehaviour_plural'] = '试题行为';
$string['type_qformat'] = '题目导入/导出格式';
$string['type_qformat_plural'] = '题目导入/导出格式';
$string['type_qtype'] = '题目类型';
$string['type_qtype_plural'] = '题目类型';
$string['type_report'] = '网站报告';
$string['type_report_plural'] = '报告';
$string['type_repository'] = '容器';
$string['type_repository_plural'] = '容器';
$string['type_theme'] = '主题风格';
$string['type_theme_plural'] = '主题风格';
$string['type_tool'] = '管理工具';
$string['type_tool_plural'] = '管理工具';
$string['type_webservice'] = 'Webservice协议';
$string['type_webservice_plural'] = 'Webservice协议';
$string['uninstall'] = '卸载';
$string['uninstallconfirm'] = '你将要卸载<em>{$a->name}</em>插件。这会从数据库中删除所有关于该插件的数据，包括配置，日志记录，用户的文件等。删除是不可恢复的，Moodle也没创建任何备份。你确定要继续吗？';
$string['uninstalldelete'] = '已经从数据库删除<em>{$a->name}</em>插件的所有相关数据。为防止<em>{$a->name}</em>插件自动安装，请手动把插件的<em>{$a->rootdir}</em>文件夹从服务器上删除。Moodle没有写权限所以无法删除此文件夹。';
$string['uninstalldeleteconfirm'] = '已经从数据库删除<em>{$a->name}</em>插件的所有相关数据。为防止<em>{$a->name}</em>插件自动安装，插件的<em>{$a->rootdir}</em>文件夹必须要删除掉。你现在要删除掉插件文件夹吗？';
$string['uninstalldeleteconfirmexternal'] = '系统显示这个插件是从版本控制系统{$a} checkout来的。如果你删除了插件文件夹，你可能会丢失掉你在本地所做的所有代码修改。你在继续删除之前确认。';
$string['uninstalling'] = '正在卸载 {$a->name}';
$string['updateavailable'] = '有新的版本 {$a} 可用！';
$string['updateavailable_moreinfo'] = '更多信息……';
$string['updateavailable_release'] = '版本 {$a}';
$string['updatepluginconfirm'] = '插件更新确认';
$string['updatepluginconfirmexternal'] = '系统显示这个插件是从版本控制系统{$a} checkout来的。如果你安装了更新文件，你可能会不能再从版本控制系统那边获取插件更新了。你在继续更新之前确认。';
$string['updatepluginconfirminfo'] = '你将要安装插件<strong>{$a->name}</strong>的新版本。将从<a href="{$a->url}">{$a->url}</a>这里下载{$a->version}版本的压缩包并解压到你的Moodle安装目录，这样就升级了。';
$string['updatepluginconfirmwarning'] = '注意Moodle不会在升级之前自动备份数据库。我们强烈建议你现在做一个完整的备份, 以应对新代码有BUG导致网站不能使用甚至崩溃。你可以冒险继续升级。';
$string['version'] = '版本';
$string['versiondb'] = '当前版本';
$string['versiondisk'] = '新版本';
