<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_mnet_auto_add_remote_users'] = '当设置为“是”时，当远程用户第一次登录时，本地用户记录将会自动创建。';
$string['auth_mnet_roamin'] = '这些主机的用户不能进入您的站点。';
$string['auth_mnet_roamout'] = '您的用户可以进入到这些主机的站点中。';
$string['auth_mnet_rpc_negotiation_timeout'] = '通过 XMLRPC 进行认证时的超时时间（秒）。';
$string['auth_mnetdescription'] = '通过在您的 Moodle 网络设置中允许用户通过信赖的主机认证。';
$string['auth_mnettitle'] = 'Moodle 网络认证';
$string['auto_add_remote_users'] = '自动添加远程用户';
$string['rpc_negotiation_timeout'] = 'RPC 超时';
$string['sso_idp_description'] = '发布该服务后，用户浏览到 {$a} Moodle 站点时无需重新登录。<ul><li><em>依赖性</em>: 您必须<strong>订阅</strong> {$a} 上的 SSO (Service Provider)服务。</li></ul><br />定义该服务后，用户从 {$a} 访问到您的 Moodle 站点时无需重新登录。<ul><li><em>依赖性</em>: 同时您必须向 {$a} <strong>发布</strong> SSO (Service Provider) 服务。</li></ul><br />';
$string['sso_idp_name'] = 'SSO(Identity Provider)';
$string['sso_mnet_login_refused'] = '不允许用户 {$a[0]} 从 {$a[1]} 登录。';
$string['sso_sp_description'] = '发布该服务后，则允许 {$a} 上的认证用户访问 您的Moodle 站点时无需重新登录。<ul><li><em>依赖性</em>: 您必须<strong>订阅</strong> {$a} 上的 SSO (Identity Provider) 服务。</li></ul><br />定义该服务后，用户从 {$a} 访问到您的 Moodle 站点时无需重新登录。<ul><li><em>依赖性</em>: 同时您必须向 {$a} <strong>发布</strong> SSO (Identity Provider) 服务。</li></ul><br />';
$string['sso_sp_name'] = 'SSO(Service Provider)';