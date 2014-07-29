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
 * Strings for component 'hotpot', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = '실패';
$string['activitygrade'] = '활동 성적';
$string['added'] = '추가됨';
$string['addquizchain'] = '퀴즈 체인 더하기';
$string['allowreview'] = '검토 허용';
$string['allowreview_help'] = '활성화되면 학생들은 퀴즈가 종료된 후에 퀴즈 시도들을 검토할 수도 있습니다.';
$string['analysisreport'] = '항목 분선';
$string['attemptlimit'] = '시도 한계';
$string['attemptlimit_help'] = '이 HotPot 활동에서 학생이 할 수 있는 최대 시도 횟수';
$string['attemptnumber'] = '시도횟수';
$string['attempts'] = '시도';
$string['attemptscore'] = '시도 점수';
$string['attemptsunlimited'] = '무한 시도';
$string['average'] = '평균';
$string['averagescore'] = '평균 성적';
$string['cacherecords'] = 'HotPot 캐시 레코드';
$string['checks'] = '확인';
$string['checksomeboxes'] = '원하는 박스에 체크하십시요.';
$string['clearcache'] = 'HotPot 캐시 지우기';
$string['cleardetails'] = 'HotPot 세부사항 지우기';
$string['clearedcache'] = 'HotPot 캐시가 지워졌습니다.';
$string['cleareddetails'] = 'HotPot 세부사항이 지워졌습니다.';
$string['clickreporting'] = '보고서 선택 가능';
$string['clickreporting_help'] = '만일 활성화되면 "힌트"나 "실마리" 혹은 "확인"버튼이 클릭될 때마다 별도의 기록이 보관됩니다. 이를 통하여 선생님들은 클릭마다 퀴즈 상태를 보여주는 아주 상세한 보고서를 볼 수 있습니다. 비활성화되면 퀴즈에서 시도마다 한개의 기록이 보관됩니다.';
$string['clicktrailreport'] = '경로를 클릭하세요.';
$string['closed'] = '이 활동은 마감되었습니다.';
$string['clues'] = '힌트';
$string['completed'] = '완료';
$string['configenablecache'] = 'HotPot 퀴즈의 캐시를 사용하면 학습자들에게 퀴즈를 빠르게 제공할 수 있습니다.';
$string['configenablecron'] = 'HotPot 크론 스크립트가 동작할 당신의 시간 대역에서 시간을 명시하십시요.';
$string['configenablemymoodle'] = '이 설정은 HotPot이 내 무들 페이지에 나타날 것인가를 제어합니다.';
$string['configenableobfuscate'] = '미디어 플레이어를 삽입하기 위해 자바스크립트를 복잡하게 하는 것은 미디어 파일 이름을 알아내는 것과 미디어 파일이 무엇을 포함하는지 추측하는 것을 어렵게 합니다.';
$string['configenableswf'] = 'HotPot 활동에서 SWF 파일 임베드 허용. 활성화되면 이 설정은 filter_mediaplugin_enable_swf 을 덮어씁니다.';
$string['configfile'] = '설정 파일';
$string['configframeheight'] = '퀴즈가 프레임에 표시될 때, 이 값은 무들 찾아가기 막대를 포함하는 상단 프레임의 높이(픽셀로)입니다.';
$string['configlocation'] = '설정 파일 위치';
$string['configlockframe'] = '이 설정이 활성화되면 네비게이션 프레임이 사용되는 경우 고정되어 스크롤하거나 크기변경 할 수 없으며 경계도 없게 됩니다.';
$string['confirmdeleteattempts'] = '이 시도들을 삭제하기를 원하십니까?';
$string['confirmstop'] = '이 페이지에서 벗어나기를 원하십니까?';
$string['correct'] = '정답';
$string['couldnotinsertsubmissionform'] = '제출 양식을 삽입할 수 없었습니다.';
$string['delay1'] = '지연 1';
$string['delay1_help'] = '1차시도와 2차 시도사이 최소 시간 지연';
$string['delay1summary'] = '1차시도와 2차 시도사이 시간 지연';
$string['delay2'] = '지연 2';
$string['delay2_help'] = '2차 시도이루 시도간 최소 시간지연';
$string['delay2summary'] = '추후 시도간 시간 지연';
$string['delay3'] = '지연 3';
$string['delay3afterok'] = '학생이 OK를 클릭할때까지 기다림';
$string['delay3disable'] = '자동으로 계속하지 마십시요.';
$string['delay3specific'] = '(초단위로) 특정 시간을 사용';
$string['delay3summary'] = '퀴즈 끝에서 시간 지연';
$string['delay3template'] = '소스/템플릿 파일에 있는 설정사용';
$string['deleteattempts'] = '시도 삭제';
$string['detailsrecords'] = 'HotPot  세부사항 레코드';
$string['d_index'] = '차별 인덱스';
$string['duration'] = '기간';
$string['enablecache'] = 'HotPot 캐시 활성화';
$string['enablecron'] = 'HotPot  크론 활성화';
$string['enablemymoodle'] = '내 무들(누리집)에 HotPot  표시';
$string['enableobfuscate'] = '미디어플레이어 코드 난독화 활성화';
$string['enableswf'] = 'HotPot 활동에서 SWF  파일삽입 허용';
$string['entry_attempts'] = '시도';
$string['entrycm'] = '이전활동';
$string['entrycmcourse'] = '이 강좌에서 이전 활동';
$string['entrycm_help'] = '이 설정은 이 QuizPort 를 시도하기 전에 성취해야 할 무들 활동과  활동에 대핸 최소 점수를 명시합니다.

