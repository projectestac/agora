<div class="box" >
    <div id="center">
		<?php
		if (!defined('SECURITY_CONSTANT')) exit;

		if (isset($CFG->wirisversion)) {
			if (checkVersion($CFG->wirisversion, '2.1.25')) {
				$toInclude = './install/pages/';
				
				if (isset($_POST['step'])) {
					$toInclude .= basename($_POST['step']) . '.php';
				}
				else if (isset($_GET['db'])) {
					$toInclude .= 'db.php';
				}
				
				if (is_file($toInclude)) {
					include($toInclude);
				}
				else {
					include('./install/pages/0.php');
				}
			}
			else {
				echo utf8_htmlentities(translate('WIRIS Quizzes requires Plugin WIRIS 2.1.25 or greater. Your current Plugin WIRIS version is ') . $CFG->wirisversion . translate('. You can install it from')) . ' <a href="http://www.wiris.com/plugins/docs/moodle/">' . utf8_htmlentities(translate('here')) . '</a>.';
			}
		}
		else {
			echo utf8_htmlentities(translate('You must install Plugin WIRIS before install WIRIS Quizzes. You can install it from')) . ' <a href="http://www.wiris.com/plugins/docs/moodle/">' . utf8_htmlentities(translate('here')) . '</a>.';
		}
		?>
		</div>
</div>
