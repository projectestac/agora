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
 * Strings for component 'dialogue', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   dialogue
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['ago'] = 'ago';
$string['attachment'] = 'Attachment';
$string['attachments'] = 'Attachments';
$string['bulkopener'] = 'Bulk opener';
$string['bulkopenrule'] = 'Bulk open rule';
$string['bulkopenrulenotifymessage'] = '<strong>Note:</strong><br/>When using a bulk opener rule, conversations are not opened straight away. Conversations will be opened when the system\'s cron function is run, typically every 30 minutes.';
$string['bulkopenrules'] = 'Bulk open rules';
$string['cachedef_params'] = 'Params - user interface';
$string['cachedef_participants'] = 'Participants id\'s (basic information)';
$string['cachedef_unreadcounts'] = 'Users unread message counts in conversations';
$string['cachedef_userdetails'] = 'User brief details, all enrolled users';
$string['cannotclosedraftconversation'] = 'You cannot close a conversation that hasn\'t started!';
$string['cannotdeleteopenconversation'] = 'You cannot delete a open conversation';
$string['closeconversation'] = 'Close conversation';
$string['closed'] = 'Closed';
$string['completed'] = 'Completed';
$string['configmaxattachments'] = 'Default maximum number of attachments allowed per post.';
$string['configmaxbytes'] = 'Default maximum size for all dialogue attachments on the site (subject to course limits and other local settings)';
$string['configtrackunread'] = 'Track unread dialogue messages on course homepage';
$string['configviewconversationsbyrole'] = 'Experimental: View conversations by role, order conversation listing by author\'s role';
$string['configviewstudentconversations'] = 'Experimental: student list with conversations they are involved in';
$string['conversationcloseconfirm'] = 'Are you sure you want to close conversation {$a} ?';
$string['conversationclosed'] = 'Conversation {$a} has been closed';
$string['conversationdeleteconfirm'] = 'Are you sure you want to delete conversation {$a}, this cannot be undone?';
$string['conversationdeleted'] = 'Conversation {$a} has been deleted';
$string['conversationdiscarded'] = 'Conversation discarded';
$string['conversationlistdisplayheader'] = 'Displaying {$a->show} {$a->state} conversations {$a->groupname}';
$string['conversationopened'] = 'Conversation has been opened';
$string['conversationopenedcron'] = 'Conversations will be opened automatically';
$string['conversationopenedwith'] = '<strong>1</strong> conversation opened with:';
$string['conversations'] = 'Conversations';
$string['conversationsopenedwith'] = '<strong>{$a}</strong> conversations opened with:';
$string['cutoffdate'] = 'Cut off date';
$string['datefullyear'] = '{$a->datefull} <small>({$a->time})</small>';
$string['dateshortyear'] = '{$a->dateshort} <small>({$a->time})</small>';
$string['deleteconversation'] = 'Delete conversation';
$string['deletereply'] = 'Delete reply';
$string['dialogue:addinstance'] = 'Add a Dialogue';
$string['dialogue:bulkopenrulecreate'] = 'Create a bulk opener rule';
$string['dialogue:bulkopenruleeditany'] = 'Allows user to edit any rule, useful for admin\'s etc';
$string['dialogue:close'] = 'Close a conversation';
$string['dialogue:closeany'] = 'Close any';
$string['dialogue:delete'] = 'Delete own';
$string['dialogue:deleteany'] = 'Delete any';
$string['dialogueintro'] = 'Dialogue Introduction';
$string['dialoguename'] = 'Dialogue name';
$string['dialogue:open'] = 'Open a conversation';
$string['dialogue:receive'] = 'Receive, who can be the recipient when opening a conversation';
$string['dialogue:reply'] = 'Reply';
$string['dialogue:replyany'] = 'Reply any';
$string['dialogueupgradehelper'] = 'Dialogue upgrade helper';
$string['dialogue:viewany'] = 'View any';
$string['dialogue:viewbyrole'] = 'View conversation listing by role, experimental';
$string['displaybystudent'] = 'Display by student';
$string['displayconversationsheading'] = 'Displaying {$a} conversations';
$string['displaying'] = 'Displaying';
$string['draft'] = 'Draft';
$string['draftconversation'] = 'Draft conversation';
$string['draftconversationtrashed'] = 'Draft conversation trashed';
$string['draftlistdisplayheader'] = 'Displaying my drafts';
$string['draftreply'] = 'Draft reply';
$string['draftreplytrashed'] = 'Draft reply trashed';
$string['drafts'] = 'Drafts';
$string['errorcutoffdateinpast'] = 'Cut off date cannot be set in the past';
$string['erroremptymessage'] = 'Message cannot be empty';
$string['erroremptysubject'] = 'Subject cannot be empty.';
$string['errornoparticipant'] = 'You must open a dialogue with somebody...';
$string['everybody'] = 'Everybody (free for all)';
$string['everyone'] = 'Everyone';
$string['everyones'] = 'everyone\'s';
$string['firstname'] = 'First name';
$string['fullname'] = 'Full name';
$string['groupmodenotifymessage'] = 'This activity is running in groupmode, this will affect who you can start a conversation with and what conversations are displayed.';
$string['hasnotrun'] = 'Has not run yet';
$string['includefuturemembers'] = 'Include future members';
$string['ingroup'] = 'in group {$a}';
$string['justmy'] = 'just my';
$string['lastname'] = 'Last name';
$string['lastranon'] = 'Last ran on';
$string['latest'] = 'Latest';
$string['legacy'] = 'Legacy';
$string['listpaginationheader'] = '{$a->start}-{$a->end} of {$a->total}';
$string['matchingpeople'] = 'Matching people ({$a})';
$string['maxattachments'] = 'Maximum number of attachments';
$string['maxattachments_help'] = 'This setting specifies the maximum number of files that can be attached to a dialogue post.';
$string['maxattachmentsize'] = 'Maximum attachment size';
$string['maxattachmentsize_help'] = 'This setting specifies the largest size of file that can be attached to a dialogue post.';
$string['message'] = 'Message';
$string['messageapibasicmessage'] = '<p>{$a->userfrom} posted a new message to a conversation you are participating
in with subject: <i>{$a->subject}</i>
<br/><br/><a href="{$a->url}">View in Moodle</a></p>';
$string['messageapismallmessage'] = '{$a} posted a new message to a conversation you are participating in';
$string['messageprovider:post'] = 'Dialogue notifications';
$string['messages'] = 'messages';
$string['mine'] = 'Mine';
$string['modulename'] = 'Dialogue';
$string['modulename_help'] = 'Dialogues allow students or teachers to start two-way dialogues with another person. They are course activities that can be useful when the teacher wants a place to give private feedback to a student on their online activity. For example, if a student is participating in a language forum and made a grammatical error that the teacher wants to point out without embarassing the student, a dialogue is the perfect place. A dialogue activity would also be an excellent way for counsellors within an institution to interact with students - all activities are logged and email is not necessarily required';
$string['modulenameplural'] = 'Dialogues';
$string['nobulkrulesfound'] = 'No bulk rules found!';
$string['noconversationsfound'] = 'No conversations found!';
$string['nodraftsfound'] = 'No drafts found!';
$string['nomatchingpeople'] = 'No people match \'{$a}';
$string['nopermissiontoclose'] = 'You do not have permission to close this conversation!';
$string['nopermissiontodelete'] = 'You do not have permission to delete!';
$string['nosubject'] = '[no subject]';
$string['numberattachments'] = '{$a} attachments';
$string['numberunread'] = '{$a} unread';
$string['oldest'] = 'Oldest';
$string['onlydraftscanbetrashed'] = 'Only drafts can be trashed';
$string['open'] = 'Open';
$string['openedbyfullyear'] = '<small>Opened by</small> <strong>{$a->fullname}</strong> <small>on</small> {$a->datefull} <small>({$a->time})</small>';
$string['openedbyshortyear'] = '<small>Opened by</small> <strong>{$a->fullname}</strong> <small>on</small> {$a->dateshort} <small>({$a->time})</small>';
$string['openedbytoday'] = '<small>Opened by</small> <strong>{$a->fullname}</strong> <small>at</small> {$a->time} <small>({$a->timepast}) ago</small>';
$string['openwith'] = 'Open with';
$string['participants'] = 'participants';
$string['people'] = 'People';
$string['pluginadministration'] = 'Dialogue administration';
$string['pluginname'] = 'Dialogue';
$string['repliedby'] = '<strong>{$a->fullname}</strong> <small>replied</small> {$a->timeago}';
$string['repliedbyfullyear'] = '<strong>{$a->fullname}</strong> <small>replied on</small> {$a->datefull} <small>({$a->time})</small>';
$string['repliedbyshortyear'] = '<strong>{$a->fullname}</strong> <small>replied on</small> {$a->dateshort} <small>({$a->time})</small>';
$string['repliedbytoday'] = '<strong>{$a->fullname}</strong> <small>replied at</small> {$a->time} <small>({$a->timepast}) ago</small>';
$string['reply'] = 'Reply';
$string['replydeleteconfirm'] = 'Are you sure you want to this reply?';
$string['replydeleted'] = 'Reply has been deleted';
$string['replysent'] = 'Your reply has been sent';
$string['runsuntil'] = 'Runs until';
$string['savedraft'] = 'Save draft';
$string['searchpotentials'] = 'Search potentials...';
$string['send'] = 'Send';
$string['senton'] = '<small><strong>Sent on: </strong></small>';
$string['sortedby'] = 'Sorted by: {$a}';
$string['studenttostudent'] = 'Student to student';
$string['subject'] = 'Subject';
$string['teachertostudent'] = 'Teacher to student';
$string['trashdraft'] = 'Trash draft';
$string['unread'] = 'Unread';
$string['unreadmessages'] = 'Unread messages';
$string['unreadmessagesnumber'] = '{$a} unread messages';
$string['unreadmessagesone'] = '1 unread message';
$string['upgrade'] = 'Upgrade';
$string['upgradecheck'] = 'Upgrade dialogue {$a}?';
$string['upgradedcount'] = 'Upgraded {$a} dialogues';
$string['upgradeiscompleted'] = 'Upgrade is completed';
$string['upgrademessage'] = 'This Dialogue needs to be upgraded! Please contact your Moodle administrator';
$string['upgradenodialoguesselected'] = 'No dialogues selected';
$string['upgradenoneedupgrade'] = '{$a} dialogues need to be upgraded';
$string['upgradereport'] = 'List dialogues still to upgrade';
$string['upgradereportdescription'] = 'This will show a report of all the dialogues on the system that still need to be upgraded to schema';
$string['upgradeselected'] = 'Upgrade selected dialogues';
$string['upgradeselectedcount'] = 'Upgrade {$a} selected dialogues?';
$string['upgradingresultfailed'] = 'Result: Upgrade failed';
$string['upgradingresultsuccess'] = 'Result: Upgrade successful';
$string['upgradingsummary'] = 'Upgrading dialogue: {$a}';
$string['usecoursegroups'] = 'Use course groups';
$string['usecoursegroups_help'] = 'If the course has defined groups a further restriction will be added to who a dialogue can
be opened with. Dialogues can only be opened between group members unless the person opening the dialogue has the "Access all groups"
capability set.';
$string['usesearch'] = 'Use search to find people to start a dialogue with';
$string['viewconversations'] = 'View conversations';
$string['viewconversationsbyrole'] = 'View conversations by role';