선생님은 특정 활동 혹은 다음의 일반적인 설정 중 하나를 선택할 수 있습니다.

* 이 강좌에서 이전 활동
* 이 섹션에서 이전 활동
* 이 강좌에서 이전 HotPot
* 이 섹션에서 이전 HotPot';
$string['entrycmsection'] = '이 강좌 섹션에서 이전 활동';
$string['entrycompletionwarning'] = '이 활동을 시작하기전에 {$a} 를 보아야 합니다.';
$string['entry_dates'] = '날짜';
$string['entrygrade'] = '이전 활동 성적';
$string['entrygradewarning'] = '{$a->entryactivity}에서  {$a->entrygrade}% 성적을 받지 못하면 이 활동을 시작할 수 없습니다. 현재 성적은 {$a->usergrade}% 입니다.';
$string['entry_grading'] = '채점';
$string['entryhotpotcourse'] = '이 강좌에서 이전 HotPot';
$string['entryhotpotsection'] = '이 강좌 섹션에서 이전 HotPot';
$string['entryoptions'] = '시작 페이지 옵션';
$string['entrypage'] = '시작 페이지 표시';
$string['entrypagehdr'] = '시작 페이지';
$string['entrytext'] = '시작 페이지 문장';
$string['entry_title'] = '유닛 이름을 제목으로';
$string['exit_areyouok'] = '안녕하세요? 아직 그 곳에 있나요?';
$string['exit_attemptscore'] = '그 시도에 대한 성적은 {$a} 였습니다.';
$string['exitcm'] = '다음 활동';
$string['exitcmcourse'] = '이 강좌에서 다음 활동';
$string['exitcm_help'] = '이 설정은 이 QuizPort 를 완료한 후 수행 할 무들 활동을 명시합니다.

선생님은 특정 활동 혹은 다음의 일반적인 설정 중 하나를 선택할 수 있습니다.

* 이 강좌에서 다음 활동
* 이 섹션에서 다음 활동
* 이 강좌에서 다음 HotPot
* 이 섹션에서 다음 HotPot

