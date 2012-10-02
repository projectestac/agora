<?php
if (!defined('SECURITY_CONSTANT')) exit;

// Loading constants and functions
$directory = opendir('./install/kernel/miscellaneus');
while ($file = readdir($directory)) {
	if (is_file('./install/kernel/miscellaneus/' . $file)) {
		include('./install/kernel/miscellaneus/' . $file);
	}
}
closedir($directory);

error_reporting(ERROR_DISPLAY_LEVEL);
set_magic_quotes_runtime(0);
if (get_magic_quotes_gpc() == 1) {
	stripSlashesInRequestVariables();
}

// Loading language
global $TRANSLATION;
$TRANSLATION = array();
$shortLanguageName = (isset($_POST['language'])) ? $_POST['language'] : 'en';
$toInclude = './install/lang/' . basename($shortLanguageName) . '.php';
if (is_file($toInclude)) {
	include($toInclude);
}

//include pluginwiris
if(@is_readable('../filter/wiris/wrs_config.php')){
  require_once('../filter/wiris/wrs_config.php');
}else if(@is_readable('../pluginwiris/wrs_config.php')){//deprecated. version <2.3
  require_once('../pluginwiris/wrs_config.php');
}

?>