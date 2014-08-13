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
 * Strings for component 'qtype_calculated', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = '添加数据项';
$string['addmoreanswerblanks'] = '添加另一个答案空白';
$string['addsets'] = '添加集合';
$string['answerhdr'] = '答案';
$string['answerstoleranceparam'] = '答案容错参数';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = '任意值';
$string['atleastoneanswer'] = '至少需要提供一个答案';
$string['atleastonerealdataset'] = '题干中至少要有一个真的数据集';
$string['atleastonewildcard'] = '在题干或公式中至少要有一个通配符';
$string['calcdistribution'] = '分布';
$string['calclength'] = '小数位';
$string['calcmax'] = '最大值';
$string['calcmin'] = '最小值';
$string['choosedatasetproperties'] = '选择通配符数据集属性';
$string['choosedatasetproperties_help'] = '数据集是在有通配符的地方插入的一组值，您可以为一个特定的题目创建一个私有数据集，或者创建与同类别中其它计算题共享的数据集。';
$string['correctanswerformula'] = '正确答案公式';
$string['correctanswershows'] = '正确答案显示';
$string['correctanswershowsformat'] = '格式';
$string['correctfeedback'] = '给任意正确答案';
$string['dataitemdefined'] = '有 {$a} 个已经定义的数值可用';
$string['datasetrole'] = '通配符<strong>{x..}</strong>会被替换为其数据集中的数值';
$string['decimals'] = '保留 {$a} 位';
$string['deleteitem'] = '删除数据项';
$string['deletelastitem'] = '删除最后一项';
$string['distributionoption'] = '选择分配选项';
$string['editdatasets'] = '编辑通配符数据集';
$string['editdatasets_help'] = '在每个通配符域输入一个数，然后点击添加按钮，可以创建通配符的值。如想自动生成 10 个或更多个值，先选择需要几个值，然后再点击添加按钮。均匀分布的意思是在上下限之间的任何值都有均等的生成概率；对数均匀分布的意思是越小的值生成的概率越大。';
$string['existingcategory1'] = '使用一个现有的共享数据集';
$string['existingcategory2'] = '此类别中的其它题目也使用的文件集中的一个文件';
$string['existingcategory3'] = '此类别中的其它题目也使用的链接集中的一个链接';
$string['forceregeneration'] = '强制重建';
$string['forceregenerationall'] = '对所有通配符强制重建';
$string['forceregenerationshared'] = '只对非共享通配符强制重建';
$string['functiontakesatleasttwo'] = '函数{$a}需要至少两个参数';
$string['functiontakesnoargs'] = '函数{$a}不需要任何参数';
$string['functiontakesonearg'] = '函数{$a}需要一个参数';
$string['functiontakesoneortwoargs'] = '函数{$a}需要一或两个参数';
$string['functiontakestwoargs'] = '函数{$a}需要两个参数';
$string['generatevalue'] = '生成新值';
$string['getnextnow'] = '再建一个“要添加的数据项”';
$string['hexanotallowed'] = '数据集 <strong>{$a->name}</strong> 不可以使用 16 进制值 {$a->value}';
$string['illegalformulasyntax'] = '以“{$a}”开头的公式语法非法';
$string['incorrectfeedback'] = '给任意错误答案';
$string['itemno'] = '数据项 {$a}';
$string['itemscount'] = '数据项<br />个数';
$string['itemtoadd'] = '要添加的数据项';
$string['keptcategory1'] = '和上次一样，使用已有的共享数据集';
$string['keptcategory2'] = '和以前一样，来自同一类别的可复用文件集中的文件';
$string['keptcategory3'] = '和以前一样，来自同一类别的可复用链接集中的链接';
$string['keptlocal1'] = '和上次一样，使用已有的私有数据集';
$string['keptlocal2'] = '和以前一样，来自同一题目的私有文件集中的文件';
$string['keptlocal3'] = '和以前一样，来自同一题目的私有链接集中的链接';
$string['lengthoption'] = '选择长度选项';
$string['loguniform'] = '对数均匀';
$string['loguniformbit'] = '数字，来自对数均匀分布';
$string['makecopynextpage'] = '下页（新题目）';
$string['mandatoryhdr'] = '在答案中以通配符的形式显示';
$string['max'] = '最大';
$string['min'] = '最小';
$string['minmax'] = '取值范围';
$string['missingformula'] = '缺少公式';
$string['missingname'] = '缺少题名';
$string['missingquestiontext'] = '缺少题干';
$string['mustenteraformulaorstar'] = '您必须输入一个公式或“*”。';
$string['newcategory1'] = '使用新的共享数据集';
$string['newcategory2'] = '此类别中的其它题目也可使用的新文件集中的一个文件';
$string['newcategory3'] = '此类别中的其它题目也可使用的新链接集中的一个链接';
$string['newlocal1'] = '使用新的私有数据集';
$string['newlocal2'] = '只有此题可用的新文件集中的文件';
$string['newlocal3'] = '只有此题可用的新链接集中的链接';
$string['newsetwildcardvalues'] = '个新通配符数据集合';
$string['nextitemtoadd'] = '下一个“要添加的数据项”';
$string['nextpage'] = '下页';
$string['nocoherencequestionsdatyasetcategory'] = '对 id 为 {$a->id} 的试题，id 为 {$a->qcat} 的类别与通配符 {$a->name} 的类别 id {$a->sharedcat} 不一致。请修改此题目。';
$string['nocommaallowed'] = '不能使用“,”，可以像 0.013 或 1.3e-2 这样用';
$string['nodataset'] = '无数据集';
$string['nosharedwildcard'] = '此类别中没有共享通配符';
$string['notvalidnumber'] = '通配符数值不是有效的数字';
$string['oneanswertrueansweroutsidelimits'] = '至少一个正确答案在真值限制之外。<br />在高级选项里可以修改答案容错设置';
$string['param'] = '参数 {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = '给任意部分正确答案';
$string['pluginname'] = '计算题';
$string['pluginnameadding'] = '增加一道计算题';
$string['pluginnameediting'] = '编辑计算问题';
$string['pluginname_help'] = '在计算题中，每道题都可以使用通配符（放在大括号中），而在答题时通配符会被替换。例如，题目是“长为{l}宽为{w}的长方形面积是多少？”的正确答案计算公式是“{l}*{w}”（*表示乘法）。';
$string['pluginnamesummary'] = '计算题和数值题类似，但在答题时，题目中的数可以从一个集合中随机选择。';
$string['possiblehdr'] = '仅在题干中有通配符';
$string['questiondatasets'] = '题目数据集';
$string['questiondatasets_help'] = '题目中使用的通配符的数据集';
$string['questionstoredname'] = '题目名存为';
$string['replacewithrandom'] = '用随机值替换';
$string['reuseifpossible'] = '如果可能，复用之前的值';
$string['setno'] = '集合 {$a}';
$string['setwildcardvalues'] = '个通配符数据集合';
$string['sharedwildcard'] = '共享通配符{<strong>{$a}</strong>}';
$string['sharedwildcardname'] = '共享通配符';
$string['sharedwildcards'] = '共享通配符';
$string['showitems'] = '显示';
$string['significantfigures'] = '保留 {$a} 位';
$string['significantfiguresformat'] = '有效数字';
$string['synchronize'] = '与测验中其它题目共享的数据集同步数据';
$string['synchronizeno'] = '不同步';
$string['synchronizeyes'] = '同步';
$string['synchronizeyesdisplay'] = '同步，并将共享数据集名显示为题名前缀';
$string['tolerance'] = '允许误差';
$string['trueanswerinsidelimits'] = '正确答案“{$a->correct}”在{$a->true}真值范围内';
$string['trueansweroutsidelimits'] = '<span class="error">错误！正确答案“{$a->correct}”不在{$a->true}真值范围内</span>';
$string['uniform'] = '均匀';
$string['uniformbit'] = '小数，来自均匀分布';
$string['unsupportedformulafunction'] = '不支持函数 {$a}';
$string['updatecategory'] = '更新类别';
$string['updatedatasetparam'] = '更新数据集参数';
$string['updatetolerancesparam'] = '更新答案容错参数';
$string['updatewildcardvalues'] = '更新通配符的值';
$string['useadvance'] = '使用高级按钮查看错误';
$string['usedinquestion'] = '使用它的题目';
$string['wildcard'] = '通配符{<strong>{$a}</strong>}';
$string['wildcardparam'] = '用来生成数值的通配符参数';
$string['wildcardrole'] = '通配符 <strong>{x...}</strong> 会被一个自动生成的数值替换';
$string['wildcards'] = '通配符 {a}…{z}';
$string['wildcardvalues'] = '通配符数值';
$string['wildcardvaluesgenerated'] = '通配符数值以生成';
$string['youmustaddatleastoneitem'] = '你至少要在数据集中添加一条数据才能保存此题目。';
$string['youmustaddatleastonevalue'] = '保存此题目之前，您至少要先保存一个通配符数据集';
$string['zerosignificantfiguresnotallowed'] = '正确答案不能有 0 个有效数字！';
