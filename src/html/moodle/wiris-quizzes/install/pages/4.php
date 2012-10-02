<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (parseConfig() == NO_WRITE_PERMISION) {
	echo utf8_htmlentities(translate('WIRIS Quizzes installer hasn\'t write permisions on')), ' ./wrsqz_config.php <br />';
	echo '<ul><li>',utf8_htmlentities(translate('Copy the following PHP file and paste to')), ' <b>wiris-quizzes/wrsqz_config.php</b>','</li></ul>';
	echo '<div id="information">';
	echo str_replace("\n","<br />",utf8_htmlentities(parseConfig(true)));
	echo '</div>';
	echo '<br />';
	echo '<form action="./install.php" method="POST">';
	echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';
	echo '<input type="hidden" name="step" value="5">';
	echo '<input type="submit" value="Continue" />';
	echo '</form>';
	echo '<br /><br /><hr>';
	echo errorMessage('conf');
}
else {
	echo '<div align="left"><br /><ul><li><i>wrsqz_config.php</i> ',utf8_htmlentities(translate('successfully created.')),'</li></ul></div>';
	include('./install/pages/5.php');
}
?>