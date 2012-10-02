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
 * @version $Id: defaultsettings.php, v2.0 2009/06/06 $
 **/

function geogebra_defaultsettings( $force=false  ) {
	global $CFG;

	if (!isset($CFG->filter_geogebra_urljar) or $force) {
		set_config( 'filter_geogebra_urljar', $CFG->wwwroot."/filter/geogebra/32/geogebra.jar");
		//set_config( 'filter_geogebra_urljar', "http://www.geogebra.org/webstart/geogebra.jar");
	}

	if (!isset($CFG->filter_geogebra_defaultwidth) or $force) {
		set_config( 'filter_geogebra_defaultwidth', '600' );
	}

	if (!isset($CFG->filter_geogebra_defaultheight) or $force) {
		set_config( 'filter_geogebra_defaultheight', '600' );
	}
	
	if (!isset($CFG->filter_geogebra_params) or $force) {
		set_config('filter_geogebra_params', 'framePossible=false');
	}
} 
?>