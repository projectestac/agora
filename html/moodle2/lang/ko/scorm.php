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
 * Strings for component 'scorm', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = '활성화';
$string['activityloading'] = '자동으로 다음 활동으로 이동할 것임';
$string['activityoverview'] = '주의가 필요한 스콤패키지가 있습니다.';
$string['activitypleasewait'] = '활동 탑재 중, 잠시만 ...';
$string['adminsettings'] = '관리자 설정';
$string['advanced'] = '파라메터';
$string['aicchacpkeepsessiondata'] = 'AICC HACP 세션 데이터';
$string['aicchacpkeepsessiondata_desc'] = '외부 AICC HACP 세션 데이터를 유지하는 일 수 (높게 설정하면 오래된 데이터로 테이블을 채울것이지만 디버깅 할 때 유용 할 수 있습니다)';
$string['aicchacptimeout'] = 'AICC HACP 타임아웃';
$string['aicchacptimeout_desc'] = '외부 AICC HACP 세션이 열려있는 상태로 유지 될 수있는 시간 (분) 길이';
$string['allowapidebug'] = 'API 추적 및 디버그 활성화(apidebugmask로 캡쳐마스크 설정)';
$string['allowtypeaicchacp'] = '외부  AICC HACP 활성화';
$string['allowtypeexternal'] = '외부 묶음 사용';
$string['allowtypeexternalaicc'] = '직접 AICC url 활성화';
$string['allowtypeexternalaicc_desc'] = '이것을 활성화 하면 간단한 AICC 패키지로 직접 url을 허용합니다.';
$string['allowtypelocalsync'] = '내려받은 묶음 사용';
$string['apidebugmask'] = 'API 디버그 캡쳐 마스크- <username>:<activityname>에 대해 간단한 정규표현을 사용하십시요.  예:  admin:.*는 관리자에 대해서만 디버그 할 것입니다.';
$string['areacontent'] = '내용 파일';
$string['areapackage'] = '묶음 파일';
$string['asset'] = '에셋';
$string['assetlaunched'] = '에셋 - 보았음';
$string['attempt'] = '시도';
$string['attempt1'] = '첫 시도';
$string['attempts'] = '시도들';
$string['attemptsmanagement'] = '시도 관리';
$string['attemptstatusall'] = '내 공부방 및 초기 페이지';
$string['attemptstatusentry'] = '초기 페이지에서만';
$string['attemptstatusmy'] = '내 공부방에서만';
$string['attemptsx'] = '{$a} 번 시도';
$string['attr_error'] = '{$a->tag} 태그에서 잘못된 속성 ({$a->attr}) 값';
$string['autocontinue'] = '자동 진행';
$string['autocontinuedesc'] = '활동의 자동 진행에 대한 기본 설정';
$string['autocontinue_help'] = '<p>만일 <b>자동-계속</b>을 "예"로 놓으면, 학습모듈이 "(대화) 종료"를 호출하게 되면 자동으로 다음 학습 모듈이 작동하게 됩니다.</p>

