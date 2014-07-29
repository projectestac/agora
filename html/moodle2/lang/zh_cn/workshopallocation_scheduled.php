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
 * Strings for component 'workshopallocation_scheduled', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = '当前状态';
$string['currentstatusexecution'] = '状态';
$string['currentstatusexecution1'] = '执行于 {$a->datetime}';
$string['currentstatusexecution2'] = '再次执行于 {$a->datetime}';
$string['currentstatusexecution3'] = '将执行于 {$a->datetime}';
$string['currentstatusexecution4'] = '等待执行';
$string['currentstatusnext'] = '下一次执行';
$string['currentstatusnext_help'] = '在某些情况下，即使已经分配过，还会再次自动执行分配。例如，作业截止日期被延后时。';
$string['currentstatusreset'] = '重置';
$string['currentstatusreset_help'] = '在勾选了此复选框时保存表单将会重置当前状态。前次分配的所有信息都会被删除，这样就能再次分配（如果在上面启用）。';
$string['currentstatusresetinfo'] = '选中该框并保存表单，重置执行结果';
$string['currentstatusresult'] = '最近的执行结果';
$string['enablescheduled'] = '启用预计划分配';
$string['enablescheduledinfo'] = '在提交阶段结束时自动分配作业';
$string['pluginname'] = '预计划分配';
$string['randomallocationsettings'] = '分配设置';
$string['randomallocationsettings_help'] = '在此定义随机分配方式的参数。它随机分配插件会使用它们进行实际作业分配。';
$string['resultdisabled'] = '预计划分配禁用';
$string['resultenabled'] = '预计划分配启用';
$string['resultexecuted'] = '成功';
$string['resultfailed'] = '无法自动分配作业';
$string['resultfailedconfig'] = '预计划分配配置错误';
$string['resultfaileddeadline'] = '互动评价没有定义提交截止日期';
$string['resultfailedphase'] = '互动评价不处于提交阶段';
$string['resultvoid'] = '没有作业被分配';
$string['resultvoidexecuted'] = '分配已经被执行';
$string['scheduledallocationsettings'] = '预计划分配设置';
$string['scheduledallocationsettings_help'] = '如果启用，预计划分配方式将会在提交阶段结束后自动分配作业进行评价。此阶段的结束时间在互动评价设置的“提交截止日期”中定义。

本质上，是使用此表单中预定义的参数来执行随机分配。这意味意着预计划分配工作起来就像是教师在提交结束阶段使用下面的分配设置来亲自执行随机分配。

注意，如果您在提交截止日期前手动转换互动评价到评价阶段，预计划分配 *不会* 执行。这种情况下，您不得不亲自分配作业。预计划分配方式在和自动阶段转换功能一起使用时特别有用。';
$string['setup'] = '设置预计划分配';
