<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_ini_progress.php
//   Revision: 1.3
//   Date: 2/18/2008 5:35:48 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Initializes Uber-Uploader
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
include_once('../../../../config/env-config.php');

global $agora;

$TEMP_DIR                    = $agora['server']['ubr_temp'];  // *ATTENTION : The $TEMP_DIR values MUST be duplicated in the "ubr_upload.pl" file

$UBER_VERSION                = '6.3.4';                      // Version of Uber-Uploader
$PATH_TO_UPLOAD_SCRIPT       = $agora['server']['cgi_script'];
$PATH_TO_LINK_SCRIPT         = 'ubr_link_upload.php';        // Path info
$PATH_TO_SET_PROGRESS_SCRIPT = 'ubr_set_progress.php';       // Path info
$PATH_TO_GET_PROGRESS_SCRIPT = 'ubr_get_progress.php';       // Path info
$PATH_TO_JS_SCRIPT           = 'ubr_file_upload.js';         // Path info
$DEFAULT_CONFIG              = 'ubr_default_config.php';     // Path info
$MULTI_CONFIGS_ENABLED       = 0;                            // Enable/Disable multi config files
$GET_PROGRESS_SPEED          = 1000;                         // 1000=1 second, 500=0.5 seconds, 250=0.25 seconds etc.
$DELETE_LINK_FILE            = 1;                            // Enable/Disable delete link file
$DELETE_REDIRECT_FILE        = 1;                            // Enable/Disable delete redirect file
$PURGE_LINK_FILES            = 1;                            // Enable/Disable delete old upload_id.link files
$PURGE_LINK_LIMIT            = 60;                           // Delete old upload_id.link files older than X seconds
$PURGE_REDIRECT_FILES        = 1;                            // Enable/Disable delete old upload_id.redirect files
$PURGE_REDIRECT_LIMIT        = 60;                           // Delete old redirect files older than X seconds
$PURGE_TEMP_DIRS             = 1;                            // Enable/Disable delete old upload_id.dir directories
$PURGE_TEMP_DIRS_LIMIT       = 43200;                        // Delete old upload_id.dir directories older than X seconds (43200=12 hrs)
$TIMEOUT_LIMIT               = 6;                            // Max number of seconds to find the flength file
$DEBUG_AJAX                  = 0;                            // Enable/Disable AJAX debug mode. Add your own debug messages by calling the "showDebugMessage() " function. UPLOADS POSSIBLE.
$DEBUG_PHP                   = 0;                            // Enable/Disable PHP debug mode. Dumps your PHP settings to screen and exits. UPLOADS IMPOSSIBLE.
$DEBUG_CONFIG                = 0;                            // Enable/Disable config debug mode. Dumps the loaded config file to screen and exits. UPLOADS IMPOSSIBLE.
$DEBUG_UPLOAD                = 0;                            // Enable/Disable debug mode in uploader. Dumps your CGI and loaded config settings to screen and exits. UPLOADS IMPOSSIBLE.
$DEBUG_FINISHED              = 0;                            // Enable/Disable debug mode in the upload finished page. Dumps all values to screen and exits. UPLOADS POSSIBLE.
$PHP_ERROR_REPORTING         = 1;                            // Enable/Disable PHP error_reporting(E_ALL). UPLOADS POSSIBLE.

?>
