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
 * Strings for component 'group', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = '{$a}가 추가하였습니다.';
$string['addgroup'] = '사용자를 모둠에 추가';
$string['addgroupstogrouping'] = '모둠을 모둠무리에 추가';
$string['addgroupstogroupings'] = '모둠 추가/제거';
$string['adduserstogroup'] = '사용자를 모둠에 추가/제거';
$string['allocateby'] = '구성원 할당';
$string['anygrouping'] = '[어떤 모둠무리]';
$string['autocreategroups'] = '모둠 자동 생성';
$string['backtogroupings'] = '모둠무리로 돌아감';
$string['backtogroups'] = '모둠으로 돌아감';
$string['badnamingscheme'] = '한개의 \'@\'나 한개의\'#\'을 포함해야 합니다.';
$string['byfirstname'] = '이름, 성 순서로';
$string['byidnumber'] = 'ID번호 순서로';
$string['bylastname'] = '성, 이름 순서로';
$string['createautomaticgrouping'] = '자동 모둠무리 생성';
$string['creategroup'] = '모둠 생성';
$string['creategrouping'] = '모둠무리 생성';
$string['creategroupinselectedgrouping'] = '지정한 모둠무리에 모둠 생성';
$string['createingrouping'] = '모둠무리에 생성';
$string['createorphangroup'] = '외톨이모둠 생성';
$string['databaseupgradegroups'] = '현재 모둠 판번호: {$a}';
$string['defaultgrouping'] = '기본 모둠무리';
$string['defaultgroupingname'] = '모둠무리';
$string['defaultgroupname'] = '모둠';
$string['deleteallgroupings'] = '모든 모둠무리 삭제';
$string['deleteallgroups'] = '모든 모둠 삭제';
$string['deletegroupconfirm'] = '정말 모둠 \'{$a}\'를 삭제하겠습니까?';
$string['deletegrouping'] = '모둠무리 삭제';
$string['deletegroupingconfirm'] = '정말 모둠무리 \'{$a}\'를 삭제하겠습니까? (무리 안에 있는 모둠은 삭제되지 않습니다)';
$string['deletegroupsconfirm'] = '정말 다음 모둠들을 삭제하겠습니까?';
$string['deleteselectedgroup'] = '선택한 모둠 삭제';
$string['editgroupingsettings'] = '모둠무리 설정';
$string['editgroupsettings'] = '모둠 설정';
$string['enrolmentkey'] = '등록키';
$string['enrolmentkey_help'] = '등록키는 그 키를 알고 있는 사람에게만 제한적으로 강좌에 접속할 수 있게 한다. 만일 모둠 등록키가 지정되면, 그 등록키를 쓰는 사람은 강좌에 등록됨은 물론, 자동적으로 특정 모둠의 구성원이 되게 한다. ';
$string['erroraddremoveuser'] = '모둠에 {$a} 사용자 추가/제거 오류';
$string['erroreditgroup'] = '{$a} 모둠 생성/업데이트 오류';
$string['erroreditgrouping'] = '{$a} 무리 생성/업데이트 오류';
$string['errorinvalidgroup'] = '오류, {$a} 모둠은 유효하지 않습니다.';
$string['errorremovenotpermitted'] = '자동으로 추가된 모둠 구성원 {$a}을 제거할 권한이 없습니다.';
$string['errorselectone'] = '옵션을 고르기 전에 하나의 모둠을 미리 선택하기 바람';
$string['errorselectsome'] = '옵션을 고르기 전에 하나 이상의 모둠을 미리 선택하기 바람';
$string['evenallocation'] = '모둠 할당을 균등히 하기 위해서, 실제 모둠당 구성원 수는 명시한 것과 다를 수 있습니다.';
$string['existingmembers'] = '실제 회원수 : {$a}';
$string['filtergroups'] = '모둠을 다음 조건으로 필터링 :';
$string['group'] = '모둠';
$string['groupaddedsuccesfully'] = '{$a} 모둠이 성공적으로 추가되었습니다';
$string['groupaddedtogroupingsuccesfully'] = '모둠 {$a->groupname}이 모둠무리 {$a->groupingname}에 성공적으로 추가되었습니다.';
$string['groupby'] = '다음 수에 근거하여 모둠 생성';
$string['groupdescription'] = '모둠 설명';
$string['groupinfo'] = '선택한 모둠의 정보';
$string['groupinfomembers'] = '선택한 구성원의 정보';
$string['groupinfopeople'] = '선택한 사람의 정보';
$string['grouping'] = '모둠무리';
$string['groupingaddedsuccesfully'] = '모둠무리 {$a}가 성공적으로 추가되었습니다.';
$string['groupingdescription'] = '모둠무리 설명';
$string['grouping_help'] = '모둠 무리는 강좌내 모둠들의 집합을 의미합니다.

