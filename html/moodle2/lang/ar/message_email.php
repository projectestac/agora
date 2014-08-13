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
 * Strings for component 'message_email', language 'ar', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'السماح للمستخدمون اختيار مجموعة الحروف';
$string['configallowusermailcharset'] = 'تمكين هذا الخيار،سيمكن مستخدمي الموقع من تحديد أحرف البريد الإلكترومي الخاصة بهم';
$string['confignoreplyaddress'] = 'رسائل البريدية الإلكترونية تَبْعثُ أحياناً نيابةً عَنْ مستخدم (ومثال على ذلك: - مشاركات منتدى). عنوان البريد الإلكتروني الذي يتم تحديده هنا سَيَكُونُ مستعمل في خانة "مِنْ" في تلك الحالاتِ عندما لا يَجِبُ للمستخدمون أَنْ يَكُونوا قادرون على الإجابة مباشرة إلى المستخدم (ومثال على ذلك: - عندما يَختارُ المستخدم إبْقاء عنوانِه خاصِّ).';
$string['configsitemailcharset'] = 'جميع رسائل البريد الإلكتروني الصادرة من موقعك ستستخدم حزمة الاحرف المحدد هناء. وعلى كل حال، كل مستخدم سيتمكن من التعديل لو مكن الاعداد التالي';
$string['configsmtphosts'] = 'أعط الاسم الكامل لخادم (SMTP) إس إم تي بي محلي أو أكثر ليقوم مودل باستخامه لإرسال البريد (مثلاً: - \'mail.a.com\' or \'mail.a.com;mail.b.com \'). لتحديد منفذ غير الافتراضي (أي غير المنفذ 25)، يمكنك استخدام صيغة  [server]:[port] (مثلاً: \'mail.a.com:587\'). يستخدم المنفذ 465 عادة مع SSL للاتصالات الآمنة، يستخدم المنفذ 587 عادة مع TLS، حدد برتوكول الأمن في الأسفل عند الحاجة. إذا تركته فارغا، سيقوم مودل بإستخدام طريقة بي إتش بي الافتراضية لإرسال البريد.';
$string['configsmtpuser'] = 'لو قمت بتحدّيد خادمَ (SMTP) إس إم تي بي في الحقل السابق، ويَتطلّبُ الخادمَ التأكيد، لهذا قم بإدْخلُ اسمَ المستخدم وكلمةَ السر هنا الخاصتين بهذا الخادم.';
$string['email'] = 'ارسل إشعارات بالبريد الإلكتروني إلي';
$string['noreplyaddress'] = 'عنوان عدم الرد';
$string['pluginname'] = 'بريد الإلكتروني';
$string['sitemailcharset'] = 'حزمة الحروف';
