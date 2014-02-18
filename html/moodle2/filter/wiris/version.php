<?php
//
//  Copyright (c) 2011, Maths for More S.L. http://www.wiris.com
//  This file is part of Moodle WIRIS Plugin.
//
//  Moodle WIRIS Plugin is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Moodle WIRIS Plugin is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with Moodle WIRIS Plugin. If not, see <http://www.gnu.org/licenses/>.
//

defined('MOODLE_INTERNAL') || die();

$plugin->version = 2013070500;
$plugin->release = '3.24.0';
$plugin->requires = 2011120500;
$plugin->maturity = MATURITY_STABLE;
$plugin->component = 'filter_wiris';
/*global $CFG;
if ($CFG->version>=2012120300) { // Moodle 2.4
	$plugin->dependencies = array (
		 'tinymce_tiny_mce_wiris' => 2013070500
	);
}*/

?>