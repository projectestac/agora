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
 * Strings for component 'ouwiki', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   ouwiki
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionheading'] = 'Actions';
$string['add'] = 'Add';
$string['addannotation'] = 'Add annotation';
$string['addedbegins'] = '[Added text follows]';
$string['addedends'] = '[End of added text]';
$string['addnewsection'] = 'Add new section to this page';
$string['advice_annotate'] = '<p>Annotate the page below, then click <strong>Save changes</strong>.</p>
<ul>
<li>To annotate click one of the annotation markers and enter the required text.</li>
<li>New and existing annotations can be deleted by removing all the text in the form below.</li>
<li>The numbers in brackets refer to annotations.</li>
</ul>';
$string['advice_diff'] = 'The older version is shown on the
left<span class=\'accesshide\'> under the heading Older version</span>, where
deleted text is highlighted. Added text is indicated in the newer version on
the right<span class=\'accesshide\'> under the heading Newer
version</span>.<span class=\'accesshide\'> Each change is indicated by a pair
of images before and after the added or deleted text, with appropriate
alternative text.</span>';
$string['advice_edit'] = '<p>Edit the page below.</p>
<ul>
<li>Make a link to another page by typing the page name in double square brackets: [[page name]]. The link will become active once you save changes.</li>
<li>To create a new page, first make a link to it in the same way. {$a}</li>
</ul>';
$string['advice_history'] = '<p>The table below displays all changes that have been made to <a href="{$a}">the current page</a>.</p>
<p>You can view old versions or see what changed in a particular version. If you want to compare any two versions, select the relevant checkboxes and click \'Compare selected\'.</p>';
$string['advice_missingpage'] = 'This page is linked to, but has not yet been created.';
$string['advice_missingpages'] = 'These pages are linked to, but have not yet been created.';
$string['advice_viewdeleted'] = 'You are viewing a deleted version of this page.';
$string['advice_viewold'] = 'You are viewing an old version of this page.';
$string['advice_wikirecentchanges_changes'] = '<p>The table below lists all changes to any page on this wiki, beginning with the latest changes. The most recent version of each page is highlighted.</p>
<p>Using the links you can view a page as it looked after a particular change, or see what changed at that moment.</p>';
$string['advice_wikirecentchanges_changes_nohighlight'] = '<p>The table below lists all changes to any page on this wiki, beginning with the latest changes.</p>
<p>Using the links you can view a page as it looked after a particular change, or see what changed at that moment.</p>';
$string['advice_wikirecentchanges_pages'] = '<p>This table shows when each page was added to the wiki, beginning with the most recently-created page.</p>';
$string['ajaxnotenabled'] = 'AJAX not enabled in your profile.';
$string['allowediting_help'] = '<p>
If you enable this option the wiki enters read-only mode until the given date. In read-only mode
users can see pages, navigate between them, view history, and participate in discussions, but they
cannot edit pages.
</p>

<h2>Prevent editing from</h2>

<p>
If you enable this option the wiki enters read-only mode from the given date onwards.
</p>';
$string['annotate'] = 'Annotate';
$string['annotatingpage'] = 'Annotating page';
$string['annotationmarker'] = 'Annotation marker';
$string['annotations'] = 'Annotations';
$string['annotationsystem'] = 'Annotation system';
$string['annotationsystem_help'] = 'Enables the Annotation tab, for users with the appropriate permission..

With this tab you can add inline annotations to wiki pages (for example, teacher comments on student work).';
$string['attachments'] = 'Attachments';
$string['brokenimage'] = '<span class="imgremoved"> Missing image, not included in template. </span>';
$string['cancel'] = 'Cancel';
$string['cannotlockpage'] = 'The page could not be locked, your changes have not been saved.';
$string['changebutton'] = 'Change';
$string['changedby'] = 'Changed by';
$string['changes'] = 'changes';
$string['changesnav'] = 'Changes';
$string['collapseallannotations'] = 'Collapse annotations';
$string['collapseannotation'] = 'Collapse annotation';
$string['compare'] = 'Compare';
$string['compareselected'] = 'Compare selected';
$string['completionedits'] = 'User must make edits:';
$string['completioneditsgroup'] = 'Require edits';
$string['completioneditshelp'] = 'requiring edits to complete';
$string['completion_help'] = '<ul>
<li>
If you choose "Require new pages" then the wiki will be marked as complete for
a user once they have created the specified number of pages. With this option,
users have to create pages from scratch; if somebody else creates the page and
they then edit it, it doesn\'t count.
</li>

