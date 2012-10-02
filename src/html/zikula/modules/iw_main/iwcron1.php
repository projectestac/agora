<?php
// carrega les funcions bàsiques que permeten inicialitzar el sistema
include 'includes/pnAPI.php';
// carrega la resta de funcions
pnInit(PN_CORE_CONFIG |
		PN_CORE_ADODB |
		PN_CORE_DB |
		PN_CORE_OBJECTLAYER |
		PN_CORE_TABLES |
		PN_CORE_SESSIONS |
		PN_CORE_THEME
);

//Delele all the values that not have been readed the time specified in the config values
//and the variables that have reached the lifetime value. Zero means that the old values never are deleted
$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
$result['value'] = pnModApiFunc('iw_main', 'user', 'userDeleteOldVars', array('sv' => $sv));
	
pnShutDown();