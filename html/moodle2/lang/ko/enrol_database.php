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
 * Strings for component 'enrol_database', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = '사용중지된 사용자 등록 해지';
$string['dbencoding'] = '데이터베이스 엔코딩';
$string['dbhost'] = '데이터베이스 호스트';
$string['dbhost_desc'] = '데이터베이스 서버 IP 주소 혹은 호스트 이름을 입력하세요.';
$string['dbname'] = '데이터베이스명';
$string['dbpass'] = '데이터베이스 암호';
$string['dbsetupsql'] = '데이터베이스 설정 명령';
$string['dbsetupsql_desc'] = '통신 엔코딩을 설정하는데 자주 사용하는 특수 데이터베이스 설정을 위한 SQL 명령어 - 예- MySQL 및 PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = '사이베이스 인용 사용';
$string['dbsybasequoting_desc'] = '사이베이스 스타일 단일 인용 이스케이핑 - 오라클, MS-SQL 및 기타 데이터베이스에 필요합니다. MySQL에는 사용하지 마십시요.';
$string['dbtype'] = '데이터베이스 드라이버';
$string['dbtype_desc'] = 'ADOdb 데이터베이스 드라이버 이름, 외부 데이터베이스 엔진 유형';
$string['dbuser'] = '데이터베이스 사용자';
$string['debugdb'] = 'ADOdb 디버그';
$string['debugdb_desc'] = '외부 데이터베이스에 대한 ADOdb 연결을 디버그 - 로그인시 빈 페이지를 받을때 사용하세요. 실제 사이트에는 적합하지 않습니다.';
$string['defaultcategory'] = '기본 새 강좌 범주';
$string['defaultcategory_desc'] = '자동 생성된 강좌들에 대한 기본 범주. 새로운 범주 id가 명시되지 않았거나 없는 경우 사용됩니다.';
$string['defaultrole'] = '기본 역할';
$string['defaultrole_desc'] = '외부 테이블에 다른 역할이 명시되어 있지 않은 경우 기본으로 부여될 역할';
$string['ignorehiddencourses'] = '숨겨진 강좌 무시';
$string['ignorehiddencourses_desc'] = '만일 활성화되면 학생들에게 사용가능하지 않도록 설정된 강좌에 사용자들이 등록되지 않을 것입니다.';
$string['localcategoryfield'] = '로컬 범주 필드';
$string['localcoursefield'] = '로컬 코스 필드';
$string['localrolefield'] = '로컬 역할 필드';
$string['localuserfield'] = '로컬 사용자 필드';
$string['newcoursecategory'] = '새 강좌 범주 필드';
$string['newcoursefullname'] = '새 강좌 전체이름 항목';
$string['newcourseidnumber'] = '새 강좌 ID 번호 항목';
$string['newcourseshortname'] = '새 강좌 짧은 이름 필드';
$string['newcoursetable'] = '원격 새 강좌 테이블';
$string['newcoursetable_desc'] = '자동으로 생성되어야 하는 강좌 목록을 가진 테이블 이름을 입력하세요. 비어 있으면 아무 강좌도 만들어지지 않음을 의미합니다.';
$string['pluginname'] = '외부 데이터베이스';
$string['pluginname_desc'] = '등록을 통제하기 위해 외부 데이터를 사용할 수 있습니다. 외부 데이터베이스는 강좌 ID 필드 및 사용자 ID 필드를 가지고 있다고 가정됩니다. 이것들이 로컬 강좌와 사용자 테이블에서 선택한 필드와 비교하게 됩니다.';
$string['remotecoursefield'] = '원격 강좌 필드';
$string['remotecoursefield_desc'] = '강좌 테이블에서 항목들을 일치시키기 위해 사용하는 원격 테이블에서 필드 이름';
$string['remoteenroltable'] = '원격 사용자 등록 테이블';
$string['remoteenroltable_desc'] = '사용자 등록 목록을 가지고 있는 테이블 이름을 입력하세요. 비어 있으면 사용자 등록을 동기화 하지 않습니다.';
$string['remoterolefield'] = '원격 역할 필드';
$string['remoterolefield_desc'] = '역할 테이블에서 항목을 일치하고자 사용하는 원격 테이블의 필드 이름';
$string['remoteuserfield'] = '원격 사용자 필드';
$string['remoteuserfield_desc'] = '사용자 테이블에서 항목을 일치하고자 사용하는 원격 테이블의 필드 이름';
$string['settingsheaderdb'] = '외부 데이터베이스 연결';
$string['settingsheaderlocal'] = '로컬 필드 매핑';
$string['settingsheadernewcourses'] = '새 강좌 만들기';
$string['settingsheaderremote'] = '원격 등록 동기화';
$string['templatecourse'] = '새 강좌 템플릿';
$string['templatecourse_desc'] = '선택사항: 자동 생성된 강좌들은 템플릿 강좌에서 설정을 복사할 수 있습니다. 여기에 템플릿 강좌의 짧은 이름을 입력하세요.';
