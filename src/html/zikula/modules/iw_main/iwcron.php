<?php
// carrega les funcions bàsiques que permeten inicialitzar el sistema
include 'includes/pnAPI.php';
// carrega la resta de funcions
pnInit(PN_CORE_CONFIG |
		PN_CORE_ADODB |
		PN_CORE_DB |
		PN_CORE_OBJECTLAYER |
		PN_CORE_TABLES |
		PN_CORE_SESSIONS |
		PN_CORE_THEME
);
pnModLoad('iw_main', 'admin');

$langcode = pnModGetVar('/PNConfig', 'language_i18n');
ZLanguage::setLocale($langcode);
ZLanguage::bindCoreDomain();

$dom = ZLanguage::getModuleDomain('iw_main');
$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
$lastCronSuccessfull = pnModFunc('iw_main', 'user', 'userGetVar',
								  array('uid' => -100,
										'name' => 'lastCronSuccessfull',
										'module' => 'iw_main_cron',
										'sv' => $sv));
if($lastCronSuccessfull > time() - 7*60*60){
	if(isset($_REQUEST['return']) && $_REQUEST['return'] == 1){
		LogUtil::registerError (__('The cron has been executed too recenty', $dom));
		return pnRedirect(pnModURL('iw_main', 'admin', 'main'));
	}else{
		print __('The cron has been executed too recenty', $dom);
		exit;
	}
}
//Check if module Mailer is active
$modid = pnModGetIDFromName('Mailer');
$modinfo = pnModGetInfo($modid);
//if it is active
if($modinfo['state'] == 3){
	$userNews = userNews();
	$result = array('value' => $userNews['value'],
					'msg' => $userNews['msg']);
}else{
	$result = array('value' => '-1',
					'msg' => __('The Mailer module is not active. The cron can not send emails to users.', $dom));
}
if($result['value'] == 1 || $result['value'] == 0){
	$time = time();
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar',
			   array('uid' => -100,
					 'name' => 'lastCronSuccessfull',
					 'module' => 'iw_main_cron',
					 'lifetime' => 1000*24*60*60,
					 'sv' => $sv,
					 'value' => time()));
}
$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
$lastCronSuccessfull = pnModFunc('iw_main', 'user', 'userGetVar',
								  array('uid' => -100,
										'name' => 'lastCronSuccessfull',
										'module' => 'iw_main_cron',
										'sv' => $sv));
$executeTime = date('M, d Y - H.i', time());
$lastCronSuccessfullTime = date('M, d Y - H.i', $lastCronSuccessfull);
if($lastCronSuccessfullTime == ''){$lastCronSuccessfullTime = __('Never', $dom);}
$cronResponse .= '<div>' . __('Last cron execution', $dom) . ': ' . $executeTime . '</div>';
$cronResponse .= '<div>' . __('Last successful cron execution', $dom) . ': ' . $lastCronSuccessfullTime . '</div>';
$cronResponse .= '<div>' . $result['msg'] . '</div>';
$cronResponse .= '<div>&nbsp;</div>';
$cronResponse .= '<div>' . __('Cron results', $dom) . ': ';
if($result['value'] == 1){
	$cronResponse .= '<span style="color: green;">' . __('It has executed correctly', $dom) . '</span></div>';
}elseif($result['value'] == 0){
	$cronResponse .= '<span style="color: orange;">' . __('It has worked incorrectly', $dom) . '</span></div>';
}else{
	$cronResponse .= '<span style="color: red;">' . __('It has not worked', $dom) . '</span></div>';
}
if($result['value'] == 1 || $result['value'] == 0){
	$time = time();
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar',
			   array('uid' => -100,
					 'name' => 'lastCronSuccessfull',
					 'module' => 'iw_main_cron',
					 'lifetime' => 1000*24*60*60,
					 'sv' => $sv,
					 'value' => time()));
}
//-100 really is not a user but represents the system user
$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
pnModFunc('iw_main', 'user', 'userSetVar',
		   array('uid' => -100,
				 'name' => 'cronResponse',
				 'module' => 'iw_main_cron',
				 'lifetime' => 1000*24*60*60,
				 'sv' => $sv,
				 'value' => $cronResponse));
