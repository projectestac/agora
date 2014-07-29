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
 * Strings for component 'forumng', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   forumng
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addanewdiscussion'] = 'Start a new discussion';
$string['advancedsearch'] = 'Advanced search';
$string['afterenddate'] = 'You can read any posts within this forum, but not submit your own posts.
This forum closed for posting on {$a}.';
$string['afterenddatecapable'] = 'Students can read any posts within this forum, but not submit
their own posts since the forum closed on {$a}. You still have access to submit posts.';
$string['alert_condition1'] = 'It is abusive';
$string['alert_condition2'] = 'It is harassment';
$string['alert_condition3'] = 'It contains obscene content such as pornography';
$string['alert_condition4'] = 'It is libellous or defamatory';
$string['alert_condition5'] = 'It infringes copyright';
$string['alert_condition6'] = 'It is against the rules for some other reason';
$string['alert_conditionmore'] = 'Other information (optional)';
$string['alert_emailappendix'] = 'You are receiving this email because your email address has been
used on the ForumNG for reporting unacceptable email.';
$string['alert_emailpreface'] = 'A forum post has been reported by {$a->fullname} ({$a->username},
{$a->email}) {$a->url}';
$string['alert_emailsubject'] = 'Alert F{$a->postid}: {$a->coursename} {$a->forumname}';
$string['alert_feedback'] = 'Your report has been sent successfully. A member of staff will
investigate this issue.';
$string['alert_info'] = 'The \'Report\' feature can send this post to a staff member who will
investigate. <strong>Please use this feature only if you think the post breaks the
rules</strong>.';
$string['alert_intro'] = 'You can use the Report post link if you need to bring a post in this forum to the attention of a moderator.';
$string['alert_link'] = 'Report post';
$string['alert_linktitle'] = 'Report post as unacceptable';
$string['alert_notcurrentpost'] = 'This post has already been deleted.';
$string['alert_note'] = 'Please note: This email has also been sent to {$a}';
$string['alert_pagename'] = 'Report a post as unacceptable';
$string['alert_reasons'] = 'Reasons for reporting post';
$string['alert_reporterdetail'] = '{$a->fullname} ({$a->username}; {$a->email}; {$a->ip})';
$string['alert_reporterinfo'] = '<strong>Reporter\'s details</strong>:';
$string['alert_submit'] = 'Send report';
$string['alert_turnedoff'] = 'The alert function is not available.';
$string['allowsubscribe'] = 'Allow people to subscribe';
$string['allsubscribe'] = 'Subscribe to all forums';
$string['allunsubscribe'] = 'Unsubscribe from all forums';
$string['alt_discussion_deleted'] = 'Deleted discussion';
$string['alt_discussion_locked'] = 'Discussion is read-only';
$string['alt_discussion_moderator'] = 'Discussion is moderated';
$string['alt_discussion_sticky'] = 'This discussion always appears at top of list';
$string['alt_discussion_timeout'] = 'Not currently visible to users (time limit)';
$string['anonymousmoderator'] = 'Anonymous moderator';
$string['archive_errorgrouping'] = 'The forum that receives old discussions has a different group
setting. Please update the forum and change the <strong>Remove old discussions</strong> options.';
$string['archive_errortargetforum'] = 'The forum that used to receive old discussions no longer
exists. Please update the forum and change the <strong>Remove old discussions</strong> options.';
$string['asmoderator'] = 'Post as?';
$string['asmoderator_anon'] = 'Identify self as moderator (name hidden from students)';
$string['asmoderator_help'] = 'This option will enable certain users to be able to identify themselves as a forum
moderator or post as a moderator with their profile hidden from students.';
$string['asmoderator_post'] = 'Standard Post';
$string['asmoderator_self'] = 'Identify self as moderator';
$string['atom'] = 'Atom';
$string['attachment'] = 'Attachment';
$string['attachmentmaxbytes'] = 'Maximum attachment size';
$string['attachmentmaxbytes_help'] = 'This is the maximum <i>total</i> size for all attachments on
a single post.';
$string['attachmentnum'] = 'Attachment {$a}';
$string['attachments'] = 'Attachments';
$string['author'] = 'author: &lsquo;{$a}&rsquo;';
$string['authorname'] = 'Author name';
$string['authorname_help'] = 'You can type a first name (Jane), a surname (Brown), the whole name (jane brown), or the first part of any of these (Ja, bro, Jane B). Searches are not case sensitive.

You can also type a username (jb001).

