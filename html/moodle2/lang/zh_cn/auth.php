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
 * Strings for component 'auth', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = '可用的认证插件';
$string['alternatelogin'] = '如果您在此输入一个URL，它将被用于本站的登录。这个页面上应当有一个表单，表单的 action 一项应设定为<strong>“{$a}”</strong>，并且返回的字段中应当有 <strong>username</strong> 和 <strong>password</strong>。<br />小心，不要输入错误的URL，否则您可能会被锁在站点之外。<br />要使用缺省的登录页面请为此设置保留空白。';
$string['alternateloginurl'] = '换用其它登录链接';
$string['auth_changepasswordhelp'] = '修改密码帮助';
$string['auth_changepasswordhelp_expl'] = '当用户丢失了他们的 {$a} 密码后显示给他们的帮助信息。系统将会把此信息和<strong>修改密码地址</strong>一起显示给用户或用它来替代 Moodle 内部的修改密码机制。';
$string['auth_changepasswordurl'] = '修改密码地址';
$string['auth_changepasswordurl_expl'] = '设定一个当用户丢失了他们的 {$a} 密码时发给用户的地址。需要将<strong>使用标准修改密码页面</strong>设定为<strong>否</strong>。';
$string['auth_changingemailaddress'] = '您已请求将Email地址由 {$a->oldemail} 变更为 {$a->newemail}。出于安全的考虑，服务器将自动向 {$a->newemail} 发送一封邮件，以确认它属于您。您只要访问邮件中的URL，Email地址会立刻更新。';
$string['auth_common_settings'] = '公用设置';
$string['auth_data_mapping'] = '数据映射';
$string['authenticationoptions'] = '身份认证选项';
$string['auth_fieldlock'] = '锁定值';
$string['auth_fieldlock_expl'] = '<p><b>锁定值：</b> 如果开启，Moodle 用户和管理员将不能直接修改字段的值。如果您正在维护外部数据库的数据，请选择此项。';
$string['auth_fieldlocks'] = '锁定用户字段';
$string['auth_fieldlocks_help'] = '<p>您可以锁定指定的用户数据字段。对于用户数据由管理员人工维护，或者是通过“上传用户”上传的站点而言，这个功能是很有用的。如果您锁定了 Moodle 必需的字段，那么请您确信在创建用户帐户时已经提供了其内容，否则这个账号将无法使用。</p>
<p>如果想要避免这个问题，可以考虑将锁定模式设定为“如果空则不锁定”。</p>';
$string['authinstructions'] = '此处留空，登录页面会显示缺省的登录说明。如果想自定义登录说明，就在此输入。';
$string['auth_invalidnewemailkey'] = '错误：URL 不正确，请完整拷贝后重试。';
$string['auth_multiplehosts'] = '可以指定多个主机名或地址（如 host1.com;host2.com;host3.com 或 xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx）';
$string['auth_outofnewemailupdateattempts'] = '更改Email地址的许可次数已到，您的请求被取消。';
$string['auth_passwordisexpired'] = '您的密码已经过期，要现在修改么?';
$string['auth_passwordwillexpire'] = '您的密码将在{$a}天后过期，现在要修改么?';
$string['auth_remove_delete'] = '完全删除';
$string['auth_remove_keep'] = '保存';
$string['auth_remove_suspend'] = '延迟';
$string['auth_remove_user'] = '指定在用户帐号在外部被删除时，内部用户帐号在同步的时候允许做什么。只有延迟用户帐号在外部数据中出现时才会被自动激活。';
$string['auth_remove_user_key'] = '移除用户';
$string['auth_sync_script'] = 'Cron 同步脚本';
$string['auth_updatelocal'] = '更新本地数据';
$string['auth_updatelocal_expl'] = '<p><b>更新本地数据:</b> 如果开启，则用户每次登录或有用户同步时字段将会被更新。设定为本地更新的字段应当被锁住。</p>';
$string['auth_updateremote'] = '更新外部数据';
$string['auth_updateremote_expl'] = '<p><b>更新外部数据:</b> 如果开启，则外部认证系统中的用户记录将被更新。要修改这个选项需首先解锁字段。</p>';
$string['auth_updateremote_ldap'] = '<p><b>注意:</b> 更新外部LDAP数据需要您设定的binddn和binddw是有权限修改所有用户记录的用户。它目前不能保持多值属性的值，会在更新时删除其它的值。</p>';
$string['auth_user_create'] = '激活用户创建功能';
$string['auth_user_creation'] = '新的(匿名的)用户可以在外部身份认证源中创建帐号，并通过 Email 确认。如果您启用了这个功能，请记住也要配置与用户创建有关的模块特定选项。';
$string['auth_usernameexists'] = '选中的用户名已经存在。请选择一个新的。';
$string['auto_add_remote_users'] = '自动添加远程用户';
$string['changepassword'] = '更改密码 URL';
$string['changepasswordhelp'] = '在这里指定一个位置，用户在忘记了用户名或密码后，可以在那里重新获得或更改。它将以一个按钮的形式显示在登录页面和用户页面。如果留空不填，就不会有按钮出现。';
$string['chooseauthmethod'] = '选择一个身份认证方法：';
$string['chooseauthmethod_help'] = '<p align="center"><b>改变认证方法</b></p>

<p>这个菜单允许您改变特定用户的认证方法。</p>

<p>请注意这依赖于这个网站已经安装能够使用的认证方法以及您对它们所进行的设置。</p>

