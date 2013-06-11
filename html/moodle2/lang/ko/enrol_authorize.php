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
 * Strings for component 'enrol_authorize', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = '어떤 유형의 카드가 가능합니까?';
$string['adminaccepts'] = '허용되는 지불 방법 및 유형 선택';
$string['adminauthorizeccapture'] = '주문 검토 및 자동 징수 설정';
$string['adminauthorizeemail'] = '이메일 보내기 설정';
$string['adminauthorizesettings'] = 'Authorize.Net 계정 설정';
$string['adminauthorizewide'] = '일반 설정';
$string['adminconfighttps'] = '관리 >> 변수 >> 보안 >> HTTP 보안 으로 가서 "<a href="{$a->url}">loginhttps를 활성화</a>"해 놓은 것을 잊지말기 바랍니다.';
$string['adminconfighttpsgo'] = '이 플러그인을 설정하기 위해서는 <a href="{$a->url}">보안  페이지</a>로 가십시요.';
$string['admincronsetup'] = 'cron.php 유지 스크립트가 최소 24시간 동안 작동하고 있지 않습니다. <br/>자동 징수 기능을 사용하기 위해서는 Cron이 활성화되어야 합니다. <br/>\'Authorize.Net plugin\' 을 활성화 하고 cron을 적절하게 설정하십시요. 또는 an_review를 체크해지 하십시요. <br/> 만일 자동 징수 기능을 비활성화하고 30일 이전에 검토를 하지 않으면 거래는 취소됩니다. <br/> 만일 수동으로 30일 이내에 지불을 승인하거나 거절하기를 원한다면 <br/> an_review를 체크하고 an_capture_day 항목에 \'0\'을 입력하시오.';
$string['adminemailexpiredsort'] = '담당 선생님께 파기될 수강신청에 대한 이메밀을 보내게 될 때, 어느 사항이 중요합니까?';
$string['adminemailexpiredsortcount'] = '주문 신청 수';
$string['adminemailexpiredsortsum'] = '총 합계';
$string['adminemailexpsetting'] = '(0=통보이메일 불가, 기본값=2, 최대=5)<br />(이메일을 보내기 위한 수동 수납 설정 : cron=enabled, an_review=checked, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = '예정된 결제일';
$string['adminhelpreviewtitle'] = '주문 검토';
$string['adminneworder'] = '관리자님께,

다음과 같은 새로운 미결된 주문을 받았습니다.

주문번호: {$a->orderid}
거래번호: {$a->transid}
사용자: {$a->user}
과정: {$a->course}
금액: {$a->amount}

자동 징수 기능 활성화?: {$a->acstatus}
만일 자동 징수가 활성화되어 있다면, 신용카드로부터 {$a->captureon} 에 징수될 것이며 학생은 강좌에 등록될 수 있을 것입니다. 그렇지 않으면  {$a->expireon} 에 실효될 것이고 이 날 이후로는 징수될 수 없습니다.