If you leave this blank, posts from all authors will be included.';
$string['autolockedmessage'] = 'This discussion has been closed automatically as the maximum time permitted to be open has passed.';
$string['automaticallylock'] = 'Automatically lock';
$string['averagerating'] = 'Average rating: {$a->avg} (from {$a->num})';
$string['badbrowser'] = '<h3>Reduced forum features</h3>&nbsp;<p>You are using {$a}. If you\'d
like a better experience when using these forums, please consider upgrading to a more recent
version of <a href=\'http://www.microsoft.com/windows/internet-explorer/\'>Internet Explorer</a>
or <a href=\'http://www.mozilla.com/firefox/\'>Firefox</a>.</p>';
$string['beforeenddate'] = 'This forum closes for new posts on {$a}.';
$string['beforeenddatecapable'] = 'This forum closes for new student posts on {$a}.';
$string['beforestartdate'] = 'You can read any posts within this forum, but not submit your own
posts. This forum opens for posting on {$a}.';
$string['beforestartdatecapable'] = 'Students can read any posts within this forum, but not submit
their own posts until {$a}. You have access to submit posts before this time.';
$string['canpostanon'] = 'Enable anonymous moderator posts';
$string['canpostanon_help'] = 'Allows users that have postanon capability to make their post anonymous by hiding their name from students.';
$string['choosefile'] = '1. Choose file';
$string['clearflag'] = 'Remove flag';
$string['clicktoadd'] = '2. Add it';
$string['collapseall'] = 'Collapse all posts';
$string['completiondiscussions'] = 'User must create discussions:';
$string['completiondiscussionsgroup'] = 'Require discussions';
$string['completiondiscussionsgroup_help'] = 'If ticked, the forum will be marked complete for a
student once they have started the required number of new discussions (and met any other
conditions).';
$string['completionposts'] = 'User must post discussions or replies:';
$string['completionpostsgroup'] = 'Require posts';
$string['completionpostsgroup_help'] = 'If ticked, the forum will be marked complete for a student
once they have created the required number of discussions/replies, counting each discussion or
reply as one (and met any other conditions).';
$string['completionreplies'] = 'User must post replies:';
$string['completionrepliesgroup'] = 'Require replies';
$string['completionrepliesgroup_help'] = 'If ticked, the forum will be marked complete for a
student once they have made the required number of replies to existing discussions (and met any
other conditions).';
$string['configattachmentmaxbytes'] = 'Default maximum size for all forum attachments on the site
(subject to course limits and other local settings)';
$string['configdiscussionsperpage'] = 'Maximum number of discussions shown in a forum per page';
$string['configdonotmailafter'] = 'To prevent causing a mail flood if the server cron does not run
for a time, the forum will not send out emails for posts that are older than this many hours.';
$string['configenableadvanced'] = 'This option enables advanced forum features which may be
unnecessarily complex for many installations. Currently, this just enables forum sharing, but we might add more later.';
$string['configenablerssfeeds'] = 'This switch will enable the possibility of RSS feeds for all
forums.  You will still need to turn feeds on manually in the settings for each forum, or below.';
$string['configfeeditems'] = 'Number of recent messages that are included in a feed.';
$string['configfeedtype'] = 'Select the information to include in all forum RSS feeds.';
$string['confighousekeepingstarthour'] = 'Archiving tasks, such as deleting old discussions, will
begin from this hour each day.';
$string['confighousekeepingstophour'] = 'Archiving tasks will stop on this hour.';
$string['configpermanentdeletion'] = 'After this time period, deleted posts and old versions of
edited posts are permanently wiped from the database.';
$string['configreadafterdays'] = 'After this number of days, posts are considered to have been read
by all users.';
$string['configreplytouser'] = 'When a forum post is mailed out, should it contain the user\'s
email address so that recipients can reply personally rather than via the forum? Even if set to
\'Yes\' users can choose in their profile to keep their email address secret.';
$string['configreportunacceptable'] = 'This email address is for reporting offensive post from
ForumNG at site level. If this email is left blank, then the alert function will be switched off
unless it have been turned on at the forum level.';
$string['configshowidnumber'] = 'Include ID numbers in reports related to the
forum, which may be seen by moderators [but not ordinary students]';
$string['configshowusername'] = 'Include usernames in reports related to the
forum, which may be seen by moderators [but not ordinary students]';
$string['configsubscription'] = 'Control email subscription options on all forums across the site.';
$string['configtrackreadposts'] = 'Set to \'yes\' if you want to track read/unread for each user.';
$string['configusebcc'] = 'Leave this value at 0 to use Moodle default mail handling (safest). Set
to a number (e.g. 50)  to group forum emails together using the BCC header so that Moodle only has
to send a single email which your mail server delivers to many subscribers. This can improve
performance of email in forum cron, but does not have some features of standard Moodle email such
as charset options and bounce handling.';
$string['confirmbulkunsubscribe'] = 'Are you sure you want to unsubscribe the users in the list
below? (This cannot be undone.)';
$string['confirmdelete'] = 'Are you sure you want to delete this post?';
$string['confirmdeletediscuss'] = 'Delete discussion';
$string['confirmdeletedraft'] = 'Are you sure you want to delete this draft post (shown below)?';
$string['confirmdelete_notdiscussion'] = 'Deleting this post will not delete the discussion. If
you want to delete the discussion, use the controls at bottom of the discussion page.';
$string['confirmselection'] = 'Confirm selection';
$string['confirmundelete'] = 'Are you sure you want to undelete this post?';
$string['convert_hide'] = 'Leave created forums hidden';
$string['convert_info'] = 'The conversion process can work on one or more old-style forums; at
the moment, only \'general\' forums are supported, not the other forum types. Use the Ctrl key
to select multiple forums from the list if required.';
$string['convert_newforum'] = 'new forum';
$string['convert_nodata'] = 'Do not include user data (posts, subscriptions, etc.)';
$string['convert_noforums'] = 'There are no old forums on this course to convert.';
$string['convert_noneselected'] = 'No forums selected for conversion! Please select one or more
forums.';
$string['convert_process_assignments'] = 'Updating role assignments...';
$string['convert_process_complete'] = 'Conversion complete in {$a->seconds}s (view {$a->link}).';
$string['convert_process_dashboard'] = 'Converting dashboard favourites...';
$string['convert_process_dashboard_done'] = 'done (OK {$a->yay}, failed {$a->nay}).';
$string['convert_process_discussions'] = 'Converting discussions...';
$string['convert_process_init'] = 'Creating forum structure...';
$string['convert_process_overrides'] = 'Updating role overrides...';
$string['convert_process_search'] = 'Regenerating search data...';
$string['convert_process_show'] = 'Making forum visible...';
$string['convert_process_state_done'] = 'done.';
$string['convert_process_subscriptions_initial'] = 'Converting initial subscriptions...';
$string['convert_process_subscriptions_normal'] = 'Converting normal subscriptions...';
$string['convert_process_update_subscriptions'] = 'Converting to group subscriptions...';
$string['convert_title'] = 'Convert forums';
$string['convert_warning'] = '<p>When you click Convert, the selected forums will be converted.
This includes all posts and
discussions, and may take some time. Forums will be unavailable during conversion.</p><ul>
<li>Old forums being converted are hidden as soon as the conversion process for
that forum begins. This ensures that no new messages are posted and
\'missed out\' of the conversion.</li>
<li>New forums being created are initially hidden, and revealed only once the
conversion process for that forum is complete.</li>
</ul>';
$string['copytoself'] = 'Send a copy to yourself';
$string['createdbymoderator'] = 'This is a post created by moderator {$a} with their name hidden from students.';
$string['crondebug'] = 'Cron debug output';
$string['crondebugdesc'] = 'FOR TESTING PUPOSES ONLY -- Tick to include debugging output in the
cron logs';
$string['currentpost'] = 'Current version of post';
$string['date_asc'] = 'oldest first';
$string['date_desc'] = 'recent first';
$string['daterangefrom'] = 'Date range from';
$string['daterangefrom_help'] = 'Use the dates to restrict your search to only include posts
within the given time range.

