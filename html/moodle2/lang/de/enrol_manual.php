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
 * Strings for component 'enrol_manual', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Status ändern';
$string['altertimeend'] = 'Endzeit ändern';
$string['altertimestart'] = 'Startzeit ändern';
$string['assignrole'] = 'Kursrolle zuweisen ';
$string['confirmbulkdeleteenrolment'] = 'Möchten Sie wirklich diese Nutzereinschreibungen löschen?';
$string['defaultperiod'] = 'Teilnahmedauer';
$string['defaultperiod_desc'] = 'Die standardmäßige Teilnahmedauer ist die Zeitdauer, während der die Einschreibung gültig bleibt. Wenn dieser Wert 0 ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['defaultperiod_help'] = 'Die standardmäßige Teilnahmedauer ist die Zeitdauer, während der die Einschreibung gültig bleibt, beginnend mit dem Moment der Nutzereinschreibung. Wenn diese Option deaktiviert ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['deleteselectedusers'] = 'Ausgewählte Nutzereinschreibungen löschen';
$string['editenrolment'] = 'Einschreibung bearbeiten';
$string['editselectedusers'] = 'Ausgewählte Nutzereinschreibungen bearbeiten';
$string['enrolledincourserole'] = 'In \'{$a->course}\' als \'{$a->role}\' eingeschrieben';
$string['enrolusers'] = 'Nutzer/innen einschreiben';
$string['manual:config'] = 'Manuelle Einschreibung verwalten';
$string['manual:enrol'] = 'Nutzer/innen einschreiben';
$string['manual:manage'] = 'Nutzereinschreibung verwalten';
$string['manual:unenrol'] = 'Nutzer/innen aus dem Kurs abmelden';
$string['manual:unenrolself'] = 'Selbst aus dem Kurs abmelden';
$string['pluginname'] = 'Manuelle Einschreibung';
$string['pluginname_desc'] = 'Das Plugin \'Manuelle Einschreibung\' erlaubt es, Nutzer/innen manuell in einen Kurs einzuschreiben. Die Einschreibung in einen Kurs kann von den Trainer/innen (oder jemandem mit passenden Rechten) durchgeführt werden. Das Plugin sollte normalerweise aktiviert sein, da andere Einschreibeplugins (z.B. Selbsteinschreibung) darauf zugreifen.';
$string['status'] = 'Manuelle Einschreibung';
$string['status_desc'] = 'Kurszugriff für intern eingeschriebene Nutzer/innen erlauben. Dieses Plugin sollte in den meisten Fällen aktiviert bleiben.';
$string['statusdisabled'] = 'Deaktiviert';
$string['statusenabled'] = 'Aktiviert';
$string['status_help'] = 'Diese Option legt fest, ob Nutzer/innen manuell eingeschrieben werden können. In der Regel führen Trainer/innen (oder jemand mit passenden Rechten) die manuelle Einschreibung in einen Kurs durch.';
$string['unenrol'] = 'Nutzer/in abmelden';
$string['unenrolselectedusers'] = 'Ausgewählte Nutzer/innen abmelden';
$string['unenrolselfconfirm'] = 'Möchten Sie sich wirklich selbst aus dem Kurs \'{$a}\' abmelden?';
$string['unenroluser'] = 'Möchten Sie wirklich \'{$a->user}\' aus dem Kurs \'{$a->course}\' abmelden?';
$string['unenrolusers'] = 'Nutzer/innen abmelden';
$string['wscannotenrol'] = 'Die Plugins können Nutzer/innen nicht manuell in den Kurs \'{$a->courseid}\' einschreiben
 ';
$string['wsnoinstance'] = 'Das Plugin \'Manuelle Einschreibung\' ist nicht vorhanden oder wurde für den Kurs \'{$a->courseid}\' nicht aktiviert';
$string['wsusercannotassign'] = 'Sie sind nicht berechtigt, die Rolle \'{$a->roleid}\' im Kurs \'{$a->courseid}\' an \'{$a->userid}\' zuzuweisen.';
