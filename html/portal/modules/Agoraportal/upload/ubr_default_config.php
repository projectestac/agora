<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_default_config.php
//   Revision: 1.5
//   Date: 3/16/2008 12:22:27 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Configure upload options
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
//********************************************************************************************************

global $agora;

$_CONFIG['config_file_name']                      = 'ubr_default_config';
$_CONFIG['upload_dir']                            = $agora['server']['ubr_upload'];
$_CONFIG['multi_upload_slots']                    = 1;
$_CONFIG['max_upload_slots']                      = 1;
$_CONFIG['embedded_upload_results']               = 0;
$_CONFIG['check_file_name_format']                = 1;
$_CONFIG['check_null_file_count']                 = 1;
$_CONFIG['check_duplicate_file_count']            = 1;
$_CONFIG['show_percent_complete']                 = 1;
$_CONFIG['show_files_uploaded']                   = 1;
$_CONFIG['show_current_position']                 = 1;
$_CONFIG['show_elapsed_time']                     = 1;
$_CONFIG['show_est_time_left']                    = 1;
$_CONFIG['show_est_speed']                        = 1;
$_CONFIG['cedric_progress_bar']                   = 1;
$_CONFIG['cedric_hold_to_sync']                   = 0;
$_CONFIG['progress_bar_width']                    = 400;
$_CONFIG['unique_upload_dir']                     = 0;
$_CONFIG['unique_file_name']                      = 0;
$_CONFIG['unique_file_name_length']               = 16;
$_CONFIG['max_upload_size']                       = 104857600; //(100 * 1024 * 1024 = 104857600 = 100MB)
$_CONFIG['overwrite_existing_files']              = 0;
$_CONFIG['redirect_url']                          = $agora['server']['html'] . 'portal/modules/Agoraportal/upload/ubr_finished.php';
$_CONFIG['redirect_using_location']               = 1;
$_CONFIG['redirect_using_html']                   = 0;
$_CONFIG['redirect_using_js']                     = 0;
$_CONFIG['check_allow_extensions_on_client']      = 1;
$_CONFIG['check_disallow_extensions_on_client']   = 0;
$_CONFIG['check_allow_extensions_on_server']      = 1;
$_CONFIG['check_disallow_extensions_on_server']   = 0;
$_CONFIG['allow_extensions']                      = '(zip|mbz)';            // Include file extentions you want to upload
$_CONFIG['disallow_extensions']                   = '(sh|php|php3|php4|php5|py|shtml|phtml|cgi|pl|plx|htaccess|htpasswd)';  // Add more extensions but do not remove the ones already present
$_CONFIG['normalize_file_names']                  = 1;
$_CONFIG['normalize_file_delimiter']              = '_';
$_CONFIG['normalize_file_length']                 = 48;
$_CONFIG['link_to_upload']                        = 0;
$_CONFIG['path_to_upload']                        = $agora['server']['ubr_upload']; //Used for web link
$_CONFIG['send_email_on_upload']                  = 0;
$_CONFIG['html_email_support']                    = 0;
$_CONFIG['link_to_upload_in_email']               = 0;
$_CONFIG['email_subject']                         = 'Uber File Upload';
$_CONFIG['to_email_address']                      = 'email1@yoursite.com,email2@yoursite.com';
$_CONFIG['from_email_address']                    = 'admin@yoursite.com';
$_CONFIG['log_uploads']                           = 0;
$_CONFIG['log_dir']                               = '/tmp/ubr_logs/';
$_CONFIG['opera_browser']                         = (strstr(getenv("HTTP_USER_AGENT"), "Opera"))  ? 1 : 0;
$_CONFIG['safari_browser']                        = (strstr(getenv("HTTP_USER_AGENT"), "Safari")) ? 1 : 0;
?>
