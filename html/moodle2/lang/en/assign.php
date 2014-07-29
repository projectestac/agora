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
 * Strings for component 'assign', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'You have assignments that need attention';
$string['addattempt'] = 'Allow another attempt';
$string['addnewattempt'] = 'Add a new attempt';
$string['addnewattemptfromprevious'] = 'Add a new attempt based on previous submission';
$string['addnewattemptfromprevious_help'] = 'This will copy the contents of your previous submission to a new submission for you to work on.';
$string['addnewattempt_help'] = 'This will create a new blank submission for you to work on.';
$string['addsubmission'] = 'Add submission';
$string['allocatedmarker'] = 'Allocated Marker';
$string['allocatedmarker_help'] = 'Marker allocated to this submission';
$string['allowsubmissions'] = 'Allow the user to continue making submissions to this assignment.';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'The assignment details and submission form will be available from <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Allow submissions from';
$string['allowsubmissionsfromdate_help'] = 'If enabled, students will not be able to submit before this date. If disabled, students will be able to start submitting right away.';
$string['allowsubmissionsfromdatesummary'] = 'This assignment will accept submissions from <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Allow submission changes';
$string['alwaysshowdescription'] = 'Always show description';
$string['alwaysshowdescription_help'] = 'If disabled, the Assignment Description above will only become visible to students at the "Allow submissions from" date.';
$string['applytoteam'] = 'Apply grades and feedback to entire group';
$string['assign:addinstance'] = 'Add a new assignment';
$string['assign:exportownsubmission'] = 'Export own submission';
$string['assignfeedback'] = 'Feedback plugin';
$string['assignfeedbackpluginname'] = 'Feedback plugin';
$string['assign:grade'] = 'Grade assignment';
$string['assign:grantextension'] = 'Grant extension';
$string['assign:manageallocations'] = 'Manage markers allocated to submissions';
$string['assign:managegrades'] = 'Review and release grades';
$string['assignmentisdue'] = 'Assignment is due';
$string['assignmentmail'] = '{$a->grader} has posted some feedback on your
assignment submission for \'{$a->assignment}\'

You can see it appended to your assignment submission:

    {$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->grader} has posted some feedback on your
