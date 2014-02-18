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
 * Strings for component 'auth_ldap', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = '활성화된 경로에서 새로운 계정을 생성할 수 없습니다. 이 작업에 필요한 모든 조건(LADPS 연결, 운영자급 시용자의 적절한 권한 등)을 충족시켰는지를 확인하시오.';
$string['auth_ldap_attrcreators'] = '구성원이 속성을 생성할 수 있도록 허용된 모둠 목록 또는 문맥. 여러 그룹인 경우 \';\'를 이용. 대개는  \'cn=teachers,ou=staff,o=myorg\'처럼 씀.';
$string['auth_ldap_attrcreators_key'] = '속성 생성자';
$string['auth_ldap_auth_user_create_key'] = '외부 사용자 생성';
$string['auth_ldap_bind_dn'] = '만약 당신이 bind-user(운영자급 사용자를 지칭한다)을 이용하여 사용자들을 찾길 바란다면 이곳에 자세한 것을 기록해야한다. 예를 들면 \'cn=ldapuser,ou=public,o=org\' 등이 있다.';
$string['auth_ldap_bind_dn_key'] = '구별되는 이름';
$string['auth_ldap_bind_pw'] = 'Bind-user를 위한 패스워드';
$string['auth_ldap_bind_pw_key'] = '암호';
$string['auth_ldap_bind_settings'] = '설정 확정';
$string['auth_ldap_changepasswordurl_key'] = 'ldap암호변경 URL';
$string['auth_ldap_contexts'] = '사용자들이 어디에 위치해있는지 나타내는 문맥 목록이다. 다른 종류의 목록들은 \'ou=users,o=org; ou=others,o=org\'처럼 세미콜론을 써서 나눠 적는다.';
$string['auth_ldap_contexts_key'] = '문맥';
$string['auth_ldap_create_context'] = '만약 당신이 이메일 인증으로 사용자를 생성시키려 한다면 어디에 사용자들을 생성시킬지를 명시하라. 이 문맥은 보안상의 문제를 막기위해 다른 사용자들과는 다르게 명기되어야 한다. ldap_context-variable에 작성된 문맥을 포함할 필요는 없다. 무들이 자동적으로 작성된 문맥에서 사용자를 찾아줄 것이다.<br /><b>주의!</b> 사용자 생성을 위해서는 auth/ldap/lib.php에 있는 auth_user_create()를 변경시킬 필요가 있다.';
$string['auth_ldap_create_context_key'] = '새 사용자를 위한 문맥';
$string['auth_ldap_create_error'] = 'LDAP 사용자 생성 오류';
$string['auth_ldap_creators'] = '새 강좌를 생성할 수 있는 모둠 혹은 문맥의 목록. 보통 \'cn=teachers,ou=staff,o=myorg\'형식으로 모둠을 분류한다.';
$string['auth_ldap_creators_key'] = '생성자';
$string['auth_ldapdescription'] = '이 방법은 외부 LDAP서버에 대해 인증을 제공해줍니다. 만약 계정과 비밀번호가 유효하다면 무들은 데이터베이스 안에 새로운 사용자를 만듭니다. 이 모듈은 LDAP에서 사용자 속성을 읽어와서 무들에 필요한 항목을 채웁니다. 추후 로그인 이후에는 단지 계정과 비밀번호만 점검합니다.';
$string['auth_ldap_expiration_desc'] = '만료된 비밀번호 검색을 불가능하게 하거나 LDAP로부터 비밀번호 만료 시간을 직접 읽어오게 하려면, "아니오"를 선택하라.';
$string['auth_ldap_expiration_key'] = '만료';
$string['auth_ldap_expiration_warning_desc'] = '비밀번호 만료 전 경고할 날의 여유';
$string['auth_ldap_expiration_warning_key'] = '만료 경고';
$string['auth_ldap_expireattr_desc'] = '선택 사항 : 비밀번호 만료 시간을 저장하는 ldap속성을 덮어쓰기 합니다';
$string['auth_ldap_expireattr_key'] = '만료 속성';
$string['auth_ldapextrafields'] = '이 필드는 선택사항이다. 당신이 여기에 명시한 LDAP서버에서 정보와 함께 무들 사용자 필드를 미리 채워놓을 수 있다. <p>만약 이 필드를 빈 공간으로 남겨둔다면, LDAP서버에서 아무것도 이동이 되지 않으며 무들의 기본값이 대신 사용된다.</p><p> 어느 경우라도 사용자가 로그인을 한 후에는, 사용자가 이 필드의 모든 것을 수정할 수 있다.';
$string['auth_ldap_graceattr_desc'] = '선택사항 : 유예기간 로그인 속성을 덮어쓰기 합니다';
$string['auth_ldap_gracelogin_key'] = '유예 로그인 속성';
$string['auth_ldap_gracelogins_desc'] = 'LDAP 유예기간 로그인 지원이 가능합니다. 비밀번호가 만기된 후에 사용자는 유예기간 로그인이 0이 되기 전까지 로그인 가능합니다. 만약 이 설정을 "예"로 놓으면 비밀번호가 만료될 경우에 유예기간 로그인 메세지를 보여줍니다.';
$string['auth_ldap_gracelogins_key'] = '유예 로그인';
$string['auth_ldap_groupecreators'] = '구성원이 모둠을 생성할 수 있도록 허용된 그룹 목록 또는 문맥. 여러 모둠인 경우 \';\'를 이용. 대개는  \'cn=teachers,ou=staff,o=myorg\'처럼 씀.';
$string['auth_ldap_groupecreators_key'] = '그룹 생성자';
$string['auth_ldap_host_url'] = '\'ldap://ldap.myorg.com/\' 또는 \'ldaps://ldap.myorg.com/\'식으로 URL상의 LDAP 호스트를 명기한다.';
$string['auth_ldap_host_url_key'] = '호스트 URL';
$string['auth_ldap_ldap_encoding'] = 'LDAP 서버에 의해 지정된 인코딩. 대개의 경우는 utf-8이나, MS AD v2 에서는 기본으로 cp1252, cp1250 등을 사용한다.';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP 인코딩';
$string['auth_ldap_login_settings'] = '로그인 설정하기';
$string['auth_ldap_memberattribute'] = '선택 사항 : 사용자들이 한 모둠안에 속해 있을때 사용자 멤버 속성을 덮어쓰기 합니다. 대개는 \'member\'입니다.';
$string['auth_ldap_memberattribute_isdn'] = '선택 사항 : 0 혹은 1 인  멤버 속성값 처리를 덮어쓰기 합니다.';
$string['auth_ldap_memberattribute_isdn_key'] = '사용자 속성은 dn을 사용';
$string['auth_ldap_memberattribute_key'] = '구성원 속성';
$string['auth_ldap_noconnect'] = 'LDAP모듈이 {$a} 서버에 접속하지 못했습니다.';
$string['auth_ldap_noconnect_all'] = 'LDAP모듈이 어느 {$a} 서버에도 접속하지 못했습니다.';
$string['auth_ldap_noextension'] = '<em> PHP의 LDAP 모듈이 존재하지 않는 것 같습니다. 이 인증 플러그인을 사용하려면 모듈이 설치되고 활성화되었는지를 점검하십시요.</em>';
$string['auth_ldap_no_mbstring'] = '활성화된 경로에 사용자를 생성하기 위해서는 mbstring 확장자가 필요합니다.';
$string['auth_ldapnotinstalled'] = 'LDAP인증을 사용할 수 없음. PHP의 LDAP모듈이 설치되지 않았습니다.';
$string['auth_ldap_objectclass'] = '선택 사항 : ldap_user_type에서 이름이나 사용자 찾기에 사용되는 objectClass 를 덮어쓰기 합니다. 보통은 변경시킬 필요가 없습니다.';
$string['auth_ldap_objectclass_key'] = '객체 클래스';
$string['auth_ldap_opt_deref'] = 'Aliases가 탐색 동안에 어떻게 처리되야 할지 결정하라. 다음 중 하나를 선택하라.
"아니오" (LDAP_DEREF_NEVER) 혹은
"예" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = '피참조 얼라이어스';
$string['auth_ldap_passtype'] = 'LDAP 서버에 쓰일 비밀번호 생성/변경 형식을 지정';
$string['auth_ldap_passtype_key'] = '비밀번호 형식';
$string['auth_ldap_passwdexpire_settings'] = 'LDAP 비밀번호의 만료 설정';
$string['auth_ldap_preventpassindb'] = '비밀번호 노출방지를 위해서 "무들 데이터베이스에 저장"에 대한 물음에 "예" 로 설정하라.';
$string['auth_ldap_preventpassindb_key'] = '비밀번호 숨김';
$string['auth_ldap_search_sub'] = '하위문맥에서 사용자 찾기';
$string['auth_ldap_search_sub_key'] = '하위문맥 검색';
$string['auth_ldap_server_settings'] = 'LDAP서버 설정';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() 는 선택된 사용자 유형 {$a}을 지원하지 않습니다.';
$string['auth_ldap_update_userinfo'] = 'LDAP에서 무들로 사용자의 정보를 업데이트합니다.(성, 이름, 주소 등.) 필요하다면 "데이터 매핑" 설정을 하십시요.';
$string['auth_ldap_user_attribute'] = '선택사항: 사용자의 이름/검색 속성을 덮어쓰기 합니다.(보통 \'cn\' 이다)';
$string['auth_ldap_user_attribute_key'] = '사용자 속성';
$string['auth_ldap_user_exists'] = 'LDAP에 있는 사용자명';
$string['auth_ldap_user_settings'] = '사용자 검색 설정';
$string['auth_ldap_user_type'] = '사용자가 LDAP에서 어떻게 저장되는 지를 선택하라. 또한 로그인 만기, 유예기간 로그인 및 사용자 생성 등의 방법을 지정하게 된다.';
$string['auth_ldap_user_type_key'] = '사용자 유형';
$string['auth_ldap_usertypeundefined'] = 'config.user_type 은 아직 정의되거나 선언되지 않았습니다. ldap_expirationtime2unix는 선택된 유형을 지원하지 않습니다.';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type 은 아직 정의되거나 선언되지 않았습니다. ldap_expirationtime2unix는 선택된 유형을 지원하지 않습니다.';
$string['auth_ldap_version'] = '서버가 사용하고 있는 LDAP 프로토콜 판번호';
$string['auth_ldap_version_key'] = '판번호';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'NTLM 도메인에서 싱글사인온을 하려면 예로 설정. <strong>노트:</strong> 웹서버에 추가작업이 필요합니다. <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a> 를 참조하십시요.';
$string['auth_ntlmsso_enabled_key'] = '활성화';
$string['auth_ntlmsso_ie_fastpath'] = 'NTLM SSO fast path를 활성화하려면 예로 설정(MS 익스플로어를 브라우저로 사용할 경우에만 약간의 과정 건너 뜀)';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_remoteuserformat_key'] = '원격 사용자 이름 형식';
$string['auth_ntlmsso_subnet'] = '설정되면 이 서브넷에 있는 클라이언트에 대해 SSO를 시도합니다.  포맷: xxx.xxx.xxx.xxx/bitmask. 다중 서브넷은 콤마 (,)로 분리하세요.';
$string['auth_ntlmsso_subnet_key'] = '서브넷';
$string['auth_ntlmsso_type'] = '웹 서버에서 사용자 인증을 받기 위해 설정한 인증 방법(잘 모르겠으면, NTLM을 선택)';
$string['auth_ntlmsso_type_key'] = '인증 형식';
$string['connectingldap'] = 'LDAP서버에 접속 중...';
$string['creatingtemptable'] = '임시 테이블 {$a} 생성';
$string['didntfindexpiretime'] = 'password_expire() 가 만료시간을 찾을 수 없습니다.';
$string['didntgetusersfromldap'] = 'LDAP에서 아무 사용자도 가져올 수 없습니다. - 오류? - 나옵니다.';
$string['gotcountrecordsfromldap'] = 'LDAP에서 {$a} 레코드 가져옴';
$string['morethanoneuser'] = '이상합니다. LDAP에서 한사람 이상에 대한 기록이 발견되었습니다. 처음 것을 사용합니다.';
$string['needbcmath'] = '액티브 디렉토리에서 그레이스 로그인을 사용하려면 BCMath  익스텐션이 필요합니다.';
$string['needmbstring'] = '액티브 디렉토리에서 암호를 변경하려면 mbstring  익스텐션이 필요합니다.';
$string['nodnforusername'] = 'user_update_password() 에서 오류. {$a->username}에 대해 DN이 없습니다.';
$string['noemail'] = '이메일 발송 실패';
$string['notcalledfromserver'] = '웹서버에서 호출되어서는 안됩니다.';
$string['noupdatestobedone'] = '수행될 업데이트 없음';
$string['nouserentriestoremove'] = '사용자 기록이 제거되지 않음';
$string['nouserentriestorevive'] = '사용자 기록이 되살려지지 않음';
$string['nouserstobeadded'] = '사용자 추가되지 않음';
$string['ntlmsso_attempting'] = 'NTLM을 통한 싱글사인온 시도';
$string['ntlmsso_failed'] = '자동 로그인 실패, 일반 로그인을 시도하세요.';
$string['ntlmsso_isdisabled'] = 'NTLM SSO가 비활성화되어 있습니다.';
$string['ntlmsso_unknowntype'] = '알 수 없는 ntlmsso 형식!';
$string['pagesize_key'] = '페이지 크기';
$string['pluginname'] = 'LDAP서버의 사용';
$string['pluginnotenabled'] = '플러그인을 쓸 수 없음!';
$string['renamingnotallowed'] = 'LDAP에서는 이름변경이 허용되지 않음';
$string['rootdseerror'] = '액티브 디렉토리에서 rootDSE 쿼리 실패';
$string['updatepasserror'] = 'user_update_password() 에서 오류. 오류 코드: {$a->errno};오류 문자열: {$a->errstring}';
$string['updatepasserrorexpire'] = '암호 만료시간을 읽는 중에 user_update_password()에서 오류. 오류 코드: {$a->errno}; 오류 문자열: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = '만료시간을 수정하는 도중 혹은 그레이스 로그인 할때 user_update_password() 에서 오류. 오류 코드: {$a->errno}; 오류 문자열: {$a->errstring}';
$string['updateremfail'] = 'LDAP 레코드 업데이트 오류. 오류 코드: {$a->errno}; 오류 문자열: {$a->errstring}<br/>Key ({$a->key}) - 예전 무들 값: \'{$a->ouvalue}\' 새로운 값: \'{$a->nuvalue}\'';
$string['updateremfailamb'] = '불명확한 필드  {$a->key} 로 LDAP 업데이트 실패 ; 예전 무들 값: \'{$a->ouvalue}\', 새로운 값: \'{$a->nuvalue}\'';
$string['updateusernotfound'] = '외부에서 업데이트하는 중에 사용자를 찾을 수 없습니다. 검색 베이스: \'{$a->userdn}\'; 검색 필터 filter: \'(objectClass=*)\'; 검색 속성: {$a->attribs}';
$string['useracctctrlerror'] = '{$a}에 대해 userAccountControl 를 얻는데 오류';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() 는 선택된 사용자 유형 {$a}을 지원하지 않습니다.';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() 는 선택된 사용자 유형 {$a}을 지원하지 않습니다.';
$string['userentriestoadd'] = '사용자 기록 추가됨: {$a}';
$string['userentriestoremove'] = '사용자 기록 삭제됨: {$a}';
$string['userentriestorevive'] = '사용자 기록 되살려짐: {$a}';
$string['userentriestoupdate'] = '업데이트 될 사용자 항목: {$a}';
$string['usernotfound'] = 'LDAP에 없음';
