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
 * Strings for component 'auth_cas', language 'ar', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'مستخدمين خدمة التوثيق المركزية';
$string['accesNOCAS'] = 'مستخدمين اخرين';
$string['auth_cas_auth_user_create'] = 'أنشئ المستخدمين خارجياً';
$string['auth_cas_baseuri'] = 'عنوان الخادم (لا شئ في حالة عدم وجود عنوان اساسي)<br /> على سبيل المثال، لو كان خادم خدمة التوثيق المركزية يجب على host.domaine.fr/CAS/ اذن<br />cas_baseuri = CAS/\'';
$string['auth_cas_casversion'] = 'إصدار';
$string['auth_cas_certificate_check_key'] = 'تأكيد الخادم';
$string['auth_cas_certificate_path_key'] = 'مسار الشهادة';
$string['auth_cas_changepasswordurl'] = 'عنوان تغير كلمة المرور';
$string['auth_cas_create_user'] = 'فعل هذا لو كنت ترغب في إدراج خدمة التوثيق المركزية لتوثيق للمستخدمين في قاعدة بيانات مودل. في حالة عدم الرغبة فقط المستخدمين المثبتين في قاعدة بيانات مودل يستطيعون الدخول إلى الموقع.';
$string['auth_cas_create_user_key'] = 'أنشاء مستخدم';
$string['auth_casdescription'] = 'هذه الطريقةِ تستخدم (خدمة التوثيق المركزيةِ) لتوثيق لمستخدمين في بيئة تسجيل دخول واحدة. تستطيع ايضا استخدام توثيق LDAP المبسط. إذا كان اسمِ المستخدم وكلمةِ السر المُعطيين صحيحين وطبقاً لخدمة التوثيق المركزيةِ، سينشئ مودل حقل جديد في قاعدة البيانات للمستخدم الجديد ويَأْخذُ معلومات المستخدم من LDAP لو كانت مطلوبة. في محاولات الدخول الألحقة سيتم التأكد من اسم المستخدم وكلمة المرور فقط.';
$string['auth_cas_enabled'] = 'في حالة رغبتك في استخدام توثيق  CAS قم نشغيل هذا.';
$string['auth_cas_hostname'] = 'اسم المستضيف لخادم CAS <br />على سبيل المثال: host.domain.fr';
$string['auth_cas_hostname_key'] = 'أسم المستضيف';
$string['auth_cas_invalidcaslogin'] = 'عذراَ، لقد أخفقت محاولت دخولك - بربما أنت غير مخول للقيام بذلك.';
$string['auth_cas_language'] = 'اللغة المختارة';
$string['auth_cas_language_key'] = 'اللغة';
$string['auth_cas_logincas'] = 'الدخول عن طريق أتصال أمن';
$string['auth_cas_logoutcas_key'] = 'الخروج من خدمة التوثيق المركزية';
$string['auth_cas_multiauth_key'] = 'توثيق  متعدد';
$string['auth_casnotinstalled'] = 'لا يمكن استخدام خدمة التوثيق المركزية. لم يتم تثبت وحدة (PHP LDAP)';
$string['auth_cas_port'] = 'منفذ خادم خدمة التوثيق المركزية';
$string['auth_cas_port_key'] = 'منفذ';
$string['auth_cas_server_settings'] = 'إعدادات خادم خدمة التوثيق المركزية';
$string['auth_cas_text'] = 'أتصال أمن';
$string['auth_cas_use_cas'] = 'استخدم خدمة التوثيق المركزية';
$string['auth_cas_version'] = 'صدار خدمة التوثيق المركزية';
$string['CASform'] = 'خيارات التوثيق';
$string['pluginname'] = 'أستخدم خادم خدمة التوثيق المركزية';
