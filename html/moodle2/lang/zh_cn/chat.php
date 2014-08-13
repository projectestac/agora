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
 * Strings for component 'chat', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['ajax'] = '使用Ajax的版本';
$string['autoscroll'] = '自动滚屏';
$string['beep'] = '呼叫';
$string['cantlogin'] = '无法登录到聊天室！！';
$string['chat:addinstance'] = '添加新聊天室';
$string['chat:chat'] = '进入聊天室';
$string['chat:deletelog'] = '删除聊天日志';
$string['chat:exportparticipatedsession'] = '导出您参加过的聊天会话';
$string['chat:exportsession'] = '导出所有聊天会话';
$string['chatintro'] = '简要描述';
$string['chatname'] = '聊天室名称';
$string['chat:readlog'] = '阅读聊天日志';
$string['chatreport'] = '聊天话题';
$string['chat:talk'] = '发言';
$string['chattime'] = '聊天开始时间';
$string['configmethod'] = 'Ajax聊天方式提供一个基于ajax的聊天界面，它与服务器持续通讯，保持更新。普通聊天室方式让客户端周期地连接服务器以获取更新。这种方式无需任何配置便可在所有环境下工作，但当很多人一起聊天时会给服务器带来极大负荷。使用聊天服务器程序需要访问 Unix 的 Shell，但却可以得到一个快速而稳定的聊天环境。';
$string['confignormalupdatemode'] = '聊天室更新可以使用 HTTP 1.1 的 <em>Keep-Alive</em> 特性而高效地服务，但事实上这样仍然给服务器带来很大的负荷。更好的方法是使用 <em>Stream</em> 来满足更新需求。使用 <em>Stream</em> 的方式会带来很大的改善（类似chatd方式），但是您的服务器可能并不支持。';
$string['configoldping'] = '用户多久(秒)不发言被认为是离开了？这只是一个上限，通常用户的离开是可以马上被检测到的。您可以根据需要设置较低的值，但如果您使用普通聊天方式，那么<strong>永远不要</strong>让它低于 2*chat_refresh_room';
$string['configrefreshroom'] = '多长时间(秒)聊天室自动刷新一次。此值设得短一些会使聊天室响应更快，但当很多人同时聊天时，可能给服务器带来较大负荷。如果您在使用<em>Stream</em>更新，那么可以选择更高的刷新频率——试试2。';
$string['configrefreshuserlist'] = '用户列表自动刷新时间(秒)';
$string['configserverhost'] = '运行聊天室服务器的计算机的域名';
$string['configserverip'] = '与上面的域名相对应的 IP 地址';
$string['configservermax'] = '最多允许多少客户端';
$string['configserverport'] = '服务器上聊天室进程所使用的端口';
$string['currentchats'] = '当前话题';
$string['currentusers'] = '当前用户';
$string['deletesession'] = '删除该主题';
$string['deletesessionsure'] = '确定删除该主题吗?';
$string['donotusechattime'] = '不显示聊天时间';
$string['enterchat'] = '进入聊天室';
$string['entermessage'] = '输入您的信息';
$string['errornousers'] = '没有用户';
$string['explaingeneralconfig'] = '这些设置会被<strong>永久</strong>使用';
$string['explainmethoddaemon'] = '这些设置<strong>只有</strong>在您选择了“聊天室服务器进程”的聊天模式时才会有效';
$string['explainmethodnormal'] = '这些设置<strong>只有</strong>在您选择了“普通方式”的聊天模式时才会有效';
$string['generalconfig'] = '常规设置';
$string['idle'] = '空闲';
$string['inputarea'] = '输入区';
$string['invalidid'] = '找不到聊天室！';
$string['list_all_sessions'] = '列出所有会话。';
$string['list_complete_sessions'] = '列出刚结束的会话。';
$string['listing_all_sessions'] = '列出所有会话。';
$string['messagebeepseveryone'] = '{$a}呼叫所有人！';
$string['messagebeepsyou'] = '{$a}刚刚呼叫您！';
$string['messageenter'] = '{$a}刚刚进入聊天室';
$string['messageexit'] = '{$a}已退出聊天室';
$string['messages'] = '消息';
$string['messageyoubeep'] = '您呼叫了{$a}';
$string['method'] = '聊天方式';
$string['methodajax'] = 'Ajax方式';
$string['methoddaemon'] = '聊天室服务器进程';
$string['methodnormal'] = '普通方式';
$string['modulename'] = '聊天';
$string['modulename_help'] = '在聊天室模块中，参与者可以通过web进行实时、同步的讨论。与异步的讨论区相比，聊天室模式完全不同，对增进了解、深入话题很有帮助。';
$string['modulenameplural'] = '聊天';
$string['neverdeletemessages'] = '不删除聊天记录';
$string['nextsession'] = '下一个议定主题';
$string['nochat'] = '无聊天记录';
$string['no_complete_sessions_found'] = '未找到已结束的会话。';
$string['noguests'] = '此聊天室不对访客开放';
$string['nomessages'] = '无消息';
$string['nopermissiontoseethechatlog'] = '没有查看聊天历史的权限。';
$string['normalkeepalive'] = '保持在线';
$string['normalstream'] = '流';
$string['noscheduledsession'] = '无固定的主题';
$string['notallowenter'] = '您不能进入此聊天室。';
$string['notlogged'] = '您没有登录！';
$string['oldping'] = '断开时间';
$string['page-mod-chat-x'] = '任意聊天模块页面';
$string['pastchats'] = '过去聊天的会话';
$string['pluginadministration'] = '聊天室管理员';
$string['pluginname'] = '聊天';
$string['refreshroom'] = '刷新聊天室';
$string['refreshuserlist'] = '刷新用户列表';
$string['removemessages'] = '删除所有消息';
$string['repeatdaily'] = '每天的此刻';
$string['repeatnone'] = '不重复';
$string['repeattimes'] = '重复时间';
$string['repeatweekly'] = '每周的此刻';
$string['saidto'] = '对';
$string['savemessages'] = '保存聊天记录的时间';
$string['seesession'] = '查看聊天记录';
$string['send'] = '发送';
$string['sending'] = '正在发送';
$string['serverhost'] = '服务器名称';
$string['serverip'] = '服务器 IP';
$string['servermax'] = '最大用户数';
$string['serverport'] = '服务器端口';
$string['sessions'] = '聊天记录';
$string['sessionstart'] = '聊天会话开始时间：{$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = '是否所有人都可查看聊天记录';
$string['studentseereports_help'] = '如果选否，那么只有具有mod/chat:readlog权限的用户可以看到聊天历史';
$string['talk'] = '交谈';
$string['updatemethod'] = '更新方式';
$string['updaterate'] = '更新速率：';
$string['userlist'] = '用户列表';
$string['usingchat'] = '使用聊天室';
$string['usingchat_help'] = '聊天室模块提供了一些功能以让聊天更加有趣。

* 笑脸 - 所有可以在Moodle中其它地方使用的笑脸(表情)都可以在此使用，例如，:-)
* 链接 - 网站地址会自动被转换为链接
* 表演 - 在行首添加“/me”或者“:”可以将这行变成动作描述。例如，假设您叫柱子，那么您输入了“:手舞足蹈！”或者“/me 手舞足蹈！”，则所有人都会看到“柱子手舞足蹈！”</dd>
* 呼叫 - 您可以通过点击别人姓名旁的“呼叫”链接发送一个声音给他。要想一下子呼叫所有的人，可以输入“beep all”
* HTML - 如果您知道如何使用HTML，您可以使用它们，这样就可以插入图片、播放声音或者创建不同颜色的文字';
$string['viewreport'] = '查看聊天记录';
