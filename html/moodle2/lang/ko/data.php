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
 * Strings for component 'data', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   data
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = '실행';
$string['add'] = '내용 추가';
$string['addcomment'] = '덧글 추가';
$string['addentries'] = '내용 추가';
$string['addtemplate'] = '템플릿 추가';
$string['advancedsearch'] = '고급 검색';
$string['allowcomments'] = '덧글 허용';
$string['alttext'] = '상응 문구';
$string['approve'] = '승인';
$string['approved'] = '승인됨';
$string['areacontent'] = '항목들';
$string['ascending'] = '오름차순';
$string['asearchtemplate'] = '고급 검색 템플릿';
$string['atmaxentry'] = '허용된 최대 수의 게시물을 입력하였습니다.';
$string['authorfirstname'] = '저자의 이름';
$string['authorlastname'] = '저자의 성';
$string['autogenallforms'] = '기본 템플릿 생성';
$string['autolinkurl'] = 'URL 자동 링크';
$string['availablefromdate'] = '부터 사용가능';
$string['availabletags'] = '사용가능한 범주';
$string['availabletags_help'] = '<p align="center"><strong>쓸 수 있는 태그들</strong></p>
<p>입력내용들이 편집되거나 보여질 때, 필드 혹은 버튼으로 치환될 수 있는 태그들은 탬플릿에 미리 저장되어 있어야 한다.</p>
<p>필드는 다음과 같은 형식을 갖는다: [[fieldname]]</p>
<p>버튼은 다음과 같은 형식을 갖는다: ##somebutton##</p>
<p>"쓸 수 있는 태그"목록에 제시된 태그들만 현재의 탬플릿에서 쓸 수 있다.</p>';
$string['availabletodate'] = '까지 사용가능';
$string['blank'] = '공백';
$string['buttons'] = '실행';
$string['bynameondate'] = '{$a->date} 에 {$a->name} 에 의해';
$string['cancel'] = '취소';
$string['cannotaccesspresentsother'] = '다른 사용자가 설정사항 접근을 금지했음';
$string['cannotadd'] = '입력내용을 추가할 수 없음!';
$string['cannotdeletepreset'] = '설정사항 삭제 오류!';
$string['cannotoverwritepreset'] = '프리셋 덮어쓰기 오류';
$string['cannotunziptopreset'] = '지정된 경로에 풀어넣을 수 없음';
$string['checkbox'] = '체크박스';
$string['chooseexportfields'] = '내보낼 필드 선택:';
$string['chooseexportformat'] = '내보낼 형식 선택:';
$string['chooseorupload'] = '파일 선택';
$string['columns'] = '행';
$string['comment'] = '덧글';
$string['commentdeleted'] = '덧글이 삭제됨';
$string['commentempty'] = '덧글 없음';
$string['comments'] = '덧글';
$string['commentsaved'] = '덧글 저장됨';
$string['commentsn'] = '{$a} 덧글';
$string['commentsoff'] = '댓글 기능이 활성화되지 않았습니다.';
$string['configenablerssfeeds'] = '이 스위치는 모든 데이터베이스의 RSS 피드를 가능하게 합니다. 수동으로 각각의 데이터베이스에 대하여 송출기능을 켤 수도 있습니다.';
$string['confirmdeletefield'] = '파일을 삭제하려고 합니다. 확실합니까?';
$string['confirmdeleterecord'] = '이 게시물을 삭제하려고 하는 것이 확실합니까?';
$string['csstemplate'] = 'CSS 템플릿';
$string['csvfailed'] = 'CSV 파일에서 원자료를 읽을 수 없음';
$string['csvfile'] = 'CSV 파일';
$string['csvimport'] = 'CSV 파일 가져오기';
$string['csvimport_help'] = '<p align="center"><strong>CSV 파일로부터 가져옴</strong></p>

<p>여기에서 CSV(Comma-Separated-Values:쉼표로 구분된 값)란 문서 변형을 위한 보편적인 형식이다.</p>

<p>요구되는 필드의 형식은 평범한 문서 파일로서, 첫번째 레코드에 필드명의 목록을 지녀야 한다.
나머지 자료들은 다음 줄부터 놓이게 되며, 한 레크드당 한 줄을 할당한다.</p>

