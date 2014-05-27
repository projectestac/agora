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
 * Provides the information to backup simple course format
 */
class backup_format_simple_plugin extends backup_format_plugin {

    /**
     * Returns the format information to attach to course element
     */
    protected function define_module_plugin_structure() {

        // Define the virtual plugin element with the condition to fulfill.
        $plugin = $this->get_plugin_element();

        $format_simple = new backup_nested_element('format_simple');
        $plugin->add_child($format_simple);

        $format_simple->annotate_files('format_simple', 'bigicon', null);

        return $plugin;
    }
}
