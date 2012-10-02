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
 *  Original Author of file: Robert Gasch
 *  Purpose of file: Gobal definitions used by the Zikula codebase 
 *  @package Zikula_Core
 *  @subpackage ObjectLibrary
 *  ---------------------------------------------------------------------- 
 */


/**
 * PHP constants 
 */
define('_HAVE_PNLIB',                  '1');

/**
 * PN Permissions 
 */
define('_PN_PERMISSION_BASIC_PRIVATE', 'P');
define('_PN_PERMISSION_BASIC_GROUP',   'G');
define('_PN_PERMISSION_BASIC_USER',    'U');
define('_PN_PERMISSION_BASIC_PUBLIC',  'A');

/**
 * PN Permission Levels
 */
define('_PN_PERMISSION_LEVEL_NONE',    '0');
define('_PN_PERMISSION_LEVEL_READ',    'R');
define('_PN_PERMISSION_LEVEL_WRITE',   'W');

/**
 * PN Validation Marker
 */
define('_MARKER_NONE',                '&nbsp;&nbsp;');
define('_REQUIRED_MARKER',            '<span style="font-size:larger;color:blue"><b>*</b></span>');
define('_VALIDATION_MARKER',          '<span style="font-size:larger;color:red"><b>!</b></span>');
