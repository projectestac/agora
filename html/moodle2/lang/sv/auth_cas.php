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
 * Strings for component 'auth_cas', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS-användare';
$string['accesNOCAS'] = 'andra användare';
$string['auth_cas_auth_user_create'] = 'Skapa användare med externa metoder';
$string['auth_cas_baseuri'] = 'Serverns URI (ingenting om det inte är en baseURI)<br />IF t.ex. CAS-servern svarar mot
värd.domän.se/CAS/ THEN <br />cas_baseuri=CAS/';
$string['auth_cas_baseuri_key'] = 'Bas-URI';
$string['auth_cas_broken_password'] = 'Du kan inte fortsätta utan att ändra Ditt lösenord, men tyvärr finns det inte någon tillgänglig sida som Du kan göra det på. Var snäll och kontakta den som administrerar Moodle.';
$string['auth_cas_cantconnect'] = 'LDAP-delen av CAS-modulen kan inte åstadkomma en anslutning till servern:{$a}';
$string['auth_cas_casversion'] = 'Version';
$string['auth_cas_certificate_check'] = 'Ställ om det här om Du vill validera certifikatet för servern';
$string['auth_cas_certificate_check_key'] = 'Validering av server';
$string['auth_cas_certificate_path'] = 'Sökväg till CA kedjefilen (PEM-format) för att validera certifikatet för servern';
$string['auth_cas_certificate_path_empty'] = 'Om Du vill aktivera validering av certifikatet för servern så måste Du ange en sökväg för certifikatet';
$string['auth_cas_certificate_path_key'] = 'Sökväg för certifikatet';
$string['auth_cas_changepasswordurl'] = 'URL till sida för att ändra lösenord';
$string['auth_cas_create_user'] = 'Aktivera detta om Du vill lägga in CAS-auktoriserade användare i Moodles databas. Om inte som kommer bara användare som redan finns i Moodles databas att kunna logga in.';
$string['auth_cas_create_user_key'] = 'Skapa användare';
$string['auth_casdescription'] = 'Den här metoden använder en CAS-server (Central Authentication Service) för att autentisera användare i en Single Sign On environment (SSO). Du kan också använda enkel LDAP autenticering. Om ett visst givet annvändarnamn och lösenord är giltigt enligt CAS så lägger Moodle in en ny användare i sin databas, och hämtar användarens egenskaper (attribut) från LDAP om så krävs. Vid nästföljande inloggningar så kontrolleras bara användarnamnet och lösenordet.';
$string['auth_cas_enabled'] = 'Aktivera detta om Du vill använda autenticering med CAS.';
$string['auth_cas_hostname'] = 'Värdnamn för CAS-server<br />t.ex. värd.domän.se';
$string['auth_cas_hostname_key'] = 'Värdnamn';
$string['auth_cas_invalidcaslogin'] = 'Din inloggning misslyckades tyvärr - Dina rättigheter kunde inte bekräftas';
$string['auth_cas_language'] = 'Valt språk';
$string['auth_cas_language_key'] = 'Språk';
$string['auth_cas_logincas'] = 'Tillträde via en säker uppkoppling';
$string['auth_cas_logoutcas'] = 'Ändra detta till \'Ja\' om Du vill logga ut från CAS när Du går ur Moodle.';
$string['auth_cas_logoutcas_key'] = 'Logga ut från CAS';
$string['auth_cas_multiauth'] = 'Ändra detta till \'Ja\' om Du vill använda multi-autenticering (CAS eller annan autenticering).';
$string['auth_cas_multiauth_key'] = 'Multi-autenticering';
$string['auth_casnotinstalled'] = 'Det går inte att använda autenticering med  CAS. PHP modulen för LDAP är inte installerad.';
$string['auth_cas_port'] = 'CAS-serverns port';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Ändra detta till \'Ja\' om Du vill använda proxy-mode för CASin.';
$string['auth_cas_proxycas_key'] = 'Proxy-mode';
$string['auth_cas_server_settings'] = 'Konfiguration av CAS-server';
$string['auth_cas_text'] = 'Säker uppkoppling';
$string['auth_cas_use_cas'] = 'Använd CAS';
$string['auth_cas_version'] = 'CAS version';
$string['CASform'] = 'Val angående autenticering';
$string['pluginname'] = 'Använd en CAS-server (SSO)';
