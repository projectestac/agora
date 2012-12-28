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
 * This file keeps track of upgrades to the advices block.
 *
 * Sometimes, changes between versions involve alterations to database 
 * structures and other major things that may break installations.
 * 
 * The upgrade function in this file will attempt to perform all the necessary
 * actions to upgrade your older installation to current version.
 * 
 * If there's something it cannot do by itself, it will inform you what you 
 * need to do.
 * 
 * The commands here will all be database-neutral, using the functions defined 
 * in lib/ddllib.php
 *
 * @package    block
 * @subpackage advices
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Pau Ferrer <ferrer.pau@gmail.com>, Toni Ginard <aginard@xtec.cat>, Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_block_advices_upgrade ($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;

    return $result;
}
