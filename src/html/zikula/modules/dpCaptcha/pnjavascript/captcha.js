// $Id: captcha.js ,v 1.0 2006/09/18 10:42:42 dev-postnuke Exp $
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

function reload()
{
	//alert("hola");
	document.getElementById('imgcaptcha').setAttribute('src','index.php?module=dpCaptcha&type=ajax&func=captcha');
}

function verificar(captcha)
{
	var url='index.php?module=dpCaptcha&type=ajax&func=verificar&num='+captcha;
	var success	= function(t){validarOk(t);}
	var failure	= function(t){failed(t);}	
	var myAjax = new Ajax.Request(url, {method:'post', onSuccess:success, onFailure:failure});	
}

function validarOk(t)
{
	if(t.responseText==1)
	{	
		StatusCaptcha=1;
	}
	else
	{
		StatusCaptcha=0;
		alert(ERROR1);
		reload();
		document.getElementById('captcha').value='';
	}
}

function falied()
{
	return;
}
