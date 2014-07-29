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
 * Strings for component 'badges', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '动作';
$string['activate'] = '启用';
$string['activatesuccess'] = '成功启用勋章。';
$string['addbadgecriteria'] = '添加授勋规则';
$string['addcourse'] = '添加课程';
$string['addcourse_help'] = '选择所有本勋章需要添加的课程。按 CTRL 键完成多选操作。';
$string['addcriteria'] = '添加规则';
$string['addcriteriatext'] = '请从下拉菜单中选择某一项来添加授勋规则。';
$string['addtobackpack'] = '添加进勋章背包';
$string['after'] = '自从授予之后。';
$string['all'] = '全部';
$string['allmethod'] = '所有选中的条件全部满足';
$string['allmethodactivity'] = '所有选中的活动全部完成';
$string['allmethodcourseset'] = '所有选中的课程全部完成';
$string['allmethodmanual'] = '所有选中的角色全部授予';
$string['allmethodprofile'] = '所有选中的个人信息项都得到完善';
$string['allowcoursebadges'] = '启用课程勋章';
$string['allowcoursebadges_desc'] = '允许在课程上下文中创建和授予勋章。';
$string['allowexternalbackpack'] = '允许连接到外部勋章背包';
$string['allowexternalbackpack_desc'] = '允许用户通过网络连接展示他们保存在外部勋章背包服务中心处的勋章。

提示：当无法从 Internet 访问此站点时（例如防火墙等造成的原因），建议禁用此项设置。';
$string['any'] = '任一个';
$string['anymethod'] = '任一个选中的条件符合';
$string['anymethodactivity'] = '任一个选中的活动完成';
$string['anymethodcourseset'] = '任一个选中的课程完成';
$string['anymethodmanual'] = '任一个选中的角色授予此勋章';
$string['anymethodprofile'] = '只要有一项个人信息项得到完善';
$string['attachment'] = '附件发送';
$string['attachment_help'] = '如果启用此项，授予的勋章会被作为附件发送到获得者的邮箱';
$string['award'] = '授予勋章';
$string['awardedtoyou'] = '授予日期';
$string['awards'] = '获得人';
$string['backpackdetails'] = '背包设置';
$string['backpackemail'] = 'Email';
$string['badgedetails'] = '勋章详情';
$string['badgeimage'] = '图片';
$string['badgeimage_help'] = '此图片在授予此勋章时使用。

