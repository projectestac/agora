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
 * Simple Topics course format.  Display the whole course as "Simple blocks" made of modules.
 * This format is based on "topics" format from Moodle 2.4
 *
 * @package    course/format
 * @subpackage Simple
 * @copyright 2012-2014 UPCnet
 * @author Pau Ferrer Ocaña pau.ferrer-ocana@upcnet.es
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Restore plugin class that provides the necessary information
 * needed to restore one simple format course.
 */
class restore_format_simple_plugin extends restore_format_plugin {

    /**
     * Returns the paths to be handled by the plugin at course level.
     */
    protected function define_module_plugin_structure() {
        $paths = array();
        $paths[] = new restore_path_element('format_simple', '/module/format_simple');
        return $paths; // And we return the interesting paths.
    }

    /**
     * Process the module/format_simple element
     */
    public function process_format_simple($data) {

    }

    protected function after_execute_module() {
        // A Bug on Moodle makes that we cannot have de old contextid so the files cannot be restored
        // https://tracker.moodle.org/browse/MDL-33892
        //$this->add_related_files('format_simple', 'bigicon', null);
    }
}
