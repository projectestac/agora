<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (isset($_POST['option']) and $_POST['option'] == translate('Yes')) {
	echo '<form action="./install.php" method="POST">';
	echo '<input type="hidden" name="step" value="3" />';
	echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';
	
	echo translate('Do you want to install WIRIS Quizzes in your moodle?'), '<br /><br />';
	echo '<input type="submit" name="option" value="', utf8_htmlentities(translate('Yes')), '" /> <input type="submit" name="option" value="', utf8_htmlentities(translate('No')), '" /><br />';
	
	echo '<div id="information">';
	
	echo utf8_htmlentities(translate('If you click on "Yes"')), ':';
	echo '<ul>';
	echo '<li>./questiontypes/ ', utf8_htmlentities(translate('will be copyed on')), ' ../question/type/</li>';
	echo '<li>../lib/questionlib.php ', utf8_htmlentities(translate('will be backuped to')), ' ../lib/questionlib.php.old</li>';
	echo '<li>../lib/questionlib.php ', utf8_htmlentities(translate('will be modified')), '</li>';
	echo '<li>../question/question.php ', utf8_htmlentities(translate('will be backuped to')), ' ../question/question.php.old</li>';
	echo '<li>../question/question.php ', utf8_htmlentities(translate('will be modified')), '</li>';
	//echo '<li>./lang/ ', utf8_htmlentities(translate('will be copyed on')), utf8_htmlentities(translate(' your language folder.'));
	echo '</ul>';
	
	echo utf8_htmlentities(translate('If you click no "No"')), ':';
	echo '<ul>';
	echo '<li>', utf8_htmlentities(translate('Manual installation will be able')), '</li>';
	echo '</ul>';
	
	echo '</div>';
}
else {
	echo errorMessage();
}
?>