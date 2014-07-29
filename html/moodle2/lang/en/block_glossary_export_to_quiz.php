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
 * Strings for component 'block_glossary_export_to_quiz', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_glossary_export_to_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allentries'] = 'All entries';
$string['clicktoexport'] = 'Click to export this glossary\'s entries to quiz (XML)';
$string['concept'] = 'Alphabetical order';
$string['emptyglossaries'] = 'This course glossaries are empty (no entries)';
$string['emptyglossary'] = 'This course glossary is empty (no entries)';
$string['exportentriestoxml'] = 'Export entries to Quiz (XML)';
$string['firstmodified'] = 'Oldest entries first';
$string['generalhelp'] = 'Block Help';
$string['glossary_export_to_quiz:addinstance'] = 'Add a new glossary_export_to_quiz block';
$string['glossary_export_to_quiz:myaddinstance'] = 'Add a new glossary_export_to_quiz block to the My Moodle page';
$string['lastmodified'] = 'Most recent entries first';
$string['limitnum'] = 'Maximum number of entries to export';
$string['limitnum_help'] = 'Leave empty to export all entries from selected Glossary or Category.
This option can be useful for exporting a limited number of entries from very large glossaries.';
$string['multichoice'] = 'Multiple Choice';
$string['noglossaries'] = 'No glossaries in this course';
$string['nolink'] = 'Remove glossary autolinks';
$string['notenoughentriesavailable'] = 'Not enough entries available ({$a}) for Multichoice questions (minimum 4 entries needed).';
$string['notenoughentriesselected'] = 'Not enough entries selected ({$a}) for Multichoice questions (minimum 4 entries needed).';
$string['notyetconfigured'] = 'Please <b>Turn editing on</b> to configure this block.';
$string['notyetconfiguredediting'] = 'Please click the Actions icon to configure this block.';
$string['numentries'] = 'Export {$a} entries';
$string['pluginname'] = 'Export Glossary to Quiz';
$string['pluginname_help'] = 'Right-click the <b>More Help</b> link to view the Moodle Documentation Wiki.';
$string['pluginname_link'] = 'block/glossary_export_to_quiz/edit';
$string['questiontype'] = 'Question type:';
$string['questiontype_help'] = 'Glossary entries can be exported to the Quiz Questions bank either as multiple choice or short answer questions.
Multiple choice questions will consist of the following elements:

* question text = glossary entry definition
* correct answer = glossary entry concept
* distracters = 3 glossary entry concepts randomly selected from the glossary (or glossary category) that you have selected.

Short answer questions

* Case insensitive. Student responses will be accepted as correct regardless of the original glossary entry concept case (uppercase or lowercase).
** Example: original entry "Moodle". Accepted correct responses: "Moodle", "moodle".
* Case sensitive. Student responses will be only be accepted as correct it the case of the original glossary entry concept is used..
** Example: original entry "Moodle". Accepted correct response: "Moodle".';
$string['random'] = 'Randomly';
$string['selectglossary'] = 'Select glossary to export from';
$string['selectglossary_help'] = 'Use the dropdown list to select the glossary that you want to use to export its entries to the quiz questions bank.
If that glossary contains categories, you can select only one category to export its entries.
To cancel your choice or to reset the block, simply leave the dropdown list on the Choose... position.';
$string['shortanswer'] = 'Short answer';
$string['shortanswer_0'] = 'Short answer (Case insensitive)';
$string['shortanswer_1'] = 'Short answer (Case sensitive)';
$string['sortingorder'] = 'Sorting Order';
$string['sortingorder_help'] = 'Use this setting to determine how the exported glossary entries will be ordered when you import them to your questions data bank.
This can be used, in combination with the Maximum number of entries, for creating a quiz to test the latest entries to your glossary (especially a fairly large one).';
