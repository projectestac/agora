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
 * Strings for component 'local_fm', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   local_fm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionwithselected'] = 'Action with selected';
$string['actionwithselected_help'] = '<p>The selected answers are marked with a checked checkbox in the rightmost column of the answers table.
An action performed on selected answers will be apply to all selected, even those not visible on the
presently displayed page.</p>

<p><b>Assign tag</b> assigns the selected tag to all selected answers or in the case when no
tag is selected, the action removes the current tag assignment.</p>

<p><b>Assign grade</b> assigns the grade set in the input field next to the "Assign grade" button.
However, if the grade set exceeds the maximum allowable points indicated to the right of the field,
zero will be assigned.</p>';
$string['addcategory'] = 'Add category';
$string['addfeedback'] = 'Add feedback';
$string['addfilter'] = 'Add filter';
$string['assignedby'] = 'Assigned by: {$a}';
$string['category'] = 'Feedback category';
$string['categoryinfo'] = 'Description';
$string['categoryname'] = 'Category name';
$string['clearallconfirm'] = 'All changes not yet saved on this page will be deleted. Are you sure you want to continue?';
$string['coursereport'] = 'Quiz Email Feedback Course Report';
$string['coursereport_help'] = '<h2>Quiz attempts</h2>

<p>Quizzes are listed across the top of the report as column headers.  Click on
the quiz name to view the results summary for the quiz.  The grade for each student attempt
is shown on a separate line in the corresponding cell in the quiz\'s column.  Click on the
grade to view the student\'s attempt.  Your feedback in response to the student\'s attempt is
displayed on the attempt review page.</p>

<h2>Email feedback message date</h2>

<p>If a feedback message has been sent to the student for an attempt, the date on which it was
sent is noted next to the grade for that attempt.</p>

<h2>Link to the gradebook</h2>

<p>The column to the right of the student name column contains links to the student\'s grade book
summary page.</p>';
$string['coursereportname'] = 'Quiz Email Feedback Course Report';
$string['coursereportpreference'] = 'Report Preference';
$string['coursereportshorttitle'] = 'Course Report';
$string['createdby'] = 'Created by';
$string['customfeedback'] = 'Individual feedback';
$string['editcategories'] = 'Edit categories';
$string['editcategory'] = 'Edit category';
$string['editfeedback'] = 'Edit feedback';
$string['editfilter'] = 'Edit filter';
$string['feedback'] = 'Feedback';
$string['feedbackdate'] = 'feedback date';
$string['feedbackname'] = 'Feedback name';
$string['feedbackreport'] = 'Feedback report';
$string['feedbackreport_help'] = '<p>An instructor\'s feedback report displays a summary of feedback provided
to students.  The report includes any question for which feedback has been
provided.  The question is displayed followed by any feedback marked to be shown.
To mark feedback to be shown, check the "show" checkbox that appears to the
left of the feedback editing box.  By default feedback is not shown in the
report.</p>
<p>By default, feedback messages are displayed in descending order of how frequently they
were assigned to student responses.  This order can be
overridden by setting the order in the "ord" (order) field that appears to the
left of the feedback editing box.</p>

<p>To show the report to students in a block on the course home page, check
the "Show reports in reports block" checkbox.  Until this checkbox is checked,
the report will not be shown to students.  This allows you to edit the report
before releasing it to students.  The block on the course home page where instructors
edit the email feedback template is used to show links to the feedback reports
to students.  The block is labeled "Quiz Feedback Reports" when viewed by a
student.  The block will only be displayed to students when there is at least one report available.
This block is labeled "Feedback Manager" when viewed by instructors.</p>

<p>Typical student responses can be shown in the report either before or after
the instructor\'s feedback.  If students were instructed to ask a question as their
open-ended response, then
placing the student above the feedback makes the feedback appear as an answer
to the question.</p>

<p>Feedback assignment counts can be displayed in the report.</p>

<p>To create a feedback report, press the "Generate report" button. The
report can be re-generated if feedback message have been edited or their settings
changed.  A template, which can be edited on the same page as the email
template, is used when generating the report.</p>