assignment submission for \'<i>{$a->assignment}</i>\'.</p>
<p>You can see it appended to your <a href="{$a->url}">assignment submission</a>.</p>';
$string['assignmentmailsmall'] = '{$a->grader} has posted some feedback on your
assignment submission for \'{$a->assignment}\' You can see it appended to your submission';
$string['assignmentname'] = 'Assignment name';
$string['assignmentplugins'] = 'Assignment plugins';
$string['assignmentsperpage'] = 'Assignments per page';
$string['assign:releasegrades'] = 'Release grades';
$string['assign:revealidentities'] = 'Reveal student identities';
$string['assign:reviewgrades'] = 'Review grades';
$string['assignsubmission'] = 'Submission plugin';
$string['assignsubmissionpluginname'] = 'Submission plugin';
$string['assign:submit'] = 'Submit assignment';
$string['assign:view'] = 'View assignment';
$string['attemptheading'] = 'Attempt {$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Previous attempts';
$string['attemptnumber'] = 'Attempt number';
$string['attemptreopenmethod'] = 'Attempts reopened';
$string['attemptreopenmethod_help'] = 'Determines how student submission attempts are reopened. The available options are: <ul><li>Never - The student submission cannot be reopened.</li><li>Manually - The student submission can be reopened by a teacher.</li><li>Automatically until pass - The student submission is automatically reopened until the student achieves the grade to pass value set in the Gradebook (Categories and items section) for this assignment.</li></ul>';
$string['attemptreopenmethod_manual'] = 'Manually';
$string['attemptreopenmethod_none'] = 'Never';
$string['attemptreopenmethod_untilpass'] = 'Automatically until pass';
$string['attemptsettings'] = 'Attempt settings';
$string['availability'] = 'Availability';
$string['backtoassignment'] = 'Back to assignment';
$string['batchoperationconfirmaddattempt'] = 'Allow another attempt for selected submissions?';
$string['batchoperationconfirmgrantextension'] = 'Grant an extension to all selected submissions?';
$string['batchoperationconfirmlock'] = 'Lock all selected submissions?';
$string['batchoperationconfirmreverttodraft'] = 'Revert selected submissions to draft?';
$string['batchoperationconfirmsetmarkingallocation'] = 'Set marking allocation for all selected submissions?';
$string['batchoperationconfirmsetmarkingworkflowstate'] = 'Set marking workflow state for all selected submissions?';
$string['batchoperationconfirmunlock'] = 'Unlock all selected submissions?';
$string['batchoperationlock'] = 'lock submissions';
$string['batchoperationreverttodraft'] = 'revert submissions to draft';
$string['batchoperationsdescription'] = 'With selected...';
$string['batchoperationunlock'] = 'unlock submissions';
$string['batchsetallocatedmarker'] = 'Set allocated marker for {$a} selected user(s).';
$string['batchsetmarkingworkflowstateforusers'] = 'Set marking workflow state for {$a} selected user(s).';
$string['blindmarking'] = 'Blind marking';
$string['blindmarking_help'] = 'Blind marking hides the identity of students to markers. Blind marking settings will be locked once a submission or grade has been made in relation to this assignment.';
$string['changegradewarning'] = 'This assignment has graded submissions and changing the grade will not automatically re-calculate existing submission grades. You must re-grade all existing submissions, if you wish to change the grade.';
$string['choosegradingaction'] = 'Grading action';
$string['choosemarker'] = 'Choose...';
$string['chooseoperation'] = 'Choose operation';
$string['comment'] = 'Comment';
$string['completionsubmit'] = 'Student must submit to this activity to complete it';
$string['configshowrecentsubmissions'] = 'Everyone can see notifications of submissions in recent activity reports.';
$string['confirmbatchgradingoperation'] = 'Are you sure you want to {$a->operation} for {$a->count} students?';
$string['confirmsubmission'] = 'Are you sure you want to submit your work for grading? You will not be able to make any more changes.';
$string['conversionexception'] = 'Could not convert assignment. Exception was: {$a}.';
$string['couldnotconvertgrade'] = 'Could not convert assignment grade for user {$a}.';
$string['couldnotconvertsubmission'] = 'Could not convert assignment submission for user {$a}.';
$string['couldnotcreatecoursemodule'] = 'Could not create course module.';
$string['couldnotcreatenewassignmentinstance'] = 'Could not create new assignment instance.';
$string['couldnotfindassignmenttoupgrade'] = 'Could not find old assignment instance to upgrade.';
$string['currentattempt'] = 'This is attempt {$a}.';
$string['currentattemptof'] = 'This is attempt {$a->attemptnumber} ( {$a->maxattempts} attempts allowed ).';
$string['currentgrade'] = 'Current grade in gradebook';
$string['cutoffdate'] = 'Cut-off date';
$string['cutoffdatefromdatevalidation'] = 'Cut-off date must be after the allow submissions from date.';
$string['cutoffdate_help'] = 'If set, the assignment will not accept submissions after this date without an extension.';
$string['cutoffdatevalidation'] = 'The cut-off date cannot be earlier than the due date.';
$string['defaultsettings'] = 'Default assignment settings';
$string['defaultsettings_help'] = 'These settings define the defaults for all new assignments.';
$string['defaultteam'] = 'Default group';
$string['deleteallsubmissions'] = 'Delete all submissions';
$string['description'] = 'Description';
$string['downloadall'] = 'Download all submissions';
$string['duedate'] = 'Due date';
$string['duedate_help'] = 'This is when the assignment is due. Submissions will still be allowed after this date but any assignments submitted after this date are marked as late. To prevent submissions after a certain date - set the assignment cut off date.';
$string['duedateno'] = 'No due date';
$string['duedatereached'] = 'The due date for this assignment has now passed';
$string['duedatevalidation'] = 'Due date must be after the allow submissions from date.';
$string['editaction'] = 'Actions...';
$string['editattemptfeedback'] = 'Edit the grade and feedback for attempt number {$a}.';
$string['editingpreviousfeedbackwarning'] = 'You are editing the feedback for a previous attempt. This is attempt {$a->attemptnumber} out of {$a->totalattempts}.';
$string['editingstatus'] = 'Editing status';
$string['editsubmission'] = 'Edit submission';
$string['editsubmission_help'] = 'Make changes to your submission';
$string['enabled'] = 'Enabled';
$string['errornosubmissions'] = 'There are no submissions to download';
$string['errorquickgradingvsadvancedgrading'] = 'The grades were not saved because this assignment is currently using advanced grading';
$string['errorrecordmodified'] = 'The grades were not saved because someone has modified one or more records more recently than when you loaded the page.';
$string['event_all_submissions_downloaded'] = 'All the submissions are being downloaded.';
$string['event_assessable_submitted'] = 'A submission has been submitted.';
$string['event_extension_granted'] = 'An extension has been granted.';
$string['event_identities_revealed'] = 'The identities have been revealed.';
$string['event_marker_updated'] = 'The allocated marker has been updated.';
$string['event_statement_accepted'] = 'The user has accepted the statement of the submission.';
$string['event_submission_duplicated'] = 'The user duplicated his submission.';
$string['event_submission_graded'] = 'The submission has been graded.';
$string['event_submission_locked'] = 'The submissions have been locked for a user.';
$string['event_submission_status_updated'] = 'The status of the submission has been updated.';
$string['event_submission_unlocked'] = 'The submissions have been unlocked for a user.';
$string['event_submission_updated'] = 'The user has saved a submission.';
$string['event_workflow_state_updated'] = 'The state of the workflow has been updated.';
$string['extensionduedate'] = 'Extension due date';
$string['extensionnotafterduedate'] = 'Extension date must be after the due date';
$string['extensionnotafterfromdate'] = 'Extension date must be after the allow submissions from date';
$string['feedback'] = 'Feedback';
$string['feedbackavailablehtml'] = '{$a->username} has posted some feedback on your
assignment submission for \'<i>{$a->assignment}</i>\'<br /><br />
You can see it appended to your <a href="{$a->url}">assignment submission</a>.';
$string['feedbackavailablesmall'] = '{$a->username} has given feedback for assignment {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} has posted some feedback on your
assignment submission for \'{$a->assignment}\'