<p>필드의 구분자는 보통 쉼표(컴마)이고 필드의 구획은 대체로 따로 설정하지 않는다.
(필드의 구획은 각 레코드의 각 필드로 구성되어 있는 문자로 대체된다.)</p>

<p>레코드들은 반드시 새로운 줄로 구분되어야 한다.(보통은 문서편집기의
RETURN나 ENTER 키를 누름으로서 자동 생성된다.) 탭은 특별히  t 로, 새 줄은  n으로 지정할 수 있다. </p>

<p>예제 파일:</p>

<pre>
  name,height,weight
  Kai,180cm,80kg
  Kim,170cm,60kg
  Koo,190cm,20kg
</pre>

<p>경고: 어떤 필드형은 지원되지 않을 수도 있다.</p>';
$string['csvwithselecteddelimiter'] = '선택된 구분자로 분리된 <acronym title="Comma Separated Values">CSV</acronym>문서:';
$string['data:addinstance'] = '새 데이터베이스 추가';
$string['data:approve'] = '미승인된 자료 승인';
$string['data:comment'] = '덧글 쓰기';
$string['data:exportallentries'] = '모든 데이터베이스 내용 내보내기';
$string['data:exportentry'] = '데이터베이스 내용 내보내기';
$string['data:exportownentry'] = '내 데이터베이스 내용 내보내기';
$string['data:exportuserinfo'] = '사용자 정보 내보내기';
$string['data:managecomments'] = '덧글 관리';
$string['data:manageentries'] = '입력내용 관리';
$string['data:managetemplates'] = '템플릿 관리';
$string['data:manageuserpresets'] = '템플릿 초기설정 관리';
$string['data:rate'] = '입력내용 평가';
$string['data:readentry'] = '입력내용 읽기';
$string['data:viewallratings'] = '개인추천 원점수 보기';
$string['data:viewalluserpresets'] = '모든 사람의 기본 설정을 봄';
$string['data:viewanyrating'] = '총 득점 보기';
$string['data:viewentry'] = '입력내용 보기';
$string['data:viewrating'] = '받은 전체 등급 보기';
$string['data:writeentry'] = '내용 쓰기';
$string['date'] = '일자';
$string['dateentered'] = '입력일자';
$string['defaultfielddelimiter'] = '(기본은 쉼표)';
$string['defaultfieldenclosure'] = '(기본은 none)';
$string['defaultsortfield'] = '기본 정렬 항목';
$string['delete'] = '삭제';
$string['deleteallentries'] = '모든 항목 삭제';
$string['deletecomment'] = '이 덧글을 삭제할까요?';
$string['deleted'] = '삭제됨';
$string['deletefield'] = '기존의 항목 삭제';
$string['deletenotenrolled'] = '등록하지 않은 사용자에 의한 입력항목 삭제';
$string['deletewarning'] = '기존의 설정값을 정말 삭제합니까?';
$string['descending'] = '내림차순';
$string['directorynotapreset'] = '{$a->directory} 는 설정되지 않음. 빠진 파일들: {$a->missing_files} 개';
$string['download'] = '내려받음';
$string['edit'] = '편집';
$string['editcomment'] = '덧글 편집';
$string['editentry'] = '게시물 편집';
$string['editordisable'] = '편집 불가';
$string['editorenable'] = '편집 가능';
$string['emptyadd'] = '이 추가 템플릿은 비어 있습니다. 기본 템플릿을 생성합니다.';
$string['emptyaddform'] = '어떤 항목도 기입하지 않았습니다!';
$string['entries'] = '입력 내용';
$string['entrieslefttoadd'] = '이 활동을 완료하려면 {$a->entriesleft} 개 이상의  항목을 입력해야만 합니다.';
$string['entrieslefttoaddtoview'] = '다른 참여자의 내용을 보기 전에 {$a->entrieslefttoview} 항목을 더 추가해야만 합니다.';
$string['entry'] = '입력 내용';
$string['entrysaved'] = '입력 내용이 저장되었습니다.';
$string['errormustbeteacher'] = '선생님만 이 페이지를 사용할 수 있습니다.';
$string['errorpresetexists'] = '지정된 이름으로 미리 설정이 되어 있음';
$string['example'] = '데이터베이스 모듈 예제';
$string['excel'] = '엑셀';
$string['expired'] = '죄송합니다만, 이 활동은 {$a}에 종료되었으므로 더 이상 이용할 수 없습니다.';
$string['export'] = '내보내기';
$string['exportaszip'] = 'zip파일로 내보내기';
$string['exportaszip_help'] = '<p align="center"><strong>Zip으로 내보냄</strong></p>
<p>이는 후에 압축하여 가져온 템플릿을 다른 데이터테이스에 올릴 수 있게, 자신의 컴퓨터로 내려받을 수 있게 한다.</p>';
$string['exportedtozip'] = 'zip파일로 묶어 내보냄';
$string['exportentries'] = '항목들 내보내기';
$string['exportownentries'] = '여러분의 항목만 내보내겠습니까? ({$a->mine}/{$a->all})';
$string['failedpresetdelete'] = '초기설정 삭제 오류!';
$string['fieldadded'] = '항목이 추가됨';
$string['fieldallowautolink'] = '자동링크 허용';
$string['fielddeleted'] = '항목이 삭제됨';
$string['fielddelimiter'] = '항목 구분자';
$string['fielddescription'] = '항목 설명';
$string['fieldenclosure'] = '항목';
$string['fieldheight'] = '항목 높이';
$string['fieldheightlistview'] = '목록보기에서 높이';
$string['fieldheightsingleview'] = '하나보기에서 높이';
$string['fieldids'] = '항목 아이디';
$string['fieldmappings'] = '필드 매핑';
$string['fieldmappings_help'] = '<p align="center"><strong>항목 배치</strong></p>
<p>이 메뉴는 기존의 데이터베이스로부터 자료들을 보존할 수 있도록 한다. 항목에 자료들을 저장하기 위해서는 데이터가 나타날 수 있는 새로운 필드로 배치해야만 한다.
아무런 정보도 저장되지 않은 빈 필드도 존재할 수 있다. 새로운 필드에 배치되지 않은 예전 항목은 잃어버리게 되며 결국 그 항목의 모든 자료는 삭제된다.</p>
<p>동일한 유형의 항목만 배치할 수 있으며, 따라서 각 하위요소들은 각기 다른 항목을 가지게 된다. 또한 예전 항목을 중복하여 필드에 배치하지 않도록 주의해야 한다.
</p>';
$string['fieldname'] = '항목 이름';
$string['fieldnotmatched'] = '데이터베이스에서 파일의 다음 필드를 찾을 수 없습니다:  {$a}';
$string['fieldoptions'] = '옵션(한줄에 하나)';
$string['fields'] = '항목들';
$string['fieldupdated'] = '필드가 업데이트됨';
$string['fieldwidth'] = '폭';
$string['fieldwidthlistview'] = '목록 보기의 폭';
$string['fieldwidthsingleview'] = '하나보기의 폭';
$string['file'] = '파일';
$string['fileencoding'] = '엔코딩';
$string['filesnotgenerated'] = '파일이 전부 생성되지는 않았음 : {$a}';
$string['filtername'] = '데이터베이스 자동링크';
$string['footer'] = '꼬리말';
$string['forcelinkname'] = '링크에 대한 강제 이름';
$string['foundnorecords'] = '기록 없음(<a href="{$a->reseturl}">필터 초기화</a>)';
$string['foundrecords'] = '기록 발견 : {$a->num}/{$a->max} (<a href="{$a->reseturl}">필터 초기화</a>)';
$string['fromfile'] = 'zip파일에서 가져옴';
$string['fromfile_help'] = '<p align=\'center\'><strong>Zip에서 초기설정을 가져옴</strong></p>
<p>내보내기 기능을 이용하여 자신의 컴퓨터에 미리 저장해 두었던 초기 설정을 이 기능을 이용하여 올릴 수 있다.
</p>';
$string['generateerror'] = '생성 안 된 파일이 있음!';
$string['header'] = '머릿말';
$string['headeraddtemplate'] = '게시물을 편집할 때 인터페이스 정의';
$string['headerasearchtemplate'] = '상세 검색을 위한 인터페이스를 정의하십시요';
$string['headercsstemplate'] = '다른 템플릿을 위한 로컬 CSS스타일 정의';
$string['headerjstemplate'] = '다른 템플릿을 위한 자바스크립트 정의';
$string['headerlisttemplate'] = '다중 게시물을 위한 보기 인터페이스 정의';
$string['headerrsstemplate'] = 'RSS 피드 게시물의 모양 정의';
$string['headersingletemplate'] = '단일 게시물에 대한 검색 인터페이스 정의';
$string['importentries'] = '항목들 가져오기';
$string['importsuccess'] = '초기설정이 성공적으로 적용됨';
$string['includeapproval'] = '승인 상태 포함';
$string['includetime'] = '추가/변경된 시간 포함';
$string['includeuserdetails'] = '사용자 세부정보 포함';
$string['insufficiententries'] = '이 데이터베이스를 보기 위해서는 입력항목이 더 필요함';
$string['intro'] = '소개';
$string['invalidaccess'] = '이 페이지는 제대로 접속되지 않았습니다.';
$string['invalidfieldid'] = '필드 ID가 틀렸음';
$string['invalidfieldname'] = '이 필드에 대한 다른 이름을 선택하시오.';
$string['invalidfieldtype'] = '필드 형식이 틀림';
$string['invalidid'] = '틀린 자료 ID';
$string['invalidpreset'] = '{$a} 의 초기설정이 잘 못 됨';
$string['invalidrecord'] = '틀린 레코드';
$string['invalidurl'] = '맞지 않는 URL';
$string['jstemplate'] = '자바스크립트 템플릿';
$string['latitude'] = '위도';
$string['latlong'] = '위도/경도';
$string['latlongdownloadallhint'] = '모든 입력을 KML로 간주';
$string['latlongkmllabelling'] = '입력을 KML파일로 명하는 법(Google Earth)';
$string['latlonglinkservicesdisplayed'] = '외부 표현 양식';
$string['latlongotherfields'] = '다른 항목';
$string['list'] = '목록 보기';
$string['listtemplate'] = '목록 템플릿';
$string['longitude'] = '경도';
$string['mapexistingfield'] = '{$a} 에 대치';
$string['mapnewfield'] = '새 필드 생성';
$string['mappingwarning'] = '새로운 필드와 일치하지 않는 예전 필드는 없어지며 그에 대한 자료 역시 삭제될 것임';
$string['maxentries'] = '최대 게시물 수';
$string['maxentries_help'] = '<p align="center"><strong>최대 입력수</strong></p>

