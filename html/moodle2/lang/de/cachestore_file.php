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
 * Strings for component 'cachestore_file', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Verzeichnis automatisch anlegen';
$string['autocreate_help'] = 'Nach der Aktivierung wird der angegebene Pfad automatisch erstellt sofern er noch nicht existiert.';
$string['path'] = 'Cache-Pfad';
$string['path_help'] = 'Das Verzeichnis wird zur Ablage von Dateien des Cache-Speichers verwendet. Falls der Eintrag leer bleibt (default) wird automatisch ein Verzeichnis in moodledata angelegt. Damit kann ein Verzeichnis deklariert werden, in dem Daten abgelegt werden, um sie mit grosser Leistungsfähigkeit (z.B. memory) zu nutzen.';
$string['pluginname'] = 'Datei-Cache';
$string['prescan'] = 'Verzeichnis vorher durchsuchen';
$string['prescan_help'] = 'Nach der Aktivierung wird das Verzeichnis bei der Nutzung von Dateien oder Abfragen zuerst durchgescannt. Das kann den Zugriff beschleunigen wenn der Datenspeicher sonst langsam erscheint.';
$string['singledirectory'] = 'Speichern in einem einzigen Verzeichnis';
$string['singledirectory_help'] = 'Nach der Aktivierung werden Dateien (gecachte Werte) in einem einzlenen Verzeichnis abgelegt und nicht in vielen Unterverzeichnissen gespeichert. <br />
Dateitransaktionen können dadurch beschleunigt werden. Es kann jedoch auch an die Grenzen des Dateisystems stossen.<br />
Empfohlen wird dies nunmehr nur wenn folgendes zutrifft:<br />
- Wenn Sie sich sicher sind, das die Zahl der Werte im Cache gering genug ist, um nicht das Dateisystem zu sehr zu beanspruchen. <br />
-  Die gecachten Daten sind nicht zu umfangreich. Solte dies jedoch der Fall sein, ist die Standardeinstellung (default) die bessere Option, um Probleme zu vermeiden.';
