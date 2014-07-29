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
 * Strings for component 'qtype_multichoiceset', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_multichoiceset
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['correctanswer'] = 'Correct';
$string['distractor'] = 'Incorrect';
$string['errnocorrect'] = 'At least one of the choices should be correct so that it is possible to get a full grade for this question.';
$string['included'] = 'Correct';
$string['pluginname'] = 'All-or-Nothing Multiple Choice';
$string['pluginnameadding'] = 'Adding an All-or-Nothing Multiple Choice Question';
$string['pluginnameediting'] = 'Editing an All-or-Nothing Multiple Choice Question';
$string['pluginname_help'] = 'After an optional introduction, the respondent can choose one or more answers.  If the chosen answers correspond exactly to the "Correct" choices defined in the question, the respondent gets 100%.  If he/she chooses any "Incorrect" choices or does not select all of the "Correct" choices, the grade is 0%. At least one choice must be marked correct for each question.  Add a "None of the above" option to handle a question where none of the other choices are correct.  Unlike the multiple choice question with fractional grades, the only possible grades for an all-or-nothing question are 100% or 0%';
$string['pluginname_link'] = 'question/type/multichoiceset';
$string['pluginnamesummary'] = 'Allows the selection of multiple responses from a pre-defined list and uses all-or-nothing grading (100% or 0%).';
$string['showeachanswerfeedback'] = 'Show the feedback for the selected responses.';
