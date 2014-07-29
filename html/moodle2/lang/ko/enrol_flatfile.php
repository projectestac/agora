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
 * Strings for component 'enrol_flatfile', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['encoding'] = '파일 엔코딩';
$string['expiredaction'] = '등록 만료 조치';
$string['filelockedmail'] = '파일 기반 등록({$a})을 하기 위해 사용되는 텍스트파일은 크론과정에 의하여 삭제될 수 없습니다. 이것은 주로 허가가 잘못된 것을 의미합니다. 무들이 파일을 삭제시킬 수 있도록 허가를 수정하십시오. 그렇지 않으면 그것은 반복적으로 처리될 수도 있습니다.';
$string['filelockedmailsubject'] = '중대한 오류: 등록 화일';
$string['flatfile:manage'] = '수동으로 사용자 등록 관리';
$string['flatfile:unenrol'] = '수동으로 강좌에서 사용자 등록 해지';
$string['location'] = '화일 위치';
$string['mapping'] = '평문 파일 매핑';
$string['messageprovider:flatfile_enrolment'] = '플랫 파일 등록 메세지';
$string['notifyadmin'] = '관리자에게 통지';
$string['notifyenrolled'] = '등록된 사용자에게 통지';
$string['notifyenroller'] = '등록 책임자에게 통지';
$string['pluginname'] = '평문 (CSV)';
$string['pluginname_desc'] = '이 방법은 명시한 위치에서 특별하게 포맷된 파일을 반복적으로 찾고 처리합니다.
이 파일은 콤마로 분리되어 있으며 줄당 4개 혹은 6개의 항목을 가지고 있다고 가정합니다.
<pre class="informationbox">
* operation, role, idnumber(user), idnumber(course) [, starttime, endtime]
where:
* operation = add | del
* role = student | teacher | teacheredit
* idnumber(user) = idnumber in the user table NB not id
* idnumber(course) = idnumber in the course table NB not id
* starttime = start time (in seconds since epoch) - optional
* endtime = end time (in seconds since epoch) - optional
</pre>
다음과 같이 보일 수도 있습니다.
<pre class="informationbox">
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
