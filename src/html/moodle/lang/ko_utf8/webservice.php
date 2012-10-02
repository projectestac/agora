<?PHP // $Id: webservice.php,v 1.2 2009/04/07 00:39:08 yogibear270 Exp $ 
      // webservice.php - created with Moodle 2.0 dev (Build: 20090406) (2009040100)


$string['amfdebug'] = 'AMF서버 디버그 모드';
$string['debugdisplayon'] = '\"디버그 메시지 표시\"가 켜짐. XMLRPC 서버는 작동하지 않을 것입니다. 여타의 웹 서버도 문제가 생길 수 있습니다. <br/>무들 관리자에게 이 설정을 끄도록 경고';
$string['fail'] = '실패';
$string['functionlist'] = '웹서비스 기능 목록';
$string['moodlepath'] = '무들 경로';
$string['ok'] = 'OK';
$string['protocolenable'] = '$a[0] 프로토콜 가능';
$string['soapdocumentation'] = '<H2>SOAP 지침</H2>
<b>1.</b> \"<i>http://remotemoodle/webservice/soap/server.php?wsdl</i>\" 에서 <b>tmp_get_token</b> 메쏘드 호출<br>함수의 매개변수는 배열임: PHP에서 (\"username\" => \"wsuser\", \"password\" => \"wspassword\")같은 배열을 이루어야 함<br>회신값은 토큰(정수)<br> <br>
<b>2.</b> 그 다음 \"<i>http://remotemoodle/webservice/soap/server.php?token=the_received_token&classpath=the_moodle_path&wsdl</i>\" 의 무들 웹서비스 메쏘드 호출<br>
각 메쏘드는 배열로 이루어진 단 하나의 매개변수만을 가져야 함<br>
<br>
이 특수 함수에 대한 PHP의 예시는 다음과 같다.<br>
무들 경로: <b>user</b><br> <b>tmp_delete_user</b>( string username , integer mnethostid )<br>
다음과 같이 호출될 것이다:<br> your_client->tmp_delete_user(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1))<br><br>';
$string['webservicesenable'] = '웹서비스 가능';
$string['wspagetitle'] = '웹 문서';
$string['wsuserreminder'] = '유의: 본 사이트의 무들 관리자는 여러분에게 moodle/site:usewebservices 권한을 부여하여야 할 것이다.';
$string['xmlrpcdocumentation'] = '<H2>XMLRPC 지침</H2>
<b>1.</b> \"<i>http://remotemoodle/webservice/xmlrpc/server.php</i>\"에서 <b>authentication.tmp_get_token</b> 메쏘드 호출<br>함수의 매개변수는 배열임: PHP에서 (\"username\" => \"wsuser\", \"password\" => \"wspassword\")같은 배열을 이루어야 함<br>회신값은 토큰(정수)<br>
<br>
<b>2.</b> 그 다음 \"<i>http://remotemoodle/webservice/xmlrpc/server.php?classpath=the_moodle_path&token=the_received_token</i>\" 의 무들 웹서비스 메쏘드 호출<br> 각 메쏘드는 배열로 이루어진 단 하나의 매개변수만을 가져야 함<br> <br> 이 특수 함수에 대한 PHP의 예시는 다음과 같다.<br>
무들 경로: <b>user</b><br> <b>tmp_delete_user</b>( string username , integer mnethostid )<br>
다음과 같이 호출될 것이다:<br> your_client->call(\"user.tmp_delete_user\", array(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1)))<br>';

?>
