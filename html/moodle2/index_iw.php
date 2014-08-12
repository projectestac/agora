<?php
//XTEC ************ FITXER AFEGIT - Intraweb synchronization
//2012.06.01 @sarjona

require_once("config.php");

$parm = required_param('parm', PARAM_RAW);
$check = required_param('check', PARAM_TEXT);

$url = explode("|", $parm);

$username = trim(textlib::strtolower($url[0]));
$password = $url[1];
$home= $url[2].'index.php?module=Users&func=loginscreen';
$id_pn = $url[3] ;

if (empty($username)){
	header ("Location : $home") ;
	exit;
}

/*
$secureValue = $url[5] ;
if(!isset($_COOKIE['gotoMoodle']) || md5($_COOKIE['gotoMoodle']) != $secureValue){
	echo "...Illegal usage...";
	echo $home ;
	exit;
}
*/
setcookie('gotoMoodle','','0','/');

if ($check != md5($parm)){
	//echo "...Illegal usage...";
	header ("Location : $home") ;
	exit;
}

// here begin the validation into Moodle

$user = authenticate_user_login($username, $password);

if($user){
	$USER = $user;
}

if (isloggedin() && !isguestuser()) {      // Nothing to do
    if (isset($SESSION->wantsurl) and (strpos($SESSION->wantsurl, $CFG->wwwroot) === 0)) {
        $urltogo = $SESSION->wantsurl;    /// Because it's an address in this site
        unset($SESSION->wantsurl);
    } else {
        $urltogo = $CFG->wwwroot.'/';      /// Go to the standard home page
		if ($id_pn > 0){
			$urltogo .= 'course/view.php?id='.$id_pn; // Go to the course
		}
        unset($SESSION->wantsurl);         /// Just in case
    }
    redirect($urltogo);
}

/// We need to show a login form

/// First, let's remember where the user was trying to get to before they got here
if (empty($SESSION->wantsurl)) {
	$SESSION->wantsurl = (array_key_exists('HTTP_REFERER',$_SERVER) &&
	$_SERVER["HTTP_REFERER"] != $CFG->wwwroot &&
	$_SERVER["HTTP_REFERER"] != $CFG->wwwroot.'/' &&
	$_SERVER["HTTP_REFERER"] != $CFG->httpswwwroot.'/login/' &&
	$_SERVER["HTTP_REFERER"] != $CFG->httpswwwroot.'/login/index.php')? $_SERVER["HTTP_REFERER"] : NULL;
}

$loginurl = $CFG->wwwroot.'/login/index.php';

redirect($loginurl.'?username='.$username);
