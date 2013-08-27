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
 * Defines the renderer for the odisseagtafsync tool.
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class tool_odisseagtafsync_renderer extends plugin_renderer_base {

    public function sync_page($run, $results, $errors) {
        $output = '';
        $output .= $this->header();
        $output .= $this->heading(get_string('pluginname', 'tool_odisseagtafsync'));
        if (!empty($errors)){
            $strerror = implode('<br/><br/>', $errors);
            $output .= '<br/>';
            $output .= $this->notification($strerror);
        }
        if (!empty($results)){
            foreach ($results as $result){
                if (!empty($result)) {
                    $output .= $this->box($result);
                }
            }
        } else{
            if ($run == 1) { // Synchronize
                $output .=  '<p><br/>';
                $output .= get_string('nosyncfiles', 'tool_odisseagtafsync');
                $output .=  '</p>';
            }
        }
        
        $output .= $this->back_to_index();
        $output .= $this->footer();
        return $output;
    }

    public function process_csv_page($file, $response, $params) {
        extract($params);
        
        $output = '';
        $output .= $this->heading($file);
        if (!empty($response)) $output .= '<br/>'.$this->container($response[1]);
        $output .= $this->box_start('boxwidthnormal boxaligncenter generalbox', 'uploadresults');
        $output .=  '<p>';
        if ($optype != UU_USER_UPDATE) {
            $output .=  get_string('userscreated', 'tool_uploaduser').': '.$usersnew.'<br />';
        }
        if ($optype == UU_USER_UPDATE or $optype == UU_USER_ADD_UPDATE) {
            $output .=  get_string('usersupdated', 'tool_uploaduser').': '.$usersupdated.'<br />';
        }
        if ($allowdeletes) {
            $output .=  get_string('usersdeleted', 'tool_uploaduser').': '.$deletes.'<br />';
            $output .=  get_string('deleteerrors', 'tool_uploaduser').': '.$deleteerrors.'<br />';
        }
        if ($allowrenames) {
            $output .=  get_string('usersrenamed', 'tool_uploaduser').': '.$renames.'<br />';
            $output .=  get_string('renameerrors', 'tool_uploaduser').': '.$renameerrors.'<br />';
        }
        if ($usersskipped) {
            $output .=  get_string('usersskipped', 'tool_uploaduser').': '.$usersskipped.'<br />';
        }
        $output .=  get_string('usersweakpassword', 'tool_uploaduser').': '.$weakpasswords.'<br />';
        $output .=  get_string('errors', 'tool_uploaduser').': '.$userserrors;
        $output .=  '</p>';
        $output .= $this->box_end();
        return $output;
    }
    
    public function prepare_enrolments_page($params) {
        extract($params);
        
        $output = '';
        $output .= $this->heading($file);
        $output .=  '<p><br/>';
        $output .=  get_string('preparedenrolmentsok', 'tool_odisseagtafsync', $flatfilelocation);
        $output .=  '</p>';
        return $output;
    }
    
    public function process_restore_file_page($params) {
        extract($params);
        
        $output = '';
        $output .= $this->heading($file);
        $output .=  '<p><br/>';
        $output .=  get_string('processrestorefileok', 'tool_odisseagtafsync');
        $output .=  '<br/><br/></p>';
        return $output;
    }
    
    
    /**
     * Render a link in a div, such as the 'Back to plugin main page' link.
     * @param $url the link URL.
     * @param $text the link text.
     * @return string html to output.
     */
    public function end_of_page_link($url, $text) {
        return html_writer::tag('div', html_writer::link($url ,$text),
                array('class' => 'mdl-align'));
    }

    /**
     * Output a link back to the plugin index page.
     * @return string html to output.
     */
    public function back_to_index() {
        global $CFG;
        
        return $this->end_of_page_link(new moodle_url('/'. $CFG->admin . '/tool/odisseagtafsync/index.php'),
                get_string('backtoindex', 'tool_odisseagtafsync'));
    }
    
}
