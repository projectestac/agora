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
 * Define all the backup steps that will be used by the backup_rscorm_activity_task
 */

/**
 * Define the complete rscorm structure for backup, with file and id annotations
 */
class backup_rscorm_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $scorm = new backup_nested_element('rscorm', array('id'), array(
            'name', 'levelid',
            /*'bookid', 'unitid', 'activityid', */'scormtype', 'intro',
            'introformat', 'version', 'maxgrade', 'grademethod',
            'whatgrade', 'maxattempt', 'forcecompleted', 'forcenewattempt',
            'lastattemptlock', 'displayattemptstatus', 'displaycoursestructure', 'updatefreq',
            'sha1hash', 'md5hash', 'revision', 'launch',
            'skipview', 'hidebrowse', 'hidetoc', 'hidenav',
            'auto', 'popup', 'options', 'width',
            'height', 'timeopen', 'timeclose', 'timemodified',
            'completionstatusrequired', 'completionscorerequired', 'levelcode', 'isbn', 'unitcode', 'activitycode'));

        $scoes = new backup_nested_element('scoes');

// MARSUPIAL ********** MODIFICAT - take out because launch is by user
        $sco = new backup_nested_element('sco', array('id'), array(
            'manifest', 'organization', 'parent', 'identifier',
             'scormtype', 'title'));
//********** ORIGINAL
        /*$sco = new backup_nested_element('sco', array('id'), array(
            'manifest', 'organization', 'parent', 'identifier',
            'launch', 'scormtype', 'title'));*/
