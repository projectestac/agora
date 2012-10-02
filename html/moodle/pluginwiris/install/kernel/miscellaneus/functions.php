<?php
if (!defined('SECURITY_CONSTANT')) exit;

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

function translate($string) {
	global $TRANSLATION;
	
	if (isset($TRANSLATION[$string])) {
		return $TRANSLATION[$string];
	}
	
	return $string;
}

function errorMessage($tag = '') {
	$toReturn = translate('If you want to install Plugin WIRIS manually, see') . ' <a href="http://www.wiris.com/download/moodle/install.html#' . $tag . '">' . translate('our manual') . '</a>.<br /><br />';
	$toReturn .= '<a href="..">' . translate('Return to moodle home.') . '</a><br /><br />';
	$toReturn .= '<a href="./install.php">' . translate('Try to reinstall') . '</a>.';
	
	return $toReturn;
}

function downloadEditor() {
	if (isset($_POST['proxy']) and isset($_POST['proxy_host']) and isset($_POST['proxy_port'])) {
		$aContext = array(
			'http' => array(
				'proxy' => 'tcp://' . $_POST['proxy_host'] . ':' . (int)$_POST['proxy_port'],
				'request_fulluri' => true,
			),
		);
		
		$cxContext = stream_context_create($aContext);
		
		if (($content = file_get_contents('http://www.wiris.com/download/editor/download?file=wiriseditor.zip', false, $cxContext)) !== false) {
			return file_put_contents('./editor/jar/pluginwiris.zip', $content);
		}
		
		return false;
	}
	
	if (($content = wrs_http_get_contents('http://www.wiris.com/download/editor/download?file=wiriseditor.zip')) !== false) {
		return wrs_file_put_contents('./editor/jar/pluginwiris.zip', $content);
	}
	
	return false;
}

