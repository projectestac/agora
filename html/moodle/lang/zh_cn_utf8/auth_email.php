<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = '您已提交将 E-mail 由 {$a->oldemail} 变更为 {$a->newemail}，出于安全的考虑，服务器将自动向 {$a->newemail} 发送一封邮件，打开邮件中的URL，E-mail 将自动更新。';
$string['auth_emailchangecancel'] = '取消 E-mail 变更';
$string['auth_emailchangepending'] = '变更期间，打开链接发送 {$a->preference_newemail}';
$string['auth_emaildescription'] = '电子邮件确认是默认的身份验证方法。用户注册时可以选用自己的用户名和密码，然后有一封确认信件发送到该用户的电子邮箱。该信件中有一个安全的链接指向用户确认帐号的页面。以后的登录就只根据本系统的数据库中储存的信息检验用户名和密码。';
$string['auth_emailnoemail'] = '系统尝试发送给您一封 E-mail，但是失败了！';
$string['auth_emailnoinsert'] = '不能将您的记录信息添加到数据库中!';
$string['auth_emailnowexists'] = '该 E-mail 已被他人使用，请更换再试';
$string['auth_emailrecaptcha'] = '在注册表单中增加图像/声音验证。这将有利于站点保护。详情请看：http://recaptcha.net/learnmore.html 。<em>需要 PHP cURL 扩展。</em>';
$string['auth_emailrecaptcha_key'] = '激活 reCAPTCHA 元素';
$string['auth_emailsettings'] = '设置';
$string['auth_emailtitle'] = 'E-mail 验证';
$string['auth_emailupdate'] = 'E-mail 更换';
$string['auth_emailupdatemessage'] = '{$a->fullname}，您好

您已要求更换 {$a->site} 上的注册 E-mail，请打开以下的链接以便确认。

$a->url';
$string['auth_emailupdatesuccess'] = '用户 <em>{$a->fullname}</em> 的邮件已更新为 <em>{$a->email}</em>。';
$string['auth_emailupdatetitle'] = '{$a->site} 确认 E-mail 更新';
$string['auth_invalidnewemailkey'] = '错误：URL 不正确，请完整拷贝后重试。';
$string['auth_outofnewemailupdateattempts'] = '更改 E-mail 的许可次数已到，您的请求被取消。';