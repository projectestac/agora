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
 * Strings for component 'cachestore_file', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Automatisch map maken';
$string['autocreate_help'] = 'Indien ingeschakeld zal de map in het pad automatisch gemaakt worden als ze nog niet bestaat.';
$string['path'] = 'Cache pad';
$string['path_help'] = 'De map die gebruikt moet worden om bestanden voor de cache te bewaren. Indien leeg gelaten (standaard) zal er automatisch een map gemaakt worden in de Moodle datamap. Dit kan gebruikt worden om te verwijzen naar een map op een schijf met betere performantie (bijvoorbeeld een RAM-schijf).';
$string['pluginname'] = 'Bestandscache';
$string['prescan'] = 'Map vooraf lezen';
$string['prescan_help'] = 'Indien ingeschakeld wordt de map bij eerste gebruikt en aanvragen voor bestanden worden naast de scangegevens gelegd. Dit kan helpen op een traag bestandssysteem wanneer je merkt dat bestandsoperaties een vertraging veroorzaken.';
$string['singledirectory'] = 'Opslag in één map';
$string['singledirectory_help'] = 'Indien ingeschakeld worden de bestanden (gecachede items) opgeslagen in één enklee map, eerder dan opgesplitst in meerdere mappen;<br />Dit inschakelen zal de snelheid van acties met bestanden doen toenemen, maar het risico vergroten om aan de limieten van het bestandssysteem te raken.<br />
Het wordt je aangeraden dit enkel in te schakelen als het volgende waar is:<br>- als je weet dat het aantal items in je cache klein genoeg is, zodat je geen problemen krijgt op het bestandssysteem dat je gebruikt.<br />- De gecachede gegevens zijn niet zwaar om te genereren. Als dat wel een probleem is, dan is het beter de standaardinstelling te laten staan omdat de kans op problemen hiermee verkleint.';
