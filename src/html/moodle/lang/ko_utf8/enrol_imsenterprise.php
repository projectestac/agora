<?PHP // $Id: enrol_imsenterprise.php,v 1.6 2008/02/05 13:17:50 yogibear270 Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.8 dev (2006102200)


$string['aftersaving...'] = '설정을 저장하고 나서 할 일은...';
$string['allowunenrol'] = '학습자/교수자를 <strong>제적</strong>시키기 위해 IMS 데이터 허용';
$string['basicsettings'] = '기본 설정';
$string['coursesettings'] = '과정 데이터 옵션';
$string['createnewcategories'] = '무들에 해당 강좌가 없는 경우 새로운(비공개) 강좌 생성';
$string['createnewcourses'] = '무들에 해당과정이 없는 경우 새로운(감춰진) 강좌 생성';
$string['createnewusers'] = '무들에 사용자가 아직 등록되지 않은 경우 사용자 계정 생성';
$string['cronfrequency'] = '처리 빈도';
$string['deleteusers'] = 'IMS 데이터에 명시된 경우 사용자 계정 삭제';
$string['description'] = '이 방법은 당신이 지정하는 위치에 있는 특별히 형식화된 텍스트 파일을 반복적으로 점검하고 처리합니다. 이 파일은 개인, 모둠, 구성원 XML 요소등을 가지고 있는 <a href=\'../help.php?module=enrol/imsenterprise&file=formatoverview.html\' target=\'_blank\'>IMS 엔터프라이즈 명세</a>를 따라야 합니다.';
$string['doitnow'] = '지금 IMS 엔터프라이즈 데이터 가져오기 실행';
$string['enrolname'] = 'IMS 엔터프라이즈 파일';
$string['filelockedmail'] = 'IMS 파일기반 등록($a)을 할 때 사용하는 문서 파일은 cron 프로세스에 의해 삭제될 수 없습니다. 이것은 파일에 대한 허가가 잘 못 되었음을 의미합니다. 허가를 바꾸면 무들이 파일을 삭제할 수 있습니다. 그렇지 않으면 반복적으로 처리될 것입니다.';
$string['filelockedmailsubject'] = '중대 오류: 등록 파일';
$string['fixcasepersonalnames'] = '개인 이름의 첫문자를 대문자로 변경';
$string['fixcaseusernames'] = '사용자 이름을 소문자로 변경';
$string['imsrolesdescription'] = 'IMS 엔터프라이즈 규격에는 8가지 다른 역할 유형이 있다. 여기에서 무들에 어떤 역할을 포함시키고 어떤 역할을 포함시킬지를 선택하기 바란다.';
$string['location'] = '파일 위치';
$string['logtolocation'] = '로그 파일 출력 위치 (기록하지 않을때는 공백)';
$string['mailadmins'] = '이메일로 관리자에게 알림';
$string['mailusers'] = '이메일로 사용자들에게 알림';
$string['miscsettings'] = '기타';
$string['processphoto'] = '개인정보에 사용자 사진 추가';
$string['processphotowarning'] = '주의: 영상처리는 서버에 상당한 부담을 줄 수 있습니다. 많은 수의 학습자가 참여할 것으로 예상되는 경우에는 이 옵션을 활성화 하지 않는 것이 좋습니다.';
$string['restricttarget'] = '다음 목표가 지정될 때만 데이터 처리';
$string['sourcedidfallback'] = '만일 \"userid\" 항목이 발견되지 않으면 사용자 아이디에 \"sourcedid\" 사용';
$string['truncatecoursecodes'] = '과정코드를 이 길이로 단축';
$string['usecapitafix'] = '\"Capita\" 를 사용한다면 이 박스를 체크하세요. (그들의 XML 형식이 약간 잘못됨)';
$string['usersettings'] = '사용자 데이터 옵션';
$string['zeroisnotruncation'] = '0는 단축이 없음을 나타냄.';

?>
