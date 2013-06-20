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
 * Strings for component 'auth_cas', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS-gebruikers';
$string['accesNOCAS'] = 'andere gebruikers';
$string['auth_cas_auth_user_create'] = 'Creëer gebruikers extern';
$string['auth_cas_baseuri'] = 'URI van de server (leeg laten als er geen baseUri is)<br />Als de CAS-server bijvoorbeeld antwoordt op host.domein.be/CAS/ dan <br />cas_baseuri=CAS/';
$string['auth_cas_baseuri_key'] = 'Basis URI';
$string['auth_cas_broken_password'] = 'Je kunt niet verder doen zonder het wijzigen van je wachtwoord, hoewel de mogelijkheid om dat te doen niet voorzien is. Neem contact op met de beheerder.';
$string['auth_cas_cantconnect'] = 'LDAP-gedeelte van de CAS-module kan geen verbinding maken met de server: {$a}';
$string['auth_cas_casversion'] = 'CAS protocolversie';
$string['auth_cas_certificate_check'] = 'Zet dit op \'ja\' als je het servercertificaat wil valideren';
$string['auth_cas_certificate_check_key'] = 'Servervalidatie';
$string['auth_cas_certificate_path'] = 'Pad van het CA chain bestand (PEM bestandsformaat) om het servercertificaat te valideren';
$string['auth_cas_certificate_path_empty'] = 'Als je servervalidatie inschakeld, moet je een certificaatspad opgeven.';
$string['auth_cas_certificate_path_key'] = 'Certificaat pad';
$string['auth_cas_changepasswordurl'] = 'URL om wachtwoord te wijzigen';
$string['auth_cas_create_user'] = 'Schakel dit in als je gebruikers met CAS-authenticatie in de Moodle-databank wil zetten. Indien niet ingeschakeld zullen enkel gebruikers die al in de Moodle-databank bestaan, kunnen aanmelden.';
$string['auth_cas_create_user_key'] = 'Maak gebruiker';
$string['auth_casdescription'] = 'Deze methode gebruikt een CAS-server (Central Authentication Service) om gebruikers in een Single Sign On omgeving (SSO) te authenticeren. Als de ingegeven gebuikersnaam en wachtwoord volgens CAS kloppen, dan zal Moodle een nieuwe gebruiker in zijn databank maken en de gebruikersgegevens uit LDAP overnemen indien nodig. Bij volgende aanmeldingen worden dan enkel de gebruikersnaam en wachtwoord gecontroleerd.';
$string['auth_cas_enabled'] = 'Schakel dit in als je CAS-authenticatie wil gebruiken.';
$string['auth_cas_hostname'] = 'Server-naam van de CAS-server<br />vb: host.domein.nl';
$string['auth_cas_hostname_key'] = 'Host-naam';
$string['auth_cas_invalidcaslogin'] = 'Sorry, je login is mislukt - je kon niet geauthoriseerd worden';
$string['auth_cas_language'] = 'Kies taal voor authenticatiepagina\'s';
$string['auth_cas_language_key'] = 'Taal';
$string['auth_cas_logincas'] = 'Toegang met veilige verbinding';
$string['auth_cas_logoutcas'] = 'Zet deze instelling op \'Ja\' als je wil uitloggen uit CAS wanneer je Moodle verlaat.';
$string['auth_cas_logoutcas_key'] = 'CAS uitlog-optie';
$string['auth_cas_logout_return_url'] = 'Geef een URL waarnaar CAS-gebruikers gestuurd worden na afmelden.<br />Als je dit leeg laat, dan zullen gebruikers naar de pagina gestuurd worden waar Moodle gebruikers naar stuurt.';
$string['auth_cas_logout_return_url_key'] = 'Alternatieve URL na afmelden';
$string['auth_cas_multiauth'] = 'Zet deze instelling op \'Ja\' als je multi-authenticatie wil gebruiken (CAS samen met een andere authenticatiemethode)';
$string['auth_cas_multiauth_key'] = 'Multi-authenticatie';
$string['auth_casnotinstalled'] = 'Kan CAS-authenticatie niet gebruiken. De PHP LDAP-module is niet geïnstalleerd.';
$string['auth_cas_port'] = 'Poort van de CAS-server';
$string['auth_cas_port_key'] = 'Poort';
$string['auth_cas_proxycas'] = 'Zet deze instelling op \'Ja\' als je CAS in proxy-modus gebruikt.';
$string['auth_cas_proxycas_key'] = 'Proxy-modus';
$string['auth_cas_server_settings'] = 'CAS-serverconfiguratie';
$string['auth_cas_text'] = 'Veilige verbinding';
$string['auth_cas_use_cas'] = 'Gebruik CAS';
$string['auth_cas_version'] = 'Te gebruiken CAS-protocolversie';
$string['CASform'] = 'Authenticatiekeuze';
$string['noldapserver'] = 'Er is geen LDAP-server geconfigureerd voor CAS! Synchronisatie uitgeschakeld';
$string['pluginname'] = 'CAS-server (SSO)';
