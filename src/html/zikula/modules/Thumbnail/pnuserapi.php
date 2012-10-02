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
 * Function to Resize an Image
 * An wraper function for the genereateImage function
 *
 * @param 	string	srcFilename			The Source File (Full Path + Filename)
 * @param 	string	dstFilename	[optional]	The Destination File (Full Path + Filename), if empty an temp Filename will be generated
 * @param 	integer	w				The width of the new File
 * @param 	integer	h				The height of the new file
 *
 * @return 	false 					If an Error accured
 * 		string					otherwise the new Filename
 */
function Thumbnail_userapi_resizeImage ($args)
{
    // validate params
    $errors = array();
    if (!$args['w']) {
        $errors[] = 'w';
    }
    if (!$args['h']) {
        $errors[] = 'h';
    }

    // if we have errors, return ...
    if ($errors) {
        return LogUtil::registerArgsError();
    }

    return pnModAPIFunc('Thumbnail', 'user', 'generateImage', $args);
}

/**
 * Function to Rotate an Image
 * An wraper function for the genereateImage function
 *
 * @param 	string	srcFilename			The Source File (Full Path + Filename)
 * @param 	string	dstFilename	[optional]	The Destination File (Full Path + Filename), if empty an temp Filename will be generated
 * @param 	integer	ra				Rotate by Angle: angle of rotation in degrees, positive = counterclockwise, negative = clockwise
 * @return 	false 					If an Error accured
 * 		string					otherwise the new Filename
 */
function Thumbnail_userapi_rotateImage ($args)
{
    // validate params
    $errors = array();
    if (!$args['ra']) {
        $errors[] = 'ra';
    }

    // if we have errors, return ...
    if ($errors) {
        return LogUtil::registerArgsError();
    }

    return pnModAPIFunc('Thumbnail', 'user', 'generateImage', $args);
}

/**
 * Function to Watermark an Image with another image
 * An wraper function for the genereateImage function
 *
 * @param 	string	srcFilename			The Source File (Full Path + Filename)
 * @param 	string	dstFilename [optional]		The Destination File (Full Path + Filename)
 * 											If empty an temp Filename will be generated
 * @param 	string 	wmImage				The Watermark Image
 * @param 	string	alignment	[optional]	is the alignment (one of BR, BL, TR, TL, C,R, L, T, B, *) where B=bottom, T=top, L=left, R=right, C=centre, *=tile)
 * @param 	number	opacity		[optional]	is opacity from 0 (transparent) to 100 (opaque) (requires at least PHP v4.3.2, otherwise 100% opaque);
 * @param 	number	margin_x	[optional]	<x> and <y> are the edge (and inter-tile) margin in
 * @param 	number	margin_y	[optional]	pixels (or percent if 0 < (x|y) < 1)
 *
 * @return 	false 					If an Error accured
 * 		string					otherwise the new Filename
 */
function Thumbnail_userapi_watermarkImage ($args)
{
    // validate params
    $errors = array();
    if (!$args['wmImage']) {
        $errors[] = 'wmImage';
    }
    if (!is_file($args['wmImage']) || !is_readable($args['wmImage'])) {
        $errors[] = "can't read file [$args[wmImage]]";
    }

    // if we have errors, return ...
    if ($errors) {
        return LogUtil::registerArgsError();
    }

    $fltr = 'wmi';
    $fltr .= "|".$args['wmImage'];
    $fltr .= "|".$args['alignment'];
    $fltr .= "|".$args['opacity'];
    $fltr .= "|".$args['margin_x'];
    $fltr .= "|".$args['margin_y'];

    $args['fltr'][] .=$fltr;

    unset($args['wmImage']);
    unset($args['alignment']);
    unset($args['opacity']);
    unset($args['margin_x']);
    unset($args['margin_y']);

    return pnModAPIFunc('Thumbnail', 'user', 'generateImage', $args);
}


/**
 * Common call to the phpThumb class
 *
 * @param 	string	srcFilename			The Source File (Full Path + Filename)
 * @param 	string	dstFilename	[optional]	The Destination File (Full Path + Filename), if empty an temp Filename will be generated
 * @param   	boolean	returnRAW	[optional]	If true the RAW Data of the Image will be returned (instead of the Path)
 * @param 	all the other parameters
 *
 * @return 	false 					If an Error accured
 * 		string					otherwise the new Filename
 */
