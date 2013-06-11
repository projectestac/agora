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
 * Strings for component 'gradingform_rubric', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = '添加标准';
$string['alwaysshowdefinition'] = '允许用户预览模块中使用的量规（不然只有在评分之后才能看到）';
$string['backtoediting'] = '返回编辑';
$string['confirmdeletecriterion'] = '您确定要删除此标准吗？';
$string['confirmdeletelevel'] = '您确定要删除这个级别吗？';
$string['criterionaddlevel'] = '添加级别';
$string['criteriondelete'] = '删除标准';
$string['criterionempty'] = '点击编辑标准';
$string['criterionmovedown'] = '下移';
$string['criterionmoveup'] = '上移';
$string['definerubric'] = '定义量规';
$string['description'] = '描述';
$string['enableremarks'] = '允许评分人对每个标准添加文本评论';
$string['err_mintwolevels'] = '每条标准必须至少有两个级别';
$string['err_nocriteria'] = '量规必须至少包含一个标准';
$string['err_nodefinition'] = '级别定义不能为空';
$string['err_nodescription'] = '标准的描述不能为空';
$string['err_scoreformat'] = '每个级别的分数必须是一个有效的非负数';
$string['err_totalscore'] = '量规中最大可用的分数必须大于零';
$string['gradingof'] = '{$a} 评分';
$string['leveldelete'] = '删除级别';
$string['levelempty'] = '单击编辑级别';
$string['name'] = '名称';
$string['needregrademessage'] = '在该学生被评分后量规变了。您必须检查量规并更新评分后，学生才能看到该量规。';
$string['pluginname'] = '量规';
$string['previewrubric'] = '预览量规';
$string['regrademessage1'] = '您将修改一个已经使用过的量规。请指示对于已有的分数是否需要重新评价。如果您选择“是”，学生们将在成绩重新评价之后，才能看到新的量规。';
$string['regrademessage5'] = '您将保存的量规有明显的变化，并且该量规已被使用。成绩簿中的已评成绩会保持不变，但学生们将在成绩重新评价之后，才能看到新的量规。';
$string['regradeoption0'] = '不标记重新评分';
$string['regradeoption1'] = '标记重新评分';
$string['restoredfromdraft'] = '注意：上一次对该人的评分未能成功保存，所以恢复了草稿。如果您希望取消这些变化，请使用下面的“取消”按钮。';
$string['rubric'] = '量规';
$string['rubricmapping'] = '分数与评级的映射规则';
$string['rubricmappingexplained'] = '该量规的最小分数为<b> {$a->minscore} 分</b>，它对应于该模块中的最低级别（通常为 0，除非使用了比例范围）。最高分数为<b> {$a->maxscore} 分</b>，它对应于该模块中的最高级别。
中间的分数取整后根据<b>距离最近的级别</b>进行转换。
如果使用比例范围代替分级并且分数是连续的整数，分数将转换为比例元素。';
$string['rubricnotcompleted'] = '请为每个标准选择';
$string['rubricoptions'] = '量规的选项';
$string['rubricstatus'] = '当前量规状态';
$string['save'] = '保存';
$string['saverubric'] = '保存量规并使其可用';
$string['saverubricdraft'] = '保存为草稿';
$string['scorepostfix'] = '{$a}分';
$string['showdescriptionstudent'] = '向被评价者显示量规描述';
$string['showdescriptionteacher'] = '在评价过程中显示量规描述';
$string['showremarksstudent'] = '向被评价者显示标记';
$string['showscorestudent'] = '向被评价者显示每个级别的分数';
$string['showscoreteacher'] = '在评价过程中显示每个级别的分数';
$string['sortlevelsasc'] = '级别排序：';
$string['sortlevelsasc0'] = '按分数降序';
$string['sortlevelsasc1'] = '按分数升序';