If you don&rsquo;t specify dates, posts from any date will be included in the results.';
$string['daterangemismatch'] = 'To date is before From date.';
$string['daterangeto'] = 'Date range to';
$string['delete'] = 'Delete<span class=\'accesshide\'> post {$a}</span>';
$string['deleteandemail'] = 'Delete and email author';
$string['deleteattachments'] = 'Delete existing attachments';
$string['deletedbyauthor'] = 'This post was deleted by the author on {$a}.';
$string['deletedbymoderator'] = 'This post was deleted by a moderator on {$a}.';
$string['deletedbyuser'] = 'This post was deleted by {$a->user} on {$a->date}.';
$string['deletedforumpost'] = 'Your post has been deleted';
$string['deletedpost'] = 'Deleted post.';
$string['deletedraft'] = 'Delete draft post';
$string['deleteemailpostbutton'] = 'Delete and email';
$string['deletepermanently'] = 'Delete permanently';
$string['deletepost'] = 'Delete post: {$a}';
$string['deletepostbutton'] = 'Delete';
$string['digestmailheader'] = 'This is your daily digest of new posts from the {$a->sitename}
forums. To change your forum email preferences, go to {$a->userprefs}.';
$string['digestmailprefs'] = 'your user profile';
$string['digestmailsubject'] = '{$a}: forum digest';
$string['directlink'] = 'Permalink<span class=\'accesshide\'> to post {$a}</span>';
$string['directlinktitle'] = 'Direct link to this post';
$string['disallowsubscribe'] = 'Subscriptions are not permitted';
$string['discussion'] = 'Discussion';
$string['discussionoptions'] = 'Discussion options';
$string['discussions'] = 'Discussions';
$string['discussionsperpage'] = 'Discussions per page';
$string['discussionsunread'] = 'Discussions (unread)';
$string['displayperiod'] = 'Display period';
$string['displayperiod_help'] = 'You can hide this discussion from students until, or after, a
certain date.

While hidden, students do not see the discussion at all. For moderators, it shows on the
discussion list in grey and with a clock icon.';
$string['displayversion'] = 'ForumNG version: <strong>{$a}</strong>';
$string['donotmailafter'] = 'Do not mail after (hours)';
$string['draft'] = 'Draft';
$string['draft_cannotreply'] = '<p>It is not currently possible to add a reply for the post that
your draft relates to. {$a}</p><p>You can use the X button beside this draft on the main forum
page to see the full text of your draft (so you can copy and paste it somewhere else) and to
delete it.</p>';
$string['draftexists'] = 'A draft version of this post ({$a}) has been saved. If you don\'t finish
the post now, you can retrieve the draft from the main page of this forum.';
$string['draft_inreplyto'] = '(reply to {$a})';
$string['draft_mismatch'] = 'Error accessing draft post (either it does not belong to you, or is
not part of the required disussion).';
$string['draft_newdiscussion'] = '(new discussion)';
$string['draft_noedit'] = 'The draft feature cannot be used when editing posts.';
$string['drafts'] = 'Unfinished drafts';
$string['drafts_help'] = 'When you save a post as draft, it appears on this list. Click on the
draft to resume working on it.

If you want to delete the draft, click the delete icon next to it. There is a confirmation screen.

In some cases it may not be possible to continue your draft (for example if it is in reply to a
discussion which has since been deleted). In this situation, you can retrieve the contents of
your draft by clicking the delete icon.';
$string['edit'] = 'Edit<span class=\'accesshide\'> post {$a}</span>';
$string['editbyother'] = 'Edited by {$a->name} on {$a->date}';
$string['editbyself'] = 'Edited by the author on {$a}';
$string['editdiscussionoptions'] = 'Edit discussion options: {$a}';
$string['editedforumpost'] = 'Your post has been edited';
$string['editlimited'] = 'Warning: You must save any changes to this post before {$a}. After that
time you will no longer be allowed to edit the post.';
$string['edit_locked'] = 'This discussion is currently locked.';
$string['edit_nopermission'] = 'You don\'t have permission to edit this kind of post.';
$string['edit_notcurrentpost'] = 'You cannot edit deleted posts or previous post versions.';
$string['edit_notdeleted'] = 'You cannot undelete a post that isn\'t deleted.';
$string['edit_notlocked'] = 'This discussion is not currently locked.';
$string['edit_notyours'] = 'You cannot edit somebody else\'s post.';
$string['editpost'] = 'Edit post: {$a}';
$string['edit_readonly'] = 'This forum is currently read-only so posts cannot be edited.';
$string['edit_rootpost'] = 'This action cannot apply to a post that starts a discussion.';
$string['edit_timeout'] = 'You are no longer permitted to edit this post; the permitted editing
time has run out.';
$string['edit_wronggroup'] = 'You cannot make changes to posts outside your group.';
$string['emailauthor'] = 'Email author';
$string['emailauthor_help'] = 'Send an email to the post\'s author informing them that you have edited their post';
$string['emailcontenthtml'] = 'This is a notification to advise you that your forum post with the
 following details has been deleted by \'{$a->firstname} {$a->lastname}\':<br />
<br />
Subject: {$a->subject}<br />
Forum: {$a->forum}<br />
Module: {$a->course}<br/>
<br/>
<a href="{$a->deleteurl}" title="view deleted post">View the discussion</a>';
$string['emailcontentplain'] = 'This is a notification to advise you that your forum post with the
 following details has been deleted by \'{$a->firstname} {$a->lastname}\':

Subject: {$a->subject}
Forum: {$a->forum}
Module: {$a->course}

To view the discussion visit {$a->deleteurl}';
$string['emaileditedcontenthtml'] = 'This is a notification to advise you that your forum post with the
following details has been edited by \'{$a->editinguser}\':<br />
<br />
Subject: {$a->subject}<br />
Forum: {$a->forum}<br />
Module: {$a->course}<br/>
<br/>
<a href="{$a->editurl}" title="view deleted post">View the discussion</a>';
$string['emailerror'] = 'There was an error sending the email';
$string['emailmessage'] = 'Message';
$string['enableadvanced'] = 'Enable advanced features';
$string['enablelimit'] = 'Limit user posting';
$string['enablelimit_help'] = 'This option limits discussions and replies made by students
(specifically, any users who do not have the <tt>mod/forumng:ignorethrottling</tt> capability).

