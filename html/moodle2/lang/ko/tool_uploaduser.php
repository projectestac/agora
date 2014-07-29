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
 * Strings for component 'tool_uploaduser', language 'ko', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = '삭제 허용';
$string['allowrenames'] = '이름 변경 허용';
$string['allowsuspends'] = '계정 활성화 및 사용정지 허용';
$string['csvdelimiter'] = 'CSV 구분자';
$string['defaultvalues'] = '기본값';
$string['deleteerrors'] = '오류 삭제';
$string['encoding'] = '엔코딩';
$string['errormnetadd'] = '원격 사용자를 추가 할 수 없습니다';
$string['errors'] = '오류들';
$string['nochanges'] = '변화 없음';
$string['pluginname'] = '사용자 업로드';
$string['renameerrors'] = '이름변경 오류';
$string['requiredtemplate'] = '필수사항. 여기에 템플릿 문법을 사용할 수 있습니다 (%l = 성, %f = 이름, %u = 사용자 ID). 세부사항과 예제는 도움말을 보세요.';
$string['rowpreviewnum'] = '미리보기 열';
$string['uploadpicture_baduserfield'] = '사용자 속성 지정이 잘못되었습니다. 다시 시도하기 바랍니다.';
$string['uploadpicture_cannotmovezip'] = '임시 경로로 zip 파일을 옮길 수 없습니다.';
$string['uploadpicture_cannotprocessdir'] = 'zip 파일을 풀지 못합니다.';
$string['uploadpicture_cannotsave'] = '{$a} 의 사진을 저장할 수 없습니다. 원본 파일을 점검해 보세요.';
$string['uploadpicture_cannotunzip'] = '묶음 파일을 풀 수 없습니다.';
$string['uploadpicture_invalidfilename'] = '그림 파일 {$a} 에는 쓸 수 없는 문자가 포함된 이름이 있습니다. 생략합니다.';
$string['uploadpicture_overwrite'] = '기존 사진에 덮어 쓰겠습니까?';
$string['uploadpictures'] = '사진 올려주기';
$string['uploadpictures_help'] = '<p>사용자들의 사진은 한꺼번에 이미지 파일들을 묶은 압축(zip)파일로 올릴 수 있습니다. 각 이미지 파일은 <i>선택된 사용자 속성.확장자</i>의 형태로 명명되어야만 합니다. 예를들어 선택된 사용자 속성이 사용자의 ID이고 그 사용자의 ID가 blabla라면 그 사람의 이미지 파일명은 blabla.확장자가 되어야 합니다.</p>
<p>여기에서 내부적으로 쓰일 수 있는 이미지 파일의 확장자는 gif, jpg 그리고 png가 있습니다.</p>';
$string['uploadpicture_userfield'] = '사진에 상응하는 사용자 속성:';
$string['uploadpicture_usernotfound'] = '\'{$a->uservalue}\'가 \'{$a->userfield}\'인 사용자는 존재하지 않습니다. 생략합니다.';
$string['uploadpicture_userskipped'] = '{$a} 는 이미 사진이 있으므로 생략합니다.';
$string['uploadpicture_userupdated'] = '{$a} 사진 업데이트됨';
$string['uploadusers'] = '사용자 업로드';
$string['uploadusers_help'] = '사용자는 텍스트 파일을 통하여 업로드(및 강좌에 선택적으로 등록) 될 수 있습니다. 파일 포맷은 다음과 같아야 합니다.

* 파일의 각 줄은 한 레코드를 포함합니다.
* 각 레코드들은 콤마로 분리된 데이터들의 연속입니다.
* 첫 레코드는 파일의 나머지 포맷을 정의하는 항목 이름 목록을 포함합니다.
* 필요한 항목이름은 사용자 이름, 암호, 이름, 성, 이메일 입니다.';
$string['uploaduserspreview'] = '올린 사용자 미리보기';
$string['uploadusersresult'] = '올린 사용자  결과';
$string['useraccountupdated'] = '사용자가 업데이트됨';
$string['useraccountuptodate'] = '사용자  (최신)';
$string['userdeleted'] = '사용자 삭제됨';
$string['userrenamed'] = '사용자 ID가 변경됨';
$string['userscreated'] = '사용자들이 생성됨';
$string['usersdeleted'] = '사용자들이 삭제됨';
$string['usersrenamed'] = '사용자 ID들이 변경됨';
$string['usersskipped'] = '사용자들이 생략됨';
$string['usersupdated'] = '사용자들이 업데이트됨';
$string['usersweakpassword'] = '사용자가 너무 취약한 암호를 씀';
$string['uubulk'] = '일괄 작업을 위한 선택';
$string['uubulkall'] = '모든 사용자';
$string['uubulknew'] = '새 사용자';
$string['uubulkupdated'] = '업데이트된 사용자';
$string['uucsvline'] = 'CSV 라인';
$string['uulegacy1role'] = '(정규 학생) 유형번호=1';
$string['uulegacy2role'] = '(기존 선생님) typeN=2';
$string['uulegacy3role'] = '(기존 편집능력이 없는 선생님) typeN=3';
$string['uunoemailduplicates'] = '이메일 중복을 방지';
$string['uuoptype'] = '올리기 형식';
$string['uuoptype_addinc'] = '모두 추가, 필요한 경우 아이디에 숫자 추가';
$string['uuoptype_addnew'] = '새 사용자만 추가, 기존 사용자 생략';
$string['uuoptype_addupdate'] = '새 사용자 추가 및 기존 사용자 업데이트';
$string['uuoptype_update'] = '기존 사용자만 업데이트';
$string['uupasswordcron'] = '크론에서 생성됨';
$string['uupasswordnew'] = '새 사용자 암호';
$string['uupasswordold'] = '기존 사용자 암호';
$string['uustandardusernames'] = '사용자이름 표준화';
$string['uuupdateall'] = '초기값 및 파일로 덮어쓰기';
$string['uuupdatefromfile'] = '파일로 덮어쓰기';
$string['uuupdatemissing'] = '초기값 및 파일에서 누락사항 채우기';
$string['uuupdatetype'] = '기존 사용자 세부사항';
$string['uuusernametemplate'] = '사용자이름 템플릿';