You can see it appended to your assignment submission:

    {$a->url}';
$string['feedbackplugin'] = 'Feedback plugin';
$string['feedbackpluginforgradebook'] = 'Feedback plugin that will push comments to the gradebook';
$string['feedbackpluginforgradebook_help'] = 'Only one assignment feedback plugin can push feedback into the gradebook.';
$string['feedbackplugins'] = 'Feedback plugins';
$string['feedbacksettings'] = 'Feedback settings';
$string['feedbacktypes'] = 'Feedback types';
$string['filesubmissions'] = 'File submissions';
$string['filter'] = 'Filter';
$string['filternone'] = 'No filter';
$string['filterrequiregrading'] = 'Requires grading';
$string['filtersubmitted'] = 'Submitted';
$string['gradeabovemaximum'] = 'Grade must be less than or equal to {$a}.';
$string['gradebelowzero'] = 'Grade must be greater than or equal to zero.';
$string['gradecanbechanged'] = 'Grade can be changed';
$string['graded'] = 'Graded';
$string['gradedby'] = 'Graded by';
$string['gradedon'] = 'Graded on';
$string['gradelocked'] = 'This grade is locked or overridden in the gradebook.';
$string['gradeoutof'] = 'Grade out of {$a}';
$string['gradeoutofhelp'] = 'Grade';
$string['gradeoutofhelp_help'] = 'Enter the grade for the student\'s submission here. You may include decimals.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} has updated their assignment submission
for <i>\'{$a->assignment}\'  at {$a->timeupdated}</i><br /><br />
It is <a href="{$a->url}">available on the web site</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} has updated their submission for assignment {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} has updated their assignment submission
for \'{$a->assignment}\' at {$a->timeupdated}

