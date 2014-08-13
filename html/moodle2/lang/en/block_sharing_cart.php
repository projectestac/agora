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
 * Strings for component 'block_sharing_cart', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_sharing_cart
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['backup'] = 'Copy to Sharing Cart';
$string['bulkdelete'] = 'Bulk delete';
$string['clipboard'] = 'Copying this shared item';
$string['confirm_backup'] = 'Do you want to copy this activity into Sharing Cart?';
$string['confirm_delete'] = 'Are you sure you want to delete?';
$string['confirm_delete_selected'] = 'Are you sure you want to delete all selected items?';
$string['confirm_restore'] = 'Do you want to copy this item to course?';
$string['confirm_userdata'] = 'Do you want to include user data in a copy of this activity?';
$string['copyhere'] = 'Copy here';
$string['forbidden'] = 'You don\'t have any permissions to access this shared item';
$string['invalidoperation'] = 'An invalid operation detected';
$string['movedir'] = 'Move into folder';
$string['notarget'] = 'Target not found';
$string['pluginname'] = 'Sharing Cart';
$string['recordnotfound'] = 'Shared item not found';
$string['requireajax'] = 'Sharing Cart requires AJAX';
$string['requirejs'] = 'Sharing Cart requires JavaScript enabled in your browser';
$string['restore'] = 'Copy to course';
$string['settings:userdata_copyable_modtypes'] = 'User data copyable module types';
$string['settings:userdata_copyable_modtypes_desc'] = 'While copying an activity into the Sharing Cart,
a dialog shows an option whether a copy of an activity includes its user data or not,
if its module type is checked in the above and an operator has <strong>moodle/backup:userinfo</strong>,
<strong>moodle/backup:anonymise</strong> and <strong>moodle/restore:userinfo</strong> capabilities.
(By default, only manager role has those capabilities.)';
$string['settings:workaround_qtypes'] = 'Workaround for question types';
$string['settings:workaround_qtypes_desc'] = 'The workaround for question restore issue will be performed if its question type is checked.
When the questions to be restored already exist, however, those data look like inconsistent,
this workaround will try to make another duplicates instead of reusing existing data.
It may be useful for avoiding some restore errors, such as <i>error_question_match_sub_missing_in_db</i>.';
$string['sharing_cart'] = 'Sharing Cart';
$string['sharing_cart:addinstance'] = 'Add a new Sharing Cart block';
$string['sharing_cart_help'] = '<h2 class="helpheading">Operation</h2>
<dl style="margin-left:0.5em;">
<dt>Copying from course to Sharing Cart</dt>
    <dd>You will notice a small "Copy to Sharing Cart" icon which appears after each
        resource or activity in a course.
        Click on that icon to send a copy of that resource/activity into Sharing Cart.
        Only the activity itself, without user data, will be cloned.</dd>
<dt>Copying from Sharing Cart to course</dt>
    <dd>Click a "Copy to course" icon in Sharing Cart and select one of target markers on each section.
        Or click "Cancel" icon which is above those.</dd>
<dt>Making folders inside Sharing Cart</dt>
    <dd>Click a "Move into folder" icon in a Sharing Cart item.
        An input box for new folder name will appear if there\'s no folder.
        Or you can select an existing folder in drop-down list.
        Which will be replaced with an input box if you click "Edit" icon.</dd>
</dl>';
$string['unexpectederror'] = 'An unexpected error occurred';
