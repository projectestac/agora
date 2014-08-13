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
 * Strings for component 'feedback', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = '활동에 질문 추가';
$string['add_pagebreak'] = '페이지 나눔 추가';
$string['adjustment'] = '정돈';
$string['after_submit'] = '제출 후';
$string['allowfullanonymous'] = '전면 익명화 허용';
$string['analysis'] = '분석';
$string['anonymous'] = '익명';
$string['anonymous_edit'] = '사용자 이름 기록';
$string['anonymous_entries'] = '익명 응답';
$string['anonymous_user'] = '익명 사용자';
$string['append_new_items'] = '새 항목 덧붙임';
$string['autonumbering'] = '자동 질문 번호';
$string['autonumbering_help'] = '개개 질문에 대한 자동 번호붙이기 활성/비활성';
$string['average'] = '평균';
$string['bold'] = '굵게';
$string['cancel_moving'] = '이동 취소';
$string['cannotmapfeedback'] = '데이터베이스의 문제로 강좌에 설문을 배치할 수 없음';
$string['cannotsavetempl'] = '설문지 저장이 허용되지 않음';
$string['cannotunmap'] = '데이터베이스의 문제로 설문배치 해제를 할 수 없음';
$string['captcha'] = '캡차';
$string['captchanotset'] = '캡차가 설정되지 않음';
$string['check'] = '선다형-복수답';
$string['checkbox'] = '선다형-복수답허용(체크박스)';
$string['check_values'] = '가능한 응답';
$string['choosefile'] = '파일 선택';
$string['chosen_feedback_response'] = '선택된 피드백의 응답';
$string['completed'] = '완료';
$string['completed_feedbacks'] = '제출된 답';
$string['complete_the_form'] = '질문에 답하세요';
$string['completionsubmit'] = '피드백이 제출되면 완료된 것으로 보기';
$string['configallowfullanonymous'] = '예로 설정하면 피드백은 로그온하지 않고도 완료될 수 있습니다. 누리집의 피드백에만 영향을 준다.';
$string['confirmdeleteentry'] = '이 기록을 삭제하는 것이 맞습니까?';
$string['confirmdeleteitem'] = '이 질문을 삭제하는 것이 맞습니까?';
$string['confirmdeletetemplate'] = '이 질문지를 삭제하는 것이 맞습니까?';
$string['confirmusetemplate'] = '이 질문지를 사용하는 것이 맞습니까?';
$string['continue_the_form'] = '양식 계속';
$string['count_of_nums'] = '계수';
$string['courseid'] = '강좌id';
$string['creating_templates'] = '이 질문들을 새로운 질문지로 저장';
$string['delete_entry'] = '항목 삭제';
$string['delete_item'] = '질문 삭제';
$string['delete_old_items'] = '옛 항목 삭제';
$string['delete_template'] = '질문지 삭제';
$string['delete_templates'] = '질문지 삭제';
$string['depending'] = '의존성 항목';
$string['depending_help'] = '의존성 항목은 어떤 항목에 얼마나 의존하는가를 보여줍니다.<br /><strong>작성 예시</strong><br />
<ul>
<li>First create an item on which value other items depends.</li>
<li>Next add a pagebreak.</li>
<li>Next add the items depend on the item-value before<br />
Choose in the item creation-form the item in the list "depend item" and put the needed value into the textbox "depend value".</li>
</ul>
<strong>The structure should looks like this:</strong>
<ol>
<li>Item Q: do you have a car? A: yes/no</li>
<li>Pagebreak</li>
<li>Item Q: what color has your car?<br />
(this item depends on item 1 with value = yes)</li>
<li>Item Q: why you have not a car?<br />
(this item depends on item 1 with value = no)</li>
<li> ... other items</li>
</ol>
이게 다입니다. 안녕!';
$string['dependitem'] = '의존하는 항목';
$string['dependvalue'] = '의존값';
$string['description'] = '설명';
$string['do_not_analyse_empty_submits'] = '응답없는 항목은 분석하지 말 것';
$string['dropdown'] = '선다형-단답허용(펼침 목록)';
$string['dropdownlist'] = '선다형-단답(펼침 목록)';
$string['dropdownrated'] = '순위있는 펼침 목록';
$string['dropdown_values'] = '답안';
$string['drop_feedback'] = '강좌에서 제거';
$string['edit_item'] = '질문 편집';
$string['edit_items'] = '질문 편집';
$string['email_notification'] = '이메일 통지';
$string['email_notification_help'] = '활성화가 되면, 관리자는 피드백 제출에 대해 이메일로 통지받게 됩니다.';
$string['emailteachermail'] = '{$a->username} 가 \'{$a->feedback}\' 피드백 활동을 완료하였습니다. {$a->url} 에서 결과를 볼 수 있습니다.';
$string['emailteachermailhtml'] = '{$a->username} 가 <i>\'{$a->feedback}\'</i><br/><br/> 피드백 활동을 완료하였습니다. <a href="{$a->url}">여기</a> 에서 결과를 볼 수 있습니다.';
$string['entries_saved'] = '응답 저장됨. 감사합니다.';
$string['export_questions'] = '질문 내보내기';
$string['export_to_excel'] = '엑셀로 내보내기';
$string['feedback:addinstance'] = '새 피드백 추가';
$string['feedbackclose'] = '응답 허용';
$string['feedback:complete'] = '피드백 완료';
$string['feedback:createprivatetemplate'] = '개인 질문지 만들기';
$string['feedback:createpublictemplate'] = '공용 질문지 만들기';
$string['feedback:deletesubmissions'] = '완료된 제출물 삭제';
$string['feedback:deletetemplate'] = '질문지 삭제';
$string['feedback:edititems'] = '항목 편집';
$string['feedback_is_not_for_anonymous'] = '익명사용자는 설문 응답을 못함';
$string['feedback_is_not_open'] = '피드백이 아직 시작되지 않았음';
$string['feedback:mapcourse'] = '강좌에 공용 피드백 배치';
$string['feedbackopen'] = '답안 입력 시작 시간';
$string['feedback:receivemail'] = '이메일 통지 받기';
$string['feedback:view'] = '피드백 보기';
$string['feedback:viewanalysepage'] = '제출 후 분석결과 보기';
$string['feedback:viewreports'] = '보고서 보기';
$string['file'] = '파일';
$string['filter_by_course'] = '강좌로 필터링';
$string['handling_error'] = '모듈 작동 처리 중 오류 발생';
$string['hide_no_select_option'] = '"선택되지 않음" 옵션 숨기기';
$string['horizontal'] = '수평으로';
$string['importfromthisfile'] = '이 파일로부터 가져오기';
$string['import_questions'] = '질문 가져오기';
$string['import_successfully'] = '가져오기 성공';
$string['info'] = '안내';
$string['infotype'] = '안내-유형';
$string['insufficient_responses'] = '응답수 부족';
$string['insufficient_responses_for_this_group'] = '이 모듬은 응답수가 부족합니다.';
$string['insufficient_responses_help'] = '모둠의 응답수 부족.

