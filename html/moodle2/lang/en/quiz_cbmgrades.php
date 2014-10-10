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
 * Strings for component 'quiz_cbmgrades', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   quiz_cbmgrades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accy'] = 'Accuracy';
$string['cbm_accy'] = 'CB Accuracy';
$string['cbm_av'] = 'Avg (max=3)';
$string['cbm_bonus'] = 'CB Bonus';
$string['cbmexplanations'] = 'CBM Explanations:';
$string['cbmgrade'] = 'CB Grade';
$string['cbmgrades'] = 'CBM Grades';
$string['cbmgradesdownload'] = 'CBM download';
$string['cbmgradesfilename'] = 'cbmgrades';
$string['cbmgrades_help'] = 'With Certainty Based Marking (CBM), all correct at C=1 (low certainty)
        will give a Moodle Grade of 100%. Grades may be as high as 300% if every question is correct with C=3
       (high certainty). Simple Moodle Grades with CBM are not easily compared with Grades without CBM,
        unless converted to CB Grades (below).

**Accuracy** is the percentage correct, ignoring certainty but weighted with the max values assigned to each question.
        If the student successfully distinguishes more and less reliable answers, this is reflected in a **CB Bonus**,
        which  is positive if the total marks are higher than could be obtained with the same answers at uniform certainty.
        The **CB Accuracy** (=Accuracy + Bonus) is the clearest measure of knowledge. The **CB Grade** is the
        CB Accuracy multiplied by the maximum grade assigned to the quiz.';
$string['cbmgrades_link'] = 'qbehaviour/deferredcbm/certaintygrade';
$string['cbmgradesoptions'] = 'CBM Grades options';
$string['cbmgradesreport'] = 'CBM report';
$string['cbmgradestitle'] = 'CBM Grades';
$string['chosenresps'] = 'Show scores based on chosen questions rather than the whole quiz. &nbsp;';
$string['grade'] = 'Moodle Grade';
$string['marks'] = 'Mark Total';
$string['pagesize'] = 'Page size';
$string['pluginname'] = 'CBM Summary';
$string['qdata'] = 'Show data for each Q';
$string['qx'] = 'Q{$a}';
$string['responses'] = 'Responses';
$string['responsex'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Q{$a}';
$string['scoreschosenrs'] = 'CBM SCORES: ** NB Scores marked ** are based on the student\'s chosen responses, not on the whole quiz.';
$string['scoreswhole'] = 'CBM GRADE & SCORES: Showing scores based on the whole quiz.';
$string['showthe'] = 'Options:';
