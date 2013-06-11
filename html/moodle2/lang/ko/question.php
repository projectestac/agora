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
 * Strings for component 'question', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = '행동';
$string['addanotherhint'] = '힌트 추가';
$string['addcategory'] = '범주 추가';
$string['adminreport'] = '질문 데이터베이스의 잠재적 문제점 보고서';
$string['answer'] = '답';
$string['answersaved'] = '답이 저장되었습니다.';
$string['attemptfinished'] = '시도가 완료되었습니다.';
$string['attemptfinishedsubmitting'] = '시도가 완료되어 제출합니다.';
$string['availableq'] = '이용가능?';
$string['badbase'] = '**: {$a}** 이전의 잘못된 베이스';
$string['behaviour'] = '작동';
$string['behaviourbeingused'] = '사용되는 질문진행방식: {$a}';
$string['broken'] = '없는 파일로 연결된 "깨진 링크"임';
$string['byandon'] = '<em>{$a->user}</em>가 <em>{$a->time}</em>에';
$string['cannotcopybackup'] = '백업파일 복사 실패';
$string['cannotcreate'] = 'question_attempts 테이블에 새 항목을 생성할 수 없음';
$string['cannotcreatepath'] = '{$a} 경로를 생성할 수 없음';
$string['cannotdeletebehaviourinuse'] = '질문진행 방식 \'{$a}\'을 제거 할 수 없습니다. 질문시도에서 사용중입니다.';
$string['cannotdeletecate'] = '이 문맥의 기본 범주이기 때문에 지울 수 없음';
$string['cannotdeletemissingbehaviour'] = '누락된 질문진행방식을 제거할 수 없습니다. 시스템에서 필요로 합니다.';
$string['cannotdeletemissingqtype'] = '없는 질문 유형은 삭제할 수 없습니다.';
$string['cannotdeleteneededbehaviour'] = '질문 진행방식 \'{$a}\'을 삭제할 수 없습니다. 그것에 의존하는  다른 질문진행방식이 설치되어 있습니다.';
$string['cannotdeleteqtypeinuse'] = '\'{$a}\' 질문 유형은 삭제할 수 없습니다. 질문 은행에 이 형식의 문제들이 있습니다.';
$string['cannotdeleteqtypeneeded'] = '\'{$a}\' 질문 유형은 삭제할 수 없습니다. 이와 관련된 다른 질문 유형들이 설치되어 있습니다.';
$string['cannotenable'] = '{$a} 질문 유형을 직접 만들 수 없음';
$string['cannotenablebehaviour'] = '질문 진행 방식 {$a} 은 직접 사용할 수 없습니다. 내부용입니다.';
$string['cannotfindcate'] = '범주 기록을 찾을 수 없음';
$string['cannotfindquestionfile'] = '압축파일에서 질문 자료를 찾을 수 없음';
$string['cannotgetdsfordependent'] = '숫자집합 의존 질문에 대한 지정한 숫자집합을 가져올 수 없습니다!(질문: {$a->id}, 숫자집합항목: {$a->item})';
$string['cannotgetdsforquestion'] = '계산형 질문에서 지정한 숫자집합을 얻을 수 없음! (질문: {$a})';
$string['cannothidequestion'] = '질문을 숨길 수 없음';
$string['cannotimportformat'] = '죄송합니다만, 이 형식은 아직 가져올 수 없습니다!';
$string['cannotinsertquestion'] = '새 질문을 추가할 수 없음!';
$string['cannotinsertquestioncatecontext'] = 'contextid {$a->ctx} 가 잘못되었기 때문에, 질문 범주 {$a->cat} 를 추가할 수 없음';
$string['cannotloadquestion'] = '질문을 탑재할 수 없음';
$string['cannotmovequestion'] = '다른 영역과 연관되어 있는 질문을 이동시키는 데 이 스크립트를 사용할 수 없습니다.';
$string['cannotopenforwriting'] = '{$a} 을 써 넣을 수 없음';
$string['cannotpreview'] = '이 질문들은 미리 볼 수 없음!';
$string['cannotread'] = '가져오기한 파일(비어있거나)을 읽을 수 없음';
$string['cannotretrieveqcat'] = '질문 범주를 불러올 수 없음';
$string['cannotunhidequestion'] = '질문 감추기 해제 실패';
$string['cannotunzip'] = '파일을 풀 수 없음';
$string['cannotwriteto'] = '가져온 질문을 {$a} 에 기록할 수 없음';
$string['category'] = '범주';
$string['categorycurrent'] = '현재 범주';
$string['categorycurrentuse'] = '이 범주를 사용';
$string['categorydoesnotexist'] = '존재하지 않는 범주';
$string['categoryinfo'] = '범주 정보';
$string['categorymove'] = '\'{$a->name}\' 범주는 {$a->count} 개의  질문을 포함하고 있습니다. <br />이동할 수 있는 다른 범주를 선택하여 주시기 바랍니다.';
$string['categorymoveto'] = '범주에 저장';
$string['categorynamecantbeblank'] = '범주 이름은 공백일 수 없습니다.';
$string['changeoptions'] = '옵션 변경';
$string['changepublishstatuscat'] = '"{$a->coursename}" 강좌의 <a href="{$a->caturl}">"{$a->name}" 범주</a>는 <strong>{$a->changefrom} 에서 {$a->changeto}</strong>로 공유상태가 변경될 것임';
$string['check'] = '체크';
$string['chooseqtypetoadd'] = '추가할 문형 선택';
$string['clearwrongparts'] = '잘못된 응답 지움';
$string['clickflag'] = '질문에 표시';
$string['clicktoflag'] = '추후 참조하기 위해 질문에 표시';
$string['clicktounflag'] = '표시 제거';
$string['clickunflag'] = '표시 제거';
$string['closepreview'] = '미리보기 닫기';
$string['combinedfeedback'] = '결합된 피드백';
$string['comment'] = '코멘트';
$string['commented'] = '코멘트됨 : {$a}';
$string['commentormark'] = '코멘트 하거나 점수 덮어쓰기';
$string['comments'] = '코멘트';
$string['commentx'] = '코멘트: {$a}';
$string['complete'] = '완료';
$string['contexterror'] = '어떤 범주를 다른 문맥으로 옮기지 않는 한, 여기에 들어올 수 없습니다.';
$string['copy'] = '{$a} 에서 복사후 연결';
$string['correct'] = '맞음';
$string['correctfeedback'] = '모든 정답에 대해서';
$string['created'] = '생성됨';
$string['createdby'] = '만든이';
$string['createdmodifiedheader'] = '생성/마지막 저장됨';
$string['createnewquestion'] = '새 질문 만들기 ...';
$string['cwrqpfs'] = '하위 범주에서 추출한 무작위 질문';
$string['cwrqpfsinfo'] = '<p>무들 1.9판으로 판올림하는 과정에서 질문 범주를 다른 영역으로 구분할 것입니다. 대개의 질문 및 질문 범주는 공유상태가 변해야 할 것입니다. 드문 경우이긴 하겠지만 질문지(퀴즈)에 \'무작위\' 질문이 포함되어 있을 경우, 공유 혹은 비공유 범주 중에서 선택해야 할 필요가 있습니다. 이는 \'무작위\' 질문을 하위 범주에서 선택하게 할 때와, 하나 이상의 하위 범주가, 질문이 생성된 상위 범주와 서로 다른 공유 상태일 때 발생하게 됩니다.</p>
<p>다음의 질문 범주들, 즉 \'무작위\' 질문이 선택된 상위 범주들은 무들 1.9판으로 판올림되면서 \'무작위\' 질문과 동일한 공유상태로 변해야 합니다. 따라서 다음의 범주들은 공유상태가 변할 것입니다. 관련된 질문들을 퀴즈에서 삭제하지 않는 한, 기존의 모든 퀴즈에서 잘 동작할 것입니다.</p>';
$string['cwrqpfsnoprob'] = '여러분의 사이트에는 소위 "하위 범주에서 추출한 무작위 질문" 때문에 생기는 문제점이 발견되지 않았습니다.';
$string['decimalplacesingrades'] = '성적에서 소수점이하 자리수';
$string['defaultfor'] = '{$a} 의 기본설정';
$string['defaultinfofor'] = '질문의 기본 범주가 문맥 \'{$a}\'에서 공유되었습니다.';
$string['defaultmark'] = '기본  점수';
$string['deletebehaviourareyousure'] = '질문 진행 {$a} 방식 삭제: 확실합니까?';
$string['deletecoursecategorywithquestions'] = ' 본 강좌의 범주와 연계된 질문 은향에 질문들이 있습니다. 계속 진행하게 되면 이들이 삭제될 것입니다. 이들을 이동시키고 싶으면 질문은행 인터페이스를 사용하기 바랍니다.';
$string['deleteqtypeareyousure'] = '정말 \'{$a}\' 문형을 삭제하겠습니까?';
$string['deleteqtypeareyousuremessage'] = '지금  \'{$a}\' 질문 유형을 완전히 삭제하라고 했습니다. 정말 이 질문 유형을 완전히 제거하겠습니까?';
$string['deletequestioncheck'] = '\'{$a}\'를 삭제하는 것이 확실합니까?';
$string['deletequestionscheck'] = '다음 질문을 삭제하는 것이 확실합닊? <br /><br />{$a}';
$string['deletingbehaviour'] = '질문 진행 \'{$a}\' 방식 삭제';
$string['deletingqtype'] = '\'{$a}\' 질문 유형 삭제';
$string['didnotmatchanyanswer'] = '[어떤 대답과도 일치하지 않습니다]';
$string['disabled'] = '불가능';
$string['disterror'] = '{$a} 배포판은 문제가 있음';
$string['donothing'] = '파일을 복사/이동시키거나 링크를 변경시키지 마십시오.';
$string['editcategories'] = '범주 변경';
$string['editcategories_help'] = '모든 질문을 하나의 큰 목록에 넣어 두기 보다는 범주와 하위범주에 정리해 놓을 수도 있습니다.