<p>이 활동을 위해 한 참여자가 제출할 수 있는 최대 입력항목 수</p>';
$string['maxsize'] = '최대 크기';
$string['menu'] = '메뉴';
$string['menuchoose'] = '선택...';
$string['missingdata'] = '데이터 ID 혹은 대상이 필드 클래스로 제공되어야 함';
$string['missingfield'] = '작성 오류: 필드 클래스를 정의할 때 필드/데이터를 지정해야만 함';
$string['modulename'] = '데이터베이스';
$string['modulename_help'] = '데이터베이스 활동 모듈은, 참여자들이 자료를 생성하고 관리, 검색할 수 있게 해 준다. 입력되는 자료들은 이미지를 비롯하여 파일, 인터넷 주소, 숫자 또는 문서 등, 그 형식이나 구조에 거의 제한 받지 않는다. ';
$string['modulenameplural'] = '데이터베이스';
$string['more'] = '더 이상';
$string['moreurl'] = 'URL 더';
$string['movezipfailed'] = 'Zip 파일을 옮길 수 없음';
$string['multientry'] = '반복되는 게시물';
$string['multimenu'] = '메뉴(다중 선택)';
$string['multipletags'] = '범주 중복! 템플릿 저장되지 않음';
$string['namecheckbox'] = '체크박스 항목';
$string['namedate'] = '날짜 항목';
$string['namefile'] = '파일 항목';
$string['namelatlong'] = '위도/경도 항목';
$string['namemenu'] = '메뉴 항목';
$string['namemultimenu'] = '다중 선택 메뉴 항목';
$string['namenumber'] = '수 항목';
$string['namepicture'] = '그림 항목';
$string['nameradiobutton'] = '라디오 버튼 항목';
$string['nametext'] = '텍스트 항목';
$string['nametextarea'] = '텍스트 영역 항목';
$string['nameurl'] = 'URL 항목';
$string['newentry'] = '새 게시물';
$string['newfield'] = '새 항목 만들기';
$string['newfield_help'] = '항목은 데이터 입력을 허용합니다. 데이터베이스 활동의 각 입력 항목은 드롭다운 목록해서 연월일을 선택할 수 있는 날짜 필드, 이미지를 올릴 수 있는 그림 필드, 참여자들이 한개 혹은 여러개의 옵션을 선택할 수 있는 체크박스 필드등의 여러 형식의 다중 필드를 포함할 수 있습니다.

