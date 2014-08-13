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
 * Strings for component 'auth', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = '활성화된 인증 플러그인';
$string['alternatelogin'] = '로그인 페이지로 사용할 URL을 입력. <strong>\'{$a}\'</strong> 처럼 실행문을 가진 형태여야 하고 <strong>사용자ID</strong>와  <strong>비밀번호</strong>를 리턴할 수 있는 필드를 포함하여야 한다.
<br />정확한 URL을 입력하도록 주의하지 않으면 이 사이트에 갇혀 버릴 수도 있다.<br />
기본 로그인 페이지를 사용하려면 이 칸을 빈칸으로 남겨두어라.';
$string['alternateloginurl'] = '대체 로그인 URL';
$string['auth_changepasswordhelp'] = '비밀번호 도움문서 바꾸기';
$string['auth_changepasswordhelp_expl'] = '비밀번호 도움문서를 자신의 {$a} 비밀번호를 잊어버린 사용자들에게 보여줍니다. 또한 이것은 무들의 비밀번호 변경 혹은 <strong>비밀번호 변경 주소</strong>를 대신 보여줄 수도 있습니다.';
$string['auth_changepasswordurl'] = '암호 재발급 주소';
$string['auth_changepasswordurl_expl'] = '{$a} 비밀번호를 잊어버린 사용자들에게 이 주소를 전송한다. <strong>표준적인 비밀번호 변경 페이지</strong>를 <strong>아니오</strong>로 설정하라.';
$string['auth_changingemailaddress'] = '사용자께서는 {$a->oldemail} 에서 {$a->newemail} 로 이메일 주소 변경 요청을 하셨습니다. 보안 관계상, 새로 바뀐 이메일 주소로 확인 메시지를 발송할 것입니다. 확인 메시지를 받고 URL 을 열어 응답하는 즉시, 새로운 이메일 주소로 업데이트될 것입니다.';
$string['auth_common_settings'] = '일반설정';
$string['auth_data_mapping'] = '데이타 매핑';
$string['authenticationoptions'] = '인증 옵션들';
$string['auth_fieldlock'] = '사용자 정보 잠금';
$string['auth_fieldlock_expl'] = '<p><b>사용자 정보 잠금:</b> 만약 이를 켜 놓으면 무들 사용자나 관리자의 정보 필드를 바로 편집하는 것을 방지할 것입니다. 사용자 정보를 외부인증시스템이 지속적으로 관리하게 하려면 이 옵션을 사용하라. </p>';
$string['auth_fieldlocks'] = '사용자 항목 잠금';
$string['auth_fieldlocks_help'] = '<p>당신은 사용자 자료 필드를 잠글 수 있다. 이 기능은 운영자가 "사용자 업로드" 기능 등을 통해 직접 사용자 자료를 유지 관리할 때 유용하다. 무들에서 필요한데도 잠금 해제가 되지 않은 필드가 있다면, 그 필드에 대한 자료를 따로 생성해 주지 않는 한, 그 사용자 계정은 사용할 수 없게 된다.</p><p>이런 문제가 생기지 않길 바란다면 \'비어있다면 잠금 해제\'로 설정하라.</p>';
$string['authinstructions'] = '로그인 화면에 기본 안내가 나타나게 하려면 비워두십시오. 만일 나름대로의 안내문을 제공하고 싶으면 여기에 그 내용을 적어 넣으면 됩니다.';
$string['auth_invalidnewemailkey'] = '오류: 메일 주소 변경 확인을 시도했지만, 서버에서 발송한 이메일 주소와 일치하지 않는 모양입니다. 이메일 주소를 다시한번 확인하고 재 시도하기 바랍니다.';
$string['auth_multiplehosts'] = '다수의 호스트들은 host1.com;host2.com;host3.com 식이나 IP의 경우 xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx 형태로 쓸 수 있다.';
$string['auth_outofnewemailupdateattempts'] = '허용된 이메일 주소 변경의 업데이트 시도 횟수를 넘겼습니다. 요청이 기각되었습니다.';
$string['auth_passwordisexpired'] = '당신의 비밀번호가 만료되었습니다. 지금 비밀번호를 바꾸시겠습니까?';
$string['auth_passwordwillexpire'] = '당신의 비밀번호가 {$a} 일 후에 만료됩니다. 지금 비밀번호를 바꾸시겠습니까?';
$string['auth_remove_delete'] = '내부적으로 완전 삭제';
$string['auth_remove_keep'] = '내부적으로 유지';
$string['auth_remove_suspend'] = '내부적으로 유보';
$string['auth_remove_user'] = '외부 자원으로부터 사용자가 제거될 때 동기화 과정에서 어떻게 처리할지를 지정. 유보된 사용자만이 외부 자원에 다시 등장할 때 자동적으로 되살릴 수 있다.';
$string['auth_remove_user_key'] = '제거된 외부 사용자';
$string['auth_sync_script'] = 'cron 동기화 스크립트';
$string['auth_updatelocal'] = '내부 데이터의 개정';
$string['auth_updatelocal_expl'] = '<p><b> 내부 데이터의 업데이트 :</b> 만약 이를 켜 놓으면, 각 필드는 (외부 인증처로부터) 로그인할 때 마다 혹은 사용자가 동기화가 있을 때 업데이트 될 것입니다. 내부적으로 업데이트하도록 설정한 필드는 반드시 잠겨 있어야 합니다.';
$string['auth_updateremote'] = '외부데이터의 업데이트';
$string['auth_updateremote_expl'] = '<p><b> 외부 데이터의 업데이트 :</b> 만약 이를 켜 놓으면, 외부 인증처는 사용자 기록이 업데이트될 때 동시에 업데이트될 것입니다. 필드들은 편집이 가능하도록 잠겨있지 않아야 합니다.';
$string['auth_updateremote_ldap'] = '<p><b>경고:</b> 외부의 LDAP 데이터를 업데이트 하는 것은 당신이 모든 사용자가 기록되는 특권을 편집하는 묶여있는 사용자를 요구한다. 현재는 많은 가치를 지닌 속성을 보존하지 않으며 여분의 가치들은 업데이트로 제거된다.</p>';
$string['auth_user_create'] = '사용자 생성 가능';
$string['auth_user_creation'] = '새로운 사용자는 외부인증 소스 혹은 확인되어진 이메일을 통해 계정을 생성할 수 있다. 만약 이 기능을 켜 놓으면 사용자 생성을 위한 모듈 나름대로의 옵션 설정을 잊지마시오.';
$string['auth_usernameexists'] = '선택하신 사용자 아이다는 이미 존재합니다. 다른 사용자아이디를 입력하세요.';
$string['auto_add_remote_users'] = '원격 사용자 자동 추가';
$string['changepassword'] = '패스워드 URL 변경';
$string['changepasswordhelp'] = '만약 사용자가 자신의 계정과 비밀번호를 잊어버리는 경우를 대비해 이곳에 계정과 비밀번호를 찾거나 혹은 바꿀 수 있는 장소를 지정해 줍니다. 이것은 로그인 페이지나 사용자 페이지에서 버튼으로 제공되지만, 이곳을 빈칸으로 놓아둔다면 웹페이지에 버튼이 나타나지 않습니다.';
$string['chooseauthmethod'] = '인증 방법 선택';
$string['chooseauthmethod_help'] = '<p>본 메뉴는 특별한 사용자를 위해 인증 방법을 바꿀 수 있도록 허용합니다.</p>