When a student is only permitted 3 more posts, a warning displays in the post form. After their
limit runs out, the system displays the time at which they&rsquo;ll be able to post again.';
$string['enableratings'] = 'Allow posts to be rated';
$string['enableratings_help'] = 'If enabled, forum posts can be given ratings using a numeric or
defined Moodle scale. One or more people can rate the post and the displayed rating is the average
(mean) of those ratings.

If you use a numeric scale up to 5 (or fewer) then a nice &lsquo;star&rsquo; display is used.
Otherwise it&rsquo;s a dropdown.

The capabilities system controls who can rate posts and see ratings. By default, only teachers can
rate posts, and students can only see ratings on their own posts.';
$string['error_cannotchangediscussionsubscription'] = 'You are not permitted to subscribe to, or
unsubscribe from, this discussion.';
$string['error_cannotchangegroupsubscription'] = 'You are not permitted to subscribe to, or
unsubscribe from your selected group.';
$string['error_cannotchangesubscription'] = 'You are not permitted to subscribe to, or unsubscribe
from, this forum.';
$string['error_cannotmanagediscussion'] = 'You do not have permission to manage this discussion.';
$string['error_cannotmarkread'] = 'You are not permitted to mark discussions as read in this
forum.';
$string['error_cannotsubscribetogroup'] = 'You are not permitted to subscribe to your selected
group.';
$string['error_cannotunsubscribefromgroup'] = 'You are not permitted to unsubscribe from your
selected group.';
$string['error_cannotviewdiscussion'] = 'You do not have permission to view this discussion.';
$string['error_draftnotfound'] = 'Unable to find draft message. The draft may have already been posted or deleted.';
$string['error_duplicate'] = 'You have already created a post using the previous form. (This error
sometimes occurs if you click the post button twice. In that case, your post has probably been
saved.)';
$string['error_exception'] = 'A forum error occurred. Please try again later, or try something
else.<div class=\'forumng-errormessage\'>Error message: {$a}</div>';
$string['error_feedlogin'] = 'Error completing user login';
$string['error_fileexception'] = 'A file processing error occurred. This is likely to be caused by
system problems. You may wish to try again later.';
$string['errorfindinglastpost'] = 'Error recalculating last post (database inconsistent?)';
$string['error_forwardemail'] = 'There was an error sending email to <strong>{$a}</strong>. Email
could not be sent.';
$string['errorinvalidforum'] = 'The target forum for archiving old discussions no longer exists.
Please choose a different forum.';
$string['error_invalidsubscriptionrequest'] = 'Your subscription request is invalid.';
$string['error_makebig'] = 'The course only has {$a->users} users, but you\'ve asked for
{$a->readusers} to read each discussion. Create some more users.';
$string['error_markreadparams'] = 'Parameters incorrect: requires either id or d.';
$string['error_nopermission'] = 'You are not permitted to carry out this request.';
$string['error_nosharedforum'] = 'Forum <strong>{$a->name}</strong>: Could not restore as shared
forum; ID number {$a->idnumber} not found. Restored forum is an independent forum.';
$string['error_notwhensharing'] = 'This option is not available when sharing the forum.';
$string['error_portfoliosave'] = 'An error occurred while saving this data to MyStuff.';
$string['error_ratingrequired'] = 'Grading chosen to be based on ratings, but ratings not enabled';
$string['error_ratingthreshold'] = 'Rating threshold must be a positive number.';
$string['error_sendalert'] = 'There was an error sending your report to {$a}.
Report could not be sent.';
$string['error_sharingidnumbernotfound'] = 'When using a shared forum, you must enter an ID number
that exactly matches one previously entered in a forum that is shared.';
$string['error_sharinginuse'] = 'You cannot turn sharing off for this forum because there are
already forums that share it. If necessary, delete these other forums first.';
$string['error_sharingrequiresidnumber'] = 'When sharing the forum, you must enter an ID number
which is unique across the entire system.';
$string['error_subscribeparams'] = 'Parameters incorrect: requires either id or course or d.';
$string['error_system'] = 'A system error occurred: {$a}';
$string['error_unknownsort'] = 'Unknown sort option.';
$string['existingattachments'] = 'Existing attachments';
$string['expand'] = 'Expand<span class=\'accesshide\'> post {$a}</span>';
$string['expandall'] = 'Expand all posts';
$string['exportedtitle'] = 'Forum discussion &lsquo;{$a->subject}&rsquo; exported on {$a->date}';
$string['exportword'] = 'Export to Word';
$string['externaldashboardadd'] = 'Add forum to dashboard';
$string['externaldashboardremove'] = 'Remove forum from dashboard';
$string['extra_emails'] = 'Email address of other recipients';
$string['extra_emails_help'] = 'Enter one or more email address(es) separated by spaces or semicolons.';
$string['feeditems'] = 'Recent items in feeds';
$string['feeditems_help'] = 'The number of items included in the Atom/RSS feeds. If this is set
low, then users who don&rsquo;t check the feed frequently might miss some messages.';
$string['feed_nopermission'] = 'You do not have permission to access this feed.';
$string['feed_notavailable'] = 'This feed is not available.';
$string['feeds'] = 'Feeds';
$string['feedtype'] = 'Feed contents';
$string['feedtype_all_posts'] = 'Contains all posts';
$string['feedtype_discussions'] = 'Contains discussions only';
$string['feedtype_help'] = 'If enabled, users can subscribe to the forum using an Atom or RSS feed
reader. You can set the feed to include only top-level discussions and not replies, or to include
all posts.';
$string['feedtype_none'] = 'Feed disabled';
$string['flaggedposts'] = 'Flagged posts';
$string['flaggedposts_help'] = 'Flagged posts appear in this list. To jump to a flagged post,
click on it.