각 범주는 범주안의 질문이 사용될 곳을 결정하는 문맥을 가지고 있습니다.

* 활동 문맥 - 질문이 활동 모듈에서만 사용가능합니다.
* 강좌 문맥 - 질문이 강좌내의 모든 활동 모듈에서 사용가능합니다.
* 강좌 범주 문맥 - 질문이 범주내의 모든 활동 모듈과 강좌에서 사용가능합니다.
* 시스템 문맥 - 질문이 사이트의 모든 강좌와 활동 모듈에서 사용가능합니다.

범주는 질문이 특정 범주에서 추출되는 무작위형 질문에서도 사용됩니다.

';
$string['editcategory'] = '범주 편집';
$string['editingcategory'] = '범주 편집';
$string['editingquestion'] = '질문 편집';
$string['editquestion'] = '질문 편집';
$string['editquestions'] = '질문 편집';
$string['editthiscategory'] = '이 범주 수정';
$string['emptyxml'] = '알 수 없는 오류 - 비어있는 imsmanifest.xml';
$string['enabled'] = '가능';
$string['erroraccessingcontext'] = '문맥에 접근할 수 없음';
$string['errordeletingquestionsfromcategory'] = '{$a} 범주에 있는 질문 삭제 중 오류 발생';
$string['errorduringpost'] = '후처리 과정에서 오류 발생!';
$string['errorduringpre'] = '전처리 과정에서 오류 발생!';
$string['errorduringproc'] = '처리 과정에서 오류 발생!';
$string['errorduringregrade'] = '질문 {$a->qid} 를 재채점할 수 없어서 {$a->stateid} 상태로 됨';
$string['errorfilecannotbecopied'] = '오류: {$a} 파일을 복사할 수 없음';
$string['errorfilecannotbemoved'] = '오류: {$a} 파일을 이동할 수 없음';
$string['errorfileschanged'] = '오류: 양식이 표시된 후 질문에 링크된 파일이 변경되었습니다.';
$string['errormanualgradeoutofrange'] = ' 질문  {$a->name} 에 대한 점수 {$a->grade} 는 0과 {$a->maxgrade} 의 범위를 벗어났습니다. 점수 및 덧글은 저장되지 않았습니다.';
$string['errormovingquestions'] = 'id {$a} 의 질문을 옮기는 중에 오류발생';
$string['errorpostprocess'] = '후 처리과정 중 오류 발생';
$string['errorpreprocess'] = '전 처리과정 중 오류 발생';
$string['errorprocess'] = '처리과정 중 오류 발생';
$string['errorprocessingresponses'] = '응답 처리 중 오류 발생';
$string['errorsavingcomment'] = ' 질문 {$a->name} 의 덧글을 데이터베이스에 저장하던 중 오류발생';
$string['errorsavingflags'] = '표식 상태를 저장하는데 오류';
$string['errorupdatingattempt'] = '시도 {$a->id} 를 데이터베이스에 업데이트하던 중 오류발생';
$string['exportcategory'] = '범주 내보내기';
$string['exportcategory_help'] = '<p align="center"><b>범주 내보내기</b></p>

