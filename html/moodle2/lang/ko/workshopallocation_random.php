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
 * Strings for component 'workshopallocation_random', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = '자평 추가';
$string['allocationaddeddetail'] = '새로운 평가 완료: <strong>{$a->reviewername}</strong> 는 <strong>{$a->authorname}</strong> 의 검토자임';
$string['allocationdeallocategraded'] = '이미 채점된 평가를 재 배치할 수 없음: 검토자 <strong>{$a->reviewername}</strong>, 제출물 저자: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = '재 사용 평가: <strong>{$a->reviewername}</strong>는 <strong>{$a->authorname}</strong>의 검토자로 함';
$string['allocationsettings'] = '할당 설정';
$string['assessmentdeleteddetail'] = '평가물 배당 해제: <strong>{$a->reviewername}</strong> 는 더이상 <strong>{$a->authorname}</strong> 의 검토자가 아님';
$string['assesswosubmission'] = '참여자는 제출물없이도 평가할 수 있음';
$string['confignumofreviews'] = '무작위로 배당된 제출물의 기본 갯수';
$string['excludesamegroup'] = '같은 모둠의 동료가 검토하는 것을 방지';
$string['noallocationtoadd'] = '추가 배당 없음';
$string['nogroupusers'] = '<p>경고: 만일 상호평가가 \'볼수있는 모둠" 모드나 \'분리된 모둠\'모드에서 이루어지는 경우 사용자들은 동료평가가 할당되기 위해서는 최소 한개 모둠의 구성원이어야 합니다.모둠에 속하지 않은 사용자는 새로운 자체 평가를 하거나 기존의 평가가 제거됩니다.</p>
<p>다음 사용자들은 모둠에 속해있지 않습니다: {$a}</p>';
$string['numofdeallocatedassessment'] = '{$a} 평가물 배당에서 해제';
$string['numofrandomlyallocatedsubmissions'] = '무작위로 할당된 {$a} 제출물';
$string['numofreviews'] = '검토한 숫자';
$string['numofselfallocatedsubmissions'] = '스스로 배당한 {$a} 제출물';
$string['numperauthor'] = '제출물 당';
$string['numperreviewer'] = '검토자 1인 당';
$string['pluginname'] = '무작위 할당';
$string['randomallocationdone'] = '무작위 할당 완료';
$string['removecurrentallocations'] = '최근 할당 삭제';
$string['resultnomorepeers'] = '더 이상 동료가 없습니다 ';
$string['resultnomorepeersingroup'] = '이 분리된 모둠에서 동료가 더 이상 없습니다.';
$string['resultnotenoughpeers'] = '동료가 충분하지 않습니다.';
$string['resultnumperauthor'] = '저자당 {$a} 검토 할당하려고 시도';
$string['resultnumperreviewer'] = '검토자별로 {$a}  검토 할당 시도';
$string['stats'] = '할당 현황';