It is available here:

    {$a->url}';
$string['gradestudent'] = 'Grade student: (id={$a->id}, fullname={$a->fullname}).';
$string['gradeuser'] = 'Grade {$a}';
$string['grading'] = 'Grading';
$string['gradingchangessaved'] = 'The grade changes were saved';
$string['gradingmethodpreview'] = 'Grading criteria';
$string['gradingoptions'] = 'Options';
$string['gradingstatus'] = 'Grading status';
$string['gradingstudent'] = 'Grading student';
$string['gradingsummary'] = 'Grading summary';
$string['grantextension'] = 'Grant extension';
$string['grantextensionforusers'] = 'Grant extension for {$a} students';
$string['groupsubmissionsettings'] = 'Group submission settings';
$string['hiddenuser'] = 'Participant';
$string['hideshow'] = 'Hide/Show';
$string['instructionfiles'] = 'Instruction files';
$string['invalidfloatforgrade'] = 'The grade provided could not be understood: {$a}';
$string['invalidgradeforscale'] = 'The grade supplied was not valid for the current scale';
$string['lastmodifiedgrade'] = 'Last modified (grade)';
$string['lastmodifiedsubmission'] = 'Last modified (submission)';
$string['latesubmissions'] = 'Late submissions';
$string['latesubmissionsaccepted'] = 'Only student(s) having been granted extension can still submit the assignment';
$string['locksubmissionforstudent'] = 'Prevent any more submissions for student: (id={$a->id}, fullname={$a->fullname}).';
$string['locksubmissions'] = 'Lock submissions';
$string['manageassignfeedbackplugins'] = 'Manage assignment feedback plugins';
$string['manageassignsubmissionplugins'] = 'Manage assignment submission plugins';
$string['marker'] = 'Marker';
$string['markerfilter'] = 'Marker filter';
$string['markingallocation'] = 'Use marking allocation';
$string['markingallocation_help'] = 'If enabled together with marking workflow, markers can be allocated to particular students.';
$string['markingworkflow'] = 'Use marking workflow';
$string['markingworkflow_help'] = 'If enabled, marks will go through a series of workflow stages before being released to students. This allows for multiple rounds of marking and allows marks to be released to all students at the same time.';
$string['markingworkflowstate'] = 'Marking workflow state';
$string['markingworkflowstate_help'] = 'Possible workflow states may include (depending on your permissions):

* Not marked - the marker has not yet started
* In marking - the marker has started but not yet finished
* Marking completed - the marker has finished but might need to go back for checking/corrections
* In review - the marking is now with the teacher in charge for quality checking
* Ready for release - the teacher in charge is satisfied with the marking but wait before giving students access to the marking
* Released - the student can access the grades/feedback';
$string['markingworkflowstateinmarking'] = 'In marking';
$string['markingworkflowstateinreview'] = 'In review';
$string['markingworkflowstatenotmarked'] = 'Not marked';
$string['markingworkflowstatereadyforrelease'] = 'Ready for release';
$string['markingworkflowstatereadyforreview'] = 'Marking completed';
$string['markingworkflowstatereleased'] = 'Released';
$string['maxattempts'] = 'Maximum attempts';
$string['maxattempts_help'] = 'The maximum number of submissions attempts that can be made by a student. After this number of attempts has been made the student&apos;s submission will not be able to be reopened.';
$string['maxgrade'] = 'Maximum Grade';
$string['messageprovider:assign_notification'] = 'Assignment notifications';
$string['modulename'] = 'Assignment';
$string['modulename_help'] = 'The assignment activity module enables a teacher to communicate tasks, collect work and provide grades and feedback.

Students can submit any digital content (files), such as word-processed documents, spreadsheets, images, or audio and video clips. Alternatively, or in addition, the assignment may require students to type text directly into the text editor. An assignment can also be used to remind students of \'real-world\' assignments they need to complete offline, such as art work, and thus not require any digital content. Students can submit work individually or as a member of a group.

