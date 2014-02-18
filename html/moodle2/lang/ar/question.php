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
 * Strings for component 'question', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'إجراء';
$string['addanotherhint'] = 'إضافة تلميح آخر';
$string['addcategory'] = 'إضافة فئة';
$string['adminreport'] = 'رفع تقرير بمشاكل محتملة في قاعدة بيانات الأسئلة.';
$string['answer'] = 'إجابة';
$string['answersaved'] = 'تم حفظ الإجابة';
$string['attemptfinished'] = 'انتهت المحاولة';
$string['attemptfinishedsubmitting'] = 'انتهت المحاولة وسيتم التسليم';
$string['availableq'] = 'متاح؟';
$string['broken'] = 'هذا الرابط غير صحيح ويشير إلى ملف غير موجود.';
$string['byandon'] = 'بواسطة <em>{$a->user}</em> في <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'لا يمكن نسخ ملف النسخة الاحتياطية';
$string['cannotcreate'] = 'لم يتمكن من إضافة مدخل جديد في جدول question_attempts';
$string['cannotcreatepath'] = 'لا يمكن إنشاء المسار: {$a}';
$string['cannotdeletecate'] = 'لا يمكنك حذف هذا التصنيف لأنه التصنيف الافتراضي ضمن هذا السياق.';
$string['cannotdeletemissingqtype'] = 'لا يمكن حذف نوع السؤال المفقود. هذه متطلبات النظام';
$string['cannotdeleteqtypeinuse'] = 'لا يمكنك حذف نوع السؤال \'{$a}\'. لأن هناك أسئلة من هذا النوع موجودة ببنك الأسئلة.';
$string['cannotdeleteqtypeneeded'] = 'لا يمكنك حذف نوع السؤال \'{$a}\'. لأن هناك أنواع أخرى من الأسئلة المنصبة تعتمد عليه.';
$string['cannotenable'] = 'لا يمكن إنشاء نوع السؤال {$a} مباشر.';
$string['cannotfindcate'] = 'لا يمكن إيجاد سجل التصنيف';
$string['cannotfindquestionfile'] = 'لم يتمكن من إيجاد ملف بيانات السؤال في الملف المضغوط';
$string['cannothidequestion'] = 'لم يتمكن من إخفاء هذا السؤال';
$string['cannotimportformat'] = 'عذراً، لا يمكن استيراد هذا التنسيق!';
$string['cannotinsertquestion'] = 'لا يمكن إدراج السؤال الجديد!';
$string['cannotloadquestion'] = 'لم يتم تحميل السؤال';
$string['cannotmovequestion'] = 'لا يمكنك استخدام هذا السكربت لنقل الأسئلة المرفق نعها ملفات من أماكن مختلفة.';
$string['cannotpreview'] = 'لا يمكنك معاينة هذه الأسئلة!';
$string['cannotread'] = 'تعذر قراءة الملف المستورد (أو الملف فارغ)';
$string['cannotretrieveqcat'] = 'لم يتم استرجاع فئة السؤال';
$string['cannotunhidequestion'] = 'فشل إظهار السؤال.';
$string['cannotunzip'] = 'لا يمكن فك ضغط الملف.';
$string['category'] = 'فئة';
$string['categorycurrent'] = 'الفئة الحالية';
$string['categorycurrentuse'] = 'استخدم هذه الفئة ';
$string['categorydoesnotexist'] = 'هذه الفئة غير موجوده';
$string['categoryinfo'] = 'معلومات الفئة';
$string['categorymove'] = 'التصنيف \'{$a->name}\' يحتوي على {$a->count} سؤال. يرجى اختيار تصنيف آخر لنقل الأسئلة إليه.';
$string['categorymoveto'] = 'أحفظ في الفئة ';
$string['categorynamecantbeblank'] = 'لا يمكن ترك اسم الفئة فارغاً';
$string['changeoptions'] = 'خيارات التغير';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">تصنيف "{$a->name}"</a> في المقرر الدراسي "{$a->coursename}" سيتغير وضع مشاركته من <strong>{$a->changefrom} إلى{$a->changeto}</strong>.';
$string['check'] = 'تحقق';
$string['chooseqtypetoadd'] = 'اختر نوعاً السؤال التي ترغب بإضافته';
$string['clicktoflag'] = 'انقر لتعليم هذا السؤال';
$string['clicktounflag'] = 'انقر لإلغاء تعليم هذا السؤال';
$string['comment'] = 'تعليق';
$string['comments'] = 'تعليقات';
$string['commentx'] = 'تعليق : {$a}';
$string['complete'] = 'تم/كامل';
$string['correct'] = 'صحيح/صح';
$string['created'] = 'تم إنشائه';
$string['createdby'] = 'أٌنشيء بواسطة';
$string['createdmodifiedheader'] = 'تم إنشائه / أخر مرة تم الحفظ';
$string['createnewquestion'] = 'إنشاء سؤال جديد ...';
$string['defaultfor'] = 'افتراضي لـ {$a}';
$string['defaultmark'] = 'الدرجة الافتراضية';
$string['deleteqtypeareyousure'] = 'هل أنت متأكد أنك ترغب في حذف نوع السؤال\'{$a}\'';
$string['deleteqtypeareyousuremessage'] = 'أنت على وشك حذف نوع السؤال \'{$a}\'. هل أنت متأكد انك ترغب في إزالة تثبيت انوع السؤال؟';
$string['deletingqtype'] = 'حذف نوع السؤال \'{$a}\'';
$string['disabled'] = 'معطل';
$string['donothing'] = 'لا تنسخ الملفات ولا تنقلها ولا تغيّر الروابط.';
$string['editcategories'] = 'تحرير التصنيفات ';
$string['editcategory'] = 'حرر الفئة';
$string['editingcategory'] = 'تعديل تصنيف';
$string['editingquestion'] = 'تعديل سؤال';
$string['editquestion'] = 'حرر السؤال';
$string['editquestions'] = 'حرر الأسئلة';
$string['editthiscategory'] = 'عدّل هذا التصنيف';
$string['emptyxml'] = 'خطأ غير معروف - فم بتفريغ الملف imsmanifest.xml';
$string['enabled'] = 'تم تفعيله';
$string['errordeletingquestionsfromcategory'] = 'خطأ في حذف السؤال من التصنيف {$a}.';
$string['errorfilecannotbecopied'] = 'خطأ: لا يمكن نسخ الملف {$a}.';
$string['errorfilecannotbemoved'] = 'خطأ: لا يمكن نقل الملف {$a}.';
$string['errormanualgradeoutofrange'] = 'الدرجة {$a->grade} ليست بين 0 و {$a->maxgrade} للسؤال {$a->name}. لم يتم حفظ النتيجة ولا التعليق.';
$string['exportcategory'] = 'تصدير الفئه';
$string['exportfilename'] = 'أسئله';
$string['exportquestions'] = 'صدر الأسئله إلى ملف';
$string['fileformat'] = 'تنسيف الملف';
$string['filesareacourse'] = 'منطقة ملفات المقرر الدراسي';
$string['filesareasite'] = 'منطقة ملفات الموقع';
$string['generalfeedback'] = 'إفادة عامه';
$string['getcategoryfromfile'] = 'احصل على الفئه من ملف';
$string['getcontextfromfile'] = 'الحصول على السياق من ملف';
$string['hidden'] = 'مخفي/غير ظاهر';
$string['hintn'] = 'تلميح';
$string['hinttext'] = 'نص التلميح';
$string['importcategory'] = 'استورد فئه';
$string['importfromcoursefiles'] = 'أو أختر ملف مقرر دراسي ليتم إستيراده';
$string['importfromupload'] = 'أختر ملف ليتم تحميله';
$string['importquestions'] = 'استورد أسئله من ملف';
$string['includesubcategories'] = 'أظهر أيضا الأسئلة من  التصنيفات الفرعية';
$string['lastmodifiedby'] = 'اخر تعديل بواسطة';
$string['maketoplevelitem'] = 'أنقل إلى مستوى أعلى';
$string['manualgradeoutofrange'] = 'هذه العلامة من خارج المجال المسموح';
$string['matchgrades'] = 'طابق الدرجات';
$string['modified'] = 'اخر حفظ';
$string['movecategory'] = 'أنقل الفئه';
$string['moveq'] = 'أنقل السؤال / الأسئله';
$string['moveqtoanothercontext'] = 'أنقل السؤال إلى سياق اخر';
$string['moveto'] = 'انقل إلي >>';
$string['movingcategory'] = 'يتم نقل الفئه';
$string['noresponse'] = 'لا توجد إجابة';
$string['notanswered'] = 'لم يتم الاجابة عليه';
$string['notgraded'] = 'لم يتم التقييم';
$string['notyetanswered'] = 'لم يتم الاجابة عليه بعد';
$string['numquestions'] = 'لا يوجد أسئلة';
$string['options'] = 'خيارات';
$string['page-question-category'] = 'صفحة فئة السؤال';
$string['page-question-edit'] = 'صفحة تحرير السؤال';
$string['page-question-export'] = 'صفحة تصدير السؤال';
$string['page-question-import'] = 'صفحة إستيراد السؤال';
$string['parentcategory'] = 'فئه أعلى';
$string['permissionedit'] = 'حرر هذا السؤال';
$string['permissionmove'] = 'أنقل هذا السؤال';
$string['permissionsaveasnew'] = 'أحفظ هذا السؤال كسؤال جديد';
$string['permissionto'] = 'لديك صلاحية لـ:';
$string['published'] = 'مشترك';
$string['qtypeveryshort'] = 'صح';
$string['questionbank'] = 'بنك الأسئله';
$string['questionbehavioursdisabled'] = 'تصرفات الأسئلة ليتم تعطيلها';
$string['questionbehavioursorder'] = 'ترتيب تصرفات الأسئلة';
$string['questioncategory'] = 'فئة السؤال';
$string['questioncatsfor'] = 'تصنيفات السؤال لـ \'{$a}\'';
$string['questiondoesnotexist'] = 'هذا السؤال غير موجود';
$string['questionname'] = 'أسم السؤال';
$string['questionno'] = 'سؤال {$a}';
$string['questions'] = 'أسئله';
$string['questiontype'] = 'نوع السؤال';
$string['questionuse'] = 'استخدم السؤال في هذا النشاط';
$string['restart'] = 'ابداء من جديد';
$string['restartwiththeseoptions'] = 'ابداء من جديد بهذه الخيارات';
$string['reviewresponse'] = 'مراجعة الاجابة';
$string['rightanswer'] = 'إجابة صحيحة';
$string['saved'] = 'تم حفظ: {$a}';
$string['selectacategory'] = 'اختر فئه';
$string['selectaqtypefordescription'] = 'ااختر نوع السؤل لتتمكن من معاينة وصفه';
$string['selectcategoryabove'] = 'اختر تصنيفاً من الأعلى';
$string['showhidden'] = 'اظهر الأسئلة القديمة ايضا';
$string['showquestiontext'] = 'أظهر نص السؤال ضمن قائمة الأسئلة';
$string['step'] = 'خطوة';
$string['stoponerror'] = 'توقف عند حصول خطاء';
$string['submit'] = 'سلم/قدم';
$string['submitandfinish'] = 'سلم/قدم وانتهي';
$string['tofilecategory'] = 'اكتب الفئه في ملف';
$string['tofilecontext'] = 'اكتب السياق في ملف';
$string['uninstallqtype'] = 'إزالة التثبيت نوع هذا السؤال';
$string['unknown'] = 'غير معروف';
$string['unpublished'] = 'غير مشترك';
$string['withselected'] = 'مع ما تم اختياره';
$string['youmustselectaqtype'] = 'لا بد من اختيار نوع السؤال';
