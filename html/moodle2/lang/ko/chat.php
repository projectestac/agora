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
 * Strings for component 'chat', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = '대화방 일정이 다가오고 있습니다.';
$string['ajax'] = 'Ajax 사용판';
$string['autoscroll'] = '자동 스크롤';
$string['beep'] = '호출';
$string['cantlogin'] = '대화방에 입장할 수 없음!!';
$string['chat:addinstance'] = '새 대화방 추가';
$string['chat:chat'] = '대화방 입실';
$string['chat:deletelog'] = '대화 기록 삭제';
$string['chat:exportparticipatedsession'] = '참여한 대화방 세션 내보내기';
$string['chat:exportsession'] = '모든 대화방 세션 내보내기';
$string['chatintro'] = '머리말';
$string['chatname'] = '대화방 이름';
$string['chat:readlog'] = '대화 기록 읽기';
$string['chatreport'] = '대화방 보고서';
$string['chat:talk'] = '대화하기';
$string['chattime'] = '다음 대화 시각';
$string['composemessage'] = '메세지 작성';
$string['configmethod'] = 'ajax chat 메쏘드는 ajax 기반 채팅 인터페이스를 제공하며 주기적으로 업데이트를 위해 서버를 접속합니다. 보통의 채팅 메쏘드들은 클라이언트가 주기적으로 업데이트를 위해 서버에 접속하도록 합니다. ajax 채팅 메쏘드는 구성이 없고 모든 곳에서 작동하지만 참여자가 많을 경우에는 서버에 큰 부하를 걸리게 할 수 있습니다. 서버 데몬을 사용하는 것은 유닉스에 대한 쉘 접근이 필요하지만, 매우 빠른 대화 환경을 구축할 수 있습니다.';
$string['confignormalupdatemode'] = '대화방 업데이트는 HTTP 1.1의 <em>Keep-Alive</em> 기능을 사용하면 좋습니다만 서버에 부담을 줍니다. 더 개선된 방법은 <em>Stream</em> 방법을 사용하는 것입니다. <em>Stream</em>은 chatd을 이용할 때처럼 잘 작동하지만 서버가 지원하지 않을 수도 있습니다.';
$string['configoldping'] = '사용자가 아무 말 없이 몇 분이 지나면 대화방을 나간 것으로 간주할까요? 이는 단지 상한값으로서 이 시간이 지나면 접속을 끊어 버립니다. 작은 값일수록 서버측면에서 유리합니다. 일반적 방법을 쓰게되면 2*chat_refresh_room  이하로는 <strong>절대</strong> 설정하지 마십시오.';
$string['configrefreshroom'] = '몇 초마다 대화방을 업데이트할까요? 짧은 시간으로 설정하면 좋겠지만, 많은 사람이 대화에 참여할 땐 웹 서버에 부하가 많이 걸리게 됩니다. 만일 <em>Stream</em> 업데이트를 이용한다면 좀 더 빠른 업데이트 주기를 선택할 수도 있습니다. 대략 2초 정도로 해 보십시오.';
$string['configrefreshuserlist'] = '몇 초마다 사용자 목록을 업데이트할까요?';
$string['configserverhost'] = '대화방 데몬이 떠 있는 서버명';
$string['configserverip'] = '숫자로 된 서버의 IP주소';
$string['configservermax'] = '최대 참여자 수';
$string['configserverport'] = '데몬이 사용할 접속 포트';
$string['currentchats'] = '열려있는 대화방';
$string['currentusers'] = '현재 참여자';
$string['deletesession'] = '대화방 삭제';
$string['deletesessionsure'] = '이 대화방을 삭제할까요?';
$string['donotusechattime'] = '대화 내용 비공개';
$string['enterchat'] = '대화에 참여하려면 여기를 클릭!';
$string['entermessage'] = '메세지를 입력하세요.';
$string['errornousers'] = '어떤 사용자도 찾을 수 없음!';
$string['explaingeneralconfig'] = '이 설정들은 <strong>항상</strong> 사용';
$string['explainmethoddaemon'] = 'chat_method로 "채팅서버"를 선택하였을 때만 작동';
$string['explainmethodnormal'] = 'chat_method로 "일반 방법"을 선택하였을 때만 작동';
$string['generalconfig'] = '일반 설정';
$string['idle'] = '쉼';
$string['inputarea'] = '입력창';
$string['invalidid'] = '대화방을 찾을 수 없음!';
$string['list_all_sessions'] = '대화 목록';
$string['list_complete_sessions'] = '완료된 녹취록';
$string['listing_all_sessions'] = '녹취록';
$string['messagebeepseveryone'] = '{$a}가 모든 사람을 호출했음!';
$string['messagebeepsyou'] = '{$a}가 나를 호출했음!';
$string['messageenter'] = '{$a} 대화방에 들어옴';
$string['messageexit'] = '{$a} 대화방을 나감';
$string['messages'] = '메시지';
$string['messageyoubeep'] = '{$a}를 호출';
$string['method'] = '채팅 방법';
$string['methodajax'] = 'Ajax 사용';
$string['methoddaemon'] = '채팅 데몬';
$string['methodnormal'] = '일반 방법';
$string['modulename'] = '대화방';
$string['modulename_help'] = '대화방 모률은 참석자들이 온라인 상에서 실시간으로 토론을 할 수 있게 합니다. 이는 비 실시간으로 제공되는 포럼과는 달리, 대화방을 이용하여 논제를 토론하고 서로간의 이해를 증진시키는 데 유용합니다. ';
$string['modulenameplural'] = '대화모음';
$string['neverdeletemessages'] = '메시지 삭제 금지';
$string['nextsession'] = '다음번 예정된 대화';
$string['nochat'] = '대화방 없음';
$string['no_complete_sessions_found'] = '완료된 대화 없음';
$string['noguests'] = '손님은 이용권한 없음';
$string['nomessages'] = '아직 메시지 없음';
$string['nopermissiontoseethechatlog'] = '대화 기록을 볼 수 있는 권한이 없음';
$string['normalkeepalive'] = '연결유지';
$string['normalstream'] = '스트림';
$string['noscheduledsession'] = '예정된 대화방 없음';
$string['notallowenter'] = '대화방 입장이 허용되지 않음';
$string['notlogged'] = '아직 로그인하지 않았습니다.';
$string['oldping'] = '연결 해제 한계값';
$string['page-mod-chat-x'] = '모든 대화방 모듈 페이지';
$string['pastchats'] = '종료된 대화방';
$string['pluginadministration'] = '대화방 관리';
$string['pluginname'] = '대화방';
$string['refreshroom'] = '대화방 새로 고침';
$string['refreshuserlist'] = '사용자 새로 고침';
$string['removemessages'] = '모든 메시지 삭제';
$string['repeatdaily'] = '매일 같은 시간에';
$string['repeatnone'] = '반복 없이 지정된 시간에만 공개';
$string['repeattimes'] = '세션 반복/게시 횟수';
$string['repeatweekly'] = '매주 같은 시간에';
$string['saidto'] = '말함';
$string['savemessages'] = '종료된 대화 저장';
$string['seesession'] = '내용 보기';
$string['send'] = '전송';
$string['sending'] = '보내는 중';
$string['serverhost'] = '서버 이름';
$string['serverip'] = '서버 아이피';
$string['servermax'] = '최대 참여자';
$string['serverport'] = '서버 포트';
$string['sessions'] = '대화 세션';
$string['sessionstart'] = '대화방 세션이 {$a} 에 시작할 것입니다.';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = '종료된 대화 공개 여부';
$string['studentseereports_help'] = '아니오로 설정해 놓으면, 사용자 중 mod/chat:readlog 능력을 지닌 사람들만 대화 기록을 볼 수 있게 된다.';
$string['talk'] = '말하기';
$string['updatemethod'] = '업데이트 방법';
$string['updaterate'] = '업데이트율:';
$string['userlist'] = '사용자 목록';
$string['usingchat'] = '대화방 이용';
$string['usingchat_help'] = '<p>이 대화모듈은 대화상황을 더 좋게 만들어주는 기능들을 포함하고 있습니다.</p>

