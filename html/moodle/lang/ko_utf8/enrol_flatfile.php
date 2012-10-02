<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 1.7 dev (2006091901)


$string['description'] = '이 방법은 다시 한번 검사하고, 당신이 지정한 장소에 특별히 포맷된 텍스트 파일을 처리할 것입니다. 파일은 한 줄에 넷 혹은 여섯 항목이 쉼표로 구분됩니다.
<pre>
 * operation, role, idnumber(user), idnumber(course) [, starttime, endtime]
 where:
 * operation = add | del
 * role = student | teacher | teacheredit
 * idnumber(user) = idnumber in the user table NB not id
 * idnumber(course) = idnumber in the course table NB not id
 * starttime = start time (in seconds since epoch) - optional
 * endtime = end time (in seconds since epoch) - optional
 </pre>

파일은 이렇게 보일 수도 있습니다.
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = '압축파일';
$string['filelockedmail'] = '파일 기반 등록($a)을 하기 위해 사용되는 텍스트파일은 크론과정에 의하여 삭제될 수 없습니다. 이것은 주로 허가가 잘못된 것을 의미합니다. 무들이 파일을 삭제시킬 수 있도록 허가를 수정하십시오. 그렇지 않으면 그것은 반복적으로 처리될 수도 있습니다.';
$string['filelockedmailsubject'] = '중대한 오류: 등록 화일';
$string['location'] = '화일 위치';
$string['mailadmin'] = '이 메일로 관리자에게 통보';
$string['mailusers'] = '이메일로 사용자에게 통보';

?>
