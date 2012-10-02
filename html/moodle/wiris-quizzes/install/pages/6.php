<?php

if (!defined('SECURITY_CONSTANT')) exit;

	echo '<br /><br />';
	echo '<b>'.utf8_htmlentities(translate('Thanks for use WIRIS Quizzes!')),'<br /><br /></b>';
	echo '<div align="left"><ul><li>';
	echo utf8_htmlentities(translate('See the ')), '<a href="http://www.wiris.com/quizzes/docs/manual">', utf8_htmlentities(translate('user manual')), '</a>', utf8_htmlentities(translate(' to know all the features of WIRIS Quizzes.'));
	echo '</li><li>';
	echo utf8_htmlentities(translate('If you ever want to uninstall WIRIS Quizzes, see the')), ' <a href="http://www.wiris.com/quizzes/docs/install/uninstall">', utf8_htmlentities(translate('uninstall documentation')), '</a>.';
	echo '</li></ul>';
	echo '</div>';
	echo '<a href="..">', utf8_htmlentities(translate('Go to my moodle')), '</a>';

?>