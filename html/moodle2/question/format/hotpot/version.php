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
 * Version information for the hotpot question format
 *
 * @package    qformat
 * @subpackage hotpot
 * @copyright  2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if (empty($plugin) || ! is_object($plugin)) {
    $plugin = new stdClass();
}

$plugin->component = 'qformat_hotpot';
$plugin->maturity  = MATURITY_STABLE; // = 200
$plugin->requires  = 2010112400; // Moodle 2.0
$plugin->release   = '2013.11.30 (15)';
$plugin->version   = 2013113015;

if (defined('ANY_VERSION')) {
    // Moodle >= 2.2
    $plugin->dependencies = array('mod_hotpot' => ANY_VERSION);
} else if (isset($mods) && empty($mods['hotpot'])) {
    // Moodle <= 2.1 admin has just logged in
    // moodle_needs_upgrading() in "lib/moodlelib.php"
    throw new moodle_exception('requiremodhotpot', 'qformat_hotpot', new moodle_url('/admin/index.php'), $CFG->dirroot);
} else if (isset($CFG) && ! file_exists($CFG->dirroot.'/mod/hotpot')) {
    // Moodle <= 2.1 installing new site
    // upgrade_plugins() in "lib/upgradelib.php"
    throw new moodle_exception('requiremodhotpot', 'qformat_hotpot', new moodle_url('/admin/index.php'), $CFG->dirroot);
}
