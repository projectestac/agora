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
 * Strings for component 'completion', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = '받은 성적';
$string['activities'] = '활동';
$string['activitiescompleted'] = '활동 이수';
$string['activitiescompletednote'] = '노트: 활동이 위 목록에 나타나려면 활동 완료 조건이 설정되어야 합니다.';
$string['activityaggregation'] = '조건 요구 사항 :';
$string['activityaggregation_all'] = '선택된 모든 활동은 완료해야 함';
$string['activityaggregation_any'] = '선택된 활동 아무거나 완료해야 함';
$string['activitycompletion'] = '활동 이수';
$string['aggregationmethod'] = '집계 방법';
$string['all'] = '모두';
$string['any'] = '어떤';
$string['approval'] = '인가';
$string['badautocompletion'] = '자동 이수 기능을 선택하려면, 적어도 (다음 중) 하나를 충족시켜야만 합니다.';
$string['completed'] = '완료됨';
$string['completedunlocked'] = '이수 설정 해제';
$string['completedunlockedtext'] = '변경사항을 저장하게 되면, 모든 사용자의 이수 상태가 지워질 것입니다. 만일 지워지는게 꺼림직하다면, 저장하지 마십시오.';
$string['completedwarning'] = '이수 설정 잠금';
$string['completedwarningtext'] = '여러 사람 ({$a}) 이 이 활동을 이수했다고 보고되었습니다. 이수 설정을 변경하게 되면 그들의 이수 상황이 지워질 것이며 혼선을 불러올 수도 있습니다. 꼭 필요하지 않고, 설정이 잠겨 있다면 굳이 이를 해제하지 마십시오.';
$string['completion'] = '이수상황 추적';
$string['completion-alt-auto-enabled'] = '조건에 의거하여 항목 이수를 표시함';
$string['completion-alt-auto-fail'] = '이수함(통과 성적을 획득하지 못함)';
$string['completion-alt-auto-n'] = '미이수';
$string['completion-alt-auto-pass'] = '이수함(통과 성적 획득)';
$string['completion-alt-auto-y'] = '이수함';
$string['completion-alt-manual-enabled'] = '사용자 스스로 이수상황을 기입할 수 있게 함';
$string['completion-alt-manual-n'] = '완료하지 않음; 완료된것으로 표시하려면 선택하에요.';
$string['completion-alt-manual-y'] = '완료함; 완료되지 않은것으로 표시하려면 선택하에요.';
$string['completion_automatic'] = '조건을 충족시키면 자동으로 활동 이수로 표시';
$string['completiondisabled'] = '끔, 활동 설정에서 이를 제시하지 않음';
$string['completionduration'] = '등록';
$string['completionenabled'] = '활성화됨 완료 및 활동 설정에서 제어';
$string['completionexpected'] = '이수 기한';
$string['completionexpected_help'] = '이 설정은 활동이 완료되기를 기대하는 날짜를 명시합니다. 이 날짜는 학생들에게는 보이지 않고 활동 완료보고서에만 표시됩니다.
';
$string['completion-fail'] = '완료 (통과 성적을 획득하지 못함)';
$string['completion_help'] = '만일 활성화되면 활동 완료를 특정 조건에 기반하여 수동적으로 혹은 자동적으로 추적할 수 있습니다. 원한다면 여러개의 조건을 설정할 수 있으며 모든 조건이 만족될때만 완료된 것으로 간주됩니다.

강좌의 활동이름 옆에 있는 표시는 활동이 완료되었음을 나타냅니다.';
$string['completionicons'] = '이수 체크 박스';
$string['completionicons_help'] = '
활동이름 옆의 체크표시는 활동이 완료됨을 표시하는데 사용될 수 도 있습니다.

만일 점선으로 체크표시가 보이면 활동을 완료했을때 클릭해서 체크할 수 있습니다.(다시한번 클릭하면 체크표시가 사라집니다.) 체크표시는 선택적이며 강좌에서 진도 추적하는 간단한 방법입니다.

