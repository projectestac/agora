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
 * Strings for component 'oublog', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   oublog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessdenied'] = '对不起：您有查看此页面的权限。';
$string['addcomment'] = '添加评论';
$string['addlink'] = '添加链接';
$string['addpost'] = '添加博客文章';
$string['allowcomments'] = '允许评论';
$string['allowcomments_help'] = '‘是，来自注册用户’ 允许来自能登录到此博客的用户的评论。

‘是，来自任何人’ 允许来自用户和广大公众的评论。您将接收到电子邮件来批准或拒绝来自没有登录的用户的评论。

‘无’ 禁止任何人对此文章进行评论。';
$string['atom'] = 'Atom';
$string['atomfeed'] = 'Atom 订阅';
$string['attachments'] = '附件';
$string['attachments_help'] = '您可以选择性地附加一个或多个文件到一篇博客文章中。如果您附加一个图像，它会显示在消息后面。';
$string['blogfeed'] = '博客源';
$string['bloginfo'] = '博客信息';
$string['blogname'] = '博客名称';
$string['blogoptions'] = '博客选项';
$string['blogsummary'] = '博客摘要';
$string['comment'] = '添加您的评论';
$string['commentonby'] = '评论 <u>{$a->author}</u> 的 <u>{$a->title}</u>';
$string['comments'] = '评论';
$string['commentsby'] = '{$a}的评论';
$string['commentsfeed'] = '仅评论';
$string['commentsnotallowed'] = '不允许评论';
$string['completioncomments'] = '用户必须对博客文章进行评论:';
$string['completioncommentsgroup'] = '要求评论';
$string['completioncommentsgroup_help'] = '如果允许此项，学生的博客在有了特定数量的评论后将会标记为完成。';
$string['completionposts'] = '用户必须发表博客文章：';
$string['completionpostsgroup'] = '要求发表文章';
$string['completionpostsgroup_help'] = '如果允许此项，学生的博客在有了特定数量的文章后将会标记为完成。';
$string['computingguide'] = 'OU 博客指南';
$string['computingguideurl'] = '操作指南 URL 地址';
$string['computingguideurlexplained'] = '输入 OU 博客的操作指南的 URL 地址';
$string['configmaxattachments'] = '默认每篇博客的最大附件数量。';
$string['configmaxbytes'] = '网站默认博客的所有附件的最大大小。（受限于课程限制和其他本地设置）';
$string['confirmdeletecomment'] = '您确定要删除此评论？';
$string['confirmdeletelink'] = '您确定要删除此链接？';
$string['confirmdeletepost'] = '您确定要删除此博客文章？';
$string['couldnotaddcomment'] = '不能添加评论';
$string['couldnotaddlink'] = '不能添加链接';
$string['defaultpersonalblogname'] = '{$a} 的博客';
$string['delete'] = '删除';
$string['deletedby'] = '由 {$a->fullname} 删除于 {$a->timedeleted}';
$string['details'] = '详情';
$string['displayversion'] = 'OU 博客版本： <strong>{$a}</strong>';
$string['downloadas'] = '数据下载为';
$string['edit'] = '编辑';
$string['editlink'] = '编辑链接';
$string['editonsummary'] = '编辑于 {$a->editdate}';
$string['editpost'] = '更新博客文章';
$string['editsummary'] = '由 {$a->editby} 编辑于 {$a->editdate}';
$string['error_alreadyapproved'] = '评论已批准或拒绝';
$string['error_grouppubliccomments'] = '当博客是小组模式时，您不能允许公开评论';
$string['error_moderatednotallowed'] = '此博客或博客文章不再允许审核意见';
$string['error_noconfirm'] = '在此框中按给出的完全一样地输入上面的粗体文字。';
$string['error_toomanycomments'] = '在过去的一小时里您用此互联网地址发表了太多的博客评论。请等待一段时间后再次尝试。';
$string['error_unspecified'] = '因为发生错误（{$a}），系统不能完成这个请求';
$string['error_wrongkey'] = '评论的密钥不正确';
$string['exportedpost'] = '导出的博客文章';
$string['externaldashboardadd'] = '将博客添加到面板里';
$string['externaldashboardremove'] = '将博客从面板里移除';
$string['extranavolderposts'] = '更旧的文章：从 {$a->from} 到 {$a->to}';
$string['extranavtag'] = '标签：{$a}';
$string['feedhelp'] = '源';
$string['feedhelp_help'] = '如果您使用订阅您可以添加 Atom 或 RSS 链接来跟上最新的博客。大部分的源阅读器支持 Atom 和 RSS。

