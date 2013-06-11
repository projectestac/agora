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
 * Strings for component 'enrol_imsenterprise', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = '설정을 저장하고 나서 할 일은...';
$string['allowunenrol'] = '학습자/선생님을 <strong>제적</strong>시키기 위해 IMS 데이터 허용';
$string['allowunenrol_desc'] = '활성화되면 강좌 등록은 엔터프라이즈 데이터에 명시된때에 해지될 것입니다.';
$string['basicsettings'] = '기본 설정';
$string['coursesettings'] = '과정 데이터 옵션';
$string['createnewcategories'] = '무들에 해당 강좌가 없는 경우 새로운(비공개) 강좌 생성';
$string['createnewcategories_desc'] = '만일 <org><orgunit> 요소가 강좌의 입력 데이터에 존재하면, 강좌가 처음으로 생성되는 경우 그 내용은 범주를 명시하는데 사용될 것입니다. 플러그인은 존재하는 강좌를 재 범주화 하지는 않을 것입니다.

만일 원하는 이름의 범주가 없다면, 숨겨진 범주가 만들어질 것입니다.';
$string['createnewcourses'] = '무들에 해당과정이 없는 경우 새로운(감춰진) 강좌 생성';
$string['createnewcourses_desc'] = '활성화되면 IMS 엔터프라이즈 등록 플러그인은 무들 데이터베이스에는 없지만 IMS 데이터에는 있는 것에 대해 새 강좌를 생성할 것입니다. 새롭게 생성된 강좌들은 처음에는 감추어지게 됩니다.
';
$string['createnewusers'] = '무들에 사용자가 아직 등록되지 않은 경우 사용자 계정 생성';
$string['createnewusers_desc'] = '<p>IMS 엔터프라이즈 등록 데이터는 전형적으로 사용자 집합을 기술합니다. 이 설정이 켜져 있으면 무들 데이터베이스에서 발견되지 않은 사용자에 대해서 계정이 생성될 수 있습니다.</p>

<p>사용자는 처음에 "idnumber"로 검색되며 두번째로 무들 사용자명으로 검색됩니다.</p>


<p>IMS 플러그인은 비밀번호를 가져오지 않습니다. 사용자 인증을 위해서는 무들의 인증 플러그인을 사용할 것을 권장합니다.</p>';
$string['cronfrequency'] = '처리 빈도';
$string['deleteusers'] = 'IMS 데이터에 명시된 경우 사용자 계정 삭제';
$string['deleteusers_desc'] = '<p>만일 이 설정이 켜져 있는 경우("recstatus" 플래그가 계정의 삭제를 나타내는 3으로 설정되면), IMS 엔터프라이즈 등록 데이터는 사용자 계정의 삭제를 명시할 수 있습니다</p>

