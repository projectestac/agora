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
 * Strings for component 'repository', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   repository
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessiblefilepicker'] = '无障碍文件选择器';
$string['activaterep'] = '活动容器';
$string['activerepository'] = '可用的容器插件';
$string['activitybackup'] = '活动备份';
$string['add'] = '添加';
$string['addfile'] = '添加...';
$string['addplugin'] = '添加容器插件';
$string['allowexternallinks'] = '允许外部链接';
$string['areacategoryintro'] = '类别描述';
$string['areacourseintro'] = '课程介绍';
$string['areacourseoverviewfiles'] = '课程摘要文件';
$string['areamainfile'] = '主文件';
$string['arearoot'] = '系统';
$string['areauserbackup'] = '用户备份';
$string['areauserdraft'] = '草稿';
$string['areauserpersonal'] = '私人文件';
$string['areauserprofile'] = '个人资料';
$string['attachedfiles'] = '附件文件';
$string['attachment'] = '附件';
$string['author'] = '作者';
$string['automatedbackup'] = '自动备份';
$string['back'] = '« 返回';
$string['backtodraftfiles'] = '« 返回到草稿文件管理器';
$string['cachecleared'] = '缓存文件已删除';
$string['cacheexpire'] = '缓存过期';
$string['cannotaccessparentwin'] = '如果父窗口使用HTTPS协议打开，那么我们就不能访问window.opener对象，于是就不能自动刷新容器，但是我们已经得到了您的会话。只需回到文件选择器并再次选择容器，就一切正常了。';
$string['cannotdelete'] = '无法删除此文件。';
$string['cannotdownload'] = '无法下载此文件';
$string['cannotdownloaddir'] = '无法下载此目录';
$string['cannotinitplugin'] = '调用plugin_init出错';
$string['choosealink'] = '选择一个链接...';
$string['chooselicense'] = '选择授权协议';
$string['cleancache'] = '清理我的缓存文件';
$string['close'] = '关闭';
$string['commonrepositorysettings'] = '通用容器设置';
$string['configallowexternallinks'] = '此选项允许所有用户选择是否将外部媒体文件拷贝到Moodle中。如果关闭此选择，那么媒体总是被拷贝到Moodle（这通常对整体的数据完整性和安全性有好处）。如果此选项被打开，那么用户每次将媒体添加到文本时都可以选择。';
$string['configcacheexpire'] = '浏览外部容器时，文件列表的本地缓存时间（单位：秒）。';
$string['configsaved'] = '配置已保存！';
$string['confirmdelete'] = '你确定要删除容器{$a}吗？如果你选择“继续并下载“，那么引用外部内容的文件将被下载到 Moodle，但可能要花费很长时间。';
$string['confirmdeletefile'] = '您确信要删除此文件？';
$string['confirmdeletefilewithhref'] = '您确定您要删除这个文件吗？有 {$a} 个别名或快捷方式引用了这个文件。如果您继续，那么这些别名将被转换为真实副本。';
$string['confirmdeletefolder'] = '您确定要删除这个文件夹吗？所有的文件和子文件夹将被删除。';
$string['confirmremove'] = '您确信要删除这个容器（{$a}）插件、它的配置选项和<strong>所有实例</strong>吗？';
$string['confirmrenamefile'] = '您确定您要移动或重命名这个文件吗？有 {$a} 个别名或快捷方式引用了这个文件。如果您继续，那么这些别名将被转换为真实副本。';
$string['confirmrenamefolder'] = '您确定您要移动或重命名这个文件夹吗？任何引用这个文件夹的别名或快捷方式将被转换成真实副本。';
$string['continueuninstall'] = '继续';
$string['continueuninstallanddownload'] = '继续并下载';
$string['copying'] = '拷贝';
$string['coursebackup'] = '课程备份';
$string['create'] = '创建';
$string['createfolderfail'] = '新建文件夹出错';
$string['createfoldersuccess'] = '文件夹成功新建';
$string['createinstance'] = '创建一个容器实例';
$string['createrepository'] = '创建一个容器实例';
$string['createxxinstance'] = '创建“{$a}”实例';
$string['date'] = '日期';
$string['datecreated'] = '创建';
$string['deleted'] = '容器已删除';
$string['deleterepository'] = '删除此容器';
$string['detailview'] = '查看详情';
$string['dimensions'] = '大小';
$string['disabled'] = '禁用';
$string['displaydetails'] = '以文件详细信息显示文件夹内容';
$string['displayicons'] = '以文件图标显示文件夹内容';
$string['displaytree'] = '以文件树状结构显示文件夹内容';
$string['download'] = '下载';
$string['downloadfolder'] = '下载全部';
$string['downloadsucc'] = '文件已成功下载';
$string['draftareanofiles'] = '因为没有附件，所以不能下载';
$string['editrepositoryinstance'] = '编辑容器实例';
$string['emptylist'] = '空列表';
$string['emptytype'] = '无法建立容器类型：类型名为空';
$string['enablecourseinstances'] = '允许用户向课程中添加资源库实例';
$string['enableuserinstances'] = '允许用户向用户场景添加容器实例';
$string['enter'] = '进入';
$string['entername'] = '请输入文件夹名';
$string['enternewname'] = '请输入新文件名';
$string['error'] = '发生未知错误！';
$string['errordoublereference'] = '该文件的快捷方式已经存在，无法以快捷方式或别名形式覆盖文件';
$string['errornotyourfile'] = '您不能选择别人添加的文件';
$string['errorpostmaxsize'] = '上传的文件大小超出了php.ini中允许的最大值（max_post_size）。';
$string['erroruniquename'] = '容器实例名应该唯一';
$string['errorwhilecommunicatingwith'] = '错误！在访问容器"{$a}"时发生错误';
$string['errorwhiledownload'] = '错误！在下载文件 {$a} 时发生错误';
$string['existingrepository'] = '容器已经存在';
$string['federatedsearch'] = '联合搜索';
$string['fileexists'] = '文件名已被使用，请使用其它名字';
$string['fileexistsdialog_editor'] = '您正编辑的文本的附件中已经有一个同名文件。';
$string['fileexistsdialog_filemanager'] = '已经有一个同名文件';
$string['fileexistsdialogheader'] = '文件已存在';
$string['filename'] = '文件名';
$string['filenotnull'] = '您必须先选择一个文件才能上传。';
$string['filepicker'] = '文件选择器';
$string['filesaved'] = '文件已保存';
$string['filesizenull'] = '不能确定文件大小';
$string['folderexists'] = '文件夹的名称已被使用，请使用其他名称';
$string['foldernotfound'] = '找不到文件夹';
$string['folderrecurse'] = '文件夹不能被移动到自己的子文件夹里';
$string['getfile'] = '选择此文件';
$string['help'] = '帮助';
$string['hidden'] = '隐藏';
$string['iconview'] = '图标查看';
$string['imagesize'] = '{$a->width} x {$a->height} 像素';
$string['instance'] = '实例';
$string['instancedeleted'] = '实例已删除';
$string['instances'] = '容器实例';
$string['instancesforcourses'] = '{$a}个全课程通用实例';
$string['instancesforsite'] = '{$a}个全站通用实例';
$string['instancesforusers'] = '{$a}个用户私有实例';
$string['invalidfiletype'] = '不能接受{$a}文件类型。';
$string['invalidjson'] = '无效的JSON字符串';
$string['invalidparams'] = '无效的参数';
$string['invalidplugin'] = '容器插件 {$a} 无效';
$string['invalidrepositoryid'] = '无效的容器ID';
$string['isactive'] = '激活？';
$string['keyword'] = '关键词';
$string['linkexternal'] = '链接到外部';
$string['listview'] = '列表查看';
$string['loading'] = '加载中...';
$string['login'] = '登录';
$string['logout'] = '登出';
$string['lostsource'] = '错误。源丢失。 {$a}';
$string['makefileinternal'] = '为文件制作一个副本';
$string['makefilelink'] = '直接链接到文件';
$string['makefilereference'] = '为文件创建一个别名或快捷方式';
$string['manage'] = '管理容器';
$string['manageurl'] = '管理';
$string['manageuserrepository'] = '管理个人容器';
$string['moving'] = '移动中';
$string['newfolder'] = '新文件夹';
$string['newfoldername'] = '新文件夹名：';
$string['noenter'] = '什么都没输入';
$string['nofilesattached'] = '没有附件';
$string['nofilesavailable'] = '没有可用文件';
$string['nomorefiles'] = '不允许再附加更多文件';
$string['nopathselected'] = '还未选择目的路径（双击要选择的目录树节点）';
$string['nopermissiontoaccess'] = '没有访问此容器的权限';
$string['norepositoriesavailable'] = '抱歉，您使用的容器都不能返回符合需要的格式的文件。';
$string['norepositoriesexternalavailable'] = '抱歉，您使用的容器都不能返回外部文件。';
$string['noresult'] = '无搜索结果';
$string['notyourinstances'] = '您不能查看/编辑他人的容器实例';
$string['off'] = '启用，但是隐藏';
$string['on'] = '启用，而且可见';
$string['openpicker'] = '选择一个文件...';
$string['operation'] = '操作';
$string['original'] = '原始的';
$string['overwrite'] = '覆盖';
$string['overwriteall'] = '全部覆盖';
$string['personalrepositories'] = '可用的容器实例';
$string['plugin'] = '容器插件';
$string['pluginerror'] = '容器插件有错误。';
$string['pluginname'] = '容器插件名';
$string['pluginnamehelp'] = '如果此处留空，将使用缺省名。';
$string['popup'] = '登录请点“登录”按钮';
$string['popupblockeddownload'] = '下载窗口被阻塞。请允许弹出窗口，然后再试一次。';
$string['preview'] = '预览';
$string['privatefilesof'] = '{$a}私人文件';
$string['readonlyinstance'] = '您不能编辑/删除只读实例';
$string['referencesexist'] = '有 {$a} 个别名或快捷方式引用此文件';
$string['referenceslist'] = '别名或快捷方式';
$string['refresh'] = '刷新';
$string['refreshnonjsfilepicker'] = '请关闭本窗口然后刷新非javascript文件选择器';
$string['removed'] = '容器已删除';
$string['renameall'] = '全部重命名';
$string['renameto'] = '重命名为“{$a}”';
$string['repositories'] = '容器';
$string['repository'] = '容器';
$string['repositorycourse'] = '课程容器';
$string['repositoryerror'] = '远程容器返回错误：{$a}';
$string['repositoryicon'] = '容器图标';
$string['save'] = '保存';
$string['saveas'] = '另存为';
$string['saved'] = '已保存';
$string['saving'] = '保存中';
$string['search'] = '搜索';
$string['searching'] = '搜索';
$string['searchrepo'] = '搜索容器';
$string['sectionbackup'] = '小节备份';
$string['select'] = '选择';
$string['setmainfile'] = '设为主文件';
$string['setmainfile_help'] = '若文件夹中存在多个文件，查看页面会显示一个主要文件，而其他如图片、视频文件可能会嵌入其中。在文件管理器中，主文件用黑体标题加以区分。';
$string['settings'] = '设置';
$string['setupdefaultplugins'] = '设置缺省容器插件';
$string['siteinstances'] = '本站的容器实例';
$string['size'] = '大小';
$string['submit'] = '提交';
$string['sync'] = '同步';
$string['thumbview'] = '图标查看';
$string['title'] = '选择一个文件...';
$string['type'] = '类型';
$string['typenotvisible'] = '类型不可见';
$string['undisclosedreference'] = '（未公开）';
$string['undisclosedsource'] = '（未公开）';
$string['unknownoriginal'] = '未知的';
$string['unzipped'] = '解压缩成功';
$string['upload'] = '上传此文件';
$string['uploading'] = '上传中...';
$string['uploadsucc'] = '文件上传成功';
$string['uselatestfile'] = '使用最新文件';
$string['usenonjsfilemanager'] = '在新窗口中打开文件管理器';
$string['usenonjsfilepicker'] = '在新窗口中打开文件选择器';
$string['usercontextrepositorydisabled'] = '您不能在用户场景中编辑此容器';
$string['wrongcontext'] = '您不能访问此场景';
$string['xhtmlerror'] = '您似乎正使用严格的XHTML头信息。有些YUI组件不支持这种模式，请在moodle中关闭它。';
$string['ziped'] = '压缩文件夹成功';
