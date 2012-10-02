<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (isset($_POST['option']) and ($_POST['option'] == translate('Yes'))) {

	echo '<div align="left"><br /><br />';
	echo utf8_htmlentities(translate('Please choose the actions to be performed:'));
	echo '<br />';
	echo '<form action=./uninstall.php method="POST">';
	echo '<input type="hidden" name="step" value="3" />';
	echo '<ul><li>';
	echo '<input type="checkbox" name="uninstall" value="true" checked="true" /> '.utf8_htmlentities(translate('Uninstall WIRIS Quizzes.'));
	echo '</li><li>';
	echo '<input type="checkbox" name="deletefiles" value="true"/> '.utf8_htmlentities(translate('Delete WIRIS Quizzes files.'));
	echo '</li><li>';
	echo '<input type="checkbox" name="deletetables" value="true"/> '.utf8_htmlentities(translate('Delete WIRIS Quizzes tables in site database.'));
	echo '</li></ul>';
	echo '<div align="center">';
	echo '<input type="submit" value="Continue" />';
	echo '</div>';
	echo '</form>';
	echo '</div>';
	echo '<br /><br />';
	echo '<div id="information">';
	echo utf8_htmlentities(translate('If you check...'));
	echo '<ul><li>';
	echo '<i>'.utf8_htmlentities(translate('Uninstall WIRIS Quizzes.')).'</i>: '.utf8_htmlentities(translate('Moodle files patched during the installation will be restored, WIRIS Quizzes question type files will be deleted and WIRIS Quizzes language files will be deleted too. The system will be ready for another clean installation of WIRIS Quizzes'));
	echo '</li><li>';
	echo '<i>'.utf8_htmlentities(translate('Delete WIRIS Quizzes files.')).'</i>: '.utf8_htmlentities(translate('WIRIS Quizzes files (including installation ones) will be permanently deleted.')); 
	echo '</li><li>';
	echo '<i>' . utf8_htmlentities(translate('Delete WIRIS Quizzes tables in site database.')) . '</i>: ' . utf8_htmlentities(translate('WIRIS Quizzes database entries will be removed. You will loose all WIRIS Quizzes data created.'));
	echo '</li></ul>';
	
} else {
	redirect($CFG->wwwroot);
}
?>