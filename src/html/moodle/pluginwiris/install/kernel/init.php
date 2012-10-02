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

// Loading libraries
$directory = opendir('./install/kernel/lib');
while ($file = readdir($directory)) {
	if (is_file('./install/kernel/lib/' . $file)) {
		include('./install/kernel/lib/' . $file);
	}
}
closedir($directory);

// Loading language
global $TRANSLATION;
$TRANSLATION = array();
$shortLanguageName = (isset($_POST['language'])) ? $_POST['language'] : 'en';
$toInclude = './install/lang/' . basename($shortLanguageName) . '.php';
if (is_file($toInclude)) {
	include($toInclude);
}
?>