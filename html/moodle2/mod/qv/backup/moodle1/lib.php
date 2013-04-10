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
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/mod/qv/locallib.php');

/**
 * QV conversion handler
 */
class moodle1_mod_qv_handler extends moodle1_mod_handler {

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
     * Note that the path /MOODLE_BACKUP/COURSE/MODULES/MOD/QV does not
     * actually exist in the file. The last element with the module name was
     * appended by the moodle1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path('qv', '/MOODLE_BACKUP/COURSE/MODULES/MOD/QV',
                array(
                    'renamefields' => array(
                        'description' => 'intro',
                        'assessmenturl' => 'reference'
                    ),
                    'newfields' => array(
                        'introformat' => 0,
                        'grade' => 0,
                        'timeavailable' => 0,
                        'timedue' => 0,
                    ),
                )
            ),
        );         
    }
 
    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/QV
     * data available
     */
    public function process_qv($data) {
		global $CFG;
		
        // get the course module id and context id
        $instanceid     = $data['id'];
        $currentcminfo  = $this->get_cminfo($instanceid);
        $this->moduleid = $currentcminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // conditionally migrate to html format in intro
        if ($CFG->texteditors !== 'textarea') {
            $data['intro']       = text_to_html($data['intro'], false, false, true);
            $data['introformat'] = FORMAT_HTML;
        }

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_qv');

        // convert course files embedded into the intro
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $data['intro'] = moodle1_converter::migrate_referenced_files($data['intro'], $this->fileman);

        // migrate qv package file
        $this->fileman->filearea = 'package';
        $this->fileman->itemid   = 0;
        if (!qv_is_valid_external_url($data['reference']) ) {
            try{
				$base = $this->converter->get_tempdir_path().'/course_files';
				$last = strrpos($data['reference'], '/html/');
				$basepath = $base.'/'.substr($data['reference'], 0, $last+1);

				$filestemp = get_directory_list($basepath, '', false, true, true);
				$files = array();
				foreach ($filestemp as $file) {
					// Add zip paths and fs paths to all them
					$files[$file] = $basepath . $file;
				}
				
				$packer = get_file_packer('application/zip');
				$zipname = str_replace(' ','',$data['name']);
				$zipname = textlib::strtolower($zipname).'.qv.zip';
				check_dir_exists($base.'/qv_packs/', true, true);
				if($packer->archive_to_pathname($files,$base.'/qv_packs/'.$zipname)){
					$this->fileman->migrate_file('course_files/qv_packs/'.$zipname,'/',$zipname);
					$data['reference'] = $zipname;
				}
				else{
					echo 'Cannot zip files';
				}
            } catch (Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), ' File: \'',$data['reference'], '\' on QV activity \''.$data['name'].'\' <br>';
            }
        }
        
        // To avoid problems if maxgrade is null
        if ($data['maxgrade'] === NULL) $data['maxgrade'] = 100;
        // get grade value from maxgrade
        $data['grade'] = $data['maxgrade'];
        
        // start writing qv.xml
        $this->open_xml_writer("activities/qv_{$this->moduleid}/qv.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
            'modulename' => 'qv', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('qv', array('id' => $instanceid));

        foreach ($data as $field => $value) {
            if ($field <> 'id') {
                $this->xmlwriter->full_tag($field, $value);
            }
        }
        
        return $data;
    }
 
    /**
     * This is executed when we reach the closing </MOD> tag of our 'qv' path
     */
    public function on_qv_end() {
        // close qv.xml
        $this->xmlwriter->end_tag('qv');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml
        $this->open_xml_writer("activities/qv_{$this->moduleid}/inforef.xml");
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