<dl>
<dt><b>웃는표정들</b></dt>
<dd>무들의 어느 곳에서든 사용할 수 있는 여러가지 표정들(이모티콘)이 쓰일수 있고 정확하게 표현될 것입니다. 예를들어,  :-) = <img alt="smiley" src="pix/s/smiley.gif" />  </dd>

<dt><b>인터넷 링크</b></dt>
<dd>인터넷주소는 자동적으로 링크로 표현됩니다.</dd>

<dt><b>감정나타내기</b></dt>
<dd>"/me" 또는 ":" 을 써서 감정을 나타낼 수 있습니다. 예를 들어 당신의 이름이 김이고 , ":laughs!"
또는 "/me laughs!"를 친다면 모든 사람들은 김이 웃는다는 것을 볼수 있습니다.
</dd>

<dt><b>경고하기</b></dt>
<dd>참여자의 이름 옆에 연결되어있는 beep를 침으로써 다른 사람들에게 소리를 보낼 수 있습니다. 대화중에 모든 이에게 한번에 beep을 보내는 유용한 지름길은 beep all을 치는것입니다.</dd>

<dt><b>HTML</b></dt>
<dd>만약 약간의 HTML 코드를 알고 있다면, 본문 안에 그림을 넣거나, 음악을 재생시키거나 다른 색과 크기의 글씨를 만들어내는 데 사용할 수 있습니다.</dd>

</dl>';
$string['viewreport'] = '지난 대화 보기';
