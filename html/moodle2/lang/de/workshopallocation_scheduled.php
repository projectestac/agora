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
 * Strings for component 'workshopallocation_scheduled', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Momentaner Status';
$string['currentstatusexecution'] = 'Status';
$string['currentstatusexecution1'] = 'Ausgeführt am {$a->datetime}';
$string['currentstatusexecution2'] = 'Erneute Ausführung am {$a->datetime}';
$string['currentstatusexecution3'] = 'Ausführung am {$a->datetime}';
$string['currentstatusexecution4'] = 'Anstehende Ausführung';
$string['currentstatusnext'] = 'Nächste Ausführung';
$string['currentstatusnext_help'] = 'In manchen Situationen kann die Aufteilung mehrfach ausgeführt werden, selbst wenn sie auf automatische Zuweisung eingestellt ist. Dies ist besonders dann der Fall wenn sich die Einreichungen verzögert haben.';
$string['currentstatusreset'] = 'Zurücksetzen';
$string['currentstatusreset_help'] = 'Das Speichern der Formulareinstellungen führt dazu, dass der gegenwärtige Zustand wieder hergestellt werden kann. Alle Informationen der vorherigen Ausführung werden zurückgesetzt, damitr die Zuordnung erneut ausgeführt werden kann (wenn oben aktiviert)';
$string['currentstatusresetinfo'] = 'Anklicken und speichern, um das Ergebnis der Umsetzung zurückzusetzen.';
$string['currentstatusresult'] = 'Ergebnis der früheren Ausführung';
$string['enablescheduled'] = 'Zeitgesteuerte Aufteilung aktivieren';
$string['enablescheduledinfo'] = 'Am Ende der Abgabephase Aufteilung der Einreichungen automatisch durchführen';
$string['pluginname'] = 'Zeitgesteuerte Aufteilung';
$string['randomallocationsettings'] = 'Einstellungen Zuordnungen';
$string['randomallocationsettings_help'] = 'Hier werden die Parameter der zufälligen Aufteilung festgelegt. Es kommt das Plugin zur zufälligen Zuteiliung der eingereichten Lösungen zum Einsatz.';
$string['resultdisabled'] = 'Zeitgesteuerte Aufteilung deaktiviert';
$string['resultenabled'] = 'Zeitgesteuerte Aufteilung aktiviert';
$string['resultexecuted'] = 'Erfolgreich';
$string['resultfailed'] = 'Automatische Aufteilung der Lösungen nicht möglich';
$string['resultfailedconfig'] = 'Zeitgesteuerte Aufteilung falsch eingerichtet';
$string['resultfaileddeadline'] = 'Es wurde kein Abgabeschluß für den Workshop festgelegt';
$string['resultfailedphase'] = 'Der Workshop befindet sich nicht in der Einreichungsphase';
$string['resultvoid'] = 'Es wurden keine Einreichungen zugeteilt';
$string['resultvoiddeadline'] = 'Nicht nach der Abgabefrist';
$string['resultvoidexecuted'] = 'Die Aufteilung wurde bereits ausgeführt';
$string['scheduledallocationsettings'] = 'Einstellungen für die zeitgesteuerte Aufteilung';
$string['scheduledallocationsettings_help'] = 'Mit der Aktivierung dieser Funktion wird am Ende der Abgabefrist die Aufteilung der eingereichten Lösungen automatisch durchgeführt. Das Ende der  Abgabefrist wird unter Einreichungen Endtermin festgelegt.

Die zufällige Aufteilung erfolgt intern nach den Vorgaben in diesem Formular. Sie erfolgt in der gleichen weise als würde ein/e Trainer/in die zufällige Aufteilung am Ende der Einreichungsfrist manuell auslösen.

Die automatische Aufteilung wird nicht vorgenommen, wenn die Umstellung auf die Bewertungsphase manuell erfolgt bevor die Abgabefrist erreicht ist. Sie müssen in diesem Fall die Aufteilung selber auslösen.

Die automatische Aufteilung ist dann sinnvoll wenn der Wechsel zwischen den Phasen auch automatisch erfolgt.';
$string['setup'] = 'Zeitgesteuerte Aufteilung einrichten';
