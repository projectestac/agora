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
 * Strings for component 'enrol', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = '이용가능한 등록 플러그인';
$string['addinstance'] = '추가 방법';
$string['ajaxnext25'] = '다음 25...';
$string['ajaxoneuserfound'] = '1명 발견';
$string['ajaxxusersfound'] = '{$a} 사용자가 발견되었습니다.';
$string['assignnotpermitted'] = '권한이 없거나 강좌에 역할을 부여할 수 없습니다.';
$string['bulkuseroperation'] = '다수 사용자 작업';
$string['configenrolplugins'] = '필요한 모든 플러그인을 선택하고 적절한 순서대로 배열하세요.';
$string['custominstancename'] = '사용자 정의 인스턴스 이름';
$string['defaultenrol'] = '기본 등록 방법';
$string['defaultenrol_desc'] = '기본으로 이 플러그인을 모든 새 강좌에 추가할 수 있음';
$string['deleteinstanceconfirm'] = '정말, {$a->users} 명이 등록처리된 "{$a->name}" 플러그인을 삭제하겠습니까?';
$string['durationdays'] = '{$a} 일간';
$string['enrol'] = '등록';
$string['enrolcandidates'] = '등록 사용자 없음';
$string['enrolcandidatesmatching'] = '일치하는 등록자 없음';
$string['enrolcohort'] = '수업집단에 등록';
$string['enrolcohortusers'] = '모둠에 등록';
$string['enrollednewusers'] = '{$a} 사용자 등록 성공';
$string['enrolledusers'] = '등록된 사용자';
$string['enrolledusersmatching'] = '일치하는 등록 사용자';
$string['enrolme'] = '이 강좌에  등록시켜 주세요';
$string['enrolmentinstances'] = '등록 방법';
$string['enrolmentnew'] = '{$a} 에 새로 등록';
$string['enrolmentnewuser'] = '{$a->user} 가 강좌 "{$a->course}"에 등록됨';
$string['enrolmentoptions'] = '등록 조건';
$string['enrolments'] = '등록 방법';
$string['enrolnotpermitted'] = '타인을 본 강좌에 등록시킬 권한이 없음';
$string['enrolperiod'] = '재적 기한';
$string['enroltimeend'] = '재적 종료';
$string['enroltimestart'] = '재적 개시';
$string['enrolusage'] = '인스턴스/등록';
$string['enrolusers'] = '사용자로 등록';
$string['errajaxfailedenrol'] = '사용자 등록 실패';
$string['errajaxsearch'] = '사용자 검색 오류';
$string['erroreditenrolment'] = '사용자 등록을 편집하려고 하는 도중에 오류가 발생하였습니다.';
$string['errorenrolcohort'] = '이 강좌에서 수업집단 동기 등록 인스턴스 생성 오류';
$string['errorenrolcohortusers'] = '이 강좌에 수업집단 구성원등록 오류';
$string['errorwithbulkoperation'] = '대량 등록 변경을 처리하는 도중에 오류가 있었습니다.';
$string['extremovedaction'] = '원격에서 제명';
$string['extremovedaction_help'] = '사용자 등록이 외부 등록원으로 부터 사라질때 수행해야 하는 행동을 선택하세요. 강좌 수강 취소시 사용자 데이터 일부와 설정이 지워짐을 유념하십시요.';
$string['extremovedkeep'] = '등록 상태 유지';
$string['extremovedsuspend'] = '강좌 등록 불가';
$string['extremovedsuspendnoroles'] = '강좌의 등록 및 역할 삭제 불가';
$string['extremovedunenrol'] = '강좌에서 제명';
$string['finishenrollingusers'] = '사용자 등록 종료';
$string['invalidenrolinstance'] = '잘못된 등록 작업';
$string['invalidrole'] = '쓸 수없는 역활';
$string['manageenrols'] = '등록 플러그인 관리';
$string['manageinstance'] = '관리';
$string['nochange'] = '변화 없음';
$string['noexistingparticipants'] = '참여자 없음';
$string['noguestaccess'] = '손님자격으로는 이 강좌에 접속할 수 없습니다. 로그인 해 주시기 바랍니다.';
$string['none'] = '없음';
$string['notenrollable'] = '이 강좌에 등록할 수 없습니다.';
$string['notenrolledusers'] = '비등록 사용자';
$string['otheruserdesc'] = '아래의 사용자들은 이 강좌에 등록되지 않았으나, 강좌내에서 상속되거나 부여된 역할을 지니고 있음.';
$string['participationactive'] = '활동';
$string['participationstatus'] = '상황';
$string['participationsuspended'] = '유보';
$string['periodend'] = '{$a} 까지';
$string['periodstart'] = '{$a} 부터';
$string['periodstartend'] = '{$a->start} 부터 {$a->end} 까지';
$string['recovergrades'] = '가능한 경우 사용자의 이전 성적 복원';
$string['rolefromcategory'] = '{$a->role} (강좌 범주에서 상속됨)';
$string['rolefrommetacourse'] = '{$a->role} (상위 강좌에서 상속됨)';
$string['rolefromsystem'] = '{$a->role} (사이트 수준에서 부여됨)';
$string['rolefromthiscourse'] = '{$a->role} (이 강좌에서 부여됨)';
$string['startdatetoday'] = '오늘';
$string['synced'] = '동기화됨';
$string['totalenrolledusers'] = '{$a} 등록 사용자';
$string['totalotherusers'] = '{$a} 기타 사용자';
$string['unassignnotpermitted'] = '이 강좌의 역할을 해촉할 수 있는 권한이 없음';
$string['unenrol'] = '제명';
$string['unenrolconfirm'] = '정말, 사용자 "{$a->user}" 를  "{$a->course}" 강좌에서 제명하겠습니까?';
$string['unenrolme'] = '{$a} 로부터 탈퇴';
$string['unenrolnotpermitted'] = '강좌에서 이 사용자의 등록을 취소할 수 있는 권한이 없습니다.';
$string['unenrolroleusers'] = '사용자 등록취소';
$string['uninstallconfirm'] = '등록 플러그인 \'{$a}\'.를 완전히 삭제하고자 합니다. 이로 인해 데이터베이스에서 이 등록 유형과 연관된 모든 것이 삭제될 것입니다. 계속 하시겠습니까?';
$string['uninstalldeletefiles'] = '등록 플러그인 \'{$a->plugin}\'과 연관된 모든 데이터가 데이터베이스에서 삭제될 것입니다. 삭제를 완료하려면 (플러그인 재설치를 방지하려면), 서버에서 디렉토리 {$a->directory} 를 삭제해야 합니다.';
$string['unknowajaxaction'] = '알 수 없는 작동이 요구됨';
$string['unlimitedduration'] = '무제한';
$string['usersearch'] = '검색';
$string['withselectedusers'] = '선택된 사용자들에 대해';
