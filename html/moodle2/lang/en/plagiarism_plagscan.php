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
 * Strings for component 'plagiarism_plagscan', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   plagiarism_plagscan
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allfileschecked'] = 'Status of all documents checked on Plagscan server';
$string['always'] = 'always';
$string['api_language'] = 'Report language';
$string['assignments'] = 'Assignments';
$string['autodel'] = 'Auto delete document';
$string['autodescription'] = 'Documents will be automatically uploaded to Plagscan when the deadline is reached';
$string['autodescriptionsubmitted'] = 'The files were automatically uploaded to Plagscan on {$a} - switch to \'manual\' mode to resubmit individual assignments';
$string['autostart'] = 'Autostart plagiarism checks';
$string['badcredentials'] = 'PlagScan did not recognise the account details - please confirm the server URL, username ({$a->user}), API key and version number ({$a->version}) are correct';
$string['checkallstatus'] = 'Update status of all submitted files';
$string['checkstatus'] = 'Check status';
$string['compareinternet'] = 'Data Policy';
$string['connectionfailed'] = 'Failed to connect to PlagScan Server';
$string['data_policy'] = 'Data Policy';
$string['datapolicyhelp'] = 'Share my documents for analysis with (compare to)';
$string['datapolicyhelp_help'] = 'Share my documents for analysis with (compare to)';
$string['docxemail'] = 'Generate and email .docx report';
$string['docxgenerate'] = 'Only generate .docx report';
$string['docxnone'] = 'Do not generate .docx report';
$string['donotgenerate'] = 'do not generate';
$string['downloadreport'] = 'Download .docx reprt';
$string['email_policy'] = 'Email Policy';
$string['english'] = 'English';
$string['filechecked'] = 'Document status checked on Plagscan server';
$string['filesassociated'] = 'Document will be uploaded to account \'{$a}';
$string['filesubmitted'] = 'Document \'{$a}\' submitted to Plagscan';
$string['filetypeunsupported'] = 'Document \'{$a}\' is not a file type supported by the PlagScan server';
$string['french'] = 'French';
$string['generaldatabase'] = 'compare with general database';
$string['generateemail'] = 'generate and email';
$string['generateonly'] = 'generate only';
$string['german'] = 'German';
$string['handledocx'] = 'Docx option';
$string['if_plagiarism_level'] = 'only red PlagLevel';
$string['individualaccounts'] = 'Individual teacher accounts';
$string['invalidupload'] = 'The Plagscan server did not accept the file {$a->filename}. The response was: {$a->content}';
$string['maxfilesize'] = 'Maximum file size';
$string['max_file_size'] = 'Maximum file size';
$string['maxfilesize_help'] = 'Files with the size more than this value are not downloaded from the internet. Recommended value is 1000000.';
$string['months'] = 'after six months';
$string['myinstitution'] = 'compare to institution database';
$string['never'] = 'never';
$string['neverdelete'] = 'never delete';
$string['newexplain'] = 'For more information on this plugin see:';
$string['nodeadlinewarning'] = 'Warning: automatic submission to Plagscan selected, but no deadline set for this assignment';
$string['nomultipleaccounts'] = 'The use of individual teacher accounts for PlagScan is not enabled on this server';
$string['noone'] = 'compare to web sources only';
$string['noonedocs'] = 'compare to web and my documents';
$string['notprocessed'] = 'Plagscan has not yet analyzed this file';
$string['notsubmitted'] = 'Not submitted to plagscan';
$string['onlyassignmentwarning'] = 'Warning: automatic submission to Plagscan only works with assignment activities';
$string['optin'] = 'Plagiarism opt-in';
$string['optin_explanation'] = 'You have chosen to opt-in to plagiarism detection. From now on, any assignments you have submitted or will submit may be uploaded to the PlagScan server for checking';
$string['optout'] = 'Plagiarism opt-out';
$string['optout_explanation'] = 'You have chosen to opt-out of plagiarism detection. From now on, no assignments you submit will be uploaded to the PlagScan server for checking';
$string['plagscan'] = 'Plagscan';
$string['plagscan_API_key'] = 'API Key';
$string['plagscan_API_method'] = 'method';
$string['plagscan_API_username'] = 'API Username';
$string['plagscan_API_version'] = 'API version';
$string['plagscan_call_back_script'] = 'Call back Script URL';
$string['plagscanerror'] = 'Error from PlagScan server: {$a}';
$string['plagscanexplain'] = 'PlagScan is a plagiarism checker: documents from your institution as well as text from the Internet is considered for the analysis.<br/><br/>More information can be found at <a href="http://www.plagscan.com">www.PlagScan.com</a>';
$string['plagscanmethod'] = 'submit';
$string['plagscan_multipleaccounts'] = 'Associate uploaded files with';
$string['plagscanserver'] = 'PlagScan server';
$string['plagscan_studentpermission'] = 'Students can refuse permission to upload to Plagscan';
$string['plagscanversion'] = '2.0';
$string['plagscan:viewlinks'] = 'View result links';
$string['pluginname'] = 'Plagscan';
$string['psreport'] = 'PS report';
$string['red'] = 'PlagLevel red starts at';
$string['report'] = 'Report';
$string['resubmit'] = 'Resubmit to plagscan';
$string['runautomatic'] = 'Start automatically';
$string['runmanual'] = 'Start manually';
$string['save'] = 'Save';
$string['savedapiconfigerror'] = 'There was an error whilst updating the PlagScan settings';
$string['savedconfigsuccess'] = 'Plagscan settings saved';
$string['serverconnectionproblem'] = 'Problem connecting to PlagScan server';
$string['serverrejected'] = 'The PlagScan server rejected this file - the file is broken or protected.';
$string['settings_cancelled'] = 'Antiplagiarism settings have been canceled';
$string['settingsfor'] = 'Update PlagScan settings for account \'{$a}';
$string['settings_saved'] = 'Antiplagiarism settings have been saved successfully';
$string['singleaccount'] = 'The main PlagScan account';
$string['spanish'] = 'Spanish';
$string['ssty'] = 'Sensitivity';
$string['sstyhigh'] = 'high';
$string['sstylow'] = 'low';
$string['sstymedium'] = 'medium';
$string['studentdisclosure'] = 'Student Disclosure';
$string['studentdisclosuredefault'] = 'All files uploaded will be submitted to a plagiarism detection service';
$string['studentdisclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['studentdisclosureoptedout'] = 'You have opted-out from plagiarism detection';
$string['studentdisclosureoptin'] = 'Click here to opt-in to plagiarism detection';
$string['studentdisclosureoptout'] = 'Click here to opt-out from plagiarism detection';
$string['submit'] = 'Submit to plagscan';
$string['submituseroptedout'] = 'File \'{$a}\' not submitted - the user has opted-out of plagiarism detection';
$string['unsupportedfiletype'] = 'This file type is not supported by PlagScan';
$string['updateyoursettings'] = 'Update your PlagScan settings';
$string['useplagscan'] = 'Enable plagscan';
$string['useroptedout'] = 'Opted-out of plagiarism detection';
$string['viewmatches'] = 'View matches';
$string['viewreport'] = 'View report';
$string['wasoptedout'] = 'User had opted-out of plagiarism detection';
$string['webonly'] = 'Search in the WEB';
$string['week'] = 'after one week';
$string['weeks'] = 'after three months';
$string['windowsize'] = 'Window size';
$string['windowsize_help'] = 'Window size represents how granular tech search will be. Recommended value is 60.';
$string['yellow'] = 'PlagLevel yellow starts at';