To remove the flag from a post, click on the flag icon (here or in the post).';
$string['flaggedpostslink'] = '{$a} flagged posts';
$string['flagoff'] = 'Not flagged';
$string['flagon'] = 'You have flagged this post';
$string['forbidattachments'] = 'Attachments not permitted';
$string['forcesubscribe'] = 'Force everyone to be (and stay) subscribed';
$string['forum'] = 'Forum';
$string['forumintro'] = 'Forum introduction';
$string['forumname'] = 'Forum name';
$string['forumng:addinstance'] = 'Add a new ForumNG';
$string['forumng:copydiscussion'] = 'Copy discussion';
$string['forumng:createattachment'] = 'Create attachments';
$string['forumng:deleteanypost'] = 'Delete any post';
$string['forumng:editanypost'] = 'Edit any post';
$string['forumng:forwardposts'] = 'Forward posts';
$string['forumng:grade'] = 'Grade posts';
$string['forumng:ignorepostlimits'] = 'Ignore post count limits';
$string['forumng:mailnow'] = 'Mail posts before editing timeout';
$string['forumng:managediscussions'] = 'Manage discussion options';
$string['forumng:managesubscriptions'] = 'Manage subscriptions';
$string['forumng:movediscussions'] = 'Move discussions';
$string['forumng:postanon'] = 'Post as anonymous moderator';
$string['forumng:postasmoderator'] = 'Indentify self as moderator in post';
$string['forumng:rate'] = 'Rate posts';
$string['forumng:replypost'] = 'Reply to posts';
$string['forumng:setimportant'] = 'Mark posts as important';
$string['forumng:splitdiscussions'] = 'Split discussions';
$string['forumng:startdiscussion'] = 'Start new discussions';
$string['forumng:view'] = 'View forum';
$string['forumng:viewallposts'] = 'View hidden and deleted posts';
$string['forumng:viewanyrating'] = 'View any ratings';
$string['forumng:viewdiscussion'] = 'View discussions';
$string['forumng:viewrating'] = 'View ratings of own posts';
$string['forumng:viewreadinfo'] = 'See who has read a post';
$string['forumng:viewsubscribers'] = 'View subscribers';
$string['forums'] = 'Forums';
$string['forumtype'] = 'Forum type';
$string['forumtype_help'] = 'Different types of forum are available for specific purposes or
teaching methods. The standard forum type is appropriate for all normal use.';
$string['forumtype_link'] = 'mod/forumng/forumtypes';
$string['from'] = 'from: {$a}';
$string['grade'] = 'Grade';
$string['grading'] = 'Grade';
$string['grading_average'] = 'Average of ratings';
$string['grading_count'] = 'Count of ratings';
$string['grading_help'] = 'If you select this option, a grade for this forum will be added to the
course gradebook and calculated automatically. Leave this off for a non-assessed forum, or one you
plan to assess manually.

The different ways to calculate grading are fairly self-explanatory; in each case, the grade for
each student is calculated based on all ratings for all posts they have made. Grades are limited to
the scale; for example if the scale is 0-3, the grading method is set to &lsquo;count&rsquo; and
the student&rsquo;s posts have received 17 ratings, their grade will be 3.';
$string['grading_max'] = 'Maximum rating';
$string['grading_min'] = 'Minimum rating';
$string['grading_none'] = 'No grade';
$string['gradingscale'] = 'Grading scale';
$string['grading_sum'] = 'Sum of ratings';
$string['group'] = 'Group';
$string['hasunreadposts'] = '(Unread posts)';
$string['hidelater'] = 'Don\'t show these instructions again';
$string['history'] = 'History';
$string['historypage'] = 'History: {$a}';
$string['housekeepingstarthour'] = 'Start hour of archiving';
$string['housekeepingstophour'] = 'Stop hour of archiving';
$string['important'] = 'Important post';
$string['inappropriatedateortime'] = 'From date cannot be after present.';
$string['includepost'] = 'Include post';
$string['initialsubscribe'] = 'Automatically subscribe everyone';
$string['inreplyto'] = 'In reply to';
$string['invalidalert'] = 'You need to specify the reason for reporting this post.';
$string['invalidalertcheckbox'] = 'You need to tick at least one of the boxes.';
$string['invalidemail'] = 'This email address is not valid. Please enter a single email address.';
$string['invalidemails'] = 'This email address is not valid. Please enter one or more email
addresses, separated by spaces or semicolons.';
$string['invalidforum'] = 'This forum no longer exists';
$string['js_clicktoclearrating'] = 'Click to remove your rating.';
$string['js_clicktosetrating'] = 'Click to give this post # stars.';
$string['js_clicktosetrating1'] = 'Click to give this post 1 star.';
$string['jserr_alter'] = 'There was an error altering the post.

Reload this page and try again.';
$string['jserr_attachments'] = 'There was an error loading the attachment editor.

Reload this page and try again.';
$string['jserr_load'] = 'There was an error obtaining the post.

Reload this page and try again.';
$string['jserr_save'] = 'There was an error saving the post.

Copy the text into another program to make sure you don\'t lose it, then reload this page and try again.';
$string['js_nopublicrating'] = 'Not yet rated.';
$string['js_nouserrating'] = 'Not rated by you.';
$string['js_nratings'] = '(# ratings)';
$string['js_nratings1'] = '(1 rating)';
$string['js_outof'] = '(Out of #.)';
$string['js_publicrating'] = 'Average rating: #.';
$string['js_userrating'] = 'Your rating: #.';
$string['jumpnext'] = 'Next unread';
$string['jumpparent'] = 'Parent';
$string['jumpprevious'] = 'Previous unread';
$string['jumppreviousboth'] = 'previous';
$string['jumpto'] = 'Jump to:';
$string['lastpost'] = 'Last post';
$string['limitposts'] = 'Limit posts';
$string['lockedtitle'] = 'This discussion is now closed';
$string['mailnow'] = 'Mail soon';
$string['mailnow_help'] = 'Send your post to email subscribers more quickly.

Unless you choose this option, the system waits for some time before sending the post so that any edits you might make can be included in the email.';
$string['managepostalerts'] = 'Manage reported post alerts';
$string['markdiscussionread'] = 'Mark all posts in this discussion read.';
$string['message'] = 'Message';
$string['moderator'] = 'Moderator';
$string['modulename'] = 'ForumNG';
$string['modulename_help'] = 'ForumNG is a replacement for standard Moodle forum with most of
the same features plus additional ones and a more dynamic user interface.

