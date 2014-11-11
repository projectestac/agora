<?php

// init zikula engine
include 'lib/bootstrap.php';
$core->init();

ModUtil::load('IWmain', 'admin');

$langcode = ModUtil::getVar('ZConfig', 'language_i18n');

ZLanguage::setLocale($langcode);
ZLanguage::bindCoreDomain();

$dom = ZLanguage::getModuleDomain('IWmain');
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
$lastCronSuccessfull = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => -100,
            'name' => 'lastCronSuccessfull',
            'module' => 'IWmain_cron',
            'sv' => $sv));

/*
if ($lastCronSuccessfull > time() - 7 * 60 * 60) {
    if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
        LogUtil::registerError(__('The cron has been executed too recenty', $dom));
        return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
    } else {
        print __('The cron has been executed too recenty', $dom);
        exit;
    }
}
*/

//Check if module Mailer is active
$modid = ModUtil::getIdFromName('Mailer');
$modinfo = ModUtil::getInfo($modid);
//if it is active
if ($modinfo['state'] == 3) {
    $userNews = userNews();
    $result = array('value' => $userNews['value'],
        'msg' => $userNews['msg']);
} else {
    $result = array('value' => '-1',
        'msg' => __('The Mailer module is not active. The cron can not send emails to users.', $dom));
}
if ($result['value'] == 1 || $result['value'] == 0) {
    $time = time();
    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
        'name' => 'lastCronSuccessfull',
        'module' => 'IWmain_cron',
        'lifetime' => 1000 * 24 * 60 * 60,
        'sv' => $sv,
        'value' => time()));
}
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
$lastCronSuccessfull = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => -100,
            'name' => 'lastCronSuccessfull',
            'module' => 'IWmain_cron',
            'sv' => $sv));
$executeTime = date('M, d Y - H.i', time());
$lastCronSuccessfullTime = date('M, d Y - H.i', $lastCronSuccessfull);

if ($lastCronSuccessfullTime == '')
    $lastCronSuccessfullTime = __('Never', $dom);

$cronResponse .= '<div>' . __('Last cron execution', $dom) . ': ' . $executeTime . '</div>';
$cronResponse .= '<div>' . __('Last successful cron execution', $dom) . ': ' . $lastCronSuccessfullTime . '</div>';
$cronResponse .= '<div>' . $result['msg'] . '</div>';
$cronResponse .= '<div>&nbsp;</div>';
$cronResponse .= '<div>' . __('Cron results', $dom) . ': ';
if ($result['value'] == 1) {
    $cronResponse .= '<span style="color: green;">' . __('It has executed correctly', $dom) . '</span></div>';
} elseif ($result['value'] == 0) {
    $cronResponse .= '<span style="color: orange;">' . __('It has worked incorrectly', $dom) . '</span></div>';
} else {
    $cronResponse .= '<span style="color: red;">' . __('It has not worked', $dom) . '</span></div>';
}
if ($result['value'] == 1 || $result['value'] == 0) {
    $time = time();
    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
        'name' => 'lastCronSuccessfull',
        'module' => 'IWmain_cron',
        'lifetime' => 1000 * 24 * 60 * 60,
        'sv' => $sv,
        'value' => time()));
}
//-100 really is not a user but represents the system user
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
    'name' => 'cronResponse',
    'module' => 'IWmain_cron',
    'lifetime' => 1000 * 24 * 60 * 60,
    'sv' => $sv,
    'value' => $cronResponse));
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
    'name' => 'lastCron',
    'module' => 'IWmain_cron',
    'lifetime' => 1000 * 24 * 60 * 60,
    'sv' => $sv,
    'value' => time()));
if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
    return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
} else {
    print $cronResponse;
}

Zikula_View_Theme::getInstance()->clear_all_cache();
Zikula_View_Theme::getInstance()->clear_compiled();
Zikula_View_Theme::getInstance()->clear_cssjscombinecache();
Zikula_View::getInstance()->clear_all_cache();
Zikula_View::getInstance()->clear_compiled();

