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
 * Strings for component 'portfolio_boxnet', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['existingfolder'] = '파일을 넣어둘 기존 폴더';
$string['folderclash'] = '생성 요청한 폴더는 이미 존재함!';
$string['foldercreatefailed'] = 'box.net에 폴더 생성 실패';
$string['folderlistfailed'] = 'box.net에서 폴더목록 가져오기 실패';
$string['newfolder'] = '파일을 저장할 새 폴더';
$string['noauthtoken'] = '본 세션에서 사용할 수 있는 인증 획득 실패';
$string['notarget'] = '기존의 폴더와 새 폴더를 지정해야만 함';
$string['noticket'] = 'box.net에서 인증 세션을 시작할 키를 확보할 수 없음';
$string['password'] = 'box.net 비밀번호(저장되지 않음)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'box.net에 {$a} 전송 실패';
$string['setupinfo'] = '설정 지시사항';
$string['setupinfodetails'] = 'API키를 받기 위해서는 Box.net에 로그인하고  <a href="{$a->servicesurl}">OpenBox 개발 페이지</a>를 방문하십시요. \'개발 도구\'에서  \'Create new application\' 를 따라가서 무들 사이트를 위한 새 어플리케이션을 만드십시요. API키는 어플리케이션 편집 양식의 \'Backend parameters\' 섹션에 표시될 것입니다. 그 양식에 \'Redirect URL\'필드를<br /><code>{$a->callbackurl}</code><br />로 채우십시요. 선택적으로 무들 사이트에 대한 다른 정보를 제공할 수 있습니다. 이 값들은 "내 어플리케이션 보기" 페이지에서 추후 편집될 수 있습니다.';
$string['sharedfolder'] = '공유폴더';
$string['sharefile'] = '이 파일을 공유하겠습니까?';
$string['sharefolder'] = '새 폴더를 공유하겠습니까?';
$string['targetfolder'] = '대상폴더';
$string['tobecreated'] = '생성 예정';
$string['username'] = 'box.net 사용자 ID(저장되지 않음)';
