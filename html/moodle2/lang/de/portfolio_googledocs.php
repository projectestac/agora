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
 * Strings for component 'portfolio_googledocs', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['noauthtoken'] = 'Von Google wurde kein Authentifikationstoken empfangen. Bitte stellen Sie sicher, dass Sie für Moodle den Zugriff auf Ihr Googlekonto erlauben';
$string['nooauthcredentials'] = 'OAuth Credentials erforderlich';
$string['nooauthcredentials_help'] = 'Um das Google Docs Portfolio zu verwenden, sind die OAuth Einstellungen für dieses Portfolio vorzunehmen.';
$string['nosessiontoken'] = 'Ein Export zu Google wird wegen eines fehlenden Sessiontokens verhindert';
$string['oauth2upgrade_message_content'] = 'Im Rahmen des Updates auf Moodle 2.3 wurde das Google Docs Portfolio deaktiviert. Zur Re-Aktivierung muß Ihre Seite bei Google registriert werden. Dies ist in der Dokumentation {$a->docsurl} beschrieben. Sie erhalten dann einen Kunden-ID und einen Schlüssel. Damit können Sie alle Google Docs und Picasa Plugins konfigurieren.';
$string['oauth2upgrade_message_small'] = 'Das Plugin für das Google Docs Portfolio wurde deaktiviert. Nehmen Sie die Konfiguration für Google OAuth2.0 vor wie in der Dokumentation beschrieben.';
$string['oauth2upgrade_message_subject'] = 'Wichtige Informationen zum Google Docs Portfokio';
$string['oauthinfo'] = '<p>Zur Verwendung des GoogleDocs Portfolio ist eine Regsitrierung bei Google erforderlich. Informationen hierzu finden Sie in der Dokumentation <a href="{$a->docsurl}">Google OAuth 2.0 Setup</a>.</p><p>Als Teil der Registrierung müssen Sie folgende URL als \'Authorized Redirect URIs\' angeben:<br />{$a->callbackurl}</p><p>Sobald Sie registriert sind, erhalten Sie eine Client ID und ein Secret zur Konfiguration aller Plugins für Google Docs und Picasa.</p>';
$string['pluginname'] = 'Google Docs';
$string['secret'] = 'Secret';
$string['sendfailed'] = 'Die Datei {$a} konnte nicht zu Google übertragen werden';
