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
 * Strings for component 'mnet', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = '서버 소개';
$string['accesslevel'] = '접속 수준';
$string['addhost'] = '호스트 추가';
$string['addnewhost'] = '새 호스트 추가';
$string['addtoacl'] = '접속 제어에 추가';
$string['allhosts'] = '모든 호스트';
$string['allhosts_no_options'] = '다중 호스트를 보는데 옵션이 없습니다.';
$string['allow'] = '허용';
$string['applicationtype'] = '어플리케이션 유형';
$string['authfail_nosessionexists'] = '인증 실패: mnet 세션이 존재하지 않음';
$string['authfail_sessiontimedout'] = '인증 실패: mnet 세션 시간 초과';
$string['authfail_usermismatch'] = '인증 실패: 사용자 불일치';
$string['authmnetdisabled'] = 'MNet 인증플러그인 <strong>비활성</strong>됨.';
$string['badcert'] = '유효한 자격이 아님.';
$string['certdetails'] = '인증서 세부사항';
$string['configmnet'] = 'MNet 은 이 서버와 다른 서버와의 교신을 허용합니다.';
$string['couldnotgetcert'] = '{$a} 에서 인증서를 찾을 수 없음.<br />호스트가 죽었거나 설정이 잘못 되어 있음.';
$string['couldnotmatchcert'] = '웹서버에 의해 공개된 현재의 인증서와 일치하지 않음.';
$string['courses'] = '강좌들';
$string['courseson'] = '강좌 탑재';
$string['currentkey'] = '현재의 공개키';
$string['current_transport'] = '현재의 운송계층';
$string['databaseerror'] = '데이터테이스에 자세한 사항을 기재할 수 없음.';
$string['deleteaserver'] = '서버를 삭제';
$string['deletedhostinfo'] = '이 호스트는 삭제되었습니다. 만일 삭제하지 않기를 원하시면 삭제된 상태를 \'아니오\'로 전환하십시요.';
$string['deletedhosts'] = '삭제된 호스트: {$a}';
$string['deletehost'] = '호스트 삭제';
$string['deletekeycheck'] = '이 키를 삭제하는 것이 확실합니까?';
$string['deleteoutoftime'] = '작동시간(60초)이 초과하였습니다. 다시 시작하시기 바랍니다.';
$string['deleteuserrecord'] = 'SSO ACL: {$a->host}의 사용자 \'{$a->user}\' 기록 삭제';
$string['deletewrongkeyvalue'] = '오류 발생. 만일 당신이 서버의 SSL키를 삭제하려고 하지 않았다면 아마 누군가가 심각한 침해를 하려고 했었습니다. 현재 아무런 시도도 성공하지 못했습니다.';
$string['deny'] = '거부';
$string['description'] = '설명';
$string['duplicate_usernames'] = '사용자 테이블의 "mnet 호스트 아이디" 및 "사용자 아이디"난에 대한 색인을 생성할 수 없습니다.<br />이는 사용자 테이블에 <a href="{$a}" target="_blank">사용자명이 중복</a>되었기 때문일 수 있습니다. 다행이 업그레이드는 성공했을 지도 모릅니다만, 업그레이드를 마칠 때까지 잘 지켜봐 주시기 바랍니다. 앞의 링크를 클릭하면 이 문제를 해결할 수 있는 안내문이 나타날 것입니다.<br />';
$string['enabled_for_all'] = '(이 서비스는 모든 호스트에 활성화되어 있습니다)';
$string['enterausername'] = '사용자 아이디를 쉼표로 구분하여 입력하기 바랍니다.';
$string['error7020'] = '이 오류는  http://www.yoursite.com 대신 http://yoursite.com 와 같이 원격 사이트가 틀린 wwwroot 기록을 만들었을때 발생합니다. 당신의 호스트에 대한 기록을 업데이트하도록 (config.php에 명시된) wwwroot의 원격사이트 관리자에게 요청하세요.';
$string['error7022'] = '원격 사이트에 보낸 메세지는 적절하게 암호화되어 있지만 사인되지 않았습니다. 이것은 예상치 못한 일입니다. 이것이 발생하면 버그를 기록하여야만 할 것입니다.(어플리케이션  버전등 가능한 많은 정보제공)';
$string['error7023'] = '원격사이트는 당신의 사이트에 대해 레코드에 가지고 있는 모든 키를 사용하여 당신의 메세지를 복호화 하려고 시도하였으나 실패하였습니다. 원격사이트에 대하여 키를 재발급함에 의해 이 문제를 고칠 수 있습니다. 몇달 동안 원격 사이트와 통신을 하지 않은 경우가 아니라면 발생하기 어렵습니다.';
$string['error7024'] = '원격 사이트에 암호화되지 않은 메세지를 보냈지만 원격사이트는 암호화 되지 않은 통신을 받지 않습니다. 이것은 매우 예상되지 못한 일입니다. 이것이 발생하면 버그를 기록하여야만 할 것입니다.(어플리케이션 버전등 가능한 많은 정보제공)';
$string['error7026'] = '당신의 메세지에 사인된 키는 당신에 서버에 대해 원격서버가 파일에 가지고 있는 키와 다릅니다. 더우기 원격 호스트는 현재 당신키를 가져가려고 하였으나 실패하였습니다. 원격 호스트와 수동적으로 키를 맞추고 다시 시도하십시요.';
$string['error709'] = '원격 사이트가 당신으로 부터 SSL키를 얻는데 실패하였습니다.';
$string['expired'] = '파기일시';
$string['expires'] = '유효기간';
$string['expireyourkey'] = '키 삭제';
$string['expireyourkeyexplain'] = '무들은 (기본으로) 자동적으로 28일 주기로 키를 교체합니다만 관리자는 언제든지 <em>수동으로</em> 이를 파기할 수있는 선택권을 가지고 있습니다. 이는 키가 누출되었다고 여겨질 때 유용하게 활용될 수 있습니다. 키의 교체는 자동적으로 즉시 생성되어 이루어 집니다.<br />
키를 삭제하면 당신이 다른 네트워크의 관리자에게 연락하여 새 키를 제공하기 전까지는 다른 어플리케이션이당신과  교신하지 못하게 됩니다.';
$string['exportfields'] = '내보내기 할 항목';
$string['failedaclwrite'] = '사용자 \'{$a}\'에 대한 MNet 접속 제어 목록에 쓰기 실패';
$string['findlogin'] = '로그인 찾기';
$string['forbidden-function'] = '그 기능은 RPC 때문에 활성화될 수 없습니다.';
$string['forbidden-transport'] = '시도하려는 전송방법은 허용되지 않습니다.';
$string['forcesavechanges'] = '변경사항 강제 저장';
$string['helpnetworksettings'] = 'MNet 통신 구성';
$string['hidelocal'] = '로컬 사용자 감추기';
$string['hideremote'] = '원격 사용자 감추기';
$string['host'] = '호스트';
$string['hostcoursenotfound'] = '호스트나 강좌를 찾을 수 없음';
$string['hostdeleted'] = '호스트 삭제 성공';
$string['hostexists'] = '그 호스트 이름의 호스트에 대해 이미 기록이 존재합니다.(삭제되었을지 모릅니다). 기록을 편집하려면 <a href="{$a}">여기를 클릭</a>하세요.';
$string['hostlist'] = '네트워킹된 호스트 목록';
$string['hostname'] = '호스트명';
$string['hostnamehelp'] = 'www.example.com과 같은 원격 호스트의 완전한 도메인명';
$string['hostnotconfiguredforsso'] = '이 서버는 원격 로그인을 위해 설정되어있지 않습니다.';
$string['hostsettings'] = '호스트 설정';
$string['http_self_signed_help'] = '원격 호스트에 있는 자체 사인된 DIYSSL 인증서를 사용하여 연결을 허용합니다.';
$string['https_self_signed_help'] = '원격 호스트는 http상에서 PHP의 자동 서명되는 DIY SSL를 이용한 연결을 허용합니다.';
$string['https_verified_help'] = '원격 호스트에 있는 확인된 SSL 인증서를 사용하여 연결을 허용합니다.';
$string['http_verified_help'] = '원격 호스트의 PHP에 있는 확인된 SSL 인증서를 사용하여 http연결(https 아님)을 허용합니다.';
$string['id'] = '아이디';
$string['idhelp'] = '이 값은 자동으로 주어지며 변경할 수 없습니다.';
$string['importfields'] = '가져오기할 항목';
$string['inspect'] = '검사';
$string['installnosuchfunction'] = '코딩 오류! 무언인가  ({$a->file}) 파일에서 mnet xmlrpc 함수를 설치하려 하고 있습니다만 찾을 수 없습니다!';
$string['installnosuchmethod'] = '코딩 오류! 무언인가 ({$a->class}) 클래스에 mnet xmlrpc 함수를 설치하려 하고 있습니다만 찾을 수 없습니다!';
$string['installreflectionclasserror'] = '코딩 오류! 클래스 \'{$a->class}\'에 있는 메쏘드 \'{$a->method}\'에 대한 내부 검사가 실패하였습니다. 원래 오류 메세지는 다음과 같습니다: \'{$a->error}';
$string['installreflectionfunctionerror'] = '코딩 오류! 파일 \'{$a->file}\'에 있는 메쏘드 \'{$a->method}\'에 대한 내부 검사가 실패하였습니다. 원래 오류 메세지는 다음과 같습니다: \'{$a->error}';
$string['invalidaccessparam'] = '유효하지 않은 접속 매개변수';
$string['invalidactionparam'] = '유효하지 않은 작동 매개변수';
$string['invalidhost'] = '유효한 호스트 식별정보를 제공해야만 합니다';
$string['invalidpubkey'] = '유효한 SSL키가 아닙니다.';
$string['invalidurl'] = '유효하지 않은 URL 매개변수';
$string['ipaddress'] = 'IP 주소';
$string['is_in_range'] = 'IP 주소  <code>{$a}</code>  는 인증된 호스트입니다.';
$string['ispublished'] = '{$a}는 이 서비스를 활성화 하였습니다.';
$string['issubscribed'] = '{$a}는 여러분의 호스트에서 이 서비스를 구독하고 있습니다.';
$string['keydeleted'] = '키가 성공적으로 삭제된 후 교체되었습니다.';
$string['keymismatch'] = '이 호스트에 대해 당신이 가지고 있는 공개키는 최근 공개된 이 호스트의 공개키와 일치하지 않습니다. 현재 공개키는 다음과 같습니다.';
$string['last_connect_time'] = '최근 접속 시각';
$string['last_connect_time_help'] = '이 호스트에 접속했던 가장 최근의 접속 시각';
$string['last_transport_help'] = '이 호스트에 최종 접속할 때 사용한 접속 계층';
$string['leavedefault'] = '대신 기본 설정 사용';
$string['listservices'] = '서비스를 나열';
$string['loginlinkmnetuser'] = '<br />MNet 원격 사용자이고 <a href="{$a}">여기에서 이메일 주소를 확인</a>할 수 있으면, 로그인 페이지로 되돌아 올 수 있습니다.<br />';
$string['logs'] = '기록';
$string['managemnetpeers'] = '동료서버 관리';
$string['method'] = '메쏘드';
$string['methodhelp'] = '{$a} 에 대한 메쏘드 도움말';
$string['methodsavailableonhost'] = '{$a} 에서 사용가능한 메쏘드들';
$string['methodsavailableonhostinservice'] = '{$a->host} 의 {$a->service} 에 사용가능한 메쏘드들';
$string['methodsignature'] = '{$a} 에 대한 메쏘드 서명';
$string['mnet'] = 'MNET';
$string['mnet_concatenate_strings'] = '3 문자열로 축약하여 결과 전송';
$string['mnetdisabled'] = 'MNET이 <strong>비활성화</strong> 되었습니다.';
$string['mnetidprovider'] = 'MNET ID 제공자';
$string['mnetidproviderdesc'] = '만일 이전에 로그인하려고 했던 사용자 이름과 일치되는 올바른 이메일 주소를 제공할 수 있다면 이 기능을 사용하여 로그인할 수 있는 링크를 가져올 수 있습니다.';
$string['mnetidprovidermsg'] = '{$a} 제공자에서 로그인 할 수 있어야 합니다.';
$string['mnetidprovidernotfound'] = '죄송합니다. 더 자세한 정보는 찾을 수 없습니다.';
$string['mnetlog'] = '기록들';
$string['mnetpeers'] = '무들네트웍 환경';
$string['mnetservices'] = '서비스';
$string['mnet_session_prohibited'] = '홈 서버의 사용자는 현재 {$a} 로 방문할 수 있도록 허용되지 않았습니다.';
$string['mnetsettings'] = 'MNET설정';
$string['moodle_home_help'] = '원격 호스트에서 MNet 어플리케이션 누리집 경로, 예: /moodle/';
$string['name'] = '이름';
$string['net'] = '네트웍';
$string['networksettings'] = '네트웍 설정';
$string['never'] = '접속 없음';
$string['noaclentries'] = 'SSO 접속 목록에 아무 자료도 없음';
$string['noaddressforhost'] = '죄송합니다. 호스트 이름 ({$a}) 을 처리할 수 없습니다.';
$string['nocurl'] = 'PHP Curl 라이브러리가 설치되지 않았음';
$string['nolocaluser'] = '원격 사용자에 대한 로컬 기록이 없습니다. 이 호스트가 자동으로 사용자를 생성하지 않으므로 생성될 수 없었을 수 있습니다. 관리자에게 연락하십시요.';
$string['nomodifyacl'] = 'MNET 접속 제어 목록을 변경할 수 있는 권한이 없습니다.';
$string['nonmatchingcert'] = '인증서의 제목 <br /><em>{$a->subject}</em><br /> 이 인증서를 보내온 호스트 <br /><em>{$a->host}</em>와 일치하지 않습니다.';
$string['nopubkey'] = '공개키를 가져오는데 문제가 있습니다.<br />호스트가 MNet을 허용하지 않거나 키가 유효하지 않습니다.';
$string['nosite'] = '사이트 수준의 강좌가 없습니다.';
$string['nosuchfile'] = '파일/기능 {$a} 가 존재하지 않습니다.';
$string['nosuchfunction'] = '기능을 작동시키지 못하거나 RPC때문에 금지되었습니다.';
$string['nosuchmodule'] = '함수가 잘 못 호출되었거나 찾을 수 없습니다.  mod/modulename/lib/functionname 형식을 사용하십시오.';
$string['nosuchpublickey'] = '서명 확인을 위한 공개키를 획득할 수 없습니다.';
$string['nosuchservice'] = '이 호스트에는 RPC서비스가 구동되지 않습니다.';
$string['nosuchtransport'] = '그 ID에는 전송계층이 존재하지 않습니다.';
$string['notBASE64'] = '이 문자열은 Base64로 엔코드된 형식이 아닙니다. 유효한 키가 될 수 없습니다.';
$string['notenoughidpinfo'] = '당신의 아이덴티티 프로바이더가 당신 계정을 만들거나 업데이트 하는데 충분한 정보를 주지 않습니다. 죄송합니다.';
$string['not_in_range'] = 'IP주소  <code>{$a}</code>  는 유효한 인증 호스트가 아닙니다.';
$string['notinxmlrpcserver'] = 'XMLRPC 서버가 실행되는 동안이 아닌 때 MNet 원격 클라이언트 접속 시도.';
$string['notmoodleapplication'] = '경고: 이것은 무들 어플리케이션이 아닙니다. 검사 메쏘드가 제대로 동작하지 않을 수 있습니다.';
$string['notPEM'] = '이 키는 PEM형식이 아닙니다. 작동하지 않을 것입니다.';
$string['notpermittedtojump'] = '당신은 이 무들 서버로부터 원격 세션을 시작할 수 있는 권한이 없습니다.';
$string['notpermittedtojumpas'] = '다른 사용자로 로그인 된 동안에는 원격 세션을 시작할 수 없습니다.';
$string['notpermittedtoland'] = '당신은 원격 세션을 시작할 수 있는 자격이 없습니다.';
$string['off'] = '끔';
$string['on'] = '켬';
$string['options'] = '옵션';
$string['peerprofilefielddesc'] = '새로운 사용자가 생성될때 보내고 가져와야 할 개인정보 항목에 대한 글로벌 설정을 덮어쓰기 할 수 있습니다.';
$string['permittedtransports'] = '허용된 전송계층';
$string['phperror'] = '내부 PHP 오류로 요청을 실행하지 못 했습니다.';
$string['position'] = '위치';
$string['postrequired'] = '삭제 기능은 POST 요청이 필요합니다.';
$string['profileexportfields'] = '보낼 필드';
$string['profilefielddesc'] = '여기에서 새로운 사용자 계정이 만들어지거나 업데이트 될때 MNet을 통해 보내어지고 받는 개인정보 항목 목록을 구성할 수 있습니다. 또한 각각의 MNet 피어별에 대해서 이것을 덮어쓰기 할 수 있습니다. 다음 항목은 항상 보내어지며 선택적이 아닙니다: {$a}';
$string['profilefields'] = '개인정보 항목';
$string['profileimportfields'] = '가져올 필드';
$string['promiscuous'] = '난잡한';
$string['publickey'] = '공개키';
$string['publickey_help'] = '공개키는 자동적으로 원격 서버로부터 가져옵니다.';
$string['publickeyrequired'] = '공개키를 제공해야 합니다';
$string['publish'] = '공개';
$string['reallydeleteserver'] = '서버를 삭제하는 것이 확실합니까';
$string['receivedwarnings'] = '다음과 같은 경고를 받았습니다.';
$string['recordnoexists'] = '기록이 존재하지 않습니다.';
$string['reenableserver'] = '아니오 - 서버를 재 활성화하려면 이 옵션을 선택';
$string['registerallhosts'] = '모든 호스트 등록(난잡한 모드)';
$string['registerallhostsexplain'] = '호스트에 접속해 오는 모든 호스트를 자동으로 등록하도록 선택할 수 있습니다. 이는 당신의 호스트에 접속해서 공개키를 요구하는 어떤 무들 사이트던지 당신의 호스트 목록에 나타난다는 것을 의미합니다.<br />아래에 "모든 호스트"에 대해 서비스를 구성할 수 있는 옵션이 있습니다.  몇 서비스를 활성화하면, 어떤 원격 서버에게도 차별없이 서비스를 제공할 수 있습니다.';
$string['registerhostsoff'] = '모든 호스트 등록이 현재 <b>꺼져</b> 있습니다.';
$string['registerhostson'] = '모든 호스트 등록이 현재 <b>켜져</b> 있습니다.';
$string['remotecourses'] = '원격 강좌';
$string['remotehost'] = '원격 호스트';
$string['remotehosts'] = '원격 호스트';
$string['remoteuserinfo'] = '원격 {$a->remotetype} 사용자 - 개인정보를 <a href="{$a->remoteurl}">{$a->remotename}</a> 에서 가져옴';
$string['requiresopenssl'] = '네트웍은 OpenSSL 확장이 필요';
$string['restore'] = '복구';
$string['returnvalue'] = '리턴 값';
$string['reviewhostdetails'] = '호스트 상세항목 검토';
$string['reviewhostservices'] = '호스트 서비스 검토';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP 비암호화';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (자동 서명)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (자동 서명)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (서명)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (서명)';
$string['selectaccesslevel'] = '목록에서 접속 수준을 선택하십시오.';
$string['selectahost'] = '원격 호스트를 선택하십시오.';
$string['service'] = '서비스 이름';
$string['serviceid'] = '서비스 ID';
$string['servicesavailableonhost'] = '{$a} 에 서비스가 가능합니다.';
$string['serviceswepublish'] = '{$a} 에게 공개하는 서비스들';
$string['serviceswesubscribeto'] = '우리가 요청한 {$a} 상의 서비스들';
$string['settings'] = '공개키 설정';
$string['showlocal'] = '로컬 사용자 보기';
$string['showremote'] = '원격 사용자 보기';
$string['ssl_acl_allow'] = 'SSO ACL :{$a->host} 의 사용자 {$a->user} 허용';
$string['ssl_acl_deny'] = 'SSO ACL :{$a->host} 의 사용자 {$a->user}거부';
$string['ssoaccesscontrol'] = 'SSO 접속 제어';
$string['ssoacldescr'] = '원격 MNet 호스트로부터 특정 사용자에게 접속을 승인/거부 하려면 이 페이지를 이용하십시요.  원격 사용자에게 SSO 서비스를 제공하면 가능하다. 여러분의 로컬 사용자가 다른 무들네트웍 호스트를 탐방할 수 있게 제어하려면, 역할 시스템에서 그들에게 <em>mnetcanroam</em> 능력을 부여하면 된다.';
$string['ssoaclneeds'] = '이 기능을 작동시키기 위해서는 네트워킹을 켜고, MNet 인증 플러그인을 활성화 시켜야 합니다.';
$string['strict'] = '엄격하게';
$string['subscribe'] = '등록';
$string['system'] = '시스템';
$string['testclient'] = 'MNET 테스트 클라이언트';
$string['testtrustedhosts'] = '주소 검사';
$string['testtrustedhostsexplain'] = '인증된 호스트인지를 알아보려면 IP 주소를 입력하세요.';
$string['theypublish'] = '상대방이 공개';
$string['theysubscribe'] = '상대방이 구독';
$string['transport_help'] = '이 선택항목들은 상호 호혜적인 것으로 만일 여러분의 서버가 서명된 SSL 인증서만 가지고 있다면, 원격서버에 서명된 SSL 인증서만 요구할 수 있다.';
$string['trustedhosts'] = 'XML-RPC 호스트';
$string['trustedhostsexplain'] = '<p>인증된 호스트 매카니즘은 무들 API의 일부분에 XML-RPC를 통하여 호출을 실행 특정 서버에서 실행시킬 수 있도록 합니다. 이는 스크립트가 무들의 동작을 제어하게 하는데, 활성화 시키기에는 매우 위험한 선택 사항이 될 것입니다. 만일 확신이 서지 않는다면, 이를 꺼 두도록 하십시요.</p>
 <p><strong>이것은 표준 MNet 기능에 필요하지 않습니다</strong> 무엇을 하는지 확신한다면 켜 놓으십시요 </p>
 <p>이것을 활성화시키기 위해서는, 한 줄에 하나씩 IP 주소 혹은 네트웍 목록을 입력하십시요. 다음은 작성 예입니다.</p>로칼 호스트:<br />127.0.0.1<br />로칼 호스트(네트웍 블록):<br />127.0.0.1/32<br />IP 주소가 192.168.0.7인 호스트만:<br />192.168.0.7/32<br />IP 주소가 192.168.0.1 에서 192.168.0.255 사이의 모든 호스트:<br />192.168.0.0/24<br />모든 호스트:<br />192.168.0.0/0<br />물론 마지막 예는 추천할 수 <strong>없는</strong> 사례입니다.';
