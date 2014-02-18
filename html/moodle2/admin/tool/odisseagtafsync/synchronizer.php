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
 * Process run param and call synchro or move file depending of its value.
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


global $CFG, $PAGE;

require_once(dirname(__FILE__) . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once('locallib.php');


admin_externalpage_setup('odisseagtafsync');
$renderer = $PAGE->get_renderer('tool_odisseagtafsync');

if (empty($_REQUEST['run'])) {
    $result = get_string('norunspecified', 'tool_odisseagtafsync');
} else {
    //@TODO: Review renderer for cron
    $synchro = new odissea_gtaf_synchronizer();

    if ($_REQUEST['run'] == 1) {
        $result = $synchro->synchro();
    } else if ($_REQUEST['run'] == 2) {
        $result = $synchro->restore_file($_REQUEST['f']);
    }
}

echo $renderer->sync_page($_REQUEST['run'], $result, $synchro->errors);

