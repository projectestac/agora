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
 * Strings for component 'repository_googledocs', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['configplugin'] = 'Einstellungen für Google Docs';
$string['googledocs:view'] = 'Google Docs Dateiverzeichnis anzeigen';
$string['oauth2upgrade_message_content'] = 'Im Rahmen des Updates auf Moodle 2.3 wurde das Google Docs Portfolio deaktiviert. Zur Re-Aktivierung muss Ihre Seite bei Google registriert werden. Die Dokumentation {$a->docsurl} beschreibt diesen Vorgang. Sie erhalten eine Kunden-ID und einen Schlüssel, mit denen Sie alle Google Docs und Picasa Plugins konfigurieren können.';
$string['oauth2upgrade_message_small'] = 'Das Google Docs Repository Plugin wurde deaktiviert bis es mit Google OAuth2.0 neu konfiguriert wurde wie in der Dokumentation beschrieben.';
$string['oauth2upgrade_message_subject'] = 'Wichtige Informationen zum Google Docs Repository Plugin';
$string['oauthinfo'] = '<p>Um dieses Plugin nutzen zu können, ist eine Registrierung bei Google erforderlich. Entsprechende Informationen finden Sie auf <a href="{$a->docsurl}">Google OAuth 2.0 Setup</a>.</p><p>Während der Registrierung müssen Sie folgende URL als \'Authorized Redirect URIs\' eingeben: <br />{$a->callbackurl}</p>Sie erhalten eine Client ID und ein Secret, mit denen Sie alle Plugins für Google Docs und Picasa konfigurieren können.</p>';
$string['pluginname'] = 'Google Docs';
$string['secret'] = 'Secret';