NG stands for \'Next Generation\'.';
$string['modulenameplural'] = 'ForumNGs';
$string['move_nogroups'] = 'You do not have access to any groups in the selected target forum.';
$string['move_notselected'] = 'You must select a target forum from the dropdown before clicking
the Move button.';
$string['newdiscussion'] = 'New discussion';
$string['nextresults'] = 'Find more results';
$string['nodiscussions'] = 'There are no discussions in this forum yet.';
$string['noguestsubscribe'] = 'Sorry, guests are not allowed to subscribe to receive forum postings
by email.';
$string['nosearchcriteria'] = 'No search criteria. Please use one or more of the criteria below.';
$string['nosubscribers'] = 'There are no subscribers yet for this forum.';
$string['nosubscribersgroup'] = 'Nobody in the group is subscribed to this forum yet.';
$string['notext'] = '(no text)';
$string['nothingfound'] = 'Could not find any matching results. Try using different query.';
$string['nothingtodisplay'] = '<h3>Nothing to display</h3>';
$string['numberofdiscussion'] = '{$a} discussion';
$string['numberofdiscussions'] = '{$a} discussions';
$string['numeric_asc'] = 'lowest first';
$string['numeric_desc'] = 'highest first';
$string['numposts'] = '{$a} post(s)';
$string['offerconvert'] = 'If you want to create a new ForumNG that is a copy of an old-style
forum, do not use this form. Instead, <a href=\'{$a}\'>convert your forum</a>.';
$string['olderversions'] = 'Older versions (most recent first)';
$string['onemonth'] = '1 month';
$string['optionalsubject'] = 'Change subject (optional)';
$string['partialsubscribed'] = 'Partial';
$string['pastediscussion'] = 'Paste discussion';
$string['perforumoption'] = 'Configured separately for each forum';
$string['permanentdeletion'] = 'Wipe unused data after';
$string['permanentdeletion_never'] = 'Never (do not wipe unused data)';
$string['permanentdeletion_soon'] = 'Wipe as soon as possible';
$string['pluginadministration'] = 'ForumNG administration';
$string['pluginname'] = 'ForumNG';
$string['post'] = 'Post';
$string['postby'] = '(by {$a})';
$string['postdiscussion'] = 'Post discussion';
$string['postedasmoderator'] = 'Posted as moderator';
$string['postedasmoderator_help'] = 'Search for posts that have been identified as being created by a moderator';
$string['postinfo_deleted'] = 'deleted';
$string['postinfo_short'] = 'summarised';
$string['postinfo_unread'] = 'unread';
$string['postingfrom'] = 'Posting only allowed from';
$string['postinguntil'] = 'Posting only allowed until';
$string['postmailinfo'] = 'This is a copy of a message posted on the {$a} website.

To add your reply via the website, click on this link:';
$string['postnum'] = 'Post {$a->num}';
$string['postnumreply'] = 'Post {$a->num}{$a->info} in reply to {$a->parent}';
$string['postreply'] = 'Post reply';
$string['posts'] = 'Posts';
$string['postsper'] = 'posts per';
$string['previousresults'] = 'Back to results {$a}';
$string['quotaleft_plural'] = 'You may only make <strong>{$a->posts}</strong> more posts in the
current {$a->period}.';
$string['quotaleft_singular'] = 'You may only make <strong>{$a->posts}</strong> more post in the
current {$a->period}.';
$string['rate'] = 'Rate';
$string['rate_nopermission'] = 'You do not have permission to rate this post ({$a}).';
$string['ratingfrom'] = 'Rate only posts from';
$string['ratings'] = 'Ratings';
$string['ratingthreshold'] = 'Required ratings';
$string['ratingthreshold_help'] = 'If you set this option to 3, then the rating for a post will
not be shown until at least 3 people have rated it.

This can help reduce the effect of a single rating on the average.';
$string['ratingtime'] = 'Restrict ratings to posts with dates in this range:';
$string['ratinguntil'] = 'Rate only posts until';
$string['re'] = 'Re: {$a}';
$string['readafterdays'] = 'Read after days';
$string['readdata'] = 'Read data';
$string['removeolddiscussions'] = 'Manage old discussions';
$string['removeolddiscussionsafter'] = 'Manage old discussions after';
$string['removeolddiscussionsdefault'] = 'Never remove';
$string['removeolddiscussions_help'] = 'The system can automatically remove discussions if they
have not had any new replies for a certain length of time.';
$string['replies'] = 'Replies';
$string['reply'] = 'Reply<span class=\'accesshide\'> to post {$a}</span>';
$string['reply_missing'] = 'You cannot reply because the system can&rsquo;t find the post.';
$string['reply_nopermission'] = 'You don\'t have permission to reply here.';
$string['reply_notcurrentpost'] = 'You cannot reply to deleted posts or previous post versions.';
$string['reply_postquota'] = 'You can\'t reply to posts at the moment because you have reached the
posting limit.';
$string['reply_readonly'] = 'This forum is currently read-only so new replies cannot be added.';
$string['replytopost'] = 'Reply to post: {$a}';
$string['replytouser'] = 'Use email address in reply';
$string['reply_typelimit'] = 'Because of the type of this forum, you are not currently allowed to
reply to this post.';
$string['reply_wronggroup'] = 'You cannot reply to posts in this discussion because you are not in
the right group.';
$string['reportingemail'] = 'Email for reporting offensive posts';
$string['reportingemail_help'] = 'If this email address is supplied, then a Report link appears
next to each post. Users can click the link to report offensive posts. The information will be sent to this address.

If this email is left blank then the Report feature will not be shown (unless a site-level
reporting  address has been supplied).

