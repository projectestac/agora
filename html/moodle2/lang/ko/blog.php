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
 * Strings for component 'blog', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = '새 게시물 추가';
$string['addnewexternalblog'] = '외부 블로그 등록';
$string['assocdescription'] = '강좌나 활동 모듈에 대해 적으려면, 여기에서 선택하시오.';
$string['associated'] = '연결된 {$a}';
$string['associatewithcourse'] = '강좌 {$a->coursename} 관련 블로그';
$string['associatewithmodule'] = '{$a->modtype}: {$a->modname} 관련 블로그';
$string['association'] = '연합';
$string['associations'] = '연합';
$string['associationunviewable'] = '본 항목은 강좌에 연결되거나 \'공개\'필드가 변경되지 않는 한 다른 사람에게는 보여지지 않습니다.';
$string['autotags'] = '태그 추가';
$string['autotags_help'] = '<p>외부에 있는 블로그의 내용들을 이 사이트로 자동 복사해 오기 위해 태그들을 컴마로 구별하여 목록을 작성. 이 태그들은 블로그 목록들을 검색하는 데 이용되며, 외부 블로그와 연동하기 위해 탐색하는 데 활용된다.</p>';
$string['backupblogshelp'] = '활성화되어 있으면 사이트 자동 백업시 블로그가 포함될 것입니다.';
$string['blockexternalstitle'] = '외부 블로그';
$string['blocktitle'] = '블로그덧글 블록 이름';
$string['blog'] = '블로그';
$string['blogaboutthis'] = '{$a->type} 관련 블로그';
$string['blogaboutthiscourse'] = '본 강좌에 대한 항목 추가';
$string['blogaboutthismodule'] = '{$a} 에 대한 항목 추가';
$string['blogadministration'] = '블로그 관리';
$string['blogdeleteconfirm'] = '이 블로그를 삭제할까요?';
$string['blogdisable'] = '블로깅이 활성화되어 있지 않음!';
$string['blogentries'] = '블로그 항목';
$string['blogentriesabout'] = '{$a} 에 대한 블로그 항목';
$string['blogentriesbygroupaboutcourse'] = '{$a->group} 의 {$a->course} 강좌 블로그 항목';
$string['blogentriesbygroupaboutmodule'] = '{$a->group} 의 {$a->mod} 블로그 항목';
$string['blogentriesbyuseraboutcourse'] = '{$a->user} 의 {$a->course} 강좌 블로그 항목';
$string['blogentriesbyuseraboutmodule'] = '{$a->user}의 {$a->mod}에 대한 블로그 항목';
$string['blogentrybyuser'] = '{$a} 의 블로그 항목';
$string['blogpreferences'] = '블로그 사용자 설정';
$string['blogs'] = '블로그들';
$string['blogscourse'] = '강좌 블로그';
$string['blogssite'] = '사이트 블로그';
$string['blogtags'] = '블로그 태그';
$string['cannotviewcourseblog'] = '본 강좌에서 블로그를 볼 수 있는 권한이 없음';
$string['cannotviewcourseorgroupblog'] = '본 강좌/모둠에서 블로그를 볼 수 있는 권한이 없음';
$string['cannotviewsiteblog'] = '사이트의 모든 블로그를 볼 수 있는 권한이 없음';
$string['cannotviewuserblog'] = '사용자 블로그를 볼 수 있는 권한이 없음';
$string['configexternalblogcrontime'] = '새 항목에 대한 외부 블로그 검색 빈도';
$string['configmaxexternalblogsperuser'] = '무들 블로그에 각 사용자가 연결할 수 있는 외부 블로그의 수';
$string['configuseblogassociations'] = '강좌 및 강좌 모듈과 블로그의 연동 활성화';
$string['configuseexternalblogs'] = '사용자가 외부 블로그 피드를 명시하는 것을 가능하게함. 무들은 정기적으로 이 블로그들을 검색한 후 무들사용자의 블로그로 새 항목들을 복사해 옵니다.';
$string['courseblog'] = '강좌 블로그 :{$a}';
$string['courseblogdisable'] = '강좌 블로그가 활성화 되지 않음';
$string['courseblogs'] = '강좌를 공유한 사람에게만 블로그가 보여짐';
$string['deleteblogassociations'] = '블로그 연합 삭제';
$string['deleteblogassociations_help'] = '선택되면 블로그 게시글은 더 이상 강좌 혹은 강좌 활동 및 자원과 연관되지 않습니다. 블로그 게시글은 삭제되지 않을 것입니다.';
$string['deleteexternalblog'] = '외부 블로그 등록 취소';
$string['deleteotagswarn'] = '정말로 이  태그들를 모든 블로그와 시스템에서 삭제하겠습니까?';
$string['description'] = '소개';
$string['description_help'] = '외부에 있는 블로그에 대한 전반적인 소개. 이를 비워두면 외부에 있는 블로그의 기본 소개가 그대로 쓰여지게 됩니다.';
$string['donothaveblog'] = '블로그를 개설하지 않았습니다.';
$string['editentry'] = '블로그 편집';
$string['editexternalblog'] = '외부 블로그 편집';
$string['emptybody'] = '블로그 게시 내용은 비어있을 수 없음';
$string['emptyrssfeed'] = '입력된 주소가 유효한 RSS 피드를 가리키지 않음';
$string['emptytitle'] = '블로그의 제목은 비어있을 수 없음';
$string['emptyurl'] = 'RSS feed에 맞는 정확한 주소를 지정해야 함';
$string['entrybody'] = '블로그 게시물 내용';
$string['entrybodyonlydesc'] = '게시물 설명';
$string['entryerrornotyours'] = '이 게시물은 당신것이 아닙니다';
$string['entrysaved'] = '입력사항이 저장되었습니다';
$string['entrytitle'] = '게시물 제목';
$string['evententryadded'] = '블로그 게시글이 추가됨';
$string['evententrydeleted'] = '블로그 게시글이 삭제됨';
$string['evententryupdated'] = '블로그 게시물이 업데이트되었습니다.';
$string['externalblogcrontime'] = '외부 블로그 크론 스케줄';
$string['externalblogdeleteconfirm'] = '이 외부 블로그를 제명시키겠습니까?';
$string['externalblogdeleted'] = '외부 블로그 제명됨';
$string['externalblogs'] = '외부 블로그';
$string['feedisinvalid'] = '잘못된 피드임';
$string['feedisvalid'] = '쓸 수 있는 피드임';
$string['filterblogsby'] = '검색 조건...';
$string['filtertags'] = '필터 태그';
$string['filtertags_help'] = '사용하고자 하는 게시글을 필터하기 위해 이 기능을 사용할 수 있습니다. 여기에 (콤마로 분리된) 태그를 입력하면 이들 태그들이 있는 게시글이 외부 블로그에서 복사됩니다.';
$string['groupblog'] = '모둠 블로그: {$a}';
$string['groupblogdisable'] = '모둠 블로그가 활성화 되어 있지 않음';
$string['groupblogentries'] = '모둠 {$a->groupname} 의 {$a->coursename} 와 연동된 블로그 항목';
$string['groupblogs'] = '사용자는 모듬의 전용 블로그만을 볼 수 있음';
$string['incorrectblogfilter'] = '바르지 않은 블로그 필터가 지정되었음';
$string['intro'] = '이 RSS 피드는 한개 이상의 블로그에 의해 자동으로 생성됩니다.';
$string['invalidgroupid'] = '쓸 수없는 모둠 ID';
$string['invalidurl'] = '주소가 바르지 않음';
$string['linktooriginalentry'] = '원본 블로그로 연결';
$string['maxexternalblogsperuser'] = '사용자당 최대 외부 블로그 갯수';
$string['name'] = '이름';
$string['name_help'] = '<p>외부에 있는 블로그의 이름. 이를 비워두면 외부 불로그의 명칭이 그대로 쓰이게 된다.</p>';
$string['noentriesyet'] = '볼수있는 게시물이 없습니다.';
$string['noguestpost'] = '손님들은 블로그를 게시할 수 없습니다';
$string['nopermissionstodeleteentry'] = '이 블로그 항목을 지울 수 있는 권한이 없음';
$string['norighttodeletetag'] = '이 태그 {$a} 를 삭제할 권한이 없습니다.';
$string['nosuchentry'] = '블로그 항목 없음';
$string['notallowedtoedit'] = '이 게시물을 편집하도록 허용되지 않았습니다.';
$string['numberofentries'] = '게시물들: {$a}';
$string['numberoftags'] = '보여줄 태그 수';
$string['page-blog-edit'] = '블로그 편집 페이지';
$string['page-blog-index'] = '블로그 목록 페이지';
$string['page-blog-x'] = '모든 블로그 페이지';
$string['pagesize'] = '웹페이지당 블로그 게시물 수';
$string['permalink'] = 'Permalink';
$string['personalblogs'] = '사용자는 자신의 블로그만 볼 수 있습니다.';
$string['preferences'] = '환경 설정';
$string['publishto'] = '게시';
$string['publishtocourse'] = '강좌에 공개';
$string['publishtocourseassoc'] = '연동된 강좌의 구성원';
$string['publishtocourseassocparam'] = '{$a} 의 구성원';
$string['publishtogroup'] = '모둠에 공개';
$string['publishtogroupassoc'] = '연동된 강좌의 모둠 구성원';
$string['publishtogroupassocparam'] = '{$a} 의 모둠 구성원';
$string['publishto_help'] = '<p>여기에는 세가지 설정이 있습니다.</p>

