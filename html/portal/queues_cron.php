<?php


define('CLI_SCRIPT', true);

// init zikula engine
include 'lib/bootstrap.php';
$core->init();

ModUtil::load('Agoraportal', 'admin');
require_once('modules/Agoraportal/lib/Agoraportal/Queues.php');

$langcode = ModUtil::getVar('ZConfig', 'language_i18n');

ZLanguage::setLocale($langcode);
ZLanguage::bindCoreDomain();

$dom = ZLanguage::getModuleDomain('Agoraportal');

$lastCron = Agora_Queues::get_last_execution();
if ($lastCron > time()- 4 * 60) { // Every 4 minutes
    if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
        LogUtil::registerError(__('The cron has been executed too recenty', $dom));
        return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
    } else {
        print __('The cron has been executed too recenty', $dom);
        exit;
    }
}

$result = Agora_Queues::execute_pending_operations();

$executeTime = date('M, d Y - H.i');
if (!$lastCron) {
    $lastCronTime = __('Never', $dom);
} else {
    $lastCronTime = date('M, d Y - H.i', $lastCron);
}

$response = '<div>' . __('Last cron execution', $dom) . ': ' . $executeTime . '</div>';
$response .= '<div>' . __('Last successful cron execution', $dom) . ': ' . $lastCronTime . '</div>';
$response .= '<div>&nbsp;</div>';
$response .= '<div>' . __('Cron results', $dom) . ': ';
if ($result) {
    $response .= '<span style="color: green;">' . __('It has executed correctly', $dom) . '</span></div>';
} else {
    $response .= '<span style="color: orange;">' . __('It has worked incorrectly', $dom) . '</span></div>';
}

Agora_Queues::set_last_execution_now($response);

if (isset($_REQUEST['return']) && $_REQUEST['return'] == 1) {
    return System::redirect(ModUtil::url('IWmain', 'admin', 'main'));
} else {
    print $response;
}

System::shutdown();
