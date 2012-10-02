<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
//
//  Copyright (c) 2011, Maths for More S.L. http://www.wiris.com
//  This file is part of Moodle WIRIS Plugin.
//
//  Moodle WIRIS Plugin is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Moodle WIRIS Plugin is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with Moodle WIRIS Plugin. If not, see <http://www.gnu.org/licenses/>.
//

include '../../config.php';
global $DB;

function wrs_assert($condition, $report_text, $solution_link) {
	if ($condition){
		return $report_text;
	}
	else{
		return '<span class="error">' . $report_text . '</span>' . '<a target="_blank" href="' . $solution_link . '"><img alt="" src="img/help.gif" /></a>';
	}
}

function wrs_getStatus($condition){
	if($condition){
		return '<span class="ok">OK</span>';
	}else{
		return '<span class="error">ERROR</span>';
	}
}

function wrs_createTableRow($test_name, $report_text, $solution_link, $condition){
	$output = '<td>' . $test_name . '</td>';
	$output .= '<td>' . wrs_assert($condition, $report_text, $solution_link) . '</td>';
	$output .= '<td>' . wrs_getStatus($condition) . '</td>';
	return $output;
}
?>

<html>
<head>
	<title>Moodle 2.x WIRIS filter test page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<style type="text/css">
		body{font-family: Arial;}
		span{font-weight: bold;}
		span.ok {color: #009900;}
		span.error {color: #dd0000;}
		table, th, td, tr {
			border: solid 1px #000000;
			border-collapse:collapse;
			padding: 5px;
		}
		th{background-color: #eeeeee;}
		img{border:none;}
	</style>
</head>
<body>
	<h1>Moodle 2.x WIRIS filter test page</h1>
	<table>
			<tr>
				<th>Test</th>
				<th>Report</th>
				<th>Status</th>
			</tr>
			<tr>
				<?php
					$test_name = 'Looking for correct folder';
					$report_text = 'Filter must be installed in Moodle filter folder.';
					$solution_link = 'http://www.wiris.com/en/plugins/docs/moodle/moodle-2.0';
					$actual_folder = realpath(dirname(__FILE__));
					$correct_folder = realpath($CFG->dirroot . '/filter/wiris');
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $actual_folder == $correct_folder);
				?>
			</tr>
			<tr>
				<?php
					$test_name = 'Looking for filter files';
					$report_text = 'WIRIS plugin for Moodle 2.x must be installed.';
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					$filter_files = Array('filter.php', 'MoodleConfigurationUpdater.php', 'tinyversion.php', 'version.php');
					$exist = true;
					foreach ($filter_files as $value){
						$condition = file_exists($value);
						if (!$condition){
							$exist = false;
						}
					}
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $exist);
				?>			
			</tr>				
			<tr>	
				<?php
					@include 'version.php';				
					$test_name = 'Looking for WIRIS filter version';
					if (isset($plugin->release)){
						$report_text = '<span>' . $plugin->release . '</span>';
						$condition = true;
					}else{
						$report_text = 'Impossible to find WIRIS version file.';
						$condition = false;
					}
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>				
			</tr>
			<tr>			
				<?php
					$test_name = 'WIRIS Filter';
					$solution_link = 'http://www.wiris.com/es/plugins/docs/moodle/moodle-2.0';
					try{
						$filter_rec = $DB->get_record('filter_active', array('filter' => 'filter/wiris'));
						if ($filter_rec && $filter_rec->active == 1){
							$report_text = 'ENABLED';
							$condition = true;
						}else{
							$report_text = 'DISABLED';
							$condition = false;
						}
					}catch(Exception $ex){
						echo 'Impossible to access the database.';
					}					
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>			
			</tr>			
			<tr>			
				<?php
					include '../../lib/editor/tinymce/version.php';
					$test_name = 'Looking for WIRIS plugin for TinyMCE';
					$report_text = 'WIRIS plugin for TinyMCE must be installed.';
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					$tiny_ver = $plugin->release;
					$wiris_plugin = '../../lib/editor/tinymce/tiny_mce/' . $tiny_ver . '/plugins/tiny_mce_wiris/integration';
					$condition = file_exists($wiris_plugin);					
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>			
			</tr>
			<tr>	
				<?php
					@include 'version.php';				
					$test_name = 'Matching WIRIS filter and plugin versions';
					if (isset($plugin->release)){
						$filter_version = $plugin->release;
					}else{
						$report_text = '';
					}
					include '../../lib/editor/tinymce/version.php';
					$tiny_version = $plugin->release;
					$file = '../../lib/editor/tinymce/tiny_mce/' . $tiny_version . '/plugins/tiny_mce_wiris/VERSION';
					if (@fopen($file, 'r')){
						$content = file($file);
						$plugin_version = $content[0];
					}else{
						$plugin_version = "";
					}
					if ($filter_version == $plugin_version){
						$report_text = 'WIRIS filter and plugin have the same version';
						$condition = true;
					}else{
						$report_text = 'WIRIS filter and WIRIS plugin versions don\'t match';
						$condition = false;
					}
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>				
			</tr>			
	</table>

	<p>
	<br/>
	Click the following button to test if the WIRIS plugin for TinyMCE is correctly installed.<br/>
	<?php
		$link = $wiris_plugin . '/test.php';
		echo '<input type="button" value="WIRIS plugin for TinyMCE tests" onClick="javascript:window.open(\'' . $link . '\');" /><br/>';
	?>
	</p>
	<p><br/><span style="font-size:14px; font-weight:normal;">For more information or if you have any doubt contact WIRIS Support: (support@wiris.com)</span></p>
</body>
</html>