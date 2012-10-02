<?php
// $Id: pnuser.php 71 2007-04-07 10:40:35Z landseer $
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
// Original Author of file: Frank Schummertz
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbsmile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * loadsmilies
 * returns a html snippet for selecting autosmilies
 *
 */
function bbsmile_ajax_loadsmilies()
{
    $textfieldid = FormUtil::getPassedValue('textfieldid', null, 'GET');
    
    $pnr = pnRender::getInstance('bbsmile', false, null, true);
    $pnr->assign('counter', SessionUtil::getVar('counter'));
    $pnr->assign('textfieldid', $textfieldid);
    $out = $pnr->fetch('bbsmile_ajax_bbsmiles.html');
    echo $out;
    pnShutDown();
}