<p>사용자 레코드는 무들 데이터베이스에서 실제 삭제되지 않습니다. 다만 계정이 삭제 되었다는 것을 표시하기 위해 플래그가 설정됩니다.</p>';
$string['doitnow'] = '지금 IMS 엔터프라이즈 데이터 가져오기 실행';
$string['filelockedmail'] = 'IMS 파일기반 등록({$a})을 할 때 사용하는 문서 파일은 cron 프로세스에 의해 삭제될 수 없습니다. 이것은 파일에 대한 허가가 잘 못 되었음을 의미합니다. 허가를 바꾸면 무들이 파일을 삭제할 수 있습니다. 그렇지 않으면 반복적으로 처리될 것입니다.';
$string['filelockedmailsubject'] = '중대 오류: 등록 파일';
$string['fixcasepersonalnames'] = '개인 이름의 첫문자를 대문자로 변경';
$string['fixcaseusernames'] = '사용자 이름을 소문자로 변경';
$string['ignore'] = '무시';
$string['importimsfile'] = 'IMS Enterprise 파일 가져오기';
$string['imsrolesdescription'] = 'IMS 엔터프라이즈 규격에는 8가지 다른 역할 유형이 있다. 여기에서 무들에 어떤 역할을 포함시키고 어떤 역할을 포함시킬지를 선택하기 바란다.';
$string['location'] = '파일 위치';
$string['logtolocation'] = '로그 파일 출력 위치 (기록하지 않을때는 공백)';
$string['mailadmins'] = '이메일로 관리자에게 알림';
$string['mailusers'] = '이메일로 사용자들에게 알림';
$string['messageprovider:imsenterprise_enrolment'] = 'IMS 엔터프라이즈 등록 메세지';
$string['miscsettings'] = '기타';
$string['pluginname'] = 'IMS Enterprise 파일 ';
$string['pluginname_desc'] = '이 방법은 사용자가 명시한 위치에서 특별하게 포맷된 텍스트 파일을 반복적으로 찾고 처리합니다. 파일은 사람, 모둠, 구성원 자격 요소를 포함하는 IMS 엔터프라이즈 명세를 따라야 합니다.';
$string['processphoto'] = '개인정보에 사용자 사진 추가';
$string['processphotowarning'] = '주의: 영상처리는 서버에 상당한 부담을 줄 수 있습니다. 많은 수의 학습자가 참여할 것으로 예상되는 경우에는 이 옵션을 활성화 하지 않는 것이 좋습니다.';
$string['restricttarget'] = '다음 목표가 지정될 때만 데이터 처리';
$string['restricttarget_desc'] = '<p>
IMS 엔터프라이즈 데이터 파일은 다수의 "목표 시스템"-학교나 대학에서 LMS들이나 다른 시스템-을 위한 것일 수 있습니다. 데이터가 한개 이상의 명명된 목표시스템을 위한 것이라는 것을 &lt;properties&gt; 태그안에 포함된 &lt;target&gt; 태그에 기록하여 엔터프라이즈 파일에서 명시할 수 있습니다.
</p>

<p>
많은 경우에 당신은 이에 대해 걱정을 하지 않아도 됩니다. 설정을 공백으로 두면 목표시스템이 명시되건 되지 않건 간에 무들이 데이터 파일을 처리할 것입니다. 명시하고 싶으면 &lt;target&gt; 태그안에 출력될 정확한 이름을 채워 넣으십시요.
</p>';
$string['roles'] = '역할들';
$string['sourcedidfallback'] = '만일 "userid" 항목이 발견되지 않으면 사용자 아이디에 "sourcedid" 사용';
$string['sourcedidfallback_desc'] = 'IMS 데이터에서는 <sourcedid> 필드는 소스시스템에서 사용되는 사용자에 대한 퍼시스턴트 ID 코드를 나타냅니다. <userid> 필드는 로그인 할때 사용자가 사용하는 ID 코드를 포람하는 별도의 필드입니다. 많은 경우에 두 코드는 같지만 항상 그런 것은 아닙니다.

어떤 학사정보 시스템의 경우 <userid> 필드를 출력하는데 실패합니다. 이런 경우, 이 설정을 활성화 해서 <sourcedid>를 무들 사용자 ID로 사용하는 것을 허용할 수 있습니다. 그렇지 않은 경우 이 설정을 비활성화 된 상태로 두십시요.';
$string['truncatecoursecodes'] = '과정코드를 이 길이로 단축';
$string['truncatecoursecodes_desc'] = '<p>
어떤 경우에는 처리하기전에 강좌 코드를 특정 길이로 잘라내고 싶은 경우가 있을 것입니다. 그런 경우 이 박스에 문자수를 입력하십시요. 그렇지 않으면 박스를 <strong>공백</strong>으로 두십시요. 그러면 잘라내기가 되지 않습니다.
</p>';
$string['usecapitafix'] = '"Capita" 를 사용한다면 이 박스를 체크하세요. (그들의 XML 형식이 약간 잘못됨)';
$string['usecapitafix_desc'] = '<p>
캐피타에 의한 제공되는 학생데이타 시스템은 XML출력에서 약간의 오류가 있음이 발견되었습니다. 만일 캐피타를 사용한다면 이 옵션을 활성화 하십시요- 그렇지 않으면 체크가 되지 않은 상태로 두십시요.
</p>';
$string['usersettings'] = '사용자 데이터 옵션';
$string['zeroisnotruncation'] = '0는 단축이 없음을 나타냄.';
