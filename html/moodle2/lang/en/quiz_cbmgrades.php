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
 * Strings for component 'quiz_cbmgrades', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   quiz_cbmgrades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accy'] = 'Accuracy';
$string['accychosen'] = 'Accuracy **';
$string['cbm_accy'] = 'Acc\'y + Bonus';
$string['cbm_av'] = 'CBM Avg';
$string['cbm_avchosen'] = 'CBM Avg **';
$string['cbm_bonus'] = 'CBM Bonus';
$string['cbmexplanations'] = 'CBM Explanations:';
$string['cbmgrades'] = 'CBM Grades';
$string['cbmgradesdownload'] = 'CBM download';
$string['cbmgradesfilename'] = 'cbmgrades';
$string['cbmgrades_help'] = 'All correct at C=1 would give the same grade as the maximum without CBM. Grades with CBM can be up to 3 times this.<br><br>
CBM Average (&le; 3.0) and Accuracy (&le; 100% correct - ignoring certainty) are calculated by weighting questions according to \'max marks\' if settings vary within the quiz.
They can be expressed relative to the entire quiz, or to just those questions the student responsed to. When a student is doing a self-test on selected parts of a quiz,
 the scores based on responses are more instructive.<br><br>
A positive CBM bonus means certainty ratings were employed successfully to distinguish between reliable and uncertain answers.
Accuracy + Bonus gives a more reliable measure of knowledge and predictor of future performance than simple accuracy.<br><br>
CBM scores can be negative, indicating that the student has misconceptions (confident errors) and has done worse than if he or she acknowledged uncertainty and simply guessed.';
$string['cbmgrades_link'] = 'qbehaviour/deferredcbm/certaintygrade';
$string['cbmgradesoptions'] = 'CBM Grades options';
$string['cbmgradesreport'] = 'CBM report';
$string['cbmgradestitle'] = 'CBM Grades';
$string['chosenresps'] = 'Show scores based on chosen responses rather than the whole quiz. &nbsp;';
$string['grade'] = 'Grade';
$string['marks'] = 'Marks';
$string['pagesize'] = 'Page size';
$string['pluginname'] = 'CBM Summary';
$string['qdata'] = 'Show data for each Q';
$string['qx'] = 'Q{$a}';
$string['responses'] = 'Responses';
$string['responsex'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Q{$a}';
$string['scoreschosenrs'] = '** NB Showing scores based on only the Qs that the student responded to.';
$string['scoreswhole'] = 'Showing scores based on the whole quiz.';
$string['showthe'] = 'Options:';
