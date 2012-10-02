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
 * Strings for component 'enrol_flatfile', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'Die Textdatei \'{$a}\' für die Kurseinschreibung kann nicht vom Cronjob gelöscht werden. Dieses Problem tritt meistens bei falschen Zugriffsrechten auf. Bitte korrigieren Sie die Zugriffsrechte, damit die Datei gelöscht werden kann und nicht  erneut ausgeführt wird.';
$string['filelockedmailsubject'] = 'Fehler: Datei für Kursanmeldung';
$string['location'] = 'Dateiverzeichnis';
$string['mailadmin'] = 'Administrator/in per E-Mail benachrichtigen';
$string['mailstudents'] = 'Teilnehmer/innen per E-Mail benachrichtigen';
$string['mailteachers'] = 'Trainer/innen per E-Mail benachrichtigen';
$string['mapping'] = 'CSV-Einschreibung (Flat file)';
$string['messageprovider:flatfile_enrolment'] = 'Mitteilungen bei Einschreibung über Textdatei';
$string['pluginname'] = 'CSV-Einschreibung (Flat file)';
$string['pluginname_desc'] = 'Die CSV-Einschreibung (Flat file) arbeitet eine speziell formatierte Textdatei ab, deren Ort Sie selber festlegen. Diese Textdatei enthält mehrere Zeilen von kommagetrennten Listen mit 4 oder 6 Werten:

<pre class="informationbox">
*  operation, role, idnumber(user), idnumber(course) [, starttime, endtime]
Die einzelnen Parameter sind:
*  operation        = add | del
*  role             = student | teacher | teacheredit
*  idnumber(user)   = idnumber in the user table NB not id
*  idnumber(course) = idnumber in the course table NB not id
*  starttime        = start time (in seconds since epoch) - optional
*  endtime          = end time (in seconds since epoch) - optional
</pre>

Die Datei könnte folgendermaßen aussehen:
<pre class="informationbox">
   add, student, 5, CF101
   add, teacher, 6, CF101
   add, teacheredit, 7, CF101
   del, student, 8, CF101
   del, student, 17, CF101
   add, student, 21, CF101, 1091115000, 1091215000
</pre>';
