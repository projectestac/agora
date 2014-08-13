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
 * Strings for component 'error', language 'ar', branch 'MOODLE_26_STABLE'
 *
 * @package   error
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alreadyloggedin'] = 'أنت حالياً مسجل كـ{$a}، عليك أولاً الخروج من ذاك الحساب قبل محاولة الدخول كمستخدم جديد.';
$string['backuptablefail'] = 'لم يتمكن من إعداد جداول النسخ الاحتياطي بنجاح!';
$string['blockcannotconfig'] = 'هذه الكتلة لا تدعم الإعدادات العامة';
$string['blockcannotinistantiate'] = 'مشكلة أثناء إنشاء الكتلة';
$string['blockcannotread'] = 'لم يتمكن من قراءة البيانات للكتلة ذات المعرف: {$a}';
$string['blockdoesnotexist'] = 'الكتلة غير موجودة';
$string['blockdoesnotexistonpage'] = 'الكتلة (id={$a->instanceid}) غير موجودة بالصفحة ({$a->url}).';
$string['blocknameconflict'] = 'تضارب بالتسمية: الكتلة {$a->name} لها نفس اسم كتلة موجودة: {$a->conflict}!';
$string['cannotaddcoursemodule'] = 'لم يتمكن من إضافة وحدة مقرر دراسي جديد';
$string['cannotaddcoursemoduletosection'] = 'لم يتمكن من إضافة وحدة المقرر الدراسي الجديد لذلك القسم';
$string['cannotaddmodule'] = 'لم يتم إضافة الوحدة {$a} إلى قائمة الوحدات!';
$string['cannotaddnewmodule'] = 'لم يتم إضافة الوحدة الجديدة {$a}';
$string['cannotaddrss'] = 'ليس لديك الإذن بإضافة تلقيمات rss';
$string['cannotaddthisblocktype'] = 'لا يمكن إضافة كتلة {$a}  إلى الصفحة.';
$string['cannotassignrole'] = 'لا يمكن تعيين دور في هذا المقرر الدراسي';
$string['cannotassignrolehere'] = 'لا يمكنك تعيين هذا الدور (id = {$a->roleid}) في هذا السياق ({$a->context})';
$string['cannotcallscript'] = 'لا يمكنك استدعاء هذا السكريبت بتلك الطريقة';
$string['cannotcallusgetselecteduser'] = 'لا يمكنك استعداء user_selector::get_selected_user إذا كان التحديد المتعدد مفعّلاً';
$string['cannotcreatebackupdir'] = 'لم يتمكن من إنشاء مجلد بيانات النسخ الاحتياطي backupdata. على مدير الموقع تعديل سماحيات الملفات';
$string['cannotcreatecategory'] = 'لم يتم إدراج تصنيف';
$string['cannotcreategroup'] = 'خطأ في إنشاء المجوعة';
$string['cannotcreatelangbase'] = 'خطأ: لا يمكن إنشاء مجلد اللغة الأساسية';
$string['cannotcreatelangdir'] = 'لا يمكن إنشاء مجلد اللغة';
$string['cannotcreatetempdir'] = 'لا يمكن إنشاء المجلد المؤقت';
$string['cannotcreateuploaddir'] = 'لا يمكن إنشاء مجلد الرفع. على مدير الموقع إصلاح سماحيات الملفات.';
$string['cannotdeletecategorycourse'] = 'لا مكن حذف المقرر الدراسي \'{$a}\'';
$string['cannotdeletecategoryquestions'] = 'لا يمكن حذف السؤال من التصنيف \'{$a}\'';
$string['cannotdeletecourse'] = 'ليس لديك الإذن بحذف هذا المقرر الدراسي';
$string['cannotdeletedir'] = 'لا يمكن حذف ({$a})';
$string['cannotdeletefile'] = 'لا يمكن حذف هذا الملف';
$string['cannotdeleterole'] = 'لا يمكن حذفه بسبب {$a}';
$string['cannotdownloadcomponents'] = 'لم يتم تحميل العناصر';
$string['cannotdownloadzipfile'] = 'لم يتم تحميل الملف المضغوط';
$string['cannoteditcomment'] = 'هذا التعليق ليس لك لتعدله!';
$string['cannoteditcommentexpired'] = 'لا يمكنك تحرير هذا. لقد انتهى وقت الصلاحية!';
$string['cannoteditpostorblog'] = 'لا يمكنك إنشاء أو تحرير التدوينات';
$string['cannotedityourprofile'] = 'عذراً، لا يمكنك تحرير سيرتك الذاتية';
$string['cannotfindcomponent'] = 'لم يتم العثور على المكون';
$string['cannotfindcontext'] = 'لم يتم العثور على محتوى';
$string['cannotfindcourse'] = 'لم يتم العثور على المقرر الدراسي';
$string['cannotfinddocs'] = 'لا يمكن إيجاد ملفات مساعدة اللغة "{$a}"';
$string['cannotfindgradeitem'] = 'لم يتم العثور على بند الدرجة';
$string['cannotfindgroup'] = 'تعذر العثور على المجموعة';
$string['cannotfindhelp'] = 'لم يتم العثور على ملفات مساعدة اللغة "{$a}" ';
$string['cannotfindinfo'] = 'لم يتم العثور على معلومات عن: "{$a}" ';
$string['cannotfindlang'] = 'لم يتم إيجاد حزمة اللغة "{$a}" ';
$string['cannotfindteacher'] = 'لم يتم إيجاد المدرس';
$string['cannotfinduser'] = 'لم يتم إيجاد المستخدم المسمى "{$a}"';
$string['cannotgetblock'] = 'لم يتم استرداد الكتل من قاعدة البيانات';
$string['cannotgetcats'] = 'لا يمكن الحصول على سجل التصنيف';
$string['cannotgetdata'] = 'لم يتم الحصول على البيانات';
$string['cannotgradeuser'] = 'لا يمكن وضع علامة لهذا المستخدم';
$string['cannotimport'] = 'خطأ في الاستيراد';
$string['cannotimportformat'] = 'عذراً، استيراد هذا التنسيق غير مدعوم بعد!';
$string['cannotimportgrade'] = 'خطأ في استيراد الدرجات';
$string['cannotinsertgrade'] = 'لا يمكن إدراج العلامة من دون معرف المقرر الدراسي';
$string['cannotinsertrate'] = 'لا يمكن إدراج تقييم جديد ({$a->id} = {$a->rating})';
$string['cannotinsertrecord'] = 'لا يمكن إدراج السجل الجديد ذو المعرف {$a}';
$string['cannotmailconfirm'] = 'خطأ في إرسال بريد التحقق من تغيير كلمة السر';
$string['cannotmoverolewithid'] = 'لا يمكن تغيير الدور ذو المعرف {$a}';
$string['cannotopencsv'] = 'لا يمكن فتح ملف CSV';
$string['cannotopenfile'] = 'لا يمكن فتح ملف ({$a})';
$string['cannotopenforwrit'] = 'لا يمكن فتح {$a} للكتابة';
$string['cannotopentemplate'] = 'لا يمكن فتح ملف القالب ({$a})';
$string['cannotopenzip'] = 'لا يمكن فتح لاملف المضغوط، ربما يكون هذا خطأ في توسعه zip على نظام 64 بت';
$string['cannotoverriderolehere'] = '';
$string['cannotreadfile'] = 'لا يمكنك قراءة الملف  ({$a})';
$string['cannotreadtmpfile'] = 'خطأ في قراءة الملف المؤقت';
$string['cannotreaduploadfile'] = 'لم بتمكن من قراءة الملف المرفوع';
$string['cannotresetguestpwd'] = 'لا يمكنك إعادة تعيين كلمة سر الزائر';
$string['cannotresetmail'] = 'خطأ أثناء إعادة تعيين كلمة السر وإرسال بريد إلكتروني لك';
$string['cannotresetthisrole'] = 'لا يمكن إعادة تعيين هذا الدور';
$string['cannotsaveblock'] = 'خطأ أثناء حفظ إعدادات الكتلة';
$string['cannotsavecomment'] = 'لم يتم حفظ التعليق';
$string['cannotsavedata'] = 'لا يمكن حفظ البيانات';
$string['cannotsavefile'] = 'لا يمكن حفظ الملف "{$a}"!';
$string['cannotsavemd5file'] = 'لم يتم حفظ ملف  md5';
$string['cannotsavezipfile'] = 'لم يتم حفظ الملف المضغوط';
$string['cannotsetpassword'] = 'لم يتمكن من تعيين كلمة سر المستخدم!';
$string['cannotsettheme'] = 'لا يمكن تعيين السمة!';
$string['cannotunzipfile'] = 'لم يتم فك الملف المضغوط';
$string['cannotupdatemod'] = 'لا يمكن تحديث {$a}';
$string['cannotupdateprofile'] = 'خطأ في تحديث سجل المستخدم';
$string['cannotupdaterss'] = 'لا يمكن تحديث RSS';
$string['cannotupdateusermsgpref'] = ' لايمكن تحديث تفضيلات رسالة المستخدم';
$string['cannotuploadfile'] = 'خطاء في معالجة تحميل الملف';
$string['cannotuseadmin'] = 'يجب أن تكون مستخدم إداري لتستخدم هذه الصفحة';
$string['cannotuseadminadminorteacher'] = 'يجب أن تكون مدرساً أو مديراً لتستخدم هذه الصفحة';
$string['cannotusepage'] = 'يمكن فقط للمدرسين والمدراء استخدام هذه الصفحة';
$string['cannotusepage2'] = 'عذراً، لا يمكنك استخدام هذه الصفحة';
$string['cannotviewprofile'] = 'لا تستطيع معاينة السير الذاتية الخاصة بهذا المستخدم';
$string['cannotviewreport'] = 'لا تستطيع معاينة هذا التقرير';
$string['couldnotupdatenoexistinguser'] = 'لا يمكن تحديث المستخدم - المستخدم غير موجود';
$string['countriesphpempty'] = 'خطأ: الملف countries.php في حزمة اللغة {$a} فارغ أو غير موجود.';
$string['coursedoesnotbelongtocategory'] = 'المقرر الدراسي لا ينتمي إلى هذا التصنيف';
$string['coursegroupunknown'] = 'المقرر الدرسي المتطابق مع المجموعة {$a} لم يحدد';
$string['courseidnotfound'] = 'معرّف المقرر الدراسي غير موجود';
$string['coursemisconf'] = 'تم إعداد المقرر الدراسي بشكل خاطئ';
$string['csvcolumnduplicates'] = 'تم الكشف عن عمود مكرر';
$string['csvemptyfile'] = 'ملف الـCSV هذا؛ فارغ';
$string['csvinvalidcolsnum'] = 'خطأ في ملف CSV - كل سطر يجب أن يحوي 49 أو 70 حقلاً';
$string['csvloaderror'] = 'خطأ أثناء تحميل ملف CSV!';
$string['dbsessionhandlerproblem'] = 'فشل إعداد جلسة قاعدة البيانات.<br /><br />رجاءً أخبر مدير السيرفر.';
$string['dbsessionmysqlpacketsize'] = 'تم الكشف عم خطأ حاد في الجلسة.<br /><br />رجاءً أخبر المدير، هذه المشكلة ناتجة في الغالب عن قيمة قليلة في max_allowed_packet في إعدادات MySQL.';
$string['dbupdatefailed'] = 'فشل تحديث قاعدة البيانات';
$string['ddlfieldalreadyexists'] = 'الحقل "{$a}" موجود مسبقاً';
$string['ddlfieldnotexist'] = 'الحقل "{$a->fieldname}" موجود مسبقاً في الجدول "{$a->tablename}"';
$string['ddltablealreadyexists'] = 'الجدول "{$a}" موجود مسبقاً';
$string['ddltablenotexist'] = 'الجدول "{$a}" غير موجود';
$string['dmlreadexception'] = 'خطاء في القراءة من قاعدة البيانات';
$string['dmlwriteexception'] = 'خطاء في الكتابة إلى قاعدة البيانات';
$string['emailfail'] = 'فشل إرسال البريد الإلكتروني';
$string['error'] = 'حصل خطاء';
$string['errorcleaningdirectory'] = 'خطاء في تنظيف دليل "{$a}"';
$string['errorcopyingfiles'] = 'خطاء في نسخ الملفات';
$string['errorcreatingdirectory'] = 'خطاء في أنشاء دليل "{$a}"';
$string['errorcreatingfile'] = 'خطاء في تنظيف ملف "{$a}"';
$string['errorcreatingrole'] = 'خطاء في إنشاء الدور';
$string['erroronline'] = 'خطاء في سطر {$a}';
$string['errorreadingfile'] = 'خطاء في قراءة ملف "{$a}"';
$string['errorsettinguserpref'] = 'خطاء في إعدادات تفضيلات المستخدم';
$string['errorunzippingfiles'] = 'خطاء في فك الملفات المضغوطة';
$string['expiredkey'] = 'انتهة فترة صلاحية المفتاح';
$string['fieldrequired'] = '"{$a}" حقل مطلوب';
$string['fileexists'] = 'الملف موجود';
$string['filenotfound'] = 'عذراً، لم يتم العثور على  الملف المطلوب';
$string['filenotreadable'] = 'الملف غير قابل للقراءة';
$string['filternotenabled'] = 'المنقح غير مفعل';
$string['groupalready'] = 'المستخدم ينتمي للمجموعة {$a}';
$string['groupexistforcourse'] = 'المجموعة "{$a}" موجودة مسبقاً في هذا المقرر الدراسي';
$string['groupnotaddederror'] = 'لم يتم إضافة المجموعة "{$a}"';
$string['groupunknown'] = 'المجموعة {$a}  لا يرتبط بأي منهج دراسي محدد';
$string['groupusernotmember'] = 'المستخدم ليس عضواً من هذه المجموعة';
$string['guestnocomment'] = 'لا يسمح للضيوف بإضافة التعليقات!';
$string['guestnoeditprofile'] = 'لا يمكن للمستخدم الضيف أن يعدّل حسابه';
$string['guestnoeditprofileother'] = 'لا يمكن تعديل حساب المستخدم الضيف';
$string['hackdetected'] = 'تم الكشف عن محاولة اختراق';
$string['invalidcategory'] = 'الفئة غير صحيحه';
$string['invalidcategoryid'] = 'معرف التصنيف خطاء!';
$string['invalidcomment'] = 'التعليق خطاء';
$string['invalidconfirmdata'] = 'تاكيد البيانات غير صحيح';
$string['invalidcontext'] = 'المحتوى غير صحيح';
$string['invalidcourse'] = 'المقرر الدراسي غير صحيح';
$string['invalidcourseid'] = 'أنت تحاول استخدام معرف مقرر دراسي غير صحيح ({$a})';
$string['invalidcourselevel'] = 'مستوى المحتوى خطاء';
$string['invalidcoursemodule'] = 'معرف وحدة المقرر الدراسي غير صحيح';
$string['invalidcoursenameshort'] = 'اسم المختصر للمقرر الدراسي غير صحيح';
$string['invaliddata'] = 'البيانات المسلمة غير صحيحة';
$string['invalidevent'] = 'حدث غير صحيح';
$string['invalidfieldname'] = '"{$a}" اسم الحقل غير صحيح';
$string['invalidformdata'] = 'نموذج البيانات غير صحيح';
$string['invalidfunction'] = 'عملية غير صحيحة';
$string['invalidgradeitemid'] = 'معرف بند الدرجة غير صحيح';
$string['invalidgroupid'] = 'معرف المجموعة المحددة غير صحيح';
$string['invalidipformat'] = 'تنسيق برتوكول عنوان الإنترنت غير صحيح';
$string['invaliditemid'] = 'معرف البند غير صحيح';
$string['invalidkey'] = 'المفتاح غير صحيح';
$string['invalidnum'] = 'القيمة الرقمية غير صحيحة';
$string['invalidoutcome'] = 'معرف المخرجات غير صحيح';
$string['invalidpagesize'] = 'حجم الصفحة غير صحيح';
$string['invalidpasswordpolicy'] = 'اتفاقية كلمة المرور غير صحيحة';
$string['invalidpaymentmethod'] = 'طريقة دفع المبلغ المالي غير صحيحة: {$a}';
$string['invalidrecord'] = 'لم يتم العثور على سجل البيانات في جدول قاعدة البيانات';
$string['invalidrecordunknown'] = 'لم يتم العثور على سجل البيانات في قاعدة البيانات';
$string['invalidrequest'] = 'طلب غير صحيح';
$string['invalidrole'] = 'الدور غير صحيح';
$string['invalidroleid'] = 'معرف الدور غير صحيح';
$string['invalidscaleid'] = 'معرف المقياس غير صحيح';
$string['invalidsection'] = 'يحتوي سجل وحدة المقرر الدراسي على قسم غير صحيح';
$string['invalidshortname'] = 'الاسم المختصر لذلك المقرر غير صحيح';
$string['invalidurl'] = 'عنوان الإنترنت غير صحيح';
$string['invaliduser'] = 'المستخدم غير صحيح';
$string['invaliduserid'] = 'معرف المستخدم غير صحيح';
$string['invalidxmlfile'] = '"{$a}" ليس ملف XML صالح';
$string['listnoitem'] = 'لم يتم إيجاد العنصر';
$string['logfilenotavailable'] = 'السجلات غير متوفرة';
$string['maxbytes'] = 'حجم هذا الملف اكبر من الحجم المسموح به';
$string['messagingdisable'] = 'نظام الرسائل معطل في هذا الموقع';
$string['missingfield'] = 'الحقل "{$a}" غير موجود';
$string['missingrequiredfield'] = 'بعض الحقول المطلوبة مفقودة';
$string['moduledoesnotexist'] = 'هذه الوحدة غير موجودة';
$string['mustbeloggedin'] = 'لابد أن تكون داخلاً على النظام لتتمكن من القيام بهذا';
$string['mustbeteacher'] = 'المعلمون فقط يستطيعون معاينة هذه الصغحة';
$string['noadmins'] = 'لا يوجد مدراء!';
$string['noblocks'] = 'لم يتم العثور على كتل';
$string['nodata'] = 'لا يوجد بيانات';
$string['noexistingcategory'] = 'لا يوجد تصنيف';
$string['nofile'] = 'لم يتم تحديد الملف';
$string['nofiltersenabled'] = 'الم يتم تفعيل المنقحات';
$string['noguest'] = 'لا يسمح بزوار هنا!';
$string['nologinas'] = 'غير مسموح لك الدخول بذلك المستخدم';
$string['nonmeaningfulcontent'] = 'لا يوجد محتوي ذي معني';
$string['noparticipants'] = 'لم يتم العثور على مشاركين في هذا المقرر الدراسي';
$string['nopermissions'] = 'عذراً ولكنك لا تملك حالياً الصلاحيات لتقوم بهذا ({$a})';
$string['nopermissiontocomment'] = 'لا تستطيع إضافة تعليقات';
$string['nopermissiontodelentry'] = 'لا تسطيع حذف مدخلات الاخرين';
$string['nopermissiontoeditcomment'] = 'لا تستطيع تحرير تعليقات الاخرين!';
$string['nopermissiontohide'] = 'لا يوجد صلاحية لإخفاء هذا!';
$string['nopermissiontoshow'] = 'لا يوجد صلاحية لمشاهدة هذا!';
$string['nopermissiontoupdatecalendar'] = 'عذراً ولكنك لا تملك حالياً الصلاحيات لتحرير حدث الرزنامة';
$string['nopermissiontoviewgrades'] = 'لا يمكن معاينة النتائج';
$string['nostatstodisplay'] = 'عذراً، لا يوجد بيانات ليتم عرضها';
$string['notavailable'] = 'غير متوفر حاليا';
$string['notownerofkey'] = 'أ،ت ليس صاحي هذا المفتاح';
$string['onlyeditown'] = 'تستطيع تحرير معلوماتك فقط';
$string['processingstops'] = 'المعالجة تقف هناء. تم تجاهل السجلات المتبقية';
$string['reportnotavailable'] = 'هذا النوع من التقرير ';
$string['requireloginerror'] = 'لا يمكن الوصول إلي هذا المقرر الدراسي أو النشاط';
$string['restricteduser'] = 'عذرا، حسابك الحالي "{$a}" لا يخولك للقيام بذلك';
$string['sectionnotexist'] = 'هذا القسم غير موجود';
$string['sendmessage'] = 'إرسل رسالة';
$string['sessionerroruser'] = 'انتهت جلستك، الرجاء الدخول ثانيا';
$string['shortnametaken'] = 'الاسم المختصر مستخدم لمقرر دراسي أخر';
$string['spellcheckernotconf'] = 'المدقق الأملائي غير معد';
$string['tagdisabled'] = 'الوسوم معطّلة!';
$string['TODO'] = 'للقيام بـــ';
$string['unknowaction'] = 'إجراء غير معروف';
$string['unknowcategory'] = 'التصنيف غير معروف';
$string['unknowformat'] = 'التنسيق ({$a}) غير معروف';
$string['unknownbackupexporterror'] = 'خطاء غير معروف اثناء إستيراد المعلومات';
$string['unknowncontext'] = 'هذا المحتوى غير معروف';
$string['unknowncourse'] = 'اسم المقرر الدراسي غير معروف "{$a}"';
$string['unknowncourseidnumber'] = 'معرف المقرر الدراسي غير معروف "{$a}';
$string['unknowncourserequest'] = 'طلب مقرر دراسي غير معروف';
$string['unknownfiletype'] = 'حطاء غير معروف في نوع المنقح';
$string['unknowngroup'] = 'المجموعة غير معروفة "{$a}"';
$string['unknownrole'] = 'الدورغير معروف "{$a}"';
$string['unknoworder'] = 'الترتيب غير معروف "{$a}"';
$string['useremailduplicate'] = 'العنوان مكرر';
$string['usernotaddederror'] = 'المستخدم "{$a}" لم يتم إضافته - خطاء غير معروف';
$string['usernotaddedregistered'] = 'المستخدم "{$a}" - يتم تسجيله مسبقاً';
$string['usernotavailable'] = 'غير مسموح لك معاينة التفصيلات الشخصية لهذا المستخدم';