More than one email address can be added so long as they are separated by a semi-colon';
$string['reportunacceptable'] = 'Email for reporting offensive post';
$string['saveallratings'] = 'Save all ratings';
$string['savedposts_all'] = '{$a}';
$string['savedposts_all_tag'] = 'Forum discussion';
$string['savedposts_one'] = '{$a->name}: {$a->subject}';
$string['savedposts_one_tag'] = 'Forum post';
$string['savedposts_original'] = 'Original source discussion';
$string['savedposts_selected'] = '{$a} (selected posts)';
$string['savedposts_selected_tag'] = 'Forum posts';
$string['savedraft'] = 'Save as draft';
$string['savedtoportfolio'] = 'The selected information has been saved to MyStuff.';
$string['savetoportfolio'] = 'Save to MyStuff';
$string['searchallforums'] = 'Search all forums';
$string['searchresults'] = 'Search results: <strong>{$a}</strong>';
$string['searchthisforum'] = 'Search this forum';
$string['searchthisforum_help'] = 'Type your search term and press Enter or click the button.

To search for exact phrases use quote marks.

To exclude a word insert a hyphen immediately before the word.

Example: the search term <tt>picasso -sculpture &quot;early works&quot;</tt> will return results for &lsquo;picasso&rsquo; or the phrase &lsquo;early works&rsquo; but will exclude items containing &lsquo;sculpture&rsquo;.

To search by author or date use Advanced search. Access this directly by not entering a search term.';
$string['searchthisforumlink'] = 'Search this forum';
$string['searchthisforumlink_help'] = 'Type your search term and press Enter or click the button.

To search for exact phrases use quote marks.

To exclude a word insert a hyphen immediately before the word.

Example: the search term <tt>picasso -sculpture &quot;early works&quot;</tt> will return results for &lsquo;picasso&rsquo; or the phrase &lsquo;early works&rsquo; but will exclude items containing &lsquo;sculpture&rsquo;.

To search by author or date, click &lsquo;More options&rsquo;.';
$string['searchtime'] = 'Search time: {$a} s';
$string['search_update_count'] = '{$a} forums to process.';
$string['selectdiscintro'] = 'Tick the box beside each discussion you want to include. When you&rsquo;re done,
scroll to the bottom and click &lsquo;Confirm selection&rsquo;.';
$string['selectedposts'] = 'Selected posts';
$string['selectintro'] = 'Tick the box beside each post you want to include. When you&rsquo;re done,
scroll to the bottom and click &lsquo;Confirm selection&rsquo;.';
$string['selectlabel'] = 'Select post {$a}';
$string['selectorall'] = 'Do you want to include the entire discussion, or only selected posts?';
$string['selectoralldisc'] = 'All discussions shown';
$string['selectordiscall'] = 'Do you want to include all discussions listed on this page, or only selected discussions?';
$string['selectorselectdisc'] = 'Select discussion';
$string['selectorselecteddisc'] = 'Selected discussions';
$string['sendanddelete'] = 'Send and delete';
$string['set'] = 'Set';
$string['setflag'] = 'Flag this post for future reference';
$string['setimportant'] = 'Mark posts as important';
$string['shared'] = 'Allow forum to be shared';
$string['shared_help'] = 'Tick this box, and set the ID number field below, to enable this forum
to be shared.

If you prefix the ID number with the prefix of AUTO_ it means that any clone forums will automatically look
for the latest version of a master forum on restore.

If the forum is backed up and restored if not unique it will add _1 to end
(if already has _number at end then increment that number e.g. _2).

This forum will become the original forum. You can then create one or more copies of this forum
by choosing <strong>Use existing shared forum</strong>, and typing in the same ID number, when
creating each copy.';
$string['sharedinfo'] = 'This is a shared forum. The access settings here are not shared, and
apply only to students who access the shared forum from this particular course. If you want to
edit other settings for the forum, please <a href=\'{$a}\'>edit the original forum setttings</a>
instead.';
$string['sharedviewinfoclone'] = '<strong>This is a shared forum</strong>. The
<a href=\'{$a->url}\'>original forum</a> is in {$a->shortname}.';
$string['sharedviewinfolist'] = 'It is included in the following: {$a}.';
$string['sharedviewinfonone'] = 'It is not currently included in any other course.';
$string['sharedviewinfooriginal'] = '<strong>This forum is shared</strong> under the name
<strong>{$a}</strong> for use in other courses.';
$string['sharing'] = 'Forum sharing';
$string['showidnumber'] = 'Show ID numbers';
$string['showusername'] = 'Show usernames';
$string['skipstickydiscussions'] = 'Skip sticky discussions';
$string['skiptofirstunread'] = 'Skip to first unread post';
$string['sortby'] = 'Sort by {$a}';
$string['sorted'] = 'sorted {$a}';
$string['split'] = 'Split<span class=\'accesshide\'> post {$a}</span>';
$string['splitinfo'] = 'Splitting this post will remove it, and all its replies, from the current
discussion. A new discussion will be created (shown below).';
$string['splitpost'] = 'Split post: {$a}';
$string['splitpostbutton'] = 'Split post as new discussion';
$string['startdiscussion_groupaccess'] = 'You don\'t have permission to start a new discussion in
this group.';
$string['startdiscussion_nopermission'] = 'You don\'t have permission to start a new discussion
here.';
$string['startdiscussion_postquota'] = 'You can\'t start a new discussion at the moment because you
have reached the posting limit.';
$string['startedby'] = 'Started by';
$string['sticky'] = 'Sticky discussion?';
$string['sticky_help'] = 'This option can make the discussion stay on top of the list, even
after newer discussions are posted.

