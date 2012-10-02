<?PHP // $Id: report_security.php,v 1.10 2009/12/14 09:18:47 mudrd8mz Exp $ 
      // report_security.php - created with Moodle 2.0 dev (Build: 20090221) (2009021800)


$string['check_configrw_details'] = '<p>웹 서버에 의해 config.php 파일이 변조되는 것을 막기 위해 설치 후 이 파일의 읽고쓰기 권한을 변경시켜 둘 것을 권장. 다만 이러한 조치가 특별히 서버의 보안을 증진시킨다는 것이 아니라, 외부의 침탈 의도를 저하시키거나 부분적으로 제한할 수 있다는 사실을 주목하기 바랍니다.</p>';
$string['check_configrw_name'] = 'config.php 쓰기 가능';
$string['check_configrw_ok'] = 'PHP스크립트로 config.php 수정 불가';
$string['check_configrw_warning'] = 'PHP스크립트로 config.php 수정 가능';
$string['check_cookiesecure_details'] = '<p>https를 통한 통신을 활성화했다면 보안쿠키도 활성화해 놓는 것이 바람직 하다. 또한 영구적으로 http에서 https로 경로변경을 해 놓아야만 할 것이다.</p>';
$string['check_cookiesecure_error'] = '보안 쿠키를 활성화하시오';
$string['check_cookiesecure_name'] = '보안 쿠키';
$string['check_cookiesecure_ok'] = '보안 쿠키 활성';
$string['check_courserole_anything'] = '본 <a href=\"$a\">영역</a>에서는 시스템관리 권한이 허용되어서는 안됨';
$string['check_courserole_details'] = '<p>각 강좌별로 하나의 기본 등록 역할을 지정해야 함. 이 역할에 위험부담이 있는 권한이 주어지지 않도록 주의 요망</p>
<p>강좌의 기본 역할에 통상적으로 지원되는 유형은 <em>학생</em>임.</p>';
$string['check_courserole_error'] = '잘못 정의된 강좌의 기본 역할이 발견되었음!';
$string['check_courserole_name'] = '강좌의 기본 역할';
$string['check_courserole_notyet'] = '사용된 기본강좌 역할';
$string['check_courserole_ok'] = '강좌의 기본 역할 점검 통과';
$string['check_courserole_risky'] = '<a href=\"$a\">영역</a>에서 위험한 권한 부여 발견';
$string['check_courserole_riskylegacy'] = '<a href=\"$a->url\">$a->shortname</a>에서 위험성이 있는 정규 역할 유형이 검출됨';
$string['check_defaultcourserole_anything'] = '이 <a href=\"$a\">영역</a>에서는 사이트의 전권을 부여할 수 없음';
$string['check_defaultcourserole_details'] = '<p>강좌 등록 후 학생의 역할은 강좌의 기본으로 지정되어 있음. 따라서 이 역할에 위험 소지가 있는 권한을 부여하지 않토록 하기 바람.</p>
<p>지원하는 정규 기본 역할은 <em>학생</em>임</p>';
$string['check_defaultcourserole_error'] = '기본강좌 역할 정의에서 잘못된 역할  \"$a\" 발견!';
$string['check_defaultcourserole_legacy'] = '지원되지 않는 유형이 발견됨';
$string['check_defaultcourserole_name'] = '총괄 기본 강좌 역활';
$string['check_defaultcourserole_notset'] = '기본 역활이 설정되지 않음';
$string['check_defaultcourserole_ok'] = '총괄 기본역활 정의 통과';
$string['check_defaultcourserole_risky'] = '<a href=\"$a\">영역</a>에서 위험한 권한 부여 발견됨';
$string['check_defaultuserrole_details'] = '<p>모든 로그인 사용자에게 허용된 권한은 기본 사용자 역할임. 따라서 이 역할에 위험 소지가 있는 권한을 부여하지 않토록 하기 바람.</p>
<p>기본 사용자 역할을 지원하는 정규 기본 역할은 <em>인증된 사용자</em>임. 강좌를 볼 수 있는 권한은 허용하면 안됨</p>';
$string['check_defaultuserrole_error'] = '잘못 정의된 기본 사용자 역할 \"$a\" 발견됨!';
$string['check_defaultuserrole_name'] = '등록된 사용자 역할';
$string['check_defaultuserrole_notset'] = '기본 역할이 설정되지 않음';
$string['check_defaultuserrole_ok'] = '등록 사용자 역할 정의 통과';
$string['check_displayerrors_details'] = '<p>상용 사이트에서 PHP의 <code>display_errors</code> 설정을 켜 놓는 것은  운영하는 서버의 취약한 부분을 노출시킬 수 있기 때문에 권장하지 않음</p>';
$string['check_displayerrors_error'] = 'PHP 오류 표시가 활성화 됨. PHP설정에서 오류표시를 하지 않도록 설정할 것을 권고함';
$string['check_displayerrors_name'] = 'PHP 오류 표시';
$string['check_displayerrors_ok'] = 'PHP 오류 표시 않함';
$string['check_emailchangeconfirmation_details'] = '<p>사용자 신상 명세에서 자신의 e-mail 주소를 변경할 경우 이메일 검증을 요구하는 것은 바람직함. 만약 이를 하지않을 경우 스패머가 이를 악용할 소지가 있음</p>';
$string['check_emailchangeconfirmation_error'] = '사용자는 어떤 이메일 주소라도 입력할 수 있음';
$string['check_emailchangeconfirmation_info'] = '사용자는 허용된 도메인의 이메일 주소만 입력할 수 있음';
$string['check_emailchangeconfirmation_name'] = '이메일 변경 확인';
$string['check_emailchangeconfirmation_ok'] = '이메일 변경은 반드시 인증을 받아야 함';
$string['check_embed_details'] = '<p>무제한 객체 탑재를 허용하는 것은 매우 위험 - 등록한 어떤 사용자라도 서버내 타 사용자를 공격할 수 있는 XSS를 올릴 수 있기 때문이다. 상용 서버에서는 이를 꺼 두기 바란다.</p>';
$string['check_embed_error'] = '무제한 객체 탑재를 허용 - 이는 대다수 서버에 매우 위험한 설정이다.';
$string['check_embed_name'] = 'EMBED 및 OBJECT 허용';
$string['check_embed_ok'] = '무제한 객체 탑재는 허용되지 않음';
$string['check_frontpagerole_details'] = '<p>대문화면에서의 역할은 모든 등록 사용자에게 주어집니다. 따라서 이 역할에 위험 소지가 있는 권한은 부여하지 말기 바람.</p>
<p>목적에 부합하는 특수 역할만을 생성하고 여타 정규 유형은 설정하지 말 것</p>';
$string['check_frontpagerole_error'] = '잘못 정의된 대문화면 역할 \"$a\" 발견됨!';
$string['check_frontpagerole_name'] = '대문화면 역할';
$string['check_frontpagerole_notset'] = '대문화면 역할이 설정되지 않음';
$string['check_frontpagerole_ok'] = '대문화면 역활 정의 통과';
$string['check_globals_details'] = '<p>PHP의 Register globals를 켜놓을 별다른 이유가 없기 때문에 이를 설정할 때는 위험을 감수할 각오를 해야 할 것이다. 무들은 register global과 호환되지 않는다.</p>
<p>반드시 PHP 설정을 <code>register_globals=off</code>으로 해야 한다. 이는 Apache/IIS 설정 혹은 <code>.htaccess</code> 파일을 수정하거나, 직접 <code>php.ini</code>파일을 편집하여 설정할 수 있다. </p>';
$string['check_globals_error'] = 'Register globals를 반드시 꺼 놓으시오. 즉시 서버의 PHP 설정을 수정하기 바람!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Register globals가 꺼져 있음(정상)';
$string['check_google_details'] = '<p>구글에 대한 개방 설정은 검색엔진으로 손님이 강좌를 검색하는 데 도움을 줄 수 있다. 다만 이 설정이 손님 접속을 허용하지 않았을 때도 이를 무조건 허용한다는 것은 아님을 유념하기 바란다.</p>';
$string['check_google_error'] = '검색엔진의 손님자격 접속 및 손님 접속 금지';
$string['check_google_info'] = '검색엔진이 손님 자격으로 들어올 수 있음';
$string['check_google_name'] = '구글에 개방';
$string['check_google_ok'] = '검색엔진의 손님자격 접속 불가';
$string['check_guestrole_details'] = '<p>손님 역할은 통상 로그인 하지 않은 일시적인 강좌 방문객에게 부여되는 것이다. 이 역할에 위험부담이 있는 권한을 부여하지 않도록 유의하기 바란다.</p>
<p>손님 역할을 지원하는 정규 기본 역할은 <em>손님</em>임.</p>';
$string['check_guestrole_error'] = '잘못 정의된 방문객 역할 \"$a\" 발견됨!';
$string['check_guestrole_name'] = '손님 역할';
$string['check_guestrole_notset'] = '손님 역할이 설정되지 않음';
$string['check_guestrole_ok'] = '손님 역활 정의 통과';
$string['check_mediafilterswf_details'] = '<p>자동 swf 내장 프로그램은 매우 위험합니다. 임의의 등록 사용자가 타 서버의 사용자를 공격하기 위해 XSS 프로그램을 탑재할 우려가 있습니다. 상용 서버에서는 이를 꺼 두기 바랍니다.</p>';
$string['check_mediafilterswf_error'] = '플래시 미디어 필터 켜짐 - 이는 대다수 서버에 위해를 가할 수 있음';
$string['check_mediafilterswf_name'] = '.swf 필터 켬';
$string['check_mediafilterswf_ok'] = '플래시 미디어 필터 끔';
$string['check_noauth_details'] = '<p><em>인증절차 생략</em>플러그인은 어떠한 상용 서버에서건 추천하지 않음. 본 서버가 개발 사이트가 아닌이상 이를 꺼 두기 바람</p>';
$string['check_noauth_error'] = '상용 서버에서는 인증 절차 생략 플러그인이 사용될 수 없음';
$string['check_noauth_name'] = '인증절차 생략';
$string['check_noauth_ok'] = '인증절차 생략 플러그인 끔';
$string['check_openprofiles_details'] = '<p>공개된 사용자 신상명세는 간혹 스패머에 의해 오용될 소지가 있으므로, 신상명세를 보기 위해서는 <code>신상명세 보려면 로그인 필수</code> 나 <code>로그인 강요</code>를 켜 둘 것을 권고합니다.</p>';
$string['check_openprofiles_error'] = '로그인 없이 사용자 신상명세 볼 수 있음';
$string['check_openprofiles_name'] = '사용자 신상명세 공개';
$string['check_openprofiles_ok'] = '사용자 신상명세를 보기위해 로그인이 필요함';
$string['check_passwordpolicy_details'] = '<p>종종 가장 손쉬운 방법인 암호 추정을 통해 무단 접속이 이루어질 수 있으므로 가급적 비밀번호 정책을 켜 둘것을 권장합니다. 하지만 너무 엄격하게 이를 요구하게 되면 사용자가 비밀번호를 기억하지 못하거나 적어 두었다 하더라도 자주 까먹게 되므로 적당한 수준을 제시하는 것이 바람직하다.</p>';
$string['check_passwordpolicy_error'] = '비밀번호 정책이 설정되지 않음';
$string['check_passwordpolicy_name'] = '비밀번호 정책';
$string['check_passwordpolicy_ok'] = '비밀번호 정책 활성화';
$string['check_riskadmin_detailsok'] = '<p>다음의 관리자 목록을 확인하기 바람<br />$a</p>';
$string['check_riskadmin_detailswarning'] = '<p>다음의 관리자 목록을 확인하기 바람<br />$a->admins</p>
<p>단지 시스템 영역의 관리자 역할만을 부여할 것을 권장함. 다음의 사용자들은 지원되지 않는 관리자 역할을 부여받았음 <br />$a->unsupported</p>';
$string['check_riskadmin_name'] = '관리자';
$string['check_riskadmin_ok'] = '$a 서버 관리자 발견';
$string['check_riskadmin_unassign'] = '<a href=\"$a->url\">$a->fullname ($a->email) 직능 검토</a>';
$string['check_riskadmin_warning'] = '$a->admincount 서버 관리자 및  $a->unsupcount 의 지원되지 않는 관리자 역할 부여 발견';
$string['check_riskxss_details'] = '<p>인증된 사용자들에게 부여된 모든 위험성이 있는 권한에 대해서는 RISK_XSS 표식을 함. </p>
<p>다음 사용자에 대해서는 본 서버에서 완벽하게 신뢰할 수 있는지 검증해 보기 바람:<br />$a </p>';
$string['check_riskxss_name'] = 'XSS 인증된 사용자';
$string['check_riskxss_warning'] = 'RISK_XSS - 검증할 $a 사용자 발견';
$string['check_unsecuredataroot_details'] = '<p>데이터 경로는 웹으로 접속되어서는 안됨. 최선의 방법은 웹 디렉토리 외부에 있는 웹접속이 차단된 경로에 만들어 두는 것임</p>
<p>경로를 옮긴 후, <code>config.php</code>의 <code>\$CFG->dataroot</code>의 값도 변경해 주어야 함을 잊지 말 것</p>';
$string['check_unsecuredataroot_error'] = '데이터 경로 <code>$a</code> 가 잘 못 지정되어 있으며 웹에 노출되어 있음!';
$string['check_unsecuredataroot_name'] = '데이터 경로 보안 취약';
$string['check_unsecuredataroot_ok'] = '데이터 경로는 웹으로 접속할 수 없어야만 함';
$string['check_unsecuredataroot_warning'] = '데이터 경로 <code>$a</code> 가 잘 못 지정되어 있으며 웹에 노출될 가능성이 있음';
$string['configuration'] = '설정';
$string['description'] = '설명';
$string['details'] = '세부사항';
$string['issue'] = '이슈';
$string['reportsecurity'] = '보안 개요';
$string['security:view'] = '보안 보고 보기';
$string['status'] = '상태';
$string['statuscritical'] = '치명적';
$string['statusinfo'] = '알림';
$string['statusok'] = '통과';
$string['statusserious'] = '심각';
$string['statuswarning'] = '경고';
$string['timewarning'] = '자료처리에 시간이 좀 걸립니다. 기다려 주십시오...';
$string['check_courserole_legacy'] = '지원하지 않는 형식이 <a href=\"$a\">역할</a>에서 발견됨'; // ORPHANED

?>
