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
 * Strings for component 'quiz_statistics', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = '실제 응답';
$string['allattempts'] = '모든 시도';
$string['allattemptsavg'] = '모든 시도의 평균값';
$string['allattemptscount'] = '채점이 완료된 시도 총수';
$string['analysisofresponses'] = '응답분석';
$string['analysisofresponsesfor'] = '{$a} 응답분석';
$string['attempts'] = '시도';
$string['attemptsall'] = '모든 시도';
$string['attemptsfirst'] = '첫번째 시도';
$string['backtoquizreport'] = '이전 보고서 페이지로 되돌아 감';
$string['calculatefrom'] = '통계 산출';
$string['cic'] = '({$a})내적 일관성 계수';
$string['completestatsfilename'] = '완료 통계';
$string['count'] = '돗수';
$string['coursename'] = '강좌명';
$string['detailedanalysis'] = '본 질문의 좀 더 자세한 응답 분석';
$string['discrimination_index'] = '변별도 지수';
$string['discriminative_efficiency'] = '변별 효율';
$string['downloadeverything'] = '{$a->formatsmenu}로 모든 보고서 내려받기  {$a->downloadbutton}';
$string['duration'] = '개방 기간';
$string['effective_weight'] = '유효 가중치';
$string['errordeleting'] = '옛 {$a} 기록 삭제 중 오류';
$string['erroritemappearsmorethanoncewithdifferentweight'] = ' 질문 ({$a})은 시험의 다른 위치에서 각기 다른 가중치로 나타났습니다. 이것은 현재 통계보고서에 지원되지 않으며,  질문에 대한 통계를 못 믿게 할 수 있습니다.';
$string['errormedian'] = '오차제거 중앙값';
$string['errorpowerquestions'] = '질문 성적의 분산을 계산하기 위해 데이터를 가져오는데 오류';
$string['errorpowers'] = '퀴즈의 분산 계산을 위한 오차 제거한 데이터';
$string['errorrandom'] = '하위 항목 자료 획득 오류';
$string['errorratio'] = '({$a})오류율';
$string['errorstatisticsquestions'] = '질문 성적의 통계를 계산하기 위해 데이터를 가져오는데 오류';
$string['facility'] = '난이도';
$string['firstattempts'] = '최초 시도';
$string['firstattemptsavg'] = '최초 시도의 평균값';
$string['firstattemptscount'] = '채점이 완료된 첫번째 시도 수';
$string['frequency'] = '빈도';
$string['intended_weight'] = '의도한 가중치';
$string['kurtosis'] = '({$a})득점분포 첨도';
$string['lastcalculated'] = '마지막 집계가 된 것이 {$a->lastcalculated} 전인데, 그 후 {$a->count}  회의 시도가 이루어 졌음';
$string['median'] = '({$a})중앙값';
$string['modelresponse'] = '모델 응답';
$string['negcovar'] = '전체 시도 점수에 대한 음의 공분산';
$string['negcovar_help'] = '시도된 본 질문에 대한 점수는 전체 시도 점수에 대해 반대 방향으로 변합니다. 이는 본 질문의 점수가 평균 이상으로 변하는 경향이 있을 때 전체 시도 점수는 그 반대인 평균 이하로 변해가는 경향이 있음을 뜻하며 그 반대의 경우도 동일한 경향을 보입니다.

이 경우, 유효 질문 가중치를 위한 방정식은 산출될 수 없습니다. 본 퀴즈의 타 질문에 대한 유효 질문 가중치의 계산은, 만일 음의 공분산을 지닌 문제를 야기한 질문들의 유효 질문 가중치를 0점으로 부여하면 가능합니다.

즉 퀴즈를 편집하여 음의 공분산을 갖는 이러한 질문들에 최대 점수 0을 부여하게 되면, 이러한 질문들의 유효 질문 가중치는 0이 되며 이들을 제외한 타 질문들의 실제 유효 질문 가중치는 현재 계산된 값과 같아질 것입니다.';
$string['nostudentsingroup'] = '이 모둠에는 아직 학생이 없음';
$string['optiongrade'] = '부분 득점';
$string['partofquestion'] = '질문의 일부분';
$string['pluginname'] = '통계';
$string['position'] = '위치';
$string['positions'] = '위치';
$string['questioninformation'] = '질문 정보';
$string['questionname'] = '질문 이름';
$string['questionnumber'] = '문#';
$string['questionstatistics'] = '질문 통계';
$string['questionstatsfilename'] = '질문통계';
$string['questiontype'] = '질문 유형';
$string['quizinformation'] = '퀴즈 소개';
$string['quizname'] = '퀴즈명';
$string['quizoverallstatistics'] = '퀴즈 전체 통계';
$string['quizstructureanalysis'] = '퀴즈 구조 분석';
$string['random_guess_score'] = '무작위 추정 득점';
$string['recalculatenow'] = '즉시 재계산';
$string['response'] = '응답';
$string['skewness'] = '({$a})득점분포 비대칭도';
$string['standarddeviation'] = '({$a})표준편차';
$string['standarddeviationq'] = '표준편차';
$string['standarderror'] = '({$a})표준오차';
$string['statistics'] = '통계';
$string['statistics:componentname'] = '퀴즈 통계 보고서';
$string['statisticsreport'] = '통계 보고';
$string['statisticsreportgraph'] = '질문 위치에 대한 통계';
$string['statistics:view'] = '통계 보고서 보기';
$string['statsfor'] = '퀴즈 ({$a}) 통계';