更换图片时，浏览并选择一张图片文件（JPG或者PNG格式），然后再点击“保存更改”按钮。图片文件会被裁切成正方形并且按需要进行缩放。';
$string['badgeprivacysetting'] = '勋章私密设置';
$string['badgeprivacysetting_str'] = '自动在我的个人资料页面上展示我荣获的勋章';
$string['badgesalt'] = '获得者 email 的哈希盐';
$string['badgesalt_desc'] = '提供一个哈希串给勋章背包服务中心，以便确保勋章获得者不会暴露他们的 email 地址。此项设计只能填入数字和字母。';
$string['badgesearned'] = '获得勋章数： {$a}';
$string['badgesettings'] = '勋章设置';
$string['badgestatus_0'] = '禁用';
$string['badgestatus_1'] = '启用';
$string['badgestatus_2'] = '禁用';
$string['badgestatus_3'] = '启用';
$string['badgestoearn'] = '可用的勋章数： {$a}';
$string['badgesview'] = '课程勋章';
$string['badgeurl'] = '授予的勋章链接';
$string['bawards'] = '获得人（{$a}）';
$string['bcriteria'] = '授勋规则';
$string['bdetails'] = '编辑';
$string['bmessage'] = '消息';
$string['boverview'] = '概览';
$string['bydate'] = '完成日期不迟于';
$string['completioninfo'] = '该勋章是因为符合下面的条件而被授予的：';
$string['completionnotenabled'] = '当前课程没有启用课程进度跟踪，故它不能纳入授勋规则当中。课程进度跟踪特性可以在课程设置里面启用，如果在课程设置里面看不到这项，说明网站没有启用这一特性，可以用管理员身份进入：网站管理->高级特性启用它。';
$string['configenablebadges'] = '启用此项特性你将可以创建勋章并授予给网站的用户。';
$string['configuremessage'] = '勋章消息';
$string['connect'] = '连接';
$string['connected'] = '已连接';
$string['contact'] = '联系';
$string['contact_help'] = '授勋机构的 email';
$string['copyof'] = '复制的 {$a}';
$string['coursebadges'] = '勋章';
$string['coursecompletion'] = '用户必须完成此课程。';
$string['create'] = '创建勋章';
$string['createbutton'] = '创建勋章';
$string['creatorbody'] = '<p>{$a->user} 已经满足所有的勋章条件，并且已经被授予了此勋章。单击 {$a->link} 进入查看此勋章信息</p>';
$string['creatorsubject'] = '\'{$a}\' 已经被授予！';
$string['criteria_0'] = '此勋章的授予条件...';
$string['criteria_1'] = '完成活动';
$string['criteria_1_help'] = '允许某勋章被授予给完成课程中的某些活动的用户。';
$string['criteria_2'] = '由角色手工授予';
$string['criteria_2_help'] = '由网站或者当前课程的某一特定用户角色手工来授予用户此勋章。';
$string['criteria_4'] = '完成课程';
$string['criteria_4_help'] = '允许勋章被授予给完成课程的用户。此规则可以包含附加参数，例如至少获得的成绩分数和完成日期不迟于指定日期等。';
$string['criteria_5'] = '完成一个课程集';
$string['criteria_5_help'] = '允许勋章被授予给完成课程的用户。各门课程可以附带参数，例如至少获得的成绩分数和完成日期不迟于指定日期等。';
$string['criteria_6'] = '个人信息完善';
$string['criteria_descr'] = '符合下列条件的用户可以获得此勋章：';
$string['criteria_descr_0'] = '符合下列 <strong>{$a}</strong> 条件的用户可以获得此勋章。';
$string['criteria_descr_1'] = '下列活动 <strong>{$a}</strong> 得到完成：';
$string['criteria_descr_2'] = '由以下角色中 <strong>{$a}</strong> 授予：';
$string['criteria_descr_4'] = '用户必须完成课程';
$string['criteria_descr_5'] = '下列课程 <strong>{$a}</strong> 得到完成：';
$string['criteria_descr_6'] = '下列个人信息项 <strong>{$a}</strong> 得到完善：';
$string['criteria_descr_grade'] = '并获得不低于 <em>{$a}</em> 分的成绩';
$string['criteria_descr_short0'] = '完成 <strong>{$a}</strong> :';
$string['criteria_descr_short1'] = '完成 <strong>{$a}</strong> :';
$string['criteria_descr_short2'] = '由 <strong>{$a}</strong> 授予：';
$string['criteria_descr_short4'] = '完成课程';
$string['criteria_descr_short5'] = '完成 <strong>{$a}</strong> :';
$string['criteria_descr_short6'] = '完成 <strong>{$a}</strong> :';
$string['criteria_descr_single_1'] = '下列活动需要完成：';
$string['criteria_descr_single_2'] = '此勋章必须由具备以下角色的用户授予：';
$string['criteria_descr_single_4'] = '用户必须完成课程';
$string['criteria_descr_single_5'] = '下列课程需要完成：';
$string['criteria_descr_single_6'] = '下列个人信息项需要完善：';
$string['criteria_descr_single_short1'] = '完成：';
$string['criteria_descr_single_short2'] = '授予人：';
$string['criteria_descr_single_short4'] = '完成课程';
$string['criteria_descr_single_short5'] = '完成：';
$string['criteria_descr_single_short6'] = '完成：';
$string['currentimage'] = '图片';
$string['currentstatus'] = '当前状态：';
$string['dateawarded'] = '授予日期';
$string['dateearned'] = '日期： {$a}';
$string['day'] = '天';
$string['deactivate'] = '禁用';
$string['deactivatesuccess'] = '成功禁用勋章';
$string['defaultissuercontact'] = '默认授勋机构联系方式';
$string['defaultissuercontact_desc'] = '授勋机构的 email';
$string['defaultissuername'] = '默认授勋机构名称';
$string['defaultissuername_desc'] = '授勋机构的名称。';
$string['delbadge'] = '删除勋章';
$string['delconfirm'] = '您确定要删除勋章“{$a}”？';
$string['delcritconfirm'] = '您确定需要删除这条授勋规则吗？';
$string['description'] = '描述';
$string['enablebadges'] = '启用勋章';
$string['error:backpacknotavailable'] = '您的站点无法通过 Internet 访问，故此站点下授予的勋章均不能被外部勋章背包服务中心确认。';
$string['error:invalidbadgeurl'] = '授勋机构 URL 格式错误。';
$string['error:invalidexpiredate'] = '过期时间必须是将来某个时间。';
$string['error:noactivities'] = '此课程中没有启用进度跟踪的活动。';
$string['error:nocourses'] = '当前站点所有课程均未启用进度跟踪，故没能显示。课程进度跟踪特性可以在课程设置里面启用。';
$string['error:nopermissiontoview'] = '您没有查看勋章获得者的权限';
$string['error:notifycoursedate'] = '警告：在课程开始日期之前，与课程和活动相关的勋章不能被授予。';
$string['evidence'] = '凭据';
$string['existingrecipients'] = '已经存在的勋章获得者';
$string['expired'] = '已过期';
$string['expiredate'] = '此勋章在 {$a} 过期。';
$string['expireddate'] = '此勋章已在 {$a} 过期。';
$string['expireperiod'] = '此勋章在被授予  {$a}  天后失效。';
$string['expireperiodh'] = '此勋章在被授予  {$a}  小时后失效。';
$string['expireperiodm'] = '此勋章在被授予  {$a}  分钟后失效。';
$string['expireperiods'] = '此勋章在被授予  {$a}  秒后失效。';
$string['expirydate'] = '过期时间';
$string['expirydate_help'] = '可选项，可以是一个指定的日期，也可以是一个从授予给用户的日期起计算的日期。';
$string['externalbadges'] = '我在其它网站获得的勋章';
$string['externalbadges_help'] = '此处展示您外部背包中的勋章。';
$string['externalbadgesp'] = '在其它网站获得的勋章：';
$string['fixed'] = '固定日期';
$string['hidden'] = '隐藏';
$string['issuancedetails'] = '有效期';
$string['issuedbadge'] = '授予的勋章信息';
$string['issuerdetails'] = '授勋机构详情';
$string['issuername'] = '授勋机构名称';
$string['issuername_help'] = '授勋机构的名称。';
$string['issuerurl'] = '授勋机构 URL';
$string['makeprivate'] = '不公开';
$string['makepublic'] = '公开';
$string['managebadges'] = '勋章管理';
$string['message'] = '内容';
$string['messagebody'] = '<p>您被授予一枚 "%badgename%" 的勋章！</p>
<p>通过此链接可以看到此勋章的详细信息： %badgelink%。</p>
<p>如果此邮件里面看不到作为附件发送过来的勋章，您可以从 {$a} 页面管理此勋章，也可以下载它。</p>';
$string['messagesubject'] = '热烈祝贺！您刚刚获得一枚勋章！';
$string['method'] = '当完成...此规则即生效';
$string['mingrade'] = '至少获得成绩';
$string['month'] = '月';
$string['mybackpack'] = '我的背包设置';
$string['mybadges'] = '我的勋章';
$string['never'] = '从不';
$string['newbadge'] = '添加一个新勋章';
$string['newimage'] = '更换图片';
$string['noawards'] = '还没有人获得此勋章。';
$string['nobadges'] = '没有可用的勋章';
$string['nocriteria'] = '此勋章还没有定义授勋规则。';
$string['noexpiry'] = '此勋章永不过期。';
$string['notacceptedrole'] = '您的用户角色没有被赋予权限来授予此勋章。<br/>
您可以访问 {$a} 页面来查看已经被授予此勋章的用户列表。';
$string['nothingtoadd'] = '没有可添加的规则。';
$string['notification'] = '通知勋章创建人';
$string['notification_help'] = '此项设置用来设定通知勋章创建人的方式，以便他们知道此勋章被授予的情况。

