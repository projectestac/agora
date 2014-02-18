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
 * Strings for component 'myeducationpath', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   myeducationpath
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = 'Add another linked activity option';
$string['addlinktitle'] = 'Click to add another linked activity option';
$string['apikey'] = 'MyEducationPath.com API key';
$string['areaintro'] = 'MyEducationPath.com introduction';
$string['category'] = 'Category';
$string['category_help'] = 'Category where the course will be added on MyEducationPath.com';
$string['choosecategory'] = '-- choose category --';
$string['configapikey'] = 'Set there your API key from your MyEducationPath.com profile. Without this key the plugin will not work.';
$string['configenableintegration'] = 'If this is No then any interaction with MyEducationPath.com will be disabled. Any data from this Moodle site will not be transfered to the directory.';
$string['enableintegration'] = 'Enable integration with <a href="http://MyEducationPath.com/" target="_blank">http://MyEducationPath.com</a>';
$string['imageurl'] = 'Image URI';
$string['imageurl_help'] = 'This is the link to course image. THis is optional. You can provider the link to an image associated with the course. This image will be displayed in course description on the MyEducationPath.com directory.';
$string['intro'] = 'Introduction';
$string['intro_help'] = 'Add some text to ask your students to leave feedback about the course. This is optional.';
$string['modulename'] = 'My Education Path';
$string['modulename_help'] = 'The MyEducationPath activity module enables integration with <a href="http://myeducationpath.com/courses" target="_blank">http://MyEducationPath.com/courses</a> directory.';
$string['modulenameplural'] = 'myeducationpath';
$string['myeducationpath:manage'] = 'MyEducationPath.com';
$string['myeducationpath:printteacher'] = 'MyEducationPath.com';
$string['myeducationpath:student'] = 'MyEducationPath.com';
$string['myeducationpath:view'] = 'MyEducationPath.com';
$string['name'] = 'My Education Path publish and feedback';
$string['name_help'] = 'This is the name of activity in the course. If you plan to make this visible to students then give a name like "COurse feedback" or "Give your comments"';
$string['pluginadministration'] = 'My Education Path administration';
$string['pluginname'] = 'My Education Path';
$string['settingsdescription'] = 'Configure MyEducationPath.com integration. <br>This plugin is used to add your courses to online courses directory <a href="http://MyEducationPath.com/courses" target="_blank">http://MyEducationPath.com/courses</a> and getting feedback from your students (in form of comments for your course in the directory).<br>If you decide to add a course to the directory then go to course and add new activity "MyEducationPath" to any section (recomended to last section).Once an activity as added you need to decide if you want your students leave comments about a course. If <b>Yes</b> then make the activity visible for students. If <b>No</b> then hide the activity and students will not see it (but the course still can be added to MyEducationPath.com)<br><br>The integration can work in two modes - <b>Active</b> and <b>Passive</b>.<br><b>Active</b> mode means for every course you need to open the activity as admin/teacher and confirm "Add the course to the directory". Only after this the course will be added.<br>In <b>Passive</b> mode you need to get import URI, go to your MyEducationPath.com profile settings and save the URI.  After this MyEducationPath.com will check your Moodle courses regularry and import all new/updated courses (only courses where this module is added as activity). Your import URI is <b>http://youmoodlesite.com/pathtomoodle/mod/myeducationpath/import.php</b><br>"Active" mode is always enabled. "Passive" will work only if you save import URI in your MyEducationPath.com profile settings page.<br>To start using your integration you need to <a href="http://myeducationpath.com/page/register.htm?acctype=v" target="_blank">register</a> on MyEducationPath.com as Online Courses Vendor and get API key (on profile page).<br><br>	NOTE. Only couses where this activity is added will be added to MyEducationPath.com directory. For every course folowing data is posted to the directory: course name, description, instructors names (teachers), price, start date (if is set). No any sensitive information is posted.';
$string['tags'] = 'Tags';
$string['tags_help'] = 'Comma separated list of tags';
$string['visible'] = 'Visibility';
$string['visible_help'] = 'If the activity is not visible then the course still can be added to MyEducationPath.com directory but students will not see the activity and will not leave the feedback';
