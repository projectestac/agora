<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_lib.php
//   Revision: 1.1
//   Date: 20/01/2008 6:24PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Library used by Uber-Uploader
//
//   Contributor: http://www.php.net/manual/en/function.print-r.php
//
//   Licence:
//   The contents of this file are subject to the Mozilla Public
//   License Version 1.1 (the "License"); you may not use this file
//   except in compliance with the License. You may obtain a copy of
//   the License at http://www.mozilla.org/MPL/
//
//   Software distributed under the License is distributed on an "AS
//   IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or
//   implied. See the License for the specific language governing
//   rights and limitations under the License.
//
//***************************************************************************************************************

// Output a message to screen and exit
function kak($msg, $exit_ubr, $line){
	print "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
	print "  <html>\n";
	print "    <head>\n";
	print "      <title>Uber-Uploader - Free File Upload Progress Bar</title>\n";
	print "      <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n";
	print "      <meta http-equiv=\"Pragma\" content=\"no-cache\">\n";
	print "      <meta http-equiv=\"cache-control\" content=\"no-cache\">\n";
	print "      <meta http-equiv=\"expires\" content=\"-1\">\n";
	print "      <meta name=\"robots\" content=\"none\">\n";
	print "    </head>\n";
	print "    <body style=\"background-color: #EEEEEE; color: #000000; font-family: arial, helvetica, sans_serif;\">\n";
	print "	     <br>\n";
	print "      <div align='center'>\n";
	print        $msg . "\n";
	print "      <br>\n";
	print "      <!-- kak on line $line -->\n";
	print "      </div>\n";
	print "    </body>\n";
	print "  </html>\n";

	if($exit_ubr){ exit; }
}

function showAlertMessage($message, $exit_ubr){
	echo "if(typeof showAlertMessage == 'function'){ showAlertMessage(" . '"' . $message . '"' . "); }";

	if($exit_ubr){ exit(); }
}

function generateUploadID(){ return md5(uniqid(mt_rand(), true)); }
function showDebugMessage($message){ echo "if(typeof showDebugMessage == 'function'){ showDebugMessage(" . '"' . $message . '"' . "); }"; }
function stopUpload(){ echo "if(typeof stopUpload == 'function'){ stopUpload(); }"; }
function startUpload($upload_id, $debug_upload){ echo "if(typeof startUpload == 'function'){ startUpload(" . '"' . $upload_id . '",' . $debug_upload . "); }"; }
function startProgressBar($upload_id, $total_upload_size, $start_time){ echo "if(typeof startProgressBar == 'function'){ startProgressBar(" . '"' . $upload_id . '","' . $total_upload_size . '","' . $start_time . '"' . "); }"; }
function setProgressStatus($bytes_uploaded, $lapsed_time, $uploaded_files){ echo "if(typeof setProgressStatus == 'function'){ setProgressStatus(" . $bytes_uploaded . "," . $lapsed_time . "," .  $uploaded_files . "); }"; }
function stopDataLoop(){ echo "if(typeof stopDataLoop == 'function'){ stopDataLoop(); }"; }
function hideProgressBar(){ echo "if(typeof hideProgressBar == 'function'){ hideProgressBar(); }"; }
function getProgressStatus($get_status_speed){ echo "if(typeof getProgressStatus == 'function'){ setTimeout('getProgressStatus()', $get_status_speed); }"; }

////////////////////////////////////////////////////////////////////////////////
// Output array to screen (debug, debug_var, next_div, debug_colorize_string)
// Contributor: http://www.php.net/manual/en/function.print-r.php
////////////////////////////////////////////////////////////////////////////////
function debug($name, $data){
	ob_start();
	print_r($data);
	$str = ob_get_contents();
	ob_end_clean();
	debug_var($name, $str);
}

function debug_var($name, $data){
	$captured = preg_split("/\r?\n/", $data);

	print "<script>function toggleDiv(num){var span = document.getElementById('d'+num);var a = document.getElementById('a'+num);var cur = span.style.display;if(cur == 'none'){a.innerHTML = '-';span.style.display = 'inline';}else{a.innerHTML = '+';span.style.display = 'none';}}</script>";
	print "<b>$name</b>\n";
	print "<pre>\n";

	foreach($captured as $line){ print debug_colorize_string($line) . "\n"; }

	print "</pre>\n";
}

function next_div($matches){
	static $num = 0;
	++$num;
	return "$matches[1]<a id=a$num href=\"javascript: toggleDiv($num)\">+</a><span id=d$num style=\"display:none\">(";
}
function debug_colorize_string($string){
	$string = preg_replace("/\[(\w*)\]/i", '[<font color="red">$1</font>]', $string);
	$string = preg_replace_callback("/(\s+)\($/", 'next_div', $string);
	$string = preg_replace("/(\s+)\)$/", '$1)</span>', $string);
	$string = str_replace('Array', '<font color="blue">Array</font>', $string);
	$string = str_replace('=>', '<font color="#556F55">=></font>', $string);

	return $string;
}

?>