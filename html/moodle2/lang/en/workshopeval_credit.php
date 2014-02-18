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
 * Strings for component 'workshopeval_credit', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopeval_credit
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['mode'] = 'Evaluation mode';
$string['modeall'] = 'All or nothing';
$string['mode_desc'] = 'Default grading evaluation mode used by the _Participation credit_ method.';
$string['mode_help'] = 'The mode determines how grades for assessment are calculated.

* All or nothing - The reviewer must assess all allocated submissions in order to obtain the maximum grade; otherwise they receive a grade of zero.
* Proportional - The grade obtained is proportional to the number of assessments. If all allocated submissions are assessed, the reviewer will obtain the maximum grade; if half of the allocated submissions are assessed, the reviewer will obtain 50% of the maximum grade.
* At least one - The reviewer must assess at least one allocated submission in order to obtain the maximum grade.';
$string['modeone'] = 'At least one';
$string['modeproportional'] = 'Proportional';
$string['pluginname'] = 'Participation credit';
