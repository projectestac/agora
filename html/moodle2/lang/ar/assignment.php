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
 * Strings for component 'assignment', language 'ar', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'لديك وظائف بحاجة للاهتمام';
$string['addsubmission'] = 'أضف تسليم';
$string['allowdeleting'] = 'السماح بالحذف';
$string['allowdeleting_help'] = 'عند التفعيل، يمكن للطلاب حذف الملفات المرفوعة بأي وقت قبل التسليم للتصحيح.';
$string['allowmaxfiles'] = 'العدد الاقصى للملفات التي تحمل إلى الموقع';
$string['allowmaxfiles_help'] = 'العدد الأقصى للملفات التي يمكن رفعها. بما أن هذا لا يعرض في أي مكان، نقترح ذكره في وصف الوظيفة.';
$string['allownotes'] = 'السماح بالملاحظات';
$string['allownotes_help'] = 'عند التفعيل، يمكن لطلاب إدخال ملاحظات على مربعات النصوص، كما في حالة الوظائف النصية على الإنترنت online.';
$string['allowresubmit'] = 'السماح بإعادة تقديم مهمة';
$string['allowresubmit_help'] = '<p align="center" dir="rtl"><b>إعادة تسليم الواجبات</b></p>
<p align="right" dir="rtl">في الوضع الافتراضي، بمجرد ما يقوم المدرس بتصحيح
الواجبات وإعطائها الدرجات المستحقة، لن يتمكن الطلاب إعادة تسليمها.</p>
<p align="right" dir="rtl">في حالة تغير الوضع الافتراضي، وتشغيل هذا الخيار،
سيتمكن الطلاب من إعادة تسليم الواجبات التي تم تصحيحها ورصد درجاتها لتصحح مرة
أخرى ووضع درجات جديدة لها. هذا ربما يكون مفيداً لو رغب المدرس تشجيع الطلاب
القيام بعمل افضل من السابق بطريقة التكرار.</p>
<p align="right" dir="rtl">بالطبع، هذا الخيار غير مناسب للواجبات التي تتم بدون
إتصال.</p>';
$string['alreadygraded'] = 'لقد تم تقييم ';
$string['assignmentdetails'] = 'تفاصيل المهمة';
$string['assignment:exportownsubmission'] = 'صدر تسليمك الخاص بك';
$string['assignment:exportsubmission'] = 'صدر تسليم';
$string['assignment:grade'] = 'وضع درجة على المهمة';
$string['assignmentmail'] = '{$a->teacher} قام يوضع بعض الاجابات التقييمية على مهمتك المقدمة لـ \'{$a->assignment}\'

تستطيع مشاهدتها مرفقة مع مهمتك المقدمة {$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} قام بوضع بعض الاجابات التقييمية على مهمتك التي تم تقديمها \'<i>{$a->assignment}</i>\'<br /><br />
 ييمكنك مشاهدتها مرفقة مع مهمتك<a href="{$a->url}">assignment submission</a>.';
