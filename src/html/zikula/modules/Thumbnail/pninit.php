<?php
/** ---------------------------------------------------------------------- 
 *  LICENSE 
 *  
 *  This program is free software); you can redistribute it and/or 
 *  modify it under the terms of the GNU General Public License (GPL) 
 *  as published by the Free Software Foundation, either version 2
 *  of the License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful, 
 *  but WITHOUT ANY WARRANTY); without even the implied warranty of 
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
 * initialise the Thumbnail module
 */
function Thumbnail_init()
{
    pnModSetVar ('Thumbnail', 'std_image_size_x', 100);
    pnModSetVar ('Thumbnail', 'std_image_size_y', 100);
    pnModSetVar ('Thumbnail', 'allow_size_override', 1);

    pnModSetVar('Thumbnail', 'cache_directory',                      dirname(__FILE__).'/includes/phpThumb/cache/'); // dirname(__FILE__).'/cache/'
    pnModSetVar('Thumbnail', 'cache_disable_warning',                1); // false 
    pnModSetVar('Thumbnail', 'cache_maxage',                         86400 * 30); // 86400 * 30
    pnModSetVar('Thumbnail', 'cache_maxsize',                        10 * 1024 * 1024); //10 * 1024 * 1024
    pnModSetVar('Thumbnail', 'cache_maxfiles',                       200); // 200
    pnModSetVar('Thumbnail', 'cache_source_enabled',                 0); //false);
    pnModSetVar('Thumbnail', 'cache_source_directory',               '/cache/source/'); //dirname(__FILE__).'/cache/source/');
    pnModSetVar('Thumbnail', 'cache_source_filemtime_ignore_local',  0); //false
    pnModSetVar('Thumbnail', 'cache_source_filemtime_ignore_remote', 1); //true    
    pnModSetVar('Thumbnail', 'cache_default_only_suffix',            ''); // ''
    pnModSetVar('Thumbnail', 'cache_force_passthru',                 1); //true
    pnModSetVar('Thumbnail', 'temp_directory',                       ''); // null
    pnModSetVar('Thumbnail', 'max_source_pixels',                    0); //round(max(intval(ini_get('memory_limit')), intval(get_cfg_var('memory_limit'))) * 1048576 * 0.20));
    pnModSetVar('Thumbnail', 'imagemagick_path',                     'C:/Program Files/ImageMagick-6.2.5-Q16/convert.exe'); //C:/Program Files/ImageMagick-6.2.5-Q16/convert.exe
    pnModSetVar('Thumbnail', 'output_format',                        'jpeg'); //'jpeg'
    pnModSetVar('Thumbnail', 'output_maxwidth',                      0); //0
    pnModSetVar('Thumbnail', 'output_maxheight',                     0); //0    
    pnModSetVar('Thumbnail', 'output_interlace',                     1); // true
    pnModSetVar('Thumbnail', 'error_image_width',                    400); //400    
    pnModSetVar('Thumbnail', 'error_image_height',                   100); //100
    pnModSetVar('Thumbnail', 'error_message_image_default',          ''); // ''
    pnModSetVar('Thumbnail', 'error_bgcolor',                        'CCCCFF'); //'CCCCFF'
    pnModSetVar('Thumbnail', 'error_textcolor',                      'FF0000'); //'FF0000'    
    pnModSetVar('Thumbnail', 'error_fontsize',                       1); //1
    pnModSetVar('Thumbnail', 'error_die_on_error',                   1); // true
    pnModSetVar('Thumbnail', 'error_silent_die_on_error',            0); // false
    pnModSetVar('Thumbnail', 'error_die_on_source_failure',          1); // true    
    pnModSetVar('Thumbnail', 'nohotlink_enabled',                    1); //true
    pnModSetVar('Thumbnail', 'nohotlink_valid_domains',              implode(';',array(@$_SERVER['HTTP_HOST']))); //array(@$_SERVER['HTTP_HOST'])
    pnModSetVar('Thumbnail', 'nohotlink_erase_image',                1); // false    
    pnModSetVar('Thumbnail', 'nohotlink_text_message',               'Off-server thumbnailing is not allowed'); // 'Off-server thumbnailing is not allowed'    
    pnModSetVar('Thumbnail', 'nooffsitelink_enabled',                1); // true
    pnModSetVar('Thumbnail', 'nooffsitelink_valid_domains',          implode(';',array(@$_SERVER['HTTP_HOST']))); //array(@$_SERVER['HTTP_HOST'])
    pnModSetVar('Thumbnail', 'nooffsitelink_require_refer',          0); // false
    pnModSetVar('Thumbnail', 'nooffsitelink_erase_image',            1); // true
    pnModSetVar('Thumbnail', 'nooffsitelink_text_message',           'Image taken from '.@$_SERVER['HTTP_HOST']);
    pnModSetVar('Thumbnail', 'border_hexcolor',                      '000000'); // '000000'
    pnModSetVar('Thumbnail', 'background_hexcolor',                  'FFFFFF'); // 'FFFFFF'
    pnModSetVar('Thumbnail', 'ttf_directory',                        dirname(__FILE__).'/fonts'); // dirname(__FILE__).'/fonts');
    pnModSetVar('Thumbnail', 'high_security_enabled',                0); // false
    pnModSetVar('Thumbnail', 'high_security_password',               '' ); // ''
    pnModSetVar('Thumbnail', 'disable_debug',                        0); // false
    pnModSetVar('Thumbnail', 'allow_src_above_docroot',              0); // false
    pnModSetVar('Thumbnail', 'allow_src_above_phpthumb',             1); // true
    pnModSetVar('Thumbnail', 'allow_parameter_file',                 0); // false
    pnModSetVar('Thumbnail', 'allow_parameter_goto',                 0); // false
    pnModSetVar('Thumbnail', 'disable_pathinfo_parsing',             0); // false
    pnModSetVar('Thumbnail', 'disable_imagecopyresampled',           0); // false
    pnModSetVar('Thumbnail', 'disable_onlycreateable_passthru',      1); // true
    pnModSetVar('Thumbnail', 'prefer_imagemagick',                   1); // true
    pnModSetVar('Thumbnail', 'use_exif_thumbnail_for_speed',         0); // false
    pnModSetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_GETSTRINGOVERRIDE',  1); // true
    pnModSetVar('Thumbnail', 'PHPTHUMB_DEFAULTS_DISABLEGETPARAMS',   0); // false
    
    return true;
}


/**
 * upgrade the module from an old version
 */
function Thumbnail_upgrade($oldversion) 
{
    return true;
}


/**
 * delete the Thumbnail module
 */
function Thumbnail_delete() 
{
    pnModDelVar('Thumbnail');
    return true;
}