<li>
If you choose "Require edits" then the wiki will be marked as complete for a
user once they make a certain number of edits. The user could be editing
lots of pages, or editing the same page lots of times; either counts.
</li>
</ul>

<p>
Note that
writing the first version of a page also counts as an edit, so if you want
somebody to create a page <i>and</i> make at least one edit other than that,
set pages to 1 and edits to 2.
</p>';
$string['completionpages'] = 'User must create new pages:';
$string['completionpagesgroup'] = 'Require new pages';
$string['completionpageshelp'] = 'requiring new pages to complete';
$string['contributions'] = '<strong>{$a->pages}</strong> new page{$a->pagesplural}, <strong>{$a->changes}</strong> other change{$a->changesplural}.';
$string['contributionsbyuser'] = 'Contributions by user';
$string['contributionsgrouplabel'] = 'Group';
$string['countdowntext'] = 'This wiki allows only {$a} minutes for editing. Make your changes and click Save or Cancel before the remaining time (to right) reaches zero.';
$string['countdownurgent'] = 'Please finish or cancel your edit now. If you do not save before time runs out, your changes will be saved automatically.';
$string['create'] = 'Create';
$string['createdbyon'] = 'created by {$a->name} on {$a->date}';
$string['createlinkedwiki'] = 'Creating a new page';
$string['createlinkedwiki_help'] = 'While editing, you can type a link to a page that doesn&rsquo;t exist yet, such as [[Frogs]]. Then save this page and click on the &lsquo;Frogs&rsquo; link to create the new page.

