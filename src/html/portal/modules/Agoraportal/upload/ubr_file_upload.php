<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_file_upload.php
//   Revision: 1.7
//   Date: 3/23/2008 12:23:42 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
//   Description: Select and submit upload files.
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

$THIS_VERSION = '1.7';

require 'ubr_ini.php';
require 'ubr_lib.php';

if($PHP_ERROR_REPORTING){ error_reporting(E_ALL); }

header('Content-type: text/html; charset=UTF-8');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

//Set config file
if($MULTI_CONFIGS_ENABLED){
	// Put your multi config file code here
	$config_file = 'ubr_default_config.php';
}
else{
	$config_file = $DEFAULT_CONFIG;
}

// Load config file
require $config_file;

//***************************************************************************************************************
// The following possible query string formats are assumed
//
// 1. No query string
// 2. ?about=1
//***************************************************************************************************************
if($DEBUG_PHP){ phpinfo(); exit(); }
elseif($DEBUG_CONFIG){ debug($_CONFIG['config_file_name'], $_CONFIG); exit(); }
elseif(isset($_GET['about']) && $_GET['about'] == 1){
	kak("<u><b>UBER UPLOADER FILE UPLOAD</b></u><br>UBER UPLOADER VERSION =  <b>" . $UBER_VERSION . "</b><br>UBR_FILE_UPLOAD = <b>" . $THIS_VERSION . "</b><br>\n", 1, __LINE__);
}

