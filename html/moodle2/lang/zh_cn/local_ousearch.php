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
 * Strings for component 'local_ousearch', language 'zh_cn', branch 'MOODLE_21_STABLE'
 *
 * @package   local_ousearch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configremote'] = '允许列表中的 IP 地址使用远程搜索设备。
这应该是一个有零个或多个以逗号分隔的数字 IP 地址的列表。小心！
来自这些 IP 地址的请求可以像任何用户一样进行搜索（见摘要文本）。
默认情况下为空白，阻止这种访问。';
$string['displayversion'] = 'OU 搜索的版本： <strong>{$a}</strong>';
$string['fastinserterror'] = '插入搜索数据失败（高性能插入）';
$string['findmoreresults'] = '更多结果';
$string['maxterms'] = '最大的项数';
$string['maxterms_desc'] = '如果用户尝试搜索超出此限制的项，将会得到一个错误信息。（出于性能方面的原因。）';
$string['nomoreresults'] = '找不到更多结果。';
$string['noresults'] = '找不到任何匹配的结果。尝试使用不同的词语或从您的查询里删除一些词语。';
$string['nowordsinquery'] = '在搜索框中输入一些词语。';
$string['ousearch'] = 'OU 搜索';
$string['pluginname'] = 'OU 搜索';
$string['previousresults'] = '返回到结果 {$a}';
$string['reindex'] = '为课程{$a->courseid}的{$a->module}模块的文件重新建立索引';
$string['remote'] = 'IP 地址允许远程搜索';
$string['remotenoaccess'] = '此 IP 地址没有远程搜索的访问权限';
$string['remotewrong'] = '没有配置远程搜索访问权限（或配置不正确）。';
$string['restofwebsite'] = '搜索此网站的其余部分';
$string['resultsfail'] = '找不到包含词语 <strong>{$a}</strong> 的结果。尝试使用其他词语。';
$string['searchfor'] = '搜索：{$a}';
$string['searchresultsfor'] = '<strong>{$a}</strong> 的搜索结果';
$string['searchtime'] = '搜索时间：{$a} 秒';
$string['toomanyterms'] = '<strong>你已经输入了太多的搜索条件（词）。</strong>为了确保搜索结果可以及时显示，该系统限制最多有 {$a} 个搜索条件。请按“返回”按钮，并修改您的搜索。';
$string['untitled'] = '(无标题)';
