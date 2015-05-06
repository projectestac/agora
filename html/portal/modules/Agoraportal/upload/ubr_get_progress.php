<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_get_progress.php
//   Revision: 1.4
//   Date: 3/23/2008 12:24:50 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra
//   Description: Gather stats on an existing upload
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
// * ATTENTION * If you need to debug this file, set the $DEBUG_AJAX = 1 in ubr_ini.php
//               and use the showDebugMessage function. eg. showDebugMessage("Upload ID = $UPLOAD_ID<br>");
//***************************************************************************************************************

//******************************************************************************************************************************
// The following possible query string formats are assumed
//
// 1. ?upload_id=32_alpha_numeric_string&start_time=unix_time&total_upload_size=total_upload_size_in_bytes&rnd_id=random_number
// 2. ?about=1
//******************************************************************************************************************************

$THIS_VERSION = "1.4";     // Version of this file
$UPLOAD_ID = '';           // Initialize upload id

require 'ubr_ini.php';
require 'ubr_lib.php';

if($PHP_ERROR_REPORTING){ error_reporting(E_ALL); }

ob_start();

if(isset($_GET['upload_id']) && preg_match("/^[a-zA-Z0-9]{32}$/", $_GET['upload_id']) && isset($_GET['start_time']) && isset($_GET['total_upload_size'])){ $UPLOAD_ID = $_GET['upload_id']; }
elseif(isset($_GET['about']) && $_GET['about'] == 1){ kak("<u><b>UBER UPLOADER GET PROGRESS</b></u><br>UBER UPLOADER VERSION =  <b>" . $UBER_VERSION . "</b><br>UBR_GET_PROGRESS = <b>" . $THIS_VERSION . "<b>", 1, __LINE__); }
else{ kak("<font color='red'>ERROR</font>: Invalid parameters passed<br>", 1, __LINE__); }

$read_status = GetBytesRead($TEMP_DIR, $UPLOAD_ID);

if($read_status->active && $read_status->bytes_uploaded < $_GET['total_upload_size']){
	$lapsed_time = time() - $_GET['start_time'];

	if($DEBUG_AJAX){ showDebugMessage("Set progress: bytes uploaded=" . $read_status->bytes_uploaded . " lapsed time=" . $lapsed_time . " uploaded files=" . $read_status->uploaded_files); }

	setProgressStatus($read_status->bytes_uploaded, $lapsed_time, $read_status->uploaded_files);
	getProgressStatus($GET_PROGRESS_SPEED);
}
else{
	stopDataLoop();
	hideProgressBar();

	if($DEBUG_AJAX){
		if(!$read_status->active && $read_status->is_dir_error){
			showDebugMessage("<font color='green'>WARNING</font>: Cannot find upload temp directory<br>");
		}
		elseif(!$read_status->active && $read_status->open_dir_error){
			showDebugMessage("<font color='green'>WARNING</font>: Cannot open upload temp directory<br>");
		}
	}
}

//////////////////////////////////////////////////////////FUNCTIONS //////////////////////////////////////////////////////////////////

//Class to store read info
class ReadStatus{
	var $is_dir_error = 0;
	var $open_dir_error = 0;
	var $active = 0;
	var $uploaded_files = 0;
	var $bytes_uploaded = 0;
}

// Return the current size of the $_GET['temp_dir_sid'] - flength file size.
function GetBytesRead($temp_dir, $upload_id){
	$read_status = new ReadStatus;
	$temp_upload_dir = $temp_dir . $upload_id . '.dir';
	$flength_file = $upload_id . '.flength';

	if(is_dir($temp_upload_dir) && is_file($temp_upload_dir . '/' . $flength_file)){
		if($handle = opendir($temp_upload_dir)){
			while(false !== ($file_name = readdir($handle))){
				if(($file_name != '.') && ($file_name != '..') && ($file_name != $flength_file)){
					$read_status->bytes_uploaded += filesize($temp_upload_dir . '/' . $file_name);
					$read_status->uploaded_files++;
				}
			}
			closedir($handle);

			$read_status->active = 1;

			if($read_status->uploaded_files > 0){ $read_status->uploaded_files -= 1; }
		}
		else{ $read_status->open_dir_error = 1; }
	}
	else{ $read_status->is_dir_error = 1; }

	return $read_status;
}
