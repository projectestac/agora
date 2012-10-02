<?php
header("Content-Type: application/vnd.ms-excel;charset=iso-8859-1");
header("Content-Disposition: attachment; filename=rgrade_".time().".csv");
header("Pragma: no-cache");
header("Expires: 0");

if (get_magic_quotes_gpc()) {
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) {
			unset($process[$key][$k]);
			if (is_array($v)) {
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}

$table_utf8 = $_REQUEST['table'];

// MicrosoftWord
echo utf8_decode($table_utf8);