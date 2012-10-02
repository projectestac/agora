<?php
// $Id: pnuser.php 217 2009-11-12 17:06:36Z herr.vorragend $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * main funcion
 * The main function is not used in the bbcode module, we just redirect to index.php
 *
 */
function bbcode_user_main()
{
    return pnRedirect(pnConfigGetVar('entrypoint', 'index.php'));
}

/**
 * whatisbbcode
 * The only relevant funtion here displays some help for bbcode tags
 * no parameters needed
 *
 */
function bbcode_user_whatisbbcode()
{
    $pnr = pnRender::getInstance('bbcode');
    return $pnr->fetch('bbcode_user_whatisbbcode.html');
}

/**
 * bbcode
 * returns a html snippet with buttons for inserting bbocdes into a text
 *
 *@params $args['images'] use image buttons if set
 *@params $args['textfieldid'] id of the textfield for inserting smilies
 */
function bbcode_user_bbcodes($args)
{
    $images      = $args['images'];
    $textfieldid = $args['textfieldid'];

    if(empty($textfieldid)) {
        return LogUtil::registerArgsError();
    }

    // if we have more than one textarea we need to distinguish them, so we simply use
    // a counter stored in a session var until we find a better solution
    $counter = (int)SessionUtil::getVar('bbcode_counter');
    $counter++;
    SessionUtil::setVar('bbcode_counter', $counter);

    $pnr = pnRender::getInstance('bbcode', false, null, true);
    $pnr->assign('counter', $counter);
    $pnr->assign('images', $images);

    PageUtil::addVar('javascript', 'javascript/ajax/prototype.js');
    PageUtil::addVar('javascript', 'modules/bbcode/pnjavascript/bbcode.js');
    PageUtil::addVar('stylesheet', ThemeUtil::getModuleStylesheet('bbcode'));

    // get the languages for highlighting
    $langs = pnModAPIFunc('bbcode', 'user', 'get_geshi_languages');
    $pnr->assign('geshi_languages', $langs);
    $pnr->assign('textfieldid', $textfieldid);

    return $pnr->fetch('bbcode_user_bbcodes.html');
}
