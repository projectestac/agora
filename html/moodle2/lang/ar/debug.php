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
 * Strings for component 'debug', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'لم يتم إيجاد إضافة المصادقة {$a}';
$string['blocknotexist'] = 'الكتلة {$a} غير موجودة';
$string['cannotbenull'] = 'لا يمكن أن يكون {$a}  فارغًا (null) !';
$string['cannotdowngrade'] = 'لا يمكن التراجع عن ترقية {$a->plugin} من {$a->oldversion} إلى {$a->newversion}.';
$string['cannotfindadmin'] = 'لا يمكن إيجاد مستخدم مدير!';
$string['cannotinitpage'] = 'لا يمكن تهيئة الصفحة بالكامل: معرف {$a->name} غير صالح {$a->id}';
$string['cannotsetuptable'] = 'لا يمكن ضبط جداول {$a} بنجاح!';
$string['codingerror'] = 'تم الكشف عن خطأ بالكود، يجب إصلاحه من قبل مبرمج: {$a}';
$string['configmoodle'] = 'لم يتم إعداد مودل بعد. يجب أن تقوم بتحرير الملف config.php أولاً.';
$string['erroroccur'] = 'لقد حدث خطأ أثناء هذه العملية';
$string['invalidarraysize'] = 'طول مصفوفة غير صحيح للوسيط {$a}';
$string['invalideventdata'] = 'تم تسليم بيانات أحداث غير صحيحة: {$a}';
$string['invalidparameter'] = 'تم الكشف عن قيمة وسيط غير صالحة، لا يمكن استمرار التنفيذ.';
$string['invalidresponse'] = 'تم الكشف عن قيمة إجابة غير صالحة، لا يمكن استمرار التنفيذ.';
$string['missingconfigversion'] = 'جدول الإعدادات لا يحوي رقم الإصدار، لا يمكن الاستمرار للأسف.';
$string['modulenotexist'] = 'الوحدة {$a} غير موجودة';
$string['morethanonerecordinfetch'] = 'تم إيجاد أكثر من سجل في تابع fetch() !';
$string['mustbeoveride'] = 'لا يمكن إعادة كتابة الطريقة المجردة {$a}.';
$string['noadminrole'] = 'لا يمكن إيجاد دور مدير';
$string['noblocks'] = 'لا يوجد كتل مركبة!';
$string['nocate'] = 'لا يوجد تصنيفات!';
$string['nomodules'] = 'لا يوجد وحدات!';
$string['nopageclass'] = 'تم استيراد {$a} لكن لم يوجد أي صفوف صفحات';
$string['noreports'] = 'لا يوجد تقارير يمكن الوصول لها';
$string['notables'] = 'لا يوجد جداول!';
$string['phpvaroff'] = 'يجب إطفاء متحول مخدم PHP المسمى \'{$a->name}\' - {$a->link}';
$string['phpvaron'] = 'متحول مخدم PHP المسمى \'{$a->name}\' غير مشغل - {$a->link}';
$string['sessionmissing'] = 'الغرض {$a} مفقود من الجلسة';
$string['sqlrelyonobsoletetable'] = 'هذه الـ SQL تعتمد على جداول متقادمة: {$a}! يجب إصلاح كودك من قبل مبرمج.';
$string['withoutversion'] = 'ملف version.php الرئيسي مفقود أو غير مقروء أو تم نقله.';
$string['xmlizeunavailable'] = 'توابع التحويل إلى xml غير متوافرة';
