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
 * Strings for component 'qtype_gapfill', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_gapfill
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerdisplay'] = 'Display Answers';
$string['answerdisplay_help'] = 'Dragdrop shows a list of words that can be dragged into the gaps, gapfill shows gaps with no word options, dropdown shows the same list of correct (and possibly incorrect) answers for each field';
$string['casesensitive'] = 'Case Sensitive';
$string['casesensitive_help'] = 'When this is checked, if the correct answer is CAT, cat will be flagged as a wrong answer';
$string['delimitchars'] = 'Delimit characters';
$string['delimitchars_help'] = 'Change the characters that delimit a field from the default [ ], useful for programming language questions';
$string['disableregex'] = 'Disable Regex';
$string['disableregex_help'] = 'Disable regular expression processing and perform a standard string comparison. This can be useful for html quesitons where the angle brackets (&lt; and &gt;) should be treated literally and maths where symbols such as * should be seen literally rather than as expressions';
$string['displaydragdrop'] = 'dragdrop';
$string['displaydropdown'] = 'dropdown';
$string['displaygapfill'] = 'gapfill';
$string['duplicatepartialcredit'] = 'Credit is partial because you have duplicate answers';
$string['gapfill'] = 'Gapfill.';
$string['moreoptions'] = 'More Options.';
$string['noduplicates'] = 'No Duplicates';
$string['noduplicates_help'] = 'When checked, each answer must be unique, useful where each field has a | operator, i.e. what are the colours of the Olympic medals and each field has [gold|silver|bronze], if the student enters gold in every field only the first will get a mark (the others will still get a tick though). It is really more like discard duplicate answers for marking purposes';
$string['pleaseenterananswer'] = 'Please enter an answer.';
$string['pluginname'] = 'Gapfill question type';
$string['pluginnameadding'] = 'Adding a Gap Fill Question.';
$string['pluginnameediting'] = 'Editing Gap Fill.';
$string['pluginname_help'] = 'Place the words to be completed within square brackets e.g. The [cat] sat on the [mat].  If mat or rug are acceptable use [mat|rug]. Dropdown and Dragdrop modes allows for a shuffled list of answers to be displayed which can include optional wrong/distractor answers.';
$string['pluginname_link'] = 'question/type/gapfill';
$string['pluginnamesummary'] = 'A fill in the gaps style question. Fewer features than the standard Cloze type, but simpler syntax';
$string['questionsmissing'] = 'You have not included any fields in your question text';
$string['wronganswers'] = 'Distractors.';
$string['wronganswers_help'] = 'List of incorrect words designed to distract from the correct answers. Each word is separated by commas, only applies in dragdrop/dropdowns mode';
$string['yougotnrightcount'] = 'Your number of correctly filled in gaps is {$a->num}.';
