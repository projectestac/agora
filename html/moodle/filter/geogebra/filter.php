<?php
/*
 * GeoGebra Moodle filter
 * Copyright (C) 2009 Sara Arjona, Florian Sonner
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
/**
 * @author Sara Arjona, Florian Sonner
 * @version $Id: filter.php, v2.0 2009/06/05 $
 */

/** 
 * Searches for a link to a .ggb file and replaces this link with an applet.
 * 
 * If the link-url also contains parameters like
 * "file.ggb?w=600"
 * "file.gbb?w=600&h=800"
 * "file.gbb?h=400"
 * those dimensions will be applied (w = width, h = height).
 *
 * If just one parameter is given the other dimension will be the default one.
 * 
 * @author Florian Sonner
 */
function geogebra_filter($courseid, $text) {
	global $CFG, $params_html;
	
	// construct applet parameters from config
	$params_html = '';
	
	//XTEC ************ AFEGIT - To avoid the configuration in first usage
	//2010.07.12
	require_once('defaultsettings.php');
	geogebra_defaultsettings();
	//************ FI
	
	$params = explode("\n", $CFG->filter_geogebra_params);
	
	foreach($params as $param)
	{		
		if(strpos($param, '=') !== false) {
			$values = explode('=', $param);
			$params_html .= '<param name="'.$values[0].'" value="'.str_replace("\n", '', $values[1]).'" />';
		}
	}
	
	// yep, complex regex!
	// note: "?:" is a trick to hide a match from the results
	// TODO just get everything beyond the ? in the url as a match and explode it in the callback
	return preg_replace_callback(
		'/<a(?:.*?)href=\"(.*?)\.ggb(?:\?(?:w=([0-9]+))?(?:&)?(?:h=([0-9]+))?)?\"(?:[^>]*)>(.*?)<\/a>/is',
		'geogebra_linker',
		$text
	);
}

/** 
 * The function where the actual applet code is constructed.
 * 
 * @author Florian Sonner
 */
function geogebra_linker($matches)
{
	global $CFG, $params_html;
	
	//XTEC ************ AFEGIT - To avoid the configuration in first usage
	//2010.07.12
	require_once('defaultsettings.php');
	geogebra_defaultsettings();
	//************ FI
	
	$width = $matches[2];
	$height = $matches[3];
	
	if(strlen($width) == 0)
		$width = $CFG->filter_geogebra_defaultwidth;
	if(strlen($height) == 0)
		$height = $CFG->filter_geogebra_defaultheight;
	
	$return = '<applet codebase="./" height="'.$height.'" width="'.$width.'" '
			. 'archive="'.$CFG->filter_geogebra_urljar.'"'
			. ' code="geogebra.GeoGebraApplet">'
			. '<param value="'.$matches[1].'.ggb" name="filename" />'.$params_html.'</applet> ';
	
	return $return;
}
?>

