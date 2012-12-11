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
 * Strings for component 'portfolio_boxnet', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API-Schlüssel';
$string['err_noapikey'] = 'Kein API-Schlüssel';
$string['err_noapikey_help'] = 'Für dieses Plugin wurde kein API-Schlüssel konfiguriert, den Sie über <a href="http://www.box.net/developer/services">box.net</a> erhalten können.';
$string['existingfolder'] = 'Vorhandenes Dateiverzeichnis';
$string['folderclash'] = 'Das anzulegende Verzeichnis existiert bereits!';
$string['foldercreatefailed'] = 'Fehler beim Anlegen Ihres Zielverzeichnisses bei box.net';
$string['folderlistfailed'] = 'Fehler bei der Abfrage einer Dateiliste von box.net';
$string['newfolder'] = 'Neues Dateiverzeichnis';
$string['noauthtoken'] = 'Kein Authentifizierungstoken für diese Session empfangen';
$string['notarget'] = 'Sie müssen zum Hochladen ein vorhandenes Verzeichnis wählen oder ein neues Verzeichnis anlegen';
$string['noticket'] = 'Kein Ticket von box.net empfangen, um die Authentifizierung zu beginnen';
$string['password'] = 'Ihr Kennwort für box.net (wird nicht gespeichert)';
$string['pluginname'] = 'Box.net
';
$string['sendfailed'] = 'Fehler beim Senden von Daten an box.net: {$a}';
$string['setupinfo'] = 'Einstellungsanleitung';
$string['setupinfodetails'] = 'Sie erhalten Ihren API-Key für Box.net über die Seite <a href="{$a->servicesurl} "> OpenBox Development </ a>. Bei den \'Developer Tools\' gehen Sie zu \'Create new application\' und legen eine neue Anwendung für Ihre Moodle-Instanz an. Der API-Key wird im Abschnitt \'Backend Parameter\' angezeigt. Kopieren Sie in das Feld \'Redirect URL\' den folgenden Text: <br /> <code> {$a->callbackurl} </ code> <br />

Optional können Sie weitere Informationen über Ihre Moodle-Instanz angeben. Alle Angaben können auch später noch bearbeitet werden, und zwar auf der Seite \'View my applications\'.';
$string['sharedfolder'] = 'Freigegeben';
$string['sharefile'] = 'Diese Datei freigeben?';
$string['sharefolder'] = 'Dieses Verzeichnis freigeben?';
$string['targetfolder'] = 'Zielverzeichnis';
$string['tobecreated'] = 'Erstellen';
$string['username'] = 'Ihr Anmeldename für box.net (wird nicht gespeichert)';
