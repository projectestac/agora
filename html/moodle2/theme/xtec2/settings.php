<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's Clean theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_xtec2
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	global $PAGE;
	$PAGE->requires->js_init_code('xtec2_theme_onload();');

    // Header settings
    $setting = new admin_setting_heading('theme_xtec2/header_settings', get_string('header_settings', 'theme_xtec2'),"");
    $settings->add($setting);

    $name = 'theme_xtec2/logo';
    $title = get_string('logo','theme_xtec2');
    $description = get_string('logodesc', 'theme_xtec2');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    $name = 'theme_xtec2/logo_color';
    $title = get_string('logo_color', 'theme_xtec2');
    $default = '#675A70';
    $setting = new admin_setting_configcolourpicker($name, $title, "", $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    $name = 'theme_xtec2/logo_color_transparency';
    $title = get_string('logo_color_transparency', 'theme_xtec2');
    $default = 40;
    $choices = array(0 => get_string('disabled', 'theme_xtec2'),
                    20 => '20%',
                    40 => '40%',
                    50 => '50%',
                    60 => '60%',
                    80 => '80%',
                    100 => '100%');
    $setting = new admin_setting_configselect($name, $title, "", $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    $name = 'theme_xtec2/top_menus';
    $title = get_string('top_menus', 'theme_xtec2');
    $description = get_string('top_menus_description', 'theme_xtec2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Layout settings
    $setting = new admin_setting_heading('theme_xtec2/layout_settings', get_string('layout_settings', 'theme_xtec2'),"");
    $settings->add($setting);

    $name = 'theme_xtec2/block_layout';
    $title = get_string('block_layout', 'theme_xtec2');
    $default = 'left';
    $choices = array(/*'none' => get_string('without_blocks', 'theme_xtec2'),*/
                    'left' => get_string('blocks_left', 'theme_xtec2'),
                    'right' => get_string('blocks_right', 'theme_xtec2'),
                    'both' => get_string('blocks_both', 'theme_xtec2'));
    $setting = new admin_setting_configselect($name, $title, "", $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footer Params
    $setting = new admin_setting_heading('theme_xtec2/footer_settings', get_string('footer_settings', 'theme_xtec2'), "");
    $settings->add($setting);

    $name = 'theme_xtec2/footnote';
    $title = get_string('footnote', 'theme_xtec2');
    $description = get_string('footnotedesc', 'theme_xtec2');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);

  if(is_service_enabled('nodes')){
    $name = 'theme_xtec2/nodes';
    $title = get_string('nodes', 'theme_xtec2');
    $description = get_string('nodesdesc', 'theme_xtec2');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);
  }

  if(is_service_enabled('intranet')){
    $name = 'theme_xtec2/intranet';
    $title = get_string('intranet', 'theme_xtec2');
    $description = get_string('intranetdesc', 'theme_xtec2');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);
  }

    $description_url_desc = get_string('urldesc', 'theme_xtec2');

    $name = 'theme_xtec2/facebook';
    $title = get_string('facebook', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/twitter';
    $title = get_string('twitter', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/googleplus';
    $title = get_string('googleplus', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/instagram';
    $title = get_string('instagram', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/flickr';
    $title = get_string('flickr', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/linkedin';
    $title = get_string('linkedin', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/pinterest';
    $title = get_string('pinterest', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);

    $name = 'theme_xtec2/youtube';
    $title = get_string('youtube', 'theme_xtec2');
    $setting = new admin_setting_configtext($name, $title, $description_url_desc, '', PARAM_URL);
    $setting->set_updatedcallback('theme_xtec2_clean_cache');
    $settings->add($setting);


    // Select color set
    $setting = new admin_setting_heading('theme_xtec2/color_settings', get_string('color_settings', 'theme_xtec2'), get_string('colorsetdesc', 'theme_xtec2'));
    $settings->add($setting);

    $name = 'theme_xtec2/colorset';
    $title = get_string('colorset', 'theme_xtec2');
    $default = 'grana';
    $choices = array('personalitzat' => get_string('custom', 'theme_xtec2'),
                    'grana' => get_string('grana', 'theme_xtec2'),
                    'coral' => get_string('coral', 'theme_xtec2'),
                    'or' => get_string('or', 'theme_xtec2'),
                    'llima' => get_string('llima', 'theme_xtec2'),
                    'tardor' => get_string('tardor', 'theme_xtec2'),
                    'nostalgia' => get_string('nostalgia', 'theme_xtec2'));
    $setting = new admin_setting_configselect($name, $title, "", $default, $choices);
    $settings->add($setting);

    require_once($CFG->dirroot.'/theme/xtec2/lib.php');

    $name = 'theme_xtec2/color2';
    $title = get_string('color2', 'theme_xtec2');
    $default = '#AC2013';
    $setting = new admin_setting_configcolourpicker($name, $title, '', $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    $name = 'theme_xtec2/color4';
    $title = get_string('color4', 'theme_xtec2');
    $default = '#303030';
    $colorwarning = get_string('color_warning', 'theme_xtec2', theme_xtec2_get_YIQ(get_config('theme_xtec2','color4')));
    $setting = new admin_setting_configcolourpicker($name, $title, $colorwarning , $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    $name = 'theme_xtec2/color5';
    $title = get_string('color5', 'theme_xtec2');
    $default = '#AC2013';
    $colorwarning = get_string('color_warning', 'theme_xtec2', theme_xtec2_get_YIQ(get_config('theme_xtec2','color5')));
    $setting = new admin_setting_configcolourpicker($name, $title, $colorwarning, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);


    // Select font settings
    $setting = new admin_setting_heading('theme_xtec2/font_settings', get_string('font_settings', 'theme_xtec2'), "");
    $settings->add($setting);

    $name = 'theme_xtec2/fontsize';
    $title = get_string('fontsize', 'theme_xtec2');
    $description = get_string('fontsizedesc', 'theme_xtec2') .
                   '<ul style="margin-left:15%;">' .
                   '<li><span style="font-size:10px">' .
                   get_string('fontsizedesc1', 'theme_xtec2') .
                   '</span></li>' .
                   '<li><span style="font-size:12px">' .
                   get_string('fontsizedesc2', 'theme_xtec2') .
                   '</span></li>' .
                   '<li><span style="font-size:14px">' .
                   get_string('fontsizedesc3', 'theme_xtec2') .
                   '</span></li>' .
                   '<li><span style="font-size:16px">' .
                   get_string('fontsizedesc4', 'theme_xtec2') .
                   '</span></li>' .
                   '<li><span style="font-size:18px">' .
                   get_string('fontsizedesc5', 'theme_xtec2') .
                   '</span></li>' .
                   '</ul>';
    $default = 'mitjana';
    $choices = array('moltpetita' => get_string('fontsizedesc1', 'theme_xtec2'),
    				'petita' => get_string('fontsizedesc2', 'theme_xtec2'),
    				'mitjana' => get_string('fontsizedesc3', 'theme_xtec2'),
    				'gran' => get_string('fontsizedesc4', 'theme_xtec2'),
    				'moltgran' => get_string('fontsizedesc5', 'theme_xtec2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);


    // Select font style
    $name = 'theme_xtec2/fontstyle';
    $title = get_string('fontstyle', 'theme_xtec2');
    $description = get_string('fontstyledesc', 'theme_xtec2') .
                   '<ul style="margin-left:15%;">' .
                   '<li><span style="font-family: arial, helvetica, clean, sans-serif;">' .
                   get_string('fontstyledesc1', 'theme_xtec2') .
                   '</span></li>' .
                   '<li><span style="font-family:Abecedario;">' .
                   get_string('fontstyledesc2', 'theme_xtec2') .
                   '</span></li>'.
                   '<li><span style="text-transform:uppercase;">' .
                   get_string('fontstyledesc3', 'theme_xtec2') .
                   '</span></li>' .
                   '</ul>';
    $default = 'normal';
    $choices = array('normal' =>  get_string('fontstyledesc1', 'theme_xtec2'),
    				'lligada' =>  get_string('fontstyledesc2', 'theme_xtec2'),
    				'majuscules' => get_string('fontstyledesc3', 'theme_xtec2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Select font settings
    $setting = new admin_setting_heading('theme_xtec2/css_settings', get_string('css_settings', 'theme_xtec2'), "");
    $settings->add($setting);

    // Set CSS to be imported
    $name = 'theme_xtec2/importcss';
    $title = get_string('importcss', 'theme_xtec2');
    $description = get_string('importcssdesc', 'theme_xtec2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_CLEAN);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_xtec2/customcss';
    $title = get_string('customcss', 'theme_xtec2');
    $description = get_string('customcssdesc', 'theme_xtec2');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

}
