<?php
// $Id: modifier.bbsmile.php 93 2008-06-05 22:04:27Z Landseer $
// ----------------------------------------------------------------------
// Zikula Application Framework
// Copyright (C) 2001 by the Zikula Development Team.
// http://www.zikula.org/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
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
 * pnRender plugin
 * 
 * This file is a plugin for pnRender, the Zikula implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 * @version      $Id: modifier.bbsmile.php 93 2008-06-05 22:04:27Z Landseer $
 * @author       The Zikula development team
 * @link         http://www.zikula.org  The Zikula Home Page
 * @copyright    Copyright (C) 2002 by the Zikula Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty modifier to apply the bbsmile transform hooks
 * 
 * Available parameters:

 * Example
 * 
 *   <!--[$MyVar|bbsmile]-->
 * 
 * 
 * @author       Frank Schummertz
 * @author       The pnForum team
 * @since        16. Sept. 2003
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_bbsmile($string)
{
	$extrainfo = array($string);

    $return = "";
    list($return) = pnModAPIFunc('bbsmile', 'user', 'transform', array('objectid' => '', 'extrainfo' => $extrainfo));
    return $return;                      
}
