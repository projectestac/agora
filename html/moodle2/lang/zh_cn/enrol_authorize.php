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
 * Strings for component 'enrol_authorize', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = '接受哪种信用卡？';
$string['adminaccepts'] = '请选择允许的支付方式和类型';
$string['adminauthorizeccapture'] = '订单概览和预定获取设置';
$string['adminauthorizeemail'] = 'Email发送设置';
$string['adminauthorizesettings'] = 'Authorize.net商用账号设置';
$string['adminauthorizewide'] = '通用设置';
$string['adminconfighttps'] = '为了使用这个插件，请确认您已经在<br/>管理 >> 变量 >> 安全 >> HTTP 安全中“<a href="{$a->url}">打开以 https 方式登录</a>”。';
$string['adminconfighttpsgo'] = '请到<a href="{$a->url}">安全页面</a>配置这个插件。';
$string['admincronsetup'] = 'cron.php 维护脚本至少已经24个小时没有运行了。 <br />如果您想使用预定获取功能，那么Cron 必须被激活<br /><b>启用</b> “Authorize.Net 插件”和正确<b>设置cron</b>；或者再次<b>取消an_review</b>。<br />如果您不使用预定获取, 事务会被取消，除非您在30天内回顾它们。<br />选择<b>an_review</b>并输入<b>“0”给an_capture_day</b><br />如果您想<b>手动的</b>在30天内接受/拒绝付费。';
$string['adminemailexpiredsort'] = '当过期的待定订单的数量通过email发送给教师的时候，哪个是重要的？';
$string['adminemailexpiredsortcount'] = '订单数量';
$string['adminemailexpiredsortsum'] = '总数';
$string['adminemailexpsetting'] = '(0=不发送email, 缺省=2, 最大指=5)<br />(手动设置发送email: cron=有效的, an_review=已检查的, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = '预定获取日期';
$string['adminhelpreviewtitle'] = '订单回顾';
$string['adminneworder'] = '亲爱的管理员，

您已经接受到了一个新的未决的订单：

订单ID：{$a->orderid}

交易ID：{$a->transid}

用户：{$a->user}

课程：{$a->course}

数量：{$a->amount}

确定获取激活？：{$a->acstatus}

如果预定获取激活信用卡将会获取{$a->captureon}

然后学生就可以登陆到课程，否则{$a->expireon}将会终止从这天起不能获取。

