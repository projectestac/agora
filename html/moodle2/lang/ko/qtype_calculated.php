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
 * Strings for component 'qtype_calculated', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = '항목 추가';
$string['addmoreanswerblanks'] = '답안란 추가';
$string['addsets'] = '집합 추가';
$string['answerdisplay'] = '답 표시';
$string['answerformula'] = '답 {$a} 공식';
$string['answerhdr'] = '답안';
$string['answerstoleranceparam'] = '혀용오차 계수';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = '어떤 값';
$string['atleastoneanswer'] = '적어도 하나 이상의 답안을 제공해야 합니다.';
$string['atleastonerealdataset'] = '질문지에 적어도 하나 이상의 숫자집합이 있어야만 함';
$string['atleastonewildcard'] = '질문지나 답안 공식에 적어도 하나 이상의 와일드카드가 있어야만 함';
$string['calcdistribution'] = '분산';
$string['calclength'] = '소수 자리';
$string['calcmax'] = '최대값';
$string['calcmin'] = '최소값';
$string['choosedatasetproperties'] = '와일드카드 숫자집합 속성을 선택하십시요';
$string['choosedatasetproperties_help'] = '숫자집합은 와일드카드 대신 들어갈 수들의 집합입니다. 지정된 질문을 위한 개별적인 숫자집합을 만들 수도 있고, 범주 내 타 계산형 질문에서 쓰일 수 있는 공유 숫자집합을 만들 수도 있습니다. ';
$string['correctanswerformula'] = '정답 공식';
$string['correctanswershows'] = '정답제시형태';
$string['correctanswershowsformat'] = '형식';
$string['correctfeedback'] = '모든 정확한 반응에 대해';
$string['dataitemdefined'] = '이미 정의된 {$a} 수치값을 이용할 수 있음';
$string['datasetrole'] = '와일드카드 <strong>{x..}</strong>는 숫자집합에서 수치로 치환될 것입니다.';
$string['decimals'] = '{$a}로';
$string['deleteitem'] = '항목 삭제';
$string['deletelastitem'] = '마지막 항목 삭제';
$string['distributionoption'] = '배포 옵션 선택';
$string['editdatasets'] = '와일드카드 숫자집합 편집';
$string['editdatasets_help'] = '임의 값들은 각 와일드카드에 해당하는 값들을 넣은 후 "추가" 버튼을 누르면 만들어 진다. 자동으로 10 또는 그 이상의 값을 만들고 싶으면, "추가" 버튼을 누르기 전에 필요한 값의 갯수를 선택하면 된다. 균일 분산이란 한계 내에서 동일하게 생성될 수 있음을 의미한다. 로그형 분산이란, 하위 한계에 다가갈수록 더 자주 나타날 분포를 말한다.   ';
$string['existingcategory1'] = '기존의 공유 숫자집합 사용';
$string['existingcategory2'] = '본 범주의 다른 질문에서도 사용된 기존 파일 집합 중의 한 파일';
$string['existingcategory3'] = '본 범주의 다른 질문에서도 사용된 기존 링크 집합 중의 한 링크';
$string['forceregeneration'] = '강제로 재생성';
$string['forceregenerationall'] = '모든 와일드카드 강제 재생성';
$string['forceregenerationshared'] = '공유되지 않은 숫자집합만 강제 재생성';
$string['functiontakesatleasttwo'] = '함수 {$a}는 최소 2개의 인수가  갖아야만 합니다.';
$string['functiontakesnoargs'] = '함수 {$a}는 인수가 없습니다.';
$string['functiontakesonearg'] = '함수 {$a}는 오직 한개의 인수를  갖아야만 합니다.';
$string['functiontakesoneortwoargs'] = '함수 {$a}는  한개 혹은 두개의 인수를  갖아야만 합니다.';
$string['functiontakestwoargs'] = '함수 {$a}는 정확히 두개의 인수를 갖아야만 합니다.';
$string['generatevalue'] = '다음 수 안에 사이에 있는 값 생성';
$string['getnextnow'] = '새 "추가할 항목" 가져오기';
$string['hexanotallowed'] = '숫자집합 <strong>{$a->name}</strong>에 16진법 값 $a->value 은 허용되지 않음';
$string['illegalformulasyntax'] = '\'{$a}\'로 시작하는 잘못된 공식 문법';
$string['incorrectfeedback'] = '부정확한 반응에 대해';
$string['itemno'] = '항목 {$a}';
$string['itemscount'] = '항목<br />계수';
$string['itemtoadd'] = '추가할 항목';
$string['keptcategory1'] = '이전과 같은 기존의 공유 숫자집합 사용';
$string['keptcategory2'] = '이전처럼 동일 범주의 재사용 가능한 파일묶음에서 가져온 파일';
$string['keptcategory3'] = '이전처럼 동일 범주의 재사용 가능한 링크묶음에서 가져온 링크';
$string['keptlocal1'] = '이전과 같은 기존의 비공개 숫자집합 사용';
$string['keptlocal2'] = '이전처럼 동일 질문의 비공개 파일들로부터의 파일';
$string['keptlocal3'] = '이전처럼 동일 질문의 개인 링크묶음에서 가져온 링크';
$string['lengthoption'] = '길이 옵션 선택';
$string['loguniform'] = '로그분포';
$string['loguniformbit'] = '자리수, 로그균등 분포에서';
$string['makecopynextpage'] = '다음 페이지(새 질문)';
$string['mandatoryhdr'] = 'Mandatory wild cards present in answers';
$string['max'] = '최대';
$string['min'] = '최소';
$string['minmax'] = '값의 범위';
$string['missingformula'] = '누락된 공식';
$string['missingname'] = '누락된 질문 이름';
$string['missingquestiontext'] = '누락된 질문 문장';
$string['mustenteraformulaorstar'] = '공식 혹은  \'*\'.을 입력해야 합니다.';
$string['newcategory1'] = '새롭게 공유된 숫자집합 사용';
$string['newcategory2'] = '이 범주의 타 질문에서 사용했을 수도 있는 파일의 새 묶음에서 가져온 파일';
$string['newcategory3'] = '이 범주의 타 질문에서 사용했을 수도 있는 링크의 새 묶음에서 가져온 링크';
$string['newlocal1'] = '새 비공개 숫자집합 사용';
$string['newlocal2'] = '이 질문에서만 사용할 파일의 새 묶음에서 가져온 파일';
$string['newlocal3'] = '이 질문에서만 사용할 링크의 새 묶음에서 가져온 링크';
$string['newsetwildcardvalues'] = '와일드카드 값의 새 묶음';
$string['nextitemtoadd'] = '다음 \'추가할 항목\'';
$string['nextpage'] = '다음 페이지';
$string['nocoherencequestionsdatyasetcategory'] = '범주 id {$a->qcat} 의 질문 id {$a->qid} 에 대해 범주 id {$a->sharedcat}의 공유 와일드카드 {$a->name} 와 일치하지 않습니다.  질문을 편집하십시요.';
$string['nocommaallowed'] = '0.013 혹은 1.3e-2처럼 ,(쉽표)대신 .(마침표)를 사용하세요. ';
$string['nodataset'] = '없음 - 와일드카드 자료가 아님';
$string['nosharedwildcard'] = '범주내에 공유된 와일드카드가 없음';
$string['notvalidnumber'] = '와일드카드 값이 유용한 숫자가 아님';
$string['oneanswertrueansweroutsidelimits'] = '최소 하나의 정답이 실제값 한계 밖에 존재.<br />고급 매개변수처럼 쓸 수 있게 정답의 허용 오차를 조정하라.';
$string['param'] = '매개변수 {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = '부분답에 대해';
$string['pluginname'] = '계산형';
$string['pluginnameadding'] = '계산형 질문 추가';
$string['pluginnameediting'] = '계산형 질문 편집';
$string['pluginname_help'] = '계산형 질문은 퀴즈가 실시될 때, 중괄호 속의 와일드카드 대신 개개의 값으로 대치된 질문이 만들어 질 수 있도록 합니다. 예를 들어 "길이 {l} 과 폭 {w} 로 만들어진 직사각형의 면적은 얼마인가?"라는 질문에 대해서 "{l}*{w}"이 정답 공식이 될 것입니다.(여기서 *는 곱셈기호입니다)';
$string['pluginnamesummary'] = '계산형 질문은 수치형  질문과 유사하나 퀴즈가 치루어질 때 숫자집합에서 무작위로 추출한 숫자를 사용합니다.';
$string['possiblehdr'] = '질문의 문장에 있는 가능한 와일드카드 존재';
$string['questiondatasets'] = '질문 숫자집합';
$string['questiondatasets_help'] = '개별 질문에서 쓰일 와일드카드의 질문 숫자집합';
$string['questionstoredname'] = '질문 이름';
$string['replacewithrandom'] = '무작위 값으로 대치';
$string['reuseifpossible'] = '이전값 재 사용';
$string['setno'] = '집합 {$a}';
$string['setwildcardvalues'] = '와일드카드 값의 집합';
$string['sharedwildcard'] = '공유 와일드카드<strong>{$a}</strong>';
$string['sharedwildcardname'] = '공유 와일드카드';
$string['sharedwildcards'] = '공유 와일드카드';
$string['showitems'] = '표시';
$string['significantfigures'] = '{$a}로';
$string['significantfiguresformat'] = '유효 숫자';
$string['synchronize'] = '타 질문과 공유된 숫자집합에서 자료 동기화';
$string['synchronizeno'] = '동기화하지 않음';
$string['synchronizeyes'] = '동기화';
$string['synchronizeyesdisplay'] = '질문 이름의 접두어를 이용하여 공유 숫자집합 명칭 표시 및 동기화';
$string['tolerance'] = '허용오차';
$string['tolerancetype'] = '유형';
$string['trueanswerinsidelimits'] = '맞은 답: {$a->correct} 은 정답 {$a->true} 의 오차범위에 들어 있음';
$string['trueansweroutsidelimits'] = '<span class="error">정답 오류 : {$a->correct} 은 정답 {$a->true} 의 오차범위 밖에 있음</span>';
$string['uniform'] = '균일 분포';
$string['uniformbit'] = '균일 분포에서 십진수';
$string['unsupportedformulafunction'] = '함수 {$a} 는 지원되지 않습니다.';
$string['updatecategory'] = '범주 업데이트';
$string['updatedatasetparam'] = '숫자집합 매개변수 업데이트';
$string['updatetolerancesparam'] = '허용오차 매개변수 업데이트';
$string['updatewildcardvalues'] = '와일드카드값 업데이트';
$string['useadvance'] = '오류를 보기위한 고급 버튼 사용';
$string['usedinquestion'] = '질문에서 사용됨';
$string['wildcard'] = '와일드카드 {<strong>{$a}</strong>}';
$string['wildcardparam'] = '와일드카드 매개변수는 값을 생성하는데 사용됨';
$string['wildcardrole'] = '와일드카드<strong>{x..}</strong> 는 생성된 값을 수치값으로 치환할 것임';
$string['wildcards'] = '와일드카드 {a}...{z}';
$string['wildcardvalues'] = '와일드카드 값';
$string['wildcardvaluesgenerated'] = '와일드카드 값이 만들어졌습니다.';
$string['youmustaddatleastoneitem'] = '이 질문을 저장하기전에 최소 한개 데이터집합 항목을 추가하여야 합니다.';
$string['youmustaddatleastonevalue'] = '이 질문을 저장하기전에 최소 한개의 와일드 카드 값 집합을 추가해야 합니다.';
$string['zerosignificantfiguresnotallowed'] = '정답은 유효숫자가 0 일 수 없습니다.';
