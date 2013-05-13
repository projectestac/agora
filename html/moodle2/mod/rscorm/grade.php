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
 * Redirect the user based on their capabilities to either a rscorm activity or to rscorm reports
 *
 * @package   mod_rscorm
 * @category  grade
 * @copyright 2010 onwards Dan Marsden
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");

$id   = required_param('id', PARAM_INT);          // Course module ID

if (! $cm = get_coursemodule_from_id('rscorm', $id)) {
    print_error('invalidcoursemodule');
}

if (! $scorm = $DB->get_record('rscorm', array('id'=>$cm->instance))) {
    print_error('invalidcoursemodule');
}

if (! $course = $DB->get_record('course', array('id'=> $scorm->course))) {
    print_error('coursemisconf');
}

//MARSUPIAL ********** MODIFICA - allow context course
// 2012.12.17 @abertranb
require_login($course);
// ********* ORIGINAL
//require_login($course, false, $cm);
// ********* FI
if (has_capability('mod/rscorm:viewreport', get_context_instance(CONTEXT_MODULE, $cm->id))) {
    redirect('report.php?id='.$cm->id);
} else {
    redirect('view.php?id='.$cm->id);
}
