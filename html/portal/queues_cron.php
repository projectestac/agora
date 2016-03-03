<?php

define('CLI_SCRIPT', true);

// Init zikula engine
include 'lib/bootstrap.php';
$core->init();

ModUtil::load('Agoraportal', 'admin');
require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

// Set a limit of time between executions
$lastCron = Agora_Queues::get_last_execution();
if ($lastCron > time()- 4 * 60) { // Every 4 minutes
    print __('The cron has been executed too recently');
    exit;
}

$result = Agora_Queues::execute_pending_operations();

$executeTime = date('M, d Y - H.i');
if (!$lastCron) {
    $lastCronTime = __('Never');
} else {
    $lastCronTime = date('M, d Y - H.i', $lastCron);
}

$response = '<div>' . __('Last cron execution') . ': ' . $executeTime . '</div>';
$response .= '<div>' . __('Last successful cron execution') . ': ' . $lastCronTime . '</div>';
$response .= '<div>&nbsp;</div>';
$response .= '<div>' . __('Cron results') . ': ';
if ($result) {
    $response .= '<span style="color: green;">' . __('It has been executed correctly') . '</span></div>';
} else {
    $response .= '<span style="color: orange;">' . __('It has been executed incorrectly') . '</span></div>';
}

Agora_Queues::set_last_execution_now($response);

echo $response;

System::shutdown();
