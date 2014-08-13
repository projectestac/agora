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
 * Strings for component 'enrol_self', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = '수업집단  \'{$a}\' 의 구성원 만이 스스로 등록할 수 있습니다.';
$string['cohortonly'] = '수업집단 구성원만';
$string['customwelcomemessage'] = '사용자 정의 환영 메세지';
$string['defaultrole'] = '기본 역할';
$string['defaultrole_desc'] = '등록하면 사용자에게 부여할 역할 선택';
$string['enrolenddate'] = '등록 마감 날짜';
$string['enrolenddate_help'] = '활성화되면 사용자들은 이 날까지만 스스로 등록할 수 있습니다.';
$string['enrolenddaterror'] = '등록기간의 마감날짜는 시작날짜보다 먼저일 수 없음';
$string['enrolme'] = '등록 요청';
$string['enrolperiod'] = '재적 기간';
$string['enrolperiod_desc'] = '(초로 표시한) 기본 재적 기간';
$string['enrolperiod_help'] = '*.swf 확장자 파일. 보안상의 이유로 이 필터는 신뢰된 문장들에서만 사용됩니다.';
$string['enrolstartdate'] = '등록 시작 날짜';
$string['enrolstartdate_help'] = '활성화되면 사용자들은 이 날 이후로만 등록할 수 있습니다.';
$string['expiredaction'] = '등록 만료 조치';
$string['expirymessageenrolledsubject'] = '스스로 등록 만료 통지';
$string['expirymessageenrollersubject'] = '스스로 등록 만료 통지';
$string['groupkey'] = '모둠 등록키 사용';
$string['groupkey_desc'] = '기본으로 모둠 등록키를 사용';
$string['groupkey_help'] = '키를 아는 사람들에게만 강좌에 대한 접속을 제한할 수 있으며, 모둠 등록키를 사용하면 사용자들이 등록할때 자동으로 모둠에 추가됩니다.

모둠 등록키를 사용하기 위해서는 등록 키가 강좌 설정에서 명시되어야 하고, 모둠 설정에서 모둠 등록키가 명시 되어야합니다.';
$string['longtimenosee'] = '다음 이후에 수강 취소 비활성화:';
$string['longtimenosee_help'] = '만일 사용자가 오랫동안 강좌에 접속하지 않으면 그들은 자동적으로 등록취소됩니다. 이 파라메터는 이 시간 한계를 설정합니다.';
$string['maxenrolled'] = '최대 등록 사용자';
$string['maxenrolled_help'] = '자체 등록할 수 있는 최대 사용자 수를 명시하세요. 0은 제한이 없음을 의미합니다.';
$string['maxenrolledreached'] = '자체 등록할 수 있는 최대 사용자 수가 이미 도달하였습니다.';
$string['messageprovider:expiry_notification'] = '스스로 등록 만료 통지';
$string['newenrols'] = '새 등록 허용';
$string['newenrols_desc'] = '기본으로 새 강좌에 스스로 등록 허용';
$string['newenrols_help'] = '이 설정은 새 사용자가 이 강좌에 등록할 수 있을지를 결정합니다.';
$string['nopassword'] = '등록키가 필요하지 않습니다.';
$string['password'] = '등록키';
$string['password_help'] = '등록키는 키를 아는 사람만 강좌에 접속할 수 있게 제한 합니다.

이 항목이 비어 있으면 누구던지 강좌를 수강할 수 있습니다.

등록키가 명시되어 있으면 강좌에 등록하고자 하는 사용자는 키를 입력해야 합니다. 사용자는 강좌에 등록할때 한번만 등록키를 입력하면 됩니다.';
$string['passwordinvalid'] = '등록키가 틀렸습니다. 다시 입력해 주세요.';
$string['passwordinvalidhint'] = '등록키가 틀렸습니다. 다시 입력해 주세요.<br />
(힌트:  \'{$a}\'로 시작됨)';
$string['pluginname'] = '스스로 등록';
$string['pluginname_desc'] = '자체 등록 플러그인은 사용자들이 참가하고자 하는 강좌를 선택하게 해 줍니다. 강좌들은 등록키로 보호될 수도 있습니다. 내부적으로 등록은 같은 강좌에서 활성화되어야 하는 수동 등록 플러그인에 의해 이루어 집니다.';
$string['requirepassword'] = '등록키 필수';
$string['requirepassword_desc'] = '새 강좌에서 등록키를 요구하며 기존 강좌에서 등록키를 제거하는 것을 방지합니다.';
$string['role'] = '역할 부여';
$string['self:config'] = '스스로 등록 과정 설정';
$string['self:manage'] = '등록자 관리';
$string['self:unenrol'] = '강좌에서 제명';
$string['self:unenrolself'] = '강좌에서 탈퇴';
$string['sendcoursewelcomemessage'] = '강좌 환영 메시지 전송';
$string['sendcoursewelcomemessage_help'] = '이를 활성화해 놓으면 사용자가 강좌에 등록하면 환영 메세지를 보여 줍니다.';
$string['showhint'] = '힌트 보임';
$string['showhint_desc'] = '손님용 접속키의 첫 글자를 보여 줌';
$string['status'] = '기존 등록 허용';
$string['status_desc'] = '기본적으로 사용자 개개인이 강좌에 등록할 수 있게 허용';
$string['status_help'] = '이 설정은 사용자가 강좌에 스스로 등록할 수 있는(적절한 권한이 있다면 등록 취소도할 수 있는)지를 결정합니다.';
$string['unenrol'] = '사용자 등록 해지';
$string['unenrolselfconfirm'] = '정말, "{$a}" 강좌에서 탈퇴하겠습니까?';
$string['unenroluser'] = '강좌 "{$a->course}" 에서 "{$a->user}" 를 등록해지하고자 합니까?';
$string['usepasswordpolicy'] = '암호생성 조건사용';
$string['usepasswordpolicy_desc'] = '등록키에 표준 암호 생성 정책을 사용';
$string['welcometocourse'] = '{$a} 에 오신 것을 환영합니다.';
$string['welcometocoursetext'] = '{$a->coursename} 에 오신 것을 환영합니다.<br />
{$a->profileurl} 를 누르면 개인정보를 수정할 수 있습니다.';
