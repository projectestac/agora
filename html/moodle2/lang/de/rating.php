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
 * Strings for component 'rating', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Mittelwert';
$string['aggregatecount'] = 'Anzahl der Bewertungen';
$string['aggregatemax'] = 'Maximalwert';
$string['aggregatemin'] = 'Minimalwert';
$string['aggregatenone'] = 'Keine Bewertung';
$string['aggregatesum'] = 'Summe der Bewertungen';
$string['aggregatetype'] = 'Summierungstyp';
$string['aggregatetype_help'] = 'Der Summierungstyp legt fest wie die Einzelwertungen zu einer Endwertung zusammengefasst werden.

* Mittelwert - Der Mittelwert aus allen Einzelwertungen wird die Endwertung
* Anzahl -  Die Anzahl aller erreichten Wertungen wird die Endwertung. Die Anzahl kann nicht höher werden als die erreichbare Maximalwertung.
* Maximalwert - Die größte erreichte Bewertung wird die Endwertung
* Minimalwert - Die kleinste erreichte Bewertung wird die Endwertung
* Summe - Die Summe aller erreichten  Bewertungen wird die Endwertung. Die Summe kann nicht höher werden als die erreichbare Maximalwertung.

Wenn \'Keine Bewertung\' ausgewählt wird, erscheint die Aktivität nicht in der Bewertungsübersicht.';
$string['allowratings'] = 'Bewertung von Beiträgen erlauben?';
$string['allratingsforitem'] = 'Alle abgegebenen Bewertungen';
$string['capabilitychecknotavailable'] = 'Prüfung der Berechtigung ist erst nach dem Speichern der Aktivität möglich.';
$string['couldnotdeleteratings'] = 'DIes kann nicht gelöscht werden, weil bereits Bewertungen vorliegen';
$string['norate'] = 'Bewertung von Beiträgen nicht erlaubt!';
$string['noratings'] = 'Keine Wertungen abgegeben';
$string['noviewanyrate'] = 'Sie dürfen ausschließlich Ergebnisse für eigene Beiträge sehen';
$string['noviewrate'] = 'Sie haben kein Recht, Bewertungen zu sehen';
$string['rate'] = 'Bewerten';
$string['ratepermissiondenied'] = 'Sie haben kein Recht, den Beitrag zu bewerten';
$string['rating'] = 'Bewertung';
$string['ratinginvalid'] = 'Ungültige Bewertung';
$string['ratings'] = 'Bewertungen';
$string['ratingtime'] = 'Bewertungen auf Beiträge beschränken, die im Zeitraum erstellt wurden';
$string['rolewarning'] = 'Rollen, die Bewertungen vornehmen dürfen';
$string['rolewarning_help'] = 'Nutzer benötigen das generelle Recht moodle/rating:rate und (!) modulspezifische Rechte, um Bewertungen durchführen zu können. Nutzer mit folgenden Rollen sollten Beiträge bewerten können. Eine Anpassung ist über den Link \'Rollen\' im Block Einstellungen möglich.';
