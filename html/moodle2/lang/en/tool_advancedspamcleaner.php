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
 * Strings for component 'tool_advancedspamcleaner', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_advancedspamcleaner
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['akismetkey'] = 'Your akismet key';
$string['akismetkey_desc'] = 'Enter the key that you got from akismet.com';
$string['alreadyreported'] = 'You\'ve already reported this content as spam.';
$string['apilimit'] = 'Api limit';
$string['apilimit_help'] = 'Maximum amount of Api calls to make. (0 = unlimited)';
$string['blogpost'] = 'Blog post';
$string['blogsummar'] = 'Blog summary';
$string['cannotdelete'] = 'Cannot delete content for this user.';
$string['commment'] = 'Comment';
$string['confirmdelete'] = 'Delete spammer';
$string['confirmdeletemsg'] = 'Are you sure, you want to mark <strong>{$a->firstname} {$a->lastname} ({$a->username})</strong> as spammer? Data belonging to this user will be blanked out or removed.';
$string['confirmspamreportmsg'] = 'Are you sure you wish to report this content as spam?';
$string['countcomment'] = 'Comments: {$a}';
$string['countforum'] = 'Forum posts: {$a}';
$string['countmessageread'] = 'Read messages: {$a}';
$string['countmessageunread'] = 'Unread messages: {$a}';
$string['counttags'] = 'Unique tags: {$a}';
$string['datelimits'] = 'Date limits';
$string['deletebutton'] = 'Nuke spammer';
$string['enddate'] = 'End date';
$string['forummessage'] = 'Forum message';
$string['forumsubject'] = 'Forum subject';
$string['hitlimit'] = 'Hit limit';
$string['hitlimit_help'] = 'Stop after this amount of spam entries have been detected (0 = unlimited)';
$string['keywordstouse'] = 'Keywords to use';
$string['limithit'] = 'Set limit was hit. Results that follow may not be complete..';
$string['limits'] = 'Limits';
$string['message'] = 'Message';
$string['messageblocked'] = 'Your post has been blocked, as our spam prevention system has flagged it as possibly containing spam. If this is not the case, please see \'My post has been incorrectly flagged as containing spam\' in <a href="http://docs.moodle.org/en/Moodle.org_FAQ#My_post_has_been_incorrectly_flagged_as_containing_spam">http://docs.moodle.org/en/Moodle.org_FAQ</a>. Your message is below if you need to copy and paste it.';
$string['messageblockedtitle'] = 'Potential spam detected!';
$string['messageprovider:spamreport'] = 'Spam report';
$string['method'] = 'Method to use';
$string['methodoptions'] = 'Method options';
$string['methodused'] = 'Spam detection method used: {$a}';
$string['missingkeywords'] = 'Keywords cannot be empty';
$string['missingmethod'] = 'Method to use cannot be empty';
$string['missingscope'] = 'No scope specified to search';
$string['noakismetkey'] = 'Set api key from settings page before using this option';
$string['notrecentlyaccessed'] = 'Beware! The first access date of this account is more than 1 month ago. Make double sure it is really a spammer.';
$string['nukeuser'] = 'Nuke user';
$string['pluginname'] = 'Advanced spam cleaner';
$string['pluginpage'] = 'Plugin page';
$string['pluginsettings'] = 'Advanced spam cleaner sub-plugins settings for {$a}';
$string['reportasspam'] = 'Report as spam';
$string['reportcontentasspam'] = 'Report content as spam';
$string['reportissue'] = 'Report an issue';
$string['searchblogs'] = 'Include blogs';
$string['searchcomments'] = 'Include comments';
$string['searchforums'] = 'Include forums';
$string['searchmsgs'] = 'Include messages';
$string['searchscope'] = 'Scope of spam search';
$string['searchusers'] = 'Include user profiles';
$string['settingpage'] = 'Advanced spam cleaner settings';
$string['showstats'] = 'Following number of entries were checked for spam : <br/> Blogs: {$a->blogs}, User Profiles: {$a->users}, Comments: {$a->comments},
    Messages: {$a->msgs}, Forum Posts: {$a->forums} <br/> Time used was {$a->time} seconds approximately';
$string['spamauto'] = 'Auto detect spam using common spam keywords';
$string['spamcannotdelete'] = 'Cannot delete this user';
$string['spamcannotfinduser'] = 'No users matching your search';
$string['spamcleanerintro'] = 'This script allows you to search all user profiles , comments, blogposts, forum posts and messages for certain strings and then delete those accounts which are obviously created by spammers.
    You can search for multiple keywords using commas (eg casino, porn) or use a third party system to scan your site (eg Akismet).
    Please note this can take a while based on your method of search. Use limits to reduce scope of search.';
$string['spamcount'] = 'Spam count';
$string['spamdeleteall'] = 'Delete all these user accounts';
$string['spamdeleteallconfirm'] = 'Are you sure you want to delete all these user accounts?  You can not undo this.';
$string['spamdeleteconfirm'] = 'Are you sure you want to delete this entry?  You can not undo this.';
$string['spam_deletion:addinstance'] = 'Add delete spammer block';
$string['spam_deletion:spamdelete'] = 'Delete Spam';
$string['spam_deletion:viewspamreport'] = 'View spam reports';
$string['spamdesc'] = 'Description';
$string['spamdescription'] = 'Spammer - spam deleted and account blocked {$a}';
$string['spameg'] = 'eg:  casino, porn, xxx';
$string['spamfromblog'] = 'From blog post:';
$string['spamfromcomments'] = 'From comments:';
$string['spamfromforumpost'] = 'From forum post:';
$string['spamfrommessages'] = 'From messages:';
$string['spaminvalidresult'] = 'Unknown but invalid result';
$string['spamoperation'] = 'Operation';
$string['spamreportmessage'] = '{$a->spammer} may be a spammer.
View spam reports at {$a->url}';
$string['spamreportmessagetitle'] = '{$a->spammer} may be a spammer.';
$string['spamreports'] = 'Spam reports: {$a}';
$string['spamresult'] = 'Please note deleting a user doesnt delete the spammed entry <br /> Results of searching user profiles containing:';
$string['spamsearch'] = 'Search for spam';
$string['spamtext'] = 'Spam text';
$string['spamtype'] = 'Spam type';
$string['startdate'] = 'Start date';
$string['thanksspamrecorded'] = 'Thanks, your spam report has been recorded.';
$string['totalcount'] = 'Total records by this user:-';
$string['usedatestartlimit'] = 'Use date limits';
$string['usedatestartlimit_help'] = 'Enable to run the spam search on entities only between the selected date range';
$string['usekeywords'] = 'Use the entered keywords';
$string['uselimits'] = 'Use limits';
$string['uselimits_help'] = 'Use limits to reduce resource usage <br /> (Note that limits are not used for auto detect and keyword methods)';
$string['userdesc'] = 'User description';
