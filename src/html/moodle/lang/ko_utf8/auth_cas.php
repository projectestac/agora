<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = '인증서 선택';
$string['accesCAS'] = 'CAS 사용자';
$string['accesNOCAS'] = '기타 사용자';
$string['auth_cas_auth_user_create'] = '외부 사용자 생성';
$string['auth_cas_baseuri'] = '서버의 URI (기반 uri가 없는 것) 
<br /> 예를 들면, 만약 CAS 서버가 
host.domaine.fr/CAS/에 응답한다면 
<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = '기반 URI';
$string['auth_cas_broken_password'] = '비밀번호 변경없이는 계속할 수 없습니다만, 비밀번호를 바꿀 방법이 없습니다. 무들 관리자에게 연락하기 바랍니다.';
$string['auth_cas_cantconnect'] = 'CAS모듈의 LDAP 부분만으로는 $a 서버에 연결할 수 없습니다.';
$string['auth_cas_casversion'] = '판번호';
$string['auth_cas_changepasswordurl'] = '암호변경 URL';
$string['auth_cas_create_user'] = '만약 CAS인증을 득한 사용자를 무들 데이터베이스에 삽입하고 싶다면 이 기능을 켜기 바란다. 그렇게 하지 않으면 기존 무들 데이터베이스에 존재하는 사용자만이  로그인 할 수 있다.';
$string['auth_cas_create_user_key'] = '사용자 생성';
$string['auth_cas_enabled'] = 'CAS인증을 사용하기 원한다면 이것을 켜십시오.';
$string['auth_cas_hostname'] = 'CAS서버의 호스트네임 <br />예: host.domain.fr';
$string['auth_cas_hostname_key'] = '호스트명';
$string['auth_cas_invalidcaslogin'] = '죄송합니다. 로그인 실패 - 당신은 인증받지 못했습니다.';
$string['auth_cas_language'] = '선택된 언어';
$string['auth_cas_language_key'] = '언어';
$string['auth_cas_logincas'] = '보안 연결 접속';
$string['auth_cas_logoutcas'] = '무들을 끝낼 때 CAS에서 로그아웃하려면 이 난을 \'예\'로 하시오';
$string['auth_cas_logoutcas_key'] = 'CAS 로그아웃';
$string['auth_cas_multiauth'] = '다중 인증(CAS+기타 인증)을 하려면 이 난을 \'예\'로 하시오';
$string['auth_cas_multiauth_key'] = '다중 인증';
$string['auth_cas_port'] = 'CAS서버의 포트';
$string['auth_cas_port_key'] = '포트';
$string['auth_cas_proxycas'] = '프록시 모드에서 CAS를 사용하려면 이 난을 \'예\'로 하시오';
$string['auth_cas_proxycas_key'] = '프록시 모드';
$string['auth_cas_server_settings'] = 'CAS서버 설정';
$string['auth_cas_text'] = '보안 연결';
$string['auth_cas_use_cas'] = 'CAS 사용';
$string['auth_cas_version'] = 'CAS의 판번호';
$string['auth_casdescription'] = '이 방법은 간편 사용자 인증(SSO)하에서 사용자를 인증하기 위해 CAS서버(중앙인증서비스)를 사용한다. 또한 단순한 LDAP인증을 사용할 수도 있다. 만약 주어진 사용자 이름과 비밀 번호가 CAS에 따라 근거가 확실하다면, 무들은 그것의 데이터베이스에서 새로운 사용자 엔트리를 만들고, 만약 요청이 있으면 LDAP로부터 사용자 속성을 가져온다. 그 후 로그인과정에서는 단지 사용자 이름과 비밀번호만 점검된다.';
$string['auth_casnotinstalled'] = 'CAS인증을 사용할 수 없음. PHP의 LDAP모듈이 장착되지 않았음.';
$string['auth_castitle'] = 'CAS서버(SSO) 사용';