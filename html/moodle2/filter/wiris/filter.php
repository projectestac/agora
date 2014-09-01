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

//------------------------------------------------------------------------------//
// General description:                                                         //
// Applet: An applet is a Java program designed to be executed in a web page    //
// through a navigator who supports Java. All the last versions of Netscape or  //
// Microsoft Internet Explorer include it by defect.                            //
// WIRIS CAS (Computer Algebra System): mathematical calculation Tool that      //
// works through an applet.                                                     //
// Web Service: A web service is a component of software that can describe      //
// itself and provides certain functionality to other applications, through an  //
// Internet connection.                                                         //
// WIRIS EDITOR: Formulas publisher who allows to generate images of these      //
// formulas through a Web Service.                                              //
// Regular expression: A regular expression is a model or a form to compare     //
// with a chain of characters.                                                  //
//                                                                              //
// Wiris Filter Description:                                                    //
// It is a filter that allows to visualize applets that use WIRIS CAS and       //
// images (of formulas) generated through the WIRIS Formula Image Service.      //
//                                                                              //
// Replaces all substrings ''«applet ... «/applet»' by the corresponding WIRIS  //
// applet code: '<applet ... </applet>'                                         //
// Replaces all substrings '«math ... «/math»' by the corresponding MathML      //
// code: '<math ... </math>'                                                    //
//------------------------------------------------------------------------------//

class filter_wiris extends moodle_text_filter {

	public function filter($text, array $options = array()) {
		$n0 = stripos($text, '«math');
		$n1 = stripos($text, '<math');
		$n2 = stripos($text, '«applet');
		
		if ($n0 === false && $n1 === false && $n2 === false) {
			// Nothing to do
			return $text;
		}

		require_once "wirispluginwrapper.php";
		
		$wirisplugin = new WIRISpluginWrapper();
		if (!$wirisplugin->is_installed()) {
			return $text;
		}

		$wirisplugin->begin();
		$textservice = $wirisplugin->get_instance()->newTextService();
		
		$query = '';

		global $COURSE;
        
        if(isset($COURSE->id)){
            $query .= 'course=' . $COURSE->id;
        }
        if(isset($COURSE->category)) {
            $query .= empty($query) ? '' : '/';
            $query .= 'category=' . $COURSE->category;
        }

        $prop['refererquery'] = $query;
        
		$text = $textservice->filter($text, $prop);
		$prop['savemode'] = 'xml';
		$text = $textservice->filter($text, $prop);
		$wirisplugin->end();
		return $text;
	}
}

