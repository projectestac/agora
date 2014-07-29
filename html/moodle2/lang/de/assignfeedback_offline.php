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
 * Strings for component 'assignfeedback_offline', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Bewertungsimport bestätigen';
$string['default'] = 'Standardmäßig aktiviert';
$string['default_help'] = 'Wenn diese Option legt fest, ob die Offline-Bewertung standardmäßig in allen neuen Aufgaben aktiviert wird.';
$string['downloadgrades'] = 'Bewertungstabelle herunterladen';
$string['enabled'] = 'Offline-Bewertungstabelle';
$string['enabled_help'] = 'Wenn diese Option aktiviert wird, können Trainer/innen eine Bewertungstabelle herunterladen, offline alle Bewertungen für die Teilnehmer/innen ausfüllen und später die Bewertungstabelle wieder hochladen.';
$string['feedbackupdate'] = 'Feld \'{$a->field}\' für \'{$a->student}\' auf \'{$a->text}\' setzen';
$string['gradelockedingradebook'] = 'Die Bewertungen wurden gesperrt für {$a}';
$string['graderecentlymodified'] = 'Die Bewertung wurde von der Bewertungstabelle abweichend nachträglich geändert für {$a}';
$string['gradesfile'] = 'Bewertungstabelle .csv';
$string['gradesfile_help'] = 'Bewertungstabelle mit geänderten Bewertungen.
Diese Datei muss eine speziell zu dieser Aufgabe heruntergeladene Datei sein, die Spalten zu Bewertung und alle Kennungen enthält. Die Datei muss im Format .csv und der Codierung utf-8 abgespeichert sein.';
$string['gradeupdate'] = 'Bewertung für \'{$a->student}\' auf {$a->grade} setzen';
$string['ignoremodified'] = 'Update von Datensätzen zulassen, die seit dem letzten Upload angepasst wurden.';
$string['ignoremodified_help'] = 'Wenn der Bewertungsbogen heruntergeladen wird, enthält er den letzten Stand der Bewertungen aus Moodle. Danach können in Moodle direkt Bewertungen vorgenommen worden sein.  Wenn nun derBewertungsbogen mit Bewertungen wieder hochgeladen wird, sind  die in der Zwischenzeit in Moodle vorgenommenen Bewetrungen normalerweise  gegen Veränderungen durch Upload gesperrt. Durch diese Funktion können Sie ein Überschreiben durch die Daten im Bewertungsbogen zulassen.';
$string['importgrades'] = 'Änderungen in der Bewertungstabelle bestätigen';
$string['invalidgradeimport'] = 'Die hochgeladene Bewertungstabelle konnte nicht gelesen werden. Stellen Sie sicher, dass die Tabelle als .csv gespeichert wurde und probieren sie es erneut.';
$string['nochanges'] = 'Keine Änderungen in der hochgeladenen Bewertungstabelle gefunden';
$string['offlinegradingworksheet'] = 'Bewertungen';
$string['pluginname'] = 'Offline-Bewertungstabelle';
$string['processgrades'] = 'Bewertungen importieren';
$string['skiprecord'] = 'Datensatz überspringen';
$string['updatedgrades'] = 'Aktualisierte Bewertungen: {$a}';
$string['updaterecord'] = 'Datensatz aktualisieren';
$string['uploadgrades'] = 'Bewertungstabelle hochladen';