function Thumbnail_userapi_generateImage ($args)
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    Loader::loadClass('FileUtil');

    static $validImageTypes = array();
    if (!$validImageTypes) {
        $validImageTypes['gif']  = 'gif';
        $validImageTypes['jpg']  = 'jpeg';
        $validImageTypes['jpeg'] = 'jpeg';
        $validImageTypes['png']  = 'png';
        $validImageTypes['tiff'] = 'tiff';
        $validImageTypes['bmp']  = 'bmp';
        $validImageTypes['wmf']  = 'wmf';
    }

    // get input name, generate thumbnail name & get extension
    $srcName = (isset($args['srcFilename']) ? $args['srcFilename'] : '');
    $dstName = (isset($args['dstFilename']) ? $args['dstFilename'] : '');
    if (!$dstName) {
         $dstName = Thumbnail_userapi_generateThumbnailName (array('filename' =>$srcName ));
    }
    if ($dstName === false) {
        return false;
    }

    $ext = strtolower(FileUtil::getExtension ($srcName));

    // validate params
    $errors = array();
    if (!$srcName)                                    $errors[] = 'srcFilename';
    $isExternalFile = (strlen($srcName) > 7 && (substr($srcName, 0, 7) == 'http://' || substr($srcName, 0, 8) == 'https://'));
    if (!$isExternalFile && (!is_file($srcName) || !is_readable($srcName))) $errors[] = "can't read file [$args[srcFilename]]";
    if (!isset($validImageTypes[$ext]))               $errors[] = "Invalid image type [$ext]";

    // if we have errors, return ...
    if ($errors) {
         return LogUtil::registerArgsError();
    }

    $returnRaw = (isset($args['returnRAW']) ? $args['returnRAW'] : false);

    // since our argument array may contain other phpThumb params,
    // we unset filename here so that it doesn't get in the way.
    unset ($args['srcFilename']);
    unset ($args['dstFilename']);
    unset ($args['returnRAW']);

    // now actually start generating the thumbnail
    require_once('includes/phpThumb/phpthumb.class.php');
    $phpThumb = new phpThumb();
    if (include_once('includes/phpThumb/phpthumb.config.php')) {
        foreach ($PHPTHUMB_CONFIG as $key => $value) {
            $keyname = 'config_'.$key;
            $phpThumb->setParameter($keyname, $value);
        }
    }
    $phpThumb->setSourceFilename($srcName);

    // now loop through $args and set those parameters on the phpThumb object
    foreach ($args as $k => $v) {
        $phpThumb->$k = $v;
    }

    // now generate the thumbnail
    if ($phpThumb->GenerateThumbnail()) {
        if ($returnRaw) {
            if (!$phpThumb->RenderOutput()) {
                $errMsg = __('Thumbnail generation failed (RenderOutput):', $dom) .'<pre>'.implode("\n\n", $phpThumb->debugmessages).'</pre>';
                return LogUtil::registerError ($errMsg);
            } else {
                $dstName = $phpThumb->outputImageData;
            }
        } else {
            if (!$phpThumb->RenderToFile($dstName)) {
                $errMsg = __('Thumbnail generation failed (RenderToFile):', $dom) .'<pre>'.implode("\n\n", $phpThumb->debugmessages).'</pre>';
                return LogUtil::registerError ($errMsg);
            }
        }
    } else {
        $errMsg = __('Thumbnail generation failed (GenerateThumbnail):', $dom) .'<pre>'.implode("\n\n", $phpThumb->debugmessages).'</pre>';
        return LogUtil::registerError ($errMsg);
    }

    return $dstName;
}


/**
 * Generate thumbnail name
 */
function Thumbnail_userapi_generateThumbnailName ($args)
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $srcName = (isset($args['filename']) ? $args['filename'] : '');
    if (!$srcName) {
        return LogUtil::registerArgsError();
    }

    $fBasename = FileUtil::getBasename ($srcName);
    $fBase = substr ($srcName, 0, strrpos($srcName, '.'));
    $fExt  = FileUtil::getExtension ($srcName);

    if ($args['w'] && $args['h']) {
        $w = $args['w'];
        $h = $args['h'];
        $newName = $fBase . '_tmb_' . $w . 'x' . $h . '.' . $fExt;
    } else {
        $newName = $fBase . '_tmb.' . $fExt;
    }
    return $newName;
}



/**
 * Generate thumbnail - this method handles the thumbnail creation though
 * a direct call to the PHPThumb API.
 */
