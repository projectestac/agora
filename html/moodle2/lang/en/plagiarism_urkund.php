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
 * Strings for component 'plagiarism_urkund', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   plagiarism_urkund
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cronwarning'] = 'The <a href="../../admin/cron.php">cron.php</a> maintenance script has not been run for at least 30 min - Cron must be configured to allow URKUND to function correctly.';
$string['defaultsdesc'] = 'The following settings are the defaults set when enabling URKUND within an Activity Module';
$string['defaultupdated'] = 'Default values updated';
$string['deletedwarning'] = 'This file could not be found - it may have been deleted by the user';
$string['explainerrors'] = 'This page lists any files that are currently in an error state. <br/>When files are deleted on this page they will not be able to be resubmitted and errors will no longer display to teachers or students';
$string['file'] = 'File';
$string['filedeleted'] = 'File deleted from queue';
$string['filereset'] = 'A file has been reset for re-submission to URKUND';
$string['fileresubmitted'] = 'File Queued for resubmission';
$string['getscore'] = 'Get score';
$string['heldevents'] = 'Held events';
$string['heldeventsdescription'] = 'These are events that did not complete on the first attempt and were queued for resubmission - these prevent subsequent events from completing and may need further investigation. Some of these events may not be relevant to URKUND.';
$string['id'] = 'ID';
$string['identifier'] = 'Identifier';
$string['module'] = 'Module';
$string['name'] = 'Name';
$string['noreceiver'] = 'No receiver address was specified';
$string['optout'] = 'Opt-out';
$string['pending'] = 'This file is pending submission to URKUND';
$string['pluginname'] = 'URKUND plagiarism plugin';
$string['previouslysubmitted'] = 'Previously submitted as';
$string['processing'] = 'This file has been submitted to URKUND, now waiting for the analysis to be available';
$string['receivernotvalid'] = 'This is not a valid receiver address.';
$string['report'] = 'report';
$string['resubmit'] = 'Resubmit';
$string['savedconfigfailed'] = 'An incorrect username/password combination has been entered, URKUND has been disabled, please try again.';
$string['savedconfigsuccess'] = 'Plagiarism Settings Saved';
$string['scoreavailable'] = 'This file has been processed by URKUND and a report is now available.';
$string['scorenotavailableyet'] = 'This file has not been processed by URKUND yet.';
$string['showwhenclosed'] = 'When Activity closed';
$string['similarity'] = 'URKUND';
$string['status'] = 'Status';
$string['studentdisclosure'] = 'Student Disclosure';
$string['studentdisclosuredefault'] = 'All files uploaded will be submitted to the plagiarism detection service URKUND,
If you wish to prevent your document from being used as a source for analysis outside this site by other organisations you can use the opt-out link provided after the report has been generated.';
$string['studentdisclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['studentemailcontent'] = 'The file you submitted to {$a->modulename} in {$a->coursename} has now been processed by the Plagiarism tool URKUND.
{$a->modulelink}

If you wish to prevent your document from being used as a source for analysis outside this site by other organisations you can use this link to opt-out:.
{$a->optoutlink}';
$string['studentemailsubject'] = 'File processed by URKUND';
$string['submitondraft'] = 'Submit file when first uploaded';
$string['submitonfinal'] = 'Submit file when student sends for marking';
$string['toolarge'] = 'This file is too large for URKUND to process';
$string['unknownwarning'] = 'An error occurred trying to send this file to URKUND';
$string['unsupportedfiletype'] = 'This filetype is not supported by URKUND';
$string['urkund'] = 'URKUND plagiarism plugin';
$string['urkund_api'] = 'URKUND Integration Address';
$string['urkund_api_help'] = 'This is the address of the URKUND API';
$string['urkunddebug'] = 'Debugging';
$string['urkunddefaults'] = 'URKUND defaults';
$string['urkund_draft_submit'] = 'When should the file be submitted to URKUND';
$string['urkund:enable'] = 'Allow the teacher to enable/disable URKUND inside an activity';
$string['urkund_enableplugin'] = 'Enable URKUND for {$a}';
$string['urkundexplain'] = 'For more information on this plugin see: <a href="http://www.urkund.com/int/en/" target="_blank">http://www.urkund.com/int/en/</a>';
$string['urkundfiles'] = 'Urkund Files';
$string['urkund_lang'] = 'Language';
$string['urkund_lang_help'] = 'Language code provided by URKUND';
$string['urkund_password'] = 'Password';
$string['urkund_password_help'] = 'Password provided by URKUND to access the API';
$string['urkund_receiver'] = 'Receiver address';
$string['urkund_receiver_help'] = 'This is the unique address provided from URKUND for the teacher';
$string['urkund:resetfile'] = 'Allow the teacher to resubmit the file to URKUND after an error';
$string['urkund_show_student_report'] = 'Show similarity report to student';
$string['urkund_show_student_report_help'] = 'The similarity report gives a breakdown on what parts of the submission were plagiarised and the location that URKUND first saw this content';
$string['urkund_show_student_score'] = 'Show similarity score to student';
$string['urkund_show_student_score_help'] = 'The similarity score is the percentage of the submission that has been matched with other content.';
$string['urkund_studentemail'] = 'Send Student email';
$string['urkund_studentemail_help'] = 'This will send an e-mail to the student when a file has been processed to let them know that a report is available, the e-mail also includes the opt-out link.';
$string['urkund_username'] = 'Username';
$string['urkund_username_help'] = 'Username provided by URKUND to access the API';
$string['urkund:viewreport'] = 'Allow the teacher to view the full report from URKUND';
$string['useurkund'] = 'Enable URKUND';
$string['waitingevents'] = 'There are {$a->countallevents} events waiting for cron and {$a->countheld} events are being held for resubmission';
