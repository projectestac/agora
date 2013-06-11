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
 * Strings for component 'group', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addgroup'] = 'إضافة المستخدم للمجموعة';
$string['addgroupstogrouping'] = 'إضافة المجموعة إلى التجمّع';
$string['addgroupstogroupings'] = 'إضافة/إزالة المجموعات';
$string['adduserstogroup'] = 'إضافة/أستبعاد مستخدم';
$string['allocateby'] = 'تخصيص الأعضاء';
$string['anygrouping'] = '[أي تجمّع]';
$string['autocreategroups'] = 'الإنشاء الآلي للمجموعات';
$string['backtogroupings'] = 'الرجوع إلى التجمّعات';
$string['backtogroups'] = 'الرجوع إلى المجموعات';
$string['byfirstname'] = 'أبجدياً حسب الاسم، الكنية';
$string['byidnumber'] = 'أبجدياً حسب رقم المعرّف';
$string['bylastname'] = 'أبجدياً حسب الكنية، الاسم';
$string['createautomaticgrouping'] = 'أنشئ مجموعات آلياً';
$string['creategroup'] = 'أنشاء مجموعة';
$string['creategrouping'] = 'إنشاء تجمّع';
$string['creategroupinselectedgrouping'] = 'إنشاء مجموعة داخل التجمّع';
$string['createingrouping'] = 'إنشاء في التجمّع';
$string['createorphangroup'] = 'إنشاء مجموعة يتيمة';
$string['databaseupgradegroups'] = 'إصدار المجموعات الآن هو {$a}';
$string['defaultgrouping'] = 'التجمّع الافتراضي';
$string['defaultgroupingname'] = 'تجمّع';
$string['defaultgroupname'] = 'مجموعة';
$string['deleteallgroupings'] = 'حذف كل التجمّعات';
$string['deleteallgroups'] = 'حذف كل المجموعات';
$string['deletegroupconfirm'] = 'هل أنت متأكد من رغبتك بحذف مجموعة \'{$a}\'؟';
$string['deletegrouping'] = 'حذف التجمّع';
$string['deletegroupingconfirm'] = 'هل أنت متأكد من رغبتك في حذف التجمّع \'{$a}\'؟ (لن يتم حذف المجموعات داخل التجمّع)';
$string['deletegroupsconfirm'] = 'هل أنت متأكد من رغبتك في حذف المجوعات التالية؟';
$string['deleteselectedgroup'] = 'حذف المجموعة المختارة';
$string['editgroupingsettings'] = 'تحرير إعدادات التجمّعات';
$string['editgroupsettings'] = 'تحرير إعدادات المجموعات';
$string['enrolmentkey'] = 'مفتاح التسجيل';
$string['group'] = 'مجموعة';
$string['groupby'] = 'حدد';
$string['groupdescription'] = 'وصف المجموعة';
$string['grouping'] = 'التجميع';
$string['groupingdescription'] = 'وصف التجميع';
$string['grouping_help'] = 'التجميع هو عدد من المجموعات ضمن مقرر. إذا تم اختيار تجميع، فسيكون بإمكان الطلاب المنتمين لمجموعات في هذا التجميع العمل سوية.';
$string['groupingname'] = 'اسم التجميع';
$string['groupings'] = 'تجميعات';
$string['groupingsonly'] = 'تجميعات فقط';
$string['groupmember'] = 'عضو المجموعة';
$string['groupmembers'] = 'أعضاء المجموعة';
$string['groupmembersonly'] = 'متاح لإعضاء المحموعة فقط';
$string['groupmembersonly_help'] = 'إذا تم تقعيل هذا الخيار، فإن هذا النشاط (أو المورد) سيكون متاحاً فقط للطلاب المنتمين للمجموعات المتضمنة في التجميع المحدد.';
$string['groupmemberssee'] = 'عاين اعضاء المجموعة';
$string['groupmembersselected'] = 'أعضاء مجموعة مختارة';
$string['groupmode'] = 'وضع مجموعة';
$string['groupmodeforce'] = 'فرض نمط المجموعات';
$string['groupmodeforce_help'] = 'إن كان نمط المجموعات مفروضاً، سيتم تطبيق نمط مجموعات المقرر على كل الأنشطة، وسيتم تجاهل هذا الإعداد ضمن المقررات.';
$string['groupmode_help'] = 'لهذا الإعداد ثلاثة خيارات:

