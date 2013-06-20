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
 * Strings for component 'tool_xmldb', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = '실제';
$string['aftertable'] = '다음 테이블 뒤:';
$string['back'] = '뒤로';
$string['backtomainview'] = '메인 페이지로 돌아가기';
$string['cannotuseidfield'] = '"id"필드에 입력할 수 없음. 자동 숫자 컬럼임';
$string['change'] = '변경';
$string['charincorrectlength'] = '문자 필드의 길이가 바르지 않음';
$string['checkbigints'] = 'Bigints 체크';
$string['check_bigints'] = '잘못된 DB 정수 찾기';
$string['checkdefaults'] = '기본사항 점검';
$string['check_defaults'] = '일관성이 결여된 기본값 찾기';
$string['checkforeignkeys'] = '외래키 점검';
$string['check_foreign_keys'] = '외래키 위반 조사';
$string['checkindexes'] = '인덱스 점검';
$string['check_indexes'] = '누락된 DB 인덱스 찾기';
$string['checkoraclesemantics'] = '시만틱 점검';
$string['check_oracle_semantics'] = '잘못된 길이의 시만틱 찾기';
$string['completelogbelow'] = '(아래 검색 전체 로그 참조)';
$string['confirmcheckbigints'] = '이 기능은 무들 서버에서 <a href="http://tracker.moodle.org/browse/MDL-11038">가망성있는 잘못된 정수</a>를 검색해서 DB에서 모든 정수들이 적절히 정의되도록 필요한 SQL 문장을 자동적으로 만들어 줍니다. 일단 만들어진 문장을 복사해서 사용자의 SQL 인터페이스를 사용하여 실행합니다(데이터백업권장). 잘못된 정수를 검색하기 전에 가능한 최신 무들판을 사용하기를 권장합니다.<br /><br /> 이 기능은 DB에 어떤 조치도 취하지 않으므로 아무때나 안전하게 실행할 수 있습니다';
$string['confirmcheckdefaults'] = '이 기능은 서버의 일관성 없는 기본값을 검색하여, 이들이 제대로 정의될 수 있게끔 필요한 SQL질의를 자동적으로 생성(실행은 하지 않음!)해 냅니다.<br /><br />일단 만들어지면 문장을 복사해서 사용자가 사용하는 SQL 인터페이스를 사용하여 안전하게 실행할 수 있습니다(데이터 백업권장).<br /><br />일관성 없는 기본값을 검색하기 전에 되도록 무들의 최신판(1.8, 1.9, 2.x판)을 사용하기를 추천합니다.<br /><br /> 이 기능은 DB에 어떤 조치도 취하지 않으므로 아무때나 안전하게 실행할 수 있습니다.';
$string['confirmcheckforeignkeys'] = '이 기능은 install.xml에 정의되어 있는 외래키의 잠재적인 규정위반을 찾아낼 것입니다. (무들은 아직 데이터베이스에 외래키 제한조건을 생성하지 않습니다. 이로인해 잘못된 자료가 존재할 수 있습니다.)<br /><br />누락된 인덱스를 검색하기 전에 되도록 무들의 최신판(1.8, 1.9, 2.x+판)을 사용하기를 추천합니다.<br /><br />이 기능은 DB에 어떤 조치도 취하지 않으므로 아무때나 안전하게 실행할 수 있습니다.';
$string['confirmcheckindexes'] = '이 기능은 서버에 있을지도 모르는 누락된 인덱스를 검색해서, 빠짐없이 업데이트되는데 필요한 SQL질의를 자동적으로 생성(실행은 하지 않음!)해 낼 것입니다..<br /><br />일단 만들어진 문장을 복사해서 사용자의 SQL 인터페이스를 사용하여 실행할 수 있습니다(데이터 백업권장). 누락된 인덱스를 검색하기 전에 되도록 무들의 최신판(+판)을 사용하기 바랍니다.<br /><br />이 기능은 DB에 어떤 조치도 취하지 않으므로 아무때나 안전하게 실행할 수 있습니다.';
$string['confirmdeletefield'] = '필드를 삭제하는 것이 확실합니까? :';
$string['confirmdeleteindex'] = '인덱스를 삭제하는 것이 확실합니까?  :';
$string['confirmdeletekey'] = '키를 삭제하는 것이 확실합니까? :';
$string['confirmdeletetable'] = '테이블을 삭제하는 것이 확실합니까? :';
$string['confirmdeletexmlfile'] = '파일을 삭제하는 것이 확실합니까? :';
$string['confirmrevertchanges'] = '지금까지 한 변경을 되돌리기를 정말 원하십니까?';
$string['create'] = '생성';
$string['createtable'] = '테이블 생성';
$string['defaultincorrect'] = '올바르지 않은 디폴트';
$string['delete'] = '삭제';
$string['delete_field'] = '필드 삭제';
$string['delete_index'] = '인덱스 삭제';
$string['delete_key'] = '키 삭제';
$string['delete_table'] = '테이블 삭제';
$string['delete_xml_file'] = 'XML 파일 삭제';
$string['doc'] = '문서';
$string['docindex'] = '문서 인덱스:';
$string['documentationintro'] = '이 문서는 XMLDB 데이터베이스 정의에 의해 자동적으로 생성됩니다. 단, 영문으로만 제공됩니다.';
$string['down'] = '아래';
$string['duplicate'] = '복제';
$string['duplicatefieldname'] = '동일한 이름을 가진 다른 필드가 존재함';
$string['duplicatefieldsused'] = '중복된 필드가 사용되었습니다.';
$string['duplicatekeyname'] = '같은 이름의 다른 키가 존재합니다.';
$string['duplicatetablename'] = '같은 이름의 테이블이 존재합니다.';
$string['edit'] = '편집';
$string['edit_field'] = '필드 편집';
$string['edit_field_save'] = '필드 저장';
$string['edit_index'] = '인덱스 편집';
$string['edit_index_save'] = '인덱스 저장';
$string['edit_key'] = '키 편집';
$string['edit_key_save'] = '키 저장';
$string['edit_table'] = '테이블 편집';
$string['edit_table_save'] = '테이블 저장';
$string['edit_xml_file'] = 'XML 파일 편집';
$string['enumvaluesincorrect'] = 'enum 필드에 옳지 않은 값';
$string['expected'] = '예상됨';
$string['extensionrequired'] = '죄송합니다. 이 작업은 PHP의 \'{$a}\' 익스텐션이 필요합니다. 이 기능을 활용하려면 필요한 익스텐션을 설치하기 바랍니다.';
$string['field'] = '필드';
$string['fieldnameempty'] = '이름 필드가 비어 있음';
$string['fields'] = '필드들';
$string['fieldsnotintable'] = '테이블에 필드가 존재하지 않음';
$string['fieldsusedinindex'] = '이 필드는 인덱스로 사용됨';
$string['fieldsusedinkey'] = '이 필드는 키로 사용됨';
$string['filenotwriteable'] = '쓰기권한 없는 파일';
$string['fkviolationdetails'] = '{$a->tablename} 테이블에 있는 외래키 {$a->keyname} 는 {$a->numrows} 열에서 {$a->numviolations} 위반입니다.';
$string['float2numbernote'] = '알림: XMLDB에 의해 "float" 필드가 완벽히 지원된다 하더라도, "number" 필드로 마이그레이션 할 것을 권장함';
$string['floatincorrectdecimals'] = '부동소숫점 필드에 맞지 않는 십진수';
$string['floatincorrectlength'] = '부동소숫점 필드에 맞지 않는 길이';
$string['generate_all_documentation'] = '모든 문서';
$string['generate_documentation'] = '문서';
$string['gotolastused'] = '마지막 사용했던 파일로 되돌아 감';
$string['incorrectfieldname'] = '잘못된 이름';
$string['incorrectkeyname'] = '잘못된 키 이름';
$string['incorrecttablename'] = '잘못된 테이블 이름';
$string['index'] = '인덱스';
$string['indexes'] = '인텍스';
$string['integerincorrectlength'] = '정수필드에 맞지 않는 길이';
$string['key'] = '키';
$string['keynameempty'] = '키 이름은 공백일 수 없습니다.';
$string['keys'] = '키';
$string['listreservedwords'] = '유보 단어 목록<br/>(<a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a>를 이용하여 항상 최신 상태로 유지)';
$string['load'] = '가져오기';
$string['main_view'] = '주 보기';
$string['masterprimaryuniqueordernomatch'] = '외래키의 필드는 참조테이블의 UNIQUE KEY에 나열된 순서와 동일하게 나열되어야만 합니다.';
$string['missing'] = '누락됨';
$string['missingindexes'] = '누락된 인덱스가 발견되었습니다.';
$string['mustselectonefield'] = '필드와 관련된 작동을 보기 위해서는 하나의 필드를 선택해야만 합니다.';
$string['mustselectoneindex'] = '인덱스와 관련된 작동을 보기 위해서는 하나의 인덱스를 선택해야만 합니다.';
$string['mustselectonekey'] = '키와 관련된 작동을 보기 위해서는 하나의 키를 선택해야만 합니다.';
$string['newfield'] = '새 필드';
$string['newindex'] = '새 인덱스';
$string['newkey'] = '새 키';
$string['newtable'] = '새 테이블';
$string['newtablefrommysql'] = 'MySQL의 새 테이블';
$string['new_table_from_mysql'] = 'MySQL의 새 테이블';
$string['nofieldsspecified'] = '필드가 명시되지 않았습니다.';
$string['nomasterprimaryuniquefound'] = '외래키 참조 칼럼은 참조 테이블의 고유키를 포함하여야만 함. UNIQUE INDEX를 포함하는 것만으로는 충분치 않음을 유의';
$string['nomissingindexesfound'] = '누락된 인덱스가 발견되지 않았으므로, DB는 추가 조치가 필요하지 않습니다.';
$string['noreffieldsspecified'] = '참조 필드가 명시되지 않았습니다.';
$string['noreftablespecified'] = '명시된 참조 테이블을 찾을 수 없습니다.';
$string['noviolatedforeignkeysfound'] = '위반한 외래키가 없습니다.';
$string['nowrongdefaultsfound'] = '잘못된 초기값이 발견되지 않았으므로, DB는 추가 조치가 필요하지 않습니다.';
$string['nowrongintsfound'] = '잘못된 정수가 발견되지 않았으므로, DB는 추가 조치가 필요하지 않습니다.';
$string['numberincorrectdecimals'] = '숫자 필드에 맞지 않는 소수점이하 자리수';
$string['numberincorrectlength'] = '숫자 필드에 맞지 않는 길이';
$string['pendingchanges'] = '주의: 파일 변경됨. 언제든, 이들을 저장할 수 있습니다.';
$string['pendingchangescannotbesaved'] = '파일이 변경되었지만, 저장할 수 없음! 웹 서버의 쓰기 권한이 수록된 "install.xml" 및 경로를 검증해 보길 바람';
$string['pendingchangescannotbesavedreload'] = '파일이 변경되었지만, 저장할 수 없습니다! 웹 서버에서 디렉토리와 그 안의 "install.xml"에 대한 쓰기 권한이 있는지 확인해 보기 바랍니다. 그런 다음 이 페이지를 새로고침하면 변경사항을 저장할 수 있을 것입니다.';
$string['pluginname'] = 'XMLDB 편집기';
$string['primarykeyonlyallownotnullfields'] = '주 키는 공백일 수 없습니다.';
$string['reserved'] = '유보됨';
$string['reservedwords'] = '예약어들';
$string['revert'] = '되돌리기';
$string['revert_changes'] = '변경 되돌리기';
$string['save'] = '저장';
$string['searchresults'] = '검색 결과';
$string['selectaction'] = '동작 선택';
$string['selectdb'] = '데이터베이스 선택';
$string['selectfieldkeyindex'] = '필드/키/인덱스 선택';
$string['selectonecommand'] = 'PHP코드를 보려면 목록에서 하나의 동작을 선택하세요.';
$string['selectonefieldkeyindex'] = 'PHP코드를 보려면 목록에서 하나의 필드/키/인덱스를 선택하세요.';
$string['selecttable'] = '데이블 선택 :';
$string['table'] = '테이블';
$string['tablenameempty'] = '테이블 이름은 공백일 수 없습니다.';
$string['tables'] = '테이블';
$string['unload'] = '언로드';
$string['up'] = '위';
$string['view'] = '보기';
$string['viewedited'] = '보기가 편집됩';
$string['vieworiginal'] = '원본 보기';
$string['viewphpcode'] = 'PHP 코드 보기';
$string['view_reserved_words'] = '예약어 보기';
$string['viewsqlcode'] = 'SQL 코드 보기';
$string['view_structure_php'] = '구조 PHP 보기';
$string['view_structure_sql'] = '구조 SQL 보기';
$string['view_table_php'] = '뷰 테이블 PHP';
$string['view_table_sql'] = '뷰 테이블 SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = '위반한 외래키';
$string['violatedforeignkeysfound'] = '외래키 위반 사항 발견';
$string['violations'] = '위반사항';
$string['wrong'] = '틀림';
$string['wrongdefaults'] = '잘못된 기본값 발견';
$string['wrongints'] = '잘못된 정수 발견';
$string['wronglengthforenum'] = 'enum 필드에 적합하지 않은 길이';
$string['wrongnumberofreffields'] = '잘못된 참조 필드 수';
$string['wrongoraclesemantics'] = '잘못된 오라클 바이트 시맨틱이 발견되었습니다.';
$string['wrongreservedwords'] = '현재 사용되고 있는 예약어들<br />($CFG->prefix 를 쓸 경우에는 테이블명은 중요하지 않습니다)';
$string['yesmissingindexesfound'] = '누락된 인덱스가 당신의 DB에서 발견되었습니다. 자세한 사항은 다음과 같으며 필요한 SQL질의를 당신이 사용하고 있는 SQL 인터페이스로 실행하기 바랍니다.<br /><br />그 다음 더 이상의 누락된 인덱스가 없는지 확인하기 위하여 이 유틸리티를 다시한번 실행할 것을 권합니다.';
$string['yeswrongdefaultsfound'] = '상충되는 초기값이 DB에서 발견되었습니다. 자세한 사항은 다음과 같으며 문제점을 고치기 위해 필요한 SQL질의를 당신이 사용하고 있는 SQL 인터페이스로 실행하기 바랍니다.<br /><br />그 다음 더 이상의 상충되는 초기값이 없는지 확인하기 위하여 이 유틸리티를 다시한번 실행할 것을 권합니다.';
$string['yeswrongintsfound'] = '잘못된 인수가 당신의 DB에서 발견되었습니다. 자세한 사항은 다음과 같으며 필요한 SQL질의를 당신이 사용하고 있는 SQL 인터페이스로 실행하기 바랍니다.<br /><br />그 다음 더 이상의 잘못된 정수가 없는지를 확인하기 위하여 이 유틸리티를 다시한번 실행할 것을 권합니다.';
