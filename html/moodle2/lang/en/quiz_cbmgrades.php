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
$string['cbm_accy'] = 'Acc\'y + Bonus';
$string['cbm_av'] = 'CBM Avg';
$string['cbm_bonus'] = 'CBM Bonus';
$string['cbmexplanations'] = 'CBM Explanations:';
$string['cbmgrade'] = 'CBM Grade';
$string['cbmgrades'] = 'CBM Grades';
$string['cbmgradesdownload'] = 'CBM download';
$string['cbmgradesfilename'] = 'cbmgrades';
$string['cbmgrades_help'] = 'All correct at C=1 would give the same grade as the maximum without CBM. Grades with CBM can be up to 3 times this.<br><br>
        Other scores (Average CB Mark, Accuracy (= % correct), CB Bonus and
        CB Accuracy (= Accuracy + Bonus) can be displayed for the whole quiz, or relative to just those questions where the student has
        chosen to enter a response. Thus if a student has chosen 50% of the questions and got 80% of these right, the accuracy could
        be shown either as 40% or 80%. The first would be appropriate for an exam assessment, the second could be more appropriate
        for self-testing.<br><br>
        In calculating overall scores, individual scores (up to 3 for CBM, up to 100% correct for simple marking) are weighted in
        proportion to the maximum mark or \'weight\' set for each question (usually simply 1).<br><br>
        The CBM bonus shows how much your CBM mark total benefitted from successfull identification of reliable and uncertain answers.
        This is added to the simple accuracy to give your CB Accuracy. This is a more reliable measure of knowledge and predictor of
        future performance than simple accuracy. A negative bonus indicates that the student has misconceptions (confident errors) or
        poor judgement of the reliability or unreliability of their answers.';
$string['cbmgrades_link'] = 'qbehaviour/deferredcbm/certaintygrade';
$string['cbmgradesoptions'] = 'CBM Grades options';
$string['cbmgradesreport'] = 'CBM report';
$string['cbmgradestitle'] = 'CBM Grades';
$string['chosenresps'] = 'Show scores based on chosen questions rather than the whole quiz. &nbsp;';
$string['grade'] = 'Grade';
$string['marks'] = 'Marks';
$string['pagesize'] = 'Page size';
$string['pluginname'] = 'CBM Summary';
$string['qdata'] = 'Show data for each Q';
$string['qx'] = 'Q{$a}';
$string['responses'] = 'Responses';
$string['responsex'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Q{$a}';
$string['scoreschosenrs'] = 'CBM SCORES: ** NB Scores marked ** are based on the student\'s chosen responses, not on the whole quiz.';
$string['scoreswhole'] = 'CBM GRADE & SCORES: Showing scores based on the whole quiz.';
$string['showthe'] = 'Options:';
