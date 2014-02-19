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
 * Strings for component 'plugin', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Aktivitäten';
$string['availability'] = 'Zustand';
$string['checkforupdates'] = 'Aktualisierungen suchen';
$string['checkforupdateslast'] = 'Letzte Suche: {$a}';
$string['displayname'] = 'Pluginname';
$string['err_response_curl'] = 'Unerwarteter Fehler: verfügbare Aktualisierung konnte nicht geladen werden.';
$string['err_response_format_version'] = 'Unerwartete Fehler: prüfen Sie die verfügbaren Aktualisierungen erneut.';
$string['err_response_http_code'] = 'Unerwarteter Fehler: verfügbare Aktualisierung konnte nicht geladen werden.';
$string['filterall'] = 'Alle zeigen';
$string['filtercontribonly'] = 'Nur Add-ons zeigen';
$string['filtercontribonlyactive'] = 'Nur Add-ons';
$string['filterupdatesonly'] = 'Nur Aktualisierbare zeigen';
$string['filterupdatesonlyactive'] = 'Nur Aktualisierbare';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'Keine Mitteilungen zu den Plugins';
$string['nonehighlightedinfo'] = 'Liste aller installierten Plugins zeigen';
$string['noneinstalled'] = 'Kein solches Plugin installiert';
$string['notdownloadable'] = 'Paket kann nicht geladen werden';
$string['notdownloadable_help'] = 'Die Aktualisierung kann nicht automatisch heruntergeladen werden. Bitte beachten Sie die Dokumentation.';
$string['notes'] = 'Hinweise';
$string['notwritable'] = 'Plugin-Verzeichnis schreibgeschützt';
$string['notwritable_help'] = 'Die automatische Aktualisierung für Plugins ist aktiviert. Der Vorgang kann nicht ausgeführt werden, weil das Plugin-Verzeichnis auf dem Server schreibgeschützt ist.

