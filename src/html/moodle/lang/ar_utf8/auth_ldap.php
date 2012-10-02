<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_ldap_auth_user_create_key'] = 'أنشاء المستخدمين خارجياً';
$string['auth_ldap_bind_dn'] = 'إذا أردت استخدام وظيفة bind-user للبحث عن مستخدمين فيمكنك تعيين ذلك هنا، كأن تحدد مثلا: \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'اسم مميز';
$string['auth_ldap_bind_pw'] = 'كلمة مرور bind-user';
$string['auth_ldap_bind_pw_key'] = 'كلمة مرور';
$string['auth_ldap_bind_settings'] = 'إعدادات بايند';
$string['auth_ldap_changepasswordurl_key'] = 'عنوان تغير كلمة المرور';
$string['auth_ldap_contexts'] = 'قائمة السياقات الموجود بها المستخدمين، حيث يفصل بين كل سياق وآخر بفاصلة هكذا: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'صياغ';
$string['auth_ldap_create_context'] = 'لو مكّنت إنشاء المستخدم بتأكيد البريد الإلكترونيّ, حدّد السّياق إنشاء مستخدمون . يجب أن يكون هذا السّياق مختلف عن المستخدمين الآخرين لمنع القضايا الأمنيّة . لا تحتاج لإضافة هذا السّياق سياق الـمتغير(ldap_context-variable) مودل سيبحث عن المستخدمين من هذا السّياق تلقائيًّا';
$string['auth_ldap_create_context_key'] = 'الصياغ للمستخدمين الجدد';
$string['auth_ldap_creators'] = 'قائمة الجماعات التى يُسْمَح لأعضائها القيام بانشاء مناهج دراسية جديدة. أفصل بين الجماعات المتعدّدة بـ \";\" عادة على الشكل التالي (cn=teachers,ou=staff,o=myorg)';
$string['auth_ldap_creators_key'] = 'منشؤن';
$string['auth_ldap_expiration_key'] = 'أنتهاء تاريخ الصلاحية';
$string['auth_ldap_expiration_warning_desc'] = 'قبل كم يوم سيتم إرسال تحذير انتهاء صلاحية كلمة المرور.';
$string['auth_ldap_expiration_warning_key'] = 'تحذير أنتهاء تاريخ الصلاحية';
$string['auth_ldap_expireattr_key'] = 'معطيات أنتهاء تاريخ الصلاحية';
$string['auth_ldap_host_url'] = 'حدد مضيف برتوكول الدخول على الدليل الخفيف LDAPفي  شكل عنوان إنترنت مثل \'ldap://ldap.myorg.com/\' أو \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'عنوان المستضيف';
$string['auth_ldap_ldap_encoding_key'] = 'ترميز إل بي أي دي';
$string['auth_ldap_login_settings'] = 'أعدادات الدخول';
$string['auth_ldap_memberattribute'] = 'حدد صفة العضو المستخدم، عندما ينتمي المستخدمون لمجموعة. عادة \"عضو\"';
$string['auth_ldap_passtype_key'] = 'تنسيق كلمة المرور';
$string['auth_ldap_passwdexpire_settings'] = 'إعدادات انتهاء صلاحية كلمة مرور LDAP';
$string['auth_ldap_preventpassindb_key'] = 'أخفاء كلمة المرور';
$string['auth_ldap_search_sub'] = 'ضع قيمة <> 0 إذا أردت أن تبحث عن مستخدمين من سياقات فرعية.';
$string['auth_ldap_server_settings'] = 'إعدادات مزود LDAP';
$string['auth_ldap_update_userinfo'] = 'تحديث معلومات المستخدم (الاسم الأول، الاسم الأخير، العنوان، …) من برتوكول الدخول على الدليل الخفيف  LDAPإلى نظام Moodle . أنظر /auth/ldap/attr_mappings.php للحصول على معلومات عن التخطيط';
$string['auth_ldap_user_attribute'] = 'الوصف المستخدم لتسمية/البحث عن المستخدمين، وغالبا ما يكون \'cn\'.';
$string['auth_ldap_user_settings'] = 'أعدادات البحث عن مستخدم';
$string['auth_ldap_user_type_key'] = 'نوع المستخدم';
$string['auth_ldap_version'] = 'أصدار نظام الـ LDAP المستخدم في خادمك';
$string['auth_ldap_version_key'] = 'لإصدار';
$string['auth_ldapdescription'] = 'هذا الأسلوب يقدم التوثيق في مقابل مزود خارجي لبروتوكول الدخول على الدليل الخفيف LDAP.
إذا كان كل من اسم المستخدم وكلمة المرور صحيحا فإن نظام Moodle يقوم بإنشاء إدخال مستخدم جديد في قاعدة بياناته. ويمكن لهذه الوحدة النمطية قراءة سمات المستخدم من بروتوكول الدخول على الدليل الخفيف LDAP  وملء الحقول المطلوبة في نظام Moodle  . ولا يحتاج عند الدخول لاحقا سوى إلى التحقق من اسم المستخدم وكلمة المرور.';
$string['auth_ldapextrafields'] = 'هذه الحقول اختيارية، ويمكنك ملء بعض حقول المستخدم في نظام Moodle  مسبقا بالمعلومات من <b>حقول LDAP </b> التي تقوم بتحديدها هنا. <br />إذا تركت هذه الحقول فارغة فلن يتم نقل أي شيء من بروتوكول الدخول على الدليل الخفيف LDAP ، بل يتم استخدام الأوضاع الافتراضية الموجودة بنظام Moodle.<br />وفي كل الأحوال، فسوف يتمكن المستخدم من تعديل كل تلك الحقول بعد الدخول.';
$string['auth_ldaptitle'] = 'استخدم مزود LDAP';