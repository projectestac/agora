<?php
if(version_compare(PHP_VERSION, '5.1.0', '<')) {
    exit('Your current PHP version is: ' . PHP_VERSION . '. WIRIS quizzes needs version 5.1.0 or later');
}
;

$error_reporting_level = error_reporting();
require_once dirname(__FILE__).'/lib/php/Boot.class.php';
require_once dirname(__FILE__).'/lib/com/wiris/system/CallWrapper.class.php';
require_once dirname(__FILE__).'/lib/com/wiris/quizzes/api/QuizzesBuilder.class.php';
require_once dirname(__FILE__).'/lib/com/wiris/quizzes/wrap/QuizzesBuilderWrap.class.php';
com_wiris_system_CallWrapper::getInstance()->setErrorReporting($error_reporting_level);
com_wiris_system_CallWrapper::getInstance()->phpStop();
?>