Sticky discussions are displayed with an up-arrow icon on the discussion list. You can have more
than one sticky discussion.';
$string['sticky_no'] = 'Discussion is sorted normally';
$string['sticky_yes'] = 'Discussion stays on top of list';
$string['studyadvice_noquestions'] = 'Nobody has started any discussions yet in this study advice
forum.';
$string['studyadvice_noyourquestions'] = 'You have not yet started any discussions in this study
advice forum.';
$string['subject'] = 'Subject';
$string['subscribe'] = 'Subscribe to this forum';
$string['subscribe_already'] = 'You are already subscribed.';
$string['subscribe_already_group'] = 'You are already subscribed to this group.';
$string['subscribe_confirm'] = 'You have been subscribed.';
$string['subscribe_confirm_group'] = 'You have been subscribed to the group.';
$string['subscribed'] = 'Subscribed';
$string['subscribeddiscussionall'] = 'All';
$string['subscribediscussion'] = 'Subscribe to discussion';
$string['subscribedthisgroup'] = 'This group';
$string['subscribegroup'] = 'Subscribe to this group';
$string['subscribelong'] = 'Subscribe to whole forum';
$string['subscribers'] = 'Subscribers';
$string['subscribers_nopermission'] = 'You do not have permission to view the subscriber list.';
$string['subscribeshort'] = 'Subscribe';
$string['subscribestart'] = 'Send me email copies of posts to this forum';
$string['subscribestate_discussionsubscribed'] = 'You receive messages from this discussion via
email to {$a}.';
$string['subscribestate_discussionunsubscribed'] = 'You do not currently receive messages from this
discussion by email. If you would like to, click &lsquo;Subscribe to discussion&rsquo;.';
$string['subscribestate_forced'] = '(This forum does not allow you to unsubscribe.)';
$string['subscribestate_groups_partiallysubscribed'] = 'You receive messages from some groups in
this forum via email to {$a}.';
$string['subscribestate_no_access'] = 'You do not have access to subscribe to this forum by
email.';
$string['subscribestate_not_permitted'] = 'This forum does not allow email subscription.';
$string['subscribestate_partiallysubscribed'] = 'You receive messages from some discussions in
this forum via email to {$a}.';
$string['subscribestate_partiallysubscribed_thisgroup'] = 'You receive messages from some
discussions in this group via email to {$a}.';
$string['subscribestate_subscribed'] = 'You receive messages from this forum via email to {$a}.';
$string['subscribestate_subscribed_notinallgroup'] = 'Click &lsquo;Unsubscribe&rsquo; to unsubscribe
from the forum.';
$string['subscribestate_subscribed_thisgroup'] = 'You receive messages from this group via email
to {$a}.';
$string['subscribestate_unsubscribed'] = 'You do not currently receive messages from this forum by
email. If you would like to, click &lsquo;Subscribe&rsquo;.';
$string['subscribestate_unsubscribed_thisgroup'] = 'You do not currently receive messages from this
group by email. If you would like to, click &lsquo;Subscribe to this group&rsquo;.';
$string['subscribestop'] = 'I don\'t want email copies of posts to this forum';
$string['subscription'] = 'Subscription';
$string['subscription_forced'] = 'Force everyone to be subscribed';
$string['subscription_help'] = 'You can force everyone to be subscribed, or set them be subscribed
initially; the difference is that in the latter case, they can choose to unsubscribe themselves.

These options include all users (students and staff) who are enrolled on the course. Users who do
not belong to the course (such as administrators) can still optionally subscribe.';
$string['subscription_initially_subscribed'] = 'Everyone is initially subscribed';
$string['subscription_not_permitted'] = 'Subscription is not permitted';
$string['subscription_permitted'] = 'Everyone can choose to be subscribed';
$string['subscriptions'] = 'Subscriptions';
$string['switchto_simple_link'] = 'Switch to simple view.';
$string['switchto_simple_text'] = 'The standard view of this forum does not always work well with
assistive technology. We also provide a simpler view, which still contains all features.';
$string['switchto_standard_link'] = 'Switch to standard view.';
$string['switchto_standard_text'] = 'You are using the simple view of this forum, which should work
better with assistive technology.';
$string['teacher_grades_students'] = 'Teacher grades students';
$string['text_asc'] = 'A-Z';
$string['text_desc'] = 'Z-A';
$string['timeend'] = 'Only show until end';
$string['timestart'] = 'Only show from';
$string['to'] = 'to: {$a}';
$string['trackreadposts'] = 'Track unread posts';
$string['undelete'] = 'Undelete';
$string['undeletepost'] = 'Undelete post: {$a}';
$string['undeletepostbutton'] = 'Undelete post';
$string['unread'] = 'Unread';
$string['unsubscribe'] = 'Unsubscribe from this forum';
$string['unsubscribeall'] = 'Unsubscribe from all forums';
$string['unsubscribe_already'] = 'You are already unsubscribed.';
$string['unsubscribe_already_group'] = 'You are already unsubscribed from this group.';
$string['unsubscribe_confirm'] = 'You have been unsubscribed.';
$string['unsubscribe_confirm_group'] = 'You have been unsubscribed from the group.';
$string['unsubscribediscussion'] = 'Unsubscribe from discussion';
$string['unsubscribegroup'] = 'Unsubscribe from this group';
$string['unsubscribegroup_partial'] = 'Unsubscribe from discussions in this group';
$string['unsubscribelong'] = 'Unsubscribe from the forum';
$string['unsubscribe_nopermission'] = 'You do not have permission to unsubscribe other users.';
$string['unsubscribeselected'] = 'Unsubscribe selected users';
$string['unsubscribeshort'] = 'Unsubscribe';
$string['usebcc'] = 'Send emails with BCC';
$string['useshared'] = 'Clone existing forum';
$string['useshared_help'] = 'If you want to create a clone of an existing forum, use this tickbox
and type the ID number of the original forum (which must allow sharing).

When this is selected, most other options on this form will be ignored because you are not really
creating a new forum, only a link to an existing one. The exception is availability and (manual
only) completion options.';
$string['viewsubscribers'] = 'View subscribers';
$string['withremoveddiscussions'] = 'Action or move discussions to';
$string['withremoveddiscussions_help'] = 'You have three options for managing old discussions:
<ul><li>Delete them permanently; unlike the standard delete feature, these cannot be undeleted.
This option could be used to save space in the database.</li>
<li>Automatically lock (make read-only) them</li>
<li>Move them to another forum; for example, you might have an &lsquo;archive forum&rsquo;.
You can select any forum on the same course.</li>
</ul>';
$string['words'] = 'Search for';
$string['words_help'] = 'Type your search term here.

To search for exact phrases use quote marks.

To exclude a word insert a hyphen immediately before the word.

Example: the search term <tt>picasso -sculpture &quot;early works&quot;</tt> will return results for &lsquo;picasso&rsquo; or the phrase &lsquo;early works&rsquo; but will exclude items containing &lsquo;sculpture&rsquo;.

If you leave this box blank, then all posts that match the author and/or date criteria will be returned, regardless of their content.';
$string['yourrating'] = 'Your rating:';
