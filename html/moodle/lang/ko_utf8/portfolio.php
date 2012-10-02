<?PHP // $Id: portfolio.php,v 1.20 2008/11/13 02:40:26 yogibear270 Exp $ 
      // portfolio.php - created with Moodle 2.0 dev (Build: 20081113) (2008111100)


$string['activeexport'] = '내보내기 마무리';
$string['activeportfolios'] = '내 포트폴리오';
$string['addalltoportfolio'] = '모두 포트폴리오에 추가';
$string['addnewportfolio'] = '포트폴리오 작성';
$string['addtoportfolio'] = '포트폴리오에 추가';
$string['alreadyalt'] = '이미 내보내는 중 - 현재 전송을 마무리하려면 여기를 누르기 바랍니다.';
$string['alreadyexporting'] = '이미 본 세션에서 포트폴리오를 내보냈습니다. 계속하기 전에, 본 세션을 완료하거나, 아니면 취소해야 합니다. 계속 하겠습니까?(삭제되지 않음)';
$string['availableformats'] = '이용가능한 내보내기 형식';
$string['callercouldnotpackage'] = '내보내기 위한 자료 묶기 실패';
$string['cannotsetvisible'] = '공개로 설정할 수 없음 - 설정오류로 인해 플러그인이 작동 불가';
$string['commonsettingsdesc'] = '<p>\'적정\' 혹은 \'최대\' 시간을 사용하여 전송이 이루어질 것인지의 여부는 사용자가 전송이 완료되기 까지 대기할 것인지 여부에 달려 있다. </p>
<p>\'적정 시간\' 한계에 드는 크기는 사용자의 요청을 기다리지 않고 즉시 실행되며, 옵션에 의해 \'적정\' 및 \'최대\' 전송이 제공되나 시간이 초과할 경우에는 경고를 발하게 된다.</p>
<p>한편 어떤 포트폴리오 플러그인은 이 옵션을 완전히 무시하고 모든 전송을 큐에 집어 넣기도 한다.</p>';
$string['configexport'] = '내보낼 자료 설정';
$string['configplugin'] = '포트폴리오 플러그인 설정';
$string['configure'] = '설정';
$string['confirmexport'] = '내보낼 사항을 확인하기 바람';
$string['confirmsummary'] = '내보낼 항목 개요';
$string['continuetoportfolio'] = '포트폴리오 계속';
$string['deleteportfolio'] = '포트폴리오 인스턴스 삭제';
$string['destination'] = '보낼 곳';
$string['disabled'] = '죄송합니다만, 이 사이트에서는 포트폴리오 내보내기가 되지 않습니다';
$string['displayarea'] = '내보낼 영역';
$string['displayexpiry'] = '전송 제한 시간';
$string['displayinfo'] = '표시 정보';
$string['dontwait'] = '기다리지 말 것';
$string['enabled'] = '포트폴리오 가능';
$string['enableddesc'] = '사용자의 포트폴리오 내용을 관리자가 원격 시스템을 조정하여 내보낼 수 있게 허용할 것임';
$string['err_uniquename'] = '포트폴리오의 명칭은 중복되면 안됨';
$string['exportcomplete'] = '포트폴리오 내보내기 성공!';
$string['exportedpreviously'] = '이전에 내보낸 포트폴리오';
$string['exportexceptionnoexporter'] = '현재 세션에 대한 portfolio_export_exception이 제시됐지만 내보낼 객체가 없음';
$string['exportexpired'] = '포트폴리오 해지됨';
$string['exportexpireddesc'] = '정보 내보내기를 반복하고 있거나 빈 내용을 내보내려 하고 있습니다. 제대로 하려면 원래의 위치로 돌아가 다시 시작해야만 합니다. 이 현상은 가끔 내보내기가 완료된 후에 뒤로 돌아가기 버튼을 사용할 때나, 잘못된 주소를 갈무리 함으로서 일어납니다.';
$string['exporting'] = '포트폴리오 내보내기';
$string['exportingcontentfrom'] = '$a 의 내용 내보내기';
$string['exportqueued'] = '포트폴리오 내보내기 준비작업 성공';
$string['exportqueuedforced'] = '포트폴리오 내보내기 준비작업 성공(원격시스템 대기 완료)';
$string['failedtopackage'] = '파일을 찾을 수 없음';
$string['failedtosendpackage'] = '지정된 포트폴리오 시스템에 자료 전송 실패!';
$string['filedenied'] = '접속이 허용되지 않음';
$string['filenotfound'] = '파일 없음';
$string['format_file'] = '파일';
$string['format_image'] = '이미지';
$string['format_mbkp'] = '무들 백업';
$string['format_plainhtml'] = 'HTML';
$string['format_richhtml'] = '첨부물이 있는 HTML';
$string['format_text'] = '일반 문서';
$string['format_video'] = '비디오';
$string['hidden'] = '비공개';
$string['highdbsizethreshold'] = '최고 전송 디비 크기';
$string['highdbsizethresholddesc'] = '전송시간 내 최대로 전송할 수 있는 자료의 숫자';
$string['highfilesizethreshold'] = '최고 전송 파일 크기';
$string['highfilesizethresholddesc'] = '전송 시간 내 최대로 전송할 수 있는 파일의 크기';
$string['insanebody'] = '$a->sitename 의 관리자이기 때문에 받는 메시지입니다.

