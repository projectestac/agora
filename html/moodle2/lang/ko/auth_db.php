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
 * Strings for component 'auth_db', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = '지정한 인증 데이터베이스에 연결할 수 없습니다.';
$string['auth_dbchangepasswordurl_key'] = '암호 변경 URL';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Debug ADOdb 외부 데이터베이스 연결 - 로그인할 때 빈 페이지가 나올 때 사용. 접속이 빈번한 상용 사이트에는 적합하지 않습니다.';
$string['auth_dbdeleteuser'] = '삭제된 사용자 {$a->name} id {$a->id}';
$string['auth_dbdeleteusererror'] = '사용자 {$a} 삭제 오류';
$string['auth_dbdescription'] = '이 방식은 외부의 데이터베이스 테이블을 통해 사용자의 아이디와 비밀번호가 유효한 지를 확인합니다. 만일 계정이 새로 만든 것이라면, 다른 항목의 정보도 무들의 데이터베이스에 복사될 수 있습니다.';
$string['auth_dbextencoding'] = '외부 db 암호화';
$string['auth_dbextencodinghelp'] = '외부 데이터베이스의 암호화 사용';
$string['auth_dbextrafields'] = '이 항목들은 선택 사항입니다. 여기에 지정해 놓으면 <b>외부 데이타베이스 항목</b>으로부터 무들의 사용자 정보 항목을 채울 수 있습니다.<p>만일 이 곳을 비워 놓으면, 기본값이 사용됩니다.</p><p>사용자가 로그인 한 후에도 이 항목들을 수정할 수 있습니다.</p>';
$string['auth_dbfieldpass'] = '비밀번호를 포함하는 필드명';
$string['auth_dbfieldpass_key'] = '암호 필드';
$string['auth_dbfielduser'] = '사용자 아이디를 포함하는 필드명';
$string['auth_dbfielduser_key'] = '사용자 아이디 필드';
$string['auth_dbhost'] = '데이타베이스 서버를 구동하는 컴퓨터';
$string['auth_dbhost_key'] = '호스트';
$string['auth_dbinsertuser'] = '삽입된 사용자 {$a->name} id {$a->id}';
$string['auth_dbinsertusererror'] = '사용자 {$a} 입력 오류';
$string['auth_dbname'] = '데이터베이스 자체의 이름';
$string['auth_dbname_key'] = 'DB 이름';
$string['auth_dbpass'] = '사용자 아이디와 연결되는 비밀번호';
$string['auth_dbpass_key'] = '비밀번호';
$string['auth_dbpasstype'] = '<p>암호 필드의 포맷을 명시하십시요. PostNuke와 같은 웹 어플리케이션에 연결하기 위해서는 MD5 해싱을 사용하는 것이 유용합니다.</p> <p>만일 사용자 아이디나 이메일주소는 외부 데이터베이스를 사용하지만, 암호를 무들이 관리할 때에는 \'internal\'을 사용하십시요. 이때 <i>반드시</i> 외부 디비의 이메일주소 필드를 채워넣어야 하고, admin/cron.php 와 auth/db/cli/sync_users.php 를 주기적으로 실행시켜야만 합니다. 무들은 임시 암호를 새 사용자에게  이메일로  발송할 것입니다.</p>';
$string['auth_dbpasstype_key'] = '비밀번호 형식';
$string['auth_dbreviveduser'] = '되살린 사용자 {$a->name} id {$a->id}';
$string['auth_dbrevivedusererror'] = '사용자 {$a} 계정 되살리기 오류';
$string['auth_dbsetupsql'] = 'SQL 설정 명령';
$string['auth_dbsetupsqlhelp'] = '특별한 데이터베이스 설정을 위한 SQL 명령은 종종 통신 엔코딩을 설정하기 위해 이용된다. 예로 MySQL 과 PostgreSQL은 <em>SET NAMES \'utf8\'</em>이다.';
$string['auth_dbsuspenduser'] = '유보된 사용자 {$a->name} id {$a->id}';
$string['auth_dbsuspendusererror'] = '사용자 {$a} 계정 유보 오류';
$string['auth_dbsybasequoting'] = 'sybase quotes 사용';
$string['auth_dbsybasequotinghelp'] = 'Sybase style single quote escaping - Oracle, MS SQL 및 몇 개의 데이터베이스에서 필요하다. MySQL에서는 사용하지 말 것!';
$string['auth_dbtable'] = '데이타베이스의 테이블명';
$string['auth_dbtable_key'] = '테이블';
$string['auth_dbtype'] = '데이타베이스 유형(자세히 알고 싶으면 <a href="../lib/adodb/readme.htm#drivers">ADOdb 문서</a>)를 참조하라)';
$string['auth_dbtype_key'] = '데이터베이스';
$string['auth_dbupdatinguser'] = '사용자 {$a->name} id {$a->id} 업데이트';
$string['auth_dbuser'] = '데이타베이스의 읽기 권한을 가진 사용자명';
$string['auth_dbuser_key'] = 'DB 사용자';
$string['auth_dbusernotexist'] = '존재하지 않는 사용자 {$a} 는 업데이트할 수 없음';
$string['auth_dbuserstoadd'] = '{$a} 에 사용자 목록 추가';
$string['auth_dbuserstoremove'] = '{$a} 에서 사용자 목록 제거';
$string['pluginname'] = '외부 데이타베이스 사용';
