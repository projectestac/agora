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
 * Strings for component 'local_staticpage', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   local_staticpage
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apacherewrite'] = 'Apache mod_rewrite Nutzung erzwingen';
$string['apacherewrite_desc'] = 'Statische Seiten sollen ausschließlich unter einer griffigen URL, die von Apache mod_rewrite erzeugt wird, bereitgestellt werden. Bitte lesen Sie die README Datei für Details.';
$string['documentdirectory'] = 'Dokumenten-Verzeichnis';
$string['documentdirectory_desc'] = 'Das Dokumenten-Verzeichnis, welches die .html Dateien mit dem HTML Code für die statischen Seiten enthält. Bitte lesen Sie die README Datei für Details.';
$string['documentheadingsource'] = 'Datenquelle für die Dokumentenüberschrift';
$string['documentheadingsource_desc'] = 'Die Datenquelle, aus der die Überschrift des Dokuments bezogen werden soll';
$string['documentlist'] = 'Dokumenten-Liste';
$string['documentlistdirectoryempty'] = 'Das Dokumenten-Verzeichnis enthält keine .html Dateien, es werden also keine statischen Seiten bereitgestellt. Bitte lesen Sie die README Datei für Details.';
$string['documentlistdirectorynotreadable'] = 'Das Dokumenten-Verzeichnis kann nicht gelesen werden, es werden also keine statischen Seiten bereitgestellt.';
$string['documentlistentryfilename'] = 'Folgendes Dokument wurde gefunden:<br /><strong>{$a}</strong>';
$string['documentlistentrylanguage'] = 'Das Dokument wird für die folgende Sprache bereitgestellt:<br /><strong>{$a}</strong>';
$string['documentlistentrypagename'] = 'Moodle hat vom Dateinamen des Dokuments folgenden Seitennamen abgeleitet:<br /><strong>{$a}</strong>';
$string['documentlistentryreachablefail'] = 'Das Dokument sollte unter folgender URL verfügbar sein, leider wird es ein Browser dort aber nicht herunterladen und anzeigen können (vielleicht gibt es ein Problem mit Ihrer Webserver Konfiguration - bitte lesen Sie die README Datei für Details):<br /><strong>{$a}</strong>';
$string['documentlistentryreachablesuccess'] = 'Das Dokument ist unter folgender URL verfügbar und kann unter dieser URL verlinkt werden:<br /><strong>{$a}</strong>';
$string['documentlistentryrewritefail'] = 'Das Dokument sollte unter folgender griffigen URL verfügbar sein, leider wird es ein Browser dort aber nicht herunterladen und anzeigen können (vielleicht gibt es ein Problem mit Ihrer Webserver oder Ihrer mod_rewrite Konfiguration - bitte lesen Sie die README Datei für Details):<br /><strong>{$a}</strong>';
$string['documentlistentryrewritesuccess'] = 'Das Dokument ist unter folgender griffigen URL verfügbar und kann unter dieser URL verlinkt werden:<br /><strong>{$a}</strong>';
$string['documentlistentryunsupported'] = 'Die Dateinamenserweiterung des Dokuments bezieht sich auf ein Sprachpaket, das in Moodle derzeit nicht aktiviert ist, das Dokument wird daher <strong>nicht bereitgestellt</strong>. Bitte ändern Sie die Dateinamenserweiterung auf eine unterstützte und aktivierte Sprache ab.';
$string['documentlistinstruction'] = 'Diese Liste zeigt die Dateien, die im Dokumenten-Verzeichnis gefunden werden, mit ihren URLs';
$string['documentlistnodirectory'] = 'Das Dokumenten-Verzeichnis existiert nicht, es werden also keine statischen Seiten bereitgestellt.';
$string['documentnavbarsource'] = 'Datenquelle für den Brotkrumenpfad';
$string['documentnavbarsource_desc'] = 'Die Datenquelle, aus der die Beschriftung für den Brotkrumenpfad (verwendet in Moodles "Navbar") bezogen werden soll';
$string['documenttitlesource'] = 'Datenquelle für den Dokumententitel';
$string['documenttitlesource_desc'] = 'Die Datenquelle, aus der der Titel des Dokuments (sichtbar in der Titelzeile des Browsers) bezogen werden soll';
$string['documenttitlesourceh1'] = 'Erstes h1 tag im HTML Code (normalerweise direkt nach dem öffnenden body Tag platziert)';
$string['documenttitlesourcehead'] = 'Erstes title tag im HTML Code (normalerweise innerhalb des head tags platziert)';
$string['international'] = 'Alle Sprachen';
$string['pagenotfound'] = 'Diese Seite existiert leider nicht';
$string['pluginname'] = 'Statische Seiten';
