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
 * Strings for component 'qtype_easyolewis', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_easyolewis
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Blanks for {no} More Answers';
$string['answer'] = 'Answer: {$a}';
$string['answermustbegiven'] = 'You must enter an answer if there is a grade or feedback.';
$string['answerno'] = 'Answer {$a}';
$string['author'] = 'Question type courtesy of<br />Carl LeBlond,<br />Indiana University of Pennsylvania';
$string['casecharge'] = 'Charges';
$string['casechargeorlonepairs'] = '<b>Sub question type:</b> Charge  question or Lone pair questions.  (i.e. Strip charges or lone pairs from structure)';
$string['caselonepairs'] = 'Lone Pairs or Radicals';
$string['configeasyolewisoptions'] = 'The path of your marvin installation relative to your web root.  (e.g. If your moodle is installed at /var/www/moodle and you install your marvin at /var/www/marvin then you should use the default /marvin)';
$string['correctansweris'] = 'The correct answer is: {$a}.';
$string['correctanswers'] = 'Instructions';
$string['easyolewiseditor'] = 'MarvinSketch Editor';
$string['easyolewis_options'] = 'Path to Marvin Applet installation';
$string['enablejava'] = 'Tried but failed to load Marvinsketch editor. You have not got a JAVA runtime environment working in your browser. You will need one to attempt this question.';
$string['enablejavaandjavascript'] = 'Loading Marvinsketch editor.... If this message does not get replaced by the Marvin editor then you have not got javascript and a JAVA runtime environment working in your browser.';
$string['filloutanswers'] = 'Use the MarvinSketch Molecular editor to create the answer, then press the "Insert from editor" button to insert the chemaxon mrv "xml" code into the answer box.  You must explicitly show all hydrogens, lone pairs or radical electrons!';
$string['filloutoneanswer'] = '<b><ul>
<li>Choose whether you want charge or lone pair/radical electron problem.</li>
<li>Draw a complete structure(s) including all electrons and charges in the applet below.  <b>Note:  You must explicitly show all hydrogen atoms.</b></li>
<li>Click the "Insert from editor" button when finished.</li>
</ul></b>';
$string['insert'] = 'Insert from editor';
$string['insertfromeditor'] = 'Insert from editor';
$string['instructions'] = 'The ChemAxon ("mrv") representation of your model must be stored in the following field in order to be graded:';
$string['javaneeded'] = 'To use this page you need a Java-enabled browser. Download the latest Java plug-in from {$a}.';
$string['notenoughanswers'] = 'This type of question requires at least {$a} answers';
$string['pleaseenterananswer'] = 'Please enter an answer.';
$string['pluginname'] = 'Lewis Structures';
$string['pluginnameadding'] = 'Adding a Lewis Structure question';
$string['pluginnameediting'] = 'Editing a Lewis Structure question';
$string['pluginname_help'] = 'Students must provide lone pairs or charges on atoms in a molecule.  You can ask questions such as:<br> <ul>Given the following Lewis structure, provide the correct atomic charges where needed?</ul><ul>Provide the proper charge or charges for the following Lewis structure?</ul>';
$string['pluginname_link'] = 'question/type/easyolewis';
$string['pluginnamesummary'] = 'Student must provide electrons (pairs or radicals) or charges to atoms in molecule which you predefine.  You can ask questions such as:<ul><li>Given the following Lewis structure, provide the correct atomic charges where needed?</li><li>Provide the proper charges on any atoms requiring it in the following Lewis structure?</li><li>Show all lone pair or radical electrons required to satisfy the charge on any atoms?</li></ul>';
$string['youranswer'] = 'Your answer: {$a}';
