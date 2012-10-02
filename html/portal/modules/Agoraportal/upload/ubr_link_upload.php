<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_link_upload.php
//   Revision: 1.4
//   Date: 2/18/2008 3:12:55 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Create a link file in the temp directory
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
//                                * ATTENTION *
// If you need to debug this file, set the $DEBUG_AJAX = 1 in ubr_ini.php
// and use the showDebugMessage function. eg.
// showDebugMessage("He There");
//***************************************************************************************************************

//***************************************************************************************************************
// The following possible query string formats are assumed
//
// 1. No query string
// 2. ?config_file=config_file_name
// 3. ?about=1
//***************************************************************************************************************

$THIS_VERSION = '1.4';         // Version of this file
$UPLOAD_ID = '';               // Initialize upload id

require 'ubr_ini.php';
require 'ubr_lib.php';

if($PHP_ERROR_REPORTING){ error_reporting(E_ALL); }

if(isset($_GET['about']) && $_GET['about'] == 1){ kak("<u><b>UBER UPLOADER LINK UPLOAD</b></u><br>UBER UPLOADER VERSION =  <b>" . $UBER_VERSION . "</b><br>UBR_LINK_UPLOAD = <b>" . $THIS_VERSION . "<b><br>\n", 1, __LINE__); }
else{
	////////////////////////////////////////////////////////////////////////
	//                           * ATTENTION *
	//         THIS IS A GOOD PLACE TO PUT YOUR AUTHENTICATION CODE
	////////////////////////////////////////////////////////////////////////
}

// Find config file name if multi configs is enabled else load default config
if($MULTI_CONFIGS_ENABLED){
	if(isset($_GET['config_file']) && strlen($_GET['config_file']) > 0){ $config_file = $_GET['config_file']; }
	else{ showAlertMessage("<font color='red'>ERROR</font>: Failed to find config_file parameter", 1); }
}
else{ $config_file = $DEFAULT_CONFIG; }

// Load config file
require $config_file;

// Create directories
if(!create_dir($TEMP_DIR)){ showAlertMessage("<font color='red'>ERROR</font>: Failed to create temp_dir: $TEMP_DIR", 1); }
if(!create_dir($_CONFIG['upload_dir'])){ showAlertMessage("<font color='red'>ERROR</font>: Failed to create upload_dir: " . $_CONFIG['upload_dir'], 1); }
if($_CONFIG['log_uploads']){
	if(!create_dir($_CONFIG['log_dir'])){ showAlertMessage("<font color='red'>ERROR</font>: Failed to create log_dir: " . $_CONFIG['log_dir'], 1); }
}

// Purge old link files
if($PURGE_LINK_FILES){ purge_ubr_files($TEMP_DIR, $PURGE_LINK_LIMIT, '.link'); }

// Purge old redirect files
if($PURGE_REDIRECT_FILES){ purge_ubr_files($TEMP_DIR, $PURGE_REDIRECT_LIMIT, '.redirect'); }

// Generate upload id
$UPLOAD_ID = generateUploadID();

// Show debug message
if($DEBUG_AJAX){ showDebugMessage("Upload ID = $UPLOAD_ID"); }

// Write link file
if(write_link_file($TEMP_DIR, $UPLOAD_ID, $DEBUG_UPLOAD, $DELETE_LINK_FILE, $PURGE_TEMP_DIRS, $PURGE_TEMP_DIRS_LIMIT, $_CONFIG)){
	if($DEBUG_AJAX){
		$path_to_link_file = $TEMP_DIR . $UPLOAD_ID . ".link";
		showDebugMessage("Created link file $path_to_link_file");
	}
	startUpload($UPLOAD_ID, $DEBUG_UPLOAD);
}
else{ showAlertMessage("<font color='red'>ERROR</font>: Failed to open link file: $UPLOAD_ID.link", 1); }

//////////////////////////////////////////////////////////FUNCTIONS //////////////////////////////////////////////////////////////////

// Create a directory
function create_dir($dir){
	if(is_dir($dir)){ return true; }
	else{
		umask(0);
		if(@mkdir($dir, 0777)){ return true; }
		else{ return false; }
	}
}

//Purge old redirect and link files
function purge_ubr_files($temp_dir, $purge_time_limit, $file_type){
	$now_time = mktime();

	if(is_dir($temp_dir)){
		if($dp = @opendir($temp_dir)){
			while(false !== ($file_name = readdir($dp))){
				if($file_name != '.' && $file_name != '..' && strcmp(substr($file_name, strrpos($file_name, '.')), $file_type) == 0){
					if($file_time = @filectime($temp_dir . $file_name)){
						if(($now_time - $file_time) > $purge_time_limit){ @unlink($temp_dir . $file_name); }
					}
				}
			}
			closedir($dp);
		}
		else{ showAlertMessage("<font color='red'>ERROR</font>: Failed to open temp_dir: $temp_dir", 1); }
	}
	else{ showAlertMessage("<font color='red'>ERROR</font>: Failed to find temp_dir: $temp_dir", 1); }
}

