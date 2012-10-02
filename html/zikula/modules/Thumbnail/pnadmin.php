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
 * main admin function
 */
function Thumbnail_admin_main()
{
   return Thumbnail_admin_preferences ();
}

/**
 * display module references
 */
function Thumbnail_admin_preferences ()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $pnRender = pnRender::getInstance('Thumbnail', false);
    $pnRender->assign('std_image_size_x',    pnModGetVar('Thumbnail', 'std_image_size_x', 100));
    $pnRender->assign('std_image_size_y',    pnModGetVar('Thumbnail', 'std_image_size_y', 100));
    $pnRender->assign('allow_size_override', pnModGetVar('Thumbnail', 'allow_size_override', true));
    return $pnRender->fetch('thumbnail_form_preferences.html');
}

function Thumbnail_admin_settings ()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $settings = array();
    $settings['cache_directory'] =                      pnModGetVar('Thumbnail', 'cache_directory', dirname(__FILE__).'/includes/phpThumb/cache/'); // dirname(__FILE__).'/cache/'
    $settings['cache_disable_warning'] =                pnModGetVar('Thumbnail', 'cache_disable_warning', false) ? 1 : 0; // false
    $settings['cache_maxage'] =                         pnModGetVar('Thumbnail', 'cache_maxage', 86400 * 30) / 86400; // 86400 * 30
    $settings['cache_maxsize'] =                        pnModGetVar('Thumbnail', 'cache_maxsize', 10 * 1024 * 1024) / (1024*1024); //10 * 1024 * 1024
    $settings['cache_maxfiles'] =                       pnModGetVar('Thumbnail', 'cache_maxfiles', 200); // 200
    $settings['cache_source_enabled'] =                 pnModGetVar('Thumbnail', 'cache_source_enabled', false) ? 1 : 0; //false;
    $settings['cache_source_directory'] =               pnModGetVar('Thumbnail', 'cache_source_directory', dirname(__FILE__).'/includes/phpThumb/cache/source/'); //dirname(__FILE__).'/cache/source/';
    $settings['cache_source_filemtime_ignore_local'] =  pnModGetVar('Thumbnail', 'cache_source_filemtime_ignore_local', false) ? 1 : 0; //false;
    $settings['cache_source_filemtime_ignore_remote'] = pnModGetVar('Thumbnail', 'cache_source_filemtime_ignore_local', true) ? 1 : 0; //true;
    $settings['cache_default_only_suffix'] =            pnModGetVar('Thumbnail', 'cache_default_only_suffix', ''); // ''
    $settings['cache_force_passthru'] =                 pnModGetVar('Thumbnail', 'cache_force_passthru', true) ? 1 : 0; //true;
    $settings['temp_directory'] =                       pnModGetVar('Thumbnail', 'temp_directory', null);  // null
    $settings['max_source_pixels'] =                    pnModGetVar('Thumbnail', 'max_source_pixels', 0); //round(max(intval(ini_get('memory_limit')), intval(get_cfg_var('memory_limit'))) * 1048576 * 0.20);
    $settings['imagemagick_path'] =                     pnModGetVar('Thumbnail', 'imagemagick_path', 'C:/Program Files/ImageMagick-6.2.5-Q16/convert.exe'); //C:/Program Files/ImageMagick-6.2.5-Q16/convert.exe
    $settings['output_format'] =                        pnModGetVar('Thumbnail', 'output_format', 'jpeg'); //'jpeg'
    $settings['output_maxwidth'] =                      pnModGetVar('Thumbnail', 'output_maxwidth', 0); //0
    $settings['output_maxheight'] =                     pnModGetVar('Thumbnail', 'output_maxheight', 0); //0
    $settings['output_interlace'] =                     pnModGetVar('Thumbnail', 'output_interlace', true) ? 1 : 0; //true;
    $settings['error_image_width'] =                    pnModGetVar('Thumbnail', 'error_image_width', 400);  //400
    $settings['error_image_height'] =                   pnModGetVar('Thumbnail', 'error_image_height', 100); //100
    $settings['error_message_image_default'] =          pnModGetVar('Thumbnail', 'error_message_image_default', '');  // ''
    $settings['error_bgcolor'] =                        pnModGetVar('Thumbnail', 'error_bgcolor', 'CCCCFF'); //'CCCCFF'
    $settings['error_textcolor'] =                      pnModGetVar('Thumbnail', 'error_textcolor', 'FF0000'); //'FF0000'
    $settings['error_fontsize'] =                       pnModGetVar('Thumbnail', 'error_fontsize', 1); //1
    $settings['error_die_on_error'] =                   pnModGetVar('Thumbnail', 'error_die_on_error', true) ? 1 : 0; // true
    $settings['error_silent_die_on_error'] =            pnModGetVar('Thumbnail', 'error_silent_die_on_error', false) ? 1 : 0; // false
    $settings['error_die_on_source_failure'] =          pnModGetVar('Thumbnail', 'error_die_on_source_failure', true) ? 1 : 0; // true
    $settings['nohotlink_enabled'] =                    pnModGetVar('Thumbnail', 'nohotlink_enabled', true) ? 1 : 0; // true
    $settings['nohotlink_valid_domains'] =              pnModGetVar('Thumbnail', 'nohotlink_valid_domains', implode(';',array(@$_SERVER['HTTP_HOST']))); //array(@$_SERVER['HTTP_HOST'])
    $settings['nohotlink_erase_image'] =                pnModGetVar('Thumbnail', 'nohotlink_erase_image', false) ? 1 : 0; // false
    $settings['nohotlink_text_message'] =               pnModGetVar('Thumbnail', 'nohotlink_text_message', 'Off-server thumbnailing is not allowed');// 'Off-server thumbnailing is not allowed'
    $settings['nooffsitelink_enabled'] =                pnModGetVar('Thumbnail', 'nooffsitelink_enabled', true) ? 1 : 0; // true
    $settings['nooffsitelink_valid_domains'] =          pnModGetVar('Thumbnail', 'nooffsitelink_valid_domains', implode(';',array(@$_SERVER['HTTP_HOST']))); //array(@$_SERVER['HTTP_HOST'])
    $settings['nooffsitelink_require_refer'] =          pnModGetVar('Thumbnail', 'nooffsitelink_require_refer', false) ? 1 : 0; // false
    $settings['nooffsitelink_erase_image'] =            pnModGetVar('Thumbnail', 'nooffsitelink_erase_image', true) ? 1 : 0; // true
    $settings['nooffsitelink_text_message'] =           pnModGetVar('Thumbnail', 'nooffsitelink_text_message', 'Image taken from '.@$_SERVER['HTTP_HOST']);
    $settings['border_hexcolor'] =                      pnModGetVar('Thumbnail', 'border_hexcolor', '000000'); // '000000'
    $settings['background_hexcolor'] =                  pnModGetVar('Thumbnail', 'background_hexcolor', 'FFFFFF'); // 'FFFFFF'
    $settings['ttf_directory'] =                        pnModGetVar('Thumbnail', 'ttf_directory', dirname(__FILE__).'/includes/phpThumb/fonts'); // dirname(__FILE__).'/fonts';
    $settings['high_security_enabled'] =                pnModGetVar('Thumbnail', 'high_security_enabled', false) ? 1 : 0; // false
    $settings['high_security_password'] =               pnModGetVar('Thumbnail', 'high_security_password', '');  // ''
    $settings['disable_debug'] =                        pnModGetVar('Thumbnail', 'disable_debug', false) ? 1 : 0; // false
    $settings['allow_src_above_docroot'] =              pnModGetVar('Thumbnail', 'allow_src_above_docroot', false) ? 1 : 0; // false
    $settings['allow_src_above_phpthumb'] =             pnModGetVar('Thumbnail', 'allow_src_above_phpthumb', true) ? 1 : 0; // true
    $settings['allow_parameter_file'] =                 pnModGetVar('Thumbnail', 'allow_parameter_file', false) ? 1 : 0; // false
    $settings['allow_parameter_goto'] =                 pnModGetVar('Thumbnail', 'allow_parameter_goto', false) ? 1 : 0; // false
    $settings['disable_pathinfo_parsing'] =             pnModGetVar('Thumbnail', 'disable_pathinfo_parsing', false) ? 1 : 0; // false
    $settings['disable_imagecopyresampled'] =           pnModGetVar('Thumbnail', 'disable_imagecopyresampled', false) ? 1 : 0; // false
    $settings['disable_onlycreateable_passthru'] =      pnModGetVar('Thumbnail', 'disable_onlycreateable_passthru', true) ? 1 : 0; // true
    $settings['prefer_imagemagick'] =                   pnModGetVar('Thumbnail', 'prefer_imagemagick', true) ? 1 : 0; // true
    $settings['use_exif_thumbnail_for_speed'] =         pnModGetVar('Thumbnail', 'use_exif_thumbnail_for_speed', false) ? 1 : 0; // false
    $settings['PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE'] =  pnModGetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE', true) ? 1 : 0; // true
    $settings['PHPTHUMB_DEFAULTS_DISABLEGETPARAMS'] =   pnModGetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_DISABLEGETPARAMS', false) ? 1 : 0; // false

    $pnRender = pnRender::getInstance('Thumbnail', false);
    $pnRender->assign('Settings', $settings);
    return $pnRender->fetch('thumbnail_form_settings.html');
}

