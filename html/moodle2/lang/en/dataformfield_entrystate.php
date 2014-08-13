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
 * Strings for component 'dataformfield_entrystate', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   dataformfield_entrystate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowedto'] = 'Allowed to';
$string['allowedto_help'] = 'Allowed to';
$string['alreadyinstate'] = 'The entry ({$a->entryid}) is already in the requested state {$a->newstate}.';
$string['incorrectstate'] = 'The requested state {$a} could not be found.';
$string['instatingdenied'] = 'You are not permitted to change the state of this entry.';
$string['notify'] = 'Notify';
$string['notify_help'] = 'Notify';
$string['pluginname'] = 'Entry state';
$string['state'] = 'State';
$string['statechanged'] = 'The state of entry id {$a->id} has changed from {$a->old} to {$a->new}.';
$string['stateicon'] = 'State Icon';
$string['stateicon_help'] = 'State Icon';
$string['states'] = 'States';
$string['states_help'] = 'State names, one per line. Example:<p>Draft<br />Submitted<br />Approved</p>The list of states should be saved before transitions can added.';
$string['transition'] = 'Transition';
$string['transition_help'] = 'A list of states that can be advanced to from this state. Each state in a new line.';
$string['transitions'] = 'Transitions';
