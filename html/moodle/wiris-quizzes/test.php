<?php
require_once('../config.php');
require_once($CFG->dirroot . '/lib/ddllib.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/functions.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/install/kernel/miscellaneus/functions.php');

echo '<html>';
echo '	<head>';
echo '		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">';
echo '		<title>Test page for WIRIS Quizzes</title>';
echo '		<style type="text/css">';
echo '			body {';
echo '				background-color: #E0E0E0;';
echo '			}';
echo '		</style>';
echo '	</head>';
echo '	<body>';
echo '		<div align="center"><h1>Welcome to WIRIS Quizzes TEST</h1></div><br /><br />';
include($CFG->dirroot . '/wiris-quizzes/version.php');
echo '<br />';
echo '<br />';
echo '		<table border="1">';
echo '		<tr><td>TEST</td><td>PASS</td><td>MESSAGE</td></tr>';
  wrsqz_testEnvironment();
	wrsqz_testPlugin();
	wrsqz_testMoodle();
	wrsqz_testInstalled();
  wrsqz_testEnabled();
	wrsqz_testDB();
	wrsqz_testServer();
	wrsqz_testGetVars();
echo '		</table>';
echo '	</body>';


function wrsqz_testEnvironment(){
    global $CFG;
    require_once($CFG->dirroot . '/lib/setuplib.php');

    $unicodedb=setup_is_unicodedb();
    if($unicodedb){
        $message='Your Database has UNICODE charset.';
    }else{
        $message='Quizzes uses UNICODE characters and will not work. Please migrate your database to a UNICODE charset.';
    }
    printRow('Database', $unicodedb, $message);

    $mbstring=extension_loaded('mbstring');
    if($mbstring){
        $message='Multibyte PHP extension is loaded.';
    }else{
        $message='Quizzes uses Multibyte PHP extension but it is\'t installed or loaded. Please check your php.ini file.';
    }
    printRow('mbstring',$mbstring,$message);

    if($mbstring){
        $mbInternalEncoding = mb_internal_encoding();
        $mbInternalEncodingChange = mb_internal_encoding('UTF-8');
        $mbInternalEncodingUTF8 = mb_internal_encoding();
        $message = 'Multibyte internal encoding by default: <b>'. $mbInternalEncoding .'</b>. Current encoding: <b>'.$mbInternalEncodingUTF8.'</b>.';
        printRow('mbstring encoding',$mbInternalEncodingUTF8=='UTF-8',$message);
    }

}