$string['assignmentname'] = 'اسم المهمة';
$string['assignmentsubmission'] = 'تسليم مهمة';
$string['assignment:submit'] = 'تقديم مهمة';
$string['assignmenttype'] = 'نوع المهمة';
$string['assignment:view'] = 'معاينة مهمة';
$string['availabledate'] = 'متاح من';
$string['cannotviewassignment'] = 'لا يمكنك معاينة هذه الوظيفة';
$string['comment'] = 'تعليق (علق)';
$string['commentinline'] = 'قم بتعليق في نفس السطر';
$string['configitemstocount'] = 'طبيعة الموادِ الّتي سَتُحْسَبُ لمقالاتِ الطالبِ في المهامِ على الإنترنتِ';
$string['configmaxbytes'] = 'الحجم المهمة الافتراضي لجميع المهمات في الموقع (خاضع لمحدودية المقرر الدراسي وبعض الإعدادات)';
$string['confirmdeletefile'] = 'هل أنت متأكد تماما القيام بحذف هذا الملف؟ <br /><strong>{$a}</strong>';
$string['currentgrade'] = 'الدرجة الحالية في';
$string['deleteallsubmissions'] = 'أحذف كل التسليمات';
$string['deletefilefailed'] = 'تم فشل حذف الملف';
$string['description'] = 'الوصف';
$string['downloadall'] = 'قم بتنزيل كل المهام كملف مضغوط';
$string['draft'] = 'مسودة';
$string['due'] = 'حان موعد المهمة';
$string['duedate'] = 'تاريخ تقديم مهمة';
$string['duedateno'] = 'لا يوجد موعد لتقديم المهمة';
$string['early'] = '{$a} مبكر';
$string['editmysubmission'] = 'حرر تسليمي';
$string['editthesefiles'] = 'حرر هذه الملفات';
$string['editthisfile'] = 'حدث هذا الملف';
$string['emailstudents'] = 'أرسال الأشعارات بالبريد الإلكتروني للطلاب';
$string['emailteachermail'] = '{$a->username} قام بتحديث المهمةالمقدمة لـ \'{$a->assignment}\' وهذه المهمة موجودة في: {$a->url}';
$string['emailteachermailhtml'] = '{$a->username} قام بتحديث المهمةالمقدمة لـ <i>\'{$a->assignment}\'</i><br /><br /> وهي <a href="{$a->url}">available on the web site</a>.';
$string['emailteachers'] = 'بريد إلكتروني تنبيهي للمعلمون';
$string['emailteachers_help'] = 'إذا تم تفعيل هذا الخيار، سيصل للمدرسين إعلام بالبريد الإلكتروني كلما رفع طالب أو حدث مرسلاته.

