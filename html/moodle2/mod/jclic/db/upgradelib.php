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
 * Resource module upgrade related helper functions
 *
 * @package    mod
 * @subpackage jclic
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot . '/mod/jclic/locallib.php');

/**
 * Migrate jclic package to new area if found
 *
 * @return
 */
function jclic_migrate_files() {
    global $CFG, $DB;

    $fs = get_file_storage();
    $sqlfrom = "FROM {jclic} j
                JOIN {modules} m ON m.name = 'jclic'
                JOIN {course_modules} cm ON (cm.module = m.id AND cm.instance = j.id)";
    $count = $DB->count_records_sql("SELECT COUNT('x') $sqlfrom");
    $rs = $DB->get_recordset_sql("SELECT j.id, j.url, j.course, cm.id AS cmid $sqlfrom ORDER BY j.course, j.id");
    if ($rs->valid()) {
        $pbar = new progress_bar('migratejclicfiles', 500, true);
        $i = 0;
        foreach ($rs as $jclic) {
            $i++;
            upgrade_set_timeout(180); // set up timeout, may also abort execution
            $pbar->update($i, $count, "Migrating jclic files - $i/$count.");

            $context       = context_module::instance($jclic->cmid);
            $coursecontext = context_course::instance($jclic->course);

            if (!jclic_is_valid_external_url($jclic->url)) {
                // first copy local files if found - do not delete in case they are shared ;-)
                $jclicfile = clean_param($jclic->url, PARAM_PATH);
                $pathnamehash = sha1("/$coursecontext->id/course/legacy/0/$jclicfile");
                if ($file = $fs->get_file_by_hash($pathnamehash)) {
                    $file_record = array('contextid'=>$context->id, 'component'=>'mod_jclic', 'filearea'=>'content',
                                         'itemid'=>0, 'filepath'=>'/');
                    try {
                        $fs->create_file_from_storedfile($file_record, $file);
                    } catch (Exception $x) {
                        // ignore any errors, we can not do much anyway
                    }
                    $jclic->url = $pathnamehash;
                } else {
                    $jclic->url = '';
                }
                $DB->update_record('jclic', $jclic);
            }
        }
    }
    $rs->close();
}