function wrsqz_testPlugin(){
//tests the existence of WIRIS Plugin
	global $CFG;
	if (wrsqz_includeWirisPlugin()){
		if(checkVersion($CFG->wirisversion, '2.1.25')){
			$ok = true;
			$message='A compatible version of WIRIS plugin is properly installed in this system. ';
		}else{
			$ok=false;
			$message='WIRIS quizzes requires WIRIS plugin 2.1.25 or greater. Your version is '. $CFG->wirisversion;
		}
    if(is_readable('../filter/wiris/test.php')){
      $message.='Check Plugin WIRIS at <a href="../filter/wiris/test.php">Plugin WIRIS test</a>.';
    }else if(is_readable('../pluginwiris/test.php')){
      $message.='Check Plugin WIRIS at <a href="../pluginwiris/test.php">Plugin WIRIS test</a>.';
    }else{
      $message.='WIRIS plugin test not found';
    }
	}else{
		$ok = false;
		$message='WIRIS plugin is not installed.';
	}
	printRow('WIRIS plugin',$ok,$message);
}
function wrsqz_testServer(){
//checks the connectivity to quizzes service (the servlet)
	global $CFG;
	$postdata = array(
		'function' => 'ping', //it is to prevent an Exception in server due to a (now fixed) bug
	);
	$result=wrsqz_openServlet($postdata);
	if($result == 'pong'){
		$ok = true;
		$message = 'Succesfully connected to WIRIS quizzes service in '. $CFG->wirisquizzes_serverhost . $CFG->wirisquizzes_serverpath . ' at port ' . $CFG->wirisquizzes_serverport . '.'; 
	}else{
		$ok=false;
		$message = 'Could not connect to WIRIS quizzes service in '. $CFG->wirisquizzes_serverhost . $CFG->wirisquizzes_serverpath . ' at port ' . $CFG->wirisquizzes_serverport . '.';
	}

  if($ok){
    //test grammar
    $gurl = getGrammarURL();
    $gram = '';
    if (!$CFG->wirisPHP4compatibility) {
      $gram = file_get_contents($gurl);
    }else{
      $fp = fsockopen($CFG->wirisquizzes_serverhost, $CFG->wirisquizzes_serverport, $errno, $errstr, 30);
      $path = substr($gurl, strlen('http://'.$CFG->wirisquizzes_serverhost.':'.$CFG->wirisquizzes_serverport));
      if (!$fp){
        $ok = false;
        $message = 'Could not retrieve grammar from '+$gurl;
      }else{
        $out = "GET $path HTTP/1.1\r\n";
        $out .= "Host: $CFG->wirisquizzes_serverhost \r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);
        while (!feof($fp)) $gram .= fgets($fp, 128);
        fclose($fp);
      }
    }
    if(empty($gram)){
      $ok = false;
      $message = 'Could not retrieve grammar from '+$gurl;
    }else{
      $message .= ' Grammar retrieved OK.';
    }
  }

	printRow('WIRIS quizzes service',$ok,$message);
  
}
function wrsqz_testMoodle(){
//checks the Moodle version
	include('../version.php');
	if($version<2006072010){
		$ok = false;
		$message = 'Your moodle version is '. substr($release,0,5) . ' but 1.6.1 is required.';
	}else{
		$ok = true;
		$message = 'Your moodle version is sufficiently new';
	}
	printRow('Moodle version',$ok,$message);
}
function wrsqz_testInstalled(){
//checks if WIRIS quizzes is properly installed: questiontype folders, patched files;
	global $CFG;
	$questiontypefolders = array(
		$CFG->dirroot . '/question/type/essaywiris',
		$CFG->dirroot . '/question/type/matchwiris',
		$CFG->dirroot . '/question/type/multichoicewiris',
		$CFG->dirroot . '/question/type/shortanswerwiris',
		$CFG->dirroot . '/question/type/truefalsewiris'
	);
	$ok=true;
	//check question type folders
	foreach($questiontypefolders as $folder){
		if(!is_dir($folder)){
			$ok=false;
			$message='One or more of WIRIS question type folders are missing. Please reinstall WIRIS Quizzes at <a href="install.php">wiris-quizzes/install.php</a>';
		}
	}
	
	if($ok){
		//check files patched
		$questionlib = file_get_contents($CFG->dirroot .'/lib/questionlib.php');
		$question = file_get_contents($CFG->dirroot .'/question/question.php');
		if (mb_strpos($questionlib, 'WIRIS') === false && mb_strpos($question, 'WIRIS') === false){
			$ok=false;
			$message='Files /lib/questionlib.php and/or /question/question.php are not properly patched. Please reinstall WIRIS Quizzes at <a href="install.php">wiris-quizzes/install.php</a>';
		}
	}
	
	if($ok){
		$message = 'WIRIS Quizzes files are properly installed.';
	}
	printRow('Files',$ok,$message);
}

function wrsqz_testEnabled(){
  global $CFG;
  if(wrsqz_isEnabled()){
    $ok=true;
    if(!isset($CFG->wiris_quizzes_enabled)){
      $message = 'WIRIS quizzes is enabled by default.';
    }else if($CFG->wiris_quizzes_enabled){
      $message = 'WIRIS quizzes is explicitly enabled.';
    }else{
      'Unknown.';
    }
  }else{
    $ok = false;
    if(strpos($CFG->textfilters, 'filter/wiris')===false){
      $message = 'WIRIS filter is not activated.';
    }else if(isset($CFG->wiris_quizzes_enabled) && (!$CFG->wiris_quizzes_enabled)){
      $message = 'WIRIS quizzes is disabled in WIRIS filter settings.';
    }else{
      'Unknown.';
    }
  }
  printRow('Enabled',$ok,$message);

}

