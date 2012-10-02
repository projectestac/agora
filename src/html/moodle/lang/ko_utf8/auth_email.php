<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = '이용자께서는 $a->oldemail 에서 $a->newemail 로 이메일 주소 변경 요청을 하셨습니다. 보안 관계상, 새로 바뀐 이메일 주소로 확인 메시지를 발송할 것입니다. 확인 메시지를 받고 URL 을 열어 응답하는 즉시, 새로운 이메일 주소로 갱신될 것입니다.';
$string['auth_emailchangecancel'] = '이메일 주소변경 취소';
$string['auth_emailchangepending'] = '변경 보류. $a->preference_newemail 로 발송된 확인 내용에 응답하기 바랍니다.';
$string['auth_emaildescription'] = '이메일 확인 인증은 기본 인증 방법이다. 가입하기 위해  이용자가 새로운 사용자 아이디와 비밀번호를 입력하면, 사용자의 이메일 계정으로 확인 메일이 보내진다. 이 메일에는 계정을 활성화할 수 있는 안전한 링크를 포함한다. 다음에 로그인할 때에는 무들 데이타베이스에 저장된 자료들을 참고하게 된다.';
$string['auth_emailnoemail'] = '이메일 발송 실패';
$string['auth_emailnoinsert'] = '데이터베이스에 당신의 기록 추가 실패';
$string['auth_emailnowexists'] = '최초 메일 변경 요청 이후, 누군가 여러분의 개인정보난의 이메일 주소에 대해 확인을 했습니다. 이에따라 이메일 주소 변경 요청은 기각되었읍니다만, 다른 주소를 이용하여 재 시도할 수는 있습니다.';
$string['auth_emailrecaptcha'] = '이메일을 이용해 스스로 등록하려는 사용자들을 위해 등록 화면에 시청각 확인 기능을 추가하라. 이렇게 하면 스패머로부터 사이트를 지킬 수 있을 뿐만 아니라 뭔가 의미있는 공헌도 할 수 있게 된다. 좀 더 알고 싶으면 http://recaptcha.net/learnmore.html 의 내용을 참조하라.';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHA 기능 활성화';
$string['auth_emailsettings'] = '이메일 인증 설정';
$string['auth_emailtitle'] = '이메일 기반 인증';
$string['auth_emailupdate'] = '이메일 주소 갱신';
$string['auth_emailupdatemessage'] = '$a->fullname 님,

$a->site 에 등록된 이메일 주소 변경을 요구하신 바 있습니다.
확실하다면, 다음에 나오는 URL을 클릭하여 확인해주길 부탁드립니다.

$a->url';
$string['auth_emailupdatesuccess'] = '사용자 <em>$a->fullname</em>의 이메일 주소가 <em>$a->email</em>로 갱신 완료되었음';
$string['auth_emailupdatetitle'] = '$a->site 의 이메일 갱신 확인';
$string['auth_invalidnewemailkey'] = '오류: 메일 주소 변경 확인을 시도했지만, 서버에서 발송한 이메일 주소와 일치하지 않는 모양입니다. 이메일 주소를 다시한번 확인하고 재 시도하기 바랍니다.';
$string['auth_outofnewemailupdateattempts'] = '허용된 이메일 주소 변경의 갱신 시도 횟수를 넘겼습니다. 요청이 기각되었습니다.';