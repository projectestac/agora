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
 * Strings for component 'engagementindicator_login', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   engagementindicator_login
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['eavgsessionlength'] = 'Expected average session length (seconds)';
$string['eloginspastweek'] = 'Expected logins in the past week';
$string['eloginsperweek'] = 'Expected logins per week';
$string['etimesincelast'] = 'Expected time since last login (seconds)';
$string['localrisk'] = 'Local Risk';
$string['localrisk_help'] = 'The risk percentage of this login alone, out
of 100.  The local risk is multiplied by the login weighting to form the
Risk Contribution.';
$string['logic'] = 'Logic';
$string['logic_help'] = 'This field provides some insight into the logic used to
arrive at the Local Risk value.';
$string['maxrisktitle'] = 'Never logged in';
$string['pluginname'] = 'Login Activity';
$string['reasonavgsessionlen'] = '0% risk for average session length lower than {$a} seconds. 100% for session length of 0.';
$string['reasonloginspastweek'] = '0% risk for more than {$a} logins a week. 100% for 0 logins in the past week.';
$string['reasonloginsperweek'] = '0% risk for logging in to the course >= {$a} times a week. 100% risk for 0 logins a week.';
$string['reasonnologin'] = 'This user has never logged into the course and so is at the maximum 100% risk.';
$string['reasontimesincelogin'] = '0% risk for last login to the course having just happened. Scaling to the max 100% risk after {$a} days.';
$string['riskcontribution'] = 'Risk Contribution';
$string['riskcontribution_help'] = 'The amount of risk this particular
login contributes to the overall risk returned for the Login
indicator.  This is formed by multiplying the Local Risk with the login
Weighting.  The Risk Contributions of each login are summed together to
form the overall risk for the indicator.';
$string['sessionlength'] = 'Session Length (seconds)';
$string['weighting'] = 'Weighting';
$string['weighting_help'] = 'This figure shows the amount this item
contributes towards the overall risk for the Login indicator.
The local risk will be multiplied by this to form the risk
contribution.';