다른 빠져나가기 페이지 옵션이 비활성화되어 있으면 학습자들은 다음 활동으로 가게 됩니다. 그렇지 않으면 학습자들이 준비되었을때 다음 활동으로 가게하는 링크가 보여질 것입니다.';
$string['exitcmsection'] = '이 강좌 섹션에서 다음 활동';
$string['exit_course'] = '강좌';
$string['exit_course_text'] = '메인 강좌 페이지로 돌아가기';
$string['exit_encouragement'] = '격려';
$string['exit_excellent'] = '훌륭합니다.';
$string['exit_feedback'] = '종료 페이지 피드백';
$string['exit_goodtry'] = '좋은 시도입니다.';
$string['exit_grades'] = '성적';
$string['exit_grades_text'] = '지금까지 이 강좌에 대한 성적을 보십시요';
$string['exithotpotcourse'] = '이 강좌에서 다음 HotPot';
$string['exit_hotpotgrade'] = '이 활동에 대한 성적은 {$a} 입니다.';
$string['exit_hotpotgrade_average'] = '이 활동에 대한 당신의 평균 성적은 {$a} 입니다.';
$string['exit_hotpotgrade_highest'] = '이 활동에 대한 당신의 최고 성적은 {$a} 입니다.';
$string['exit_hotpotgrade_highest_equal'] = '이 활동에 대한 이전이 최고 점수와 같습니다.';
$string['exit_hotpotgrade_highest_previous'] = '이 활동에 대한 이전의 가장 높은 점수는 {$a} 였습니다.';
$string['exit_hotpotgrade_highest_zero'] = '이 활동에 대해 {$a}보다 높은 점수를 아직 받지 않았습니다';
$string['exithotpotsection'] = '이 강좌 섹션에서 다음 HotPot';
$string['exit_index'] = '인덱스';
$string['exit_index_text'] = '활동 인덱스로 가기';
$string['exit_links'] = '종료 페이지 링크';
$string['exit_next'] = '다음';
$string['exit_next_text'] = '다음 활동을 해 보십시요.';
$string['exit_noscore'] = '이 활동을 성공적으로 완료하였습니다.';
$string['exitoptions'] = '종료 페이지 옵션';
$string['exitpage'] = '종료 페이지 보기';
$string['exitpagehdr'] = '종료 페이지';
$string['exit_retry'] = '재시도';
$string['exit_retry_text'] = '이 활동을 재시도';
$string['exittext'] = '종료 페이지 문장';
$string['exit_welldone'] = '잘 했습니다.';
$string['exit_whatnext_0'] = '다음에 무엇을 하고 싶습니까?';
$string['exit_whatnext_1'] = '목적지를 선택하십시요.';
$string['exit_whatnext_default'] = '다음 중 하나를 선택하십시요.';
$string['feedbackdiscuss'] = '포럼에서 이 퀴즈에 대해 논의';
$string['feedbackformmail'] = '피드백 서식';
$string['feedbackmoodleforum'] = '무들 포럼';
$string['feedbackmoodlemessaging'] = '무들 페이지글';
$string['feedbacknone'] = '없음';
$string['feedbacksendmessage'] = '교수자에게 쪽지 보내기';
$string['feedbackwebpage'] = '웹 페이지';
$string['firstattempt'] = '처음 시도';
$string['forceplugins'] = '강제 미디어 플러그인';
$string['forceplugins_help'] = '활성화되면 무들 호환 미디어 플레이어가 avi, mpeg, mpg, mp3, mov 및 wmv 파일들을 재생할 것입니다. 비활성화되면 무들은 퀴즈내의 어떤 미디어 플레이어의 설정을 변경시키지 않을 것입니다.';
$string['frameheight'] = '프레임 높이';
$string['giveup'] = '포기';
$string['grademethod'] = '채점 방법';
$string['gradeweighting'] = '채점 가중치';
$string['gradeweighting_help'] = '이 HotPot 활동에 대한 성적은 무들 성적부의 이 숫자로  축척됩니다.';
$string['highestscore'] = '최고 성적';
$string['hints'] = '힌트';
$string['hotpot:attempt'] = 'HotPot 활동을 시도 및 결과 제출';
$string['hotpot:deleteallattempts'] = 'HotPot 활동에 대해 모든 사용자들의 시도 삭제';
$string['hotpot:deletemyattempts'] = 'HotPot 활동에 대해 자신의 시도 삭제';
$string['hotpot:ignoretimelimits'] = 'HotPot 활동에서 시간 제한 무시';
$string['hotpot:manage'] = 'HotPot 활동의 설경 변경';
$string['hotpotname'] = 'HotPot 활동 이름';
$string['hotpot:preview'] = 'HotPot 활동 미리보기';
$string['hotpot:reviewallattempts'] = 'HotPot 활동에서 모든 사용자 시도 보기';
$string['hotpot:reviewmyattempts'] = 'HotPot 활동에서 자신의 시도 보기';
$string['hotpot:view'] = 'HotPot 활동의 시작 페이지 보기';
$string['ignored'] = '무시됨';
$string['inprogress'] = '진행중';
$string['isgreaterthan'] = '는 다음보다 크다:';
$string['islessthan'] = '다음 보다 작습니다:';
$string['lastaccess'] = '마지막 접속';
$string['lastattempt'] = '마지막 시도';
$string['lockframe'] = '프레임 고정';
$string['maxeventlength'] = '한개 달력 이벤트에 대한 최대 일 수';
$string['mediafilter_hotpot'] = 'HotPot 미디어 필터';
$string['mediafilter_moodle'] = '무들 표준 미디어 필터';
$string['migratingfiles'] = '핫포테이토 퀴즈 파일 변환';
$string['missingsourcetype'] = 'HotPot 레코드에 소스타입이 없습니다.';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'HotPot';
$string['nameadd'] = '이름';
$string['nameedit'] = '이름';
$string['nameedit_help'] = '학생들에게 보여지는 특정 문장';
$string['navigation'] = '찾아가기';
$string['navigation_embed'] = '엠베드된 웹 페이지';
$string['navigation_frame'] = '무들 찾아가기 프레임';
$string['navigation_give_up'] = '시도 포기 버튼';
$string['navigation_help'] = '이 설정은 퀴즈에서 사용되는 찾아가기를 결정합니다.

