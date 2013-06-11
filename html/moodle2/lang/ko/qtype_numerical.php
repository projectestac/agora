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
 * Strings for component 'qtype_numerical', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = '허용된 오류';
$string['addmoreanswerblanks'] = '여분 답란 생성';
$string['addmoreunitblanks'] = '여분 단위란 생성';
$string['answermustbenumberorstar'] = '답은 숫자이어야 합니다. 예:  -1.234 혹은 3e8, 혹은 \'*\'.';
$string['answerno'] = '답안 {$a}';
$string['decfractionofquestiongrade'] = '질문 성적의 부분으로(0-1)';
$string['decfractionofresponsegrade'] = '응답 성적의 부분으로(0-1)';
$string['decimalformat'] = '소수점 표현';
$string['editableunittext'] = '텍스트 입력 요소';
$string['errornomultiplier'] = '단위에 대한 배수를 지정해야 합니다.';
$string['errorrepeatedunit'] = '동일한 명칭의 두 단위를 쓸 수 없습니다.';
$string['geometric'] = '기하학적';
$string['invalidnumber'] = '유효한 수를 입력해야 합니다.';
$string['invalidnumbernounit'] = '유효한 수를 입력해야 합니다. 답에 단위를 포함하지 마십시요.';
$string['invalidnumericanswer'] = '입력한 답 중 하나가 유효한 수가 아닙니다.';
$string['invalidnumerictolerance'] = '입력한 허용오차 중 하나가 유효한 수가 아닙니다.';
$string['leftexample'] = '$1.00 혹은  £1.00 와 같이 왼쪽에';
$string['manynumerical'] = '단위는 선택적입니다. 만일 단위가 입력되면 채점하기전에 단위는 단위 1로 환산될때 사용됩니다.';
$string['multiplier'] = '승수';
$string['nominal'] = '명목적인';
$string['noneditableunittext'] = '편집 불가능한 단위 No1 문장';
$string['nonvalidcharactersinnumber'] = '수에 유효한 문자가 없습니다.';
$string['notenoughanswers'] = '적어도 하나의 답안을 작성해야 합니다.';
$string['nounitdisplay'] = '단위 채점 없음';
$string['numericalmultiplier'] = '배수';
$string['numericalmultiplier_help'] = '배수는 맞는 수치적 응답이 곱해지는 요소입니다.

처음 유닛은(Unit 1)은 배수가 1입니다. 만일 맞는 수치적 응답이 5500이고 W를 Unit 1의 단위로 설정하면 올바른 응답은 5500 W  입니다.

만일 kW 단위와 배수로 0.001을 추가하면 정답에 5.5kW가 추가됩니다. 이렇게 하면 5500W와 5.5kW가 맞는 답으로 표시될 것입니다.

허용된 오차도 역시 곱해질 것입니다. 100W의 허용된 오차는 0.1kW 오차가 될 것입니다.';
$string['oneunitshown'] = '단위1이 자동으로 정답 박스 옆에 표사될 것입니다.';
$string['onlynumerical'] = '단위는 전혀 사용되지 않습니다. 수치적 값만 채점됩니다.';
$string['pleaseenterananswer'] = '답을 입력하세요.';
$string['pleaseenteranswerwithoutthousandssep'] = '천단위 구분자 ({$a}).를 사용하지 말고 답을 입력하세요.';
$string['pluginname'] = '수치형';
$string['pluginnameadding'] = '수치형 질문 추가';
$string['pluginnameediting'] = '수치형 질문 편집';
$string['pluginname_help'] = '학생 관점에서 보면 수치형 질문은 단답형 질문처럼 보입니다. 차이는 수치형 질문은 답들이 인정된 오차를 허용한다는 것입니다. 이로 인해 정해진 범위의 답이 하나의 답으로 평가되는 것을 허용합니다. 예를 들면 답이 10이고 허용 오차가 2라면 8에서부터 12까지의 답은 맞은 것으로 인정됩니다.';
$string['pluginnamesummary'] = '다양한 모범답안과 비교하여 채점할 수 있는, 오차 및 단위를 포함할 수 있는 수치로 응답할 수 있게 합니다.';
$string['relative'] = '상대적인';
$string['rightexample'] = '1.00cm 혹은 1.00km와 같이 오른쪽에';
$string['selectunit'] = '한 단위를 선택하십시요.';
$string['selectunits'] = '단위를 선택하세요';
$string['studentunitanswer'] = '단위는 다음을 사용하는 입력입니다.';
$string['tolerancetype'] = '허용 유형';
$string['unit'] = '단위';
$string['unitappliedpenalty'] = '이 채점은 잘 못된 단위에 대해 {$a}의 벌점을 포함하고 있습니다.';
$string['unitchoice'] = '다중선택';
$string['unitedit'] = '단위 편집';
$string['unitgraded'] = '단위를 입력해야 하며, 채점됩니다.';
$string['unithandling'] = '단위 처리';
$string['unithdr'] = '단위 {$a}';
$string['unitincorrect'] = '올바른 단위를 입력하지 않았습니다.';
$string['unitmandatory'] = '필수';
$string['unitmandatory_help'] = '* 응답은 쓰여진 단위를 사용하여 채점될 것입니다.
* 단위 감점은 단위 필드가 비어 있으면 적용됩니다.';
$string['unitnotselected'] = '단위를 선택해야 합니다.';
$string['unitonerequired'] = '적어도 한개 단위를 입력해야 합니다.';
$string['unitoptional'] = '선택적 단위';
$string['unitoptional_help'] = '* 단위 필드가 비어 있지 않으면 응답은 이 단위를 사용하여 채점됩니다.
* 단위가 잘못 쓰여지거나 알 수 없으면 응답은 틀린것으로 간주됩니다.';
$string['unitpenalty'] = '틀린 단위에 대한 감점';
$string['unitpenalty_help'] = '감점은 다음 경우에 적용됩니다.
* 정의되지 않은 단위 이름이 단위 답란에 기재되어 있거나,
* 단위 이름이 숫자 답란에 기재된 경우';
$string['unitposition'] = '단위 위치';
$string['unitselect'] = '드롭다운 메뉴';
$string['validnumberformats'] = '유효한 숫자 형식';
$string['validnumberformats_help'] = '* 보통의 수 13500.67, 13 500.67, 13500,67 또는 13 500,67
* 만일 천 단위 구분자로 , 를 사용하면 소수점은 13,500.67 : 13,500. 에서와 같이 항상  . 으로 표시해야 합니다.
* 지수형식의 경우, 예를 들면 1.350067 * 10<sup>4</sup>은 1.350067 E4 : 1.350067 E04 를 사용하십시요.';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 or 1.350067 E04';
