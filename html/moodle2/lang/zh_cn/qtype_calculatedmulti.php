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
 * Strings for component 'qtype_calculatedmulti', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculatedmulti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = '计算题选项版';
$string['pluginnameadding'] = '添加一道选项版计算题';
$string['pluginnameediting'] = '编辑一道选项版计算题';
$string['pluginname_help'] = '计算题选项版和选择题类似，但在选项中可以包含计算公式，可以使用通配符（放在大括号中），而在答题时通配符会被替换。例如，题目是“长为{l}宽为{w}的长方形面积是多少？”，其中一个选项是“={l}*{w}”（*表示乘法）。';
$string['pluginnamesummary'] = '计算题选项版和选择题类似，但选项中可以有计算公式，在答题时，公式的值计算自从一个集合中随机选择的数值。';
