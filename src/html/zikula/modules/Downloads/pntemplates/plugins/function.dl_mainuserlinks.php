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
 * <!--[dl_mainuserlinks id="myClass" current="main" currentid="myActiveClass"]-->
 *
 * @author       Mark West
 * @author       Sascha Jost
 * @since        07/05/04
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $id          CSS id
 * @param        string      $current     the current tab, can be main, new, popular, toprated, search or newdownload
 *                                        No default value
 * @param        string      $currentid   CSS class for the current link
 *                                        Default = 'current'
 * @return       string      the results of the module function
 */
function smarty_function_dl_mainuserlinks($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($params);
	unset($params);

    if (!isset($currentid))
	{
	    $currentid = 'current';
	}

    if (!isset($current))
	{
	    $current = '';
	}

    $links = "<div id=\"dl_navcontainer\">";

    $links .= "<ul id=\"dl_navlist\">";

    if (pnSecAuthAction(0, 'Downloads::', "::", ACCESS_OVERVIEW))
	{
		$links .= "<li><a".checkactive($current, 'main', $currentid)." title=\"".pnVarPrepForDisplay(__('Overview', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'main')) . "\">" . pnVarPrepForDisplay(__('Overview', $dom)) . "</a></li>";

  		$links .= "<li><a".checkactive($current, 'new', $currentid)." title=\"".pnVarPrepForDisplay(__('New', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'new')) . "\">" . pnVarPrepForDisplay(__('New', $dom)) . "</a></li>";

  		$links .= "<li><a".checkactive($current, 'popular', $currentid)." title=\"".pnVarPrepForDisplay(__('Popular', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'popular',array('start' => 0))) . "\">" . pnVarPrepForDisplay(__('Popular', $dom)) . "</a></li>";

        // show link to Top-Rated only if Ratings module is available and Downloads is hooked to Ratings
		if (pnModAvailable('Ratings') && pnModIsHooked('Ratings', 'Downloads')) 
		{
			$links .= "<li><a".checkactive($current, 'toprated', $currentid)." title=\"".pnVarPrepForDisplay(__('Top Rated', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'toprated')) . "\">" . pnVarPrepForDisplay(__('Top Rated', $dom)) . "</a></li>";
		}

    $links .= "<li><a".checkactive($current, 'search', $currentid)." title=\"".pnVarPrepForDisplay(__('Search', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'search')) . "\">" . pnVarPrepForDisplay(__('Search', $dom)) . "</a></li>";
	}

    if (pnSecAuthAction(0, 'Downloads::Add', "::", ACCESS_ADD))
	{
		$links .= "<li><a".checkactive($current, 'newdownload', $currentid)." title=\"".pnVarPrepForDisplay(__('Add', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'newdownload')) . "\">" . pnVarPrepForDisplay(__('Add', $dom)) . "</a></li>";
    }

    if (pnSecAuthAction(0, 'Downloads::', "::", ACCESS_ADMIN))
	{
		$links .= "<li><a title=\"".pnVarPrepForDisplay(__('Administration', $dom))."\" href=\"" . pnVarPrepForDisplay(pnModURL('Downloads', 'admin', 'main')) . "\">" . pnVarPrepForDisplay(__('Administration', $dom)) . "</a></li>";
    }

	$links .= "</ul>";
    $links .= "</div>";

    return $links;
}

function checkactive($active, $target, $class)
{
	if ($active == $target) return ' id="'.$class.'"';
	return;
}
?>