* 무들 찾아가기 막대 - 무들 찾아가기 막대가 페이지의 위쪽에 퀴즈와 같은 창에 표시됩니다.
* 무들 찾아가기 프레임 - 무들 찾아가기 막대가 페이지의 위쪽에 별도의 프레임에 표시됩니다.
* 엠베드된 IFRAME - 무들 찾아가기 막대가 퀴즈와 같은 창에 표시되며 퀴즈가 IFRAME에 엠베드 됩니다.
* 핫포테이토 퀴즈 버튼 - 퀴즈가 퀴즈 않에 있을지도 모르는 찾아가기 버튼과 함께 표시됩니다.
* 단일 "포기" 버튼 - 퀴즈가 페이지의 위쪽에 단일 "포기" 버튼과 함께 표시됩니다.
* 없음 - 퀴즈가 찾아가기없이 표시됩니다. 모든 문제에 정답을 입력하면 "다음 퀴즈 보기" 설정에 따라 무들은 강좌 페이지로 돌아가거나 다음 퀴즈를 보여줄 것입니다.';
$string['navigation_moodle'] = '표준 무들 찾아가기 막대(위 및 옆)';
$string['navigation_none'] = '없음';
$string['navigation_original'] = '원래 찾아가기 도우미';
$string['navigation_topbar'] = '상단 무들 찾아가기 막대(옆 막대 없음)';
$string['noactivity'] = '활동 없음';
$string['nohotpots'] = 'HotPot이 발견되지 않았습니다.';
$string['nomoreattempts'] = '죄송합니다. 이 활동에서 더 이상 시도를 할 수 없습니다.';
$string['noresponses'] = '발견된 개인적인 질문이나 응답에 대한 정보가 없음';
$string['noreview'] = '죄송합니다. 이 퀴즈를 시도한 세부사항을 보는 것이 허용되지 않았습니다.';
$string['noreviewafterclose'] = '죄송합니다. 퀴즈가 종료되었습니다. 이 퀴즈 시도들에 대한 세부사항을 볼 수 없습니다.';
$string['noreviewbeforeclose'] = '죄송합니다. {$a} 까지 이 퀴즈 시도들에 대한 세부사항을 볼 수 없습니다.';
$string['nosourcefilesettings'] = 'HotPot 레코드가 소스 파일 정보가 없습니다.';
$string['notavailable'] = '죄송합니다. 이 활동은 당신이 사용할 수 없습니다.';
$string['outputformat'] = '출력형식';
$string['outputformat_best'] = '최고';
$string['outputformat_help'] = '이 설정은 퀴즈를 표시하기 위한 포맷을 명시합니다.

