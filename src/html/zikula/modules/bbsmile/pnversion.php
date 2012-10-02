<?php
// $Id: pnversion.php 124 2009-11-11 02:15:07Z drak $
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
// Original Author of file: Hinrich Donner
// changed to bbsmile: larsneo
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbsmile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

$dom = ZLanguage::getModuleDomain('bbsmile');
$modversion['name']             = 'bbsmile';
$modversion['oldnames']         = array('pn_bbsmile');
$modversion['version']          = '2.2';
$modversion['id']               = '163';
$modversion['description']      = __('Smilie Hook (Autoincluded)', $dom);
$modversion['displayname']      = __('BBSmile Hook', $dom);
$modversion['url']              = __('bbsmile', $dom);
$modversion['credits']          = 'pndocs/credits.txt';
$modversion['help']             = 'pndocs/help.txt';
$modversion['changelog']        = 'pndocs/changelog.txt';
$modversion['license']          = 'pndocs/license.txt';
$modversion['coding']           = 'pndocs/coding.txt';
$modversion['official']         = 0;
$modversion['author']           = 'Frank Schummertz, Dizkus team';
$modversion['contact']          = 'http://code.zikula.org/bbsmile';
$modversion['admin']            = 1;
$modversion['securityschema']   = array('bbsmile::' => '::');