만일 비어있는 체크박스가 보여지면 선생님이 설정한 조건에 따라 활동을 완료하게 되면 자동으로 체크표시가 나타납니다.';
$string['completion_manual'] = '사용자 스스로 활동 이수상황을 기입할 수 있게 함';
$string['completionmenuitem'] = '이수';
$string['completion-n'] = '완료되지 않음';
$string['completion_none'] = '활동 이수 상황을 표시하지 않음';
$string['completionnotenabled'] = '강좌 완료가 활성화 되지 않았습니다.';
$string['completionnotenabledforcourse'] = '이 강좌에서 강좌 완료가 활성화 되지 않았습니다.';
$string['completionnotenabledforsite'] = '이 사이트에서 강좌 완료가 활성화 되지 않았습니다.';
$string['completionondate'] = '날짜';
$string['completionondatevalue'] = '사용자 등록 유지 기한:';
$string['completion-pass'] = '완료됨(통과 성적 얻음)';
$string['completionsettingslocked'] = '이수 설정 잠김';
$string['completion-title-manual-n'] = '이수로 표시';
$string['completion-title-manual-y'] = '미이수로 표시';
$string['completionusegrade'] = '성적 필수';
$string['completionusegrade_desc'] = '이 활동을 완료하기 위해서는 반드시 성적을 받아야 합니다.';
$string['completionusegrade_help'] = '활성화되면 활동은 학생이 성적을 받아야 완료된 것으로 간주됩니다. 활동에 대한 통과 성적이 설정되었으면 통과및 실패 아이콘이 표시될 수 있습니다.';
$string['completionview'] = '열람 필수';
$string['completionview_desc'] = '이수하기 위해서는 본 활동을 열람해야 함';
$string['completion-y'] = '완료함';
$string['configenablecompletion'] = '이를 활성화하면, 강좌 수준에서 이수과정을 추적할 수 있게 된다.';
$string['confirmselfcompletion'] = '자기주도 완료 확인';
$string['courseaggregation'] = '조건 요구 사항 :';
$string['courseaggregation_all'] = '선택된 모든 강좌는 완료해야 함';
$string['courseaggregation_any'] = '선택된 강좌 아무거나 완료해야 함';
$string['coursealreadycompleted'] = '이미 이 강좌를 완료하였습니다.';
$string['coursecomplete'] = '강좌 이수 완료';
$string['coursecompleted'] = '강좌 이수 완료됨';
$string['coursecompletion'] = '강좌 완료';
$string['coursecompletioncondition'] = '조건: {$a}';
$string['coursegrade'] = '강좌 성적';
$string['coursesavailable'] = '사용가능한 강좌';
$string['coursesavailableexplaination'] = '<i>강좌가 이 목록에 나타나려면 강좌이수완료 기준이 설정되어야 합니다.</i>';
$string['criteria'] = '기준';
$string['criteriagroup'] = '기준 모둠';
$string['criteriarequiredall'] = '아래의 모든 기준이 필요합니다.';
$string['criteriarequiredany'] = '아래의 어떤 기준도 필요합니다,';
$string['csvdownload'] = '스프레드쉬트 형식으로 내려받기(UTF-8 .csv)';
$string['datepassed'] = '통과한 날짜';
$string['days'] = '일';
$string['deletecompletiondata'] = '완료 데이터 삭제';
$string['dependencies'] = '의존성';
$string['dependenciescompleted'] = '다른 강좌 완료';
$string['editcoursecompletionsettings'] = '강좌이수완료 설정 편집';
$string['enablecompletion'] = '이수과정 추적 활성화';
$string['enrolmentduration'] = '등록 기간';
$string['enrolmentdurationlength'] = '사용자 등록 유지 기간:';
$string['err_noactivities'] = '이수 정보가 비활성화된 활동에 대해서는, 어느 누구도 이를 볼 수  없다. 활동에 대한 설정을 수정해야만 이수 정보를 활성화 할 수 있다.';
$string['err_nocourses'] = '강좌 이수완료가 다른 어떤 강좌에서도 활성화 되지 않아서 아무것도 표시되지 않습니다. 강좌 설정에서 강좌이수완료를 활성화 할 수 있습니다.';
$string['err_nograde'] = '강좌 통과 성적이 이 강좌에 대해 설정되지 않았습니다. 이 기준 유형을 활성화 하기 위해서는 이 강좌에 대한 통과 성적을 정해야 합니다.';
$string['err_noroles'] = '이 강좌에는 \'moodle/course:markcomplete\'  능력을 가진 역할이 없습니다. 역할에 이 능력을 추가해서 이 기준 유형을 활성화 할 수 있습니다.';
$string['err_nousers'] = '이 강좌에는 완료 정보가 표시될 학생이나 모둠이 없습니다.  (기본으로 완료 정보는 학생들에게만 제시되며 따라서 학생이 없다면 오류를 보게 될 것입니다. 관리자는 관리자 페이지에서 이 옵션을 변경할 수 있습니다)';
$string['err_settingslocked'] = '한 명이상의 학생이 이미 이 기준을 완료해서 설정이 잠겼습니다. 완료 기준 설정 잠금을 해제하면 기존의 사용자 데이터가 삭제되며 혼동이 발생할 수도 있습니다.';
$string['err_system'] = '이수 시스템의 내부오류 발생. (시스템 관리자는 좀 더 자세한 사항을 알기위해 디버그 정보를 활성화시킬 수 있다)';
$string['excelcsvdownload'] = '엑셀 호환 형식(.csv)으로 내려받음';
$string['fraction'] = '분수';
$string['graderequired'] = '필요한 강좌 성적';
$string['gradexrequired'] = '{$a} 가 필요합니다.';
$string['inprogress'] = '진행 중';
$string['manualcompletionby'] = '다른 사람에 의한 수동 완료';
$string['manualselfcompletion'] = '강좌이수 수동확인';
$string['markcomplete'] = '이수 표시';
$string['markedcompleteby'] = '{$a} 가 이수 표시';
$string['markingyourselfcomplete'] = '완료한 것을 스스로 표시';
$string['moredetails'] = '세부사항';
$string['nocriteriaset'] = '이 강좌에 대한 강좌 완료 기준이 설정되지 않았습니다.';
$string['notcompleted'] = '완료하지 못함.';
$string['notenroled'] = '이 강좌에 등록되지 않았습니다.';
$string['nottracked'] = '당신은 현재 이 강좌에서 완료에 의해 추적되고 있지 않습니다';
$string['notyetstarted'] = '아직 시작 안했습니다.';
$string['overallaggregation'] = '완료 조건';
$string['overallaggregation_all'] = '모든 조건이 만족하면 강좌는 완료됩니다.';
$string['overallaggregation_any'] = '조건 중 어느 하나라도 만족하면 강좌는 완료됩니다.';
$string['pending'] = '유예';
$string['periodpostenrolment'] = '기간 후 등록';
$string['progress'] = '학생의 진도';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = '진도: {$a->complete} / {$a->total}';
$string['recognitionofpriorlearning'] = '이전 학습 인정';
$string['remainingenroledfortime'] = '정해진 시간 동안 등록된 상태로 남아 있음';
$string['remainingenroleduntildate'] = '지정된 날까지 등록된 상태로 남아 있음';
$string['reportpage'] = '전체 {$a->total} 사용자 중 {$a->from} 에서 {$a->to} 까지 보기';
$string['requiredcriteria'] = '필수 기준';
$string['restoringcompletiondata'] = '이수 자료 복구';
$string['roleaggregation'] = '조건 요구 사항 :';
$string['roleaggregation_all'] = '조건이 충족 될 때 채점할 선택된 모든 역할';
$string['roleaggregation_any'] = '조건이 충족 될 때 채점할 선택된 어떤 역할';
$string['saved'] = '저장됨';
$string['seedetails'] = '세부사항 보기';
$string['self'] = '자기';
$string['selfcompletion'] = '자기주도 완료';
$string['showinguser'] = '사용자 보기';
$string['unenrolingfromcourse'] = '강좌 등록 해지';
$string['unenrolment'] = '미등록';
$string['unit'] = '단위';
$string['unlockcompletion'] = '이수 옵션 해제';
$string['unlockcompletiondelete'] = '완료 옵션 잠금을 풀고 사용자의 완료 자료를 삭제';
$string['usealternateselector'] = '다른 강좌 선택기를 사용하세요';
$string['usernotenroled'] = '이 강좌에 사용자가 등록되지 않았습니다.';
$string['viewcoursereport'] = '강좌 보고서 보기';
$string['viewingactivity'] = '{$a} 를 보기';
$string['writingcompletiondata'] = '이수 자료 기입';
$string['xdays'] = '{$a} 일간';
$string['yourprogress'] = '성취도';
