<?PHP // $Id: simpletest.php,v 1.13 2009/12/01 19:48:23 koenr Exp $ 
      // simpletest.php - created with Moodle 2.0 dev (Build: 20091201) (2009112400)


$string['addconfigprefix'] = '설정파일에 접두어 추가';
$string['all'] = '모두';
$string['confignonwritable'] = '웹으로 config.php를 작성할 수 없습니다. 허가권을 변경하던지, 적절한 사용자 계정으로 이를 편집하고 마지막에 다음 줄과 같은 내용을 추가하십시오. <br />\$CFG->unittestprefix = \'tst_\' // Change tst_ to a prefix of your choice, different from \$CFG->prefix';
$string['deletingnoninsertedrecord'] = '유닛 점검에 포함되지 않은 기록( $a->table 테이블의 id $a->id )을 삭제하려고 합니다.';
$string['deletingnoninsertedrecords'] = '유닛 점검에 포함되지 않은 기록들( $a->table 테이블 )을 삭제하려고 합니다.';
$string['droptesttables'] = '점검 테이블 삭제';
$string['exception'] = '예외';
$string['fail'] = '실패';
$string['ignorefile'] = '파일 점검 무시';
$string['ignorethisfile'] = '이 테스트 파일을 무시하고 재 실행';
$string['installtesttables'] = '점검 테이블 설치';
$string['moodleunittests'] = '무들 유닛 점검 : $a';
$string['notice'] = '알림';
$string['onlytest'] = '한 항목만 점검';
$string['pass'] = '통과';
$string['pathdoesnotexist'] = '$a 경로가 존재하지 않습니다.';
$string['prefix'] = '유닛점검 테이블 접두어';
$string['prefixnotset'] = '유닛 점검 데이터베이스 테이블 접두어가 설정되지 않았습니다. config.php에 이를 추가하려면 양식을 채워 제출하시오.';
$string['reinstalltesttables'] = '점검 테이블 재설치';
$string['retest'] = '점검 재 시도';
$string['retestonlythisfile'] = '이 파일만 재 점검';
$string['runall'] = '모든 파일에 대해 점검';
$string['runat'] = '$a 에서 실행';
$string['runonlyfile'] = '이 파일에 대해서만 점검 실행';
$string['runonlyfolder'] = '본 폴더에 대해서만 점검 실행';
$string['runtests'] = '점검 실행';
$string['rununittests'] = '유닛 점검 실행';
$string['showpasses'] = '전 항목 보기';
$string['showsearch'] = '점검 파일 검색결과 보기';
$string['stacktrace'] = '스택 추적 :';
$string['summary'] = '{$a->run}/{$a->total} 사례 점검 완료 : <strong>{$a->passes}</strong>  통과, <strong>{$a->fails}</strong>  실패, <strong>{$a->exceptions}</strong> 가 제외 되었음.';
$string['tablesnotsetup'] = '유닛 점검 테이블이 아직 작성되지 않았습니다. 지금 만드시겠습니까?';
$string['testdboperations'] = '점검 데이터베이스 작업';
$string['testtablescsvfileunwritable'] = '점검 테이블의 CSV파일에 쓸 수 없음($a->filename)';
$string['testtablesneedupgrade'] = '점검 DB 테이블을 갱신해야 합니다. 지금 갱신을 하겠습니까?';
$string['testtablesok'] = '점검하려는 DB 테이블 설치 성공';
$string['thorough'] = '상세 점검(느릴 수 있음)';
$string['uncaughtexception'] = '알려지지 않은 예외항목인 [{$a->getMessage()}] 이 [{$a->getFile()}:{$a->getLine()}] 에서 발견되어 점검이 취소됨.';
$string['unittestprefixsetting'] = '유닛 점검 접두어: <strong>$a->unittestprefix</strong> (이를 변경하려면 config.php를 수정).';
$string['unittests'] = '유닛 점검';
$string['updatingnoninsertedrecord'] = '유닛 점검에 포함되지 않은 기록( $a->table 테이블의 id $a->id )을 갱신하려고 합니다.';
$string['version'] = '<a href=\"http://sourceforge.net/projects/simpletest/\">SimpleTest</a> version $a 를 사용중임.';

?>
