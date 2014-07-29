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
 * Strings for component 'condition', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = '向表单添加{no}个活动条件';
$string['addgrades'] = '向表单添加{no}个成绩条件';
$string['availabilityconditions'] = '限制访问';
$string['availablefrom'] = '可访问时间';
$string['availablefrom_help'] = '可访问的开始/结束时间决定了在什么时间学生可以通过课程页面的链接访问此活动。

活动的可访问时间和开放时间是不同的。在开放时间之外，学生仍然可以查看活动描述。而在可访问时间之外，对活动的访问被完全禁止。';
$string['availableuntil'] = '可访问直到';
$string['badavailabledates'] = '无效日期。如果您两个日期都设了，那么“可访问时间”应该在“直到”时间之前。';
$string['badgradelimits'] = '如果您同时设置了成绩上限和下限，那么上限必须高于下限。';
$string['completion_complete'] = '必须标记为“完成”';
$string['completioncondition'] = '活动完成条件';
$string['completioncondition_help'] = '此设置决定在参加本活动之前，必须先达到哪些活动的完成条件。注意，在设置完成条件之前，必须先设置好进度跟踪。

如果需要，也可以设置多条活动完成条件。那么必须先满足所有的活动完成条件，才能参加本活动。';
$string['completionconditionsection'] = '活动完成条件';
$string['completion_fail'] = '完成时必须是“不及格”';
$string['completion_incomplete'] = '必须未标记为“完成”';
$string['completion_pass'] = '完成时必须是“及格”';
$string['configenableavailability'] = '启用后，可以基于条件（日期、成绩或完成状态）设置活动或资源的可用性。';
$string['contains'] = '包含';
$string['doesnotcontain'] = '不包含';
$string['enableavailability'] = '启用条件可用性';
$string['endswith'] = '以...结束';
$string['grade_atleast'] = '至少要';
$string['gradecondition'] = '成绩条件';
$string['gradecondition_help'] = '此设置决定在参加此活动之前，必须先满足哪些成绩条件。

根据需要，可以设置多个成绩条件。所有条件都满足后才能参加此活动。';
$string['gradeitembutnolimits'] = '您至少要输入上限和下限中的一个。';
$string['gradelimitsbutnoitem'] = '您必须选择一个成绩项。';
$string['gradesmustbenumeric'] = '最高和最低分必须是数值（或留空）。';
$string['grade_upto'] = '且少于';
$string['groupingnoaccess'] = '您当前不属于任何有访问此小节权限的小组。';
$string['isempty'] = '为空';
$string['isequalto'] = '等于';
$string['none'] = '（无）';
$string['notavailableyet'] = '还不可用';
$string['requires_completion_0'] = '不可用，除非活动<strong>{$a}</strong>未完成。';
$string['requires_completion_1'] = '不可用，直到标记活动<strong>{$a}</strong>为完成。';
$string['requires_completion_2'] = '不可用，直到标记活动<strong>{$a}</strong>为完成且及格。';
$string['requires_completion_3'] = '不可用，除非活动<strong>{$a}</strong>已完成且不及格。';
$string['requires_date'] = '自 {$a} 起可用。';
$string['requires_date_before'] = '直到 {$a} 才可用。';
$string['requires_date_both'] = '从{$a->from}到{$a->until}之间可用。';
$string['requires_date_both_single_day'] = '在 {$a} 上可用。';
$string['requires_grade_any'] = '不可用，直到您在<strong>{$a}</strong>获得成绩。';
$string['requires_grade_max'] = '不可用，除非您在<strong>{$a}</strong>中获得了适当的分数。';
$string['requires_grade_min'] = '不可用，直到您在<strong>{$a}</strong>中获得了要求的分数。';
$string['requires_grade_range'] = '不可用，除非您在 <strong>{$a}</strong>中获得了指定的分数。';
$string['showavailability'] = '活动可用之前';
$string['showavailability_hide'] = '完全隐藏活动';
$string['showavailabilitysection'] = '在小节可以访问前';
$string['showavailabilitysection_hide'] = '完全隐藏小节';
$string['showavailability_show'] = '活动以暗色显示，并显示受限信息';
$string['startswith'] = '以...开始';
$string['userrestriction_hidden'] = '限制（完全隐藏，无消息）：“{$a}”';
$string['userrestriction_visible'] = '限制：“{$a}”';
