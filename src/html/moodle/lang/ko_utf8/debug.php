<?PHP // $Id: debug.php,v 1.16 2009/12/14 09:22:14 mudrd8mz Exp $ 
      // debug.php - created with Moodle 2.0 dev (Build: 20081101) (2008101300)


$string['authpluginnotfound'] = '인증 플러그인 $a 없음';
$string['blocknotexist'] = '블록 $a 가 없음';
$string['cannotbenull'] = '$a 는 빌 수 없음!';
$string['cannotcreateadminuser'] = '심각한 오류: 관리자 계정을 생성할 수 없음!!!';
$string['cannotdowngrade'] = '$a->oldversion 에서 $a->newversion 으로는 판내림을 할 수 없음';
$string['cannotfindadmin'] = '관리자가 없음!';
$string['cannotinitpage'] = '화면을 초기화 할 수 없음: 잘못된 $a->name id $a->id';
$string['cannotsetupsite'] = '심각한 오류! 사이트를 설정할 수 없음!';
$string['cannotsetuptable'] = '$a 테이블을 제대로 설정할 수 없음!';
$string['cannotupdaterelease'] = '오류: 새 판의 데이터베이스 갱신을 할 수 없음!';
$string['cannotupdateversion'] = '업그레이드 실패! (새 판의 설정 테이블을 갱신할 수 없음)';
$string['cannotupgradecapabilities'] = '역할 시스템에 대한 핵심 권한 갱신을 할 수 없음';
$string['cannotupgradedbcustom'] = '데이터베이스 최적화 실패! (config 테이블의 판 갱신을 할 수 없음)';
$string['codingerror'] = '프로그램 오류 발견. 프로그램 제작자 $a 에 의해 수정되야 합니다.';
$string['configmoodle'] = '아직 무들이 설정되지 않았음. 우선 config.php를 수정할 필요가 있음';
$string['dbnotinsert'] = '데이터베이스 오류 - ($a)를 삽입할 수 없음';
$string['dbnotsetup'] = '오류: 주 데이터베이스가 바르게 설정되지 않음';
$string['dbnotsupport'] = '오류: 데이터베이스($a)가 아직 무들에 의해 지원되지 않거나 install.xml가 존재하지 않음. lib/db의 경로를 참조하기 바람';
$string['dbnotupdate'] = '데이터베이스 오류 - ($a)를 갱신할 수 없음';
$string['doesnotworkwitholdversion'] = '무들의 예전 판에서는 이 스크립트가 작동하지 않음';
$string['erroroccur'] = '현재의 과정에서 오류가 발생함';
$string['fixsetting'] = 'config.php의 설정을 조절하십시오. <p>현재설정</p> <p>\$CFG->dirroot = \"$a->current\"; 를</p> <p>\$CFG->dirroot = \"$a->found\" 로 바꾸어야 합니다</p>';
$string['invalidarraysize'] = '$a 매개변수의 틀린 어레이 크기';
$string['invalideventdata'] = '틀린 이벤트 자료 제시: $a';
$string['missingconfigversion'] = '설정 테이블의 판번호 누락, 계속할 수 없습니다.';
$string['modulenotexist'] = '$a 모듈이 없음';
$string['morethanonerecordinfetch'] = 'fetch()에 중복 자료 발견!';
$string['mustbeoveride'] = '모호한 $a 방법은 수정되어야 합니다.';
$string['noactivityname'] = 'page_generic_activity에서 추촐된 페이지 오브젝트는 \$this->activityname 을 정의하지 않습니다.';
$string['noadminrole'] = '관리자 역할을 찾을 수 없음';
$string['noblockbase'] = '/blocks/moodleblock.class.php
noblockbase에 대하여 block_base가 정의되지 않았거나 파일을 찾을 수 없음';
$string['noblocks'] = '블록이 설치되지 않았음!';
$string['nocaps'] = '오류: 권한이 정의되지 않았음!';
$string['nocate'] = '범주 없음!';
$string['nomodules'] = '모듈이 없음!';
$string['nopageclass'] = '가져온 $a 에 page classes가 없음';
$string['noreports'] = '어느 보고서에도 접근할 수 없음';
$string['notables'] = '테이블 없음!';
$string['phpvaroff'] = 'PHP서버의 변수 \'$a->name\'는  off되어야 함 -   $a->link';
$string['phpvaron'] = 'PHP서버의 변수 \'$a->name\'가 On 이 아님 -   $a->link';
$string['sessionmissing'] = '세션에 $a 가 없음';
$string['siteisnotdefined'] = '사이트가 정의되지 않았음!';
$string['sqlrelyonobsoletetable'] = '이 SQL은 과거 $a 테이블에 의존합니다! 개발자가 코드를 수정해야 합니다.';
$string['upgradefail'] = '갱신 실패! $a 를 참조하시오.';
$string['withoutversion'] = '주 version.php가 지정되지 않았거나 읽을 수 없음';
$string['xmlizeunavailable'] = 'xml 변환기능을 사용할 수 없음';

?>
