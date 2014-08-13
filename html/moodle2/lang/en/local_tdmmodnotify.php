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
 * Strings for component 'local_tdmmodnotify', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   local_tdmmodnotify
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actioncreated'] = 'created';
$string['actionupdated'] = 'updated';
$string['messageprovider:digest'] = 'Course modification digest notification';
$string['pluginname'] = 'TDM: module modification notification';
$string['tdmmodnotify:receivedigest'] = 'Receive course modification digest notification';
$string['templatemessage'] = 'Hi {$a->firstname},

The following activities resources have changed in courses you\'re enrolled in.

{$a->notifications}

{$a->signoff}';
$string['templateresource'] = '* "{$a->modulename}" in "{$a->coursefullname}" was {$a->action}: {$a->url}';
$string['templatesubject'] = 'Resource updates in your courses';
