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
 * Strings for component 'qtype_multianswer', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_multianswer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmquestionsaveasedited'] = '我确信我想要题目按所编辑的样子保存';
$string['confirmsave'] = '确认后保存{$a}';
$string['correctanswer'] = '正确答案';
$string['correctanswerandfeedback'] = '正确答案及反馈';
$string['decodeverifyquestiontext'] = '解码和校验题目文本';
$string['layout'] = '布局';
$string['layouthorizontal'] = '横向排列的单选按钮';
$string['layoutselectinline'] = '在正文中使用下拉菜单';
$string['layoutundefined'] = '未定义的布局';
$string['layoutvertical'] = '纵向排列的单选按钮';
$string['nooptionsforsubquestion'] = '不能获取题目 #{$a->sub} 的选项(question->id={$a->id})';
$string['noquestions'] = '完形题“<strong>{$a}</strong>”中没有任何问题';
$string['pluginname'] = '内嵌答案(完形填空)';
$string['pluginnameadding'] = '添加内嵌答案(完形填空)题';
$string['pluginnameediting'] = '修改内嵌答案(完形填空)';
$string['pluginname_help'] = '内嵌答案(完形填空)题是一段文字，中间可以夹杂多道题目，例如选择题、填空题。';
$string['pluginnamesummary'] = '这种类型的题目非常灵活，但创建题目时必须输入特殊代码。可以内嵌的题目包括选择题、填空题和数字题。';
$string['qtypenotrecognized'] = '不能识别题型 {$a}';
$string['questiondefinition'] = '问题定义';
$string['questiondeleted'] = '题目已删除';
$string['questioninquiz'] = '<ul>
  <li>添加或删除题目，</li>
  <li>在文本中改变题目顺序，</li>
  <li>改变题目类型（数字、填空、选择）。</li></ul>
';
$string['questionnotfound'] = '找不到题目 #{$a}';
$string['questionsadded'] = '题目已添加';
$string['questionsaveasedited'] = '题目将按所编辑的样子保存';
$string['questionsless'] = '比数据库中保存的完形题少 {$a} 个问题';
$string['questionsmissing'] = '题干要包含至少一个内嵌答案。';
$string['questionsmore'] = '比数据库中保存的完形题多 {$a} 个问题';
$string['questiontypechanged'] = '题目类型已改变';
$string['questiontypechangedcomment'] = '至少一个问题类型已经改变。<br />您曾添加、删除或移动题目吗？<br />向前看。';
$string['questionusedinquiz'] = '此题目已被{$a->nb_of_quiz}个测验使用，共有{$a->nb_of_attempts}次答题';
$string['storedqtype'] = '保存的题目类型 {$a}';
$string['subqresponse'] = '子问题 {$a->i}：{$a->response}';
$string['unknownquestiontypeofsubquestion'] = '未知题型：{$a->type}(题目 #{$a->sub})';
$string['warningquestionmodified'] = '<b>警告</b>';
$string['youshouldnot'] = '<b>您不应该</b>';
