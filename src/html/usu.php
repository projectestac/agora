<?php
include_once("eines/xtecAPI.php");
include_once("eines/config.php");


function getDNSfromUSU($usu)
{
	if($con=opendb()){
		$sql="SELECT p.school_dns 
			FROM pre_schools p, schools s
			WHERE p.school_code=s.code(+) AND p.service = s.actived_service(+) AND s.school_id = $usu";
		$stmt = oci_parse($con, $sql);
		if(!oci_execute($stmt, OCI_DEFAULT)){
			return false;
		}
		oci_fetch($stmt);
	}
	oci_close($con);
	return oci_result($stmt, "SCHOOL_DNS");
}
if($dns = getDNSfromUSU($_GET["id"])){
	if($_GET["service"] == "intranet"){
		header( 'Location: '.$agora['server']['html'].$dns.'/intranet/' ) ;	
	}
	else{
		header( 'Location: '.$agora['server']['html'].$dns.'/moodle/' ) ;
	}
}
else{
	print "No s'ha trobat";
}


?>
