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
 * @subpackage eoicampus
 * @copyright  2013 Antoni Bertran <abertranb>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Eoicampus conversion handler
 */
class moodle1_mod_eoicampus_handler extends moodle1_mod_handler {

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
     * Note that the path /MOODLE_BACKUP/COURSE/MODULES/MOD/EOICAMPUS does not
     * actually exist in the file. The last element with the module name was
     * appended by the moodle1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path('eoicampus', '/MOODLE_BACKUP/COURSE/MODULES/MOD/EOICAMPUS',
                array(
                    /*'newfields' => array(
                        'whatgrade' => 0,
                        'scormtype' => 'local',
                        'sha1hash' => null,
                        'revision' => '0',
                        'forcecompleted' => 1,
                        'forcenewattempt' => 0,
                        'lastattemptlock' => 0,
                        'displayattemptstatus' => 1,
                        'displaycoursestructure' => 1,
                        'timeopen' => '0',
                        'timeclose' => '0',
                        'introformat' => '0',
                    ),
                    'renamefields' => array(
                        'summary' => 'intro'
                    )*/
                )
            ),
        );
    }

    /**
     * This is executed every time we have one /MOODLE_BACKUP/COURSE/MODULES/MOD/EOICAMPUS
     * data available
     */
    public function process_eoicampus($data) {
        global $CFG;

        // get the course module id and context id
        $instanceid     = $data['id'];
        $currentcminfo  = $this->get_cminfo($instanceid);
        $this->moduleid = $currentcminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // conditionally migrate to html format in intro
        if ($CFG->texteditors !== 'textarea') {
            $data['description']       = text_to_html($data['description'], false, false, true);
        }

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_eoicampus');

        // convert course files embedded into the intro
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $data['description'] = moodle1_converter::migrate_referenced_files($data['description'], $this->fileman);

        // update scormtype (logic is consistent as done in eoicampus/db/upgrade.php)
/*        $ismanifest = preg_match('/imsmanifest\.xml$/', $data['reference']);
        $iszippif = preg_match('/.(zip|pif)$/', $data['reference']);
        $isurl = preg_match('/^((http|https):\/\/|www\.)/', $data['reference']);
        if ($isurl) {
            if ($ismanifest) {
                $data['scormtype'] = 'external';
            } else if ($iszippif) {
                $data['scormtype'] = 'localtype';
            }
        }
        // migrate scorm package file
        $this->fileman->filearea = 'package';
        $this->fileman->itemid   = 0;
        $this->fileman->migrate_file('course_files/'.$data['reference']);
*/
        // start writing eoicampus.xml
        $this->open_xml_writer("activities/eoicampus_{$this->moduleid}/eoicampus.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
            'modulename' => 'eoicampus', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('eoicampus', array('id' => $instanceid));

        foreach ($data as $field => $value) {
            if ($field == 'intro') {
                //changed from intro to summary
                $this->xmlwriter->full_tag('summary', $value);

            }
            elseif ($field <> 'id') {
                $this->xmlwriter->full_tag($field, $value);
            }
        }

       return $data;
    }


    /**
     * This is executed when we reach the closing </MOD> tag of our 'eoicampus' path
     */
    public function on_eoicampus_end() {
        // close scorm.xml
        $this->xmlwriter->end_tag('eoicampus');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml
        $this->open_xml_writer("activities/eoicampus_{$this->moduleid}/inforef.xml");
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
