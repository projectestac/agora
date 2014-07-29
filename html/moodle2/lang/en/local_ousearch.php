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
 * Strings for component 'local_ousearch', language 'en', branch 'MOODLE_21_STABLE'
 *
 * @package   local_ousearch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configremote'] = 'List of IP addresses that are permitted to use the remote search facility.
This should be a list of zero or more numeric IP addresses, comma-separated. Be careful! Requests
from these IP addresses can search (and see summary text) as if they were any user. The default,
blank, prevents this access.';
$string['displayversion'] = 'OU search version: <strong>{$a}</strong>';
$string['fastinserterror'] = 'Failed to insert search data (high performance insert)';
$string['findmoreresults'] = 'More results';
$string['maxterms'] = 'Maximum number of terms';
$string['maxterms_desc'] = 'If the user tries to search for more terms than this limit, they will get an error message. (For performance reasons.)';
$string['nomoreresults'] = 'Could not find any more results.';
$string['noresults'] = 'Could not find any matching results. Try using different words or removing
words from your query.';
$string['nowordsinquery'] = 'Enter some words in the search box.';
$string['ousearch'] = 'OU search';
$string['pluginname'] = 'OU search';
$string['previousresults'] = 'Back to results {$a}';
$string['reindex'] = 'Re-indexing documents for module {$a->module} on course {$a->courseid}';
$string['remote'] = 'Remote search IP allow';
$string['remotenoaccess'] = 'This IP address does not have access to remote search';
$string['remotewrong'] = 'Remote search access is not configured (or not correctly configured).';
$string['restofwebsite'] = 'Search the rest of this website';
$string['resultsfail'] = 'Could not find any results including the word <strong>{$a}</strong>. Try
using different words.';
$string['searchfor'] = 'Search: {$a}';
$string['searchresultsfor'] = 'Search results for <strong>{$a}</strong>';
$string['searchtime'] = 'Search time: {$a}s';
$string['toomanyterms'] = '<strong>You have entered too many search terms (words).</strong> To ensure that search results can be displayed promptly, the system is limited to a maximum of {$a} search terms. Please press the Back button and modify your search.';
$string['untitled'] = '(Untitled)';
