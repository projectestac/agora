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
 * Strings for component 'condition', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = '양식에 활동 조건 추가';
$string['addgrades'] = '양식에 성적 조건 추가';
$string['availabilityconditions'] = '접근 제한';
$string['availablefrom'] = '접근 가능 일시';
$string['availablefrom_help'] = '접근 시작/종료일은 학생들이 강좌 페이지의 링크를 통하여 활동에 접속할 수 있는 기간을 결정합니다.

접근 시작일/종료일 날자와 활동 사용가능 설정의 차이는 설정된 기간 이외에 학생들이 사용가능 설정의 경우 활동 설명을 볼 수 있지만 접속 시작/종료일의 경우에는 접근이 불가능합니다.';
$string['availableuntil'] = '접근 종료 일시';
$string['badavailabledates'] = '날짜 오류. 두 날을 설정하는 경우, 공개 개시일은 종료 날짜보다 빨라야 합니다.';
$string['completion_complete'] = '완료 표시';
$string['completioncondition'] = '활동 완료 조건';
$string['completioncondition_help'] = '이 설정은 활동이 사용가능하기 위해서 충족해야 하는 활동 완료조건을 결정합니다. 활동 완료 조건이 설정되기 전에 완료 추적이 먼저 설정되어야 합니다.

원한다면 여러개의 활동 완료 조건들을 설정할 수 있습니다. 이런 경우 모든 활동 완료 조건이 충족되어야 활동이 사용가능하게 될 것입니다.';
$string['completionconditionsection'] = '활동 완료 조건';
$string['completion_fail'] = '실패 성적으로 완료';
$string['completion_incomplete'] = '미완료';
$string['completion_pass'] = '통과 성적으로 완료';
$string['configenableavailability'] = '활성화되면, 이것은 활동에 접근할 수 있는지를 제어하는 조건들 (날짜, 성적 혹은 완료 상태에 기반한) 을 설정할 수 있게 합니다.';
$string['contains'] = '포함';
$string['doesnotcontain'] = '제외';
$string['enableavailability'] = '조건적 접근 활성화';
$string['endswith'] = '끝말';
$string['grade_atleast'] = '최소 &ge;';
$string['gradecondition'] = '성적 요건';
$string['gradecondition_help'] = '이것은 활동을 이용하기 위해 충족시켜야 할 성적 조건을 설정합니다.
필요하다면 복수의 성적 조건을 설정할 수도 있습니다. 만일 그렇게 하면, 모든 성적 조건이 충족되어야 활동을 이용할 수 있습니다.';
$string['gradeconditionsection'] = '채점 조건';
$string['gradeitembutnolimits'] = '상한값 및 하한값 혹은 두 값을 입력해야 합니다.';
$string['gradelimitsbutnoitem'] = '채점 항목을 선택해야 합니다.';
$string['gradesmustbenumeric'] = '최소 및 최대 성적은 숫자(혹은 공백)여야 합니다.';
$string['grade_upto'] = '최대 &lt;';
$string['groupingnoaccess'] = '이 섹션에 접근 권한이 있는 모둠에 속하지 않습니다.';
$string['isempty'] = '비었음';
$string['isequalto'] = '동일';
$string['none'] = '(없음)';
$string['notavailableyet'] = '아직 이용할 수 없음';
$string['requires_completion_0'] = '<strong>{$a}</strong> 활동을 마치지 못하는 한,  이용할 수 없음';
$string['requires_completion_1'] = '<strong>{$a}</strong> 활동이 완료로 표시되기 전까지 이용할 수 없음';
$string['requires_completion_2'] = '<strong>{$a}</strong> 활동을 통과점수로 완료하기 전까지 이용할 수 없음';
$string['requires_completion_3'] = '<strong>{$a}</strong> 활동을 낙제점수로 완료하기 전까지 이용할 수 없음';
$string['requires_date'] = '{$a} 부터 이용할 수 있음';
$string['requires_date_before'] = '{$a} 까지 이용할 수 있음';
$string['requires_date_both'] = '{$a->from} 부터 {$a->until} 까지 가능';
$string['requires_date_both_single_day'] = '사용가능일 {$a}';
$string['requires_grade_any'] = '<strong>{$a}</strong>에서 성적을 얻을 때까지 이용할 수 없습니다.';
$string['requires_grade_max'] = '<strong>{$a}</strong>에서 적정 점수를 얻지 못하는 한, 이용할 수 없음';
$string['requires_grade_min'] = '<strong>{$a}</strong>에서 요구된 최소 점수을 얻을 때까지 이용할 수 없음';
$string['requires_grade_range'] = '<strong>{$a}</strong>에서 일정 범위의 점수를 얻지 못하는 한, 이용할 수 없음';
$string['showavailability'] = '할동이 접근되기 전';
$string['showavailability_hide'] = '활동 완전 감추기';
$string['showavailabilitysection'] = '섹션이 접근될 수 있기 전에';
$string['showavailabilitysection_hide'] = '섹션 모두 감추기';
$string['showavailabilitysection_show'] = '제한 정보와 함께 섹션을 회색으로 보이기';
$string['showavailability_show'] = '제한 조건과 함께 비공식적으로 활동을 공개';
$string['startswith'] = '시작';
$string['userfield'] = '사용자 항목';
$string['userrestriction_hidden'] = '제한됨 (완전 감추기, 메시지 없이): ‘{$a}’';
$string['userrestriction_visible'] = '제한됨: {$a}';