下面是可以选择的选项：

* **从不** – 不发送通知。

* **每次** – 每当有人被授予勋章时通知一次。

* **每天** – 每天发送一次通知。

* **每周** – 每周发送一次通知。

* **每月** – 每月发送一次通知。';
$string['notifydaily'] = '每天';
$string['notifyevery'] = '每次';
$string['notifymonthly'] = '每月';
$string['notifyweekly'] = '每周';
$string['numawards'] = '此勋章已经被授予 <a href="{$a->link}">{$a->count}</a> 人。';
$string['numawardstat'] = '此勋章已经被授予 {$a} 用户。';
$string['overallcrit'] = '规则符合';
$string['potentialrecipients'] = '潜在的勋章获得者';
$string['recipientdetails'] = '获得者详情';
$string['recipients'] = '勋章获得者';
$string['relative'] = '相对日期';
$string['requiredcourse'] = '课程集授勋规则必须至少选择添加一门课程。';
$string['reviewbadge'] = '查看授勋规则';
$string['reviewconfirm'] = '<p>此操作会检查是否有人满足勋章 \'{$a}\' 所需的条件？</p>
<p>您确定继续吗</p>';
$string['save'] = '保存';
$string['searchname'] = '按名称搜索';
$string['selectaward'] = '请选择您要授予此勋章的用户角色：';
$string['sitebadges'] = '站点勋章';
$string['sitebadges_help'] = '站点勋章只能授予站点级别相关活动的用户。包括完成一个课程集或者是完善一组个人信息项等。站点勋章也可以由一个用户手工授予给另外的用户。

