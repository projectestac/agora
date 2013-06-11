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
 * Strings for component 'message_email', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = '문자세트 선택 허용';
$string['configallowusermailcharset'] = '이 기능을 활성화시키면, 모든 사용자는 이메일에 자신만의 문자 세트를 이용할 수 있습니다.';
$string['configmailnewline'] = '개행문자가 메일 메세지에 사용되었습니다. RFC 822bis에 따라 CRLF가 필요합니다. 어떤 메일서버는 LF를 CRLF로 자동변환하는 반면 어떤 서버는 CRLF를 CRCRLF로 잘 못 변환하고, 어떤 메일서버(예를 들어 qmail)는 LF만 있는 메일을 거부합니다 배달되지 않는 메일이 있거나 이중 개행문자가 있는 경우 이 설정을 변경해 보십시요.';
$string['confignoreplyaddress'] = '이메일은 종종 게시자 자신에게도 보내진다. 여기에 적은 이메일 주소는 발신자가 일일이 수신자의 답신을 받을 필요가 없는 경우에 사용되는, 관리용 발신 전용 주소입니다. (예를 들어 사용자가 자신의 이메일을 공개하지 않은 경우)';
$string['configsitemailcharset'] = '사이트에서 생성되는 모든 이메일은 여기에서 지정하는 문자세트로 보내질 것이다. 하지만 아래의 설정을 "예"로 해 놓으면 사용자 개개인이 문자세트를 선택하여 사용할 수도 있습니다.';
$string['configsmtphosts'] = '무들이 메일을 보낼때 사용하는 local SMTP 서버들의 전체 이름을 입력하십시요.(예 : \'mail.a.com\' 혹은 \'mail.a.com;mail.b.com\'). 기본 포트(25번 포트)가 아닌 포트를 명시할때는 [server]:[port]  형식을 사용할 수 있습니다. (예 \'mail.a.com:587)
만약 이 곳을 빈칸으로 남겨두면 무들은 PHP 기본 메쏘드를 사용하여 메일을 발송할 것입니다.';
$string['configsmtpmaxbulk'] = 'SMTP 세션당 보낼 수 있는 최대 메세지 수. 모둠 메세지는 이메일을 보내는것을 빠르게 할 수도 있습니다. 2보다 작은 값은 각 이메일 마다 SMTP 세션을 만들도록 합니다.
';
$string['configsmtpsecure'] = '만일 smtp  서버가 보안 접속을 요구한다면 맞는 프로토콜 유형을 지정하십시요.';
$string['configsmtpuser'] = '만약 위에서 SMTP 서버를 지정했고, 각 서버에 접속할 수 있는 인증을 요구한다면, 사용자 ID와 비밀번호를 이 곳에 입력하라.';
$string['email'] = '이메일 통지 보냄';
$string['ifemailleftempty'] = '{$a} 에게 통지 보내기 위해서는 공백으로 남겨두세요.';
$string['mailnewline'] = '메일의 라인 개행문자';
$string['none'] = '없음';
$string['noreplyaddress'] = '발신전용 이메일 주소';
$string['pluginname'] = '이메일';
$string['sitemailcharset'] = '이메일 문자셋';
$string['smtphosts'] = 'SMTP 호스트';
$string['smtpmaxbulk'] = 'STMP 세션 한계';
$string['smtppass'] = 'SMTP 암호';
$string['smtpsecure'] = 'SMTP 보안';
$string['smtpuser'] = 'SMTP 사용자명';