<p>Once a report has been created, it can be edited and previewed.</p>

<p><b>In addition to reports displayed in the "Quiz Feedback Reports" block, feedback
reports can be generated and displayed as a course resource.</b>  Turn editing on
on the course home page, then select "Quiz feedback report" under the
"Add a resource" dropdown box.  This allows instructors to create a number of
specialized reports for each quiz.</p>';
$string['feedbacktext'] = 'Feedback text';
$string['filter_answer'] = 'Question answer';
$string['filter_feedback'] = 'Assigned feedback';
$string['filter_feedback_custom'] = 'Individual feedback';
$string['filter_grade'] = 'Question grade';
$string['filter_group'] = 'Group membership';
$string['filter_message_count'] = 'User message count';
$string['filter_message_last'] = 'Last user message date';
$string['fm:componentname'] = 'Feedback manager';
$string['fm:manage'] = 'Manage all feedback';
$string['fm:managefeedback'] = 'Manage other feedback';
$string['fm:manageownfeedback'] = 'Manage own feedback';
$string['fm:messageconfig'] = 'Configure feedback messages';
$string['fm:viewreports'] = 'View feedback reports';
$string['fm:viewstudentnames'] = 'See student names while grading / assigning feedback';
$string['gradebooklinktitle'] = 'Click to view $a for this student';
$string['gradedby'] = 'Graded by Feedback Manager';
$string['includequestion'] = 'Include question in feedback block';
$string['instructorfeedback'] = 'Instructor\'s feedback';
$string['instructorfeedback_help'] = '<p>Each feedback message has five fields.</p>
<ol>
    <li>The tag field contains a short name that will appear in then "Tag"
    dropdown box to the right of each student\'s response.</li>
    <li>The "report?" checkbox is used to mark the feedback for display in
    a feedback report.</li>
    <li>The "order" field is used to override the default order of feedback
        shown in a feedback report.  By default, feedback are displayed by
        descending frequency of assignment to student responses.  Enter integer
    values in the "ord" field to set the order explicitly.</li>
    <li>The feedback field is where the feedback is edited.</li>
    <li>The checkbox to the right of the feedback field is used in conjunction
    with the "With checked feedback" actions.</li>
</ol>';
$string['invalidassignsubmission'] = 'Invalid submission data. Ensure grades are within range and operations are allowed.';
$string['invalidinput'] = 'Invalid input given';
$string['message'] = 'Message';
$string['messagecount'] = '#';
$string['messageexample'] = '<p>Dear $studentfirstname,<br/><br/>
Here is feedback for the recent quiz, $quizname, in $courselongname: <br/><br/>
$feedback<br/><br/>
You can view the graded quiz here: $linktoquiz<br/><br/>
Please contact me if you have questions.<br/><br/>
$userfirstname $userlastname';
$string['messageoptions'] = 'Message options';
$string['messageprovider:question_feedback'] = 'Question feedback';
$string['messagesubject'] = 'Message subject';
$string['modifiedby'] = 'Modified by';
$string['namecantbeblank'] = 'Name cannot be blank';
$string['nomessagepermissions'] = 'You do not have permission to edit the email feedback template.';
$string['notypical'] = 'Not typical';
$string['notypical_help'] = 'Click to mark as typical';
$string['noviewreportpermissions'] = 'You do not have permission to view this quiz feedback report.';
$string['parentcategory'] = 'Parent category';
$string['pluginname'] = 'Feedback Manager';
$string['preferencessave'] = 'Save preference';
$string['question'] = 'Question';
$string['quizheaderlinktitle'] = 'Click to review this quiz';
$string['quizreviewlinktitle'] = 'Click to review the quiz attempt for this student';
$string['report'] = 'Feedback report';
$string['reporttext'] = 'Report text';
$string['reportvariables'] = 'Include the following variable somewhere in your report template to mark where the feedback block should be placed.
<ul><li>$feedback</li></ul>';
$string['resourceinstructions'] = 'A quiz feedback resource summarizes quiz feedback developed in the Feedback Manager.  The resource can be edited to
suite a particular purpose.<br/><br/>

