<?php
	header('Content-Type: text/xml; charset=utf-8');
/////////////////////////////////////////////////////////////////////////////////
///  EOICampus login service
///  Author: Sara Arjona Tellez (sara.arjona@gmail.com)
/////////////////////////////////////////////////////////////////////////////////

  require_once("../../../config.php");
  require_once("../lib.php");
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>';
  if ($user=$DB->get_record('user', array('username' => $username, 'password' => $password))){
  	$courseid = $_REQUEST['courseid'];
	//$firstname=eoicampus_normaliza($user->firstname);
	//$lastname=eoicampus_normaliza($user->lastname);
	$firstname=$user->firstname;
	$lastname=$user->lastname;
  	echo "<login success=\"yes\" username=\"$username\" password=\"$password\" firstname=\"".$firstname."\" lastname=\"".$lastname."\" email=\"$user->email\" courseid=\"$courseid\" />";
  }else{
	  echo "<login success=\"no\" username=\"$username\"/>";
  }

/** TODO: Check that the user is enroled in specified courseid and return also its role in this course **/