<p><b>범주:</b>펼침 메뉴는 내보내는 질문으로부터 범주를 추출하여 선택하는데 쓰인다.</p>

<p>대개의 가져오기 유형들(GIFT 및 XML 형식)은 범주 정보가 작성된 파일 안에 포함될 수 있도록 허용하여,
(선택적으로) 범주가 다시 생성될 수 있도록 한다. 이러한 자료가 내장되게 하기위해서는 <b>파일에 범주 기록</b>이라는
표식을 체크해 놓아야만 한다.
만일 이를 선택하면 <b>파일에 영역 기록</b>을 기표하여 범주 영역을 내장할 수 있다. 무들 옛 판과의 호환을 위해서는
영역 옵션을 선택하지 않는게 좋다.</p>';
$string['exporterror'] = '내보내는 중 오류 발생!';
$string['exportfilename'] = '퀴즈';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = '파일로 질문 내보냄';
$string['exportquestions_help'] = '이 기능은 하위 범주를 포함, 범주 전체의  질문을 파일로 내보낼 수 있게 합니다. 다만, 선택한 파일 형식에 따라, 어떤  질문과 질문 유형들은 내보낼 수 없는 경우도 있습니다.';
$string['feedback'] = '피드백';
$string['filecantmovefrom'] = '질문 파일을 옮기고자 하는 곳에서 파일을 제거할 권한이 없기 때문에 질문 파일을 옮길 수 없습니다.';
$string['filecantmoveto'] = '질문 파일을 옮기고자 하는 곳으로 파일을 추가할 권한이 없기 때문에 질문 파일을 옮기거나 복사할 수 없습니다.';
$string['fileformat'] = '파일 형식';
$string['filesareacourse'] = '강좌 파일 구역';
$string['filesareasite'] = '사이트 파일 구역';
$string['filestomove'] = '{$a} 로 이동/복사할까요?';
$string['fillincorrect'] = '올바른 응답을 입력하세요.';
$string['flagged'] = '기표됨';
$string['flagthisquestion'] = '질문에 기표';
$string['formquestionnotinids'] = '질문에 포함된 서식이 questionid에 없음';
$string['fractionsnomax'] = '이 질문 채점을 제대로 하려면 답안 중 하나는 100%를 주어야 합니다.';
$string['generalfeedback'] = '일반적인 피드백';
$string['getcategoryfromfile'] = '파일로부터 범주 추출';
$string['getcontextfromfile'] = '파일로부터 문맥 추출';
$string['hidden'] = '감춰짐';
$string['hintn'] = '힌트(없음)';
$string['hinttext'] = '힌트 문장';
$string['howquestionsbehave'] = '어떻게 질문들이 진행될지';
$string['ignorebroken'] = '깨진 링크 무시';
$string['importcategory'] = '범주 가져오기';
$string['importcategory_help'] = '<p><b>범주:</b>펼침 메뉴는 어느 범주에 가져온 질문을 넣을 것인가를 선택하는 데 쓰인다.</p>