To generate the quiz feedback resource for the first time or to regenerate it, select a quiz below and select the desired generation options.
Typical student responses can be included before or after feedback.  Feedback counts, i.e. the number of times a feedback was assiged, can be displayed or not.
Save this page using one of the save buttons below to generate the feedback resource.  You can then edit this resource.  Regenerating the resource will overwrite your edits.  So,
to save your edits to the existing resource be sure not to select a quiz from the dropdown list below.<br/><br/>
A quiz feedback resource differs from the quiz feedback report in two small details.  First, a resource, when visible, is always visible to students.  Second, a resource cannot be
configured to display the points assigned to the typical student answer.
<br/>';
$string['save'] = 'Save';
$string['saveallconfirm'] = 'All changes not yet submitted on this page will be saved. Are you sure you want to continue?';
$string['savechanges'] = 'Save changes';
$string['selectfilter'] = 'Selecting and/or filtering answers';
$string['selectfilter_help'] = '<p>Selected answers will be marked with a checked checkbox in the rightmost column of
the answers table.  Filtering answers causes only those answers that satisfy the filter
criteria to be displayed.  When a filter is active, the filter criteria are shown and
any actions, including selecting using criteria, will be applied only to answers that
satisfy the filter.</p>

<p><b>AND</b> is implied when more that one criterion are set.</p>

<p>Additions of filter criteria will restrict the filter further for each filter operation;
however, changing a filter criterion replaces the previous setting for that criterion in the
filter.</p>

<p>If changes are made to data while a filter is in effect that cause the record to no longer
satisfy the filter, the record will be excluded from those displayed <b>and</b> if that
record had been selected (checked), it will be deselected.  When filtering is not active, changes
in the data have no effect on the selected state of a record.</p>

<p><strong>When filtering on the student\'s answer or instructor\'s notes, the boolean operators
"and" "or" and "not" may be used. The operators themselves will be treated as words if they are
enclosed in double quotes.  Parentheses may be used to nest conditions. To have multple words
treated as a phrase, enclose the whole phrase in double quotes.</strong></p>

<p>By default, successive filtering operations will operate on records that matched previous
filtering operations, thus refining the filter.  Unchecking the "Refine filter" checkbox will cause
the filtering operation to be applied to all records (except those excluded because an message for
them has been sent.)</p>

<p>All filters and selections are cleared when a new question is selected from the questions list
drop down box and when a "Separate groups" selection is made (available when groups are used in the course).</p>';
$string['selectquestion'] = 'Question:';
$string['sendemailorpostcomments'] = 'Send messages or post comments';
$string['sendemailorpostcomments_help'] = '<p>Clicking the "Send email" button does three things:</p>
<ol>
    <li>Generates the feedback message from the tags assigned and saves it to the
    comments field for the student\'s answer.</li>
    <li>Saves the grade assigned to the answer to the gradebook.</li>
    <li>Sends an email message containing the feedback messages to the student.</li>
</ol>
<p>Clicking on the "Post comments" button does the first two of these without sending
sending the email message.</p>';
$string['sentby'] = 'Sent by: {$a}';
$string['shareusers'] = 'Users with sharing';
$string['shareusersmatching'] = 'Users with sharing matching \'{$a}';
$string['shareuserspotential'] = 'Potential share users';
$string['shareuserspotentialmatching'] = 'Potential share users matching \'{$a}';
$string['sharing'] = 'Sharing';
$string['sharing_help'] = 'Configure sharing for this feedback:
<p><ul>
<li> No general sharing (Default) - No general sharing in this context </li>
<li> Shared - Share this feedback with all feedback managers in this context </li>
<li> Private - Do not allow any sharing of this feedback </li>
</ul></p>';
$string['template'] = 'Template';
$string['templateconfigure'] = 'Configure email template for $a';
$string['templatesaved'] = 'Template saved';
$string['this_answer_emaildate'] = 'This msg sent';
$string['typical'] = 'Typical';
$string['typical_help'] = 'Click to mark as not typical';
$string['unknowajaxaction'] = 'Unknown AJAX action';
$string['use'] = 'Use';
$string['userinfo'] = 'User information';