피드백을 익명으로 처리하기 위해서는 최소 2명의 응답이 있어야만 한다.';
$string['item_label'] = '표지';
$string['item_name'] = '질문';
$string['label'] = '표지';
$string['line_values'] = '순위';
$string['mapcourse'] = '피드백을 강좌와 연결';
$string['mapcourse_help'] = '기본적으로 개인 누리집에서 생성된 피드백 양식은 사이트 전체에 거쳐 사용할 수 있으며 피드백 블록을 사용하는 모든 강좌에서 나타납니다. 여러분은 피드백 양식을 붙박이 블록으로 만들어 사용하도록 하거나, 아니면 강좌를 지정하여 특정된 강좌에서만 나타나게 할 수 있습니다. ';
$string['mapcourseinfo'] = '이것은 피드백 블록을 사용하는 모든 강좌에서 사용할 수 있는 사이트 공용 피드백입니다. 그러나 매핑을 통해 피드백이 표시될 수 있는 강좌를 제한할 수 있습니다. 강좌를 검색한 후 강좌를 이 피드백과 매핑하십시요.';
$string['mapcoursenone'] = '아무 강좌도 연결되지 않았습니다. 피드백은 모든 강좌에서 사용가능합니다.';
$string['mapcourses'] = '피드백을 강좌에 연결';
$string['mapcourses_help'] = '일단 검색에서 관련 강좌를 선택하면, 강좌를 배치하여 피드백과 연결시킬 수 있다. Ctrl 키를 누른 채 복수의 강좌명을 선택함으로서 다수의 강좌를 선택할 수도 있다. 피드백과 강좌 연결은 언제든 해제시킬 수 있다.';
$string['mappedcourses'] = '연결된 강좌';
$string['max_args_exceeded'] = '최대 6개의 인수를 처리할 수 있지만, 다음은. 너무 많음';
$string['maximal'] = '최대의';
$string['messageprovider:message'] = '피드백 알림';
$string['messageprovider:submission'] = '피드백 통지';
$string['mode'] = '모드';
$string['modulename'] = '피드백(설문)';
$string['modulename_help'] = '피드백 모듈은 맞춤 설문조사를 만들 수 있도록 합니다.';
$string['modulenameplural'] = '피드백 활동';
$string['movedown_item'] = '이 질문을 아래로';
$string['move_here'] = '이곳으로 이동';
$string['move_item'] = '이 질문 이동';
$string['moveup_item'] = '이 질문을 위로';
$string['multichoice'] = '복수 선택';
$string['multichoicerated'] = '복수 선택(순위)';
$string['multichoicetype'] = '복수 선택형';
$string['multichoice_values'] = '복수 선택값';
$string['multiplesubmit'] = '다중 제출 허용';
$string['multiplesubmit_help'] = '익명 설문조사를 가능하게 하면, 사용자는 설문에 무제한 응답할 수 있다.';
$string['name'] = '이름';
$string['name_required'] = '이름 필수';
$string['next_page'] = '다음 페이지';
$string['no_handler'] = '다음에 대해 아무 동작 핸들러가 없음';
$string['no_itemlabel'] = '표지 없음';
$string['no_itemname'] = '아이템의 이름 없음';
$string['no_items_available_yet'] = '아직 어떤 질문도 설정되지 않았음.';
$string['non_anonymous'] = '기명, 응답내용 공개';
$string['non_anonymous_entries'] = '익명 기록 없음';
$string['non_respondents_students'] = '응답한 학생 없음';
$string['notavailable'] = '이 피드백은 사용할 수 없습니다.';
$string['not_completed_yet'] = '아직 완료되지 않았음';
$string['no_templates_available_yet'] = '아직 아무런 질문지도 없음';
$string['not_selected'] = '선택되지 않았음';
$string['not_started'] = '개시하지 않음';
$string['numeric'] = '숫자 답';
$string['numeric_range_from'] = '에서';
$string['numeric_range_to'] = '까지';
$string['of'] = '의';
$string['oldvaluespreserved'] = '모든 옛 질문과 지정된 값들은 보존될 것임';
$string['oldvalueswillbedeleted'] = '현재의 질문 및 사용자의 반응을 삭제될 것임';
$string['only_one_captcha_allowed'] = '피드백에 단 하나의 캡차만 허용됨';
$string['overview'] = '요약';
$string['page'] = '페이지';
$string['page_after_submit'] = '완료 메세지';
$string['pagebreak'] = '페이지 나누기';
$string['page-mod-feedback-x'] = '모든 피드백 모듈 페이지';
$string['parameters_missing'] = '파라메터가 없음';
$string['picture'] = '그림';
$string['picture_file_list'] = '그림 목록';
$string['picture_values'] = '목록에서 하나 이상의 <br/> 그림을 선택하세요.';
$string['pluginadministration'] = '피드백 관리';
$string['pluginname'] = '피드백(설문)';
$string['position'] = '위치';
$string['preview'] = '미리보기';
$string['preview_help'] = '미리보기에서는 문제의 순서를 변경할 수 있음';
$string['previous_page'] = '이전 페이지';
$string['public'] = '공개';
$string['question'] = '질문';
$string['questionandsubmission'] = '질문 및 제출 설정';
$string['questions'] = '질문들';
$string['radio'] = '선다형-단답(라디오버튼)';
$string['radiobutton'] = '선다형-단답 허용(라디오버튼)';
$string['radiobutton_rated'] = '라디오버튼(순위있는)';
$string['radiorated'] = '라디오버튼(순위있는)';
$string['radio_values'] = '응답들';
$string['ready_feedbacks'] = '피드백 준비완료';
$string['relateditemsdeleted'] = '이 질문에 대한 사용자의 반응은 함께 삭제될 것임';
$string['required'] = '필수';
$string['resetting_data'] = '피드백 응답 초기화';
$string['resetting_feedbacks'] = '피드백 초기화하기';
$string['response_nr'] = '응답 수';
$string['responses'] = '응답들';
$string['responsetime'] = '응답시간';
$string['save_as_new_item'] = '새 질문으로 저장';
$string['save_as_new_template'] = '새 질문지로 저장';
$string['save_entries'] = '응답 제출';
$string['save_item'] = '질문 저장';
$string['saving_failed'] = '저장 실패';
$string['saving_failed_because_missing_or_false_values'] = '누락되거나 잘못 된 값 때문에 저장 실패';
$string['search_course'] = '강좌 검색';
$string['searchcourses'] = '강좌 검색';
$string['searchcourses_help'] = '피드백과 연결시킬 강좌를 코드나 강좌명을 이용하여 검색';
$string['selected_dump'] = '$SESSION 변수의 선택된 인덱스가 다음의 아래로 내려질 것임:';
$string['send'] = '송신';
$string['send_message'] = '메시지 보내기';
$string['separator_decimal'] = '.';
$string['separator_thousand'] = ',';
$string['show_all'] = '모두 보기';
$string['show_analysepage_after_submit'] = '분석 페이지 보기';
$string['show_entries'] = '응답 보기';
$string['show_entry'] = '응답 보기';
$string['show_nonrespondents'] = '응답 안한 사람 보기';
$string['site_after_submit'] = '제출 후 사이트';
$string['sort_by_course'] = '강좌별로 분류';
$string['start'] = '시작';
$string['started'] = '시작되었음';
$string['stop'] = '끝';
$string['subject'] = '제목';
$string['switch_group'] = '모둠 대체';
$string['switch_item_to_not_required'] = '전환: 필수 아님';
$string['switch_item_to_required'] = '전환: 응답 필수';
$string['template'] = '질문지';
$string['templates'] = '질문지들';
$string['template_saved'] = '질문지가 저장됨';
$string['textarea'] = '논술형 답안';
$string['textarea_height'] = '라인 수';
$string['textarea_width'] = '폭';
$string['textfield'] = '단답형 답안';
$string['textfield_maxlength'] = '허용 최대 문자 수';
$string['textfield_size'] = '입력창의 폭';
$string['there_are_no_settings_for_recaptcha'] = '캡차 설정 없음';
$string['this_feedback_is_already_submitted'] = '당신은 이미 이 활동을 완료하였습니다.';
$string['typemissing'] = '"유형" 누락';
$string['update_item'] = '변경사항 저장';
$string['url_for_continue'] = '계속버튼의 URL';
$string['url_for_continue_help'] = '기본적으로 피드백을 하고 난 후에 계속 버튼의 목적지는 강좌 페이지입니다. 이 계속 버튼에 다른 목적지 URL을 정의할 수도 있습니다.';
$string['use_one_line_for_each_value'] = '<br />한 줄에 하나씩 답하세요!';
$string['use_this_template'] = '이 질문지 사용';
$string['using_templates'] = '질문지 사용';
$string['vertical'] = '수직으로';
$string['viewcompleted'] = '완료된 피드백';
$string['viewcompleted_help'] = '강좌 혹은 질문 등의 검색 조건을 이용하여 완료된 피드백 양식을 볼 수 있다. 피드백의 응답은 엑셀양식으로 내보낼 수도 있다. ';