function extractEditor() {
	$handle = new PclZip('./editor/jar/pluginwiris.zip');
	if ($handle->extract(PCLZIP_OPT_PATH, "./editor/jar/") === false) {
		return false;
	}
	return true;
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

function full_remove($target) {
	if (is_dir($target)) {
		$dirList = opendir($target);
		while ($file = readdir($dirList)) {
			if ($file != '.' and $file != '..') {
				$fullPath = $target . '/' . $file;
				if (!full_remove($fullPath)) {
					closedir($dirList);
					return false;
				}
			}
		}
		
		rmdir($target);
		return true;
	}

	return unlink($target);
}

function parseWeblib() {
	if (($content = file_get_contents('../lib/weblib.php')) !== false) {
		if (strpos($content, 'WIRIS') !== false) {
			return ALREADY_PARSED;
		}
		
		$contentSplited = explode("\n", $content);
		
		include('../version.php');
		
		if (($position = strpos($release, '+')) !== false) {
			$release = substr($release, 0, $position + 1);
		}
		else if (($position = strpos($release, ' ')) !== false) {
			$release = substr($release, 0, $position);
		}
		
		if (isset($_POST['proxy']) and isset($_POST['proxy_host']) and isset($_POST['proxy_port'])) {
			$aContext = array(
			    'http' => array(
				        'proxy' => 'tcp://' . $_POST['proxy_host'] . ':' . (int)$_POST['proxy_port'],
				        'request_fulluri' => true,
			        ),
			    );
			$cxContext = stream_context_create($aContext);
			
			$toEval = file_get_contents('http://www.wiris.com/download/moodle/versions.php?version=' . urlencode($release), false, $cxContext);
		}
		else {
			$toEval = wrs_http_get_contents('http://www.wiris.com/download/moodle/versions.php?version=' . urlencode($release));
		}

		if ($toEval !== false) {
			$printTextarea_passed = false;
			$useHTMLEditor_passed = false;
			$scriptcount_passed = false;
			$echo_passed = false;

			$content = '';
			
			eval($toEval);
			
			if ($scriptcount != 'UNKNOWN') {
				foreach ($contentSplited as $line) {
					if (strpos($line, "function print_textarea(") !== false) {
						$printTextarea_passed = true;
					}
					if (strpos($line, "function use_html_editor(") !== false) {
						$useHTMLEditor_passed = true;
					}
					if (strpos($line, "\$scriptcount++;") !== false and $printTextarea_passed and !$scriptcount_passed) {
						$content .= "/**** begin WIRIS Plugin ****/\n";
						$content .= $scriptcount;
						$content .= "/**** end WIRIS Plugin ****/\n";
						$scriptcount_passed = true;
					}

					$content .= $line . "\n";

					if (strpos($line, "echo print_editor_config(\$editorhidebuttons);") !== false and $useHTMLEditor_passed and !$echo_passed) {
						$content .= "/**** begin WIRIS Plugin ****/\n";
						$content .= $echo;
						$content .= "/**** end WIRIS Plugin ****/\n";
						$echo_passed = true;
					}
				}
				
				$content = substr($content, 0, strlen($content) - 1);		// Deletes last \n (else moodle don't works)
				
				if ($printTextarea_passed and $useHTMLEditor_passed and $scriptcount_passed and $echo_passed) {
					if (!copy('../lib/weblib.php', '../lib/weblib.php.old')) {		// Backuping weblib.php
						return NO_WRITE_PERMISION;
					}

					if (file_put_contents('../lib/weblib.php', $content) === false) {
						return NO_WRITE_PERMISION;
					}
					return ALL_WELL;
				}
				return UNKNOWN_VERSION;
			}
			return UNKNOWN_VERSION;
		}
		return CAN_NOT_CONNECT;
	}
	return NO_READ_PERMISION;
}

function boolTostring($boolean) {
	if (!isset($boolean) or !$boolean) {
		return 'false';
	}
	
	return 'true';
}

function parseCASConfigValues(&$codebase, &$archive, &$class, &$lang) {
	global $CFG;
	$codebase = (isset($_POST['codebase'])) ? $_POST['codebase'] : ((isset($CFG->wiriscascodebase)) ? $CFG->wiriscascodebase : 'http://www.wiris.net/demo/wiris/wiris-codebase');
	$archive = (isset($_POST['archive'])) ? $_POST['archive'] : ((isset($CFG->wiriscasarchive)) ? $CFG->wiriscasarchive : 'wrs_net_en.jar');
	$class = (isset($_POST['class'])) ? $_POST['class'] : ((isset($CFG->wiriscasclass)) ? $CFG->wiriscasclass : 'WirisApplet_net_en');

	$defaultLangList = array('es', 'en', 'ca', 'it', 'fr', 'eu', 'nl', 'et');
	$langList = array();
	
	foreach ($defaultLangList as $langItem) {
		if (isset($_POST[$langItem])) {
			$langList[] = $langItem;
		}
	}
	
	$lang = implode(',', $langList);
}

function parseConfig() {
	if (file_exists('./wrs_config.php')) {
		include_once './wrs_config.php';
	}
	
	$codebase = $archive = $class = $lang = '';
	
	if (isset($_POST['server'])) {
		$toInclude = './install/servers/' . basename($_POST['server']) . '.php';

		if (is_file($toInclude)) {
			include $toInclude;
		}
		else {
			parseCASConfigValues($codebase, $archive, $class, $lang);
		}
	}
	else {
		parseCASConfigValues($codebase, $archive, $class, $lang);
	}
	
	$useProxy = (isset($_POST['proxy']) || $CFG->wirisproxy);
	
	$values = array(
		'wirisservicehost' => (isset($_POST['imagehost'])) ? $_POST['imagehost'] : ((isset($CFG->wirisservicehost)) ? $CFG->wirisservicehost : 'services.wiris.net'),
		'wirisserviceport' => (isset($_POST['imageport'])) ? $_POST['imageport'] : ((isset($CFG->wirisserviceport)) ? $CFG->wirisserviceport : '80'),
		'wirisservicepath' => (isset($_POST['imagepath'])) ? $_POST['imagepath'] : ((isset($CFG->wirisservicepath)) ? $CFG->wirisservicepath : '/demo/formula'),
		'wirisformulaeditorenabled' => (isset($_POST['enableEditor']) || $CFG->wirisformulaeditorenabled) ? 'true' : 'false',
		'wiriscasenabled' => (isset($_POST['enableCAS']) || $CFG->wiriscasenabled) ? 'true' : 'false',
		'wiriscascodebase' => $codebase,
		'wiriscasarchive' => $archive,
		'wiriscasclass' => $class,
		'wiriscaslang' => $lang,
		'wirisproxy' => ($useProxy) ? 'true' : 'false',
		'wirisproxy_host' => (isset($_POST['proxy_host'])) ? $_POST['proxy_host'] : ((isset($CFG->wirisproxy_host)) ? $CFG->wirisproxy_host : ''),
		'wirisproxy_port' => (int)((isset($_POST['proxy_port'])) ? $_POST['proxy_port'] : ((isset($CFG->wirisproxy_port)) ? $CFG->wirisproxy_port : '8080')),
		'wirisPHP4compatibility' => ($useProxy) ? 'true' : 'false'
	);
	
	$config = parseSkeletonFile('./install/wrs_config.skeleton.php', $values);
	
	if (file_put_contents('./wrs_config.php', $config) === false) {
		return NO_WRITE_PERMISION;
	}
	
	return ALL_WELL;
}

function parseSkeletonFile($path, $variables) {
	$content = file_get_contents($path);
	
	if ($content === false) {
		return '';
	}
	
	foreach ($variables as $key => $value) {
		$content = str_replace('@' . $key . '@', $value, $content);
	}
	
	return $content;
}

function addSlashesOnDoubleQuotes($string) {
	return str_replace('"', '\"', $string);
}

function wrs_http_get_contents($URL) {
	$URL_parsed = parse_url($URL);

	if (empty($URL_parsed['port'])) {
		$URL_parsed['port'] = 80;
	}
	
	if (!empty($URL_parsed['query'])) {
		$URL_parsed['query'] = '?' . $URL_parsed['query'];
	}
	
	if (($socket = fsockopen($URL_parsed['host'], $URL_parsed['port'])) !== false) {
		$query = 'GET ' . $URL_parsed['path'] . $URL_parsed['query'] . " HTTP/1.0\r\n";
		$query .= 'Host: ' . $URL_parsed['host'] . ':' . $URL_parsed['port'] . "\r\n";
		$query .= "Connection: close\r\n";
		$query .= "\r\n";
		
		fwrite($socket, $query);
		
		$content = '';
		while (!feof($socket)) {
			$content .= fgets($socket, 128);
		}
		fclose($socket);
		
		$content_splited = explode("\r\n\r\n", $content, 2);

		/* Parsing headers */
		$header_lines = explode("\r\n", $content_splited[0]);
		$header = array();
		
		foreach ($header_lines as $line) {
			$line_splited = explode(': ', $line, 2);
			
			if (count($line_splited) == 2) {
				$header[$line_splited[0]] = $line_splited[1];
			}
			else {
				$header['HTTP_INFO'] = $line;
			}
		}
		
		if (isset($header['Location'])) {
			return wrs_http_get_contents($header['Location']);
		}
		
		return $content_splited[1];
	}
	
	return false;
}

function wrs_file_put_contents($file, $content) {
	if (($handle = fopen('./editor/jar/pluginwiris.zip', 'wb')) !== false) {
		fwrite($handle, $content);
		fclose($handle);
		
		return true;
	}
	
	return false;
}
?>