سيتم فقط إعلام المدرسين الذين لهم الحق بتقييم الوظيفة. فعلى سبيل المثال، إن كان في المقرر مجموعات منفصلة وكان المدرس ملزماً بمجموعة محددة فقط، فلن يستلم إعلامات بخصوص طلاب المجموعات الأخرى.';
$string['emptysubmission'] = 'لم تقم بتقديم أي شئ';
$string['enablenotification'] = 'ارسال إشعارات بالبريد الإلكتروني';
$string['errornosubmissions'] = 'لا يوجد تسليمات ليتم تنزيلها';
$string['existingfiledeleted'] = 'تم حذ الملفات الموجودة :{$a}';
$string['failedupdatefeedback'] = 'تعذر تحديث الاجابات التقييمية للمهمة المقدمة من {$a}';
$string['feedback'] = 'اجابة تقييمية';
$string['feedbackfromteacher'] = 'اجابة تقييمية من الـ {$a}';
$string['feedbackupdated'] = 'تحديث اجابة تقييمية {$a}  الناس';
$string['finalize'] = 'امنع تحديث التسليم';
$string['graded'] = 'تم رصد درجة';
$string['guestnosubmit'] = 'عذرا، لا يسمح للزوار بالقيام بتقديم مهمه. يجب عليك الدخول/التسجيل في الموقع قبل أن تستطيع تقديم اجابتك.';
$string['guestnoupload'] = 'عذرا، لا يسمح للزوار بتجميل الملفات';
$string['helpoffline'] = '<p>هذا مفيد عند مايكون تأدية المهمة خارج مودل. من الممكن أن تكون في موقع أخر أو في قاعة دراسية تقليدية.</p><p> سيتمكن الطلاب من مشاهدة توصيف المهمة، ولكن لن يستطيعون تحميل الملفات أو أي شئ أخر. تصحيح الأعمال بشكل طبيعي، وسيحصل الطلاب على أشعارات بدرجاتهم.';
$string['helponline'] = '<p>نوع المهمة هذه يطلب من الطلاب تحرير النص بأستخدام أدوات التحرير العادية. يتستطيع المعلمون تصحيحها مباشرة، ووضع التعليقات أو التعديلات في نفس السطر.</p>
<p> (لو كنت على دراية بإصدرات مودل السابقة فستلاحط أن نوع المهمة هذا يقوم بنفس العمل الذي كانت تقوم بع وحدة المذكرات)</p>';
$string['helpuploadsingle'] = '<p>نوع المهمة هذه يسمح لكل مستخدم تحميل ملف واحد من أي نوع كان.</p>
<p> هذا من الممكن أن يكون وثيقة معالج كلمات، موقع مضغوط، صورة، أو أي شئ تقوم بطلبه منهم للقيام بتقديمه.</p>';
$string['hideintro'] = 'أخفي الوصف قبل التاريخ المسموح به';
$string['invalidassignment'] = 'المهمة خطاء';
$string['invalidid'] = 'معرف المهمة خطاء';
$string['invalidtype'] = 'نوع المهمة خطاء';
$string['invaliduserid'] = 'معرف المستخدم غير صحيح';
$string['lastgrade'] = 'أخر درجة';
$string['late'] = '{$a} متأخر';
$string['maximumgrade'] = 'الدرجة القصوى';
$string['maximumsize'] = 'حجم الملف';
$string['messageprovider:assignment_updates'] = 'إشعارات المهمات';
$string['modulename'] = '2.2 مهمة';
$string['modulename_help'] = '<p><img alt=""  src="<?php echo $CFG->wwwroot?>/mod/assignment/icon.gif" />&nbsp;<b>الوجبات</b></p>
<p><b>يستطع المدرس من خلال الواجبات تحديد الواجب المطلوب من الطلاب
تحضيره بمحتوى رقمي (في اي هيئة) والقيام بتسليمه بواسطة تحميل الملف في الخادم.
نماذج الواجبات تضمن المقالات، المشاريع التعليمية، التقارير، إلخ. هذه الوحده
تحتوي على إمكانيات تصحيح الواجبات وإعطائها الدرجات المستحقة.</b></p>';
$string['modulenameplural'] = 'مهام';
$string['newsubmissions'] = 'مهام تم تقديمها';
$string['noassignments'] = 'لا يوجد مهام بعد';
$string['noattempts'] = 'لم يتم القيام بأي محاولات في هذه المهمة';
$string['noblogs'] = 'لا يوجد لديك مدخلات مدونة لتقوم بتسليمها';
$string['nofiles'] = 'لا يوجد ملفات مقدمة';
$string['nofilesyet'] = 'لم يتم تقديم أى ملف بعد';
$string['norequiregrading'] = 'لا توجد وظائف بحاجة لتقييم';
$string['nosubmisson'] = 'لم يتم تسليم أي وظيفة';
$string['notavailableyet'] = 'عذراً، هذه المهمة غير متوفرة حالياً.<br /> سيتم نشر التعليمات الخاصة بهذه المهمه في التاريخ الموضحة ادناه.';
$string['notes'] = 'ملاحظات';
$string['notesempty'] = 'لا توجد مدخلات';
$string['notesupdateerror'] = 'حدث خطاء أثناء تحديث الملاحظات';
$string['notgradedyet'] = 'لم تعطى درجة بعد';
$string['notsubmittedyet'] = 'لم تقدم بعد';
$string['onceassignmentsent'] = 'بمجرد تسليم المهمة للتقييم، لن تتمكن من حذف أو أرفاق ملف(ملفات). هل ترغب في الأستمرار؟';
$string['operation'] = 'عملية';
$string['optionalsettings'] = 'إعدادات اختيارية';
$string['overwritewarning'] = 'تحذير: التحميل مرة أخرى سيقوم باستبدال الحالي';
$string['pagesize'] = 'عدد المهام المسلمة التي تظهر في كل صفحة';
$string['pluginadministration'] = 'إدارة المهمات';
$string['pluginname'] = 'وظائف (2.2)';
$string['preventlate'] = 'أمنع تسليم المهام المتأخر';
$string['quickgrade'] = 'اسمح بتصحيح سريع';
$string['quickgrade_help'] = 'إنت تم تفعيله، سيمكن تقييم عدة وظائف من صفحة واحدة. قم بإضافة العلامات والتعليقات ومن ثم اضغط "احفظ جميع اجاباتي التقييمية" لحفظ كل التعديلات في هذه الصفحة.';
$string['requiregrading'] = 'يتطلب وضع درجة';
$string['responsefiles'] = 'ملفات الاجابة';
$string['reviewed'] = 'تمت مراجعته';
$string['saveallfeedback'] = 'احفظ جميع اجاباتي التقييمية';
$string['sendformarking'] = 'أرسال للتقييم';
$string['showrecentsubmissions'] = 'أظهر التسليمات الحديثة';
$string['submission'] = 'تسليم';
$string['submissiondraft'] = 'تسليم مسودة';
$string['submissionfeedback'] = 'اجابة تقييمية للمهمة المسلمة';
$string['submissions'] = 'تسليمات';
$string['submissionsaved'] = 'تم حفظ التغيرات التي قمت بها';
$string['submissionsnotgraded'] = '{$a} لم يتم تصحيح المهام المسلمة';
$string['submitassignment'] = 'قم بتقديم مهمتك باستخدام هذا النموذج';
$string['submitedformarking'] = 'لا يمكن تحديث المهام المسلمة لتصحيح وإعطاء الدرجات';
$string['submitformarking'] = 'قدم المهمة ليتم تسليمها';
$string['submitted'] = 'تم التسليم';
$string['submittedfiles'] = 'الملفات المسلمة';
$string['subplugintype_assignment'] = 'نوع المهمة';
$string['subplugintype_assignment_plural'] = 'أنواع الوظائف';
$string['trackdrafts'] = 'تفعيل زر "إرسال للتقييم"';
$string['trackdrafts_help'] = 'يسمح زر "إرسال للتقييم" للطلاب إعلام المحاضر بأنهم قد انتهوا من العمل على الوظيفة. يمكن للأستاذ أن يعيد الوظيفة لوضعية المسودة (إن كانت تحتاج لمزيد من العمل على سبيل المثال).';
$string['typeblog'] = 'مشاركة مدونة';
$string['typeoffline'] = 'نشاط بدون اتصال';
$string['typeonline'] = 'نص مباشر';
$string['typeupload'] = 'تحميل الملفات المتقدم';
$string['typeuploadsingle'] = 'تحميل ملف واحد';
$string['unfinalize'] = 'الرجوع للمسودة';
$string['unfinalizeerror'] = 'حدث خطأ، ولا يمكن إعادة المواد المرسلة لحالة المسودة.';
$string['unfinalize_help'] = 'تسمح الإعادة لحالة المسودة للطلاب بإضافة تحديثات لوظائفهم.';
$string['uploadafile'] = 'تحميل ملف';
$string['uploadbadname'] = 'يحتوي اسم هذا الملف على حروف غريبة ولذا تعذر تحميله.';
$string['uploadedfiles'] = 'الملفات المحملة';
$string['uploaderror'] = 'وقع خطأ أثناء حفظ الملف على المزود';
$string['uploadfailnoupdate'] = 'تم تحميل الملف بالفعل لكن تعذر تحديث ما قمت بتسليمه!';
$string['uploadfiles'] = 'حمل ملفات';
$string['uploadfiletoobig'] = 'عفوا! هذا الملف حجمه كبير جدا (الحد المسموح به{$a}  بايت)';
$string['uploadnofilefound'] = 'تعذر العثور على أية ملفات، هل أنت متأكد أنك قمت باختيار ملف للتحميل؟';
$string['uploadnotregistered'] = '\'{$a}\' تم تحميله بالفعل، لكن تعذر تسجيل ما قمت بتقديمه!';
$string['uploadsuccess'] = 'تم تحميل \'{$a}\' بنجاح';
$string['viewfeedback'] = 'معاينة درجات المهمة والاجابة التقييمية';
$string['viewmysubmission'] = 'عايين تسليماتي';
$string['viewsubmissions'] = 'معاينة {$a} المهام المسلمة ';
$string['yoursubmission'] = 'مهمتك المسلمة';
