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
 * Strings for component 'block_spam_deletion', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_spam_deletion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alreadyreported'] = 'You\'ve already reported this content as spam.';
$string['cannotdelete'] = 'Cannot delete content for this account';
$string['confirmdelete'] = 'Delete spammer';
$string['confirmdeletemsg'] = 'Are you sure, you want to mark <strong>{$a->firstname} {$a->lastname} ({$a->username})</strong> as spammer? Data belonging to this user will be blanked out or removed.';
$string['confirmspamreportmsg'] = 'Are you sure you wish to report this content as spam?';
$string['countcomment'] = 'Comments: {$a}';
$string['countforum'] = 'Forum posts: {$a}';
$string['countmessageread'] = 'Read messages: {$a}';
$string['countmessageunread'] = 'Unread messages: {$a}';
$string['counttags'] = 'Unique tags: {$a}';
$string['deletebutton'] = 'Delete spammer';
$string['messageprovider:spamreport'] = 'Spam report';
$string['notrecentlyaccessed'] = 'The first access date of this account is more than 1 month ago and so the content from this user cannot be deleted.';
$string['pluginname'] = 'Spam deletion';
$string['reportasspam'] = 'Report as spam';
$string['reportcontentasspam'] = 'Report content as spam';
$string['spam_deletion:addinstance'] = 'Add delete spammer block';
$string['spam_deletion:spamdelete'] = 'Delete Spam';
$string['spam_deletion:viewspamreport'] = 'View spam reports';
$string['spamdescription'] = 'Spammer - spam deleted and account blocked {$a}';
$string['spamreportmessage'] = '{$a->spammer} may be a spammer.
View spam reports at {$a->url}';
$string['spamreportmessagetitle'] = '{$a->spammer} may be a spammer.';
$string['spamreports'] = 'Spam reports: {$a}';
$string['thanksspamrecorded'] = 'Thanks, your spam report has been recorded.';
$string['totalcount'] = 'Total records';
