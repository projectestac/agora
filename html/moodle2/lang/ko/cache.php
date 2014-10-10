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
 * Strings for component 'cache', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '동작';
$string['addinstance'] = '인스턴스 추가';
$string['addlocksuccess'] = '성공적으로 새 잠금 인스턴스를 추가하였습니다.';
$string['addnewlockinstance'] = '새 잠금 인스턴스 추가';
$string['addstore'] = '{$a} 스토어 추가';
$string['addstoresuccess'] = '성공적으로 새 스토어 {$a}를 추가하였습니다.';
$string['area'] = '영역';
$string['cacheadmin'] = '캐시 관리';
$string['cacheconfig'] = '구성';
$string['cachedef_calendar_subscriptions'] = '달력 구독';
$string['cachedef_config'] = '구성 설정';
$string['cachedef_coursecat'] = '특정 사용자를 위한 강좌 범주들';
$string['cachedef_coursecatrecords'] = '강좌 범주 레코드';
$string['cachedef_coursecattree'] = '강좌 범주 트리';
$string['cachedef_coursecontacts'] = '강좌 연락처 목록';
$string['cachedef_databasemeta'] = '데이터베이스 메타 정보';
$string['cachedef_eventinvalidation'] = '이벤트 무효화';
$string['cachedef_groupdata'] = '강좌 모둠 정보';
$string['cachedef_htmlpurifier'] = 'HTML 정화 - 청소된 내용';
$string['cachedef_langmenu'] = '사용가능한 언어 목록';
$string['cachedef_locking'] = '잠금';
$string['cachedef_plugin_manager'] = '플러그인 정보 관리자';
$string['cachedef_questiondata'] = '질문 정의';
$string['cachedef_repositories'] = '레포지토리 인스턴스 데이터';
$string['cachedef_string'] = '언어 문자열 캐시';
$string['cachedef_yuimodules'] = 'YUI 모듈 정의';
$string['cachelock_file_default'] = '기본 파일 잠금';
$string['cachestores'] = '캐시 스토어';
$string['caching'] = '캐싱';
$string['component'] = '구성요소';
$string['confirmlockdeletion'] = '잠금 삭제 확인';
$string['confirmstoredeletion'] = '스토어 삭제 확인';
$string['default_application'] = '기본 어플리케이션 스토어';
$string['defaultmappings'] = '매핑이 존재하지 않으면 스토어가 사용됩니다.';
$string['default_request'] = '기본 요청 스토어';
$string['default_session'] = '기본 세션 스토어';
$string['defaultstoreactions'] = '기본 스토어는 수정될 수 없습니다.';
$string['definition'] = '정의';
$string['definitionsummaries'] = '알려진 캐시 정의';
$string['delete'] = '삭제';
$string['deletelock'] = '잠금 삭제';
$string['deletelockconfirmation'] = '{$a} 잠금을 삭제하기를 원하십니까?';
$string['deletelocksuccess'] = '잠금을 성공적으로 삭제하였습니다.';
$string['deletestore'] = '스토어 삭제';
$string['deletestoreconfirmation'] = '"{$a}"스토어를 삭제 하시겠습니까?';
$string['deletestoresuccess'] = '성공적으로 캐시 스토어를 삭제하였습니다.';
$string['editdefinitionmappings'] = '{$a} 정의 스토어 매핑';
$string['editdefinitionsharing'] = '{$a}에 대한 정의 공유 편집';
$string['editmappings'] = '매핑 편집';
$string['editsharing'] = '공유 편집';
$string['editstore'] = '스토어 편집';
$string['editstoresuccess'] = '캐시 스토어를 성공적으로 편집하였습니다.';
$string['ex_configcannotsave'] = '캐시 설정을 파일로 저장할 수 없습니다.';
$string['ex_nodefaultlock'] = '기본 잠금 인스턴스를 찾을 수 없습니다.';
$string['ex_unabletolock'] = '캐싱에 대한 잠금을 획득 할 수 없습니다.';
$string['gethit'] = '히트 - 가져오기';
$string['getmiss'] = '놓친것 - 가져오기';
$string['invalidlock'] = '잘못된 잠금';
$string['invalidplugin'] = '잘못된 플러그인';
$string['invalidstore'] = '잘못된 캐시 스토어가 제공되었습니다.';
$string['lockdefault'] = '기본';
$string['lockingmeans'] = '잠금 메카니즘';
$string['lockmethod'] = '잠금 방법';
$string['lockmethod_help'] = '이것은 이 스토어를 잠글 필요가 있을때 잠금에 사용되는 방법입니다.';
$string['lockname'] = '이름';
$string['locknamedesc'] = '이름은 고유해야 하며 문자로만 구성 될 수 있습니다 :  a-zA-Z_';
$string['locknamenotunique'] = '선택한 이름은 유일하지 않습니다. 유일한 이름을 선택하세요.';
$string['locksummary'] = '캐시 잠금 인스턴스 요약';
$string['locktype'] = '유형';
$string['lockuses'] = '사용';
$string['mappingdefault'] = '(기본)';
$string['mappingfinal'] = '최종 스토어';
$string['mappingprimary'] = '주 스토어';
$string['mappings'] = '스토어 매핑';
$string['mode'] = '모드';
$string['mode_1'] = '어플리케이션';
$string['mode_2'] = '세션';
$string['mode_4'] = '요청';
$string['modes'] = '모드';
$string['nativelocking'] = '이 플러그인은 자기 자신의 잠금을 처리합니다.';
$string['none'] = '없음';
$string['plugin'] = '플러그인';
$string['pluginsummaries'] = '설치된 캐시 스토어';
$string['purge'] = '깨끗이 지움';
$string['purgedefinitionsuccess'] = '성공적으로 요청된 정의를 깨끗이 지웠습니다.';
$string['purgestoresuccess'] = '성공적으로 요청된 스토어를 깨끗이 지웠습니다.';
$string['requestcount'] = '{$a} 요청으로 테스트';
$string['rescandefinitions'] = '정의 재스캔';
$string['result'] = '결과';
$string['set'] = '세트';
$string['sharing'] = '공유';
$string['sharing_all'] = '모두';
$string['sharing_input'] = '맞춤 키(아래 입력됨)';
$string['sharingrequired'] = '최소 한개의 공유 옵션을 선택해야 합니다.';
$string['sharingselected_all'] = '모두';
$string['sharingselected_input'] = '맞춤 키';
$string['sharingselected_siteid'] = '사이트 식별자';
$string['sharingselected_version'] = '버전';
$string['sharing_siteid'] = '같은 사이트 아이디를 가지고 있는 사이트';
$string['sharing_version'] = '같은 버전을 사용하고 있는 사이트';
$string['storeconfiguration'] = '스토어 구성';
$string['store_default_application'] = '어플리케이션 캐시를 위한 기본 파일 스토어';
$string['store_default_request'] = '요청 캐시를 위한 기본 정적 스토어';
$string['store_default_session'] = '세션 캐시를 위한 기본 세션 스토어';
$string['storename'] = '스토어 이름';
$string['storenamealreadyused'] = '이 스토어에 대한 유일한 이름을 선택해야 합니다.';
$string['storenameinvalid'] = '잘못된 스토어 이름. a-z A-Z 0-9 - _ 및 공백을 사용할 수 있습니다.';
$string['storenotready'] = '스토어가 아직 준비되지 않았습니다.';
$string['storeperformance'] = '캐시 스토어 성능 보고 - 작업 당 {$a} 고유 요청.';
$string['storeready'] = '준비됨';
$string['storerequiresattention'] = '주목이 요구됨';
$string['storeresults_application'] = '응용 프로그램 캐시로 사용하는 경우 요청을 저장합니다.';
$string['storeresults_request'] = '요청 캐시로 사용하는 경우 요청을 저장합니다.';
$string['storeresults_session'] = '세션 캐시로 사용하는 경우 요청을 저장합니다.';
$string['stores'] = '스토어';
$string['storesummaries'] = '스토어 인스턴스를 설정하였습니다.';
$string['supports'] = '지원';
$string['supports_dataguarantee'] = '데이터 보장';
$string['supports_keyawareness'] = '키 인식';
$string['supports_multipleidentifiers'] = '다중 식별자';
$string['supports_nativelocking'] = '잠금';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = '키로 검색';
$string['tested'] = '테스트함';
$string['testperformance'] = '성능 테스트';
$string['unsupportedmode'] = '지원되지 않는 모드';
$string['untestable'] = '불안정한';
$string['userinputsharingkey'] = '공유를 위한 맞춤 키';
