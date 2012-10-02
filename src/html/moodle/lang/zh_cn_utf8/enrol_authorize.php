<?PHP // $Id$ 
      // enrol_authorize.php - created with Moodle 1.9.5 (Build: 20090520) (2007101550)


$string['adminacceptccs'] = '接受哪种信用卡？';
$string['adminaccepts'] = '请选择允许的支付方式和类型';
$string['adminauthcode'] = '如果用户的信用卡在互联网上不能直接识别，那么用户将通过所在银行的电话获得验证码。';
$string['adminauthorizeccapture'] = '定制复习&预定获取设置';
$string['adminauthorizeemail'] = '电子邮件发送设置';
$string['adminauthorizesettings'] = 'Authorize.net 设置';
$string['adminauthorizewide'] = '站点宽度设定';
$string['adminavs'] = '检查您是否激活了地址确认系统在您的 authorize.net。这需要像公路、州、国家一样的地址域和当用户填写支付单后压缩。';
$string['adminconfighttps'] = '为了使用这个插件，请确认您已经在<br/>管理 >> 变量 >> 安全 >> HTTP 安全中“<a href=\"{$a->url}\">打开以 https 方式登录</a>”。';
$string['adminconfighttpsgo'] = '请到<a href=\"{$a->url}\">安全页面</a>配置这个插件。';
$string['adminemailexpiredsort'] = '当过期的待定订单的数量通过电子邮件发送给教师的时候，哪个是重要的？';
$string['adminemailexpiredsortcount'] = '订单数量';
$string['adminemailexpiredsortsum'] = '总数';
$string['adminemailexpiredteacher'] = '如果您启动手工激活（见上面）并且教师能够管理支付，教师们将收到 E-mail，通知他们将过期的待定订单的数量。';
$string['adminemailexpsetting'] = '(0=不发送email, 缺省=2, 最大指=5)<br />(手动设置发送电子邮件: cron=有效的, an_review=已检查的, an_capture_day=0, an_emailexpired=1-5)';
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
$string['adminnewordersubject'] = '$a->course：新的未决的定制($a->orderid)';
$string['adminpendingorders'] = '您已经不能预定获取的作用<br />总的{$a->count}';
$string['adminreview'] = '处理信用卡前回顾订购';
$string['adminteachermanagepay'] = '教师可以管理课程的付费';
$string['allpendingorders'] = '全部代定的定制';
$string['amount'] = '数量';
$string['anlogin'] = 'Authorize.net: 用户名';
$string['anpassword'] = 'Authorize.net: 密码 (非必须)';
$string['anreferer'] = '如果您正用您在 authorize.net 的帐号进行设置，请在此输入referer URL，在发送Web请求时将其以“Referer: URL”形式作为头信息发送。';
$string['antestmode'] = 'Authorize.net: 测试交易';
$string['antrankey'] = 'Authorize.net: 交易密钥';
$string['approvedreview'] = '已核查的回顾';
$string['authcaptured'] = '经授权的/夺取的';
$string['authcode'] = '验证码';
$string['authorize:managepayments'] = '管理支付';
$string['authorize:uploadcsv'] = '上传 CSV 文件';
$string['authorizedpendingcapture'] = '经授权的/未决的获取';
$string['avsa'] = '地址匹配，邮政编码不匹配';
$string['avsb'] = '没有提供地址信息';
$string['avse'] = '地址确认系统出现错误';
$string['avsg'] = '没有发行的美国银行卡';
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
$string['ccexpire'] = '过期时间';
$string['ccexpired'] = '信用卡已过期';
$string['ccinvalid'] = '无效卡号';
$string['ccno'] = '信用卡号';
$string['cctype'] = '信用卡类型';
$string['ccvv'] = 'CV2';
$string['ccvvhelp'] = '查看卡背面(最后3个数字)';
$string['choosemethod'] = '如果您知道课程的选课密码，请输入；否则请您先支付课程费用。';
$string['chooseone'] = '填写下面字段里的一个或全部';
$string['costdefaultdesc'] = '<strong>在课程设置中，输入 -1</strong> 用这个缺省价格作为课程价格字段。';
$string['cutofftime'] = '处理定点时间。上次的处理在设置中不存在了';
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
$string['enrolname'] = 'Authorize.net 信用卡网关';
$string['expired'] = '终止';
$string['haveauthcode'] = '我已经获得了验证码';
$string['howmuch'] = '多少？';
$string['httpsrequired'] = '我很抱歉地告诉您，目前还无法处理您的请求。这个站点的配置有错误。
<br /><br />
除非您看到您浏览器的底部出钱一个黄色的小锁，否则请不要输入您的信用卡号。这个锁表示客户端和服务器之间的通信将会被加密，从而保证两台电脑之间的通信会受到保护，以确保您的信用卡号不会泄漏。';
$string['invalidaba'] = '无效的 ABA 号';
$string['invalidaccnum'] = '无效的帐号';
$string['invalidacctype'] = '无效的帐户类型';
$string['logindesc'] = '您可以设定变量/安全中的<a href=\"$a->url\">loginhttps</a>选项。
<br /><br />
将此选项开启会让 Moodle 在登录和付费时使用安全的 https 链接。';
$string['logininfo'] = '出于安全考量，登录名、密码和交易密钥并没有显示。如果您以前已经配置了这些字段，就不用再次输入了。在已经配置的字段的输入框的左边会看到绿色文字。如果您是第一次输入这些字段，登录名（*）是必需的，并且您必须在正确的位置输入交易密钥<strong>或者</strong>密码（#2）。出于安全考量，我们建议您输入交易密钥。如果您想删除当前密码，选择这个复选框。';
$string['methodcc'] = '信用卡';
$string['methodecheck'] = '电子核查 (ACH)';
$string['missingaba'] = '缺少 ABA 号';
$string['missingaddress'] = '缺少地址';
$string['missingbankname'] = '缺少银行名字';
$string['missingcc'] = '缺少卡号';
$string['missingccauthcode'] = '缺少验证码';
$string['missingccexpire'] = '缺少终止日期';
$string['missingcctype'] = '缺少卡的类型';
$string['missingcvv'] = '缺少确认号码';
$string['missingzip'] = '缺少邮政编码';
$string['mypaymentsonly'] = '只显示我的支付';
$string['nameoncard'] = '卡所属人姓名';
$string['new'] = '新的';
$string['noreturns'] = '没有返回';
$string['notsettled'] = '没有设置';
$string['orderid'] = '订购 ID';
$string['paymentmanagement'] = '支付管理';
$string['paymentmethod'] = '支付方式';
$string['paymentpending'] = '您对这个课程的支付的订购号码为{$a->orderid}，看See <a href=\'$a->url\'>订购细节</a>.';
$string['pendingecheckemail'] = '亲爱的经理，

     现在这里有$a->count未确定的电子核查，您需要上传CSV文件来获得用户们的登记。';