$string['turnitoff'] = '끔';
$string['turniton'] = '켬';
$string['type'] = '유형';
$string['unknown'] = '알수 없음';
$string['unknownerror'] = '교섭중에 알 수 없는 오류 발생';
$string['usercannotchangepassword'] = '원격 사용자이기 때문에 이곳에서는 암호를 바꿀 수 없다.';
$string['userchangepasswordlink'] = '<br />당신은 신분 제공자인 <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>에서 비밀번호를 바꿀 수 있을 것입니다.';
$string['usernotfullysetup'] = '당신의 계정이 불완전합니다.  <a href="{$a}">아이덴티티 프로바이더</a>로 되돌아 가서 개인정보가 모두 입력되었는지 확인하십시요. 변경된 정보가 반영되려면 로그아웃한 후 다시 로그인 하십시요.';
$string['usersareonline'] = '경고: 현재 그 서버로 부터 {$a} 사용자가 여러분의 사이트에 접속해 있습니다.';
$string['validated_by'] = '<code>{$a}</code> 네트웍에 의해 승인되었습니다.';
$string['verifysignature-error'] = '서명 확인 실패. 오류가 발생하였습니다.';
$string['verifysignature-invalid'] = '서명 확인 실패. 이 페이로드는 당신이 서명한 것이 아닌 것 같습니다.';
$string['version'] = '버전';
$string['warning'] = '경고';
$string['wrong-ip'] = 'IP 주소가 보유하고 있는 기록과 일치하지 않습니다.';
$string['xmlrpc-missing'] = 'PHP를 통해 이 기능을 사용할 수 있게 하기위해서는 XML-RPC를 설치해야만 한다.';
$string['yourhost'] = '호스트';
$string['yourpeers'] = '멤버 서버';
