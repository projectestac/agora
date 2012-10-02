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
 * Strings for component 'portfolio_flickr', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API-Schlüssel';
$string['contenttype'] = 'Inhaltstypen';
$string['err_noapikey'] = 'Kein API-Schlüssel';
$string['err_noapikey_help'] = 'Für dieses Plugin wurde noch kein API-Schlüssel konfiguriert. Sie erhalten einen solchen Schlüssel unter http://flickr.com/services/api/keys/apply';
$string['hidefrompublicsearches'] = 'Diese Bilder vor öffentlichen Suchen verstecken?';
$string['isfamily'] = 'Sichtbar für die Familie';
$string['isfriend'] = 'Sichtbar für Freunde';
$string['ispublic'] = 'Öffentlich (alle können zugreifen)';
$string['moderate'] = 'Gemäßigt';
$string['noauthtoken'] = 'Für diese Sitzung wurde kein Authentifizierungstoken übertragen';
$string['other'] = 'Kunst, Illustrationen, CGI oder andere Nicht-Fotografien';
$string['photo'] = 'Fotos';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = 'Beschränkt';
$string['safe'] = 'Sicher';
$string['safetylevel'] = 'Sicherheitsstufe';
$string['screenshot'] = 'Screenshots';
$string['set'] = 'Set';
$string['setupinfo'] = 'Einstellungsanleitung';
$string['setupinfodetails'] = 'Sie erhalten Ihren API-Key und Ihr Secret für Flickr über <a href="{$a->applyurl}">Apply for a new key</a>. Sobald der neue Key und das Secret für Sie generiert wurde, klicken Sie auf den Link \'Edit auth flow for this app\'. Setzen Sie den \'App Type\' als \'Web Application\'. Kopieren Sie in das Feld \'Callback URL\' den folgenden Text: <br /><code> {$a->callbackurl} </code><br />

Optional können Sie weitere Informationen über Ihre Moodle-Instanz und ein Logo angeben. Alle Angaben können auch später noch bearbeitet werden, und zwar in der <a href="{$a->keysurl}"> Liste Ihrer Flickr-Anwendungen </a>.';
$string['sharedsecret'] = 'API-Secret ';
$string['title'] = 'Titel';
$string['uploadfailed'] = 'Fehler beim Hochladen von Bildern zu flickr.com: {$a}';
