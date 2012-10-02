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
 * Strings for component 'tool_bloglevelupgrade', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_bloglevelupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bloglevelupgradedescription'] = '<p>Diese Website wurde auf Moodle 2.0 aktualisiert.</p>
<p>Die Regeln für die Blogsichtbarkeit wurden in 2.0 stark vereinfacht, aber Sie können auch weiterhin die bisherigen Regeln verwenden.</p>
<p>Um die kursbasierte oder gruppenbasierte Sichtbarkeit der Blogeinträge auf Ihrer Website zu bewahren, wird das folgende Script spezielle Blogforen erzeugen, und zwar in jedem Kurs, dessen Nutzer/innen bisher irgendwelche Blogeinträge veröffentlicht haben. Diese Blogeinträge werden in die speziellen Blogforen in den Kursen kopiert.</p>
<p>Die bisherigen Blogs werden abgeschaltet, aber es werden keine Blogeinträge gelöscht.</p>
<p>Sie können das Script über den folgenden Link starten: <a href="{$a->fixurl}">Aktualisierung der Blogsichtbarkeit</a>.</p>';
$string['bloglevelupgradeinfo'] = 'Die Regeln für die Blogsichtbarkeit wurden in Moodle 2.0 vereinfacht, wobei Sie weiterhin die alten Berechtigungseinstellungen benutzen können. Um die kursbasierte oder gruppenbasierte Sichtbarkeit der Blogeinträge auf Ihrer Website zu bewahren, wird das folgende Script spezielle Blogforen erzeugen, und zwar in jedem Kurs, dessen Nutzer/innen bisher irgendwelche Blogeinträge veröffentlicht haben. Diese Blogeinträge werden in die speziellen Blogforen in den Kursen kopiert. Die bisherigen Blogs werden abgeschaltet, aber es werden keine Blogeinträge gelöscht.';
$string['bloglevelupgradeprogress'] = 'Fortschritt: {$a->userscount} Nutzer/innen geprüft - {$a->blogcount} Blogeinträge konvertiert';
$string['pluginname'] = 'Aktualisierung der Blogsichtbarkeit';