$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
pnModFunc('iw_main', 'user', 'userSetVar',
		   array('uid' => -100,
				 'name' => 'lastCron',
				 'module' => 'iw_main_cron',
				 'lifetime' => 1000*24*60*60,
				 'sv' => $sv,
				 'value' => time()));
if(isset($_REQUEST['return']) && $_REQUEST['return'] == 1){
	return pnRedirect(pnModURL('iw_main', 'admin', 'main'));
}else{
	print $cronResponse;
}
pnShutDown();
function userNews(){
	
	$dom = ZLanguage::getModuleDomain('iw_main');
	//get the users mails
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersMails = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
							 array('sv' => $sv,
								   'info' => 'e'));
	$subject = __('This email is a resume of the new things to see in the site', $dom);
	$ok = 0;
	$ko = 0;
	foreach($usersMails as $key => $value){
		if($value != ''){
			//check if user is subscribed to news
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$subscribed = pnModFunc('iw_main', 'user', 'userGetVar',
									 array('uid' => $key,
										   'name' => 'subscribeNews',
										   'module' => 'iw_main_cron',
										   'sv' => $sv));
			if($subscribed){
				//get user last send mail
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$userLastMail =	pnModFunc('iw_main', 'user', 'userGetVar',
										   array('uid' => $key,
												 'name' => 'lastUserSendMail',
												 'module' => 'iw_main_cron',
												 'sv' => $sv));
				//calc user news
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				pnModFunc('iw_main', 'user', 'news', array('uid' => $key,
															'sv' => $sv));
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$newsValue = pnModFunc('iw_main', 'user', 'userGetVar',
										array('uid' => $key,
											  'name' => 'news',
											  'module' => 'iw_main_block_news',
											  'sv' => $sv,
											  'nult' => true));
				if($newsValue != __('Nothing to show', $dom)){
					$newsValueText = '<div>'.pnModGetVar('iw_main', 'cronHeaderText').'</div>';
					$newsValueText .= '<table width="300">'.$newsValue.'</table>';
					$newsValueText .= '<div>'.pnModGetVar('iw_main', 'cronFooterText').'</div>';

					$sendResult = pnModAPIFunc('Mailer', 'user', 'sendmessage',
												array('toname' => $value,
										        	  'toaddress' => $value,
										              'subject' => $subject,
										              'body' => $newsValueText,
										              'html' => 1));
					if($sendResult){
						$ok++;
					}else{
						$ko++;
					}
					if($ko >= 5 && $ok == 0){
						$returnValue = '-1';
						$msg .= __('The 5 firsts tries of cron execution has failed. The cron execution has been aborted.', $dom);
						$result = array('value' => $returnValue,
										'msg' => $msg);
						return $result;
					}
				}
			}
		}else{
			$msg = '<div>' . __('Your site have users without email address. You should correct this.', $dom) . '</div>';
		}
	}
	if($ko == 0 && $ok == 0){
		$returnValue = '1';
		$msg .= __('There have not found emails to send.', $dom);
	}elseif($ko == 0 && $ok != 0){
		$returnValue = '1';
		$msg .= __('The information about the new things to see has been send to users via email.', $dom) . ' ' . __('The number of send emails has been of ', $dom) . ' ' . $ok.'.';
	}elseif($ko != 0 && $ok != 0){
		$returnValue = '0';
		$msg .= __('Not has been possible to send all the resume messages with the new things to see to users. Some of them have failed.', $dom) . ' ' . $ko . ' ' . __('of', $dom) . ' ' . $ok . '. ';
	}else{
		$returnValue = '-1';
		$msg .= __('All the tries of sending messages have failed. The number of tries has been of', $dom).' '.$ko.'.';
	}
	$result = array('value' => $returnValue,
					'msg' => $msg);
	return $result;
}