function wrsqz_testDB(){
	$tables = array(
		'question_essaywiris',
		'question_matchwiris',
		'question_multichoicewiris',
		'question_shortanswerwiris',
		'question_truefalsewiris',
    'question_multianswerwiris',
		'question_wessaprom',
		'question_wmatprom',
		'question_wmultiprom',
		'question_wshanprom',
		'question_wtrflsprom',
    'question_wmansprom',
	);
	$ok=true;
	foreach($tables as $table){
		if($ok){
			if(!table_exists(new XMLDBtable($table))){
				$ok=false;
				$message = 'Some tables of WIRIS Quizzes are missing (at least '.$table.'). Please reinstall WIRIS Quizzes at <a href="install.php">wiris-quizzes/install.php</a>';
			}
		}
	}
	if($ok){
		$message = 'WIRIS Quizzes tables properly installed.';
	}
	printRow('Database',$ok,$message);
}

//Checks a servlet response with a calculation
function wrsqz_testGetVars(){
	
	$questionId=999999999;
	$program = '<session lang=\"en\" version=\"2.0\"><library closed=\"false\">'.
  '<mtext style=\"color:#ffc800\" xml:lang=\"es\">variables</mtext><group>'.
  '<command><input><math xmlns=\"http://www.w3.org/1998/Math/MathML\">'.
  '<mi>a</mi><mo>=</mo><mn>1</mn></math></input></command>'.
  '<command><input><math xmlns=\"http://www.w3.org/1998/Math/MathML\">'.
  '<mi>p</mi><mo>=</mo><mi>plot</mi><mo>(</mo><mi>sin</mi><mo>(</mo><mi>random</mi>'.
  '<mo>(</mo><mn>0</mn><mo>.</mo><mn>5</mn><mo>,</mo><mn>2</mn><mo>.</mo><mn>0</mn><mo>)</mo>'.
  '<mo>*</mo><mi>x</mi><mo>)</mo><mo>)</mo></math></input></command>'.
  '<command><input><math xmlns=\"http://www.w3.org/1998/Math/MathML\">'.
  '<mi>b</mi><mo>=</mo><mn>'.rand().'</mn></math></input></command>'.
  '</group></library></session>';
	
	$data = new StdClass();
	$data->question = $questionId;
	$data->program = $program;
	
	$programId=insert_record('question_wshanprom',$data);
	
	$ok=true;
	
	if($programId===false){
		$ok=false;
		$message = 'Error accessing database.';
	}
	
	$wiris = new StdClass();
	$wiris->question=$questionId;
	$wiris->idcache=0;
	$wiris->md5=md5($program);
	$wiris->eqoption='';
	
	$data=array(
		'seed' => rand(),
		'text' => ' #p  ##Ta',
		'wiris' => $wiris
	);
	
	$result=wrsqz_getInfo('shortanswer',$questionId,$data);
	
	if($result['vars']['##Ta']!='1'){
		$ok = false;
		$message = 'Error with numeric variable';
	}else if(substr($result['vars']['##Wp'],0,7)!='<image>'){
		$ok=false;
		$message = 'Error with image variable';
	}
	
	if($ok){
		$message = wrsqz_assemble('Variables retrieved sucessfully. Look at the plot #p', $result['vars']);
	}
	
	delete_records('question_wshanprom', 'question', $questionId);
	printRow('Variables',$ok,$message);
	
}

function printRow($title, $ok, $message){
	echo '<tr>';
	echo '<td>';
	echo '<b>'.$title.'</b>';
	echo '</td><td>';
	if($ok){
		echo '<font color="green"><b>OK</b></font>';
	}else{
		echo '<font color="red"><b>KO</b></font>';
	}
	echo '</td><td>';
	echo $message;
	echo '</td></tr>';
}

	
	
?>