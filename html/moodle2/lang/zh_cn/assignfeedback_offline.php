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
 * Strings for component 'assignfeedback_offline', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = '确认分数的导入';
$string['default'] = '默认为启用';
$string['default_help'] = '如果设置此项，所有新建的作业里面默认会启用离线评分表格功能。';
$string['downloadgrades'] = '下载评分用的评价表';
$string['enabled'] = '离线评分表格';
$string['enabled_help'] = '如果启用，教师将可以下载一个电子表格，在电子表格中离线评分完后再上传这个表格即可以完成作业评分操作。';
$string['feedbackupdate'] = '将 "{$a->student}" 的栏目 "{$a->field}"  设定为 "{$a->text}"';
$string['gradelockedingradebook'] = '{$a}的分数在成绩册中已经被锁定';
$string['graderecentlymodified'] = '{$a}的分数已经在Moodle中被更改，且比计分评价来得新';
$string['gradesfile'] = '计分评价表（CSV格式）';
$string['gradesfile_help'] = '含有更改分数的计分评价表。这个文件必须是从这一个作业下载的一个CSV文件，且必须有栏目包含学生的分数和身份辨识资料。文件必须是以"UTF-8"编码。';
$string['gradeupdate'] = '将 {$a->student}的分数设为 {$a->grade}';
$string['ignoremodified'] = '若在Moodle上的变更比在计分评价表上的新，则允许更新记录。';
$string['ignoremodified_help'] = '当计分评价表从Moodle下载时，它包含了每一个分数的最近更改日期。
若在计分评价表下载之后，有任何分数在Moodle上被更新，默认下，在导入分数时Moodle将会拒绝覆盖这一更新的信息。
如果选用这个选项，Moodle将会关闭安全检查，并允许多位评分者覆盖彼此的分数。';
$string['importgrades'] = '确认在计分评价表上的变更';
$string['invalidgradeimport'] = 'Moodle无法阅读你上传的评价表。请确定它是以逗号隔开的.CSV文件，并再试一次。';
$string['nochanges'] = '在上传的计分评价表里没有发现更改过的分数';
$string['offlinegradingworksheet'] = '分数';
$string['pluginname'] = '离线评分表格';
$string['processgrades'] = '导入成绩';
$string['skiprecord'] = '跳过记录';
$string['updatedgrades'] = '更新{$a}的分数及反馈';
$string['updaterecord'] = '更新记录';
$string['uploadgrades'] = '上传计分评价表';
