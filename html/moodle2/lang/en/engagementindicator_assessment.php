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
 * Strings for component 'engagementindicator_assessment', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   engagementindicator_assessment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['dayslate'] = 'Days Late';
$string['dayslate_help'] = 'Number of days late that the assignment was
submitted.  This takes into account any overrides in place which effect the
user\'s due date..';
$string['localrisk'] = 'Local Risk';
$string['localrisk_help'] = 'The risk percentage of this assessment alone, out
of 100.  The local risk is multiplied by the assessment weighting to form the
Risk Contribution.';
$string['logic'] = 'Logic';
$string['logic_help'] = 'This field provides some insight into the logic used to
arrive at the Local Risk value.';
$string['overduegracedays'] = 'Overdue Grace Days';
$string['overduemaximumdays'] = 'Overdue Maximum Days';
$string['overduenotsubmittedweighting'] = 'Overdue Not Submitted Weighting';
$string['overduesubmittedweighting'] = 'Overdue Submitted Weighting';
$string['override'] = 'Override';
$string['override_help'] = 'Some assessment activities (ie: quiz) contain a
feature for configuring alternate due dates for individual users or groups of
users.  This field indicates that this user\'s due date was effected by an
override.';
$string['pluginname'] = 'Assessment Activity';
$string['riskcontribution'] = 'Risk Contribution';
$string['riskcontribution_help'] = 'The amount of risk this particular
assessment contributes to the overall risk returned for the Assessment
indicator.  This is formed by multiplying the Local Risk with the assessment
Weighting.  The Risk Contributions of each assessment are summed together to
form the overall risk for the indicator.';
$string['status'] = 'Status';
$string['status_help'] = 'Status indicates whether the user has submitted this
assessment or not.';
$string['weighting'] = 'Weighting';
$string['weighting_help'] = 'This figure shows the max grade of this assessment
as a percentage of total max grade for all assessments tracked by the Assessment
Indicator.  The local_weighting will be multiplied by this to form the risk
contribution.';
