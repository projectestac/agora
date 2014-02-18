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
 * Strings for component 'block_demostudent', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_demostudent
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advicefordemostudent'] = '';
$string['adviceforfirstuse'] = 'Creating a DemoStudent account enrolls a user called DemoStudent
                             into your course.  You can then log in as your DemoStudent to test
                             different student experiences in your course.';
$string['adviceforinstructor'] = 'A DemoStudent account has been created in this course.
                               Switching to the DemoStudent account will allow you to:<blockquote>
                               <ul><li>View your course as a student
                                   <li>Test out group restrictions based on group membership
                                   <li>Test activities to fully experience what your students see
                               </ul></blockquote>';
$string['advicetwowindows'] = '<p>Two browsers, both to Moodle logged in,<br>
                               One as Instructor, the other its DemoStudent twin,<br>
                               Will prevent the endless switching curse<br>
                               From one view to the other, back and forth.';
$string['buttonfordemostudent'] = 'Return to my <b>Instructor</b> role';
$string['buttonforfirstuse'] = 'Create a DemoStudent';
$string['buttonforinstructor'] = 'Switch to DemoStudent';
$string['buttonforunenrol'] = 'Unenrol DemoStudent';
$string['demostudent'] = 'DemoStudent View';
$string['demostudent:addinstance'] = 'Add a new DemoStudent block (for instructors only).';
$string['demostudent:seedemostudentblock'] = 'See the DemoStudent block (for instructors and DemoStudents).';
$string['errorfailedtocreateuser'] = '<hr><h4>ERROR:</h4>User <b>{$a}</b> could not be created.  Sorry.';
$string['errorinstructormasquerade'] = '<hr><h4>ERROR:</h4>A DemoStudent account cannot view course as
                                        instructor.<p>Please log in again.<hr>';
$string['errormissingaddinstancecapability'] = '<hr><h4>ERROR:</h4>You must have
                                                <i>block/demostudent:addinstance</i> capability to create
                                                a DemoStudent account.<p>Please have an administrator check
                                                your role and capabilities.<p>Please log in again.<hr>';
$string['errorremovenotinstructor'] = '<hr><h4>ERROR:</h4>Only an instructor can remove their own DemoStudent.<p>Please log in again.<hr>';
$string['pluginname'] = 'DemoStudent block';
$string['returntocourse'] = '<p><a href="{$a}">Return</a> to the course.';
$string['roledemostudentdescription'] = 'Role assigned to accounts created through the DemoStudent block, for instructors to test their courses.';
$string['roledemostudentname'] = 'DemoStudent';
$string['switchfromdemostudentview'] = 'Return to Instructor view.  You may need to log in again.';
$string['switchfromfirstuseview'] = 'Create and enrol DemoStudent in this course.';
$string['switchfrominstructorview'] = 'View course as DemoStudent.';
$string['unenroltip'] = 'Remove the DemoStudent from this course.';
$string['viewisdemostudent'] = 'You are currently seeing the <b>DemoStudent</b> view.';
$string['viewisfirstuse'] = 'You are currently seeing the <b>Instructor</b> view.';
$string['viewisinstructor'] = 'You are currently seeing the <b>Instructor</b> view.';
$string['warningcoursenotvisible'] = '<hr><h4>This course is not available to students.</h4>
                                      Instructors can edit course settings to change this.<hr>';
$string['warningmissingrole'] = '<hr><h4>WARNING:</h4>A "demostudent" role was not found in the database.
                                 This may lead to unexpected behaviour of the DemoStudnet block.
                                 Please ask an administrator to verify the system roles,
                                 and reinstall the plugin if necessary.<hr>';
