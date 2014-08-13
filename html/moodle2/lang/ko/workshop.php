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
 * Strings for component 'workshop', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregategrades'] = '성적 재계산';
$string['aggregation'] = '성적 집계';
$string['allocate'] = '제출 배당';
$string['allocatedetails'] = '예상치: {$a->expected}<br />제출완료: {$a->submitted}<br />할당량: {$a->allocate}';
$string['allocation'] = '할당';
$string['allocationconfigured'] = '할당 구성';
$string['allocationdone'] = '할당 완료';
$string['allocationerror'] = '배당 오류';
$string['allsubmissions'] = '모든 제출';
$string['alreadygraded'] = '이미 채점되었습니다.';
$string['areaconclusion'] = '결론 문장';
$string['areainstructauthors'] = '제출 요령';
$string['areainstructreviewers'] = '평가 요령';
$string['areaoverallfeedbackattachment'] = '전반적인 피드백 첨부파일';
$string['areaoverallfeedbackcontent'] = '전반적인 피드백 문장';
$string['areasubmissionattachment'] = '첨부물 제출';
$string['areasubmissioncontent'] = '문서 제출';
$string['assess'] = '평가';
$string['assessedexample'] = '평가 예제 제출';
$string['assessedsubmission'] = '평가된 제출물';
$string['assessingexample'] = '예제 평가';
$string['assessingsubmission'] = '제출물 평가';
$string['assessment'] = '평가';
$string['assessmentby'] = '평가자: <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = '{$a} 에 근거한 평가';
$string['assessmentbyyourself'] = '자체 평가';
$string['assessmentdeleted'] = '제외된 평가';
$string['assessmentend'] = '평가 마감일';
$string['assessmentendbeforestart'] = '평가 마감일을 평가 개시일 이전으로 지정할 수 없습니다.';
$string['assessmentenddatetime'] = '평가 마감: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (과제 마감일)';
$string['assessmentform'] = '평가 양식';
$string['assessmentofsubmission'] = '<a href="{$a->submissionurl}">{$a->submissiontitle}</a>에서의 <a href="{$a->assessmenturl}">평가</a>';
$string['assessmentreference'] = '평가 준거';
$string['assessmentreferenceconflict'] = '참조 평가로 제공한 예제 제출을 평가하는 것은 가능하지 않습니다.';
$string['assessmentreferenceneeded'] = '평가 준거를 만들기 위해서는 이 예제 제출물을 평가해야만 합니다. 제출물을 평가하려면 "계속"버튼을 누르세요.';
$string['assessmentsettings'] = '평가 설정';
$string['assessmentstart'] = '평가의 시작';
$string['assessmentstartdatetime'] = '평가의 시작: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (평가 열림)';
$string['assessmentweight'] = '평가 가중치';
$string['assignedassessments'] = '평가해야할 제출물';
$string['assignedassessmentsnone'] = '평가해야할 제출물이 없음';
$string['backtoeditform'] = '양식 수정으로 돌아감';
$string['byfullname'] = '<a href="{$a->url}">{$a->name}</a> 으로';
$string['calculategradinggrades'] = '평가 성적 계산';
$string['calculategradinggradesdetails'] = '예상치: {$a->expected}<br />계산결과: {$a->calculated}';
$string['calculatesubmissiongrades'] = '제출 성적 계산';
$string['calculatesubmissiongradesdetails'] = '예상치: {$a->expected}<br />계산결과: {$a->calculated}';
$string['chooseuser'] = '사용자 선택...';
$string['clearaggregatedgrades'] = '모든 집계 성적 지우기';
$string['clearaggregatedgradesconfirm'] = '정말, 평가 점수 및 집계된 제출에 대한 점수를 초기화하겠습니까?';
$string['clearaggregatedgrades_help'] = '평가 점수 및 제출에 대한 점수 집계가 초기화될 것입니다. 채점 평가 단계부터 다시 시작해서 점수들을 재 계산할 수 있습니다. ';
$string['clearassessments'] = '평가 초기화';
$string['clearassessmentsconfirm'] = '정말, 모든 평가 점수를 초기화하겠습니까? 자기 자신에 대한 정보를 얻을 수 없을뿐만 아니라, 검토자들 역시 배당된 제출물을 다시 평가해야 합니다.';
$string['clearassessments_help'] = '평가 점수 및 집계된 제출애 대한 점수가 초기화될 것입니다. 채워넣은 평가 양식의 정보는 유지되지만, 모든 검토자는 평가양식을 열고 다시 저장해야만, 그동안 얻은 점수를 확보할 수 있습니다. ';
$string['conclusion'] = '결론';
$string['conclusion_help'] = '결론 텍스트는 활동의 끝에서 참가자에게 표시됩니다.';
$string['configexamplesmode'] = '예제 평가 기본 모드';
$string['configgrade'] = '상호 평가에서 기본 제출 최대 성적';
$string['configgradedecimals'] = '점수를 표시할 때 표시할 기본 소숫점 자리 수';
$string['configgradinggrade'] = '기본 평가 최대 성적';
$string['configmaxbytes'] = '사이트에서 상호평가에 할당된 제출물 파일 최대 용량 (강좌나 지역 설정에 준함)';
$string['configstrategy'] = '기본 채점 전략';
$string['createsubmission'] = '제출';
$string['daysago'] = '{$a} 일 전';
$string['daysleft'] = '{$a} 일 남음';
$string['daystoday'] = '오늘';
$string['daystomorrow'] = '내일';
$string['daysyesterday'] = '어제';
$string['deadlinesignored'] = '당신에게는 시간 제한이 적용되지 않습니다. ';
$string['editassessmentform'] = '평가양식 수정';
$string['editassessmentformstrategy'] = '{$a} 평가양식 수정';
$string['editingassessmentform'] = '평가양식 수정';
$string['editingsubmission'] = '제출물 수정';
$string['editsubmission'] = '제출 수정';
$string['err_multiplesubmissions'] = '이 양식을 편집하는 중에 제출의 다른 버전이 저장되었습니다. 사용자별 다중 제출은 허용되지 않습니다.';
$string['err_removegrademappings'] = '사용하지 않은 점수 배치는 제거할 수 없음';
$string['evaluategradeswait'] = '평가가 검증되고 점수가 계산될 때까지 기다리세요';
$string['evaluation'] = '채점 평가';
$string['evaluationmethod'] = '채점 평가 방법';
$string['evaluationmethod_help'] = '성적 평가 방법은 평가 성적이 어떻게 계산되느냐를 결정합니다. 현재는 최선의 평가와 비교하는 옵션이 있습니다.';
$string['evaluationsettings'] = '평가능력 채점 설정';
$string['example'] = '예제 제출';
$string['exampleadd'] = '예제 제출 추가';
$string['exampleassess'] = '예제 제출 평가';
$string['exampleassessments'] = '평가를 위한 예제 제출';
$string['exampleassesstask'] = '예제 평가';
$string['exampleassesstaskdetails'] = '예상: {$a->expected}<br />기평가: {$a->assessed}';
$string['examplecomparing'] = '예제 제출의 평가 비교';
$string['exampledelete'] = '예제 삭제';
$string['exampledeleteconfirm'] = '다음의 예제 제출물을 정말 삭제하겠습니까? 제출물을 삭제하려면 "계속"버튼을 누르세요.';
$string['exampleedit'] = '예제 편집';
$string['exampleediting'] = '예제 편집중';
$string['exampleneedassessed'] = '우선, 모든 예제 제출물을 평가해야만 합니다.';
$string['exampleneedsubmission'] = '우선, 모든 예제 제출물을 평가하고, 과제물을 제출해야 합니다.';
$string['examplesbeforeassessment'] = '예제는 자신의 제출물을 낸 후라야 이용할 수 있으며, 동료평가 이전에 평가되어야 한다.';
$string['examplesbeforesubmission'] = '예제는 자기의 제출물을 내기 전에 평가해야 한다.';
$string['examplesmode'] = '예제 평가 모드';
$string['examplesubmissions'] = '예제 제출';
$string['examplesvoluntary'] = '예제 제출에 대한 평가는 자발적인 것임';
$string['feedbackauthor'] = '저자에 대한 피드백';
$string['feedbackauthorattachment'] = '첨부';
$string['feedbackby'] = '{$a}에 의한 피드백';
$string['feedbackreviewer'] = '평가자에 대한 피드백';
$string['feedbacksettings'] = '과제평';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = '부여된 성적';
$string['gradecalculated'] = '제출물 성적';
$string['gradedecimals'] = '성적에서 소숫점 자리 수';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = '성적 : {$a->max} 중 {$a->received} ';
$string['gradeitemassessment'] = '{$a->workshopname} (평가)';
$string['gradeitemsubmission'] = '{$a->workshopname} (제출)';
$string['gradeover'] = '제출 성적 덮어쓰기';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = '상호평가 성적 보고서';
$string['gradinggrade'] = '평가 성적';
$string['gradinggradecalculated'] = '계산완료된 자기평가 성적';
$string['gradinggrade_help'] = '제출물 평가에서 얻을 수 있는 최대 성적 설정';
$string['gradinggradeof'] = '자기평가 성적 ({$a}) ';
$string['gradinggradeover'] = '평가 성적 덮어쓰기';
$string['gradingsettings'] = '점수화 설정';
$string['groupnoallowed'] = '이 워크샵에서 모둠에 접근하는 것이 허용되지 않습니다.';
$string['iamsure'] = '예, 확실합니다';
$string['info'] = '정보';
$string['instructauthors'] = '제출 요령';
$string['instructreviewers'] = '평가 요령';
$string['introduction'] = '소개';
$string['latesubmissions'] = '최근 제출물';
$string['latesubmissionsallowed'] = '늦게 제출하는 것이 허용됨';
$string['latesubmissions_desc'] = '마감일 이후 제출 허용';
$string['latesubmissions_help'] = '활성화되면 저자는 제출 마감일후에 혹은 평가 단계에 자신의 일을 제출할 수도 있습니다. 하지만 늦는 제출은 편집할 수 없습니다.';
$string['maxbytes'] = '최대 제출 첨부 크기';
$string['modulename'] = '상호평가';
$string['modulenameplural'] = '상호평가';
$string['mysubmission'] = '내 제출물';
$string['nattachments'] = '첨부물의 최대 수';
$string['noexamples'] = '아직 예제가 없음';
$string['noexamplesformready'] = '예제 제출을 제공하기전에 평가 양식을 정의해야 합니다.';
$string['nogradeyet'] = '아직 성적 없음';
$string['nosubmissionfound'] = '이 사용자의 제출물이 없음';
$string['nosubmissions'] = '아직 제출물이 없음';
$string['notassessed'] = '아직 평가하지 않음';
$string['nothingtoreview'] = '검토할 것이 없음';
$string['notoverridden'] = '덮어쓰여지지 않음';
$string['noworkshops'] = '이 강좌에는 상호평가가 없음';
$string['noyoursubmission'] = '아직 제출한 과제가 없음';
$string['nullgrade'] = '	
-';
$string['overallfeedback'] = '전반적인 피드백';
$string['overallfeedbackfiles'] = '전반적인 피드백에서의 첨부 파일의 최대 수';
$string['overallfeedbackmaxbytes'] = '파일의 최대 용량';
$string['overallfeedbackmode'] = '전반적인 피드백';
$string['overallfeedbackmode_0'] = '비활성화 됨';
$string['overallfeedbackmode_1'] = '활성화되고 선택적인';
$string['overallfeedbackmode_2'] = '활성화되고 필수적인';
$string['page-mod-workshop-x'] = '모든 워크샵 모듈 페이지';
$string['participant'] = '참여자';
$string['participantrevierof'] = '다음 사람의 검토자임';
$string['participantreviewedby'] = '다음 사람의 검토를 받음';
$string['phaseassessment'] = '평가 단계';
$string['phaseclosed'] = '종료됨';
$string['phaseevaluation'] = '채점 평가 단계';
$string['phasesetup'] = '설정 단계';
$string['phasesoverlap'] = '제출단계와 평가 단계는 중첩될 수 없습니다.';
$string['phasesubmission'] = '제출 단계';
$string['pluginadministration'] = '상호평가 관리';
$string['pluginname'] = '상호평가';
$string['prepareexamples'] = '예제 제출물 준비';
$string['previewassessmentform'] = '미리 보기';
$string['publishedsubmissions'] = '공개된 제출물';
$string['publishsubmission'] = '제출물 공개';
$string['publishsubmission_help'] = '공개된 제출물은 상호평가가 종료되면 다른 사람들에게 제공됩니다.';
$string['reassess'] = '재평가';
$string['receivedgrades'] = '부여받은 성적';
$string['recentassessments'] = '상호평가 평가:';
$string['recentsubmissions'] = '상호평가 제출:';
$string['saveandclose'] = '저장 및 종료';
$string['saveandcontinue'] = '저장 후 편집 계속';
$string['saveandpreview'] = '저장 후 미리보기';
$string['saveandshownext'] = '저장하고 다음 보기';
$string['selfassessmentdisabled'] = '자평이 불가능함';
$string['showingperpage'] = '페이지당 {$a} 항목 보여주기';
$string['showingperpagechange'] = '변경...';
$string['someuserswosubmission'] = '과제를 제출하지 못한 사람이 적어도 한 사람 이상 있습니다.';
$string['sortasc'] = '오름차순';
$string['sortdesc'] = '내림차순';
$string['strategy'] = '채점 전략';
$string['strategyhaschanged'] = '양식의 수정으로 상호평가의 채점 전략이 변경되었습니다.';
$string['strategy_help'] = '채점 전략은 사용되는 평가 양식과 제출물을 채점하는 방법을 결정합니다. 4가지 옵션이 있습니다.

