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
 * Strings for component 'auth_db', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbchangepasswordurl_key'] = 'عنوان تغير كلمة المرور';
$string['auth_dbdescription'] = 'يستخدم هذا الأسلوب جدول بيانات خارجي للتحقق من صحة اسم المستخدم وكلمة المرور. وفي حالة الحسابات الجديدة فقد يتم نسخ المعلومات من الحقول الأخرى أيضا ونقلها إلى نظام Moodle.';
$string['auth_dbextencoding'] = 'ترميز قاعدة بيانات خارجية';
$string['auth_dbextencodinghelp'] = 'الترميز المستخدم في قاعدة بيانات خارجية';
$string['auth_dbextrafields'] = 'هذه الحقول اختيارية، ويمكنك ملء بعض حقول المستخدم في نظام Moodle  مسبقا بالمعلومات من <b>حقول البيانات الخارجية</b> التي تقوم بتحديدها هنا. <br />إذا تركت هذه الأماكن فارغة فسوف يتم اختيار الأوضاع الافتراضية.<br />وفي كل الأحوال، فسوف يتمكن المستخدم من تعديل كل تلك الحقول بعد الدخول.';
$string['auth_dbfieldpass'] = 'اسم الحقل المشتمل على كلمات المرور';
$string['auth_dbfieldpass_key'] = 'حقل كلمة المرور';
$string['auth_dbfielduser'] = 'اسم الحقل المشتمل على أسماء المستخدمين';
$string['auth_dbfielduser_key'] = 'حقل أسم المستخدم';
$string['auth_dbhost'] = 'هذا الحاسب يستضيف مزود قاعدة البيانات.';
$string['auth_dbhost_key'] = 'مستضيف';
$string['auth_dbname'] = 'اسم قاعدة البيانات ذاتها';
$string['auth_dbname_key'] = 'اسم قاعدة البيانات';
$string['auth_dbpass'] = 'كلمة المرور المطابقة لاسم المستخدم المذكور';
$string['auth_dbpass_key'] = 'كلمة مرور';
$string['auth_dbpasstype'] = 'حدّد الشّكل الذي يستخدمه حقل كلمة السّر. تشفير MD5 مفيد للتّوصيل تطبيقات الويب الشّائعة الأخرى مثل PostNuke';
$string['auth_dbpasstype_key'] = 'تنسيق كلمة المرور';
$string['auth_dbsetupsql'] = 'أمر إعداد SQL';
$string['auth_dbsuspendusererror'] = 'خطأ عند تعليق المستخدم: {$a}';
$string['auth_dbtable'] = 'اسم الجدول في قاعدة البيانات';
$string['auth_dbtable_key'] = 'جدول';
$string['auth_dbtype'] = 'نوع قاعدة البيانات (أنظر <a href="../lib/adodb/readme.htm#drivers">ADOdb documentation</a> للمزيد من التفاصيل';
$string['auth_dbtype_key'] = 'قاعدة بيانات';
$string['auth_dbuser'] = 'اسم المستخدم مع حق الدخول على قاعدة البيانات للقراءة فقط';
$string['auth_dbuser_key'] = 'مستخدم قاعدة بيانات';
$string['auth_dbuserstoadd'] = 'تم أضافة بيانات المستخدم:{$a}';
$string['auth_dbuserstoremove'] = 'تم إزالت بيانات  المستخدم:{$a}';
$string['pluginname'] = 'استخدم قاعدة بيانات خارجية';
