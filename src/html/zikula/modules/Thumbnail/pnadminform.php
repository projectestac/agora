<?php
/** ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation, either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Copyright: Robert Gasch
 *  @package Zikula_Value_Addons
 *  @subpackage Thumbnail
 *  ----------------------------------------------------------------------
 */


/**
 * update module preferences
 *
 */
function Thumbnail_adminform_preferences ()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('Thumbnail', 'admin', 'main'));
    }


    $prefs = FormUtil::getPassedValue('preferences');
    pnModSetVar ('Thumbnail', 'std_image_size_x', $prefs['std_image_size_x']);
    pnModSetVar ('Thumbnail', 'std_image_size_y', $prefs['std_image_size_y']);
    pnModSetVar ('Thumbnail', 'allow_size_override', ($prefs['allow_size_override'] ? 1 : 0));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus (__('Done! Module configuration updated.', $dom));

    return pnRedirect(pnModURL('Thumbnail', 'admin', 'main'));
}


/**
 * update preferences
 */
function Thumbnail_adminform_settings ()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('Thumbnail', 'admin', 'main'));
    }

    $settings = FormUtil::getPassedValue('settings');

    pnModSetVar('Thumbnail', 'cache_directory',                      $settings['cache_directory']);
    pnModSetVar('Thumbnail', 'cache_disable_warning',                isset($settings['cache_disable_warning']) ? $settings['cache_disable_warning'] : 0);
    pnModSetVar('Thumbnail', 'cache_maxage',                         $settings['cache_maxage'] * 86400);
    pnModSetVar('Thumbnail', 'cache_maxsize',                        $settings['cache_maxsize'] * 1024 * 1024);
    pnModSetVar('Thumbnail', 'cache_maxfiles',                       $settings['cache_maxfiles']);
    pnModSetVar('Thumbnail', 'cache_source_enabled',                 isset($settings['cache_source_enabled']) ? $settings['cache_source_enabled'] : 0);
    pnModSetVar('Thumbnail', 'cache_source_directory',               $settings['cache_source_directory']);
    pnModSetVar('Thumbnail', 'cache_source_filemtime_ignore_local',  isset($settings['cache_source_filemtime_ignore_local']) ? $settings['cache_source_filemtime_ignore_local'] : 0);
    pnModSetVar('Thumbnail', 'cache_source_filemtime_ignore_remote', isset($settings['cache_source_filemtime_ignore_remote']) ? $settings['cache_source_filemtime_ignore_remote'] : 0);
    pnModSetVar('Thumbnail', 'cache_default_only_suffix',            $settings['cache_default_only_suffix']);
    pnModSetVar('Thumbnail', 'cache_force_passthru',                 isset($settings['cache_force_passthru']) ? $settings['cache_force_passthru'] : 0);
    pnModSetVar('Thumbnail', 'temp_directory',                       $settings['temp_directory']);
    pnModSetVar('Thumbnail', 'max_source_pixels',                    $settings['max_source_pixels']);
    pnModSetVar('Thumbnail', 'imagemagick_path',                     $settings['imagemagick_path']);
    pnModSetVar('Thumbnail', 'output_format',                        $settings['output_format']);
    pnModSetVar('Thumbnail', 'output_maxwidth',                      $settings['output_maxwidth']);
    pnModSetVar('Thumbnail', 'output_maxheight',                     $settings['output_maxheight']);
    pnModSetVar('Thumbnail', 'output_interlace',                     isset($settings['output_interlace']) ? $settings['output_interlace'] : 0);
    pnModSetVar('Thumbnail', 'error_image_width',                    $settings['error_image_width']);
    pnModSetVar('Thumbnail', 'error_image_height',                   $settings['error_image_height']);
    pnModSetVar('Thumbnail', 'error_message_image_default',          $settings['error_message_image_default']);
    pnModSetVar('Thumbnail', 'error_bgcolor',                        $settings['error_bgcolor']);
    pnModSetVar('Thumbnail', 'error_textcolor',                      $settings['error_textcolor']);
    pnModSetVar('Thumbnail', 'error_fontsize',                       $settings['error_fontsize']);
    pnModSetVar('Thumbnail', 'error_die_on_error',                   isset($settings['error_die_on_error']) ? $settings['error_die_on_error'] : 0);
    pnModSetVar('Thumbnail', 'error_silent_die_on_error',            isset($settings['error_silent_die_on_error']) ? $settings['error_silent_die_on_error'] : 0);
    pnModSetVar('Thumbnail', 'error_die_on_source_failure',          isset($settings['error_die_on_source_failure']) ? $settings['error_die_on_source_failure'] : 0);
    pnModSetVar('Thumbnail', 'nohotlink_enabled',                    isset($settings['nohotlink_enabled']) ? $settings['nohotlink_enabled'] : 0);
    pnModSetVar('Thumbnail', 'nohotlink_valid_domains',              $settings['nohotlink_valid_domains']); //array(@$_SERVER['HTTP_HOST'])
    pnModSetVar('Thumbnail', 'nohotlink_erase_image',                isset($settings['nohotlink_erase_image']) ? $settings['nohotlink_erase_image'] : 0);
    pnModSetVar('Thumbnail', 'nohotlink_text_message',               $settings['nohotlink_text_message']);
    pnModSetVar('Thumbnail', 'nooffsitelink_enabled',                isset($settings['nooffsitelink_enabled']) ? $settings['nooffsitelink_enabled'] : 0);
    pnModSetVar('Thumbnail', 'nooffsitelink_valid_domains',          $settings['nooffsitelink_valid_domains']); //array(@$_SERVER['HTTP_HOST'])
    pnModSetVar('Thumbnail', 'nooffsitelink_require_refer',          isset($settings['nooffsitelink_require_refer']) ? $settings['nooffsitelink_require_refer'] : 0);
    pnModSetVar('Thumbnail', 'nooffsitelink_erase_image',            isset($settings['nooffsitelink_erase_image']) ? $settings['nooffsitelink_erase_image'] : 0);
    pnModSetVar('Thumbnail', 'nooffsitelink_text_message',           $settings['nooffsitelink_text_message']);
    pnModSetVar('Thumbnail', 'border_hexcolor',                      $settings['border_hexcolor']);
    pnModSetVar('Thumbnail', 'background_hexcolor',                  $settings['background_hexcolor']);
    pnModSetVar('Thumbnail', 'ttf_directory',                        $settings['ttf_directory']);
    pnModSetVar('Thumbnail', 'high_security_enabled',                isset($settings['high_security_enabled']) ? $settings['high_security_enabled'] : 0);
    pnModSetVar('Thumbnail', 'high_security_password',               $settings['high_security_password']);
    pnModSetVar('Thumbnail', 'disable_debug',                        isset($settings['disable_debug']) ? $settings['disable_debug'] : 0);
    pnModSetVar('Thumbnail', 'allow_src_above_docroot',              isset($settings['allow_src_above_docroot']) ? $settings['allow_src_above_docroot'] : 0);
    pnModSetVar('Thumbnail', 'allow_src_above_phpthumb',             isset($settings['allow_src_above_phpthumb']) ? $settings['allow_src_above_phpthumb'] : 0);
    pnModSetVar('Thumbnail', 'allow_parameter_file',                 isset($settings['allow_parameter_file']) ? $settings['allow_parameter_file'] : 0);
    pnModSetVar('Thumbnail', 'allow_parameter_goto',                 isset($settings['allow_parameter_goto']) ? $settings['allow_parameter_goto'] : 0);
    pnModSetVar('Thumbnail', 'disable_pathinfo_parsing',             isset($settings['disable_pathinfo_parsing']) ? $settings['disable_pathinfo_parsing'] : 0);
    pnModSetVar('Thumbnail', 'disable_imagecopyresampled',           isset($settings['disable_imagecopyresampled']) ? $settings['disable_imagecopyresampled'] : 0);
    pnModSetVar('Thumbnail', 'disable_onlycreateable_passthru',      isset($settings['disable_onlycreateable_passthru']) ? $settings['disable_onlycreateable_passthru'] : 0);
    pnModSetVar('Thumbnail', 'prefer_imagemagick',                   isset($settings['prefer_imagemagick']) ? $settings['prefer_imagemagick'] : 0);
    pnModSetVar('Thumbnail', 'use_exif_thumbnail_for_speed',         isset($settings['use_exif_thumbnail_for_speed']) ? $settings['use_exif_thumbnail_for_speed'] : 0);
    pnModSetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE',  isset($settings['PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE']) ? $settings['PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE'] : 0);
    pnModSetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_DISABLEGETPARAMS',   isset($settings['PHPTHUMB_DEFAULTS_DISABLEGETPARAMS']) ? $settings['PHPTHUMB_DEFAULTS_DISABLEGETPARAMS'] : 0);

    // the module configuration has been updated successfuly
    LogUtil::registerStatus (__('Done! Module configuration updated.', $dom));

    return pnRedirect(pnModURL('Thumbnail', 'admin', 'main'));
}
