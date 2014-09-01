<?php
if(version_compare(PHP_VERSION, '5.1.0', '<')) {
    exit('Your current PHP version is: ' . PHP_VERSION . '. WIRIS quizzes needs version 5.1.0 or later');
}
;
if (!class_exists('com_wiris_system_CallWrapper')) {
	require_once dirname(__FILE__).'/lib/com/wiris/system/CallWrapper.class.php';
}
com_wiris_system_CallWrapper::getInstance()->init(dirname(__FILE__));
require_once dirname(__FILE__).'/lib/com/wiris/quizzes/api/QuizzesBuilder.class.php';
require_once dirname(__FILE__).'/lib/com/wiris/quizzes/wrap/QuizzesBuilderWrap.class.php';

?>