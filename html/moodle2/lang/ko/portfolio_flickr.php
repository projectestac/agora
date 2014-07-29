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
 * Strings for component 'portfolio_flickr', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API 키';
$string['contenttype'] = '내용 분류';
$string['err_noapikey'] = 'API키 없음';
$string['err_noapikey_help'] = '본 플러그인에 API 키가 설정되어 있지 않음. http://flickr.com/services/api/keys/apply 에서 얻을 수 있음';
$string['hidefrompublicsearches'] = '이미지 검색에서 노출되지 않게 할까요?';
$string['isfamily'] = '가족에게 공개';
$string['isfriend'] = '친구에게 공개';
$string['ispublic'] = '공개(모두 볼 수 있음)';
$string['moderate'] = '조건부';
$string['noauthtoken'] = '본 세션에 사용한 인증 토큰을 찾을 수 없음';
$string['other'] = '예술창작, 일러스트레이션,  CGI 혹은 기타 비 사진 이미지';
$string['photo'] = '사진';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = '제한';
$string['safe'] = '안전';
$string['safetylevel'] = '보안 수준';
$string['screenshot'] = '스크린샷';
$string['set'] = '세트';
$string['setupinfo'] = '설정 지시사항';
$string['setupinfodetails'] = 'API키와 암호 문자열을 얻기위해 Flickr에 로그인하고 <a href="{$a->applyurl}">새로운 키를 신청</a>하십시요. 일단 새로운 키와 암호가 만들어지면 페이지에 있는  이 어플리케이션에 대해 인증 절차를 편집\' 링크를 따라가십시요.  \'Web Application\'에 \'App Type\' 를 선택하십시요. \'Callback URL\' 필드에 <br /><code>{$a->callbackurl}</code><br />를 입력하십시요. 선택적으로 무들 사이트에 대한 설명과 로고를 제공할 수 있습니다. 이 값들은 추후 플리커 어플리케이션 목록을 보여주는  <a href="{$a->keysurl}">페이지</a>에서 설정될 수 있습니다.';
$string['sharedsecret'] = '암호 문자열';
$string['title'] = '제목';
$string['uploadfailed'] = 'flickr.com으로 {$a} 올리기 실패';