<p>此处的错误设置，可能会导致用户无法登录甚至删除其帐号，所以使用时请小心。</p>';
$string['createpasswordifneeded'] = '如果需要则创建密码';
$string['emailchangecancel'] = '取消 email 变更';
$string['emailchangepending'] = '变更进行中。访问向 {$a->preference_newemail} 发送的链接。';
$string['emailnowexists'] = '你尝试输入到个人资料里的email地址已经被分配给别人了。所以您的email地址变更请求现予取消，但您可以再次尝试使用不同的地址。';
$string['emailupdate'] = 'Email地址更新';
$string['emailupdatemessage'] = '{$a->fullname}，您好

您请求更改在{$a->site}上注册的email地址。请在浏览器中访问下面的链接来确认。

{$a->url}';
$string['emailupdatesuccess'] = '用户 <em>{$a->fullname}</em> 的email地址已成功更新为 <em>{$a->email}</em>。';
$string['emailupdatetitle'] = '{$a->site}的email更新确认';
$string['enterthenumbersyouhear'] = '输入你听到的数字';
$string['enterthewordsabove'] = '输入上面的字母';
$string['errormaxconsecutiveidentchars'] = '密码必须包含最多{$a}个连续的相同字符。';
$string['errorminpassworddigits'] = '密码中至少要有 {$a} 个数字。';
$string['errorminpasswordlength'] = '密码中至少要有 {$a} 个字符。';
$string['errorminpasswordlower'] = '密码中至少要有 {$a} 个小写字母。';
$string['errorminpasswordnonalphanum'] = '密码中至少要有 {$a} 个非字母、数字字符。';
$string['errorminpasswordupper'] = '密码中至少要有 {$a} 个大写字母。';
$string['errorpasswordupdate'] = '更新密码错误，密码没有更新。';
$string['forcechangepassword'] = '强制修改密码';
$string['forcechangepasswordfirst_help'] = '强制用户在第一次登录时修改密码。';
$string['forcechangepassword_help'] = '强制用户在下次登录时修改密码。';
$string['forgottenpassword'] = '如果您在这里键入一个URL地址，该地址将会用来丢失密码的查找页面。';
$string['forgottenpasswordurl'] = '忘记的密码 URL';
$string['getanaudiocaptcha'] = '获取音频 CAPTCHA 验证';
$string['getanimagecaptcha'] = '获取图像 CAPTCHA 验证';
$string['getanothercaptcha'] = '获取另一个 CAPTCHA';
$string['guestloginbutton'] = '访客登录按钮';
$string['incorrectpleasetryagain'] = '错误，请重试';
$string['infilefield'] = '字段必需存在于文件中';
$string['informminpassworddigits'] = '至少{$a}个数字';
$string['informminpasswordlength'] = '至少{$a}个字符';
$string['informminpasswordlower'] = '至少{$a}个小写字母';
$string['informminpasswordnonalphanum'] = '至少{$a}个特殊字符';
$string['informminpasswordupper'] = '至少{$a}个大写字母';
$string['informpasswordpolicy'] = '密码必须包含{$a}';
$string['instructions'] = '使用说明';
$string['internal'] = '内部的';
$string['locked'] = '锁定';
$string['md5'] = 'MD5 加密';
$string['nopasswordchange'] = '密码不能被更新';
$string['nopasswordchangeforced'] = '在您更改密码前不能继续操作，但系统找不到用来更改密码的页面，请与管理员联系。';
$string['noprofileedit'] = '不能编辑个人资料';
$string['ntlmsso_attempting'] = '尝试进行 NTLM 单点登录';
$string['ntlmsso_failed'] = '自动登录失败，尝试到普通登录页面登录。';
$string['ntlmsso_isdisabled'] = 'NTLM 单点登录被禁用。';
$string['passwordhandling'] = '如何处理密码字段';
$string['plaintext'] = '纯文本';
$string['pluginnotenabled'] = '认证插件“{$a}”不可用';
$string['pluginnotinstalled'] = '认证插件“{$a}”没有安装';
$string['potentialidps'] = '使用您在别处的账号登录：';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = '图片验证码用来防止网站被自动程序滥用。只需在输入框中按顺序输入这些词，用一个空格分隔。

如果您不确定这些词是什么，可以尝试再获得一个图片验证码或播放声音验证码。';
$string['selfregistration'] = '自助注册';
$string['selfregistration_help'] = '如果选中一个身份认证插件，比如基于email的自助注册，那么用户就可以自己注册并创建帐户。这可能导致一些人为了在讨论区、博客等发送垃圾信息而自己建立帐号。为了避免这种风险，自助注册应禁用或仅限<em>允许的email域名</em>。
';
$string['sha1'] = 'SHA-1 加密';
$string['showguestlogin'] = '您可以在登录页面显示或隐藏访客登录按钮。';
$string['stdchangepassword'] = '使用标准的修改密码页面';
$string['stdchangepassword_expl'] = '如果外部认证系统允许通过 Moodle 修改密码，则应设为是。此选项会覆盖“修改密码URL”。';
$string['stdchangepassword_explldap'] = '注意: 如果使用远程服务器，建议您使用安全的 LDAP 连接(ldaps://)。';
$string['suspended'] = '暂停的账号';
$string['suspended_help'] = '停用账号不能登录或使用web服务，所有消息都被丢弃。';
$string['unlocked'] = '不锁定';
$string['unlockedifempty'] = '如果空则不锁定';
$string['update_never'] = '从不';
$string['update_oncreate'] = '创建时';
$string['update_onlogin'] = '每次登录时';
$string['update_onupdate'] = '更新时';
$string['user_activatenotsupportusertype'] = '认证：ldap的user_activate()不支持所选的用户类型：{$a}';
$string['user_disablenotsupportusertype'] = '认证：ldap的user_disable()不支持所选的用户类型（至少现在还不支持）';
