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
 * Display an image
 *
 */
function Thumbnail_user_showImage ()
{
    $values         = array();
    $values['f']    = FormUtil::getPassedValue('f');
    $values['h']    = FormUtil::getPassedValue('h');
    $values['q']    = FormUtil::getPassedValue('q');
    $values['w']    = FormUtil::getPassedValue('w');
    $values['ar']   = FormUtil::getPassedValue('ar');
    $values['bc']   = FormUtil::getPassedValue('bc');
    $values['bg']   = FormUtil::getPassedValue('bg');
    $values['hl']   = FormUtil::getPassedValue('hl');
    $values['hp']   = FormUtil::getPassedValue('hp');
    $values['hs']   = FormUtil::getPassedValue('hs');
    $values['ra']   = FormUtil::getPassedValue('ra');
    $values['sh']   = FormUtil::getPassedValue('sh');
    $values['sw']   = FormUtil::getPassedValue('sw');
    $values['sx']   = FormUtil::getPassedValue('sx');
    $values['sy']   = FormUtil::getPassedValue('sy');
    $values['wl']   = FormUtil::getPassedValue('wl');
    $values['wp']   = FormUtil::getPassedValue('wp');
    $values['ws']   = FormUtil::getPassedValue('ws');
    $values['zc']   = FormUtil::getPassedValue('zc');
    $values['aoe']  = FormUtil::getPassedValue('aoe');
    $values['err']  = FormUtil::getPassedValue('err');
    $values['far']  = FormUtil::getPassedValue('far');
    $values['iar']  = FormUtil::getPassedValue('iar');
    $values['new']  = FormUtil::getPassedValue('new');
    $values['sfn']  = FormUtil::getPassedValue('sfn');
    $values['src']  = FormUtil::getPassedValue('src');
    $values['xto']  = FormUtil::getPassedValue('xto');
    $values['down'] = FormUtil::getPassedValue('down');
    $values['file'] = FormUtil::getPassedValue('file');
    $values['fltr'] = FormUtil::getPassedValue('fltr');
    $values['goto'] = FormUtil::getPassedValue('goto');
    $values['maxb'] = FormUtil::getPassedValue('maxb');
    $values['md5s'] = FormUtil::getPassedValue('md5s');

    $filename = $values['src'];
    $values['srcFilename'] = $filename ;
    $values['returnRAW'] = true;
    
    $ret = pnModAPIFunc('Thumbnail', 'user', 'generateImage', $values);
    header('Content-Type: image/jpeg');
    echo $ret;
    
    //ImageJPEG($ret);
    //ImageDestroy($ret);
    exit;
    return true;
}
