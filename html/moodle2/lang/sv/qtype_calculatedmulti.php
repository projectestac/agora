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
 * Strings for component 'qtype_calculatedmulti', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculatedmulti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Beräknad flervalsfråga';
$string['pluginnameadding'] = 'Lägg till en beräknad flervalsfråga';
$string['pluginnameediting'] = 'Redigera en beräknad flervalsfråga';
$string['pluginname_help'] = 'Beräknade flervalsfrågor fungerar som flervalsfrågor där valet av svarsalternativ baseras på resultatet av en numerisk formel där wildcard inom klammerparanteraser fungerar som substituerande av individuella värden när testet tas. Till exempel  frågan "Vad är arean av en rektangel med längden {L} och bredd {W}?"  valet är {= {L} * {W}} (där * betecknar multiplikation).';
$string['pluginnamesummary'] = 'Beräknade flervalsfrågor är som flervalsfrågor  med svarsalternativ som genereras från numeriska värden som väljs slumpmässigt från en datamängd när testet tas.';
