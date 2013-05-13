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
 * Define all the restore steps that will be used by the restore_rcontent_activity_task
 */

/**
 * Structure step to restore one rcontent activity
 */
class restore_rcontent_activity_structure_step extends restore_activity_structure_step {
    
    var $current_book_id = null;
    var $current_isbn = null;

    protected function define_structure() {

        $paths = array();
        $userinfo = $this->get_setting_value('userinfo');

        $paths[] = new restore_path_element('rcontent', '/activity/rcontent');
        $paths[] = new restore_path_element('rcontent_grades', '/activity/rcontent/grades/grade');
        $paths[] = new restore_path_element('rcontent_grades_details', '/activity/rcontent/grades/grades_details/grade_detail');
        
        // Return the paths wrapped into standard activity structure
        return $this->prepare_activity_structure($paths);
    }

    protected function process_rcontent($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        
        $levelcode = $data->levelcode;
        if(!$level=$DB->get_record('rcommon_level',array('code'=>$levelcode))){
            //mostramos mensaje de error
            $this->get_logger()->process("Level code: $levelcode not found in bd for activity name: ".$data->name."!" 
                                          ,backup::LOG_ERROR);
        }
        $data->levelid = $level->id;
        
        $booktype='isbn';
        $this->current_book_id = '';
        $this->current_isbn = isset($data->isbn)?$data->isbn:'';
        if(!$book=$DB->get_record('rcommon_books',array('isbn'=>$this->current_isbn))){
            $this->get_logger()->process("Book $booktype: {$this->current_isbn} not found in bd for activity name: ".$data->name
                                        ,backup::LOG_ERROR);
        }else{
            $booktype='id';
            $this->current_book_id=$book->id;
        }
        $data->bookid = $this->current_book_id;
        
        $unittype='code';
        $unitcode=$data->unitcode;
        $unitid = 0;
        if($unitcode!=''){
            if(!$unit=$DB->get_record('rcommon_books_units',array('bookid'=>$this->current_book_id,'code'=>$unitcode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Unit $unittype: $unitcode not found in bd for book $booktype: {$this->current_book_id} on activity name: ".$data->name
                ,backup::LOG_ERROR);
            }else{
                $unittype='id';
                $unitid=$unit->id;
            }
            
        }
        $data->unitid = $unitid;
        
        $activitycode=$data->activitycode;
        $activityid = 0;
        if($activitycode!='' && $unitcode!=''){
            if(!$activity=$DB->get_record('rcommon_books_activities',array('bookid'=>$this->current_book_id,'unitid'=>$unitid,'code'=>$activitycode))){
                            //mostramos mensaje de error
             $this->get_logger()->process("Activity code: $activitycode not found in bd for book $booktype: {$this->current_book_id} and unit $unittype: $unitid on activity name: ".$data->name
                ,backup::LOG_ERROR);
            }else{
                $activityid=$activity->id;
            }
             
        }
        $data->activityid = $activityid;
        

        $data->course = $this->get_courseid();

        $data->timecreated = $this->apply_date_offset($data->timecreated);
        $data->timemodified = $this->apply_date_offset($data->timemodified);
        
        
        // insert the scorm record
        $newitemid = $DB->insert_record('rcontent', $data);
        // immediately after inserting "activity" record, call this
        $this->apply_activity_instance($newitemid);
    }

    protected function process_rcontent_grades($data) {
        global $DB;

        $data = (object)$data;

        $oldid = $data->id;
        $data->rcontentid = $this->get_new_parentid('rcontent');
        $unitcode=$data->unitcode;
        $unitid = 0;
        if($unitcode!=''){
            if(!$unit=$DB->get_record('rcommon_books_units',array('bookid'=>$this->current_book_id,'code'=>$unitcode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Unit $unitcode not found in bd for book {$this->current_isbn} (book id {$this->current_book_id}) processing grades "
                ,backup::LOG_ERROR);
                $unitid=0;
            }else{
                $unittype='id';
                $unitid=$unit->id;
            }
             
        }
        $data->unitid = $unitid;
        
        $activitycode=$data->activitycode;
        $activityid = 0;
        if($activitycode!='' && $unitcode!=''){
            if(!$activity=$DB->get_record('rcommon_books_activities',array('bookid'=>$this->current_book_id,'unitid'=>$unitid,'code'=>$activitycode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Activity code: $activitycode not found in bd for book {$this->current_isbn} (book id {$this->current_book_id}) and unit $unittype: $unitid on grades details"
                ,backup::LOG_ERROR);
                $activityid=0;
            }else{
                $activityid=$activity->id;
                
            }
        
        }
        $data->activityid = $activityid;
        

        $newitemid = $DB->insert_record('rcontent_grades', $data);
        $this->set_mapping('rcontent_grades', $oldid, $newitemid);
    }
    
    protected function process_rcontent_grades_details($data) {
        global $DB;
    
        $data = (object)$data;
    
        $oldid = $data->id;
        $data->rcontentid = $this->get_new_parentid('rcontent');
        $unitcode=$data->unitcode;
        $unitid = 0;
        if($unitcode!=''){
            if(!$unit=$DB->get_record('rcommon_books_units',array('bookid'=>$this->current_book_id,'code'=>$unitcode))){
                        //mostramos mensaje de error
                    $this->get_logger()->process("Unit: $unitcode not found in bd for book {$this->current_isbn} (book id {$this->current_book_id}) on processing grades details"
                        ,backup::LOG_ERROR);
                $unitid=0;
            }else{
                $unitid=$unit->id;
            }
        
        }
        $data->unitid = $unitid;
    
        $activitycode=$data->activitycode;
        $activityid = 0;
        if($activitycode!='' && $unitcode!=''){
            if(!$activity=$DB->get_record('rcommon_books_activities',array('bookid'=>$this->current_book_id,'unitid'=>$unitid,'code'=>$activitycode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Activity code: $activitycode not found in bd for book {$this->current_isbn} (book id {$this->current_book_id}) and unit: $unitid on processing grades details"
                ,backup::LOG_ERROR);
                $activityid=0;
            }else{
                $activityid=$activity->id;
            }
    
        }
        $data->activityid = $activityid;
            
        $newitemid = $DB->insert_record('rcontent_grades_details', $data);
        $this->set_mapping('rcontent_grades_details', $oldid, $newitemid);
    }
    
    protected function after_execute() {
        // Add scorm related files, no need to match by itemname (just internally handled context)
        $this->add_related_files('mod_rcontent', 'summary', null);
         
    }
}
