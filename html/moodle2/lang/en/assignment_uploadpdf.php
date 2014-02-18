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
 * Strings for component 'assignment_uploadpdf', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment_uploadpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addquicklist'] = 'Add to comment Quicklist';
$string['annotatesubmission'] = 'Annotate submission';
$string['backtocommentlist'] = 'Back to comment list';
$string['cancel'] = 'Cancel';
$string['cannotedit'] = 'Only administrators can edit site templates';
$string['checklistunfinished'] = 'Checklist incomplete - please tick-off all the items before submitting your work';
$string['checklistunfinishedheading'] = 'Checklist incomplete';
$string['chooseitem'] = 'Choose an item to edit';
$string['choosetemplate'] = 'Choose a template to edit';
$string['clicktosetposition'] = 'Click on the image below to set this position';
$string['colourblack'] = 'Black';
$string['colourblue'] = 'Blue';
$string['colourclear'] = 'Clear';
$string['colourgreen'] = 'Green';
$string['colourred'] = 'Red';
$string['colourwhite'] = 'White';
$string['colouryellow'] = 'Yellow';
$string['comment'] = 'Comment';
$string['commentcolour'] = '[,] - comment background colour';
$string['commenticon'] = 'c - add commentsnHold Ctrl to draw a line';
$string['completedsubmission'] = 'Download completed submission';
$string['coversheet'] = 'Coversheet';
$string['coversheet_help'] = 'The file chosen here (which must be a PDF) will be automatically attached to the beginning of the files uploaded by the student.<br/>
There will be a link to this coversheet on the student\'s upload page, so that they are aware of what will be added.<br/>
<em>Note:</em> it is possible to automatically fill in details on the front page of this coversheet, by making use of templates (see the next item down on the settigs page).';
$string['coversheetnotice'] = 'The following coversheet will be automatically added to your submission';
$string['coversheetnotpdf'] = 'Coversheet must be a PDF (or blank)';
$string['coversheettemplate'] = 'Template';
$string['coversheettemplate_help'] = 'If you select a template, then, before a student can submit their work, they will need to fill in a number of details (the exact details are specified in the template). These details will be automatically added to the front page of the coversheet, in the positions specified by the template.<br/>
You can create/delete/modify templates by clicking on the \'Edit Templates...\' button.<br/>
<em>Note:</em> Selecting a template, without specifying a coversheet will have no effect.';
$string['createsubmissionfailed'] = 'Unable to create submission PDF';
$string['dateformatlink'] = 'Date format help';
$string['deletecomment'] = 'Delete comment';
$string['deleteitem'] = 'Delete item';
$string['deletetemplate'] = 'Delete template';
$string['displaychecklist'] = 'Display checklist';
$string['downloadfirstsubmission'] = 'download the first submission';
$string['downloadoriginal'] = 'Download original submission PDF';
$string['draftsaved'] = 'Draft saved';
$string['duplicatetemplate'] = 'Duplicate template';
$string['edittemplate'] = 'Edit templates';
$string['edittemplatetip'] = 'Edit templates';
$string['emptyquicklist'] = 'No items in Quicklist';
$string['emptyquicklist_instructions'] = 'Right-click on a comment to copy it to the Quicklist';
$string['enterformtext'] = 'Enter form text';
$string['eraseicon'] = 'e - erase lines and shapes';
$string['errorgenerateimage'] = 'Unable to generate image from PDF - check ghostscript is installed and this module has been configured to use it (see README.txt for more details)';
$string['errorloadingpdf'] = 'Error loading submitted PDF';
$string['errormessage'] = 'Error message:';
$string['filenotpdf'] = 'The file \'{$a}\' is not a PDF - you must resubmit it in that format';
$string['filenotpdf_continue'] = 'The file \'{$a}\' is not a PDF - are you sure you want to continue?';
$string['findcomments'] = 'Find comments';
$string['findcommentsempty'] = 'No comments';
$string['freehandicon'] = 'f - freehand lines';
$string['generateresponse'] = 'Generate Response';
$string['heading_templatedatamissing'] = 'Coversheet information not filled in';
$string['highlighticon'] = 'h - highlight text';
$string['invalidpdf'] = '\'{$a}\' does not appear to be a valid PDF';
$string['isresubmission'] = 'This is a resubmission -';
$string['itemdate'] = 'Date';
$string['itemsetting'] = 'Value';
$string['itemsettingmore'] = 'name of the field (for text fields) or date format (e.g. d/m/Y)';
$string['itemshorttext'] = 'Short text';
$string['itemtext'] = 'Text';
$string['itemtype'] = 'Item type';
$string['itemwidth'] = 'Width (pixels)';
$string['itemx'] = 'X Position (pixels)';
$string['itemy'] = 'Y Position (pixels)';
$string['keyboardnext'] = 'n - next page';
$string['keyboardprev'] = 'p - previous page';
$string['linecolour'] = '{,} - line colour';
$string['lineicon'] = 'l - lines';
$string['mustcompletechecklist'] = 'Checklist complete before submission';
$string['newitem'] = 'New Item...';
$string['newtemplate'] = 'New Template...';
$string['next'] = 'Next';
$string['nocomments'] = 'There are currently no comments on this student\'s submission.';
$string['nonpdfheading'] = 'Non-PDF file found';
$string['nopdf'] = 'None of the files submitted are PDFs, you must submit at least one file in that format';
$string['notemplate'] = 'None';
$string['okagain'] = 'Click OK to try again';
$string['onlypdf'] = 'All files must be PDFs';
$string['onlypdf_help'] = 'Selecting \'Yes\' to this option will prevent students from submitting any files that are not PDFs.<br/>
If you select \'No\', then students will receive a warning about non-PDF files, but will still be able to submit <em>as long as at least one file is a PDF</em>.<br/>
This second option may be useful if you want students to be able to submit supporting files with interactive elements still working (e.g. a spreadsheet with the formulas in it), but only the PDF files will be available for annotation.';
$string['openfirstpage'] = 'Show the first page';
$string['openlinknewwindow'] = 'Open links in new window';
$string['opennewwindow'] = 'Open this page in a new window';
$string['ovalicon'] = 'o - ovals';
$string['pagenumber'] = 'Page';
$string['pluginname'] = 'Upload PDF';
$string['previewinstructions'] = 'Please upload a coversheet (PDF) to help preview this template';
$string['previous'] = 'Prev';
$string['previousnone'] = 'None';
$string['quicklist'] = 'Comment Quicklist';
$string['rectangleicon'] = 'r - rectangles';
$string['resend'] = 'Resend';
$string['responseok'] = 'Response generated OK';
$string['responseproblem'] = 'There was a problem creating the response';
$string['savedraft'] = 'Save Draft and Close';
$string['saveitem'] = 'Save item';
$string['savetemplate'] = 'Save template';
$string['select'] = 'Select';
$string['servercommfailed'] = 'Server communication failed - do you want to resend the message?';
$string['showprevious'] = 'Show';
$string['showpreviousassignment'] = 'Compare to';
$string['showused'] = 'This template is used in the following assignments';
$string['showwhereused'] = 'Show';
$string['sitetemplate'] = 'Whole site template';
$string['sitetemplatehelp'] = '(only an administrator can edit this setting)';
$string['stamp'] = 'Choose stamp';
$string['stampicon'] = 's - stamp';
$string['templatecopy'] = '(Copy)';
$string['templatedatamissing'] = 'You need to fill in all the requested details to create a coversheet for this assignment';
$string['templatename'] = 'Template name';
$string['templatenotused'] = 'This template is not currently being used';
$string['templateusecount'] = 'Warning: this template is currently used by {$a} assignment(s) - be careful when making changes';
$string['textonly'] = '(only \'Text\' items)';
$string['typeuploadpdf'] = 'Upload PDF';
$string['uploadpreview'] = 'Upload';
$string['viewfeedback'] = 'View feedback in new window';
$string['viewresponse'] = 'Download response';
$string['yourcompletedsubmission'] = 'Download your submission';
