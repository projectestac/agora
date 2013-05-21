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
 * Define all the restore steps that will be used by the restore_rscorm_activity_task
 */

/**
 * Structure step to restore one rscorm activity
 */
class restore_rscorm_activity_structure_step extends restore_activity_structure_step {

    protected function define_structure() {

        $paths = array();
        $userinfo = $this->get_setting_value('userinfo');

        $paths[] = new restore_path_element('rscorm', '/activity/rscorm');
        $paths[] = new restore_path_element('rscorm_sco', '/activity/rscorm/scoes/sco');
        
        // MARSUPIAL ********** AFEGIT -> Backup table scoes_user
        // 2012.12.09 @abertranb
        $paths[] = new restore_path_element('rscorm_sco_user', '/activity/rscorm/scoes/sco/sco_users/sco_user');
        // ********** FI
        
        $paths[] = new restore_path_element('rscorm_sco_data', '/activity/rscorm/scoes/sco/sco_datas/sco_data');
        $paths[] = new restore_path_element('rscorm_seq_objective', '/activity/rscorm/scoes/sco/seq_objectives/seq_objective');
        $paths[] = new restore_path_element('rscorm_seq_rolluprule', '/activity/rscorm/scoes/sco/seq_rolluprules/seq_rolluprule');
        $paths[] = new restore_path_element('rscorm_seq_rolluprulecond', '/activity/rscorm/scoes/sco/seq_rollupruleconds/seq_rolluprulecond');
        $paths[] = new restore_path_element('rscorm_seq_rulecond', '/activity/rscorm/scoes/sco/seq_ruleconds/seq_rulecond');
        $paths[] = new restore_path_element('rscorm_seq_rulecond_data', '/activity/rscorm/scoes/sco/seq_rulecond_datas/seq_rulecond_data');

        $paths[] = new restore_path_element('rscorm_seq_mapinfo', '/activity/rscorm/scoes/sco/seq_objectives/seq_objective/seq_mapinfos/seq_mapinfo');
        if ($userinfo) {
            $paths[] = new restore_path_element('rscorm_sco_track', '/activity/rscorm/scoes/sco/sco_tracks/sco_track');
        }

        // Return the paths wrapped into standard activity structure
        return $this->prepare_activity_structure($paths);
    }

    protected function process_rscorm($data) {
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
        $bookid = '';
        $isbn = isset($data->isbn)?$data->isbn:'' ;
        if(!$book=$DB->get_record('rcommon_books',array('isbn'=>$isbn))){
            $this->get_logger()->process("Book $booktype: $isbn not found in bd for activity name: ".$data->name
            ,backup::LOG_ERROR);
        }else{
            $booktype='id';
            $bookid=$book->id;
        }
        $data->bookid = $bookid;
        
        $unittype='code';
        $unitcode=$data->unitcode;
        $unitid = 0;
        if($unitcode!=''){
            if(!$unit=$DB->get_record('rcommon_books_units',array('bookid'=>$bookid,'code'=>$unitcode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Unit $unittype: $unitcode not found in bd for book $booktype: $bookid on activity name: ".$data->name
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
            if(!$activity=$DB->get_record('rcommon_books_activities',array('bookid'=>$bookid,'unitid'=>$unitid,'code'=>$activitycode))){
                //mostramos mensaje de error
                $this->get_logger()->process("Activity code: $activitycode not found in bd for book $booktype: $bookid and unit $unittype: $unitid on activity name: ".$data->name
                ,backup::LOG_ERROR);
            }else{
                $activityid=$activity->id;
            }
        
        }
        $data->activityid = $activityid;

        $data->course = $this->get_courseid();

        $data->timeopen = $this->apply_date_offset($data->timeopen);
        $data->timeclose = $this->apply_date_offset($data->timeclose);
        $data->timemodified = $this->apply_date_offset($data->timemodified);

        // insert the scorm record
        $newitemid = $DB->insert_record('rscorm', $data);
        // immediately after inserting "activity" record, call this
        $this->apply_activity_instance($newitemid);
    }

    protected function process_rscorm_sco($data) {
        global $DB;

        $data = (object)$data;

        $oldid = isset($data->id)?$data->id:'';
        $data->scorm = $this->get_new_parentid('rscorm');
        
        // MARSUPIAL ********** ELIMINAT -> if get this value delete because is related to user
        // 2013.03.22 @abertranb
        //if (!isset($data->launch))
        // *********** FI
        $data->launch = '';

        $newitemid = $DB->insert_record('rscorm_scoes', $data);
        $this->set_mapping('rscorm_sco', $oldid, $newitemid);
    }

    protected function process_rscorm_sco_data($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');

        $newitemid = $DB->insert_record('rscorm_scoes_data', $data);
        // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }
    
    // MARSUPIAL ********** AFEGIT -> Backup table scoes_user
    // 2012.12.09 @abertranb
    protected function process_rscorm_sco_user($data) {
    global $DB;
    
        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');
    
        $newitemid = $DB->insert_record('rscorm_scoes_users', $data);
            // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }
    // ********** FI
    

    protected function process_rscorm_seq_objective($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');

        $newitemid = $DB->insert_record('rscorm_seq_objective', $data);
        $this->set_mapping('rscorm_seq_objective', $oldid, $newitemid);
    }

    protected function process_rscorm_seq_rolluprule($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');

        $newitemid = $DB->insert_record('rscorm_seq_rolluprule', $data);
        $this->set_mapping('rscorm_seq_rolluprule', $oldid, $newitemid);
    }

    protected function process_rscorm_seq_rolluprulecond($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');
        $data->ruleconditions = $this->get_new_parentid('rscorm_seq_rolluprule');

        $newitemid = $DB->insert_record('rscorm_seq_rolluprulecond', $data);
        // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }

    protected function process_rscorm_seq_rulecond($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');

        $newitemid = $DB->insert_record('rscorm_seq_ruleconds', $data);
        $this->set_mapping('rscorm_seq_ruleconds', $oldid, $newitemid);
    }

    protected function process_rscorm_seq_rulecond_data($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');
        $data->ruleconditions = $this->get_new_parentid('rscorm_seq_ruleconds');

        $newitemid = $DB->insert_record('rscorm_seq_rulecond', $data);
        // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }



    protected function process_rscorm_seq_mapinfo($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scoid = $this->get_new_parentid('rscorm_sco');
        $data->objectiveid = $this->get_new_parentid('rscorm_seq_objective');
        $newitemid = $DB->insert_record('rscorm_scoes_data', $data);
        // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }

    protected function process_rscorm_sco_track($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->scormid = $this->get_new_parentid('rscorm');
        $data->scoid = $this->get_new_parentid('rscorm_sco');
        $data->userid = $this->get_mappingid('user', $data->userid);
        $data->timemodified = $this->apply_date_offset($data->timemodified);

        $newitemid = $DB->insert_record('rscorm_scoes_track', $data);
        // No need to save this mapping as far as nothing depend on it
        // (child paths, file areas nor links decoder)
    }

    protected function after_execute() {
        // Add scorm related files, no need to match by itemname (just internally handled context)
        $this->add_related_files('mod_rscorm', 'intro', null);
        $this->add_related_files('mod_rscorm', 'content', null);
        $this->add_related_files('mod_rscorm', 'package', null);
    }
}