당신은 {$a->url} 에서 학생들 등록시키기 위하여 지불을 승인하거나 거부할 수 있습니다.';
$string['adminnewordersubject'] = '{$a->course};새로운 미결된 수강신청: {$a->orderid}';
$string['adminpendingorders'] = '당신은 자동 징수 기능을 비활성화 하였습니다. <br/> 총금액은 {$a->count} 이고 \'Authorized/Pending Capture\' 상태인 거래는 당신이 체크를 하지 않으면 취소될 것입니다. <br />지불을 승인/거절하기 위해서는<a href=\'{$a->url}\'> 지불 관리 </a> 페이지로 가십시요.';
$string['adminteachermanagepay'] = '선생님은 자신의 강좌에 대한 지불을 관리할 수 있습니다.';
$string['allpendingorders'] = '유보된 모든 주문';
$string['amount'] = '금액';
$string['anauthcode'] = '인증코드 받기';
$string['anauthcodedesc'] = '사용자의 신용카드가 인터넷으로 직접 징수될수 없다면 은행에서 전화를 통해 인증코드을 받으십시요.';
$string['anavs'] = '주소 확인 시스템';
$string['anavsdesc'] = 'Authorize.Net 구매 계정에서 AVS(Address Verification System)을 활성화 하였다면 이것을 체크하세요. 사용자가 지불 양식을 작성할 때 거리이름, 도, 나라 및 우편번호와 같은 항목을 요구할 것입니다.';
$string['ancaptureday'] = '인증일';
$string['ancapturedaydesc'] = '선생님이나 관라자가 정해진 기일안에 주문을 검토하지 않으면 신용카드에서 자동으로 징수됩니다. 크론은 반드시 활성화 되어야 합니다. </br> (0은 예정된 징수를 비활성화하며 선생님이나 관리자가 수동으로 검토한다는 것을 의미합니다. 예정된 징수를 비활성화 하거나 30일 이내에 검토하지 않으면 거래는 취소 될 것입니다.';
$string['anemailexpired'] = '만료일';
$string['anemailexpireddesc'] = '이것은 \'수동징수\'에 유용합니다. 미결제 주문이 만료되기 전에 일정기간 전에 관리자에게 통지됩니다.';
$string['anemailexpiredteacher'] = '만료 통지 - 선생님';
$string['anemailexpiredteacherdesc'] = '수동 징수를 활성화 하였다면 선생님은 지불을 관리할 수 있습니다. 선생님들은 미지불 주문이 만료된다는 통지를 받게 될 수도 있습니다. 미지불 주문이 만료되는 갯수에 대해 각 강좌 선생님들에게 이메일을 보낼 것입니다.';
$string['anlogin'] = 'Authorize.net: 로그인이름';
$string['anpassword'] = 'Authorize.net: 암호';
$string['anreferer'] = '참조자(Referer)';
$string['anrefererdesc'] = 'Authorize.Net 구매 계정에서 이것을 설정하였다면 URL referer를 정의하세요. 이것은 웹 요청에 엠베드된 "Referer:URL" 줄을 보낼 것입니다.';
$string['anreview'] = '검토';
$string['anreviewdesc'] = '신용카드를 처리하기전에 주문을 검토하세요.';
$string['antestmode'] = '테스트 모드';
$string['antestmodedesc'] = '테스트모드에서 거래 실행(돈이 빠져나가지 않습니다)';
$string['antrankey'] = 'Authorize.net: 거래키';
$string['approvedreview'] = '승인 검토';
$string['authcaptured'] = '승인/징수됨';
$string['authcode'] = '승인 코드';
$string['authorize:config'] = 'Authorize.Net 등록 인스턴스 구성';
$string['authorizedpendingcapture'] = '승인/보류 캡쳐';
$string['authorizeerror'] = 'Authorize.net 오류: {$a}';
$string['authorize:manage'] = '등록된 사용자 관리';
$string['authorize:managepayments'] = '지불 관리';
$string['authorize:unenrol'] = '강좌에서 사용자 등록 취소';
$string['authorize:unenrolself'] = '스스로 강좌 수강 철회';
$string['authorize:uploadcsv'] = 'CSV 파일 올리기';
$string['avsa'] = '주소(거리)이름은 일치하지만 우편번호는 일치하지 않습니다.';
$string['avsb'] = '주소 정보가 제공되지 않았습니다.';
$string['avse'] = '주소 확인 시스템 오류';
$string['avsg'] = '미국외 카드 발급 은행';
$string['avsn'] = '주소와 우편번호에서 불일치';
$string['avsp'] = '주소 확인 시스템 적용 불가';
$string['avsr'] = '재시도-시스템을 사용할 수 없거나 시간 초과';
$string['avsresult'] = 'AVS 결과:  {$a}';
$string['avss'] = '발급자에 의한 서비스가 제공되지 않습니다.';
$string['avsu'] = '주소정보를 사용할 수 없습니다.';
$string['avsw'] = '9자리 우편번호는 일치되지만 주소(거리)는 일치하지 않습니다.';
$string['avsx'] = '주소와 9자리 우편번호가 일치합니다.';
$string['avsy'] = '주소와 5자리 우편번호가 일치합니다.';
$string['avsz'] = '5자리 우편번호는 일치합니다만 주소(거리)는 일치하지 않습니다.';
$string['canbecredit'] = '{$a->upto} 에게 환불될 수 있습니다.';
$string['cancelled'] = '취소됨';
$string['capture'] = '징수';
$string['capturedpendingsettle'] = '징수됨/보류 합의';
$string['capturedsettled'] = '징수됨/결제완료';
$string['captureyes'] = '신용카드정보가 저장될 것이며 학생이 강좌에 등록될 수 있습니다. 맞습니까?';
$string['cccity'] = '도시';
$string['ccexpire'] = '만료 날짜';
$string['ccexpired'] = '이 신용카드는 파기되었습니다.';
$string['ccinvalid'] = '카드 번호가 잘못되었습니다.';
$string['cclastfour'] = '최근 신용카드 넷';
$string['ccno'] = '신용카드 번호';
$string['ccstate'] = '주';
$string['cctype'] = '신용카드 종류';
$string['ccvv'] = '카드 확인';
$string['ccvvhelp'] = '카드의 뒷 부분(마지막 3자리)을 보십시오.';
$string['choosemethod'] = '만약 강좌 등록키를 안다면 그것을 여기에 입력하십시오. 그렇지 않다면 당신은 이 교육과정의 수강료를 납부해야만 합니다.';
$string['chooseone'] = '아래의 빈칸들 중 한 부분이나 모든 부분을 채우시오. 비밀번호는 보이지 않습니다.';
$string['cost'] = '비용';
$string['costdefaultdesc'] = '강좌 설정에서 항목난에 <strong>-1</strong>을 써 넣으면 기본값으로 설정이 됩니다.';
$string['currency'] = '통화';
$string['cutofftime'] = '마감 시간';
$string['cutofftimedesc'] = '거래 마감 시간. 합의를 위해 선택된  마지막 거래가 언제입니까?';
$string['dataentered'] = '자료 입력됨';
$string['delete'] = '파기';
$string['description'] = 'Authorize.net 모듈은 유료교육과정에 대해 지불 공급자를 통해 지불하는것을 가능하게 합니다.  수강료를 설정하는 방법에는 두 가지가 있습니다. (1) 전체 사이트에 기본으로 통용되는 수강료 (2)각 코스마다 개별적으로 정할 수 있는 수강료가 있습니다. 강좌의 수업료는 사이트 기본 수업료를 덮어쓰게 됩니다.';
$string['echeckabacode'] = '은행 ABA 코드';
$string['echeckaccnum'] = '계좌번호';
$string['echeckacctype'] = '계좌종류';
$string['echeckbankname'] = '은행명';
$string['echeckbusinesschecking'] = '비지니스 수표';
$string['echeckchecking'] = '당좌';
$string['echeckfirslasttname'] = '예금주';
$string['echecksavings'] = '저축';
$string['enrolenddate'] = '마감일';
$string['enrolenddaterror'] = '등록 마감일은 시작일보다 빠를 수 없습니다.';
$string['enrolname'] = 'Authorize.net 지불 게이트웨이';
$string['enrolperiod'] = '등록기간';
$string['enrolstartdate'] = '시작일';
$string['expired'] = '파기됨';
$string['expiremonth'] = '만료 월';
$string['expireyear'] = '만료 년';
$string['firstnameoncard'] = '카드에 있는 이름';
$string['haveauthcode'] = '이미 인증코드를 확보함';
$string['howmuch'] = '얼마나?';
$string['httpsrequired'] = '저희는 당신이 요구가 신속하게 처리되지 못한 점에 대해  죄송하게 생각합니다. 이 사이트의 설정이 현재 제대로 작동되지 않았습니다.
<br /><br />
인터넷 브라우저의 아래부분에 노란 자물쇠 그림이 보일때까지 신용카드 번호를 입력하지 말기를 바랍니다.
자물쇠 그림은 클라이언트와 서버사이의 모든 데이터가 암호화됨을 의미합니다. 그렇게 되면 두대의 컴퓨터 사이에 이동되는 모든 정보가 보호되고 당신의 신용카드 번호는 인터넷에 알려지지 않게 됩니다.';
$string['invalidaba'] = '쓸 수 없는 ABA 코드';
$string['invalidaccnum'] = '쓸 수 없는 계좌번호';
$string['invalidacctype'] = '쓸 수 없는 계좌유형';
$string['isbusinesschecking'] = '업무용 수표입니까?';
$string['lastnameoncard'] = '카드에 있는 성';
$string['logindesc'] = '이 옵선은 반드시 켜져야 합니다.<br /><br />
반드시 환경/보안 섹션에서 <a href="{$a->url}">loginhttps On</a>옵션을 설정해야만 합니다.<br /><br />
이 옵션을 켜야 무들은 접속 페이지와 지불 페이지에 보안 프로그램을 사용할 것입니다.';
$string['logininfo'] = 'Authorize.Net 계정을 구성할 때, 로그인 이름이 필요하며 <<strong>거래키</strong>나 <strong>암호</strong>를 입력해야 합니다. 보안 예비조치로 거래키를 입력하기를 추천합니다.';
$string['messageprovider:authorize_enrolment'] = 'Authorize.Ne 등록 메세지';
$string['methodcc'] = '신용카드';
$string['methodccdesc'] = '신용카드과 승인된 타입을 아래에서 선택하세요.';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'eCheck와 받아들이는 유형을 아래에서 선택하세요.';
$string['missingaba'] = 'ABA 코드 누락';
$string['missingaddress'] = '주소 누락';
$string['missingbankname'] = '은행명 누락';
$string['missingcc'] = '카드번호  누락';
$string['missingccauthcode'] = '인증코드 누락';
$string['missingccexpiremonth'] = '만료 월이 없습니다.';
$string['missingccexpireyear'] = '만료 년이 없습니다.';
$string['missingcctype'] = '카드종류 누락';
$string['missingcvv'] = '입증 번호 누락';
$string['missingzip'] = '우편번호 누락';
$string['mypaymentsonly'] = '내 지불만 보기';
$string['nameoncard'] = '카드에 적힌 이름';
$string['new'] = '새';
$string['nocost'] = 'Autorize.net 을 통해 이 강좌를 등록하는데 연계된 비용이 없습니다.';
$string['noreturns'] = '반환이 안됨';
$string['notsettled'] = '결제 안됨';
$string['orderdetails'] = '주문 정보';
$string['orderid'] = '주문 아이디';
$string['paymentmanagement'] = '지불 관리';
$string['paymentmethod'] = '지불 방법';
$string['paymentpending'] = '이 과정의 수강신청번호 {$a->orderid} 에 대한 당신의 지불사항은 보류중입니다. <a href=\'{$a->url}\'> 수강신청 세부사항 </a> 을 참고하십시요.';
$string['pendingecheckemail'] = '관리자님께,