It is also possible to create new pages from the &lsquo;View&rsquo; tab using the &lsquo;Create new page&rsquo; box.';
$string['createnewpage'] = 'Create new page';
$string['createpage'] = 'Create page';
$string['csvdownload'] = 'Download in spreadsheet format (UTF-8 .csv)';
$string['current'] = 'current';
$string['currentversion'] = 'Current version';
$string['currentversionof'] = 'Current version of';
$string['deletedbegins'] = '[Deleted text follows]';
$string['deletedends'] = '[End of deleted text]';
$string['deleteorphanedannotations'] = 'Delete lost annotations';
$string['deleteversionerror'] = 'Error deleting page version';
$string['deleteversionerrorversion'] = 'Cannot delete nonexistent page version';
$string['detail'] = 'detail';
$string['diff_nochanges'] = 'This edit did not make changes to the actual text, so no differences are
highlighted below. There may be changes to appearance.';
$string['diff_someannotations'] = 'This edit did not make changes to the actual text, so no differences are
highlighted below, however annotations have been changed. There may also be changes to appearance.';
$string['displayversion'] = 'OU wiki version: <strong>{$a}</strong>';
$string['downloadspreadsheet'] = 'Download as spreadsheet';
$string['duplicatepagetitle'] = 'The new page title must not be the same as one of the existing page titles.';
$string['editbegin'] = 'Allow editing from';
$string['editbegin_help'] = '<p>If you enable this option the wiki enters read-only mode until the given date. In read-only mode users can see pages, navigate between them, view history, and participate in discussions, but they cannot edit pages.</p>';
$string['editedby'] = 'Edited by {$a}';
$string['editend'] = 'Prevent editing from';
$string['editend_help'] = 'If you enable this option the wiki enters read-only mode from the given date onwards.';
$string['editingpage'] = 'Editing page';
$string['editingsection'] = 'Editing section: {$a}';
$string['editpage'] = 'Edit page';
$string['editsection'] = 'Edit section';
$string['emptypagetitle'] = 'The new page title must not be blank.';
$string['emptysectiontitle'] = 'The new section name must not be blank.';
$string['endannotation'] = 'End of annotation';
$string['entirewiki'] = 'Entire wiki';
$string['errorcoursesubwiki'] = 'Must be &lsquo;No groups&rsquo; unless sub-wikis option is &lsquo;One wiki per group&rsquo;';
$string['error_export'] = 'An error occurred while exporting wiki data.';
$string['errorgroupssubwiki'] = 'Must be enabled when sub-wikis option is &lsquo;One wiki per group&rsquo;';
$string['excelcsvdownload'] = 'Download in Excel-compatible format (.csv)';
$string['expandallannotations'] = 'Expand annotations';
$string['expandannotation'] = 'Expand annotation';
$string['externaldashboardadd'] = 'Add wiki to dashboard';
$string['externaldashboardremove'] = 'Remove wiki from dashboard';
$string['feedalt'] = 'Subscribe to Atom feed';
$string['feedchange'] = 'Changed by {$a->name} (<a href=\'{$a->url}\'>view change</a>)';
$string['feeddescriptionchanges'] = 'Lists all changes made to the wiki. Subscribe to this feed if you want to be updated whenever the wiki changes.';
$string['feeddescriptionhistory'] = 'Lists all changes to this individual wiki page. Subscribe to this feed if you want to be updated whenever someone edits this page.';
$string['feeddescriptionpages'] = 'Lists all new pages on the wiki. Subscribe to this feed if you want to be updated whenever someone creates a new page.';
$string['feeditemdescriptiondate'] = '{$a->main} on {$a->date}.';
$string['feeditemdescriptionnodate'] = '{$a->main}.';
$string['feednewpage'] = 'Created by {$a->name}';
$string['feedsubscribe'] = 'You can subscribe to a feed containing this information: <a href=\'{$a->atom}\'>Atom</a> or <a href=\'{$a->rss}\'>RSS</a>.';
$string['feedtitle'] = '{$a->course} wiki: {$a->name} - {$a->subtitle}';
$string['format_html'] = 'View online';
$string['format_rtf'] = 'Download in word processor format';
$string['format_template'] = 'Download as wiki template file';
$string['format_template_file_warning'] = 'Note: this wiki contains attachments that will not be included in the template file.';
$string['frompage'] = 'from {$a}';
$string['frompages'] = 'from {$a}...';
$string['gradesupdated'] = 'Grades updated';
$string['hideannotationicons'] = 'Hide annotations';
$string['historycompareaccessibility'] = 'Select {$a->lastdate} {$a->createdtime}';
$string['historyfor'] = 'History for';
$string['index'] = 'Wiki index';
$string['jsajaxrequired'] = 'This Annotate page requires Javascript to be enabled in your browser and the AJAX and Javascript setting in your user profile to be set to Yes: use advanced web features.';
$string['jsnotenabled'] = 'Javascript is not enabled in your browser.';
$string['lastchange'] = 'Last change: {$a->date} / {$a->userlink}';
$string['linkedfrom'] = 'Pages that link to this one';
$string['linkedfromsingle'] = 'Page that links to this one';
$string['lockcancelled'] = 'Your editing lock has been overridden and somebody else is now editing this page. If you wish to keep your changes, please select and copy them before clicking Cancel; then try to edit again.';
$string['lockediting'] = 'Lock wiki - no editing';
$string['lockpage'] = 'Lock page';
$string['missingpages'] = 'Missing pages';
$string['modulename'] = 'OU wiki';
$string['modulename_help'] = '<p>
A wiki is a web-based system that lets users edit a set of linked pages. In Moodle, you would normally
use a wiki when you want your students to create content.
</p>

