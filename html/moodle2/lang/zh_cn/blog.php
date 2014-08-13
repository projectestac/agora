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
 * Strings for component 'blog', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = '写篇新博客';
$string['addnewexternalblog'] = '注册外部博客';
$string['assocdescription'] = '如果您正在写一篇关于某课程或某活动模块的博客，请在这里选择它们。';
$string['associated'] = '已关联{$a}';
$string['associatewithcourse'] = '关于课程{$a->coursename}的博客';
$string['associatewithmodule'] = '关于{$a->modtype}：{$a->modname}的博客';
$string['association'] = '关联';
$string['associations'] = '关联';
$string['associationunviewable'] = '其他人看不到这篇文章，除非它与某课程关联，或者“发布到”字段被修改';
$string['autotags'] = '添加这些标签';
$string['autotags_help'] = '在此输入一个或多个本地标签（用半角逗号分隔）。所有从您的外部博客拷贝到本地博客的文章都会被自动加上这些标签。';
$string['backupblogshelp'] = '如果启用，所有博客将被包含在网站自动备份中';
$string['blockexternalstitle'] = '外部博客';
$string['blocktitle'] = '博客分类的版块名称';
$string['blog'] = '博客';
$string['blogaboutthis'] = '关于此{$a->type}的博客';
$string['blogaboutthiscourse'] = '发篇关于此课程的博客';
$string['blogaboutthismodule'] = '写篇关于此{$a}的博客';
$string['blogadministration'] = '博客管理';
$string['blogdeleteconfirm'] = '删除这篇博客？';
$string['blogdisable'] = '博客被禁用！';
$string['blogentries'] = '博客文章';
$string['blogentriesabout'] = '关于{$a}的博客';
$string['blogentriesbygroupaboutcourse'] = '{$a->group}发表的关于{$a->course}的博客';
$string['blogentriesbygroupaboutmodule'] = '{$a->group}发表的关于{$a->mod}的博客';
$string['blogentriesbyuseraboutcourse'] = '{$a->user}关于{$this->course}的博客';
$string['blogentriesbyuseraboutmodule'] = '{$a->user}关于此{$this->mod}的博客';
$string['blogentrybyuser'] = '{$a}发表的博客';
$string['blogpreferences'] = '博客选项';
$string['blogs'] = '博客';
$string['blogscourse'] = '课程博客';
$string['blogssite'] = '站点博客';
$string['blogtags'] = '博客标签';
$string['cannotviewcourseblog'] = '您没有查看此课程博客的权限';
$string['cannotviewcourseorgroupblog'] = '您没有查看此课程/小组的博客的权限';
$string['cannotviewsiteblog'] = '您没有查看所有网站博客的权限';
$string['cannotviewuserblog'] = '您没有阅读用户博客的权限';
$string['configexternalblogcrontime'] = 'Moodle多久检查一次外部博客的新博文。';
$string['configmaxexternalblogsperuser'] = '允许用户在他的Moodle博客里链接几个外部博客。';
$string['configuseblogassociations'] = '允许将博文和课程及课程模块关联。';
$string['configuseexternalblogs'] = '允许用户指定外部博客的种子。Moodle会周期检查博客种子中的新文章，将其拷贝到用户的本地博客。';
$string['courseblog'] = '课程博客：{$a}';
$string['courseblogdisable'] = '课程博客被禁用';
$string['courseblogs'] = '用户只能浏览开放课程者的博客';
$string['deleteblogassociations'] = '删除博客关联';
$string['deleteblogassociations_help'] = '如勾选，那么博客将不再和此课程，或课程中的活动、资源相关联。不会有任何博文会被删除。';
$string['deleteexternalblog'] = '取消此外部博客的注册';
$string['deleteotagswarn'] = '您确定想从所有的博客和系统中删除这些标签吗？';
$string['description'] = '描述';
$string['description_help'] = '输入一到两句话来简介您的外部博客的内容。（如果不提供描述，那么会直接使用您外部博客所记录的描述）。';
$string['donothaveblog'] = '抱歉，您没有自己的博客。';
$string['editentry'] = '编辑博文';
$string['editexternalblog'] = '编辑这个外部博客';
$string['emptybody'] = '博客内容不能为空';
$string['emptyrssfeed'] = '您输入的网址指向的不是一个有效的RSS种子';
$string['emptytitle'] = '博客标题不能为空';
$string['emptyurl'] = '您必须指定一个有效RSS种子的网址';
$string['entrybody'] = '文章内容';
$string['entrybodyonlydesc'] = '文章描述';
$string['entryerrornotyours'] = '这不是您的博客文章';
$string['entrysaved'] = '您的文章已经被保存';
$string['entrytitle'] = '文章标题';
$string['evententryupdated'] = '博客文章已更新';
$string['externalblogcrontime'] = '外部博客定时调度';
$string['externalblogdeleteconfirm'] = '注销这个外部博客？';
$string['externalblogdeleted'] = '外部博客已取消注册';
$string['externalblogs'] = '外部博客';
$string['feedisinvalid'] = '无效种子';
$string['feedisvalid'] = '种子有效';
$string['filterblogsby'] = '过滤条目由...';
$string['filtertags'] = '过滤标签';
$string['filtertags_help'] = '这个特性能做到在此只保存您想要的博客文章。如果您在这里指定了标签（用半角逗号分隔），那么只有带这些标签的文章会从外部博客拷贝过来。';
$string['groupblog'] = '组博客：{$a}';
$string['groupblogdisable'] = '未启用组博客';
$string['groupblogentries'] = '博客条目和{$a->groupname}的{$a->coursename}相关';
$string['groupblogs'] = '用户只能浏览开放群组者的博客';
$string['incorrectblogfilter'] = '不正确的博客过滤类型';
$string['intro'] = 'RSS 种子会自动通过一个或多个博客产生。';
$string['invalidgroupid'] = '无效的组ID';
$string['invalidurl'] = 'URL无法访问';
$string['linktooriginalentry'] = '文章原始链接';
$string['maxexternalblogsperuser'] = '每用户最多可有几个外部博客';
$string['name'] = '博客名';
$string['name_help'] = '输入您的外部博客的名字。（如果不提供名字，会直接使用外部博客的标题）。';
$string['noentriesyet'] = '这里没有可见的文章';
$string['noguestpost'] = '访客不能发布博客';
$string['nopermissionstodeleteentry'] = '您没有删除此博文的权限';
$string['norighttodeletetag'] = '您不能删除这个分类- {$a}';
$string['nosuchentry'] = '没有此博客';
$string['notallowedtoedit'] = '您不能修改这个项目';
$string['numberofentries'] = '文章：{$a}';
$string['numberoftags'] = '要显示的分类数';
$string['page-blog-edit'] = '博客编辑页面';
$string['page-blog-index'] = '博客列表页面';
$string['page-blog-x'] = '全部博客页面';
$string['pagesize'] = '每页显示的文章数';
$string['permalink'] = '永久链接';
$string['personalblogs'] = '用户只能浏览自己的博客';
$string['preferences'] = '偏好设置';
$string['publishto'] = '发布给';
$string['publishtocourse'] = '用户和你分享一个课程';
$string['publishtocourseassoc'] = '相关课程成员';
$string['publishtocourseassocparam'] = '{$a}的成员';
$string['publishtogroup'] = '用户与你分享一个小组';
$string['publishtogroupassoc'] = '你在相关课程里的小组成员';
$string['publishtogroupassocparam'] = '在{$a}的组员';
$string['publishto_help'] = '有三个选择：

