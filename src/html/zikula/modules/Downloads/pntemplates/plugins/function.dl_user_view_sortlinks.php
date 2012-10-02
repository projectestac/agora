<?php
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
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
 * Smarty function to display admin links for the example module
 * based on the user's permissions
 *
 * Example
 * <!--[dl_user_view_sortlinks cid=$cid id="myClass"]-->
 *
 * @author       Sascha Jost
 * @since        07/05/04
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $id         CSS id
 * @return       string      the results of the module function
 */
function smarty_function_dl_user_view_sortlinks($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($params);
	unset($params);

    if (!isset($id))
	{
	    $id = 'dl_usersort_links';
	}

	if(!isset($cid)|| !is_numeric($cid))
	{
	  $cid=0;
	}
	
    $links .= "<ul id=\"$id\">";

    if (pnSecAuthAction(0, 'Downloads::', "::", ACCESS_OVERVIEW))
	{
		$links .= "<li>".pnVarPrepForDisplay(__('Title:', $dom))."&nbsp;&nbsp;<a title=\"".pnVarPrepForDisplay(__('Title A to Z', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'title','cclause'=> 'ASC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/up.png\" alt=\"".__('Title A to Z', $dom)."\" /></a></li>";
  
  		$links .= "<li><a title=\"".pnVarPrepForDisplay(__('Title Z to A', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'title','cclause'=> 'DESC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/down.png\" alt=\"".__('Title Z to A', $dom)."\" /></a></li>";
  	
  		$links .= "<li>".pnVarPrepForDisplay(__('Downloads:', $dom))."&nbsp;&nbsp;<a title=\"".pnVarPrepForDisplay(__('Downloads max.', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'hits','cclause'=> 'DESC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/up.png\" alt=\"".__('Downloads max.', $dom)."\" /></a></li>";
  		
  		$links .= "<li><a title=\"".pnVarPrepForDisplay(__('Downloads min.', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'hits','cclause'=> 'ASC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/down.png\" alt=\"".__('Downloads min.', $dom)."\" /></a></li>";
  
  
  		$links .= "<li>".pnVarPrepForDisplay(__('Date:', $dom))."&nbsp;&nbsp;<a title=\"".pnVarPrepForDisplay(__('Date new', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'date','cclause'=> 'DESC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/up.png\" alt=\"".__('Date new', $dom)."\" /></a></li>";
  
  		$links .= "<li><a title=\"".pnVarPrepForDisplay(__('Date old', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=> $cid,'sortby'=> 'date','cclause'=> 'ASC' ))) . "\"><img src=\"modules/Downloads/pnimages/user/down.png\" alt=\"".__('Date old', $dom)."\" /></a></li>";
  
  		
  		
	}
 
	$links .= "</ul>";
    
    return $links;
}

?>
