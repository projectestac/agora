<?PHP // $Id: auth.php,v 1.4 2009/10/09 06:55:04 samhemelryk Exp $ 
      // auth.php - created with Moodle 1.9.4+ (Build: 20090429) (2007101546.04)


$string['accesCAS'] = 'سی اے ایس کے استعمال کنندگان';
$string['accesNOCAS'] = 'اور استعمال کنندگان';
$string['alternateloginurl'] = 'متبادل یو آر ایل براۓ لاگ ان';
$string['auth_cas_create_user_key'] = 'استعمال کنندہ تخلیق کریں';
$string['auth_cas_enabled'] = 'اگر آپ سی اے ایس کی معتبریت چاہتے ہیں تو اس کو مجاز کریں';
$string['auth_cas_hostname_key'] = 'میزبان کا نام';
$string['auth_cas_invalidcaslogin'] = 'معزرت، آپ لاگ ان نہیں ہو سکے ۔ آپ کو مجاز نہیں کیا جا سکا';
$string['auth_cas_language'] = 'منتخب زبان';
$string['auth_cas_language_key'] = 'زبان';
$string['auth_cas_port'] = 'سی اے ایس کی پورٹ';
$string['auth_cas_port_key'] = 'پورٹ';
$string['auth_cas_proxycas_key'] = 'پراکسی موڈ';
$string['auth_cas_use_cas'] = 'سی اے ایس استعمال کرو';
$string['auth_common_settings'] = 'عام سیٹنگز';
$string['auth_dbhost_key'] = 'میزبان';
$string['auth_dbpass_key'] = 'پاسورڈ';
$string['auth_dbpasstype_key'] = 'پاسورڈ کا طرز';
$string['auth_dbtable'] = 'ڈیٹا بیس میں اسم جدول';
$string['auth_dbtable_key'] = 'جدول';
$string['auth_dbtype_key'] = 'ڈیٹا بیس';
$string['auth_emailnoemail'] = 'آپ کو برقی خط بھیجنے کی کوشش کامیاب نا ہو سکی';
$string['auth_emailnoinsert'] = 'ڈیٹا بیس میں آپ کے ریکارڈ کا اضافہ جا ہو سکا';
$string['auth_emailsettings'] = 'سیٹنگز';
$string['auth_emailtitle'] = 'برقی خط کے ذریعے خود کار اندراج';
$string['auth_fccreators_key'] = 'تخلیق کنندگان';
$string['auth_fcdescription'] = 'پاسورڈ  اور استعمال کنندہ کی تصدیق کے لیے یہ طریقہ کار فرسٹ کلاس سروراستعمال کرتا ہے';
$string['auth_fcfppport'] = 'سرور پورٹ، 3333زیادہ طر عام ہے';
$string['auth_fcfppport_key'] = 'پورٹ';
$string['auth_fchost_key'] = 'میزبان';
$string['auth_fcpasswd_key'] = 'پاسورڈ';
$string['auth_fctitle'] = 'فرسٹ کلاس سرور';
$string['auth_fcuserid_key'] = 'استعمال کنندہ کا آئی ڈی';
$string['auth_imaphost_key'] = 'میزبان';
$string['auth_imapport_key'] = 'پورٹ';
$string['auth_imaptype_key'] = 'قسم';
$string['auth_ldap_bind_pw_key'] = 'پاسورڈ';
$string['auth_ldap_creators_key'] = 'تخلیق کنندگان';
$string['auth_ldap_groupecreators_key'] = 'گروہ کے تخلیق کننگان';
$string['auth_ldap_passtype_key'] = 'پاسورڈ کی طرز';
$string['auth_ldap_preventpassindb'] = 'موڈل کے ڈیٹا بیس میں پاسورڈ محفوظ ہونے سے پچانے کے لیے ہاں منتخب کریں';
$string['auth_ldap_preventpassindb_key'] = 'پاسورڈز خفی کرو';
$string['auth_ldap_user_type_key'] = 'استعمال کنندہ کی قسم';
$string['auth_manualtitle'] = 'دستی کھاتے';
$string['auth_nologintitle'] = 'کوئی لاگ ان نا ہو';
$string['auth_ntlmsso_enabled_key'] = 'مجاز کرو';
$string['auth_pop3host_key'] = 'میزبان';
$string['auth_pop3mailbox_key'] = 'برقی خط کا باکس';
$string['auth_pop3port_key'] = 'پورٹ';
$string['auth_pop3type_key'] = 'قسم';
$string['auth_radiushost_key'] = 'میزبان';
$string['guestloginbutton'] = 'مہمان کے لیے لاگ ان بٹن';
$string['incorrectpleasetryagain'] = 'درست نا ہے۔ براہ مہربانی دوبارہ کوشش کریں';
$string['instructions'] = 'ہدایات';
$string['update_never'] = 'کبھی نہیں';
$string['update_oncreate'] = 'تخلیق کے وقت';
$string['update_onlogin'] = 'ہر لاگ ان کے وقت';


// Strings below here are module specific and will be duplicated in auth_* files
// Module specific language strings should also be copied into their respective
// auth_*.php files to ensure compatibility in all versions of Moodle

$string['sso_idp_description'] = 'اس خدمت کو شائع کریں تاک آپ کے استعمال کنندگان دوبارہ لاگ ان کیے بغیر $a موڈل سائٹ کو جا سکیں۔آپ کو لازمی $a پر ایس ایس او ( خدمت مہیا کرنیوالا ) خدمت کیلیے رجسٹر ہونا پڑے گا۔ </li></ul><br /> اپنے معتبر استعمال کنندگان کو دوبارہ لاگ ان کیے بغیر $a سے اپنی سائٹ پر رسائی کیلیے رجسٹر ہوں۔ <ul><li<em>منحصریت: </em> آپ کو بھی $a کیلیے ایس ایس او ( خدمت مہیا کرنیوالا ) خدمت <strong> شائع </strong> لازمی کرنی ہے۔</li></ul><br />';
$string['sso_idp_name'] = 'ایس ایس او ) شناخت مہیا کرنیوالا (';
$string['sso_mnet_login_refused'] = 'استعمال کنندہ $a[0] کو $a[1] سے اجازت نہیں ہے۔';
$string['sso_sp_description'] = 'اس خدمت کو شائع کریں تاک آپ کے استعمال کنندگان دوبارہ لاگ ان کیے بغیر $a موڈل سائٹ کو جا سکیں۔آپ کو لازمی $a پر ایس ایس او ( شناخت مہیا کرنیوالا ) خدمت کیلیے رجسٹر ہونا پڑے گا۔ </li></ul><br /> اپنے معتبر استعمال کنندگان کو دوبارہ لاگ ان کیے بغیر $a سے اپنی سائٹ پر رسائی کیلیے رجسٹر ہوں۔ <ul><li<em>منحصریت: </em> آپ کو بھی $a کیلیے ایس ایس او ( شناخت مہیا کرنیوالا ) خدمت <strong> شائع </strong> لازمی کرنی ہے۔</li></ul><br />';
$string['sso_sp_name'] = 'ایس ایس او ) خدمات مہیا کرنےوالا (';

?>
