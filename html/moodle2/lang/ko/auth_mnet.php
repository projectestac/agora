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
 * Strings for component 'auth_mnet', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = '예로 설정하면, 외부에서 처음 로그인할 때 사용자 기록이 자동으로 작성됩니다.';
$string['auth_mnetdescription'] = '무들네트웍 설정에 의거하여 사용자 인증';
$string['auth_mnet_roamin'] = '이 호스트의 사용자들은 사이트에 자유롭게 들락거릴 수 있음';
$string['auth_mnet_roamout'] = '사용자들이 다음의 호스트들은 자유자재로 들락거릴 수 있음';
$string['auth_mnet_rpc_negotiation_timeout'] = 'XMLRPC 계층을 통하여 인증받을 수 있는 시간 제한';
$string['auto_add_remote_users'] = '원격 사용자 자동 추가';
$string['pluginname'] = 'MNet 인증';
$string['rpc_negotiation_timeout'] = 'RPC 교섭 시한';
$string['sso_idp_description'] = '이 곳 사용자들이 다시 로그인 하지 않고도 {$a} 사이트에 접속할 수 있게 하려면 이 서비스를 공개하십시요. <ul><li><em>의존성</em>: 반드시 {$a} 에 SSO(서비스 제공자)를 <strong>구독</strong>해야만 합니다.</li></ul><br />{$a} 에서 인증된 사용자들이 다시 로그인하지 않고도 여러분의 사이트를 탐방할 수 있게 하려면 이 서비스를 구독하십시요. <ul><li><em>의존성</em>: 또한 반드시 {$a} 에게 SSO(서비스 제공자)서비스를 <strong>공개</strong>해야 합니다.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (신분 제공자)';
$string['sso_mnet_login_refused'] = '{$a->user} 사용자는 {$a->host} 에서 접속하도록 허용되지 않았습니다.';
$string['sso_sp_description'] = '{$a} 에서 인증된 사용자가 다시 로그인 하지 않고도 여러분의 사이트에 접속할 수 있게 하려면 이 서비스를 공개하십시요. <ul><li><em>의존성</em>: 반드시 {$a} 에 SSO(신분 제공자)를<strong>구독</strong>해야만 합니다.</li></ul><br />이 곳 사용자들이 다시 로그인하지 않고도 {$a} 무들 사이트들을 탐방할 수 있게 하려면 이 서비스를 구독하십시요. <ul><li><em>의존성</em>: 또한 반드시 {$a} 에게 SSO(신분 제공자) 서비스를 <strong>공개</strong>해야 합니다.</li></ul><br />';
$string['sso_sp_name'] = 'SSO (서비스 제공자)';
