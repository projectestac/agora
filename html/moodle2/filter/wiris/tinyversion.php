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

function getTinyMceVersion(){
	global $CFG;
	include($CFG->dirroot . '/lib/editor/tinymce/version.php');
        //XTEC ************ MODIFICAT - Fixed bug when tinymce editor is disabled
        //2013.01.10 @sarjona
        if (array_key_exists('tinymce', editors_get_enabled()) === TRUE){
            $tinyeditor = new tinymce_texteditor();
            $tiny_version = $tinyeditor->version;
            return $tiny_version;            
        } else {
            return 0;
        }
        //************ ORIGINAL
        /*
        $tinyeditor = new tinymce_texteditor();
	$tiny_version = $tinyeditor->version;
	return $tiny_version;            
         */
        //************ FI
}
?>