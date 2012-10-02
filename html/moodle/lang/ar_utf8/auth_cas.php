<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_cas_auth_user_create'] = 'أنشئ المستخدمين خارجياً';
$string['auth_cas_baseuri'] = 'عنوان الخادم (لا شئ في حالة عدم وجود عنوان اساسي)<br /> على سبيل المثال، لو كان خادم خدمة التوثيق المركزية يجب على host.domaine.fr/CAS/ اذن<br />cas_baseuri = CAS/\'';
$string['auth_cas_casversion'] = 'إصدار';
$string['auth_cas_create_user'] = 'فعل هذا لو كنت ترغب في إدراج خدمة التوثيق المركزية لتوثيق للمستخدمين في قاعدة بيانات مودل. في حالة عدم الرغبة فقط المستخدمين المثبتين في قاعدة بيانات مودل يستطيعون الدخول إلى الموقع.';
$string['auth_cas_create_user_key'] = 'أنشاء مستخدم';
$string['auth_cas_enabled'] = 'في حالة رغبتك في استخدام توثيق  CAS قم نشغيل هذا.';
$string['auth_cas_hostname'] = 'اسم المستضيف لخادم CAS <br />على سبيل المثال: host.domain.fr';
$string['auth_cas_hostname_key'] = 'أسم المستضيف';
$string['auth_cas_invalidcaslogin'] = 'عذراَ، لقد أخفقت محاولت دخولك - بربما أنت غير مخول للقيام بذلك.';
$string['auth_cas_language'] = 'اللغة المختارة';
$string['auth_cas_language_key'] = 'اللغة';
$string['auth_cas_logincas'] = 'الدخول عن طريق أتصال أمن';
$string['auth_cas_port'] = 'منفذ خادم خدمة التوثيق المركزية';
$string['auth_cas_port_key'] = 'منفذ';
$string['auth_cas_server_settings'] = 'إعدادات خادم خدمة التوثيق المركزية';
$string['auth_cas_text'] = 'أتصال أمن';
$string['auth_cas_use_cas'] = 'استخدم خدمة التوثيق المركزية';
$string['auth_cas_version'] = 'صدار خدمة التوثيق المركزية';
$string['auth_casdescription'] = 'هذه الطريقةِ تستخدم (خدمة التوثيق المركزيةِ) لتوثيق لمستخدمين في بيئة تسجيل دخول واحدة. تستطيع ايضا استخدام توثيق LDAP المبسط. إذا كان اسمِ المستخدم وكلمةِ السر المُعطيين صحيحين وطبقاً لخدمة التوثيق المركزيةِ، سينشئ مودل حقل جديد في قاعدة البيانات للمستخدم الجديد ويَأْخذُ معلومات المستخدم من LDAP لو كانت مطلوبة. في محاولات الدخول الألحقة سيتم التأكد من اسم المستخدم وكلمة المرور فقط.';
$string['auth_casnotinstalled'] = 'لا يمكن استخدام خدمة التوثيق المركزية. لم يتم تثبت وحدة (PHP LDAP)';
$string['auth_castitle'] = 'أستخدم خادم خدمة التوثيق المركزية';