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
 * Strings for component 'blog', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'أضف مدخل جديد';
$string['addnewexternalblog'] = 'تسجيل مدونة خارجية';
$string['assocdescription'] = 'إن كنت تكتب عن مقرر و/أو وحدة نشاط، قم بتحديدهم من هنا.';
$string['associated'] = 'مرتبطة {$a}';
$string['associatewithcourse'] = 'مدونة عن مقرر {$a->coursename}';
$string['associatewithmodule'] = 'مدونة عن {$a->modtype}: {$a->modname}';
$string['association'] = 'ارتباط';
$string['associations'] = 'ارتباطات';
$string['associationunviewable'] = 'لا يمكن للآخرين عرض هذه المشاركة إلى أن يتم ربطها بمقرر ما أو يتم تغيير حقل \'انشر إلى\'';
$string['autotags'] = 'إضافة هذه الوسوم';
$string['autotags_help'] = 'أدخل واحد أو أكثر من الوسوم المحلية (مفصول بينها بفواصل) والتي تريد إضافتها تلقائيًا لجميع تدويناتك المنسوخة من المدونة الخارجية إلى مدونتك المحلية.';
$string['backupblogshelp'] = 'عند التفعيل سيتم تضمين المدونات في نسخ الموقع الاحتياطية التلقائية';
$string['blockexternalstitle'] = 'مدونات خارجية';
$string['blocktitle'] = 'علامات عنوان كتلة بلوق';
$string['blog'] = 'بلوق';
$string['blogaboutthis'] = 'مدون عن هذا الـ {$a->type}';
$string['blogaboutthiscourse'] = 'اكتب تدوينة حول هذا المقرر';
$string['blogaboutthismodule'] = 'اكتب تدوينة حول هذا {$a}';
$string['blogadministration'] = 'إدارة المدونة';
$string['blogdeleteconfirm'] = 'احذف هذه التدوينة';
$string['blogdisable'] = 'التدوين غير مفعّل!';
$string['blogentries'] = 'التدوينات';
$string['blogentriesabout'] = 'التدوينات عن {$a}';
$string['blogentriesbygroupaboutcourse'] = 'التدوينات عن {$a->course} بواسطة {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'التدوينات عن {$a->mod} بواسطة {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'التدوينات عن {$a->course} بواسطة {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'التدوينات عن {$a->mod} بواسطة {$a->user}';
$string['blogentrybyuser'] = 'تدوينة بواسطة {$a}';
$string['blogpreferences'] = 'تفضيلات البلوق';
$string['blogs'] = 'بلوقات';
$string['blogtags'] = 'علامات بلوق';
$string['cannotviewcourseblog'] = 'ليس لديك الإذن المطلوب لعرض المدونات في هذا المقرر';
$string['cannotviewcourseorgroupblog'] = 'ليس لديك الإذن المطلوب لعرض المدونات في هذا المقرر أو هذه المجموعة';
$string['cannotviewsiteblog'] = 'ليس لديك الإذن المطلوب لعرض جميع مدونات الموقع';
$string['cannotviewuserblog'] = 'ليس لديك الإذن المطلوب لقراءة مدونات المستخدمين';
$string['configexternalblogcrontime'] = 'كم مرة يتحقق مودل من المدونات الخارجية بحثاً عن تدوينات جديدة.';
$string['configmaxexternalblogsperuser'] = 'عدد المدونات الخارجية التي يسمح لكل مستخدم بربطها مع مدونته في مودل.';
$string['configuseblogassociations'] = 'تمكين ربط التدوينات بالمقررات وواحدات المقررات';
$string['configuseexternalblogs'] = 'يمكين المستخدمين من تحديد خلاصات مدونة خارجية. يتحقق مودل من هذه الخلاصات بشكل دوري وينسخ التدوينات الجديدة للمدونة المحلية لذلك المستخدم.';
$string['courseblog'] = 'بلوق مقرر دراسي: {$a}';
$string['courseblogdisable'] = 'مدونات المقرر غير مفعّلة';
$string['courseblogs'] = 'يستطيع المستخدمين رؤية بلوقات الاشخاص المشتركين معهم في المقرر الدراسي';
$string['deleteblogassociations'] = 'حذف ارتباطات المدونة';
$string['deleteblogassociations_help'] = 'عند تفعيلها سيتم إلغاء ربط التدوينات بهذا المقرر أو أي من مصادر المقرر ونشاطاته.
لكن التدوينات ذاتها لن تحذف.';
$string['deleteexternalblog'] = 'إلغاء تسجيل هذه المدونة الخارجية';
$string['deleteotagswarn'] = 'هل أنت متأكد من حذف هذه الوسوم من جميع التدوينات، وكذلك حذفها من النظام؟';
$string['description'] = 'وصف';
$string['description_help'] = 'أدخل جملة أو اثنتين تلخص محتويات مدونتك الخارجية. (إذا لم توفر وصفاً لها، سيتم استخدام الوصف المسجل في مدونتك الخارجية).';
$string['donothaveblog'] = 'ليس لديك مدونتك الخاصة، عذراً.';
$string['editentry'] = 'تحرير تدوينة';
$string['editexternalblog'] = 'تحرير هذه المدونة الخارجية';
$string['emptybody'] = 'لا يمكن ترك محتوى البلوق فارغاً';
$string['emptyrssfeed'] = 'العنوان الذي أدخلته لا يشير إلى خلاصات RSS صالحة';
$string['emptytitle'] = 'لا يمكن ترك عنوان البلوق فارغاً';
$string['emptyurl'] = 'يجب أن تحدد عنوان لخلاصات RSS صالحة';
$string['entrybody'] = 'متن مدخل بلوق';
$string['entrybodyonlydesc'] = 'وصف مدخل';
$string['entryerrornotyours'] = 'هذا المدخل ليس خاص بك';
$string['entrysaved'] = 'تم حفظ مشاركتك';
$string['entrytitle'] = 'عنوان مدخل';
$string['entryupdated'] = 'تم تحديث مدخل بلوق';
$string['externalblogcrontime'] = 'جدولة كرون للمدونة الخارجية';
$string['externalblogdeleteconfirm'] = 'هل حقاً تريد إلغاء تسجيل هذه المدونة الخارجية؟';
$string['externalblogdeleted'] = 'لقد تم إلغاء تسجيل المدونة الخارجية';
$string['externalblogs'] = 'مدونات خارجية';
$string['feedisinvalid'] = 'هذه الخلاصة غير صالحة';
$string['feedisvalid'] = 'هذه الخلاصة صالحة';
$string['filterblogsby'] = 'ترشيح حسب...';
$string['filtertags'] = 'ترشيح الوسوم';
$string['filtertags_help'] = 'يمكنك استخدام هذه الميزة لترشيح التدوينات التي تريدها. إذا حددت الوسوم (مفصولة بفواصل) هنا فيستم نسخ التدوينات الموسومة بهذه الوسوم فقط من المدونة الخارجية.';
$string['groupblog'] = 'مدونة مجموعة: {$a}';
$string['groupblogdisable'] = 'مدونة المجموعة غير مفعلة';
$string['groupblogentries'] = 'التدوينات المرتبطة بـ {$a->coursename} بواسطة مجموعة {$a->groupname}';
$string['groupblogs'] = 'يستطيع المستخدمين فقط رؤية بلوقات الاشخاص المشتركين معهم في المجموعة';
$string['incorrectblogfilter'] = 'نوع مرشح المدونة المحدد غير صحيح';
$string['intro'] = 'تم أنشاء هذه التغذية الاخبارية آلياص من بلوق واحد أو أكثر';
$string['invalidgroupid'] = 'معرف مجموعة غير صالح';
$string['invalidurl'] = 'لا يمكن الوصول لهذا العنوان';
$string['linktooriginalentry'] = 'رابط للتدوينة الأصلية';
$string['maxexternalblogsperuser'] = 'العدد الأقصى من المدونات الخارجية لكل مستخدم';
$string['mustassociatecourse'] = 'إن كنت ستنشر لأعضاء مقرر أو مجموعة، فعليك أن تربط مقرراً بهذه التدوينة';
$string['name'] = 'الاسم';
$string['name_help'] = 'أدخل اسماً واصفاً لمدونتك الخارجية. (سيتم استخدام عنوان المدونة الخارجية إن لم تكتب اسماً)';
$string['noentriesyet'] = 'لا يوجد مدلات مرئية هناء';
$string['noguestpost'] = 'لا يستطيع الزائر القيام بوضع بلوقات';
$string['nopermissionstodeleteentry'] = 'ليس لديك الإذن المطلوب لحذف هذه التدوينة';
$string['norighttodeletetag'] = 'انت لست مخول بحذف هذا - {$a}';
$string['nosuchentry'] = 'تدوينة غير موجودة';
$string['notallowedtoedit'] = 'غير مسموح لك القيام بتحرير/تعديل هذا المدخل';
$string['numberofentries'] = 'مدخلات: ش';
$string['numberoftags'] = 'عدد العلامات التي ستعرض';
$string['page-blog-edit'] = 'صفحات تحرير المدونة';
$string['page-blog-index'] = 'صفحات قوائم المدونات';
$string['page-blog-x'] = 'كافة صفحات المدونات';
$string['pagesize'] = 'عدد مدخلات المدونة في كل صفحة';
$string['permalink'] = 'رابط دائم';
$string['personalblogs'] = 'يستطيع المستخدمون مشاهدة البولوق الخاص بهم فقط';
$string['preferences'] = 'خيارات';
$string['publishto'] = 'انشر إلى';
$string['publishtocourse'] = 'المستخدمين المشتركين معك بمقرر';
$string['publishtocourseassoc'] = 'أعضاء من المقرر المرتبط';
$string['publishtocourseassocparam'] = 'أعضاء في {$a}';
$string['publishtogroup'] = 'المستخدمين المشتركين معك في مجموعة';
$string['publishtogroupassoc'] = 'أعضاء مجموعتك في المقرر المرتبط';
$string['publishtogroupassocparam'] = 'أعضاء مجموعتك في {$a}';
$string['publishto_help'] = 'لديك 3 خيارات:

* شخصي (مسودة) - فقط أنت والإداريين يمكنهم رؤية هذه المداخلة
* أي شخص على هذا الموقع - أي سخص مسجل في هذا الموقع يمكنه رؤية هذه المداخلة
* أي شخص في العالم - يمكن لأي شخص، متضمناً الضيوف قراءة هذه المداخلة';
$string['publishtonoone'] = 'أنت (مسودة)';
$string['publishtosite'] = 'أي أحد في هذا الموقع';
$string['publishtoworld'] = 'أي أحد في العالم';
$string['readfirst'] = 'اقرأ هذا أولاً';
$string['relatedblogentries'] = 'تدوينات ذات صلة';
$string['retrievedfrom'] = 'جلب من';
$string['searchterm'] = 'البحث: {$a}';
$string['settingsupdatederror'] = 'لقد حدث خطاء ما، لا يمكن تحديث إعدادات تفضيلات بلوق';
$string['siteblog'] = 'بلوق الموقع: {$a}';
$string['siteblogdisable'] = 'مدونات الموقع غير مفعلة';
$string['siteblogs'] = 'يستطيع جمية المستخدمون مشاهدة كل مدخلات البولوق';
$string['tagdatelastused'] = 'أرخ العلامة المستخدة مؤخرا';
$string['tagparam'] = 'وسم: {$a}';
$string['tags'] = 'الوسوم';
$string['tagsort'] = 'رتب العلامة المعروضة بي';
$string['tagtext'] = 'نص العلامة';
$string['timefetched'] = 'وقت آخر مزامنة';
$string['timewithin'] = 'اعرض العلامات المستخدمة ضمن هذا لعدة أيام';
$string['updateentrywithid'] = 'تحديث مدخل';
$string['url'] = 'عنوان';
$string['url_help'] = 'أدخل عنوان الخلاصات RSS للمدونة الخارجية';
$string['useblogassociations'] = 'تمكين ربط التدوينات';
$string['useexternalblogs'] = 'تمكين المدونات الخارجية';
$string['userblog'] = 'بلوق مستخدم: {$a}';
$string['userblogentries'] = 'التدوينات بواسطة {$a}';
$string['valid'] = 'صالح';
$string['viewallblogentries'] = 'كل التدوينات حول هذا {$a}';
$string['viewallmodentries'] = 'عرض كل التدوينات حول هذا {$a->type}';
$string['viewallmyentries'] = 'عرض كافة تدويناتي';
$string['viewblogentries'] = 'التدوينات حول هذا {$a->type}';
$string['viewblogsfor'] = 'عرض كل التدوينات لـ...';
$string['viewcourseblogs'] = 'عرض كل التدوينات لهذا المقرر';
$string['viewentriesbyuseraboutcourse'] = 'عرض التدوينات حول هذا المقرر بواسطة {$a}';
$string['viewgroupblogs'] = 'عرض تدوينات المجموعة...';
$string['viewgroupentries'] = 'تدوينات المجموعة';
$string['viewmodblogs'] = 'المدونات لوحدة...';
$string['viewmodentries'] = 'مدونات الوحدة';
$string['viewmyentries'] = 'تدويناتي';
$string['viewmyentriesaboutcourse'] = 'عرض تدويناتي حول هذا المقرر';
$string['viewmyentriesaboutmodule'] = 'عرض تدويناتي حول هذا {$a}';
$string['viewsiteentries'] = 'عرض كل المداخلات';
$string['viewuserentries'] = 'عرض كل تدوينات {$a}';
$string['worldblogs'] = 'العالم يستطيع قراءة التدوينات المضبوطة لتكون متاحة للعالم';
$string['wrongpostid'] = 'معرّف تدوينة خاطئ';
