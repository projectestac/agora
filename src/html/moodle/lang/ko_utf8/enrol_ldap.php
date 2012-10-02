<?PHP // $Id$ 
      // enrol_ldap.php - created with Moodle 2.0 dev (2007101508)


$string['description'] = '<p>LDAP서버를 이용하여 당신은 등록자를 관리할 수 있습니다. LDAP목차는 과목 내용(map)의 모둠을 포함하고 있고, 각각의 모둠/강좌는 학생용 내용(mpa)의 회원제 접속허가를 가지고 있다고 가정할 수 있다.<p>
<p>또한 각 강좌는 LDAP의 구분에 의하여 나누어지고 각 모둠은 여러 개의 활동영역(<em>member</em> 혹은 <em>memberUid</em>)을 가지게 된다 그것은 각 유저마다 서로 다른 ID를 가지게 한다.</p>
<p>LDAP등록을 이용하려면 사용자들은 <strong>꼭!</strong> 유효한 ID값을 가지고 있어야 한다. 
또한 LDAP모둠은 과목으로의 등록을 위해서 각 사용자의 영역에 맞는 ID값을 가지고 있어야 한다. 
만약 LDAP 인증을 사용하고 있다면 이러한 것들은 잘 작동될것이다.</p>
<p>등록은 사용자가 로그인할때 업데이트 된다.
또한 등록 서류를 싱크시키기 위해서 스크립트를 사용할수도 있다. 
다음 파일을 참고 하라 <em>enrol/ldap/enrol_ldap_sync.php</em></p>
<p>이 플러그인은 새 모둠이 LDAP에 등록되면 자동적으로 새 강좌를 생성하도록 설정될 수 있다.</p>';
$string['enrol_ldap_autocreate'] = '만일 무들에 없는 강좌가 등록되면 자동으로 그 강좌를 생성할 것이다.';
$string['enrol_ldap_autocreation_settings'] = '강좌 자동 생성 설정';
$string['enrol_ldap_bind_dn'] = '만일 각 사용자를 찾기 위해 bind-user를 사용하고 싶다면 다음과 같이 설정하십시오. 예: \'cn=ldapuser,ou=public,o=org\'';
$string['enrol_ldap_bind_pw'] = 'bind-user를 위한 패스워드';
$string['enrol_ldap_category'] = '자동 생성된 강좌의 범주';
$string['enrol_ldap_contexts'] = 'LDAP 컨텍스트';
$string['enrol_ldap_course_fullname'] = '선택 사항: 전체이름을 위한 LDAP 필드';
$string['enrol_ldap_course_idnumber'] = 'LDAP에서의 서로다른 식별자를 위한 맵, 대부분
<em>cn</em>나 <em>uid</em>. 만일 자동 강좌 생성기능을 사용하면 값을 수정하지 못하도록 해 놓기 바랍니다.';
$string['enrol_ldap_course_settings'] = '강좌 등록 설정';
$string['enrol_ldap_course_shortname'] = '선택 사항: 짧은 이름을 위한 LDAP 필드';
$string['enrol_ldap_course_summary'] = '선택 사항: 요약을 위한 LDAP 필드';
$string['enrol_ldap_editlock'] = '값수정 잠금';
$string['enrol_ldap_general_options'] = '기본 옵션';
$string['enrol_ldap_host_url'] = 'URL에 속한 LDAP 호스트 지정 - LDAP호스트 값을 다음과 같이 입력하시오
\'ldap://ldap.myorg.com/\' 혹은 \'ldaps://ldap.myorg.com/\'';
$string['enrol_ldap_memberattribute'] = 'LDAP 구성원 속성';
$string['enrol_ldap_objectclass'] = '강좌 검색에 쓰인 objectClass. 일반적으로 \'posixGroup\'';
$string['enrol_ldap_roles'] = '역할 배치';
$string['enrol_ldap_search_sub'] = '하부 컨텍스트에서 모둠 구성원 찾기';
$string['enrol_ldap_server_settings'] = 'LDAP 서버 설정';
$string['enrol_ldap_student_contexts'] = '모둠과 학생들의 등록서류가 있는 곳의 내용 목록. 다음과 같이 \';\'으로 구분하여 적는다. 예를 들어: 
\'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = '학생들이 (등록 후) 모둠에 속해 있을 때의 회원 속성,  
대부분 \'member\'나 \'memberUid\'';
$string['enrol_ldap_student_settings'] = '학생 등록 설정';
$string['enrol_ldap_teacher_contexts'] = '모둠과 선생들의 등록 서류가 있는 곳의 내용 목록.다음과 같이 \';\'으로 구분하여 적는다. 예를 들어: 
\'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = '교수자가 (등록 후) 모둠에 속해 있을 때의 회원 속성,  
대부분 \'member\'나 \'memberUid\'';
$string['enrol_ldap_teacher_settings'] = '교수자 등록 설정';
$string['enrol_ldap_template'] = '선택 사항: 자동 생성 강좌는 그들의 설정값을 템플릿  강좌에서 가져올 수 있다.';
$string['enrol_ldap_updatelocal'] = '현지 자료 갱신';
$string['enrol_ldap_version'] = '서버가 사용하고 있는 LDAP 프로토콜의 버젼';
$string['enrolname'] = 'LDAP';

?>
