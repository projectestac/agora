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
include '../../lib/editor/tinymce/lib.php';

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

//Used to find the position of WIRIS plugin (Starting from Moodle 2.4 it changes the folder used to install the plugins)
$tinyEditor = new tinymce_texteditor();
$tiny_ver = $tinyEditor->version;
$wiris_plugin_base = '../../lib/editor/tinymce/tiny_mce/' . $tiny_ver . '/plugins/tiny_mce_wiris';
if (!file_exists($wiris_plugin_base)){
    $wiris_plugin_base = '../../lib/editor/tinymce/plugins/tiny_mce_wiris';    
}
?>

<html>
<head>
	<title>Moodle 2.x WIRIS plugin filter test page</title>
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
	<h1>Moodle 2.x WIRIS plugin filter test page</h1>
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
					$report_text = 'WIRIS plugin filter for Moodle 2.x must be installed.';
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
					$test_name = 'Looking for WIRIS plugin filter version';
					if (isset($plugin->release)){
						$report_text = '<span>' . $plugin->release . '</span>';
						$condition = true;
					}else{
						$report_text = 'Impossible to find WIRIS plugin filter version file.';
						$condition = false;
					}
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>				
			</tr>
			<tr>			
				<?php
					$test_name = 'WIRIS plugin filter';
					$solution_link = 'http://www.wiris.com/es/plugins/docs/moodle/moodle-2.0';
                    $filter_enabled = filter_is_enabled('filter/wiris');
                    if ($filter_enabled){
                        $report_text = 'ENABLED';
                    }else{
                        $report_text = 'DISABLED';
                    }
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $filter_enabled);
				?>			
			</tr>			
			<tr>			
				<?php
					$test_name = 'Looking for WIRIS plugin for TinyMCE';
					$report_text = 'WIRIS plugin for TinyMCE must be installed.';
					$solution_link = 'http://www.wiris.com/en/plugins/moodle/download';
					$wiris_plugin = $wiris_plugin_base. '/integration';
					$condition = file_exists($wiris_plugin);					
                                        if (!$condition){
                                            $wiris_plugin = '../../lib/editor/tinymce/plugins/tiny_mce_wiris/integration';    
                                            $condition = file_exists($wiris_plugin);    
                                        }
					echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
				?>			
			</tr>
			<tr>	
				<?php
					@include 'version.php';				
					$test_name = 'Matching WIRIS plugin filter and WIRIS plugin for TinyMCE versions';
					if (isset($plugin->release)){
						$filter_version = $plugin->release;
					}else{
						$report_text = '';
					}
					include '../../lib/editor/tinymce/version.php';
					$file = $wiris_plugin_base . '/VERSION';
					if (@fopen($file, 'r')){
						$content = file($file);
						$plugin_version = $content[0];
					}else{
						$plugin_version = "";
					}
					if ($filter_version == $plugin_version){
						$report_text = 'WIRIS plugin filter and WIRIS plugin for TinyMCE have the same version';
						$condition = true;
					}else{
						$report_text = 'WIRIS plugin filter and WIRIS plugin for TinyMCE versions don\'t match';
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
		$link = $wiris_plugin_base . '/integration/test.php';
		echo '<input type="button" value="WIRIS plugin for TinyMCE tests" onClick="javascript:window.open(\'' . $link . '\');" /><br/>';
	?>
	</p>
	<p><br/><span style="font-size:14px; font-weight:normal;">For more information or if you have any doubt contact WIRIS Support: (<a href="mailto:support@wiris.com">support@wiris.com</a>)</span></p>
</body>
</html>