<p>
The OU wiki has a variety of options. Please see the individual help by each item for more information.
</p>';
$string['modulenameplural'] = 'OU wikis';
$string['mustspecify2'] = 'You must specify exactly two versions to compare.';
$string['myparticipation'] = 'My participation';
$string['newerversion'] = 'Newer version';
$string['newpage'] = 'first version';
$string['next'] = 'Older changes';
$string['nextversion'] = 'Next: {$a}';
$string['noattachments'] = 'No attachments';
$string['nochanges'] = 'Users who made no contribution';
$string['nojsbrowser'] = 'Our apologies, but you are using a browser we do not fully support.';
$string['nojsdisabled'] = 'You have disabled JavaScript in your browser settings.';
$string['nojswarning'] = 'As a result, we can only hold this page for you for {$a->minutes} minutes. Please ensure that you save your changes by {$a->deadline} (it is currently {$a->now}). Otherwise, somebody else might edit the page and your changes could be lost';
$string['noparticipation'] = 'No participation to show.';
$string['note'] = 'Note:';
$string['nousersingroup'] = 'The selected group contains no users.';
$string['nowikipages'] = 'This wiki does not have any pages.';
$string['numedits'] = '{$a} edit(s)';
$string['numwords'] = 'Words: {$a}';
$string['olderversion'] = 'Older version';
$string['oldversion'] = 'Old version';
$string['onepageview'] = 'You can view all pages of this wiki at once for convenient printing or permanent reference.';
$string['orphanedannotations'] = 'Lost annotations';
$string['orphanpages'] = 'Unlinked pages';
$string['ouwiki:addinstance'] = 'Add a new OU wiki';
$string['ouwiki:annotate'] = 'Allowed to annotate';
$string['ouwiki:deletepage'] = 'Delete wiki pages';
$string['ouwiki:edit'] = 'Edit wiki pages';
$string['ouwiki:grade'] = 'Grade users who have have access to wiki';
$string['ouwiki:lock'] = 'Allowed to lock and unlock pages';
$string['ouwiki:overridelock'] = 'Override locked pages';
$string['ouwiki:view'] = 'View wikis';
$string['ouwiki:viewallindividuals'] = 'Per-user subwikis: view all';
$string['ouwiki:viewcontributions'] = 'View list of contributions organised by user';
$string['ouwiki:viewgroupindividuals'] = 'Per-user subwikis: view same group';
$string['ouwiki:viewparticipation'] = 'View participation of all enrolled users who have access to wiki';
$string['overridelock'] = 'Override lock';
$string['overviewnumentrysince'] = 'new wiki entries since last login.';
$string['overviewnumentrysince1'] = 'new wiki entry since last login.';
$string['page'] = 'Page';
$string['pagedeletedinfo'] = 'Some deleted versions are shown in the list below. These are visible only to users with permission to delete versions. Ordinary users do not see them at all.';
$string['pagedoesnotexist'] = 'This page does not yet exist in the wiki.';
$string['pageedits'] = 'Page edits';
$string['pagelockeddetails'] = '{$a->name} started editing this page at {$a->lockedat}, and was
still editing it as of {$a->seenat}. You cannot edit it until they finish.';
$string['pagelockeddetailsnojs'] = '{$a->name} started editing this page at {$a->lockedat}. They
have until {$a->nojs} to edit. You cannot edit it until they finish.';
$string['pagelockedoverride'] = 'You have special access to cancel their edit and unlock the page.
If you do this, whatever they have entered will be lost! Please think carefully before clicking
the Override button.';
$string['pagelockedtimeout'] = 'Their editing slot finishes at {$a}.';
$string['pagelockedtitle'] = 'This page is being edited by somebody else.';
$string['pagenameisstartpage'] = 'The page name is the same as the start page. Use a different page name.';
$string['pagenametoolong'] = 'The page name is too long. Use a shorter page name.';
$string['pagescreated'] = 'Pages created';
$string['participation'] = 'Participation';
$string['participationbyuser'] = 'Participation by user';
$string['pluginadministration'] = 'OU wiki administration';
$string['pluginname'] = 'OU wiki';
$string['preview'] = 'Preview';
$string['previewwarning'] = 'The following preview of your changes has not yet been saved.
<strong>If you do not save changes, your work will be lost.</strong> Save using the button
at the end of the page.';
$string['previous'] = 'Newer changes';
$string['previousversion'] = 'Previous: {$a}';
$string['recentchanges'] = 'Latest edits';
$string['returntohistory'] = '(<a href=\'{$a}\'>Return to history view</a>.)';
$string['returntopage'] = 'Return to wiki page';
$string['returntoview'] = 'View current page';
$string['revert'] = 'Revert';
$string['reverterrorcapability'] = 'You do not have permission to revert to an earlier version';
$string['reverterrorversion'] = 'Cannot revert to nonexistent page version';
$string['revertversion'] = 'Revert';
$string['revertversionconfirm'] = '<p>This page will be returned to the state it was in as of {$a}, discarding all changes made since then. However, the discarded changes
will still be available in the page history.</p><p>Are you sure you want to revert to this version of the page?</p>';
$string['savedat'] = 'Saved at {$a}';
$string['savedby'] = 'saved by {$a}';
$string['savefailcontent'] = 'Your version of the page is shown below so that you can copy and paste
the relevant parts into another program. If you put your changes back on the wiki later, be careful
you don\'t overwrite somebody else\'s work.';
$string['savefaildesynch'] = 'While you were editing this page, somebody else managed to make a change.
(This could happen in various situations such as if you are using an unusual browser or have
Javascript turned off.) Unfortunately, your changes cannot be saved because that would overwrite the
other person\'s changes.';
$string['savefaillocked'] = 'While you were editing this page, somebody else obtained the page lock.
(This could happen in various situations such as if you are using an unusual browser or have
Javascript turned off.) Unfortunately, your changes cannot be saved at this time.';
$string['savefailnetwork'] = '<p>Unfortunately, your changes cannot be saved at this time. This is due to a
network error; the website is temporarily unavailable or you have been signed out. </p><p>Saving has been disabled
on this page. In order to retain any changes you must copy the edited page content, access the Edit page again and then paste in your changes.</p>';
$string['savefailtitle'] = 'Page cannot be saved';
$string['savegrades'] = 'Save grades';
$string['savetemplate'] = 'Save wiki as template';
$string['search'] = 'Search this wiki';
$string['search_help'] = 'Type your search term and press Enter or click the button.