您也可以接受/拒绝为在这个链界{$a->url}立即以学生身份登陆付费';
$string['adminnewordersubject'] = '{$a->course}：未处理的新订单：({$a->orderid})';
$string['adminpendingorders'] = '您已经禁用了预取功能。<br />共有 {$a->count} 条处于“Authorized/等待”状态的事务将被放弃，除非您选择它们。<br />要接受/拒收支付，到<a href=\'{$a->url}\'>支付管理</a>页面。';
$string['adminteachermanagepay'] = '教师可以管理课程的付费';
$string['allpendingorders'] = '全部待处理订单';
$string['amount'] = '数量';
$string['anauthcode'] = '获取验证码';
$string['anauthcodedesc'] = '如果用户的信用卡不能在因特网上直接获取，从用户的银行获取手机验证码';
$string['anavs'] = '地址验证系统';
$string['anavsdesc'] = '如果您的 Authorize.Net merchant 帐户中已激活地址验证系统，请选择这项。这会要求用户在填写支付表格时填写地址信息，如街道，州，国家以及邮政编码等。';
$string['ancaptureday'] = '获取的日期';
$string['ancapturedaydesc'] = '自动捕获信用卡，除非老师或管理员审查指定天数之内的订单。必须启用CRON。 <br /> （0天，意味着它会禁用预定捕获，也意味着教师或管理员需要手动审查订单。如果您禁用了预定捕获，或这您没有在30天内审查，那么交易将被取消。）';
$string['anemailexpired'] = '超期通知';
$string['anemailexpireddesc'] = '这对手动捕获很有帮助，管理员会被通知订单到期前指定的天数。';
$string['anemailexpiredteacher'] = '超期通知-教师';
$string['anemailexpiredteacherdesc'] = '如果您已启用手动捕获（见上文），教师可以管理付款，他们也可能被通知有关订单到期。这将给每门课程的教师发送一封电子邮件，关于订单到期的数量。';
$string['anlogin'] = 'Authorize.net：用户名';
$string['anpassword'] = 'Authorize.net：密码';
$string['anreferer'] = 'Referer';
$string['anrefererdesc'] = '定义参考的链接，如果您已经设置了Authorize.Net商业帐户。这将在Web请求中发送一行“Referer：URL”。';
$string['anreview'] = '审查';
$string['anreviewdesc'] = '在处理信用卡交易之前，重新查看定单。';
$string['antestmode'] = '测试模式';
$string['antestmodedesc'] = '仅以测试模式进行交易（没有钱的流出）';
$string['antrankey'] = 'Authorize.Net：交易密钥';
$string['approvedreview'] = '已核查的回顾';
$string['authcaptured'] = '经授权的/夺取的';
$string['authcode'] = '验证码';
$string['authorize:config'] = '配置Authorize.Net选课实例';
$string['authorizedpendingcapture'] = '已授权/未决的获取';
$string['authorizeerror'] = 'Authorize.Net 错误: {$a}';
$string['authorize:manage'] = '管理已选课用户';
$string['authorize:managepayments'] = '管理支付';
$string['authorize:unenrol'] = '从课程取消用户选课';
$string['authorize:unenrolself'] = '撤销自己的选课';
$string['authorize:uploadcsv'] = '上传 CSV 文件';
$string['avsa'] = '地址匹配，邮政编码不匹配';
$string['avsb'] = '没有提供地址信息';
$string['avse'] = '地址确认系统出现错误';
$string['avsg'] = '非美国银行发行的卡';
$string['avsn'] = '地址和邮政编码都不匹配';
$string['avsp'] = '地址确认系统不可用';
$string['avsr'] = '重试- 系统不可用或者超时';
$string['avsresult'] = 'AVS 结果：{$a}';
$string['avss'] = '服务不被发行者支持';
$string['avsu'] = '地址信息不能获取';
$string['avsw'] = '9位邮政编码匹配，地址不匹配';
$string['avsx'] = '地址和9位邮政编码都匹配';
$string['avsy'] = '地址和5位邮政编码都匹配';
$string['avsz'] = '5位邮政编码匹配，地址不匹配';
$string['canbecredit'] = '可以归还给 {$a->upto}';
$string['cancelled'] = '取消';
$string['capture'] = '获取';
$string['capturedpendingsettle'] = '获取/等待解决';
$string['capturedsettled'] = '获取/解决';
$string['captureyes'] = '请确定信用卡将被获取，学生可以登陆到课堂中';
$string['cccity'] = '城市';
$string['ccexpire'] = '过期时间';
$string['ccexpired'] = '信用卡已过期';
$string['ccinvalid'] = '无效卡号';
$string['cclastfour'] = 'CC后四位';
$string['ccno'] = '信用卡号';
$string['ccstate'] = '州';
$string['cctype'] = '信用卡类型';
$string['ccvv'] = '卡校验码';
$string['ccvvhelp'] = '查看卡背面(最后3个数字)';
$string['choosemethod'] = '如果您知道课程的选课密码，请输入；<br />否则请您先支付课程费用。';
$string['chooseone'] = '填写下面字段里的一个或全部';
$string['cost'] = '花费';
$string['costdefaultdesc'] = '<strong>在课程设置中，输入 -1</strong> 用这个缺省价格作为课程价格字段。';
$string['currency'] = '货币';
$string['cutofftime'] = '截止时间';
$string['cutofftimedesc'] = '交易截止时间，当要达成最后一笔交易？';
$string['dataentered'] = '资料登记';
$string['delete'] = '销毁';
$string['description'] = 'Authorize.net 允许您通过信用卡提供商设置付费课程。如果课程的价格为零，则学生无需为其付费。此处您需要为整个站点设定一个缺省的价格，而在课程的设置中您可以为每一个课程单独设定。为每个课程单独设定的价格的优先级更高。';
$string['echeckabacode'] = '银行 ABA 号';
$string['echeckaccnum'] = '银行帐号';
$string['echeckacctype'] = '银行帐户类型';
$string['echeckbankname'] = '银行名';
$string['echeckbusinesschecking'] = '交易核查';
$string['echeckchecking'] = '核查';
$string['echeckfirslasttname'] = '银行账户持有者';
$string['echecksavings'] = '存款';
$string['enrolenddate'] = '结束日期';
$string['enrolenddaterror'] = '加入课程状态的结束日期不能早于开始日期';
$string['enrolname'] = 'Authorize.net支付网关';
$string['enrolperiod'] = '选课期限';
$string['enrolstartdate'] = '起始日期';
$string['expired'] = '终止';
$string['expiremonth'] = '过期月份';
$string['expireyear'] = '过期年份';
$string['firstnameoncard'] = '卡上的名';
$string['haveauthcode'] = '我已经获得了验证码';
$string['howmuch'] = '多少？';
$string['httpsrequired'] = '我很抱歉地告诉您，目前还无法处理您的请求。这个站点的配置有错误。
<br /><br />
除非您看到您浏览器的底部出钱一个黄色的小锁，否则请不要输入您的信用卡号。这个锁表示客户端和服务器之间的通信将会被加密，从而保证两台电脑之间的通信会受到保护，以确保您的信用卡号不会泄漏。';
$string['invalidaba'] = '无效的 ABA 号';
$string['invalidaccnum'] = '无效的帐号';
$string['invalidacctype'] = '无效的帐户类型';
$string['isbusinesschecking'] = '是商业订单吗？';
$string['lastnameoncard'] = '卡上的姓';
$string['logindesc'] = '您可以设定变量/安全中的<a href="{$a->url}">loginhttps</a>选项。
<br /><br />
将此选项开启会让 Moodle 在登录和付费时使用安全的 https 链接。';
$string['logininfo'] = '在配置您的Authorize.Net账号时，必须提供登录用户名，并且您必须在正确的位置输入交易密钥<strong>或者</strong>密码。出于安全考量，我们建议您输入交易密钥。';
$string['messageprovider:authorize_enrolment'] = 'Authorize.Net 选课消息';
$string['methodcc'] = '信用卡';
$string['methodccdesc'] = '选择信用卡，下面是可使用的类型';
$string['methodecheck'] = '电子核查 (ACH)';
$string['methodecheckdesc'] = '选择 eCheck，下面是可使用的类型';
$string['missingaba'] = '缺少 ABA 号';
$string['missingaddress'] = '缺少地址';
$string['missingbankname'] = '缺少银行名字';
$string['missingcc'] = '缺少卡号';
$string['missingccauthcode'] = '缺少验证码';
$string['missingccexpiremonth'] = '过期月份缺失';
$string['missingccexpireyear'] = '过期年份缺失';
$string['missingcctype'] = '缺少卡的类型';
$string['missingcvv'] = '缺少确认号码';
$string['missingzip'] = '缺少邮政编码';
$string['mypaymentsonly'] = '只显示我的支付';
$string['nameoncard'] = '卡所属人姓名';
$string['new'] = '新的';
$string['nocost'] = '通过Authorize.Net加入本课程没有费用！';
$string['noreturns'] = '没有返回';
$string['notsettled'] = '没有设置';
$string['orderdetails'] = '订单详情';
$string['orderid'] = '订购 ID';
$string['paymentmanagement'] = '支付管理';
$string['paymentmethod'] = '支付方式';
$string['paymentpending'] = '您对这个课程的支付的订购号码为{$a->orderid}，看See <a href=\'{$a->url}\'>订购细节</a>.';
$string['pendingecheckemail'] = '亲爱的经理，

     现在这里有{$a->count}未确定的电子核查，您需要上传CSV文件来获得用户们的登记。';
