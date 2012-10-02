<?php
// $Id: pnuser.php,v 1.0 2006/09/18 10:42:42 dev-postnuke Exp $
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
// Purpose of file:  dpCaptcha user display functions
// ----------------------------------------------------------------------
function dpCaptcha_user_view($args=array())
{
	extract($args);
	$pnRender =& new pnRender('dpCaptcha');
	$pnRender->caching=false;	
	$n=pnVarCleanFromInput('n');
	if(!is_int($n)) $n=5;
	$urlback=pnGetCurrentURL();
	$ncap=pnSessionGetVar('ncap');
	$pnRender->assign('ncap', $ncap);
	$pnRender->assign('urlback', $urlback);
	$pnRender->assign('n', $n);
	pnSessionDelVar('ncap');
	return $pnRender->fetch('dpCaptcha_user_form.tpl');
}
?>
