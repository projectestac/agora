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
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/geogebra/locallib.php');
 
/**
 * GeoGebra conversion handler
 */
class moodle1_mod_geogebra_handler extends moodle1_mod_handler {
 
    /**
     * Declare the paths in moodle.xml we are able to convert
     *
     * The method returns list of {@link convert_path} instances. For each path returned,
     * at least one of on_xxx_start(), process_xxx() and on_xxx_end() methods must be
     * defined. The method process_xxx() is not executed if the associated path element is
     * empty (i.e. it contains none elements or sub-paths only).
     *
     * Note that the path /MOODLE_BACKUP/COURSE/MODULES/MOD/GEOGEBRA does not
     * actually exist in the file. The last element with the module name was
     * appended by the moodle1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path(
                'geogebra', '/MOODLE_BACKUP/COURSE/MODULES/MOD/GEOGEBRA',
                array(
                    'newfields' => array(
                        'introformat' => 0,
                    ),
                )
            ),
        );         
    }
 
    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/GEOGEBRA
     * data available
     */
    public function process_geogebra($data) {
        // get the course module id and context id
        $instanceid     = $data['id'];
        $cminfo         = $this->get_cminfo($instanceid);
        $this->moduleid = $cminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_geogebra');

        // convert course files embedded into the intro
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $data['intro'] = moodle1_converter::migrate_referenced_files($data['intro'], $this->fileman);

        // migrate geogebra package file
        $this->fileman->filearea = 'content';
        $this->fileman->itemid   = 0;
        
        // Migrate file
        parse_str($data['url'], $parsedVarsURL);
        try{
            $this->fileman->migrate_file('course_files/'.$parsedVarsURL['filename']);            
        } catch (Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), ' File: \''.$parsedVarsURL['filename'].'\' (from URL \'',$data['url'], '\') on GeoGebra activity \''.$data['name'].'\' <br>';
        }
        // From Moodle 2, URL field only contains information about the GGB file location
        $data['url'] = $parsedVarsURL['filename'];
        
        if (strrpos($data['url'], '/') !== FALSE) {
            // Remove folder path to leave only file name
            $data['url']= substr($data['url'], strrpos($data['url'], '/')+1);
        }
        
        // Remove filename from parsedVarsURL array (to avoid save twice)
        unset($parsedVarsURL['filename']);
        // Store other attributes in the new param
        $data['attributes'] = http_build_query($parsedVarsURL, '', '&');
        
        
        // start writing geogebra.xml
        $this->open_xml_writer("activities/geogebra_{$this->moduleid}/geogebra.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
            'modulename' => 'geogebra', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('geogebra', array('id' => $instanceid));

        foreach ($data as $field => $value) {
            if ($field <> 'id') {
                $this->xmlwriter->full_tag($field, $value);
            }
        }

        return $data;
    }
 
    /**
     * This is executed when we reach the closing </MOD> tag of our 'geogebra' path
     */
    public function on_geogebra_end() {
        // finalize geogebra.xml
        $this->xmlwriter->end_tag('geogebra');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml
        $this->open_xml_writer("activities/geogebra_{$this->moduleid}/inforef.xml");
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