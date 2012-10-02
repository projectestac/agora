<?php
if (!defined('SECURITY_CONSTANT')) exit;

if ($_POST['option'] == translate('Yes')) {
	echo translate('Thanks for use Plugin WIRIS. If you want to uninstall Plugin WIRIS, click'), ' <a href="http://www.wiris.com/download/moodle/uninstall.html">', translate('here'), '</a>.<br /><br />';
	echo '<a href="..">', translate('Go to my moodle'), '</a>';
}
else {
	echo '<form action="./install.php" method="POST">';
	echo '<input type="hidden" name="step" value="7" />';
	echo '<input type="hidden" name="language" value="', addSlashesOnDoubleQuotes($shortLanguageName), '" />';
	
	echo translate("Please, if Plugin WIRIS doesn't work, report to info@mathsformore.com."), '<br /><br />';
	echo '<input type="submit" name="restore" value="', addSlashesOnDoubleQuotes(translate('Restore my system as if Plugin WIRIS had never been installed')), '" /><br /><br />';
	echo errorMessage();
	echo '<div id="information">';
	echo '<ul>';
	echo '<li>../lib/weblib.php.old ', translate('will be restored to'), '../lib/weblib.php</li>';
	echo '<li>../filter/wiris ', translate('will be deleted.'), '</li>';
	echo '<li>./install.php ', translate('will be deleted.'), '</li>';
	echo '</ul>';
	echo '</div>';
	
	echo '</form>';
}
?>