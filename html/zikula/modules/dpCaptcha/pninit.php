<?php
// $Id: pninit.php,v 1.0 2006/09/18 10:43:40 dev-postnuke Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
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
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: dpCaptcha
// Purpose of file:  dpCaptcha init  functions
// ----------------------------------------------------------------------

function dpCaptcha_init() 
{
	if (!pnModRegisterHook('item',
                           'display',
                           'GUI',
                           'dpCaptcha',
                           'user',
                           'view')) {
        pnSessionSetVar('errormsg', 'Error');
        return false;
    }
	
	if (!pnModRegisterHook('item',
                           'transform',
                           'API',
                           'dpCaptcha',
                           'user',
                           'verificar')) {
        pnSessionSetVar('errormsg', 'Error');
        return false;
    }
    return true;
}


function dpCaptcha_delete() 
{
    if (!pnModUnregisterHook('item',
                             'display',
                             'GUI',
                             'dpCaptcha',
                             'user',
                             'view')) {
        pnSessionSetVar('errormsg', 'Error');
        return false;
    }
	
	if (!pnModUnregisterHook('item',
                             'transform',
                             'API',
                             'dpCaptcha',
                             'user',
                             'verificar')) {
        pnSessionSetVar('errormsg', 'Error');
        return false;
    }
    pnModDelVar('dpCaptcha');    
    return true;
}


?>