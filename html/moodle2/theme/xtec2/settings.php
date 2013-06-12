<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Load xtec2_theme_onload only when in theme configuration page of theme xtec2
    global $PAGE;
    if ($CFG->theme == 'xtec2' && $PAGE->pagetype == 'admin-setting-themesettingxtec2') {
        $PAGE->requires->js_init_code('xtec2_theme_onload();');
    }

    // This is the note box for all the settings pages
    $name = 'theme_xtec2/notes';
    $heading = get_string('notes', 'theme_xtec2');
    $information = get_string('notesdesc', 'theme_xtec2');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

    
    // This is the descriptor for the following header settings
    $name = 'theme_xtec2/headerinfo';
    $heading = get_string('headerinfo', 'theme_xtec2');
    $setting = new admin_setting_heading($name, $heading, '');
    $settings->add($setting);

    
    // Set the path to the logo image
    $name = 'theme_xtec2/logo';
    $title = get_string('logo', 'theme_xtec2');
    $description = get_string('logodesc', 'theme_xtec2');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
  	$setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    
    // Select color set
    $name = 'theme_xtec2/colorset';
    $title = get_string('colorset', 'theme_xtec2');
    $description = get_string('colorsetdesc', 'theme_xtec2');
    $default = 'grana';
    $choices = array('personalitzat' => 'Personalitzat', 'grana' => 'Grana (predefinit)', 'coral' => 'Escull de coral', 'or' => 'Febre de l\'or', 'llima' => 'Llima dolça', 'tardor' => 'Tardor', 'nostalgia' => 'Nostàlgia');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color1';
    $title = get_string('color1', 'theme_xtec2');
    $description = get_string('color1desc', 'theme_xtec2');
    $default = '#AC2013';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color2';
    $title = get_string('color2', 'theme_xtec2');
    $description = get_string('color2desc', 'theme_xtec2');
    $default = '#AC2013';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color3';
    $title = get_string('color3', 'theme_xtec2');
    $description = get_string('color3desc', 'theme_xtec2');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color4';
    $title = get_string('color4', 'theme_xtec2');
    $description = get_string('color4desc', 'theme_xtec2');
    $default = '#303030';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color5';
    $title = get_string('color5', 'theme_xtec2');
    $description = get_string('color5desc', 'theme_xtec2');
    $default = '#AC2013';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    $name = 'theme_xtec2/color6';
    $title = get_string('color6', 'theme_xtec2');
    $description = get_string('color6desc', 'theme_xtec2');
    $default = '#D0D0D0';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $settings->add($setting);

    
    // Select color set
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
    $choices = array('moltpetita' => 'Molt petita', 'petita' => 'Petita', 'mitjana' => 'Mitjana', 'gran' => 'Gran', 'moltgran' => 'Molt gran');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
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
    $choices = array('normal' => 'Lletra normal', 'lligada' => 'Lletra lligada', 'majuscules' => 'Lletra en majúscules');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

/*    
    // Select iconset
    $name = 'theme_xtec2/iconset';
    $title = get_string('iconset', 'theme_xtec2');
    $icons_core = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/users.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/edit.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/files.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/admin.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/report.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/scales.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/backup.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/all.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/hide.gif" />&nbsp;
                   <img src="' . $CFG->wwwroot . '/pix/i/guest.gif" />';
    $icons_theme = '<img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/users.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/edit.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/files.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/admin.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/report.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/scales.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/backup.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/all.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/hide.png" />&nbsp;
                    <img src="' . $CFG->wwwroot . '/theme/' . $CFG->theme . '/pix_core/i/guest.png" />';
    $description = get_string('iconsetdesc', 'theme_xtec2') .
                   '<ul style="margin-left:15%;">' .
                   get_string('iconsetdesc1', 'theme_xtec2', $icons_core) .
                   get_string('iconsetdesc2', 'theme_xtec2', $icons_theme) .
                   '</ul>';
    $default = 'tema';
    $choices = array('tema' => 'Personalitzades del tema', 'estandard' => 'Estàndard del Moodle');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
*/

    // Set CSS to be imported
    $name = 'theme_xtec2/importcss';
    $title = get_string('importcss', 'theme_xtec2');
    $description = get_string('importcssdesc', 'theme_xtec2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_CLEAN);
    $settings->add($setting);  

    
    // Set custom css for theme
    $name = 'theme_xtec2/customcss';
    $title = get_string('customcss', 'theme_xtec2');
    $description = get_string('customcssdesc', 'theme_xtec2');
    $setting = new admin_setting_configtextarea($name, $title, $description, null);
    $settings->add($setting);
}