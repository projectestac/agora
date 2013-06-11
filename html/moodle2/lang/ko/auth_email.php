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
 * Strings for component 'auth_email', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '이메일 확인 인증은 기본 인증 방법입니다. 가입하기 위해  사용자가 새로운 사용자 아이디와 비밀번호를 입력하면, 사용자의 이메일 계정으로 확인 메일이 보내집니다. 이 메일에는 계정을 활성화할 수 있는 안전한 링크를 포함한다. 다음에 로그인할 때에는 무들 데이타베이스에 저장된 자료들을 참고하게 됩니다.';
$string['auth_emailnoemail'] = '이메일 발송 실패';
$string['auth_emailrecaptcha'] = '이메일을 이용해 스스로 등록하려는 사용자들을 위해 등록 페이지에 시청각 확인 기능을 추가하십시요. 이렇게 하면 스패머로부터 사이트를 지킬 수 있을 뿐만 아니라 뭔가 의미있는 공헌도 할 수 있게 됩니다. 좀 더 알고 싶으면 http://recaptcha.net/learnmore.html 의 내용을 참조하십시요.';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHA 기능 활성화';
$string['auth_emailsettings'] = '이메일 인증 설정';
$string['pluginname'] = '이메일 기반 인증';
