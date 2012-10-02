		<div id="center">
		<?php
		if (!defined('SECURITY_CONSTANT')) exit;

		$toInclude = '0';
		if (isset($_POST['step'])) {
			$toInclude = './install/pages/' . basename($_POST['step']) . '.php';
		}
		if (is_file($toInclude)) {
			include($toInclude);
		}
		else {
			include('./install/pages/0.php');
		}
		?>
		</div>
