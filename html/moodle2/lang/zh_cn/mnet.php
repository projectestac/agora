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
 * Strings for component 'mnet', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = '关于您的服务器';
$string['accesslevel'] = '访问级别';
$string['addhost'] = '添加主机';
$string['addnewhost'] = '添加新主机';
$string['addtoacl'] = '添加到访问控制';
$string['allhosts'] = '全部主机';
$string['allhosts_no_options'] = '查看多台主机时无可用选项';
$string['allow'] = '允许';
$string['applicationtype'] = '应用类型';
$string['authfail_nosessionexists'] = '认证失败：mnet会话不存在';
$string['authfail_sessiontimedout'] = '认证失败：mnet会话超时';
$string['authfail_usermismatch'] = '认证失败：用户不匹配';
$string['authmnetdisabled'] = 'MNet认证插件已<strong>禁用</strong>。';
$string['badcert'] = '无效的证书';
$string['certdetails'] = '认证细节';
$string['configmnet'] = 'MNet支持此服务器与其它服务器或服务之间的通讯。';
$string['couldnotgetcert'] = '在<br />{$a}. <br />上没发现证书，主机可能关闭或者配置不正确。';
$string['couldnotmatchcert'] = '与当前web服务器发布的证书不匹配。';
$string['courses'] = '课程';
$string['courseson'] = '课程在';
$string['currentkey'] = '当前公共密钥';
$string['current_transport'] = '当前传输';
$string['databaseerror'] = '不能将细节写入数据库';
$string['deleteaserver'] = '删除服务器';
$string['deletedhostinfo'] = '此主机已删除。如果您想恢复它，就把删除状态改为“否”。';
$string['deletedhosts'] = '已删除主机：{$a}';
$string['deletehost'] = '删除主机';
$string['deletekeycheck'] = '确定删除该密钥吗？';
$string['deleteoutoftime'] = '删除密钥超过60秒，请重新操作。';
$string['deleteuserrecord'] = 'SSO ACL：删除{$a->host}中\'{$a->user}\'的记录。';
$string['deletewrongkeyvalue'] = '错误。如果不删除您服务器上的SSL密钥，您的服务器可能成为攻击的目标。';
$string['deny'] = '拒绝';
$string['description'] = '描述';
$string['duplicate_usernames'] = '错误的在用户表中创建了“mnethostid”和“username”。<br />当您<a href="{$a}" target="_blank">在用户表中分配用户名的时候</a>.<br />更新应该完全成功。点击上面的链接，问题页将打开，可以在更新後看到。<br />';
$string['enabled_for_all'] = '（服务器可以供所有主机使用）';
$string['enterausername'] = '请键入一个用户名，或者通过英文半角逗号分隔的用户列表。';
$string['error7020'] = '当远程站点为您的错误主机头wwwroot创建一条记录，通常就会发生错误。例如，用http://yoursite.com代替http://www.yoursite.com。您应该与远程站点管理员联系，让他更新您的主机信息（在config.php中指定）。';
$string['error7022'] = '您发往远程网站的消息已成功加密，但未签名。这不符合预期；如果发生此事，您应该发布一个bug（在问题中提供应用版本等尽可能多的信息';
$string['error7023'] = '远程站点尝试用您站点所提供的所有key解封消息。所有keys都失败，因此可能通过重新键入远程站点的key来手动确认问题。但是这通常不会发生这种情况，除非几个月没有与远程站点通信。';
$string['error7024'] = '您向远程站点发送了一条未加密消息，但是远程站点不接受来自您的未加密通信。这是不期望发生的。';
$string['error7026'] = '您的key与远程主机提供给您的key不同，更进一步说，远程主机尝试获取您当前的key但是失败了。请重新键入与远程主机相符key，然后重试。';
$string['error709'] = '远程站点从您这里获得SSL key失败。';
$string['expired'] = '该密钥过期在';
$string['expires'] = '可利用直到';
$string['expireyourkey'] = '删除该密钥';
$string['expireyourkeyexplain'] = '默认情况下，Moodle 每 28天 自动更换密钥，但是您也可以通过选项<em>手动</em>设置密钥在任何时候过期。只有当您认为这个密钥会危机到服务器的安装的时候才有用，更换将自动生效。<br />如果删除该密钥，其他应用就不能和您的 Moodle 通信。只有您手工通知每个网管并给他们新密钥后才能使用。';
$string['exportfields'] = '导出字段';
$string['failedaclwrite'] = '向 MNet 访问控制列表中写入用户“{$a}”失败。';
$string['findlogin'] = '查找登录';
$string['forbidden-function'] = '该函数对RPC不可以用。';
$string['forbidden-transport'] = '试图使用的传输方法不被允许。';
$string['forcesavechanges'] = '强制保存更改';
$string['helpnetworksettings'] = '配置 MNet 通信';
$string['hidelocal'] = '隐藏本地用户';
$string['hideremote'] = '隐藏远程用户';
$string['host'] = '主机';
$string['hostcoursenotfound'] = '未发现主机或课程';
$string['hostdeleted'] = '主机被删除';
$string['hostexists'] = '已有使用此主机名的主机记录（可以删除它）。<a href="{$a">点击这里</a>编辑此记录。';
$string['hostlist'] = '已联网主机列表';
$string['hostname'] = '主机名';
$string['hostnamehelp'] = '完整的远程主机域名，例如：www.example.com';
$string['hostnotconfiguredforsso'] = '此服务器未被配置为可以远程登录。';
$string['hostsettings'] = '主机设置';
$string['http_self_signed_help'] = '允许使用远程主机上自签名的DIY SSL证书建立连接。';
$string['https_self_signed_help'] = '通过在远程主机上使用在PHP中自我签名的DIY SSL来限制连接访问。';
$string['https_verified_help'] = '允许使用远程主机上已验证的SSL证书建立连接。';
$string['http_verified_help'] = '允许使用远程主机上PHP中已验证的SSL证书建立连接，但是使用http协议（而不是https）。';
$string['id'] = 'ID';
$string['idhelp'] = '该值将会自动签名并且不能再更改了。';
$string['importfields'] = '导入字段';
$string['inspect'] = '检查';
$string['installnosuchfunction'] = '源代码错误！正试图从文件（{$a->file}）安装mnet xmlrpc函数（{$a->method}），但它并不存在！';
$string['installnosuchmethod'] = '源代码错误！正试图安装类（{$a->class}）中的mnet xmlrpc函数（{$a->method}），但它并不存在！';
$string['installreflectionclasserror'] = '源代码错误！MNet 反射器调用类“{$a->class}”的“{$a->method}”方法失败。原始错误信息是：“{$a->error}”';
$string['installreflectionfunctionerror'] = '源代码错误！MNet 反射器调用文件“{$a->file}”中的“{$a->method}”函数失败。原始错误信息是：“{$a->error}”';
$string['invalidaccessparam'] = '不可利用的访问参数';
$string['invalidactionparam'] = '不可利用的行动参数';
$string['invalidhost'] = '必须提供一个可利用的主机标识符';
$string['invalidpubkey'] = '该密钥不是一个可利用的SSL密钥';
$string['invalidurl'] = '不可以利用的URL参数';
$string['ipaddress'] = 'IP地址';
$string['is_in_range'] = 'IP地址<code>{$a}</code>代表一个有效的可信主机。';
$string['ispublished'] = '{$a}已经为您启用此服务。';
$string['issubscribed'] = '{$a}正在申请您的主机上的此服务。';
$string['keydeleted'] = '您的密钥已经被成功删除和替换了。';
$string['keymismatch'] = '此主机上您使用的公钥与当前发布的公钥不同。当前发布的公钥是：';
$string['last_connect_time'] = '上次的连接时间';
$string['last_connect_time_help'] = '上次连接到主机的时间';
$string['last_transport_help'] = '上次连接到该主机使用的传输方式。';
$string['leavedefault'] = '使用默认的参数代替';
$string['listservices'] = '服务列表';
$string['loginlinkmnetuser'] = '<br/>如果您是 MNet 远程用户，可以<a href="{$a}">在这里确认email地址</a>，您可能重新定向到登录页面。<br />';
$string['logs'] = '日志';
$string['managemnetpeers'] = '管理同伴';
$string['method'] = '方法';
$string['methodhelp'] = '{$a} 的方法帮助';
$string['methodsavailableonhost'] = '{$a} 的可用方法';
$string['methodsavailableonhostinservice'] = '{$a->host}上可用于{$a->service}的方法';
$string['methodsignature'] = '{$a}的方法签名';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = '连接（达到）3个字符串，返回结果。';
$string['mnetdisabled'] = 'MNet已<strong>禁用</strong>。';
$string['mnetidprovider'] = 'MNet ID 提供者';
$string['mnetidproviderdesc'] = '您可以使用这项功能检索任意您可以登录的链接网站，如果您能提供正确的邮箱地址来匹配您以前使用过的登录用户名。';
$string['mnetidprovidermsg'] = '您应该在 {$a} 登录。';
$string['mnetidprovidernotfound'] = '很抱歉，没有找到更多信息';
$string['mnetlog'] = '日志';
$string['mnetpeers'] = '同伴';
$string['mnetservices'] = '服务';
$string['mnet_session_prohibited'] = '宿主服务器中的用户当前不允许进入到{$a}。';
$string['mnetsettings'] = 'MNet设置';
$string['moodle_home_help'] = '远程主机中MNet应用的主页路径，例如：/moodle/。';
$string['name'] = '名称';
$string['net'] = '联网';
$string['networksettings'] = '网络设置';
$string['never'] = '从来不';
$string['noaclentries'] = '在SSO访问控制列表中没有记录。';
$string['noaddressforhost'] = '抱歉，此主机名（{$a}）不能被解析！';
$string['nocurl'] = 'PHP cURL库没有安装';
$string['nolocaluser'] = '没有对应远程用户的本地记录，并且因为此主机不允许自动创建用户，所以不能建立记录。请联系您的系统管理员！';
$string['nomodifyacl'] = '您无权修改MNet访问控制列表。';
$string['nonmatchingcert'] = '证书主题：<br /><em>{$a->subject}</em><br />和主机中的记录不匹配：<br /><em>{$a->host}</em>。';
$string['nopubkey'] = '获取公共密钥遇到问题。<br />可能是主机不允许MNet访问或者密钥是无效的。';
$string['nosite'] = '不能找到站点级别的课程';
$string['nosuchfile'] = '文件/函数 {$a}不存在。';
$string['nosuchfunction'] = '无法找到函数，或者函数禁用RPC。';
$string['nosuchmodule'] = '函数地址不正确，不能被定位。请使用mod/modulename/lib/函数名 格式。';
$string['nosuchpublickey'] = '不能获得符号验证的公共密钥。';
$string['nosuchservice'] = 'RPC在主机上不能运行。';
$string['nosuchtransport'] = '传输ID不存在';
$string['notBASE64'] = '此字符串不是base64编码，所以它不可能是有效的密钥。';
$string['notenoughidpinfo'] = '您的身份提供者没有提供足够的信息，不能在本地创建或更新您的账号。抱歉！';
$string['not_in_range'] = 'IP地址<code>{$a}</code>不代表一个有效的可信主机。';
$string['notinxmlrpcserver'] = '没在 XMLRPC 服务器运行时尝试访问 MNet 远程客户端';
$string['notmoodleapplication'] = '警告：这不是一个 Moodle 应用，所以一些检查方法可能不能正常工作。';
$string['notPEM'] = '密钥不是以PEM格式，所以无法使用。';
$string['notpermittedtojump'] = '您没有权限从该Moodle服务器启动一个远程会话。';
$string['notpermittedtojumpas'] = '您不能在登录为其它用户时启动远程会话。';
$string['notpermittedtoland'] = '您没有权限启动远程会话。';
$string['off'] = '关闭';
$string['on'] = '打开';
$string['options'] = '选项';
$string['peerprofilefielddesc'] = '在这里，您可以覆盖创建新用户时发送和导入哪些个人资料字段的全局设置';
$string['permittedtransports'] = '允许传输';
$string['phperror'] = '内部PHP错误，阻止了您的请求完成。';
$string['position'] = '位置';
$string['postrequired'] = '删除函数需要一个POST请求。';
$string['profileexportfields'] = '发送字段';
$string['profilefielddesc'] = '在这里，您可以配置创建或更新账号时都通过 MNet 发送和接收哪些个人资料字段。您也可以为每个 MNet 伙伴单独设置这些配置。注意，会永远发送下面的字段：{$a}';
$string['profilefields'] = '字段简介';
$string['profileimportfields'] = '导入字段';
$string['promiscuous'] = '混杂的';
$string['publickey'] = '公共密钥';
$string['publickey_help'] = '公共密钥从远程服务器上直接获得。';
$string['publickeyrequired'] = '您必须提供一个公钥。';
$string['publish'] = '发布';
$string['reallydeleteserver'] = '确定删除服务器吗？';
$string['receivedwarnings'] = '接收到下面的警告';
$string['recordnoexists'] = '记录不存在';
$string['reenableserver'] = '否，选择该选项重新激活服务器。';
$string['registerallhosts'] = '注册所有主机（混乱模式）';
$string['registerallhostsexplain'] = '您可以选择自动注册所有尝试连接您的主机。这意味着您的主机中将会出现一个记录列表，其中包含了所有与您互联，并请求了您的公钥的MNet网站。<br />您可以在下面的选项为“所有主机”配置服务。通过启用一些服务，可以为任意远程网站提供任何服务。';
$string['registerhostsoff'] = '现在<b>关闭</b>注册所有主机';
$string['registerhostson'] = '现在<b>开放</b>注册所有主机';
$string['remotecourses'] = '远程课程';
$string['remotehost'] = '远程主机';
$string['remotehosts'] = '远程主机';
$string['remoteuserinfo'] = '远程{$a->remotetype}用户——个人资料取自<a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = '网络需要 OpenSSL 扩展';
$string['restore'] = '恢复';
$string['returnvalue'] = '返回值';
$string['reviewhostdetails'] = '预览主机细节';
$string['reviewhostservices'] = '预览主机服务';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP未封装';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP（自我签名）';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS(自我签名)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS（签名）';
$string['RPC_HTTP_VERIFIED'] = 'HTTP（签名）';
$string['selectaccesslevel'] = '请从列表中选择访问级别。';
$string['selectahost'] = '请选择一个远程主机。';
$string['service'] = '服务名称';
$string['serviceid'] = '服务ID';
$string['servicesavailableonhost'] = '{$a}上的可用服务';
$string['serviceswepublish'] = '服务发布给{$a}';
$string['serviceswesubscribeto'] = '订阅{$a}上的服务';
$string['settings'] = '设置';
$string['showlocal'] = '显示本地用户';
$string['showremote'] = '显示远程用户';
$string['ssl_acl_allow'] = 'SSO ACL： 允许来自{$a->host}的用户{$a->user}';
$string['ssl_acl_deny'] = 'SSO ACL： 拒绝来自{$a->host}的用户{$a->user}';
$string['ssoaccesscontrol'] = 'SSO 访问控制';
$string['ssoacldescr'] = '使用此页面允许/拒绝从远程MNet主机来访的指定用户。当您为远程用户提供SSO服务时，这个功能非常有用。为了控制您的<em>本地</em>用户漫游到其它MNet主机的能力，使用角色系统分配他们<em>mnetlogintoremote</em>权限。';
$string['ssoaclneeds'] = '为了让这个功能起作用，您必须将网络打开，并启用MNet认证插件。';
$string['strict'] = '严格';
$string['subscribe'] = '订阅';
$string['system'] = '系统';
$string['testclient'] = 'MNet 测试客户端';
$string['testtrustedhosts'] = '测试地址';
$string['testtrustedhostsexplain'] = '键入一个IP地址，看是否是一个值得信赖的主机。';
$string['theypublish'] = '他们发布';
$string['theysubscribe'] = '他们订阅';
$string['transport_help'] = '这些选项是相反的（倒数），因此如果您的主机上有一个签名的SSL证书，只能强制一个远程主机使用签名的SSL证书';
$string['trustedhosts'] = 'XMP-RPC主机';
$string['trustedhostsexplain'] = '<p>信任主机机制允许指定的主机通过XML-RPC调用任意的Moodle API。这样就可以使用脚本控制Moodle的行为，但激活它也是非常危险的。如果感到迷惑不解，可以将其“关闭”。</p>
<p><strong>没有任何标准的MNet特性需要它！</strong>只在您确切知道您在做什么的情况下才需要激活它。</p>
<p>激活方法是，在每一行键入一个IP地址或网络的列表。例如：</p>
您的本地主机：<br />127.0.0.1<br />您的本地主机（带掩码）：<br />127.0.0.1/32<br />IP地址为192.168.0.7的主机：<br />192.168.0.7/32<br />IP在192.168.0.1到192.168.0.255之间的所有主机：<br />192.168.0.0/24<br />任意主机，管它是啥：<br />192.168.0.0/0<br />显然，最后一个例子<strong>不是</strong>建议配置。';
$string['turnitoff'] = '关闭';
$string['turniton'] = '打开';
$string['type'] = '类型';
$string['unknown'] = '未知';
$string['unknownerror'] = '在通信中发生位置错误';
$string['usercannotchangepassword'] = '由于您是远程用户，所以不能更改密码。';
$string['userchangepasswordlink'] = '<br /> 您也许可以在<a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>提供者那里修改密码。';
$string['usernotfullysetup'] = '您的账号不完整。您需要<a href="{$a}">回到您的信息提供者</a>并确定您在那里的个人资料是完整的。可能需要您重新登录才能生效。';
$string['usersareonline'] = '警告：当前该服务器有{$a}名用户登录到您的网站。';
$string['validated_by'] = '通过网络验证： <code>{$a}</code>';
$string['verifysignature-error'] = '签名验证失败。';
$string['verifysignature-invalid'] = '签名验证失败。';
$string['version'] = '版本';
$string['warning'] = '警告';
$string['wrong-ip'] = '您的IP地址与记录中的地址不匹配';
$string['xmlrpc-missing'] = '您需要在PHP中安装XML-RPC才能使用这个功能。';
$string['yourhost'] = '您的主机';
$string['yourpeers'] = '您的互联主机';
