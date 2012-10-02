<?php
mb_internal_encoding('UTF-8');
function stripSlashesInRequestVariables() {
	$_REQUEST = array_map('secure_stripslashes', $_REQUEST);
	$_GET = array_map('secure_stripslashes', $_GET);
	$_POST = array_map('secure_stripslashes', $_POST);
}

function secure_stripslashes($element) {
	if (is_array($element)) {
		return array_map('secure_stripslashes', $element);
	}

	return stripslashes($element);
}

function utf8_htmlentities($input) {
	return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

function translate($string) {
	global $TRANSLATION;
	
	if (isset($TRANSLATION[$string])) {
		return $TRANSLATION[$string];
	}
	
	return $string;
}

function checkVersion($currentVersion, $minVersion) {
	$currentVersion_list = explode('.', $currentVersion);
	$minVersion_list = explode('.', $minVersion);
	$currentVersion_list_size = count($currentVersion_list);
	$minVersion_list_size = count($minVersion_list);
	
	for ($i = 0; $i < $currentVersion_list_size && $i < $minVersion_list_size; ++$i) {
		if ($currentVersion_list[$i] > $minVersion_list[$i]) {
			return true;
		}
		
		if ($currentVersion_list[$i] < $minVersion_list[$i]) {
			return false;
		}
	}
	
	if ($currentVersion_list_size >= $minVersion_list_size) {
		return true;
	}
	
	return false;
}

function errorMessage($tag = '') {
	$toReturn = translate('If you want to install WIRIS Quizzes manually, see') . ' <a href="http://www.wiris.com/quizzes/docs/install">' . translate('the manual') . '</a>.<br /><br />';
	$toReturn .= '<a href="..">' . translate('Return to moodle home.') . '</a><br /><br />';
	$toReturn .= '<a href="./install.php">' . translate('Try to reinstall') . '</a>.';
	
	return $toReturn;
}

function full_copy($source, $target) {
	if (is_dir($source)) {
		if (!file_exists($target)) {
			mkdir($target);
		}
		$dirList = opendir($source);
		while ($itemReaded = readdir($dirList)) {
			if ($itemReaded != '.' and $itemReaded != '..') {
				$fullPath = $source . '/' . $itemReaded;
				if (!full_copy($fullPath, $target . '/' . $itemReaded)) {
					closedir($dirList);
					return false;
				}
			}
		}
		return true;
	}
	else {
		return copy($source, $target);
	}
}

function copyQuestionTypes() {
	$dirList = opendir('./questiontypes');
	
	while (($itemReaded = readdir($dirList)) !== false) {
		if ($itemReaded != '.' and $itemReaded != '..' and !full_copy('./questiontypes/' . $itemReaded, '../question/type/' . $itemReaded)) {
			return false;
		}
	}
	
	closedir($dirList);
	
	return true;
}
function copyLangFiles(){
	global $CFG;
	$dirList = opendir('./lang');
	$copyOK=true;
	while (($itemReaded = readdir($dirList))!==false) {
		if ($itemReaded != '.' and $itemReaded != '..'){
		
			$langDir=$CFG->dirroot . '/' . 'lang' . '/' . $itemReaded;
			$langDirData = $CFG->dataroot . '/' . 'lang' . '/' . $itemReaded;
			
			if (file_exists($langDir)){
				$copyToDataDir= !full_copy('./lang/' . $itemReaded, $langDir);
			}
			
			if (file_exists($langDirData) || $copyToDataDir){
				$copyOK = $copyOK && full_copy('./lang/' . $itemReaded, $langDirData);
			}
		}
	}
	return $copyOK;
}

function parseQuestionLib() {
	if (($content = file_get_contents('../lib/questionlib.php')) !== false) {
		if (mb_strpos($content, 'WIRIS') !== false) {
			return ALREADY_PARSED;
		}
		
		$contentSplited = explode("\n", $content);
		$passed = false;
		$content = '';
		
		foreach ($contentSplited as $line) {
			$content .= $line . "\n";
			
			if (mb_strpos($line, 'if ($menuname) {') !== false) {
				$content .= "/**** begin WIRIS Plugin ****/\n";
				$content .= "if (array_key_exists(\$name . 'wiris', \$QTYPES)) continue;\n";
				$content .= "/**** end WIRIS Plugin ****/\n";
				$passed = true;
			}
		}
		
		$content = substr($content, 0, strlen($content) - 1);		// Deletes last \n (else moodle doesn't work)
		
		if ($passed) {
			if (!copy('../lib/questionlib.php', '../lib/questionlib.php.old')) {		// Backuping questionlib.php
				return NO_WRITE_PERMISION;
			}

			if (file_put_contents('../lib/questionlib.php', $content) === false) {
				return NO_WRITE_PERMISION;
			}
			
			return ALL_WELL;
		}
		
		return UNKNOWN_VERSION;
	}
	
	return NO_READ_PERMISION;
}

function parseQuestion() {
	if (($content = file_get_contents('../question/question.php')) !== false) {
		if (mb_strpos($content, 'WIRIS') !== false) {
			return ALREADY_PARSED;
		}
		
		$contentSplited = explode("\n", $content);
		$passed = false;
		$content = '';
		
		foreach ($contentSplited as $line) {
			if (mb_strpos($line, '// Validate the question category.') !== false) {
				$content .= "/**** begin WIRIS Plugin ****/\n";
				$content .= "if (array_key_exists(\$question->qtype . 'wiris', \$QTYPES))\n";
				$content .= "\$question->qtype = \$question->qtype . 'wiris';\n";;
				$content .= "/**** end WIRIS Plugin ****/\n";
				$passed = true;
			}
			
			$content .= $line . "\n";
		}
		
		$content = substr($content, 0, strlen($content) - 1);		// Deletes last \n (else moodle doesn't work)
		
		if ($passed) {
			if (!copy('../question/question.php', '../question/question.php.old')) {		// Backuping question.php
				return NO_WRITE_PERMISION;
			}

			if (file_put_contents('../question/question.php', $content) === false) {
				return NO_WRITE_PERMISION;
			}
			
			return ALL_WELL;
		}
		
		return UNKNOWN_VERSION;
	}
	
	return NO_READ_PERMISION;
}

function parseConfig($out=false) {
	$toWrite = "<?php\n";
	$toWrite .= "global \$CFG;\n\n";
	
	$toWrite .= "\$CFG->wirisquizzes_serverhost='" . $_POST["host"] . "';\n";
	$toWrite .= "\$CFG->wirisquizzes_serverport='" . $_POST["port"] . "';\n";
	$toWrite .= "\$CFG->wirisquizzes_serverpath='" . $_POST["path"] . "';\n\n";

	//$toWrite .= "\$CFG->wirisquizzes_extension = 'W';\n";
	//$toWrite .= "\$CFG->wirisquizzes_CAScode = '<session version=\"2.0\" lang=\"en\"><library closed=\"false\"><mtext style=\"color:#ffc800\" xml:lang=\"es\">variables</mtext><group><command><input><math xmlns=\"http://www.w3.org/1998/Math/MathML\"/></input></command></group></library></session>';\n\n";
	
	$toWrite .= "\$CFG->wirisquizzes_imagedir = 'wiris-quizzes/imagecache';\n\n";
					
	$toWrite .= "//Plot images style options.\n";
	$toWrite .= "\$CFG->wirisquizzes_plotborderstyle = 'solid';\n";
	$toWrite .= "\$CFG->wirisquizzes_plotborderwidth = '1px';\n";
	$toWrite .= "\$CFG->wirisquizzes_plotbordercolor = '#8888ff';\n";
	$toWrite .= "\$CFG->wirisquizzes_plotmargin = '5px';\n";
	
	$toWrite .= '?>';
	
	if($out){
		return $toWrite;
	}else{
		if (file_put_contents('./wrsqz_config.php', $toWrite) === false) {
			return NO_WRITE_PERMISION;
		}
		
		return ALL_WELL;
	}
}
?>