모둠 무리를 선택하면, 모둠무리내의 모둠에 배정된 사용자들은 함께 작업할 수 있습니다.

';
$string['groupingname'] = '모둠무리 이름';
$string['groupingnameexists'] = '이 강좌에 이미 \'{$a}\'라는 모둠무리 이름이 존재합니다. 다른 이름을 쓰세요.';
$string['groupings'] = '모둠무리';
$string['groupingsection'] = '모둠무리 접근';
$string['groupingsection_help'] = '모둠 무리는 강좌내에 모둠들의 집합입니다. 여기서 모둠무리가 선택되면 이 모둠무리안에 있는 모둠에 할당된 학생들만 섹션에 접근할 수 있습니다.';
$string['groupingsonly'] = '모둠무리만';
$string['groupmember'] = '모둠 구성원';
$string['groupmemberdesc'] = '모둠 구성원에 대한 기본 역할';
$string['groupmembers'] = '모둠 구성원';
$string['groupmembersonly'] = '모둠 구성원만 사용가능';
$string['groupmembersonlyerror'] = '죄송합니다만, 이 활동을 하기 위해서는 최소한 어떤 모둠의 구성원이라야만 합니다.';
$string['groupmembersonly_help'] = '만일 체크박스가 체크 되어있다면,
활동(혹은 학습자원)은 선택된 모둠 무리 내 모둠에 배정된 사용자만이
이용할 수 있습니다';
$string['groupmemberssee'] = '모둠 구성원 보기';
$string['groupmembersselected'] = '선택한 모둠의 구성원';
$string['groupmode'] = '모둠 모드';
$string['groupmodeforce'] = '강제모둠 모드';
$string['groupmodeforce_help'] = '만일 강제모둠 모드가 되면, 강좌 내의 모든 활동은 모듬 모드로 작동한다. 개개 활동의 모둠 모드 설정은 무시된다.';
$string['groupmode_help'] = '이 설정은 세 옵션이 있습니다.

* 모둠 없음 - 하위 모둠이 없으며, 모두가 하나의 커다란 공동체의 일원이 됨
* 분리된 모둠 - 각 모둠의 구성원은 자신이 속한 모둠의 활동만 볼 수 있고 다른 모둠은 보지 못함
* 개방된 모둠 - 각 모둠 구성원은 모둠내에서 활동하지만, 다른 모둠의 활동 사항도 볼 수 있음