<p>만일 "아니오"로 설정해 놓으면 사용자는 학습을 계속하기 위해 "계속"버튼을 눌러야만 합니다.</p>';
$string['averageattempt'] = '평균시도들';
$string['badmanifest'] = '선언 오류 : 오류 기록 참조';
$string['browse'] = '미리보기';
$string['browsed'] = '보았음';
$string['browsemode'] = '미리보기 모드';
$string['browserepository'] = '저장소';
$string['calculatedweight'] = '계산된 가중치';
$string['cannotfindsco'] = 'SCO가 없음';
$string['chooseapacket'] = '패키지 선택 혹은 업데이트';
$string['compatibilitysettings'] = '호환성 설정';
$string['completed'] = '완료됨';
$string['completionscorerequired'] = '최소 성적 요구';
$string['completionstatus_completed'] = '완료됨';
$string['completionstatus_passed'] = '통과됨';
$string['completionstatusrequired'] = '상태 요구';
$string['confirmloosetracks'] = '경고 : 패키지가 변경된 것으로 보입니다.. 만일 패키지의 구조가 변경되면, 일부 사용자 추적 자료들이 업데이트 중에 누락될 가능성이 있습니다';
$string['contents'] = '목차';
$string['coursepacket'] = '강좌 집합';
$string['coursestruct'] = '강좌 구조';
$string['currentwindow'] = '현재 창';
$string['datadir'] = '파일시스탬 오류: 강좌의 데이터 경로를 생성할 수 없음';
$string['defaultdisplaysettings'] = '기본 디스플레이 설정';
$string['defaultgradesettings'] = '기본 성적 설정';
$string['defaultothersettings'] = '다른 기본 설정';
$string['deleteallattempts'] = '모든 스콤 시도 삭제';
$string['deleteattemptcheck'] = '정말로, 이 시도들을 완전히 삭제하길 원하십니까?';
$string['deleteuserattemptcheck'] = '정말로 모든 시도를 완전히 삭제하기를 원하십니까?';
$string['details'] = 'SCO 트랙 세부사항';
$string['directories'] = '연결 경로 보임';
$string['disabled'] = '비활성화됨';
$string['display'] = '진열';
$string['displayattemptstatus'] = '시도 상황 표시';
$string['displayattemptstatusdesc'] = '시도 상태 표시 여부에 대한 기본 설정';
$string['displayattemptstatus_help'] = '활성화되면 시도에 대한 점수와 성적들이 스콤 개요 페이지에 표시됩니다.';
$string['displaycoursestructure'] = '처음 페이지에 강좌 구조 표시';
$string['displaycoursestructuredesc'] = '이 환경설정은 처음 페이지 설정에서 강좌 구조 표시 방법에 대한 기본값을 설정합니다.';
$string['displaycoursestructure_help'] = '활성화되면 목차가 스콤 개요 페이지에 표시될 것입니다.';
$string['displaydesc'] = '활동 패키지를 표시할 것인가에 대한 기본 설정';
$string['displaysettings'] = '디스플레이 설정';
$string['dnduploadscorm'] = '새 SCORM 패키지 추가';
$string['domxml'] = 'DOMXML 외부 라이브러리';
$string['duedate'] = '마감일';
$string['element'] = '요소';
$string['enter'] = '입력';
$string['entercourse'] = '스콤 강좌 입장';
$string['errorlogs'] = '오류 기록';
$string['everyday'] = '매일';
$string['everytime'] = '매시간 사용됨';
$string['exceededmaxattempts'] = '최대 시도 한계에 도달';
$string['exit'] = '스콤 강좌 나가기';
$string['exitactivity'] = '활동 나감';
$string['expired'] = '이 활동은 {$a} 에 종료되며 더 이상 이용할 수 없음';
$string['external'] = '외부 패키지 시간 업데이트';
$string['failed'] = '실패함';
$string['finishscorm'] = '이 내용을 다 보았다면, {$a}';
$string['finishscormlinkname'] = '강좌 페이지로 되돌아 가려면 여기를 클릭하십시요.';
$string['firstaccess'] = '첫번째 접속';
$string['firstattempt'] = '처음 시도';
$string['forcecompleted'] = '강제로 끝냄';
$string['forcecompleteddesc'] = '강제 종료에 대한 기본 설정';
$string['forcecompleted_help'] = '<p>강제 종료는 스콤 1.2팩에서만 문제가 될 수 있는 cmi.core.score.raw의 문제가 발생되었을 때,
현 시도 상황을 강제로 "종료"시킬 수 있게 한다.</p>
<p>이는 스콤 상에서 검토 혹은 다시보기 모드에서 시도를 재 방문할 수 없을 때나, 이수 상태에 문제가 있을 때
유용하게 활용될 수 있다.</p>';
$string['forcejavascript'] = '자바스크립트 사용자 강제 사용 ';
$string['forcejavascriptmessage'] = '이 객체를 보기 위해 자바스크립트가 필요합니다. 브라우저에서 자바스크립트를 활성화하고 다시 시도해 보십시요.';
$string['forcenewattempt'] = '강제로 새 시도 시작';
$string['forcenewattemptdesc'] = '새 시도를 강요할 것인가에 대한 기본 설정';
$string['forcenewattempt_help'] = '<p>이는 스콤 패키지를 방문할 때마다 강제적으로 새 시도로 만든다. </p>';
$string['found'] = '매니페스트 발견됨';
$string['frameheight'] = '이 항목은 스콤 틀의 기본 높이를 설정한다.';
$string['framewidth'] = '이 항목은 스콤 틀의 기본 폭을 설정한다.';
$string['fromleft'] = '왼쪽으로부터';
$string['fromtop'] = '위로 부터';
$string['fullscreen'] = '전체화면 채우기';
$string['general'] = '일반 자료';
$string['gradeaverage'] = '평균 성적';
$string['gradeforattempt'] = '시도 성적';
$string['gradehighest'] = '최고 성적';
$string['grademethod'] = '채점 방법';
$string['grademethoddesc'] = '이 환경설정은 활동의 기본 채점 방법을 설정합니다.';
$string['grademethod_help'] = '채점 방법은 활동을 한번 시도한 것에 대해 어떻게 성적이 결정되는가를 정의합니다.

