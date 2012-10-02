<?PHP // $Id: report_security.php,v 1.1 2009/06/21 17:29:08 liling Exp $ 
      // report_security.php - created with Moodle 1.9.5 (Build: 20090520) (2007101550)


$string['check_configrw_name'] = 'config.php 文件可编辑';
$string['check_configrw_ok'] = 'config.php 无法通过 PHP 脚本编辑。';
$string['check_configrw_warning'] = 'PHP 脚本可以修改 config.php 文件。';
$string['check_cookiesecure_error'] = '请激活安全的 cookie';
$string['check_cookiesecure_name'] = '安全的 cookie';
$string['check_cookiesecure_ok'] = '已激活安全的 cookie';
$string['check_courserole_anything'] = '在<a href=\"$a\">此情境</a>中，禁止使用“做所有事”的权限。';
$string['check_courserole_name'] = '默认角色（课程）';
$string['check_courserole_notyet'] = '仅使用默认课程角色。';
$string['check_courserole_ok'] = '默认的课程角色定义正确。';
$string['check_defaultcourserole_error'] = '默认课程角色“{$a}”定义错误！';
$string['check_defaultcourserole_legacy'] = '检测到危险的传统角色';
$string['check_defaultcourserole_name'] = '默认课程角色（全局）';
$string['check_defaultcourserole_notset'] = '默认角色未定义。';
$string['check_defaultcourserole_ok'] = '站点默认角色定义正确。';
$string['check_defaultuserrole_error'] = '默认角色“{$a}”定义错误！';
$string['check_defaultuserrole_name'] = '所有用户的缺省角色';
$string['check_defaultuserrole_notset'] = '缺省角色未设置。';
$string['check_defaultuserrole_ok'] = '为所有用户定义的缺省角色是正确的。';
$string['check_displayerrors_name'] = '显示 PHP 错误信息';
$string['check_displayerrors_ok'] = '禁止显示 PHP 错误信息。';
$string['check_emailchangeconfirmation_error'] = '用户可以使用任意 E-mail 地址。';
$string['check_emailchangeconfirmation_info'] = '用户仅能使用特定域名的 E-mail 地址。';
$string['check_emailchangeconfirmation_name'] = 'E-mail 修改确认';
$string['check_emailchangeconfirmation_ok'] = '修改用户信息中的 E-mail 时需确认。';
$string['check_embed_error'] = '允许嵌入对象——对于大多数服务器而言，这非常危险。';
$string['check_embed_name'] = '允许 EMBED 和 OBJECT';
$string['check_embed_ok'] = '不允许嵌入对象。';
$string['check_frontpagerole_details'] = '<p>默认的首页角色是所有注册用户在参与首页活动时所使用的角色。请确保该角色未被赋予危险的权限。</p>
<p>强烈建议为此创建一个新的角色且不要给它赋予任何传统角色。</p>';
$string['check_frontpagerole_error'] = '未能正确定义首页角色“{$a}”！';
$string['check_frontpagerole_name'] = '首页角色';
$string['check_frontpagerole_notset'] = '未设置首页角色。';
$string['check_frontpagerole_ok'] = '首页角色定义正确。';
$string['check_google_error'] = '搜索引擎可以访问，但访客不能访问。';
$string['check_google_info'] = '搜索引擎可以作为访客进入。';
$string['check_google_name'] = '对谷歌开放';
$string['check_google_ok'] = '不允许搜索引擎访问';
$string['check_guestrole_error'] = '访客角色“{$a}”定义错误！';
$string['check_guestrole_name'] = '访客角色';
$string['check_guestrole_notset'] = '未设定访客角色';
$string['check_guestrole_ok'] = '访客角色定义正确。';
$string['check_mediafilterswf_error'] = 'Flash 媒体过滤器已经激活——对于大多数服务器而言，这是非常危险的。';
$string['check_mediafilterswf_name'] = '激活的 .swf 媒体过滤器';
$string['check_mediafilterswf_ok'] = 'Flash 媒体过滤器未激活。';
$string['check_openprofiles_error'] = '任何人无须登录就可以查看用户的个人信息。';
$string['check_openprofiles_name'] = '用户个人信息保护';
$string['check_openprofiles_ok'] = '在查看用户个人信息前需登录。';
$string['check_passwordpolicy_details'] = '<p>建议您设定一个密码策略，因为猜测密码是最常见的非法入侵方法。同时您也不要把密码策略设定的太苛刻，这会导致用户无法记住他们的密码以至于忘记密码或把密码写下来。</p>';
$string['check_passwordpolicy_error'] = '密码策略未设置。';
$string['check_passwordpolicy_name'] = '密码策略';
$string['check_passwordpolicy_ok'] = '密码策略已激活。';
$string['check_riskadmin_detailsok'] = '<p>请确认下列人员为系统管理员：</p>$a';
$string['check_riskadmin_name'] = '管理员';
$string['check_riskadmin_ok'] = '找到了 {$a} 个服务器管理员。';
$string['check_riskxss_warning'] = 'RISK_XSS——发现了{$a}个必须被信任的用户。';
$string['check_unsecuredataroot_error'] = '您的数据目录 <code>$a</code> 位置错误，它可以直接通过 Web 访问！';
$string['check_unsecuredataroot_name'] = '不安全的数据目录';
$string['check_unsecuredataroot_ok'] = '数据目录不能通过 Web 直接访问。';
$string['check_unsecuredataroot_warning'] = '您的数据目录 <code>$a</code> 位置错误，可以从 Web 直接访问。';
$string['configuration'] = '配置';
$string['description'] = '描述';
$string['details'] = '详细';
$string['issue'] = '问题';
$string['reportsecurity'] = '安全性概览';
$string['security:view'] = '查看安全报表';
$string['status'] = '状态';
$string['statuscritical'] = '危险的';
$string['statusinfo'] = '信息';
$string['statusok'] = '正常';
$string['statusserious'] = '严重的';
$string['statuswarning'] = '警告';
$string['timewarning'] = '处理数据可能会需要很长时间，请耐心等待...';

?>
