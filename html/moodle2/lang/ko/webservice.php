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
 * Strings for component 'webservice', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = '접근 제어 예외';
$string['actwebserviceshhdr'] = '활성화된 웹서비스 프로토콜';
$string['addaservice'] = '서비스 추가';
$string['addcapabilitytousers'] = '사용자 능력 확인';
$string['addcapabilitytousersdescription'] = '사용자는 2개의 다른 능력 - webservice:createtoken 과 웹서비스 프로토콜과 일치하는 능력 예를 들면 webservice/rest:use, webservice/soap:use 을 가져야 합니다. 이를 위해서 적절한 능력을 허용한 웹서비스 역할을 만들고  웹서비스 사용자에게 시스템 역할로서 부여하십시요.';
$string['addfunction'] = '기능 추가';
$string['addfunctionhelp'] = '서비스에 추가할 기능 선택';
$string['addfunctions'] = '기능 추가';
$string['addfunctionsdescription'] = '새롭게 만들어진 서비스를 위한  필요 함수를 선택하십시요.';
$string['addrequiredcapability'] = '필요한 능력 부여/해지';
$string['addservice'] = '새 서비스 추가: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = '"{$a}" 서비스에 기능 추가';
$string['allusers'] = '모든 사용자';
$string['amftestclient'] = 'AMF 테스트 클라이언트';
$string['apiexplorer'] = 'API 탐색기';
$string['apiexplorernotavalaible'] = '아직 API 탐색기가 없습니다.';
$string['arguments'] = '인수';
$string['authmethod'] = '인증 방법';
$string['cannotgetcoursecontents'] = '강좌 콘텐츠를 가져올 수 없습니다.';
$string['checkusercapability'] = '사용자 능력을 확인하세요';
$string['checkusercapabilitydescription'] = '사용자는 웹서비스 프로토콜과 일치하는 능력 예를 들면 webservice/rest:use, webservice/soap:use 을 가질 필요가 있습니다.  이를 위해서 프로토콜 능력을 가지고 있는 웹서비스 역할을 만드십시요. 그리고 웹 서비스 사용자에게 이 시스템 역할을 부여하십시요.';
$string['configwebserviceplugins'] = '보안상의 이유로 사용 중인 프로토콜만 활성화되어야 합니다.';
$string['context'] = '문맥';
$string['createservicedescription'] = '서비스는 웹서비스 함수의 집합입니다. 사용자들에게 새로운 서비스에 접근 허용할 것입니다. <strong>서비스 추가</strong> 페이지에서 \'활성화\' 와 \'인증된 사용자\' 옵션을 체크하십시요.  \'필요한 능력 없음\'을 선택하십시요.';
$string['createserviceforusersdescription'] = '서비스는 웹서비스 함수의 집합입니다. 사용자들에게 새로운 서비스에 접근 허용할 것입니다. <strong>서비스 추가</strong> 페이지에서 \'활성화\' 를 체크하고 \'인증된 사용자\' 옵션을 체크해지하십시요. \'필요한 능력 없음\'을 선택하십시요.';
$string['createtoken'] = '토큰 생성';
$string['createtokenforuser'] = '한 사용자에게 한 토큰 생성';
$string['createtokenforuserdescription'] = '웹 서비스 사용자를 위한 토큰을 생성하십시요.';
$string['createuser'] = '특별 사용자 생성';
$string['createuserdescription'] = '웹 서비스 사용자가 무들을 제어하는 시스템을 대표하기 위해 필요합니다.';
$string['default'] = ' "{$a}" 를 기본으로 설정';
$string['deleteaservice'] = '서비스 삭제';
$string['deleteservice'] = '서비스 삭제: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = '서비스를 삭제하면 이 서비스와 관련된 토큰을 삭제할 것입니다. 외부 서비스 "{$a}"를 삭제하기를 원하십니까?';
$string['deletetokenconfirm'] = '서비스 <strong>{$a->service}</strong>에 있는 사용자 <strong>{$a->user}</strong>에 대한 웹서비스 토큰을 삭제하기를 원하십니까?';
$string['disabledwarning'] = '모든 웹서비스 프로토콜이 비활성화 되어 있습니다. "웹서비스 활성화" 설정은 고급 기능에서 찾을 수 있습니다.';
$string['doc'] = '문서';
$string['docaccessrefused'] = '이 토큰에 대한 문서를 볼 수 있는 권한이 없습니다.';
$string['documentation'] = '웹서비스 문서';
$string['downloadfiles'] = '파일을 다운로드 할 수 있습니다.';
$string['editaservice'] = '서비스 편집';
$string['editservice'] = '서비스 편집: {$a->name} (id: {$a->id})';
$string['enabled'] = '활성화됨';
$string['enabledocumentation'] = '개발자 문서 활성화';
$string['enabledocumentationdescription'] = '자세한 웹서비스 문서를 활성화된 프로토콜에 대해 사용가능합니다.';
$string['enableprotocols'] = '프로토콜 활성화';
$string['enableprotocolsdescription'] = '적어도 한개의 프로토콜이 활성화 되어야 합니다. 보안상의 이유로 사용할 한개의 프로토콜이 활성화 되어야 합니다.';
$string['enablews'] = '웹 서비스 활성화';
$string['enablewsdescription'] = '웹 서비스가 고급 기능에서 활성화되어야 합니다.';
$string['entertoken'] = '암호 키/토큰을 입력하세요.';
$string['error'] = '오류: {$a}';
$string['errorcatcontextnotvalid'] = '범주 문맥(category id:{$a->catid})에 있는 함수를 실행할 수 없습니다. 문맥 오류는 {$a->message} 입니다.';
$string['errorcodes'] = '오류 메세지';
$string['errorcoursecontextnotvalid'] = '강좌 문맥에서 (강좌 id:{$a->courseid}) 함수를 실행할 수 없습니다. 문맥 오류 메세지: {$a->message}';
$string['errorinvalidparam'] = '매개변수 "{$a}"가 유효하지 않습니다.';
$string['errornotemptydefaultparamarray'] = '\'{$a}\'로 명명된 웹서비스 설명 파라메터는 단일 혹은 다중 구조입니다. 기본은 빈 배열일 수 있습니다. 웹서비스 설명을 확인하십시요.';
$string['erroroptionalparamarray'] = '\'{$a}\'로 명명된 웹서비스 설명 파라메터는 단일 혹은 다중 구조입니다. VALUE_OPTIONAL.로 설정될 수 없습니다. 웹서비스 설명을 확인하십시요.';
$string['execute'] = '실행';
$string['executewarnign'] = '경고: 만일 실행을 누르면 데이터베이스가 변경되고 변경사항은 자동으로 되돌릴 수 없습니다.';
$string['externalservice'] = '외부 서비스';
$string['externalservicefunctions'] = '외부 서비스 함수';
$string['externalservices'] = '외부 서비스';
$string['externalserviceusers'] = '외부 서비스 사용자';
$string['failedtolog'] = '기록하는데 실패';
$string['filenameexist'] = '파일 이름이 이미 존재합니다: {$a}';
$string['function'] = '함수';
$string['functions'] = '함수';
$string['generalstructure'] = '일반 구조';
$string['information'] = '정보';
$string['installexistingserviceshortnameerror'] = '짧은 이름 "{$a}"을 갖는 웹서비스가 이미 있습니다. 이 이름을 사용해서 다른 웹서비스를 설치하거나 갱신할 수 없습니다.';
$string['installserviceshortnameerror'] = '코딩 오류: 서비스 단축이름 "{$a}"은 숫자, 문자 및 _-. 만 포함할 수 있습니다.';
$string['invalidextparam'] = '잘못된 외부 api 매개변수 :{$a}';
$string['invalidextresponse'] = '잘못된 외부 api 응답 :{$a}';
$string['invalidiptoken'] = '잘못된 토큰 - 당신의 IP가 지원되지 않습니다.';
$string['invalidtimedtoken'] = '잘못된 토큰 - 토큰이 만료되었습니다.';
$string['invalidtoken'] = '잘못된 토큰 - 토큰이 발견되지 않았습니다.';
$string['iprestriction'] = 'IP제한';
$string['iprestriction_help'] = '사용자는 나열된 IP들로부터 웹서비스를 호출할 필요가 있을 것입니다.';
$string['key'] = '키';
$string['keyshelp'] = '외부 어플리케이션에서 당신의 무들 계정을 접근하는데 키들이 사용됩니다.';
$string['manageprotocols'] = '프로토콜 관리';
$string['managetokens'] = '토큰 관리';
$string['missingcaps'] = '누락된 능력';
$string['missingcaps_help'] = '선택된 사용자들이 가지고 있지 않은 서비스에 대한 필요 능력 목록. 웹서비스를 사용하기 위해서는 누락된 능력들이 사용자의 역할에 추가되어야 합니다.';
$string['missingpassword'] = '암호가 없습니다';
$string['missingrequiredcapability'] = '능력 {$a}이 필요합니다.';
$string['missingusername'] = '사용자 이름이 없습니다';
$string['missingversionfile'] = '코딩 오류: 구성요소 {$a}의 version.php 이 없습니다.';
$string['mobilewsdisabled'] = '비활성화됨';
$string['mobilewsenabled'] = '활성화됨';
$string['nofunctions'] = '이 서비스는 함수가 없습니다.';
$string['norequiredcapability'] = '필요한 능력이 없습니다.';
$string['notoken'] = '토큰 목록이 비어 있습니다.';
$string['onesystemcontrolling'] = '외부 시스템이 무들을 통제하도록 허용';
$string['onesystemcontrollingdescription'] = '다음 단계들은 무들을 통제하는 한 시스템에 대한 무들 웹서비스를 설정하는 것을 도와줍니다. 이들 단계들은 추천된 토큰(보안 키) 인증 방법을 설정하는 것을 도와줍니다.';
$string['operation'] = '동작';
$string['optional'] = '옵션';
$string['passwordisexpired'] = '암호가 만료되었습니다.';
$string['phpparam'] = 'XML-RPC (PHP 구조)';
$string['phpresponse'] = 'XML-RPC (PHP 구조)';
$string['postrestparam'] = 'REST를 위한 PHP코드 (POST request)';
$string['potusers'] = '승인된 사용자가 아닙니다.';
$string['potusersmatching'] = '승인받지 않은 사용자 매칭';
$string['print'] = '모두 인쇄';
$string['protocol'] = '프로토콜';
$string['removefunction'] = '제거';
$string['removefunctionconfirm'] = '서비스 "{$a->service}"에서 함수 "{$a->function}" 를 제거하기를 원하십니까?';
$string['requireauthentication'] = '이 메쏘드는 xxx 권한의 인증을 필요로 합니다.';
$string['required'] = '필수';
$string['requiredcapability'] = '필요한 능력';
$string['requiredcapability_help'] = '만일 설정되면 필요한 능력을 가진 사용자가 서비스에 접속할 수 있습니다.';
$string['requiredcaps'] = '필수 권한';
$string['resettokenconfirm'] = '서비스 <strong>{$a->service}</strong>에서 <strong>{$a->user}</strong>에 대한 웹 서비스 키를 리셋하기를 원하십니까?';
$string['resettokenconfirmsimple'] = '이 키를 리셋시키기를 원하십니까? 이전 키를 포함하는 저장된 링크는 더 이상 동작하지 않을 것입니다.';
$string['response'] = '응답';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = '복원된 계정은 토큰을 얻기전에 암호를 리셋해야 합니다.';
$string['restparam'] = 'REST (POST 매개변수)';
$string['restrictedusers'] = '승인된 사용자만';
$string['restrictedusers_help'] = '이 설정은 웹서비스 토큰을 생성할 수 있는 권한을 가진 모든 사용자가 자신들의 보안키 페이지에서 웹 서비스에 대한 토큰을 생성할 수 있도록 할지 승인된 사용자만 할 수 있도록 할지를 결정합니다.
';
$string['securitykey'] = '보안키(토큰)';
$string['securitykeys'] = '보안키';
$string['selectauthorisedusers'] = '승인된 사용자 선택';
$string['selectedcapability'] = '선택됨';
$string['selectedcapabilitydoesntexit'] = '현재 설정된 능력이 더이상 존재하지 않습니다. 능력을 변경하고 저장하십시요. ';
$string['selectservice'] = '서비스 선택';
$string['selectspecificuser'] = '특별 사용자 선택';
$string['selectspecificuserdescription'] = '승인된 사용자로서 웹서비스 사용자를 추가하십시요.';
$string['service'] = '서비스';
$string['servicehelpexplanation'] = '서비스는 함수의 집합입니다. 서비스는 모든 사용자들이 접근할 수도 있고, 특정 사용자만 접근할 수도 있습니다. .';
$string['servicename'] = '서비스 이름';
$string['servicenotavailable'] = '웹서비스를 사용할 수 없습니다. (웹서비스가 없거나 비활성화된것 같습니다)';
$string['servicesbuiltin'] = '내장 서비스';
$string['servicescustom'] = '맞춤 서비스';
$string['serviceusers'] = '승인된 사용자';
$string['serviceusersettings'] = '사용자 설정';
$string['serviceusersmatching'] = '승인된 사용자  매칭';
$string['serviceuserssettings'] = '승인된 사용자에 대한 설정 변경';
$string['simpleauthlog'] = '단일 인증 로그인';
$string['step'] = '스텝';
$string['supplyinfo'] = '세부사항';
$string['testauserwithtestclientdescription'] = '웹서비스 테스트 클라이언트를 사용하여 웹서비스에 대한 외부 접속을 시늉해보십시요. 그러기전에 "moodle/webservice:createtoken"  능력이 설정된 사용자로 로그인 하고 개인정보 설정에서 보안키(토큰)를 얻으십시요. 테스트 클라이언트에서 이 토큰을 사용할 것입니다. 테스트 클라이언트에서 토큰인증으로 활성화된 프로토콜을 선택하세요. <strong>경고: 당신이 테스트하는 함수는 이 사용자에 대해 실행될 것입니다. 테스트 하는데 무엇을 선택할지 주의하십시요!!!</strong>';
$string['testclient'] = '웹서비스 테스트 클라이언트';
$string['testclientdescription'] = '* 웹서비스 테스트 클라이언트는 함수를 <strong>실제실행</strong>합니다. 알지 못하는 함수를 실행하지 마십시요 <br/>* 모든 웹서비스 함수가 테스트클라이언트로 구현되지는 않았습니다. <br/>* 사용자가 어떤 함수를 접속할 수 없는지 확인하기 위해서 허용하지 않은 함수를 테스트 해 볼 수 있습니다.<br/>* 명확한 오류 메세지를 보려면 디버깅을  <strong>{$a->mode}</strong>  into {$a->atag} 로 설정하십시요 <br/>*  {$a->amfatag} 를 접속하십시요.';
$string['testwithtestclient'] = '서비스 테스트';
$string['testwithtestclientdescription'] = '웹서비스 테스트 클라이언트를 사용하여 웹서비스에 대한 외부 접속을 시늉해보십시요. 토큰인증으로 활성화된 프로토콜을 사용하십시요. <strong>경고: 당신이 테스트하는 함수는  실행될 것입니다. 테스트 하는데 무엇을 선택할지 주의하십시요!!!</strong>';
$string['token'] = '토큰';
$string['tokenauthlog'] = '토큰인증';
$string['tokencreatedbyadmin'] = '관리자(*)에 의해서만 리셋될 수 있습니다.';
$string['tokencreator'] = '만든사람';
$string['unknownoptionkey'] = '알수 없는 옵션 키 ({$a})';
$string['updateusersettings'] = '업데이트';
$string['userasclients'] = '토큰이 있는 클라이언트로서의 사용자';
$string['userasclientsdescription'] = '다음 단계들은 클라이언트로서의 사용자들을  위한 무들 웹서비스를 설정하는데 도움을 줍니다. 이들 단계들은 추천된 토큰(보안 키) 인증 방법을 설정하는 것을 도와줍니다. 이 사용 예에서는 사용자는 개인정보 페이지의  보안키 페이지에서  자신의 토큰을 생성할 수 있습니다.';
$string['usermissingcaps'] = '누락된 능력 :{$a}.';
$string['usernameorid'] = '사용자이름/사용자 아이디';
$string['usernameorid_help'] = '사용자이름 혹은 사용자 아이디를 입력하십시요.';
$string['usernameoridnousererror'] = '이 사용자이름/사용자 아이디를 사용자를 찾을 수 없습니다.';
$string['usernameoridoccurenceerror'] = '이 사용자 이름을 사용하는 여러 사용자가 있습니다. 사용자 아이디를 입력하십시요.';
$string['usernotallowed'] = '사용자가 이 서비스에 대해 허용되지 않았습니다. 우선 {$a}의 허용된 사용자 관리 페이지에서 이 사용자를 허용하는 것이 필요합니다.';
$string['usersettingssaved'] = '사용자 설정이 저장되었습니다.';
$string['validuntil'] = '유효기일';
$string['validuntil_help'] = '만일 설정되면 이 사용자에 대해 이 날 이후로 서비스가 비활성화 될 것입니다.';
$string['webservice'] = '웹 서비스';
$string['webservices'] = '웹 서비스';
$string['webservicesoverview'] = '개요';
$string['webservicetokens'] = '웹 서비스 토큰';
$string['wrongusernamepassword'] = '잘못된 사용자이름 또는 암호';
$string['wsaccessuserdeleted'] = '삭제된 사용자 이름 {$a}에 대해 거절된 웹서비스 접근';
$string['wsaccessuserexpired'] = '암호 만료된 사용자 이름 {$a}에 대해 거절된 웹서비스 접근';
$string['wsaccessusernologin'] = 'nologin 인증 사용자 이름 {$a}에 대해 거절된 웹서비스 접근';
$string['wsaccessusersuspended'] = '사용중지된 사용자 이름 {$a}에 대해 거절된 웹서비스 접근';
$string['wsaccessuserunconfirmed'] = '확인되지 않은 사용자 이름 {$a}에 대해 거절된 웹서비스 접근';
$string['wsclientdoc'] = '무들 웹서비스 클라이언트 문서';
$string['wsdocapi'] = 'API 문서';
$string['wsdocumentation'] = '웹 서비스 문서';
$string['wsdocumentationdisable'] = '웹서비스 문서가 비활성화 되었습니다.';
$string['wsdocumentationintro'] = '클라이언트를 만들려면 {$a->doclink}를 읽을 것을 권장합니다.';
$string['wsdocumentationlogin'] = '또는 웹서비스 사용자 이름과 암호를 입력하세요';
$string['wspassword'] = '웹 서비스 암호';
$string['wsusername'] = '웹 서비스 사용자이름';
