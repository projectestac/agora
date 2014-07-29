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
 * Strings for component 'enrol_mnet', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'MNet 등록 플러그인의 인스턴스가 이 호스트에 대해 이미 존재합니다. 호스트당 한개 혹은 모든 호스트에 대해 한개 인스턴스만 허용됩니다.';
$string['instancename'] = '등록 방법 이름';
$string['instancename_help'] = '선택사항으로 MNet 등록 메쏘드의 인스턴스 이름을 변경할 수 있습니다. 만일 이 항목을 공백으로 남겨두면 원격 호스트 이름과 사용자들에 대한 부여된 역할이름을 포함하는 기본 인스턴스 이름이 사용될 것입니다.';
$string['mnet_enrol_description'] = '여러분의 서버에 만들어 놓은 강좌에 {$a} 의 관리자가 허용한 학생들이 등록할 수 있도록 이 서비스를 공개한다.<br/>
<ul><li><em>필수요건</em>: 반드시 SSO(서비스 제공자) 서비스를 {$a} 에게 <strong>공개</strong>해야만 한다.</li><li><em>필수요건</em>: 또한 반드시 SSO(신분 제공자)로서 {$a} 에 <strong>등록</strong>되어 있어야만 한다.</li></ul><br />이 서비스에 등록함으로써 여러분의 학생들은 {$a} 사이트 강좌에 등록할 수 있게 된다.<br/> <ul><li><em>필수요건</em>: 반드시 {$a} 의 SSO(서비스 제공자)로 <strong>등록</strong>해야만 한다.</li><li><em>필수요건</em>: 반드시 SSO(신분 제공자) 서비스를 {$a} 에게 <strong>공개</strong>해야만 한다.</li></ul><br />';
$string['mnet_enrol_name'] = '원격 등록 서비스';
$string['pluginname'] = 'MNet 원격 등록';
$string['pluginname_desc'] = '원격 MNet 호스트에게 그들 사용자들을 우리 강좌에 등록시키는 것을 허용';
$string['remotesubscriber'] = '원격 호스트';
$string['remotesubscriber_help'] = '원격 등록 서비스를 제공하고자 하는 모든 MNet 서버들에게 이 강좌를 공개하려면 \'모든 호스트\'를 선택하세요. 혹은 한 호스트 사용자들에게만 강좌를 사용할 수 있게 하려면 한 개 호스트만 선택하세요.';
$string['remotesubscribersall'] = '모든 호스트';
$string['roleforremoteusers'] = '원격 사용자들에 대한 역할';
$string['roleforremoteusers_help'] = '선택된 호스트에서 접속한 원격 사용자들이 갖게되는 역할 ';
