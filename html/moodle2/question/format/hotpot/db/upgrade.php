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
 * Calculated question type upgrade code.
 *
 * @package    qformat
 * @subpackage hotpot
 * @copyright  2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade code for the hotpot question format.
 * @param int $oldversion the version we are upgrading from
 * @return boolean true/false
 */
function xmldb_qformat_hotpot_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    // convert lowercase answer types to UPPERCASE
    // in "multianswer" questions (= close questions)

    $newversion = 2010112413;
    if ($oldversion < $newversion) {

        if ($DB->sql_regex_supported()) {
            $REGEX = $DB->sql_regex();
            $select = "qtype $REGEX ? AND questiontext $REGEX ?";
            $params = array('(multianswer|multichoice|shortanswer)', '[0-9]+:(multianswer|multichoice|shortanswer):');
        } else {
            $questiontext_LIKE = $DB->sql_like('questiontext', '?');
            $select = "(qtype = ? AND $questiontext_LIKE) OR (qtype = ? AND $questiontext_LIKE) OR (qtype = ? AND $questiontext_LIKE)";
            $params = array('multianswer', '%:multianswer:%', 'multichoice', '%:multichoice:%', 'shortanswer', '%:shortanswer:%');
        }

        $search = array(':multianswer:', ':multichoice:', ':shortanswer:');
        $replace = array(':MULTICHOICE:', ':MULTICHOICE:', ':SHORTANSWER:');

        $fields = 'id,questiontext,qtype';
        $limitfrom = 0;
        $limitnum = 1000;

        while ($questions = $DB->get_records_select('question', $select, $params, '', $fields, $limitfrom, $limitnum)) {
            foreach ($questions as $question) {
                $count = 0;
                $questiontext = str_replace($search, $replace, $question->questiontext, $count);
                if ($count) {
                    $DB->set_field('question', 'questiontext', $questiontext, array('id' => $question->id));
                }
            }
            $limitfrom += $limitnum;
        }

        upgrade_plugin_savepoint(true, "$newversion", 'qformat', 'hotpot');
    }

    return true;
}
