<?php
define('SECURITY_CONSTANT', 1);

include('../config.php');

//XTEC ************ MODIFICAT - Remove require login restriction
//2011.09.27 - sarjona
$password = isset($_GET['password'])?$_GET['password']:'';
$error = (md5($password) != $agora['config']['xtecadmin']);

if ($error){
    $error = false;
    // Password for anonymous access is not correct; try if current user is admin
    if (function_exists('has_capability')) {
            if (!has_capability('moodle/legacy:admin', get_context_instance(CONTEXT_SYSTEM))) {
                    $error = true;
            }
    }
    else if (!function_exists('isadmin') or !isadmin($USER->id)) {
            $error = true;
    }    
}


//************ ORIGINAL
/*
require_login();
$error = false; 

if (function_exists('has_capability')) {
	if (!has_capability('moodle/legacy:admin', get_context_instance(CONTEXT_SYSTEM))) {
		$error = true;
	}
}
else if (!function_exists('isadmin') or !isadmin($USER->id)) {
	$error = true;
}
*/
//************ FI    

if (!$error) {
	include('./install/kernel/init.php');//include wiris plugin here
	include('./install/components/header.php');
	include('./install/pages/db.php');
	include('./install/components/footer.php');
}
else {
	redirect($CFG->wwwroot);
}

?>