$string['pendingechecksubject'] = '点击链接，并且阅读页面的帮助文件看到：
{$a->url}
{$a->course}: 未确定的电子核查({$a->count})';
$string['pendingordersemail'] = '亲爱的管理员，

 您需要在{$a->days}天内接受支付否则{$a->pending}交易将过期

这是一个警告信息，因为您没能预定获取。这意味着您需要手动的接受或者拒绝。

接受/拒绝制服在{$a->url}

在{$a->enrolurl}开启预定获取，这意味着您将不会再收到警告邮件';
$string['pendingordersemailteacher'] = '亲爱的老师，

{$a->pending} 交易花费{$a->currency} {$a->sumcost} 课程的 "{$a->course}"
将期满除非您可以在{$a->days}天内支付。';
$string['pendingorderssubject'] = '警告：{$a->course}, {$a->pending} 定制将在{$a->days天}内期满。';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = '一个交易备份已经被提交';
$string['reason13'] = '商业登陆ID有问题或帐号不正确';
$string['reason16'] = '没有找到交易';
$string['reason17'] = '不接受这种格式的信用卡';
$string['reason245'] = '当使用网关主机支付方式付款的时候，不允许这种电子核查类型。';
$string['reason246'] = '不允许这种电子核查类型';
$string['reason27'] = '交易结果出现AVS错误。提供的地址不能与持卡人的地址相匹配';
$string['reason28'] = '不接受这种类型的信用卡';
$string['reason30'] = '处理器的配置有问题。联系商业服务的提供者。';
$string['reason39'] = '提供的流通代码或者是有问题的，不被支持的，不被允许的或者是没有兑换率';
$string['reason43'] = '在处理器中错误的建立了店主。联系商业服务的提供者。';
$string['reason44'] = '此交易被拒绝。卡代码过滤错误！';
$string['reason45'] = '此交易被拒绝。卡代码/AVS 过滤错误！';
$string['reason47'] = '需要解决的数量不应该大于最初设定的数目';
$string['reason5'] = '需要一个有效的数目';
$string['reason50'] = '交易正在等待解决不能退回';
$string['reason51'] = '这个交易的所有的信用数目大于设定的交易数目';
$string['reason54'] = '交易不标准因为信用卡';
$string['reason55'] = '信用的数目与参考交易相比超过了原定的数量';
$string['reason56'] = '这个商店只接收电子核查（ACH）交易；不接收信用卡交易。';
$string['refund'] = '偿还';
$string['refunded'] = '已偿还';
$string['returns'] = '返回';
$string['reviewfailed'] = '回顾失败';
$string['reviewnotify'] = '您的支付将被回复，几天内您的老师回给您一封邮件';
$string['sendpaymentbutton'] = '发送付费信息';
$string['settled'] = '固定的';
$string['settlementdate'] = '固定日期';
$string['shopper'] = '顾客';
$string['status'] = '启用Authorize.Net选课';
$string['subvoidyes'] = '请确认归还交易 {$a->transid} 将被取消，您的帐户将有 {$a->amount}';
$string['tested'] = '测试';
$string['testmode'] = '[测试模式]';
$string['testwarning'] = '获取/空的/信用工作在测试模式，但是数据库中没有更新记录';
$string['transid'] = '交易 ID';
$string['underreview'] = '回顾中';
$string['unenrolselfconfirm'] = '您确定要撤销您自己对“{$a}”课程的选课吗？';
$string['unenrolstudent'] = '未登记学生？';
$string['uploadcsv'] = '上传 CSV 文件';
$string['usingccmethod'] = '登记使用<a href="{$a->url}"><strong>信用卡</strong></a>';
$string['usingecheckmethod'] = '登记使用<a href="{$a->url}"><strong>电子核查</strong></a>';
$string['verifyaccount'] = '验证您的 Authorize.Net merchant 帐户';
$string['verifyaccountresult'] = '<br>验证结果：</br>{$a}';
$string['void'] = '空的';
$string['voidyes'] = '此处理将被取消。您确定吗？';
$string['welcometocoursesemail'] = '亲爱的同学，
感谢您的付款。您已经注册了这些课程：

{$a->courses}

您可以编辑个人资料：
{$a->profileurl}

您可以查看您的付款细目:
${a->paymenturl}';
$string['youcantdo'] = '您不能做这部分: {$a->action}';
$string['zipcode'] = '邮政编码';
