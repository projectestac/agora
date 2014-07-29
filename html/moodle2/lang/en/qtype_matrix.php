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
 * Strings for component 'qtype_matrix', language 'en', branch 'MOODLE_22_STABLE'
 *
 * @package   qtype_matrix
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addingmatrix'] = 'Adding Matrix';
$string['all'] = 'All';
$string['any'] = 'Any';
$string['collong'] = 'Description';
$string['colsheader'] = 'Matrix columns';
$string['colsheader_desc'] = '<p>Shorttext will be used when it\'s present, with the longer text as a tooltip.<br />Be mindful of how this will be displayed.</p>
<p>Students can select multiple or single columns per row, depending on how the question has been configured, and each row receives a grade, defined by one of the grading methods.</p>
<p>The final grade for the question is an average of their grades for each of the rows with the exeption of the Kprime type where all answers have to be correct.</p>';
$string['colshort'] = 'Title';
$string['editingmatrix'] = 'Editing Matrix';
$string['false'] = 'False';
$string['grademethod'] = 'Grading method';
$string['grademethod_help'] = '<p>There are a few options for the grading method for matrix question types:</p>
<p>Each of these, but Kprime, relate to how each <b>row</b> is graded, with the total grade for the question being the average of all the rows. Kprime requires that all rows must be correct to get the point. If it is not the case the studend receives 0.</p>
<table>
  <tr><td><b>Kprime</b></td><td>The student must choose all correct answers, and none of the wrong ones, to get 100%, else 0%. Including rows. If one row is wrong then the mark for the question is 0.</td></tr>
  <tr><td><b>Any correct, and none wrong</b></td><td>The student must choose at least one of the correct answers, and none of the wrong ones, to get 100%, else 0%</td></tr>
  <tr><td><b>All correct, and none wrong</b></td><td>The student must choose exactly all of the correct answers, and none of the wrong ones, to get 100%, else 0%</td></tr>
  <tr><td><b>No grading</b></td><td>There is no grading used for this question (use this for Likert Scales for example)</td></tr>
  <tr><td><b>Weighted grading</b></td><td>Each cell receives a weighting, and the positive values for each row must add up to 100%</td></tr>
</table>';
$string['kprime'] = 'K\'';
$string['matrix'] = 'Matrix';
$string['matrixheader'] = 'Grading matrix';
$string['matrix_help'] = '<p>This question type allows the teacher to define the rows and columns that make up a matrix.</p>
<p>Students can select either multiple or single answers per row, depending on how the question has been configured. Each row receives a grade defined by one of the grading methods.</p>
<p>The final grade for the question is an average of their grades for each of the rows</p>';
$string['matrixsummary'] = 'Matrix question type';
$string['multipleallowed'] = 'Multiple responses allowed';
$string['mustaddupto100'] = 'The sum of all non negative weights in each row must be 100%';
$string['mustdefine1by1'] = 'You must define at least a 1 x 1 matrix; with either short or long answer defined for each row and column';
$string['none'] = 'None';
$string['oneanswerperrow'] = 'You must provide an answer for each row';
$string['pluginname'] = 'Matrix question';
$string['refresh_matrix'] = 'Refresh matrix';
$string['rowfeedback'] = 'Feedback';
$string['rowlong'] = 'Description';
$string['rowsheader'] = 'Matrix rows';
$string['rowsheader_desc'] = '<p>Shorttext will be used when it\'s present, with the longer text as a tooltip.<br />Be mindful of how this will be displayed</p>
<p>Students can select multiple or single columns per row, depending on how the question has been configured, and each row receives a grade, defined by one of the grading methods.</p>
<p>The final grade for the question is an average of their grades for each of the rows with the exeption of the Kprime type where all answers have to be correct.</p>';
$string['rowshort'] = 'Title';
$string['true'] = 'True';
$string['weighted'] = 'Weighted';
$string['weightednomultiple'] = 'It doesn\'t make sense to choose weighted grading with multiple answers not allowed';
