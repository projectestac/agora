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
 * Strings for component 'auth_cas', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS-Nutzer/innen';
$string['accesNOCAS'] = 'Weitere Nutzer/innen';
$string['auth_cas_auth_user_create'] = 'Nutzer/innen extern anlegen';
$string['auth_cas_baseuri'] = 'URI des Servers (kein Eintrag, falls es keine baseUri gibt)<br />z.B., wenn der CAS Server an host.domaine.fr/CAS/ dann<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'Basis URI';
$string['auth_cas_broken_password'] = 'Sie müssen Ihr Kennwort ändern. Falls dafür keine Seite verfügbar ist, nehmen Sie bitte mit dem Admin Kontakt auf.';
$string['auth_cas_cantconnect'] = 'LDAP-Teil des CAS-Moduls kann keine Verbindung mit dem Server herstellen: {$a}';
$string['auth_cas_casversion'] = 'CAS Protokoll';
$string['auth_cas_certificate_check'] = 'Mit dieser Einstellung fordern Sie die Validierung des Serverzertifikats an.';
$string['auth_cas_certificate_check_key'] = 'Servervalidierung';
$string['auth_cas_certificate_path'] = 'Pfad zur CA-Chain Datei (PEM Format) für die Validierung des Serverzertifikats';
$string['auth_cas_certificate_path_empty'] = 'Wenn Sie die Validierung des Serverzertifikats aktivieren, müssen Sie einen Pfad angeben';
$string['auth_cas_certificate_path_key'] = 'Zertifikatspfad';
$string['auth_cas_changepasswordurl'] = 'URL zur Kennwortänderung';
$string['auth_cas_create_user'] = 'Aktivieren Sie die Einstellung, um CAS authentifizierte Nutzer/innen in die Moodle-Datenbank einzufügen. Andernfalls können sich nur die Nutzer/innen anmelden, die bereits in der Moodle-Datenbank vorhanden sind.';
$string['auth_cas_create_user_key'] = 'Nutzer anlegen';
$string['auth_casdescription'] = 'Dieses Verfahren verwendet einen CAS Server (Central Authentification Service) zur Authentifizierung über Single-Sign-On (SSO). Sie können alternative auch eine einfache LDAP Authentifizierung verwenden. Wenn der benutzte Anmeldename und das Kennwort auf dem CAS Server bei der erstmaligen Anmeldung gültig sind, erstellt Moodle einen neuen Nutzereintrag in seiner Datenbank und übernimmt weitere erforderliche Daten über LDAP. Bei späteren Anmeldungen werden nur Anmeldename und Kennwort geprüft.';
$string['auth_cas_enabled'] = 'Aktivieren Sie diese Option, um die CAS Authentifizierung zu verwenden';
$string['auth_cas_hostname'] = 'Hostname des CAS-Servers <br />z.B.: host.domain.fr';
$string['auth_cas_hostname_key'] = 'Hostname';
$string['auth_cas_invalidcaslogin'] = 'Login fehlgeschlagen - der Zugang konnte nicht bestätigt werden.';
$string['auth_cas_language'] = 'Ausgewählte Sprache';
$string['auth_cas_language_key'] = 'Sprache';
$string['auth_cas_logincas'] = 'Sicherer Zugang';
$string['auth_cas_logoutcas'] = 'Diese Option legt fest, dass Sie sich gleichzeitig vom CAS abmelden, sobald Sie sich in Moodle abmelden.';
$string['auth_cas_logoutcas_key'] = 'CAS Abmeldeoption';
$string['auth_cas_multiauth'] = 'Diese Option legt fest, dass Sie eine Mehrfach-Authentifizierung wünschen (CAS + andere Authentifizierung)';
$string['auth_cas_multiauth_key'] = 'Mehrfach-Authentifizierung';
$string['auth_casnotinstalled'] = 'CAS Authentifizierung ist nicht verfügbar. Die PHP-Extension LDAP ist nicht installiert.';
$string['auth_cas_port'] = 'Port des CAS-Servers';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Diese Option legt fest, dass Sie CAS im Proxy-Modus verwenden.';
$string['auth_cas_proxycas_key'] = 'Proxy-Modus';
$string['auth_cas_server_settings'] = 'CAS-Serverkonfiguration';
$string['auth_cas_text'] = 'Sichere Verbindung';
$string['auth_cas_use_cas'] = 'CAS verwenden';
$string['auth_cas_version'] = 'Aktiviertes CAS-Protokoll';
$string['CASform'] = 'Wahl der Authentifizierung';
$string['noldapserver'] = 'Für CAS wurde kein LDAP Server konfiguriert! Die Synchronisierung wurde deaktiviert.';
$string['pluginname'] = 'CAS-Server (SSO)';
