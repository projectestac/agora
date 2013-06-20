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
 * Strings for component 'quiz_statistics', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = '标准答案';
$string['allattempts'] = '所有试卷';
$string['allattemptsavg'] = '所有试卷的平均分';
$string['allattemptscount'] = '已完全评分的试卷总数';
$string['analysisofresponses'] = '答题分析';
$string['analysisofresponsesfor'] = '{$a}的答题分析。';
$string['attempts'] = '试卷';
$string['attemptsall'] = '所有试卷';
$string['attemptsfirst'] = '首次答题';
$string['backtoquizreport'] = '返回到统计报告主页。';
$string['calculatefrom'] = '统计数据来自';
$string['cic'] = '内部一致性系数（{$a}）';
$string['completestatsfilename'] = '完整统计';
$string['count'] = '总数';
$string['coursename'] = '课程名';
$string['detailedanalysis'] = '对试题回答的更多细致分析';
$string['discrimination_index'] = '区分度指数';
$string['discriminative_efficiency'] = '区分效率';
$string['downloadeverything'] = '下载完整报告为';
$string['duration'] = '开放时长';
$string['effective_weight'] = '实际权重';
$string['errordeleting'] = '删除 {$a} 条旧记录出错。';
$string['erroritemappearsmorethanoncewithdifferentweight'] = '题目（{$a}）在此测验中出现了一次以上，且每次的权重不同。统计报告目前不支持这种情况，所以此题的统计结果可能不可靠。';
$string['errormedian'] = '获取中值失败';
$string['errorpowerquestions'] = '获取计算题目成绩变化的数据出错';
$string['errorpowers'] = '获取计算测验成绩方差的数据失败';
$string['errorrandom'] = '获取子项数据失败';
$string['errorratio'] = '错误率（{$a}）';
$string['errorstatisticsquestions'] = '获取计算题目成绩的数据失败';
$string['facility'] = '容易度指数';
$string['firstattempts'] = '首次答题';
$string['firstattemptsavg'] = '首次答题平均分';
$string['firstattemptscount'] = '已完全评分的首次答题个数';
$string['frequency'] = '频率';
$string['intended_weight'] = '预期权重';
$string['kurtosis'] = '分数分布峰度（{$a}）';
$string['lastcalculated'] = '{$a->lastcalculated}之前最后一次计算。此后又有{$a->count}份试卷。';
$string['median'] = '成绩中值（{$a}）';
$string['modelresponse'] = '回答模式';
$string['negcovar'] = '成绩与所有试卷成绩的负值协方差';
$string['negcovar_help'] = '此题在此试卷集合中的成绩与测验中所有试卷的成绩相比，是向相反的方向变化。也就是说，或者整体试卷成绩低于平均值而此题成绩高于平均值，或者正相反。

我们计算实际题目权重的公式此时无效。如果高亮显示的有负值协方差的题目最高分设为 0 分，那么测验中其它题目的实际权重就是这些题目的实际权重。

如果您编辑一个测验，让有负值协方差的题目的最高分为 0，那么这些题目的实际权重会是 0，其它题目的实际权重会按当前情况计算。';
$string['nostudentsingroup'] = '此小组中还没有学生';
$string['optiongrade'] = '得分比例';
$string['pluginname'] = '统计';
$string['position'] = '题号';
$string['positions'] = '位置';
$string['questioninformation'] = '题目信息';
$string['questionname'] = '题目名';
$string['questionnumber'] = '题#';
$string['questionstatistics'] = '题目统计';
$string['questionstatsfilename'] = '题目统计';
$string['questiontype'] = '题目类型';
$string['quizinformation'] = '测验信息';
$string['quizname'] = '测验名';
$string['quizoverallstatistics'] = '测验整体统计';
$string['quizstructureanalysis'] = '测验结构分析';
$string['random_guess_score'] = '随机猜测得分';
$string['recalculatenow'] = '立即重新计算';
$string['response'] = '回答';
$string['skewness'] = '分数分布偏度（{$a}）';
$string['standarddeviation'] = '标准偏差（{$a}）';
$string['standarddeviationq'] = '标准偏差';
$string['standarderror'] = '标准错误（{$a}）';
$string['statistics'] = '统计';
$string['statistics:componentname'] = '测验统计报告';
$string['statisticsreport'] = '统计报告';
$string['statisticsreportgraph'] = '每题统计';
$string['statistics:view'] = '查看统计报表';
$string['statsfor'] = '测验统计（{$a}）';