포트폴리오 인스턴스가 잘못된 설정으로 자동 해제되어 있습니다. 이로 말미암아 사용자는 현재 포트폴리의의 내용을 내보낼 수 없습니다.

해제된 포트폴리오 목록은 다음과 같습니다.

 $a->textlist

가급적 빨리 $a->fixurl 을 방문하여 이를 바로잡기 바랍니다.';
$string['insanebodyhtml'] = '<p> $a->sitename 의 관리자이기 때문에 받는 메시지입니다.</p>
$a->htmllist
<p>가급적 빨리<a href=\"$a->fixurl\">포트폴리오 설정화면</a>을 방문하여 이를 바로잡기 바랍니다.';
$string['insanebodysmall'] = '$a->sitename 의 관리자이기 때문에 받는 메시지입니다. 포트폴리오 인스턴스가 잘못된 설정으로 자동 해제되어 있습니다. 이로 말미암아 사용자는 현재 포트폴리의의 내용을 내보낼 수 없습니다.
가급적 빨리 $a->fixurl 을 방문하여 이를 바로잡기 바랍니다.';
$string['insanesubject'] = '포트폴리오 인스턴스 자동 해제';
$string['instancedeleted'] = '포트폴리오 삭제 완료';
$string['instanceismisconfigured'] = '포트폴리오 설정오류로 중지됨. $a 오류';
$string['instancenotdelete'] = '포트폴리오 삭제 실패';
$string['instancenotsaved'] = '포트폴리오 저장 실패';
$string['instancesaved'] = '포트폴리오 저장 완료';
$string['invalidaddformat'] = 'portfolio_add_button에 잘못된 추가 형식 전달.  ($a) 반드시 PORTFOLIO_ADD_XXX 중에 하나가 되어야 함';
$string['invalidbuttonproperty'] = 'portfolio_button 의 속성($a)을 찾지 못 함';
$string['invalidconfigproperty'] = '($a->class 의 $a->property) 설정 항목을 찾을 수 없음';
$string['invalidexportproperty'] = '내보낼 ($a->class 의 $a->property) 설정 항목을 찾을 수 없음';
$string['invalidfileareaargs'] = 'set_file_and_format_data에 잘못된 파일 영역 인수 전달. 반드시 영역ID, 파일 영역 및 항목ID를 포함하여야 함';
$string['invalidfileargument'] = 'portfolio_format_from_file에 잘못된 인수 전달. 반드시 stored_file 객체이어야 함';
$string['invalidformat'] = '잘못된 형식 $a 로 내보내려 하고 있음';
$string['invalidinstance'] = '포트폴리오 인스턴스가 없음';
$string['invalidpreparepackagefile'] = '잘못된 prepare_package_file 호출. 단수 혹은 복수 파일이 설정되어야 함';
$string['invalidproperty'] = '($a->class 의 $a->property) 항목을 찾을 수 없음';
$string['invalidsha1file'] = '잘못된 get_sha1_file 호출. 단수 혹은 복수 파일이 설정되어야 함';
$string['invalidtempid'] = '잘못된 임시 ID';
$string['invaliduserproperty'] = '사용자 ($a->class 의 $a->property) 설정 항목을 찾을 수 없음';
$string['logs'] = '전송 기록';
$string['logsummary'] = '이전 전송 기록';
$string['manageportfolios'] = '포트폴리오 관리';
$string['manageyourportfolios'] = '내 포트폴리오 관리';
$string['missingcallbackarg'] = '$a->class 의 $a->arg 아규먼트 회신 누락';
$string['moderatedbsizethreshold'] = '적정 전송 디비 크기';
$string['moderatedbsizethresholddesc'] = '적정 전송시간 내에 전송할 수 있는 자료의 수 한계';
$string['moderatefilesizethreshold'] = '적정 전송 파일 크기';
$string['moderatefilesizethresholddesc'] = '적정 전송시간 내에 전송할 수 있는 파일의 크기 한도';
$string['multipledisallowed'] = '다중 인스턴스 ($a)가 허용되지 않는 플러그인에서 새 인스턴스를 생성하려 하고 있음';
$string['mustsetcallbackoptions'] = 'portfolio_add_button 을 설정하거나 set_callback_options 방법을 이용하여 회신 옵션을 설정하여야 함';
$string['noavailableplugins'] = '내보낼 포트폴리오가 없음';
$string['nocallbackclass'] = '($a)를 사용할 수 있는 회신 클래스를 찾을 수 없음';
$string['nocallbackfile'] = '내보내려는 포트폴리오가 깨졌음 - 요청한 $a 파일을 찾을 수 없음';
$string['noclassbeforeformats'] = 'portfolio_button의 set_formats을 호출하기 전에 회신 클래스를 설정해야만 함';
$string['nocommonformats'] = '요청한 $a 와 이용가능한 플러그인 사이에 공유 형식이 없음';
$string['nonprimative'] = 'portfolio_add_button으로 초기값 전송없음. 작업 중단.  $a->key 키의 키값은 $a->value 였음';
$string['nopermissions'] = '죄송합니다만, 이 영역에서 파일을 내보낼 권한이 없음';
$string['notexportable'] = '죄송합니다만, 내보낼 수 없는 내용 형식을 지정하였음';
$string['notimplemented'] = '죄송합니다만, 아직 지원하지 않는 ($a) 형식으로 내용을 내보내려 하고 있습니다.';
$string['notyetselected'] = '아직 선택되지 않음';
$string['notyours'] = '남의 포트폴리오를 재작성하려고 합니다!';
$string['nouploaddirectory'] = '자료를 묶을 임시 저장고를 생생할 수 없음';
$string['plugin'] = '포트폴리오 플러그인';
$string['plugincouldnotpackage'] = '내보낼 자료를 묶는 데 실패';
$string['pluginismisconfigured'] = '포트폴리오 설정이 잘못되어 생략됨. 오류: $a';
$string['portfolio'] = '포트폴리오';
$string['portfolios'] = '포트폴리오';
$string['queuesummary'] = '전송 대기 중';
$string['returntowhereyouwere'] = '원래 위치로 돌아감';
$string['save'] = '저장';
$string['selectedformat'] = '선택된 내볼낼 형식';
$string['selectedwait'] = '기다릴까요?';
$string['selectplugin'] = '내보낼 플러그인 선택';
$string['someinstancesdisabled'] = '설정오류거나 알지 못하는 이유에 의해 플러그인 인스턴스 작동 안 됨';
$string['somepluginsdisabled'] = '설정오류거나 알지 못하는 이유에 의해 전체 플러그인 작동 안 됨';
$string['sure'] = '\'$a\'를 삭제하겠습니까? 이는 되돌이킬 수 없습니다.';
$string['thirdpartyexception'] = '제 3자 예외 조항이 포트폴리오 내보내기 ($a) 과정에서 제시됨. 수합은 됐지만 수정되어야 할 것임';
$string['transfertime'] = '전송 시간';
$string['unknownplugin'] = '알 수 없음(관리자에 의해 제거된 듯 함)';
$string['wait'] = '대기';
$string['wanttowait_high'] = '완료되기까지 대기하는 것을 권장하지는 않습니다만, 확실하게 그 결과를 알고 싶다면 대기하실 수 있습니다.';
$string['wanttowait_moderate'] = '전송을 위해 대기하길 원하십니까? 수분 정도 걸립니다.';
$string['format_html'] = 'HTML'; // ORPHANED
$string['portfolionotfile'] = '파일대신 포트폴리오로 내보냄'; // ORPHANED

?>
