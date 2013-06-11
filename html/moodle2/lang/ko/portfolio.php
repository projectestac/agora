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
 * Strings for component 'portfolio', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = '내보내기 마무리';
$string['activeportfolios'] = '가능한 포트폴리오';
$string['addalltoportfolio'] = '포트폴리오에 모두 내보내기';
$string['addnewportfolio'] = '포트폴리오 작성';
$string['addtoportfolio'] = '포트폴리오에 내보내기';
$string['alreadyalt'] = '이미 내보내는 중 - 현재 전송을 마무리하려면 여기를 누르기 바랍니다.';
$string['alreadyexporting'] = '이미 본 세션에서 포트폴리오를 내보냈습니다. 계속하기 전에, 본 세션을 완료하거나, 아니면 취소해야 합니다. 계속 하겠습니까?(삭제되지 않음)';
$string['availableformats'] = '이용가능한 내보내기 형식';
$string['callbackclassinvalid'] = '명시된 콜백 클래스는 유효하지 않거나  portfolio_caller 계층구조의 부분이 아닙니다.';
$string['callercouldnotpackage'] = '내보내기를 위한 자료 패키지 실패: 원래 오류는 {$a} 이었습니다.';
$string['cannotsetvisible'] = '공개로 설정할 수 없음 - 설정오류로 인해 플러그인이 작동 불가';
$string['commonportfoliosettings'] = '공통 포트폴리오 설정';
$string['commonsettingsdesc'] = '<p>\'적정\' 혹은 \'최대\' 시간을 사용하여 전송이 이루어질 것인지의 여부는 사용자가 전송이 완료되기 까지 대기할 것인지 여부에 달려 있다. </p>
<p>\'적정 시간\' 한계에 드는 크기는 사용자의 요청을 기다리지 않고 즉시 실행되며, 옵션에 의해 \'적정\' 및 \'최대\' 전송이 제공되나 시간이 초과할 경우에는 경고를 발하게 된다.</p>
<p>한편 어떤 포트폴리오 플러그인은 이 옵션을 완전히 무시하고 모든 전송을 큐에 집어 넣기도 한다.</p>';
$string['configexport'] = '내보낼 자료 설정';
$string['configplugin'] = '포트폴리오 플러그인 설정';
$string['configure'] = '설정';
$string['confirmcancel'] = '내보내기를 취소하는 것이 맞습니까?';
$string['confirmexport'] = '내보내기를 확인하기 바람';
$string['confirmsummary'] = '내보낼 항목 개요';
$string['continuetoportfolio'] = '포트폴리오 계속';
$string['deleteportfolio'] = '포트폴리오 인스턴스 삭제';
$string['destination'] = '보낼 곳';
$string['disabled'] = '죄송합니다만, 이 사이트에서는 포트폴리오 내보내기가 되지 않습니다';
$string['disabledinstance'] = '비활성화됨';
$string['displayarea'] = '내보낼 영역';
$string['displayexpiry'] = '전송 제한 시간';
$string['displayinfo'] = '표시 정보';
$string['dontwait'] = '기다리지 말 것';
$string['enabled'] = '포트폴리오 가능';
$string['enableddesc'] = '사용자의 포트폴리오 내용을 관리자가 원격 시스템을 조정하여 내보낼 수 있게 허용할 것임';
$string['err_uniquename'] = '포트폴리오의 명칭은 중복되면 안됨';
$string['exportalreadyfinished'] = '포트폴리오 내보내기 완료!';
$string['exportalreadyfinisheddesc'] = '포트폴리오 내보내기 완료!';
$string['exportcomplete'] = '포트폴리오 내보내기 성공!';
$string['exportedpreviously'] = '이전에 내보낸 포트폴리오';
$string['exportexceptionnoexporter'] = '현재 세션에 대한 portfolio_export_exception이 제시됐지만 내보낼 객체가 없음';
$string['exportexpired'] = '포트폴리오 해지됨';
$string['exportexpireddesc'] = '정보 내보내기를 반복하고 있거나 빈 내용을 내보내려 하고 있습니다. 제대로 하려면 원래의 위치로 돌아가 다시 시작해야만 합니다. 이 현상은 가끔 내보내기가 완료된 후에 뒤로 돌아가기 버튼을 사용할 때나, 잘못된 주소를 북마킹 함으로서 일어납니다.';
$string['exporting'] = '포트폴리오 내보내기';
$string['exportingcontentfrom'] = '{$a} 의 내용 내보내기';
$string['exportingcontentto'] = '콘텐츠를 {$a}로 내보내기';
$string['exportqueued'] = '포트폴리오 내보내기 준비작업 성공';
$string['exportqueuedforced'] = '포트폴리오 내보내기 준비작업 성공(원격시스템 대기 완료)';
$string['failedtopackage'] = '파일을 찾을 수 없음';
$string['failedtosendpackage'] = '지정된 포트폴리오 시스템에 자료 전송 실패: 원래 오류는 {$a} 이었습니다.';
$string['filedenied'] = '접속이 허용되지 않음';
$string['filenotfound'] = '파일 없음';
$string['fileoutputnotsupported'] = '이 형식에 대해서는 파일의 출력을 다시쓰는 것이 지원되지 않습니다.';
$string['format_document'] = '문서';
$string['format_file'] = '파일';
$string['format_image'] = '이미지';
$string['format_leap2a'] = 'Leap2A 포트폴리오 포맷';
$string['format_mbkp'] = '무들 백업 포맷';
$string['format_pdf'] = 'pdf';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = '발표';
$string['format_richhtml'] = '첨부물이 있는 HTML';
$string['format_spreadsheet'] = '스프레드시트';
$string['format_text'] = '평범한 문서';
$string['format_video'] = '비디오';
$string['hidden'] = '비공개';
$string['highdbsizethreshold'] = '최고 전송 디비 크기';
$string['highdbsizethresholddesc'] = '전송시간 내 최대로 전송할 수 있는 자료의 숫자';
$string['highfilesizethreshold'] = '최고 전송 파일 크기';
$string['highfilesizethresholddesc'] = '전송 시간 내 최대로 전송할 수 있는 파일의 크기';
$string['insanebody'] = '안녕하새요! {$a->sitename} 의 관리자이기 때문에 받는 메시지입니다.