function Thumbnail_userapi_generateThumbnailDirect ($args)
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    static $validImageTypes = array();
    if (!$validImageTypes) {
        $validImageTypes['gif']  = 'gif';
        $validImageTypes['jpg']  = 'jpeg';
        $validImageTypes['jpeg'] = 'jpeg';
        $validImageTypes['png']  = 'png';
    }

    // get input name, generate thumbnail name & get extension
    $srcName = isset($args['filename']) ? $args['filename'] : '';
    $tmbName = isset($args['tmbname']) ? $args['tmbname'] : Thumbnail_userapi_generateThumbnailName ($args);
    Loader::loadClass('FileUtil');
    $ext = strtolower(FileUtil::getExtension ($args['filename']));

    // validate params
    $errors = array();
    if (!$srcName)                                    $errors[] = __('Invalid filename received', $dom);
    if (!$tmbName)                                    $errors[] = __('Unable to determine target thumbnailname', $dom);
    if (!is_file($srcName) || !is_readable($srcName)) $errors[] = __f("Can't read file [%s]", $args[filename], $doma);
    if (!isset($validImageTypes[$ext]))               $errors[] = __f("Invalid image type [$s]", $ext, $dom);

    // if we have errors, return ...
    if ($errors) {
        return LogUtil::registerArgsError();
    }

    // since our argument array may contain other phpThumb params,
    // we unset filename here so that it doesn't get in the way.
    unset ($args['filename']);

    // now actually start generating the thumbnail
    require_once('includes/phpThumb/phpthumb.class.php');
    $phpThumb = new phpThumb();
    $phpThumb->setSourceFilename($srcName);

    // This is used, because it seems that phpThumb 1.7.5 has a bug setting the ImagePath Link
    $phpThumb->setParameter('config_imagemagick_path', pnModGetVar('Thumbnail', 'imagemagick_path'));

    // set parameters (see "URL Parameters" in phpthumb.readme.txt)
    //$phpThumb->w = $thumbnail_width;
    //$phpThumb->h = 100;
    //$phpThumb->fltr[] = 'gam|1.2';

    // figure out the correct size to rescale the thumbnail to
    if (pnModGetVar('Thumbnail', 'allow_size_override', false)) {
        if (!isset($args['w']) || $args['w'] <= 1)
            $args['w'] = pnModGetVar('Thumbnail', 'std_image_size_x', 100);
        if (!isset($args['h']) || $args['h'] <= 1)
            $args['h'] = pnModGetVar('Thumbnail', 'std_image_size_y', 100);
    }
    else {
        $args['w'] = pnModGetVar('Thumbnail', 'std_image_size_x', 100);
        $args['h'] = pnModGetVar('Thumbnail', 'std_image_size_y', 100);
    }

    // now loop through $args and set those parameters on the phpThumb object
    foreach ($args as $k => $v) {
        $phpThumb->$k = $v;
    }

    // now generate the thumbnail
    if ($phpThumb->GenerateThumbnail()) {
        if (!$phpThumb->RenderToFile($tmbName)) {
            $errMsg = 'Thumbnail generation failed:<pre>'.implode("\n\n", $phpThumb->debugmessages).'</pre>';
            return LogUtil::registerError ($errMsg);
        } elseif (isset($args['verbose']) && $args['verbose']) {
            foreach ($phpThumb->debugmessages as $msg) {
                LogUtil::registerStatus ('PhpThumb Debug: ' . $msg);
            }
        }
    } else {
        if (isset($args['verbose']) && $args['verbose']) {
            foreach ($phpThumb->debugmessages as $msg) {
                LogUtil::registerError ('PhpThumb Debug: ' . $msg);
            }
        }
    }

    return $tmbName;
}


/**
 * Generate thumbnail - this method handles the thumbnail creation though
 * a call to pnModAPIFunc('Thumbnail', 'user', 'generateImage', $args);
 */
function Thumbnail_userapi_generateThumbnail ($args)
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $args['srcFilename'] = $args['filename'];
    // since our argument array may contain other phpThumb params,
    // we unset filename here so that it doesn't get in the way.
    unset ($args['filename']);

    // figure out the correct size to rescale the thumbnail to
    if (pnModGetVar('Thumbnail', 'allow_size_override', false)) {
        if (!isset($args['w']) || $args['w'] <= 1) {
            $args['w'] = pnModGetVar('Thumbnail', 'std_image_size_x', 100);
        }
        if (!isset($args['h']) || $args['h'] <= 1) {
            $args['h'] = pnModGetVar('Thumbnail', 'std_image_size_y', 100);
        }
    }
    else {
        $args['w'] = pnModGetVar('Thumbnail', 'std_image_size_x', 100);
        $args['h'] = pnModGetVar('Thumbnail', 'std_image_size_y', 100);
    }

    return pnModAPIFunc('Thumbnail', 'user', 'generateImage', $args);
}

