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
 * Strings for component 'gradingform_btec', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_btec
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomment'] = 'Add frequently used comment';
$string['addcriterion'] = 'Add criterion';
$string['alwaysshowdefinition'] = 'Show BTEC definition to students';
$string['and'] = 'and';
$string['backtoediting'] = 'Back to editing';
$string['btecgrading'] = 'How BTEC grading works';
$string['btecgrading_help'] = 'BTEC grading is binary and accumulative. Students can either get or not get a level, there are no numbers or percentages. They can only get a level
		if they have every item at that level and the one below. <br />So you only get an overall Pass if you get all Pass criteria. You only get a Merit if you have all Pass and all Merit
		criteria, you only get a Distinction if you get all Pass, all Merit and all Distinction. If a student does not get all Pass criteria they get a Refer';
$string['btecgrading_link'] = 'BTEC_marking';
$string['btecmappingexplained'] = 'WARNING: Your BTEC marking has a maximum grade of <b>{$a->maxscore} points</b> but the maximum grade set in your activity is {$a->modulegrade}  The maximum score set in your BTEC marking will be scaled to the maximum grade in the module.<br />
    Intermediate scores will be converted respectively and rounded to the nearest available grade.';
$string['btecnotcompleted'] = 'Please provide a valid grade for each criterion';
$string['btecoptions'] = 'BTEC marking options';
$string['btecscale'] = 'Refer,Pass,Merit,Distinction';
$string['btecscale_description'] = 'No numbers or percentages, a level is only gained if every item at that level and below is gained';
$string['btecstatus'] = 'Current BTEC marking status';
$string['clicktocopy'] = 'Click to copy this text into the criteria feedback';
$string['clicktoedit'] = 'Click to edit';
$string['clicktoeditname'] = 'Click to edit level (e.g. P1, D2 etc)';
$string['comments'] = 'Frequently used comments';
$string['commentsdelete'] = 'Delete comment';
$string['commentsempty'] = 'Click to edit comment';
$string['commentsmovedown'] = 'Move down';
$string['commentsmoveup'] = 'Move up';
$string['confirmdeletecriterion'] = 'Are you sure you want to delete this item?';
$string['confirmdeletelevel'] = 'Are you sure you want to delete this level?';
$string['countofpasscriteria'] = 'Count of PASS criteria';
$string['criteriarequirements'] = 'Requirements for completing criteria';
$string['criterion'] = 'Criterion';
$string['criteriondelete'] = 'Delete criterion';
$string['criterionempty'] = 'Click to edit criterion';
$string['criterionmovedown'] = 'Move down';
$string['criterionmoveup'] = 'Move up';
$string['d'] = 'd';
$string['definebtecmarking'] = 'Btec Marking';
$string['definemarkingbtec'] = 'Define BTEC marking';
$string['description'] = 'Description';
$string['descriptionmarkers'] = 'Description for Markers';
$string['descriptionstudents'] = 'Description for Students';
$string['duplicateelements'] = 'Duplicate criteria element, see';
$string['endwithadigit'] = 'must end with a digit';
$string['err_maxscorenotnumeric'] = 'Criterion max score must be numeric';
$string['err_nocomment'] = 'Comment can not be empty';
$string['err_nodescription'] = 'Student description can not be empty';
$string['err_nodescriptionmarkers'] = 'Marker description can not be empty';
$string['err_nomaxscore'] = 'Criterion max score can not be empty';
$string['err_noshortname'] = 'Criterion name can not be empty';
$string['err_scoreinvalid'] = 'The score given to {$a->criterianame} is not valid, the max score is: {$a->maxscore}';
$string['gradeheading'] = 'BTEC grade editing';
$string['gradelevels'] = 'Grade Levels';
$string['gradelevels_help'] = 'Criteron names must start with the letters P, M or D (Pass, Merit or Distinction) and be followed by a number, e.g. P1 or M2 or D3 etc';
$string['gradingof'] = '{$a} grading';
$string['hidemarkerdesc'] = 'Hide marker criterion descriptions';
$string['hidestudentdesc'] = 'Hide student criterion descriptions';
$string['m'] = 'm';
$string['maxscore'] = 'Maximum mark';
$string['name'] = 'Name';
$string['needregrademessage'] = 'The BTEC marking definition was changed after this student had been graded. The student can not see this BTEC marking until you check the BTEC marking and update the grade.';
$string['no'] = 'no';
$string['p'] = 'p';
$string['pluginname'] = 'BTEC marking';
$string['previewbtecmarking'] = 'Preview BTEC marking';
$string['regrademessage1'] = 'You are about to save changes to a BTEC marking that has already been used for grading. Please indicate if existing grades need to be reviewed. If you set this then the BTEC marking will be hidden from students until their item is regraded.';
$string['regrademessage5'] = 'You are about to save significant changes to a BTEC marking that has already been used for grading. The gradebook value will be unchanged, but the BTEC marking will be hidden from students until their item is regraded.';
$string['regradeoption0'] = 'Do not mark for regrade';
$string['regradeoption1'] = 'Mark for regrade';
$string['restoredfromdraft'] = 'NOTE: The last attempt to grade this person was not saved properly so draft grades have been restored. If you want to cancel these changes use the \'Cancel\' button below.';
$string['save'] = 'Save';
$string['savebtec'] = 'Save BTEC marking and make it ready';
$string['savebtecdraft'] = 'Save as draft';
$string['score'] = 'score';
$string['showdescriptionstudent'] = 'Display description to those being graded';
$string['showmarkerdesc'] = 'Show marker criterion descriptions';
$string['showmarkspercriterionstudents'] = 'Show marks per criterion to students';
$string['showstudentdesc'] = 'Show student criterion descriptions';
$string['startwithpmd'] = '{$a->level} must start with letters  {$a->p},{$a->m} or {$a->d} ;';
$string['yes'] = 'yes';
