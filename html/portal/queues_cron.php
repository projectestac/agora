<?php

// init zikula engine
include 'lib/bootstrap.php';
$core->init();

ModUtil::load('Agoraportal', 'admin');

$langcode = ModUtil::getVar('ZConfig', 'language_i18n');

ZLanguage::setLocale($langcode);
ZLanguage::bindCoreDomain();

$dom = ZLanguage::getModuleDomain('Agoraportal');
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
$lastCronSuccessfull = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => -100,
            'name' => 'lastCronSuccessfull',
            'module' => 'Queues_cron',
            'sv' => $sv));
if ($lastCronSuccessfull > time()- 5 * 60) { // Every 5 minutes
    if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
        LogUtil::registerError(__('The cron has been executed too recenty', $dom));
        return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
    } else {
        print __('The cron has been executed too recenty', $dom);
        exit;
    }
}

$result = ModUtil::apiFunc('Agoraportal', 'admin', 'executePendingOperations');


$executeTime = date('M, d Y - H.i', time());
$lastCronSuccessfullTime = date('M, d Y - H.i', $lastCronSuccessfull);

if ($lastCronSuccessfullTime == '')
    $lastCronSuccessfullTime = __('Never', $dom);

$cronResponse .= '<div>' . __('Last cron execution', $dom) . ': ' . $executeTime . '</div>';
$cronResponse .= '<div>' . __('Last successful cron execution', $dom) . ': ' . $lastCronSuccessfullTime . '</div>';
$cronResponse .= '<div>&nbsp;</div>';
$cronResponse .= '<div>' . __('Cron results', $dom) . ': ';
if ($result == 1) {
    $cronResponse .= '<span style="color: green;">' . __('It has executed correctly', $dom) . '</span></div>';
} elseif ($result == 0) {
    $cronResponse .= '<span style="color: orange;">' . __('It has worked incorrectly', $dom) . '</span></div>';
} else {
    $cronResponse .= '<span style="color: red;">' . __('It has not worked', $dom) . '</span></div>';
}
if ($result == 1 || $result == 0) {
    $time = time();
    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
        'name' => 'lastCronSuccessfull',
        'module' => 'Queues_cron',
        'lifetime' => 1000 * 24 * 60 * 60,
        'sv' => $sv,
        'value' => time()));
}
//-100 really is not a user but represents the system user
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
    'name' => 'cronResponse',
    'module' => 'Queues_cron',
    'lifetime' => 1000 * 24 * 60 * 60,
    'sv' => $sv,
    'value' => $cronResponse));
$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
    'name' => 'lastCron',
    'module' => 'Queues_cron',
    'lifetime' => 1000 * 24 * 60 * 60,
    'sv' => $sv,
    'value' => time()));
if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
    return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
} else {
    print $cronResponse;
}

System::shutdown();
