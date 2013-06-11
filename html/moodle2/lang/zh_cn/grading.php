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
 * Strings for component 'grading', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '选中“{$a->method}”作为“{$a->area}”区域的评分方法';
$string['activemethodinfonone'] = '没有为“{$a->area}”选择高级的评分方法。就采用最普通的评分方法吧。';
$string['changeactivemethod'] = '将当前评分方法改为';
$string['clicktoclose'] = '点击关闭';
$string['exc_gradingformelement'] = '无法实例化评分表单元素';
$string['formnotavailable'] = '已选择使用高级评分方法，但仍未定义评分表单。您需要先点击设置版块中的一个链接来定义评分表单。';
$string['gradingformunavailable'] = '请注意：高级评分暂时不可用。恢复正常前只能先使用简单评分。';
$string['gradingmanagement'] = '高级评分';
$string['gradingmanagementtitle'] = '高级评分：{$a->component} ({$a->area})';
$string['gradingmethod'] = '评分方式';
$string['gradingmethod_help'] = '选择此场景中用来计算成绩的高级评分方式。

要关闭高级评分并恢复到默认的评分方法，请选择“直接打分”。';
$string['gradingmethodnone'] = '直接打分';
$string['gradingmethods'] = '评分方式';
$string['manageactionclone'] = '从模板中创建评分表';
$string['manageactiondelete'] = '删除已有的评分表';
$string['manageactiondeleteconfirm'] = '您将要删除评分表 \'{$a->formname}\' 和所有来自\'{$a->component} ({$a->area})\'的相关的信息。请再三考虑一下后果：

* 本次操作不可逆。
* 您可以在不删除本评分表的情况下选择其他的评分方式，包括直接评分
* 所有填在评分表中的信息将会全部丢失。
* 已经计算过并保存在成绩单中的信息不会丢失。然而，它们是怎么算出来的您以后将无从知晓。
* 操作不会影响其他活动中的此评分表的副本。';
$string['manageactiondeletedone'] = '表格删除成功';
$string['manageactionedit'] = '编辑当前表格定义';
$string['manageactionnew'] = '从头定义新的评分表单';
$string['manageactionshare'] = '做为新模板发布';
$string['manageactionshareconfirm'] = '您即将保存一份 \'{$a}\'评分表的副本为新公用模板。其他用户可以通过该模板在他们的活动中创建新的评分表。';
$string['manageactionsharedone'] = '评分表成功以模板形式保存';
$string['noitemid'] = '不能评分。被评分项目不存在。';
$string['nosharedformfound'] = '没有找到模板';
$string['searchownforms'] = '包含我自己的表格';
$string['searchtemplate'] = '搜索评分表';
$string['searchtemplate_help'] = '您可以搜索评分表，并把它当做新评分表的模板来使用。可以输入表单名、描述或表单中的任何关键字。如果要搜索词组，请用引号扩上。

默认的，只可以搜索到已分享的模板。您也可以搜索自己的评分表。这样您就可以在不共享的情况下方便的重用您的评分表。只有标为“可以使用”的评分表可以被重用。';
$string['statusdraft'] = '草稿';
$string['statusready'] = '可以使用';
$string['templatedelete'] = '删除';
$string['templatedeleteconfirm'] = '您将要删除已分享的模板“{$a}”。删除模板不会影响已通过它生成的评分表。';
$string['templateedit'] = '编辑';
$string['templatepick'] = '使用这个模板';
$string['templatepickconfirm'] = '您希望用“{$a->formname}”做为模板在“{$a->component} ({$a->area})”创建新评分表？';
$string['templatepickownform'] = '使用这个评分表作为模板';
$string['templatesource'] = '位置：{$a->component} ({$a->area})';
$string['templatetypeown'] = '自己的表单';
$string['templatetypeshared'] = '分享的模板';
