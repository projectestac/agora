<?PHP // $Id: qvtime.php,v 1.0 2008/06/03 19:28:34 allastarri Exp $

function addTime($time1, $time2){//Albert
	$h1 = (int)substr($time1,0,2);
	$m1 = (int)substr($time1,3,5);
	$s1 = (int)substr($time1,6,8);
	$h2 = (int)substr($time2,0,2);
	$m2 = (int)substr($time2,3,5);
	$s2 = (int)substr($time2,6,8);
	
	$s3 = $s1+$s2;
	$m3 = $m1+$m2;
	$h3 = $h1+$h2;
	
	if ($s3>59){
		$s3=$s3-60;
		$m3=$m3+1;
	}
	if ($m3>59){
		$m3=$m3-60;
		$h3=$h3+1;
	}
	
	$s4 = "";
	if ($s3<10){
		$s4 = "0".$s3;
	} else {
		$s4 = $s3."";
	}
	$m4 = "";
	if ($m3<10){
		$m4 = "0".$m3;
	} else {
		$m4 = $m3."";
	}
	$h4 = "";
	if ($h3<10){
		$h4 = "0".$h3;
	} else {
		$h4 = $h3."";
	}

	return $h4.":".$m4.":".$s4;
}

function getDuration($time){
	$y = 0;
	$mt = 0;
	$d = 0;
	$h = (int)substr($time,0,2);
	$m = (int)substr($time,3,2);
	$s = (int)substr($time,6,2);
	if ($h>23){
		$d = (int)$h/24;
		$h = $h-($d*24);
	}
	if ($d>30){
		$mt = (int)$d/30;
		$d = $d-($mt*30);
	}
	if ($mt>11){
		$y = (int)$mt/12;
		$mt = $mt-($y*12);
	}
	return 'P'.$y.'Y'.$mt.'M'.$d.'DT'.$h.'H'.$m.'M'.$s."S";
}





?>
