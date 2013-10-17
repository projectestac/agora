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
 * The main odisseagtafsync tool configuration forms
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


class tool_odisseagtafsync_config_form extends moodleform {
    public function definition() {
        global $CFG, $USER;
        
        $mform = $this->_form;
        
        // FTP configuration params
        $mform->addElement('header', 'settingsheader', get_string('configheader', 'tool_odisseagtafsync'));
        
        $mform->addElement('text', 'ftphost',
                get_string('ftphost', 'tool_odisseagtafsync'));

        $mform->addElement('text', 'ftpusername',
                get_string('username', 'tool_odisseagtafsync'));

        $mform->addElement('passwordunmask', 'ftppassword',
                get_string('password', 'tool_odisseagtafsync'));

        $mform->addElement('text', 'inputpath',
                get_string('inputpath', 'tool_odisseagtafsync'));
        $mform->addHelpButton('inputpath', 'inputpath', 'tool_odisseagtafsync');

        $mform->addElement('text', 'outputpath',
                get_string('outputfolderpath', 'tool_odisseagtafsync'));
        $mform->addHelpButton('outputpath', 'outputfolderpath', 'tool_odisseagtafsync');

        // Default import CSV parameters 
        $mform->addElement('header', 'defaultcsvheader', get_string('defaultcsvheader', 'tool_odisseagtafsync'));
        
        $choices = array(UU_USER_ADDNEW     => get_string('uuoptype_addnew', 'tool_uploaduser'),
                         UU_USER_ADDINC     => get_string('uuoptype_addinc', 'tool_uploaduser'),
                         UU_USER_ADD_UPDATE => get_string('uuoptype_addupdate', 'tool_uploaduser'),
                         UU_USER_UPDATE     => get_string('uuoptype_update', 'tool_uploaduser'));
        $mform->addElement('select', 'uutype', get_string('uuoptype', 'tool_uploaduser'), $choices);
        $mform->setDefault('uutype', UU_USER_ADD_UPDATE); 
        $mform->setAdvanced('uutype');
        
        $choices = array(UU_UPDATE_NOCHANGES    => get_string('nochanges', 'tool_uploaduser'),
                         UU_UPDATE_FILEOVERRIDE => get_string('uuupdatefromfile', 'tool_uploaduser'),
                         UU_UPDATE_ALLOVERRIDE  => get_string('uuupdateall', 'tool_uploaduser'),
                         UU_UPDATE_MISSING      => get_string('uuupdatemissing', 'tool_uploaduser'));
        $mform->addElement('select', 'uuupdatetype', get_string('uuupdatetype', 'tool_uploaduser'), $choices);
        $mform->setDefault('uuupdatetype', UU_UPDATE_FILEOVERRIDE);
        $mform->disabledIf('uuupdatetype', 'uutype', 'eq', UU_USER_ADDNEW);
        $mform->disabledIf('uuupdatetype', 'uutype', 'eq', UU_USER_ADDINC);
        $mform->setAdvanced('uuupdatetype');

        $mform->addElement('selectyesno', 'uunoemailduplicates', get_string('uunoemailduplicates', 'tool_uploaduser'));
        $mform->setDefault('uunoemailduplicates', 1);
        $mform->setAdvanced('uunoemailduplicates');

        $mform->addElement('selectyesno', 'uustandardusernames', get_string('uustandardusernames', 'tool_uploaduser'));
        $mform->setDefault('uustandardusernames', 1);
        $mform->setAdvanced('uustandardusernames');

        // roles selection
        $choices = uu_allowed_roles(true);

        $mform->addElement('select', 'uulegacy1', get_string('uulegacy1role', 'tool_uploaduser'), $choices);
        if ($studentroles = get_archetype_roles('student')) {
            foreach ($studentroles as $role) {
                if (isset($choices[$role->id])) {
                    $mform->setDefault('uulegacy1', $role->id);
                    break;
                }
            }
            unset($studentroles);
        }

        $mform->addElement('select', 'uulegacy2', get_string('uulegacy2role', 'tool_uploaduser'), $choices);
        if ($editteacherroles = get_archetype_roles('editingteacher')) {
            foreach ($editteacherroles as $role) {
                if (isset($choices[$role->id])) {
                    $mform->setDefault('uulegacy2', $role->id);
                    break;
                }
            }
            unset($editteacherroles);
        }

        $mform->addElement('select', 'uulegacy3', get_string('uulegacy3role', 'tool_uploaduser'), $choices);
        if ($teacherroles = get_archetype_roles('teacher')) {
            foreach ($teacherroles as $role) {
                if (isset($choices[$role->id])) {
                    $mform->setDefault('uulegacy3', $role->id);
                    break;
                }
            }
            unset($teacherroles);
        }
        
        
        // Default user values when they are empty after importing from CSV 
        $mform->addElement('header', 'defaultuserheader', get_string('defaultuserheader', 'tool_odisseagtafsync'));
        
        $choices = odissea_uu_supported_auths();
        $mform->addElement('select', 'auth', get_string('chooseauthmethod','auth'), $choices);
        $mform->setDefault('auth', 'odissea'); 
        
        $choices = array(0 => get_string('emaildisplayno'), 1 => get_string('emaildisplayyes'), 2 => get_string('emaildisplaycourse'));
        $mform->addElement('select', 'maildisplay', get_string('emaildisplay'), $choices);
        $mform->setDefault('maildisplay', 0);
        $mform->setAdvanced('maildisplay');

        $choices = array(0 => get_string('textformat'), 1 => get_string('htmlformat'));
        $mform->addElement('select', 'mailformat', get_string('emailformat'), $choices);
        $mform->setDefault('mailformat', 1);
        $mform->setAdvanced('mailformat');
        
        $choices = array(0 => get_string('emaildigestoff'), 1 => get_string('emaildigestcomplete'), 2 => get_string('emaildigestsubjects'));
        $mform->addElement('select', 'maildigest', get_string('emaildigest'), $choices);
        $mform->setDefault('maildigest', 2);
        $mform->setAdvanced('maildigest');

        $choices = array(1 => get_string('autosubscribeyes'), 0 => get_string('autosubscribeno'));
        $mform->addElement('select', 'autosubscribe', get_string('autosubscribe'), $choices);
        $mform->setDefault('autosubscribe', 1);
        $mform->setAdvanced('autosubscribe');

        $choices = array(1 => get_string('trackforumsyes'), 0 => get_string('trackforumsno'));
        $mform->addElement('select', 'trackforums', get_string('trackforums'), $choices);
        $mform->setDefault('trackforums', 1);
        $mform->setAdvanced('trackforums');

        $editors = editors_get_enabled();
        if (count($editors) > 1) {
            $choices = array();
            $choices['0'] = get_string('texteditor');
            $choices['1'] = get_string('htmleditor');
            $mform->addElement('select', 'htmleditor', get_string('textediting'), $choices);
            $mform->setDefault('htmleditor', 1);
        } else {
            $mform->addElement('hidden', 'htmleditor');
            $mform->setDefault('htmleditor', 1);
            $mform->setType('htmleditor', PARAM_INT);
        }
        $mform->setAdvanced('htmleditor');        

        $mform->addElement('select', 'country', get_string('selectacountry'), get_string_manager()->get_list_of_countries());
        if (empty($CFG->country)) {
            $mform->setDefault('country', $USER->country);
        } else {
            $mform->setDefault('country', $CFG->country);
        }
        
        $choices = get_list_of_timezones();
        $choices['99'] = get_string('serverlocaltime');
        $mform->addElement('select', 'timezone', get_string('timezone'), $choices);
        $mform->setDefault('timezone', $USER->timezone);
        $mform->setAdvanced('timezone');
        
        $mform->addElement('select', 'lang', get_string('preferredlanguage'), get_string_manager()->get_list_of_translations());
        $mform->setDefault('lang', $USER->lang);

        $this->add_action_buttons();        
    }
}


