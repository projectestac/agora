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
 * Strings for component 'auth_email', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = 'Die Authentifizierung \'E-Mail basiert\' ist die Standardauthentifizierung. Wenn sich Nutzer/innen neu anmelden, ihren eigenen Anmeldenamen und das Kennwort auswählen, dann wird zur Bestätigung eine E-Mail an die angegebene E-Mail-Adresse gesendet. Diese E-Mail enthält eine URL, über die neue Nutzer/innen ihren Zugang bestätigen müssen. Alle späteren Anmeldungen prüfen nur noch Anmeldenamen und Kennwort anhand der in der Moodle-Datenbank gespeicherten Daten.';
$string['auth_emailnoemail'] = 'Der Versuch ist gescheitert, Ihnen eine E-Mail zu senden!';
$string['auth_emailrecaptcha'] = 'Diese Einstellung fügt im Anmeldeformular zur Selbstregistierung ein Kontrollelement (Bild oder Audio) hinzu, um die Moodle-Instanz wirksam gegen Spammer zu schützen. Weitere Informationen finden Sie unter <a href="http://www.google.com/recaptcha/learnmore">http://www.google.com/recaptcha/learnmore</a>. <br />Die PHP-Extension cURL ist erforderlich.';
$string['auth_emailrecaptcha_key'] = 'ReCaptcha einschalten';
$string['auth_emailsettings'] = 'Einstellungen';
$string['pluginname'] = 'E-Mail basiert';
