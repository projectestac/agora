<?php
	// ----------------------------------------------------------------------------
	// markItUp! Universal MarkUp Engine, JQuery plugin
	// Add-on TinyUrl
	// Dual licensed under the MIT and GPL licenses.
	// ----------------------------------------------------------------------------
	// Copyright (C) 2008 Jay Salvat
	// http://markitup.jaysalvat.com/
	// ----------------------------------------------------------------------------

	$url = stripslashes($_POST["url"]);

	if($url != "" && substr($url, 0, 7) == "http://") {
	    $tinyurl = @file_get_contents("http://tinyurl.com/api-create.php?url=".$url); 
		$tinyurl = (!$tinyurl) ? $url : $tinyurl;
	} else {
		$tinyurl = $url;
	}
	
	echo trim($tinyurl);
?>
