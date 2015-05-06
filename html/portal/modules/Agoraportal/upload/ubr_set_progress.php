<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_set_progress.php
//   Revision: 1.4
//   Date: 3/23/2008 12:24:30 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Initialize the progress bar
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

//***************************************************************************************************************
// * ATTENTION * If you need to debug this file, set the $DEBUG_AJAX = 1 in 'ubr_ini.php'
//               and use the showUbrDebug function. eg. showDebugMessage("Upload ID = $UPLOAD_ID<br>");
//***************************************************************************************************************

//***************************************************************************************************************
// The following possible query string formats are assumed
//
// 1. ?upload_id=32_alpha_numeric_string
// 2. ?about=1
//***************************************************************************************************************

$THIS_VERSION    = '1.4';        // Version of this file
$UPLOAD_ID = '';                 // Initialize upload id

require 'ubr_ini.php';
require 'ubr_lib.php';

if($PHP_ERROR_REPORTING){ error_reporting(E_ALL); }

if(isset($_GET['upload_id']) && preg_match("/^[a-zA-Z0-9]{32}$/", $_REQUEST['upload_id'])){ $UPLOAD_ID = $_GET['upload_id']; }
elseif(isset($_GET['about']) && $_GET['about'] == 1){ kak("<u><b>UBER UPLOADER SET PROGRESS</b></u><br>UBER UPLOADER VERSION =  <b>" . $UBER_VERSION . "</b><br>UBR_SET_PROGRESS = <b>" . $THIS_VERSION . "<b><br>\n", 1, __LINE__); }
else{ kak("<font color='red'>ERROR</font>: Invalid parameters passed<br>", 1, __LINE__); }

$flength_file = $TEMP_DIR . $UPLOAD_ID . '.dir/' . $UPLOAD_ID . '.flength';
$found_flength_file = false;

// Keep trying to read the flength file until timeout
for($i = 0; $i < $TIMEOUT_LIMIT; $i++){
	if(file_exists($flength_file)){
		$found_flength_file = true;
		$start_time = @filectime($flength_file);
		$fp = fopen($flength_file, "r");
		$total_upload_size = fread($fp, filesize($flength_file)); //Read the size of the upload from the flength file
		fclose($fp);
		break;
	}
	else{ sleep(1); }

	clearstatcache();
}

if(!$found_flength_file){
	if($DEBUG_AJAX){ showDebugMessage("Failed to find flength file $flength_file"); }
	showAlertMessage("<font color='red'>ERROR</font>: Failed to find <a href='http://uber-uploader.sourceforge.net/?section=flength' target='_new'>flength file</a>", 1);
}
elseif(strstr($total_upload_size, "ERROR")){
	if($DEBUG_AJAX){ showDebugMessage("Error in flength file $flength_file"); }
	deleteTempUploadDir($TEMP_DIR, $UPLOAD_ID);
	stopUpload();
	showAlertMessage($total_upload_size, 1);
}
else{
	if($DEBUG_AJAX){ showDebugMessage("Found flength file $flength_file"); }
	startProgressBar($UPLOAD_ID, $total_upload_size, $start_time);
}

//////////////////////////////////////////////////////////FUNCTIONS //////////////////////////////////////////////////////////////////

// Remove the temp directory based on upload id
function deleteTempUploadDir($temp_dir, $upload_id){
	$temp_upload_dir = $temp_dir . $upload_id . '.dir';

	if($handle = @opendir($temp_upload_dir)){
		while(false !== ($file_name = readdir($handle))){
			if($file_name != "." && $file_name != ".."){ @unlink($temp_upload_dir . '/' . $file_name); }
		}
		closedir($handle);
	}

	@rmdir($temp_upload_dir);
}