* 自己（草稿）——只有您和管理员能查看此博客
* 网站里的所有人——所有在此网站注册的人都能阅读此博客
* 世界上的任何人——任何人，包括访客，都能阅读此博客';
$string['publishtonoone'] = '您自己(草稿)';
$string['publishtosite'] = '任意注册用户';
$string['publishtoworld'] = '任何人';
$string['readfirst'] = '请先读这个';
$string['relatedblogentries'] = '相关博客';
$string['retrievedfrom'] = '取自';
$string['rssfeed'] = '博客RSS种子';
$string['searchterm'] = '搜索：{$a}';
$string['settingsupdatederror'] = '错误，无法更新博客的使用偏好设定。';
$string['siteblog'] = '全站博客：{$a}';
$string['siteblogdisable'] = '未启用网站博客';
$string['siteblogs'] = '注册用户可以浏览所有博客';
$string['tagdatelastused'] = '标签最后使用的日期';
$string['tagparam'] = '标签：{$a}';
$string['tags'] = '标签';
$string['tagsort'] = '分类排序';
$string['tagtext'] = '标签文字';
$string['timefetched'] = '最后一次同步时间';
$string['timewithin'] = '显示最近使用的分类';
$string['updateentrywithid'] = '更新项目';
$string['url'] = 'RSS种子URL';
$string['url_help'] = '输入您外部博客的RSS种子URL。';
$string['useblogassociations'] = '启用博客关联';
$string['useexternalblogs'] = '启用外部博客';
$string['userblog'] = '用户博客：{$a}';
$string['userblogentries'] = '由{$a}写的博客条目';
$string['valid'] = '有效';
$string['viewallblogentries'] = '所有关于{$a}的条目';
$string['viewallmodentries'] = '查看关于此{$a->type}的所有博客';
$string['viewallmyentries'] = '浏览我的博客';
$string['viewblogentries'] = '关于{$a->type}的博客';
$string['viewblogsfor'] = '查看所有条目...';
$string['viewcourseblogs'] = '查看所有与此课程有个的博客';
$string['viewentriesbyuseraboutcourse'] = '查看{$a}发表的与此课程有关的博客';
$string['viewgroupblogs'] = '查看小组的条目...';
$string['viewgroupentries'] = '小组条目';
$string['viewmodblogs'] = '查看关于模块的条目...';
$string['viewmodentries'] = '模块条目';
$string['viewmyentries'] = '我的博客';
$string['viewmyentriesaboutcourse'] = '查看我关于此课程的博客';
$string['viewmyentriesaboutmodule'] = '查看我关于此{$a}的博客';
$string['viewsiteentries'] = '查看所有文章';
$string['viewuserentries'] = '查看所有{$a}发表的博客';
$string['worldblogs'] = '任何用户都可以浏览完全开放的博客';
$string['wrongpostid'] = '错误的博客文章id';