To search for exact phrases use quote marks.

To exclude a word insert a hyphen immediately before the word.

Example: the search term <tt>picasso -sculpture &quot;early works&quot;</tt> will return results for &lsquo;picasso&rsquo; or the phrase &lsquo;early works&rsquo; but will exclude items containing &lsquo;sculpture&rsquo;.';
$string['seedetails'] = 'full history';
$string['showannotationicons'] = 'Show annotations';
$string['showwordcounts'] = 'Show word counts';
$string['showwordcounts_help'] = 'If switched on then word counts for the pages will be calculated and displayed at the bottom of the main content.';
$string['sizewarning'] = 'This wiki page is very large and may operate slowly.
If possible, please split the content into logical chunks and
place it on separate linked pages.';
$string['startpage'] = 'Start page';
$string['startpagedoesnotexist'] = 'This wiki\'s start page has not yet been created.';
$string['subwikiexist'] = 'Sub-wiki\'s have already been created. Adding a template file only affects
newly created and empty sub-wiki\'s, existing content will remain as at present.';
$string['subwikis'] = 'Sub-wikis';
$string['subwikis_groups'] = 'One wiki per group';
$string['subwikis_help'] = '<ul>
<li><strong>Single wiki for course</strong><br />
This wiki behaves as one single wiki. Everybody on the course sees the same pages.</li>
<li><strong>One wiki per group</strong><br />
Members of each group see an entirely separate copy of the wiki (sub-wiki) specific to their
group. You can only see pages created by people in the same group. If you are in
more than one group, or you have permissions that allow you to view all groups,
you get a dropdown to choose a group.</li>
<li><strong>Separate wiki for every user</strong><br />
Every single user gets an entirely different wiki. You can only see your own wiki unless
you have permissions that allow you to view others, when you get a dropdown to choose
a user. (This can be used as a way for students to contribute work, although you should
consider other ways to achieve this such as the Assessment activity.)</li>
</ul>

<p>
Note that the group option works with the chosen grouping. It will ignore groups in other
groupings.
</p>';
$string['subwikis_individual'] = 'Separate wiki for every user';
$string['subwikis_single'] = 'Single wiki for course';
$string['summary'] = 'Summary';
$string['summary_help'] = '<p>
If you enter a summary it will appear on the start page of the wiki. The summary appears
above the normal, editable wiki text and cannot itself be edited by users.
</p>

