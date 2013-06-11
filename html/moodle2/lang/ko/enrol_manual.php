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
 * Strings for component 'enrol_manual', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = '상태 변경';
$string['altertimeend'] = '종료시간 변경';
$string['altertimestart'] = '시작시간 변경';
$string['assignrole'] = '역할 부여';
$string['confirmbulkdeleteenrolment'] = '이 사용자들의 등록을 삭제하기를 원하십니까?';
$string['defaultperiod'] = '기본 등록 기간';
$string['defaultperiod_desc'] = '기본 등록 기간 설정의 기본 시간(초).';
$string['defaultperiod_help'] = '사용자가 등록한 후 등록이 유효한 기본 기간. 비활성화 되면 등록 유효기간은 기본적으로 제한이 없습니다.';
$string['deleteselectedusers'] = '선택된 사용자 등록 삭제';
$string['editenrolment'] = '등록 편집';
$string['editselectedusers'] = '선택된 사용자 등록 편집';
$string['enrolledincourserole'] = '"{$a->course}" 강좌에 "{$a->role}" 로 등록';
$string['enrolusers'] = '사용자 등록';
$string['manual:config'] = '수동 등록 인스턴스 구성';
$string['manual:enrol'] = '사용자 등록';
$string['manual:manage'] = '사용자 등록 관리';
$string['manual:unenrol'] = '강좌에서 사용자 수강 철회';
$string['manual:unenrolself'] = '강좌에서 자신을 수강 철회';
$string['pluginname'] = '수동 등록';
$string['pluginname_desc'] = '수동 등록플러그인은 미리 관리자가 설정해 놓은 연결고리를 통해서 개별 사용자들이, 선생님와 같은 특정 권한을 지닌 사용자로 등록할 수 있도록 허용합니다. 자동 등록과 같은 여타의 등록 플러그인이 요구된다면 당연히 설치는 물론 활성화되어 있어야 합니다.';
$string['status'] = '수동 등록 가능';
$string['status_desc'] = '내부적으로 등록된 사용자에게 강좌 접속 허용. 이것은 대부분의 경우에 활성화 되어야합니다.';
$string['statusdisabled'] = '비활성화됨';
$string['statusenabled'] = '활성화됨';
$string['status_help'] = '이 설정은 강좌 관리 설정의 링크를 통하여 선생님과 같은 적절한 권한을 가진 사용자에 의해 사용자들을 수동으로 등록할 수 있는지를 결정합니다.';
$string['unenrol'] = '사용자 등록 해지';
$string['unenrolselectedusers'] = '선택된 사용자 등록 해지';
$string['unenrolselfconfirm'] = '강좌 "{$a}"에서 등록철회하기를 원하십니까?';
$string['unenroluser'] = '강좌 "{$a->course}" 에서 사용자 "{$a->user}" 를 등록해지 하기를 원하십니까?';
$string['unenrolusers'] = '사용자 등록 해지';
$string['wscannotenrol'] = '플러그인 인스턴스는 강좌 id = {$a->courseid} 에서 사용자를 수동으로 등록할 수 없습니다.';
$string['wsnoinstance'] = '수동 등록 플러그인 인스턴스가 없거나 강좌 id = {$a->courseid}에 대해 비활성화 되어 있습니다.';
$string['wsusercannotassign'] = '강좌 ({$a->courseid})에서 사용자 ({$a->userid})에게 역할 ({$a->roleid}) 을 할당할 권한이 없습니다.';
