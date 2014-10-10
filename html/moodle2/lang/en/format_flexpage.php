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
 * Strings for component 'format_flexpage', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   format_flexpage
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionbar'] = 'Action bar';
$string['actionbar_help'] = '<p>With Flexpage, course designers can create multiple flexpages within the course. Each flexpage can have unique or shared content on them.</p>

<p>With the Action bar, one can jump to different flexpages within this course by clicking the name of the flexpage in the
 drop-down menu.</p>

<p>Available actions under the <strong>Add</strong> Action bar menu item:
    <ul>
        <li>To add a flexpage, select the <strong>Add flexpages</strong> link from the drop-down menu. When you add new flexpages
        , you will want to determine where they are located in the index of flexpages. Flexpages can be children of other flexpages (sub-flexpages). Or they can simply be placed before or after other flexpages. New flexpages can also be blank, or a copy of an existing flexpage. To add multiple flexpages to a course, press the "+" icon on the right side of the <strong>Add flexpages</strong> window.</li>
        <li>To add a new activity to this flexpage, select <strong>Add activity</strong> from the drop-down menu.  Choose where
         you would like to place the new activity on the flexpage by selecting one of the buttons at the top of the <strong>Add activity</strong> window. Next, choose the activity or resource that you would like to add to the course and flexpage.</li>
        <li>To add an existing activity to this flexpage, select <strong>Add existing activity</strong> from the drop-down menu.
        Choose where you would like to place the existing activity on the flexpage by selecting one of the buttons at the top of the <strong>Add existing activity</strong> window. Next, place a checkmark next to the activities that you would like to add to this flexpage. Finally, click the "Add activities" button at the bottom of the window to complete the action.</li>
        <li>To add a block to this flexpage, select <strong>Add block</strong> from the drop-down menu. Choose where you would
        like to place the block on the flexpage by selecting one of the buttons at the top of the <strong>Add block</strong> window. Next, click on the name of the block that you would like to add to the course.</li>
        <li>To add an existing menu to this flexpage, select <strong>Add existing menu</strong> from the drop-down menu. Choose
         where you would like to place the block on the flexpage by selecting one of the buttons at the top of the <strong>Add existing menu</strong> window. Next, click on the name of the menu that you would like to add to the course.</li>
    </ul>
</p>

<p>Available actions under the <strong>Manage</strong> Action bar menu item:
    <ul>
        <li>To configure the settings for this flexpage, click the <strong>Manage flexpage settings</strong> link from the
        drop-down menu. From this window, you can edit the flexpage name; change the widths of the flexpage regions; indicate whether the flexpage should be hidden, visible, or visible in menus; as well as determine whether the flexpages should have "previous and next" navigation buttons.</li>
        <li>To move a flexpage, click the <strong>Move flexpage</strong> link from the drop-down menu. From this window, you can
         choose whether the flexpage is a child of another flexpage, or whether it is before or after another flexpage in the index.</li>
        <li>To delete a flexpage, click the <strong>Delete flexpage</strong> link from the drop-down menu. From this window, you
        can confirm that you want to delete the current flexpage.</li>
        <li>To manage the settings of multiple flexpages, click the <strong>Manage all flexpages</strong> link from the drop-down
         menu. From this window, you can view the index of all flexpages; quickly manage, move or delete individual flexpages; alter display settings; as well as control navigation settings.</li>
        <li>To manage tabs for your course, as well as other menus, click the <strong>Manage all menus</strong> link from the
        drop-down menu. From this window you can create menus, as well as quickly edit menus, delete menus, and manage links within the menus.</li>
    </ul>
</p>';
$string['addactivities'] = 'Add activities';
$string['addactivity'] = 'Add activity';
$string['addactivityaction'] = 'Add activity';
$string['addactivity_help'] = 'Choose where you would like to place the new activity on the flexpage by selecting one of the buttons at the top of the <strong>Add activity</strong> window. Next, choose the activity or resource that you would like to add to the course and flexpage.';
$string['addblock'] = 'Add block';
$string['addblockaction'] = 'Add block';
$string['addblock_help'] = 'Choose where you would like to place the block on the flexpage by selecting one of the buttons at the top of the <strong>Add block</strong> window. Next, click on the name of the block that you would like to add to the course.';
$string['addedpages'] = 'Added flexpages: {$a}';
$string['addexistingactivity'] = 'Add existing activity';
$string['addexistingactivityaction'] = 'Add existing activity';
$string['addexistingactivity_help'] = 'Choose where you would like to place the existing activity on the flexpage by selecting one of the buttons at the top of the <strong>Add existing activity</strong> window. Next, place a checkmark next to the activities that you would like to add to this flexpage. Finally, click the "Add activities" button at the bottom of the window to complete the action.';
$string['addmenu'] = 'Add';
$string['addpages'] = 'Add flexpages';
$string['addpagesaction'] = 'Add flexpages';
$string['addpages_help'] = 'From here you can add new flexpages to your course.  Going from left to right on the form:
 <ol>
    <li>Enter the name of your flexpage (blank names are not added).</li>
    <li>The next <em>two</em> drop-downs determine where in the index of flexpages your new flexpage will be added.  So, you can
     add your new flexpage before, after or as a child (sub-flexpage) of another flexpage.</li>
    <li>(Optional) In the last drop-down, you can choose an existing flexpage to copy into your newly created flexpage.</li>