课程相关活动的勋章则只能在课程级别的场合来创建。课程勋章可以在<i>课程设置>勋章</i>中设置。';
$string['status'] = '勋章状态';
$string['status_help'] = '勋章的状态决定了它在系统中的表现：

* **启用** – 表示此勋章可以被用户获得。此时勋章的授勋规则不能被更改。

* **禁用** – 表示此勋章既不可以被用户获得，也不能手工授予。如果此勋章从未授予给任何人，则它的授勋规则是可以被更改的。

一旦某勋章至少被授予了给一位用户，它自动就被转为 **锁定** 状态。已经被锁定的勋章仍然可以被用户获得，但它们的授勋规则就再不能被更改了。如果您想要修改一个被锁定的勋章，您可以复制它，然后再对复制品做所需的更改。

*为何我们要锁定勋章呢？*

我们需要保证所有的人在符合相同的条件情况下，都应当平等地获得勋章。而当前已经授予的勋章是无法被收回的。如果我们一直允许勋章的授勋规则被更改，则很有可能最终导致具备并不一致条件的人获得相同的勋章。';
$string['statusmessage_0'] = '此勋章还没有启用，请先启用它。';
$string['statusmessage_1'] = '此勋章已经启用。如果需要再修改，请先禁用它。';
$string['statusmessage_2'] = '此勋章还没启用，同时它的授勋规则也已经被锁定。
如果您希望用户能获得此勋章，则请先启用它。';
$string['statusmessage_3'] = '此勋章已经启用，故它的授勋规则已经被锁定。';
$string['subject'] = '标题';
$string['variablesubstitution'] = '在消息中的替换变量';
$string['variablesubstitution_help'] = '在设置勋章消息时，可以将某些变量插入到消息标题和消息内容当中，这些变量在该消息发送出去的时候会被替换成相关的真实数据。这些变量在插入的时候必须严格按下面的格式进行填写。下面列出可以使用的变量及其使用格式：

%badgename%
：此变量将会被替换成勋章的全名。

%username%
：此变量将会被替换成获得勋章用户的全名。

%badgelink%
：此变量将会被替换成授勋机构的URL网址。';
$string['viewbadge'] = '查看授予的勋章';
$string['visible'] = '可见';
$string['warnexpired'] = '（此勋章已过期！）';
$string['year'] = '年';