?>
  <script language="javascript" type="text/javascript">
    var path_to_link_script = "<?php print $PATH_TO_LINK_SCRIPT; ?>";
    var path_to_set_progress_script = "<?php print $PATH_TO_SET_PROGRESS_SCRIPT; ?>";
    var path_to_get_progress_script = "<?php print $PATH_TO_GET_PROGRESS_SCRIPT; ?>";
    var path_to_upload_script = "<?php print $PATH_TO_UPLOAD_SCRIPT; ?>";
    var multi_configs_enabled = <?php print $MULTI_CONFIGS_ENABLED; ?>;
    <?php if($MULTI_CONFIGS_ENABLED){ print "var config_file = \"$config_file\";\n"; } ?>
    var check_allow_extensions_on_client = <?php print $_CONFIG['check_allow_extensions_on_client']; ?>;
    var check_disallow_extensions_on_client = <?php print $_CONFIG['check_disallow_extensions_on_client']; ?>;
    <?php if($_CONFIG['check_allow_extensions_on_client']){ print "var allow_extensions = /" . $_CONFIG['allow_extensions'] . "$/i;\n"; } ?>
    <?php if($_CONFIG['check_disallow_extensions_on_client']){ print "var disallow_extensions = /" . $_CONFIG['disallow_extensions'] . "$/i;\n"; } ?>
    var check_file_name_format = <?php print $_CONFIG['check_file_name_format']; ?>;
    var check_null_file_count = <?php print $_CONFIG['check_null_file_count']; ?>;
    var check_duplicate_file_count = <?php print $_CONFIG['check_duplicate_file_count']; ?>;
    var max_upload_slots = <?php print $_CONFIG['max_upload_slots']; ?>;
    var cedric_progress_bar = <?php print $_CONFIG['cedric_progress_bar']; ?>;
    var cedric_hold_to_sync = <?php print $_CONFIG['cedric_hold_to_sync']; ?>;
    var progress_bar_width = <?php print $_CONFIG['progress_bar_width']; ?>;
    var show_percent_complete = <?php print $_CONFIG['show_percent_complete']; ?>;
    var show_files_uploaded = <?php print $_CONFIG['show_files_uploaded']; ?>;
    var show_current_position = <?php print $_CONFIG['show_current_position']; ?>;
    var show_elapsed_time = <?php print $_CONFIG['show_elapsed_time']; ?>;
    var show_est_time_left = <?php print $_CONFIG['show_est_time_left']; ?>;
    var show_est_speed = <?php print $_CONFIG['show_est_speed']; ?>;
  </script>
  <script language="javascript" type="text/javascript" src="<?php print $PATH_TO_JS_SCRIPT; ?>"></script>

  <div style="margin-left: 50px;">
    <?php if($DEBUG_AJAX){ print "<br><div class=\"debug\" id=\"ubr_debug\"><b>AJAX DEBUG WINDOW</b><br></div><br>\n"; } ?>

    <!-- Start Progress Bar -->
    <div class="alert" id="ubr_alert"></div>
    <div id="progress_bar" style="display:none">
      <div class="bar1" id="upload_status_wrap">
        <div class="bar2" id="upload_status"></div>
      </div>

      <?php if($_CONFIG['show_percent_complete'] || $_CONFIG['show_files_uploaded'] || $_CONFIG['show_current_position'] || $_CONFIG['show_elapsed_time'] || $_CONFIG['show_est_time_left'] || $_CONFIG['show_est_speed']){ ?>
      <br>
      <table class="data" cellpadding='3' cellspacing='1'>
        <?php if($_CONFIG['show_percent_complete']){ ?>
	        <tr>
    			<td align="left"><b>Percentatge completat:</b></td>
				<td align="center"><span id="percent">0%</span></td>
	        </tr>
        <?php } ?>
        <?php if($_CONFIG['show_files_uploaded']){ ?>
			<tr>
				<td><b>Fitxers enviats:</b></td>
				<td align="center"><span id="uploaded_files">0</span> of <span id="total_uploads"></span></td>
			</tr>
		<?php } ?>
        <?php if($_CONFIG['show_current_position']){ ?>
			<tr>
				<td align="left"><b>Posició actual:</b></td>
				<td align="center"><span id="current">0</span> / <span id="total_kbytes"></span> KBytes</td>
			</tr>
        <?php } ?>
        <?php if($_CONFIG['show_elapsed_time']){ ?>
			<tr>
				<td align="left"><b>Temps consumit:</b></td>
				<td align="center"><span id="time">0</span></td>
			</tr>
        <?php } ?>
        <?php if($_CONFIG['show_est_time_left']){ ?>
			<tr>
				<td align="left"><b>Temps restant:</b></td>
				<td align="center"><span id="remain">0</span></td>
			</tr>
        <?php } ?>
        <?php if($_CONFIG['show_est_speed']){ ?>
			<tr>
				<td align="left"><b>Velocitat:</b></td>
				<td align="center"><span id="speed">0</span> KB/s.</td>
			</tr>
        <?php } ?>
      </table>
      <?php } ?>
    </div>
    <!-- End Progress Bar -->

    <?php if($_CONFIG['embedded_upload_results'] || $_CONFIG['opera_browser'] || $_CONFIG['safari_browser']){ ?>
    <div id="upload_div" style="display:none;"><iframe name="upload_iframe" frameborder="0" width="800" height="200" scrolling="auto"></iframe></div>
    <?php } ?>
	
    <!-- Start Upload Form -->
    <form name="form_upload" id="form_upload" <?php if($_CONFIG['embedded_upload_results'] || $_CONFIG['opera_browser'] || $_CONFIG['safari_browser']){ print "target=\"upload_iframe\""; } ?> method="post" enctype="multipart/form-data"  action="#" style="margin: 0px; padding: 0px;">
      <noscript><font color='red'>Warning: </font>Javascript must be enabled to use this uploader.<br><br></noscript>
      <!-- Include extra values you want passed to the upload script here. -->
      <!-- eg. <input type="text" name="employee_num" value="5"> -->
      <!-- Access the value in the CGI with $query->param('employee_num'); -->
      <!-- Access the value in the PHP finished page with $_POST_DATA['employee_num']; -->
      <!-- DO NOT USE "upfile_" for any of your values. -->
      <div id="upload_slots"><input type="file" name="upfile_0" size="50" <?php if($_CONFIG['multi_upload_slots']){ ?>onChange="addUploadSlot(1)"<?php } ?>  onkeypress="return handleKey(event)" value=""></div>
      <br>
      <input type="button" id="reset_button" name="reset_button" value="Cancel·la" onClick="resetForm();">&nbsp;&nbsp;&nbsp;<input type="button" id="upload_button" name="upload_button" value="Envia" onClick="linkUpload();">
    </form>
    <!-- End Upload Form -->
  </div>
  <div id='ajax_div'><!-- Used to store AJAX --></div>