* 누적 성적 - 코멘트와 성적이 지정된 관점에 따라 주어짐
* 코멘트 - 코멘트가 지정된 관점에 따라 주어지만 성적은 주어지지 않음
* 오류수-코멘트와 예/아니오 평가가 지정된 주장에 따라 주어짐
* 루브릭 - 지정된 기준에 따라 수준별 평가가 주어짐';
$string['submission'] = '제출';
$string['submissionattachment'] = '첨부';
$string['submissionby'] = '{$a}의 제출';
$string['submissioncontent'] = '제출 내역';
$string['submissionend'] = '제출 마감일';
$string['submissionendbeforestart'] = '제출 마감일은 제출 개시일 이전으로 지정 될 수 없습니다';
$string['submissionenddatetime'] = '제출 마감일: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (제출 마감일)';
$string['submissionendswitch'] = '제출 마감일 이후 다음 단계로 전환';
$string['submissiongrade'] = '제출 성적';
$string['submissiongrade_help'] = '제출한 과제를 통하여 획득할 수 있는 최대 점수를 지정';
$string['submissiongradeof'] = '({$a} 의) 제출 성적';
$string['submissionsettings'] = '제출 설정';
$string['submissionstart'] = '제출 시작';
$string['submissionstartdatetime'] = '제출 개시일 {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (제출하도록 열림)';
$string['submissiontitle'] = '제목';
$string['subplugintype_workshopallocation'] = '제출 할당 방법';
$string['subplugintype_workshopallocation_plural'] = '제출 할당 방법';
$string['subplugintype_workshopeval'] = '채점 평가 방법';
$string['subplugintype_workshopeval_plural'] = '채점 평가 방법';
$string['subplugintype_workshopform'] = '채점 전략';
$string['subplugintype_workshopform_plural'] = '채점 전략';
$string['switchingphase'] = '교환 단계';
$string['switchphase'] = '교환 단계';
$string['switchphase10info'] = '상호평가를 <strong>설정단계</strong>로 전환하고자 합니다. 이 단계에서는 사용자들이 자신들의 제출물이나 평가한 것을 수정할 수 없습니다. 선생님은 이 단계에서 상호평가 설정을 변경하고, 채점 전략을 수정하며 평가 양식을 고칠 수 있습니다.';
$string['switchphase20info'] = '상호평가를 <strong>제출 단계</strong>로 전환하고자 합니다. 학생들은 이 단계에서는 각자가 한일을 제출하게 됩니다(제출 접속 제어일이 설정된 경우 기일 안에). 선생님들은 동료 평가를 위해 과제를 할당할 수도 있습니다.';
$string['switchphase30auto'] = '상호평가는 자동으로 {$a->daydatetime} ({$a->distanceday}) 후 평가 단계로 전환됩니다';
$string['switchphase30info'] = '상호평가를 <strong>평가 단계</strong>로 전환하고자 합니다. 이 단계에서는 검토자들이 할당된 제출물들을 평가하게 됩니다(평가 접속 제어일이 설정된 경우 기일 안에)';
$string['switchphase40info'] = '상호평가를 <strong>성적 평가 단계</strong>로 전환하고자 합니다. 이 단계에서는 사용자들이 자신들의 제출물이나 평가한 것을 수정할 수 없습니다. 선생님은 성적 평가 도구를 사용하여 최종 성적을 계산하고 평가자들에게 피드백을 제공할 수 있습니다.';
$string['switchphase50info'] = '상호평가를 종료하려고 합니다. 종료하면 계산된 성적이 성적부에 나타나게 됩니다. 학생들은 자신들의 제출과 제출 평가를 볼 수 있습니다.';
$string['taskassesspeers'] = '동료 평가';
$string['taskassesspeersdetails'] = '전체: {$a->total}<br />대기중: {$a->todo}';
$string['taskassessself'] = '자기평가';
$string['taskconclusion'] = '활동의 결론을 제공하세요.';
$string['taskinstructauthors'] = '제출 안내 제공';
$string['taskinstructreviewers'] = '평가 안내 제공';
$string['taskintro'] = '상호평가 소개 설정';
$string['tasksubmit'] = '과제 제출';
$string['toolbox'] = '상호평가 도구상자';
$string['undersetup'] = '상호평가 활동이 대기 중 입니다. 다음 단계로 넘어갈 때까지 기다려주시기 바랍니다.';
$string['useexamples'] = '예제 사용';
$string['useexamples_desc'] = '예제 제출물이 평가 연습을 위해 제공되었음';
$string['useexamples_help'] = '활성화되면 사용자는 한두개의 예제 제출을 평가하고 참조평가와 자신의 평가를 비교합니다. 성적은 평가를 위한 성적에 포함되지 않습니다.';
$string['usepeerassessment'] = '동료 평가 사용';
$string['usepeerassessment_desc'] = '타인의 과제를 평가할 수 있음';
$string['usepeerassessment_help'] = '활성화되면 사용자는 다른 사람의 제출을 할당받아 평가할 수 있으며 제출에 대한 성적뿐만 아니라 평가에 대한 성적도 받을 수 있습니다.';
$string['userdatecreated'] = '제출일자: <span>{$a}</span>';
$string['userdatemodified'] = '수정일자: <span>{$a}</span>';
$string['userplan'] = '상호평가 설계자';
$string['userplan_help'] = '상호평가 계획기는 활동의 모든 단계를 표시하고 각 단계별로 할 일들을 나열합니다. 현재 단계는 강조되어 표시되며 완료한 일들은 틱으로 표시됩니다.';
$string['useselfassessment'] = '자기평가 사용';
$string['useselfassessment_desc'] = '학생 스스로 자신의 과제를 평가할 수 있음';
$string['useselfassessment_help'] = '활성화되면 사용자는 자신의 제출을 할당받아 평가할 수 있으며 제출에 대한 성적뿐만 아니라 평가에 대한 성적도 받을 수 있습니다.';
$string['weightinfo'] = '가중치: {$a}';
$string['withoutsubmission'] = '제출물이 없는 검토자';
$string['workshop:addinstance'] = '새 상호평가 추가';
$string['workshop:allocate'] = '검토를 위한 제출물 배당';
$string['workshop:editdimensions'] = '평가양식 편집';
$string['workshop:ignoredeadlines'] = '시간 제한 무시';
$string['workshop:manageexamples'] = '예제 제출물 관리';
$string['workshopname'] = '상호평가 명칭';
$string['workshop:overridegrades'] = '계산된 성적 덮어쓰기';
$string['workshop:peerassess'] = '동료 평가';
$string['workshop:publishsubmissions'] = '제출물 공개';
$string['workshop:submit'] = '제출';
$string['workshop:switchphase'] = '교환 단계';
$string['workshop:view'] = '상호평가 보기';
$string['workshop:viewallassessments'] = '모든 평가 보기';
$string['workshop:viewallsubmissions'] = '모든 제출 보기';
$string['workshop:viewauthornames'] = '제출자 보기';
$string['workshop:viewauthorpublished'] = '공개된 제출물들의 저자 보기';
$string['workshop:viewpublishedsubmissions'] = '공개된 제출물 보기';
$string['workshop:viewreviewernames'] = '검토자 보기';
$string['yourassessment'] = '당신의 평가';
$string['yourgrades'] = '성적';
$string['yoursubmission'] = '내 제출물';
