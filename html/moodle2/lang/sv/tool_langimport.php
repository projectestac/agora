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
 * Strings for component 'tool_langimport', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = 'Installera det valda språkpaketet';
$string['installedlangs'] = 'Installerade språkpaket';
$string['langimport'] = 'Verktyg för att importera språk';
$string['langimportdisabled'] = 'Språkimportfunktionen har avaktiverats. Du måste uppdatera dina språkpaket manuellt på filsystemnivå. Glöm inte att rensa cache för strängar efter att du gjort uppdateringen.';
$string['langpackinstalled'] = 'Spåkpaketet {$a} installerades framgångsrikt';
$string['langpackremoved'] = 'Avinstallationen av språkpaket är avslutad';
$string['langpackupdateskipped'] = 'Uppdateringen av {$a} språkpaketet hoppades över';
$string['langpackuptodate'] = 'Språkpaket {$a} är aktuellt';
$string['langupdatecomplete'] = 'Uppdateringen av språkpaket har fullföljts';
$string['missingcfglangotherroot'] = 'Saknat konfigurationsvärde $CFG->langotherroot';
$string['missinglangparent'] = 'Saknat föräldraspråk  <em>{$a->parent}</em> av <em>{$a->lang}</em>.';
$string['nolangupdateneeded'] = 'Alla Dina språkpaket är av senaste version, Du behöver inte uppdatera dem.';
$string['pluginname'] = 'Språkpaket';
$string['purgestringcaches'] = 'Rensa sträng cache';
$string['remotelangnotavailable'] = 'Eftersom Moodle inte kan koppla upp till download.moodle.org så kan vi inte genomföra automatisk installation av spåkpaket. Var snäll och ladda ner de aktuella zippade filerna från den nedanstående listan, kopiera den till Din {$a} katalog
och packa upp dem manuellt.';
$string['uninstall'] = 'Avinstallera det valda språkpaketet';
$string['uninstallconfirm'] = 'Du håller på att fullständigt avinstallera språkpaketet {$a}, är Du säker?';
$string['updatelangs'] = 'Uppdatera alla installerade språkpaket';
