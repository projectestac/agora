<?php
// ----------------------------------------------------------------------
// Copyright (C) 2004 per Albert Pï¿œrez Monfort
//      Generalitat de Catalunya
//      Departament d'Educaciï¿œ
//      Grup de treball Intranet de centres de la SGTI
// ----------------------------------------------------------------------
// Aquest programa fa ï¿œs de les funcions de l'API de PostNuke
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// --------------------------------------------------------------------------
// Llicï¿œncia
//
// Aquest programa ï¿œs de software lliure. Pot redistribuir-lo i/o modificar-lo
// sota els termes de la Llicï¿œncia Pï¿œblica General de GNU segons estï¿œ publicada
// per la Free Software Foundation, bï¿œ de la versiï¿œ 2 de l'esmentada Llicï¿œncia
// o bï¿œ (segons la seva elecciï¿œ) de qualsevol versiï¿œ posterior.
//
// Aquest programa es distribueix amb l'esperanï¿œa que sigui ï¿œtil, perï¿œ sense
// cap garantia, fins i tot sense la garantia MERCANTIL implï¿œcita o sense
// garantir la conveniï¿œncia per a un propï¿œsit particular. Consulti la Llicï¿œncia
// General de GNU per a mï¿œs detalls.
//
// Pots trobar la Llicï¿œncia a http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------------
// Autor del fitxer original: Albert Pï¿œrez Monfort (aperez16@xtec.cat)
// --------------------------------------------------------------------------
// La realitzaciï¿œ d'aquest mï¿œdul ha estat possible grï¿œcies a una llicï¿œncia
// retribuï¿œda concedida pel Departament d'Educaciï¿œ de la Generalitat de
// Catalunya (DOGC nï¿œm.: 4182 de 26.7.2004).
// --------------------------------------------------------------------------
// Propï¿œsit del fitxer:
//      Punt d'inici del mï¿œdul de tauler per part de l'usuari
// --------------------------------------------------------------------------
$dom = ZLanguage::getModuleDomain('iw_noteboard');

if (!defined("LOADED_AS_MODULE")) {
    die ("No pots accedir directament a aquest arxiu...");
}

include 'header.php';

//Comprovaciï¿œ de seguretat
if (!pnSecAuthAction(0, 'iw_noteboard::', '::', ACCESS_READ)) {
    echo __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom);
    include 'footer.php';
    exit;
}

//Carreguem les funcions de l'usuari
if (!pnModLoad('iw_noteboard', 'user')) {
	echo __('Error! Could not load module.', $dom);
	include 'footer.php';
	exit;
}

$llistat=pnModFunc('iw_noteboard','user','main');

echo $llistat;
include 'footer.php';
?>