강좌 수준에서 정의된 모둠 모드는 그 강좌내에서 정의된 모든 활동에 대해 기본으로 적용됩니다.
모둠을 지원하는 개개의 활동은 그 자체의 모둠을 정의할 수 있습니다. 만일 모둠 모드가 강좌수준에서 정해지면  개별활동에 설정된 모둠 모드는 무시됩니다.';
$string['groupmy'] = '내 모둠';
$string['groupname'] = '모둠 이름';
$string['groupnameexists'] = '이 강좌에는 이미 \'{$a}\'라는 모둠이 있습니다. 다른 이름을 선택하세요.';
$string['groupnotamember'] = '죄송합니다, 당신은 그 모둠의 구성원이 아닙니다.';
$string['groups'] = '모둠';
$string['groupscount'] = '모둠 ({$a})';
$string['groupsettingsheader'] = '모둠';
$string['groupsgroupings'] = '모둠 &amp;모둠무리';
$string['groupsinselectedgrouping'] = '다음 모둠무리안의 모둠';
$string['groupsnone'] = '모둠 없음';
$string['groupsonly'] = '모둠만';
$string['groupspreview'] = '모둠 미리보기';
$string['groupsseparate'] = '분리 모둠';
$string['groupsvisible'] = '개방 모둠';
$string['grouptemplate'] = '모둠 @';
$string['hidepicture'] = '사진 감춤';
$string['importgroups'] = '모둠 가져오기';
$string['importgroups_help'] = '모둠은 텍스트 파일로 가져오기 할 수 있습니다. 파일 형식은 다음과 같아야 합니다.
* 파일의 각 줄은 한개의 레코드만 포함
* 각 레코드는 콤마로 분리된 데이터의 연속
* 첫 레코드에는 파일의 나머지 부분의 형식을 정의하는 필드 이름 목록
* 필수 필드이름은 groupname
* 선택적 필드이름은 description, enrolmentkey, picture, hidepicture';
$string['javascriptrequired'] = '이 페이지는 자바스크립트가 활성되는 것이 필요합니다.';
$string['members'] = '모둠당 구성원들';
$string['membersofselectedgroup'] = '다음 모둠의 구성원';
$string['namingscheme'] = '이름만들기 규칙';
$string['namingscheme_help'] = '모둠 이름에서 @ 기호는 거기에 문자를 치환하여 모둠의 이름을 만들 수 있다. 예를 들어 모둠 @ 처럼 쓰면, 모둠 A, 모둠 B, 모둠 C 가 만들어 진다.

같은 방법으로 반올림표(#)는 숫자로 대치된다. 예를 들어 집합 # 로 입력하면, 집합 1, 집합 2, 집합 3 등등이 만들어 진다.  ';
$string['newgrouping'] = '새 모둠무리';
$string['newpicture'] = '새 사진';
$string['newpicture_help'] = 'JPG 나 PNG 형식의 이미지를 선택하십시요. 이미지는 정사각형으로 맞추어지게 되며 100x100 픽셀로 크기가 조절됩니다.';
$string['noallocation'] = '할당 없음';
$string['nogroups'] = '이 강좌에는 설정된 모둠이 없습니다.';
$string['nogroupsassigned'] = '모둠이 할당되지 않았습니다.';
$string['nopermissionforcreation'] = '필요한 권한이 없어서 "{$a}" 을 생성할 수 없습니다.';
$string['nosmallgroups'] = '마지막 작은 모둠 방지';
$string['notingrouping'] = '[모둠무리속에 없음]';
$string['nousersinrole'] = '선택된 역할에 대한 적절한 사용자가 없습니다.';
$string['number'] = '모둠/구성원 수';
$string['numgroups'] = '모둠의 수';
$string['nummembers'] = '모둠당 구성원 수';
$string['overview'] = '개요';
$string['potentialmembers'] = '예비 회원수 : {$a}';
$string['potentialmembs'] = '예비 회원';
$string['printerfriendly'] = '인쇄용 표시';
$string['random'] = '무작위로';
$string['removefromgroup'] = '모둠 {$a} 에서 사용자 제명';
$string['removefromgroupconfirm'] = '정말, "{$a->group}" 모둠에서  "{$a->user}" 사용자를 제명하겠습니까?';
$string['removegroupfromselectedgrouping'] = '선택한 모둠무리에서 모둠 제거';
$string['removegroupingsmembers'] = '모둠무리에서 모둠 제거';
$string['removegroupsmembers'] = '모둠 구성원 제거';
$string['removeselectedusers'] = '선택한 사용자 제거';
$string['selectfromrole'] = '구성원을 선택할 수 있는 역할';
$string['showgroupsingrouping'] = '무리에 있는 모둠 보기';
$string['showmembersforgroup'] = '모둠 구성원 보기';
$string['toomanygroups'] = '모둠의 수를 채우기에 부족한 사용자 수 - 선택된 역할에 단지 {$a} 사용자만 있습니다.';
$string['usercount'] = '사용자 수';
$string['usercounttotal'] = '사용자 수 ({$a})';
$string['usergroupmembership'] = '선택된 사용자의 멤버쉽';
