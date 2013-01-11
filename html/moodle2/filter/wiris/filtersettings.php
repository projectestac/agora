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


defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    global $CFG;
    global $wirisconfigurationclass;
    
	require_once('tinyversion.php');
        
	$tiny_version = getTinyMceVersion();
	$libwiris = $CFG->dirroot . '/lib/editor/tinymce/tiny_mce/' . $tiny_version . '/plugins/tiny_mce_wiris/integration/libwiris.php';
        $wirisconfigurationclass = '../../../../../../../../filter/wiris/MoodleConfigurationUpdater.php;com_wiris_plugin_configuration_MoodleConfigurationUpdater';    
        
    if (!file_exists($libwiris)) {
        //Check for Moodle 2.4
        $libwiris = $CFG->dirroot . '/lib/editor/tinymce/plugins/tiny_mce_wiris/integration/libwiris.php';    
        $wirisconfigurationclass = '../../../../../../filter/wiris/MoodleConfigurationUpdater.php;com_wiris_plugin_configuration_MoodleConfigurationUpdater';    
    }
        
    if (file_exists($libwiris)) {
        include_once($libwiris);

        //Editor and CAS checkbox
        $output = '';
        $ini = wrs_loadConfig(WRS_CONFIG_FILE);
        $formula = $ini['wirisformulaeditorenabled'];
        $cas = $ini['wiriscasenabled'];

        //Text to be shown when editor and cas are disabled in MoodleConfigurationUpdater
        if (!$formula) {
			$output = '<div class="form-item clearfix"><div class="form-label" style="color:#aaaaaa;" >WIRIS editor<span class="form-shortname" style="color:#aaaaaa;">filter_wiris_editor_enable</span></div><div class="form-setting"><div class="form-checkbox defaultsnext"><input type="checkbox" disabled="disabled"></div></div><div class="form-description"></div></div>';
        }
        if (!$cas) {
			$output .= '<div class="form-item clearfix"><div class="form-label" style="color:#aaaaaa;">WIRIS cas<span class="form-shortname" style="color:#aaaaaa;">filter_wiris_cas_enable</span></div><div class="form-setting"><div class="form-checkbox defaultsnext"><input type="checkbox" disabled="disabled"></div></div><div class="form-description"></div></div>';			
        }

        $settings->add(new admin_setting_heading('filter_wiris_disabled', '', $output));

        $output = '';
        if ($formula) {
			$settings->add(new admin_setting_configcheckbox('filter_wiris_editor_enable', 'WIRIS editor', '', '1'));
        }else{ 
			if (isset($CFG->filter_wiris_editor_enable) && $CFG->filter_wiris_editor_enable) {
				set_config('filter_wiris_editor_enable', 0, 'config');
				$CFG->filter_wiris_editor_enable = false;
			}
        }

        if ($cas) {
			$settings->add(new admin_setting_configcheckbox('filter_wiris_cas_enable', 'WIRIS cas', '', '1'));
        }else{ 
			if (isset($CFG->filter_wiris_cas_enable) && $CFG->filter_wiris_cas_enable) {
				set_config('filter_wiris_cas_enable', 0, 'config');
				$CFG->filter_wiris_cas_enable = false;
			}
        }
	}else{
                $title = '<br /><br /><br /><span style="color:#aa0000; font-size:18px;">Attention! WIRIS plugin is not installed</span>';
                $info = '<a target="_blank" href="http://www.wiris.com/plugins/docs/moodle"><img style="vertical-align:-3px;" alt="" src="http://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png" /></a>';    
                $output = $title . '<br />WIRIS quizzes for Moodle 2.x needs that WIRIS plugin for TinyMCE is installed on your Moodle. ' . $info;                
	}

	// Clearing cache.
	if (isset($CFG->filter_wiris_clear_cache) && $CFG->filter_wiris_clear_cache) {

		$cache = wrs_getCacheDirectory(wrs_loadConfig(WRS_CONFIG_FILE));
		$directory = opendir($cache);
		
		if ($directory !== false) {
			$file = readdir($directory);
			
			while ($file !== false) {
				$filePath = $cache . '/' . $file;
				if (is_file($filePath)) {
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					if ($ext == 'png'){
						unlink($filePath);
					}
				}
				$file = readdir($directory);
			}
			closedir($directory);
		}
		
		// Disabling the cache clearing for the next request.
		set_config('filter_wiris_clear_cache', 0, 'config');
		$CFG->filter_wiris_clear_cache = false;
	}

	$settings->add(new admin_setting_configcheckbox('filter_wiris_clear_cache', 'Clear cache', $output, '0'));
        
	$wiris_quizzes = dirname(__FILE__) . '/../../question/type/wq/';
	$quizzes_installed = file_exists($wiris_quizzes);

	if ($quizzes_installed){
		$url = $CFG->wwwroot . '/admin/settings.php?section=qtypesettingwq';
		$url = '<a href="' . $url . '">WIRIS quizzes settings</a>';
		$settings->add(new admin_setting_heading('filter_wirisquizzesheading', $url, ''));
	}

        
}