4가지의 채점 방법이 있습니다.

* 학습 객체 - 완료/통과한 학습 객체 수
* 최고 성적 - 통과한 모든 학습 객체에서 얻은 최고 점수
* 평균 성적 - 모든 점수의 평균
* 합계 성적 - 모든 점수의 합계';
$string['gradereported'] = '보고된 성적';
$string['gradescoes'] = '학습 객체';
$string['gradesettings'] = '성적 설정';
$string['gradesum'] = '성적 합계';
$string['height'] = '높이';
$string['hidden'] = '비공개';
$string['hidebrowse'] = '미리보기 모드 버튼을 숨김';
$string['hidebrowsedesc'] = '미리보기를 가능하게 할 것인지에 대한 기본 설정';
$string['hidebrowse_help'] = '미리보기 모드는 학생들이 시도하기전에 활동을 살펴보는 것을 허용합니다. 미리보기가 비활성화 되어 있으면 미리보기 버튼은 보이지 않습니다.';
$string['hideexit'] = '나가기 링크 감춤';
$string['hidereview'] = '검토 버튼 감춤';
$string['hidetoc'] = '교육과정의 구조 숨김';
$string['hidetocdesc'] = '이 환경설정은 스콤 재생기에서 강좌 구조 표시(TOC)를 보일것인가 숨길것인가에 대한 기본값을 설정합니다.';
$string['hidetoc_help'] = '이 설정은 스콤 플레이어에서 목차가 어떻게 표시될 것인가를 지정합니다.';
$string['highestattempt'] = '최고 시도';
$string['identifier'] = '질문 식별자';
$string['incomplete'] = '미완성됨';
$string['info'] = '정보';
$string['interactions'] = '상호작용';
$string['invalidactivity'] = '스콤 활동이 바르지 않음';
$string['invalidhacpsession'] = '잘못된 HACP 세션';
$string['invalidmanifestresource'] = '경고 : 다음 리소스는 매니페스트에서 참조되었지만 찾을 수 없습니다';
$string['invalidurl'] = '지정된 URL이 잘못되었습니다';
$string['invalidurlhttpcheck'] = '명시한 URL이 잘못되었습니다. 디버그 메시지 <pre> {$a->cmsg} </pre>';
$string['last'] = '마지막 접속';
$string['lastaccess'] = '마지막 접속';
$string['lastattempt'] = '마지막 시도';
$string['lastattemptlock'] = '최종 시도 후 잠금';
$string['lastattemptlockdesc'] = '최종 시도 후 잠글 것인가에 대한 기본 설정';
$string['lastattemptlock_help'] = '활성화되면, 학생들은 허용된 모든 시도를 마친 후 스콤 플레이어를 동작시키지 못합니다.';
$string['location'] = '위치 표시 보임';
$string['max'] = '최고 점수';
$string['maximumattempts'] = '시도 횟수';
$string['maximumattemptsdesc'] = '활동의 최대 시도를 얼마로 할 것인가에 대한 기본 설정';
$string['maximumattempts_help'] = '<p>사용자에게 허용된 시도의 쵯수를 지정합니다.<br />이 기능은 SCORM1.2 과 AICC패키지에서만 작동합니다. SCORM2004는 자체내에 최대 시도 횟수를 정의하여 갖고 있습니다.</p>';
$string['maximumgradedesc'] = '이 환경설정은 활동의 최대 성적을 설정합니다.';
$string['menubar'] = '목차 표시 보임';
$string['min'] = '최하 점수';
$string['missing_attribute'] = '{$a->tag} 의 빠진 속성 {$a->attr}';
$string['missingparam'] = '필요항목이 없거나 잘못 됨';
$string['missing_tag'] = '빠진 태그 {$a->tag}';
$string['mode'] = '모드';
$string['modulename'] = '스콤 패키지';
$string['modulename_help'] = 'SCORM 과 AICC는 웹 기반 콘텐츠의 상호 운영, 접근성, 재활용성을 가능하게 하는 사양의 모음입니다. SCORM/AICC 모듈은 강좌에 SCORM/AICC패키지를 포함할 때 사용합니다.';
$string['modulenameplural'] = '스콤 패키지';
$string['nav'] = '찾아가기 보기';
$string['navigation'] = '찾아가기';
$string['newattempt'] = '새로운 시도 시작하기';
$string['next'] = '계속하기';
$string['noactivity'] = '보고 할 것이 없음';
$string['noattemptsallowed'] = '허용된 시도 수';
$string['noattemptsmade'] = '시도한 횟수';
$string['no_attributes'] = '{$a->tag} 태그는 속성을 가져야 함';
$string['no_children'] = '{$a->tag} 태그는 하부조직을 가져야함';
$string['nolimit'] = '무제한 시도';
$string['nomanifest'] = '선언이 없음';
$string['noprerequisites'] = '죄송하지만 이 학습 객체에 접근 하는데 필요한 충분한 전제조건에 도달하지 못하였습니다.';
$string['noreports'] = '보고사항 없음';
$string['normal'] = '보통';
$string['noscriptnoscorm'] = '브라우저가 자바스크립트를 지원하지 않거나 자바스크립트 지원이 비활성화 되어 있습니다. 스콤 패키지가 동작하지 않거나 데이터를 올라르게 저장하지 않을 수 있습니다.';
$string['notattempted'] = '시도하지 않았음';
$string['not_corr_type'] = '{$a->tag} 태그에는 부적당한 형태';
$string['notopenyet'] = '이 활동은 {$a} 가 되기까지 이용할 수 없슴';
$string['objectives'] = '목적';
$string['optallstudents'] = '모든 사용자';
$string['optattemptsonly'] = '시도한 사용자만';
$string['options'] = '옵션 (어떤 브라우저에 의해 사용할 수 없는)';
$string['optionsadv'] = '옵션 (고급)';
$string['optionsadv_desc'] = '체크되면 폭과 높이가 고급설정으로 나열될 것입니다.';
$string['optnoattemptsonly'] = '시도하지 않은 사용자만';
$string['organization'] = '조직';
$string['organizations'] = '조직들';
$string['othersettings'] = '추가 설정';
$string['package'] = '묶음 파일';
$string['packagedir'] = '파일시스템 오류. 패키지 경로를 생성 못 함';
$string['packagefile'] = '열수 있는 패키지 파일이 없음';
$string['packagehdr'] = '패키지';
$string['package_help'] = '패키지 파일은 AICC 혹은 SCORM 강좌 정의 파일들을 포함하고 있는 zip(혹은 pif) 파일입니다.</p>
';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = '이 설정은 파일 선택기를 사용해서 파일을 선택하는 대신 스콤 패키지에 대한 URL이 명시되는 것을 활성화합니다.';
$string['page-mod-scorm-x'] = '모든 SCORM 모듈 페이지';
$string['pagesize'] = '페이지 크기';
$string['passed'] = '통과됨';
$string['php5'] = 'PHP 5 (DOMXML native library)';
$string['pluginadministration'] = '스콤/AICC 관리';
$string['pluginname'] = '스콤 패키지';
$string['popup'] = '새 창';
$string['popupmenu'] = '드롭다운메뉴';
$string['popupopen'] = '새창으로 띄움';
$string['popupsblocked'] = '팝업 창이 차단된 것 처럼 보입니다. 스콤 모듈이 재생되는 것을 정지하였습니다. 다시 시작하기전에 브라우저 설정을 확인하십시요.';
$string['position_error'] = '{$a->tag} 태그는 {$a->parent} 태그에 종속될 수 없음';
$string['preferencespage'] = '이 페이지만을 위한 환경설정';
$string['preferencesuser'] = '이 보고서에만 적용';
$string['prev'] = '이전';
$string['raw'] = '원 점수';
$string['regular'] = '정규 선언';
$string['report'] = '보고서';
$string['reportcountallattempts'] = '{$a->nbresults} 건 중  {$a->nbusers} 사용자가 {$a->nbattempts} 시도를 함';
$string['reportcountattempts'] = '{$a->nbresults} 건 ({$a->nbusers} 사용자)';
$string['reports'] = '보고서';
$string['response'] = '응답';
$string['result'] = '결과';
$string['results'] = '결과';
$string['review'] = '재검토';
$string['reviewmode'] = '재검토 모드';
$string['rightanswer'] = '정답';
$string['scoes'] = '학습 객체';
$string['score'] = '점수';
$string['scorm:addinstance'] = '새 SCORM 패키지 추가';
$string['scormclose'] = '사용가능 기한';
$string['scormcourse'] = '학습 강좌';
$string['scorm:deleteownresponses'] = '자신의 시도 삭제';
$string['scorm:deleteresponses'] = '스콤시도 삭제';
$string['scormloggingoff'] = 'API 기록 끔';
$string['scormloggingon'] = 'API 기록 켬';
$string['scormopen'] = '사용가능 일시';
$string['scormresponsedeleted'] = '사용자 시도 삭제';
$string['scorm:savetrack'] = '추적 저장';
$string['scorm:skipview'] = '개요보기 생략';
$string['scormtype'] = '스콤형식';
$string['scormtype_help'] = '이 설정은 패키지가 강좌에 어떻게 포함되는가를 결정합니다. 4가지 옵션이 있습니다.

