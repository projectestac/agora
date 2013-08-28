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
 * Provides support for the conversion of moodle1 backup to the moodle2 format
 *
 * @package    mod
 * @subpackage rcontent
 * @copyright  2012 Antoni Bertran <abertranb>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Rcontent conversion handler
 */
class moodle1_mod_rcontent_handler extends moodle1_mod_handler {

    /** @var moodle1_file_manager */
    protected $fileman = null;

    /** @var int cmid */
    protected $moduleid = null;

    /**
     * Declare the paths in moodle.xml we are able to convert
     *
     * The method returns list of {@link convert_path} instances.
     * For each path returned, the corresponding conversion method must be
     * defined.
     *
     * Note that the path /MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT does not
     * actually exist in the file. The last element with the module name was
     * appended by the moodle1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path('rcontent', '/MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT',
                array(
                    'renamefields' => array(
                        'bookid' => 'isbn'
                    )
                )
            ),
            new convert_path('rcontent_grades', '/MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT/GRADES/GRADE'),
            new convert_path('rcontent_grades_details', '/MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT/GRADES_DETAILS/GRADE_DETAIL',
                array(
                    'renamefields' => array(
                        'detailid' => 'code',
                        'detailtypeid' => 'typeid',
                    )
                )
            )
        );
    }

    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT
     * data available
     */
    public function process_rcontent($data) {
        global $CFG;
        // get the course module id and context id
        $instanceid     = $data['id'];
        $currentcminfo  = $this->get_cminfo($instanceid);
        $this->moduleid = $currentcminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // conditionally migrate to html format in summary
        if ($CFG->texteditors !== 'textarea') {
            $data['summary']       = text_to_html($data['summary'], false, false, true);
        }

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_rcontent');

        // convert course files embedded into the summary
        $this->fileman->filearea = 'summary';
        $this->fileman->itemid   = 0;
        $data['summary'] = moodle1_converter::migrate_referenced_files($data['summary'], $this->fileman);

        // check 1.9 version where backup was created
        $backupinfo = $this->converter->get_stash('backup_info');
        if ($backupinfo['moodle_version'] < 2007110503) {
            // as we have no module version data, assume $currmodule->version <= $module->version
            // - fix data as the source 1.9 build hadn't yet at time of backing up.
            if (isset($data['grademethod']))
                $data['grademethod'] = $data['grademethod']%10;
        }

        // start writing rcontent.xml
        $this->open_xml_writer("activities/rcontent_{$this->moduleid}/rcontent.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
            'modulename' => 'rcontent', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('rcontent', array('id' => $instanceid));

        foreach ($data as $field => $value) {
            /*if ($field == 'intro') {
                //changed from intro to summary
                $this->xmlwriter->full_tag('summary', $value);

            }
            else*/if ($field <> 'id') {
                $this->xmlwriter->full_tag($field, $value);
            }
        }
        
        $this->xmlwriter->begin_tag('grades');
        
        return $data;
    }
    
    
    /**
     * This is executed when finish grades
     * data available
     */
    /*public function on_rcontent_grades_end() {
        $this->xmlwriter->begin_tag('grades_details');
    }*/

    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT/GRADES/GRADE
     * data available
     */
    public function process_rcontent_grades($data) {
        $this->write_xml('grade', $data, array('/grade/id'));
    }
    
    /**
    * This is executed when the parser reaches the <GRADES_DETAILS> opening element
    */
    public function on_rcontent_grades_details_start() {
        $this->xmlwriter->begin_tag('grades_details');
    }
    
    /**
     * This is executed when the parser reaches the closing </GRADES_DETAILS> element
     */
    public function on_rcontent_grades_details_end() {
        $this->xmlwriter->end_tag('grades_details');
    }
    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/RCONTENT/GRADES/GRADE
     * data available
    */
    public function process_rcontent_grades_details($data) {
        $this->write_xml('grade_detail', $data, array('/grade_detail/id'));
    }
    
    /**
     * This is executed when we reach the closing </MOD> tag of our 'rcontent' path
     */
    public function on_rcontent_end() {
        // close rcontent.xml
        $this->xmlwriter->end_tag('grades'); //Changed structure from rcommon->grade and  rcommon->grades_details to  rcommon->grade->grades_details
        $this->xmlwriter->end_tag('rcontent');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml
        $this->open_xml_writer("activities/rcontent_{$this->moduleid}/inforef.xml");
        $this->xmlwriter->begin_tag('inforef');
        $this->xmlwriter->begin_tag('fileref');
        foreach ($this->fileman->get_fileids() as $fileid) {
            $this->write_xml('file', array('id' => $fileid));
        }
        $this->xmlwriter->end_tag('fileref');
        $this->xmlwriter->end_tag('inforef');
        $this->close_xml_writer();
    }
}
