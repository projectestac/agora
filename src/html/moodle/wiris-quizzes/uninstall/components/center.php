<div id="center">
<?php
	if (!defined('SECURITY_CONSTANT')) exit;
	$toInclude = './uninstall/pages/';
		
	if (isset($_POST['step'])) {
		 
		$toInclude .= $_POST['step'] . '.php';
		
	}				
	if (is_file($toInclude)) {
		include($toInclude);
	}
	else {
		include('./uninstall/pages/0.php');
	}
?>
</div>