* 최적 - 브라우저에게 최적 포맷
* v6+ -  v6+ 브라우저에서 드래그/드롭 포맷
* v6 -  v6 브라우저를 위한 포맷';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze HP6 html: 표준';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'JCloze from HP6 xml: ANCT-Scan';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'JCloze from HP6 xml: Rottmeier 드롭다운';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'JCloze from HP6 xml: Rottmeier FindIt (a)';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'JCloze from HP6 xml: Rottmeier FindIt (b)';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JCloze from HP6 xml: Rottmeier JGloss';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze from HP6 xml: 표준';
$string['outputformat_hp_6_jcross_html'] = 'JCross HP6 html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross from HP6 xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch from html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch from HP6 xml: Flashcard';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMatch from HP6 xml: Rottmeier JMemori';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch from HP6 xml: Standard';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch from HP6 xml: Drag and Drop';
$string['outputformat_hp_6_jmix_html'] = 'JMix from HP6 html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix from HP6 xml: Standard';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'HP6 xml에서 JMix: 끌어다 놓기';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'HP6 xml에서 JMix: 키를 누르고 끌어다 놓기';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz HP6 html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz from HP6 xml: Standard';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz from HP6 xml: Auto-advance';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'HP6 xml에서 JQuiz: Exam';
$string['outputformat_hp_6_rhubarb_html'] = 'html 에서 ebRhubarb (v6)';
$string['outputformat_hp_6_rhubarb_xml'] = 'xml 에서 WebRhubarb (v6)';
$string['outputformat_hp_6_sequitur_html'] = 'html에서 WebSequitur (v6)';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'html에서 WebSequitur (v6), 누적 채점';
$string['outputformat_hp_6_sequitur_xml'] = 'xml 에서 WebSequitur (v6)';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'xml 에서 WebSequitur (v6), 누적 채점';
$string['overviewreport'] = '개요';
$string['penalties'] = '경고';
$string['percent'] = '백분율';
$string['pluginadministration'] = 'HotPot 관리';
$string['pluginname'] = 'HotPot 모듈';
$string['pressoktocontinue'] = '계속하려면 OK를 클릭하고, 현재의 페이지에 머무르려면 취소를 클릭하세요.';
$string['questionshort'] = 'Q-{$a}';
$string['quizname_help'] = '퀴즈 이름에 대한 도움말';
$string['quizzes'] = '퀴즈';
$string['removegradeitem'] = '성적 항목 제거';
$string['removegradeitem_help'] = '이 활동에 대한 채점 항목을 제거할까요?

**아니오** :무들 성적부에서 이 활동에 대한 채점 항목은 제거되지 않을 것입니다.

**예** : 만일 이 HotPot에 대한 최대 성적 혹은 성적 가중치가 0으로 설정되면 무들 성적부에서 이 활동에 대한 채점 항목은 제거될 것입니다.';
$string['responsesreport'] = '응답';
$string['score'] = '점수';
$string['scoresreport'] = '점수';
$string['selectattempts'] = '시도 선택';
$string['showerrormessage'] = 'HotPot 오류:  {$a}';
$string['sourcefile'] = '소스 파일 이름';
$string['sourcefilenotfound'] = '소스파일이 없습니다 (혹은 비어 있음): {$a}';
$string['status'] = '상태';
$string['stopbutton'] = '정지 버튼 보이기';
$string['stopbutton_help'] = '만일 이 설정이 활성화되면 정지 버튼이 퀴즈에 삽입됩니다.