<p>약간의 가져오기 유형들(GIFT 및 XML 형식)은 가져오는 파일 내부에 범주를 지정할 수 있도록 하기도 한다. 이 경우 <b>from file</b> 박스가 반드시 체크되어 있어야 한다. 만일 그렇지 못한 경우, 파일 내부에서 어떤 경로지정을 하더라도 현재 지정된 범주로 저장이 된다.</p>

<p>만일 가져온 파일의 내부에서 범주가 지정된 경우, 현재 경로에 범주가 없으면 새로 생성하게 된다.</p>';
$string['importerror'] = '가져오기 과정에서 오류가 발생하였습니다.';
$string['importerrorquestion'] = '질문 가져오기 오류';
$string['importfromcoursefiles'] = '또는 가져오기할 강좌파일을 선택하세요.';
$string['importfromupload'] = '업로드할 파일을 선택하세요.';
$string['importingquestions'] = '파일에서 {$a} 질문 가져오기';
$string['importparseerror'] = '가져오기 파일을 파싱하는데 오류가 발견되었습니다. 질문들을 가져오기 할 수 없습니다. 정상적인 질문들을 가져오려면 \'오류시 정지\'를 \'아니오\'로 설정하고 다시 시도하십시요.';
$string['importquestions'] = '파일에서 질문 가져오기';
$string['importquestions_help'] = '이 기능은 문서 파일을 이용하여 다양한 형태의 질문들을 가져올 수 있게 합니다. 다만 이 때, 파일은 UTF-8 인코딩을 사용해야만 합니다.';
$string['importwrongfiletype'] = '선택한 파일 유형 ({$a->actualtype})이 가져오기 형식 ({$a->expectedtype}) 과 일치하지 않습니다.';
$string['impossiblechar'] = '불가능한 문자 {$a} 가 괄호 문자로 검출되었음';
$string['includesubcategories'] = '하위 범주의 질문도 보여주기';
$string['incorrect'] = '틀림';
$string['incorrectfeedback'] = '틀린 응답에 대해';
$string['information'] = '정보';
$string['invalidanswer'] = '불완전한 답';
$string['invalidarg'] = '잘못된 질의거나 서버 설정이 잘못되어 있음';
$string['invalidcategoryidforparent'] = '상위에 잘못된 범주 id!';
$string['invalidcategoryidtomove'] = '이동할 수 없는 범주 id!';
$string['invalidconfirm'] = '인증키가 바르지 않음';
$string['invalidcontextinhasanyquestions'] = '잘못된 문맥이 question_context_has_any_questions로 전달됨';
$string['invalidgrade'] = '성적이 성적 옵션과 맞지 않습니다. 질문을 생략합니다.';
$string['invalidpenalty'] = '무효한 벌점';
$string['invalidwizardpage'] = '잘못되거나 없는 마법사 페이지를 지정했음!';
$string['lastmodifiedby'] = '최종 교정자';
$string['linkedfiledoesntexist'] = '연결된 {$a} 파일 없음';
$string['makechildof'] = '\'{$a}\'의 하위 생성';
$string['makecopy'] = '복사본 만들기';
$string['maketoplevelitem'] = '최 상위 단계로 이동';
$string['manualgradeoutofrange'] = '성적이 유효한 범위를 벗어났습니다.';
$string['manuallygraded'] = '수동채점 {$a->mark} 코멘트: {$a->comment}';
$string['mark'] = '표식';
$string['markedoutof'] = '다음 점수 중에서 점수 받음';
$string['markedoutofmax'] = '{$a} 중 받은 점수';
$string['markoutofmax'] = '{$a->max} 중 점수 {$a->mark}';
$string['marks'] = '점수';
$string['matchgrades'] = '성적 대응';
$string['matchgradeserror'] = '성적이 목록에 없으면 오류';
$string['matchgrades_help'] = '외부에서 가져오는 성적은 유효한 성적 목록중의 한 값고 일치해야만 합니다 - 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0 (음수값도 역시 허용됩니다) 그렇지 않은 경우 여기에는 두 가지 옵션이 있습니다.
* 성적이 목록에 없을 때 오류 - 만일 가져오려는 질문에 목록에 없는 점수가 있을 때는 오류메시지를 내고 그 질문을 가져오지 않을 것입니다.
* 목록에 없을 때 가장 근접한 성적 - 만일 목록에 일치하는 값이 없을 때는 목록에서 가장 근접한 값으로 점수가 변경됩니다.';
$string['matchgradesnearest'] = '목록에 없으면 가장 가까운 점수';
$string['missingcourseorcmid'] = '질문을 인쇄하기 위해서는 courseid나 cmid가 필요함';
$string['missingcourseorcmidtolink'] = '질문 편집 링크를 걸기 위해서는 courseid나 cmid가 필요함';
$string['missingimportantcode'] = '본 질문 유형은 다음의 주요 코드가 없습니다: {$a}';
$string['missingoption'] = '답 내장형 질문 {$a} 에 옵션 누락';
$string['modified'] = '수정됨';
$string['move'] = '{$a} 에서 이동되어 링크가 변경';
$string['movecategory'] = '범주 이동';
$string['movedquestionsandcategories'] = '{$a->oldplace} 에서 {$a->newplace} 로 질문 및 범주 이동';
$string['movelinksonly'] = '링크의 연결점만 변경시키고 파일을 복사하거나 이동시키지 마십시오.';
$string['moveq'] = '질문 이동';
$string['moveqtoanothercontext'] = '다른 문맥으로 질문 이동';
$string['moveto'] = '이동 >>';
$string['movingcategory'] = '범주 이동';
$string['movingcategoryandfiles'] = '정말 {$a->name}범주로 옮기고 모든 하위 범주를 "{$a->contextto}" 문맥으로 옮기겠습니까?<br /> 그리고 {$a->urlcount}개의 파일이 {$a->fromareaname} 속에 링크되어 있는 데, 이들을 {$a->toareaname}로 이동시키거나 복사하겠습니까?';
$string['movingcategorynofiles'] = '정말 범주를 "{$a->name}"로 옮기고 모든 하위 범주를 "{$a->contextto}" 문맥으로 옮기겠습니까?';
$string['movingquestions'] = '질문 및 파일 이동';
$string['movingquestionsandfiles'] = '정말 {$a->questions}  질문을 <strong>"{$a->tocontext}"</strong> 문맥으로 옮기겠습니까? <br />{$a->urlcount} 개의 파일이 {$a->fromareaname} 속의 질문들과 링크되어 있는 데, 이들을 {$a->toareaname}로 이동시키거나 복사하겠습니까?';
$string['movingquestionsnofiles'] = '정말 {$a->questions}  질문을 <strong>"{$a->tocontext}"</strong> 문맥으로 옮기겠습니까? <br />{$a->fromareaname} 속에는 질문과 연결된 파일이 하나도 없습니다.';
$string['needtochoosecat'] = '질문을 이동시키려면 범주를 선택하고 그렇지 않으면 \'취소\'를 누르세요.';
$string['nocate'] = '{$a} 범주는 없음!';
$string['nopermissionadd'] = '여기에 질문을 추가시킬 권한이 없습니다.';
$string['nopermissionmove'] = ' 질문을 이동시킬 수 있는 권한이 없습니다. 이 범주에  질문을 저장하거나 새  질문으로 저장하십시오.';
$string['noprobs'] = '질문 은행 데이터베이스에는 아무런 문제점도 없습니다.';
$string['noquestionsinfile'] = '가져온 파일에 질문이 없음';
$string['noresponse'] = '[무응답]';
$string['notanswered'] = '답하지 않음';
$string['notenoughanswers'] = '이런 유형의 질문은 최소 {$a} 의 답이 있어야 합니다.';
$string['notenoughdatatoeditaquestion'] = '질문 아이디, 범주 아이디 및  질문 유형 등이 지정되지 않았습니다.';
$string['notenoughdatatomovequestions'] = '질문을 이동시키기 위해서 질문 id를 제공해야 합니다.';
$string['notflagged'] = '기표되지 않음';
$string['notgraded'] = '채점되지 않음';
$string['notshown'] = '보여지지 않음';
$string['notyetanswered'] = '아직 답하지 않음';
$string['notyourpreview'] = '이 미리보기는 ';
$string['novirtualquestiontype'] = '질문 유형 {$}에 대한 가상 질문 유형이 없습니다.';
$string['numqas'] = '시도 횟수';
$string['numquestions'] = '질문 번호';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} 비공개)';
$string['options'] = '옵션';
$string['orphanedquestionscategory'] = '삭제된 범주에서 저장한 질문';
$string['page-question-category'] = '질문 범주 페이지';
$string['page-question-edit'] = '질문 편집 페이지';
$string['page-question-export'] = '질문 내보내기 페이지';
$string['page-question-import'] = '질문 가져오기 페이지';
$string['page-question-x'] = '모든 질문 페이지';
$string['parent'] = '부모';
$string['parentcategory'] = '상위 범주';
$string['parentcategory_help'] = '상위범주는 새 범주가 만들어질 수 있는 범주입니다. "최상의 범주"는 범주가 다른 어떤 범주에도 속하지 않는다는 것을 의미합니다. 문맥범주는 굵은 글씨체로 표시됩니다. 각 문맥에는 최소 한개의 범주가 있어야 합니다.';
$string['parenthesisinproperclose'] = '{$a}**의 ** 앞에 있는 괄호는 제대로 닫히지 않았음';
$string['parenthesisinproperstart'] = '{$a}**의 ** 앞에 있는 괄호가 없음';
$string['parsingquestions'] = '가져오기 파일에서 질문 파싱';
$string['partiallycorrect'] = '부분적으로 맞음';
$string['partiallycorrectfeedback'] = '부분적으로 옳은 응답에 대해';
$string['penaltyfactor'] = '감점 비율';
$string['penaltyfactor_help'] = '이 설정은 틀린답에 대해 획득한 점수의 얼마나 많은 부분이 감점되어야 하는 것을 결정합니다.. 이는 퀴즈가 적응모드로 구동되어서 학생들이 반복적으로 질문을 풀 수 있을 경우에 의미가 있습니다. 감점 비율은 0에서 1 사이의 숫자로 주어야 합니다. 감점 비율이 1이라는 의미는 학생들이 질문을 풀 때 제일 첫번에 정답을 맞춰야만 질문에 배정된 모든 점수를 얻을 수 있다는 것입니다. 감점 비율 0이라는 것은 몇 번이건 다시 풀어도 정답만 맞추면 배점을 모두 얻을 수 있다는 것을 의미합니다.</p>';
$string['penaltyforeachincorrecttry'] = '각각의 틀린 시도들에 대한 벌점';
$string['permissionedit'] = '질문 편집';
$string['permissionmove'] = '질문 이동';
$string['permissionsaveasnew'] = '새 질문으로 저장';
$string['permissionto'] = '당신은 다음 권한을 가지고 있습니다. :';
$string['previewquestion'] = '질문 미리 보기: {$a}';
$string['published'] = '공유함';
$string['qtypedeletefiles'] = '질문 유형 \'{$a->qtype}\'과 관련된 모든 자료들이 데이터베이스에서 삭제되었습니다. 삭제 과정을 완결하기 위해서는 (추후 다시 설치되는 것을 막기 위해서), 서버의 {$a->directory} 를 삭제해야만 합니다.';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '본 질문 범주에는 <a href="{$a->qurl}">질문 "{$a->name}" ({$a->qtype})</a>이 있는데, 다른 강좌인 "{$a->coursename}"의 <a href="{$a->qurl}">퀴즈 "{$a->quizname}"</a>에서 사용되고 있습니다.';
$string['questionbank'] = '질문 은행';
$string['questionbehaviouradminsetting'] = '질문 진행방식 설정';
$string['questionbehavioursdisabled'] = '비활성화할 질문 진행방식';
$string['questionbehavioursdisabledexplained'] = '드롭다운 메뉴에 나타나지 않기를 원하는 질문진행방식의 목록을 콤마로 분리하여 입력하십시요.';
$string['questionbehavioursorder'] = '질문 진행방식 순서';
$string['questionbehavioursorderexplained'] = '드롭다운 메뉴에 나타나기를 원하는 순서대로 질문진행방식의 목록을 콤마로 분리하여 입력하십시요.';
$string['questioncategory'] = '질문 범주';
$string['questioncatsfor'] = '\'{$a}\'의 질문 범주';
$string['questiondoesnotexist'] = '질문이 존재하지 않음';
$string['questionidmismatch'] = '질문 아이디 불일치';
$string['questionname'] = '질문 이름';
$string['questionno'] = '질문 {$a}';
$string['questions'] = '질문들';
$string['questionsaveerror'] = '질문 ({$a}) 저장 중 오류 발생';
$string['questionsinuse'] = '(* 별표가 있는 질문들은 어떤 퀴즈에서 이미 사용되고 있습니다. 이 질문들은 이들 퀴즈에서 삭제되지 않고, 범주 목록에서만 삭제됩니다)';
$string['questionsmovedto'] = '사용중인 질문이 상위 강좌 범주의 "{$a}"로 이동됨';
$string['questionsrescuedfrom'] = '{$a} 문맥으로 부터 저장된 질문들';
$string['questionsrescuedfrominfo'] = '이 질문들은 (어떤 것들은 감추어져 있을지 모르지만) 다른 활동 또는 퀴즈에서 여전히 쓰이고 있기 때문에 비록 문맥 {$a}이 삭제됐다 하더라도 저장되어 있습니다.';
$string['questiontext'] = '질문 문장';
$string['questiontype'] = '질문 유형';
$string['questionuse'] = '이 활동에 질문 사용';
$string['questionvariant'] = '변형된 질문';
$string['questionx'] = '질문 {$a}';
$string['requiresgrading'] = '채점 필요';
$string['responsehistory'] = '응답 이력';
$string['restart'] = '다시 시작';
$string['restartwiththeseoptions'] = '이 옵션으로 다시 시작';
$string['reviewresponse'] = '응답 검토';
$string['rightanswer'] = '정답';
$string['save'] = '저장';
$string['saved'] = '저장됨 {$a}';
$string['saveflags'] = '표식 상태 저장';
$string['selectacategory'] = '범주 선택 :';
$string['selectaqtypefordescription'] = '설명을 보기위한 질문 유형 선택';
$string['selectcategoryabove'] = '위의 범주 선택';
$string['selectquestionsforbulk'] = '대량 활동에 쓰일 질문 선택';
$string['settingsformultipletries'] = '여러번 시도에 대한 설정';
$string['shareincontext'] = ' {$a}에 대한 문맥에서 공유';
$string['showhidden'] = '오래된 질문도 보여주기';
$string['showmarkandmax'] = '점수와 최대점수 보여주기';
$string['showmaxmarkonly'] = '최대 표식만 표시';
$string['shown'] = '보여짐';
$string['shownumpartscorrect'] = '올바른 응답의 갯수 보이기';
$string['shownumpartscorrectwhenfinished'] = '질문이 완료되면 올바른 응답의 수를 보여주기';
$string['showquestiontext'] = '질문 목록에 질문 문장 보이기';
$string['specificfeedback'] = '구체적인 피드백';
$string['specificfeedback_help'] = '학생이 한 응답에 따라 다른 피드백';
$string['started'] = '시작함';
$string['state'] = '상태';
$string['step'] = '단계';
$string['stoponerror'] = '오류가 있으면 중지';
$string['stoponerror_help'] = '이 설정은 오류가 검출되었을때 가져오기 과정을 중지해서 아무런 질문도 가져오지 않게 할지 혹은 오류가 있는 질문을 무시하고 유효한 질문들을 가져올 것인지를 결정합니다.';
$string['submissionoutofsequence'] = '순서에 벗어난 접근. 퀴즈 질문에 대해 작업중에는 뒤로가기 버튼을 클릭하지 마십시요.';
$string['submit'] = '제출';
$string['submitandfinish'] = '제출하고 종료';
$string['submitted'] = '제출: {$a}';
$string['technicalinfo'] = '기술적인 정보';
$string['technicalinfominfraction'] = '최소 분수:  {$a}';
$string['technicalinfoquestionsummary'] = '질문 요약:  {$a}';
$string['technicalinforightsummary'] = '정답 요약:{$a}';
$string['technicalinfostate'] = '질문 상태: {$a}';
$string['tofilecategory'] = '파일에 범주 기입';
$string['tofilecontext'] = '파일에 문맥 기입';
$string['uninstallbehaviour'] = '이 질문 진행방식 제거';
$string['uninstallqtype'] = '이 질문 유형 제거';
$string['unknown'] = '알수없음';
$string['unknownbehaviour'] = '알 수 없는 작동: {$a}';
$string['unknownorunhandledtype'] = '알수없는 혹은 처리되지 않은 질문 유형: {$a}';
$string['unknownquestion'] = '알수 없는 질문: {$a}';
$string['unknownquestioncatregory'] = '알수 없는 질문 범주: {$a}';
$string['unknownquestiontype'] = '{$a} 질문 유형은 없습니다.';
$string['unknowntolerance'] = '알 수 없는 오차 유형 {$a}';
$string['unpublished'] = '공유되지 않음';
$string['upgradeproblemcategoryloop'] = '질문 범주를 업데이트하려는데 문제 발견. 범주 트리에 고리가 있습니다. 영향받는 범주 ID는 {$a} 입니다';
$string['upgradeproblemcouldnotupdatecategory'] = '질문 범주 {$a->name} ({$a->id}) 를 업데이트할 수 없음';
$string['upgradeproblemunknowncategory'] = '질문 범주를 업데이트하려는데 문제 발견. 범주  {$a->id} 가 {$a->parent} 에 속해있다고 하는데, 존재하지 않는 범주입니다. 해결하기 위해 상위 범주가 변경되었습니다.';
$string['whethercorrect'] = '올바른지';
$string['withselected'] = '선택된';
$string['wrongprefix'] = '접두사 {$a} 의 형식 오류';
$string['xoutofmax'] = '{$a->max} 중 {$a->mark}';
$string['yougotnright'] = '올바르게 {$a->num}.을 선택하였습니다.';
$string['youmustselectaqtype'] = '반드시 질문 유형을 지정해야 합니다.';
$string['yourfileshoulddownload'] = '내보낸 파일은 즉시 내려받기가 됩니다. 만일 자동으로 내려받기가 되지 않으면 <a href="{$a}">여기</a>를 클릭하세요.';