$string['pendingechecksubject'] = '点击链接，并且阅读页面的帮助文件看到：
$a->url
$a->course: 未确定的电子核查($a->count)';
$string['pendingordersemail'] = '亲爱的管理员，

 您需要在{$a->days}天内接受支付否则{$a->pending}交易将过期

这是一个警告信息，因为您没能预定获取。这意味着您需要手动的接受或者拒绝。

接受/拒绝制服在{$a->url}

在{$a->enrolurl}开启预定获取，这意味着您将不会再收到警告邮件';
$string['pendingordersemailteacher'] = '亲爱的老师，

$a->pending 交易花费$a->currency $a->sumcost 课程的 \"$a->course\"
将期满除非您可以在$a->days天内支付。';
$string['pendingorderssubject'] = '警告：$a->course, $a->pending 定制将在{$a->days天}内期满。';
$string['reason11'] = '一个交易备份已经被提交';
$string['reason13'] = '商业登陆ID有问题或帐号不正确';
$string['reason16'] = '没有找到交易';
$string['reason17'] = '不接受这种格式的信用卡';
$string['reason245'] = '当使用网关主机支付方式付款的时候，不允许这种电子核查类型。';
$string['reason246'] = '不允许这种电子核查类型';
$string['reason27'] = '交易结果出现AVS错误。提供的地址不能与持卡人的地址相匹配';
$string['reason28'] = '不接受这种类型的信用卡';
$string['reason30'] = '处理器的构造有问题。联系商业服务器的提供者';
$string['reason39'] = '提供的流通代码或者是有问题的，不被支持的，不被允许的或者是没有兑换率';
$string['reason43'] = '在处理器中错误的建立了店主。联系商业服务器的提供者';
$string['reason44'] = '此交易被拒绝。卡码错误';
$string['reason45'] = '此交易被拒绝。卡码/AVS错误';
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
$string['reviewday'] = '自动获取信用卡除非教师或者管理员在<b>$a</b>天内回顾命令。<strong>必须激活 cron。</strong><br />（0 天意味着预定获取将失去作用，还表示老师或管理员需要手动的重复命令。如果预定获取失去作用交易将取消除非您在30天内回顾它）';
$string['reviewfailed'] = '回顾失败';
$string['reviewnotify'] = '您的支付将被回复，几天内您的老师回给您一封邮件';
$string['sendpaymentbutton'] = '发送付费信息';
$string['settled'] = '固定的';
$string['settlementdate'] = '固定日期';
$string['subvoidyes'] = '请确认归还交易 {$a->transid} 将被取消，您的帐户将有 {$a->amount}';
$string['tested'] = '测试';
$string['testmode'] = '[测试模式]';
$string['testwarning'] = '获取/空的/信用工作在测试模式，但是数据库中没有更新记录';
$string['transid'] = '交易 ID';
$string['underreview'] = '回顾中';
$string['unenrolstudent'] = '未登记学生？';
$string['uploadcsv'] = '上传 CSV 文件';
$string['usingccmethod'] = '登记使用<a href=\"$a->url\"><strong>信用卡</strong></a>';
$string['usingecheckmethod'] = '登记使用<a href=\"$a->url\"><strong>电子核查</strong></a>';
$string['void'] = '空的';
$string['voidyes'] = '请确定处理将被取消';
$string['welcometocoursesemail'] = '亲爱的同学，
感谢您的付款。您已经注册了这些课程：

{$a->courses}

您可以编辑个人资料：
{$a->profileurl}

您可以查看您的付款细目:
${a->paymenturl}';
$string['youcantdo'] = '您不能做这部分: {$a->action}';
$string['zipcode'] = '邮政编码';

?>
