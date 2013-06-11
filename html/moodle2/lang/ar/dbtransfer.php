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
 * Strings for component 'dbtransfer', language 'ar', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'جاري التحقق من بنية جداول المصدر';
$string['copyingtable'] = 'جاري نسخ الجدول {$a}';
$string['copyingtables'] = 'جاري نسخ محتويات الجدول';
$string['creatingtargettables'] = 'جاري إنشاء الجداول في قاعدة بيانات الهدف';
$string['dbexport'] = 'تصدير قاعدة البيانات';
$string['dbtransfer'] = 'نقل قاعدة البيانات';
$string['differenttableexception'] = 'بنية الجدول {$a} غير مطابقة';
$string['done'] = 'تم';
$string['exportschemaexception'] = 'بنية قاعدة البيانات الحالية لا تطابق كل ملفات install.xml.<br /> {$a}';
$string['importschemaexception'] = 'بنية قاعدة البيانات الحالية لا تطابق كل ملفات install.xml.<br /> {$a}';
$string['importversionmismatchexception'] = 'الإصدار الحالي {$a->currentver} لا يطابق الإصدار الذي تم تصديره {$a->schemaver}.';
$string['malformedxmlexception'] = 'تم العثور على XML غير سليم، لا يمكن الاستمرار.';
$string['unknowntableexception'] = 'تم إيجاد جدول غير معروف {$a} في ملف التصدير.';