<p>하지만 여러분이 사이트 인증방법에 무엇을 썼으며 또 어떻게 설정하였는지에 의해 긴밀히 의존되어 있음을 유의하기 바랍니다.</p>

<p>이 곳에서 설정을 잘못하게 되면 로그인을 하지 못할 뿐만 아니라, 사용자 자신들의 계정을 완전히 삭제할 수도 없게 되므로, 이에 대한 내용을 완전하게 숙지하지 못한 경우, 기본 설정을 그대로 두는 것이 안전합니다.</p>';
$string['createpasswordifneeded'] = '필요시 암호 생성';
$string['emailchangecancel'] = '이메일 주소변경 취소';
$string['emailchangepending'] = '변경 보류. {$a->preference_newemail} 로 발송된 확인 내용에 응답하기 바랍니다.';
$string['emailnowexists'] = '최초 메일 변경 요청 이후, 누군가 여러분의 개인정보난의 이메일 주소에 대해 확인을 했습니다. 이에따라 이메일 주소 변경 요청은 기각되었읍니다만, 다른 주소를 이용하여 재 시도할 수는 있습니다.';
$string['emailupdate'] = '이메일 주소 업데이트';
$string['emailupdatemessage'] = '{$a->fullname} 님,

{$a->site} 에 등록된 이메일 주소 변경을 요구하신 바 있습니다.
확실하다면, 다음에 나오는 URL을 클릭하여 확인해주길 부탁드립니다.