When reviewing assignments, teachers can leave feedback comments and upload files, such as marked-up student submissions, documents with comments or spoken audio feedback. Assignments can be graded using a numerical or custom scale or an advanced grading method such as a rubric. Final grades are recorded in the gradebook.';
$string['modulename_link'] = 'mod/assignment/view';
$string['modulenameplural'] = 'Assignments';
$string['moreusers'] = '{$a} more...';
$string['mysubmission'] = 'My submission:';
$string['newsubmissions'] = 'Assignments submitted';
$string['noattempt'] = 'No attempt';
$string['nofiles'] = 'No files.';
$string['nograde'] = 'No grade.';
$string['nolatesubmissions'] = 'No late submissions accepted.';
$string['nomoresubmissionsaccepted'] = 'No more submissions accepted';
$string['noonlinesubmissions'] = 'This assignment does not require you to submit anything online';
$string['nosavebutnext'] = 'Next';
$string['nosubmission'] = 'Nothing has been submitted for this assignment';
$string['nosubmissionsacceptedafter'] = 'No submissions accepted after';
$string['notgraded'] = 'Not graded';
$string['notgradedyet'] = 'Not graded yet';
$string['notifications'] = 'Notifications';
$string['notsubmittedyet'] = 'Not submitted yet';
$string['nousersselected'] = 'No users selected';
$string['numberofdraftsubmissions'] = 'Drafts';
$string['numberofparticipants'] = 'Participants';
$string['numberofsubmissionsneedgrading'] = 'Needs grading';
$string['numberofsubmittedassignments'] = 'Submitted';
$string['numberofteams'] = 'Groups';
$string['offline'] = 'No online submissions required';
$string['open'] = 'Open';
$string['outlinegrade'] = 'Grade: {$a}';
$string['outof'] = '{$a->current} out of {$a->total}';
$string['overdue'] = '<font color="red">Assignment is overdue by: {$a}</font>';
$string['page-mod-assign-view'] = 'Assignment module main and submission page';
$string['page-mod-assign-x'] = 'Any assignment module page';
$string['participant'] = 'Participant';
$string['pluginadministration'] = 'Assignment administration';
$string['pluginname'] = 'Assignment';
$string['preventsubmissions'] = 'Prevent the user from making any more submissions to this assignment.';
$string['preventsubmissionsshort'] = 'Prevent submission changes';
$string['previous'] = 'Previous';
$string['quickgrading'] = 'Quick grading';
$string['quickgradingchangessaved'] = 'The grade changes were saved';
$string['quickgrading_help'] = 'Quick grading allows you to assign grades (and outcomes) directly in the submissions table. Quick grading is not compatible with advanced grading and is not recommended when there are multiple markers.';
$string['quickgradingresult'] = 'Quick grading';
$string['recordid'] = 'Identifier';
$string['requireallteammemberssubmit'] = 'Require all group members submit';
$string['requireallteammemberssubmit_help'] = 'If enabled, all members of the student group must click the submit button for this assignment before the group submission will be considered as submitted. If disabled, the group submission will be considered as submitted as soon as any member of the student group clicks the submit button.';
$string['requiresubmissionstatement'] = 'Require that students accept the submission statement';
$string['requiresubmissionstatement_help'] = 'Require that students accept the submission statement for all submissions to this assignment.';
$string['revealidentities'] = 'Reveal student identities';
$string['revealidentitiesconfirm'] = 'Are you sure you want to reveal student identities for this assignment. This operation cannot be undone. Once the student identities have been revealed, the marks will be released to the gradebook.';
$string['reverttodraft'] = 'Revert the submission to draft status.';
$string['reverttodraftforstudent'] = 'Revert submission to draft for student: (id={$a->id}, fullname={$a->fullname}).';
$string['reverttodraftshort'] = 'Revert the submission to draft';
$string['reviewed'] = 'Reviewed';
$string['saveallquickgradingchanges'] = 'Save all quick grading changes';
$string['savechanges'] = 'Save changes';
$string['savegradingresult'] = 'Grade';
$string['savenext'] = 'Save and show next';
$string['scale'] = 'Scale';
$string['selectedusers'] = 'Selected users';
$string['selectlink'] = 'Select...';
$string['selectuser'] = 'Select {$a}';
$string['sendlatenotifications'] = 'Notify graders about late submissions';
$string['sendlatenotifications_help'] = 'If enabled, graders (usually teachers) receive a message whenever a student submits an assignment late. Message methods are configurable.';
$string['sendnotifications'] = 'Notify graders about submissions';
$string['sendnotifications_help'] = 'If enabled, graders (usually teachers) receive a message whenever a student submits an assignment, early, on time and late. Message methods are configurable.';
$string['sendstudentnotifications'] = 'Notify students';
$string['sendstudentnotifications_help'] = 'If enabled, students receive a message about the updated grade or feedback.';
$string['sendsubmissionreceipts'] = 'Send submission receipt to students';
$string['sendsubmissionreceipts_help'] = 'This switch will enable submission receipts for students. Students will receive a notification every time they successfully submit an assignment';
$string['setmarkerallocationforlog'] = 'Set marking allocation : (id={$a->id}, fullname={$a->fullname}, marker={$a->marker}).';
$string['setmarkingallocation'] = 'Set allocated marker';
$string['setmarkingworkflowstate'] = 'Set marking workflow state';
$string['setmarkingworkflowstateforlog'] = 'Set marking workflow state : (id={$a->id}, fullname={$a->fullname}, state={$a->state}).';
$string['settings'] = 'Assignment settings';
$string['showrecentsubmissions'] = 'Show recent submissions';
$string['status'] = 'Status';
$string['submission'] = 'Submission';
$string['submissioncopiedhtml'] = '<p>You have made a copy of your previous
assignment submission for \'<i>{$a->assignment}</i>\'.</p>
<p>You can see the status of your <a href="{$a->url}">assignment submission</a>.</p>';
$string['submissioncopiedsmall'] = 'You have copied your previous assignment submission for {$a->assignment}';
$string['submissioncopiedtext'] = 'You have made a copy of your previous
assignment submission for \'{$a->assignment}\'

