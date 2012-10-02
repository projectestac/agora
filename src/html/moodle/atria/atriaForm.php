<?php

$url = base64_decode($_GET['url']);
$id = intval($_GET['id']);
require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');
//empresa + codigo centro + tipo eva
?>

<html>
	<head></head>
	<body onload="document.getElementById('keyform').submit();">
		<form id="keyform" method="POST" action="<?php echo $CFG->atriaFormUrl; ?>">
			<input type="hidden" name="CodiEntitat" value="<?php echo $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType; ?>" />
			<input type="hidden" name="CodiUserExt" value="<?php echo $id; ?>" />
			<input type="hidden" name="UrlDestinacioExt" value="<?php echo $url; ?>" />
		</form>
	</body>
</html>