{$a->url}';
$string['emailupdatesuccess'] = '사용자 <em>{$a->fullname}</em>의 이메일 주소가 <em>{$a->email}</em>로 업데이트 완료되었음';
$string['emailupdatetitle'] = '{$a->site} 의 이메일 업데이트 확인';
$string['enterthenumbersyouhear'] = '들리는 숫자를 입력하시오';
$string['enterthewordsabove'] = '위의 단어를 입력하시오';
$string['errormaxconsecutiveidentchars'] = '암호에는 최소 {$a} 개의 연속된 동일 문자가 포함되야 합니다.';
$string['errorminpassworddigits'] = '암호에는 최소 {$a} 개의 숫자가 포함되야 합니다.';
$string['errorminpasswordlength'] = '암호길이는 최소 {$a} 문자 이상이라야 합니다.';
$string['errorminpasswordlower'] = '암호에는 최소 {$a} 개의 소문자가 포함되야 합니다.';
$string['errorminpasswordnonalphanum'] = '암호에는 최소 {$a} 개의 특수문자가 포함되야 합니다.';
$string['errorminpasswordupper'] = '암호에는 최소 {$a} 개의 대문자가 포함되야 합니다.';
$string['errorpasswordupdate'] = '비밀번호 업데이트 오류. 비밀번호가 변경되지 않았습니다.';
$string['forcechangepassword'] = '강제 암호변경';
$string['forcechangepasswordfirst_help'] = '무들에 최초 로그인 할 때 비밀번호 교체 요청';
$string['forcechangepassword_help'] = '다음 로그인시 사용자에게 비밀번호 교체 요청';
$string['forgottenpassword'] = '여기에 URL을 입력하면, 이 주소는 사이트에 대한 암호 복원 페이지로 이용될 것입니다. 이것은 암호가 무들 외부에서 처리되는 사이트를 위한 것입니다. 기본 암호 복원 방법을 사용하려면 빈칸으로 남겨 놓으시오.';
$string['forgottenpasswordurl'] = '암호 재발급 URL';
$string['getanaudiocaptcha'] = '소리 CAPTCHA';
$string['getanimagecaptcha'] = '그림 CAPTCHA';
$string['getanothercaptcha'] = '다른 CAPTCHA 얻기';
$string['guestloginbutton'] = '손님 접속 버튼';
$string['incorrectpleasetryagain'] = '틀렸습니다. 다시 해 보세요.';
$string['infilefield'] = '파일에 필요한 항목';
$string['informminpassworddigits'] = '최소 숫자 {$a} 개';
$string['informminpasswordlength'] = '최소 문자 {$a} 개';
$string['informminpasswordlower'] = '최소 소문자 {$a} 개';
$string['informminpasswordnonalphanum'] = '최소 특수문자 {$a} 개';
$string['informminpasswordupper'] = '최소 대문자 {$a} 개';
$string['informpasswordpolicy'] = '암호는 {$a} 를 충족시켜야 합니다.';
$string['instructions'] = '안내문';
$string['internal'] = '내부';
$string['locked'] = '잠금';
$string['md5'] = 'MD5 인증';
$string['nopasswordchange'] = '암호를 변경할 수 없음';
$string['nopasswordchangeforced'] = '비밀번호 변경없이는 계속할 수 없습니다만 암호를 변경할 방법이 없습니다. 무들 관리자에게 연락하기 바랍니다.';
$string['noprofileedit'] = '개인정보를 편집할 수 없습니다.';
$string['ntlmsso_attempting'] = 'NTLM을 통한 싱글사인온 시도';
$string['ntlmsso_failed'] = '자동 로그인 실패, 일반 로그인을 시도하세요.';
$string['ntlmsso_isdisabled'] = 'NTLM SSO가 비활성화되어 있습니다.';
$string['passwordhandling'] = '비밀번호 처리';
$string['plaintext'] = '단순 텍스트';
$string['pluginnotenabled'] = '인증 플러그인 \'{$a}\'은 활성화되어 있지 않습니다.';
$string['pluginnotinstalled'] = '인증 플러그인 \'{$a}\'은 설치되어 있지 않습니다.';
$string['potentialidps'] = '이전에 로그아웃한 곳과 다른 곳에서 접속을 자주하십니까?<br />다음 중 접속하는 곳의 위치를 선택하세요: ';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = '<h2>설명</h2>
<p>캡차(CAPTCHA)는 사용자가 사람인지 컴퓨터인지를 구별해 낼 수 있는 프로그램입니다. 대개 스팸을 생성해내는 "봇(bots)" 혹은 자동화된 프로그램에 의해 사이트의 오용을 막기 위해 많은 웹사이트에서 캡차를 이용합니다. 어떤 컴퓨터 프로그램도 왜곡되어 있는 문서를 사람처럼 읽어내지 못하기 때문에, 봇들은 캡차에 의해 보호된 사이트를 누비고 다닐 수 없게 됩니다.</p>

