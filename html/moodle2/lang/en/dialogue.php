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
 * Strings for component 'dialogue', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   dialogue
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmynewentries'] = 'Add my New Entries';
$string['addmynewentry'] = 'Submit entry';
$string['addsubject'] = 'Add Subject';
$string['addsubject_help'] = '<p>You can use this link to add a Subject to the dialogue. It\'s a
    good idea to always have a subject for the dialogue, it keeps
    the dialogue on track and focuses the replies on the topic.
    If you want to start talking about another subject it is
    better to close the current dialogue and start a new dialogue
    on that topic.</p>';
$string['allowmultiple'] = 'Allow more than one Dialogue with the same person';
$string['allowmultiple_help'] = '<p>This option allows a person to start more than one dialogue with
    someone else. The default is No, which only allows one (open)
    dialogue between two people.</p>

<p>Allowing multiple dialogues may result in an abuse of this
    facility. Some people may be &quot;pestered&quot; by others
    opening many unwanted dialogues with them.</p>';
$string['allowstudentdialogues'] = 'Allow Student-to-Student Dialogues';
$string['attachment'] = 'Attachment:';
$string['cannotadd'] = 'Cannot Open a dialogue unless you are a member of this group';
$string['cannotaddall'] = 'Cannot Open a dialogue with all participants';
$string['close'] = 'Close';
$string['closed'] = 'Closed';
$string['closeddialogues'] = 'Closed Dialogues';
$string['closedialogue'] = 'Close dialogue';
$string['closedialogue_help'] = '<h1>Closing Dialogues</h1>
<p>You can close a dialogue at any time. Closing a dialogue
    stops the dialogue and removes it from your current list of dialogues. That is,
    closed dialogues do not appear on this page. </p>

<p>You will be able to view closed dialogues but you can not add to them.
    However, closed dialogues may be deleted if you have updated the dialogue
    and set a period other than zero days for dialogue deletions. After that point they
    obviously will not be available even for viewing.</p>

<p>If you do close this dialogue, then you will have to start a new dialogue
    if you want to continue to &quot;talk&quot; with this person. That person
    will re-appear in the list of people you can start dialogues with.</p>';
$string['configmaxattachmentshelp'] = 'Maximum Attachments per Dialogue entry';
$string['configtrackreadentries'] = 'Set to \'yes\' if you want to track read/unread for each user.';
$string['confirmclosure'] = 'You are about to close a dialogue with {$a}. Closed dialogues cannot be reopened. If you close this dialogue you can view it but not add to it, and you will have to start another dialogue to contnue &quot;talking&quot; this person.<br /><br />Are you sure you want to close this dialogue?';
$string['currentattachment'] = 'Current attachment:';
$string['deleteafter'] = 'Delete Closed Dialogues after (Days)';
$string['deleteafter_help'] = '<h1>Deletion of Dialogues</h1>
<p>This option sets the time interval in days for the deletion of
    dialogues. It only applies to CLOSED dialogues. </p>

<p>If the time period is set to zero then dialogues are never
deleted.</p>';
$string['deleteattachment'] = 'Delete attachment';
$string['dialogue:addinstance'] = 'Add a new dialogue';
$string['dialoguebetween'] = 'Dialogue between {$a->sender} and {$a->recipient}';
$string['dialogue:close'] = 'Close';
$string['dialogueclosed'] = 'Dialogue Closed';
$string['dialogueintro'] = 'Dialogue Introduction';
$string['dialogue:manage'] = 'Manage';
$string['dialoguemessage'] = '{$a->userfrom} has posted a new entry in your

dialogue entry for \'{$a->dialogue}\'

You can see it appended to your dialogue entry:

    {$a->url}';
$string['dialoguemessagehtml'] = '{$a->userfrom} has posted a new entry in your

dialogue entry for \'<i>{$a->dialogue}</i>\'<br /><br />

You can see it appended to your <a href="{$a->url}">dialogue</a>.';
$string['dialoguemessageshort'] = '{$a->userfrom} posted a new entry for dialogue \'{$a->dialogue}\'.
    See it at <a href="{$a->url}" />';
$string['dialoguename'] = 'Dialogue name';
$string['dialogue:open'] = 'Open';
$string['dialogueopened'] = 'Dialogue opened with {$a->name}</p><p>You have $a->edittime mins to edit it if you want to make any changes.</p>';
$string['dialogue:participate'] = 'Participate';
$string['dialogue:participateany'] = 'Participate in any dialogue';
$string['dialoguetype'] = 'Type of Dialogue';
$string['dialoguetype_help'] = '<h1>Dialogue Types</h1>
<p>There are three types of Dialogues.</p>

<ol><li><p><b>Teacher to Student</b> This allows dialogues between
    teachers and students. Dialogues can be started by either
    teachers or students. In the lists of people, teachers only
    see students and students only see teachers.</p></li>

<li><p><b>Student to Student</b> This allows dialogues between
    students. Teachers are <b>not</b> included at all in this type of
    dialogue</p></li>

<li><p><b>Everybody</b> This allows everybody in the Class to
    start a dialogue with anybody else. Teachers can start
    dialogues with other teachers and students, students can start
    dialogues with other students and teachers. </p></li>
