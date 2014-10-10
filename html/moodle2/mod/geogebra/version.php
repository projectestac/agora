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
 * Defines the version of geogebra
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

//$module->version   = 0;             // If version == 0 then module will not be installed
$module->version   = 2014052900;      // The current module version (Date: YYYYMMDDXX)
$module->requires  = 2011033009;      // Requires this Moodle version (2.0)
$module->cron      = 0;               // Period for cron to check this module (secs)
$module->component = 'mod_geogebra';  // To check on upgrade, that module sits in correct place
$module->release   = 'v0.2.6';        // Human-readable version name
$module->maturity = MATURITY_STABLE;      // How stable the plugin is
