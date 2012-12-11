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
 * Strings for component 'qtype_randomsamatch', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_randomsamatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['nosaincategory'] = 'In der ausgewählten Kategorie \'{$a->catname}\' befinden sich keine Kurztextfragen. Wählen Sie eine andere Kategorie aus oder erstellen Sie Fragen in dieser Kategorie.';
$string['notenoughsaincategory'] = 'In der ausgewählten Kategorie \'{$a->catname}\' befinden sich nur {$a->nosaquestions} Kurztextfragen. Wählen Sie eine andere Kategorie aus, erstellen Sie zusätzliche Kurztextfragen in dieser Kategorie oder reduzieren Sie die Zahl der auszuwählenden Kurztextfragen.';
$string['pluginname'] = 'Zufällige Kurzantwortzuordnung';
$string['pluginnameadding'] = 'Zufällige Kurzantwort Zuordnungsfrage hinzufügen';
$string['pluginnameediting'] = 'Zufällige Kurzantwort Zuordnungsfrage bearbeiten';
$string['pluginname_help'] = 'Aus Teilnehmeransicht scheint dies eine Zuordnungsfrage zu sein. Der Unterschied besteht darin, dass die Fragen und Antworten zufällig aus den Kurzantwortfragen der gewählten Kategorie genommen werden.Es müssen ausreichend noch nicht genutzte Kurzantwortfragen in der Kategorie abgelegt sein. Andernfalls erscheint eine Fehlernachricht.';
$string['pluginnamesummary'] = 'Wie Zuordnungsfrage, jedoch zufällig aus Kurzantwortfragen der Kategorie erstellt.';
