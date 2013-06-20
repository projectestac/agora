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
 * Strings for component 'rating', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = '평균 등급';
$string['aggregatecount'] = '등급 갯수';
$string['aggregatemax'] = '최고 등급';
$string['aggregatemin'] = '최소 등급';
$string['aggregatenone'] = '등급 없음';
$string['aggregatesum'] = '등급의 합계';
$string['aggregatetype'] = '집계 형식';
$string['aggregatetype_help'] = '집계 유형은 등급들이 어떻게 조합되어 성적부의 최종 성적을 산출하는가를 정의합니다.

* 등급 평균 - 모든 등급의 평균
* 등급의 수 - 등급을 받은 항목의 수가 최종 성적이 됩니다. 총점은 활동에 대한 대 성적을 초과할 수 없습니다.
* 최대 - 최고 등급이 최종 성적이 됩니다.
* 최소 - 최소 등급이 최종 성적이 됩니다.
* 합계 - 모든 성적이 더해집니다.  총점은 활동에 대한 대 성적을 초과할 수 없습니다.

만일 "등급없음"이 선택된다면 활동은 성적부에 나타나지 않습니다.';
$string['allowratings'] = '추천할 수 있게 허용겠습니까?';
$string['allratingsforitem'] = '모든 제출된 등급';
$string['capabilitychecknotavailable'] = '활동이 저장되기 전에는 능력 확인이 안됩니다.';
$string['couldnotdeleteratings'] = '죄송합니다. 사람들이 이미 등급을 주어서 삭제할 수 없습니다.';
$string['norate'] = '항목 추천이 허용되지 않음!';
$string['noratings'] = '제출된 등급이 없습니다.';
$string['noviewanyrate'] = '자신이 등급을 매긴 항목에 대한 결과만 볼 수 있습니다.';
$string['noviewrate'] = '항목 등급을 볼 수 있는 능력이 없습니다.';
$string['rate'] = '등위';
$string['ratepermissiondenied'] = '이 항목의 등급을 메길 수 있는 권한이 없음';
$string['rating'] = '추천';
$string['ratinginvalid'] = '등급이 잘 못 되었습니다.';
$string['ratings'] = '추천';
$string['ratingtime'] = '이 기간내에만 항목에 등급을 주도록 제한';
$string['rolewarning'] = '등급을 줄수 있는 권한이 있는 역할들';
$string['rolewarning_help'] = '등급을 내보내기 하기 위해서는 사용자들은 moodle/rating:rate능력과 모듈에 특정적인 능력을 가져야 합니다. 다음 역할을 부여받은 사용자들은 항목들을 등급 매길 수 있을 것입니다. 역할 목록은 설정 블록의 사용권한 링크를 통해서 수정될 수 있습니다.';
