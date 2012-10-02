<?PHP // $Id: portfolio_mahara.php,v 1.3 2008/09/13 05:24:49 yogibear270 Exp $ 
      // portfolio_mahara.php - created with Moodle 2.0 dev (Build: 20080913) (2008091000)


$string['err_invalidhost'] = '본 플러그인은 잘못되거나 삭제된 mnet 호스트에 연결하도록 설정되었습니다. 이 플러그인은 무들 네트웍이 SSO IDP를 공개하고, 포트폴리오 및 SSO SP에 상호 등록되어 있음을 전제로 합니다.';
$string['err_networkingoff'] = '무들 네트웍이 완전히 끊겼음. 플러그인을 설정하기 전에  무들 네트웍을 활성화시키십시오. 네트웍 활성화 이전에는 플러그인을 설정할 수 있는 어떤 과정도 볼 수 없으므로 수동으로 이들이 보이게 설정할 필요가 있을 것입니다. 네트웍 활성화 이전에는 플러그인 설정을 할 수 없습니다.';
$string['err_nomnetauth'] = '현재 mnet 인증 플러그인이 비활성화 되어 있으므로, 이를 활성화시켜야만 함';
$string['err_nomnethosts'] = '이 플러그인은 무들 네트웍이 SSO IDP를 공개하고, 포트폴리오 및 SSO SP에 상호 등록되어 있음을 전제로 합니다. 이것이 제대로 설정되지 않는 한, 플러그인의 설정 과정은 보이지 않을 것이며 수동으로 이들을 보이게 설정할 필요가 있을 것입니다. 전제 조건을 충족시키기 전에는 플러그인 설정을 할 수 없습니다.';
$string['failedtojump'] = '원격 서버와 교신할 수 없음';
$string['failedtoping'] = '원격 서버 $a 와 교신할 수 없음';
$string['mnet_nofile'] = '전송 대상 파일을 찾을 수 없음 - 이상한 오류';
$string['mnet_nofilecontents'] = '전송 대상 파일은 찾았으나 그 내용을 취할 수 없음 - 이상한 오류 $a';
$string['mnet_noid'] = '이 토큰에 일치하는 전송 자료를 찾을 수 없음';
$string['mnet_notoken'] = '이 전송 자료에 일치하는 토큰을 찾을 수 없음';
$string['mnet_wronghost'] = '원격 서버가 본 토큰에 일치하는 전송 자료를 갖고 있지 않음';
$string['mnethost'] = '무들 네트웍 호스트';
$string['pf_description'] = '무들의 내용을 이 호스트로 전송할 수 있게 허용<br />사이트의 인증된 사용자로 하여금 $a 로 내용을 전달할 수 있게 이 서비스를 등록<br /><ul>
<li><em>의존성</em>: 또한 반드시 $a 에게 SSO(신분 제공자) 서비스를 <strong>공개</strong>해야만 함</li>
<li><em>의존성</em>: 또한 반드시 $a 에 SSO(서비스 제공자)로 <strong>등록</strong>되어 있어야만 함</li></ul><br />';
$string['pf_name'] = '포트폴리오 서비스';
$string['pluginname'] = '마하라 e포트폴리오';
$string['senddisallowed'] = '지금은 마하라로 파일을 전송할 수 없음';
$string['url'] = 'URL';

?>
