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
 * Strings for component 'backup', language 'ko', branch 'MOODLE_24_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = '자동 백업을 할지 안할지를 선택하십시요. 만일 수동이 선택되면 자동백업은 자동화된 백업 CLI 스크립트에 의해 가능할 수 있습니다. 이것은 명령줄 혹은 크론을 통하여 수동으로 수행될 수 있습니다.';
$string['autoactivedisabled'] = '비활성화됨';
$string['autoactiveenabled'] = '활성화됨';
$string['autoactivemanual'] = '수동';
$string['automatedbackupschedule'] = '일정';
$string['automatedbackupschedulehelp'] = '자동백업 실시요일 선택';
$string['automatedbackupsinactive'] = '사이트 관리자가 자동 백업을 활성화하지 않았음';
$string['automatedbackupstatus'] = '백업 일정 현황';
$string['automatedsettings'] = '자동 백업 설정';
$string['automatedsetup'] = '자동 백업 설정';
$string['automatedstorage'] = '자동 백업 스토리지';
$string['automatedstoragehelp'] = '백업이 자동으로 생성되는 경우 백업이 저장되는 위치를 선택하십시요.';
$string['backupactivity'] = '활동 백업: {$a}';
$string['backupcourse'] = '강좌 백업: {$a}';
$string['backupcoursedetails'] = '강좌 개요';
$string['backupcoursesection'] = '섹션: {$a}';
$string['backupcoursesections'] = '강좌 섹션';
$string['backupdate'] = '백업날짜';
$string['backupdetails'] = '백업 개요';
$string['backupdetailsnonstandardinfo'] = '선택된 파일은 표준 무들 백업 파일이 아닙니다. 복구과정은 백업파일을 표준파일형식으로 변환한 다음 복구하는 것을 시도할 것입니다.';
$string['backupformat'] = '백업 형식';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.1';
$string['backupformatmoodle1'] = '무들 1';
$string['backupformatmoodle2'] = '무들 2';
$string['backupformatunknown'] = '알수 없는 형식';
$string['backupmode'] = '백업모드';
$string['backupmode10'] = '일반';
$string['backupmode20'] = '가져오기';
$string['backupmode30'] = '허브';
$string['backupmode40'] = '같은 사이트';
$string['backupmode50'] = '자동화됨';
$string['backupmode60'] = '변환됨';
$string['backupsection'] = '백업 강좌 섹션: {$a}';
$string['backupsettings'] = '백업 설정';
$string['backupsitedetails'] = '사이트 개요';
$string['backupstage16action'] = '계속';
$string['backupstage1action'] = '다음';
$string['backupstage2action'] = '다음';
$string['backupstage4action'] = '백업 실시';
$string['backupstage8action'] = '계속';
$string['backuptype'] = '형식';
$string['backuptypeactivity'] = '활동';
$string['backuptypecourse'] = '강좌';
$string['backuptypesection'] = '섹션';
$string['backupversion'] = '백업 판';
$string['cannotfindassignablerole'] = '백업 파일의 {$a} 역할은 여러분이 지명할 수 있는 그 어떤 역할로도 대치시킬 수 없습니다.';
$string['choosefilefromactivitybackup'] = '활동 백업 영역';
$string['choosefilefromactivitybackup_help'] = '기본 설정을 사용하여 활동들을 백업할때 백업파일이 이곳에 저장됩니다.';
$string['choosefilefromautomatedbackup'] = '자동 백업';
$string['choosefilefromautomatedbackup_help'] = '자동으로 생성된 백업을 포함합니다.';
$string['choosefilefromcoursebackup'] = '강좌 백업 영역';
$string['choosefilefromcoursebackup_help'] = '기본 설정을 사용해서 강좌를 백업할 때, 백업 파일이 여기에 저장됩니다.';
$string['choosefilefromuserbackup'] = '개인 백업 영역';
$string['choosefilefromuserbackup_help'] = '강좌를 백업할때 사용자 정보 익명화하기 옵션이 선택되면 백업파일이 여기에 저장됩니다.';
$string['configgeneralactivities'] = '활동 포함을 기본 백업 설정으로 삼음';
$string['configgeneralanonymize'] = '활성화시키면, 기본적으로 모든 사용자 정보가 익명화되어 포함됨';
$string['configgeneralblocks'] = '블록 포함을 기본 백업 설정으로 삼음';
$string['configgeneralcomments'] = '덧글 포함을 기본 백업 설정으로 삼음';
$string['configgeneralfilters'] = '필터 포함을 기본 백업 설정으로 삼음';
$string['configgeneralhistories'] = '백업에 사용자 이력을 포함하는 것을 기본으로 설정';
$string['configgenerallogs'] = '활성화되면, 기본적으로 모든 로그기록들이 백업에 포함됨';
$string['configgeneralroleassignments'] = '활성화되면, 기본적으로 역할 부여 내용이 백업에 포함됨';
$string['configgeneralusers'] = '백업시 사용자를 포함시킬지 여부를 설정';
$string['configgeneraluserscompletion'] = '활성화되면, 기본적으로 사용자 이수 정보가 백업에 포함됨';
$string['configloglifetime'] = '이것은 얼마동안 백업기록을 보유하고 싶은지 그 기간을 지정합니다. 이 기간을 경과한 기록들은 자동적으로 삭제됩니다. 대체로 백업기록이 매우 방대하기 때문에 작은 값으로 둘 것을 권장합니다.';
$string['confirmcancel'] = '백업 취소';
$string['confirmcancelno'] = '그냥두기';
$string['confirmcancelquestion'] = '취소하기를 원하십니까? 입력한 정보는 잃어버리게 됩니다.';
$string['confirmcancelyes'] = '취소';
$string['confirmnewcoursecontinue'] = '새 강좌 경고';
$string['confirmnewcoursecontinuequestion'] = '(감춰진) 임시 강좌는 강좌 복구 과정에의해 생성될 것입니다. 복구를 취소하려면 취소를 클릭하십시오. 복구 중에는 브라우저를 닫지 마십시오.';
$string['coursecategory'] = '강좌가 복구되어 들어갈 범주';
$string['courseid'] = '강좌 ID';
$string['coursesettings'] = '강좌 설정';
$string['coursetitle'] = '제목';
$string['currentstage1'] = '초기 설정';
$string['currentstage16'] = '이수';
$string['currentstage2'] = '스키마 설정';
$string['currentstage4'] = '확인 및 검토';
$string['currentstage8'] = '백업 실시';
$string['dependenciesenforced'] = '의존성 관계로 설정이 변경되었슴';
$string['enterasearch'] = '검색어를 입력하세요.';
$string['error_block_for_module_not_found'] = '강좌모듈(id: {$a->mid})의 고립된 블럭 인스턴스(id: {$a->bid})가 발견되었음. 이 블럭은 백업되지 않을 것임';
$string['error_course_module_not_found'] = '고립된 강좌모듈(id: {$a})이 발견되었음. 이 모듈은 백업되지 않을 것임';
$string['errorfilenamemustbezip'] = '파일은 반드시 ZIP 파일이어야 하고 .mbz 확장자로 끝나야 함';
$string['errorfilenamerequired'] = '백업에 적합한 파일명을 입력해야 함';
$string['errorinvalidformat'] = '알수 없는 백업 포맷';
$string['errorinvalidformatinfo'] = '선택된 파일은 유효한 무들 백업파일이 아니어서 복구할 수 없습니다.';
$string['errorminbackup20version'] = '이 백업 파일은 무들 개발판 백업 ({$a->backup}) 기능에 의해 만들어졌습니다. 적어도 {$a->min} 가 필요합니다. 복구할 수 없습니다.';
$string['errorrestorefrontpage'] = '시작 페이지의 복구는 허용되지 않음';
$string['executionsuccess'] = '백업 파일이 성공적으로 만들어졌습니다.';
$string['filealiasesrestorefailures'] = '별칭 복구 실패';
$string['filealiasesrestorefailures_help'] = '얼라이어스란 외부 저장소에 저장된 파일을 포함한, 여타 파일을 심볼릭 링크한 것이다. 간혹, 다른 사이트의 백업 파일을 복구 한다던가, 참조된 파일이 존재하지 않는 경우에, 무들은 얼라이어스를 복구할 수 없다.</ br>복구 실패에 대한 좀 더 자세한 내용은 복구 기록 파일을 찾아보면 된다.';
$string['filealiasesrestorefailuresinfo'] = '간혹 백업 파일에 포한된 얼라이어스는 복구되지 않기도 한다. 다음 목록은 실제 기대하는 위치와 원 사이트에서 참조한 원래의 파일을 포함하고 있다.';
$string['filename'] = '파일명';
$string['filereferencesincluded'] = '백업 패키지의 외부 콘텐츠를 참조한 파일은 타 사이트에서는 작동하지 않는다.';
$string['filereferencesnotsamesite'] = '다른 사이트로부터의 백업입니다. 파일 참조는 복구될 수 없습니다.';
$string['filereferencessamesite'] = '같은 사이트로부터의 백업입니다. 파일 참조는 복구될 수 았습니다.';
$string['generalactivities'] = '활동 포함';
$string['generalanonymize'] = '정보 익명화';
$string['generalbackdefaults'] = '기본 백업 설정';
$string['generalblocks'] = '블록 포함';
$string['generalcomments'] = '덧글 포함';
$string['generalfilters'] = '필터 포함';
$string['generalgradehistories'] = '이수경력 포함';
$string['generalhistories'] = '이력 포함';
$string['generallogs'] = '로그 포함';
$string['generalroleassignments'] = '역할 부여 포함';
$string['generalsettings'] = '일반적인 백업 설정';
$string['generalusers'] = '사용자 포함';
$string['generaluserscompletion'] = '사용자 이수정보 포함';
$string['importbackupstage16action'] = '계속';
$string['importbackupstage1action'] = '다음';
$string['importbackupstage2action'] = '다음';
$string['importbackupstage4action'] = '가져오기 수행';
$string['importbackupstage8action'] = '계속';
$string['importcurrentstage0'] = '강좌 선택';
$string['importcurrentstage1'] = '초기 설정';
$string['importcurrentstage16'] = '완료';
$string['importcurrentstage2'] = '스키마 설정';
$string['importcurrentstage4'] = '확인 및 검토';
$string['importcurrentstage8'] = '가져오기 수행';
$string['importfile'] = '백업파일 가져오기';
$string['importsuccess'] = '가져오기 완료. 강좌로 돌아가기 위해서는 계속을 클릭하세요.';
$string['includeactivities'] = '포함:';
$string['includeditems'] = '포함된 항목들:';
$string['includefilereferences'] = '외부 콘텐츠에 대한 파일 참조';
$string['includesection'] = '섹션 {$a}';
$string['includeuserinfo'] = '사용자 자료';
$string['locked'] = '잠김';
$string['lockedbyconfig'] = '이 설정은 기본 백업 설정의 의해 잠겨있음';
$string['lockedbyhierarchy'] = '종속성에 의해 잠겼음';
$string['lockedbypermission'] = '이 설정을 바꿀 수 있는 권한이 없음';
$string['loglifetime'] = '로그 보관 기간';
$string['managefiles'] = '백업파일 관리';
$string['missingfilesinpool'] = '어떤 파일들은 백업과정에서 저장될 수 없었습니다. 이런 파일들은 복구가 불가능합니다.';
$string['moodleversion'] = '무들 판';
$string['moreresults'] = '너무 많은 검색 결과가 있습니다. 좀 더 자세한 검색을 입력하십시요.';
$string['nomatchingcourses'] = '표시할 강좌 없음';
$string['norestoreoptions'] = '복원하고자 하는 범주나 존재하는 강좌가 없습니다.';
$string['originalwwwroot'] = '백업할 주소';
$string['previousstage'] = '이전으로';
$string['qcategory2coursefallback'] = '백업 파일의 시스템/강좌 범주 문맥에 있었던 질문 범주 "{$a->name}"가 복구에 의해 강좌 문맥에서 만들어질 것입니다.';
$string['qcategorycannotberestored'] = '질문 범주 "{$a->name}"는 복구에 의해 생성될 수 없습니다.';
$string['question2coursefallback'] = '백업 파일의 시스템/강좌 범주 문맥에 있었던 질문 범주 "{$a->name}"가 복구에 의해 강좌 문맥에서 만들어질 것입니다.';
$string['questionegorycannotberestored'] = '질문 "{$a->name}"은 복구에 의해 생성될 수 없습니다.';
$string['restoreactivity'] = '활동 복구';
$string['restorecourse'] = '강좌 복구';
$string['restorecoursesettings'] = '강좌 설정';
$string['restoreexecutionsuccess'] = '강좌가 성공적으로 복구되었으므로, 하단의 계속 버튼을 누르면 복구된 강좌를 볼 수 있습니다.';
$string['restorefileweremissing'] = '어떤 파일들은 백업과정에서 누락되어 복구할 수 없습니다.';
$string['restorenewcoursefullname'] = '새 강좌 이름';
$string['restorenewcourseshortname'] = '새강좌의 단축명';
$string['restorenewcoursestartdate'] = '새로운 개시일';
$string['restorerolemappings'] = '역할 배치 복구';
$string['restorerootsettings'] = '복구 설정';
$string['restoresection'] = '섹션 복구';
$string['restorestage1'] = '확인';
$string['restorestage16'] = '검토';
$string['restorestage16action'] = '복구 실행';
$string['restorestage1action'] = '다음';
$string['restorestage2'] = '목적지';
$string['restorestage2action'] = '다음';
$string['restorestage32'] = '처리';
$string['restorestage32action'] = '계속';
$string['restorestage4'] = '설정';
$string['restorestage4action'] = '다음';
$string['restorestage64'] = '완료';
$string['restorestage64action'] = '계속';
$string['restorestage8'] = '스키마';
$string['restorestage8action'] = '다음';
$string['restoretarget'] = '복구할 대상';
$string['restoretocourse'] = '복구할 강좌:';
$string['restoretocurrentcourse'] = '이 강좌에 복구';
$string['restoretocurrentcourseadding'] = '이 강좌에 백업 강좌를 병합';
$string['restoretocurrentcoursedeleting'] = '이 강좌의 내용을 삭제 후, 복구';
$string['restoretoexistingcourse'] = '기존 강좌로 복구';
$string['restoretoexistingcourseadding'] = '기존 강좌에 백업 내용을 병합';
$string['restoretoexistingcoursedeleting'] = '기존 강좌 내용을 삭제 후, 복구';
$string['restoretonewcourse'] = '새 강좌로 복구';
$string['restoringcourse'] = '강좌 복구 중';
$string['restoringcourseshortname'] = '복구';
$string['rootsettingactivities'] = '활동 포함';
$string['rootsettinganonymize'] = '사용자 정보 익명화';
$string['rootsettingblocks'] = '블록 포함';
$string['rootsettingcalendarevents'] = '달력 일정 포함';
$string['rootsettingcomments'] = '덧글 포함';
$string['rootsettingfilters'] = '필터 포함';
$string['rootsettinggradehistories'] = '성적 이력 포함';
$string['rootsettingimscc1'] = 'IMS Common Cartridge 1.0로 변환';
$string['rootsettingimscc11'] = 'IMS Common Cartridge 1.1로 변환';
$string['rootsettinglogs'] = '강좌 기록 포함';
$string['rootsettingroleassignments'] = '역할 부여 사항 포함';
$string['rootsettings'] = '백업 설정';
$string['rootsettingusers'] = '등록 사용자 포함';
$string['rootsettinguserscompletion'] = '상세 이수 내역 포함';
$string['sectionactivities'] = '활동';
$string['sectioninc'] = '백업에 사용자 정보 제외';
$string['sectionincanduser'] = '백업에 사용자 정보도 포함됨';
$string['selectacategory'] = '범주 선택';
$string['selectacourse'] = '강좌 선택';
$string['setting_course_fullname'] = '강좌명';
$string['setting_course_shortname'] = '강좌 단축명';
$string['setting_course_startdate'] = '강좌 개설 날짜';
$string['setting_keep_groups_and_groupings'] = '현재 모둠과 모둠 무리 보관';
$string['setting_keep_roles_and_enrolments'] = '현재 역할과 등록 보관';
$string['setting_overwriteconf'] = '강좌 설정을 덮어씀';
$string['skiphidden'] = '숨긴 강좌 생략';
$string['storagecourseandexternal'] = '강좌 백업 파일 영역 및 특정 디렉토리';
$string['storagecourseonly'] = '강좌 백업 파일영역';
$string['storageexternalonly'] = '자동 백업을 위한 특정 디렉토리';
$string['totalcategorysearchresults'] = '전체 범주 : {$a}';
$string['totalcoursesearchresults'] = '전체 강좌 : {$a}';