* بدون مجموعات: لا توجد مجموعات فرعية، الجميع جزء من جماعة كبيرة واحدة.
* مجموعات منفصلة: يمكن لكل عضو في مجموعة، مشاهدة أفراد مجموعته فقط، الآخرون مخفيون تماماً.
* مجموعات مرئية: كل عضو في مجموعة يعمل ضمن مجموعته، ولكن يستطيع مشاهدة باقي المجموعات.

نمط المجموعات المعرف على مستوى المقرر الدراسي، هو النمط الافتراضي لكل الأنشطة.

كل نشاط يدعم المجموعات، يمكن أن يعرف نمط المجموعات الخاص به، ولكن إن كان نمط المجموعات مفروضاً، سيتم تجاهل هذا الإعداد ضمن المقررات.';
$string['groupmy'] = 'مجموعتي';
$string['groupname'] = 'اسم المجموعة';
$string['groupnotamember'] = 'عذراً، أنت ليس عضو في تلك المجموعة';
$string['groups'] = 'مجموعات';
$string['groupscount'] = 'مجموعات ({$a})';
$string['groupsettingsheader'] = 'مجموعات';
$string['groupsinselectedgrouping'] = 'مجموعات في:';
$string['groupsnone'] = 'لا يوجد محموعات';
$string['groupsonly'] = 'مجموعات فقط';
$string['groupspreview'] = 'معاينة المجموعات';
$string['groupsseparate'] = 'مجموعات منفصلة';
$string['groupsvisible'] = 'مجموعات مرئية';
$string['grouptemplate'] = 'مجموعة @';
$string['hidepicture'] = 'أخفاء الصورة';
$string['importgroups'] = 'استراد مجموعات';
$string['members'] = 'الأعضاء في كل مجموعة';
$string['membersofselectedgroup'] = 'أعضاء في:';
$string['namingscheme'] = 'طريقة التسمية';
$string['namingscheme_help'] = 'يمكن استخدام الرمز (@) لإنشاء مجموعات بترقيم أحرف. على سبيل المثال مجموعة A، مجموعة B، ...

يمكن استخدام الرمز (#) لإنشاء مجموعات بترقيم أعداد. على سبيل المثال: مجموعة 1، مجموعة 2، ...';
$string['newgrouping'] = 'تجميع جديد';
$string['newpicture'] = 'صورة جديدة';
$string['noallocation'] = 'لم يتم التخصيص';
$string['nogroupsassigned'] = 'لم يتم تعيين مجموعات';
$string['notingrouping'] = 'غير موجود في التجميع';
$string['number'] = 'عدد الأعضاء/المجموعات';
$string['numgroups'] = 'الأعضاء في كل مجموعة';
$string['nummembers'] = 'الأعضاء في كل مجموعة';
$string['overview'] = 'معاينة';
$string['printerfriendly'] = 'عرض طباعة';
$string['random'] = 'عشوائياً';
$string['removefromgroup'] = 'استبعد مستخدم من المجموعة {$a}';
$string['removegroupfromselectedgrouping'] = 'أستبعد مجموعة من التجميع';
$string['removegroupingsmembers'] = 'أستبعد كل المجموعة من التجميع';
$string['removegroupsmembers'] = 'أستبعد كل الأعضاء من المجموعة';
$string['removeselectedusers'] = 'استبعد المستخدمين المختارين من المجموعة';
$string['selectfromrole'] = 'اختر أعضاء من الدور';
$string['showgroupsingrouping'] = 'أظهر المجموعات في التجميع';
$string['showmembersforgroup'] = 'أظهر أعضاء لمجموعة';
