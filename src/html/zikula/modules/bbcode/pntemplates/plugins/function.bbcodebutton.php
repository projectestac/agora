<?php
// $Id: function.bbcodebutton.php 176 2008-06-05 21:58:30Z Landseer $
// ----------------------------------------------------------------------
// Zikula Application Framework
// Copyright (C) 2002 by the Zikula Development Team.
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
 * bbcodebutton
 * creates buttons for bbcodes
 *
 *$params['name'] string name
 *$params['nameml'] int if set then treat name as a define
 *$params['title'] string title
 *$params['titleml'] int if set then treat name as a define
 *$params['key'] char accesskey
 *$params['image'] string image
 *$params['textfieldid'] string id of the textfield, default = post
 *
 */
function smarty_function_bbcodebutton($params, &$smarty)
{
    extract($params);
	unset($params);

    // load language file
    if(!pnModAPILoad('bbcode', 'user')) {
        $smarty->trigger_error("loading bbcode api failed", e_error);
        return;
    }

    $textfieldid = (empty($textfieldid)) ? 'post' : $textfieldid;

    $lang = pnUserGetLang();

    if(file_exists("modules/bbcode/pnimages/$lang/$image")) {
        $imgfile = "modules/bbcode/pnimages/$lang/$image";
    } else if(file_exists("modules/bbcode/pnimages/$image")) {
        $imgfile = "modules/bbcode/pnimages/$image";
    }
    $attr = getimagesize($imgfile);

    $name  = (isset($nameml)) ? constant($name) : $name;
    $title = (isset($titleml)) ? constant($title) : $title;

    $out = "<button name=\"".DataUtil::formatForDisplay($name)."\" type=\"button\" value=\"".DataUtil::formatForDisplay($name)."\"
            style=\"border:none; background: transparent;\"
            title=\"$title\"
            accesskey=\"$key\" onclick=\"AddBBCode('" . DataUtil::formatForDisplay($textfieldid) . "', '".DataUtil::formatForDisplay($name)."')\">
            <img src=\"" . DataUtil::formatForOS($imgfile) . "\" ".$attr[3]." alt=\"".DataUtil::formatForDisplay($title)."\" />
            </button>";
    return $out;

}
