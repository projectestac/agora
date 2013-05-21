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
 * Sets up the tabs used by the rscorm pages based on the users capabilities.
 *
 * @author Dan Marsden and others.
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package rscorm
 */

if (empty($scorm)) {
    error('You cannot call this script in that way');
}
if (!isset($currenttab)) {
    $currenttab = '';
}
if (!isset($cm)) {
    $cm = get_coursemodule_from_instance('rscorm', $scorm->id);
}

$contextmodule = get_context_instance(CONTEXT_MODULE, $cm->id);

$tabs = array();
$row = array();
$inactive = array();
$activated = array();

if (has_capability('mod/rscorm:savetrack', $contextmodule)) {
    $row[] = new tabobject('info', "$CFG->wwwroot/mod/rscorm/view.php?id=$cm->id", get_string('info', 'rscorm'));
}
if (has_capability('mod/rscorm:viewreport', $contextmodule)) {
    $row[] = new tabobject('reports', "$CFG->wwwroot/mod/rscorm/report.php?id=$cm->id", get_string('reports', 'rscorm'));
}

if ($currenttab == 'info' && count($row) == 1) {
    // Don't show only an info tab (e.g. to students).
} else {
    $tabs[] = $row;
}

if ($currenttab == 'reports' && !empty($reportlist) && count($reportlist) > 1) {
    $row2 = array();
    foreach ($reportlist as $rep) {
        $row2[] = new tabobject('rscorm_'.$rep, $CFG->wwwroot."/mod/rscorm/report.php?id=$cm->id&mode=$rep", get_string('pluginname', 'rscormreport_'.$rep));
    }
    $tabs[] = $row2;
}

print_tabs($tabs, $currenttab, $inactive, $activated);