<p>
Summaries are entirely optional and your wiki may not need one. If you don\'t need a
summary, just leave the box blank.
</p>';
$string['system'] = 'the system';
$string['tab_annotate'] = 'Annotate';
$string['tab_discuss'] = 'Discuss';
$string['tab_edit'] = 'Edit';
$string['tab_history'] = 'History';
$string['tab_index_alpha'] = 'Alphabetical';
$string['tab_index_changes'] = 'All changes';
$string['tab_index_pages'] = 'New pages';
$string['tab_index_tree'] = 'Structure';
$string['tab_view'] = 'View';
$string['template'] = 'Template';
$string['templatefileexists'] = 'A template file \'{$a}\' is already in use.';
$string['template_help'] = '<p>
A template is a predefined set of wiki pages. When a template is set, the wiki starts off
with the content defined in the template.
</p>

<p>
The template applies to each subwiki; in "One wiki per group" mode, for example, each
group\'s wiki is initialised with the pages in the template.
</p>

<p>
To create a template, write the pages you want on any wiki, then visit the Index page and
click the "Save wiki as template" button. (You can also manually create templates in other
software; it is an extremely simple XML format. Look at a saved template to see the format.)
</p>

<p>
You can add the template after the wiki has been created. Adding a template only affects
newly created sub-wiki\'s, existing ones will remain as at present. </p>';
$string['thispageislocked'] = 'This wiki page is locked and cannot be edited.';
$string['timelocked_after'] = 'This wiki is currently locked and can no longer be edited.';
$string['timelocked_before'] = 'This wiki is currently locked. It can be edited from {$a}.';
$string['timeout'] = 'Time allowed for edit';
$string['timeout_help'] = '<p>
If you select a timeout, people editing the wiki are only allowed to edit it for a given time.
The wiki locks pages while they are being edited (so that two people can\'t edit the same page
at once), so setting a timeout prevents the wiki becoming locked for others.
</p>

<h3>What users see</h3>

<p>
When timeout is enabled, users see a countdown when they edit a page. If the countdown reaches
zero, their browser will automatically save any changes and stop editing.
</p>

<h3>Users without Javascript enabled</h3>

<p>
This option has no effect on users who don\'t have Javascript enabled or who have old browsers.
A fifteen-minute timeout always applies to these users. When they edit a page, it displays the time
by which they must save it; if they do not, they might lose their work.
</p>

<h3>Why you might not need this option</h3>

<p>
Even when this option is turned off, locks are automatically discarded in the following situations after
a user has begun to edit a page:
</p>

<ul>
<li>Without saving changes or cancelling, the user moves to a different page.</li>
<li>The user closes their browser.</li>
<li>The user\'s computer crashes.</li>
<li>The user loses their Internet connection.</li>
</ul>

<p>
In these situations the lock is automatically removed after about two minutes.
</p>

<p>
In addition, tutors and course staff have (by default) the ability to override any lock at any time.
</p>

<h3>What this option doesn\'t do</h3>

<p>
This option doesn\'t stop somebody holding on to a page and preventing other users from editing it if
they are very determined. They could edit a page and wait until the timeout is about to expire before
saving changes then very quickly editing it again.
</p>';
$string['timeout_none'] = 'No timeout';
$string['tryagain'] = 'Try again';
$string['typeinpagename'] = 'Type page name here';
$string['typeinsectionname'] = 'Type section title here';
$string['undelete'] = 'Undelete';
$string['unlockpage'] = 'Unlock page';
$string['userdetails'] = 'Detail for {$a}';
$string['usergrade'] = 'User grade';
$string['userparticipation'] = 'User participation';
$string['viewdeletedversionerrorcapability'] = 'Error viewing page version';
$string['viewparticipationerrror'] = 'Cannot view user participation.';
$string['viewwikichanges'] = 'Changes for {$a}';
$string['viewwikistartpage'] = 'View {$a}';
$string['wikifor'] = 'Viewing wiki for:';
$string['wikifullchanges'] = 'View full change list';
$string['wikirecentchanges'] = 'Wiki changes';
$string['wikirecentchanges_from'] = 'Wiki changes (page {$a})';
$string['words'] = 'Words';
$string['wordsadded'] = 'Words added';
$string['wordsdeleted'] = 'Words deleted';
$string['wouldyouliketocreate'] = 'Would you like to create it?';