* 업로드 된 패키지 - 파일 선택기를 통해 스콤 패키지가 선택되도록 합니다.
* 외부 스콤 매니페스트 -  imsmanifest.xml URL이 명시되도록 합니다.
노트: 만일 URL이 사이트와 다른 도메인 이름을 가지고 있다면, "다운로드한 패키지"가 더 좋은 선택입니다. 그렇지 않으면 성적이 저장되지 않습니다.
* 다운로드한 패키지 - 패키지 URL이 명시되도록 합니다. 패키지는 압축 해제되어 로컬에 저장되고, 외부 스콤 패키지가 업데이트 되면 업데이트 됩니다.
* 로컬 IMS 콘텐츠 저장소 - IMS 저장소안에서 패키지가 선택되도록 합니다.';
$string['scorm:viewreport'] = '보고서 보기';
$string['scorm:viewscores'] = '점수 보기';
$string['scrollbars'] = '스크롤 허용';
$string['selectall'] = '모두 선택';
$string['selectnone'] = '모두 제외';
$string['show'] = '보기';
$string['sided'] = '측면에';
$string['skipview'] = '학생들은 콘텐츠 구조페이지를 생략합니다';
$string['skipviewdesc'] = '이 환경 설정은 페이지의 콘텐츠 구조를 언제 건너뛸 것인지에 대한 기본값을 설정합니다.';
$string['skipview_help'] = '이 설정은 콘텐츠 구조 페이지를 표시되지 않도록 할지를 결정합니다. 만일 팩키지에 한개의 학습 객체를 가지고 있다면 콘텐츠 구조 페이지는 표시되지 않습니다.';
$string['slashargs'] = '경고 : 본 사이트의 슬래쉬 아규먼트는 비활성 되어 있으며 객체가 원하는 대로 작동하지 않을 수 있음!';
$string['stagesize'] = '프레임/윈도우 크기';
$string['stagesize_help'] = '<p>학습 객체의 프레임 혹은 창의, 높이와 폭을 지정하는 두 개의 설정입니다.</p>';
$string['started'] = '시작일';
$string['status'] = '상태';
$string['statusbar'] = '상태막대 보임';
$string['student_response'] = '반응';
$string['subplugintype_scormreport'] = '보고서';
$string['subplugintype_scormreport_plural'] = '보고서';
$string['suspended'] = '보류됨';
$string['syntax'] = '문법 오류';
$string['tag_error'] = '{$a->value} 내용속에 알려지지 않은 태그({$a->tag})';
$string['time'] = '시간';
$string['title'] = '제목';
$string['toc'] = '강좌구조';
$string['toolbar'] = '도구막대 보임';
$string['too_many_attributes'] = '{$a->tag} 태그는 너무 많은 속성을 가지고 있음';
$string['too_many_children'] = '{$a->tag} 태그는 너무 많은 종속 객체를 가지고 있음';
$string['totaltime'] = '시간';
$string['trackcorrectcount_help'] = '질문에 대한 올바른 결과의 수';
$string['trackid'] = 'Id';
$string['trackingloose'] = '경고: 패키지의 추적 정보를 잃게 될것임!!';
$string['tracklatency'] = '대기 시간';
$string['trackpattern'] = '패턴';
$string['trackresponse'] = '응답';
$string['trackresult'] = '결과';
$string['trackresult_help'] = '학생의 응답과 맞는 결과에 기반한 결과';
$string['trackscoremax'] = '최대 점수';
$string['trackscoremax_help'] = '원시 점수의 범위에서 최대 값';
$string['trackscoremin'] = '최소 점수';
$string['trackscoremin_help'] = '원시 점수의 범위에서 최소값';
$string['trackscoreraw'] = '원시 점수';
$string['tracksuspenddata_help'] = '학습자 세션 간 데이터를 저장하고 가져올 공간을 제공하십시요.';
$string['tracktime'] = '시간';
$string['tracktime_help'] = '시도가 시작된 시간';
$string['tracktype'] = '유형';
$string['tracktype_help'] = '질문 유형, 예 "선택" 혹은 "단답"';
$string['trackweight'] = '가중치';
$string['trackweight_help'] = '가중치가 요소에 부여되었습니다.';
$string['type'] = '형태';
$string['typeaiccurl'] = '외부 AICC URL';
$string['typeexternal'] = '외부 스콤 매니페스트';
$string['typelocal'] = '올린 팩키지';
$string['typelocalsync'] = '내려받은 팩';
$string['unziperror'] = '묶음 파일 풀기 오류';
$string['updatefreq'] = '자동 업데이트 빈도';
$string['updatefreqdesc'] = '활동의 자동 업데이트 주기에 대한 기본 설정';
$string['updatefreq_help'] = '이것은 외부 패키지가 자동으로 다운로드하고 업데이트되는 것을 허용 합니다';
$string['validateascorm'] = '묶음파일 점검';
$string['validation'] = '확인 결과';
$string['validationtype'] = '스콤 선언을 확인하기 위해서 사용되는 DOMXML 라이브러리이다. 만약 잘 모르겠다면 기본값 그대로 두어라.';
$string['value'] = '값';
$string['versionwarning'] = 'Manifest 판은 1.3 보다 더 구판이다. {$a->tag} 태그경고';
$string['viewallreports'] = '{$a} 시도 보고서 보기';
$string['viewalluserreports'] = '{$a} 사용자 보고서 보기';
$string['whatgrade'] = '시도 점수 주기';
$string['whatgradedesc'] = '채점 방법에 대한 기본 설정';
$string['whatgrade_help'] = '여러번의 시도가 허용되는 경우 이 설정은 최고점수, 평균점수 혹은 최초(마지막)점수가 성적부에 기록될지를 명시합니다.

여러번 시도한 것 처리

* 새 시도를 시작하기 위한 옵션은 콘텐츠 구조 페이지의 입력 버튼위에 있는체크박스에 의해 제공됩니다. 한번 이상의 시도를 허용하고자 하는 경우 그 페이지에 대한 접근을 제공하는지 확인해 보십시요.
* 어떤 스콤 패키지는 새 시도에 대해 인지하지만 대부분은 그렇지 않습니다. 이것이 의미하는 것은 만일 학습자가 존재하는 시도에 다시 입장하고, 스콤 콘텐츠가 이전 시도를 덮어쓰기를 피할 수 있는 내부 논리가 없으면 시도가 "완료" 혹은 "통과"되었다하다라도 이전 시도들이 덮어쓰여지게 됩니다.
* "강제완료" "강제 새 시도" "최종 시도후 잠김" 설정은 여러번 시도를 관리하는데 사용될 수 있습니다.';
$string['width'] = '폭';
$string['window'] = '프레임/윈도우창';
