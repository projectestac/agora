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
 * Strings for component 'webservice', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = '访问控制异常';
$string['actwebserviceshhdr'] = '可用的网络服务协议';
$string['addaservice'] = '添加服务';
$string['addcapabilitytousers'] = '检查用户权限';
$string['addcapabilitytousersdescription'] = '用户应该有两个权限—— webservice:createtoken，还有与使用的协议相匹配的权限，例如 webservice/rest:use、webservice/soap:use。要分配这些权限，可以创建一个拥有这些权限的网络服务角色，并将它做为系统角色分配给网络服务用户。';
$string['addfunction'] = '添加函数';
$string['addfunctionhelp'] = '选择要添加到此服务的函数。';
$string['addfunctions'] = '添加函数';
$string['addfunctionsdescription'] = '为新创建的服务选择必需函数。';
$string['addrequiredcapability'] = '分配/取消必备的权限';
$string['addservice'] = '添加新服务：{$a->name}（id：{$a->id}）';
$string['addservicefunction'] = '向服务“{$a}”添加函数';
$string['allusers'] = '所有用户';
$string['amftestclient'] = 'AMF 测试客户端';
$string['apiexplorer'] = 'API 浏览器';
$string['apiexplorernotavalaible'] = 'API 浏览器还不可用。';
$string['arguments'] = '参数';
$string['authmethod'] = '认证方法';
$string['cannotcreatetoken'] = '没有为服务{$a}创建网络服务令牌的权限。';
$string['cannotgetcoursecontents'] = '不能获取课程内容';
$string['checkusercapability'] = '检查用户权限';
$string['checkusercapabilitydescription'] = '用户应该有与使用的协议相匹配的权限，例如 webservice/rest:use、webservice/soap:use。要分配这些权限，可以创建一个拥有这些权限的网络服务角色，并将它做为系统角色分配给网络服务用户。';
$string['configwebserviceplugins'] = '为保障安全，应该只激活使用中的协议。';
$string['context'] = '场景';
$string['createservicedescription'] = '服务是网络服务函数的集合。您将允许此用户访问一个新的服务。在<strong>添加服务</strong>页面勾选“启用”和“只服务授权用户”选项。选择“没有需要的权限”。';
$string['createserviceforusersdescription'] = '服务是网络服务函数的集合。您将允许用户访问一个新的服务。在<strong>添加服务</strong>页面勾选“启用”，不勾选“只服务授权用户”选项。选择“没有需要的权限”。';
$string['createtoken'] = '创建令牌';
$string['createtokenforuser'] = '为用户创建令牌';
$string['createtokenforuserdescription'] = '为网络服务用户创建令牌。';
$string['createuser'] = '创建一个特殊用户';
$string['createuserdescription'] = '需要一个网络服务用户来代表系统控制 Moodle。';
$string['default'] = '默认为“{$a}”';
$string['deleteaservice'] = '删除服务';
$string['deleteservice'] = '删除服务： {$a->name}（id：{$a->id}）';
$string['deleteserviceconfirm'] = '删除一个服务也会删除与之有关的令牌。您真的要删除对外服务“{$a}”吗？';
$string['deletetokenconfirm'] = '您确认要删除<strong>{$a->user}</strong>使用<strong>{$a->service}</strong>服务的网络服务令牌吗？';
$string['disabledwarning'] = '所有网络服务协议都被禁用。在高级特性中有“启用网络服务”选项。';
$string['doc'] = '文档';
$string['docaccessrefused'] = '你未被批准查看此令牌的参考文档';
$string['documentation'] = '网络服务参考文档';
$string['downloadfiles'] = '可下载文件';
$string['downloadfiles_help'] = '如果启用，任何用户都可以使用自己的安全密钥来下载文件。当然，他们只能从该网站允许他们下载的文件中下载。';
$string['editaservice'] = '修改服务';
$string['editservice'] = '编辑服务：{$a->name}（id：{$a->id}）';
$string['enabled'] = '启用';
$string['enabledocumentation'] = '启用开发者参考文档';
$string['enabledocumentationdescription'] = '为启用的网络服务协议提供细致的文档。';
$string['enablemobilewsoverview'] = '访问{$a->manageservicelink}管理页面，勾选“{$a->enablemobileservice}”设置并保存。一切都会为您准备好，所有网站用户都将可以使用官方 Moodle 应用。当前状态：{$a->wsmobilestatus}';
$string['enableprotocols'] = '启用协议';
$string['enableprotocolsdescription'] = '至少应启用一个协议。为保障安全，应该只激活要使用的协议。';
$string['enablews'] = '启用网络服务';
$string['enablewsdescription'] = '必须在高级特性中启用网络服务。';
$string['entertoken'] = '输入密钥/令牌。';
$string['error'] = '错误：{$a}';
$string['errorcatcontextnotvalid'] = '您不能在类别场景（类别 id：{$a->catid}）中执行函数。场景的错误信息是：{$a->message}';
$string['errorcodes'] = '错误信息';
$string['errorcoursecontextnotvalid'] = '您不能在课程场景（课程 id：{$a->courseid}）中执行函数。场景错误信息是：{$a->message}';
$string['errorinvalidparam'] = '参数“{$a}”无效。';
$string['errornotemptydefaultparamarray'] = '名为“{$a}”的网络服务描述参数是一个或多个结构。缺省值只能是空数组。请检查网络服务描述。';
$string['erroroptionalparamarray'] = '名为“{$a}”的网络服务描述参数是一个或多个结构。它不能被设为 VALUE_OPTIONAL。请检查网络服务描述。';
$string['execute'] = '执行';
$string['executewarnign'] = '警告：如果您点了执行按钮，您的数据库会被修改，且不能自动恢复这些变化！';
$string['externalservice'] = '对外服务';
$string['externalservicefunctions'] = '对外服务函数';
$string['externalservices'] = '对外服务';
$string['externalserviceusers'] = '外部服务用户';
$string['failedtolog'] = '存日志失败';
$string['filenameexist'] = '文件名已存在：{$a}';
$string['forbiddenwsuser'] = '不能创建令牌，可能因为用户还未确认、已删除、已停用或者是访客。';
$string['function'] = '函数';
$string['functions'] = '函数';
$string['generalstructure'] = '通用结构';
$string['information'] = '信息';
$string['installexistingserviceshortnameerror'] = '以“{$a}”为简称的网络服务已存在。不能安装或者升级使用相同此简称的不同的网络服务。';
$string['installserviceshortnameerror'] = '源代码错误：服务的简称“{$a}”应该只包含数字、字母和_-..。';
$string['invalidextparam'] = '无效的外部 api 参数：{$a}';
$string['invalidextresponse'] = '无效的外部 api 应答：{$a}';
$string['invalidiptoken'] = '无效令牌——不支持您的IP';
$string['invalidtimedtoken'] = '无效令牌——令牌过期';
$string['invalidtoken'] = '无效令牌——找不到令牌';
$string['iprestriction'] = 'IP限制';
$string['iprestriction_help'] = '此用户将只能从列出的 IP 访问网络服务';
$string['key'] = '密钥';
$string['keyshelp'] = '密钥用来从外部程序访问您的 Moodle 账号。';
$string['manageprotocols'] = '管理协议';
$string['managetokens'] = '管理令牌';
$string['missingcaps'] = '缺少权限';
$string['missingcaps_help'] = '此服务必需，但所选用户不具有的权限。如果要使用此服务，必须为用户所属的角色添加缺少的权限。';
$string['missingpassword'] = '缺少密码';
$string['missingrequiredcapability'] = '必须有 {$a} 权限。';
$string['missingusername'] = '缺少用户名';
$string['missingversionfile'] = '源代码错误：组件 {$a} 缺少 version.php 文件';
$string['mobilewsdisabled'] = '禁用';
$string['mobilewsenabled'] = '启用';
$string['nofunctions'] = '此服务没有函数。';
$string['norequiredcapability'] = '没有需要的权限';
$string['notoken'] = '令牌列表为空。';
$string['onesystemcontrolling'] = '允许外部系统控制 Moodle';
$string['onesystemcontrollingdescription'] = '下面步骤帮助配置 Moodle 网络服务，让外部系统可以与 Moodle 交互。包括设置令牌（安全密钥）认证方法。';
$string['operation'] = '操作';
$string['optional'] = '可选';
$string['passwordisexpired'] = '密码已过期。';
$string['phpparam'] = 'XML-RPC（PHP 结构）';
$string['phpresponse'] = 'XML-RPC（PHP 结构）';
$string['postrestparam'] = 'PHP 的 REST（POST 请求）源代码';
$string['potusers'] = '未授权用户';
$string['potusersmatching'] = '匹配的未授权用户';
$string['print'] = '全部打印';
$string['protocol'] = '协议';
$string['removefunction'] = '删除';
$string['removefunctionconfirm'] = '您确信要从服务“{$a->service}”删除函数“{$a->function}”吗？';
$string['requireauthentication'] = '此方法需要用 xxx 权限认证。';
$string['required'] = '必须';
$string['requiredcapability'] = '需要权限';
$string['requiredcapability_help'] = '如果设置，只有有相应权限的用户才能访问此服务。';
$string['requiredcaps'] = '需要权限';
$string['resettokenconfirm'] = '您确信要重置<strong>{$a->user}</strong>的<strong>{$a->service}</strong>服务的网络服务密钥吗？';
$string['resettokenconfirmsimple'] = '您想重置这个密钥吗？所有使用旧密钥的链接都将失效。';
$string['response'] = '应答';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = '恢复的账号在获得令牌前需要重置密码。';
$string['restparam'] = 'REST（POST 参数）';
$string['restrictedusers'] = '只服务授权用户';
$string['restrictedusers_help'] = '用户可以在他们的安全密钥页面为此服务创建令牌。此设置决定是所有有权创建网络服务令牌的用户都可以这么做，还是只有授权用户可以。';
$string['securitykey'] = '安全密钥（令牌）';
$string['securitykeys'] = '安全密钥';
$string['selectauthorisedusers'] = '选择授权用户';
$string['selectedcapability'] = '已选择';
$string['selectedcapabilitydoesntexit'] = '当前设置的必备权限（{$a}）已不再存在。请修改并保存。';
$string['selectservice'] = '选择一个服务';
$string['selectspecificuser'] = '选择一个特殊用户';
$string['selectspecificuserdescription'] = '将网络服务用户加为授权用户。';
$string['service'] = '服务';
$string['servicehelpexplanation'] = '服务是一个函数集合。可以让所有人或只让指定的用户访问服务。';
$string['servicename'] = '服务名';
$string['servicenotavailable'] = '网络服务不可用（它不存在或者已禁用）';
$string['servicesbuiltin'] = '内置服务';
$string['servicescustom'] = '自定义服务';
$string['serviceusers'] = '已授权用户';
$string['serviceusersettings'] = '用户设置';
$string['serviceusersmatching'] = '授权用户匹配';
$string['serviceuserssettings'] = '修改授权用户的设置';
$string['simpleauthlog'] = '简单认证登录';
$string['step'] = '步骤';
$string['supplyinfo'] = '更多细节';
$string['testauserwithtestclientdescription'] = '用网络服务测试客户端仿真外部访问。在开始之前，先要用有 moodle/webservice:createtoken 权限的用户并通过我的个人资料设置获得密钥（令牌）。您将在测试客户端使用此令牌。在测试客户端中，用令牌认证选择一个已启用的协议。<strong>警告：您测试的函数会被真的执行，所以小心选择测试什么！</strong>';
$string['testclient'] = '网络服务测试客户端';
$string['testclientdescription'] = '* 此网络服务测试客户端会<strong>真的执行</strong>被测函数。不要测试您不了解的函数。<br />
* 此测试客户端并没有实现所有的网络服务。<br />
* 您可以通过测试一些禁用的函数来检查用户是否能访问它们。 <br />
* 要看到更清晰的错误信息，到“{$a->atag}”页面把调试状态设为<strong>{$a->mode}</strong><br />
* 访问 {$a->amfatag}。';
$string['testwithtestclient'] = '测试服务';
$string['testwithtestclientdescription'] = '用网络服务测试客户端仿真外部访问。用令牌认证，使用一个已启用的协议。<strong>警告：您测试的函数会被真的执行，所以小心选择测试什么！</strong>';
$string['token'] = '令牌';
$string['tokenauthlog'] = '令牌认证';
$string['tokencreatedbyadmin'] = '管理员不能重置（*）';
$string['tokencreator'] = '创建人';
$string['unknownoptionkey'] = '未知选项键（{$a}）';
$string['updateusersettings'] = '更新';
$string['userasclients'] = '把用户当做有令牌的客户端';
$string['userasclientsdescription'] = '下面步骤帮助您面向用户设置 Moodle 的网络服务。这些步骤也帮助您设置建议采用的令牌（安全密钥）认证方法。在这种情况下，用户可以在我的个人资料设置中的安全密钥页面生成他的令牌。';
$string['usermissingcaps'] = '缺少权限：{$a}';
$string['usernameorid'] = '用户名 / 用户 id';
$string['usernameorid_help'] = '输入用户名或用户 ID。';
$string['usernameoridnousererror'] = '未能找到该用户名/用户 ID 的用户。';
$string['usernameoridoccurenceerror'] = '使用此用户名的用户用户不唯一，请输入用户 ID。';
$string['usernotallowed'] = '此用户不可以使用此服务。首先，您需要在{$a}的允许用户管理页面允许此用户使用。';
$string['usersettingssaved'] = '用户设置已保存';
$string['validuntil'] = '有效期至';
$string['validuntil_help'] = '如果设置，此日期之后，此服务就会对此用户失效。';
$string['webservice'] = '网络服务';
$string['webservices'] = '网络服务';
$string['webservicesoverview'] = '概述';
$string['webservicetokens'] = '网络服务令牌';
$string['wrongusernamepassword'] = '错误的用户名或密码';
$string['wsaccessuserdeleted'] = '拒绝访问网络服务，因为用户名已删除：{$a}';
$string['wsaccessuserexpired'] = '拒绝访问网络服务，因为密码过期，用户名：{$a}';
$string['wsaccessusernologin'] = '拒绝访问网络服务，因为未登录认证，用户名：{$a}';
$string['wsaccessusersuspended'] = '拒绝访问网络服务，因为用户已禁用：{$a}';
$string['wsaccessuserunconfirmed'] = '拒绝访问网络服务，因为用户未确认：{$a}';
$string['wsclientdoc'] = 'Moodle 网络服务客户端文档';
$string['wsdocapi'] = 'API 文档';
$string['wsdocumentation'] = '网络服务文档';
$string['wsdocumentationdisable'] = '网络服务参考文档已关闭。';
$string['wsdocumentationintro'] = '要编写一个客户端，我们建议您阅读{$a->doclink}';
$string['wsdocumentationlogin'] = '或者输入您的网络服务用户名和密码：';
$string['wspassword'] = '网络服务密码';
$string['wsusername'] = '网络服务用户名';