Sie müssen die Rechte für das Plugin-Verzeichnis anpassen, damit der Webserver die notwendigen Dateien speichern darf und die Aktualisierung ausführen kann.';
$string['numdisabled'] = 'Deaktiviert: {$a}';
$string['numextension'] = 'Add-ons: {$a}';
$string['numtotal'] = 'Installiert: {$a}';
$string['numupdatable'] = 'Verfügbare Aktualisierungen: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'Diese Seite zeigt Plugins mit einer Mitteilung. Markiert sind Plugins mit neuen Versionen, aktualisierbare Plugins und fehlende Plugins. Die neuen Versionen sollten vor der Aktualisierung von Moodle geladen werden.';
$string['plugindisable'] = 'Deaktivieren';
$string['plugindisabled'] = 'Deaktiviert';
$string['pluginenable'] = 'Aktivieren';
$string['pluginenabled'] = 'Aktiviert';
$string['requiredby'] = 'Notwendig für: {$a}';
$string['requires'] = 'Erfordert';
$string['rootdir'] = 'Verzeichnis';
$string['settings'] = 'Einstellungen';
$string['showall'] = 'Neu laden und alle Plugins zeigen';
$string['somehighlighted'] = 'Anzahl der Plugins mit einer Mitteilung: {$a}';
$string['somehighlightedinfo'] = 'Liste aller installierten Plugins zeigen';
$string['somehighlightedonly'] = 'Nur Plugins mit einer Mitteilung anzeigen';
$string['source'] = 'Quelle';
$string['sourceext'] = 'Add-on';
$string['sourcestd'] = 'Standard';
$string['status'] = 'Status';
$string['status_delete'] = 'Wird gelöscht';
$string['status_downgrade'] = 'Höhere Version ist bereits installiert!';
$string['status_missing'] = 'Quelle fehlt';
$string['status_new'] = 'Wird installiert';
$string['status_nodb'] = 'Keine Datenbank';
$string['status_upgrade'] = 'Wird aktualisiert';
$string['status_uptodate'] = 'Installiert';
$string['systemname'] = 'Identifizierung';
$string['type_auth'] = 'Plugin zur Authentifizierung
';
$string['type_auth_plural'] = 'Plugins zur Authentifizierung';
$string['type_block'] = 'Block';
$string['type_block_plural'] = 'Blöcke';
$string['type_cachelock'] = 'Verfahren der Cache-Sperre';
$string['type_cachelock_plural'] = 'Verfahren der Cache-Sperren';
$string['type_cachestore'] = 'Cache-Speicher';
$string['type_cachestore_plural'] = 'Cache-Speicher';
$string['type_coursereport'] = 'Kursbericht';
$string['type_coursereport_plural'] = 'Kursberichte';
$string['type_editor'] = 'Editor';
$string['type_editor_plural'] = 'Editoren';
$string['type_enrol'] = 'Einschreibemethode';
$string['type_enrol_plural'] = 'Einschreibemethoden';
$string['type_filter'] = 'Filter';
$string['type_filter_plural'] = 'Filter';
$string['type_format'] = 'Kursformat';
$string['type_format_plural'] = 'Kursformate';
$string['type_gradeexport'] = 'Methode zum Bewertungsexport';
$string['type_gradeexport_plural'] = 'Methoden zum Bewertungsexport';
$string['type_gradeimport'] = 'Methode zum Bewertungsimport';
$string['type_gradeimport_plural'] = 'Methoden zum Bewertungsimport';
$string['type_gradereport'] = 'Bewertungsbericht';
$string['type_gradereport_plural'] = 'Bewertungsberichte';
$string['type_gradingform'] = 'Fortgeschrittene Bewertungsmethode';
$string['type_gradingform_plural'] = 'Fortgeschrittene Bewertungsmethoden';
$string['type_local'] = 'Lokales Plugin';
$string['type_local_plural'] = 'Lokale Plugins';
$string['type_message'] = 'Mitteilungskanal';
$string['type_message_plural'] = 'Mitteilungskanäle';
$string['type_mnetservice'] = 'MNet Service';
$string['type_mnetservice_plural'] = 'MNet Services';
$string['type_mod'] = 'Aktivitäten';
$string['type_mod_plural'] = 'Aktivitäten';
$string['type_plagiarism'] = 'Plagiatsuche';
$string['type_plagiarism_plural'] = 'Plagiatsuche';
$string['type_portfolio'] = 'Portfolio';
$string['type_portfolio_plural'] = 'Portfolios';
$string['type_profilefield'] = 'Profilfeldtyp';
$string['type_profilefield_plural'] = 'Profilfeldtypen';
$string['type_qbehaviour'] = 'Frageverhalten';
$string['type_qbehaviour_plural'] = 'Frageverhalten';
$string['type_qformat'] = 'Format zum Fragenimport/-export';
$string['type_qformat_plural'] = 'Formate zum Fragenimport/-export';
$string['type_qtype'] = 'Fragetyp';
$string['type_qtype_plural'] = 'Fragetypen';
$string['type_report'] = 'Websitebericht';
$string['type_report_plural'] = 'Berichte';
$string['type_repository'] = 'Repository';
$string['type_repository_plural'] = 'Repositories';
$string['type_theme'] = 'Design';
$string['type_theme_plural'] = 'Designs';
$string['type_tool'] = 'Dienstprogramm';
$string['type_tool_plural'] = 'Dienstprogramme';
$string['type_webservice'] = 'Webservice Protokoll';
$string['type_webservice_plural'] = 'Webservice Protokolle';
$string['uninstall'] = 'Deinstallieren';
$string['updateavailable'] = 'Neue Version {$a} ist verfügbar!';
$string['updateavailable_moreinfo'] = 'Weitere Informationen';
$string['updateavailable_release'] = 'Version: {$a}';
$string['updatepluginconfirm'] = 'Bestätigung zur Plugin-Aktualisierung';
$string['updatepluginconfirmexternal'] = 'Die derzeitige Version des Plugins wurde wahrscheinlich über das Verwaltungssystem {$a} bezogen. Wenn Sie diese Aktualisierung installieren, können Sie das Verwaltungssystem für das Plugin nicht mehr verwenden. Soll dieses Update wirklich installiert werden?';
$string['updatepluginconfirminfo'] = 'Möchten Sie wirklich eine neue Version des Plugins <strong>{$a->name}</strong> installieren. Die Dateien für die Version {$a->version} werden heruntergeladen, entpackt und anschließend installiert.
<br /><a href="{$a->url}">{$a->url}</a>';
$string['updatepluginconfirmwarning'] = 'Vor der Aktualisierung wird keine automatische Datenbanksicherung durchgeführt. Der neue Code könnte die Datenbank beschädigen. Seien Sie also vorsichtig!';
$string['version'] = 'Version';
$string['versiondb'] = 'Aktuelle Version';
$string['versiondisk'] = 'Neue Version';
