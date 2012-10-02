<?PHP 
	header('Content-Type: text/xml; charset=utf-8');
/////////////////////////////////////////////////////////////////////////////////
///  EOICampus login service
///  Author: Sara Arjona Tellez (sara.arjona@gmail.com)
/////////////////////////////////////////////////////////////////////////////////

  require_once("../../../config.php");
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>';
  if ($user=get_record('user', 'username', $username, 'password', $password)){
  	$courseid = $_REQUEST['courseid'];
  	echo "<login success=\"yes\" username=\"$username\" password=\"$password\" firstname=\"$user->firstname\" lastname=\"$user->lastname\" email=\"$user->email\" courseid=\"$courseid\" />";  
  }else{
	  echo "<login success=\"no\" username=\"$username\"/>";  
  }
	
?>