如果此博客允许评论，有&lsquo;仅评论&rsquo;的源。';
$string['feeds'] = '源';
$string['feedsnotenabled'] = '源没有开启';
$string['foruser'] = '给 {$a} 的';
$string['gradesupdated'] = '成绩已经更新';
$string['guestblog'] = '如果您有此系统的帐号，请<a href=\'{$a}\'>登入以查看完整博客</a>。';
$string['individualblogs'] = '个人博客';
$string['invalidblog'] = '无效的博客 ID';
$string['invalidblogdetails'] = '无法找到博客文章{$a}的细节';
$string['invalidcomment'] = '无效的评论 ID';
$string['invalidedit'] = '无效的编辑 ID';
$string['invalidformat'] = '格式必须是 Atom 或 RSS';
$string['invalidlink'] = '无效的链接 ID';
$string['invalidpost'] = '无效的文章 ID';
$string['invalidpostid'] = '无效的文章 ID';
$string['invalidvisbilitylevel'] = '无效的可见性等级 {$a}';
$string['invalidvisibility'] = '无效的可见性等级';
$string['lastcomment'] = '（最后的评论由 {$a->fullname} 发布于 {$a->timeposted}）';
$string['links'] = '相关的链接';
$string['logincomments'] = '是，来自登录的用户';
$string['maxattachments'] = '最大附件数';
$string['maxattachments_help'] = '此项设置指定可以附加到一篇博客文章的最多文件数量。';
$string['maxattachmentsize'] = '最大附件大小';
$string['maxattachmentsize_help'] = '此项设置指定可以附加到一篇博客文章的最大文件大小。';
$string['maxvisibility'] = '最大的可见性';
$string['maybehiddenposts'] = '此博客可能包含只有登录的用户可见或只有登录的用户可以评论的文章。如果您在此系统里有帐号，请 <a href=\'{$a}\'>登录以获得全部博客访问权限</a>。';
$string['message'] = '信息';
$string['moderated_addedcomment'] = '谢谢添加您的评论，评论已经成功收到。您的评论在被作者批准前不会显示在此文章后。';
$string['moderated_approve'] = '批准这条评论';
$string['moderated_authorname'] = '您的名字';
$string['moderated_awaiting'] = '评论等待审核';
$string['moderated_awaitingnote'] = '除非你同意，这些评论对其他用户是不可见的。必须注意，系统不知道评论者的身份并且评论里可能包含链接，如果点击了，它可能严重的<strong>损害您的计算机</strong>。如果您有任何疑问，请拒绝评论并且<strong>不点击任何链接</strong>。';
$string['moderated_confirm'] = '确认';
$string['moderated_confirminfo'] = '请在下面输入 <strong>是</strong>来确认您是一个人。';
$string['moderated_confirmvalue'] = '是';
$string['moderated_emailsubject'] = '评论等待审核：{$a->blog} ({$a->commenter})';
$string['moderated_info'] = '因为您没有登录，您的评论只有被批准后才会显示。如果您在此系统里有帐号，请<a href=\'{$a}\'>登录以获得全部博客访问权限</a>。';
$string['moderated_postername'] = '使用名字 <strong>{$a}</strong>';
$string['moderated_reject'] = '拒绝此评论';
$string['moderated_rejectedon'] = '拒绝了 {$a}：';
$string['moderated_restrictblog'] = '限制对此博客上您所有文章的评论';
$string['moderated_restrictblog_info'] = '您想要对您所有的博客里文章的评论限制为只有登录进系统里的人才能添加评论吗？';
$string['moderated_restrictpage'] = '限制评论';
$string['moderated_restrictpost'] = '限制对此文章的评论';
$string['moderated_restrictpost_info'] = '您想要对您这篇文章的评论限制为只有登录进系统里的人才能添加评论吗？';
$string['moderated_submitted'] = '等待审核';
$string['moderated_typicaltime'] = '在过去，这一般会花费大约 {$a}。';
$string['modulename'] = 'OU 博客';
$string['modulenameplural'] = 'OU 博客';
$string['mustprovidepost'] = '必须提供文章 ID';
$string['ncomments'] = '{$a} 条评论';
$string['newblogposts'] = '新的博客文章';
$string['newcomment'] = '新的博客评论';
$string['newerposts'] = '更新的文章&gt;';
$string['newpost'] = '新的博客文章';
$string['no'] = '无';
$string['noblogposts'] = '没有博客文章';
$string['nocomments'] = '不允许评论';
$string['noposts'] = '此博客里没有可以阅读的文章。';
$string['notaddpost'] = '不能添加文章';
$string['notaddpostnogroup'] = '不能添加没有类别的文章';
$string['nousercomments'] = '此用户没有对这篇文章进行评论。';
$string['nouserposts'] = '此用户没有在这个博客里发表文章。';
$string['npending'] = '{$a} 条评论等待审核';
$string['npendingafter'] = '，{$a} 条等待审核';
$string['numposts'] = '{$a} 篇文章';
$string['olderposts'] = '&lt; 更旧的文章';
$string['onecomment'] = '{$a} 条评论';
$string['onepending'] = '{$a} 条评论等待审核';
$string['onependingafter'] = '，{$a} 条等待审核';
$string['onlyworkspersonal'] = '只适用于个人博客';
$string['oublog'] = 'OU 博客';
$string['oublog:addinstance'] = '添加一个新的 OU 博客';
$string['oublog:audit'] = '查看已经删除的文章和旧的版本';
$string['oublog:comment'] = '对文章进行评论';
$string['oublog:contributepersonal'] = '个人博客的文章和评论';
$string['oublog:exportownpost'] = '导出自己的文章';
$string['oublog:exportpost'] = '导出文章';
$string['oublog:grade'] = '对 OU 博客用户参与进行评分';
$string['oublog:managecomments'] = '管理评论';
$string['oublog:managelinks'] = '管理链接';
$string['oublog:manageposts'] = '管理文章';
$string['oublog:post'] = '发表一篇新文章';
$string['oublog:view'] = '查看文章';
$string['oublog:viewindividual'] = '查看个人博客';
$string['oublog:viewparticipation'] = '查看 OU 博客的用户参与';
$string['oublog:viewpersonal'] = '查看个人博客中的文章';
$string['overviewnumentrylog'] = '自上次登录后的条目';
$string['overviewnumentrylog1'] = '自上次登录后的条目';
$string['overviewnumentryvw'] = '自上次查看后的条目';
$string['overviewnumentryvw1'] = '自上次查看后的条目';
$string['participation'] = '参与';
$string['participationbyuser'] = '用户的参与';
$string['permalink'] = '固定链接';
$string['personalblognotsetup'] = '个人博客未设置';
$string['pluginadministration'] = 'OU 博客管理';
$string['pluginname'] = 'OU 博客';
$string['postauthor'] = '文章作者';
$string['postdate'] = '发表日期';
$string['postedby'] = '由 {$a} 发表';
$string['postedbymoderated'] = '评论人 {$a->commenter} （由 {$a->approver}批准于 {$a->approvedate}）';
$string['postedbymoderatedaudit'] = '评论人 {$a->commenter}  [{$a->ip}] （由 {$a->approver}批准于 {$a->approvedate}）';
$string['posts'] = '文章';
$string['postsby'] = '{$a}的文章';
$string['posttime'] = '发表时间';
$string['posttitle'] = '文章标题';
$string['publiccomments'] = '是的，来自所有人（即使没有登录）';
$string['publiccomments_info'] = '如果没有登录的人发表了一个评论，您将收到一个电子邮件通知并能批准显示此评论或拒绝它。为防止垃圾邮件，这样做是必要的。';
$string['re'] = '回复：{$a}';
$string['rss'] = 'RSS';
$string['rssfeed'] = 'RSS 源';
$string['savegrades'] = '保存成绩';
$string['searchblogs'] = '搜索博客';
$string['searchthisblog'] = '搜索此博客';
$string['separateindividual'] = '单独的&nbsp;个人的';
$string['separateindividualblogs'] = '单独的个人博客';
$string['siteentries'] = '查看网站条目';
$string['subscribefeed'] = '订阅源（需要适当的软件）来接收博客更新的通知。';
$string['summary'] = '摘要';
$string['tags'] = '标签';
$string['tagsfield'] = '标签（用逗号分隔）';
$string['tags_help'] = '标签是以帮助您查找和分类博客文章的标记。';
$string['tagupdatefailed'] = '升级标签失败';
$string['title'] = '标题';
$string['unsupportedbrowser'] = '<p>您的浏览器不能直接显示 Atom 或 RSS 源。</p>
<p>在不同的计算机程序或网站中，源是最有用的。如果您想在这样的程序中使用源，复制并粘贴浏览器地址栏里的地址。</p>';
$string['url'] = '完整的网页地址';
$string['usergrade'] = '用户成绩';
$string['userparticipation'] = '用户参与';
$string['viewallusers'] = '查看所有用户';
$string['viewallusersingroup'] = '查看小组里的所有用户';
$string['viewblogdetails'] = '查看博客细节';
$string['viewblogposts'] = '返回博客';
$string['viewedit'] = '查看编辑';
$string['views'] = '这个博客的总访问量：';
$string['visibility'] = '谁可以阅读这个？';
$string['visibleblogusers'] = '仅此博客的会员可见';
$string['visiblecourseusers'] = '此课程的参与者可见';
$string['visibleindividual'] = '可见的&nbsp;个人的';
$string['visibleindividualblogs'] = '可见的个人博客';
$string['visibleloggedinusers'] = '登录到此系统的所有人可见';
$string['visiblepublic'] = '所有人可见';
$string['visibleyou'] = '只有博客主人可见（私有的）';
$string['yes'] = '是';
