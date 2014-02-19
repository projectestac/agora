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
 * Strings for component 'auth_uniquelogin', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_uniquelogin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_uniquelogindescription'] = 'This login ensures thar each user only have one active session.<br /><br />
Every time a user makes a sucessfull login, all other session belonging to that user will be terminated.<br><br />
<div style="font-weight: bold;">Note 1: For this plugin to work, the user sessions mus be stored in database. This configuration is set in <a href="settings.php?section=sessionhandling">Sessions.</a></div><br />';
$string['auth_uniquelogintitle'] = 'Unique login';
$string['pluginname'] = 'Unique Login';