각 필드이름은 유일한 필드 이름이 있어야 합니다. 필드 설명은 선택사항입니다.';
$string['noaccess'] = '페이지에 대한 접근 권한이 없음';
$string['nodefinedfields'] = '새 초기설정에 팔드가 정의되지 않았음!';
$string['nofieldcontent'] = '필드 내용이 없음';
$string['nofieldindatabase'] = '이 데이터베이스에 정의된 필드가 없습니다. ';
$string['nolisttemplate'] = '목록 템플릿이 아직 정의되지 않음';
$string['nomatch'] = '해당되는 게시물이 없음!';
$string['nomaximum'] = '최대값 없음';
$string['norecords'] = '데이터베이스에 입력된 내용 없음';
$string['nosingletemplate'] = '단일 템플릿이 아직 정의되지 않음';
$string['notapproved'] = '아직 입력을 받을 수 없음';
$string['notinjectivemap'] = '일대일 매핑이 아님';
$string['notopenyet'] = '죄송합니다만 이 활동은 {$a} 가 될 때까지 이용할 수 없습니다.';
$string['number'] = '수';
$string['numberrssarticles'] = 'RSS 피드 안의 게시글';
$string['numnotapproved'] = '대기중';
$string['numrecords'] = '{$a} 게시물';
$string['ods'] = '<acronym title="OpenDocument Spreadsheet">ODS</acronym> (OpenOffice)';
$string['optionaldescription'] = '간단한 설명(선택)';
$string['optionalfilename'] = '파일이름 (선택)';
$string['other'] = '기타';
$string['overrwritedesc'] = '기존의 값에 덮어 씀';
$string['overwrite'] = '덮어 씀';
$string['overwritesettings'] = '현재 설정에 덮어 씀';
$string['page-mod-data-x'] = '모든 데이터베이스 활동 모듈 페이지';
$string['pagesize'] = '한 페이지당 게시물 수';
$string['participants'] = '참가자';
$string['picture'] = '그림';
$string['pleaseaddsome'] = '시작하려면 아래에 새로운 설정을 하던지 아니면 미리 <a href="{$a}">설정한 기본값</a>에서 선택하십시오.';
$string['pluginadministration'] = '데이터베이스 활동 관리';
$string['pluginname'] = '데이터베이스';
$string['portfolionotfile'] = '파일 대신 포트폴리오로 내보내기(csv 및 leap2a 만)';
$string['presetinfo'] = '초기설정으로 저장한 내용이 템플릿으로 공개될 것입니다. 다른 사용자들은 이 설정을 자신의 데이터베이스에서 사용할 수 있습니다.';
$string['presets'] = '초기설정들';
$string['radiobutton'] = '라디오버튼';
$string['recordapproved'] = '게시물이 허용됨';
$string['recorddeleted'] = '게시물이 삭제됨';
$string['recordsnotsaved'] = '게시물이 저장되지 않음. 올린 파일의 형식을 점검하기 바랍니다.';
$string['recordssaved'] = '게시물이 저장됨';
$string['requireapproval'] = '승인이 필요합니다';
$string['requireapproval_help'] = '활성화되면 입력항목이 모든 사람들에게 보여지기 전에 선생님의 승인이 필요합니다.';
$string['requiredentries'] = '필요한 게시물';
$string['requiredentries_help'] = '<p align="center"><strong>요구된 항목수</strong></p>

