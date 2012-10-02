<?php
if (!defined('SECURITY_CONSTANT')) exit;

echo '<form action="./uninstall.php" method="POST">';					
echo '<input type="hidden" name="step" value="2" />';
echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';

echo utf8_htmlentities(translate('Are you absolutely sure to uninstall WIRIS quizzes?')), '<br /><br />';
echo '<input type="submit" name="option" value="', utf8_htmlentities(translate('Yes')), '" /> <input type="submit" name="option" value="', utf8_htmlentities(translate('No')), '" /></p>';
echo '</form>';
echo '<div id="information">';
echo 'If you click yes...';
echo '<ul><li>'.utf8_htmlentities(translate('All questions and quizzes in your site which use WIRIS Quizzes features will stop working.')).' </li>';
echo '<li>'.utf8_htmlentities(translate('All questions and quizzes such that don\'t use any WIRIS Quizzes feature will still work.')).' </li></ul>';
echo '</div>';
?>