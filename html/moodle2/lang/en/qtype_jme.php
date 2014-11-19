<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'qtype_jme', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_jme
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Blanks for {no} More Answers';
$string['answer'] = 'Answer: {$a}';
$string['answermustbegiven'] = 'You must enter an answer if there is a grade or feedback.';
$string['answerno'] = 'Answer {$a}';
$string['author'] = 'by Peter Ertl and Bruno Bienfait';
$string['configjmeoptions'] = 'Comma separated list of JSME applet options (see <a href="http://www.molinspiration.com/jme/doc/jme_functions.html">list of available options</a>)';
$string['correctansweris'] = 'The correct answer is: {$a}.';
$string['correctanswers'] = 'Correct answers';
$string['enablejava'] = 'Tried but failed to load JME editor. You have not got a JAVA runtime environment working in your browser. You will need one to attempt this question.';
$string['enablejavaandjavascript'] = 'Loading JME editor.... If this message does not get replaced by the JME editor then you have not got javascript and a JAVA runtime environment working in your browser.';
$string['enablejavascript'] = 'Loading JME editor.... If this message does not get replaced by the JSME editor then you have not got javascript working in your browser.';
$string['filloutanswers'] = 'Use the JavaScript Molecular editor to create the answers, then press the "Insert from editor" buttons to insert the SMILES code into the answer boxes';
$string['filloutoneanswer'] = 'Use the Javascript Molecular editor to create the answer, then press the "Insert from editor" button to insert the SMILES code into the answer box';
$string['height'] = 'Height';
$string['insert'] = 'Insert from editor';
$string['insertfromeditor'] = 'Insert from editor';
$string['jmeeditor'] = 'JSME Editor';
$string['jmeoptions'] = 'JSME Applet options';
$string['jme_options'] = 'JSME Applet options';
$string['jmeoptions_help'] = 'Enter a comma separated list of JSME applet options:<ul>
<li><strong>xbutton, noxbutton</strong> - show / hide the X button (even when not visible the X button functionality is accessible through the X and H key shortcuts</li>
<li><strong>rbutton, norbutton</strong> - show / hide the R button (to mark connection of substituent with the main scaffold)</li>
<!--r1button, r2button, r3button - show buttons with R1, R2 and R3 (useful for creation of scaffolds for combinatorial chemistry)<br>-->
<li><strong>atommovebutton, noatommovebutton</strong> - show / hide the atom move button</li>
<li><strong>hydrogens, nohydrogens</strong> - display / hide hydrogens</li>
<li><strong>query, noquery</strong> - enable / disable query features</li>
<li><strong>autoez, noautoez</strong> - automatic generation of SMILES with E,Z stereochemistry</li>
<li><strong>nocanonize</strong> - SMILES canonicalization and detection of aromaticity supressed</li>
<li><strong>nostereo</strong> - stereochemistry not considered when creating SMILES</li>
<li><strong>reaction, noreaction</strong> - enable / disable reaction input</li>
<li><strong>multipart</strong> - possibility to enter multipart structures</li>
<li><strong>polarnitro</strong> - prevent automatic conversion of nitro (and similar) groups into nonpolar form</li>
<li><strong>number/ autonumber</strong> - possibility to number (mark) atoms</li>
<li><strong>depict</strong> - the applet will appear without editing butons, this is used for structure display only</li>
<li><strong>border</strong> (used together with the depict option) - displays a border around depicted molecule</li>
<li><strong>newlook, oldlook</strong> - turn on/off the old Java based JME look (default is off)</li></ul>';
$string['notenoughanswers'] = 'This type of question requires at least {$a} answers';
$string['pleaseenterananswer'] = 'Please enter an answer.';
$string['pluginname'] = 'Javascript Molecular Editor';
$string['pluginnameadding'] = 'Adding a JavaScript Molecular Editor question';
$string['pluginnameediting'] = 'Editing a Javascript Molecular Editor question';
$string['pluginname_help'] = 'Allows a response of a molecule that is graded by comparing against various model answers.';
$string['pluginname_link'] = 'question/type/jme';
$string['pluginnamesummary'] = 'Allows a response of a molecule that is graded by comparing against various model answers.';
$string['setoptions'] = 'Set JSME options';
$string['width'] = 'width';
$string['youranswer'] = 'Your answer: {$a}';
