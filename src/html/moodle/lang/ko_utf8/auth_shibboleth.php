<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_shib_auth_method'] = 'Shibboleth 인증 명칭';
$string['auth_shib_auth_method_description'] = '사용자들이 익숙하게 쓸 수 있는 Shibboleth 인증 명칭을 제시. 이는 <tt>SWITCHaai Login</tt> 혹은 <tt>InCommon Login</tt>처럼 여러분의 Shibboleth 연맹의 명칭으로 여겨집니다.';
$string['auth_shib_changepasswordurl'] = '암호 변경 URL';
$string['auth_shib_convert_data'] = '자료 변경 API';
$string['auth_shib_convert_data_description'] = '추후 암호에 의해 제공된 데이터를 변경하기 위해 이 API를 사용할 수 있다. 좀 더 많은 규정을 위해
<a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a> 을 읽어보라.';
$string['auth_shib_convert_data_warning'] = '파일이 존재하지 않거나 서버가 파일을 읽을 수 없습니다!';
$string['auth_shib_idp_list'] = '제공자 색인';
$string['auth_shib_idp_list_description'] = '사용자들이 로그인 화면에서 선택할 수 있게 제공자의 entityID 목록들을 적어 놓아라.<br />각 줄에는 IdP의 entityID(쉽볼렛 메타데이터 파일 참조)와 드롭다운 목록에서 살펴볼 수 있게 IdP의 명칭을 쉼표로 구분하여 적어야 한다.<br />또한 무들 설치시 복합 인증 설정에 사용할 쉽볼렛 세션 구동기의 위치를 선택적으로 추가할 수 있다.';
$string['auth_shib_instructions'] = '만약 여러분의 기관이 Shibboleth를 지원한다면 <a href=\"$a\"> Shibboleth 로그인 </a>을 사용하라.<br />그렇지 않으면 여기 있는 정상적인 로그인 형식을 사용하라.';
$string['auth_shib_instructions_help'] = '여기에 Shibboleth를 설명하기 위한 안내문을 제공하여야 한다. 이는 안내 영역에 있는 로그인 화면에 나타날 것이다. 설명서에는 사용자가 로그인을 원할 때 클릭할 수 있는 \"<b>$a</b>\"링크를  포함하여야만 한다.';
$string['auth_shib_integrated_wayf'] = '무들 WAYF 서비스';
$string['auth_shib_integrated_wayf_description'] = '이를 켜 놓으면, 무들은 Shibboleth 설정 대신 자체 WAYF 서비스를 이용한다. 무들은 사용자들이 자신을 인증해 줄 제공자를 선택할 수 있도록 대체 로그인 화면을 드롭다운 창으로 제시할 것이다.';
$string['auth_shib_logout_return_url'] = '대체 로그아웃 URL';
$string['auth_shib_logout_return_url_description'] = '쉽볼렛 사용자가 로그아웃을 한 후 연결될 URL을 입력하라.<br />이 곳이 비어있게되면 사용자들은 무들이 지정한 곳으로 연결되게 된다.';
$string['auth_shib_logout_url'] = 'Shibboleth 서비스 인증자 로그아웃 핸들러 URL';
$string['auth_shib_logout_url_description'] = 'Shibboleth 서비스 인증자의 로그아웃 핸들러 URL을 적는다. 전형적으로 <tt>/Shibboleth.sso/Logout</tt>의 형태를 지닌다.';
$string['auth_shib_no_organizations_warning'] = '통합된 WAYF 서비스를 이용하려면, 반드시 제공자의 entityID, 이름 및 부가적인 세션 이니시에이터 목록을 컴마로 구분해 제공해야 한다.';
$string['auth_shib_only'] = 'Shibboleth만';
$string['auth_shib_only_description'] = '만약 Shibboleth 인증이 강요된다면 이 옵션을 체크하십시오.';
$string['auth_shib_username_description'] = '모듈 사용자 이름으로 사용되어야 하는 다양한 웹서버 암호 환경의 이름을 지어라.';
$string['auth_shibboleth_contact_administrator'] = '제공된 기관에 소속되어 있지 않을 경우 이 서버를 통해 강좌에 접속해야 할 필요가 있으며 다음의 관리자에게 연락하기 바란다 :';
$string['auth_shibboleth_errormsg'] = '다음에서 자신이 소속되어 있는 기관을 선택하라!';
$string['auth_shibboleth_login'] = 'Shibboleth 로그인';
$string['auth_shibboleth_login_long'] = 'Shibboleth를 통한 무들 로그인';
$string['auth_shibboleth_manual_login'] = '수동 로그인';
$string['auth_shibboleth_select_member'] = '내 소속 기관은 ...';
$string['auth_shibboleth_select_organization'] = 'Shibboleth로 인증을 받으려면 다음 펼침목록에서 소속 기관을 선택하라:';
$string['auth_shibbolethdescription'] = '이 방법을 사용하는 사용자는 <a href=\"http://shibboleth.internet2.edu/\" target=\"_blank\">Shibboleth</a>에 의해 생성되고 인증을 받은 사람들이다. 
<br>Shibboleth를 이용하여 무들을 설정하는 방법은 <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a>를 읽어보기 바란다.';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Shibboleth인증을 쓰는 것 같습니다만, 무들은 사용자 속성을 전달받지 못했습니다. 필요한 속성($a)을 무들 서비스 제공자 혹은 이 서버의 웹관리자에게 전달하였는지를 점검하여 주시기 바랍니다.';
$string['shib_not_all_attributes_error'] = '무들은 당신의 경우와 같은 사례를 처리하기 위해서 다음과 같은 Shibboleth 속성이 필요합니다. $a <br />웹관리자나 인증제공자에게 문의하시기 바랍니다.';
$string['shib_not_set_up_error'] = '화면에 아무런 Shibboleth 환경 변수가 없는 것으로 보아 인증 환경이 제대로 설정되지 않은 것 같습니다. Shibboleth 인증을 설정하기 위한 자세한 내용은 <a href=\"README.txt\">README</a>를 참고하거나 무들 관리자에게 연락하기 바랍니다.';