<?php
  require_once('../config.php');
  require_once('../version.php');
?>

<html>
<head>
<title>Tests for WIRIS Plug-in</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<p> The Moodle release you are using is: <strong> <?php echo $release; ?> </strong>
<span style="color: red;">&nbsp;
<?php
 $rel=explode(".", $release);
 $num=substr($rel[1],0,1);
 if ($num<5) {
        echo "Wiris plug-in requires Moodle 1.5 or later (currently using version $release)";
    }
?>
</span>
</p>
<p> Your php version: <strong> <?php echo phpversion(); ?> </strong>
<span style="color: red;">&nbsp;
<?php
    if (version_compare(phpversion(), "4.3.0") < 0) {
        $phpversion = phpversion();
        echo "Wiris plug-in requires PHP 4.3.0 or later (currently using version $phpversion)";
    }
?>
</span>
</p>
<p> Your database charset is: <strong> <?php echo $charset=get_string('thischarset'); ?> </strong> 
<span style="color: red;">&nbsp;
<?php
    if (strtolower($charset) != "utf-8") {
        echo "Wiris plug-in requires UTF-8 for correct formula rendering (currently using $charset)";
    }
?>
</span>
</p>
<strong> Testing the database charset support</strong> <br>You should see an alpha in both cases 
<?php
	//$testchar=$_POST["testchar"];

	$testchar="%CE%B1";
	$testchar=urldecode($testchar);
	
	echo "<br>";
	
	echo " Original (";
	echo strlen($testchar);
	echo " bytes) hex: ";
	
	echo bin2hex($testchar);
	echo ", char: ";
	echo $testchar;
	
	$md5="testtroubleshoting";
	if($testchar)
	{
		$wrscache = new object;
    	$wrscache->rawtext = $testchar;
    	$wrscache->timemodified = time();
       	$wrscache->filter = 'wiris';
      	$wrscache->version = 1;
      	$wrscache->md5key = $md5;
    	insert_record("cache_filters",$wrscache, false);
    	
    	$wrscache = get_record("cache_filters","filter","wiris", "md5key", $md5 );
    	$testchar = $wrscache->rawtext;      
    	
		delete_records("cache_filters","filter","wiris", "md5key", $md5 );

		echo "<br>";
	
		echo " After passing through the database (";
		echo strlen($testchar);
		echo " bytes) hex: ";
		
		echo bin2hex($testchar);
		echo ", char: ";
		echo $testchar;
	}
?>
</body>
</html>