포트폴리오 인스턴스가 잘못된 설정으로 자동으로 비활성화되어 있습니다. 이로 말미암아 사용자는 현재 포트폴리의의 내용을 내보낼 수 없습니다.

비활성화된 포트폴리오 목록은 다음과 같습니다.

 {$a->textlist}

가급적 빨리 {$a->fixurl} 을 방문하여 이를 바로잡기 바랍니다.';
$string['insanebodyhtml'] = '<p>안녕하세요!  {$a->sitename} 의 관리자이기 때문에 받는 메시지입니다.</p>
<p> 포트폴리오 인스턴스가 잘못된 설정으로 자동으로 비활성화되어 있습니다. 이로 말미암아 사용자는 현재 포트폴리의의 내용을 내보낼 수 없습니다.</p>
{$a->htmllist}
<p>가급적 빨리<a href="{$a->fixurl}">포트폴리오 설정페이지</a>를 방문하여 이를 바로잡기 바랍니다.</p>';
$string['insanebodysmall'] = '안녕하세요! {$a->sitename} 의 관리자이기 때문에 받는 메시지입니다. 포트폴리오 인스턴스가 잘못된 설정으로 자동으로 비활성화되어 있습니다. 이로 말미암아 사용자는 현재 포트폴리의의 내용을 내보낼 수 없습니다.
가급적 빨리 {$a->fixurl} 을 방문하여 이를 바로잡기 바랍니다.';
$string['insanesubject'] = '포트폴리오 인스턴스 자동 해제';
$string['instancedeleted'] = '포트폴리오 삭제 완료';
$string['instanceismisconfigured'] = '포트폴리오 인스턴스가 잘못 설정되어 생략합니다. 오류: {$a}';
$string['instancenotdelete'] = '포트폴리오 삭제 실패';
$string['instancenotsaved'] = '포트폴리오 저장 실패';
$string['instancesaved'] = '포트폴리오 저장 완료';
$string['invalidaddformat'] = 'portfolio_add_button에 잘못된 추가 형식 전달.  ({$a}) 반드시 PORTFOLIO_ADD_XXX 중에 하나가 되어야 함';
$string['invalidbuttonproperty'] = 'portfolio_button 의 속성({$a})을 찾지 못 함';
$string['invalidconfigproperty'] = '({$a->class} 의 {$a->property}) 설정 항목을 찾을 수 없음';
$string['invalidexportproperty'] = '내보낼 ({$a->class} 의 {$a->property}) 설정 항목을 찾을 수 없음';
$string['invalidfileareaargs'] = 'set_file_and_format_data에 잘못된 파일 문맥 인수 전달. 반드시 문맥영역ID, 구성요소, 파일 영역 및 항목ID를 포함하여야 함';
$string['invalidformat'] = '잘못된 형식 {$a} 로 내보내려 하고 있음';
$string['invalidinstance'] = '포트폴리오 인스턴스가 없음';
$string['invalidpreparepackagefile'] = '잘못된 prepare_package_file 호출. 단수 혹은 복수 파일이 설정되어야 함';
$string['invalidproperty'] = '({$a->class} 의 {$a->property}) 항목을 찾을 수 없음';
$string['invalidsha1file'] = '잘못된 get_sha1_file 호출. 단수 혹은 복수 파일이 설정되어야 함';
$string['invalidtempid'] = '잘못된 내보내기 ID. 아마도 만료되었는지 모릅니다.';
$string['invaliduserproperty'] = '사용자 ({$a->class} 의 {$a->property}) 설정 항목을 찾을 수 없음';
$string['leap2a_emptyselection'] = '필요한 값이 선택되지 않았습니다.';
$string['leap2a_entryalreadyexists'] = '이 피드에 이미 존재하는 id ({$a})를 가진 Leap2A 항목을 추가하고자 했습니다.';
$string['leap2a_feedtitle'] = '{$a}를 위해 무들로부터 Leap2A 내보내기 ';
$string['leap2a_filecontent'] = '파일 서브클래스를 사용하는 대신 leap2a 항목의 콘텐츠를 파일에 설정하고자 하였습니다.';
$string['leap2a_invalidentryfield'] = '존재하지 않은  입력항목 ({$a})을 설정하고자 하였습니다. 또는 직접 설정할 수 없습니다.';
$string['leap2a_invalidentryid'] = '존재하지 않은 id ({$a})로 입력항목에 접속하고자 하였습니다.';
$string['leap2a_missingfield'] = '필요한 Leap2A 엔트리 항목이 {$a} 누락되었습니다.';
$string['leap2a_nonexistantlink'] = 'Leap2A 항목 ({$a->id})이 존재하지 않는 항목({$a->to}) 에 링크를 {$a->rel}로 걸려고 하고 있습니다.';
$string['leap2a_overwritingselection'] = '항목 ({$a})의 원래 유형을 make_selection의 선택한 것으로 덮어쓰기';
$string['leap2a_selflink'] = 'Leap2A 항목 ({$a->id})이 자신에게 링크를 {$a->rel}로 걸려고 하고 있습니다.';
$string['logs'] = '전송 기록';
$string['logsummary'] = '이전 전송 기록';
$string['manageportfolios'] = '포트폴리오 관리';
$string['manageyourportfolios'] = '내 포트폴리오 관리';
$string['mimecheckfail'] = '포트폴리오 플러그인 {$a->plugin}는 mimetype {$a->mimetype}을 지원하지 않습니다.';
$string['missingcallbackarg'] = '{$a->class} 의 {$a->arg} 아규먼트 회신 누락';
$string['moderatedbsizethreshold'] = '적정 전송 디비 크기';
$string['moderatedbsizethresholddesc'] = '적정 전송시간 내에 전송할 수 있는 자료의 수 한계';
$string['moderatefilesizethreshold'] = '적정 전송 파일 크기';
$string['moderatefilesizethresholddesc'] = '적정 전송시간 내에 전송할 수 있는 파일의 크기 한도';
$string['multipleinstancesdisallowed'] = '다중 인스턴스 ({$a})를 허용하지 않는 다른 플러그인 인스턴스 생성 시도';
$string['mustsetcallbackoptions'] = 'portfolio_add_button 을 설정하거나 set_callback_options 방법을 이용하여 회신 옵션을 설정하여야 함';
$string['noavailableplugins'] = '내보낼 포트폴리오가 없음';
$string['nocallbackclass'] = '({$a})를 사용할 수 있는 회신 클래스를 찾을 수 없음';
$string['nocallbackfile'] = '내보내려는 포트폴리오가 깨졌음 - 요청한 {$a} 파일을 찾을 수 없음';
$string['noclassbeforeformats'] = 'portfolio_button의 set_formats을 호출하기 전에 회신 클래스를 설정해야만 함';
$string['nocommonformats'] = '이용가능한 플러그인과 요청한 위치 {$a->location} 사이에 공통의 포맷이 없음(호출자의 포맷은 {$a->formats}를 지원합니다)';
$string['noinstanceyet'] = '아직 선택되지 않음';
$string['nologs'] = '보여줄 로그가 없습니다.';
$string['nomultipleexports'] = '죄송합니다. 포트폴리오 목적지 ({$a->plugin})가 한번에 여러개의 내보내기를 지원하지 않습니다. <a href="{$a->link}">우선 현재 것을 마친 다음</a>다시 시도하십시요.';
$string['nonprimative'] = 'portfolio_add_button으로 콜백 인수로 비 원시값이 전달되었습니다. 계속할 수 없습니다. 키는  {$a->key}이고, 키값은 {$a->value} 였습니다.';
$string['nopermissions'] = '죄송합니다만, 이 영역에서 파일을 내보낼 권한이 없음';
$string['notexportable'] = '죄송합니다만, 내보낼 수 없는 내용 형식을 지정하였음';
$string['notimplemented'] = '죄송합니다만, 아직 지원하지 않는 ({$a}) 형식으로 내용을 내보내려 하고 있습니다.';
$string['notyetselected'] = '아직 선택되지 않음';
$string['notyours'] = '남의 포트폴리오를 재작성하려고 합니다!';
$string['nouploaddirectory'] = '자료를 묶을 임시 저장고를 생생할 수 없음';
$string['off'] = '활성화되었지만 숨겨짐';
$string['on'] = '활성화되고 볼 수 있음';
$string['plugin'] = '포트폴리오 플러그인';
$string['plugincouldnotpackage'] = '내보내기를 위한 데이터 패키징 실패: 원래 오류는 {$a} 였습니다.';
$string['pluginismisconfigured'] = '포트폴리오 플러그인이 잘못 설정되어 생략합니다. 오류: {$a}';
$string['portfolio'] = '포트폴리오';
$string['portfolios'] = '포트폴리오';
$string['queuesummary'] = '전송 대기 중';
$string['returntowhereyouwere'] = '원래 위치로 돌아감';
$string['save'] = '저장';
$string['selectedformat'] = '선택된 내볼낼 형식';
$string['selectedwait'] = '기다릴까요?';
$string['selectplugin'] = '목적지 선택';
$string['singleinstancenomultiallowed'] = '단 한개의 포트폴리오 플러그인 인스턴스만 사용가능합니다. 세션당 다중 내보내기를 지원하지 않습니다. 이 플러그인을 사용하는 세션에 이미 활성화된 내보내기가 있습니다.';
$string['somepluginsdisabled'] = '설정을 잘 못하였거나 다른 것에 의존하기 때문에 어떤 전체 포트폴리오 플러그인이 비활성화되었습니다.';
$string['sure'] = '\'{$a}\'를 삭제하겠습니까? 이는 되돌이킬 수 없습니다.';
$string['thirdpartyexception'] = '제 3자 예외 조항이 포트폴리오 내보내기 ({$a}) 과정에서 제시됨. 수합은 됐지만 수정되어야 할 것임';
$string['transfertime'] = '전송 시간';
$string['unknownplugin'] = '알 수 없음(관리자에 의해 제거된 듯 함)';
$string['wait'] = '대기';
$string['wanttowait_high'] = '완료되기까지 대기하는 것을 권장하지는 않습니다만, 확실하게 그 결과를 알고 싶다면 대기하실 수 있습니다.';
$string['wanttowait_moderate'] = '전송을 위해 대기하길 원하십니까? 수분 정도 걸립니다.';
