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
 * Strings for component 'debug', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = '인증 플러그인 {$a} 없음';
$string['blocknotexist'] = '블록 {$a} 가 없음';
$string['cannotbenull'] = '{$a} 는 빌 수 없음!';
$string['cannotdowngrade'] = '{$a->oldversion} 에서 {$a->newversion} 으로는 판내림을 할 수 없습니다';
$string['cannotfindadmin'] = '관리자가 없음!';
$string['cannotinitpage'] = '페이지를 초기화 할 수 없음: 잘못된 {$a->name} id {$a->id}';
$string['cannotsetuptable'] = '{$a} 테이블을 제대로 설정할 수 없음!';
$string['codingerror'] = '프로그램 오류 발견. 프로그래머 에 의해 수정되야 합니다:{$a}';
$string['configmoodle'] = '아직 무들이 설정되지 않았음. 우선 config.php를 수정할 필요가 있음';
$string['erroroccur'] = '현재의 과정에서 오류가 발생함';
$string['invalidarraysize'] = '{$a} 매개변수의 틀린 어레이 크기';
$string['invalideventdata'] = '틀린 이벤트 자료 제시: {$a}';
$string['invalidparameter'] = '매개 변수가 잘 못 되어 계속할 수 없습니다.';
$string['invalidresponse'] = '되돌아온 값이 잘 못 되어 계속할 수 없습니다.';
$string['missingconfigversion'] = '설정 테이블의 판번호 누락, 계속할 수 없습니다.';
$string['modulenotexist'] = '{$a} 모듈이 없음';
$string['morethanonerecordinfetch'] = 'fetch()에 중복 자료 발견!';
$string['mustbeoveride'] = '추상 메쏘드 {$a}는 덮어쓰여져야 합니다.';
$string['noadminrole'] = '관리자 역할을 찾을 수 없음';
$string['noblocks'] = '블록이 설치되지 않았음!';
$string['nocate'] = '범주 없음!';
$string['nomodules'] = '모듈이 없음!';
$string['nopageclass'] = '가져온 {$a} 에 page classes가 없음';
$string['noreports'] = '어느 보고서에도 접근할 수 없음';
$string['notables'] = '테이블 없음!';
$string['phpvaroff'] = 'PHP서버의 변수 \'{$a->name}\'는  off되어야 함 -   {$a->link}';
$string['phpvaron'] = 'PHP서버의 변수 \'{$a->name}\'가 On 이 아님 -   {$a->link}';
$string['sessionmissing'] = '세션에 {$a} 가 없음';
$string['sqlrelyonobsoletetable'] = '이 SQL은 과거 {$a} 테이블에 의존합니다! 개발자가 코드를 수정해야 합니다.';
$string['withoutversion'] = '주 version.php가 없습니다. 읽을 수가 없거나 깨짐';
$string['xmlizeunavailable'] = 'xml 변환기능을 사용할 수 없음';