만일 학습자가 정지 버튼을 클릭하면 지금까지 결과는 무들로 돌아가고 퀴즈 시도 상태는 버려졌음으로 설정됩니다.

정지 버튼위에 표시되는 텍스트는 무들 언어팩에 있는 미리 정해진 문구이거나 선생님이 자신의 텍스트를 명시할 수 있습니다.';
$string['stopbutton_langpack'] = '언어팩에서';
$string['stopbutton_specific'] = '특정 문장 사용';
$string['stoptext'] = '정지 버튼 문장';
$string['storedetails'] = 'HotPot 퀴즈 시도들에 대한 원시 XML 세부사항 저장';
$string['studentfeedback'] = '학생 피드백';
$string['studentfeedback_help'] = '활성화되면 팝업 피드백 창에 대한 링크는 학생들이 "확인" 버튼을 클릭할 때마다 표시될 것입니다. 피드백 창은 학생들이 선생님에게 4가지 방법으로 피드백을 보낼 수 있게 합니다.

* 웹페이지 (웹 페이지의 URL 주소가 필요, 예 http://myserver.com/feedbackform.html)
* 피드백 양식 (양식 스크립트의 URL 주소 필요,예http://myserver.com/cgi-bin/formmail.pl)
* 무들 포럼 - 강좌에 대한 포럼 색인이 표시될 것입니다.
* 무들 메세징 - 무들 인스턴트 메세징 창이 표시됩니다. 만일 강좌에 여러 선생님이 있으면 메세지 창이 나타나기 전에 선생님을 선택하라는 메세지가 표시됩니다.';
$string['submits'] = '제출';
$string['textsourcefile'] = '소스파일에서 가져오기';
$string['textsourcefilename'] = '소스 파일 이름 사용';
$string['textsourcefilepath'] = '소스 파일 경로 사용';
$string['textsourcequiz'] = '퀴즈로부터 얻기';
$string['textsourcespecific'] = '특정 문서';
$string['timeclose'] = '사용가능 종료일';
$string['timedout'] = '시간 종료';
$string['timelimit'] = '시간 제한';
$string['timelimitexpired'] = '이 시도에 대한 시간 제한이 만료되었습니다.';
$string['timelimitspecific'] = '특정 시간 사용';
$string['timelimitsummary'] = '한번 시도에 대한 시간 제한';
$string['timelimittemplate'] = '소스/템플릿 파일에 있는 설정 사용';
$string['timeopen'] = '사용가능 시작일';
$string['timeopenclose'] = '시작 및 종료 시간';
$string['timeopenclose_help'] = '사람들이 시도를 할 수 있도록 퀴즈 접근 가능시간을 명시할 수 있습니다. 시작시간 이전이나 종료 시간 이후에는 퀴즈를 사용할 수 없습니다.';
$string['title'] = '제목';
$string['unitname_help'] = '유닛 이름에 대한 도움말';
$string['updated'] = '업데이트됨';
$string['usefilters'] = '필터 사용';
$string['usefilters_help'] = '이 설정이 활성화되면 콘텐츠가 브라우저로 전송되기 전에 무들 필터를 통과하게 될 것입니다.';
$string['useglossary'] = '용어집 사용';
$string['useglossary_help'] = '이 설정이 활성화되면 콘텐츠는 브라우저로 보내지기 전에 무들 용어집 자동 링크 필터를 지나가게 될 것입니다.

이 설정은 용어집 자동 링크 필터를 활성화하거나 비활성화 하는 사이트 관리자 설정을 덮어쓰게 됨을 주목하세요.';
$string['usemediafilter'] = '미디어 필터 사용';
$string['utilitiesindex'] = 'HotPot 유틸리티 인덱스';
$string['viewreports'] = '{$a} 사용자에 대한 보고서 보기';
$string['views'] = '보기';
$string['weighting'] = '가중치';
$string['wrong'] = '틀림';
$string['zeroduration'] = '시간제한 없음';
$string['zeroscore'] = '0점';
