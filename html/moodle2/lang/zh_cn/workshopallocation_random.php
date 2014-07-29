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
 * Strings for component 'workshopallocation_random', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = '添加自我评价';
$string['allocationaddeddetail'] = '要完成的新评价：<strong>{$a->reviewername}</strong>要评价 <strong>{$a->authorname}</strong>的作业';
$string['allocationdeallocategraded'] = '不能解除分配已评分的评价：评价人 <strong>{$a->reviewername}</strong>，作业作者：<strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = '重用评价：<strong>{$a->reviewername}</strong>继续做 <strong>{$a->authorname}</strong>的评价人';
$string['allocationsettings'] = '分配设置';
$string['assessmentdeleteddetail'] = '已解除分配的评价: <strong>{$a->reviewername}</strong> 不再评价 <strong>{$a->authorname} 的作业';
$string['assesswosubmission'] = '不交作业也可以评价';
$string['confignumofreviews'] = '默认随机分配作业的个数';
$string['excludesamegroup'] = '防止在同一组的同学互相评价';
$string['noallocationtoadd'] = '不需添加分配';
$string['nogroupusers'] = '<p>警告：如果互动评价处在“可视小组”模式或者“分隔小组”模式，那么用户必须至少属于一个组，才能用此工具向他们分配评价任务。不属于任何组的用户仍然可以做自我评价或者删除已有的评价。</p> <p>这些用户目前还未被加入任何组：{$a}</p>';
$string['numofdeallocatedassessment'] = '解除分配 {$a} 个评价';
$string['numofrandomlyallocatedsubmissions'] = '随机分配 {$a} 个作业';
$string['numofreviews'] = '评价次数';
$string['numofselfallocatedsubmissions'] = '自我分配 {$a} 个作业';
$string['numperauthor'] = '每个作业';
$string['numperreviewer'] = '每个评价人';
$string['pluginname'] = '随机分配';
$string['randomallocationdone'] = '随机分配完成';
$string['removecurrentallocations'] = '删除当前分配方案';
$string['resultnomorepeers'] = '没有可用的人员';
$string['resultnomorepeersingroup'] = '在此分隔小组中没有足够的人员可用';
$string['resultnotenoughpeers'] = '没有足够的人员可用';
$string['resultnumperauthor'] = '尝试为每个作者分配 {$a} 个评价人';
$string['resultnumperreviewer'] = '尝试为每个评价人分配 {$a} 个评价任务';
$string['stats'] = '当前分配情况';