//Write 'upload_id.link' file
function write_link_file($temp_dir, $upload_id, $debug_upload, $delete_link_file, $purge_temp_dirs, $purge_temp_dirs_limit, $_config){
	$path_to_link_file = $temp_dir . $upload_id . ".link";
	$fp = @fopen($path_to_link_file, "wb");

	if(is_resource($fp)){
		fwrite($fp, "config_file_name<=>". $_config['config_file_name'] . "\n");
		fwrite($fp, "debug_upload<=>". $debug_upload . "\n");
		fwrite($fp, "delete_link_file<=>". $delete_link_file . "\n");
		fwrite($fp, "purge_temp_dirs<=>". $purge_temp_dirs . "\n");
		fwrite($fp, "purge_temp_dirs_limit<=>". $purge_temp_dirs_limit . "\n");
		fwrite($fp, "upload_id<=>". $upload_id . "\n");
		fwrite($fp, "upload_dir<=>". $_config['upload_dir'] . "\n");
		fwrite($fp, "max_upload_size<=>". $_config['max_upload_size'] . "\n");
		fwrite($fp, "overwrite_existing_files<=>". $_config['overwrite_existing_files'] . "\n");
		fwrite($fp, "redirect_url<=>". $_config['redirect_url'] . "\n");
		fwrite($fp, "redirect_using_location<=>". $_config['redirect_using_location'] . "\n");
		fwrite($fp, "redirect_using_html<=>". $_config['redirect_using_html'] . "\n");
		fwrite($fp, "redirect_using_js<=>". $_config['redirect_using_js'] . "\n");
		fwrite($fp, "check_allow_extensions_on_server<=>". $_config['check_allow_extensions_on_server'] . "\n");
		fwrite($fp, "check_disallow_extensions_on_server<=>". $_config['check_disallow_extensions_on_server'] . "\n");
		fwrite($fp, "allow_extensions<=>". $_config['allow_extensions'] . "\n");
		fwrite($fp, "disallow_extensions<=>". $_config['disallow_extensions'] . "\n");
		fwrite($fp, "send_email_on_upload<=>". $_config['send_email_on_upload'] . "\n");
		fwrite($fp, "embedded_upload_results<=>". $_config['embedded_upload_results'] . "\n");
		fwrite($fp, "opera_browser<=>". $_config['opera_browser'] . "\n");
		fwrite($fp, "safari_browser<=>". $_config['safari_browser'] . "\n");
		fwrite($fp, "unique_upload_dir<=>". $_config['unique_upload_dir'] . "\n");
		fwrite($fp, "unique_file_name<=>". $_config['unique_file_name'] . "\n");
		if($_config['unique_file_name']){ fwrite($fp, "unique_file_name_length<=>". $_config['unique_file_name_length'] . "\n"); }
		fwrite($fp, "log_uploads<=>". $_config['log_uploads'] . "\n");
		if($_config['log_uploads']){ fwrite($fp, "log_dir<=>". $_config['log_dir'] . "\n"); }
		fwrite($fp, "link_to_upload<=>". $_config['link_to_upload'] . "\n");
		if($_config['link_to_upload']){ fwrite($fp, "path_to_upload<=>". $_config['path_to_upload'] . "\n"); }
		fwrite($fp, "normalize_file_names<=>". $_config['normalize_file_names'] . "\n");
		if($_config['normalize_file_names']){
			fwrite($fp, "normalize_file_delimiter<=>". $_config['normalize_file_delimiter'] . "\n");
			fwrite($fp, "normalize_file_length<=>". $_config['normalize_file_length'] . "\n");
		}
		fwrite($fp, "send_email_on_upload<=>". $_config['send_email_on_upload'] . "\n");
		if($_config['send_email_on_upload']){
			if($_config['link_to_upload_in_email'] && !$_config['link_to_upload']){ fwrite($fp, "path_to_upload<=>". $_config['path_to_upload'] . "\n"); }
			fwrite($fp, "html_email_support<=>". $_config['html_email_support'] . "\n");
			fwrite($fp, "link_to_upload_in_email<=>". $_config['link_to_upload_in_email'] . "\n");
			fwrite($fp, "email_subject<=>". $_config['email_subject'] . "\n");
			fwrite($fp, "to_email_address<=>". $_config['to_email_address'] . "\n");
			fwrite($fp, "from_email_address<=>". $_config['from_email_address'] . "\n");
		}

		fclose($fp);
		umask(0);
		chmod($path_to_link_file, 0666);

		return true;
	}
	else{ return false; }
}

?>