// Remove old records in table IWstats to avoid infinite growing
ModUtil::func('IWstats', 'admin', 'purgeOldRecords', array());

System::shutdown();


function userNews() {

    $dom = ZLanguage::getModuleDomain('IWmain');
    //get the users mails
    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    $usersMails = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                'info' => 'e'));
    $subject = __('This email is a resume of the new things to see in the site', $dom);
    $ok = 0;
    $ko = 0;
    foreach ($usersMails as $key => $value) {
        if ($value != '') {
            //check if user is subscribed to news
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $subscribed = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $key,
                        'name' => 'subscribeNews',
                        'module' => 'IWmain_cron',
                        'sv' => $sv));
            if ($subscribed) {
                //get user last send mail
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $userLastMail = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $key,
                            'name' => 'lastUserSendMail',
                            'module' => 'IWmain_cron',
                            'sv' => $sv));
                //calc user news
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'news', array('uid' => $key,
                    'sv' => $sv));
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $newsValue = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $key,
                            'name' => 'news',
                            'module' => 'IWmain_block_news',
                            'sv' => $sv,
                            'nult' => true));
                
                // Now find out if there are any news in the message or if it's just HTML comments
                $comments = array('<!---ta--->', '<!---/ta--->',
                                  '<!---ag--->', '<!---/ag--->',
                                  '<!---me--->', '<!---/me--->',
                                  '<!---fo--->', '<!---/fo--->',
                                  '<!---fu--->', '<!---/fu--->',
                                  '<!---ch--->', '<!---/ch--->',
                                  '<!---fr--->', '<!---/fr--->');
                
                // Using a temporary value for not loosing data
                $temp = $newsValue;
                foreach ($comments as $comment) {
                    $temp = str_replace($comment, '', $temp);
                }
                $temp = str_replace("\n", '', $temp);
                
                // If $temp is empty, then $newsValue doesn't contain any worth content
                if (!empty($temp)) {
                    $newsValueText = '<div>' . ModUtil::getVar('IWmain', 'cronHeaderText') . '</div>';
                    $newsValueText .= '<table width="300">' . $newsValue . '</table>';
                    $newsValueText .= '<div>' . ModUtil::getVar('IWmain', 'cronFooterText') . '</div>';

                    $sendResult = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => $value,
                                'toaddress' => $value,
                                'subject' => $subject,
                                'body' => $newsValueText,
                                'html' => 1));
                    if ($sendResult) {
                        $ok++;
                    } else {
                        $ko++;
                    }
                    if ($ko >= 5 && $ok == 0) {
                        $returnValue = '-1';
                        $msg .= __('The 5 firsts tries of cron execution has failed. The cron execution has been aborted.', $dom);
                        $result = array('value' => $returnValue,
                            'msg' => $msg);
                        return $result;
                    }
                }
            }
        } else {
            $msg = '<div>' . __('Your site have users without email address. You should correct this.', $dom) . '</div>';
        }
    }
    if ($ko == 0 && $ok == 0) {
        $returnValue = '1';
        $msg .= __('There have not found emails to send.', $dom);
    } elseif ($ko == 0 && $ok != 0) {
        $returnValue = '1';
        $msg .= __('The information about the new things to see has been send to users via email.', $dom) . ' ' . __('The number of send emails has been of ', $dom) . ' ' . $ok . '.';
    } elseif ($ko != 0 && $ok != 0) {
        $returnValue = '0';
        $msg .= __('Not has been possible to send all the resume messages with the new things to see to users. Some of them have failed.', $dom) . ' ' . $ko . ' ' . __('of', $dom) . ' ' . $ok . '. ';
    } else {
        $returnValue = '-1';
        $msg .= __('All the tries of sending messages have failed. The number of tries has been of', $dom) . ' ' . $ko . '.';
    }
    $result = array('value' => $returnValue,
        'msg' => $msg);
    return $result;
}