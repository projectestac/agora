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
 * Defines the version of hotpot
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// prevent direct access to this script
defined('MOODLE_INTERNAL') || die();

if (isset($plugin) && is_object($plugin)) {
    // Moodle >= 2.5
    $saveplugin = null;
} else {
    // Moodle <= 2.4
    if (isset($plugin)) {
        $saveplugin = $plugin;
    } else {
        $saveplugin = false;
    }
    $plugin = new stdClass();
}

$plugin->cron      = 0;
$plugin->component = 'mod_hotpot';
$plugin->maturity  = MATURITY_STABLE; // ALPHA=50, BETA=100, RC=150, STABLE=200
$plugin->requires  = 2010112400;      // Moodle 2.0
$plugin->release   = '2014.07.02 (25)';
$plugin->version   = 2014070225;

// setup $module for Moodle <= 2.4
if (isset($saveplugin)) {
    $module = $plugin;
    if ($saveplugin) {
        $plugin = $saveplugin;
    } else {
        unset($plugin);
    }
}
unset($saveplugin);
