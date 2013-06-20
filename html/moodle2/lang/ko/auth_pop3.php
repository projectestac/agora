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
 * Strings for component 'auth_pop3', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_pop3
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pop3changepasswordurl_key'] = '암호 변경 URL';
$string['auth_pop3description'] = 'POP3 서버를 사용하여 사용자의 이름과 패스워드의 유용성을 확인한다.';
$string['auth_pop3host'] = 'POP3 서버의 주소. DNS가 아닌 IP 숫자를 사용한다.';
$string['auth_pop3host_key'] = '호스트';
$string['auth_pop3mailbox'] = '연결 시도를 위한 우편함의 이름 (보통 INBOX)';
$string['auth_pop3mailbox_key'] = '우편함';
$string['auth_pop3notinstalled'] = 'POP3 인증을 사용하지 못 함. PHP의 IMAP모듈이 설치되어 있지 않음.';
$string['auth_pop3port'] = '서버 포트 (110이 일반적이고 SSL의 경우 995가 무난하다)';
$string['auth_pop3port_key'] = '포트';
$string['auth_pop3type'] = '서버의 형식. 만약 당신의 서버가 증명된 보안을 사용한다면 POP3cert를 선택하라.';
$string['auth_pop3type_key'] = '유형';
$string['pluginname'] = 'POP3 서버';
