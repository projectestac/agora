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
 * Strings for component 'aspirelist', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   aspirelist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aspirelist'] = 'Resource list: {$a}';
$string['aspirelist:addinstance'] = 'Add a new resource list';
$string['aspirelistname'] = 'Resource list name';
$string['aspirelist:view'] = 'View resource list content';
$string['aspireurl'] = 'Talis Aspire URL';
$string['codecolumn'] = 'Aspire code column';
$string['coderegex'] = 'Aspire code regex';
$string['codesource'] = 'Aspire code source';
$string['codetable'] = 'Custom database table';
$string['configaspireurl'] = 'Enter the URL of your Talis Aspire site.';
$string['configcodecolumn'] = 'Optional. The name of the column in the custom table containing your Talis Aspire list codes';
$string['configcoderegex'] = 'Optional. If using the course ID number as your code source, this is a regular expression (including delimiters) matching the Talis Aspire code part of it. If no regex is provided here it will be assumed that the entire ID number is the Aspire code.';
$string['configcodesource'] = 'Select the source of your Talis Aspire list codes. If you choose to use a custom database table you must also specify the table, columns and course attribute details in the fields below. If no code is found in the custom table for a particular course, the course ID number will be used as a fallback, regardless of what is specified here.';
$string['configcodetable'] = 'Optional. The name of a custom table in the Moodle database containing your Talis Aspire list codes mapped against a Moodle course attribute.';
$string['configcourseattribute'] = 'Optional. The unique course attribute that is mapped against your Talis Aspire codes in the custom table (normally id, idnumber or shortname).';
$string['configcoursecolumn'] = 'Optional. The name of the column in the custom table containing the course attribute that is mapped against your Talis Aspire list codes.';
$string['configdefaultdisplay'] = 'By default, should new resource lists be displayed on a separate page via a link, or inline on the course page?';
$string['configknowledgegroup'] = 'Select the target knowledge group for your Talis Aspire lists.';
$string['configrequiremodintro'] = 'Enable this option if you want to force users to enter a description for each resource list.';
$string['configyearregex'] = 'Optional. This is a regular expression (including delimiters) matching the year code part of your course ID numbers, and can be used irrespective of the source of the Aspire list codes. If no regex is provided here it will be assumed that there is no year code.';
$string['contentheader'] = 'Resource list selection';
$string['courseattribute'] = 'Course attribute';
$string['coursecolumn'] = 'Course column';
$string['defaultdisplay'] = 'Default display mode';
$string['display'] = 'Display resource list contents';
$string['display_help'] = '<p>If you choose to display the resource list contents on the course page, there will be no link to a separate page. The description will be displayed only if "Display description on course page" is checked.</p><p>Also note that participants\' view actions cannot be logged in this case.</p>';
$string['displayinline'] = 'Inline on the course page';
$string['displaypage'] = 'On a separate page';
$string['errorcodecolumn'] = 'You must specify the code column if you want to use a custom database table as your Aspire code source.';
$string['errorcodesource'] = 'You must provide all the table and column details below if you want to use a custom database table as your Aspire code source.';
$string['errorcodetable'] = 'You must specify the table name if you want to use a custom database table as your Aspire code source.';
$string['errorcourseattribute'] = 'You must specify a course attribute if you want to use a custom database table as your Aspire code source.';
$string['errorcoursecolumn'] = 'You must specify the course column if you want to use a custom database table as your Aspire code source.';
$string['itemcount'] = '{$a} item';
$string['itemcountplural'] = '{$a} items';
$string['knowledgegroup'] = 'Aspire knowledge group';
$string['modulename'] = 'Aspire resource list';
$string['modulename_help'] = '<p>The Aspire resource list module enables a teacher to include a selection of resources from associated Talis Aspire resource lists directly within the content of their course.</p><p>The resource list can be displayed either in a separate, linked page, or embedded in the course page itself (hidden initially, with a link to toggle visibility).</p>';
$string['modulename_link'] = 'mod/aspirelist/view';
$string['modulenameplural'] = 'Aspire resource lists';
$string['modules'] = 'Modules';
$string['neverseen'] = 'Never seen';
$string['noaspirelists'] = 'Sorry, there are no resource lists associated with this {$a}.';
$string['noautocompletioninline'] = 'Automatic completion on viewing of activity can not be selected together with the "Display inline" option';
$string['noconnection'] = 'Unfortunately the Talis Aspire website is currently unavailable. Please try again later.';
$string['onlineresource'] = 'Online resource';
$string['page-mod-aspirelist-view'] = 'Resource list module main page';
$string['page-mod-aspirelist-x'] = 'Any resource list module page';
$string['pluginadministration'] = 'Aspire resource list administration';
$string['pluginname'] = 'Aspire resource list';
$string['previewitem'] = 'Preview item';
$string['programmes'] = 'Programmes';
$string['requiremodintro'] = 'Require resource list description';
$string['selectresources'] = 'Select resources from list <strong>{$a}</strong>:';
$string['showhide'] = '(show/hide)';
$string['subjects'] = 'Subjects';
$string['units'] = 'Units';
$string['yearregex'] = 'Year code regex';
