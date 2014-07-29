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
 * Strings for component 'qtype_varnumeric', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_varnumeric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['combinedcontrolnamevarnumeric'] = 'numeric input';
$string['err_notavalidnumberinanswer'] = 'You need to enter a valid number here in the answer field.';
$string['err_notavalidnumberinerrortolerance'] = 'You have entered an invalid number in the error response field.';
$string['pluginname'] = 'Variable numeric';
$string['pluginnameadding'] = 'Adding a Variable numeric question';
$string['pluginnameediting'] = 'Editing a Variable numeric question';
$string['pluginname_help'] = 'In response to a question the respondent types a number.

Numbers used in the question and used to calculate the answer are calculated on the fly from mathematical expressions or predefined variables.

All expressions are calculated on the fly and values from random functions are different for all users. For a question with set values for a number of question \'variants\', with expressions precalculated and with random values the same for each user see the \'Variable numeric set\' question type.';
$string['pluginname_link'] = 'question/type/varnumeric';
$string['pluginnamesummary'] = 'Allows a numeric response, expressions are evaluated on the fly and the evaluated expression is compared to the student response';
$string['scinotation'] = 'Scientific notation';
$string['value'] = 'Value';
$string['value_help'] = 'Enter values for \'Predefined variables\' here or you will see calculated values displayed here for a \'Calculated variable\'.

Be aware that for a calculated value the value you see will be different for each user.';