function Thumbnail_admin_check ()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $path     = 'includes/phpThumb/';
    $fullPath = realpath('modules/Thumbnail/'.$path).'/';

    require_once $path.'phpthumb.class.php';
    $phpThumb = new phpThumb();
    if (include_once($path.'phpThumb.config.php')) {
        foreach ($PHPTHUMB_CONFIG as $key => $value) {
            $keyname = 'config_'.$key;
            $phpThumb->setParameter($keyname, $value);
        }
    }

    $serverInfo['gd_string']  = phpthumb_functions::gd_version(true);
    $serverInfo['gd_numeric'] = phpthumb_functions::gd_version(false);
    $serverInfo['im_version'] = $phpThumb->ImageMagickVersion();
    $gd_info                  = gd_info();

    $versions['raw'] = array(
        'latest' => phpthumb_functions::SafeURLread('http://phpthumb.sourceforge.net/?latestversion=1', $dummy),
        'this'   => $phpThumb->phpthumb_version,
    );

    foreach ($versions['raw'] as $key => $value) {
        eregi('^([0-9\.]+)\-?(([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2}))?', $value, $matches);
        @list($huge, $major, $minor) = @explode('.', @$matches[1]);
        @list($year, $month, $day, $hour, $min) = @$matches[3];
        $versions['base'][$key]  = $matches[1];
        $versions['huge'][$key]  = $huge;
        $versions['major'][$key] = $major;
        $versions['minor'][$key] = $minor;
        $versions['stamp'][$key] = $matches[2];
        $versions['year'][$key]  = $year;
        $versions['month'][$key] = $month;
        $versions['day'][$key]   = $day;
        $versions['hour'][$key]  = $hour;
        $versions['min'][$key]   = $min;
        $versions['date'][$key]  = @mktime($hour, $min, 0, $month, $day, $year);
    }

    $downloadlatest = __('Download the latest version from <a href="http://phpthumb.sourceforge.net">http://phpthumb.sourceforge.net</a>', $dom);

    $settings = array();
    /************************************************************************************************************************/
    $hlp['header']  = 'Latest phpThumb version';
    $hlp['color']   = '';
    $hlp['value']   = $versions['raw']['latest'];
    $hlp['message'] = $downloadlatest;
    $settings[]     = $hlp;
    unset($hlp);
    /************************************************************************************************************************/

    $hlp['header']     = __('This phpThumb version', $dom);
    if (!$versions['base']['latest']) {
        // failed to get latest version number
        $hlp['color']     = 'white';
        $hlp['message'] = __('Latest version unknown.', $dom).'<br />'.$downloadlatest;
    } elseif (phpthumb_functions::version_compare_replacement($versions['base']['this'], $versions['base']['latest'], '>')) {
        // new than latest, must be beta version
        $hlp['color']     = 'lightblue';
        $hlp['message'] = __('This must be a pre-release beta version. Please report bugs to:', $dom).' <a href="mailto:info@silisoftware.com">info@silisoftware.com</a>';
    } elseif (($versions['base']['latest'] == $versions['base']['this']) && ($versions['stamp']['this'] > $versions['stamp']['latest'])) {
        // new than latest, must be beta version
        $hlp['color']     = 'lightblue';
        $hlp['message'] = __('You must be using a pre-release beta version. Please report bugs to:', $dom) .' <a href="mailto:info@silisoftware.com">info@silisoftware.com</a>';
    } elseif ($versions['base']['latest'] == $versions['base']['this']) {
        // latest version
        $hlp['color']     = 'lime';
        $hlp['message'] = __('You are using the latest released version.', $dom);
    } elseif ($versions['huge']['latest'].$versions['major']['latest'] == $versions['huge']['this'].$versions['major']['this']) {
        $hlp['color']     = 'olive';
        $hlp['message'] = __('One (or more) minor version(s) have been released since this version.', $dom).'<br />'.$downloadlatest;
    } elseif (floatval($versions['huge']['latest'].str_pad($versions['major']['latest'], 2, '0', STR_PAD_LEFT)) < floatval($versions['huge']['this'].str_pad($t_major, 2, '0', STR_PAD_LEFT))) {
        $hlp['color']     = 'yellow';
        $hlp['message'] = __('One (or more) major version(s) have been released since this version, you really should upgrade.', $dom) . '<br />'.$downloadlatest;
    } else {
        $hlp['color']     = 'orange';
        $hlp['message'] = __('Fundamental changes have been made since this version.', $dom) .'<br />'.$downloadlatest;
    }
    $hlp['value'] = $phpThumb->phpthumb_version;
    $settings   = $hlp;
    unset($hlp);

    /************************************************************************************************************************/
    $hlp['header']     = 'phpThumb.config.php';
    if (file_exists($fullPath.'phpThumb.config.php') && !file_exists($fullPath.'phpThumb.config.php.default')) {
        $hlp['color']     = 'lime';
        $hlp['value']     = __('"phpThumb.config.php" exists and "phpThumb.config.php.default" does not', $dom);
    } elseif (file_exists($fullPath.'phpThumb.config.php') && file_exists($fullPath.'phpThumb.config.php.default')) {
        $hlp['color']     = 'yellow';
        $hlp['value']     = __('"phpThumb.config.php" and "phpThumb.config.php.default" both exist', $dom);
    } elseif (!file_exists($fullPath.'phpThumb.config.php') && file_exists($fullPath.'phpThumb.config.php.default')) {
        $hlp['color']     = 'yellow';
        $hlp['value']     = __('rename "phpThumb.config.php.default" to "phpThumb.config.php"', $dom);
    } else {
        $hlp['color']     = 'yellow';
        $hlp['value']     = __('"phpThumb.config.php" not found (nor "phpThumb.config.php")', $dom);
    }
    $hlp['message']     = __('"phpThumb.config.php.default" that comes in the distribution must be renamed to "phpThumb.config.php" before phpThumb.php can be used. Avoid having both files present to minimize confusion.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = 'cache directory';
    $orig_config_cache_directory = $phpThumb->config_cache_directory;
    $phpThumb->setCacheDirectory();
    $hlp['value']      = '<div style="background-color: '.(     is_dir($phpThumb->config_cache_directory) ? 'lime;">exists' : 'red;">does NOT exist').'</div>';
    $hlp['value']     .= '<div style="background-color: '.(is_readable($phpThumb->config_cache_directory) ? 'lime;">readable' : 'red;">NOT readable').'</div>';
    $hlp['value']     .= '<div style="background-color: '.(is_writable($phpThumb->config_cache_directory) ? 'lime;">writable' : 'red;">NOT writable').'</div>';
    $hlp['message']    = 'Original: "'.htmlentities($orig_config_cache_directory).'"<br />Resolved: "'.htmlentities($phpThumb->config_cache_directory).'"<br />Must exist and be both readable and writable by PHP.';
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = 'temp directory';
    $orig_config_temp_directory = $phpThumb->config_temp_directory;
    $phpThumb->phpThumb_tempnam();
    $hlp['value']      = '<div style="background-color: '.(     is_dir($phpThumb->config_temp_directory) ? 'lime;">exists' : 'red;">does NOT exist').'</div>';
    $hlp['value']     .= '<div style="background-color: '.(is_readable($phpThumb->config_temp_directory) ? 'lime;">readable' : 'red;">NOT readable').'</div>';
    $hlp['value']     .= '<div style="background-color: '.(is_writable($phpThumb->config_temp_directory) ? 'lime;">writable' : 'red;">NOT writable').'</div>';
    $hlp['message']    = 'Original: "'.htmlentities($orig_config_temp_directory).'"<br />Resolved: "'.htmlentities($phpThumb->config_temp_directory).'"<br />Must exist and be both readable and writable by PHP';
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = 'PHP version';
    if (phpthumb_functions::version_compare_replacement(phpversion(), '5.0.0', '>=')) {
        $hlp['color'] = 'lime';
    } elseif (phpthumb_functions::version_compare_replacement(phpversion(), '4.4.2', '=')) {
        $hlp['color'] = 'darkgreen';
    } elseif (phpthumb_functions::version_compare_replacement(phpversion(), '4.3.3', '>=')) {
        $hlp['color'] = 'lightgreen';
    } elseif (phpthumb_functions::version_compare_replacement(phpversion(), '4.2.0', '>=')) {
        $hlp['color'] = 'green';
    } elseif (phpthumb_functions::version_compare_replacement(phpversion(), '4.1.0', '>=')) {
        $hlp['color'] = 'yellow';
    } elseif (phpthumb_functions::version_compare_replacement(phpversion(), '4.0.6', '>=')) {
        $hlp['color'] = 'orange';
    } else {
        $hlp['color'] = 'red';
    }
    $hlp['value']       = phpversion();
    $hlp['message']   = __('PHP5 is ideal (support for numerous built-in filters which are much faster than my code).<br />PHP v4.4.2 contains a bug in fopen over HTTP (phpThumb has a workaround)<br />PHP v4.3.2+ supports ImageSaveAlpha which is required for proper PNG/ICO output.<br />ImageRotate requires PHP v4.3.0+ (but buggy before v4.3.3).<br />EXIF thumbnail extraction requires PHP v4.2.0+.<br />Most things will work back to PHP v4.1.0, and mostly (perhaps buggy) back to v4.0.6, but no guarantees for any version older than that.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = 'GD version';
    if ($serverInfo['gd_numeric'] >= 2) {
        if (eregi('bundled', @$serverInfo['gd_string'])) {
            $hlp['color'] = 'lime';
        } else {
            $hlp['color'] = 'yellow';
        }
    } elseif ($serverInfo['im_version']) {
        $hlp['color'] = 'orange';
    } else {
        $hlp['color'] = 'red';
    }
    $hlp['value']     = @$serverInfo['gd_string'];
    $hlp['message']     = __('GD2-bundled version is ideal.<br />GD2 (non-bundled) is second choice, but there are a number of bugs in the non-bundled version. ImageRotate is only available in the bundled version of GD2.<br />GD1 will also (mostly) work, at much-reduced image quality and several features disabled. phpThumb can perform most operations with ImageMagick only, even if GD is not available.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = __('ImageMagick version', $dom);
    if (eregi(' ([0-9]+)/([0-9]+)/([0-9]+) ', $serverInfo['im_version'], $matches)) {
        list($dummy, $m, $d, $y) = $matches;
        if ($y < 70) {
            $y += 2000;
        } elseif ($y < 100) {
            $y += 1900;
        }
        $IMreleaseDate = mktime(12, 0, 0, $m, $d, $y);
        $IMversionAge = (time() - $IMreleaseDate) / 86400;
    }
    if ($serverInfo['im_version']) {
        if ($IMversionAge < (365 * 1)) {
            $hlp['color'] =  'lime';
        } elseif ($IMversionAge < (365 * 2)) {
            $hlp['color'] = 'lightgreen';
        } elseif ($IMversionAge < (365 * 3)) {
            $hlp['color'] = 'green';
        } elseif ($IMversionAge < (365 * 4)) {
            $hlp['color'] = 'darkgreen';
        } else {
            $hlp['color'] = 'olive';
        }
    } elseif (@$serverInfo['gd_string']) {
        $hlp['color'] = 'orange';
    } else {
        $hlp['color'] = 'red';
    }
    $hlp['value']   = $phpThumb->ImageMagickCommandlineBase().'"<br />'.($serverInfo['im_version'] ? $serverInfo['im_version'] : 'n/a').(@$IMversionAge ? '<br /><br />This version of ImageMagick is '.number_format($IMversionAge / 365, 2).' years old<br />(see www.imagemagick.org for new versions)' : '');
    $hlp['message'] = __('ImageMagick is faster than GD, can process larger images without PHP memory_limit issues, can resize animated GIFs. phpThumb can perform most operations with ImageMagick only, even if GD is not available.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']        = __('ImageMagick features', $dom);
    $GDfeatures['red']    = array('help', 'thumbnail', 'resize', 'crop', 'repage', 'coalesce', 'gravity', 'background', 'interlace', 'flatten', 'border', 'bordercolor', 'dither', 'quality');
    $GDfeatures['orange'] = array('version', 'blur', 'colorize', 'colors', 'colorspace', 'contrast', 'edge', 'emboss', 'fill', 'flip', 'flop', 'gamma', 'gaussian', 'level', 'modulate', 'monochrome', 'negate', 'normalize', 'sepia-tone', 'threshold', 'unsharp');
    $hlp['value']         = '|';
    foreach ($GDfeatures as $missingcolor => $features) {
        foreach ($features as $dummy => $feature) {
            $hlp['value']     .=  '| <span style="background-color: '.($phpThumb->ImageMagickSwitchAvailable($feature) ? 'lime' : $missingcolor).';">'.htmlentities($feature).'</span> |';
        }
    }
    $hlp['value']     .= '|';
    $hlp['message']    =     __('All of these parameters may be called by phpThumb, depending on parameters used.  Green means the feature is available; red means a critical feature is missing; orange means an optional filter/feature is missing.', $dom);
    $settings[]        = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']        = __('GD features', $dom);
    $GDfeatures['red']    = array(__('JPG Support', $dom), __('PNG Support', $dom));
    $GDfeatures['orange'] = array(__('GIF Read Support', $dom), __('GIF Create Support', $dom), __('FreeType Support', $dom));
    $hlp['value'] = '';
    foreach ($GDfeatures as $missingcolor => $features) {
        foreach ($features as $dummy => $feature) {
            $hlp['value'] .= '<div style="background-color: '.($gd_info[$feature] ? 'lime' : $missingcolor).';">'.htmlentities($feature).'</div>';
        }
    }
    $hlp['message'] =     __('PNG support is required for watermarks, overlays, calls to ImageMagick and other internal operations.<br />JPG support is obviously quite useful, but ImageMagick can substitute<br />GIF read support can be bypassed with ImageMagick and/or internal GIF routines.<br />GIF create support can be bypassed with ImageMagick (if no filters are applied)<br />FreeType support is needed for TTF overlays.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = __('GD extension "EXIF"', $dom);
    if (extension_loaded('exif')) {
        $hlp['color'] = 'lime';
    } elseif (@$serverInfo['gd_string']) {
        $hlp['color'] = 'orange';
    }
    $hlp['value']     = (extension_loaded('exif') ? 'TRUE' : 'FALSE');
    $hlp['message']   =     __('EXIF extension required for auto-rotate images. Also required to extract EXIF thumbnail to use as source if source image is too large for PHP memory_limit and ImageMagick is unavailable.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = 'php_sapi_name()';
    $php_sapi_name = strtolower(function_exists('php_sapi_name') ? php_sapi_name() : '');
    if (!$php_sapi_name) {
        $hlp['color']  = 'red';
    } elseif ($php_sapi_name == 'cgi-fcgi') {
        $hlp['color']  = 'orange';
    } elseif ($php_sapi_name == 'cgi') {
        $hlp['color']  = 'yellow';
    } elseif ($php_sapi_name == 'apache') {
        $hlp['color']  = 'lime';
    } else {
        $hlp['color']  = 'green';
    }
    $hlp['value']      = $php_sapi_name;
    $hlp['message']    = __('SAPI mode preferred to CGI mode. FCGI mode has unconfirmed strange behavior (notably more than one space in "wmt" filter text causes errors). If not working in "apache" (SAPI) mode, <i>apache_lookup_uri()</i> will not work.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = __('Server Software', $dom);
    $server_software = getenv('SERVER_SOFTWARE');
    if (!$server_software) {
        $hlp['color']     = 'red';
    } elseif (eregi('^Apache/([0-9\.]+)', $server_software, $matches)) {
        if (phpthumb_functions::version_compare_replacement($matches[1], '2.0.0', '>=')) {
            $hlp['color']     = 'lightgreen';
        } else {
            $hlp['color']     = 'lime';
        }
    } else {
        $hlp['color']     = 'darkgreen';
    }
    $hlp['value']   = $server_software;
    $hlp['message'] =     __('Apache v1.x has the fewest compatability problems. IIS has numerous annoyances. Apache v2.x is broken when lookup up <i>/~user/filename.jpg</i> style relative filenames using <i>apache_lookup_uri()</i>.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header']     = __('curl version', $dom);
    $curl_version = (function_exists('curl_version') ? curl_version() : '');
    if (is_array($curl_version)) {
        $curl_version = @$curl_version['version'];
    }
    if ($curl_version) {
        $hlp['color'] = 'lime';
    } else {
        $hlp['color'] = 'yellow';
    }
    $hlp['value']     = $curl_version;
    $hlp['message']   =     __('Best if available. HTTP source images will be unavailable if CURL unavailable and <i>allow_url_fopen</i> is also disabled.', $dom);
    $settings[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $FunctionsExist = array(
        'ImageRotate'           => array('orange',     __('required for "ra" and "ar" filters.', $dom)),
        'exif_read_data'        => array('yellow',     __('required for "ar" filter.', $dom)),
        'exif_thumbnail'        => array('yellow',     __('required to extract EXIF thumbnails.', $dom)),
        'memory_get_usage'      => array('lightgreen', __('mostly used for troubleshooting.', $dom)),
        'version_compare'       => array('darkgreen',  __('available in PHP v4.1.0+, internal workaround available', $dom)),
        'file_get_contents'     => array('darkgreen',  __('available in PHP v4.3.0+, internal workaround available', $dom)),
        'file_put_contents'     => array('darkgreen',  __('available in PHP v5.0.0+, internal workaround available', $dom)),
        'is_executable'         => array('yellow',     __('available in PHP3, except only PHP5 for Windows. poor internal workaround available', $dom)),
        'gd_info'               => array('olive',      __('available in PHP v4.3.0+ (with bundled GD2), internal workaround available', $dom)),
        'ImageTypes'            => array('red',        __('required for GD image output.', $dom)),
        'ImageCreateFromJPEG'   => array('orange',     __('required for JPEG source images using GD.', $dom)),
        'ImageCreateFromGIF'    => array('yellow',     __('useful for GIF source images using GD.', $dom)),
        'ImageCreateFromPNG'    => array('orange',     __('required for PNG source images using GD and other source image formats using ImageMagick.', $dom)),
        'ImageCreateFromWBMP'   => array('yellow',     __('required for WBMP source images using GD.', $dom)),
        'ImageCreateFromString' => array('orange',     __('required for HTTP and non-file image sources.', $dom)),
        'ImageCreateTrueColor'  => array('orange',     __('required for all non-ImageMagick filters.', $dom)),
        'ImageIsTrueColor'      => array('olive',      __('available in PHP v4.3.2+ &amp; GD v2.0.1+', $dom)),
        'ImageFilter'           => array('yellow',     __('PHP5 only. Required for some filters (but most can use ImageMagick instead)', $dom)),
    );
    foreach ($FunctionsExist as $function => $details) {
        list($color, $description) = $details;
        $hlp['header']    = $function;
        if (function_exists(strtolower($function))) {
            $hlp['color']    = 'lime';
            $hlp['value']    = 'TRUE';
        } else {
            $hlp['color']    = $color;
            $hlp['value']    = 'FALSE';
        }
        $hlp['message']    = $description;
        $Functions[] = $hlp;
        unset($hlp);
    }
    /************************************************************************************************************************/
    $SettingFeatures = array(
        'magic_quotes_runtime' => array('red',    'lime',   __('This setting is evil. Turn it off.', $dom)),
        'magic_quotes_gpc'     => array('orange', 'lime',   __('This setting is bad. Turn it off, if possible. phpThumb will attempt to work around it if it is enabled.', $dom)),
        'safe_mode'            => array('orange', 'lime',   __('Best if off. Calls to ImageMagick will be disabled if on (limiting max image resolution, no animated GIF resize). Temp files may be disabled. Features will be limited.', $dom)),
        'allow_url_fopen'      => array('lime',   'yellow', __('Best if on. HTTP source images will be unavailable if disabled and CURL is unavailable.', $dom)),
    );

    foreach ($SettingFeatures as $feature => $FeaturesDetails) {
        list($color_true, $color_false, $reason) = $FeaturesDetails;
        $hlp['header'] = $feature;
        $hlp['color1'] = (@get_cfg_var($feature) ? $color_true : $color_false);
        $hlp['value1'] = $phpThumb->phpThumbDebugVarDump((bool) @get_cfg_var($feature));
        $hlp['color2'] = (@ini_get($feature)     ? $color_true : $color_false);
        $hlp['value2'] = $phpThumb->phpThumbDebugVarDump((bool) @ini_get($feature));
        $hlp['message']    = $reason;
        $Features[] = $hlp;
        unset($hlp);
    }
    /************************************************************************************************************************/
    $MissingFunctionSeverity = array(
        'shell_exec' => 'red',
        'system'     => 'red',
        'passthru'   => 'red',
        'exec'       => 'red',
        'curl_exec'  => 'orange',
    );
    $DisabledFunctions[0] = explode(',', @get_cfg_var('disable_functions'));
    $DisabledFunctions[1] = explode(',', @ini_get('disable_functions'));
    $hlp['header'] = 'disable_functions';
    for ($i = 0; $i <= 1; $i++) {
        $disabled_functions = '';
        foreach ($DisabledFunctions[$i] as $key => $value) {
            if (@$MissingFunctionSeverity[$value]) {
                $DisabledFunctions[$i][$key] = '<span style="background-color: '.$MissingFunctionSeverity[$value].';">'.$value.'</span>';
            }
        }
        $hlp['value1'] = implode(', ', $DisabledFunctions[0]);
        $hlp['value2'] = implode(', ', $DisabledFunctions[1]);
    }

    $hlp['message']    = __('Best if nothing disabled. Calls to ImageMagick will be prevented if exec+system+shell_exec+passthru are disabled.', $dom);
    $Features[] = $hlp;
    unset($hlp);
    /************************************************************************************************************************/
    $hlp['header'] = 'memory_limit';
    $memory_limit = @get_cfg_var('memory_limit');
    if (!$memory_limit) {
        $hlp['color1'] = 'lime';
    } elseif ($memory_limit >= 32) {
        $hlp['color1'] = 'lime';
    } elseif ($memory_limit >= 24) {
        $hlp['color1'] = 'lightgreen';
    } elseif ($memory_limit >= 16) {
        $hlp['color1'] = 'green';
    } elseif ($memory_limit >= 12) {
        $hlp['color1'] = 'darkgreen';
    } elseif ($memory_limit >= 8) {
        $hlp['color1'] = 'olive';
    } elseif ($memory_limit >= 4) {
        $hlp['color1'] = 'yellow';
    } elseif ($memory_limit >= 2) {
        $hlp['color1'] = 'orange';
    } else {
        $hlp['color1'] = 'red';
    }
    $hlp['value1'] = ($memory_limit ? $memory_limit : '<i>'.__('unlimited', $dom).'</i>');

    $memory_limit = @ini_get('memory_limit');
    if (!$memory_limit) {
        $hlp['color2'] = 'lime';
    } elseif ($memory_limit >= 32) {
        $hlp['color2'] = 'lime';
    } elseif ($memory_limit >= 24) {
        $hlp['color2'] = 'lightgreen';
    } elseif ($memory_limit >= 16) {
        $hlp['color2'] = 'green';
    } elseif ($memory_limit >= 12) {
        $hlp['color2'] = 'darkgreen';
    } elseif ($memory_limit >= 8) {
        $hlp['color2'] = 'olive';
    } elseif ($memory_limit >= 4) {
        $hlp['color2'] = 'yellow';
    } elseif ($memory_limit >= 2) {
        $hlp['color2'] = 'orange';
    } else {
        $hlp['color2'] = 'red';
    }
    $hlp['value2'] = ($memory_limit ? $memory_limit : '<i>'.__('unlimited', $dom).'</i>');
    $hlp['message']    = __('The higher the better. Divide by 5 to get maximum megapixels of source image that can be thumbnailed (without ImageMagick).', $dom).' '.($memory_limit ? __f('Your setting (%1$s) allows images up to approximately %2$s megapixels', array($memory_limit, number_format($memory_limit / 5, 1), $dom)) : '');
    $Features[] = $hlp;
    unset($hlp);


    $pnRender = pnRender::getInstance('Thumbnail', false);
    $pnRender->assign('Disables', $Features);
    $pnRender->assign('Features', $Features);
    $pnRender->assign('Functions', $Functions);
    $pnRender->assign('Settings', $settings);
    return $pnRender->fetch('thumbnail_form_check.html');
}
