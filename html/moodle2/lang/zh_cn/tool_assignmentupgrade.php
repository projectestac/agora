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
 * Strings for component 'tool_assignmentupgrade', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = '你确定吗？';
$string['areyousuremessage'] = '你确定你要将这个作业 "{$a->name}"升級？';
$string['assignmentid'] = '作业识别编号';
$string['assignmentnotfound'] = '找不到此作业 (id={$a})';
$string['assignmentsperpage'] = '每一页的作业数';
$string['assignmenttype'] = '作业类型';
$string['backtoindex'] = '回到索引';
$string['batchoperations'] = '批量操作';
$string['batchupgrade'] = '升级多个作业';
$string['confirmbatchupgrade'] = '确认以批次进行作业的升级';
$string['conversioncomplete'] = '作业已经转换';
$string['conversionfailed'] = '作业转换成功。升级过程日志是：<br />{$a}';
$string['listnotupgraded'] = '列出还没有被升级的作业';
$string['listnotupgraded_desc'] = '你可以从这里个别地将作业升级';
$string['noassignmentsselected'] = '没有选定的作业';
$string['noassignmentstoupgrade'] = '这里没有作业需要升级';
$string['notsupported'] = '不支持';
$string['notupgradedintro'] = '这一页会列出旧版Moodle所建立的作业，它们都还没有升级到Moodle2.3的新作业模块。
并不是所有的作业都可升级---如果它们是由自订的作业类型所建立，那它们就需要先被升级到新作业外挂套件格式，才能够完成升级。';
$string['notupgradedtitle'] = '没升级的作业';
$string['pluginname'] = '作业引擎升级助手';
$string['select'] = '选择';
$string['submissions'] = '提交';
$string['supported'] = '升级';
$string['unknown'] = '未知';
$string['updatetable'] = '更新资料表';
$string['upgradable'] = '可升级的';
$string['upgradeall'] = '将所有作业升级';
$string['upgradeallconfirm'] = '要将所有作业升级？';
$string['upgradeassignmentfailed'] = '结果：升级失败。升级过程日志是：<br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = '结果：升级成功';
$string['upgradeassignmentsummary'] = '将作业升级 ：{$a->name} (课程：{$a->shortname})';
$string['upgradeprogress'] = '将作业升级：完成 {$a->current}个 /  总共 {$a->total}个。';
$string['upgradeselected'] = '将选定的作业升级';
$string['upgradeselectedcount'] = '升级{$a}个选出的作业？';
$string['upgradesingle'] = '升级一个作业';
$string['viewcourse'] = '检查这门课程及转换过的作业';
