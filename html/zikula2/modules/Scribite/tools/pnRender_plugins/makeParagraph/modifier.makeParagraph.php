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
//
//
// @package scribite!
// @license http://www.gnu.org/copyleft/gpl.html
//
// @author Steffen Voss (kaffeeringe.de)
// @version 1.0
// 
// Use this modifier in order to set text in textare into paragraphs when
// no ENTER is pressed in wysiwyg-editor and no p-tags have been added
//

function smarty_modifier_makeParagraph($string)
{
  if (substr($string, 0, 3)!="<p>") {
    return("<p>".$string."</p>");
  } else {
    return($string);
  }    
}

?>
