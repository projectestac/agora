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
 * The form to move files from backup folder to pending directory
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

require_once($CFG->libdir . '/formslib.php');


class tool_odisseagtafsync_move_form extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $mform->disable_form_change_checker();
        
        $mform->addElement('header', 'settingsheader', get_string('movefileheader', 'tool_odisseagtafsync'));
        $mform->addElement('html', get_string('movefiledesc', 'tool_odisseagtafsync'));
        $mform->addElement('hidden', 'run', '2');
        $mform->addElement('text', 'f',
                get_string('movefilename', 'tool_odisseagtafsync'));
        $mform->addElement('submit', 'movefile',
                get_string('movefile', 'tool_odisseagtafsync')); /*, 
                array('onclick'=>'javascript:document.location="synchronizer.php?run=2&f="+document.getElementById("id_movefilename").value;'));*/
    }
}

