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
 * Version information for the calculated question type.
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
$plugin->release   = 'v2.0.13';
$plugin->requires  = 2010112400; // Moodle 2.0
$plugin->version   = 2010112413;