</ol>';
$string['dialogue:viewall'] = 'View any dialogue';
$string['dialoguewith'] = 'Dialogue with {$a}';
$string['edittime'] = 'Edit time (minutes)';
$string['edittime_help'] = '<h1>Set Edit Time</h1>
<p>This option controls how long a user has to edit a dialog entry after it has been submitted.</p>
<p>After the edit time has elapsed the user will no longer be allowed to edit the post, and if allowed, an email notification of the post will be sent.</p>';
$string['erroremptymessage'] = 'Error: empty message.';
$string['everybody'] = 'Everybody';
$string['firstentry'] = 'First Entry';
$string['furtherinformation'] = 'Further Information';
$string['lastentry'] = 'Last Entry';
$string['maxattachments'] = 'Maximum Attachments';
$string['messageprovider:post'] = 'Dialogue notifications';
$string['modulename'] = 'Dialogue';
$string['modulenameplural'] = 'Dialogues';
$string['multipleconversations'] = 'Allow more than one Dialogue with the same person';
$string['multipleconversations_help'] = 'This option determines whether you can have more than one conversation with a given person within a dialogue tool.';
$string['multiple_help'] = '<h1>Multiple Dialogues</h1>
<p>This option allows a person to start more than one dialogue with
    someone else. The default is No, which only allows one (open)
    dialogue between two people.</p>

<p>Allowing multiple dialogues may result in an abuse of this
    facility. Some people may be &quot;pestered&quot; by others
    opening many unwanted dialogues with them.</p>';
$string['namehascloseddialogue'] = '{$a} has closed dialogue';
$string['newdialogueentries'] = 'New dialogue entries';
$string['newentry'] = 'New Entry';
$string['noavailablepeople'] = 'There is no one available to have a Dialogue with.';
$string['noentry'] = 'No entries';
$string['nopersonchosen'] = 'No Person Chosen';
$string['nosubject'] = 'No subject';
$string['notavailable'] = 'Dialogues are not available to guest users';
$string['notextentered'] = 'No Text Entered';
$string['notifydefault'] = 'Notification of new entry';
$string['notifydefault_help'] = '<h1>Set Notification for new entries</h1>
<p>This option controls whether notification messages are sent. If this
   option is set to &quot;Yes&quot; a message is sent to the recipient
   of a new entry. The notification message does not contain the text of the entry,
   simply a sentence to say a new entry has been added and a link to the
   dialogue.</p>

<p>You should also review your Messaing settings in your Profile. </p>

<p>Note this option applies to all the dialogues active in the dialogue
    instance. The option can be changed at anytime.</p>';
$string['notstarted'] = 'You have not started this dialogue yet';
$string['notyetseen'] = 'Not yet seen';
$string['numberofentries'] = 'Number of entries';
$string['numberofentriesadded'] = '<p>Number of entries added: {$a->number}</p><p>You have {$a->edittime} mins to edit it if you want to make any changes.</p>';
$string['of'] = 'of';
$string['onwrote'] = 'On {$a->timestamp} {$a->picture} {$a->author} wrote';
$string['onyouwrote'] = 'On {$a->timestamp} {$a->picture} you wrote';
$string['open'] = 'Open';
$string['openadialoguewith'] = 'Open a Dialogue with';
$string['opendialogue'] = 'Submit dialogue';
$string['opendialogueentries'] = 'Open dialogue entries';
$string['opendialogues'] = 'Open Dialogues';
$string['otherdialogues'] = 'Other dialogues';
$string['pane0'] = 'Open a Dialogue';
$string['pane1'] = '{$a} Current Open Dialogues';
$string['pane1one'] = 'One Open Dialogue';
$string['pane3'] = '{$a} Closed Dialogues';
$string['pane3one'] = '1 Closed Dialogue';
$string['pluginadministration'] = 'Dialogue administration';
$string['pluginname'] = 'Dialogue';
$string['posts'] = 'posts';
$string['questions'] = 'Questions';
$string['questions_help'] = 'Questions help';
$string['replyupdated'] = 'Reply updated';
$string['seen'] = 'Seen {$a} ago';
$string['sendmailmessages'] = 'Send Mail Messages about my new entries';
$string['status'] = 'Status';
$string['studenttostudent'] = 'Student to Student';
$string['subject'] = 'Subject';
$string['subjectadded'] = 'Subject Added';
$string['teachertostudent'] = 'Teacher to Student';
$string['trackdialogue'] = 'Track unread entries';
$string['typefirstentry'] = 'Type the first entry here';
$string['typefollowup'] = 'Type follow-up here';
$string['typeofdialogue'] = 'Type of Dialogue';
$string['typeofdialogue_help'] = 'Type of Dialogue Help';
$string['typereply'] = 'Type reply here';
$string['unread'] = 'Unread entries';
$string['unreadnumber'] = '{$a} unread entries';
$string['unreadone'] = '1 unread entry';
$string['updated'] = '(Updated on, {$a})';
$string['viewallentries'] = 'View {$a} Dialogue entries';
