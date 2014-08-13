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
 * Utility functions.
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Standard cron function
 */
function tool_odisseagtafsync_cron() {
    $settings = get_config('tool_odisseagtafsync');

    if (empty($settings->ftphost)) {
        return;
    }

    try {
       	require_once ('locallib.php');
    	$synchro = new odissea_gtaf_synchronizer(true);
    	//call synchro
        $results = $synchro->synchro();
        //print result
        if (!empty($results)) {
            foreach ($results as $result){
                mtrace(' '.$result);
            }
        }
    } catch (Exception $e) {
        mtrace('odisseagtafsync: tool_odisseagtafsync_cron() failed with an exception:');
        mtrace($e->getMessage());
    }
}