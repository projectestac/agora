<?php
// $Id: pnversion.php 217 2009-11-12 17:06:36Z herr.vorragend $
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

$dom = ZLanguage::getModuleDomain('bbcode');

$modversion['name']             = 'bbcode';
$modversion['oldnames']         = array('pn_bbcode');
$modversion['version']          = '2.1';
$modversion['id'] 				= '164';
$modversion['description']      = __('BBCode is a transform hook that converts usual bbcode tags into html.', $dom);
$modversion['displayname']      = __('BBCode Hook', $dom);
//! module url (lower case without spaces and different to displayname)
$modversion['url']      = __('bbcode', $dom);

$modversion['credits']          = 'pndocs/credits.txt';
$modversion['help']             = 'pndocs/help.txt';
$modversion['changelog']        = 'pndocs/changelog.txt';
$modversion['license']          = 'pndocs/license.txt';
$modversion['coding']           = 'pndocs/coding.txt';
$modversion['official']         = 0;
$modversion['author']           = 'BBCode Team';
$modversion['contact']          = 'http://code.zikula.org/bbcode';
$modversion['admin']            = 1;
$modversion['securityschema']   = array('bbcode:Modulename:Links'  => '::',
                                        'bbcode:Modulename:Emails' => '::');
