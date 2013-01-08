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
 * Strings for component 'qtype_calculatedmulti', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculatedmulti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Berechnete Multiple-Choice-Frage';
$string['pluginnameadding'] = 'Berechnete Multiple-Choice-Frage hinzufügen';
$string['pluginnameediting'] = 'Berechnete Multiple-Choice-Frage bearbeiten';
$string['pluginname_help'] = 'Berechnete Multiple-Choice-Fragen entsprechen normalen MultipleChoice-Fragen, können aber zusätzlich Variablen in geschweiften Klammern  (Wildcards) enthalten. In diese Variablen werden bei der Testdurchführung gegen zufällige Zahlen aus der Wertemenge eingesetzt. <p>Beispiel: Auf die Frage "Welche Fläche hat ein Rechteck mit der Länger {l} und der Breite {b}?" wäre  die Antwort "{={l}*{b}}". Der Stern (*) steht für die Multiplikation.';
$string['pluginnamesummary'] = 'Berechnete Multiple-Choice-Fragen können Variablen enthalten, in die bei der Testdurchführung zufällige Zahlen aus der Wertemenge eingesetzt werden.';
