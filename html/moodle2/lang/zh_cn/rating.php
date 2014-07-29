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
 * Strings for component 'rating', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = '平均分';
$string['aggregatecount'] = '评分总数';
$string['aggregatemax'] = '最高分';
$string['aggregatemin'] = '最低分';
$string['aggregatenone'] = '无评分';
$string['aggregatesum'] = '评分总和';
$string['aggregatetype'] = '汇总类型';
$string['aggregatetype_help'] = '汇总类型定义了各个评分如何在成绩单中汇总为最终成绩。

* 平均分 - 所有评分的平均值
* 评分总数 - 被评分的项目数成为最终成绩。注意，该成绩不会超过活动设定的最高分。
* 最大值 - 最高的评分成为最终成绩
* 最小值 - 最低的评分成为最终成绩
* 总和 - 所有评分被加到一起。注意，该成绩不会超过活动设定的最高分。

如果选择“无评分”，那么此活动不会出现在成绩单中。';
$string['allowratings'] = '可以给项目评分吗？';
$string['allratingsforitem'] = '所以已提交的评分';
$string['capabilitychecknotavailable'] = '在活动被保存之前，不能检查权限';
$string['couldnotdeleteratings'] = '抱歉，因为已经有人参与了评分，所以不能删除';
$string['norate'] = '项目评分功能没有打开！';
$string['noratings'] = '没有已提交的评分';
$string['noviewanyrate'] = '您只能查看您创造的条目的结果';
$string['noviewrate'] = '您没有查看评分的权限';
$string['rate'] = '评分';
$string['ratepermissiondenied'] = '您没有对此项评分的权限';
$string['rating'] = '评分';
$string['ratinginvalid'] = '评分无效';
$string['ratings'] = '评分';
$string['ratingtime'] = '限制只能在此时间段内评分：';
$string['rolewarning'] = '有评分权的角色';
$string['rolewarning_help'] = '要提交评分的用户必须具有moodle/rating:rate权限和模块定义的相关权限。分配到如下角色的用户应该能评分。在版块设置页面里的权限链接里可以修改这个角色列表。';
