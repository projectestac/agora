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
 * Strings for component 'plagiarism_ephorus', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   plagiarism_ephorus
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_connection'] = 'Check connection';
$string['default'] = 'Default';
$string['default_processtype'] = 'Default processtype';
$string['default_processtype_help'] = '<p>There are two default upload options when sending documents to Ephorus:</p>
<ul>
    <li>Default: The documents you send in will be checked for plagiarism and will be used as reference material in the future. </li>
    <li>Private: Your document will be checked for plagiarism but won\'t be used as reference material.</li>
</ul>';
$string['detailed'] = 'Detailed';
$string['document'] = 'Document';
$string['document_information'] = 'Document Information';
$string['document_not_found'] = 'Document not found.';
$string['document_not_found_msg'] = 'The document could not be found.';
$string['document_protected'] = 'Protected Document';
$string['document_protected_msg'] = 'The document is protected by a password and could not be scanned.';
$string['document_written_by'] = 'Document written by %s (%s)';
$string['duplicate_document'] = 'Duplicate Document';
$string['duplicate_document_download'] = 'Download the Document';
$string['duplicate_document_msg'] = 'This Document has been handed in before.';
$string['ephorus'] = 'Ephorus';
$string['ephorus_logging'] = 'Ephorus Logging';
$string['ephorus_logging_help'] = '<p>Ephorus Logging enables extra logging</p>';
$string['ephorus_report'] = 'Ephorus Report';
$string['ephorus_settings'] = 'Ephorus Settings';
$string['ephorus_status'] = 'Ephorus status';
$string['found_by_ephorus'] = 'Found';
$string['handin_address'] = 'Hand-in address';
$string['handin_code'] = 'Hand-in code';
$string['handin_index_not_okay'] = 'Hand-in and index address haven\'t got connection';
$string['handin_index_okay'] = 'Hand-in and index address have got connection';
$string['handin_not_okay'] = 'Hand-in address hasn\'t got connection';
$string['handin_okay'] = 'Hand-in address has got connection';
$string['index_address'] = 'Index address';
$string['index_not_okay'] = 'Index address hasn\'t got connection';
$string['index_okay'] = 'Index address has got connection';
$string['link_original_report'] = 'View original report';
$string['no_results_found'] = 'There are no results found for this document.';
$string['not_enough_text'] = 'Not Enough Text';
$string['not_enough_text_msg'] = 'The document does not contain enough text for a reliable plagiarism scan.';
$string['no_text'] = 'No Text';
$string['no_text_msg'] = 'The document does not contain any text and could not be checked for plagiarism.';
$string['original_document_by'] = 'The Original Document was handed in by %s (%s) on %s';
$string['original_document_by_no_date'] = 'The Original Document was handed in by %s (%s)';
$string['original_report'] = 'Original Report';
$string['original_text'] = 'Original';
$string['pluginname'] = 'Ephorus Plagiarism Prevention';
$string['private'] = 'Private';
$string['processing'] = 'Processing';
$string['processing_msg'] = 'Ephorus is scanning the document for possible plagiarism and the report will arrive shortly.';
$string['processtype'] = 'Processtype';
$string['processtype_help'] = '<p>There are three upload options when sending documents to Ephorus:</p>
<ul>
    <li>Default: The documents you send in will be checked for plagiarism and will be used as reference material in the future. </li>
    <li>Reference: The document won\'t be checked for plagiarism but will be used as reference material.</li>
    <li>Private: Your document will be checked for plagiarism but won\'t be used as reference material.</li>
</ul>';
$string['reference'] = 'Reference';
$string['saved_settings'] = 'Ephorus settings saved';
$string['send_document_manually'] = 'Send the file manually to Ephorus.';
$string['student'] = 'Student';
$string['student_disclosure'] = 'Student Disclosure';
$string['student_disclosure_help'] = '<p>This text will be displayed to all students on the submission page.</p>';
$string['submission_date'] = 'Submission Date';
$string['summary'] = 'Summary';
$string['total_score'] = 'Total Score';
$string['unfinalized_file'] = 'Unfinalized file';
$string['unknown_error'] = 'Unknown Error';
$string['unknown_error_msg'] = 'An unknown error occurred.';
$string['unknown_file_error'] = 'Unable to send file';
$string['unknown_file_error_msg'] = 'Unable to send file';
$string['unsupported_file_type'] = 'Unsupported file type';
$string['unsupported_file_type_msg'] = 'Ephorus doesn\'t support this file type';
$string['update_sources'] = 'Update Sources';
$string['use_cron'] = 'Use Ephorus in Moodle cron';
$string['use_cron_help'] = '<p>The hand-in script usually get called in the cron from Moodle, uncheck this to disable this feature.</p>
<p>You do however need to set a separate cronjob for the hand-in script.</p>';
$string['use_ephorus'] = 'Enable Ephorus';
$string['wait_for_sending'] = 'Wait for sending';
$string['wait_for_sending_msg'] = 'Waiting to send the Document to Ephorus.';
$string['xsl_not_enabled'] = 'XSL extension is not enabled, this is required in order to show reports.';