You can see the status of your assignment submission:

    {$a->url}';
$string['submissiondrafts'] = 'Require students click submit button';
$string['submissiondrafts_help'] = 'If enabled, students will have to click a Submit button to declare their submission as final. This allows students to keep a draft version of the submission on the system. If this setting is changed from "No" to "Yes" after students have already submitted those submissions will be regarded as final.';
$string['submissioneditable'] = 'Student can edit this submission';
$string['submissionempty'] = 'Nothing was submitted';
$string['submissionnotcopiedinvalidstatus'] = 'The submission was not copied because it has been edited since it was reopened.';
$string['submissionnoteditable'] = 'Student cannot edit this submission';
$string['submissionnotready'] = 'This assignment is not ready to submit:';
$string['submissionplugins'] = 'Submission plugins';
$string['submissionreceipthtml'] = '<p>You have submitted an assignment submission for \'<i>{$a->assignment}</i>\'.</p>
<p>You can see the status of your <a href="{$a->url}">assignment submission</a>.</p>';
$string['submissionreceipts'] = 'Send submission receipts';
$string['submissionreceiptsmall'] = 'You have submitted your assignment submission for {$a->assignment}';
$string['submissionreceipttext'] = 'You have submitted an
assignment submission for \'{$a->assignment}\'

You can see the status of your assignment submission:

    {$a->url}';
