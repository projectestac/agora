<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (isset($_POST['restore'])) {
	if (full_remove('../filter/wiris') and copy('../lib/weblib.php.old', '../lib/weblib.php') and unlink('./install.php')) {
		echo translate('System restored. Please, delete pluginwiris directory manually now.'), ' <a href="..">', translate('Go to my moodle'), '</a>.<br /><br />';
		echo errorMessage();
	}
	else {
		echo translate("Plugin WIRIS Installer hasn't write permisions on"), ' ../filter/wiris or ../lib/weblib.php or ./install.php<br /><br />';
		echo errorMessage();
	}
}

?>