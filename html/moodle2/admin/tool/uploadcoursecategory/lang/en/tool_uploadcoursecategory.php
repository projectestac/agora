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
 * Strings for component 'tool_uploadcoursecategory', language 'en', branch 'MOODLE_22_STABLE'
 *
 * @package    tool
 * @subpackage uploadcoursecategory
 * @copyright  2011 Petr Skoda {@link http://skodak.org}
 * @copyright  2012 Piers Harding
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['allowdeletes'] = 'Allow deletes';
$string['allowrenames'] = 'Allow renames';
$string['csvdelimiter'] = 'CSV delimiter';
$string['defaultvalues'] = 'Default values';
$string['deleteerrors'] = 'Delete errors';
$string['encoding'] = 'Encoding';
$string['errors'] = 'Errors';
$string['nochanges'] = 'No changes';
$string['pluginname'] = 'Course category upload';
$string['renameerrors'] = 'Rename errors';
$string['requiredtemplate'] = 'Required. You may use template syntax here (%l = lastname, %f = firstname, %u = coursename). See help for details and examples.';
$string['rowpreviewnum'] = 'Preview rows';
$string['uploadpicture_badcoursefield'] = 'The course attribute specified is not valid. Please, try again.';
$string['uploadpicture_cannotmovezip'] = 'Cannot move zip file to temporary directory.';
$string['uploadpicture_cannotprocessdir'] = 'Cannot process unzipped files.';
$string['uploadpicture_cannotsave'] = 'Cannot save picture for course {$a}. Check original picture file.';
$string['uploadpicture_cannotunzip'] = 'Cannot unzip pictures file.';
$string['uploadpicture_invalidfilename'] = 'Picture file {$a} has invalid characters in its name. Skipping.';
$string['uploadpicture_overwrite'] = 'Overwrite existing course pictures?';
$string['uploadpicture_coursefield'] = 'Course attribute to use to match pictures:';
$string['uploadpicture_coursenotfound'] = 'Course with a \'{$a->coursefield}\' value of \'{$a->coursevalue}\' does not exist. Skipping.';
$string['uploadpicture_courseskipped'] = 'Skipping course {$a} (already has a picture).';
$string['uploadpicture_courseupdated'] = 'Picture updated for course {$a}.';
$string['uploadpictures'] = 'Upload course pictures';
$string['uploadpictures_help'] = 'Course pictures can be uploaded as a zip file of image files. The image files should be named chosen-course-attribute.extension, for example course1234.jpg for a course with coursename course1234.';
$string['uploadcoursecategories'] = 'Upload course categories';
$string['uploadcoursecategories_help'] = 'Courses may be uploaded (and optionally enrolled in courses) via text file. The format of the file should be as follows:

* Each line of the file contains one record
* Each record is a series of data separated by commas (or other delimiters)
* The first record contains a list of fieldnames defining the format of the rest of the file
* Required fieldnames are coursename, password, firstname, lastname, email';
$string['coursecategoryavailablenot'] = 'Catgeory hidden';
$string['coursecategoryavailability'] = 'Course category availabililty';
$string['coursecategoryavailability_help'] = 'Set whether the categories default to visible or hidden';
$string['coursecategoryavailable'] = 'Category available';
$string['uploadcoursecategoriespreview'] = 'Upload course categories preview';
$string['uploadcoursecategoriesresult'] = 'Upload course categories results';
$string['newcoursecategory'] = 'Course category added';
$string['coursecategoryupdated'] = 'Course category updated';
$string['coursecategoryuptodate'] = 'Course category up-to-date';
$string['coursecategorydeleted'] = 'Course category deleted';
$string['coursecategoryrenamed'] = 'Course category renamed';
$string['coursecategoriescreated'] = 'Course categories created';
$string['coursecategoriesdeleted'] = 'Course categories deleted';
$string['coursecategoriesrenamed'] = 'Course categories renamed';
$string['coursecategoriesskipped'] = 'Course categories skipped';
$string['coursecategoriesupdated'] = 'Course categories updated';
$string['coursecategorynotadded'] = 'Course category not added - already exists';
$string['coursecategorynotaddederror'] = 'Course category not added - error';
$string['coursecategorynotdeletederror'] = 'Course category not deleted - error';
$string['coursecategorynotdeletedmissing'] = 'Course category not deleted - missing';
$string['coursecategorynotdeletedoff'] = 'Course category not deleted - delete off';
$string['coursecategorynotdeletedadmin'] = 'Course category not deleted - no admin access';
$string['coursecategorynotupdatederror'] = 'Course category not updated - error';
$string['coursecategorynotupdatednotexists'] = 'Course category not updated - does not exist';
$string['coursecategorynotupdatedadmin'] = 'Course category not updated - no admin';
$string['coursecategorynotrenamedexists'] = 'Course category not renamed - target exists';
$string['coursecategorynotrenamedmissing'] = 'Course category not renamed - source missing';
$string['coursecategorynotrenamedoff'] = 'Course category not renamed - renaming off';
$string['coursecategorynotrenamedadmin'] = 'Course category not renamed - no admin';
$string['invalidvalue'] = 'Invalid value for field {$a}';
$string['namecoursecategory'] = 'Name';
$string['oldnamecoursecategory'] = 'Old name';
$string['namecoursecategory_help'] = 'The name of the category is displayed in the navigation. You may use template syntax here (%f = fullname, %i = idnumber), or enter an initial value that is incremented. See help for details and examples.';
$string['idnumbernotunique'] = 'idnumber is not unique';
$string['ccbulk'] = 'Select for bulk operations';
$string['ccbulkall'] = 'All Course categories';
$string['ccbulknew'] = 'New Course categories';
$string['ccbulkupdated'] = 'Updated Course categories';
$string['cccsvline'] = 'CSV line';
$string['cclegacy1role'] = '(Original Student) typeN=1';
$string['cclegacy2role'] = '(Original Teacher) typeN=2';
$string['cclegacy3role'] = '(Original Non-editing teacher) typeN=3';
$string['ccnoemailduplicates'] = 'Prevent email address duplicates';
$string['ccoptype'] = 'Upload type';
$string['ccoptype_addinc'] = 'Add all, append number to names if needed';
$string['ccoptype_addnew'] = 'Add new only, skip existing Course categories';
$string['ccoptype_addupdate'] = 'Add new and update existing Course categories';
$string['ccoptype_update'] = 'Update existing Course categories only';
$string['ccpasswordcron'] = 'Generated in cron';
$string['ccpasswordnew'] = 'New course password';
$string['ccpasswordold'] = 'Existing course password';
$string['ccstandardnames'] = 'Standardise names';
$string['ccupdateall'] = 'Override with file and defaults';
$string['ccupdatefromfile'] = 'Override with file';
$string['ccupdatemissing'] = 'Fill in missing from file and defaults';
$string['ccupdatetype'] = 'Existing category details';
$string['ccnametemplate'] = 'Name template';
$string['ccfullnametemplate'] = 'Fullname template';
$string['ccidnumbertemplate'] = 'Idnumber template';
$string['missingtemplate'] = 'Template not found';
$string['incorrecttemplatefile'] = 'Template file not found';
$string['coursetemplatename'] = 'Course template name';
$string['coursetemplatename_help'] = 'Select an existing course name to use as a template for the creation of all Course categories.';
$string['templatefile'] = 'Template backup file';
$string['invalidbackupfile'] = 'Invalid backup file';