<p><b>나(기본값)</b> - 여러분과 관리자만 읽을 수 있다.</p>

<p><b>사이트</b> - 이 사이트에 등록한 사람들에게만 읽을 권한을 준다.</p>

<p><b>모두</b> - 손님을 비롯해 전세계 어느 누구라도 내용을 읽을 수 있다.</p>';
$string['publishtonoone'] = '자신에게만(초안)';
$string['publishtosite'] = '이 사이트에 있는 누구에게나';
$string['publishtoworld'] = '누구에게나';
$string['readfirst'] = '필독';
$string['relatedblogentries'] = '관련 항목';
$string['retrievedfrom'] = '가져온 곳';
$string['rssfeed'] = '블로그 RSS 송출';
$string['searchterm'] = '검색: {$a}';
$string['settingsupdatederror'] = '오류발생. 블로그 사용자 설정을 업데이트할 수 없습니다.';
$string['siteblog'] = '사이트 블로그: {$a}';
$string['siteblogdisable'] = '사이트 블로그가 활성화되어 있지 않음';
$string['siteblogs'] = '모든 사이트 사용자가 블로그 게시물을 볼수 있습니다.';
$string['tagdatelastused'] = '태그가 사용된 마지막 날';
$string['tagparam'] = '태그: {$a}';
$string['tags'] = '태그';
$string['tagsort'] = '태그 정렬';
$string['tagtext'] = '태그문장';
$string['timefetched'] = '최근 동기화 시각';
$string['timewithin'] = '최근 사용한 태그 표시';
$string['updateentrywithid'] = '게시물 업데이트';
$string['url'] = '웹 주소';
$string['url_help'] = '외부 블로그의 RSS 피드 주소를 적으시오';
$string['useblogassociations'] = '블로그 연동 활성화';
$string['useexternalblogs'] = '외부 블로그 활성화';
$string['userblog'] = '사용자 블로그: {$a}';
$string['userblogentries'] = '{$a} 블로그';
$string['valid'] = '유효';
$string['viewallblogentries'] = '{$a} 에 대한 모든 블로그 항목';
$string['viewallmodentries'] = '{$a->type} 에 대한 모든 항목 보기';
$string['viewallmyentries'] = '내 모든 항목 보기';
$string['viewblogentries'] = '{$a->type} 에 대한 게시글';
$string['viewblogsfor'] = '모든 항목 보기 ...';
$string['viewcourseblogs'] = '이 강좌의 모든 항목 보기';
$string['viewentriesbyuseraboutcourse'] = '이 강좌의 모든 항목을 {$a} 로 보기';
$string['viewgroupblogs'] = '모둠의 항목 보기 ...';
$string['viewgroupentries'] = '모둠 항목';
$string['viewmodblogs'] = '모듈의 항목 보기 ...';
$string['viewmodentries'] = '모듈 항목';
$string['viewmyentries'] = '내 게시물 ';
$string['viewmyentriesaboutcourse'] = '이 강좌에 대한 내 입력 내용 보기';
$string['viewmyentriesaboutmodule'] = '{$a} 에 대한 내 입력 내용 보기';
$string['viewsiteentries'] = '모든 게시물 보기';
$string['viewuserentries'] = '{$a}로 모든 항목 보기';
$string['worldblogs'] = '공개하도록 설정된 게시물은 아무나 읽을 수 있습니다.';
$string['wrongpostid'] = '잘못된 블로그 게시물 아이디';
