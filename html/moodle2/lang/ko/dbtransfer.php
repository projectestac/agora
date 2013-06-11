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
 * Strings for component 'dbtransfer', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = '원본 테이블 구조 점검';
$string['copyingtable'] = '테이블 {$a} 복사';
$string['copyingtables'] = '테이블 내용 복사';
$string['creatingtargettables'] = '데이터베이스에 테이블 생성';
$string['dbexport'] = '데이터베이스 내보내기';
$string['dbtransfer'] = '데이터베이스 옮기기';
$string['differenttableexception'] = '테이블 {$a} 의 구조가 일치하지 않음';
$string['done'] = '완료';
$string['exportschemaexception'] = '데이터베이스의 구조가 .xml 파일과 일치하지 않습니다.<br /> {$a}';
$string['importschemaexception'] = '데이터베이스의 구조가 .xml 파일과 일치하지 않습니다.<br /> {$a}';
$string['importversionmismatchexception'] = '현재의 버전 {$a->currentver} 는 내보내기한 {$a->schemaver} 버전과 일치하지 않습니다.';
$string['malformedxmlexception'] = '잘못된 XML 이므로 계속할 수 없습니다.';
$string['unknowntableexception'] = '내보내는 파일에서 알 수 없는 테이블 {$a} 가 발견되었습니다.';