여기에 유보되었던 {$a->count} 의 전자결제가 있으니 사용자 등록을 하기 위해서는 csv파일을 업로드하셔야만 합니다.
{$a->url} 을 클릭하셔서 안내문을 참고하시기 바랍니다.';
$string['pendingechecksubject'] = '{$a->course}: 유보된 전자결재eChecks({$a->count})';
$string['pendingordersemail'] = '관리자님께,

{$a->days} 일 이내로 지불을 승인하지 않으면 "{$a->course}" 에 대한 {$a->pending} 거래가 파기될 것입니다.

이것은 자동 징수 기능을 활성화하지 않았기 때문에 나오는 경고 메세지입니다. 지불을 승인하거나 거절하는 것을 수동으로 해야 합니다.

계류중인 지불을 승인하거나 거절하기 위해서는 {$a->url}
로 가십시요.

자동 징수 기능을 활성화 하면 더 이상 경고 메세지를 받지 않습니다. 이를 위해서는 {$a->enrolurl} 로 가십시요.';
$string['pendingordersemailteacher'] = '담당 선생님께

{$a->days} 일 이내로 지불을 승인하지 않으면 "{$a->course}"의 {$a->currency} {$a->sumcost} 에 대한 {$a->pending} 거래가 파기될 것입니다.

