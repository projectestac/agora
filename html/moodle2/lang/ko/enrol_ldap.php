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
 * Strings for component 'enrol_ldap', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = ' \'{$a->course_shortname}\' (id {$a->course_id}) 강좌로 사용자 \'{$a->user_username}\' 에게 \'{$a->role_shortname}\' 역할 부여';
$string['assignrolefailed'] = ' \'{$a->course_shortname}\' (id {$a->course_id}) 강좌로 사용자 \'{$a->user_username}\' 에게 \'{$a->role_shortname}\' 역할 부여 실패';
$string['autocreate'] = '<p>만일 무들에 없는 강좌에 등록된 사람이 있으면 자동으로  강좌가 생성될 것입니다.</p><p>자동 강좌 생성을 사용하는 경우 위에 표시된 4개 필드 (ID number, shortname, fullname and summary)가 변경되는 것을 방지하기 위해 다음 능력들을 관련되는 역할에서 제거하는 것을 권장합니다.
moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname and moodle/course:changesummary, ';
$string['autocreate_key'] = '자동 생성';
$string['autocreation_settings'] = '강좌 자동 생성 설정';
$string['bind_dn'] = '만일 각 사용자를 찾기 위해 bind-user를 사용하고 싶다면 다음과 같이 설정하십시오. 예: \'cn=ldapuser,ou=public,o=org\'';
$string['bind_dn_key'] = '사용자 식별 이름을 바인딩';
$string['bind_pw'] = 'bind-user를 위한 패스워드';
$string['bind_pw_key'] = '암호';
$string['bind_settings'] = '바인딩 설정';
$string['cannotcreatecourse'] = '강좌를 생성할 수 없습니다: LDAP 레코드로부터 필수 자료가 누락되었습니다.';
$string['category'] = '자동 생성된 강좌의 범주';
$string['category_key'] = '범주';
$string['contexts'] = 'LDAP 문맥';
$string['couldnotfinduser'] = '사용자 \'{$a}\'를 찾을 수 없습니다, 건너뜁니다.';
$string['course_fullname'] = '선택 사항: 전체이름을 위한 LDAP 필드';
$string['course_fullname_key'] = '성명';
$string['course_idnumber'] = 'LDAP에서의 서로다른 식별자를 위한 맵, 대부분
<em>cn</em>나 <em>uid</em>. 만일 자동 강좌 생성기능을 사용하면 값을 수정하지 못하도록 해 놓기 바랍니다.';
$string['course_idnumber_key'] = 'ID 번호';
$string['coursenotexistskip'] = '강좌 \'{$a}\' 가 없습니다. 자동 생성이 비활성화 되었습니다. 건너뜁니다.';
$string['course_search_sub'] = '하위문맥에서 모둠 구성원 검색';
$string['course_search_sub_key'] = '하위문맥 검색';
$string['course_settings'] = '강좌 등록 설정';
$string['course_shortname'] = '선택 사항: 짧은 이름을 위한 LDAP 필드';
$string['course_shortname_key'] = '짧은 이름';
$string['course_summary'] = '선택 사항: 요약을 위한 LDAP 필드';
$string['course_summary_key'] = '요약';
$string['createcourseextid'] = '존재하지 않는 강좌 \'{$a->courseextid}\'에 등록된 사용자 생성';
$string['createnotcourseextid'] = '사용자가 존재하지 않는 강좌 \'{$a->courseextid}\'에 등록되었습니다.';
$string['creatingcourse'] = '강좌 \'{$a}\' 를 만드는 중...';
$string['editlock'] = '값수정 잠금';
$string['emptyenrolment'] = '강좌 \'{$a->course_shortname}\' 에서 역할 \'{$a->role_shortname}\'로 등록된 사람이 없습니다.';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = '강좌 \'{$a->course_shortname}\' (id {$a->course_id})에 사용자 \'{$a->user_username}\'  등록';
$string['enroluserenable'] = '강좌 \'{$a->course_shortname}\' (id {$a->course_id})에 사용자 \'{$a->user_username}\' 를 위해 등록을 활성화 하였습니다.';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group()는 사용자 유형 {$a} 를 지원하지 않습니다.';
$string['extcourseidinvalid'] = '강좌의 외주 id 가 잘못되었습니다.';
$string['extremovedsuspend'] = '강좌 \'{$a->course_shortname}\' (id {$a->course_id})에 사용자 \'{$a->user_username}\' 를 위해 등록을 비활성화 하였습니다.';
$string['extremovedsuspendnoroles'] = '강좌 \'{$a->course_shortname}\' (id {$a->course_id})에 사용자 \'{$a->user_username}\' 를 위해 등록을 비활성화하고 역할을 제거하였습니다.';
$string['extremovedunenrol'] = '강좌 \'{$a->course_shortname}\' (id {$a->course_id})에 사용자 \'{$a->user_username}\' 등록 취소';
$string['failed'] = '실패!';
$string['general_options'] = '일반 옵션';
$string['group_memberofattribute'] = '사용자나 모둠이 어떤 모둠에 속하는지를 나타내는 속성 이름(예 memberOf, groupMembership 등)';
$string['group_memberofattribute_key'] = '\'구성원\' 속성';
$string['host_url'] = 'URL에 속한 LDAP 호스트 지정 - LDAP호스트 값을 다음과 같이 입력하시오
\'ldap://ldap.myorg.com/\' 혹은 \'ldaps://ldap.myorg.com/\'';
$string['host_url_key'] = '호스트 URL';
$string['idnumber_attribute'] = '만일 모둠 구성원자격이 구별된 이름(dn)을 포함하고 있다면 LDAP 인증 설정에서 사용자 ID 넘버 매핑에 사용했던 같은 속성을 명시하십시요.';
$string['idnumber_attribute_key'] = 'ID 번호 속성';
$string['ldap_encoding'] = 'LDAP서버에 사용되는 엔코딩을 명시하세요. 아마도 utf-8 일것입니다. MS AD v2 는cp1252, cp1250 와 같은 기본 플랫폼 엔코딩을 사용합니다.';
$string['ldap_encoding_key'] = 'LDAP 인코딩';
$string['ldap:manage'] = 'LDAP 등록 인스턴스 관리';
$string['memberattribute'] = 'LDAP 구성원 속성';
$string['memberattribute_isdn'] = '구성원 자격이 구별된 이름(dn)을 포함하고 있다면 여기에 명시하십시요. 만일 그렇다면 이 섹션의 나머지 설정을 구성해야 합니다.';
$string['memberattribute_isdn_key'] = '구성원 속성은 dn 을 사용합니다.';
$string['nested_groups'] = '등록에 중첩된 모둠 (모둠의 모둠)을 사용하시겠습니까?';
$string['nested_groups_key'] = '중첩된 모둠';
$string['nested_groups_settings'] = '중첩된 모둠 설정';
$string['nosuchrole'] = '역할 \'{$a}\' 이 없습니다.';
$string['objectclass'] = '강좌 검색에 쓰인 objectClass. 일반적으로 \'posixGroup\'';
$string['objectclass_key'] = '객체 클래스';
$string['ok'] = 'OK';
$string['opt_deref'] = '모둠 구성원자격에 구별된 이름(dn)이 포함된 경우 검색에서 별칭이 어떻게 처리되어야 할지를 명시하세요. 다음 값중에 하나를 선택하세요. \'아니오\' (LDAP_DEREF_NEVER) or \'예\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = '역참조 별명';
$string['phpldap_noextension'] = '<em> PHP LDAP 익스텐션이 없는 것처럼 보입니다. 이 등록 플러그인을 사용하려면 이것이 설치되었는지 활성화되었는지 확인하십시요.';
$string['pluginname'] = 'LDAP를 이용한 등록';
$string['pluginname_desc'] = '<p>LDAP서버를 이용하여 당신은 등록자를 관리할 수 있습니다. LDAP목차는 과목 내용(map)의 모둠을 포함하고 있고, 각각의 모둠/강좌는 학생용 내용(mpa)의 회원제 접속허가를 가지고 있다고 가정할 수 있다.<p>
<p>또한 각 강좌는 LDAP의 구분에 의하여 나누어지고 각 모둠은 여러 개의 활동영역(<em>member</em> 혹은 <em>memberUid</em>)을 가지게 된다 그것은 각 유저마다 서로 다른 ID를 가지게 한다.</p>
<p>LDAP등록을 이용하려면 사용자들은 <strong>꼭!</strong> 유효한 ID값을 가지고 있어야 한다.
또한 LDAP모둠은 과목으로의 등록을 위해서 각 사용자의 영역에 맞는 ID값을 가지고 있어야 한다.
만약 LDAP 인증을 사용하고 있다면 이러한 것들은 잘 작동될것이다.</p>
<p>등록은 사용자가 로그인할때 업데이트 된다.
또한 등록 서류를 싱크시키기 위해서 스크립트를 사용할수도 있다.
다음 파일을 참고 하라 <em>enrol/ldap/enrol_ldap_sync.php</em></p>
<p>이 플러그인은 새 모둠이 LDAP에 등록되면 자동적으로 새 강좌를 생성하도록 설정될 수 있다.</p>';
$string['pluginnotenabled'] = '플러그인이 활성화되지 않았습니다!';
$string['role_mapping'] = '<p> LDAP에서 부여하고자 하는 역할마다 역할 강좌 모둠이 위치해 있는 문맥 목록을 명시하는 것이 필요합니다. 다른 문맥을 \';\'로 분리하십시요.  </p><p> 또한 모둠의 구성원을 보유하기 위해 LDAP  서버가 사용하는 속성을 명시할 필요가 있습니다. </p>';
$string['role_mapping_attribute'] = '{$a}에 대한 LDAP 멤버 속성';
$string['role_mapping_context'] = '{$a}에 대한 LDAP 문맥';
$string['role_mapping_key'] = 'LDAP으로부터 역할 매핑';
$string['roles'] = '역할 배치';
$string['server_settings'] = 'LDAP 서버 설정';
$string['synccourserole'] = '== 역할 \'{$a->role_shortname}\'에 대하여 강좌 동기화 \'{$a->idnumber}\' ';
$string['template'] = '선택 사항: 자동 생성 강좌는 그들의 설정값을 템플릿  강좌에서 가져올 수 있다.';
$string['template_key'] = '템플릿';
$string['unassignrole'] = '\'{$a->course_shortname}\' (id {$a->course_id}) 강좌로부터 사용자 \'{$a->user_username}\' 의 \'{$a->role_shortname}\' 역할 해지';
$string['unassignrolefailed'] = '\'{$a->course_shortname}\' (id {$a->course_id}) 강좌로부터 사용자 \'{$a->user_username}\' 의 \'{$a->role_shortname}\' 역할 해지 실패';
$string['unassignroleid'] = '사용자 id \'{$a->user_id}\'의 역할 id \'{$a->role_id}\' 해지';
$string['updatelocal'] = '로컬 자료 업데이트';
$string['user_attribute'] = '만일 모둠 구성원자격이 구별된 이름(dn)을 포함하고 있다면, 사용자 이름을 지정하고 검색하는데 사용하는 속성을 명시하세요. 만일 LDAP  인증을 사용한다면 LDAP 플러그인에서 사용자 ID 넘버 매핑에 사용했던 속성과 일치해야 합니다.';
$string['user_attribute_key'] = 'ID 번호 속성';
$string['user_contexts'] = '만일 모둠 구성원자격이 구별된 이름(dn)을 포함하고 있다면, 사용자가 위치해 있는 문맥 목록을 명시하십시요. 다른 문맥을 \';\'로 분리하십시요. 예 \'ou=users,o=org; ou=others,o=org\'';
$string['user_contexts_key'] = '문맥';
$string['user_search_sub'] = '만일 모둠 구성원자격이 구별된 이름(dn)을 포함하고 있다면, 사용자에 대한 검색이 하위 문맥에서도 이루어지는지 나타내세요.';
$string['user_search_sub_key'] = '하위문맥 검색';
$string['user_settings'] = '사용자 조회 설정';
$string['user_type'] = '만일 모둠 구성원자격이 구별된 이름(dn)을 포함하고 있다면, 사용자가 LDAP에 어떻게 저장되었는지 명시하세요.';
$string['user_type_key'] = '사용자 유형';
$string['version'] = '서버가 사용하고 있는 LDAP 프로토콜의 버젼';
$string['version_key'] = '버전';