<h2>안내</h2>
<p>상자 안에 보이는 단어를 순서에 따라 빈칸으로 구분하여 입력해 넣으세요. 이렇게 함으로서 자동화된 프로그램이 이 서비스를 오용하는 것을 막는 데 일조하게 되는 것입니다.</p>

<p>만일 단어가 확실하다고 느끼지 않으시면, 가장 그럴듯한 것을 쓰던지 아니면 "또 다른 캡차 보기"를 누르시기 바랍니다. </p>

<p>시력에 문제가 있으신 분들은 시각적인 도전대신, 숫자의 집합을 듣기위해 "캡차 소리 듣기"를 이용하여 입력할 수도 있습니다.</p>';
$string['selfregistration'] = '자체 등록';
$string['selfregistration_help'] = '이메일 기잔 자체 인증과 같은 인증 플러그인이 선택되면 잠재적인 사용자들이 자신을 등록하고 계정을 만들 수 있게 합니다. 이 경우 스팸을 보내는 사람들이 계정을 만들어 포럼 게시글이나 블로그 게시글을 스팸 목적으로 사용할 수 있습니다. 이러한 위험을 피하기 위해서는 자체 등록을 비활성화하거나 <em>허용된 이메일 도메인</em> 설정으로 자체등록을 제한해야 합니다.';
$string['sha1'] = 'SHA-1 해쉬';
$string['showguestlogin'] = '로그인  페이지에서 손님 로그인 버튼을 보이거나 숨길 수 있습니다.';
$string['stdchangepassword'] = '비밀번호변경을 위해 표준  페이지 사용';
$string['stdchangepassword_expl'] = '만약 외부 인증 시스템이 무들을 통한 비밀번호 변경을 허용한다면, 이것을 "예"로 바꾸시오. 이 설정은 \'비밀번호 URL 변경\'을 덮어쓰기 합니다.';
$string['stdchangepassword_explldap'] = '주목 : 만약 LDAP서버가 원격에 있다면, SSL 함호화 터널(ldaps://)을 통해서 LDAP를 사용할 것을 추천한다.';
$string['suspended'] = '유보된 계정';
$string['suspended_help'] = '유예된 사용자 계정으로는 로그인하거나 웹 서비스를 사용할 수 없으며, 어떠한 연락도 전달되지 않을 것입니다.';
$string['unlocked'] = '잠금 해제';
$string['unlockedifempty'] = '비어있다면 잠금 해제';
$string['update_never'] = '불가';
$string['update_oncreate'] = '생성 중';
$string['update_onlogin'] = '모든 접속';
$string['update_onupdate'] = '업데이트 중';
$string['user_activatenotsupportusertype'] = '인증:  ldap user_activate()는 {$a} 사용자 형식을 지원하지 않음';
$string['user_disablenotsupportusertype'] = '인증:  ldap user_activate()는 아직까지 선택된 사용자 형식을 지원하지 않음';