<p>참여자들에게 제출하도록 요구된 입력 항목의 수. 참여자들이 요구된 항목수를 채우지 않고 내용을 보려고 할 때는 기억할 수 있는 메시지를 보여준다.</p>

<p>활동은 사용자들이 요구된 항목수를 제출할 때까지 여지를 두지 않을 것이다.</p>';
$string['requiredentriestoview'] = '보려면 입력을 해야 함';
$string['requiredentriestoview_help'] = '<p align="center"><strong>보기전 요구되는 입력사항들</strong></p>

<p>이 데이터베이스 활동에서 어떤 항목을 보기위해 참여자들이 필수로 입력해야만 하는 항목의 수</p>
<p>주의: 이 기능은 어떤 데이터베이스와 자동으로 연결해야 할지를 판단할 수 없기 때문에, 데이터베이스 자동 연결 기능과는 함께 사용할 수 없음.</p>';
$string['resetsettings'] = '필터 초기화';
$string['resettemplate'] = '템플릿 초기화';
$string['resizingimages'] = '영상보기 크기 조정';
$string['rows'] = '열';
$string['rssglobaldisabled'] = '비활성화됨. 사이트 설정 변수를 확인하세요.';
$string['rsstemplate'] = 'RSS 템플릿';
$string['rsstitletemplate'] = 'RSS 표제 템플릿';
$string['save'] = '저장';
$string['saveandadd'] = '저장 및 추가';
$string['saveandview'] = '저장 및 보기';
$string['saveaspreset'] = '초기설정으로 저장';
$string['saveaspreset_help'] = '<p align="center"><strong>초기설정으로 저장</strong></p>
<p>이것은 현재의 템플릿을 사이트의 누구건 보거나 사용할 수 있게 초기설정으로 공개한다. 이는 초기설정 목록에 나타나게 된다. 여러분은 언제든 이를 삭제할 수도 있다.</p>';
$string['savesettings'] = '설정 저장';
$string['savesuccess'] = '저장 완료. 여러분의 초기 설정이 사이트 전반에 적용될 것입니다.';
$string['savetemplate'] = '템플릿 저장';
$string['search'] = '검색';
$string['selectedrequired'] = '모든 선택사항 필요';
$string['showall'] = '전체항목 보기';
$string['single'] = '한개 보기';
$string['singletemplate'] = '하나의 템플릿';
$string['subplugintype_datafield'] = '데이터베이스 필드 유형';
$string['subplugintype_datafield_plural'] = '데이터베이스 필드 유형';
$string['subplugintype_datapreset'] = '프리셋';
$string['subplugintype_datapreset_plural'] = '초기설정들';
$string['teachersandstudents'] = '{$a->teachers} 및 {$a->students}';
$string['templates'] = '템플릿';
$string['templatesaved'] = '템플릿이 저장됨';
$string['text'] = '문장';
$string['textarea'] = '글상자';
$string['timeadded'] = '추가된 시간';
$string['timemodified'] = '변경된 시간';
$string['todatabase'] = '이 데이터베이스에';
$string['type'] = '항목 유형';
$string['undefinedprocessactionmethod'] = '데이터 초기설정에서 "{$a}"를 처리하기 위한 방법이 정의되지 않았음.';
$string['unsupportedexport'] = '({$a->fieldtype}) 내보낼 수 없음';
$string['updatefield'] = '기존 필드 업데이트';
$string['uploadfile'] = '파일 올리기';
$string['uploadrecords'] = '파일에서 항목 올리기';
$string['url'] = 'URL';
$string['usedate'] = '검색에 포함합니다.';
$string['usestandard'] = '초기설정 사용';
$string['usestandard_help'] = '<p align="center"><strong>초기설정 사용</strong></p>
<p> 사이트 전체에 걸쳐 활용 가능한 템플릿을 사용할 수 있다.</p>
<p> 또한 만일 \'초기설정 저장\'기능을 사용하면 초기설정 값을 라이브러리에 첨가해 놓거나 삭제할 수도 있다.</p>';
$string['viewfromdate'] = '이후 볼 수 있음';
$string['viewtodate'] = '까지 볼 수 있음';
$string['wrongdataid'] = '잘못된 데이터 아이디가 제공되었음';
