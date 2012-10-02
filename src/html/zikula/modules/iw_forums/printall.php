<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Printer</title>
</head>

<body>
<?php
	//Llegim el fitxer dels missatges del fòrum
	$fitxer='../../documents/forums/'.$_REQUEST['printer'].'.prt';
	if (is_file($fitxer)) {
		$f=fopen($fitxer,'r');
		print fread($f, filesize($fitxer));
		fclose($f);
		unlink($fitxer);
	}else{
		print $_REQUEST['error'];
	}
?>
<script>
	print();
</script>
</body>
</html>