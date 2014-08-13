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
 * Strings for component 'mediasite', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   mediasite
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advancedheader'] = 'Advanced';
$string['advancedsearchafter'] = 'After';
$string['advancedsearchnotice'] = 'Search the fields you would like to search in Mediasite';
$string['advancedsearchuntil'] = 'Until';
$string['advancedskipped'] = 'Warning: Advanced field selection is ignored for wild-card searches';
$string['afterdate'] = 'Filter presentations in search by record date';
$string['afterdate_help'] = 'Limit the presentations returned to those that have a record date after than this date. The format is yyyy-mm-dd';
$string['blankduration'] = 'Please enter a non-blank duration';
$string['catalog'] = 'Catalog';
$string['certformat'] = 'Certificate file in .crt format';
$string['certpath'] = 'Cert Path';
$string['certpath_help'] = 'Path to the CA certificate.';
$string['datecombination'] = 'After {$a->after} and before {$a->before} will never be satisfied';
$string['description'] = 'Description';
$string['descriptionlabel'] = 'Description:';
$string['duplicatesitename'] = '{$a} is already used. Please pick a unique site-name.';
$string['duration'] = 'Ticket duration (in minutes)';
$string['duration_help'] = 'Length in minutes that generated authorization tickets will be valid.';
$string['expandresource'] = 'Show details for this resource';
$string['futuredate'] = '{$a} - specified date is in the future.';
$string['impossibledatecombination'] = 'No presentation will match given date combinations';
$string['incompleteconfiguration'] = 'Incomplete configuration. Did the site administrator save configuration changes?';
$string['invalidapikey'] = 'Site does not have an API key setup for Moodle';
$string['invalidcert'] = 'Invalid certificate';
$string['invalidcred'] = 'Invalid username and/or password';
$string['invaliddate'] = '{$a} - is not a valid date.';
$string['invaliddateformat'] = '{$a} is not of the format YYYY-MM-DD';
$string['invalidformat'] = 'Site responded with data that does not appear to be the correct format';
$string['invalidserviceroot'] = 'Not a valid service root URL';
$string['invalidurl'] = '{$a} - is an invalid URL.';
$string['invalidURL'] = 'Invalid URL format';
$string['invalidversion'] = 'Site did not respond with adequate version information - {$a}';
$string['longduration'] = 'Long ticket durations are not recommended ({$a})';
$string['longsitename'] = 'Site Name is too long';
$string['longsitepassword'] = 'Password is too long';
$string['longsiteusername'] = 'User Name is too long';
$string['mediasite'] = 'Mediasite';
$string['mediasite:addinstance'] = 'Add Mediasite content to a course';
$string['mediasite:managesite'] = 'Manage Mediasite settings';
$string['mediasite:overridedefaults'] = 'Override default Mediasite settings';
$string['mediasite:view'] = 'View Mediasite content on course';
$string['modulename'] = 'Mediasite Content';
$string['modulenameplural'] = 'Mediasite Content';
$string['no70'] = 'This URL does not appear to be a Mediasite 7.0.4+ site';
$string['nocert'] = 'No certificate for an HTTPS site';
$string['nonnumericduration'] = 'You have entered a non-numeric value for duration ({$a})';
$string['nosites'] = 'There are no configured sites.';
$string['notadate'] = '{$a} is not a date';
$string['notauthorized'] = 'You are not authorized for this resource.';
$string['notfound'] = 'The selected Mediasite content was not found.';
$string['noversion'] = 'Site did not respond with version information';
$string['nowritepermissions'] = 'No write permissions to {$a}';
$string['onefieldselect'] = 'There must be at least one field selected with a non-empty search string';
$string['openaspopup'] = 'Open Mediasite content in new window';
$string['openaspopup_help'] = 'When viewing the resource should it be displayed as a pop-up or inline.';
$string['opensearchwindow'] = 'Open Search Window';
$string['passthru'] = 'Enable pass through authentication';
$string['passthru_help'] = 'Enable pass through authentication. This means that there is the same user name that is known to Moodle and a local authentication server (eg. LDAP)';
$string['password'] = 'Password';
$string['password_help'] = 'Password of the admin or system user.';
$string['pluginadministration'] = 'Mediasite Content administration';
$string['pluginname'] = 'Mediasite Content';
$string['plural'] = 's';
$string['presentation'] = 'Presentation';
$string['requiredsitename'] = 'Site Name is required';
$string['requiredsitepassword'] = 'Password longer than 3 characters is required';
$string['requiredsiteusername'] = 'User Name longer than 3 characters is required';
$string['resource'] = 'Type of resource';
$string['resource_help'] = 'The type of resource. Currently only \'presentations\' and \'catalogs\' are supported';
$string['resourcetitle'] = 'Title';
$string['resourcetype'] = 'Content Type';
$string['restrictip'] = 'Restrict playback to client IP';
$string['restrictip_help'] = 'Bind authorization tickets to the client IP address to prevent link sharing.  This may need to be disabled when using a CDN or if the Moodle and Mediasite servers are on different networks.';
$string['searchbutton'] = 'Search for Mediasite content';
$string['searchheader'] = 'Search for Mediasite content';
$string['searchnoresult'] = 'No results were found matching your search.';
$string['searchresultheader'] = 'Search returned {$a->count} {$a->type}';
$string['searchsubmit'] = 'Search';
$string['searchtext'] = 'Text to search';
$string['searchtext_help'] = 'In the absence of any advanced options this text defaults to search in the tags and presentation titles. Leaving this blank causes all resources to be returned.';
$string['searchtruncated'] = 'Search results are truncated';
$string['selectresource'] = 'Select this resource';
$string['serverurl'] = 'Mediasite Root URL';
$string['siteaddbuttonlabel'] = 'Add site';
$string['siteheader'] = 'Mediasite Server';
$string['sitename'] = 'Title';
$string['sitenames'] = 'Select a default server';
$string['smallduration'] = 'You have entered a value for duration that is considered too small ({$a})';
$string['titleresource'] = 'Title of this resource';
$string['unauthorized'] = 'Unauthorized';
$string['unknownexception'] = 'Unknown exception {$a}';
$string['unsupportedversion'] = 'Unsupported version - {$a}';
$string['untildate'] = 'Filter presentations in search by record date';
$string['untildate_help'] = 'Limit the presentations returned to those that have a record date earlier than this date. The format is yyyy-mm-dd';
$string['username'] = 'Username';
$string['username_help'] = 'Admin or system user on the Mediasite server.';
$string['wrongversion'] = 'This url seems to point to a Mediasite site, but with the wrong version - {$a}';