$string['submissions'] = 'Submissions';
$string['submissionsclosed'] = 'Submissions closed';
$string['submissionsettings'] = 'Submission settings';
$string['submissionslocked'] = 'This assignment is not accepting submissions';
$string['submissionslockedshort'] = 'Submission changes not allowed';
$string['submissionsnotgraded'] = 'Submissions not graded: {$a}';
$string['submissionstatement'] = 'Submission statement';
$string['submissionstatementacceptedlog'] = 'Submission statement accepted by user {$a}';
$string['submissionstatementdefault'] = 'This assignment is my own work, except where I have acknowledged the use of the works of other people.';
$string['submissionstatement_help'] = 'Assignment submission confirmation statement';
$string['submissionstatus'] = 'Submission status';
$string['submissionstatus_'] = 'No submission';
$string['submissionstatus_draft'] = 'Draft (not submitted)';
$string['submissionstatusheading'] = 'Submission status';
$string['submissionstatus_marked'] = 'Graded';
$string['submissionstatus_new'] = 'New submission';
$string['submissionstatus_reopened'] = 'Reopened';
$string['submissionstatus_submitted'] = 'Submitted for grading';
$string['submissionsummary'] = '{$a->status}. Last modified on {$a->timemodified}';
$string['submissionteam'] = 'Group';
$string['submissiontypes'] = 'Submission types';
$string['submitaction'] = 'Submit';
$string['submitassignment'] = 'Submit assignment';
$string['submitassignment_help'] = 'Once this assignment is submitted you will not be able to make any more changes.';
$string['submitted'] = 'Submitted';
$string['submittedearly'] = 'Assignment was submitted {$a} early';
$string['submittedlate'] = 'Assignment was submitted {$a} late';
$string['submittedlateshort'] = '{$a} late';
$string['subplugintype_assignfeedback'] = 'Feedback plugin';
$string['subplugintype_assignfeedback_plural'] = 'Feedback plugins';
$string['subplugintype_assignsubmission'] = 'Submission plugin';
$string['subplugintype_assignsubmission_plural'] = 'Submission plugins';
$string['teamsubmission'] = 'Students submit in groups';
$string['teamsubmissiongroupingid'] = 'Grouping for student groups';
$string['teamsubmissiongroupingid_help'] = 'This is the grouping that the assignment will use to find groups for student groups. If not set - the default set of groups will be used.';
$string['teamsubmission_help'] = 'If enabled students will be divided into groups based on the default set of groups or a custom grouping. A group submission will be shared among group members and all members of the group will see each others changes to the submission.';
$string['teamsubmissionstatus'] = 'Group submission status';
$string['textinstructions'] = 'Assignment instructions';
$string['timemodified'] = 'Last modified';
$string['timeremaining'] = 'Time remaining';
$string['unlimitedattempts'] = 'Unlimited';
$string['unlimitedattemptsallowed'] = 'Unlimited attempts allowed.';
$string['unlocksubmissionforstudent'] = 'Allow submissions for student: (id={$a->id}, fullname={$a->fullname}).';
$string['unlocksubmissions'] = 'Unlock submissions';
$string['updategrade'] = 'Update grade';
$string['updatetable'] = 'Save and update table';
$string['upgradenotimplemented'] = 'Upgrade not implemented in plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Extension granted until: {$a}';
$string['usergrade'] = 'User grade';
$string['userswhoneedtosubmit'] = 'Users who need to submit: {$a}';
$string['validmarkingworkflowstates'] = 'Valid marking workflow states';
$string['viewbatchmarkingallocation'] = 'View batch set marking allocation page.';
$string['viewbatchsetmarkingworkflowstate'] = 'View batch set marking workflow state page.';
$string['viewfeedback'] = 'View feedback';
$string['viewfeedbackforuser'] = 'View feedback for user: {$a}';
$string['viewfull'] = 'View full';
$string['viewfullgradingpage'] = 'Open the full grading page to provide feedback';
$string['viewgradebook'] = 'View gradebook';
$string['viewgrading'] = 'View/grade all submissions';
$string['viewgradingformforstudent'] = 'View grading page for student: (id={$a->id}, fullname={$a->fullname}).';
$string['viewownsubmissionform'] = 'View own submit assignment page.';
$string['viewownsubmissionstatus'] = 'View own submission status page.';
$string['viewrevealidentitiesconfirm'] = 'View reveal student identities confirmation page.';
$string['viewsubmission'] = 'View submission';
$string['viewsubmissionforuser'] = 'View submission for user: {$a}';
$string['viewsubmissiongradingtable'] = 'View submission grading table.';
$string['viewsummary'] = 'View summary';
$string['workflowfilter'] = 'Workflow filter';
