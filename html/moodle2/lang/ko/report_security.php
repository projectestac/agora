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
 * Strings for component 'report_security', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>웹 서버에 의해 config.php 파일이 변조되는 것을 막기 위해 설치 후 이 파일의 권한을 변경시켜 둘 것을 권장합니다. 다만 이러한 조치가 특별히 서버의 보안을 증진시키는 것은 아니며, 서버를 느리게 하거나 일반적인 활용에 제한을 줄 수 있음을 유념하십시요.</p>';
$string['check_configrw_name'] = 'config.php 쓰기 가능';
$string['check_configrw_ok'] = 'PHP스크립트로 config.php 수정 불가';
$string['check_configrw_warning'] = 'PHP스크립트로 config.php 수정 가능';
$string['check_cookiesecure_details'] = '<p>https를 통한 통신을 활성화했다면 보안쿠키도 활성화해 놓는 것이 바람직 합니다. 또한 영구적으로 http에서 https로 경로변경을 해 놓아야만 할 것입니다.</p>';
$string['check_cookiesecure_error'] = '보안 쿠키를 활성화하시오';
$string['check_cookiesecure_name'] = '보안 쿠키';
$string['check_cookiesecure_ok'] = '보안 쿠키 활성';
$string['check_defaultuserrole_details'] = '<p>모든 로그인 사용자들은 기본 사용자 역할에 대한 능력을 부여 받습니다. 이 역할에 위험 소지가 있는 능력을 부여하지 않토록 하십시요.</p>
<p>기본 사용자 역할을 지원하는 전통적 유형은 <em>인증된 사용자</em>입니다. 강좌를 볼 수 있는 능력은 활성화되면 안됩니다.</p>';
$string['check_defaultuserrole_error'] = '기본 사용자 역할 "{$a}" 이 잘못 정의되었습니다!';
$string['check_defaultuserrole_name'] = '모든 사용자에게 기본 역할';
$string['check_defaultuserrole_notset'] = '기본 역할이 설정되지 않음';
$string['check_defaultuserrole_ok'] = '모든 사용자에 대한 기본 역할 정의는 맞습니다';
$string['check_displayerrors_details'] = '<p>실제 운영하는 사이트에서 PHP의 <code>display_errors</code> 설정을 활성화하는 것은  운영하는 서버의 민감한 부분을 노출시킬 수 있기 때문에 권장하지 않습니다.</p>';
$string['check_displayerrors_error'] = '오류표시 PHP 설정이 활성화 되어 있습니다. 이것을 비활성화 시키는 것을 추천합니다.';
$string['check_displayerrors_name'] = 'PHP 오류 표시';
$string['check_displayerrors_ok'] = 'PHP 오류 표시 않함';
$string['check_emailchangeconfirmation_details'] = '<p>사용자 개인정보에서 자신의 e-mail 주소를 변경할 경우 이메일 확인 단계를 요구하는 것을 추천합니다. 만약 비활성화되어 있으면 스패머가 서버를 이용하여 스팸을 보내고자 할 수 있습니다</p>
<p> 이메일 항목은 인증 플러그인으로 부터 잠길 수도 있습니다. 이런 가능성은 여기서 고려되지 않습니다.';
$string['check_emailchangeconfirmation_error'] = '사용자는 어떤 이메일 주소라도 입력할 수 있음';
$string['check_emailchangeconfirmation_info'] = '사용자는 허용된 도메인의 이메일 주소만 입력할 수 있음';
$string['check_emailchangeconfirmation_name'] = '이메일 변경 확인';
$string['check_emailchangeconfirmation_ok'] = '사용자 개인정보에서 이메일 주소 변경 확인';
$string['check_embed_details'] = '<p>무제한 객체 탑재를 허용하는 것은 매우 위험합니다. - 등록한 어떤 사용자라도 서버내 타 사용자를 공격할 수 있는 XSS를 올릴 수 있기 때문입니다. 실제 운용중인 서버에서는 이를 비활성화 해 두십시요.</p>';
$string['check_embed_error'] = '무제한 객체 탑재가 허용되었습니다. - 이는 대다수 서버에 매우 위험한 설정입니다.';
$string['check_embed_name'] = 'EMBED 및 OBJECT 허용';
$string['check_embed_ok'] = '무제한 객체 탑재는 허용되지 않습니다.';
$string['check_frontpagerole_details'] = '<p>기본 시작 페이지에서의 역할은 모든 등록 사용자에게 시작페이지 활동을 위해 주어집니다. 이 역할에 위험 소지가 있는 권한은 부여하지 말기 바랍니다.</p>
<p>이 목적에 부합하는 특수 역할을 생성하고 예전 유형의 역할은 사용하지 않기를 추천합니다.</p>';
$string['check_frontpagerole_error'] = '잘못 정의된 시작 페이지 역할 "{$a}" 발견됨!';
$string['check_frontpagerole_name'] = '시작 페이지 역할';
$string['check_frontpagerole_notset'] = '시작 페이지 역할이 설정되지 않음';
$string['check_frontpagerole_ok'] = '시작 페이지 역활 정의는 맞습니다.';
$string['check_globals_details'] = '<p>PHP의 Register globals은 매우 위험함 PHP  설정으로 간주됩니다.</p>
<p>반드시 PHP 설정을 <code>register_globals=off</code>으로 해야 합니다. 이 설정은 Apache/IIS 구성 혹은 <code>.htaccess</code> 파일을 수정하거나, 직접 <code>php.ini</code>파일을 편집하여 설정할 수 있습니다. </p>';
$string['check_globals_error'] = 'Register globals은 비활성화 되어야 합니다. 즉시 서버의 PHP 설정을 수정하십시요!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Register globals가 꺼져 있음(정상)';
$string['check_google_details'] = '<p>구글에 대한 개방 설정은 검색엔진이 손님접속으로 강좌에 들어오는 것을 가능하게 합니다.  손님 접속을 허용하지 않았을 때는 이 설정을 활성화 하는 것에 의미가 없습니다.</p>';
$string['check_google_error'] = '검색엔진 접속은 허용되지만 및 손님 접속은 금지됩니다.';
$string['check_google_info'] = '검색엔진이 손님 자격으로 들어올 수 있음';
$string['check_google_name'] = '구글에 개방';
$string['check_google_ok'] = '검색엔진 접속은 활성화 되지 않았습니다.';
$string['check_guestrole_details'] = '<p>손님 역할은 사용자로 로그인 하지 않은 손님에게 일시적으로 강좌 접근을 위한 것입니다.  이 역할에 위험부담이 있는 권한을 부여하지 않도록 유의하십시요.</p>
<p>손님 역할을 지원하는 전통적 유형은 <em>손님</em>입니다.</p>';
$string['check_guestrole_error'] = '손님 역할 "{$a}"이 잘못 정의되었습니다!';
$string['check_guestrole_name'] = '손님 역할';
$string['check_guestrole_notset'] = '손님 역할이 설정되지 않음';
$string['check_guestrole_ok'] = '손님 역활 정의는 맞습니다';
$string['check_mediafilterswf_details'] = '<p>자동 swf 엠베딩은 매우 위험합니다. 임의의 등록 사용자가 타 서버의 사용자를 공격하기 위해 XSS 프로그램을 탑재할 우려가 있습니다. 실제 운영 서버에서는 이를 비 활성화해 두기 바랍니다.</p>';
$string['check_mediafilterswf_error'] = '플래시 미디어 필터 켜짐 - 이는 대다수 서버에게 매우 위함할 수 있습니다.';
$string['check_mediafilterswf_name'] = '.swf 필터 켬';
$string['check_mediafilterswf_ok'] = '플래시 미디어 필터 끔';
$string['check_noauth_details'] = '<p><em>인증 없음</em>플러그인은 실제 운영 서버에서는 추천하지 않습니다. 서버가 개발 사이트가 아니면 비 활성화 하십시요</p>';
$string['check_noauth_error'] = '실제 운영 사이트에서는 인증 플러그인 없음이 사용될 수 없습니다.';
$string['check_noauth_name'] = '인증절차 생략';
$string['check_noauth_ok'] = '인증절차 생략 플러그인 끔';
$string['check_openprofiles_details'] = '<p>공개된 사용자 개인정보는 간혹 스패머에 의해 오용될 소지가 있습니다. 개인정보를 보기 위해서는 <code>개인정보 보려면 로그인 필수</code> 나 <code>로그인 필수</code>를 활성화 시키는 것을 추천합니다.</p>';
$string['check_openprofiles_error'] = '로그인 없이 사용자 개인정보 볼 수 있음';
$string['check_openprofiles_name'] = '사용자 개인정보 공개';
$string['check_openprofiles_ok'] = '사용자 개인정보를 보기위해 로그인이 필요함';
$string['check_passwordpolicy_details'] = '<p>암호 추정은 종종 승인 안된 접속을 위한 가장 쉬운 방법이므로 암호 정책을 설정하는 것을 추천합니다. 요구조건을 너무 엄격하게 하지 마십시요.  엄격하면 사용자가 비밀번호를 기억하지 못하거나 적어 두게 됩니다.</p>';
$string['check_passwordpolicy_error'] = '비밀번호 정책이 설정되지 않음';
$string['check_passwordpolicy_name'] = '비밀번호 정책';
$string['check_passwordpolicy_ok'] = '비밀번호 정책 활성화';
$string['check_riskadmin_detailsok'] = '<p>다음의 관리자 목록을 확인하기 바람</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>다음의 관리자 목록을 확인하기 바랍니다</p> {$a->admins}
<p>시스템 문맥에서 관리자 역할을 부여할 것을 권장합니다. 다음의 사용자들은 다른 문맥에서  (지원되지 않는) 관리자 역할을 부여받았습니다: </p>{$a->unsupported}';
$string['check_riskadmin_name'] = '관리자';
$string['check_riskadmin_ok'] = '{$a} 서버 관리자 발견';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) 직능 검토</a>';
$string['check_riskadmin_warning'] = '{$a->admincount} 서버 관리자 및  {$a->unsupcount} 의 지원되지 않는 관리자 역할 부여 발견';
$string['check_riskbackup_detailsok'] = '사용자 자료를 백업할 수 있는 명시적 역할이 존재하지 않음. 하지만 "doanything"능력을 지닌 관리자는 이러한 능력을 발휘할 수도 있음을 유의할 것.';
$string['check_riskbackup_details_overriddenroles'] = '<p>이러한 활동의 덧쓰기는 사용자로 하여금 백업시 사용자 자료를 포함할 수 있게 합니다. 반드시 다음 허가권이 필요한지를 확인하기 바랍니다.</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>다음의 시스템 역할은 일반적으로 백업시 사용자 자료를 포함할 수 있게 합니다. 반드시 다음 허가권이 필요한지를 확인하기 바랍니다.</p> {$a}';
$string['check_riskbackup_details_users'] = '<p>상기 역할 혹은 지역적인 덮어쓰기 때문에, 다음의 사용자 계정은 강좌내 모든 사용자들에 대한 개인 자료를 포함한 백업을 할 수 있는 권한을 갖게됩니다. 이들이 (1)신임할 수 있는가 (2)보안이 잘된 암호로 보호되고 있는가 를 반드시 확인하기 바랍니다. </p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->contextname}의 {$a->name}</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = '사용자 자료의 백업';
$string['check_riskbackup_ok'] = '어떤 역할도 사용자 자료를 백업하도록 허용되지 않음';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->contextname}의 {$a->fullname} ({$a->email})</a>';
$string['check_riskbackup_warning'] = '{$a->rolecount} 역할, {$a->overridecount} 덮어쓰기 및 사용자 자료를 백업할 수 있는 {$a->usercount} 사용자 발견';
$string['check_riskxss_details'] = '<p>RISK_XSS는 신뢰된 사용자만이 사용할 수 있는 위험성이 있는 능력을 나타냅니다.</p>
<p>다음 사용자 목록을 검증하고 이 서버에서 확실하게 신뢰할 수 있는지 확인해 보기 바랍니다:</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'XSS 인증된 사용자';
$string['check_riskxss_warning'] = 'RISK_XSS - 검증할 {$a} 사용자 발견';
$string['check_unsecuredataroot_details'] = '<p>데이터루트 디렉토리는 웹으로 접속되어서는 안됩니다. 디렉토리가 접근할 수 없는 최선의 방법은 공개 웹 디렉토리 외부에 디렉토리를 사용하는 것입니다.</p>
<p>만일 디렉토리를 옮기면, <code>config.php</code>의 <code>$CFG->dataroot</code>의 설정을 업데이트 해야 합니다.</p>';
$string['check_unsecuredataroot_error'] = '데이터 경로 <code>{$a}</code> 가 잘 못 지정되어 있으며 웹에 노출되어 있음!';
$string['check_unsecuredataroot_name'] = '안전하지 않은 데이터루트';
$string['check_unsecuredataroot_ok'] = '데이터루트 데렉토리는 웹으로 접속할 수 없어야만 함';
$string['check_unsecuredataroot_warning'] = '데이터 경로 <code>{$a}</code> 가 잘 못 지정되어 있으며 웹에 노출될 가능성이 있음';
$string['configuration'] = '설정';
$string['description'] = '설명';
$string['details'] = '세부사항';
$string['issue'] = '이슈';
$string['pluginname'] = '보안 개요';
$string['security:view'] = '보안 보고 보기';
$string['status'] = '상태';
$string['statuscritical'] = '치명적';
$string['statusinfo'] = '알림';
$string['statusok'] = '통과';
$string['statusserious'] = '심각';
$string['statuswarning'] = '경고';
$string['timewarning'] = '자료처리에 시간이 좀 걸립니다. 기다려 주십시오...';
