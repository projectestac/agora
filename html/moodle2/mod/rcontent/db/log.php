<?php
// This file is part of Marsupial - http://moodle.org/
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
 * Definition of log events
 *
 * @package    mod_rcontent
 * @category   log
 * @copyright  2012 Antoni Bertran XTEC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$logs = array(
    array('module'=>'rcontent', 'action'=>'view', 'mtable'=>'rcontent', 'field'=>'name'),
    array('module'=>'rcontent', 'action'=>'review', 'mtable'=>'rcontent', 'field'=>'name'),
    array('module'=>'rcontent', 'action'=>'update', 'mtable'=>'rcontent', 'field'=>'name'),
    array('module'=>'rcontent', 'action'=>'add', 'mtable'=>'rcontent', 'field'=>'name'),
);