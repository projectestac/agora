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
 * Strings for component 'klassenbuch', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   klassenbuch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addafter'] = 'Add new chapter';
$string['addnewfield'] = 'Add new Klassenbuch Field';
$string['addsubscriber'] = 'Add';
$string['allowchoice'] = 'Allow everyone to choose';
$string['allowsallsubscribe'] = 'Everyone can choose to subscribe to this book';
$string['attachment'] = 'Attachment(s)';
$string['attachments'] = 'Attachments';
$string['autosavedon'] = 'Autosaved on';
$string['autosaveseconds'] = 'Autosave every (seconds)';
$string['bynameondate'] = 'by {$a->name} on {$a->date}';
$string['chapter'] = 'Chapter';
$string['chapters'] = 'Chapters';
$string['chapterscount'] = 'Chapters';
$string['chaptertitle'] = 'Chapter title';
$string['collapsesubchapters'] = 'Collapse subchapters';
$string['confchapterdelete'] = 'Do you really want to delete this chapter?';
$string['confchapterdeleteall'] = 'Do you really want to delete this chapter and all its subchapters?';
$string['configreplytouser'] = 'Notification emails come from the user who updates the book, not from the \'no reply\' address';
$string['content'] = 'Content';
$string['customfieldswarning'] = 'There are currently no fields defined for the Klassenbuch module - please visit {$a->globalfieldslink} to set these up (this can also be found via the link on {$a->settingslink}).';
$string['customtitles'] = 'Custom titles';
$string['customtitles_help'] = 'Chapter titles are displayed automatically only in TOC.';
$string['disallowsubscribe'] = 'Subscribing to this book is not allowed';
$string['duplicatenewchaptererror'] = 'New chapter already saved - cannot create duplicate';
$string['editingchapter'] = 'Editing chapter';
$string['editsubscribersoff'] = 'Stop editing subscriptions';
$string['editsubscriberson'] = 'Edit subscriptions';
$string['errorchapter'] = 'Error reading book chapter.';
$string['everyonecannowchoose'] = 'Everyone can choose to subscribe to this book';
$string['everyoneisnowsubscribed'] = 'Everyone is now subscribed to this book.';
$string['everyoneissubscribed'] = 'Everyone is subscribed';
$string['existingsubscribers'] = 'Existing subscribers';
$string['exportpdf'] = 'Export as PDF';
$string['faq'] = 'Klassenbuch FAQ';
$string['faq_help'] = '*Why only two levels?*

Two levels are generally enough for all books, three levels would lead to poorly structured documents. Book module is designed for
creation of short multipage study materials. It is usually better to use PDF format for longer documents. The easiest way to create PDFs are
virtual printers (see
<a  href="http://sector7g.wurzel6.de/pdfcreator/index_en.htm"  target="_blank">PDFCreator</a>,
<a  href="http://fineprint.com/products/pdffactory/index.html"  target="_blank">PDFFactory</a>,
<a  href="http://www.adobe.com/products/acrobatstd/main.html"  target="_blank">Adobe Acrobat</a>,
etc.).

*Can students edit books?*

Only teachers can create and edit books. There are no plans to implement student editing for books, but somebody may create something
similar for students (Portfolio?). The main reason is to keep Book module as simple as possible.

*How do I search the books?*

At present there is only one way, use browser\'s search capability in print page. Global searching is now possible only in Moodle forums.
It would be nice to have global searching for all resources including books, any volunteers?

*My titles do not fit on one line.*

Either rephrase your titles or ask your site admin to change TOC
width. It is defined globally for all books in module configuration
page.';
$string['fieldtitle'] = 'Field Title';
$string['forcessubscribe'] = 'This book forces everyone to subscribe.';
$string['forcesubscribe'] = 'Everyone will be subscribed to this book';
$string['globalfields'] = 'Global Fields';
$string['globalfieldspage'] = 'the global fields page';
$string['globalsettingspage'] = 'the Klassenbuch global settings page';
$string['hiddenbydefault'] = 'Hidden by default';
$string['hiddentostudent'] = 'Hidden to Student';
$string['klassenbuch'] = 'klassenbuch';
$string['klassenbuch:addinstance'] = 'Add new Klassenbuch';
$string['klassenbuch:edit'] = 'Edit book chapters';
$string['klassenbuch:initialsubscriptions'] = 'Initially subscribed to book';
$string['klassenbuch:managesubscriptions'] = 'Subscribe / unsubscribe other users';
$string['klassenbuch:read'] = 'Read book';
$string['klassenbuchs'] = 'klassenbuch';
$string['klassenbuch:viewhiddenchapters'] = 'View hidden book chapters';
$string['klassenbuch:viewsubscribers'] = 'See which users are subscribed';
$string['manageglobalfields'] = 'Manage Global Fields';
$string['missingfilemanagement'] = 'Dear users of Book module, I supposed you have already notised that it is not possible to delete or manage files used in Book chapters. Please vote in {$a} to get this fixed, thanks. Petr Škoda';
$string['modulename'] = 'Klassenbuch';
$string['modulename_help'] = 'Klassenbuch is a simple multipage study material.';
$string['modulenameplural'] = 'Klassenbuchs';
$string['navexit'] = 'Exit book';
$string['navnext'] = 'Next';
$string['navprev'] = 'Previous';
$string['newfieldtitle'] = 'New Field Title';
$string['nosubscribers'] = 'No one has subscribed to this book.';
$string['nownotsubscribed'] = '{$a->name} will NOT receive copies of this book \'{$a->book}\' by email.';
$string['nowsubscribed'] = '{$a->name} will receive copies of this book \'{$a->book}\' by email.';
$string['numbering'] = 'Chapter numbering';
$string['numbering0'] = 'None';
$string['numbering1'] = 'Numbers';
$string['numbering2'] = 'Bullets';
$string['numbering3'] = 'Indented';
$string['numbering_help'] = '* None - chapter and subchapter titles are not formatted at all, use if you want to define special numbering styles. For example letters: in chapter title type "A First Chapter", "A.1 Some Subchapter",...
* Numbers - chapters and subchapters are numbered (1, 1.1, 1.2, 2, ...)
* Bullets - subchapters are indented and displayed with bullets
* Indented - subchapters are indented';
$string['numberingoptions'] = 'Available numbering options';
$string['numberingoptions_help'] = 'Select numbering options that should be available when creating new books.';
$string['page-mod-klassenbuch-x'] = 'Any klassenbuch module page';
$string['pluginadministration'] = 'Klassenbuch administration';
$string['pluginname'] = 'Klassenbuch';
$string['potentialsubscribers'] = 'Potential subscribers';
$string['removesubscriber'] = 'Remove';
$string['reply'] = 'Read whole book';
$string['replytouser'] = 'Emails from user';
$string['send'] = 'Send';
$string['showall'] = 'Show all users';
$string['showsubscribers'] = 'Show subscribers';
$string['subchapter'] = 'Subchapter';
$string['subscribe'] = 'I want to subscribe to this book';
$string['subscribers'] = 'Subscribers';
$string['subscribersto'] = 'Subscribers for \'{$a}';
$string['toc'] = 'Table of contents';
$string['top'] = 'top';
$string['unsubscribe'] = 'I want to unsubscribe from this book';
$string['withselectedfields'] = 'With Selected Fields';
