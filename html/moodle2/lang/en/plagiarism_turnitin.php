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
 * Strings for component 'plagiarism_turnitin', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = 'Login to Turnitin as Admin';
$string['anonymity'] = 'Make student submissions anonymous within Turnitin';
$string['anonymity_help'] = 'This will prevent teachers from being able to see which student is which by going to the Turnitin interface at submit.ac.uk. Essential if the module is trying to enforce anonymity.';
$string['beingprocessed'] = 'File was uploaded successfully and is currently being processed by turnitin';
$string['compareinstitution'] = 'Compare submitted files with papers submitted within this institution';
$string['compareinstitution_help'] = 'This option is only available if you have setup/purchased a custom node. It should be set to "No" if unsure.';
$string['compareinternet'] = 'Compare submitted files with Internet';
$string['compareinternet_help'] = 'This option allows submissions to be compared with Internet content that  Turnitin currently indexes';
$string['comparejournals'] = 'Compare submitted files with Journals, periodicals, publications';
$string['comparejournals_help'] = 'This option allows submissions to be compared with Journals, periodicals, and publications that Turnitin currently indexes';
$string['comparestudents'] = 'Compare submitted files with other students files';
$string['comparestudents_help'] = 'This option allows submissions to be compared with other students files';
$string['configdefault'] = 'This is a default setting for the assignment creation page. Only users with the capability plagiarism/turnitin:enableturnitin can change this setting for an individual assignment';
$string['configusetiimodule'] = 'Enable Turnitin submission.';
$string['defaultsdesc'] = 'The following settings are the defaults set when enabling Turnitin within an Activity Module';
$string['defaultupdated'] = 'Turnitin defaults updated';
$string['draftsubmit'] = 'When should the file be submitted to Turnitin';
$string['errorassigninguser'] = 'An error occured when trying to assign this user to the external Turnitin system - Turnitin links on this page may not work';
$string['errorlookup'] = 'See <a href ="http://docs.moodle.org/dev/Turnitin_errors">here</a> for an explanation of the code';
$string['excludebiblio'] = 'Exclude bibliography';
$string['excludebiblio_help'] = 'Bibliographic materials can also be included and excluded when viewing the Originality Report. This setting cannot be modified after the first file has been submitted..';
$string['excludematches'] = 'Exclude small matches';
$string['excludematches_help'] = 'You can exclude small matches by percentage or by word count - select the type you wish to use and enter the percentage or word count in the box below.';
$string['excludequoted'] = 'Exclude quoted material';
$string['excludequoted_help'] = 'Quoted materials can also be included and excluded when viewing the Originality Report. This setting cannot be modified after the first file has been submitted..';
$string['file'] = 'File';
$string['filedeleted'] = 'File deleted from queue';
$string['fileopenerror'] = 'error trying to open plagiarism XML file! {$a}';
$string['fileresubmitted'] = 'File Queued for resubmission';
$string['id'] = 'ID';
$string['migrated'] = 'Turnitin settings migrated';
$string['missingkey'] = 'Turnitin Secret Key not set!';
$string['module'] = 'Module';
$string['name'] = 'Name';
$string['percentage'] = 'Percentage';
$string['pluginname'] = 'Turnitin plagiarism plugin';
$string['reportgen'] = 'When to generate the Originality Reports';
$string['reportgenduedate'] = 'On the due date';
$string['reportgen_help'] = 'This option allows you to selct when the Originality Report should be generated';
$string['reportgenimmediate'] = 'Immediately (first report is final)';
$string['reportgenimmediateoverwrite'] = 'Immediately (can overwrite reports)';
$string['resubmit'] = 'Resubmit';
$string['savedconfigfailure'] = 'Unable to connect/authenticate to Turnitin - you may have an incorrect Secret Key/Account ID combination or this server cannot connect to the API';
$string['savedconfigsuccess'] = 'Turnitin Settings Saved, and Teacher account created';
$string['showstudentsreport'] = 'Show similarity report to student';
$string['showstudentsreport_help'] = 'The similarity report gives a breakdown on what parts of the submission were plagiarised and the location that Turnitin first saw this content';
$string['showstudentsscore'] = 'Show similarity score to student';
$string['showstudentsscore_help'] = 'The similarity score is the percentage of the submission that has been matched with other content - a high score is usually bad.';
$string['showwhenclosed'] = 'When Activity closed';
$string['similarity'] = 'Similarity';
$string['status'] = 'Status';
$string['studentdisclosure'] = 'Student Disclosure';
$string['studentdisclosuredefault'] = 'All files uploaded will be submitted to the plagiarism detection service Turnitin.com';
$string['studentdisclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['submitondraft'] = 'Submit file when first uploaded';
$string['submitonfinal'] = 'Submit file when student sends for marking';
$string['teacherlogin'] = 'Login to Turnitin as Teacher';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'Turnitin Account ID';
$string['tiiaccountid_help'] = 'This is your Account ID as provided from Turnitin.com';
$string['tiiapi'] = 'Turnitin API';
$string['tiiapi_help'] = 'This is the address of the Turnitin API - usually https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = 'A site configuration error occured when attempting to send this file to Turnitin';
$string['tiiemailprefix'] = 'Student Email prefix';
$string['tiiemailprefix_help'] = 'You must set this if you do not want students to be able to log into the turnitin.com site and view full reports.';
$string['tiienablegrademark'] = 'Enable Grademark (Experimental)';
$string['tiienablegrademark_help'] = 'Grademark is an optional feature within Turnitin - you must have included this in your Turnitin subscription to use it. Enabling this will cause the view submissions pages to load slowly.';
$string['tiierror'] = 'TII Error:';
$string['tiierror1007'] = 'Turnitin could not process this file as it is too large';
$string['tiierror1008'] = 'An error occured when attempting to send this file to Turnitin';
$string['tiierror1009'] = 'Turnitin could not process this file - it is an unsupported file type. Valid file types are MS Word, Acrobat PDF, Postscript, Text, HTML, WordPerfect and Rich Text Format. This error could also mean you have the wrong file extension.';
$string['tiierror1010'] = 'Turnitin could not process this file - it must contain more than 100 non-whitespace characters';
$string['tiierror1011'] = 'Turnitin could not process this file - it is incorrectly formatted and there seems to be spaces between each letter.';
$string['tiierror1012'] = 'Turnitin could not process this file - it\'s length exceeds the Turnitin limits';
$string['tiierror1013'] = 'Turnitin could not process this file - it must contain more than 20 words';
$string['tiierror1020'] = 'Turnitin could not process this file - it contains characters from a character set that is not supported';
$string['tiierror1023'] = 'Turnitin could not process this pdf - make sure it is not password protected and contains selectable text rather than scanned images';
$string['tiierror1024'] = 'Turnitin could not process this file - it does not meet the Turnitin criteria for a legitimate paper';
$string['tiierrorpaperfail'] = 'Turnitin could not process this file.';
$string['tiierrorpending'] = 'File pending submission to Turnitin';
$string['tiiexplain'] = 'Turnitin is a commercial product and you must have a paid subscription to use this service; for more information see <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = 'This page lists any files submitted to Turnitin that are currently in an error state. A list of turnitin Error codes and their description is available here:<a href="http://docs.moodle.org/en/Turnitin_errors">docs.moodle.org/en/Turnitin_errors</a><br/>When files are reset, the cron will attempt to submit the file to turnitin again.<br/>When files are deleted on this page they will not be able to be resubmitted to turnitin and errors will no longer display to teachers or students';
$string['tiisecretkey'] = 'Turnitin Secret Key';
$string['tiisecretkey_help'] = 'Log into Turnitin.com as your site administrator to obtain this.';
$string['tiisenduseremail'] = 'Send User E-mail';
$string['tiisenduseremail_help'] = 'Send e-mail to every student created in the TII system with a link to allow login to www.turnitin.com with a temporary password';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = 'Error Codes to auto-resubmit';
$string['turnitin_attemptcodes_help'] = 'Error codes that Turnitin usually accepts on a 2nd attempt (Changes to this field may cause further load on your server)';
$string['turnitin_attempts'] = 'Number of Retries';
$string['turnitin_attempts_help'] = 'Number of times the codes specified are resubmitted to Turnitin, 1 retry means files with the specified error codes will be submitted twice.';
$string['turnitindefaults'] = 'Turnitin Defaults';
$string['turnitin:enable'] = 'Allow the teacher to enable/disable Turnitin inside a module';
$string['turnitinerrors'] = 'Turnitin Errors';
$string['turnitin_institutionnode'] = 'Enable Institution Node';
$string['turnitin_institutionnode_help'] = 'If you have setup/purchased an institution node with your account enable this to allow the node to be selected when creating assignments. NOTE: if you do not have an institution node, enabling this setting will cause your paper submission to fail.';
$string['turnitinmigrate'] = 'Migrate 2.2 Assignments';
$string['turnitinmigrate_help'] = 'If you have upgraded assignments to the new 2.3 mod_assign, this will try to re-link turnitin scores/reports generted in the old 2.2 Assignment with the upgraded 2.3 assignment module';
$string['turnitin:viewfullreport'] = 'Allow the teacher to view the full report returned from Turnitin';
$string['turnitin:viewsimilarityscore'] = 'Allow the teacher to view the similarity score returned from Turnitin';
$string['userprofileteachercache'] = 'Turnitin teacher course cache';
$string['userprofileteachercache_desc'] = 'This field is used by the Turnitin plugin to keep a record of all the courses that a teacher has been assigned as a teacher in. - you can clear this field but it may affect performance.';
$string['useturnitin'] = 'Enable Turnitin';
$string['wordcount'] = 'Word count';
