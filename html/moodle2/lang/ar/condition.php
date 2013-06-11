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
 * Strings for component 'condition', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'أضف {no} شروط نشاط للنموذج';
$string['addgrades'] = 'أضف {no} شروط علامات للنموذج';
$string['availabilityconditions'] = 'تقييد الدخول';
$string['availablefrom'] = 'يمكن الوصول له من';
$string['availablefrom_help'] = 'تواريخ الدخول من/إلى يحدد متى يمكن للطلاب الدخول على النشاط عبر رابط في صفحة المقرر الدراسي

الفرق بين تواريخ الوصول من/إلى و إعدادات التوافر للنشاط هو أنه خارج تلك المدة تسمح إعدادات التوافر للطلاب بعرض وصف النشاط، في حين أن تواريخ الوصول من/إلى تمنع الوصول تماماً.';
$string['availableuntil'] = 'يمكن الدخول حتى';
$string['badavailabledates'] = 'التواريخ غير صالحة، إن كنت قد وضعت كلا التاريخين، يجب أن يكون تاريخ "يمكن الدخول من" قبل تاريخ "حتى"';
$string['completion_complete'] = 'يجب أن يكون معلّماً بأنه مكتمل';
$string['completioncondition'] = 'شرط إكمال النشاط';
$string['completioncondition_help'] = 'يحدد هذا الإعداد أي شروط إكمال النشاط يجب تحقيقها لكي يصبح النشاط متوافرًا. لاحظ أنه لكي تتمكن من ضبط شرط إكمال النشاط يجب أولاً ضبط تتبع الإكمال.

يمكن وضع عدة شروط لإكمال النشاط عند الرغبة. وعندها يجب أن تتحقق كل هذه الشروط لكي يصبح النشاط متوافرًا.';
$string['completion_fail'] = 'يجب أن يكون مكتملاً مع علامة رسوب';
$string['completion_incomplete'] = 'لا يجب أن يكون معلّم بأنه مكتمل';
$string['completion_pass'] = 'يجب أن يكون مكتملاً مع علامة نجاح';
$string['configenableavailability'] = 'يسمح لك هذا الخيار عند تفعيله وضع شروط (بناءً على التاريخ، العلامة، أو الإكمال) لتحديد متى يكون النشاط متوافراً.';
$string['contains'] = 'يحتوي';
$string['doesnotcontain'] = 'لا يحتوي';
$string['enableavailability'] = 'فعل خاصية الدخول المشروط';
$string['endswith'] = 'ينتهي بـ';
$string['grade_atleast'] = 'يجب أن يكون على الأقل';
$string['gradecondition'] = 'شرط العلامة';
$string['gradecondition_help'] = 'يحدد هذا الإعداد أي شروط الدرجات يجب تحقيقها لكي يصبح النشاط متوافرًا. لاحظ أنه لكي تتمكن من ضبط شرط إكمال النشاط يجب أولاً ضبط تتبع الإكمال.

يمكن وضع عدة شروط درجات عند الرغبة. وعندها يجب أن تتحقق كل هذه الشروط لكي يصبح النشاط متوافرًا.';
$string['grade_upto'] = 'وأقل من';
$string['isempty'] = 'هو فارغ';
$string['isequalto'] = 'هو يساوي';
$string['none'] = '(لا شيء)';
$string['notavailableyet'] = 'غير متوافر حتى الآن';
$string['requires_completion_0'] = 'غير متوافر مالم يكن النشاط <strong>{$a}</strong> غير مكتمل.';
$string['requires_completion_1'] = 'غير متوافر إلى أن يعلّم النشاط <strong>{$a}</strong> بأنه مكتمل.';
$string['requires_completion_2'] = 'غير متوافر إلى أن يعلّم النشاط <strong>{$a}</strong> بأنه مكتمل وناجح.';
$string['requires_completion_3'] = 'غير متوافر مالم يكن النشاط <strong>{$a}</strong> مكتملاً وراسبًا.';
$string['requires_date'] = 'متوافر من {$a}.';
$string['requires_date_before'] = 'متوافر حتى {$a}.';
$string['requires_date_both'] = 'متوافر من {$a->from} إلى  {$a->until}.';
$string['requires_grade_any'] = 'غير متوافر إلى أن تحصل على علامة <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'غير متوافر إلى أن تحصل على محصّلة مناسبة في <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'غير متوافر إلى أن تحصل على المحصلة المطلوبة في <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'غير متوافر مالم تحصل على المحصلة المحددة في <strong>{$a}</strong>.';
$string['showavailability'] = 'قبل تمكين الدخول إلى النشاط';
$string['showavailability_hide'] = 'اخفاء النشاط بالكامل';
$string['showavailability_show'] = 'اعرض النشاط غير مفعلاً (بلون رمادي)، مع معلومات عن سبب التقييد';
$string['startswith'] = 'يبداء بـ';
$string['userrestriction_hidden'] = 'غير متاح (مخفي بشكل كامل، دون رسالة): &lsquo;{$a}&rsquo;';
$string['userrestriction_visible'] = 'غير متاح: &lsquo;{$a}&rsquo;';
