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
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot.'/mod/qv/lib.php');

    $settings->add(new admin_setting_configtext('qv_distpluginappl', get_string('qv_distpluginappl', 'qv'),
                       get_string('qv_distpluginappl_help', 'qv'), QV_DEFAULT_DISTAPPL, PARAM_URL, 60));

    $settings->add(new admin_setting_configtext('qv_distpluginscripts', get_string('qv_distpluginscripts', 'qv'),
                       get_string('qv_distpluginscripts_help', 'qv'), QV_DEFAULT_DISTSCRIPTS, PARAM_URL, 60));

    $settings->add(new admin_setting_configtext('qv_distplugincss', get_string('qv_distplugincss', 'qv'),
                       get_string('qv_distplugincss_help', 'qv'), QV_DEFAULT_DISTCSS, PARAM_URL, 60));

    $settings->add(new admin_setting_configtext('qv_skins', get_string('qv_skins', 'qv'),
                       get_string('qv_skins_help', 'qv'), QV_DEFAULT_SKINS, PARAM_TEXT));

}