//********* FI

        // MARSUPIAL ********** AFEGIT -> Backup table scoes_user
        // 2012.12.09 @abertranb
        $scousers = new backup_nested_element('sco_users');
        
        $scouser = new backup_nested_element('sco_user', array('id'), array(
        'scormid', 'userid', 'launch', 'timecreated', 'timemodified'));
        // ********** FI
        
        
        $scodatas = new backup_nested_element('sco_datas');

        $scodata = new backup_nested_element('sco_data', array('id'), array(
            'name', 'value'));

        $seqruleconds = new backup_nested_element('seq_ruleconds');

        $seqrulecond = new backup_nested_element('seq_rulecond', array('id'), array(
            'conditioncombination', 'ruletype', 'action'));

        $seqrulecondsdatas = new backup_nested_element('seq_rulecond_datas');

        $seqrulecondsdata = new backup_nested_element('seq_rulecond_data', array('id'), array(
            'refrencedobjective', 'measurethreshold', 'operator', 'cond'));

        $seqrolluprules = new backup_nested_element('seq_rolluprules');

        $seqrolluprule = new backup_nested_element('seq_rolluprule', array('id'), array(
            'childactivityset', 'minimumcount', 'minimumpercent', 'conditioncombination',
            'action'));

        $seqrollupruleconds = new backup_nested_element('seq_rollupruleconds');

        $seqrolluprulecond = new backup_nested_element('seq_rolluprulecond', array('id'), array(
            'cond', 'operator'));

        $seqobjectives = new backup_nested_element('seq_objectives');

        $seqobjective = new backup_nested_element('seq_objective', array('id'), array(
            'primaryobj', 'objectiveid', 'satisfiedbymeasure', 'minnormalizedmeasure'));

        $seqmapinfos = new backup_nested_element('seq_mapinfos');

        $seqmapinfo = new backup_nested_element('seq_mapinfo', array('id'), array(
            'targetobjectiveid', 'readsatisfiedstatus', 'readnormalizedmeasure', 'writesatisfiedstatus',
            'writenormalizedmeasure'));

        $scotracks = new backup_nested_element('sco_tracks');

        $scotrack = new backup_nested_element('sco_track', array('id'), array(
            'userid', 'attempt', 'element', 'value',
            'timemodified'));

        // Build the tree
        $scorm->add_child($scoes);
        $scoes->add_child($sco);

        // MARSUPIAL ********** AFEGIT -> Backup table scoes_user
        // 2012.12.09 @abertranb
        $sco->add_child($scousers);
        $scousers->add_child($scouser);
        // ********** FI
        
        $sco->add_child($scodatas);
        $scodatas->add_child($scodata);

        
        $sco->add_child($seqruleconds);
        $seqruleconds->add_child($seqrulecond);

        $seqrulecond->add_child($seqrulecondsdatas);
        $seqrulecondsdatas->add_child($seqrulecondsdata);

        $sco->add_child($seqrolluprules);
        $seqrolluprules->add_child($seqrolluprule);

        $seqrolluprule->add_child($seqrollupruleconds);
        $seqrollupruleconds->add_child($seqrolluprulecond);

        $sco->add_child($seqobjectives);
        $seqobjectives->add_child($seqobjective);

        $seqobjective->add_child($seqmapinfos);
        $seqmapinfos->add_child($seqmapinfo);

        $sco->add_child($scotracks);
        $scotracks->add_child($scotrack);

        // Define sources
        //$scorm->set_source_table('rscorm', array('id' => backup::VAR_ACTIVITYID));
        $scorm->set_source_sql('SELECT rc.*,rlevel.code as levelcode, rcb.isbn as isbn, unit.code as unitcode, activity.code as activitycode
                      FROM {rscorm} rc
                      LEFT outer JOIN {rcommon_level} rlevel on rlevel.id=rc.levelid
                      LEFT outer JOIN {rcommon_books} rcb on rcb.id=rc.bookid and rcb.levelid=rc.levelid
                      LEFT outer JOIN {rcommon_books_units} unit on unit.id=rc.unitid and unit.bookid=rc.bookid 
                      LEFT outer JOIN {rcommon_books_activities} activity on activity.id=rc.activityid and activity.bookid=rc.bookid and activity.unitid = rc.unitid
                     WHERE rc.id = ?', array(backup::VAR_ACTIVITYID));
        

        // Use set_source_sql for other calls as set_source_table returns records in reverse order
        // and order is important for several RSCORM fields - esp rscorm_scoes.
        $sco->set_source_sql('
                SELECT *
                FROM {rscorm_scoes}
                WHERE scorm = :rscorm
                ORDER BY id',
            array('rscorm' => backup::VAR_PARENTID));
        
        // MARSUPIAL ********** AFEGIT -> Backup table scoes_user
        // 2012.12.09 @abertranb 
        $scouser->set_source_sql('
                        SELECT *
                        FROM {rscorm_scoes_users}
                        WHERE scoid = :scoid
                        ORDER BY id',
        array('scoid' => backup::VAR_PARENTID));
        // ********** FI

        $scodata->set_source_sql('
                SELECT *
                FROM {rscorm_scoes_data}
                WHERE scoid = :scoid
                ORDER BY id',
            array('scoid' => backup::VAR_PARENTID));

        $seqrulecond->set_source_sql('
                SELECT *
                FROM {rscorm_seq_ruleconds}
                WHERE scoid = :scoid
                ORDER BY id',
            array('scoid' => backup::VAR_PARENTID));

        $seqrulecondsdata->set_source_sql('
                SELECT *
                FROM {rscorm_seq_rulecond}
                WHERE ruleconditionsid = :ruleconditionsid
                ORDER BY id',
            array('ruleconditionsid' => backup::VAR_PARENTID));

        $seqrolluprule->set_source_sql('
                SELECT *
                FROM {rscorm_seq_rolluprule}
                WHERE scoid = :scoid
                ORDER BY id',
            array('scoid' => backup::VAR_PARENTID));

        $seqrolluprulecond->set_source_sql('
                SELECT *
                FROM {rscorm_seq_rolluprulecond}
                WHERE rollupruleid = :rollupruleid
                ORDER BY id',
            array('rollupruleid' => backup::VAR_PARENTID));

        $seqobjective->set_source_sql('
                SELECT *
                FROM {rscorm_seq_objective}
                WHERE scoid = :scoid
                ORDER BY id',
            array('scoid' => backup::VAR_PARENTID));

        $seqmapinfo->set_source_sql('
                SELECT *
                FROM {rscorm_seq_mapinfo}
                WHERE objectiveid = :objectiveid
                ORDER BY id',
            array('objectiveid' => backup::VAR_PARENTID));

        // All the rest of elements only happen if we are including user info
        if ($userinfo) {
            $scotrack->set_source_sql('
                SELECT *
                FROM {rscorm_scoes_track}
                WHERE scoid = :scoid
                ORDER BY id',
                array('scoid' => backup::VAR_PARENTID));
        }

        // Define id annotations
        $scotrack->annotate_ids('user', 'userid');

        // Define file annotations
        $scorm->annotate_files('mod_rscorm', 'intro', null); // This file area hasn't itemid
        $scorm->annotate_files('mod_rscorm', 'content', null); // This file area hasn't itemid
        $scorm->annotate_files('mod_rscorm', 'package', null); // This file area hasn't itemid

        // Return the root element (rscorm), wrapped into standard activity structure
        return $this->prepare_activity_structure($scorm);
    }
}