</ol>
To add more than one flexpage at a time, click on the "+" icon and fill out the new row.  If you click on the "+" icon too many times, just blank out the flexpage names and they will not be added.';
$string['addto'] = 'Add to region:';
$string['ajaxexception'] = 'Application error: {$a}';
$string['areyousuredeletepage'] = 'Are you sure that you want to permanently delete flexpage <strong>{$a}</strong>?';
$string['availablefrom'] = 'Allow access from';
$string['availablefrom_help'] = 'This flexpage will be available to course users after this date.';
$string['availableuntil'] = 'Allow access until';
$string['availableuntil_help'] = 'This flexpage will be available to course users before this date.';
$string['block'] = 'Block';
$string['close'] = 'Close';
$string['continuedotdotdot'] = 'Continue...';
$string['copydotdotdot'] = 'Copy...';
$string['defaultcoursepagename'] = 'Default flexpage (Change me)';
$string['deletedpagex'] = 'Deleted flexpage "{$a}"';
$string['deletemodwarn'] = 'If this activity is deleted, then it will be removed from all flexpages.';
$string['deletepage'] = 'Delete flexpage';
$string['deletepageaction'] = 'Delete flexpage';
$string['display'] = 'Display';
$string['display_help'] = 'Configure if this flexpage is:
<ol>
    <li>Hidden completely to non-editors.</li>
    <li>Visible to course users, but does not appear in Flexpage Menus and course navigation.</li>
    <li>Visible to course users and appears in Flexpage Menus and course navigation.</li>
</ol>';
$string['displayhidden'] = 'Hidden';
$string['displayvisible'] = 'Visible but not in menus';
$string['displayvisiblemenu'] = 'Visible and in menus';
$string['editpage'] = 'Flexpage settings';
$string['editpageaction'] = 'Manage flexpage settings';
$string['error'] = 'Error';
$string['flexpage:managepages'] = 'Manage flexpages';
$string['formnamerequired'] = 'The flexpage name is a required field.';
$string['frontpage'] = 'Use Flexpage on front page';
$string['frontpagedesc'] = 'This will enable the Flexpage format on the front page.';
$string['genericasyncfail'] = 'The request failed for an unknown reason, please try the action again.';
$string['gotoa'] = 'Go to "{$a}"';
$string['hidefromothers'] = 'Hide flexpage';
$string['jumptoflexpage'] = 'Jump to a flexpage';
$string['managemenu'] = 'Manage';
$string['managepages'] = 'Manage flexpages';
$string['managepagesaction'] = 'Manage all flexpages';
$string['managepages_help'] = 'From this window, you can view the index of all flexpages; quickly manage, move or delete an individual flexpage; alter display settings; and control navigation settings.';
$string['moveafter'] = 'after';
$string['movebefore'] = 'before';
$string['movechild'] = 'as first child of';
$string['movedpage'] = 'Moved flexpage "{$a->movepage}" {$a->move} flexpage "{$a->refpage}"';
$string['movepage'] = 'Move flexpage';
$string['movepagea'] = 'Move flexpage <strong>{$a}</strong>';
$string['movepageaction'] = 'Move flexpage';
$string['name'] = 'Name';
$string['name_help'] = 'This is the name of your flexpage and it will appear to course users in menus and the like.';
$string['navboth'] = 'Both previous and next flexpage';
$string['navigation'] = 'Navigation';
$string['navigation_help'] = 'Used to display next and/or previous buttons on this flexpage.  The buttons take the user to the next/previous available flexpage.';
$string['navnext'] = 'Next flexpage only';
$string['navnone'] = 'No navigation';
$string['navprev'] = 'Previous flexpage only';
$string['next'] = 'Next';
$string['nextpage'] = 'Next >';
$string['nomoveoptionserror'] = 'You cannot move this flexpage because there are no available positions to place this flexpage.  Try adding new flexpages before or after this flexpage.';
$string['page'] = 'Flexpage';
$string['pagename'] = 'Flexpage name';
$string['pagenotavailable'] = 'Not available';
$string['pagenotavailable_help'] = 'This flexpage is not available to you.  Below might be a list of conditions that you must satisfy in order to view the flexpage.';
$string['pagenotfound'] = 'The flexpage with id = {$a} does not exist in this course.';
$string['pagexnotavailable'] = '{$a} is not available';
$string['pluginname'] = 'Flexpage format';
$string['preventactivityview'] = 'You cannot access this activity yet because it is on a flexpage that is currently not available to you.';
$string['previous'] = 'Previous';
$string['previouspage'] = '< Previous';
$string['regionwidths'] = 'Block region widths';
$string['regionwidths_help'] = 'One can specify in pixels how wide each region of blocks can be.  An example would be to set left to 200, main to 500 and right to 200.  Please note though that available regions and their names can change from theme to theme.';
$string['sectionname'] = 'Section';
$string['showavailability'] = 'Before this can be accessed';
$string['showavailability_help'] = 'If the flexpage is unavailable to the user, this setting determines whether this flexpage\'s restriction information or nothing at all is displayed.';
$string['showavailability_hide'] = 'Hide flexpage entirely';
$string['showavailability_show'] = 'Show flexpage greyed-out with restriction information';
$string['showfromothers'] = 'Show flexpage';
$string['themelayoutmissing'] = 'Your current theme does not support Flexpage.  Please change the theme (or if enabled, the course theme or your preferred theme in your profile) to one that has a "{$a}" layout.';
$string['warning'] = 'Warning';
