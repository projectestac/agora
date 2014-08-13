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
 * Strings for component 'tool_customlang', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_customlang
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkin'] = '保存字符串到语言包';
$string['checkout'] = '打开并编辑语言包';
$string['checkoutdone'] = '已加载语言包';
$string['checkoutinprogress'] = '正加载语言包';
$string['confirmcheckin'] = '即将把修改过的字符串保存到您本地语言包中。这将从翻译器导出自定义的字符串到您的 Moodle 数据目录中，然后 Moodle 会开始使用这些修改过的字符串。按“继续”按钮保存。';
$string['customlang:edit'] = '编辑本地翻译';
$string['customlang:view'] = '查看本地翻译';
$string['filter'] = '过滤字符串';
$string['filtercomponent'] = '显示这些组件的字符串';
$string['filtercustomized'] = '只显示自定义的';
$string['filtermodified'] = '只显示修改过的';
$string['filteronlyhelps'] = '只显示帮助';
$string['filtershowstrings'] = '显示字符串';
$string['filterstringid'] = '字符串标识符';
$string['filtersubstring'] = '显示的字符串包含';
$string['headingcomponent'] = '组件';
$string['headinglocal'] = '本地自定义';
$string['headingstandard'] = '标准文本';
$string['headingstringid'] = '字符串';
$string['markinguptodate'] = '标记此自定义为最新';
$string['markinguptodate_help'] = '如果在您自定义字符串后，原始的英文或主翻译有修改，那么自定义的翻译就过期了。请重新审查此自定义翻译。如果您认为它是最新的，就点此复选框。否则，就编辑它。';
$string['markuptodate'] = '标记为最新';
$string['modifiedno'] = '没有需要保存的字符串';
$string['modifiednum'] = '有 {$a} 条字符串修改过。您要把它们保存到您的本地语言包吗？';
$string['nostringsfound'] = '未找到字符串，请修改过滤器设置';
$string['placeholder'] = '占位符';
$string['placeholder_help'] = '占位符是字符串中的一些特定符号，比如“{$a}”或“{$a->something}”。当字符串最终被输出时，它们会被替换为其它值。

一定要保持它们本来的样子。不要翻译它们。';
$string['placeholderwarning'] = '有占位符的字符串';
$string['pluginname'] = '定制语言';
$string['savecheckin'] = '将更改保存到语言包';
$string['savecontinue'] = '生效变化并继续编辑';
