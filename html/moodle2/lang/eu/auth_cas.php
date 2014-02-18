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
 * Strings for component 'auth_cas', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CAS erabiltzaileak';
$string['accesNOCAS'] = 'beste erabiltzaile batzuk';
$string['auth_cas_auth_user_create'] = 'Erabiltzaileak kanpotik sortu';
$string['auth_cas_baseuri'] = 'Zerbitzariaren URIa (zuriz Uri oinarririk ez badago)<br />Adibidez, CAS zerbitzariak host.domaine.com/CAS/ helbideari erantzuten badio, orduan<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URI oinarria';
$string['auth_cas_broken_password'] = 'Ezin duzu pasahitza aldatu gabe jarraitu. Hala ere, ez dago pasahitza aldatzeko orririk. Mesedez, jar zaitez harremanetan zure Moodle-ko kudeatzailearekin.';
$string['auth_cas_cantconnect'] = 'CAS moduluaren LDAP atala ezin da ondoko zerbitzariarekin konektatu: {$a}';
$string['auth_cas_casversion'] = 'CAS protokoloaren bertsioa';
$string['auth_cas_certificate_check'] = 'Aukeratu "bai" balorea zerbitzariaren ziurtagiria balioztatu nahi baduzu';
$string['auth_cas_certificate_check_key'] = 'Zerbitzariaren balioztatzea';
$string['auth_cas_certificate_path'] = 'CAren balioztatze-katearen fitxategi-bidea (PEM formatua) zerbitzariaren ziurtagiria balioztatzeko';
$string['auth_cas_certificate_path_empty'] = 'Zerbitzariaren balioztatzea gaituz gero, ziurtagirirako bidea zehaztu behar duzu';
$string['auth_cas_certificate_path_key'] = 'Ziurtagiriaren bidea';
$string['auth_cas_changepasswordurl'] = 'Pasahitza aldatzeko URLa';
$string['auth_cas_create_user'] = 'Aktibatu hau Moodle-ren datu-basean CASen bidez onartutako erabiltzaileak erantsi nahi badituzu. Bestela, Moodle-ren datu-basean honez gero dauden erabiltzaileek soilik izango dute sarbidea.';
$string['auth_cas_create_user_key'] = 'Sortu erabiltzailea';
$string['auth_casdescription'] = 'Metodo honek CAS zerbitzaria erabiltzen du (Central Authentication Service) erabiltzaileak SSO (Single Sign On) inguruan autentifikatzeko. Nahi baduzu LDAP autentifikazio xumea erabil dezakezu. Erabiltzaile-izena eta pasahitza CASen arabera egokiak badira, Moodle-k erabiltzaile berri bat sortzen du datu-basean, beharko balitz LDAPetik atributuak hartuz. Hurrengo konexioetan erabiltzaile-izena eta pasahitza baieztatzen dira, besterik ez.';
$string['auth_cas_enabled'] = 'Aktibatu hau CAS autentifikazioa nahi baduzu.';
$string['auth_cas_hostname'] = 'CAS zerbitzariaren izena<br />ad.: host.domain.eu';
$string['auth_cas_hostname_key'] = 'Ostalari-izena';
$string['auth_cas_invalidcaslogin'] = 'Sentitzen dugu, zure saio-hasierak kale egin du: ezin zara sartu';
$string['auth_cas_language'] = 'Aukeratu hizkuntza autentifikazio-orrietarako';
$string['auth_cas_language_key'] = 'Hizkuntza';
$string['auth_cas_logincas'] = 'Konexio seguruaren sarbidea';
$string['auth_cas_logoutcas'] = 'Aukeratu \'bai\' CASetik irten nahi baduzu Moodle-n saioa amaitutakoan';
$string['auth_cas_logoutcas_key'] = 'CASen saioa amaitzeko aukera';
$string['auth_cas_multiauth'] = 'Aukeratu \'bai\' autentifikazio anitza izan nahi baduzu, (CAS + beste autentifikazioa)';
$string['auth_cas_multiauth_key'] = 'Autentifikazio anitza';
$string['auth_casnotinstalled'] = 'Ezin da CAS autentifikazioa erabili. PHP LDAP modulua ez dago instalatuta.';
$string['auth_cas_port'] = 'CAS zerbitzariaren ataka';
$string['auth_cas_port_key'] = 'Ataka';
$string['auth_cas_proxycas'] = 'Aukeratu \'bai\' CAS proxy moduan  erabili nahi baduzu';
$string['auth_cas_proxycas_key'] = 'Proxy modua';
$string['auth_cas_server_settings'] = 'CAS zerbitzariaren ezarpenak';
$string['auth_cas_text'] = 'Konexio segurua';
$string['auth_cas_use_cas'] = 'Erabili CAS';
$string['auth_cas_version'] = 'Erabiltzeko CAS protokoloaren bertsioa';
$string['CASform'] = 'Autentifikaziorako modua';
$string['noldapserver'] = 'Ez dago CAS-erako konfiguratutako LDAP zerbitzaririk! Sinkronizazioa desgaituta.';
$string['pluginname'] = 'CAS zerbitzaria (SSO)';
