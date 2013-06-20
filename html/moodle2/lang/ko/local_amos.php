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
 * Strings for component 'local_amos', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['amos'] = 'AMOS- 무들 번역기';
$string['amos:commit'] = '메인레포지토리로 스테이지된 문자열 커밋하기';
$string['amos:importfile'] = '업로드된 파일에서 문자열 가져오기';
$string['amos:manage'] = 'AMOS 포탈 관리';
$string['amos:stage'] = 'AMOS 번역도구 사용 및 문자열 스테이지 하기';
$string['amos:stash'] = '현재의 스테이지를 지속되는 스태시에 저장';
$string['commitbutton'] = '커밋하기';
$string['commitmessage'] = '메세지 커밋';
$string['commitstage'] = '무대에 올린 문자열 커밋';
$string['committableall'] = '모든 언어';
$string['committablenone'] = '허용된 언어가 없습니다. - AMOS 관리자에게 연락하십시요.';
$string['componentsall'] = '모두';
$string['componentsnone'] = '없음';
$string['componentsstandard'] = '표준';
$string['confirmaction'] = '되돌릴 수 없습니다. 확실합니까?';
$string['contribaccept'] = '승인';
$string['contribactions'] = '기여된 번역 활동';
$string['contribapply'] = '적용';
$string['contribassignee'] = '배정된 사람';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = '나에게 할당';
$string['contribauthor'] = '저자';
$string['contribclosedno'] = '해결된 기여 숨기기';
$string['contribclosedyes'] = '해결된 기여 보기';
$string['contribcomponents'] = '구성요소';
$string['contribid'] = '아이디';
$string['contribincomingnone'] = '들어오는 기여활동이 없습니다.';
$string['contribincomingsome'] = '들어오는 기여활동 {$a}';
$string['contriblanguage'] = '언어';
$string['contribreject'] = '거부';
$string['contribresign'] = '사직';
$string['contribstartreview'] = '검토 시작';
$string['contribstatus'] = '상태';
$string['contribstatus0'] = '새';
$string['contribstatus10'] = '검토중';
$string['contribstatus20'] = '거절됨';
$string['contribstatus30'] = '승인됨';
$string['contribstrings'] = '문자열';
$string['contribstringseq'] = '{$a->orig} 새로운';
$string['contribstringsnone'] = '{$a->orig} (모두 언어팩으로 번역되었습니다.)';
$string['contribstringssome'] = '{$a->orig} (이들 중 {$a->same}는 이미 이보다 최신 번역이 있습니다.)';
$string['contribsubject'] = '주제';
$string['contribsubmittednone'] = '제출된 기여가 없습니다.';
$string['contribsubmittedsome'] = '당신의 기여 ({$a})';
$string['contribtimemodified'] = '수정됨';
$string['contributions'] = '기여';
$string['diff'] = '비교';
$string['diffmode'] = '다음 경우 문자열을 공개의 장으로';
$string['diffmode1'] = '영어 문자열은 변경되었지만 변역 파일은 변경되지 않았습니다.';
$string['diffmode2'] = '영어 문자열은 변경되지 않았지만 변역 파일은 변경되었습니다.';
$string['diffmode3'] = '영어 혹은 번역된 문자열이 변경되었습니다. (둘다 변경된 것은 아님)';
$string['diffmode4'] = '영어 및 번역된 문자열이 모두 변경되었습니다. ';
$string['diffprogress'] = '선택된 브랜치를 비교';
$string['diffprogressdone'] = '모두 {$a} 차이가 발견되었습니다.';
$string['diffstrings'] = '두 브랜치에서 문자열 비교';
$string['diffversions'] = '버전';
$string['emailacceptsubject'] = '[AMOS 기여] 승인되었습니다.';
$string['emailcontributionsubject'] = '새로운 번역이 제출되었습니다.';
$string['emailrejectsubject'] = '[AMOS 기여] 거부되었습니다.';
$string['emailreviewsubject'] = '[AMOS 기여] 검토가 시작되었습니다.';
$string['err_exception'] = '오류: {$a}';
$string['err_invalidlangcode'] = '잘못된 언어 코드';
$string['err_parser'] = '파싱 오류: {$a}';
$string['filtercmp'] = '구성요소';
$string['filtercmp_desc'] = '이들 구성요소들에 대한 문자열 보여주기';
$string['filterlng'] = '언어';
$string['filterlng_desc'] = '이들 언어로 번역 표시';
$string['filtermis'] = '기타';
$string['filtermis_desc'] = '보여질 문자열에 대한 추가 조건';
$string['filtermisfglo'] = '회색목록화(greylisted) 된 문자열만';
$string['filtermisfhlp'] = '도움말 문자열만';
$string['filtermisfmis'] = '누락되고 오래된 문자열만';
$string['filtermisfstg'] = '스테이지된 문자열만';
$string['filtermisfwog'] = '회색목록된 문자열 제외';
$string['filtersid'] = '문자열 식별자';
$string['filtersid_desc'] = '문자열 배열안의 키';
$string['filtertxt'] = '부분문자열';
$string['filtertxtcasesensitive'] = '대소문자구별';
$string['filtertxt_desc'] = '문자열에 주어진 문장 포함해야 합니다.';
$string['filtertxtregex'] = '정규식';
$string['filterver'] = '버전';
$string['filterver_desc'] = '이들 무들 버전에서 문자열 보기';
$string['foundinfo'] = '발견된 문자열의 수';
$string['gotofirst'] = '첫 페이지로 가기';
$string['gotoprevious'] = '이전 페이지로 가기';
$string['greylisted'] = '회색목록화(greylisted) 된 문자열';
$string['greylistedwarning'] = '문자열이 회색목록화(greylisted) 되었습니다.';
$string['importfile'] = '파일에서 번역된 문자열 가져오기';
$string['language'] = '언어';
$string['languages'] = '언어';
$string['languagesall'] = '모든';
$string['languagesnone'] = '없음';
$string['log'] = '로그';
$string['logfilterbranch'] = '버전';
$string['logfiltercommithash'] = 'git 해시';
$string['logfiltercommitmsg'] = '커밋 메세지는 다음을 포함하고 있습니다.';
$string['logfiltercommits'] = '커밋 필터';
$string['logfiltercommittedafter'] = '다음 후에 커미트됨';
$string['logfiltercommittedbefore'] = '다음 전에 커미트됨';
$string['logfiltercomponent'] = '구성요소';
$string['logfilterlang'] = '언어';
$string['logfiltershow'] = '필터된 커밋과 문자열 보이기';
$string['logfiltersource'] = '소스';
$string['logfiltersourceamos'] = 'amos';
$string['logfiltersourcecommitscript'] = '커밋스크립트(커밋 메세지에 있는 AMOScript)';
$string['logfiltersourcefixdrift'] = '유동 고정(AMOS와 git 차이 고정)';
$string['logfiltersourcegit'] = 'git';
$string['logfiltersourcerevclean'] = '역정돈(역 정돈 과정)';
$string['logfilterstringid'] = '문자열 식별자';
$string['logfilterstrings'] = '문자열 필터';
$string['logfilterusergrp'] = '커밋한 사람';
$string['logfilterusergrpor'] = '혹은';
$string['maintainers'] = '유지관리자';
$string['markuptodate'] = '번역을 최신인 것으로 표시';
$string['merge'] = '병합';
$string['mergestrings'] = '다른 가지에서 문자열 병합';
$string['newlanguage'] = '새 언어';
$string['nodiffs'] = '차이가 발견되지 않았습니다.';
$string['nofiletoimport'] = '가져오기 할 파일을 제공하십시요.';
$string['nologsfound'] = '문자열이 발견되지 않았습니다. 필터를 변경해보십시요.';
$string['nostringsfound'] = '문자열이 발견되지 않았습니다.';
$string['nostringsfoundonpage'] = '페이지 {$a}에 문자열이 발견되지 않았습니다.';
$string['outdatednotcommitted'] = '오래된 문자열';
$string['outdatednotcommittedwarning'] = '오래됨';
$string['ownstashactions'] = '보관 행동';
$string['ownstashes'] = '개인보관';
$string['ownstashes_help'] = '개인보관 목록입니다.';
$string['ownstashesnone'] = '소유한 개인보관이 없습니다.';
$string['permalink'] = '고정 링크';
$string['placeholder'] = '위치 표시자';
$string['placeholderwarning'] = '문자열에 위치 표시자가 있습니다. ';
$string['pluginclasscore'] = '핵심 서브시스템';
$string['pluginclassnonstandard'] = '비표준 플러그인';
$string['pluginclassstandard'] = '표준 플러그인';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = '{$a->author}가 기여한 번역  #{$a->id}';
$string['presetcommitmessage2'] = '{$a->source} 에서 {$a->target} 브랜치로 누락된 문자열 병합';
$string['presetcommitmessage3'] = '{$a->versiona} 과 {$a->versionb} 사이의 차이 정정';
$string['privileges'] = '권한';
$string['privilegesnone'] = '공지 정보에 대해 읽을 권한만 있습니다.';
$string['requestactions'] = '행동';
$string['savefilter'] = '필터 설정 저장';
$string['sourceversion'] = '소스 버전';
$string['stage'] = '스테이지';
$string['stageactions'] = '스테이지 작업';
$string['stageedit'] = '스테이지된 문자열 편집';
$string['stagelang'] = '언어';
$string['stageoriginal'] = '원본';
$string['stageprune'] = '커밋할 수 없는 것 잘라내기';
$string['stagerebase'] = '리베이스';
$string['stagestring'] = '문자열';
$string['stagestringsnocommit'] = '{$a->staged} 개의 스테이지된 문자열이 있습니다.';
$string['stagestringsnone'] = '스테이지된 문자열이 없습니다.';
$string['stagesubmit'] = '관리자에게 제출';
$string['stagetranslation'] = '번역';
$string['stageunstageall'] = '모두 스테이지에서 내려 놓기';
$string['stashactions'] = '숨기기';
$string['stashapply'] = '적용';
$string['stashautosave'] = '백업 스태시를 자동으로 저장하였습니다.';
$string['stashcomponents'] = '<span>구성요소:</span> {$a}';
$string['stashdrop'] = '제외하기';
$string['stashes'] = '숨김';
$string['stashlanguages'] = '<span>언어:</span> {$a}';
$string['stashpop'] = '팝하기';
$string['stashpush'] = '모든 스테이지된 스트링을 새로운 스태시에 푸시했습니다.';
$string['stashstrings'] = '<span>문자열의 수:</span> {$a}';
$string['stashsubmit'] = '관리자에게 제출';
$string['stashsubmitdetails'] = '세부사항 제출';
$string['stashsubmitmessage'] = '메세지';
$string['stashsubmitsubject'] = '제목';
$string['stashtitle'] = '제목 숨김';
$string['stashtitledefault'] = 'WIP - {$a->time}';
$string['stringhistory'] = '이력';
$string['strings'] = '문자열';
$string['submitting'] = '기여 제출';
$string['targetversion'] = '대상 버전';
$string['translatorlang'] = '언어';
$string['translatororiginal'] = '원본';
$string['translatorstring'] = '문자열';
$string['translatorstring_help'] = '무들 브랜치 (버전), 문자열 확인자 및 이 문자열이 속해있는 구성요소 표시';
$string['translatortool'] = '번역기';
$string['translatortranslation'] = '번역';
$string['typecontrib'] = '비표준 플러그인';
$string['typecore'] = '핵심 서브시스템';
$string['typestandard'] = '표준 플러그인';
$string['version'] = '버전';