관리자가 자동 징수할 수 없으므로 선생님이 직접 지불에 대해 승인/거부 의사를 밝히셔야만 합니다.

{$a->url}';
$string['pendingorderssubject'] = '경고 : {$a->days} 일 이내에  {$a->course}, {$a->pending} 수강신청이 피기될 것입니다.';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = '중복 거래가 접수되었습니다.';
$string['reason13'] = '업자 로그인 아이디가 잘못되었거나 계정이 비활성화 상태입니다.';
$string['reason16'] = '그 거래 기록은 찾을 수 없습니다.';
$string['reason17'] = '그 업자는 이런 종류의 신용카드를 받지 않습니다.';
$string['reason245'] = 'gateway hosted payment form을 이용한 지불에 대해서는 eCheck를 사용할 수 없습니다.';
$string['reason246'] = '본 eCheck유형은 허용되지 않습니다.';
$string['reason27'] = '이 거래는 AVS가 일치하지 않습니다. 주소가 카드 소유주의 주소와 맞지 않습니다.';
$string['reason28'] = '그 업자는 이런 종류의 신용카드를 받지 않습니다.';
$string['reason30'] = '처리기에서 설정이 잘못 되었습니다. 상거래 서비스 공급자와 통화하십시요.';
$string['reason39'] = '이 업자의 통화 코드가 맞지 않거나 지원되지 않거나 허용되지 않거나 환율이 없습니다.';
$string['reason43'] = '상거래자가 처리기에서 잘못 설정되었습니다. 상거래 서비스 제공자와 통화하십시요.';
$string['reason44'] = '이 거래는 거절되었습니다. 카드코드 필터 오류!';
$string['reason45'] = '이 거래는 거절되었습니다. 카드코드 AVS 필터 오류!';
$string['reason47'] = '결제에 필요한 금액이 승인된 처음 금액보다 많습니다.';
$string['reason5'] = '맞는 금액이 필요합니다.';
$string['reason50'] = '이 거래는 결제 대기 상태입니다. 환불될 수 없습니다.';
$string['reason51'] = '이 거래에 대한 총 신용금액이 처음 거래 금액보다 큽니다.';
$string['reason54'] = '참조한 거래는 카드를 발급하기 위한 조건을 충족하지 않습니다.';
$string['reason55'] = '참조한 거래에 대한 총 신용금액이 처음 외상 금액보다 큽니다.';
$string['reason56'] = '본 거래는 eCheck(ACH)만 허용합니다. 신용카드 거래는 하실 수 없습니다.';
$string['refund'] = '환불';
$string['refunded'] = '환불됨';
$string['returns'] = '반환';
$string['reviewfailed'] = '검토 실패';
$string['reviewnotify'] = '결제가 확인되었습니다. 선생님으로부터 며칠안으로 이메일이 갈것입니다.';
$string['sendpaymentbutton'] = '지불하기';
$string['settled'] = '결제됨';
$string['settlementdate'] = '결제일';
$string['shopper'] = '판매자';
$string['status'] = 'Authorize.net  등록 허용';
$string['subvoidyes'] = '환불된 {$a->transid} 거래는 취소될 것이며 당신의 계좌에 {$a->amount}가 이체될 것입니다, 맞습니까?';
$string['tested'] = '테스트 됨';
$string['testmode'] = '[테스트 모드]';
$string['testwarning'] = '징수/무효/환불이 데스트모드에서 동작하는 것처럼 보입니다. 그러나 아무런 기록도 데이터베이스에 업데이트되거나 삽입되지 않았습니다.';
$string['transid'] = '거래 ID';
$string['underreview'] = '검토 중';
$string['unenrolselfconfirm'] = '"{$a}" 에서 수강철회하기를 원하십니까?';
$string['unenrolstudent'] = '학생 등록취소';
$string['uploadcsv'] = 'CSV 파일 올리기';
$string['usingccmethod'] = '<a href="{$a->url}"><strong>신용 카드 </strong></a>를 이용한 등록';
$string['usingecheckmethod'] = '<a href="{$a->url}"><strong>eCheck</strong></a>를 이용한 등록';
$string['verifyaccount'] = 'authorize.net 계정을 확인하세요';
$string['verifyaccountresult'] = '확인 결과 : {$a}';
$string['void'] = '무효';
$string['voidyes'] = '거래가 취소될 것입니다. 맞습니까?';
$string['welcometocoursesemail'] = '{$a->name}님, 안녕하세요?

등록금을 납부해 주셔서 감사합니다. 등록한 강좌는 {$a->courses} 입니다.
자세한 등록 상황은 {$a->paymenturl} 에서 볼 수 있으며 {$a->profileurl} 에서 개인정보를 변경할 수 있습니다.';
$string['youcantdo'] = '당신은 이 활동을 할 수 없습니다: {$a->action}';
$string['zipcode'] = '우편번호';
