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
 * Strings for component 'workshopallocation_random', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Selbstbeurteilung hinzufügen';
$string['allocationaddeddetail'] = 'Eine neue Beurteilung ist vorzunehmen: <strong>($ a-> reviewername) </ strong> beurteilt <strong> ($ a-> Autorname) </ strong>';
$string['allocationdeallocategraded'] = 'Neuzuordnung kann nicht durchgeführt werden. <strong>{$a->reviewername}</strong>, hat bereits die Einreichung von: <strong>{$a->authorname}</strong> beurteilt.';
$string['allocationreuseddetail'] = 'Wiederverwendete Beurteilung: <strong>{$a->reviewername}</strong> wurde bei der Bewertung von <strong>{$a->authorname}</strong> behalten';
$string['allocationsettings'] = 'Einstellungen Zuordnungen';
$string['assessmentdeleteddetail'] = 'Zuordnung der Beurteilung aufgehoben: <strong>{$a->reviewername}</strong> ist nicht mehr Beurteiler von <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Teilnehmer/innen können ohne eigene Einreichung bewerten';
$string['confignumofreviews'] = 'Vorgabewert für das zufällige Zuordnen von Einreichungen';
$string['excludesamegroup'] = 'Beurteilungen aus der gleichen Gruppe verhindern';
$string['noallocationtoadd'] = 'Keine Zuordnungen hinzuzufügen';
$string['nogroupusers'] = '<p>Achtung: Wenn der Workshop sich im Modus "sichtbare Gruppen" oder "getrennten Gruppen" befindet, dann müssen Nutzer/innen als Mitglied in mindestens einer Gruppe eingetragen sein, um eine gegenseitige Beurteilung für diese Aktivität durchführen zu können. Nutzer/innen ohne Gruppe können nur eine neue Selbstbeurteilung vornehmen oder es werden vorhandene Beurteilungen gelöscht.</p>
<p>Folgende Nutzer/innen sind bisher keiner Gruppe zugeordnet: {$a}</p>';
$string['numofdeallocatedassessment'] = '{$a} Zuordnung/en aufheben';
$string['numofrandomlyallocatedsubmissions'] = 'Zufällige Zuordnung von {$a} Einreichungen';
$string['numofreviews'] = 'Anzahl von Beurteilungsaufträgen';
$string['numofselfallocatedsubmissions'] = 'Automatisiere Zuordnung von {$a} Einreichung/en';
$string['numperauthor'] = 'pro Einreichung';
$string['numperreviewer'] = 'pro Beurteiler/in';
$string['pluginname'] = 'Zufällige Zuordnung';
$string['randomallocationdone'] = 'Zufällige Zuordnung abgeschlossen';
$string['removecurrentallocations'] = 'Aktuelle Zuordnung zurücksetzen';
$string['resultnomorepeers'] = 'Keine weiteren Beurteilungen verfügbar';
$string['resultnomorepeersingroup'] = 'Keine weiteren Beurteilungen in dieser
Gruppe verfügbar';
$string['resultnotenoughpeers'] = 'Nicht genügend Beurteilungen verfügbar';
$string['resultnumperauthor'] = 'Versuche {$a} Beurteilungen(en) je Autor zuzuweisen';
$string['resultnumperreviewer'] = 'Versuche {$a} Beurteilung(en) jedem Bewerter zuzuweisen';
$string['stats'] = 'Statistik aktuelle Zuordnungen';
