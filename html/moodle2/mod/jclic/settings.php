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
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot.'/mod/jclic/lib.php');

    $settings->add(new admin_setting_configtext('jclic_jarbase', get_string('jclicjarbase', 'jclic'),
                       get_string('jclicjarbase_help', 'jclic'), JCLIC_DEFAULT_JARBASE, PARAM_URL, 60));

    $settings->add(new admin_setting_configtext('jclic_lap', get_string('lap', 'jclic'),
                       get_string('lap_help', 'jclic'), JCLIC_DEFAULT_LAP, PARAM_INT));
    
}

