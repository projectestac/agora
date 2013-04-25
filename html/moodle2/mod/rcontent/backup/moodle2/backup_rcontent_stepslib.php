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
 * @package moodlecore
 * @subpackage backup-moodle2
 * @copyright 2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define all the backup steps that will be used by the backup_rcontent_activity_task
 */

/**
 * Define the complete rcontent structure for backup, with file and id annotations
 */
class backup_rcontent_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $rcontent = new backup_nested_element('rcontent', array('id'), array(
            'course', 'name', 'summary', 'levelid',
            /*'bookid', 'unitid', 'activityid',*/ 'whatgrade',
            'popup', 'popup_options', 'frame', 'width',
            'height', 'timecreated', 'timemodified', 'levelcode', 'isbn', 'unitcode', 'activitycode'));

        $grades = new backup_nested_element('grades');

        $grade = new backup_nested_element('grade', array('id'), array(
            'userid', 'rcontentid', /*'unitid', 'activityid',*/
            'grade', 'mingrade', 'maxgrade', 'attempt', 'maxattempts',
            'starttime', 'totaltime', 'maxtotaltime', 'status',
            'comments', 'urlviewresults', 'sumweights', 
            'timecreated', 'timemodified', 'unitcode', 'activitycode'));

        $grades_details = new backup_nested_element('grades_details');

        $grade_detail = new backup_nested_element('grade_detail', array('id'), array(
            'userid', 'rcontentid', /*'unitid', 'activityid',*/ 'code',
            'typeid', 'description', 'grade', 'mingrade', 'maxgrade',
            'starttime', 'totaltime', 'maxtotaltime', 'attempt', 'maxattempts',
            'weight', 'urlviewresults', 'timecreated', 'timemodified', 'unitcode', 'activitycode'));

        $track_credentials = new backup_nested_element('track_credentials');

        $track_credential = new backup_nested_element('track_credential', array('id'), array(
            'username', 'password', 'publisherid', 'timecreated', 'timemodified'));

        // Build the tree
        $rcontent->add_child($grades);
        $grades->add_child($grade);

        $grade->add_child($grades_details);
        $grades_details->add_child($grade_detail);

        $rcontent->add_child($track_credentials);
        $track_credentials->add_child($track_credential);

        // Define sources
        //$rcontent->set_source_table('rcontent', array('id' => backup::VAR_ACTIVITYID));
        $rcontent->set_source_sql('SELECT rc.*,rlevel.code as levelcode, rcb.isbn as isbn, unit.code as unitcode, activity.code as activitycode
              FROM {rcontent} rc
              LEFT outer JOIN {rcommon_level} rlevel on rlevel.id=rc.levelid
              LEFT outer JOIN {rcommon_books} rcb on rcb.id=rc.bookid and rcb.levelid=rc.levelid
              LEFT outer JOIN {rcommon_books_units} unit on unit.id=rc.unitid and unit.bookid=rc.bookid 
              LEFT outer JOIN {rcommon_books_activities} activity on activity.id=rc.activityid and activity.bookid=rc.bookid and activity.unitid = rc.unitid
             WHERE rc.id = ?', array(backup::VAR_ACTIVITYID));

        // Use set_source_sql for other calls as set_source_table returns records in reverse order
        // and order is important for several rcontent fields - esp rcontent_scoes.
        $grade->set_source_sql('
                SELECT rg.*, unit.code as unitcode, activity.code as activitycode
                FROM {rcontent_grades} rg
                INNER JOIN {rcontent} rc ON rc.id=rg.rcontentid
                LEFT outer JOIN {rcommon_books_units} unit on unit.id=rc.unitid and unit.bookid=rc.bookid 
                LEFT outer JOIN {rcommon_books_activities} activity on activity.id=rc.activityid and activity.bookid=rc.bookid and activity.unitid = rc.unitid
                WHERE rg.rcontentid = :rcontent
                ORDER BY rg.id',
            array('rcontent' => backup::VAR_PARENTID));

        $grade_detail->set_source_sql('
                SELECT rc.*, unit.code as unitcode, activity.code as activitycode
                FROM {rcontent_grades_details} rg
                INNER JOIN {rcontent} rc ON rc.id=rg.rcontentid
                LEFT outer JOIN {rcommon_books_units} unit on unit.id=rc.unitid and unit.bookid=rc.bookid 
                LEFT outer JOIN {rcommon_books_activities} activity on activity.id=rc.activityid and activity.bookid=rc.bookid and activity.unitid = rc.unitid                
                WHERE rg.rcontentid = :rcontent
                ORDER BY rg.id',
            array('rcontent' => backup::VAR_PARENTID));

        
        $track_credentials->set_source_sql('
                SELECT *
                FROM {rcontent_track_credentials}
                ORDER BY id',
            array());
        
        // Define id annotations
        $grade->annotate_ids('user', 'userid');
        $grade_detail->annotate_ids('user', 'userid');

        // Define file annotations
        $rcontent->annotate_files('mod_rcontent', 'summary', null); // This file area hasn't itemid

        // Return the root element (rcontent), wrapped into standard activity structure
        return $this->prepare_activity_structure($rcontent);
    }
}
