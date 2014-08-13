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
 * This file replaces the legacy STATEMENTS section in db/install.xml,
 * lib.php/modulename_install() post installation hook and partially defaults.php
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Post installation procedure
 *
 * @see upgrade_plugins_modules()
 */
function xmldb_jclic_install() {
    global $DB;

    $records = array(
        array_combine(array('setting_key', 'setting_value'), array('ALLOW_CREATE_GROUPS', 'false')),
        array_combine(array('setting_key', 'setting_value'), array('ALLOW_CREATE_USERS', 'false')),
        array_combine(array('setting_key', 'setting_value'), array('SHOW_GROUP_LIST', 'false')),
        array_combine(array('setting_key', 'setting_value'), array('SHOW_USER_LIST', 'false')),
        array_combine(array('setting_key', 'setting_value'), array('USER_TABLES', 'true')),
        array_combine(array('setting_key', 'setting_value'), array('TIME_LAP', '10'))
    );
    foreach ($records as $record) {
        $DB->insert_record('jclic_settings', $record, false);
    }
}
