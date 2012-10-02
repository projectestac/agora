<?php
/* ERROR REPORTING */
//$CFG->wiriserrorreporting = E_ALL;


/* WIRIS Service */
$CFG->wirisservicehost = 'services.wiris.net';	// Host of the application server
$CFG->wirisserviceport = '80';					// Port of the application server
$CFG->wirisservicepath = '/demo/formula';		// Context root of the application server
$CFG->wirisserviceversion = '2.0';				// Wished version of the application server


/* WIRIS Image Service */
$CFG->wiristransparency = 'true';							// Set transparent background for the formulas (available for Mozilla / IE 7 or greater)
//$CFG->wirisimagebgcolor = '#fafafa';						// Background color of the formulas
//$CFG->wirisimagefontsize = '16';							// Font size of the formula
//$CFG->wirisimagesymbolcolor = '#000000';					// Symbol color
//$CFG->wirisimageidentcolor = '#000000';					// Ident color
//$CFG->wirisimagenumbercolor = '#000000';					// Number color
//$CFG->wirisimageidentmathvariant = 'italic-sans-serif';	// Font variant for idents
//$CFG->wirisimagenumbermathvariant = 'sans-serif';			// Font variant for numbers
//$CFG->wirisimagefontident = 'Helvetica';					// Font family for idents
//$CFG->wirisimagefontnumber = 'Arial';						// Font family for numbers
//$CFG->wirisimagefontranges = array('x3b1-x3ff;Lucida Console,105', 'x41-x5A;Helvetica');


/* WIRIS Editor - equation editor */
//XTEC ************ MODIFICAT - WIRIS Plugin configuration
//2010.07.16
$CFG->wirisformulaeditorenabled = isset($CFG->textfilters) && strpos($CFG->textfilters, "filter/wiris")!==FALSE;			// enable the insertion of formulas using WIRIS Editor
//************ ORIGINAL
/*
$CFG->wirisformulaeditorenabled = true;						// Enable the insertion of formulas using WIRIS Editor
*/
//************ FI
$CFG->wiriseditorarchive = 'wiriseditor.jar';				// SHOULD NOT BE USUALLY MODIFIED
$CFG->wiriseditorclass = 'WirisFormulaEditor';				// SHOULD NOT BE USUALLY MODIFIED


/* WIRIS CAS - calculator */
//XTEC ************ MODIFICAT - WIRIS Plugin configuration
//2010.07.16
$CFG->wiriscasenabled = isset($CFG->textfilters) && strpos($CFG->textfilters, "filter/wiris")!==FALSE;                                               // enable the insertion of WIRIS CAS Applet in the HTML Editor
//************ ORIGINAL
/*
$CFG->wiriscasenabled = true;													// Enable the insertion of WIRIS CAS Applet in the HTML Editor
*/
//************ FI
$CFG->wiriscascodebase = 'http://www.wiris.net/demo/wiris/wiris-codebase';		// Codebase of the WIRIS CAS applet
//XTEC ************ MODIFICAT - WIRIS Plugin configuration
//2010.12.23
$CFG->wiriscasarchive = 'wrs_net_ca.jar';										// File of the WIRIS CAS applet
$CFG->wiriscasclass = 'WirisApplet_net_ca';										// Class name of the WIRIS CAS applet
$CFG->wiriscaslang = 'ca,es,en,fr';							// Available languages 'en,ca,de,es,et,eu,fr,it,nl,pt' (depend on your WIRIS CAS installation).
//************ ORIGINAL
/*
$CFG->wiriscasarchive = 'wrs_net_en.jar';										// File of the WIRIS CAS applet
$CFG->wiriscasclass = 'WirisApplet_net_en';										// Class name of the WIRIS CAS applet
$CFG->wiriscaslang = 'en,ca,de,es,et,eu,fr,it,nl,pt';							// Available languages 'en,ca,de,es,et,eu,fr,it,nl,pt' (depend on your WIRIS CAS installation).
*/
//************ FI


/* Filter variables */
$CFG->wirisfilterdir = 'filter/wiris';					// SHOULD USUALLY NOT BE MODIFIED
$CFG->wirisimagedir  = 'filter/wiris';					// SHOULD USUALLY NOT BE MODIFIED
$CFG->wirisformulaimageclass = 'Wirisformula';			// SHOULD USUALLY NOT BE MODIFIED
$CFG->wiriscasimageclass = 'Wiriscas';					// SHOULD USUALLY NOT BE MODIFIED

/* Proxy variables */
$CFG->wirisproxy = false;
$CFG->wirisproxy_host = '';
$CFG->wirisproxy_port = 8080;

$CFG->wirisPHP4compatibility = true;		// PHP 4 COMPATIBILITY: MARKT IT IF YOU ARE USING PHP 4, BUT DON'T USE PROXY.

include_once $CFG->dirroot . '/pluginwiris/version.php';
?>