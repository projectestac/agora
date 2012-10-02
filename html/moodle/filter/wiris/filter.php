<?php
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
// Technical description:                                                       //
// The filter begins its execution with the function 'wiris_filter'.            //
// This means that it will not be called from any other function defined here   //
// if is not through this one.                                                  //
//                                                                              //
// Replaces all substrings ''«applet ... «/applet»' by the corresponding WIRIS   //
// applet code: '<applet ... </applet>'                                         //
// Replaces all substrings '«math ... «/math»' by the corresponding MathML      //
// code: '<math ... </math>'                                                    //
//------------------------------------------------------------------------------//

require_once($CFG->dirroot . '/filter/wiris/filter/applet_filter.php');
require_once($CFG->dirroot . '/filter/wiris/filter/math_filter.php');

function wiris_filter ($courseid, $text) {
    WF_initappletfilter();
    WF_initmathfilter();
    
    // Perform transformations if necessary
    $text = WF_filter_applet($text);
    $text = WF_filter_math($text,false);
    return $text;
}